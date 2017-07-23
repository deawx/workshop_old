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
		$q = $this->input->get('q');
		$results = array();
		if ($q)
			$results = $this->patient->find_by_all($q);

		$this->data['case'] = 'inpation';
		$this->data['results'] = $results;
		$this->render('admin/sample/index');
	}

	function add_inpatient($id=null)
	{
		$this->form_validation->set_rules('blood', 'blood', 'required|is_numeric');
		$this->form_validation->set_rules('blood_code', 'blood code', 'required');
		$this->form_validation->set_rules('fresh_tissue', 'fresh tissue', 'required|in_list[normal,polyp,tumor]');
		$this->form_validation->set_rules('fresh_tissue_code', 'fresh tissue code', 'required');
		// $this->form_validation->set_rules('ffpe', 'ffpe', 'required');
		$this->form_validation->set_rules('groups', 'groups', 'required');
		// $this->form_validation->set_rules('ihc', 'ihc', 'required');
		if ($this->form_validation->run() === FALSE) :
			$this->session->set_flashdata('message',message_box(validation_errors(),'danger'));
		else:
			print_data($this->input->post());
			print_data(serialize($this->input->post()));
			die();
		endif;
		$patient = $this->patient->search_id($id);
		$this->data['case'] = 'inpation';
		$this->data['patient'] = $patient;
		if ( ! intval($id) > 0 OR  ! $patient) :
			$this->index();
		else :
			$this->render('admin/sample/add_inpatient');
		endif;
	}

	function add_outpatient()
	{
		$this->form_validation->set_rules('institution', 'institution', 'required');
		$this->form_validation->set_rules('department', 'department', 'required');
		$this->form_validation->set_rules('sample_name', "sample's name", 'required');
		$this->form_validation->set_rules('blood', 'blood', 'required|is_numeric');
		$this->form_validation->set_rules('blood_code', 'blood code', 'required');
		$this->form_validation->set_rules('fresh_tissue', 'fresh tissue', 'required|in_list[normal,polyp,tumor]');
		$this->form_validation->set_rules('fresh_tissue_code', 'fresh tissue code', 'required');
		$this->form_validation->set_rules('ffpe', 'ffpe', 'required');
		$this->form_validation->set_rules('groups', 'groups', 'required');
		if ($this->form_validation->run() === FALSE) :
			$this->session->set_flashdata('message',message_box(validation_errors(),'danger'));
		else:
			print_data($this->input->post());
			print_data(serialize($this->input->post()));
			die();
		endif;
		$this->data['case'] = 'outpatient';
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
