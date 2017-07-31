<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->data['parent'] = 'home';
		$this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
	}

	public function index()
	{
		$this->data['header'] = array(
			$this->load->view('_partials/header',NULL,TRUE),
			// $this->load->view('_partials/carousel',NULL,TRUE),
			$this->load->view('_partials/jumbotron',NULL,TRUE)
		);
		$this->data['body'] = $this->load->view('welcome/welcome',NULL,TRUE);
		$this->load->view('_layouts/boxed',$this->data);
	}
}
