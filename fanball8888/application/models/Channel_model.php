<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Channel_model extends MY_Model {
  public $table_name = 'channel';

  function save_channel($post)
  {
    if ($this->input->post('name') !== $this->input->post('re_name')) :
      $this->form_validation->set_rules('name',lang('form_channel_name'),'trim|required|is_unique[channel.name]');
    else:
      $this->form_validation->set_rules('name',lang('form_channel_name'),'trim|required');
    endif;
    if ($this->form_validation->run() === FALSE)
      return FALSE;

    if ($_FILES['picture']['name']) :
      $upload = array(
        'allowed_types'	=> 'jpg|jpeg|png',
        'upload_path'	=> realpath(APPPATH.'../assets/images/channel'),
        'file_name'		=> date('YmdHis').'.jpg',
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
          'width' => '150',
          'height' => '150'
        );
        $this->load->library('image_lib',$resize);
        $this->image_lib->initialize($resize);
        $this->image_lib->resize();
        $post['picture'] = $this->upload->data('file_name');
      else:
        $this->session->set_flashdata('error',$this->upload->display_errors());
      endif;
    endif;

    unset($post['re_name']);
    $post['datetime'] = date('d/m/Y H:i:s');
    $this->save($post);
    $this->session->set_flashdata('info','เพิ่มข้อมูลเสร็จสิ้น');
    redirect('admin/channel');
  }

  function save_channel_reserve($post)
  {
    $this->form_validation->set_rules('name',lang('form_channel_name'),'trim|required|max_length[100]');
    $this->form_validation->set_rules('link',lang('form_channel_link'),'trim|required|max_length[300]');
    if ($this->form_validation->run() === FALSE)
      return FALSE;

    $this->db->set(array(
      'channel_id' => $post['id'],
      'name' => $post['name'],
      'link' => $post['link']
    ))->insert('channel_url');
    $this->session->set_flashdata('info','เพิ่มช่องสำรองไว้แล้ว ถ้าโดนปิดก็ลบเพิ่มใหม่นะ');

    redirect($this->agent->referrer());
  }

}
