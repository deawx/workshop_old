<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// redirect('admin/posts');

		// trigger_error("User error via trigger.", E_USER_ERROR);
		// trigger_error("Warning error via trigger.", E_USER_WARNING);
		// trigger_error("Notice error via trigger.", E_USER_NOTICE);
		// $this->log_user->trigger_user("User error via trigger.",E_USER_INFO);
		// $this->log_user->trigger_user("Warning error via trigger.",E_USER_NOTICE);
		// $this->log_user->trigger_user("Notice error via trigger.",E_USER_ERROR);

		// $elogs = $this->db->get('errors_logs')->result_array();
		// print_data($elogs);
		// $ulogs = $this->db->get('users_logs')->result_array();
		// print_data($ulogs);

		// $this->data['welcome'] = 'Ini adalah halaman admin';
		// $this->render('admin/dashboard/index');

		redirect('admin/search');
	}

}
