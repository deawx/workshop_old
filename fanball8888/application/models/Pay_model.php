<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pay_model extends MY_Model {

  function __construct()
  {
    parent::__construct();
  }

  function get_all()
  {
    return $this->db
      ->select('us.fullname,gp.*')
      ->join('user as us','us.id = gp.admin_id')
      ->where('gp.type','admin')
      ->get('game_pay as gp')
      ->result_array();
  }

  function insert_point($post)
  {
    $this->form_validation->set_rules('user_id','รหัสผู้เล่น','required|numeric|is_sure[user.id]');
    $this->form_validation->set_rules('point','จำนวนพ้อยท์','required|numeric');
    if ($this->form_validation->run() === FALSE)
    {
      return FALSE;
    }
    $post = array(
      'type' => 'admin',
      'point' => $post['point'],
      'user_id' => $post['user_id'],
      'time' => time(),
      'admin_id' => $this->session->id
    );
    $this->db
      ->set($post)
      ->insert('game_pay');
    $this->db
      ->set('point','point+'.$post['point'],FALSE)
      ->where('id',$post['user_id'])
      ->update('user');
    return $this->db->affected_rows();
  }

  function delete_point($id,$point)
  {
    $user = $this->db
    ->select('point')
    ->get('user')
    ->row();
    if ($user->point >= $point)
    {
      return $this->db
      ->where('id',$id)
      ->delete('game_pay');
    }
    return FALSE;
  }

  function insert_pay($post)
  {
    $this->db
      ->set($post)
      ->insert('game_pay');
    $this->db
      ->set('point','point+'.$post['point'],FALSE)
      ->where('id',$post['user_id'])
      ->update('user');
    $this->db
      ->set('status','complete')
      ->where('id',$post['betting_id'])
      ->update('game_betting');
    return $this->db->affected_rows();
  }

  function pay_get_all() //Match ที่ ทำการกรอก สกอร์แล้ว
  {
	return $this->db
	  ->select('match.time as match_time,match.*,game_betting.*')
	  ->join('match','match.id = game_betting.match_id')
	  ->where('match.status','complete')
	  ->where('game_betting.status','process')
	  ->get('game_betting')
	  ->result_array();
	
  }//close funtion
  function pay_get_id($id) //Match ที่ ทำการกรอก สกอร์แล้ว
  {
	return $this->db
	  ->select('match.time as match_time,match.*,game_betting.*')
	  ->join('match','match.id = game_betting.match_id')
	  ->where('game_betting.id','id')
	  ->where('match.status','complete')
	  ->where('game_betting.status','process')
	  ->get('game_betting')
	  ->result_array();
	
  }//close funtion
}
