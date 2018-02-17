<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends Public_Controller {
  public $data = array();

	function __construct()
	{
		parent::__construct();
    $this->data['css'] = array(
      link_tag('assets/css/bootstrap.datetimepicker.min.css')
    );
    $this->data['js'] = array(
      script_tag('assets/js/bootstrap.datetimepicker.min.js'),
      script_tag('assets/js/bootstrap.datetimepicker.th.min.js')
    );
    $this->load->model('product_model','product');
    if (in_array($this->session->product_id,$this->uri->segment_array())
      && (int)$this->session->event_id !== NULL)
    {
      $this->data['event'] = $this->db
        ->select('pt.name,ev.id,ev.picture,ev.title,ev.startdate,ev.enddate,ev.minimum,ev.maximum')
        ->join('promotion as pt','ev.promotion_id = pt.id')
        ->where('ev.id',$this->session->userdata('event_id'))
        ->get('event as ev')
        ->row_array();
    }
    else
    {
      $this->session->unset_userdata(array('product_id','event_id'));
    }
	}

	function index($id)
	{
    $id = intval($id);
    if ( ! $id)
      redirect(base_url());

    $this->data['product'] = $this->product->search_id($id)->row_array();
    $this->data['product_url'] = $this->db->select('url,caption')->where('product_id',$id)->get('product_url')->result_array();
    if ($this->session->login) :
      $this->load->library('table');
      $user_product = $this->db
        ->select('id,user_id,product_id,product_username,product_password')
        ->where(array('user_id'=>$this->session->id,'product_id'=>$id))
        ->get('user_product')
        ->result_array();
      foreach ($user_product as $_u => $u) :
        ($u['product_username'])
        ? $this->table->add_row(
          ++$_u,$u['product_username'],$u['product_password'],
          anchor_popup('product/deposit/'.$u['product_id'].'/'.$u['id'],lang('ui_product_deposit'),array('target'=>'_blank')).nbs().
          anchor_popup('product/withdraw/'.$u['product_id'].'/'.$u['id'],lang('ui_product_withdraw'),array('target'=>'_blank'))
          // anchor_popup('product/transfer',lang('ui_product_transfer'),array('class'=>'btn btn-info','target'=>'_blank'))
          )
        : $this->table->add_row(++$_u,'','รอการยืนยัน');
      endforeach;
      $this->table->set_heading(array('#',lang('ui_product_username'),lang('ui_product_password'),lang('ui_status')));
      $this->table->set_template(array('table_open'=>'<table class="table table-bordered table-striped">'));
      $this->data['user_product'] = $this->table->generate();
    endif;
		$this->load->view('product',$this->data);
	}

  function register($id)
  {
    $post = $this->input->post();
    if ($post)
      $this->product->save_register($post);

    $this->load->helper('captcha');
    $captcha = recaptcha();
    $this->session->set_flashdata('captcha',$captcha['word']);
    $this->data['captcha'] = create_captcha($captcha);
    // $this->data['user_bank'] = $this->db
    //   ->select('id,account_bank,account_name,account_number')
    //   ->where(array('user_id'=>$this->session->id,'status'=>'0'))
    //   ->get('user_bank')
    //   ->result_array();
    $this->load->view('fragments/product_register',$this->data);
  }

  function deposit($product_id,$user_product_id)
  {
    $user_product_id = intval($user_product_id);
    $check_user = $this->product->check_product_id($user_product_id);
    if ( ! $user_product_id OR ! $check_user)
      return FALSE;

    $post = $this->input->post();
    if ($post)
      $this->product->save_deposit($post);

    $this->load->helper('captcha');
    $captcha = recaptcha();
    $this->session->set_flashdata('captcha',$captcha['word']);
    $this->data['captcha'] = create_captcha($captcha);
    // $this->data['user_bank'] = $this->db
    //   ->select('id,account_bank,account_name,account_number')
    //   ->where(array('user_id'=>$this->session->id,'status'=>'0'))
    //   ->get('user_bank')
    //   ->result_array();
    $this->load->view('fragments/product_deposit',$this->data);
  }

  function withdraw($product_id,$user_product_id)
  {
    $user_product_id = intval($user_product_id);
    $check_user = $this->product->check_product_id($user_product_id);
    if ( ! $user_product_id OR ! $check_user)
      return FALSE;

    $post = $this->input->post();
    if ($post)
      $this->product->save_withdraw($post);

    $this->load->helper('captcha');
    $captcha = recaptcha();
    $this->session->set_flashdata('captcha',$captcha['word']);
    $this->data['captcha'] = create_captcha($captcha);
    $this->data['user_product_id'] = $user_product_id;
    $this->data['user_bank'] = $this->db
      ->select('id,account_bank,account_name,account_number')
      ->where(array('user_id'=>$this->session->id,'status'=>'0'))
      ->get('user_bank')
      ->result_array();
    $this->load->view('fragments/product_withdraw',$this->data);
  }

  function transfer($user_product_id)
  {
    $this->load->view('fragments/product_transfer',$this->data);
  }

}
