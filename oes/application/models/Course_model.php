<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course_model extends MY_Model {
  public $table_name = 'topic';

  function save_topic($post)
  {
    $this->form_validation->set_rules('title', 'หัวข้อวิชาเรียน', 'trim|required');

    if ($this->form_validation->run() === FALSE)
      return FALSE;

    if ($this->input->post('id')) {
      $this->db->set($post)->where('id',$post['id'])->update('topic');
    }else{
      $this->db->insert('topic',$post);
    }

    $this->session->set_flashdata('success','จัดการข้อมูลของ '.$post['title'].' แล้ว');
    redirect('admin/course');
  }

  function save_sub_topic($post)
  {
    $this->form_validation->set_rules('title', 'หัวข้อวิชาเรียน', 'trim|required');
    $this->form_validation->set_rules('description', 'จุดประสงค์รายวิชา', 'trim|required');

    if ($this->form_validation->run() === FALSE)
      return FALSE;

    if ($_FILES['file']['name'])
      $post['file'] = $this->upload_file($this->input->post('file'));

    if ($this->input->post('id')) {
      $this->db->set($post)->where('id',$post['id'])->update('sub_topic');
    }else{
      $this->db->insert('sub_topic',$post);
    }

    $this->session->set_flashdata('success','จัดการข้อมูลของ '.$post['title'].' แล้ว');
    redirect($this->agent->referrer());
  }

  function upload_file($name='')
  {
    $name = ((string)$name)
      ? explode('.',$name)[0]
      : date('YmdHis');
    if ($_FILES['file']['name'] OR $_FILES['file1']['name'] OR $_FILES['file2']['name']) :
      $upload = array(
        'allowed_types'	=> 'pdf',
        'upload_path'	=> realpath(APPPATH.'../assets/images/topic'),
        'file_name'		=> $name.'.pdf',
        'file_ext_tolower' => TRUE,
        'overwrite' => TRUE
      );
      $this->load->library('upload',$upload);
      $this->upload->initialize($upload);
      if ($this->upload->do_upload('file') OR $this->upload->do_upload('file1') OR $this->upload->do_upload('file2')) :
        return $this->upload->data('file_name');
      endif;
    endif;
  }
}
