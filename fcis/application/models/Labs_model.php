<?php
defined('BASEPATH') OR exit('No direct scriu access allowed');

class Labs_model extends MY_Model {

	public $table_name = 'labs';

	function find_id($id=null)
	{
		$labs = $this->db
			->where('patient_id',$id)
			->get($this->table_name);

		return $labs->row_array();
	}

	function find_type($type=null)
	{
		$result = $this->db
			->select($type)
			->get('labs');

		return $result->result_array();
	}

	function create_labs($post=array(),$id=null)
	{
		$exist = $this->db->where('patient_id',$post['patient_id'])->get($this->table_name);
		$this->db->set($post);

		if ($exist->num_rows() > 0) :
			$this->db->where('patient_id',$post['patient_id']);
			$this->db->update($this->table_name);
		else:
			$this->db->insert($this->table_name);
		endif;

		$this->session->set_flashdata('message',message_box('บันทึกข้อมูลเสร็จสิ้น','success'));
		return ;
	}

}
