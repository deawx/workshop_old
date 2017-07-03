<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistic extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
		$this->allow_group_access(array('special','admin'));
		$this->load->model('Patient_model','patient');
		$this->load->model('Labs_model','labs');
		$this->load->model('Clinic_model','clinic');
		$this->load->model('Assets_model','assets');
		$this->data['page_header'] = 'statistic';
		$this->data['page_header_small'] = 'statistic details';
		$this->data['parent_menu'] = 'statistic';
	}

	function index()
	{
		$q = $this->input->get('q');
		
		$this->render('admin/statistic/test');
	}

}
