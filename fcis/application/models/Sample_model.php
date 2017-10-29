<?php
defined('BASEPATH') OR exit('No direct scriu access allowed');

class Sample_model extends MY_Model {

	public $table_name = 'samples';

	function find_list($view='fap')
	{
		return $this->db
			// ->select('pt.*,sp.*')
			->where('sp.fcc_group',$view)
			// ->join('patients as pt','pt.id=sp.patient_id')
			->get('samples as sp')
			->result_array();
	}

	function create_inpatient($post=array())
	{
		$exist = $this->db->where('patient_id',$post['patient_id'])->get($this->table_name);
		$post = $this->_filter_data($this->table_name,$post);
		$this->db->set($post);

		if ($exist->num_rows() > 0) :
			$this->db->where('patient_id',$post['patient_id']);
			$this->db->update($this->table_name);
		else:
			$this->db->insert($this->table_name);
		endif;

		if ($this->db->affected_rows()) :
			$this->session->set_flashdata('message',message_box('บันทึกข้อมูลเสร็จสิ้น','success'));
			return $this->db->affected_rows();
		endif;
	}

	function create_outpatient($post=array(),$id=null)
	{
		$exist = $this->db->where('id',$id)->get($this->table_name);
		$post = $this->_filter_data($this->table_name,$post);
		$this->db->set($post);

		if ($exist->num_rows()) :
			$this->db->where('id',$id);
			$this->db->update($this->table_name);
		else:
			$this->db->insert($this->table_name);
			$id = $this->db->insert_id();
		endif;

		if ($this->db->affected_rows()) :
			$this->session->set_flashdata('message',message_box('บันทึกข้อมูลเสร็จสิ้น','success'));
			return $id;
		endif;
	}

}
