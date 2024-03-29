<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->allow_group_access(array('special','admin'));
		$this->load->model('Ion_auth_model');
		$this->load->model('User');
		$this->load->model('Group');
		$this->load->library('Ion_auth');

		$this->data['page_header'] = 'ข้อมูลผู้ใช้งานระบบ';
		$this->data['page_header_small'] = 'รายละเอียดข้อมูล';
		$this->data['parent_menu'] = 'setting';
	}

	public function index()
	{
		$config	= array(
			'base_url' => uri_string(),
			'total_rows' => count($this->User->find()),
			'per_page' => 20
		);
		$this->pagination->initialize($config);
		$this->data['users'] = $this->User->find($config['per_page'], $this->input->get('offset'));
		$this->render('admin/users/index');
	}

	public function add()
	{
		$this->allow_group_access(array('special','admin'));
		$this->form_validation->set_rules('first_name', 'ชื่อ', 'required');
		$this->form_validation->set_rules('last_name', 'นามสกุล', 'required');
		$this->form_validation->set_rules('email', 'อีเมล์', 'required|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'รหัสผ่าน', 'required');
		$this->form_validation->set_rules('confirm_password', 'รหัสผ่าน(ยืนยัน)', 'required|matches[password]');
		if ($this->form_validation->run() === TRUE)
		{
			$username = $this->input->post('username');
			$email    = strtolower($this->input->post('email'));
			$password = $this->input->post('password');
			$additional_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name'  => $this->input->post('last_name'),
				'company'    => $this->input->post('company'),
				'phone'      => $this->input->post('phone')
			);
			// if ()
			$this->ion_auth->register($username, $password, $email, $additional_data,$this->input->post('groups'));
			// {
				$this->session->set_flashdata('message',message_box('บันทึกข้อมูลเสร็จสิ้น','success'));
			// }
			// else
			// {
			// 	$this->session->set_flashdata('message',message_box('Failed, please try again!','danger'));
			// }
			redirect('admin/users/index');
		}
		$this->data['groups'] = $this->Group->find_list();
		$this->render('admin/users/add');
	}

	public function edit($id = null)
	{
		$this->allow_group_access(array('special','admin'));
		if ($id == null)
		{
			$id = $this->input->post('id');
		}
		if ($id == $this->current_user['user_id'])
		{
			redirect('admin/users/profile');
		}
		$this->form_validation->set_rules('first_name', 'first name', 'required');
		$this->form_validation->set_rules('active', 'status', 'required');
		if ($this->input->post('password'))
		{
			$this->form_validation->set_rules('password', 'รหัสผ่าน', 'required');
			$this->form_validation->set_rules('confirm_password', 'ยืนยันรหัสผ่าน', 'required|matches[password]');
		}
		if ($this->form_validation->run() == true)
		{
			$data = $_POST;
			unset($data['groups']);
			unset($data['confirm_password']);
			unset($data['password']);
			$this->User->update($data,$id);
			$user_id = $id;
			if ( ! empty($_POST['groups']))
			{
				$this->db->where('user_id',$user_id);
				$this->db->where_not_in('group_id',$_POST['groups']);
				$this->db->delete('users_groups');
				foreach($_POST['groups'] as $key => $group_id)
				{
					if ($this->db->where(array('user_id' => $user_id, 'group_id' => $group_id))->get('users_groups',1)->num_rows() < 1)
					{
						$user_group = array(
							'user_id' => $user_id,
							'group_id' => $group_id
						);
						$this->db->insert('users_groups',$user_group);
					}
				}
			}
			$this->session->set_flashdata('message',message_box('บันทึกข้อมูลเสร็จสิ้น','success'));
			redirect('admin/users/index');
		}
		$this->data['user'] = $this->User->find_by_id($id);
		$this->data['groups'] = $this->Group->find_list();
		$this->render('admin/users/edit');
	}

	public function delete($id = null)
	{
		$this->allow_group_access(array('admin'));
		$user  = $this->User->find_by_id($id);
		$user_groups = explode(',', $user['groups']);
		if (in_array('admin', $user_groups))
		{
			$this->session->set_flashdata('message',message_box('การลบข้อมูลล้มเหลว','danger'));
			redirect('admin/users/index');
		}
		if ($current_user['user_id'] == $id)
		{
			$this->session->set_flashdata('message',message_box('การลบข้อมูลล้มเหลว','danger'));
			redirect('admin/users/index');
		}
		if ( ! empty($id))
		{
			$this->User->delete($id);
			$this->session->set_flashdata('message',message_box('การลบข้อมูลเสร็จสิ้น','success'));
			redirect('admin/users/index');
		}
		else
		{
			$this->session->set_flashdata('message',message_box('ไอดีผิดพลาด','danger'));
			redirect('admin/users/index');
		}
	}

	public function profile()
	{
		//validate form input
		$this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'required|xss_clean');
		$this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), 'required|xss_clean');
		$this->form_validation->set_rules('phone', $this->lang->line('edit_user_validation_phone_label'), 'required|xss_clean');
		$this->form_validation->set_rules('company', $this->lang->line('edit_user_validation_company_label'), 'required|xss_clean');
		$this->form_validation->set_rules('groups', $this->lang->line('edit_user_validation_groups_label'), 'xss_clean');

		if (isset($_POST) && !empty($_POST))
		{


			$data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name'  => $this->input->post('last_name'),
				'company'    => $this->input->post('company'),
				'phone'      => $this->input->post('phone'),
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
				$this->session->set_flashdata('message', message_box('บันทึกข้อมูลเสร็จสิ้น','success'));
				redirect('admin/users/profile');
			}
		}

		$this->data['user'] = $this->current_user;
		$this->render('admin/users/profile');
	}

	function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key   = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return array($key => $value);
	}

	function _valid_csrf_nonce()
	{
		if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE &&
			$this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue'))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
}
