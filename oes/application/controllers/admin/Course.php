<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Course_model','course');
	}

	function index($id='')
	{
		$post = $this->input->post();
		if ($post)
		{
			$this->course->save_topic($post);
		}
		$data['topic'] = $this->db->where('id',$id)->get('topic')->row_array();
		$data['topics'] = $this->db->get('topic')->result_array();
		$this->load->view('admin/course',$data);
	}

	function content($tid,$id='')
	{
		$post = $this->input->post();
		if ($post)
		{
			$this->course->save_sub_topic($post);
		}

		$data['sub_topic'] = $this->db->where('id',$id)->get('sub_topic')->row_array();
		$data['sub_topics'] = $this->db->where('topic_id',$tid)->get('sub_topic')->result_array();
		$this->load->view('admin/form/sub_topic',$data);
	}

	function delete_topic($id)
	{
		$this->db->where('id',$id)->delete('topic');
		$this->db->where('topic_id',$id)->delete('sub_topic');
		$this->session->set_flashdata('success','ลบข้อมูลแล้ว');
		redirect($this->agent->referrer());
	}

	function delete_sub_topic_file($file)
	{
		$this->db->set('file','')->where('file',$file)->update('sub_topic');
		unlink('assets/images/topic/'.$file);
		$this->session->set_flashdata('success','ลบไฟล์ออกจากระบบแล้ว');
		redirect($this->agent->referrer());
	}

}
