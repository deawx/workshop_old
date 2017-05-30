<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_user {

  private $_ci;
  private $_log_table_name;
  public $levels = array(
    E_USER_INFO => 'User Warning',
    E_USER_NOTICE => 'User Notice',
    E_USER_ERROR => 'User Error'
  );

  public function __construct()
  {
    $this->_ci =& get_instance();
    $this->_ci->load->database();
    $this->_log_table_name = 'users_logs';
  }

  function trigger_user($message, $type)
  {
    $user_id = isset($this->session->user_id)
      ? $this->session->user_id
      : 0;
    $type = isset($this->levels[$type])
      ? $this->levels[$type]
      : $type;
    $data = array(
      'user_id' => $user_id,
      'timestamp' => time(),
      'message' => $message,
      'type' => $type
    );
    $this->_ci->db->insert($this->_log_table_name, $data);
  }

}
