<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exam extends Admin_Controller {
	protected $data = array();

	function __construct()
	{
		parent::__construct();
		$this->load->model('Exams_model','exam');
		$this->data['topic'] = $this->db->get('topic')->result_array();
	}

	function index($id='')
	{
		$post = $this->input->post();
		if ($post)
			$this->exam->save_exam($post);

		if ($id)
		{
			$this->data['title'] = $this->db->where(array('id'=>$id))->get('topic')->row();
		}
		$this->data['exam'] = $this->db->where(array('topic_id'=>$id))->get('exam')->result_array();
		$this->load->view('admin/exam',$this->data);
	}

	function edit($id)
	{
		$post = $this->input->post();
		if ($post)
			$this->exam->save_exam($post);

		$id = intval($id);
		if ( ! $id)
			return FALSE;

		$this->data['exam'] = $this->db->where('id',$id)->get('exam')->row_array();
		$this->load->view('admin/form/exam',$this->data);
	}

	function delete($id)
	{
		$id = intval($id);
		if ( ! $id)
			return FALSE;

		$this->db->where('id',$id)->delete('exam');
		redirect($this->agent->referrer());
	}

}
