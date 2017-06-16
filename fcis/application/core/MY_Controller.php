<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define('BASE_URI', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));
define('THEMES_DIR', 'themes');

class MY_Controller extends CI_Controller {

	protected $data = array();
	protected $assets_path = 'assets/uploads/';
	protected $current_user = array();
	protected $current_groups = array();
	protected $current_groups_ids = array();

	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->library('pagination');
		$this->load->library('general');
		$this->load->model('User');

		$this->data['page_title'] = 'FCIS';
		$this->data['page_header'] = '';
		$this->data['page_header_small'] = '';
		$this->data['before_head'] = 'before head';
		$this->data['before_body'] = 'before body';
		$this->data['assets_path'] = $this->assets_path;

		$this->data['patient_status'] = array(
			0 => 'คนไข้ออกหน่วย',
			1 => 'กลุ่ม CRC of PSU',
			2 => 'คนไข้ CRC ส่งต่อ'
		);

		//Category status options
		$this->data['category_status'] = array(
			0 => 'Inactive',
			1 => 'Active'
		);
		//Post status option
		$this->data['post_status'] = array(
			0 => 'Draft',
			1 => 'Publish',
			2 => 'Block'
		);
		//User status option
		$this->data['user_status'] = array(
			0 => 'Pending',
			1 => 'Active',
			2 => 'Inactive'
		);

		if($this->session->userdata('user_id'))
		{
			$this->current_user = $this->User->find_by_id($this->session->userdata('user_id'));
			$this->current_groups = $this->current_groups();
			$this->current_groups_ids =  explode(',', $this->current_user['group_ids']);
		}

		$this->data['current_user'] = $this->current_user;
		$this->data['current_groups'] = $this->current_groups;
		$this->data['current_groups_ids'] = $this->current_groups_ids;
	}

	protected function render($content = null, $layout = 'public')
	{
		if ($layout == 'json' || $this->input->is_ajax_request())
		{
			header('Content-Type: application/json');
			echo json_encode($this->data);
		}
		else
		{
			$this->data['content'] = (is_null($content)) ? '' : $this->load->view($content,$this->data,TRUE);
			$this->load->view($layout,$this->data);
		}
	}

	protected function allow_group_access($groups_allowed = array())
	{
		$allow_access = false;
		$match_group_allowed = array_intersect($this->current_groups(), $groups_allowed);
		$allow_access = !empty($match_group_allowed);
		if ($allow_access == false)
		{
			$this->session->set_flashdata('message', message_box('You are not allowed to access this page!','danger'));
			redirect('signin','refresh');
		}
	}

	protected function current_groups()
	{
		$current_groups = array();
		if ( ! empty($this->current_user['groups']))
		{
			$current_groups = explode(',', $this->current_user['groups']);
		}
		return $current_groups;
	}

	protected function generate_acl_db()
	{
		$controllers = array();
		$this->load->helper('file');

		// Scan files in the /application/controllers directory
		// Set the second param to TRUE or remove it if you
		// don't have controllers in sub directories
		$files = get_dir_file_info(APPPATH.'controllers');

		// Loop through file names removing .php extension
		foreach ($files as $file)
		{
			$controller = array(
				'name' => $file['name'],
				'path' => $file['server_path'],
				'parent_id' => 0,
			);
			if ($file['name'] != 'admin')
			{
				$methods = get_class_methods(str_replace('.php', '', $file['name']));
			}
			if ($file['name'] == 'admin')
			{
				$admin_files = get_dir_file_info(APPPATH.'controllers/admin');
				print_data($admin_files);exit;
			}
		}
	}
}

class Admin_Controller extends MY_Controller {

	protected $layout = 'admin/layout';
	protected $base_assets_url = 'assets/admin/';

	function __construct()
	{
		parent::__construct();
		$this->data['base_assets_url'] = BASE_URI.$this->base_assets_url;
		$this->data['page_title'] = 'FCIS - Dashboard';
		$this->data['header'] = $this->load->view('admin/parts/header',$this->data,TRUE);
		$this->data['parent_menu'] = '';
	}

	protected function render($content = null, $layout = 'admin/layout')
	{
		$this->data['sidebar'] = $this->load->view('admin/parts/sidebar',$this->data,TRUE);
		parent::render($content, $layout);
	}
}
