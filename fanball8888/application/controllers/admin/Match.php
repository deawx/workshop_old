<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Match extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
			$this->load->model('Match_model');
			$this->load->model('Betting_model');
			$this->load->model('Pay_model');
			$this->load->model('user_model','user');
			$this->load->model('profile_model','profile');
		$this->data['num_match_end'] = $this->db
			->order_by('id','ASC')
			->where('status','process')
			->where('time <',time())
			->get('match')
			->num_rows();
		$this->data['num_match_wait'] = $this->db
			->order_by('id','ASC')
			->where('status','process')
			->where('time >',time())
			->get('match')
			->num_rows();
	}

	function index()
	{
		$id = $this->input->get('id');
		$this->data['match'] = $this->Match_model->get_all();
		$this->data['edit_match'] = $this->Match_model->get_by_id($id);
		$this->load->view('admin/match', $this->data);

	}

	function match_wait()
	{
		$id = $this->input->get('id');
		$this->data['match'] = $this->db
			->where('status','process')
			->get('match')
			->result_array();
		$this->data['edit_match'] = $this->Match_model->get_by_id($id);
		$this->load->view('admin/match_wait', $this->data);
	}

	function match_end()
	{
		$id = $this->input->get('id');
		$this->data['match'] = $this->db
			->where('status','process')
			->get('match')
			->result_array();
		$this->data['edit_match'] = $this->Match_model->get_by_id($id);
		$this->load->view('admin/match_end', $this->data);
	}

	function match_problem($id)
	{
		//แก้ไขสเตตัน match
		if ($this->db->set('status','problem')->where('id',$id)->update('match')) : 										 //update Match
			$betting = $this->db->where('match_id',$id)->get('game_betting')->result_array(); 								//ค้นหาบิลทั้งหมดของ match นี้
			if($betting !== NULL):
				foreach ($betting as $betting_value) :
					if ($this->db->set('status','problem')->where('id',$betting_value['id'])->update('game_betting')) :   //update Match
						$this->db->set('point','point+'.$betting_value['point'],FALSE)->where('id',$betting_value['user_id'])->update('user');
						$post = array(
							'point' => $betting_value['point'],
							'type' => 'betting',
							'user_id' => $betting_value['user_id'],
							'betting_id' => $betting_value['id'],
							'time' => time(),
							'admin_id' => $this->session->id,
							'remark' => 'ยกเลิกการแข่งขัน'
							);
						if ($this->db->set($post)->insert('game_pay')): //update Match
							$this->session->set_flashdata('success', 'update ok.');
						else:
							$this->session->set_flashdata('error', 'update failed.');
						endif;
						$this->session->set_flashdata('success', 'update betting.');
					endif;
				endforeach;
			else :
				$this->session->set_flashdata('info', ' ไม่มีบิลที่พนันการแข่งขันนี้.');
			endif;
		else :
			$this->session->set_flashdata('error', 'update failed.');
		endif;
		redirect('admin/match');
	}

	function delete_point($id,$point)
	{
		if ( ! intval($id) || ! intval($point))
		{
			return FALSE;
		}
		if ($this->Pay_model->delete_point($id,$point))
		{
			$this->session->set_flashdata('success', 'delete ok.');
		}
		else
		{
			$this->session->set_flashdata('warning', 'delete failed.');
		}
		redirect('admin/match?match=point');
	}

	function save_match()
	{
		$post = $this->input->post();
		if ($post['id'] !=="") //อัพเดทข้อมูล Match
		{
			$this->form_validation->set_rules('home', 'เหย้า', 'required');
			$this->form_validation->set_rules('away', 'เยือน', 'required');
			$this->form_validation->set_rules('hdp', 'ราคา', 'required');
			$this->form_validation->set_rules('hdp_home', 'ค่าน้ำเหย้า', 'required');
			$this->form_validation->set_rules('hdp_away', 'ค่าน้ำเยือน', 'required');
			$this->form_validation->set_rules('ou', 'สูงต่ำ', 'required');
			$this->form_validation->set_rules('ou_over', 'ค่าน้ำสูง', 'required');
			$this->form_validation->set_rules('ou_under', 'ค่าน้ำต่ำ', 'required');
			if ($this->form_validation->run() === FALSE)
			{
				$this->session->set_flashdata('danger', validation_errors());
			}
			else
			{
				$post = array(
					'id' => $this->input->post('id'),
					'home' => $this->input->post('home'),
					'away' => $this->input->post('away'),
					'team' => $this->input->post('team'),
					'hdp' => $this->input->post('hdp'),
					'hdp_home' => $this->input->post('hdp_home'),
					'hdp_away' => $this->input->post('hdp_away'),
					'ou' => $this->input->post('ou'),
					'ou_over' => $this->input->post('ou_over'),
					'ou_under' => $this->input->post('ou_under'),
					'score_home' => NULL,
					'score_away' => NULL,
					'score_time' => NULL,
					'status' => 'process'
				);
				$hour = substr($this->input->post('time'),0,2);
				$minute = substr($this->input->post('time'),3,2);
				$second ="00";
				$month = substr($this->input->post('date'),5,2);
				$day = substr($this->input->post('date'),8,2);
				$year = substr($this->input->post('date'),0,4);
				$post['time'] = mktime($hour,$minute,$second,$month,$day,$year);
				if ($this->Match_model->update_match($post) !== FALSE) //update Match
				{
					$this->session->set_flashdata('success', 'update ok.');
				}
				else
				{
					$this->session->set_flashdata('error', 'update failed.');
				}
			}
		}
		else //นำเข้าข้อมูล Match
		{
			$this->form_validation->set_rules('home', 'เหย้า', 'required');
			$this->form_validation->set_rules('away', 'เยือน', 'required');
			$this->form_validation->set_rules('hdp', 'ราคา', 'required');
			$this->form_validation->set_rules('hdp_home', 'ค่าน้ำเหย้า', 'required');
			$this->form_validation->set_rules('hdp_away', 'ค่าน้ำเยือน', 'required');
			$this->form_validation->set_rules('ou', 'สูงต่ำ', 'required');
			$this->form_validation->set_rules('ou_over', 'ค่าน้ำสูง', 'required');
			$this->form_validation->set_rules('ou_under', 'ค่าน้ำต่ำ', 'required');
			if ($this->form_validation->run() === FALSE)
			{
				$this->session->set_flashdata('danger', validation_errors());
			}
			else
			{
				$post = array(
					'home' => $this->input->post('home'),
					'away' => $this->input->post('away'),
					'team' => $this->input->post('team'),
					'hdp' => $this->input->post('hdp'),
					'hdp_home' => $this->input->post('hdp_home'),
					'hdp_away' => $this->input->post('hdp_away'),
					'ou' => $this->input->post('ou'),
					'ou_over' => $this->input->post('ou_over'),
					'ou_under' => $this->input->post('ou_under'),
					'score_home' => NULL,
					'score_away' => NULL,
					'score_time' => NULL,
					'status' => 'process'
				);
				$hour = substr($this->input->post('time'),0,2);
				$minute = substr($this->input->post('time'),3,2);
				$second ="00";
				$month = substr($this->input->post('date'),5,2);
				$day = substr($this->input->post('date'),8,2);
				$year = substr($this->input->post('date'),0,4);
				$post['time'] = mktime($hour,$minute,$second,$month,$day,$year);
				if ($this->Match_model->insert_match($post) !== FALSE)
				{
					$this->session->set_flashdata('success', 'insert ok.');
				}
				else
				{
					$this->session->set_flashdata('error', 'insert failed.');
				}
			}
		}
		redirect('admin/match/match_wait');
	}

	function delete_match($id)
	{
		if($this->data['delete_match'] = $this->Match_model->get_by_id($id)!== Null)
		{
			if($this->data['delete_match'] = $this->Match_model->delete_match($id)!== FALSE)
			{
				$this->session->set_flashdata('success', 'Delete ok.');

			}
			else
			{
				$this->session->set_flashdata('error', 'Delete failed.');
			}
		}
		else
		{
			$this->session->set_flashdata('error', 'Delete failed.');
		}
		redirect('admin/match?match=match');
	}
	//Score
	function update_score()
	{
		$post = $this->input->post();
		if ($this->input->post('id') !=="") //update match
		{
			$this->form_validation->set_rules('score_home', 'สกอร์เหย้า', 'required');
			$this->form_validation->set_rules('score_away', 'สกอร์เยือน', 'required');
			if ($this->form_validation->run() === FALSE)
			{
				$this->session->set_flashdata('danger ', validation_errors());
			}
			else
			{
				if($post['team'] === 'home') :
				$home = $post['score_home'] - $post['hdp'];
				$win_team = $home - $post['score_away'];
				elseif($post['team'] === 'away'):
				$home = $post['score_home'] + $post['hdp'];
				$win_team = $home - $post['score_away'];
				endif;
				$win_ou = ($post['score_home'] + $post['away'])- $post['ou'];
				$post = array(
					'score_home' => $this->input->post('score_home'),
					'score_away' => $this->input->post('score_away'),
					'win_team' => $win_team,
					'win_ou' => $win_ou,
					'score_time' => time(),
					'status' => 'complete'
				);
				// ประกาศตัวแปรเสร็จสิ้น
				if ($this->Match_model->update_match($post) !== FALSE)
				{
					$this->session->set_flashdata('success', 'update ok.');
				}
				else
				{
					$this->session->set_flashdata('error', 'update failed.');
				}
				//End Update Score Match
			}
		}
		redirect('admin/match/match_end');
	}

	function pay()
	{
		$post = $this->input->post();
		dump($post);
		foreach($post['check_ture'] as $value)
		{
			$id = $value;
			$this->data['betting'] = $this->Betting_model->get_by_id($id);
			$betting = $this->data['betting'];
			foreach ($betting as $betting_value)
			{
				$id = $betting_value['match_id'];
				$this->data['match'] = $this->Match_model->get_by_id($id);
				$match = $this->data['match'];

				if($betting_value['bet'] === "home")
				{
					if($match['win_team'] === 0.5)
					{
						$price = $betting_value['price'];
						$pay = $price * 2; // เป็นค่าน้ำ
					}
					else if($match['win_team'] === 0.25)
					{
						$price = $betting_value['price'];
						$pay = $price * 1.5; //เป็นค่าน้ำ
					}
					else if($match['win_team'] === 0)
					{}
					else if($match['win_team'] === -0.25)
					{}
					else if($match['win_team'] === -0.5)
					{}
					//if ($this->Match_model->insert_match($post) !== FALSE)
					//	{
					//		$this->session->set_flashdata('success', 'insert ok.');
					//	}
					//	else
					//	{
					//		$this->session->set_flashdata('error', 'insert failed.');
					//	}
				}
				else if($betting_value['bet'] === "away")
				{
					echo $match['win_team']."<br>";
				}
				else if($betting_value['bet'] === "over")
				{
					echo $match['win_ou']."<br>";
				}
				else if($betting_value['bet'] === "under")
				{
					echo $match['win_ou']."<br>";
				}
			}
		}
	}

}
