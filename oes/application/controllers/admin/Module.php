<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Module extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Module_model','module');
	}

	function index()
	{
		$post = $this->input->post();
		if ($post)
			$this->module->save_module($post);

		$data['module'] = $this->db->where('id','1')->get('module')->row_array();
		$this->load->view('admin/module',$data);
	}

}
