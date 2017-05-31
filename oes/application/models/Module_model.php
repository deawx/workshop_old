<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Module_model extends MY_Model {
  public $table_name = 'module';

  function save_module($post)
  {
    $this->form_validation->set_rules('title', 'หัวข้อวิชาเรียน', 'trim|required');
    $this->form_validation->set_rules('objective', 'วัตถุประสงค์วิชาเรียน', 'trim|required');
    $this->form_validation->set_rules('description', 'เนื้อหาวิชา', 'trim|required');

    if ($this->form_validation->run() === FALSE)
      return FALSE;

    if ($this->save($post))
      $this->session->set_flashdata('success','จัดการข้อมูลของ '.$post['title'].' แล้ว');

    redirect('admin/module');
  }

}
