<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends MY_Model {

  function save_profile($post)
  {
    $score = '0';
    $reply = '1';
    $correct = array();
    for ($i='0';$i<'10';$i++) {
      $r = $post['q_'.$reply];
      $a = $post['a_'.$reply];
      if ($a == $r) {
        $correct[$post['qid'][$i]] = $a;
        $score++;
      }
      $reply++;
    }
    if ($score == '0') {
      $this->session->set_flashdata('info','คุณได้ '.$score.' คะแนน ต้องทำการสอบใหม่');
    }else{
      $save_profile = array(
        'student_id' => $this->session->id,
        'topic_id' => $post['topic_id'],
        $post['exam'].'_score' => $score,
        $post['exam'].'_correct' => serialize($correct)
      );
      if ($this->input->post('id')) {
        $save = $this->db
        ->set(array(
          $post['exam'].'_score' => $score,
          $post['exam'].'_correct' => serialize($correct)
          ))
          ->where('id',$this->input->post('id'))
          ->update('profile');
        }
        else
        {
          $save = $this->db->insert('profile',$save_profile);
        }
        if ($save)
        {
          $this->session->set_flashdata('success','บันทึก '.$score.' คะแนนแล้ว');
        }
    }

    redirect('content/'.$post['topic_id']);
  }

  function save_exam($post)
  {
    $score = '0';
    for ($i='1';$i<'61';$i++) {
      $a = $post['answer_'.$i];
      $r = $post['question'.$i];
      if ($a == $r) {
        $score++;
      }
    }
    $grade = '0';
    if ($score >= 50) {
      $grade = '4';
    }elseif ($score >= 40) {
      $grade = '3';
    }elseif ($score >= 30) {
      $grade = '2';
    }elseif ($score >= 20) {
      $grade = '1';
    }elseif ($score <= 19) {
      $this->session->set_flashdata('info','คุณได้น้อยกว่า 20 คะแนน ต้องทำการสอบใหม่');
      redirect($this->agent->referrer());
    }
    $this->db->set(array('score_exam'=>$score,'score_grade'=>$grade))->where('id',$this->session->id)->update('student');
    $this->session->set_flashdata('success','คุณได้ทำการเรียนจนจบหลักสูตรแล้ว');
    redirect('main');
  }

  function save_instructor($post)
  {
    if ($this->input->post('re_user') === $this->input->post('user')) {
      $this->form_validation->set_rules('user','ชื่อผู้ใช้','trim|required');
    }else{
      $this->form_validation->set_rules('user','ชื่อผู้ใช้','trim|required|is_unique[instructor.user]');
    }
    $this->form_validation->set_rules('pass','รหัสผ่าน','trim|required');
    $this->form_validation->set_rules('name','ชื่อ-นามสกุล','trim|required');
    $this->form_validation->set_rules('address','ที่อยู่','trim|required');
    $this->form_validation->set_rules('educate','ประวัติการศึกษา','trim|required');

    if ($this->form_validation->run() === FALSE)
      return FALSE;

    unset($post['re_user']);
    if ($this->input->post('id')) {
      $this->db->set($post)->where('id',$post['id'])->update('instructor');
    }else{
      $this->db->insert('instructor',$post);
    }
    $this->session->set_flashdata('success','บันทึกข้อมูล '.$post['name'].' แล้ว');

    if ($this->session->id === $this->input->post('id'))
      $this->session->set_userdata($post);

    redirect('admin/user');
  }

  function save_student($post)
  {
    if ($this->input->post('re_user') === $this->input->post('user')) {
      $this->form_validation->set_rules('user','ชื่อผู้ใช้','trim|required');
    }else{
      $this->form_validation->set_rules('user','ชื่อผู้ใช้','trim|required|is_unique[student.user]');
    }
    $this->form_validation->set_rules('pass','รหัสผ่าน','trim|required');
    $this->form_validation->set_rules('name','ชื่อ-นามสกุล','trim|required');
    $this->form_validation->set_rules('email','อีเมล์','trim|required|valid_email');
    $this->form_validation->set_rules('phone','โทรศัพท์','trim|required|is_numeric');
    $this->form_validation->set_rules('address','ที่อยู่','trim|required');

    if ($this->form_validation->run() === FALSE)
      return FALSE;

    unset($post['re_user']);
    if ($this->input->post('id')) {
      $this->db->set($post)->where('id',$post['id'])->update('student');
    }else{
      $this->db->insert('student',$post);
    }
    $this->session->set_flashdata('success','บันทึกข้อมูล '.$post['name'].' แล้ว');

    if ($this->session->id === $this->input->post('id'))
      $this->session->set_userdata($post);

    if ($this->session->role == 'student')
      redirect('user/'.$this->session->id);

    redirect('admin/user');
  }

  function login($post)
  {
    $user = $this->db->where(array('user'=>$post['user'],'pass'=>$post['pass']))->get($post['role']);
    if ($user->num_rows() < 1) :
      $this->session->set_flashdata('danger','ชื่อผู้ใช้หรือรหัสผ่านผิด');
    else:
      $user = $user->row_array();
      $user['login'] = TRUE;
      $user['role'] = $post['role'];
      $this->session->set_userdata($user);
    endif;
    redirect('user/login');
  }

}
