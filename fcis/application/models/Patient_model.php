<?php
defined('BASEPATH') OR exit('No direct scriu access allowed');

class Patient_model extends MY_Model {

	public $table_name = 'patients';

	function find($condition=NULL,$limit=NULL,$offset=0,$order_by=NULL)
	{
		$condition = $this->_filter_data($this->table_name, $condition);
		return $this->db
			->like($condition)
			->limit($limit)
			->offset($offset)
			->order_by($order_by)
			->get($this->table_name)
			->result_array();
	}

}
