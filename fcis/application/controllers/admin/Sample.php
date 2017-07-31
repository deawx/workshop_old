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
		if ( ! intval($id) > 0) :
			$this->session->set_flashdata('message',message_box('no record found, check your data','danger'));
			redirect('admin/sample');
		else:
			$this->form_validation->set_rules('blood_ml', 'blood ml', 'is_numeric|max_length[6]');
			$this->form_validation->set_rules('blood_code', 'blood code', 'max_length[50]');
			if ($this->input->post('fresh_tissue')) :
				$this->form_validation->set_rules('fresh_tissue_group', 'fresh tissue group', 'required|in_list[normal,polyp,tumor]');
			else:
				$this->form_validation->set_rules('fresh_tissue_group', 'fresh tissue group', 'in_list[normal,polyp,tumor]');
			endif;
			$this->form_validation->set_rules('fresh_tissue_code', 'fresh tissue code', 'max_length[50]');
			$this->form_validation->set_rules('ffpe_code', 'ffpe code', 'max_length[50]');
			$this->form_validation->set_rules('fcc', 'fcc', 'required');
			$this->form_validation->set_rules('fcc_group', 'fcc group', 'required|in_list[fap,hnpcc,pjs/jps]');
			$this->form_validation->set_rules('remark', 'remark', 'max_length[255]');
			if ($this->form_validation->run() === FALSE) :
				$this->session->set_flashdata('message',message_box(validation_errors(),'danger'));
			else:
				$post = $this->input->post();
				unset($post['case']);
				$post['blood'] = $this->input->post('blood') ? $this->input->post('blood') : '0';
				if ( ! $post['blood']) :
					$post['blood_ml'] = '';
					$post['blood_code'] = '';
				endif;
				$post['fresh_tissue'] = $this->input->post('fresh_tissue') ? $this->input->post('fresh_tissue') : '0';
				if ( ! $post['fresh_tissue']) :
					$post['fresh_tissue_group'] = '';
					$post['fresh_tissue_code'] = '';
				endif;
				$post['ffpe'] = $this->input->post('ffpe') ? $this->input->post('ffpe') : '0';
				if ( ! $post['ffpe']) :
					$post['ffpe_code'] = '';
				endif;
				$post['fcc'] = $this->input->post('fcc') ? $this->input->post('fcc') : '0';
				if ( ! $post['fcc']) :
					$post['fcc_group'] = '';
				endif;
				// print_data($post); die();
				$this->sample->create_inpatient($post,$id);
			endif;
		endif;
		$this->data['patient'] = $this->patient->search_id($id);
		$this->data['sample'] = $this->sample->find_id($id);
		$this->data['id'] = $id;
		$this->data['case'] = 'inpation';
		$this->render('admin/sample/add_inpatient');
	}

	function add_outpatient($id='')
	{
		$this->form_validation->set_rules('institution', 'institution', 'required');
		$this->form_validation->set_rules('department', 'department', 'required');
		$this->form_validation->set_rules('sample_name', "sample's name", 'required');
		$this->form_validation->set_rules('blood_ml', 'blood ml', 'is_numeric|max_length[6]');
		$this->form_validation->set_rules('blood_code', 'blood code', 'max_length[50]');
		if ($this->input->post('fresh_tissue')) :
			$this->form_validation->set_rules('fresh_tissue_group', 'fresh tissue group', 'required|in_list[normal,polyp,tumor]');
		else:
			$this->form_validation->set_rules('fresh_tissue_group', 'fresh tissue group', 'in_list[normal,polyp,tumor]');
		endif;
		$this->form_validation->set_rules('fresh_tissue_code', 'fresh tissue code', 'max_length[50]');
		$this->form_validation->set_rules('ffpe_code', 'ffpe code', 'max_length[50]');
		$this->form_validation->set_rules('fcc', 'fcc', 'required');
		$this->form_validation->set_rules('fcc_group', 'fcc group', 'required|in_list[fap,hnpcc,pjs/jps]');
		$this->form_validation->set_rules('remark', 'remark', 'max_length[255]');
		if ($this->form_validation->run() === FALSE) :
			$this->session->set_flashdata('message',message_box(validation_errors(),'danger'));
		else:
			$post = $this->input->post();
			unset($post['case']);
			$post['blood'] = $this->input->post('blood') ? $this->input->post('blood') : '0';
			$post['fresh_tissue'] = $this->input->post('fresh_tissue') ? $this->input->post('fresh_tissue') : '0';
			$post['ffpe'] = $this->input->post('ffpe') ? $this->input->post('ffpe') : '0';
			$post['fcc'] = $this->input->post('fcc') ? $this->input->post('fcc') : '0';
			// print_data($post); die();
			$return_id = $this->sample->create_outpatient($post,$id);
			if ($return_id) :
				$this->add_outpatient($return_id);
			endif;
		endif;
		$this->data['id'] = $id;
		$this->data['case'] = 'outpatient';
		$this->data['sample'] = $this->sample->find_id($id);
		$this->render('admin/sample/add_outpatient');
	}

	function lists()
	{
		$view = $this->input->get('view') ? $this->input->get('view') : 'fap';
		$this->data['view'] = $view;
		if ($view === 'pjsjps') :
			$view = 'pjs/jps';
		endif;
		$samples = $this->sample->find_list($view);
		$this->data['samples'] = $samples;
		$this->render('admin/sample/list');
	}

}
