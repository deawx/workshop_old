<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pay extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
    	$this->load->model('Match_model');
		$this->load->model('Betting_model');
		$this->load->model('Pay_model');
		$this->load->model('user_model','user');
		$this->data['num_betting'] = $this->db
										  ->select('match.time as match_time,match.*,game_betting.*')
										  ->join('match','match.id = game_betting.match_id')
										  ->where('match.status','complete')
										  ->where('game_betting.status','process')
										  ->get('game_betting')
										  ->num_rows();
		$this->data['num_problem'] = $this->db
								->order_by('id','ASC')
								->where('status','problem')
								->get('game_betting')
								->num_rows();
	}

 	function index()
	{
		$id = $this->input->get('id');
		$this->data['list_betting'] = $this->Pay_model->pay_get_all();
		
		$this->load->view('admin/pay', $this->data);
	}
	function pay_list()
	{
		$this->data['pay'] = $this->db
						  ->select('game_betting.time as betting_time, game_betting.point as betting_point ,game_pay.point as pay_point,game_betting.*,game_pay.*')
						  ->join('game_betting','game_betting.id = game_pay.betting_id')
						  ->order_by('game_pay.id','ASC')
						  ->get('game_pay')
						  ->result_array();
		$this->data['match'] = $this->Match_model->get_all();				  
		$this->load->view('admin/pay_list', $this->data);
	}
	function pay_problem()
	{
		$this->data['betting'] = $this->db
								->order_by('id','ASC')
								->where('status','problem')
								->get('game_betting')
								->result_array();
								
		$this->load->view('admin/pay_problem', $this->data);
	}
	function add_pay_problem()
	{
		if($this->input->get('betting_id')):	
			$betting_id = $this->input->get('betting_id');
			$betting = $this->db->where('id',$betting_id)->get('game_betting')->row_array();
			$this->db
				->set('status','problem')
				->where('id',$betting['id'],FALSE)
				->update('game_betting');
			$this->db
				->set('point','point+'.$betting['point'],FALSE)
				->where('id',$betting['user_id'])
				->update('user');
			$post = array(
				'point' => $betting['point'],
				'type' => 'betting',
				'user_id' => $betting['user_id'],
				'betting_id' => $betting['id'],
				'time' => time(),
				'admin_id' => $this->session->id,
				'remark' => 'บิลมีปัญหาคืนเงิน'
				);
			if ($this->db->set($post,FALSE)->insert('game_pay')) //update pay
				{
					$this->session->set_flashdata('success', 'update ok.');
				}
				else
				{
					$this->session->set_flashdata('error', 'update failed.');
				}
		endif;
		redirect('admin/pay/pay_problem');
	}
	function save_pay()
	{
		$port = $this->input->post();
		if($port['check_ture'] !== NULL)
		{
			foreach($port['check_ture'] as $id)
			{
				$betting = $this->Betting_model->get_by_id($id);
				foreach($betting as $list_betting_value)
				{
					foreach($port['sum'] as $key => $sum)
					{
						if($key == $list_betting_value['id'])
						{ 
							$post = array(
										'point' => $sum,
										'type' => 'betting',
										'user_id' => $list_betting_value['user_id'],
										'betting_id' => $list_betting_value['id'],
										'time' => time(),
										'admin_id' => $this->session->id,
										'remark' => 'success'
										);
							if ($this->Pay_model->insert_pay($post) !== FALSE) //update Match
								{
									$this->session->set_flashdata('success', 'update ok.');
								}
								else
								{
									$this->session->set_flashdata('error', 'update failed.');
								}
						}
					}
				}
			}
		}
		else
		{
			$this->session->set_flashdata('danger', 'update failed.');
		}
	redirect('admin/pay');
	}

}
