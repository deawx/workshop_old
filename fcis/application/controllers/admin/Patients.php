<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patients extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->allow_group_access(array('special','admin'));
		$this->load->model('Patient_model','patient');
		$this->data['page_header_small'] = 'รายละเอียดข้อมูล';
		$this->data['parent_menu'] = 'patient';
	}

	public function index()
	{
		$this->form_validation->set_rules('types','ชนิดของผู้ป่วย','required');
		$this->form_validation->set_rules('groups','กลุ่มของผู้ป่วย','required');
		$this->form_validation->set_rules('title','คำนำหน้าชื่อ','required');
		$this->form_validation->set_rules('firstname','ชื่อ','required');
		$this->form_validation->set_rules('lastname','นามสกุล','required');
		$this->form_validation->set_rules('id_card','หมายเลขบัตรประชาชน','required|is_numeric|exact_length[13]|is_unique[patients.id_card]');
		$this->form_validation->set_rules('hn','รหัสผู้ป่วย(H.N.)','required|alpha_numeric|is_unique[patients.hn]');
		$this->form_validation->set_rules('age','อายุ','is_numeric|max_length[3]');
		$this->form_validation->set_rules('zip','รหัสไปรษณีย์','is_numeric|max_length[7]');
		$this->form_validation->set_rules('phone','เบอร์โทรศัพท์','is_numeric|max_length[10]');
		$this->form_validation->set_rules('mobile','เบอร์โทรศัพท์มือถือ','is_numeric|max_length[10]');
		if ($this->form_validation->run() === TRUE) :
			$post = $this->input->post();
			$post['created'] = time();
			$post['user_id'] = $this->session->user_id;
			$post['address'] = serialize($this->input->post('address'));
			$post['address_current'] = $this->input->post('same_address') ? serialize($this->input->post('address')) : serialize($this->input->post('address_current'));
			$post['relationship_by'] = ($this->input->post('relationship') !== 'ผู้ป่วย') ? $this->input->post('relationship_by') : '';
			$post['activity'] = serialize($this->input->post('activity'));
			$post['filtered'] = serialize($this->input->post('filtered'));
			$post['insurance'] = serialize($this->input->post('insurance'));
			// print_data($post); die();
			// $this->_upload(isset($patient['id_card']) ? $patient['id_card'] : $this->input->post('id_card'));
			if ($this->patient->save($post)) :
				$this->db->insert('users_logs',array(
					'user_id'=>$this->session->user_id,
					'timestamp'=>time(),
					'message'=>'เพิ่มข้อมูลผู้ป่วยเสร็จสิ้น',
					'type'=>'patient',
				));
				$this->session->set_flashdata('message',message_box('บันทึกข้อมูลเสร็จสิ้น','success'));
			else:
				$this->session->set_flashdata('message',message_box('บันทึกข้อมูลล้มเหลว','danger'));
			endif;
			redirect('admin/search');
		else:
			$this->session->set_flashdata('message',message_box(validation_errors(),'danger'));
		endif;

		$this->data['page_header'] = 'เพิ่มข้อมูลผู้ป่วย';
		$this->render('admin/patient/add');
	}

	function edit($id=NULL)
	{
		if ( ! intval($id) > 0)
			redirect('admin/search');

		$this->form_validation->set_rules('types','ชนิดของผู้ป่วย','required');
		$this->form_validation->set_rules('groups','กลุ่มของผู้ป่วย','required');
		$this->form_validation->set_rules('title','คำนำหน้าชื่อ','required');
		$this->form_validation->set_rules('firstname','ชื่อ','required');
		$this->form_validation->set_rules('lastname','นามสกุล','required');
		if ($this->input->post('id_card') !== $this->input->post('old_id_card')) :
			$this->form_validation->set_rules('id_card','หมายเลขบัตรประชาชน','required|is_numeric|exact_length[13]|is_unique[patients.id_card]');
		else:
			$this->form_validation->set_rules('id_card','หมายเลขบัตรประชาชน','required|is_numeric|exact_length[13]');
		endif;
		if ($this->input->post('hn') !== $this->input->post('old_hn')) :
			$this->form_validation->set_rules('hn','รหัสผู้ป่วย(H.N.)','required|alpha_numeric|is_unique[patients.hn]');
		else:
			$this->form_validation->set_rules('hn','รหัสผู้ป่วย(H.N.)','required|alpha_numeric');
		endif;
		$this->form_validation->set_rules('age','อายุ','is_numeric|max_length[3]');
		$this->form_validation->set_rules('zip','รหัสไปรษณีย์','is_numeric|max_length[7]');
		$this->form_validation->set_rules('phone','เบอร์โทรศัพท์','is_numeric|max_length[10]');
		$this->form_validation->set_rules('mobile','เบอร์โทรศัพท์มือถือ','is_numeric|max_length[10]');
		if ($this->form_validation->run() === TRUE) :
			$post = $this->input->post();
			$post['updated'] = time();
			$post['user_id'] = $this->session->user_id;
			$post['address'] = serialize($this->input->post('address'));
			$post['address_current'] = $this->input->post('same_address') ? serialize($this->input->post('address')) : serialize($this->input->post('address_current'));
			$post['relationship_by'] = ($this->input->post('relationship') !== 'ผู้ป่วย') ? $this->input->post('relationship_by') : '';
			$post['address_current'] = $this->input->post('same_address') ? serialize($this->input->post('address')) : serialize($this->input->post('address_current'));
			$post['activity'] = serialize($this->input->post('activity'));
			$post['filtered'] = serialize($this->input->post('filtered'));
			$post['insurance'] = serialize($this->input->post('insurance'));

			// print_data($post); die();

			if ($this->patient->save($post)) :
				$this->db->insert('users_logs',array(
					'user_id'=>$this->session->user_id,
					'timestamp'=>time(),
					'message'=>'อัพเดทข้อมูลผู้ป่วยเสร็จสิ้น',
					'type'=>'patient',
				));
				$this->session->set_flashdata('message',message_box('บันทึกข้อมูลเสร็จสิ้น','success'));
			else:
				$this->session->set_flashdata('message',message_box('บันทึกข้อมูลล้มเหลว','danger'));
			endif;
		else:
			$this->session->set_flashdata('message',message_box(validation_errors(),'danger'));
		endif;

		$this->data['page_header'] = 'แก้ไขข้อมูลผู้ป่วย';
		$this->data['patient'] = $this->patient->search_id($id);
		$this->data['assets_patients'] = $this->patient->find_gallery($id);
		$this->render('admin/patient/edit');
	}

	function delete($id=NULL)
	{
		if ($this->patient->remove($id)) :
			$this->db->where('patient_id',$id)->delete('labs');
			$this->db->where('patient_id',$id)->delete('clinic');
			$this->db->where('patient_id',$id)->delete('samples');
			$this->db->insert('users_logs',array(
				'user_id'=>$this->session->user_id,
				'timestamp'=>time(),
				'message'=>'ลบข้อมูลผู้ป่วยเสร็จสิ้น',
				'type'=>'patient',
			));
			$this->session->set_flashdata('message',message_box('ลบข้อมูลเสร็จสิ้น','success'));
		else :
			$this->session->set_flashdata('message',message_box('ลบข้อมูลล้มเหลว','danger'));
		endif;
		redirect($this->agent->referrer());
	}

	function delete_file($id=NULL,$file=NULL)
	{
		if ($id === NULL OR $file === NULL)
			return FALSE;

		$file = FCPATH.'uploads/patients/'.$file;
		if (unlink($file)) :
			if ($this->patient->remove($id,'assets')) :
				$this->patient->remove($id,'assets_patients');
				$this->session->set_flashdata('message',message_box('การลบไฟล์เสร็จสิ้น','success'));
			else:
				$this->session->set_flashdata('message',message_box($this->db->error(),'danger'));
			endif;
		else:
			$this->session->set_flashdata('message',message_box('การลบไฟล์ล้มเหลว','danger'));
		endif;

		redirect($this->agent->referrer());
	}

	function upload()
	{
		$this->load->library('upload');
		$this->load->library('image_lib');
		if ($_FILES['file']['error'] === UPLOAD_ERR_OK) :
      $upload = array(
        'allowed_types'	=> 'jpeg|jpg|png',
        'upload_path'	=> FCPATH.'uploads/patients',
				'encrypt_name' => TRUE,
        'file_ext_tolower' => TRUE,
				'max_size' => 1024
      );
      $this->upload->initialize($upload);
      if ($this->upload->do_upload('file')) :
        $resize = array(
          'source_image' => $this->upload->data('full_path'),
          'width' => '400',
          'height' => '400'
        );
        $this->image_lib->initialize($resize);
        if ($this->image_lib->resize()) :
					$data = array();
					foreach ($this->upload->data() as $key => $value) :
						$data[$key] = $value;
					endforeach;
					if ($this->patient->save($data,'assets')) :
						$assets_id = $this->db->insert_id();
						$this->patient->save(array(
							'assets_id' => $assets_id,
							'patients_id' => $this->input->post('patient_id'),
							'upload_date' => time(),
							'upload_by' => $this->session->user_id
						),'assets_patients');
					endif;
				else :
					$this->output
						->set_content_type('application/json')
						->set_output(json_encode($this->image_lib->display_errors()));
				endif;
			else :
				$this->output
					->set_content_type('application/json')
					->set_output(json_encode($this->upload->display_errors()));
      endif;
    endif;

		redirect($this->agent->referrer());
	}

}
