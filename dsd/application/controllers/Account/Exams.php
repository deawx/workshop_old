<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exams extends Private_Controller {

	private $id;

	public function __construct()
	{
		parent::__construct();
    $this->load->model('Profile_model','profile');
    $this->load->model('Ion_auth_model','auth');
		$this->id = $this->session->user_id;
    $this->data['parent'] = 'account';
    $this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
		$this->data['user'] = $this->auth->user($this->id)->row_array();
	}

	public function index()
	{
		$this->data['menu'] = 'index';
		$this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
		$this->data['rightbar'] = $this->load->view('_partials/rightbar',$this->data,TRUE);
		$this->data['body'] = $this->load->view('exams/index',$this->data,TRUE);
		$this->load->view('_layouts/rightside',$this->data);
	}

	function standard($step='1')
	{
		$step = $step ? $step : '1';
		$this->data['step'] = $step;
		$this->data['prev'] = $step-1;
		$this->data['next'] = $step+1;

		$post = $this->input->post();
		if ($post) :
			$this->form_validation->set_rules('used_to','ff','required');
			if ($this->form_validation->run() === TRUE) :
				// print_data($this->input->post());
				$this->session->set_flashdata('warning','');
				redirect('account/exams/standard/'.$this->data['next']);
			else:
				$this->session->set_flashdata('warning',validation_errors());
			endif;
		endif;

		$this->data['menu'] = 'standard';
		$this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
		$this->data['rightbar'] = $this->load->view('_partials/rightbar',$this->data,TRUE);
		$this->data['body'] = $this->load->view('exams/standard',$this->data,TRUE);
		$this->load->view('_layouts/rightside',$this->data);
	}

	function skill()
	{
		$this->data['menu'] = 'skill';
		$this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
		$this->data['rightbar'] = $this->load->view('_partials/rightbar',$this->data,TRUE);
		$this->data['body'] = $this->load->view('exams/skill',$this->data,TRUE);
		$this->load->view('_layouts/rightside',$this->data);
	}

	function result()
	{
		$this->data['menu'] = 'result';
		$this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
		$this->data['rightbar'] = $this->load->view('_partials/rightbar',$this->data,TRUE);
		$this->data['body'] = $this->load->view('exams/register',$this->data,TRUE);
		$this->load->view('_layouts/rightside',$this->data);
	}

	function calendar()
	{
		$this->data['menu'] = 'calendar';
		$this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
		$this->data['rightbar'] = $this->load->view('_partials/rightbar',$this->data,TRUE);
		$this->data['body'] = $this->load->view('exams/register',$this->data,TRUE);
		$this->load->view('_layouts/rightside',$this->data);
	}

}
