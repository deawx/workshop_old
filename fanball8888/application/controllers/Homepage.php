<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends Public_Controller {
	public $data = array();

	function __construct()
	{
		parent::__construct();
		$this->load->helper('typography');
	}

	function index()
	{
		$this->data['slide'] = $this->db->select('url,sort')->order_by('sort')->get('slide')->result_array();
		$this->data['event'] = $this->db->select('title,picture')->where('status','')->order_by('id','RANDOM')->get('event','4')->result_array();
		$this->load->view('homepage',$this->data);
	}

}
