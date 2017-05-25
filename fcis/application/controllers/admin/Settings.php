<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends Admin_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Category');
		$this->allow_group_access(array('admin'));
		$this->data['parent_menu'] = 'settings';
	}

	public function index(){
		$this->session->set_flashdata('message',message_box('Setting is the coming soon feature!','danger'));
		redirect('admin/posts/index');

		$config = array(
			'base_url' => site_url('admin/categories/index/'),
			'total_rows' => count($this->Category->find()),
			'per_page' => 10,
			'num_links' => 4
		);
		$this->pagination->initialize($config)
		$this->data['categories'] = $this->Category->find($config['per_page'], $this->input->get('offset'));

		$this->data['pagination'] = $this->pagination->create_links();
		$this->render('admin/settings/index');
	}

	public function add(){
		$this->form_validation->set_rules('name', 'name', 'required|is_unique[categories.name]');
		$this->form_validation->set_rules('status', 'status', 'required');

		if($this->form_validation->run() == true){
			$category = array(
				'name' => $this->input->post('name'),
				'status' => $this->input->post('status')
			);
			$this->Category->create($category);
			$this->session->set_flashdata('message',message_box('Category has been saved','success'));
			redirect('admin/categories/index');
		}

		$this->render('admin/categories/add');
	}

	public function edit($id = null){
		if($id == null){
			$id = $this->input->post('id');
		}

		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('status', 'status', 'required');

		if($this->form_validation->run() == true){
			$category = array(
				'name' => $this->input->post('name'),
				'status' => $this->input->post('status')
			);
			$this->Category->update($category, $id);
			$this->session->set_flashdata('message',message_box('Category has been saved','success'));
			redirect('admin/categories/index');
		}

		$this->data['category'] = $this->Category->find_by_id($id);

		$this->render('admin/categories/edit');
	}

	public function delete($id = null){
		if(!empty($id)){
			$this->Category->delete($id);
			$this->session->set_flashdata('message',message_box('Category has been deleted','success'));
			redirect('admin/categories/index');
		}else{
			$this->session->set_flashdata('message',message_box('Invalid id','danger'));
			redirect('admin/categories/index');
		}
	}
}