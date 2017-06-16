<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patients extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->allow_group_access(array('special','admin'));
		$this->load->model('Patient_model','patient');
		$this->data['page_header'] = 'Patient';
		$this->data['page_header_small'] = 'details';
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
		if ($this->form_validation->run() === TRUE) :
			$post['created'] = time();
			$post['user_id'] = $this->session->user_id;
			$this->_upload(isset($patient['id_card']) ? $patient['id_card'] : $this->input->post('id_card'));
			if ($this->patient->save($post)) :
				$this->session->set_flashdata('message',message_box('patient has been saved','success'));
			else:
				$this->session->set_flashdata('message',message_box('save failed, check your data','danger'));
			endif;
			redirect($this->agent->referrer());
		else:
			$this->session->set_flashdata('message',message_box(validation_errors(),'danger'));
		endif;

		$this->render('admin/patient/add');
	}

	function edit($id=NULL)
	{
		$post = $this->input->post();
		$this->data['patient'] = $this->patient->search_id($id);

		if ($this->input->post('old_id_card') !== '' && $this->input->post('old_id_card') !== $this->input->post('id_card')) :
			$this->form_validation->set_rules('id_card', 'personal id', 'required|is_numeric|exact_length[13]|is_unique[patients.id_card]');
			$path = APPPATH.'../uploads/';
			$filenames = get_filenames($path);
			$old_file = $this->input->post('old_id_card').'.jpg';
			$new_file = $this->input->post('id_card').'.jpg';
			if (array_search($old_file,$filenames)) :
				rename($path.$old_file,$path.$new_file);
			endif;
		endif;

		$this->form_validation->set_rules('types', 'types', 'required|in_list[คนไข้ออกหน่วย,กลุ่ม CRC of PSU,คนไข้ CRC ส่งต่อ]');
		$this->form_validation->set_rules('groups', 'groups', 'required|in_list[FAP,HNPCC,PJS/JPS]');
		$this->form_validation->set_rules('title', 'title', 'required|in_list[นาย,นาง,นางสาว]');
		$this->form_validation->set_rules('firstname', 'firstname', 'required|max_length[100]');
		$this->form_validation->set_rules('lastname', 'lastname', 'required|max_length[150]');
		if ($this->form_validation->run() === TRUE) :
			$post['updated'] = time();
			$post['user_id'] = $this->session->user_id;
			$this->_upload(isset($patient['id_card']) ? $patient['id_card'] : $this->input->post('id_card'));
			if ($this->patient->save($post)) :
				$this->session->set_flashdata('message',message_box('patient has been saved','success'));
			else:
				$this->session->set_flashdata('message',message_box('save failed, check your data','warning'));
			endif;
		else:
			$this->session->set_flashdata('message',message_box(validation_errors(),'danger'));
		endif;

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

		$file = realpath(APPPATH.'../uploads/'.$id.'.jpg');
		if (unlink($file)) :
			$this->session->set_flashdata('message',message_box('file has been deleted','success'));
		else:
			$this->session->set_flashdata('message',message_box('delete failed, check your data','danger'));
		endif;

		redirect($this->agent->referrer());
	}

	private function _upload($file_name=NULL)
	{
		$this->load->library('upload');
		$this->load->library('image_lib');
		if ($_FILES['file']['error'] !== '4' && $file_name !== NULL) :
      $upload = array(
        'allowed_types'	=> 'jpeg|jpg|png|bmp',
        'upload_path'	=> realpath(APPPATH.'../uploads'),
        'file_name'		=> $file_name.'.jpg',
        'file_ext_tolower' => TRUE,
        'overwrite' => TRUE
      );
      $this->upload->initialize($upload);
      if ($this->upload->do_upload('file')) :
        $resize = array(
          'image_library' => 'gd2',
          'source_image' => $this->upload->data('full_path'),
          'maintain_ratio' => FALSE,
          'width' => '300',
          'height' => '300'
        );
        $this->image_lib->initialize($resize);
        $this->image_lib->resize();
			else :
				$this->session->set_flashdata('message',message_box($this->image_lib->display_errors(),'warning'));
				return $file_name;
      endif;
		else :
			$this->session->set_flashdata('message',message_box($this->upload->display_errors(),'warning'));
			return $file_name;
    endif;
		return NULL;
	}

}
