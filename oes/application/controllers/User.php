<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Public_Controller {

	function index($id='')
	{
		$id = intval($id);
		if ($this->session->id != $id)
			redirect();

		$post = $this->input->post();
		if ($post)
			$this->user->save_student($post);

		$this->load->view('profile');
	}

	function history($id)
	{
		$id = intval($id);
		if ($this->session->id != $id)
			redirect();

		$data['history'] = $this->db
			->join('topic','topic.id = profile.topic_id')
			->where('student_id',$id)
			->get('profile')
			->result_array();
		$data['student'] = $this->db
			->where('id',$id)
			->get('student')
			->row_array();
		$this->load->view('history',$data);
	}

	function all_history($id='')
	{
		if ($id)
		{
			$data['user'] = $this->db->where('id',$id)->get('student')->row_array();
			$data['profile'] = $this->db
				->join('topic','topic.id = profile.topic_id')
				->where('profile.student_id',$id)
				->get('profile')
				->result_array();
			$this->load->view('user',$data);
		}
		else
		{
			$data['all_history'] = $this->db
				->select('SUM(pf.pretest_score) as pretest_score,SUM(pf.posttest_score) as posttest_score,st.*')
				->join('profile as pf','pf.student_id = st.id')
				->group_by('st.id')
				->get('student as st')
				->result_array();
			$this->load->view('all_user',$data);
		}
	}

	function exam_correct($correct='')
	{
		if ( ! $correct)
		{
			return FALSE;
		}
		$data['correct'] = unserialize(urldecode($correct));
		$this->load->view('correct',$data);
	}

	function login()
	{
		if ($this->session->login)
			redirect();

		$post = $this->input->post();
		if ($post)
			$this->user->login($post);

		$data = [];
		$this->load->view('login',$data);
	}

	function register()
	{
		if ($this->session->login)
			redirect();

		$post = $this->input->post();
		if ($post)
			$this->user->save_student($post);

		$this->load->view('register');
	}

	function update($id)
	{
		$id = intval($id);
		if ($this->session->id !== $id)
			redirect();

		redirect($this->agent->referrer());
		$data = [];
		$this->load->view('profile',$data);
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect();
	}

}
