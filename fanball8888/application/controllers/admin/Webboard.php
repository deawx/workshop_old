<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Webboard extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
    $this->load->model('Webboard_model','webboard');
		$this->table->set_template(array('table_open'=>'<table class="table table-striped table-hover datatable">'));
	}

	function index()
	{
		$post = $this->input->post('type');
		if ($post)
		{
			switch ($post)
			{
				case 'topic':
				$this->webboard->save_topic($this->input->post());
					break;
				case 'category':
				$this->webboard->save_category($this->input->post());
					break;
			}
		}
		$types = $this->input->get('type');
		if ( ! $types)
		{
			redirect('admin/webboard?type=category');
		}
		$webboard_form = $this->input->get('form');
		$category_id = $this->input->get('category_id');
		switch ($types)
		{
			case 'game':
			$this->game();
				break;
			case 'topic':
			$this->topic();
				break;
			case 'category':
			$this->category($category_id);
				break;
		}
	}

	function game()
	{
		$games = $this->db
      ->get('predict')
      ->result_array();
    foreach ($games as $_g=>$g)
    {
      $this->table->add_row(++$_g,anchor('admin/webboard?type=game',$g['id']));
    }
    $this->table->set_heading('ที่','');
    $this->table->set_template(array('table_open'=>'<table class="table table-hover datatable">'));
    $data['games'] = $this->table->generate();
		$this->load->view('admin/webboard_game',$data);
	}

	function topic()
	{
		$latest = $this->db
			->select('wt.*,wc.name,us.fullname')
			->join('user as us','us.id = wt.user_id')
			->join('webboard_category as wc','wc.id = wt.category_id')
			->where('wt.status','')
			->order_by('wt.status DESC')
			->get('webboard_topic as wt')
			->result_array();
		$data['latest'] = $latest;
		$topics = $this->db
			->select('wt.*,wc.name,us.fullname')
			->join('user as us','us.id = wt.user_id')
			->join('webboard_category as wc','wc.id = wt.category_id')
			->where('wt.status >','0')
			->order_by('wt.status DESC','wt.id DESC')
			->get('webboard_topic as wt')
			->result_array();
		$data['topics'] = $topics;
		$this->load->view('admin/webboard_topic',$data);
	}

	function category($category_id='')
	{
		$category = $this->db->order_by('sort','ASC')->get('webboard_category')->result_array();
		foreach ($category as $_c => $c)
		{
			$this->table->add_row(
				++$_c,anchor('admin/webboard?type=category&category_id='.$c['id'],$c['name']),$c['count'],
				($c['sort']>'1')?anchor('admin/webboard/sort_category/'.$c['id'],'เลื่อนขึ้น'):'',
				($c['count'])?'':anchor('admin/webboard/delete_category/'.$c['id'],'ลบประเภท',array('onclick'=>"return confirm('ยืนยันการลบข้อมูล ?');"))
			);
		}
		$this->table->set_heading(array('ที่','ชื่อประเภท','จำนวนรายการ','',''));
		$data['category'] = $this->db->where('id',$category_id)->get('webboard_category')->row_array();
		$data['categories'] = $this->table->generate();
		$this->load->view('admin/webboard_category',$data);
	}

	function sort_category($id)
	{
		if ( ! (int)$id)
		{
			return FALSE;
		}
		$sort_up = $this->db->select('id,sort')->where('id',$id)->get('webboard_category',1)->row_array();
		$sort_down = $this->db->select('id,sort')->where('sort <',$sort_up['sort'])->order_by('sort','DESC')->get('webboard_category',1)->row_array();
		$this->db->trans_start();
			$this->db->set(array('sort'=>$sort_down['sort']))->where('id',$sort_up['id'])->update('webboard_category');
			$this->db->set(array('sort'=>$sort_up['sort']))->where('id',$sort_down['id'])->update('webboard_category');
		$this->db->trans_complete();
		if ($this->db->trans_status === TRUE)
		{
			$this->session->set_flashdata('success','การเรียงลำดับเสร็จสิ้น');
		}
		redirect('admin/webboard?type=category');
	}

	function pin_topic($id,$status)
	{
		if ((int)$id > 0)
		{
			if ($this->webboard->pin_topic($id) === TRUE)
			{
				$this->session->set_flashdata('info',lang('message_form_success'));
			}
		}
    redirect('admin/webboard?type=topic');
	}

	function delete_category($id)
	{
		if ( ! (int)$id)
		{
			return FALSE;
		}
		if ($this->db->where('id',$id)->delete('webboard_category'))
		{
			$this->session->set_flashdata('info',lang('message_form_success'));
		}
    redirect('admin/webboard?type=category');
	}

  function save_terms()
  {
    if ($this->webboard->save_terms())
    {
      redirect('admin/webboard?type=game');
      return TRUE;
    }
    return FALSE;
  }

}
