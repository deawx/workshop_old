<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Match_model extends MY_Model {
  function __construct()
  {
    parent::__construct();
  }
  function get_all()
  {
    return $this->db
	  ->order_by('id', 'DESC')
      ->get('match')
      ->result_array();
  }
  function get_by_id($id)
  {
    return $this->db
      ->where('id',$id)
      ->get('match')
      ->row_array();
  }
  function sportbook_match()
  {

    return $this->db
	  ->where('time >',time())
	  ->where('status','process')
	  ->order_by('time', 'ACE')
      ->get('match')
      ->result_array();
  }
  function insert_match($post)
  {
    $this->db
      ->set($post)
      ->insert('match');
    return $this->db->affected_rows();
  }
  function update_match($post)
  {
    $this->db
      ->where('id', $this->input->post('id'))
      ->set($post)
      ->update('match');
    return $this->db->affected_rows();
  }
  function delete_match($id)
  {
	$this->db
      ->where('id',$id)
      ->delete('match');
    return $this->db->affected_rows();
  }
}
