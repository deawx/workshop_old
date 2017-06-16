<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->allow_group_access(array('special','admin','edior','member'));
		$this->load->model('Patient_model', 'patient');
		$this->data['page_header'] = 'Search';
		$this->data['page_header_small'] = 'for patients';
		$this->data['parent_menu'] = 'search';
	}

	public function index()
	{
		$id = $this->input->get('id');
		if (intval($id) > 0) :
			$this->_view($id);
		else :
			$this->_search($id);
		endif;
	}

	function _search()
	{
		// $patients = array();
		$get = clear_null_array($this->input->get());
		// unset($get['order_by']);
		// if ($get) :
		// 	$config	= array(
		// 		'total_rows' => $this->patient->count($get,'like'),
		// 		'per_page' => 20
		// 	);
		// 	$patients = $this->patient->find($get,$config['per_page'],$this->input->get('offset'),$this->input->get('order_by'));
		// 	$this->pagination->initialize($config);
		// 	$this->data['count'] = $config['total_rows'];
		// endif;

		$patients = $this->patient->find($get);
		$this->data['patients'] = $patients;
		$this->render('admin/search/index');
	}

	function _view($id=NULL)
	{
		$this->data['patient'] = $this->patient->search_id($id);
		$this->render('admin/search/view');
	}

}
