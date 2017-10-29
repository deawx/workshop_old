<?php
defined('BASEPATH') OR exit('No direct scriu access allowed');

class Clinic_model extends MY_Model {

	public $table_name = 'clinic';

	function find_id($id=null)
	{
		$labs = $this->db
			->where('patient_id',$id)
			->get($this->table_name);

		return $labs->row_array();
	}

	function create_clinic($post=array(),$id=null)
	{
		$exist = $this->db->where('patient_id',$post['patient_id'])->get($this->table_name);
		$this->db->set($post);

		if ($exist->num_rows()) :
			$this->db->where('patient_id',$post['patient_id']);
			$this->db->update($this->table_name);
		else:
			$this->db->insert($this->table_name);
		endif;

		$this->session->set_flashdata('message',message_box('บันทึกข้อมูลเสร็จสิ้น','success'));
		return $this->db->affected_rows();
	}

}
