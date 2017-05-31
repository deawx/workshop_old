<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model','user');
	}

	function index()
	{
		$instructor = $this->db->get('instructor')->result_array();
		foreach ($instructor as $c) {
			$this->table->add_row($c['id'],$c['user'],$c['name'],form_anchor_edit('admin/user/instructor/'.$c['id']).nbs(3).form_anchor_delete('admin/user/delete_instructor/'.$c['id']));
		}
		$this->table->set_heading(array('ไอดี','ชื่อผู้ใช้','ชื่อ-นามสกุล',''));
		$this->table->set_template(array('table_open'=>'<table class="table table-striped datatable">'));
		$data['instructor'] = $this->table->generate();
		$this->table->clear();
		$student = $this->db->get('student')->result_array();
		foreach ($student as $s) {
			$this->table->add_row($s['id'],$s['user'],$s['name'],form_anchor_edit('admin/user/student/'.$s['id']).nbs(3).form_anchor_delete('admin/user/delete_student/'.$s['id']));
		}
		$this->table->set_heading(array('ไอดี','ชื่อผู้ใช้','ชื่อ-นามสกุล',''));
		$this->table->set_template(array('table_open'=>'<table class="table table-striped datatable">'));
		$data['student'] = $this->table->generate();
		$this->load->view('admin/user',$data);
	}

	function instructor($id='')
	{
		$post = $this->input->post();
		if ($post)
			$this->user->save_instructor($post);

		$id = intval($id);
		$data['instructor'] = $this->db->where('id',$id)->get('instructor')->row_array();
		$this->load->view('admin/form/instructor',$data);
	}

	function student($id='')
	{
		$post = $this->input->post();
		if ($post)
			$this->user->save_student($post);

		$id = intval($id);
		$data['student'] = $this->db->where('id',$id)->get('student')->row_array();
		$this->load->view('admin/form/student',$data);
	}

	function delete_instructor($id)
	{
		$this->user->remove($id,'instructor');
		$this->session->set_flashdata('success','ลบข้อมูลเสร็จแล้ว');
		redirect('admin/user');
	}

	function delete_student($id)
	{
		$this->user->remove($id,'student');
		$this->session->set_flashdata('success','ลบข้อมูลเสร็จแล้ว');
		redirect('admin/user');
	}
}
