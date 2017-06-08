<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patients extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->allow_group_access(array('special','admin'));
		$this->data['parent_menu'] = 'patient';
	}

	public function index()
	{
		$this->render('admin/patient/index');
	}

	public function add()
	{
		$this->render('admin/patient/add');
	}

}
