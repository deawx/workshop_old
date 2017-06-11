<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patients extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->allow_group_access(array('special','admin'));
		$this->load->model('Patient_model','patient');
		$this->data['parent_menu'] = 'patient';
	}

	public function index()
	{
		$this->render('admin/patient/index');
	}

	function add()
	{
		$this->form_validation->set_rules('id_card', 'personal id', 'required|is_numeric|exact_length[13]|is_unique[patients.id_card]');
		$this->form_validation->set_rules('title', 'title', 'required|in_list[นาย,นาง,นางสาว]');
		$this->form_validation->set_rules('firstname', 'firstname', 'required|max_length[100]');
		$this->form_validation->set_rules('lastname', 'lastname', 'required|max_length[150]');
		if ($this->form_validation->run() === TRUE) :
			$post = $this->input->post();
			$post['file'] = $this->_upload();
			if ($this->patient->save($post)) :
				$this->session->set_flashdata('message',message_box('Patient has been saved','success'));
			else :
				$this->session->set_flashdata('message',message_box('save failed, check your data','danger'));
			endif;
			$this->session->set_flashdata('message',message_box(validation_errors(),'danger'));
		endif;

		$this->render('admin/patient/add');
	}

	function _upload()
	{
		$this->load->library('upload');
		$this->load->library('image_lib');
		if ($_FILES['file']['error'] !== '4') :
      $upload = array(
        'allowed_types'	=> 'jpeg|jpg|png|bmp',
        'upload_path'	=> realpath(APPPATH.'../uploads'),
        'file_name'		=> $this->input->post('id_card').'.jpg',
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
				$this->session->set_flashdata('message',message_box($this->image_lib->display_errors(),'danger'));
      endif;
		else :
			$this->session->set_flashdata('message',message_box($this->upload->display_errors(),'danger'));
    endif;

		return $this->upload->data('file_path');
	}

}
