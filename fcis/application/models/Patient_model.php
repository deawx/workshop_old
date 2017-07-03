<?php
defined('BASEPATH') OR exit('No direct scriu access allowed');

class Patient_model extends MY_Model {

	public $table_name = 'patients';

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

	function find_gallery($id=null)
	{
		$files = $this->db
			->select('as.file_name,as.upload_date,as.upload_by')
			->order_by('as.id','desc')
			->where('ap.patients_id',$id)
			->join('assets_patients as ap','as.id = ap.assets_id')
			->get('assets as as');

		return $files->result_array();
	}

}
