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
			$this->form_validation->set_rules('apc_exon','APC exon','required|is_numeric');
			$this->form_validation->set_rules('apc_intron','APC intron','required|is_numeric');
			$this->form_validation->set_rules('apc_codon','APC codon','required|max_length[100]');
			$this->form_validation->set_rules('apc_amino_acid','APC amino acid','required|max_length[100]');
			$this->form_validation->set_rules('apc_type_mutation','APC type of mutation','required|max_length[100]');
			$this->form_validation->set_rules('apc_effect_mutation','APC effect of mutation','required|max_length[100]');
			$this->form_validation->set_rules('mutyh_exon','MUTYH exon','required|is_numeric');
			$this->form_validation->set_rules('mutyh_intron','MUTYH intron','required|is_numeric');
			$this->form_validation->set_rules('mutyh_codon','MUTYH codon','required|max_length[100]');
			$this->form_validation->set_rules('mutyh_amino_acid','MUTYH amino acid','required|max_length[100]');
			$this->form_validation->set_rules('mutyh_type_mutation','MUTYH type of mutation','required|max_length[100]');
			$this->form_validation->set_rules('mutyh_effect_mutation','MUTYH effect of mutation','required|max_length[100]');
			// $this->form_validation->set_rules('negative','negative','required|in_list[none,negative]');
			if ($this->form_validation->run() === FALSE) :
				$this->session->set_flashdata('message',message_box(validation_errors(),'danger'));
			else:
				$post = $this->input->post();
				$post['negative'] = $this->input->post('negative') ? $post['negative'] : '';
				// print_data($post); die();
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
			if ($this->form_validation->run() === FALSE) :
				$this->session->set_flashdata('message',message_box(validation_errors(),'danger'));
			else:
				$post = $this->input->post();
				if ($post['msi_s'] !== 'D17S250') :
					unset($post['methylation']);
				elseif ($post['gene'] !== 'mutation') :
					// unset($post['']);
				endif;
				print_data($post); die();
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
			$patient = $this->patient->search_id($id);
			$labs = $this->labs->search_id($id);
			$assets = $this->assets->find_gallery('pjsjps',$id);
			$this->form_validation->set_rules('','','required');
			if ($this->form_validation->run() === FALSE) :
				$this->session->set_flashdata('message',message_box(validation_errors(),'danger'));
			else:
				print_data($this->input->post()); die();
			endif;
		endif;
		$this->data['assets'] = $assets;
		$this->data['patient'] = $patient;
		$this->data['labs'] = $labs;
		$this->data['tab'] = 'pjsjps';
		$this->render('admin/labs/add');
	}

	function upload_endoscope()
	{
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
								'labs_tab' => 'endoscope',
								'labs_id' => $this->input->post('lab_id')
							),'assets_labs');
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
							'wm_font_size' => '100'
						);
						$this->image_lib->initialize($watermark);
						if ( ! $this->image_lib->watermark()) :
							$this->session->set_flashdata('message',message_box($this->image_lib->display_errors(),'danger'));
						endif;
					else:
						$this->session->set_flashdata('message',message_box($this->image_lib->display_errors(),'danger'));
					endif;
				endif;
				if ($this->assets->save(array(
						'file_name' => $this->upload->data('file_name'),
						'file_type' => $this->upload->data('file_type'),
						'file_path' => $this->upload->data('file_path'),
						'full_path' => $this->upload->data('full_path'),
						'raw_name' => $this->upload->data('raw_name'),
						'orig_name' => $this->upload->data('orig_name'),
						'client_name' => $this->upload->data('client_name'),
						'file_ext' => $this->upload->data('file_ext'),
						'file_size' => $this->upload->data('file_size'),
						'is_image' => $this->upload->data('is_image'),
						'image_width' => $this->upload->data('image_width'),
						'image_height' => $this->upload->data('image_height'),
						'image_type' => $this->upload->data('image_type'),
						'image_size_str' => $this->upload->data('image_size_str'),
						'upload_date' => time(),
						'upload_by' => $this->session->user_id
					))) :
					$assets_id = $this->db->insert_id();
					$this->assets->save(array(
						'assets_id' => $assets_id,
						'labs_tab' => 'fap',
						'labs_id' => $this->input->post('lab_id')
					),'assets_labs');
				else:
					$this->session->set_flashdata('message',message_box($this->db->error(),'danger'));
				endif;
			else:
				$this->session->set_flashdata('message',message_box($this->upload->display_errors(),'danger'));
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
