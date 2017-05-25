<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Log extends CI_Log {

  public function __construct()
  {
    parent::__construct();
    $this->ci =& get_instance();
  }

  public function write_log($level, $msg)
  {
    if ($this->_enabled === FALSE)
    {
      return FALSE;
    }

    $level = strtoupper($level);

    if (( ! isset($this->_levels[$level])
      OR ($this->_levels[$level] > $this->_threshold))
      && ! isset($this->_threshold_array[$this->_levels[$level]]))
    {
      return FALSE;
    }

    // $save = array();
    $user_id = 0;
		// $user = $this->_ci->db->select('id')->where('id',$user_id)->get('users')->row_array();
		// if (isset($user['id']))
		// {
		// 	$user_id = $user['id'];
		// }

    $save['user_id'] = $user_id;
		$save['message'] = $msg;
		$save['timestamp'] = time();
    $save['type'] = $level;

		return $this->db->insert('system_logs', $save);

    print_r($save);
    die();
  }

}
