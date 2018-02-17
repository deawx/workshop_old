<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Group_model','group');
	}

	function index()
	{
		$groups = $this->db
			->select('id,name')
			->get('group')
			->result_array();
		foreach ($groups as $_g=>$g)
		{
			$count = $this->db->where(array('group_id'=>$g['id']))->group_by('user_id')->get('user_group')->num_rows();
			$this->table->add_row(array(
				++$_g,
				anchor('admin/group/save_group/'.$g['id'],$g['name']),
				$count,
				($count) ? '' : anchor('admin/group/delete/'.$g['id'],'ลบกลุ่ม',array('onclick'=>"return confirm('ต้องการลบรายการนี้ ?');"))
			));
		}
		$this->table->set_heading(array('ที่','ชื่อกลุ่ม','จำนวนลูกค้า',''));
		$this->table->set_template(array('table_open'=>'<table class="table table-striped table-hover datatable">'));
		$data['groups'] = $this->table->generate();
		$this->load->view('admin/group',$data);
	}

	function save_group($id='')
	{
		$post = $this->input->post();
		if ($post)
		{
			$this->group->save_group($post);
		}
		$id = intval($id);
		$data['group'] = $this->group->search_id($id)->row_array();
		if ($id)
		{
			$user_group = $this->db
				->select('us.id,us.fullname,us.username,us.logged,ug.group_id')
				->where('ug.group_id',$id)
				->join('user_group as ug','ug.user_id = us.id')
				->get('user as us')
				->result_array();
			foreach ($user_group as $_g=>$g)
			{
				$this->table->add_row(
					++$_g,
					anchor_popup('admin/user/save_user/'.$g['id'],$g['fullname']),
					$g['username'],
					$g['logged'],
					anchor('admin/group/ungroup/'.$g['group_id'].'/'.$g['id'],'ลบออกจากกลุ่ม',array('onclick'=>"return confirm('ต้องการลบรายการนี้ ?');"))
				);
			}
			$this->table->set_heading(array('ที่','ชื่อ-นามสกุล','ชื่อผู้ใช้','เข้าใช้งานล่าสุด',''));
			$this->table->set_template(array('table_open'=>'<table class="table table-bordered table-striped datatable">'));
			$data['user_group'] = $this->table->generate();
		}
		$this->load->view('admin/group',$data);
	}

	function ungroup($gid,$uid)
	{
		if ((int)$uid < 1)
		{
			return FALSE;
		}
		if ($this->db
			->where('group_id',$gid)
			->where('user_id',$uid)
			->delete('user_group'))
			$this->session->set_flashdata('success',lang('message_form_success'));

		redirect($this->agent->referrer());
	}

	function delete($id)
	{
		if ((int)$id == 1)
		{
			return FALSE;
		}
		if ($this->db->where('group_id',$id)->get('event_group')->num_rows())
		{
			$this->session->set_flashdata('warning','ไม่สามารถลบรายการที่มีผู้ใช้อยู่');
		}
		else
		{
			$this->group->remove($id);
			$this->session->set_flashdata('success','ลบรายการกลุ่มแล้ว');
		}
		redirect($this->agent->referrer());
	}

}
