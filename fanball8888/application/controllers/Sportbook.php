<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sportbook extends Public_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Match_model');
		$this->load->model('Betting_model');
		$this->load->model('Pay_model');
	}

	function index()
	{
		$post = $this->input->post();

		$user_id = $this->session->id;
		$this->data['match'] = $this->Match_model->sportbook_match();
		$this->data['point'] = $this->db
			->select('point')
			->where('id',$user_id)
			->get('user')
			->row();
		$this->data['betting'] = $this->db
					->where('status','process')
					->where('user_id',$user_id)
					->get('game_betting')
					->result_array();
		$match = $this->input->get('match');
		$this->data['bet'] = $this->input->get('bet');
		$id = $match;
		$this->data['select_bet'] = $this->Match_model->get_by_id($id);
		
		$this->load->view('sportbook',$this->data);

	}

	function save_betting()
	{
		$post = $this->input->post();
		if($this->session->id === "")
		{
			$this->session->set_flashdata('error', 'กรุณาล็อกอิน.');
			redirect('sportbook');
		}
		else{
		$this->form_validation->set_rules('match_id', 'รหัสแมท', 'required');
		$this->form_validation->set_rules('bet', 'รูปแบบการแทง', 'required');
		$this->form_validation->set_rules('point', 'แต้มที่เล่น', 'required');
			if ($this->form_validation->run() === FALSE)
			{
				$this->session->set_flashdata('danger ', validation_errors());
			}
			else
			{
				$post = array(
					'time' => time(),
					'match_id' => $this->input->post('match_id'),
					'user_id' => $this->session->id ,
					'bet' => $this->input->post('bet'),
					'point' => $this->input->post('point'),
					'status' => "process"
					
				);
				if (time() > $this->input->post('match_time'))
				{
					$this->session->set_flashdata('error', 'เวลาเกินกำหนด.');
				}
				else
				{
					if ($this->Betting_model->insert_betting($post) !== FALSE) //insert_betting
					{
						$this->session->set_flashdata('success', 'ป้อนข้อมูลเรียบร้อยแล้ว.');
					}
					else
					{
						$this->session->set_flashdata('error', 'ข้อมูลมีปัญหา.');
					}
				}
			}
		}
		redirect('sportbook');
	}

	function history()
	{
		$user_id = $this->session->id;
		$this->data['betting'] = $this->db
					->where('time >=',strtotime("-1 week"))
					->where('user_id',$user_id)
					->order_by('id','DESC')
					->get('game_betting')
					->result_array();
		$this->data['match'] = $this->Match_model->get_all();
		$this->data['pay'] =  $this->db
						  ->select('remark,point,betting_id')
						  ->where('user_id',$this->session->id)
						  ->get('game_pay')
						  ->result_array();
		$this->load->view('sportbook_history',$this->data);
	}

	function statistics()
	{
		$pay = $this->Pay_model->pay_get_all();
		foreach($pay as $pay_value)
		{
			if($pay_value['user_id'] === $this->session->id)
			{
				dump($pay_value);
			}
		}
		$this->load->view('sportbook_statistics',$this->data);
	}

}
