<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends Public_Controller {

	function index()
	{
		$this->load->view('news',$this->data);
	}

}
