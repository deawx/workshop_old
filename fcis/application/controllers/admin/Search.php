<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->allow_group_access(array('special','admin','member'));
		$this->load->model('Patient_model', 'patient');
		$this->data['parent_menu'] = 'search';
	}

	public function index($id=NULL)
	{
		$search = NULL;
		$this->form_validation->set_rules('id_card', 'Personal ID', 'is_numeric|exact_length[13]');
		$this->form_validation->set_rules('firstname', 'Firstname', 'max_length[100]');
		$this->form_validation->set_rules('lastname', 'Lastname', 'max_length[150]');
		if ($this->form_validation->run() == true) :
		endif;

		$get = clear_null_array($this->input->get());
		if ($get)
			$search = $this->patient->find($get);

		$config	= array(
			'base_url' => uri_string(),
			'total_rows' => count($search),
			'per_page' => 10
		);
		$this->pagination->initialize($config);

		$this->data['search'] = $this->patient->find($get);
		$this->render('admin/search/index');
	}

	function view($id=NULL)
	{
		echo $this->load->view();
	}

}
