<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Betting_model extends MY_Model {

  function __construct()
  {
    parent::__construct();
  }

  function get_all() //เลือกดูทั้งหมด
  {
    return $this->db
    ->get('game_betting')
    ->result_array();
  }

  function get_by_id($id) //เลือกดูเฉพาะ ID
  {
    return $this->db
    ->where('id',$id)
    ->get('game_betting')
    ->result_array();
  }
  function select_betting($user_id)
  {
    return $this->db
    ->where('user_id',$user_id)
    ->get('game_betting')
    ->result_array();
  }

  function insert_betting()
  {
    $this->form_validation->set_rules('point', 'จำนวนพ้อยท์เดิมพัน', 'required|numeric|greater_than_equal_to[10]');
    if ($this->form_validation->run() === FALSE)
    {
      $this->session->set_flashdata('danger', 'จำนวนพ้อยท์เดิมพันต้องมากกว่า 10');
    }
    else
    {
      if (time() >= $this->input->post('match_time'))
      {
        $this->session->set_flashdata('warning', 'เวลาเกินกำหนด.');
      }
      else
      {
        $point = $this->db->select('point')->where('id',$this->session->id)->get('user')->row();
        if ($point->point >= $this->input->post('point'))
        {
          $post = array(
            'time' => time(),
            'match_id' => $this->input->post('match_id'),
            'user_id' => $this->session->id,
            'bet' => $this->input->post('bet'),
            'point' => $this->input->post('point'),
            'status' => "process"
          );
          if ($this->db->insert('game_betting',$post))
          {
            $point = $point->point - $this->input->post('point');
            if ($this->db->set('point',$point)->where('id',$this->session->id)->update('user'))
            {
              $this->session->set_flashdata('success', 'ป้อนข้อมูลเรียบร้อยแล้ว.');
            }
            else
            {
              $this->session->set_flashdata('warning', 'ข้อมูลมีปัญหา.');
            }
          }
          else
          {
            $this->session->set_flashdata('warning', 'จำนวนพ้อยท์ที่มีอยู่ไม่เพียงพอ.');
          }
        }
        else
        {
          $this->session->set_flashdata('warning', 'จำนวนพ้อยท์ที่มีอยู่ไม่เพียงพอ.');
        }
      }
    }
    redirect('sportbook');
  }
  function delete_betting($id)
  {
    $this->db
    ->where('id',$id)
    ->delete('game_betting');
    return $this->db->affected_rows();
  }

}
