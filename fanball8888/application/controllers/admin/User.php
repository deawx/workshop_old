<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model','user');
		$this->load->model('profile_model','profile');
	}

	function index()
	{
		$users = $this->db
			->select('us.id,us.username,us.fullname,us.created,us.logged,us.point,us.status')
			->where(array('us.role'=>'0'))
			->order_by('id','DESC')
			->get('user as us')
			->result_array();
		foreach ($users as $_c=>$c)
		{
			$this->table->add_row(
				++$_c,anchor('admin/user/save_user/'.$c['id'],$c['fullname']),$c['created'],$c['logged'],$c['username'],$c['point'],($c['status'] == '0') ? 'ปิดใช้งาน' : 'เปิดใช้งาน'
			);
		}
		$this->table->set_heading(array('ที่','ชื่อ-นามสกุล','วันที่สมัคร','เข้าใช้ล่าสุด','ชื่อผู้ใช้','พ้อยท์','สถานะ'));
		$this->table->set_template(array('table_open'=>'<table class="table table-striped table-hover datatable">'));
		$data['users'] = $this->table->generate();
		$this->load->view('admin/user',$data);
	}

	function save_user($id='')
	{
		$post = $this->input->post('post');
		switch ($post)
		{
			case 'profile':
			$this->user->update($this->input->post());
				break;
			case 'bank':
			$this->profile->save_bank($this->input->post());
				break;
		}

		$data['user'] = $this->db
			->select('id,username,fullname,picture,email,phone,created,created_ip,updated,logged,logged_ip,status,role')
			->where('id',$id)
			->get('user')
			->row_array();
		if ($id && ! $data['user'])
			return FALSE;

		if ($data['user']['role'] === '1')
		{
			if ($data['user']['role'] !== $this->session->id)
			{
				return FALSE;
			}
		}
		if ($id)
		{
			$user_group = $this->db
			->select('group_id')
			->where('user_id',$id)
			->get('user_group')
			->result_array();
			$data['user']['group'] = array();
			foreach ($user_group as $ug) $data['user']['group'][] = $ug['group_id'];
			$data['group'] = $this->db->select('id,name')->get('group')->result_array();
			$sid = $this->input->get('bank_id');
			$data['bank_edit'] = $this->profile->search_id($sid,'user_bank')->row_array();
			$this->table->set_template(array('table_open'=>'<table class="table table-striped table-hover datatable">'));
			$user_bank = $this->db
				->select('id,user_id,account_bank,account_name,account_number,status')
				->where('user_id',$id)
				->order_by('status')
				->get('user_bank')
				->result_array();
			foreach ($user_bank as $_c=>$c)
			{
				$this->table->add_row(
					++$_c,
					sprintf("%04d",$c['id']),
					anchor('admin/user/save_user/'.$c['user_id'].'?bank_id='.$c['id'],
					$c['account_bank']),$c['account_name'],$c['account_number'],
					($c['status'] == '0') ? 'ปิดใช้งาน' : 'เปิดใช้งาน'
				);
			}
			$this->table->set_heading(array('ที่','รหัสธนาคาร','ชื่อธนาคาร','ชื่อบัญชี','เลขที่บัญชี','สถานะ'));
			$data['user_bank'] = $this->table->generate();
			$this->table->clear();
			$user_product = $this->db
				->select('up.id,up.product_id,up.product_username,up.created,pd.name,dp.id AS deposit_id,dp.credit,dp.admin_id')
				->join('deposit as dp','dp.user_product_id = up.id')
				->join('product as pd','pd.id = up.product_id')
				->order_by('up.id','DESC')
				->where(array('user_id'=>$id))
				->get('user_product up')
				->result_array();
			foreach ($user_product as $_up=>$up)
			{
				$this->table->add_row(
					++$_up,anchor_popup('admin/user/get_by_id/deposit/'.$up['id'],sprintf("%04d",$up['id']),array('target'=>'_blank')),$up['product_username'],$up['created'],$up['name']
				);
			}
			$this->table->set_heading(array('ที่','รหัสการฝาก','ชื่อผู้ใช้ผลิตภัณฑ์','วันที่สมัคร','ชื่อผลิตภัณฑ์'));
			$data['user_product'] = $this->table->generate();
			$this->table->clear();
			$deposit = $this->db
				->select('dp.id,dp.admin_id,dp.event_id,dp.datetime,dp.amount,dp.method,dp.account_deposit')
				->where('up.user_id',$id)
				->join('user_product as up','up.id = dp.user_product_id')
				->get('deposit as dp')
				->result_array();
			foreach ($deposit as $_d=>$d)
			{
				$this->table->add_row(
					++$_d,$d['datetime'],
					anchor_popup('admin/user/get_by_id/deposit/'.$d['id'],sprintf("%04d",$d['id']),array('target'=>'_blank')),
					number_format($d['amount'],'2').' ฿',$d['method'],
					($d['event_id']) ? anchor_popup('admin/user/get_by_id/event/'.$d['event_id'],sprintf("%04d",$d['event_id']),array('target'=>'_blank')) : '',
					($d['admin_id']) ? anchor_popup('admin/user/get_by_id/admin/'.$d['admin_id'],sprintf("%04d",$d['admin_id']),array('target'=>'_blank')) : ''
				);
			}
			$this->table->set_heading(array('ที่','วันที่/เวลา','รหัสการฝาก','จำนวน','วิธีการ','รหัสอีเว้นต์','รหัสผู้ดูแล'));
			$data['deposit'] = $this->table->generate();
			$this->table->clear();
			$withdraw = $this->db
				->select('wd.id,wd.datetime,wd.user_bank_id,wd.amount,wd.admin_id')
				->where('up.user_id',$id)
				->join('user_product as up','up.id = wd.user_product_id')
				->get('withdraw as wd')
				->result_array();
			foreach ($withdraw as $_w=>$w)
			{
				$this->table->add_row(
					++$_w,$w['datetime'],
					anchor_popup('admin/user/get_by_id/withdraw/'.$w['id'],sprintf("%04d",$w['id']),array('target'=>'_blank')),
					anchor_popup('admin/user/get_by_id/user_bank/'.$w['user_bank_id'],sprintf("%04d",$w['user_bank_id']),array('target'=>'_blank')),
					number_format($w['amount'],'2').' ฿',
					($w['admin_id']) ? anchor_popup('admin/user/get_by_id/admin/',sprintf("%04d",$w['admin_id']),array('target'=>'_blank')) : ''
				);
			}
			$this->table->set_heading(array('ที่','วันที่/เวลา','รหัสการถอน','โอนไปที่(รหัสธนาคาร)','จำนวน','รหัสผู้ดูแล'));
			$data['withdraw'] = $this->table->generate();
			$this->table->clear();
		}
		$this->load->view('admin/user',$data);
	}

	function status($id,$status)
	{
		if ( ! (int)$id)
			return FALSE;

		$status = ($status == '0') ? '1' : '0';
		if ($this->db->set(array('status'=>$status))->where('id',$id)->update('user'))
		$this->session->set_flashdata('success','การเปลี่ยนสถานะเสร็จสิ้น');

		redirect($this->agent->referrer());
	}

  // function delete($id,$picture='')
  // {
	// 	if ($this->db->where(array('id'=>$id,'role'=>'1'))->get('user'));
	// 		return FALSE;
	//
  //   if ($this->user->remove($id))
  //     if ($picture !== '')
  //       if (unlink('assets/images/user/'.$picture))
  //         $this->session->set_flashdata('success','ทำการลบข้อมูลเสร็จสิ้น');
	//
  //   redirect('admin/user');
  // }

}
