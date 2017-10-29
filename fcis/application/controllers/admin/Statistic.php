<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistic extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
		$this->allow_group_access(array('special','admin'));
		$this->load->model('Patient_model','patient');
		$this->load->model('Labs_model','labs');
		$this->load->model('Sample_model','sample');
		$this->load->model('Clinic_model','clinic');
		$this->load->model('Assets_model','assets');
		$this->data['page_header'] = 'ข้อมูลทางสถิติ';
		$this->data['page_header_small'] = 'รายละเอียดข้อมูล';
		$this->data['parent_menu'] = 'statistic';
	}

	function index()
	{
		$this->data['logs'] = $this->patient->search('','100','','','users_logs');
		foreach ($this->data['logs'] as $key => $value) :
			$this->data['logs'][$key]['user_id'] = $this->ion_auth->user($value['user_id'])->row_array();
		endforeach;

		$this->data['patients'] = $this->patient->search();
		$this->data['labs'] = $this->labs->search();
		$this->data['samples'] = $this->sample->search();
		$this->data['clinics'] = $this->clinic->search();

		$this->render('admin/statistic/index');
	}

}
