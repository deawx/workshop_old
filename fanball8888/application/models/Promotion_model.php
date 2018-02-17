<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promotion_model extends MY_Model {
  public $table_name = 'promotion';

  function save_offer($post)
  {
    if ($this->input->post('re_name') == $this->input->post('name'))
    {
      $this->form_validation->set_rules('name','หัวข้อโปรโมชั่น','trim|required|max_length[100]');
    }
    else
    {
      $this->form_validation->set_rules('name','หัวข้อโปรโมชั่น','trim|required|max_length[100]|is_unique[promotion.name]');
    }
    $this->form_validation->set_rules('detail','รายละเอียดโปรโมชั่น','trim|required');
    if ($this->form_validation->run() === FALSE)
    {
      $this->session->set_flashdata('warning',validation_errors('<div class="error">','</div>'));
      redirect($this->agent->referrer());
    }
    if ($_FILES['picture']['name'])
      $picture = $post['picture'];
      if ( ! strpos($picture,'.jpg'))
        $picture = $picture.'.jpg';
          if ($this->upload_image($picture,'400','150'))
            if ($this->upload_image('large_'.$picture,'1200','350'))
              $this->session->set_flashdata('info',lang('message_profile_uploaded'));

    unset($post['post']);
    unset($post['re_name']);
    if ( ! $post['id'])
    {
      $sort = $this->db->select_max('sort')->get('promotion')->row_array();
      $post['sort'] = $sort['sort']+1;
    }
    if ($this->save($post))
    {
      $this->session->set_flashdata('info',lang('message_form_success'));
      redirect('admin/promotion?type=offer');
    }
    else
    {
      $this->session->set_flashdata('warning',lang('message_form_warning'));
      redirect($this->agent->referrer());
    }
  }

  function save_event($post)
  {
    if ($this->input->post('re_title') === $this->input->post('title'))
    {
      $this->form_validation->set_rules('title','หัวข้ออีเว้นต์','trim|required|max_length[150]');
    }
    else
    {
      $this->form_validation->set_rules('title','หัวข้ออีเว้นต์','trim|required|max_length[150]|is_unique[event.title]');
    }
    // if ($this->input->post('startdate'))
    // {
    //   $this->form_validation->set_rules('startdate','วันที่เริ่มโปรโมชั่น','trim|required');
    //   $this->form_validation->set_rules('enddate','วันสิ้นสุดโปรโมชั่น','trim|required|date_greater_than_or_equal[startdate]');
    // }
    // if ($this->input->post('re_startdate'))
    // {
    //   $this->form_validation->set_rules('enddate','วันสิ้นสุดโปรโมชั่น','trim|required|date_greater_than_or_equal['.$post['re_startdate'].']');
    // }
    $this->form_validation->set_rules('detail','รายละเอียด/เงื่อนไข','trim|required');
    $this->form_validation->set_rules('limits','จำนวนจำกัด','trim|max_length[5]');
    if ($this->form_validation->run() === FALSE)
    {
      $this->session->set_flashdata('warning',validation_errors('<div class="error">','</div>'));
      redirect('admin/promotion?type=event&form=save_event&event_id='.$post['id']);
    }
    if ($this->input->post('product_id') && $this->input->post('group_id'))
    {
      if ( ! count($post['product_id']))
      {
        $this->session->set_flashdata('info','ยังไม่ได้เลือกผลิตภัณฑ์');
        redirect('admin/promotion?type=event&form=save_event&event_id='.$post['id']);
      }
    }

    if ($_FILES['picture']['name'])
      $picture = ($this->input->post('picture')) ? $post['picture'] : date('YmdHis').'.jpg';
      if ( ! strpos($picture,'.jpg'))
        $picture = $picture.'.jpg';
          if ($this->upload_image($picture,'300','120'))
            if ($this->upload_image('large_'.$picture,'960','200'))
              $this->session->set_flashdata('success',lang('message_profile_uploaded'));

    $this->db->trans_start();
      $event = array(
        'enddate' => $post['enddate'],
        'title' => $post['title'],
        'picture' => $post['picture'],
        'limits' => $post['limits'],
        'detail' => $post['detail']
      );
      if ($this->input->post('id'))
      {
        $event['id'] = $post['id'];
      }
      if ($this->input->post('promotion_id'))
      {
        $event['promotion_id'] = $post['promotion_id'];
      }
      if ($this->input->post('startdate'))
      {
        $event['startdate'] = $post['startdate'];
      }
      $this->save($event,'event');
      if ( ! $this->input->post('id'))
      {
        $id = $this->db->insert_id();
        if ($this->input->post('group_id'))
        {
          foreach ($post['group_id'] as $_gp=>$gp)
          {
            $group_id[$_gp]['event_id'] = $id;
            $group_id[$_gp]['group_id'] = $gp;
          }
          $this->db->insert_batch('event_group',$group_id);
        }
        if ($this->input->post('product_id'))
        {
          $product_id = array();
          foreach ($post['product_id'] as $_pd=>$pd)
          {
            $product_id[$_pd]['event_id'] = $id;
            $product_id[$_pd]['product_id'] = $pd;
          }
          $this->db->insert_batch('event_product',$product_id);
        }
      }
    $this->db->trans_complete();
    if ($this->db->trans_status() === FALSE)
    {
      $this->session->set_flashdata('warning',lang('message_form_warning'));
    }
    else
    {
      $this->session->set_flashdata('info','บันทึกข้อมูลอีเว้นต์เสร็จสิ้น');
    }
    redirect('admin/promotion?type=event');
  }

  function upload_image($picture,$width='',$height='',$new_picture='')
  {
    if ($new_picture)
    {
      $picture = $new_picture;
    }
    $width = intval($width) ? $width : '300';
    $height = intval($height) ? $height : '120';
    if ($_FILES['picture']['name'])
    {
      $upload = array(
        'allowed_types'	=> 'jpg|jpeg|png',
        'upload_path'	=> realpath(APPPATH.'../assets/images/promotion'),
        'file_name'	=> $picture,
        'file_ext_tolower' => TRUE,
        'overwrite' => TRUE
      );
      $this->load->library('upload',$upload);
      $this->upload->initialize($upload);
      if ($this->upload->do_upload('picture'))
      {
        $resize = array(
          'image_library' => 'gd2',
          'source_image' => $this->upload->data('full_path'),
          'maintain_ratio' => FALSE,
          'width' => $width,
          'height' => $height
        );
        $this->load->library('image_lib',$resize);
        $this->image_lib->initialize($resize);
        $this->image_lib->resize();
        return TRUE;
      }
      else
      {
        $this->session->set_flashdata('warning',$this->upload->display_errors());
      }
    }
  }

}
