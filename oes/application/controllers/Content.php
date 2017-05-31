<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends Public_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model','user');
	}

	function index($id='')
	{
    $post = $this->input->post();
    if ($post) {
      $this->user->save_profile($post);
    }

		$data['profile'] = $this->db
			->where('student_id',$this->session->id)
			->where('topic_id',$id)
			->get('profile')
			->row_array();
		$data['topics'] = $this->db->get('topic')->result_array();

		$check_profile = $this->db
			->where('student_id',$this->session->id)
			->where('pretest_score !=','')
			->where('posttest_score !=','')
			->count_all_results('profile');
		$data['check_student'] = $this->db
			->where('id',$this->session->id)
			->get('student')
			->row_array();
		$data['final'] = FALSE;
		if ((int)$check_profile === (int)count($data['topics']))
		{
			$data['final'] = TRUE;
		}

		$get = $this->input->get('exam');
		$data['topic'] = $this->db->where('id',$id)->get('topic')->row_array();
		if ($get)
		{
			$data['exam'] = $this->db->where('topic_id',$id)->order_by('RAND()')->limit('10')->get('exam')->result_array();
			$this->load->view('exam',$data);
		}
		else
		{
			$data['sub_topic'] = $this->db->where('topic_id',$id)->get('sub_topic')->result_array();
			$data['learned'] = $this->db
				->join('sub_topic as st','st.id = ln.sub_topic_id')
				->where('st.topic_id',$id)
				->where('ln.student_id',$this->session->id)
				->count_all_results('learn as ln');
			$this->load->view('content',$data);
		}
	}

	function learn($id,$file)
	{
		if ( ! $id OR ! $file)
		{
			return FALSE;
		}
		$where = array(
			'student_id' => $this->session->id,
			'sub_topic_id' => $id
		);
		if ($this->db->where($where)->get('learn')->num_rows())
		{
			$opt = 'update';
		}
		else
		{
			$opt = 'insert';
		}

		$data = $this->db->set(array(
			'student_id' => $this->session->id,
			'sub_topic_id' => $id,
			'datetime' => date('d/m/Y H:i:s')
		));
		if ($this->session->login == TRUE && $this->session->role == 'student')
		{
			if ($opt == 'update')
			{
				$this->db->where($where)->update('learn');
			}
			else
			{
				$this->db->insert('learn');
			}
		}
		redirect('assets/images/topic/'.$file);
	}

	function exam()
	{
		$post = $this->input->post();
		if ($post) {
			$this->user->save_exam($post);
		}

		$data['exam'] = $this->db->order_by('RAND()')->limit('60')->get('exam')->result_array();
		$this->load->view('final',$data);
	}

}
