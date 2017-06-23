<?php
defined('BASEPATH') OR exit('No direct scriu access allowed');

class Patient_model extends MY_Model {

	public $table_name = 'patients';

	// public function __construct()
	// {
	// 	parent::__construct();
	// }

	function find_by_all($q=null, $limit=0, $offset=null)
	{
		return $this->db
			->like('id_card',$q)
			->or_like('hn',$q)
			->or_like('firstname',$q)
			->or_like('lastname',$q)
			->limit($limit)
			->offset($offset)
			->get($this->table_name)
			->result_array();
	}

}
