<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends Admin_Controller {

  function __construct()
	{
		parent::__construct();
    $this->load->model('setting_model', 'setting');
	}

  function index()
  {
    $post = $this->input->post();
    if ($post)
    {
      if (isset($post['slide']))
      {
        $this->setting->save_slide($post);
      }
    }

		$types = $this->input->get('type');
		switch ($types) :
			case 'slide':
				$type = $this->slide();
				break;
      default:
        redirect('admin/settings?type=slide');
      break;
		endswitch;
  }

  function slide()
  {
    $id = $this->input->get('slide_id');
    $data['slide'] = $this->db->where('id',$id)->get('slide')->row_array();
    $slide = $this->db->order_by('sort','ASC')->get('slide')->result_array();
    foreach ($slide as $_d=>$d) :
      $this->table->add_row(
        ++$_d,anchor('admin/settings?type=slide&slide_id='.$d['id'],$d['name']),$d['created'],
        ($d['sort'] > '1') ? anchor('admin/settings/sort_slide/'.$d['id'],'เลื่อนขึ้น') : '',
        anchor('admin/settings/delete_slide/'.$d['id'],'ลบ',array('onclick'=>"return confirm('ต้องการลบรายการนี้ ?');"))
      );
    endforeach;
    $this->table->set_heading(array('ที่','ชื่อภาพสไลด์','วันที่และเวลา','จัดลำดับ',''));
    $this->table->set_template(array('table_open'=>'<table class="table table-bordered table-hover datatable">'));
    $data['slides'] = $this->table->generate();
    $this->load->view('admin/setting_slide',$data);
  }

  function sort_slide($id)
  {
    if ( ! (int)$id)
			return FALSE;

		$sort_up = $this->db->select('id,sort')->where('id',$id)->get('slide',1)->row_array();
		$sort_down = $this->db->select('id,sort')->where('sort <',$sort_up['sort'])->order_by('sort','DESC')->get('slide',1)->row_array();
		$this->db->trans_start();
			$this->db->set(array('sort'=>$sort_down['sort']))->where('id',$sort_up['id'])->update('slide');
			$this->db->set(array('sort'=>$sort_up['sort']))->where('id',$sort_down['id'])->update('slide');
		$this->db->trans_complete();
		if ($this->db->trans_status === TRUE)
			$this->session->set_flashdata('success','การเรียงลำดับเสร็จสิ้น');

		redirect($this->agent->referrer());
  }

  function delete_slide($id)
  {
    if ((int)$id > 0)
		{
			$this->db->where('id',$id)->delete('slide');
			$this->session->set_flashdata('info',lang('message_form_success'));
		}
		redirect('admin/settings');
  }

}
