<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

  protected $elements = array();

  protected $params = array();

  protected $source = array();

  public function __construct()
  {
    parent::__construct();
    $this->load->library(array('form_validation','upload','user_agent','table'));
    $this->load->helper(array('form'));
    $this->load->model('Common_model','common');

    $this->elements['link_tag'] = ([
      link_tag('assets/css/bootstrap.datatable.min.css'),
      link_tag('assets/css/bootstrap.datepicker.min.css')
    ]);
    $this->elements['script_tag'] = ([
      script_tag('assets/js/jquery.datatable.min.js'),
      script_tag('assets/js/bootstrap.datatable.min.js'),
      script_tag('assets/js/bootstrap.validator.min.js'),
      script_tag('assets/js/bootstrap.datepicker.min.js'),
      script_tag('assets/js/bootstrap.datepicker.th.min.js'),
      script_tag('assets/js/highcharts.js'),
      script_tag('assets/js/highcharts-more.js')
    ]);
    $this->elements['script_jq'] = ([
      "$('.datatable').DataTable();",
      "$('.datepicker').datepicker({language:'th',format:'dd/mm/yyyy'});"
    ]);
    $this->elements['script_js'] = [];

    $this->elements['session'] = ($this->session->has_userdata('is_login')) ? $this->session->userdata() : array();
    $this->elements['segment'] = ($this->uri->segment_array()) ? $this->uri->segment_array() : array('1'=>'main');
    $this->elements['callback'] = ($this->session->flashdata('callback') != '') ? $this->session->flashdata('callback') : '';
  }

  function callback($value)
  {
    $this->session->set_flashdata('callback',$value);
  }

}

class Public_Controller extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
    if ($this->elements['session']['is_staff'] == FALSE) :
      $this->callback('กรุณาเข้าสู่ระบบ');
      redirect('main');
    endif;
  }

}

class Admin_Controller extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
    if ($this->elements['session']['is_admin'] == FALSE) :
      $this->callback('กรุณาเข้าสู่ระบบ (สำหรับผู้ดูแลระบบ)');
      redirect('main');
    endif;
  }

}
