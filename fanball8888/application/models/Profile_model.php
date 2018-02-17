<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends MY_Model {
  public $table_name = 'user_bank';

  function save_bank($post)
  {
    $check_bank = $this->db->where(array('locked'=>'1','id'=>$post['id']))->get('user_bank');
    if ($check_bank->num_rows()) :
      $this->session->set_flashdata('warning','ไม่อนุญาตให้แก้ไขรายการนี้ ด้วยเหตุผลด้านความปลอดภัยของข้อมูล');
    else:
      if ($this->save($post)) :
        $this->session->set_flashdata('info',lang('message_form_success'));
      else:
        $this->session->set_flashdata('warning',lang('message_form_failed'));
      endif;
    endif;

    redirect('profile/bank');
  }

  function check_question($post)
  {
    $this->form_validation->set_rules('security_answer',lang('form_security_answer'),'trim|required|max_length[50]');
    if ($this->form_validation->run() === FALSE)
      return FALSE;

    $check_question = $this->db
      ->where('id',$this->session->id)
      ->where('security_answer',$post['security_answer'])
      ->get('user');
    return ($check_question->num_rows()) ? TRUE : $this->session->set_flashdata('info',lang('message_form_info'));
  }

  function save_question($post)
  {
    $this->form_validation->set_rules('security_question',lang('form_security_question'),'trim|required|max_length[100]');
    $this->form_validation->set_rules('security_answer',lang('form_security_answer'),'trim|required|max_length[50]');
    if ($this->form_validation->run() === FALSE)
      return FALSE;

    $this->db->set(array(
        'security_question' => $post['security_question'],
        'security_answer' => $post['security_answer']
      ))
      ->where('id',$this->session->id)
      ->update('user');
    if ($this->db->affected_rows()) :
      $this->session->set_flashdata('info',lang('message_form_success'));
    else:
      $this->session->set_flashdata('warning',lang('message_form_warning'));
    endif;
    redirect('profile/privacy');
  }

}
