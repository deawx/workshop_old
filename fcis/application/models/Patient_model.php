<?php
defined('BASEPATH') OR exit('No direct scriu access allowed');

class Patient_model extends MY_Model {

	public $table_name = 'patients';

	function get_relationship_all($q=null)
	{
		return $this->db
		->like('id_card',$q)
		->or_like('hn',$q)
		->get($this->table_name)
		->result_array();
	}

	function get_relationship_by($q)
	{
		$relationships =  $this->db
			->select('id,title,firstname,lastname,hn,types,groups,relationship')
			->where('relationship_by',$q)
			->where('relationship !=','ผู้ป่วย')
			->get($this->table_name)
			->result_array();

		foreach ($relationships as $key => $value) :
			$relationships[$key]['sex'] = ($value['title'] === 'นาย') ? 'M' : 'F';
		endforeach;

		usort($relationships, function($a, $b) {
			return $a['relationship'] < $b['relationship'];
		});

		return $relationships;
	}

	function find_by_all($q=null, $limit=0, $offset=null)
	{
		return $this->db
			->like('id_card',$q)
			->or_like('hn',$q)
			->limit($limit)
			->offset($offset)
			->get($this->table_name)
			->result_array();
	}

	function find_gallery($id=null)
	{
		$files = $this->db
			// ->select('as.file_name,ap.upload_date,ap.upload_by')
			->order_by('as.id','desc')
			->where('ap.patients_id',$id)
			->where('ap.assets_from is NULL',NULL,FALSE)
			->join('assets_patients as ap','as.id = ap.assets_id')
			->join('users as us','us.id = ap.upload_by')
			->get('assets as as');

		return $files->result_array();
	}

	function search_sample($id=null)
	{
		$sample = $this->db
			->where('patient_id',$id)
			->get('samples');

		return $sample->row_array();
	}

	function search_labs($id=null)
	{
		$labs = $this->db
			->where('patient_id',$id)
			->get('labs');

		return $labs->row_array();
	}

	function search_clinic($id=null)
	{
		$clinic = $this->db
			->where('patient_id',$id)
			->get('clinic');

		return $clinic->row_array();
	}

}
