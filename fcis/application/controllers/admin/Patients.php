<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patients extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->allow_group_access(array('special','admin'));
		$this->load->model('Patient_model','patient');
		$this->data['page_header_small'] = 'patient details';
		$this->data['parent_menu'] = 'patient';
	}

	public function index()
	{
		$this->form_validation->set_rules('id_card', 'personal id', 'required|is_numeric|exact_length[13]|is_unique[patients.id_card]');
		$this->form_validation->set_rules('types', 'types', 'required|in_list[คนไข้ออกหน่วย,กลุ่ม CRC of PSU,คนไข้ CRC ส่งต่อ]');
		$this->form_validation->set_rules('groups', 'groups', 'required|in_list[FAP,HNPCC,PJS/JPS]');
		$this->form_validation->set_rules('title', 'title', 'required|in_list[นาย,นาง,นางสาว]');
		$this->form_validation->set_rules('firstname', 'firstname', 'required|max_length[100]');
		$this->form_validation->set_rules('lastname', 'lastname', 'required|max_length[150]');
		$this->form_validation->set_rules('age', 'age', 'is_numeric|max_length[3]');
		$this->form_validation->set_rules('hn', 'hn', 'alpha_numeric|max_length[8]');
		$this->form_validation->set_rules('zipcode', 'zipcode', 'is_numeric|max_length[7]');
		$this->form_validation->set_rules('telephone', 'telephone', 'is_numeric|max_length[10]');
		$this->form_validation->set_rules('mobile', 'mobile', 'is_numeric|max_length[10]');
		if ($this->form_validation->run() === TRUE) :
			$post = $this->input->post();
			$post['created'] = time();
			$post['user_id'] = $this->session->user_id;
			$post['address'] = serialize(array(
				$this->input->post('address_number'),
				$this->input->post('address_soi'),
				$this->input->post('address_street'),
				$this->input->post('address_moo'),
				$this->input->post('address_tambon'),
				$this->input->post('address_amphur'),
				$this->input->post('address_province'),
				$this->input->post('address_zipcode')
			));
			print_data($post); die();
			// $this->_upload(isset($patient['id_card']) ? $patient['id_card'] : $this->input->post('id_card'));
			// if ($this->patient->save($post)) :
			// 	$this->session->set_flashdata('message',message_box('patient has been saved','success'));
			// else:
			// 	$this->session->set_flashdata('message',message_box('save failed, check your data','danger'));
			// endif;
			// redirect($this->agent->referrer());
		else:
			$this->session->set_flashdata('message',message_box(validation_errors(),'danger'));
		endif;

		$this->data['page_header'] = 'Add New';
		$this->render('admin/patient/add');
	}

	function edit($id=NULL)
	{
		if ( ! intval($id) > 0)
			redirect('admin/search');

		$post = $this->input->post();
		$this->data['patient'] = $this->patient->search_id($id);

		if ($this->input->post('old_id_card') !== '' && $this->input->post('old_id_card') !== $this->input->post('id_card'))
			$this->form_validation->set_rules('id_card', 'personal id', 'required|is_numeric|exact_length[13]|is_unique[patients.id_card]');

		$this->form_validation->set_rules('types', 'types', 'required|in_list[คนไข้ออกหน่วย,กลุ่ม CRC of PSU,คนไข้ CRC ส่งต่อ]');
		$this->form_validation->set_rules('groups', 'groups', 'required|in_list[FAP,HNPCC,PJS/JPS]');
		$this->form_validation->set_rules('title', 'title', 'required|in_list[นาย,นาง,นางสาว]');
		$this->form_validation->set_rules('firstname', 'firstname', 'required|max_length[100]');
		$this->form_validation->set_rules('lastname', 'lastname', 'required|max_length[150]');
		if ($this->form_validation->run() === TRUE) :
			$post['updated'] = time();
			$post['user_id'] = $this->session->user_id;
			if ($this->patient->save($post)) :
				$this->session->set_flashdata('message',message_box('patient has been saved','success'));
			else:
				$this->session->set_flashdata('message',message_box('save failed, check your data','warning'));
			endif;
		else:
			$this->session->set_flashdata('message',message_box(validation_errors(),'danger'));
		endif;

		$this->data['page_header'] = 'Edit';
		$this->data['assets_patients'] = $this->patient->find_gallery($id);
		$this->render('admin/patient/edit');
	}

	function delete($id=NULL)
	{
		if ($this->patient->remove($id)) :
			$this->session->set_flashdata('message',message_box('patient has been deleted','success'));
		else :
			$this->session->set_flashdata('message',message_box('delete failed, check your data','danger'));
		endif;
		redirect($this->agent->referrer());
	}

	function delete_file($id=NULL)
	{
		if ($id === '')
			return FALSE;

		$file = FCPATH.'uploads/patients';
		if (unlink($file)) :
			$this->session->set_flashdata('message',message_box('file has been deleted','success'));
		else:
			$this->session->set_flashdata('message',message_box('delete failed, check your data','danger'));
		endif;

		redirect($this->agent->referrer());
	}

	function upload()
	{
		$this->load->library('upload');
		$this->load->library('image_lib');
		if ($_FILES['file']['error'] === UPLOAD_ERR_OK) :
      $upload = array(
        'allowed_types'	=> 'jpeg|jpg|png',
        'upload_path'	=> FCPATH.'uploads/patients',
				'encrypt_name' => TRUE,
        'file_ext_tolower' => TRUE,
				'max_size' => 1024
      );
      $this->upload->initialize($upload);
      if ($this->upload->do_upload('file')) :
        $resize = array(
          'source_image' => $this->upload->data('full_path'),
          'width' => '300',
          'height' => '300'
        );
        $this->image_lib->initialize($resize);
        if ($this->image_lib->resize()) :
					if ($this->patient->save(array(
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
					),'assets')) :
						$assets_id = $this->db->insert_id();
						$this->patient->save(array(
							'assets_id' => $assets_id,
							'patients_id' => $this->input->post('patient_id')
						),'assets_patients');
					endif;
				else :
					$this->output
						->set_content_type('application/json')
						->set_output(json_encode($this->image_lib->display_errors()));
				endif;
			else :
				$this->output
					->set_content_type('application/json')
					->set_output(json_encode($this->upload->display_errors()));
      endif;
    endif;
	}

}
