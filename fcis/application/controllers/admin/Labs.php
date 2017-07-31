<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Labs extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->allow_group_access(array('special','admin'));
		$this->load->library('upload');
		$this->load->library('image_lib');
		$this->load->model('Labs_model', 'labs');
		$this->load->model('Patient_model','patient');
		$this->load->model('Assets_model','assets');
		$this->load->helper('number');
		$this->data['page_header'] = 'Labs';
		$this->data['page_header_small'] = 'details';
		$this->data['parent_menu'] = 'labs';
	}

	function index()
	{
		$q = $this->input->get('q');
		$results = array();
		if ($q)
			$results = $this->patient->find_by_all($q);

		$this->data['results'] = $results;
		$this->render('admin/labs/index');
	}

	function add_endoscope($id=null)
	{
		if ( ! intval($id) > 0) :
			$this->session->set_flashdata('message',message_box('no record found, check your data','danger'));
			redirect('admin/labs');
		else:
			$this->form_validation->set_rules('endoscope','endoscope result','required|in_list[normal,polyp,tumor]');
			if ($this->form_validation->run() === FALSE) :
				$this->session->set_flashdata('message',message_box(validation_errors(),'danger'));
			else:
				$post = $this->input->post();
				// print_data($post); die();
				$this->labs->create_labs($post,$id);
			endif;
		endif;
		$this->data['patient'] = $this->patient->search_id($id);
		$this->data['labs'] = $this->labs->find_id($id);
		$this->data['assets'] = $this->assets->find_gallery('endoscope',$id);
		$this->data['tab'] = 'endoscope';
		$this->render('admin/labs/add');
	}

	function add_fap($id=null)
	{
		if ( ! intval($id) > 0) :
			$this->session->set_flashdata('message',message_box('no record found, check your data','danger'));
			redirect('admin/labs');
		else:
			$this->form_validation->set_rules('patient_id','patient id','required');
			$this->form_validation->set_rules('apc_exon','APC exon','is_numeric|max_length[3]');
			$this->form_validation->set_rules('apc_intron','APC intron','is_numeric|max_length[3]');
			$this->form_validation->set_rules('apc_codon','APC codon','max_length[100]');
			$this->form_validation->set_rules('apc_amino_acid','APC amino acid','max_length[100]');
			$this->form_validation->set_rules('apc_type_mutation','APC type of mutation','max_length[100]');
			$this->form_validation->set_rules('apc_effect_mutation','APC effect of mutation','max_length[100]');
			$this->form_validation->set_rules('mutyh_exon','MUTYH exon','is_numeric|max_length[3]');
			$this->form_validation->set_rules('mutyh_intron','MUTYH intron','is_numeric|max_length[3]');
			$this->form_validation->set_rules('mutyh_codon','MUTYH codon','max_length[100]');
			$this->form_validation->set_rules('mutyh_amino_acid','MUTYH amino acid','max_length[100]');
			$this->form_validation->set_rules('mutyh_type_mutation','MUTYH type of mutation','max_length[100]');
			$this->form_validation->set_rules('mutyh_effect_mutation','MUTYH effect of mutation','max_length[100]');
			if ($this->form_validation->run() === FALSE) :
				$this->session->set_flashdata('message',message_box(validation_errors(),'danger'));
			else:
				$post = $this->input->post();
				$post['negative'] = $this->input->post('negative') ? $post['negative'] : '';
				print_data($post); die();
				$this->labs->create_labs($post,$id);
			endif;
		endif;
		$this->data['patient'] = $this->patient->search_id($id);
		$this->data['assets'] = $this->assets->find_gallery('fap',$id);
		$this->data['labs'] = $this->labs->find_id($id);
		$this->data['apc_type_mutation'] = $this->labs->find_type('apc_type_mutation');
		$this->data['mutyh_type_mutation'] = $this->labs->find_type('mutyh_type_mutation');
		$this->data['tab'] = 'fap';
		$this->render('admin/labs/add');
	}

	function add_hnpcc($id=null)
	{
		if ( ! intval($id) > 0) :
			$this->session->set_flashdata('message',message_box('no record found, check your data','danger'));
			redirect('admin/labs');
		else:
			$this->form_validation->set_rules('patient_id','patient id','required');
			// $this->form_validation->set_rules('msi_h','H','');
			// $this->form_validation->set_rules('msi_l','L','');
			// $this->form_validation->set_rules('msi_s','S','');
			$this->form_validation->set_rules('methylation','MLH1 methylation','in_list[positive,negative]');
			// $this->form_validation->set_rules('ihc','ihc','');
			$this->form_validation->set_rules('germline','germline','max_length[15]');
			$this->form_validation->set_rules('germline_exon','germline exon','is_numeric|max_length[3]');
			$this->form_validation->set_rules('germline_intron','germline intron','is_numeric|max_length[3]');
			$this->form_validation->set_rules('germline_codon','germline codon','max_length[100]');
			$this->form_validation->set_rules('germline_amino_acid','germline amino acid','max_length[100]');
			$this->form_validation->set_rules('germline_type_mutation','germline type of mutation','max_length[100]');
			$this->form_validation->set_rules('germline_effect_mutation','germline effect of mutation','max_length[100]');
			$this->form_validation->set_rules('somatic','somatic','max_length[15]');
			$this->form_validation->set_rules('somatic_exon','somatic exon','is_numeric|max_length[3]');
			$this->form_validation->set_rules('somatic_intron','somatic intron','is_numeric|max_length[3]');
			$this->form_validation->set_rules('somatic_codon','somatic codon','max_length[100]');
			$this->form_validation->set_rules('somatic_amino_acid','somatic amino acid','max_length[100]');
			$this->form_validation->set_rules('somatic_type_mutation','somatic type of mutation','max_length[100]');
			$this->form_validation->set_rules('somatic_effect_mutation','somatic effect of mutation','max_length[100]');
			if ($this->form_validation->run() === FALSE) :
				$this->session->set_flashdata('message',message_box(validation_errors(),'danger'));
			else:
				$post = $this->input->post();
				$post['msi_h'] = $this->input->post('msi_h') ? $this->input->post('msi_h') : '';
				$post['msi_l'] = $this->input->post('msi_l') ? $this->input->post('msi_l') : '';
				$post['msi_s'] = $this->input->post('msi_s') ? $this->input->post('msi_s') : '';
				$post['msi_methylation'] = ($post['msi_s'] === 'D17S250') ? $this->input->post('methylation') : '';
				$post['gene'] = $this->input->post('gene') ? $this->input->post('gene') : '';
				if ( ! $post['gene']) :
					$post['germline'] = '';
					$post['germline_exon'] = '';
					$post['germline_intron'] = '';
					$post['germline_codon'] = '';
					$post['germline_amino_acid'] = '';
					$post['germline_type_mutation'] = '';
					$post['germline_effect_mutation'] = '';
					$post['somatic'] = '';
					$post['somatic_exon'] = '';
					$post['somatic_intron'] = '';
					$post['somatic_codon'] = '';
					$post['somatic_amino_acid'] = '';
					$post['somatic_type_mutation'] = '';
					$post['somatic_effect_mutation'] = '';
				endif;
				// print_data($post); die();
				$this->labs->create_labs($post,$id);
			endif;
		endif;
		$this->data['patient'] = $this->patient->search_id($id);
		$this->data['assets'] = $this->assets->find_gallery('hnpcc',$id);
		$this->data['labs'] = $this->labs->find_id($id);
		$this->data['germline_type_mutation'] = $this->labs->find_type('germline_type_mutation');
		$this->data['somatic_type_mutation'] = $this->labs->find_type('somatic_type_mutation');
		$this->data['tab'] = 'hnpcc';
		$this->render('admin/labs/add');
	}

	function add_pjsjps($id=null)
	{
		if ( ! intval($id) > 0) :
			$this->session->set_flashdata('message',message_box('no record found, check your data','danger'));
			redirect('admin/labs');
		else:
			$this->form_validation->set_rules('patient_id','patient id','required');
			$this->form_validation->set_rules('test','test','required');
			$this->form_validation->set_rules('stk11_exon','somatic exon','is_numeric|max_length[3]');
			$this->form_validation->set_rules('stk11_intron','somatic intron','is_numeric|max_length[3]');
			$this->form_validation->set_rules('stk11_codon','somatic codon','max_length[100]');
			$this->form_validation->set_rules('stk11_amino_acid','somatic amino acid','max_length[100]');
			$this->form_validation->set_rules('stk11_type_mutation','somatic type of mutation','max_length[100]');
			$this->form_validation->set_rules('stk11_effect_mutation','somatic effect of mutation','max_length[100]');
			if ($this->form_validation->run() === FALSE) :
				$this->session->set_flashdata('message',message_box(validation_errors(),'danger'));
			else:
				$post = $this->input->post();
				// print_data($post); die();
				$this->labs->create_labs($post,$id);
			endif;
		endif;
		$this->data['patient'] = $this->patient->search_id($id);
		$this->data['assets'] = $this->assets->find_gallery('hnpcc',$id);
		$this->data['labs'] = $this->labs->find_id($id);
		$this->data['stk11_type_mutation'] = $this->labs->find_type('stk11_type_mutation');
		$this->data['tab'] = 'pjsjps';
		$this->render('admin/labs/add');
	}

	function upload_endoscope()
	{
		// print_data($_FILES);
		// print_data($_POST);
		if ($_FILES['file']['error'] === UPLOAD_ERR_OK) :
			$upload = array(
				'allowed_types'	=> 'jpg|jpeg|png',
				'upload_path'	=> FCPATH.'uploads/labs/endoscope',
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
					'width' => '600',
					'height' => '600'
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
					if ($this->image_lib->watermark()) :
						$data = array();
						foreach ($this->upload->data() as $key => $value) :
							$data[$key] = $value;
						endforeach;
						$data['upload_date'] = time();
						$data['upload_by'] = $this->session->user_id;
						if ($this->assets->save($data)) :
							$assets_id = $this->db->insert_id();
							$this->assets->save(array(
								'assets_id' => $assets_id,
								'patients_id' => $this->input->post('labs_id'),
								'assets_from' => 'endoscope'
							),'assets_patients');
						else:
							$this->session->set_flashdata('message',message_box($this->db->error(),'danger'));
						endif;
					else:
						$this->session->set_flashdata('message',message_box($this->image_lib->display_errors(),'danger'));
					endif;
				else:
					$this->session->set_flashdata('message',message_box($this->image_lib->display_errors(),'danger'));
				endif;
			else:
				$this->session->set_flashdata('message',message_box($this->upload->display_errors(),'danger'));
			endif;
		endif;
		redirect($this->agent->referrer());
	}

	function upload_fap()
	{
		if ($_FILES['file']['error'] === UPLOAD_ERR_OK) :
			$upload = array(
				'allowed_types'	=> 'jpg|jpeg|png|pdf|doc|docx',
				'upload_path'	=> FCPATH.'uploads/labs/fap',
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
						if ( ! $this->image_lib->watermark()) :
							$this->session->set_flashdata('message',message_box($this->image_lib->display_errors(),'danger'));
						endif;
					else:
						$this->session->set_flashdata('message',message_box($this->image_lib->display_errors(),'danger'));
					endif;
				endif;
				$data = array();
				foreach ($this->upload->data() as $key => $value) :
					$data[$key] = $value;
				endforeach;
				$data['upload_date'] = time();
				$data['upload_by'] = $this->session->user_id;
				if ($this->assets->save($data)) :
					$assets_id = $this->db->insert_id();
					if ( ! $this->assets->save(array(
						'assets_id' => $assets_id,
						'patients_id' => $this->input->post('labs_id'),
						'assets_from' => 'fap'
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

	function upload_hnpcc()
	{
		if ($_FILES['file']['error'] === UPLOAD_ERR_OK) :
			$upload = array(
				'allowed_types'	=> 'jpg|jpeg|png|pdf|doc|docx',
				'upload_path'	=> FCPATH.'uploads/labs/hnpcc',
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
				$data['upload_date'] = time();
				$data['upload_by'] = $this->session->user_id;
				if ($this->assets->save($data)) :
					$assets_id = $this->db->insert_id();
					if ( ! $this->assets->save(array(
						'assets_id' => $assets_id,
						'patients_id' => $this->input->post('labs_id'),
						'assets_from' => 'hnpcc'
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
				'upload_path'	=> FCPATH.'uploads/labs/pjsjps',
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
				$data['upload_date'] = time();
				$data['upload_by'] = $this->session->user_id;
				if ($this->assets->save($data)) :
					$assets_id = $this->db->insert_id();
					if ( ! $this->assets->save(array(
						'assets_id' => $assets_id,
						'patients_id' => $this->input->post('labs_id'),
						'assets_from' => 'pjsjps'
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

	function delete_file($tab=null,$id=null,$file=null)
	{
		if (intval($id) > 0 && count($file) > 0 && in_array($tab,array('endoscope','fap','hnpcc','pjsjps'))) :
			$path = FCPATH.'/uploads/labs/'.$tab.'/'.$file;
			if (unlink($path)) :
				if ($this->assets->delete($id)) :
					$this->session->set_flashdata('message',message_box('file has been deleted.','success'));
				else:
					$this->session->set_flashdata('message',message_box($this->db->error(),'danger'));
				endif;
			else:
				$this->session->set_flashdata('message',message_box('delete failed.','danger'));
			endif;
		endif;
		redirect($this->agent->referrer());
	}

}
