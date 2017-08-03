<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
URL สำหรับหัวข้อ
*/

class Schedule extends Private_Controller {

	private $id;

	public function __construct()
	{
		parent::__construct();
    $this->load->model('Profile_model','profile');
    $this->load->model('Ion_auth_model','auth');
		$this->id = $this->session->user_id;
    $this->data['parent'] = 'account';
    $this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
		$this->data['user'] = $this->auth->user($this->id)->row_array();
	}

	public function index()
	{
		$this->data['menu'] = 'index';
		$this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
		$this->data['rightbar'] = $this->load->view('_partials/rightbar',$this->data,TRUE);
		$this->data['body'] = $this->load->view('schedule/index',$this->data,TRUE);
		$this->load->view('_layouts/rightside',$this->data);
	}

	function standard($step='1')
	{
		$this->session->set_flashdata('warning','');
		$step = (intval($step) <= 4) ? $step : '1';
		$this->data['step'] = $step;
		$this->data['prev'] = $step-1;
		$this->data['next'] = $step+1;

		$post = $this->input->post();
		if ($post) :
			$this->form_validation->set_rules('used_to','ff','required');
			if ($this->form_validation->run() === TRUE) :
				// print_data($this->input->post());
				redirect('account/schedule/standard/'.$this->data['next']);
			else:
				$this->session->set_flashdata('warning',validation_errors());
			endif;
		endif;

		$this->data['css'] = array(link_tag('assets/css/editable-select.min.css'));
		$this->data['js'] = array(script_tag('assets/js/editable-select.min.js'));
		$this->data['menu'] = 'standard';
		$this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
		$this->data['rightbar'] = $this->load->view('_partials/rightbar',$this->data,TRUE);
		$this->data['body'] = $this->load->view('schedule/standard',$this->data,TRUE);
		$this->load->view('_layouts/rightside',$this->data);
	}

	function skill()
	{
		$this->data['menu'] = 'skill';
		$this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
		$this->data['rightbar'] = $this->load->view('_partials/rightbar',$this->data,TRUE);
		$this->data['body'] = $this->load->view('schedule/skill',$this->data,TRUE);
		$this->load->view('_layouts/rightside',$this->data);
	}

	function result()
	{
		$this->data['menu'] = 'result';
		$this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
		$this->data['rightbar'] = $this->load->view('_partials/rightbar',$this->data,TRUE);
		$this->data['body'] = $this->load->view('schedule/register',$this->data,TRUE);
		$this->load->view('_layouts/rightside',$this->data);
	}

	function calendar()
	{
		$this->data['menu'] = 'calendar';
		$this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
		$this->data['rightbar'] = $this->load->view('_partials/rightbar',$this->data,TRUE);
		$this->data['body'] = $this->load->view('schedule/register',$this->data,TRUE);
		$this->load->view('_layouts/rightside',$this->data);
	}

	function get_work_category_type($type='')
	{
		$array = array();
		switch ($type) :
			case 'government':
				$array = array(
					''=>'เลือกรายการ',
					'ข้าราชการพลเรือน'=>'ข้าราชการพลเรือน',
					'ข้าราชการตำรวจ'=>'ข้าราชการตำรวจ',
					'ข้าราชการทหาร'=>'ข้าราชการทหาร',
					'ข้าราชการครู'=>'ข้าราชการครู',
					'ข้าราชการอัยการ'=>'ข้าราชการอัยการ',
					'ลูกจ้างประจำ'=>'ลูกจ้างประจำ',
					'พนักงานราชการ'=>'พนักงานราชการ',
					'พนักงานจ้างเหมา'=>'พนักงานจ้างเหมา'
				);
				break;
			case 'company':
				$array = array(
					''=>'เลือกรายการ',
					'พนักงาน/ลูกจ้างภาคเอกชน'=>'พนักงาน/ลูกจ้างภาคเอกชน'
				);
				break;
			case 'state':
				$array = array(
					''=>'เลือกรายการ',
					'พนักงาน/ลูกจ้างรัฐวิสาหกิจ'=>'พนักงาน/ลูกจ้างรัฐวิสาหกิจ'
				);
				break;
			case 'private':
				$array = array(
					''=>'เลือกรายการ',
					'ผู้รวมกลุ่มอาชีพ/วิสาหกิจชุมชน'=>'ผู้รวมกลุ่มอาชีพ/วิสาหกิจชุมชน',
					'ผู้รับจ้างทั่วไปโดยไม่มีนายจ้าง'=>'ผู้รับจ้างทั่วไปโดยไม่มีนายจ้าง',
					'เกษตรกร(ทำไร่/ทำนา/ทำสวน/เลี้ยงสัตว์)'=>'เกษตรกร(ทำไร่/ทำนา/ทำสวน/เลี้ยงสัตว์)'
				);
				break;
			case 'family':
				$array = array(
					''=>'เลือกรายการ',
					'ลูกจ้างธุรกิจในครัวเรือน'=>'ลูกจ้างธุรกิจในครัวเรือน'
				);
				break;
			// default:
			// 	break;
		endswitch;

		$this->output
			->set_content_type('application/json','utf-8')
			->set_output(json_encode($array));
	}

}
