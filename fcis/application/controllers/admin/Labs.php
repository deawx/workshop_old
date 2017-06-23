<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Labs extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->allow_group_access(array('special','admin'));
		$this->load->model('Labs_model', 'labs');
		$this->load->model('Patient_model','patient');
		$this->data['page_header'] = 'Labs';
		$this->data['page_header_small'] = 'details';
		$this->data['parent_menu'] = 'lab';
	}

	function index()
	{
		$q = $this->input->get('q');
		$results = array();
		if ($q)
			$results = $this->patient->find_by_all($q);

		$this->data['results'] = $results;
		$this->render('admin/labs/index');
	}

	function add($id=null)
	{
		$patient = $this->patient->search_id($id);
		if ( ! intval($id) > 0 OR  ! $patient)
		{
			$this->session->set_flashdata('message',message_box('no record found, check your data','danger'));
			redirect('admin/labs');
		}

		$this->data['patient'] = $patient;
		$this->render('admin/labs/add');
	}

}
