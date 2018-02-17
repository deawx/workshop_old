<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_model extends MY_Model {

  function save_slide($post)
  {
    unset($post['slide']);
    $this->form_validation->set_rules('name','ชื่อภาพสไลด์','trim|required|max_length[50]');
    $this->form_validation->set_rules('url','ยูอาแอลภาพสไลด์','trim|required');
    if ($this->form_validation->run() === FALSE)
      return FALSE;

    $post['created'] = date('d/m/Y H:i:s');
    if ( ! isset($post['id']))
    {
      $sort = $this->db->select_max('sort')->get('slide')->row_array();
      $post['sort'] = $sort['sort']+1;
    }
    if ($this->save($post,'slide'))
      $this->session->set_flashdata('info','บันทึกยูอาแอลภาพสไลด์เรียบร้อยแล้ว');

    redirect('admin/settings');
  }

}
