<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request_model extends MY_Model {

  function save_register($post)
  {
    $this->form_validation->set_rules('product_username','ชื่อผู้ใช้ผลิตภัณฑ์','trim|required|max_length[25]');
    $this->form_validation->set_rules('product_password','รหัสผ่านครั้งแรก','trim|required|max_length[15]');
    $this->form_validation->set_rules('usercode','รหัสสมาชิก(ACC)','trim|required|exact_length[5]');
    $this->form_validation->set_rules('credit','เครดิต','trim|required|is_numeric|max_length[10]');
    if ($this->form_validation->run() === FALSE)
    {
      $this->session->set_flashdata('warning',validation_errors('<div class="error">','</div>'));
      redirect($this->agent->referrer());
    }
    $this->db->trans_start();
      $this->db
        ->set(array(
          'admin_id' => $post['admin_id'],
          'event_id' => $post['event_id'],
          'credit' => $post['credit']
        ))
        ->where('id',$post['deposit_id'])
        ->update('deposit');
      $this->db
        ->set(array(
          'product_username' => $post['product_username'],
          'product_password' => $post['product_password'],
          'usercode' => $post['usercode'],
        ))
        ->where('id',$post['user_product_id'])
        ->update('user_product');
    $this->db->trans_complete();
    if ($this->db->trans_status() === FALSE)
    {
      $this->session->set_flashdata('warning',lang('message_form_warning'));
    }
    else
    {
      $this->session->set_flashdata('info',lang('message_form_success'));
    }
    redirect($this->agent->referrer());
  }

  function save_deposit($post)
  {
    $this->form_validation->set_rules('credit','เครดิต','trim|required|is_numeric|max_length[10]');
    if ($this->form_validation->run() === FALSE)
    {
      $this->session->set_flashdata('warning',validation_errors('<div class="error">','</div>'));
      redirect($this->agent->referrer());
    }
    if ($this->db
        ->set(array(
          'event_id' => $post['event_id'],
          'admin_id' => $post['admin_id'],
          'credit' => $post['credit']))
        ->where('id',$post['deposit_id'])
        ->update('deposit'))
    {
      $this->session->set_flashdata('info',lang('message_form_success'));
    }
    else
    {
      $this->session->set_flashdata('warning',lang('message_form_warning'));
    }
    redirect($this->agent->referrer());
  }

  function save_withdraw($post)
  {
    $this->form_validation->set_rules('amount','เครดิต','trim|required|is_numeric|max_length[10]');
    if ($this->form_validation->run() === FALSE)
    {
      $this->session->set_flashdata('warning',validation_errors('<div class="error">','</div>'));
      redirect($this->agent->referrer());
    }
    if ($this->db
        ->set(array(
          'admin_id' => $post['admin_id'],
          'amount' => $post['amount']))
        ->where('id',$post['withdraw_id'])
        ->update('withdraw'))
    {
      $this->session->set_flashdata('info',lang('message_form_success'));
    }
    else
    {
      $this->session->set_flashdata('warning',lang('message_form_warning'));
    }
    redirect($this->agent->referrer());
  }

  function save_transfer($post)
  {
    return ;
  }

}
