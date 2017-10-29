<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Genogram extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
		$this->allow_group_access(array('special','admin'));
		$this->load->model('Patient_model','patient');
		$this->data['page_header'] = 'ข้อมูลความสัมพันธ์ทางครอบครัว';
		$this->data['page_header_small'] = 'รายละเอียดข้อมูล';
		$this->data['parent_menu'] = 'genogram';
	}

	function index()
	{
		$q = $this->input->get('q');
		$results = array();
		if ($q)
			$results = $this->patient->get_relationship_all($q);

		foreach ($results as $key => $value) :
			if ($value['relationship'] !== 'ผู้ป่วย') :
				unset($results[$key]);
			endif;
		endforeach;

		$this->data['results'] = $results;
		$this->data['content'] = $this->load->view('admin/genogram/index',$this->data,TRUE);
		$this->data['sidebar'] = $this->load->view('admin/parts/sidebar',$this->data,TRUE);
		$this->load->view('admin/genogram',$this->data);
	}

	function chart($id)
	{
		$patient = $this->db->where('id',$id)->get('patients')->row_array();
		$this->data['patient'] = $this->patient->search_id($id);
		$this->data['patients'] = $this->patient->get_relationship_by($patient['hn']);
		$this->data['content'] = $this->load->view('admin/genogram/chart',$this->data,TRUE);
		$this->data['sidebar'] = $this->load->view('admin/parts/sidebar',$this->data,TRUE);
		$this->load->view('admin/genogram',$this->data);
	}

}
