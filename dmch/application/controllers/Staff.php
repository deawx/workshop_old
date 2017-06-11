<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends Public_Controller {

  function __construct()
  {
    parent::__construct();
  }

  function index($id)
  {
    if ( ! (int)$id) redirect('organize');
    if ($this->input->post()) :
      $data = $this->input->post();
      $this->common->save('staff',$data);
      $this->callback('บันทึกข้อมูล บุคลากร');
      redirect($this->agent->referrer());
    endif;
    $profile = $this->common->search_id('staff',$id)->row_array();
    $this->params['head'] = 'ข้อมูล ส่วนตัว';
    $this->params['hidden'] = (['id'=>$id]);
    $this->params['form'] = array(
      array('label'=>form_label(ucfirst('ชื่อ'),'name',array('class'=>'control-label text-right col-sm-3')),
          'input'=>form_input(array('name'=>'name','class'=>'form-control','required'=>TRUE),set_value('name',$profile['name'])),
          'help'=>''),
      array('label'=>form_label(ucfirst('นามสกุล'),'surname',array('class'=>'control-label text-right col-sm-3')),
          'input'=>form_input(array('name'=>'surname','class'=>'form-control','required'=>TRUE),set_value('surname',$profile['surname'])),
          'help'=>''),
      array('label'=>form_label(ucfirst('อีเมล์'),'email',array('class'=>'control-label text-right col-sm-3')),
          'input'=>form_email(array('name'=>'email','class'=>'form-control','required'=>TRUE),set_value('email',$profile['email'])),
          'help'=>'')
    );
    $this->elements['content'] = $this->load->view('_elements/form', $this->params, TRUE);
    $this->elements['navs'] = $this->_navs($profile);
    $this->load->view('_layouts/navs', $this->elements);
  }

  function daily($id,$date='')
  {
    if ( ! (int)$id) redirect('organize');
    $date = $this->input->get('date');
    $date = ($date != '') ? $date : date('d/m/Y');
    $tables = $this->common->search('child_vaccination')->result_array();
    $vaccine_name = [
      '1' => 'ฉีดวัคซีนป้องกันวัณโรค (BCG)',
      '2' => 'ฉีดวัคซีนป้องกันโรคตับอักเสบบี (HB)',
      '3' => 'กินวัคซีนป้องกันโรคโปลิโอ (OPV) ฉีดวัคซีนรวมป้องกันโรคคอตีบ บาดทะยัก ไอกรน ตับอักเสบบี (DTP-HB)',
      '4' => 'ฉีดวัคซีนป้องกันโรคหัด คางทูม หัดเยอรมัน (MMR)',
      '5' => 'กินวัคซีนป้องกันโรคโปลิโอ (OPV) ฉีดวัคซีนรวมป้องกันโรคคอตีบ บาดทะยัก ไอกรน (DTP)',
      '6' => 'ฉีดวัคซีนป้องกันโรคไข้สมองอักเสบ (JE)',
      '7' => 'ฉีดวัคซีนป้องกันโรคคอตีบ บาดทะยัก (dT)'
    ];
    $childs = [];
    $vaccine = [];
    $organize = $this->db->select('name')->where('id',$this->session->userdata('organize_id'))->get('organize')->row();
    foreach ($tables as $_t) :
      array_shift($_t);
      foreach ($_t as $k => $t) :
        if (in_array($organize->name,$_t)) :
          if ($date == $t) :
            $vaccine[] = $k;
            $childs[] = $this->common->search('child',['id'=>$_t['child_id']])->result_array();
          endif;
        endif;
      endforeach;
    endforeach;
    $row = [];
    $category = $this->common->search('organize')->result_array();
    foreach ($childs as $k => $c) :
      foreach ($c as $_k => $_c ) :
        $mother = $this->common->search_id('mother',$_c['mother_id'])->row_array();
        $row[$k]['no']	= $k+1;
        $row[$k]['fullname']	= $_c['name'].nbs(3).$_c['surname'];
        $row[$k]['mother']	= $mother['name'].nbs(3).$mother['surname'];
        $row[$k]['vaccine']	= $vaccine_name[explode('_',substr($vaccine[$k],'1'))[0]];
        $row[$k]['v']	= 'ครั้งที่ '.str_replace('_','/',substr($vaccine[$k],'1'));
      endforeach;
    endforeach;
    $this->table->set_heading(array('ที่','ชื่อ - นามสกุล','ชื่อ - นามสกุล(มารดา)','ประเภทวัคซีน',''));
    $this->table->set_template(array('table_open' => '<table class="table table-bordered table-striped">'));
    $this->elements['content'] = heading('ตารางการฉีดวัคซีน '.$organize->name.' ประจำวันที่','4');
    $this->elements['content'] .= form_open(uri_string(),['method'=>'get']).form_input(['name'=>'date','class'=>'datepicker'],set_value('date',$date)).form_submit('','ดู',['class'=>'btn btn-success']).anchor(uri_string(),'<i class="fa fa-refresh fa-lg"></i>',['class'=>'btn btn-link']).form_close();
    $this->elements['content'] .= '<hr/>'.$this->table->generate($row);
    $this->load->view('_layouts/scrollbar', $this->elements);
  }

  function change_password($id)
  {
    if ( ! (int)$id) redirect('organize');
    $profile = $this->common->search_id('staff',$id)->row_array();
    if ($this->input->post()) :
      $data = $this->input->post();
      if ($data['oldpassword'] != $profile['password']) :
        $this->callback('รหัสผ่าน ผิดพลาด');
        redirect($this->agent->referrer());
      else:
        unset($data['oldpassword']);
        unset($data['newpassword_confirm']);
        $data = (['id'=>$data['id'],'password'=>$data['newpassword']]);
        $this->common->save('staff',$data);
        $this->callback('บันทึกข้อมูล เปลี่ยนรหัสผ่านบุคลากร');
        redirect($this->agent->referrer());
      endif;
    endif;
    $this->params['head'] = 'เปลี่ยนรหัสผ่าน บุคลากร';
    $this->params['hidden'] = (['id'=>$id]);
    $this->params['form'] = array(
      array('label'=>form_label(ucfirst('รหัสผ่านเดิม'),'oldpassword',array('class'=>'control-label text-right col-sm-3')),
          'input'=>form_password(array('name'=>'oldpassword','class'=>'form-control','required'=>TRUE)),
          'help'=>'กรอกข้อมูล รหัสผ่านเดิม'),
      array('label'=>form_label(ucfirst('รหัสผ่านใหม่'),'newpassword',array('class'=>'control-label text-right col-sm-3')),
          'input'=>form_password(array('name'=>'newpassword','id'=>'newpassword','class'=>'form-control','required'=>TRUE)),
          'help'=>'กรอกข้อมูล รหัสผ่านใหม่'),
      array('label'=>form_label(ucfirst('รหัสผ่านใหม่(ยินยัน)'),'newpassword_confirm',array('class'=>'control-label text-right col-sm-3')),
          'input'=>form_password(array('name'=>'newpassword_confirm','data-match'=>'#newpassword','class'=>'form-control','required'=>TRUE)),
          'help'=>'กรอกข้อมูล รหัสผ่านใหม่(ยืนยัน)')
    );
    $this->elements['content'] = $this->load->view('_elements/form', $this->params, TRUE);
    $this->elements['navs'] = $this->_navs($profile);
    $this->load->view('_layouts/navs', $this->elements);
  }

  function _navs($profile)
  {
    $this->params['head'] = $profile['name'].nbs(3).$profile['surname'];
    $this->params['body'] = ([
      anchor('staff/'.$profile['id'],'เกี่ยวกับ',array('class'=>'btn btn-link')),
      anchor('staff/change_password/'.$profile['id'],'เปลี่ยนรหัสผ่าน',array('class'=>'btn btn-link'))
    ]);
    return $this->load->view('_elements/media', $this->params, TRUE);
  }

  function _form($for,$profile='')
  {
      $name = isset($profile['name']) ? $profile['name'] : '';
      $surname = isset($profile['surname']) ? $profile['surname'] : '';
      $email = isset($profile['email']) ? $profile['email'] : '';
      $form = array(
        array('label'=>form_label(ucfirst('ชื่อ'),'name',array('class'=>'control-label text-right col-sm-3')),
            'input'=>form_input(array('name'=>'name','class'=>'form-control','required'=>TRUE),set_value('name',$name)),
            'help'=>''),
        array('label'=>form_label(ucfirst('นามสกุล'),'surname',array('class'=>'control-label text-right col-sm-3')),
            'input'=>form_input(array('name'=>'surname','class'=>'form-control','required'=>TRUE),set_value('surname',$surname)),
            'help'=>''),
        array('label'=>form_label(ucfirst('อีเมล์'),'email',array('class'=>'control-label text-right col-sm-3')),
            'input'=>form_email(array('name'=>'email','class'=>'form-control','required'=>TRUE),set_value('email',$email)),
            'help'=>'')
      );
     $form =[];
    return $form;
  }

}
