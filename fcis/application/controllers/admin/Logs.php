<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logs extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
		$this->allow_group_access(array('special','admin'));
		$this->load->model('Patient_model','patient');
		$this->data['page_header'] = 'ประวัติการเข้าใช้งาน';
		$this->data['page_header_small'] = 'รายละเอียดข้อมูล';
		$this->data['parent_menu'] = 'logs';
	}

	public function index()
	{
		$this->data['logs'] = $this->patient->search('','100','','','users_logs');
		foreach ($this->data['logs'] as $key => $value) :
			$this->data['logs'][$key]['user_id'] = $this->ion_auth->user($value['user_id'])->row_array();
		endforeach;
		$this->render('admin/logs/index');
	}

}
