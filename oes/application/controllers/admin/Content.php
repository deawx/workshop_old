<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Course_model','course');
	}

	function index($tid,$id='')
	{
		$post = $this->input->post();
		if ($post)
			$this->course->save_topic($post);

		$data['sub_topic'] = $this->db->where('id',$tid)->get('sub_topic')->row_array();
		$this->load->view('admin/form/sub_topic',$data);
	}

}
