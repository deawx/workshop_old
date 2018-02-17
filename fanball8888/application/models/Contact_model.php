<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends MY_Model {
  public $table_name = 'contact';

  function save_contact($post)
  {
    $this->form_validation->set_rules('text','ข้อมูลการติดต่อ','trim|required|max_length[50]');
    $this->form_validation->set_rules('url','ยูอาแอล','trim|max_length[50]');
    if ($this->form_validation->run() === FALSE)
    {
      return FALSE;
    }
    if ($_FILES['logo']['name'])
    {
      $upload = array(
        'allowed_types'	=> 'jpg|jpeg|png',
        'upload_path'	=> realpath(APPPATH.'../assets/images/contact'),
        'file_name'		=> $post['logo'],
        'file_ext_tolower' => TRUE,
        'overwrite' => TRUE
      );
      $this->load->library('upload',$upload);
      $this->upload->initialize($upload);
      if ($this->upload->do_upload('logo'))
      {
        $resize = array(
          'image_library' => 'gd2',
          'source_image' => $this->upload->data('full_path'),
          'maintain_ratio' => FALSE,
          'width' => '75',
          'height' => '75'
        );
        $this->load->library('image_lib',$resize);
        $this->image_lib->initialize($resize);
        $this->image_lib->resize();
      }
      else
      {
        $this->session->set_flashdata('warning',$this->upload->display_errors());
      }
    }
    if ($this->input->post('id'))
    {
      $this->db->set(array('text'=>$post['text'],'url'=>prep_url($post['url'])))->where('id',$post['id'])->update('contact');
    }
    else
    {
      $this->db->set(array('logo'=>$post['logo'],'text'=>$post['text'],'url'=>prep_url($post['url'])))->insert('contact');
    }
    if ($this->db->affected_rows())
    {
      $this->session->set_flashdata('info',lang('message_form_success'));
    }
    else
    {
      $this->session->set_flashdata('warning',lang('message_form_warning'));
    }
    redirect('admin/contact');
  }

}
