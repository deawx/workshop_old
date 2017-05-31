<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exams_model extends MY_Model {
  public $table_name = 'exam';

  function save_exam($post)
  {
    if ($this->save($post))
      $this->session->set_flashdata('success','จัดการข้อมูลของ '.$post['question'].' แล้ว');

    redirect($this->agent->referrer());
  }

}
