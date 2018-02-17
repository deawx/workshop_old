<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Request_model','request');
	}

	function index()
	{
		$post = $this->input->post('type');
		switch ($post) :
			case 'register':
			$this->request->save_register($this->input->post());
				break;
			case 'deposit':
			$this->request->save_deposit($this->input->post());
				break;
			case 'withdraw':
			$this->request->save_withdraw($this->input->post());
				break;
			case 'transfer':
			$this->request->save_transfer($this->input->post());
				break;
		endswitch;

		$types = $this->input->get('type');
		if ( ! $types)
			redirect('admin/request?type=deposit');

		$request_id = $this->input->get('request_id');
		switch ($types) :
			case 'register':
				$type = $this->register($request_id);
				break;
			case 'deposit':
				$type = $this->deposit($request_id);
				break;
			case 'withdraw':
				$type = $this->withdraw($request_id);
				break;
			case 'transfer':
				$type = $this->transfer($request_id);
				break;
		endswitch;

		$data['request'] = $type;
		$this->load->view('admin/request_'.$types,$data);
	}

	function register($id='')
	{
		if ($id)
		{
			$register = $this->db
				->select('dp.id AS deposit_id,dp.*,up.user_id,up.product_id,up.product_username,up.product_password,up.usercode,us.username,us.fullname,us.email,us.phone')
				->join('user_product as up','up.id = dp.user_product_id')
				->join('product as pd','pd.id = up.product_id')
				->join('user as us','us.id = up.user_id')
				->where('dp.id',$id)
				->get('deposit as dp')
				->row_array();
			return $register;
		}
		else
		{
			$deposit = $this->db
				->select('dp.id,dp.amount,dp.method,dp.datetime,dp.admin_id,dp.credit,up.user_id,up.product_id,pd.name,up.product_username')
				->join('user_product as up','up.id = dp.user_product_id')
				->join('product as pd','pd.id = up.product_id')
				->group_start()
					->where('up.product_username','')
					->where('dp.admin_id','')
					->or_group_start()
						->where('up.product_username !=','')
						->where('dp.admin_id !=','')
					->group_end()
				->group_end()
				->order_by('dp.admin_id','ASC')
				->order_by('dp.id','DESC')
				->get('deposit as dp')
				->result_array();
			foreach ($deposit as $_d=>$d) :
				$this->table->add_row(
					++$_d,$d['datetime'],
					anchor_popup('admin/request/get_by_id/deposit/'.$d['id'],sprintf("%04d",$d['id']),array('target'=>'_blank')),
					anchor_popup('admin/request/get_by_id/user/'.$d['user_id'],sprintf("%04d",$d['user_id']),array('target'=>'_blank')),
					anchor_popup('admin/request/get_by_id/product/'.$d['product_id'],$d['name'],array('target'=>'_blank')),
					$d['product_username'],number_format($d['credit'],'2').' ฿',
					($d['admin_id']) ? anchor_popup('admin/request/get_by_id/user/'.$d['admin_id'],sprintf("%04d",$d['admin_id']),array('target'=>'_blank')) : '',
					anchor('admin/request?type=register&request_id='.$d['id'],(($d['admin_id']) ? 'ดูข้อมูล' : 'ตรวจสอบ')),
					($d['admin_id']) ? '' : form_anchor_delete('admin/request/delete/deposit/'.$d['id'])
				);
			endforeach;
			$this->table->set_heading(array('ที่','วันที่และเวลา','รหัสการฝาก','รหัสลูกค้า','ชื่อผลิตภัณฑ์','รหัสผลิตภัณฑ์','เครดิต','ผู้ดูแล','',''));
			$this->table->set_template(array('table_open'=>'<table class="table table-bordered table-hover datatable">'));
			return $this->table->generate();
		}
	}

	function deposit($id='')
	{
		if ($id)
		{
			$deposit = $this->db
				->select('dp.id AS deposit_id,dp.*,up.user_id,up.product_id,up.product_username,up.product_password,up.usercode,us.username,us.fullname,us.email,us.phone')
				->join('user_product as up','up.id = dp.user_product_id')
				->join('product as pd','pd.id = up.product_id')
				->join('user as us','us.id = up.user_id')
				->where('dp.id',$id)
				->get('deposit as dp')
				->row_array();
			return $deposit;
		}
		else
		{
			$deposit = $this->db
				->select('dp.*,up.user_id')
				->join('user_product as up','up.id = dp.user_product_id')
				->where('up.product_username !=','')
				->order_by('dp.id','DESC')
				->get('deposit as dp')
				->result_array();
			foreach ($deposit as $_d=>$d) :
				$this->table->add_row(
					++$_d,$d['datetime'],
					anchor_popup('admin/request/get_by_id/deposit/'.$d['id'],sprintf("%04d",$d['id']),array('target'=>'_blank')),
					anchor_popup('admin/request/get_by_id/user/'.$d['user_id'],sprintf("%04d",$d['user_id']),array('target'=>'_blank')),
					number_format($d['amount'],'2').' ฿',number_format($d['credit'],'2').' ฿',$d['method'],
					anchor_popup('admin/request/get_by_id/event/'.$d['event_id'],sprintf("%04d",$d['event_id']),array('target'=>'_blank')),
					($d['admin_id']) ? anchor_popup('admin/request/get_by_id/user/'.$d['admin_id'],sprintf("%04d",$d['admin_id']),array('target'=>'_blank')) : '',
					($d['admin_id'])
						? anchor('admin/request?type=deposit&request_id='.$d['id'],'ดูข้อมูล')
						: anchor('admin/request?type=deposit&request_id='.$d['id'],'ตรวจสอบ'),
					($d['admin_id']) ? '' : form_anchor_delete('admin/request/delete/deposit/'.$d['id'])
			);
			endforeach;
			$this->table->set_heading(array('ที่','วันที่และเวลา','รหัสการฝาก','รหัสลูกค้า','ยอดโอน','เครดิต','วิธีการ','อีเว้นต์','ผู้ดูแล','',''));
			$this->table->set_template(array('table_open'=>'<table class="table table-bordered table-hover datatable">'));
			return $this->table->generate();
		}
	}

	function withdraw($id='')
	{
		if ($id)
		{
			$withdraw = $this->db
				->select('wd.id AS withdraw_id,wd.*,ub.id AS user_bank_id,ub.*,up.product_id,up.product_username,up.product_password,up.usercode,us.username,us.fullname,us.email,us.phone')
				->join('user_product as up','up.id = wd.user_product_id')
				->join('product as pd','pd.id = up.product_id')
				->join('user as us','us.id = up.user_id')
				->join('user_bank as ub','ub.id = wd.user_bank_id')
				->where('wd.id',$id)
				->get('withdraw as wd')
				->row_array();
			return $withdraw;
		}
		else
		{
			$withdraw = $this->db
				->select('wd.*,up.product_id,pd.name')
				->join('user_product as up','up.id = wd.user_product_id')
				->join('product as pd','up.product_id = pd.id')
				->order_by('wd.id','DESC')
				->get('withdraw as wd')
				->result_array();
			foreach ($withdraw as $_w=>$w) :
				$this->table->add_row(
					++$_w,$w['datetime'],
					anchor_popup('admin/request/get_by_id/withdraw/'.$w['id'],sprintf("%04d",$w['id']),array('target'=>'_blank')),
					anchor_popup('admin/request/get_by_id/product/'.$w['product_id'],$w['name'],array('target'=>'_blank')),
					number_format($w['amount'],'2').' ฿',
					($w['admin_id']) ? anchor_popup('admin/request/get_by_id/user/'.$w['admin_id'],sprintf("%04d",$w['admin_id']),array('target'=>'_blank')) : '',
					($w['admin_id'])
						? anchor('admin/request?type=withdraw&request_id='.$w['id'],'ดูข้อมูล')
						: anchor('admin/request?type=withdraw&request_id='.$w['id'],'ตรวจสอบ'),
					($w['admin_id']) ? '' : form_anchor_delete('admin/request/delete/withdraw/'.$w['id'])
				);
			endforeach;
			$this->table->set_heading(array('ที่','วันที่และเวลา','รหัสการถอน','ชื่อผลิตภัณฑ์','จำนวน','ผู้ดูแล','',''));
			$this->table->set_template(array('table_open'=>'<table class="table table-bordered table-hover datatable">'));
			return $this->table->generate();
		}
	}

	function transfer()
	{
		return ;
	}

	function delete($table,$id)
	{
		if ( ! $table OR ! (int)$id)
			return FALSE;

		$check = $this->db
			->where('id',$id)
			->where('admin_id','')
			->get($table);
		if ($check->num_rows())
		{
			if ($this->db->where('id',$id)->delete($table))
			{
				$this->session->set_flashdata('info',lang('message_form_success'));
			}
		}
		redirect($this->agent->referrer());
	}

}
