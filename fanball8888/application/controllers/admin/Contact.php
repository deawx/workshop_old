<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
    $this->load->model('Contact_model','contact');
	}

	function index($id='')
	{
	  $post = $this->input->post();
	  if ($post)
		{
		  $this->contact->save_contact($post);
		}
		$contacts = $this->db->get('contact')->result_array();
		foreach ($contacts as $_c=>$c)
		{
			$this->table->add_row(
				img('assets/images/contact/'.$c['logo'],'',array('class'=>'img-responsive')),anchor('admin/contact/'.$c['id'],$c['text']),$c['url'],anchor('admin/contact/delete/'.$c['id'],'ลบ',array('onclick'=>"return confirm('ต้องการลบรายการนี้ ?');"))
			);
		}
		$this->table->set_heading(array('โลโก้','ข้อความ','ยูอาแอล',''));
		$this->table->set_template(array('table_open'=>'<table class="table table-striped table-hover datatable">'));
    $data['contact'] = $this->table->generate();
    $data['save_contact'] = $this->db->where('id',$id)->get('contact')->row_array();
		$this->load->view('admin/contact',$data);
	}

	function delete($id)
	{
		if ((int)$id > 0)
		{
			$this->db->where('id',$id)->delete('contact');
			$this->session->set_flashdata('info',lang('message_form_success'));
		}
		redirect('admin/contact');
	}

}
