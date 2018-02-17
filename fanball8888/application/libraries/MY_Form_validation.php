<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {

  protected $CI;

  function __construction()
  {
    parent::__construct();
    $this->CI &= get_instance();
  }

  function username_reserve($str)
  {
    $words = array('/admin/i','/administrator/i','/superadmin/i','/webmaster/i','/webeditor/i','/editor/i','/programmer/i','/hostmaster/i','/member/i','/user/i','/customer/i','/service/i');
    foreach ($words as $word)
    {
      if (preg_match($word, strtolower($str)))
      {
        return FALSE;
      }
    }
    return TRUE;
  }

  function valid_date($day)
  {
    $month = $_POST['month'];
    $year = $_POST['year'];
    return isset($month,$day,$year) ? checkdate($month,$day,$year) : FALSE;
  }

  function is_sure($str, $field)
  {
    sscanf($field, '%[^.].%[^.]', $table, $field);
		return isset($this->CI->db)
			? ($this->CI->db->limit('1')->get_where($table, array($field => $str))->num_rows() === 1)
			: FALSE;
  }

  function date_greater_than_or_equal($str, $val)
  {
    $str = date_create_from_format('d/m/Y', $str);
    $str = date_format($str,'d-m-Y');
    $val = date_create_from_format('d/m/Y', $val);
    $val = date_format($val,'d-m-Y');
    return isset($str, $val)
			? (strtotime($str) >= strtotime($val))
			: FALSE;
  }

}
