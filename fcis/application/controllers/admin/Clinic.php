<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clinic extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
		$this->allow_group_access(array('special','admin'));
		$this->load->model('Patient_model','patient');
		$this->load->model('Clinic_model','clinic');
		$this->load->model('Assets_model','assets');
		$this->data['page_header'] = 'clinic';
		$this->data['page_header_small'] = 'clinic details';
		$this->data['parent_menu'] = 'clinic';
	}

	function index()
	{
		$q = $this->input->get('q');
		$results = array();
		if ($q)
			$results = $this->patient->find_by_all($q);

		$this->data['results'] = $results;
		$this->render('admin/clinic/index');
	}

	function add($id=null)
	{
		if ( ! intval($id) > 0) :
			$this->session->set_flashdata('message',message_box('no record found, check your data','danger'));
			redirect('admin/clinic');
		else:
			$patient = $this->patient->search_id($id);
			$tab = $this->input->get('tab') ? $this->input->get('tab') : 'fap';
			$tab = (in_array($tab,array('fap','hnpcc','pjsjps'))) ? $tab : 'fap';
			$assets = $this->assets->find_gallery($tab,$id);
			switch ($tab) :
				case 'fap':
				$this->form_validation->set_rules('','','required');
				if ($this->form_validation->run() !== FALSE) :
					print_data($this->input->post());
				endif;
					break;
				case 'hnpcc':
					break;
				case 'pjsjps':
					break;
			endswitch;
		endif;
		$this->data['tab'] = $tab;
		$this->data['assets'] = $assets;
		$this->data['patient'] = $patient;
		$this->render('admin/clinic/add');
	}

}
