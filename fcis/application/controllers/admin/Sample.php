<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sample extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->allow_group_access(array('special','admin'));
		$this->load->model('Sample_model', 'sample');
		$this->load->model('Patient_model','patient');
		$this->data['page_header'] = 'ข้อมูลการส่งตรวจตัวอย่าง';
		$this->data['page_header_small'] = 'รายละเอียดข้อมูล';
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
			redirect('admin/sample');
		else:
			$this->form_validation->set_rules('blood_ml', 'blood ml', 'is_numeric|max_length[6]');
			$this->form_validation->set_rules('blood_code', 'blood code', 'max_length[50]');
			$this->form_validation->set_rules('fresh_tissue_code', 'fresh tissue code', 'max_length[50]');
			$this->form_validation->set_rules('ffpe_code', 'ffpe code', 'max_length[50]');
			$this->form_validation->set_rules('fcc_group', 'ffpe group', 'required');
			$this->form_validation->set_rules('remark', 'remark', 'max_length[255]');
			if ($this->form_validation->run() === FALSE) :
				$this->session->set_flashdata('message',message_box(validation_errors(),'danger'));
			else:
				$post = $this->input->post();
				$post['blood'] = $this->input->post('blood') ? $this->input->post('blood') : NULL;
				if ( ! $post['blood']) :
					$post['blood_ml'] = '';
					$post['blood_code'] = '';
				endif;
				$post['fresh_tissue'] = $this->input->post('fresh_tissue') ? $this->input->post('fresh_tissue') : NULL;
				if ( ! $post['fresh_tissue']) :
					$post['fresh_tissue_group'] = '';
					$post['fresh_tissue_code'] = '';
				endif;
				$post['ffpe'] = $this->input->post('ffpe') ? $this->input->post('ffpe') : NULL;
				if ( ! $post['ffpe']) :
					$post['ffpe_code'] = '';
				endif;
				$post['fcc'] = $this->input->post('fcc') ? $this->input->post('fcc') : NULL;
				if ( ! $post['fcc']) :
					$post['fcc_group'] = '';
				endif;
				// print_data($post); die();
				if ($this->sample->create_inpatient($post,$id)) :
					$this->db->insert('users_logs',array(
						'user_id'=>$this->session->user_id,
						'timestamp'=>time(),
						'message'=>'เพิ่มข้อมูลการส่งตรวจตัวอย่างเสร็จสิ้น',
						'type'=>'sample',
					));
					$this->session->set_flashdata('message',message_box('บันทึกข้อมูลเสร็จสิ้น','success'));
				endif;
				redirect('admin/sample/lists');
			endif;
		endif;
		$this->data['sample'] = $this->sample->search_id($id);
		$this->data['patient'] = $this->patient->search_id($this->data['sample']['patient_id']);
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
		$this->form_validation->set_rules('fresh_tissue_code', 'fresh tissue code', 'max_length[50]');
		$this->form_validation->set_rules('ffpe_code', 'ffpe code', 'max_length[50]');
		$this->form_validation->set_rules('fcc_group', 'fcc group', 'required');
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
			if ($this->sample->create_outpatient($post,$id)) :
				$this->db->insert('users_logs',array(
					'user_id'=>$this->session->user_id,
					'timestamp'=>time(),
					'message'=>'เพิ่มข้อมูลการส่งตรวจตัวอย่างเสร็จสิ้น',
					'type'=>'sample',
				));
				$this->session->set_flashdata('message',message_box('บันทึกข้อมูลเสร็จสิ้น','success'));
			endif;
			redirect('admin/sample/lists');
		endif;
		$this->data['id'] = $id;
		$this->data['case'] = 'outpatient';
		$this->data['sample'] = $this->sample->search_id($id);
		$this->render('admin/sample/add_outpatient');
	}

	function lists()
	{
		$view = $this->input->get('view') ? $this->input->get('view') : 'fap';
		$this->data['view'] = $view;
		if ($view === 'pjsjps')
			$view = 'pjs/jps';

		$samples = $this->sample->find_list($view);
		$this->data['samples'] = $samples;
		$this->render('admin/sample/list');
	}

}
