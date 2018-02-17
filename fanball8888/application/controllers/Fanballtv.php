<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fanballtv extends Public_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Channel_model','channel');
		$this->load->library('encryption');
	}

	function index($id='')
	{
		$channel = $this->channel->search_id($id)->row_array();
		$this->data['channel'] = $channel;
		$this->data['channels'] = $this->channel->search()->result_array();
		$this->load->view('fanballtv',$this->data);
	}

	function encryptor($url)
	{
		$url_encode = $url;
		return $url_encode;
	}

	function decryptor($url)
	{
		$url_decode = $url;
		return $url_decode;
	}
}
