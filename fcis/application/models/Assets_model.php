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

	function insert($post = null)
	{
		if ( ! $post)
		{
			return FALSE;
		}
		// print_data($post); die();
		if ($this->labs->create_labs($post,$id)) :
			$this->db->insert('users_logs',array(
				'user_id'=>$this->session->user_id,
				'timestamp'=>time(),
				'message'=>'บันทึกข้อมูลผลทางห้องปฎิบัติการเสร็จสิ้น',
				'type'=>'labs',
			));
			$this->session->set_flashdata('message',message_box('บันทึกข้อมูลเสร็จสิ้น','success'));
		endif;
	}

	function delete($id=null)
	{
		$this->db->where('id',$id)->delete($this->table_name);
		$this->db->where('assets_id',$id)->delete('assets_patients');

		return ;
	}

}
