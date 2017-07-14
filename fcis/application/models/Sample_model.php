<?php
defined('BASEPATH') OR exit('No direct scriu access allowed');

class Sample_model extends MY_Model {

	public $table_name = 'sample';

	// public function __construct()
	// {
	// 	parent::__construct();
	// }

	function find_list($view='fap')
	{
		return $this->db
			->select('pt.*,sp.*')
			->where('sp.fcc',$view)
			->join('patients as pt','pt.id=sp.patient_id')
			->get('samples as sp')
			->result_array();
	}

}
