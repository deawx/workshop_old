<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends MY_Model {
  public $table_name = 'product';

  function check_product_id($id)
  {
    return $this->db
      ->where('id',$id)
      ->get('user_product')
      ->num_rows();
  }

  function save_product($post)
  {
    if ($this->input->post('name') == $this->input->post('re_name')) :
      $this->form_validation->set_rules('name',lang('form_product_name'),'trim|required|max_length[100]');
    else:
      $this->form_validation->set_rules('name',lang('form_product_name'),'trim|required|max_length[100]|is_unique[product.name]');
    endif;
    $this->form_validation->set_rules('detail',lang('form_product_detail'),'trim|required');
    if ($this->form_validation->run() === FALSE)
    {
      $this->session->set_flashdata('warning',validation_errors('<div class="error">','</div>'));
      redirect('admin/product?category='.$post['category']);
    }

    if ($_FILES['logo']['name']) :
      $upload = array(
        'allowed_types'	=> 'jpg|jpeg|png',
        'upload_path'	=> realpath(APPPATH.'../assets/images/product'),
        'file_name'		=> $post['logo'],
        'file_ext_tolower' => TRUE,
        'overwrite' => TRUE
      );
      $this->load->library('upload',$upload);
      $this->upload->initialize($upload);
      if ($this->upload->do_upload('logo')) :
        $resize = array(
          'image_library' => 'gd2',
          'source_image' => $this->upload->data('full_path'),
          'maintain_ratio' => FALSE,
          'width' => '300',
          'height' => '50'
        );
        $this->load->library('image_lib',$resize);
        $this->image_lib->initialize($resize);
        $this->image_lib->resize();
      else:
        $this->session->set_flashdata('warning',$this->upload->display_errors());
      endif;
    endif;

    if ($_FILES['picture']['name']) :
      $upload = array(
        'allowed_types'	=> 'jpg|jpeg|png',
        'upload_path'	=> realpath(APPPATH.'../assets/images/product'),
        'file_name'		=> $post['picture'],
        'file_ext_tolower' => TRUE,
        'overwrite' => TRUE
      );
      $this->load->library('upload',$upload);
      $this->upload->initialize($upload);
      if ($this->upload->do_upload('picture')) :
        $resize = array(
          'image_library' => 'gd2',
          'source_image' => $this->upload->data('full_path'),
          'maintain_ratio' => FALSE,
          'width' => '250',
          'height' => '250'
        );
        $this->load->library('image_lib',$resize);
        $this->image_lib->initialize($resize);
        $this->image_lib->resize();
      else:
        $this->session->set_flashdata('warning',$this->upload->display_errors());
      endif;
    endif;

    $save = array(
      'id' => $this->input->post('id'),
      'logo' => $post['logo'],
      'name' => $post['name'],
      'detail' => strip_tags($post['detail']),
      'category' => $post['category'],
      'picture' => $post['picture']
    );
    if ($this->save($save))
      $this->session->set_flashdata('info','บันทึกข้อมูลเสร็จสิ้น');

    redirect($this->agent->referrer());
  }

  function save_product_url($post)
  {
    $this->form_validation->set_rules('url',lang('form_product_url'),'trim|required|max_length[300]|is_unique[product_url.url]');
    $this->form_validation->set_rules('caption','ข้อความกำกับ','trim|required|max_length[100]');
    if ($this->form_validation->run() === FALSE)
    {
      $this->session->set_flashdata('warning',validation_errors('<div class="error">','</div>'));
      redirect($this->agent->referrer());
    }
    if ($this->db->set(array(
        'product_id' => $post['product_id'],
        'url' => $post['url'],
        'caption' => $post['caption']
      ))->insert('product_url'))
      $this->session->set_flashdata('info','ใส่ลิงค์ผลิตภัณฑ์ไว้แล้ว');

    redirect($this->agent->referrer());
  }

  function save_register($post)
  {
    if ((int)$this->input->post('captcha') !== (int)$this->session->captcha) :
      $this->session->set_flashdata('warning',lang('message_security_code'));
      redirect($this->agent->referrer());
    endif;
    $this->form_validation->set_rules('user_id','USER_ID','trim|required|max_length[4]|is_numeric');
    $this->form_validation->set_rules('product_id','PRODUCT_ID','trim|required|max_length[4]|is_numeric');
    $this->form_validation->set_rules('user_bank_id','BANK_ID','trim|required|max_length[4]|is_numeric');
    $this->form_validation->set_rules('account_deposit',lang('form_account_bank'),'trim|required');
    $this->form_validation->set_rules('amount',lang('form_amount'),'trim|required|max_length[10]|is_numeric');
    $this->form_validation->set_rules('method',lang('form_method'),'trim|required|max_length[30]');
    $this->form_validation->set_rules('datetime',lang('form_datetime'),'trim|required|max_length[16]');
    if ($this->form_validation->run() === FALSE)
      return FALSE;

    $this->db->trans_start();
      $this->save(array(
        'user_id' => $post['user_id'],
        'product_id' => $post['product_id'],
        'created' => date('d/m/Y H:i:s')
      ),'user_product');
      $this->save(array(
        'event_id' => $this->input->post('event_id'),
        'user_product_id' => $this->db->insert_id(),
        'user_bank_id' => $post['user_bank_id'],
        'account_deposit' => $post['account_deposit'],
        'amount' => $post['amount'],
        'method' => $post['method'],
        'datetime' => date('d/m/Y H:i:s')
      ),'deposit');
    $this->db->trans_complete();
    if ($this->db->trans_status() === FALSE) :
      $this->session->set_flashdata('warning','การลงทะเบียนขัดข้อง กรุณาติดต่อพนักงานโดยตรง');
    else:
      $this->session->set_flashdata('info','การลงทะเบียนเสร็จสิ้น กรุณารอการตรวจสอบจากพนักงาน');
    endif;
    redirect($this->agent->referrer());
  }

  function save_deposit($post)
  {
    if ((int)$this->input->post('captcha') !== (int)$this->session->captcha) :
      $this->session->set_flashdata('warning',lang('message_security_code'));
      redirect($this->agent->referrer());
    endif;
    $this->form_validation->set_rules('user_product_id','USER_PRODUCT_ID','trim|required|max_length[4]|is_numeric');
    $this->form_validation->set_rules('user_bank_id','USER_BANK_ID','trim|required|max_length[4]|is_numeric');
    $this->form_validation->set_rules('account_deposit',lang('form_account_bank'),'trim|required');
    $this->form_validation->set_rules('amount',lang('form_amount'),'trim|required|max_length[10]');
    $this->form_validation->set_rules('method',lang('form_method'),'trim|required|max_length[30]');
    $this->form_validation->set_rules('datetime',lang('form_datetime'),'trim|required|max_length[16]');
    if ($this->form_validation->run() === FALSE)
      return FALSE;

    $this->db->trans_start();
      $this->save(array(
        'event_id' => $this->input->post('event_id'),
        'user_product_id' => $post['user_product_id'],
        'user_bank_id' => $post['user_bank_id'],
        'account_deposit' => $post['account_deposit'],
        'amount' => $post['amount'],
        'method' => $post['method'],
        'datetime' => date('d/m/Y H:i:s')
      ),'deposit');
    $this->db->trans_complete();
    if ($this->db->trans_status() === FALSE) :
      $this->session->set_flashdata('warning','รายการขัดข้อง กรุณาติดต่อพนักงานโดยตรง');
    else:
      $this->session->set_flashdata('info','แจ้งการฝากเสร็จสิ้น กรุณารอการตรวจสอบจากพนักงาน');
    endif;
    redirect($this->agent->referrer());
  }

  function save_withdraw($post)
  {
    if ((int)$this->input->post('captcha') !== (int)$this->session->captcha) :
      $this->session->set_flashdata('warning',lang('message_security_code'));
      redirect($this->agent->referrer());
    endif;

    $this->form_validation->set_rules('user_product_id','USER_PRODUCT_ID','trim|required|max_length[4]|is_numeric');
    $this->form_validation->set_rules('user_bank_id','USER_BANK_ID','trim|required|max_length[4]|is_numeric');
    $this->form_validation->set_rules('amount',lang('form_amount'),'trim|required|max_length[10]|is_numeric');
    if ($this->form_validation->run() === FALSE)
      return FALSE;

    if ($this->save(array(
        'user_product_id' => $post['user_product_id'],
        'user_bank_id' => $post['user_bank_id'],
        'amount' => $post['amount'],
        'datetime' => date('d/m/Y H:i:s')
      ),'withdraw')) :
      $this->session->set_flashdata('info','แจ้งการถอนเสร็จสิ้น กรุณารอการตรวจสอบจากพนักงาน');
    else:
      $this->session->set_flashdata('warning','รายการขัดข้อง กรุณาติดต่อพนักงานโดยตรง');
    endif;
    redirect($this->agent->referrer());
  }

  function save_transfer($post)
  {
    return FALSE;
  }

}
