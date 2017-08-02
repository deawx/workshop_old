<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends Private_Controller {

	private $id;

	public function __construct()
	{
		parent::__construct();
    $this->load->model('Profile_model','profile');
    $this->load->model('Ion_auth_model','auth');
		$this->id = $this->session->user_id;
    $this->data['parent'] = 'account';
    $this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
		$this->data['user'] = $this->auth->user($this->id)->row_array();
	}

  public function index()
  {
    //validate form input
    $this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'required|xss_clean');
    $this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), 'required|xss_clean');
    $this->form_validation->set_rules('phone', $this->lang->line('edit_user_validation_phone_label'), 'required|xss_clean');
    $this->form_validation->set_rules('groups', $this->lang->line('edit_user_validation_groups_label'), 'xss_clean');

    if (isset($_POST) && !empty($_POST))
    {
      $data = array(
        'first_name' => $this->input->post('first_name'),
        'last_name'  => $this->input->post('last_name'),
        'phone'      => $this->input->post('phone')
      );

      //update the password if it was posted
      if ($this->input->post('password'))
      {
        $this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');

        $data['password'] = $this->input->post('password');
      }

      if ($this->form_validation->run() === TRUE)
      {
        $this->ion_auth->update($user->id, $data);
        //check to see if we are creating the user
        //redirect them back to the admin page
        $this->session->set_flashdata('message', message_box('Profile saved','success'));
        redirect('admin/users/profile');
      }
    }

    //print_data($this->session->all_userdata());
    //print_data($this->auth->user($id)->row_array());

    $this->data['menu'] = 'profile';
    $this->data['leftbar'] = $this->load->view('_partials/leftbar',$this->data,TRUE);
		$this->data['body'] = $this->load->view('profile/profile',$this->data,TRUE);
		$this->load->view('_layouts/leftside',$this->data);
  }

  function edit()
  {
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
		$this->data['menu'] = 'change_picture';
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
