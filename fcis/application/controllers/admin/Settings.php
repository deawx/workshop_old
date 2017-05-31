<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends Admin_Controller {

	public function __construct(){
		parent::__construct();
		$this->allow_group_access(array('admin'));
		$this->load->model('Setting');
		$this->data['parent_menu'] = 'settings';
	}

	public function index()
	{
		$this->data['settings'] = $this->Setting->findAll();
		$this->render('admin/settings/index');
	}

}
