<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->data['user_all'] = $this->db->count_all('user');
		$this->data['user_login_today'] = $this->db->like('logged',date('d/m/Y'))->count_all_results('user');
		$this->data['user_new_today'] = $this->db->like('created',date('d/m/Y'))->count_all_results('user');
		$this->data['user_online'] = $this->db->where('online','1')->count_all_results('user');
		$this->data['match_all'] = $this->db->count_all('match');
		$this->data['match_process'] = $this->db->where('status','process')->count_all_results('match');
		$this->data['match_complete'] = $this->db->where('status','complete')->count_all_results('match');
		$this->data['match_problem'] = $this->db->where('status','problem')->count_all_results('match');
		$this->data['game_betting_process'] = $this->db->where('status','process')->count_all_results('game_betting');
		$this->data['game_betting_complete'] = $this->db->where('status','complete')->count_all_results('game_betting');
		$this->data['game_betting_problem'] = $this->db->where('status','problem')->count_all_results('game_betting');
		$this->data['game_pay_admin'] = $this->db->where('type','admin')->count_all_results('game_pay');
		$this->data['game_pay_betting'] = $this->db->where('type','betting')->count_all_results('game_pay');
		$this->load->view('admin/dashboard',$this->data);
	}

}
