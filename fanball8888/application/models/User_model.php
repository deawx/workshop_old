<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends MY_Model {
  public $table_name = 'user';

  function get_by_id($id)
  {
  	return $this->db
      ->where('id',$id)
      ->get('user')
      ->row_array();
  }
  function register($post)
  {
    if ((int)$this->input->post('captcha') !== (int)$this->session->captcha) :
      $this->session->set_flashdata('warning',lang('message_security_code'));
      redirect($this->agent->referrer());
    endif;

    $this->form_validation->set_rules('username',lang('form_username'),'trim|required|max_length[100]|is_unique[user.username]|alpha_numeric|username_reserve');
    $this->form_validation->set_rules('password',lang('form_password'),'trim|required|exact_length[8]|alpha_numeric');
    $this->form_validation->set_rules('password_confirm',lang('form_password_confirm'),'trim|required|exact_length[8]|matches[password]');
    $this->form_validation->set_rules('fullname',lang('form_fullname'),'trim|required|max_length[100]');
    $this->form_validation->set_rules('email',lang('form_email'),'trim|required|max_length[100]|valid_email|is_unique[user.email]');
    $this->form_validation->set_rules('phone',lang('form_phone'),'trim|required|max_length[10]|is_numeric');
    $this->form_validation->set_rules('account_bank',lang('account_bank'),'trim|required');
    $this->form_validation->set_rules('account_name',lang('account_name'),'trim|required|max_length[100]');
    $this->form_validation->set_rules('account_number',lang('account_number'),'trim|required|max_length[20]|is_numeric');
    if ($this->form_validation->run() === FALSE)
      return FALSE;

    $this->db->trans_start();
      $datetime = date('d/m/Y H:i:s');
      $user = array(
        'picture' => date('YmdHis').'.jpg',
        'hash' => strtolower($post['password']),
        'security_question' => $post['security_question'],
        'security_answer' => strtolower($post['security_answer']),
        'username' => strtolower($post['username']),
        'password' => password_hash(strtolower($post['username']).strtolower($post['password']),PASSWORD_BCRYPT,array('cost'=>'12','salt'=>mcrypt_create_iv(22, MCRYPT_DEV_URANDOM))),
        'fullname' => $post['fullname'],
        'email' => $post['email'],
        'phone' => $post['phone'],
        'created' => $datetime,
        'created_ip' => ip2long($this->input->ip_address()),
        'updated' => $datetime,
        'logged' => $datetime,
        'status' => '1'
      );
      $this->save($user);
      $this->db->insert('user_bank',array(
        'user_id' => $this->db->insert_id(),
        'account_name' => $post['account_name'],
        'account_bank' => $post['account_bank'],
        'account_number' => $post['account_number']
      ));
    $this->db->trans_complete();
    if ($this->db->trans_status() === FALSE) :
      $this->session->set_flashdata('warning','ระบบขัดข้อง ลองใหม่ภายหลัง');
      redirect($this->agent->referrer());
    endif;

    $this->session->set_flashdata('info','การสมัครสมาชิกเสร็จสิ้น สามารถเข้าสู่ระบบได้');
    redirect('user/login');
  }

  function login($post)
  {
    if ((int)$this->input->post('captcha') != (int)$this->session->captcha)
    {
      $this->session->set_flashdata('warning',lang('message_security_code'));
      redirect('user/login');
    }
    unset($post['captcha']);
    $username = $this->db
      ->select('username,status')
      ->where(array('username'=>strtolower($post['username'])))
      ->get('user');
    if ($username->num_rows() !== 1)
    {
      $this->session->set_flashdata('warning',lang('message_invalid_username'));
    }
    else
    {
      $user = $username->row();
      if ((int)$user->status < 1)
      {
        $this->session->set_flashdata('warning',lang('message_status_waiting'));
      }
      else
      {
        $password = $this->db
          ->select('password')
          ->where('username',strtolower($post['username']))
          ->get('user')
          ->row();
        if ( ! password_verify(strtolower($post['username']).strtolower($post['password']),$password->password))
        {
          $this->session->set_flashdata('danger',lang('message_incorrect_password'));
        }
        else
        {
          $user = $this->db
            ->select('id,picture,username,fullname,email,phone,created,updated,logged,status,role')
            ->where('username',strtolower($post['username']))
            ->get('user')
            ->row_array();
          $user_group = $this->db
            ->select('group_id')
            ->where('user_id',$user['id'])
            ->get('user_group')
            ->result_array();
          $user['group'] = array();
          foreach ($user_group as $ug)
          {
            $user['group'][] = $ug['group_id'];
          }
          $this->db->trans_start();
            $this->save(array(
              'id' => $user['id'],
              'logged' => date('d/m/Y H:i:s'),
              'logged_ip' => ip2long($this->input->ip_address()),
              'online' => '1'
            ));
          $this->db->trans_complete();
          if ($this->db->trans_status() === FALSE)
          {
            $this->session->set_flashdata('warning','ระบบขัดข้อง ลองใหม่ภายหลัง');
          }
          else
          {
            $this->session->set_userdata($user);
            $this->session->set_userdata('login',TRUE);
            if ($user['role'] === '1')
            {
              $this->session->set_userdata('admin',TRUE);
            }
          }
        }
      }
    }

    if ($this->session->has_userdata('login'))
    {
      redirect('homepage');
    }
    else
    {
      redirect('user/login');
    }
  }

  function update($post)
  {
    if ($this->input->post('re_email') !== $this->input->post('email'))
      $this->form_validation->set_rules('email',lang('form_email'),'trim|required|max_length[100]|valid_email|is_unique[user.email]');

    if ($this->input->post('old_password')) :
      $this->form_validation->set_rules('old_password',lang('form_password_old'),'trim|required|exact_length[8]');
      $this->form_validation->set_rules('new_password',lang('form_password_new'),'trim|required|exact_length[8]|differs[old_password]');
      $this->form_validation->set_rules('new_password_confirm',lang('form_password_confirm'),'trim|required|exact_length[8]|matches[new_password]');
    endif;

    $this->form_validation->set_rules('fullname',lang('form_fullname'),'trim|required|max_length[100]');
    $this->form_validation->set_rules('phone',lang('form_phone'),'trim|required|max_length[10]|is_numeric');

    if ($this->input->post('re_username') !== $this->input->post('username'))
      $this->form_validation->set_rules('username',lang('form_username'),'trim|required|max_length[100]|is_unique[user.username]');

    if ($this->input->post('password') && $this->input->post('password_confirm')) :
      $this->form_validation->set_rules('password',lang('form_password'),'trim|required|exact_length[8]|alpha_numeric');
      $this->form_validation->set_rules('password_confirm',lang('form_password_confirm'),'trim|required|exact_length[8]|alpha_numeric|matches[password]');
    endif;
    if ($this->form_validation->run() === FALSE)
      return FALSE;

    $updated = date('d/m/Y H:i:s');
    $save = array(
      'fullname' => $post['fullname'],
      'email' => $post['email'],
      'phone' => $post['phone'],
      'updated' => $updated
    );

    if ($this->input->post('id'))
      $save['id'] = $this->input->post('id');

    if ($this->input->post('username') && $this->input->post('password')) :
      $save['picture'] = $post['picture'].'.jpg';
      $save['hash'] = strtolower($post['password']);
      $save['username'] = strtolower($post['username']);
      $save['password'] = password_hash(strtolower($post['username']).strtolower($post['password']),PASSWORD_BCRYPT,array('cost'=>'12','salt'=>mcrypt_create_iv(22, MCRYPT_DEV_URANDOM)));
      $save['created'] = $updated;
    endif;

    if ($this->input->post('group_id'))
    {
      foreach ($post['group_id'] as $_gp=>$gp)
      {
        $group[$_gp]['user_id'] = $post['id'];
        $group[$_gp]['group_id'] = $gp;
      }
    }

    if ($this->input->post('old_password')) :
      $password = $this->db->select('password')->where('id',$this->session->id)->get('user')->row();
      if ( ! password_verify($post['username'].strtolower($post['old_password']),$password->password)) :
        $this->session->set_flashdata('danger',lang('message_incorrect_password'));
        redirect($this->agent->referrer());
      else:
        $save['hash'] = $post['new_password'];
        $save['password'] = password_hash($post['username'].$post['new_password'],PASSWORD_BCRYPT,array('cost'=>'12','salt'=>mcrypt_create_iv(22,MCRYPT_DEV_URANDOM)));
      endif;
    endif;

    if ($_FILES['picture']['name'])
    {
      $picture = $post['picture'];
      if ( ! strpos($picture,'.jpg'))
      {
        $picture = $picture.'.jpg';
      }
      $this->upload_image($picture);
    }

    if ($this->save($save))
    {
      if ($this->input->post('group_id'))
      {
        $this->db->where('user_id',$post['id'])->delete('user_group');
        $this->db->insert_batch('user_group',$group);
      }
      $this->session->set_flashdata('success',lang('message_form_success'));
    }
    else
    {
      $this->session->set_flashdata('info',lang('message_form_info'));
    }

    if ($post['id'] === $this->session->id)
      $this->session->set_userdata(array(
        'fullname' => $save['fullname'],
        'email' => $save['email'],
        'phone' => $save['phone'],
        'updated' => $updated
      ));

    redirect($this->agent->referrer());
  }

  function change_password($post)
  {
    if ($this->input->post('old_password')) :
      $password = $this->db->select('password')->where('id',$post['id'])->get('user')->row();
      if ( ! password_verify($this->session->username.$post['old_password'],$password->password)) :
        $this->session->set_flashdata('danger',lang('message_incorrect_password'));
        redirect($this->agent->referrer());
      endif;
    endif;

    $this->form_validation->set_rules('old_password',lang('form_password_old'),'trim|required|exact_length[8]');
    $this->form_validation->set_rules('new_password',lang('form_password_new'),'trim|required|exact_length[8]|differs[old_password]');
    $this->form_validation->set_rules('new_password_confirm',lang('form_password_confirm'),'trim|required|exact_length[8]|matches[new_password]');

    if ($this->form_validation->run() === FALSE)
      return FALSE;

    $password = password_hash($this->session->username.$post['new_password'],PASSWORD_BCRYPT,array('cost'=>'12','salt'=>mcrypt_create_iv(22,MCRYPT_DEV_URANDOM)));
    if ($this->save(array(
      'id' => $post['id'],
      'hash' => $post['new_password'],
      'password'=>$password
    ))) :
      $this->session->set_flashdata('info',lang('message_password_changed'));
    else:
      $this->session->set_flashdata('warning',lang('message_password_changed'));
    endif;
    redirect($this->agent->referrer());
  }

  function forgot_password($post)
  {
    $this->form_validation->set_rules('security_question',lang('form_security_question'),'trim|required|max_length[100]');
    $this->form_validation->set_rules('security_answer',lang('form_security_answer'),'trim|required|max_length[50]');
    $this->form_validation->set_rules('password',lang('form_password'),'trim|required|exact_length[8]');
    $this->form_validation->set_rules('password_confirm',lang('form_password_confirm'),'trim|required|exact_length[8]|matches[password]');
    $this->form_validation->set_rules('username',lang('form_username'),'trim|required|max_length[100]');
    $this->form_validation->set_rules('phone',lang('form_phone'),'trim|required|max_length[10]');
    if ($this->form_validation->run() === FALSE)
    {
      return FALSE;
    }
    if ((int)$this->input->post('captcha') !== (int)$this->session->captcha)
    {
      $this->session->set_flashdata('warning',lang('message_security_code'));
      redirect($this->agent->referrer());
      return FALSE;
    }
    $security = $this->db
      ->where('security_question',$post['security_question'])
      ->where('security_answer',$post['security_answer'])
      ->where('username',$post['username'])
      ->where('phone',$post['phone'])
      ->get('user');
    if ($security->num_rows())
    {
      $security = $security->row_array();
      if ( ! $security['security_question'] OR ! $security['security_answer'])
      {
        $this->session->set_flashdata('warning',lang('message_security_none'));
      }
      else
      {
        $this->db->set(array(
            'hash' => $post['password'],
            'password' => password_hash($post['username'].$post['password'],PASSWORD_BCRYPT,array('cost'=>'12','salt'=>mcrypt_create_iv(22,MCRYPT_DEV_URANDOM))),
            'updated' => date('d/m/Y H:i:s')
          ))
          ->where('username',$post['username'])
          ->where('phone',$post['phone'])
          ->update('user');
        if ($this->db->affected_rows())
        {
          $this->session->set_flashdata('success',lang('message_form_success'));
        }
        else
        {
          $this->session->set_flashdata('warning',lang('message_form_warning'));
        }
      }
    }
    else
    {
      $this->session->set_flashdata('info',lang('message_form_info'));
    }
    redirect('user/forgot_password');

    return FALSE;
  }

  function upload_image($picture)
  {
    if ($_FILES['picture']['name']) :
      $upload = array(
        'allowed_types'	=> 'jpg|jpeg|png',
        'upload_path'	=> realpath(APPPATH.'../assets/images/user'),
        'file_name'	=> $picture,
        'file_ext_tolower' => TRUE,
        'overwrite' => TRUE
      );
      $this->load->library('upload');
      $this->upload->initialize($upload);
      if ($this->upload->do_upload('picture')) :
        $resize = array(
          'image_library' => 'gd2',
          'source_image' => $this->upload->data('full_path'),
          'maintain_ratio' => FALSE,
          'width' => '200',
          'height' => '200'
        );
        $this->load->library('image_lib');
        $this->image_lib->initialize($resize);
        $this->image_lib->resize();
        return TRUE;
      else:
        $this->session->set_flashdata('warning',$this->upload->display_errors());
      endif;
    endif;
  }

}
