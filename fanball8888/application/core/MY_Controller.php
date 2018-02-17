<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
  function __construct()
  {
    parent::__construct();
    $language = ($this->session->language !== NULL) ? $this->session->language : 'thai';
    $this->config->set_item('language',$language);
    $this->load->language(array('ui','form','message'),$language);
    // $this->output->enable_profiler(TRUE);
  }
}

class Public_Controller extends MY_Controller {
  function __construct()
  {
    parent::__construct();
    $this->data['sportbook'] = $this->db->select('id,name,picture')->where(array('category'=>'sportbook','status'=>'1'))->order_by('id')->get('product')->result_array();
    $this->data['casino'] = $this->db->select('id,name,picture')->where(array('category'=>'casino','status'=>'1'))->order_by('id')->get('product')->result_array();
  }
}

class Private_Controller extends Public_Controller {
  function __construct()
  {
    parent::__construct();
    if ( ! $this->session->login && ! $this->session->id)
      redirect();
  }
}

class Admin_Controller extends MY_Controller {
  public $alert = array(
    'user_register' => '',
    'product_register' => '',
    'product_deposit' => '',
    'product_withdraw' => '',
    'webboard_topic' => ''
  );

  function __construct()
  {
    parent::__construct();
    if ( ! $this->session->login && ! $this->session->id &&  ! $this->session->admin)
    {
      $this->session->sess_destroy();
      redirect();
    }
    $user_register = $this->db
      ->where('us.status','')
      ->get('user as us');
    $product_register = $this->db
      ->join('user_product as up','up.id = dp.user_product_id')
      ->join('product as pd','pd.id = up.product_id')
      ->where('up.product_username','')
      ->where('dp.admin_id','')
      ->get('deposit as dp');
    $product_deposit = $this->db
      ->join('user_product as up','up.id = dp.user_product_id')
      ->where('up.product_username','')
      ->get('deposit as dp');
    $product_withdraw = $this->db
      ->where('wd.admin_id','')
      ->get('withdraw as wd');
    $webboard_topic = $this->db
      ->where('wb.status','0')
      ->get('webboard_topic as wb');
    if ($user_register->num_rows())
    {
      $this->alert['user_register'] = TRUE;
      $this->session->set_flashdata('notification','user');
    }
    if ($product_register->num_rows())
    {
      $this->alert['product_register'] = TRUE;
      $this->session->set_flashdata('notification','register');
    }
    if ($product_deposit->num_rows())
    {
      $this->alert['product_deposit'] = TRUE;
      $this->session->set_flashdata('notification','deposit');
    }
    if ($product_withdraw->num_rows())
    {
      $this->alert['product_withdraw'] = TRUE;
      $this->session->set_flashdata('notification','withdraw');
    }
    if ($webboard_topic->num_rows())
    {
      $this->alert['webboard_topic'] = TRUE;
      $this->session->set_flashdata('notification','webboard');
    }
    $this->load->library('table');
  }

  function get_by_id($table,$id)
	{
		if ( ! (string)$table OR ! (int)$id)
			return FALSE;

		switch ($table) :
			case 'user':
				$data = $this->db
					->select('id,username,fullname,email,phone,created,updated,logged,status,online')
					->where('id',$id)
					->get('user')
					->row_array();
				break;
			case 'deposit':
				$data = $this->db
					->where('dp.id',$id)
					->get('deposit as dp')
					->row_array();
				break;
			case 'withdraw':
				$data = $this->db
					->where('wd.id',$id)
					->join('user_bank as ub','ub.id = wd.user_bank_id')
					->get('withdraw as wd')
					->row_array();
				break;
      default:
        $data = $this->db->where('id',$id)->get($table)->row_array();
        break;
		endswitch;
		$data['data'] = $data;
		$this->load->view('fragments/request_information',$data);
	}

}
