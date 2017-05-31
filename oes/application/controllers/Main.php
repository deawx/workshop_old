<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends Public_Controller {

	function index($id='')
	{
		$module = $this->db->get('module')->row_array();
		$data['title'] = $module['title'];
		$data['objective'] = $module['objective'];
		$data['description'] = $module['description'];
		$this->load->view('main',$data);
	}

}
