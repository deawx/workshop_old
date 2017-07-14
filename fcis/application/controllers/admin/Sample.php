<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sample extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->allow_group_access(array('special','admin'));
		$this->load->model('Sample_model', 'sample');
		$this->load->model('Patient_model','patient');
		$this->data['page_header'] = 'Sample';
		$this->data['page_header_small'] = 'details';
		$this->data['parent_menu'] = 'sample';
	}

	function index()
	{
		if ( ! $this->input->get('case') OR $this->input->get('case') === 'inpatient') :
			$q = $this->input->get('q');
			$results = array();
			if ($q)
				$results = $this->patient->find_by_all($q);

			$this->data['results'] = $results;
			$this->render('admin/sample/index');
		elseif ($this->input->get('case') === 'outpatient'):
			$this->add_outpatient();
		endif;
	}

	function add_inpatient($id=null)
	{
		// $this->form_validation->set_rules('institution', 'institution', 'required');
		// $this->form_validation->set_rules('department', 'department', 'required');
		// $this->form_validation->set_rules('sample_name', "sample's name", 'required');
		// if ($this->form_validation->run() === FALSE) :
		// 	$this->session->set_flashdata('message',message_box(validation_errors(),'danger'));
		// 	redirect('admin/sample?case=inpatient');
		// endif;
		$patient = $this->patient->search_id($id);
		if ( ! intval($id) > 0 OR  ! $patient)
		{
			$this->session->set_flashdata('message',message_box('no record found, check your data','danger'));
			redirect('admin/sample');
		}
		$this->data['patient'] = $patient;
		$this->render('admin/sample/add_inpatient');
	}

	function add_outpatient()
	{
		// $this->form_validation->set_rules('institution', 'institution', 'required');
		// $this->form_validation->set_rules('department', 'department', 'required');
		// $this->form_validation->set_rules('sample_name', "sample's name", 'required');
		// if ($this->form_validation->run() === FALSE) :
		// 	$this->session->set_flashdata('message',message_box(validation_errors(),'danger'));
		// 	redirect('admin/sample?case=outpatient');
		// endif;
		$this->data['patient'] = $this->input->post();
		$this->render('admin/sample/add_outpatient');
	}

	function lists()
	{
		$view = $this->input->get('view') ? $this->input->get('view') : 'fap';
		$samples = $this->sample->find_list($view);

		// print_data($samples);

		$this->data['view'] = $view;
		$this->data['samples'] = $samples;
		$this->render('admin/sample/list');
	}

}
