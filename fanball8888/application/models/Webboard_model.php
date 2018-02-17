<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Webboard_model extends MY_Model {

  function __construct()
  {
    parent::__construct();
  }

  function save_topic($post)
  {
    $this->form_validation->set_rules('title','ชื่อหัวข้อ','trim|required|max_length[255]');
    $this->form_validation->set_rules('category_id','ชื่อประเภท','trim|required');
    $this->form_validation->set_rules('content','เนื้อหา','trim|required');
    if ($this->form_validation->run() === FALSE)
    {
      return FALSE;
    }
    if ((string)$this->input->post('captcha') !== (string)$this->session->captcha)
    {
      $this->session->set_flashdata('warning',lang('message_security_code'));
      redirect($this->agent->referrer());
    }
    unset($post['captcha']);
    $this->db->trans_start();
      if ($this->input->post('id'))
      {
        $post['edt_by'] = $this->session->id;
        $post['edt_ip_address'] = sprintf('%u',ip2long($this->input->ip_address()));
        $post['edt_datetime'] = date('d/m/Y H:i:s');
        $this->db->set($post)->where('id',$post['id'])->update('webboard_topic');
      }
      else
      {
        $post['user_id'] = $this->session->id;
        $post['ip_address'] = sprintf('%u',ip2long($this->input->ip_address()));
        $post['datetime'] = date('d/m/Y H:i:s');
        $this->db->insert('webboard_topic',$post);
        $this->db->set('count','count+1',FALSE)->where('id',$post['category_id'])->update('webboard_category');
      }
    $this->db->trans_complete();
    if ($this->db->trans_status() === FALSE)
    {
      $this->session->set_flashdata('warning',lang('message_form_warning'));
      redirect($this->agent->referrer());
    }
    else
    {
      $this->session->set_flashdata('success',lang('message_form_success'));
      redirect('webboard');
    }
  }

  function save_comment($post)
  {
    $this->form_validation->set_rules('comment',lang('form_comment'),'trim|required');
    if ($this->form_validation->run() === FALSE)
    {
      return FALSE;
    }
    if ((string)$this->input->post('captcha') !== (string)$this->session->captcha)
    {
      $this->session->set_flashdata('warning',lang('message_security_code'));
      redirect($this->agent->referrer());
    }
    $post['ip_address'] = sprintf('%u',ip2long($this->input->ip_address()));
    unset($post['captcha']);
    $post['comment'] = auto_typography($post['comment'],TRUE);
    if ($this->input->post('id'))
    {
      $check_pinned = $this->db->where(array('id'=>$this->input->post('id'),'status'=>'1'))->get('webboard_comment');
      if ($check_pinned->num_rows())
      {
        $this->session->set_flashdata('warning','คอมเม้นต์นี้ได้รับการปักหมุด ไม่อนุญาตให้แก้ไข โปรดติดต่อผู้ดูแล');
        redirect($this->agent->referrer());
        return FALSE;
      }
      $edittime = date('d/m/Y H:i:s');
      $post['edited'] = $post['edited'].'__'.$edittime.nbs().'<br>';
      $post['modified'] = $edittime;
      $this->db->set($post)->where('id',$post['id'])->update('webboard_comment');
      return TRUE;
    }
    else
    {
      $post['datetime'] = date('d/m/Y H:i:s');
      $sort = $this->db->select_max('sort')->where('webboard_topic_id',$post['webboard_topic_id'])->get('webboard_comment')->row_array();
      $post['sort'] = $sort['sort']+1;
      $this->db->insert('webboard_comment',$post);
      $this->db->set('comments','comments+1',FALSE)->where('id',$post['webboard_topic_id'])->update('webboard_topic');
      return TRUE;
    }
    return FALSE;
  }

  function save_category($post)
  {
    if ($this->input->post('name') === $this->input->post('re_name'))
    {
      $this->form_validation->set_rules('name','ชื่อประเภทเว็บบอร์ด','trim|required|max_length[100]');
    }
    else
    {
      $this->form_validation->set_rules('name','ชื่อประเภทเว็บบอร์ด','trim|required|max_length[100]|is_unique[webboard_category.name]');
    }
    if ($this->form_validation->run() === FALSE)
      return FALSE;

    $save['id'] = $this->input->post('id');
    $save['name'] = $this->input->post('name');
    if ($this->input->post('id'))
    {
      $this->db->set($save)->where('id',$save['id'])->update('webboard_category');
    }
    else
    {
      $sort = $this->db->select_max('sort')->get('promotion')->row_array();
      $save['sort'] = $sort['sort']+1;
      $this->db->set($save)->insert('webboard_category');
    }
    $this->session->set_flashdata('info',lang('message_form_success'));
    redirect('admin/webboard?type=category');
  }

  function view_up($id)
  {
    if ((int)$id > 0)
    {
      $this->db->set('views','views+1',FALSE)->where('id',$id)->update('webboard_topic');
    }
    return FALSE;
  }

  function pin_topic($id,$status)
  {
    if ((int)$id > 0 && (int)$status > 0)
    {
      $user = $this->db->select('user_id,status')->where('id',$id)->get('webboard_topic')->row_array();
      if ($user['user_id'] === $this->session->id OR $this->session->admin)
      {
        $stats = ($user['status'] === $status) ? '1' : $status;
        $this->db->set(array('status'=>$stats))->where('id',$id)->update('webboard_topic');
        return TRUE;
      }
    }
    return FALSE;
  }

  function remove_topic($id)
  {
    if ((int)$id > 0)
    {
      $user = $this->db->select('user_id')->where('id',$id)->get('webboard_topic')->row_array();
      if ($user['user_id'] === $this->session->id OR $this->session->admin)
      {
        $category = $this->db->select('category_id')->where('id',$id)->get('webboard_topic')->row_array();
        if ($category)
        {
          $this->db->where('id',$id)->delete('webboard_topic');
          $count = $this->db->where('category_id',$category['category_id'])->count_all_results('webboard_topic');
          $this->db->set(array('count'=>$count))->where('id',$category['category_id'])->update('webboard_category');
          return TRUE;
        }
      }
    }
    return FALSE;
  }

  function pin_comment($id)
  {
    if ((int)$id > 0)
    {
      $comment = $this->db->select('status')->where('id',$id)->get('webboard_comment');
      if ($comment->num_rows())
      {
        $stat = $comment->row_array();
        $status = ($stat['status'] === '1') ? '0' : '1';
        $this->db->set(array('status'=>$status))->where('id',$id)->update('webboard_comment');
        return TRUE;
      }
    }
    return FALSE;
  }

  function remove_comment($id)
  {
    if ((int)$id > 0)
    {
      $topic = $this->db->select('webboard_topic_id,user_id')->where('id',$id)->get('webboard_comment')->row_array();
      if ($topic['user_id'] === $this->session->id OR $this->session->admin)
      {
        if ((int)$topic > 0)
        {
          $cmt = $this->db->select('webboard_topic_id')->where('id',$id)->get('webboard_comment')->row_array();
          if ($cmt)
          {
            $this->db->where('id',$id)->delete('webboard_comment');
            $count = $this->db->where('webboard_topic_id',$cmt['webboard_topic_id'])->count_all_results('webboard_comment');
            $this->db->set(array('comments'=>$count))->where('id',$cmt['webboard_topic_id'])->update('webboard_topic');
            return TRUE;
          }
        }
      }
    }
    return FALSE;
  }

  function save_terms()
  {
    $this->db->insert('predict',array('terms'=>'RND'.time()));
    if ($this->db->affected_rows())
    {
      return TRUE;
    }
    return FALSE;
  }

  function save_sets($terms)
  {
    if ($_FILES['excels']['name'])
    {
      $file_name = time();
      $upload = array(
        'allowed_types'	=> 'xls',
        'upload_path'	=> APPPATH.'../excels',
        'file_name'	=> $file_name.'.xls',
        'file_ext_tolower' => TRUE,
        'overwrite' => TRUE
      );
      $this->load->library('upload');
      $this->upload->initialize($upload);
      if ($this->upload->do_upload('excels'))
      {
        $this->load->library('excel_reader');
        $this->excel_reader->setOutputEncoding('UTF-8');
        $this->excel_reader->read('excels/'.$file_name.'.xls');
        $worksheet = $this->excel_reader->sheets[0];
        $cells = $worksheet['cells'];
        echo ($cells[1][1]);
        dump($cells);
        die();
        $this->db
          ->set(array(
            'terms' => $terms,
            'sets' => $cells[1][1],
            'teams' => ''
          ))
          ->insert('predict');
        return TRUE;
      }
    }
    return FALSE;
  }

}
