<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends Private_Controller {
	private $id;

	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model','user');
		$this->load->model('profile_model','profile');
		$this->id = $this->session->id;

		$this->load->library('table');
		$template = array(
			'table_open' => '<table class="table table-bordered table-hover">',
			'thead_open' => '<thead class="alert alert-info">'
		);
		$this->table->set_template($template);
	}

	function index()
	{
		redirect('profile/personal');
	}

	function personal()
	{
		$post = $this->input->post('post');
    if ($post === 'update')
			$this->user->update($this->input->post());

    if ($post === 'change_password')
			$this->user->change_password($this->input->post());

		$data['personal'] = $this->db->where('id',$this->id)->get('user')->row_array();
		$this->load->view('personal',$data);
	}

	function bank($id='')
	{
		$post = $this->input->post();
		if ($post)
			$this->profile->save_bank($post);

		$id = intval($id);
		$data['bank_edit'] = $this->profile->search_id($id,'user_bank')->row_array();
		$data['bank'] = $this->db
			->select('id,account_bank,account_name,account_number,status')
			->where('user_id',$this->id)
			->order_by('status')
			->get('user_bank')
			->result_array();
		$this->load->view('bank',$data);
	}

	function bank_status($bank_id,$bank_status)
	{
		if ( ! $bank_id)
			redirect($this->agent->referrer());

		if ($this->db->set(array('status'=>$bank_status))->where('id',$bank_id)->update('user_bank'))
			$this->session->set_flashdata('success','ทำรายการเปลี่ยนสถานะเสร็จสิ้น');

		redirect($this->agent->referrer());
	}

	function product()
	{
		$offset = ($this->input->get('p') > 0) ? $this->input->get('p') : '0';
		$this->load->library('pagination');
		$this->db->where('user_id',$this->id);
		$this->db->where('product_username !=','');
		$config	= array(
			'base_url' => site_url(uri_string()),
			'total_rows' => $this->db->count_all_results('user_product'),
			'per_page' => 15
		);
		$this->pagination->initialize($config);
		$product = $this->db
			->select('up.product_username,pd.name')
			->join('product as pd','pd.id = up.product_id')
			->where('up.user_id',$this->id)
			->where('up.product_username !=','')
			->order_by('up.created','DESC')
			->limit($config['per_page'])
			->offset($offset)
			->get('user_product as up')
			->result_array();
		foreach ($product as $_p => $p) :
			$this->table->add_row(++$_p,$p['product_username'],$p['name']);
		endforeach;
		$this->table->set_heading('#',lang('ui_product_username'),lang('ui_product_name'));
		$data['products'] = $this->table->generate();
		$this->load->view('profile_product',$data);
	}

	function deposit()
	{
		$offset = ($this->input->get('p') > 0) ? $this->input->get('p') : '0';
		$this->load->library('pagination');
		$this->db
			->join('user_product as up','up.id = dp.user_product_id')
			->where('up.user_id',$this->id);
		$config	= array(
			'base_url' => site_url(uri_string()),
			'total_rows' => $this->db->count_all_results('deposit as dp'),
			'per_page' => 15
		);
		$this->pagination->initialize($config);
		$deposit = $this->db
			->select('dp.id,dp.amount,dp.method,dp.datetime,dp.admin_id')
			->join('user_product as up','up.id = dp.user_product_id')
			->limit($config['per_page'])
			->offset($offset)
			->where('up.user_id',$this->id)
			->order_by('dp.admin_id','DESC')
			->order_by('dp.datetime','DESC')
			->get('deposit as dp')
			->result_array();
		foreach ($deposit as $_d=>$d) :
			$this->table->add_row(++$_d.'.',$d['datetime'],number_format($d['amount'],'2'),$d['method'],($d['admin_id'])?'<i class="fa fa-check"></i>':'');
		endforeach;
		$this->table->set_heading('#',lang('ui_datetime'),lang('ui_amount'),lang('ui_method'),lang('ui_status'));
		$data['deposit'] = $this->table->generate();
		$this->load->view('profile_deposit',$data);
	}

	function withdraw()
	{
		$offset = ($this->input->get('p') > 0) ? $this->input->get('p') : '0';
		$this->load->library('pagination');
		$this->db
			->join('user_product as up','up.id = wd.user_product_id')
			->join('user_bank as ub','ub.id = wd.user_bank_id')
			->where('up.user_id',$this->id);
		$config	= array(
			'base_url' => site_url(uri_string()),
			'total_rows' => $this->db->count_all_results('withdraw as wd'),
			'per_page' => 15
		);
		$this->pagination->initialize($config);
		$withdraw = $this->db
			->select('wd.id,wd.amount,wd.datetime,wd.admin_id,ub.account_bank')
			->join('user_product as up','up.id = wd.user_product_id')
			->join('user_bank as ub','ub.id = wd.user_bank_id')
			->limit($config['per_page'])
			->offset($offset)
			->where('up.user_id',$this->id)
			->order_by('wd.datetime','DESC')
			->get('withdraw as wd')
			->result_array();
		foreach ($withdraw as $_w=>$w) :
			$this->table->add_row(++$_w.'.',$w['datetime'],$w['account_bank'],number_format($w['amount'],'2'),($w['admin_id'])?'<i class="fa fa-check"></i>':'');
		endforeach;
		$this->table->set_heading('#',lang('ui_datetime'),lang('ui_bank'),lang('ui_amount'),lang('ui_status'));
		$data['withdraw'] = $this->table->generate();
		$this->load->view('profile_withdraw',$data);
	}

	function transfer()
	{
		return FALSE;
	}

	function webboards()
	{
		$offset = ($this->input->get('p') > 0) ? $this->input->get('p') : '0';
		$this->load->library('pagination');
		$this->db->where('user_id',$this->id);
		$config	= array(
			'base_url' => site_url(uri_string()),
			'total_rows' => $this->db->count_all_results('webboard_topic'),
			'per_page' => 15
		);
		$this->pagination->initialize($config);
		$webboards = $this->db
			->where('user_id',$this->id)
			->limit($config['per_page'])
			->offset($offset)
			->order_by('id','DESC')
			->get('webboard_topic')
			->result_array();
		$data['webboards'] = $webboards;
		$this->load->view('profile_webboard',$data);
	}

	function privacy()
	{
		$post = $this->input->post('post');
		$check_question = FALSE;
		if ($post)
		{
			switch ($post)
			{
				case 'check_question':
				$check_question = $this->profile->check_question($this->input->post());
					break;
				case 'save_question':
				$this->profile->save_question($this->input->post());
					break;
			}
		}
		$data['check_question'] = ($check_question) ? TRUE : FALSE;
		$data['privacy'] = $this->db
			->select('security_question')
			->where('id',$this->id)
			->get('user')
			->row_array();
		$this->load->view('privacy',$data);
	}

}
