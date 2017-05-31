<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
  }
}

class Public_Controller extends MY_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('user_model','user');
  }
}

class Private_Controller extends Public_Controller {
  public function __construct()
  {
    parent::__construct();
    if ( ! $this->session->login)
      redirect();
  }
}

class Admin_Controller extends MY_Controller {
  public function __construct()
  {
    parent::__construct();
    if ($this->session->role !== 'instructor')
      redirect();
  }
}
