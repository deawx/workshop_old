<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group_model extends MY_Model {
  public $table_name = 'group';

  function save_group($post)
  {
    if ($this->input->post('re_name') !== $this->input->post('name')) :
      $this->form_validation->set_rules('name','ชื่อกลุ่ม','trim|required|max_length[50]|is_unique[group.name]');
    else:
      $this->form_validation->set_rules('name','ชื่อกลุ่ม','trim|required|max_length[50]');
    endif;
    $this->form_validation->set_rules('detail','รายละเอียด/เงื่อนไขของกลุ่ม','trim|required');
    if ($this->form_validation->run() === FALSE)
      return FALSE;

    unset($post['re_name']);
    if ($this->save($post))
      $this->session->set_flashdata('info','จัดการข้อมูลกลุ่มเรียบร้อยแล้ว');

    redirect($this->agent->referrer());
  }

}
