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

}
