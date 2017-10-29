<?php
defined('BASEPATH') OR exit('No direct scriu access allowed');

class Assets_model extends MY_Model {

	public $table_name = 'assets';

	function find_gallery($tab=null,$id=null)
	{
		$files = $this->db
			->select('as.id,as.file_type,as.file_name,as.client_name,as.file_size,ap.upload_date,us.username')
			->order_by('as.id','desc')
			->where('ap.patients_id',$id)
			->where('ap.assets_from',$tab)
			->join('assets_patients as ap','as.id = ap.assets_id')
			->join('users as us','us.id = ap.upload_by')
			->get($this->table_name.' as as');

		return $files->result_array();
	}

	function delete($id=null)
	{
		$this->db->where('id',$id)->delete($this->table_name);
		$this->db->where('assets_id',$id)->delete('assets_patients');

		return ;
	}

}
