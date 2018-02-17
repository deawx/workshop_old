<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Point extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
			$this->load->model('Match_model');
			$this->load->model('Betting_model');
			$this->load->model('Pay_model');
			$this->load->model('User_model','user');
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
		$this->data['points'] = $this->Pay_model->get_all();
		$this->load->view('admin/point', $this->data);

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

	function add_point()
	{
		$post = $this->input->post();
		$this->data['points'] = $this->Pay_model->insert_point($post);
		redirect('admin/point');
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

}
