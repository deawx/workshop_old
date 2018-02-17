<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Channel extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
    $this->load->model('Channel_model','channel');
	}

	public function index($id='')
	{
    $post = $this->input->post();
    if ($post)
      $this->channel->save_channel($post);

    $id = intval($id);
    $data['channel'] = $this->channel->search_id($id)->row_array();
		if ( ! $id) :
      $channels = $this->channel->search()->result_array();
      foreach ($channels as $_c => $c) :
        $this->table->add_row(
	        img('assets/images/channel/'.$c['picture'],'',array('class'=>'img-responsive center-block','style'=>'width:50px;height:50px;')),
	        $c['name'],
	        $c['link'],
	        $this->db->where('channel_id',$c['id'])->count_all_results('channel_url'),
	        anchor('admin/channel/reserve/'.$c['id'],'<i class="fa fa-lg fa-link"></i>',array('class'=>'btn btn-default')).nbs(3).
	        form_anchor_edit('admin/channel/'.$c['id']).nbs(3).
					form_anchor_delete('admin/channel/delete/'.$c['id'].'/'.$c['picture'])
	      );
      endforeach;
      $this->table->set_heading(array('','ชื่อช่องรายการ','ยูอาแอลหลัก','ยูอาแอลสำรอง',''));
      $this->table->set_template(array('table_open'=>'<table class="table table-bordered table-striped table-hover datatable">'));
      $data['channels'] = $this->table->generate();
		endif;
		$this->load->view('admin/channel',$data);
	}

	function reserve($channel_id)
	{
		$post = $this->input->post();
		if ($post)
			$this->channel->save_channel_reserve($post);

		$reserves = $this->db->where('channel_id',$channel_id)->get('channel_url')->result_array();
		foreach ($reserves as $_c => $c) :
			$this->table->add_row($c['name'],$c['link'],form_anchor_delete('admin/channel/delete_reserve/'.$c['id']));
		endforeach;
		$this->table->set_heading(array('ชื่อช่องรายการ','ลิงค์ช่องรายการ',''));
		$this->table->set_template(array('table_open'=>'<table class="table table-bordered table-striped table-hover datatable">'));
		$data['channel'] = $this->channel->search_id($channel_id)->row_array();
		$data['reserve'] = $this->table->generate();
		$this->load->view('admin/channel_reserve',$data);
	}

  function delete($id,$picture='')
  {
    if ($this->channel->remove($id))
			if ($this->db->where('channel_id',$id)->delete('channel_url'))
	      if ($picture !== '')
	        if (unlink('assets/images/channel/'.$picture))
	          $this->session->set_flashdata('success','ทำการลบข้อมูลเสร็จสิ้น');

    redirect('admin/channel');
  }

  function delete_reserve($id)
  {
    if ($this->channel->remove($id,'channel_url'))
      $this->session->set_flashdata('success','ลบช่องสำรองนี้แล้ว');

    redirect($this->agent->referrer());
  }

}
