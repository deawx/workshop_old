<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Public_Controller {
	public $data = array();

	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model','user');
	}

	function register()
	{
		if ($this->session->has_userdata('login'))
			redirect();

		$register = $this->input->post();
		if ($register)
			$this->user->register($register);

		$this->load->helper('captcha');
		$captcha = recaptcha();
		$this->session->set_flashdata('captcha',$captcha['word']);
		$this->data['captcha'] = create_captcha($captcha);
		$this->load->view('register',$this->data);
	}

	function login()
	{
		if ($this->session->has_userdata('login'))
			redirect();

		$post = $this->input->post();
		if ($post)
			$this->user->login($post);

		$this->load->helper('captcha');
		$captcha = recaptcha();
		$this->session->set_flashdata('captcha',$captcha['word']);
		$this->data['captcha'] = create_captcha($captcha);
		$this->load->view('login',$this->data);
	}

	function forgot_password()
	{
		if ($this->session->has_userdata('login'))
			redirect();

		$post = $this->input->post();
		if ($post)
		{
			$this->user->forgot_password($post);
		}
		$this->load->helper('captcha');
		$captcha = recaptcha();
		$this->session->set_flashdata('captcha',$captcha['word']);
		$this->data['captcha'] = create_captcha($captcha);
		$this->load->view('forgot_password',$this->data);
	}

	function help()
	{
		$this->load->helper('typography');
		$this->load->view('help');
	}

  function switch_language($language='')
  {
    $language = ($language !== '') ? $language : 'thai';
    $this->session->set_userdata('language',strtolower($language));
    redirect($this->agent->referrer());
  }

	function switch_theme($theme_name='')
	{
		$theme_name = ((string)$theme_name)
			? $theme_name
			: (($this->input->post('theme'))
				? $this->input->post('theme')
				: 'default');
		if ((string)$theme_name)
		{
			$this->load->helper(array('cookie','file'));
			$files = get_filenames('assets/themes');
			if ( ! in_array('bootstrap.'.$theme_name.'.min.css',$files))
			{
				$theme_name = 'default';
			}
			set_cookie('theme',$theme_name,'86500');
		}
		redirect($this->agent->referrer());
	}

	function logout()
	{
		if ($this->session->login)
		{
			$this->db->set('online','0')->where('id',$this->session->id)->update('user');
			$this->session->sess_destroy();
		}
		redirect();
	}

}
