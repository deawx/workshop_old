<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Match_model extends MY_Model 
{
  function __construct()
  {
    parent::__construct();
  }
  function get_all()
  {
    return $this->db
      ->where(array(
        'time' => '<'.time(),
        'score_time' => ''
      ))
      ->get('match')
      ->result_array();
  }
}