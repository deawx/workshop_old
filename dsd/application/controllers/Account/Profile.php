<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends Private_Controller {

	private $id;

	public function __construct()
	{
		parent::__construct();
    $this->load->model('Profile_model','profile');
		$this->load->model('Assets_model','assets');
    $this->load->model('Ion_auth_model','auth');
		$this->id = $this->session->user_id;
    $this->data['parent'] = 'account';
    $this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
		$this->data['user'] = $this->auth->user($this->id)->row_array();
		$this->data['profile'] = $this->profile->get_id($this->id);
	}

  public function index()
  {
    //ตรวจสอบความถูกต้องจากฟอร์มที่ถูกส่งมา
    $this->form_validation->set_rules('title','คำนำหน้าชื่อ','required');
    $this->form_validation->set_rules('firstname','ชื่อ','required|max_length[100]');
    $this->form_validation->set_rules('lastname','นามสกุล','required|max_length[100]');
		$this->form_validation->set_rules('nationality','สัญชาติ','required|max_length[100]');
    $this->form_validation->set_rules('religion','ศาสนา','required|max_length[100]');
    $this->form_validation->set_rules('id_card','หมายเลขบัตรประชาชน','required|is_numeric|exact_length[13]');
    $this->form_validation->set_rules('d','วันเกิด','required|is_numeric');
    $this->form_validation->set_rules('m','เดือนเกิด','required|is_numeric');
    $this->form_validation->set_rules('y','ปีเกิด','required|is_numeric');

		if ($this->form_validation->run() == FALSE) :
			$this->session->set_flashdata('warning',validation_errors());
		else:
			$d = $this->input->post('d');
			$m = $this->input->post('m');
			$y = $this->input->post('y')-543;
			$birthdate = strtotime($y.'-'.$m.'-'.$d);
			$data = array(
				'id' => $this->input->post('profile_id'),
				'user_id' => $this->id,
				'title' => $this->input->post('title'),
				'firstname' => $this->input->post('firstname'),
				'lastname' => $this->input->post('lastname'),
				'nationality' => $this->input->post('nationality'),
				'religion' => $this->input->post('religion'),
				'id_card' => $this->input->post('id_card'),
				'birthdate' => $birthdate
			);
			if ($this->profile->save($data)) :
				$this->session->set_flashdata('warning',validation_errors());
				redirect('account/profile');
			endif;
		endif;

    $this->data['menu'] = 'profile';
    $this->data['leftbar'] = $this->load->view('_partials/leftbar',$this->data,TRUE);
		$this->data['body'] = $this->load->view('profile/profile',$this->data,TRUE);
		$this->load->view('_layouts/leftside',$this->data);
  }

  function address()
  {
		$this->form_validation->set_rules('address[zip]','','is_numeric|max_length[5]');
		$this->form_validation->set_rules('address_current[zip]','','is_numeric|max_length[5]');

		if ($this->form_validation->run() == FALSE) :
			$this->session->set_flashdata('warning',validation_errors());
		else:
			$data = array(
				'id' => $this->input->post('profile_id'),
				'user_id' => $this->id,
				'address' => serialize($this->input->post('address[]')),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'fax' => $this->input->post('fax')
			);
			if ($this->input->post('exist')) :
				$data['address_current'] = serialize($this->input->post('address_current[]'));
			endif;
			if ($this->profile->save($data)) :
				$this->session->set_flashdata('warning',validation_errors());
				redirect('account/profile/address');
			endif;
		endif;

    $this->data['menu'] = 'address';
    $this->data['leftbar'] = $this->load->view('_partials/leftbar',$this->data,TRUE);
    $this->data['body'] = $this->load->view('profile/address',NULL,TRUE);
    $this->load->view('_layouts/leftside',$this->data);
  }

  function edit()
  {
		$this->form_validation->set_rules('email','','valid_email|max_length[100]');
		$this->form_validation->set_rules('phone','','max_length[20]');
		$this->form_validation->set_rules('fax','','max_length[20]');

		if ($this->form_validation->run() == FALSE) :
			$this->session->set_flashdata('warning',validation_errors());
		else:
			$data = array(
				'id' => $this->input->post('profile_id'),
				'user_id' => $this->id,
				'phone' => $this->input->post('phone'),
				'fax' => $this->input->post('fax')
			);
			if ($this->profile->save($data)) :
				$this->session->set_flashdata('warning',validation_errors());
				redirect('account/profile/edit');
			endif;
		endif;

    $this->data['menu'] = 'edit';
    $this->data['leftbar'] = $this->load->view('_partials/leftbar',$this->data,TRUE);
    $this->data['body'] = $this->load->view('profile/edit',NULL,TRUE);
    $this->load->view('_layouts/leftside',$this->data);
  }

  function education()
  {
    $this->data['menu'] = 'education';
    $this->data['leftbar'] = $this->load->view('_partials/leftbar',$this->data,TRUE);
    $this->data['body'] = $this->load->view('profile/education',NULL,TRUE);
    $this->load->view('_layouts/leftside',$this->data);
  }

  function work()
  {
    $this->data['menu'] = 'work';
    $this->data['leftbar'] = $this->load->view('_partials/leftbar',$this->data,TRUE);
    $this->data['body'] = $this->load->view('profile/work',NULL,TRUE);
    $this->load->view('_layouts/leftside',$this->data);
  }

	function change_picture()
	{
		if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) :
			$upload = array(
				'allowed_types'	=> 'jpg|jpeg|png',
				'upload_path'	=> FCPATH.'uploads',
				'file_ext_tolower' => TRUE,
			);
			$exist = $this->input->post('assets_id');
			if ($exist) :
				$upload['file_name'] = $this->input->post('file_name');
				$upload['overwrite'] = TRUE;
			else:
				$upload['encrypt_name'] = TRUE;
			endif;
			$this->upload->initialize($upload);
			if ($this->upload->do_upload('file')) :
				$resize = array(
					'source_image' => $this->upload->data('full_path'),
					'width' => '600',
					'height' => '600'
				);
				$this->image_lib->initialize($resize);
				if ($this->image_lib->resize()) :
					$data = $this->upload->data();
					$data['id'] = $this->input->post('assets_id');
					$data['file_name'] = $this->input->post('file_name');
					if ($this->assets->save($data)) :
						$assets_id = ($this->db->insert_id()) ? $this->db->insert_id() : $this->input->post('assets_id');
						$this->assets->save(array(
							'id' => $this->input->post('assets_by_id'),
							'assets_id' => $assets_id,
							'users_id' => $this->id,
							'upload_date' => time(),
							'is_avatar' => TRUE
						),'assets_by');
					else:
						$this->session->set_flashdata('message',$this->db->error(),'danger');
					endif;
				else:
					$this->session->set_flashdata('message',$this->image_lib->display_errors(),'danger');
				endif;
			else:
				$this->session->set_flashdata('message',$this->upload->display_errors(),'danger');
			endif;
		endif;
		$this->data['menu'] = 'change_picture';
		$this->data['picture'] = $this->assets->get_id();
		$this->data['leftbar'] = $this->load->view('_partials/leftbar',$this->data,TRUE);
		$this->data['body'] = $this->load->view('profile/change_picture',NULL,TRUE);
		$this->load->view('_layouts/leftside',$this->data);
	}

  function change_password()
  {
		$this->form_validation->set_rules('old_password','รหัสผ่านเดิม','required');
		$this->form_validation->set_rules('password','รหัสผ่านใหม่','required|min_length['.$this->config->item('min_password_length','ion_auth').']|max_length['.$this->config->item('max_password_length','ion_auth').']|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm','รหัสผ่านใหม่(ยืนยัน)','required');
		if ($this->form_validation->run() == FALSE) :
			$this->session->set_flashdata('warning',validation_errors());
		else:
			$identity = $this->session->userdata('identity');
			$success = $this->ion_auth->change_password($identity,$this->input->post('old_password'),$this->input->post('password'));
			if ($success) :
				$this->session->set_flashdata('message',$this->ion_auth->messages());
				$this->logout();
			else:
				$this->session->set_flashdata('message',$this->ion_auth->errors());
				redirect('account/profile/change_password','refresh');
			endif;
		endif;
		$this->data['menu'] = 'change_password';
		$this->data['leftbar'] = $this->load->view('_partials/leftbar',$this->data,TRUE);
		$this->data['body'] = $this->load->view('profile/change_password',NULL,TRUE);
		$this->load->view('_layouts/leftside',$this->data);
  }

}
