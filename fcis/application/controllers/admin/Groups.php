<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Groups extends Admin_Controller {

	public function __construct(){
		parent::__construct();
		$this->allow_group_access(array('special','admin'));
		$this->load->model('Group');

		$this->data['page_header'] = 'ข้อมูลกลุ่มผู้ใช้งานระบบ';
		$this->data['page_header_small'] = 'รายละเอียดข้อมูล';
		$this->data['parent_menu'] = 'setting';
	}

	public function index()
	{
		$config['base_url'] = site_url('admin/groups/index/');
		$config['total_rows'] = count($this->Group->find());
		$config['per_page'] = 10;
		$config["uri_segment"] = 4;
		$this->data['groups'] = $this->Group->find($config['per_page'], $this->uri->segment(4));
		$this->render('admin/groups/index');
	}

	public function add()
	{
		$this->form_validation->set_rules('name', 'name', 'required|is_unique[categories.name]');
		if($this->form_validation->run() == true){
			$group = array(
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description')
			);
			$this->Group->create($group);
			$this->session->set_flashdata('message',message_box('Group has been saved','success'));
			redirect('admin/groups/index');
		}
		$this->render('admin/groups/add');
	}

	public function edit($id = null)
	{
		if($id == null){
			$id = $this->input->post('id');
		}
		$this->form_validation->set_rules('name', 'name', 'required');
		if($this->form_validation->run() == true){
			$group = array(
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description')
			);
			$this->Group->update($group, $id);
			$this->session->set_flashdata('message',message_box('Group has been saved','success'));
			redirect('admin/groups/index');
		}
		$this->data['group'] = $this->Group->find_by_id($id);
		$this->render('admin/groups/edit');
	}

	public function delete($id = null)
	{
		// if(!empty($id)){
		// 	$this->Group->delete($id);
		// 	$this->session->set_flashdata('message',message_box('Group has been deleted','success'));
		// 	redirect('admin/groups/index');
		// }else{
		// 	$this->session->set_flashdata('message',message_box('Invalid id','danger'));
		// 	redirect('admin/groups/index');
		// }
	}
}
