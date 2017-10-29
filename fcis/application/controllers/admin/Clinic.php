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
		$this->data['page_header'] = 'ข้อมูลทางคลีนิค';
		$this->data['page_header_small'] = 'รายละเอียดข้อมูล';
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

	function add_fap($id='')
	{
		if ( ! intval($id) > 0) :
			$this->session->set_flashdata('message',message_box('no record found, check your data','danger'));
			redirect('admin/clinic');
		else:
			$this->form_validation->set_rules('patient_id','patient id','required');
			if ($this->form_validation->run() === FALSE) :
				$this->session->set_flashdata('message',message_box(validation_errors(),'danger'));
			else:
				$post = $this->input->post();
				$post['fap_extracolonic_detail'] = $this->input->post('fap_extracolonic_detail') ? serialize($post['fap_extracolonic_detail']) : '';
				// print_data($post); die();
				$this->clinic->create_clinic($post,$id);
			endif;
		endif;
		$this->data['patient'] = $this->patient->search_id($id);
		$this->data['assets'] = $this->assets->find_gallery('fap',$id);
		$this->data['clinic'] = $this->clinic->find_id($id);
		$this->data['tab'] = 'fap';
		$this->render('admin/clinic/add');
	}

	function add_hnpcc($id='')
	{
		if ( ! intval($id) > 0) :
			$this->session->set_flashdata('message',message_box('no record found, check your data','danger'));
			redirect('admin/clinic');
		else:
			$this->form_validation->set_rules('patient_id','patient id','required');
			if ($this->form_validation->run() === FALSE) :
				$this->session->set_flashdata('message',message_box(validation_errors(),'danger'));
			else:
				$post = $this->input->post();
				$post['hnpcc_clinical_detail'] = $this->input->post('hnpcc_clinical') ? $post['hnpcc_clinical_detail'] : '';
				// print_data($post); die();
				$this->clinic->create_clinic($post,$id);
			endif;
		endif;
		$this->data['patient'] = $this->patient->search_id($id);
		$this->data['assets'] = $this->assets->find_gallery('hnpcc',$id);
		$this->data['clinic'] = $this->clinic->find_id($id);
		$this->data['tab'] = 'hnpcc';
		$this->render('admin/clinic/add');
	}

	function add_pjsjps($id='')
	{
		if ( ! intval($id) > 0) :
			$this->session->set_flashdata('message',message_box('no record found, check your data','danger'));
			redirect('admin/clinic');
		else:
			$this->form_validation->set_rules('patient_id','patient id','required');
			if ($this->form_validation->run() === FALSE) :
				$this->session->set_flashdata('message',message_box(validation_errors(),'danger'));
			else:
				$post = $this->input->post();
				$post['pjsjps_type'] = $this->input->post('pjsjps_type') ? $post['pjsjps_type'] : '';
				$post['pjsjps_type_detail'] = $this->input->post('pjsjps_type') ? $post['pjsjps_type_detail'] : '';
				// print_data($post); die();
				$this->clinic->create_clinic($post,$id);
			endif;
		endif;
		$this->data['patient'] = $this->patient->search_id($id);
		$this->data['assets'] = $this->assets->find_gallery('pjsjps',$id);
		$this->data['clinic'] = $this->clinic->find_id($id);
		$this->data['tab'] = 'pjsjps';
		$this->render('admin/clinic/add');
	}

	public function upload_fap()
	{
		if ($_FILES['file']['error'] === UPLOAD_ERR_OK) :
			$upload = array(
				'allowed_types'	=> 'jpg|jpeg|png|pdf|doc|docx',
				'upload_path'	=> FCPATH.'uploads/clinic/fap',
				'file_ext_tolower' => TRUE,
				'encrypt_name' => TRUE,
				'max_size' => 1024,
				'max_width' => 1800,
				'max_height' => 1800
			);
			$this->upload->initialize($upload);
			if ($this->upload->do_upload('file')) :
				if ($this->upload->data('is_image') === '1') :
					$resize = array(
						'source_image' => $this->upload->data('full_path'),
						'width' => '400',
						'height' => '400'
					);
					$this->image_lib->initialize($resize);
					if ($this->image_lib->resize()) :
						$watermark = array(
							'source_image' => $this->upload->data('full_path'),
							'quality' => '60%',
							'wm_text' => 'COPYRIGHT '.date('Y').' - FCIS',
							'wm_font_size' => '100',
							'wm_font_color' => 'f5f5f5',
							'wm_vrt_alignment' => 'middle'
						);
						$this->image_lib->initialize($watermark);
					endif;
				endif;
				$data = array();
				foreach ($this->upload->data() as $key => $value) :
					$data[$key] = $value;
				endforeach;
				if ($this->assets->save($data)) :
					$assets_id = $this->db->insert_id();
					if ( ! $this->assets->save(array(
						'assets_id' => $assets_id,
						'patients_id' => $this->input->post('clinic_id'),
						'assets_from' => 'fap',
						'upload_date' => time(),
						'upload_by' => $this->session->user_id
					),'assets_patients')) :
						$this->session->set_flashdata('message',message_box($this->db->error(),'danger'));
					endif;
				endif;
			endif;
		endif;
		redirect($this->agent->referrer());
	}

	function upload_hnpcc()
	{
		if ($_FILES['file']['error'] === UPLOAD_ERR_OK) :
			$upload = array(
				'allowed_types'	=> 'jpg|jpeg|png|pdf|doc|docx',
				'upload_path'	=> FCPATH.'uploads/clinic/hnpcc',
				'file_ext_tolower' => TRUE,
				'encrypt_name' => TRUE,
				'max_size' => 1024,
				'max_width' => 1800,
				'max_height' => 1800
			);
			$this->upload->initialize($upload);
			if ($this->upload->do_upload('file')) :
				$resize = array(
					'source_image' => $this->upload->data('full_path'),
					'width' => '400',
					'height' => '400'
				);
				$this->image_lib->initialize($resize);
				if ($this->image_lib->resize()) :
					$watermark = array(
						'source_image' => $this->upload->data('full_path'),
						'quality' => '60%',
						'wm_text' => 'COPYRIGHT '.date('Y').' - FCIS',
						'wm_font_size' => '100',
						'wm_font_color' => 'f5f5f5',
						'wm_vrt_alignment' => 'middle'
					);
					$this->image_lib->initialize($watermark);
					if ( ! $this->image_lib->watermark()) :
						$this->session->set_flashdata('message',message_box($this->image_lib->display_errors(),'danger'));
					endif;
				else:
					$this->session->set_flashdata('message',message_box($this->image_lib->display_errors(),'danger'));
				endif;
				$data = array();
				foreach ($this->upload->data() as $key => $value) :
					$data[$key] = $value;
				endforeach;
				if ($this->assets->save($data)) :
					$assets_id = $this->db->insert_id();
					if ( ! $this->assets->save(array(
						'assets_id' => $assets_id,
						'patients_id' => $this->input->post('clinic_id'),
						'assets_from' => 'hnpcc',
						'upload_date' => time(),
						'upload_by' => $this->session->user_id
					),'assets_patients')) :
						$this->session->set_flashdata('message',message_box($this->db->error(),'danger'));
					endif;
				else:
					$this->session->set_flashdata('message',message_box($this->db->error(),'danger'));
				endif;
			endif;
		endif;
		redirect($this->agent->referrer());
	}

	function upload_pjsjps()
	{
		if ($_FILES['file']['error'] === UPLOAD_ERR_OK) :
			$upload = array(
				'allowed_types'	=> 'jpg|jpeg|png|pdf|doc|docx',
				'upload_path'	=> FCPATH.'uploads/clinic/pjsjps',
				'file_ext_tolower' => TRUE,
				'encrypt_name' => TRUE,
				'max_size' => 1024,
				'max_width' => 1800,
				'max_height' => 1800
			);
			$this->upload->initialize($upload);
			if ($this->upload->do_upload('file')) :
				$resize = array(
					'source_image' => $this->upload->data('full_path'),
					'width' => '400',
					'height' => '400'
				);
				$this->image_lib->initialize($resize);
				if ($this->image_lib->resize()) :
					$watermark = array(
						'source_image' => $this->upload->data('full_path'),
						'quality' => '60%',
						'wm_text' => 'COPYRIGHT '.date('Y').' - FCIS',
						'wm_font_size' => '100',
						'wm_font_color' => 'f5f5f5',
						'wm_vrt_alignment' => 'middle'
					);
					$this->image_lib->initialize($watermark);
					if ( ! $this->image_lib->watermark()) :
						$this->session->set_flashdata('message',message_box($this->image_lib->display_errors(),'danger'));
					endif;
				else:
					$this->session->set_flashdata('message',message_box($this->image_lib->display_errors(),'danger'));
				endif;
				$data = array();
				foreach ($this->upload->data() as $key => $value) :
					$data[$key] = $value;
				endforeach;
				if ($this->assets->save($data)) :
					$assets_id = $this->db->insert_id();
					if ( ! $this->assets->save(array(
						'assets_id' => $assets_id,
						'patients_id' => $this->input->post('clinic_id'),
						'assets_from' => 'pjsjps',
						'upload_date' => time(),
						'upload_by' => $this->session->user_id
					),'assets_patients')) :
						$this->session->set_flashdata('message',message_box($this->db->error(),'danger'));
					endif;
				else:
					$this->session->set_flashdata('message',message_box($this->db->error(),'danger'));
				endif;
			endif;
		endif;
		redirect($this->agent->referrer());
	}

	function delete_file($tab,$id='',$file='')
	{
		if (intval($id) > 0 && $file != '') :
			$path = FCPATH.'/uploads/clinic/'.$tab.'/'.$file;
			if (unlink($path)) :
				if ($this->db->where('id',$id)->delete('assets')) :
					$this->db->where('assets_id',$id)->delete('assets_patients');
					$this->session->set_flashdata('message',message_box('ลบข้อมูลไฟล์เสร็จสิ้น.','success'));
				endif;
			endif;
		endif;
		redirect($this->agent->referrer());
	}

}
