<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attachments extends Admin_Controller {

	public function __construct(){
		parent::__construct();
		$this->allow_group_access(array('special','admin'));
		$this->load->model('Patient_model','patient');
		$this->load->model('Assets_model','assets');

		$this->data['page_header'] = 'ข้อมูลเอกสารและรูปภาพประกอบ';
		$this->data['page_header_small'] = 'รายละเอียดข้อมูล';
		$this->data['parent_menu'] = 'attachments';
	}

	public function index()
	{
		$q = $this->input->get('q');
		$results = array();
		if ($q)
			$results = $this->patient->find_by_all($q);

		$this->data['results'] = $results;
		$this->render('admin/attachments/index');
	}

	public function view($id = null)
	{
		if($id == null){
			$id = $this->input->post('id');
		}

		$this->data['results'] = $results;
		$this->render('admin/attachments/view');
	}

	public function upload()
	{
		if ( ! intval($id) > 0) :
			$this->session->set_flashdata('message',message_box('no record found, check your data','danger'));
			redirect('admin/labs');
		else:
			$this->form_validation->set_rules('endoscope','ผลตรวจการส่องกล้อง','required');
			if ($this->form_validation->run() === FALSE) :
				$this->session->set_flashdata('message',message_box(validation_errors(),'danger'));
			else:
				$post = $this->input->post();
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
			endif;
		endif;
	}

	public function delete($id = null)
	{
		// if(!empty($id)){
		// 	$this->Group->delete($id);
		// 	$this->session->set_flashdata('message',message_box('Group has been deleted','success'));
		// 	redirect('admin/groups/index');
		// }else{
		// 	$this->session->set_flashdata('message',message_box('Invalid id','danger'));
		// 	redirect('admin/groups/index');
		// }
	}
}
