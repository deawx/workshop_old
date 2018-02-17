<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promotion extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
    $this->load->model('Promotion_model','promotion');
	}

	function index()
	{
		$post = $this->input->post('post');
		if ($post == 'offer')
		{
			$this->promotion->save_offer($this->input->post());
		}
		elseif ($post == 'event')
		{
			$this->promotion->save_event($this->input->post());
		}
		$types = $this->input->get('type');
		if ( ! $types)
		{
			redirect('admin/promotion?type=offer');
		}
		$this->table->set_template(array('table_open'=>'<table class="table table-striped table-hover datatable">'));
		switch ($types)
		{
			case 'offer':
				$form = $this->input->get('form');
				if ($form)
				{
					$offer_id = $this->input->get('offer_id');
					$type = $this->save_offer($offer_id);
				}
				else
				{
					$type = $this->offer();
				}
				break;
			case 'event':
				$form = $this->input->get('form');
				if ($form)
				{
					$event_id = $this->input->get('event_id');
					$type = $this->save_event($event_id);
				}
				else
				{
					$type = $this->event();
				}
				break;
		}
	}

	function offer()
	{
		$promotions = $this->db->select('id,name,sort')->order_by('sort','ASC')->get('promotion')->result_array();
		foreach ($promotions as $_p=>$p)
		{
			$this->table->add_row(
				++$_p,anchor('admin/promotion?type=offer&form=save_offer&offer_id='.$p['id'],$p['name']),
				$this->db->where('promotion_id',$p['id'])->count_all_results('event'),
				($p['sort'] > '1') ? anchor('admin/promotion/sort_promotion/'.$p['id'],'เลื่อนขึ้น') : ''
			);
		}
		$this->table->set_heading(array('ที่','ชื่อโปรโมชั่น','จำนวนอีเว้นต์','จัดลำดับ'));
		$data['offer'] = $this->table->generate();
		$this->load->view('admin/promotion',$data);
	}

	function event()
	{
		$promotions = $this->db->get('event')->result_array();
		foreach ($promotions as $_p=>$p)
		{
			$this->table->add_row(
				++$_p,anchor('admin/promotion?type=event&form=save_event&event_id='.$p['id'],$p['title']),$p['startdate'],$p['enddate'],
				anchor_popup('admin/promotion/get_by_id/promotion/'.$p['promotion_id'],sprintf('%04d',$p['promotion_id']),array('target'=>'_blank')),
				($p['status'] == '0') ? 'เปิดใช้งาน' : 'ปิดใช้งาน'
			);
		}
		$this->table->set_heading(array('ที่','หัวข้ออีเว้นต์','วันที่เริ่ม','วันที่สิ้นสุด','รหัสโปรโมชั่น','สถานะ'));
		$data['event'] = $this->table->generate();
		$this->load->view('admin/event',$data);
	}

	function save_offer($id='')
	{
		$id = intval($id);
		$data['save_offer'] = $this->promotion->search_id($id)->row_array();
		$this->load->view('admin/promotion',$data);
	}

	function save_event($id='')
	{
		$id = intval($id);
		$data['save_event'] = $this->db->where('id',$id)->get('event')->row_array();
		$promotion_list = $this->db->select('id,name')->get('promotion')->result_array();
		$data['promotion_list'] = array(''=>'เลือกรายการโปรโมชั่น');
		foreach ($promotion_list as $_pl=>$pl)
		{
			$data['promotion_list'][$pl['id']] = $pl['name'];
		}
		if ($id)
		{
			$data['save_event_product'] = $this->db->select('ep.product_id,pd.name')->where('ep.event_id',$id)->join('product as pd','pd.id = ep.product_id')->get('event_product as ep')->result_array();
			$data['save_event_group'] = $this->db->select('eg.group_id,gp.name')->where('eg.event_id',$id)->join('group as gp','gp.id = eg.group_id')->get('event_group as eg')->result_array();
			$data['users'] = $this->db
				->join('user_product as up','up.id = dp.user_product_id')
				->where('dp.event_id',$id)
				->group_by('up.user_id')
				->get('deposit as dp')
				->num_rows();
			$data['accounts'] = $this->db
				->join('user_product as up','up.id = dp.user_product_id')
				->where('dp.event_id',$id)
				->group_by('dp.user_product_id')
				->get('deposit as dp')
				->num_rows();
			$data['deposits'] = $this->db->where('event_id',$id)->count_all_results('deposit');
			$data['last_deposit'] = $this->db->select('datetime')->where('event_id',$id)->order_by('id','DESC')->get('deposit',1)->row_array();
		}
		else
		{
			$data['product_list'] = $this->db->select('id,name')->where('status','1')->get('product')->result_array();
			$data['group_list'] = $this->db->select('id,name')->get('group')->result_array();
		}
		$this->load->view('admin/event',$data);
	}

  function delete_offer($id,$picture='')
  {
    if ($this->db->where('id',$id)->delete('promotion'))
      if ($picture !== '')
        if (unlink('assets/images/promotion/'.$picture))
	        if (unlink('assets/images/promotion/large_'.$picture))
	          $this->session->set_flashdata('success','ทำการลบข้อมูลเสร็จสิ้น');

    redirect('admin/promotion');
  }

  function delete_event($id,$picture='')
  {
    if ($this->db->where('id',$id)->delete('event'))
      if ($picture !== '')
        if (unlink('assets/images/promotion/'.$picture))
	        if (unlink('assets/images/promotion/large_'.$picture))
	          $this->session->set_flashdata('success','ทำการลบข้อมูลเสร็จสิ้น');

    redirect('admin/promotion?type=event');
  }

	function sort_promotion($id)
	{
		if ( ! (int)$id)
			return FALSE;

		$sort_up = $this->db->select('id,sort')->where('id',$id)->get('promotion',1)->row_array();
		$sort_down = $this->db->select('id,sort')->where('sort <',$sort_up['sort'])->order_by('sort','DESC')->get('promotion',1)->row_array();
		$this->db->trans_start();
			$this->db->set(array('sort'=>$sort_down['sort']))->where('id',$sort_up['id'])->update('promotion');
			$this->db->set(array('sort'=>$sort_up['sort']))->where('id',$sort_down['id'])->update('promotion');
		$this->db->trans_complete();
		if ($this->db->trans_status === TRUE)
			$this->session->set_flashdata('success','การเรียงลำดับเสร็จสิ้น');

		redirect($this->agent->referrer());
	}

  function status_event($id,$status='0')
  {
		if ( ! (int)$id)
			return FALSE;

		$status = ($status == '0') ? '1' : '0';
		if ($this->db->set(array('status'=>$status))->where('id',$id)->update('event'))
			$this->session->set_flashdata('success','การเปลี่ยนสถานะเสร็จสิ้น');

		redirect($this->agent->referrer());
  }


}
