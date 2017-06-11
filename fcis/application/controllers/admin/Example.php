<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Example extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->allow_group_access(array('special','admin'));
		// $this->load->model('Example_model', 'example');
		$this->data['parent_menu'] = 'example';
	}

	public function index()
	{
		$this->render('admin/example/index');
	}

}
