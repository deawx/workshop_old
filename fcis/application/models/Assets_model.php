<?php
defined('BASEPATH') OR exit('No direct scriu access allowed');

class Assets_model extends MY_Model {

	public $table_name = 'assets';

	function find_gallery($tab=null,$id=null)
	{
		$files = $this->db
			->select('as.id,as.file_name,as.client_name,as.file_size,as.upload_date,us.username')
			->order_by('as.id','desc')
			->where('al.patients_id',$id)
			->where('al.assets_from',$tab)
			->join('users as us','us.id = as.upload_by')
			->join('assets_patients as al','as.id = al.assets_id')
			->get($this->table_name.' as as');

		return $files->result_array();
	}

	function delete($id=null)
	{
		if ($this->db
			->where('id',$id)
			->delete($this->table_name)) :
			return $this->db
				->where('assets_id',$id)
				->delete('assets_patients');
		endif;

		return FALSE;
	}

}
