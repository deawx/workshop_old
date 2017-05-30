<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_error {

  private $_ci;
  private $_log_table_name;
  public $levels = array(
    E_ERROR             => 'Error',
    E_WARNING           => 'Warning',
    E_PARSE             => 'Parsing Error',
    E_NOTICE            => 'Notice',
    E_CORE_ERROR        => 'Core Error',
    E_CORE_WARNING      => 'Core Warning',
    E_COMPILE_ERROR     => 'Compile Error',
    E_COMPILE_WARNING   => 'Compile Warning',
    E_USER_ERROR        => 'User Error',
    E_USER_WARNING      => 'User Warning',
    E_USER_NOTICE       => 'User Notice',
    E_STRICT            => 'Runtime Notice',
    E_RECOVERABLE_ERROR => 'Catchable error',
    E_DEPRECATED        => 'Runtime Notice',
    E_USER_DEPRECATED   => 'User Warning'
  );

  public function __construct()
  {
    $this->_ci =& get_instance();
    set_error_handler(array($this, 'error_handler'));
    set_exception_handler(array($this, 'exception_handler'));
    // Load database driver
    $this->_ci->load->database();
    $this->_log_table_name = 'errors_logs';
  }

  public function error_handler($severity, $message, $filepath, $line)
  {
    $data = array(
      'errno' => $severity,
      'errtype' => isset($this->levels[$severity]) ? $this->levels[$severity] : $severity,
      'errstr' => $message,
      'errfile' => $filepath,
      'errline' => $line,
      'user_agent' => $this->_ci->input->user_agent(),
      'ip_address' => $this->_ci->input->ip_address(),
      'timestamp' => time()
    );
    $this->_ci->db->insert($this->_log_table_name, $data);
  }

  public function exception_handler($exception)
  {
    $data = array(
      'errno' => $exception->getCode(),
      'errtype' => isset($this->levels[$exception->getCode()]) ? $this->levels[$exception->getCode()] : $exception->getCode(),
      'errstr' => $exception->getMessage(),
      'errfile' => $exception->getFile(),
      'errline' => $exception->getLine(),
      'user_agent' => $this->_ci->input->user_agent(),
      'ip_address' => $this->_ci->input->ip_address(),
      'timestamp' => time()
    );
    $this->_ci->db->insert($this->_log_table_name, $data);
  }

}
