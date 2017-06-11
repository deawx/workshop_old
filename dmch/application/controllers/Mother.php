<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mother extends Public_Controller {

  function __construct()
  {
    parent::__construct();
  }

  function index()
  {
    if ($this->input->post()) :
      $data = $this->input->post();
      $cards = $this->common->search('mother',array('card'=>$data['card']));
      if ($cards->num_rows() > 0) :
        $this->callback('ผิดพลาด พบข้อมูลเลขบัตรประชาชนนี้ในระบบ');
        redirect($this->agent->referrer());
      endif;
      $this->common->save('mother',$data);
      $this->callback('เพิ่มข้อมูลเสร็จสิ้น');
      redirect($this->agent->referrer());
    endif;
    $this->params['head'] = 'เพิ่มข้อมูล มารดา';
    $this->params['hidden'] = array('date'=>date('d/m/Y'));
    $this->params['form'] = $this->_form('mother');
    $this->elements['content'] = $this->load->view('_elements/form', $this->params, TRUE);
    $tables = $this->common->search('mother')->result_array();
    $row = array();
    foreach ($tables as $_k => $_t) :
      $count_child = $this->db->where('mother_id',$_t['id'])->from('child')->count_all_results();
      $stat_id = ($_t['stat'] == 0) ? '1' : '0';
      $stat_icon = ($_t['stat'] == 0) ? "<i class='fa fa-user fa-lg'></i>" : "<i class='fa fa-user-times fa-lg'></i>" ;
      $stat = anchor('mother/status/'.$_t['id'].'/'.$stat_id,$stat_icon,['class'=>'pull-right','onclick'=>"return confirm('confirm ?')"]);
      $row[$_k]['no']	= $_k+1;
      $row[$_k]['date']	= $_t['date'];
      $row[$_k]['card']	= $_t['card'];
      $row[$_k]['fullname']	= anchor('mother/profile/'.$_t['id'],$_t['name'].nbs(3).$_t['surname']);
      $row[$_k]['child']	= $count_child.$stat;
    endforeach;
    $this->table->set_heading(array('no','วันที่','บัตรประชาชน','ชื่อ - นามสกุล','จำนวนบุตร'));
    $this->table->set_template(array('table_open'  => '<table class="table table-bordered table-hover datatable">'));
    $this->elements['content'] .= $this->table->generate($row);
    $this->load->view('_layouts/scrollbar', $this->elements);
  }

  function status($id,$sid)
  {
    if ((int)$id > 0) :
      $data = ['id'=>$id,'stat'=>$sid];
      $this->common->save('mother',$data);
      $this->callback('บันทึกข้อมูล มารดา');
      redirect($this->agent->referrer());
    endif;
  }

  function pregnant($id)
  {
    if ( ! (int)$id) redirect('mother');
    if ($this->input->post()) :
      $data = $this->input->post();
      $this->common->save('mother_pregnant',$data);
      $this->callback('บันทึกข้อมูล การตั้งครรภ์');
      redirect($this->agent->referrer());
    endif;
    $this->params['hidden'] = array('mother_id'=>$id);
    $this->params['head'] = 'ข้อมูล การตั้งครรภ์';
    $pid = $this->input->get('id');
    if ((int)$pid > 0) :
      $pregnant = $this->common->search_id('mother_pregnant',$pid)->row_array();
      $this->params['hidden'] = array('id'=>$pid);
      $this->params['form'] = $this->_form('pregnant',$pregnant);
    else:
      $this->params['form'] = $this->_form('pregnant');
    endif;
    $this->elements['content'] = $this->load->view('_elements/form', $this->params, TRUE);
    $add_pregnant = anchor('mother/pregnant/'.$id,'<i class="fa fa-plus fa-lg"></i>',array('class'=>'btn btn-link pull-right'));
    $tables = $this->common->search('mother_pregnant',array('mother_id'=>$id))->result_array();
    $row = array();
    foreach ($tables as $_k => $_t) :
      $edit = anchor('mother/pregnant/'.$id.'?id='.$_t['id'],'<i class="fa fa-info fa-lg"></i>',array('class'=>'btn btn-link'));
      $pregnant_care = anchor('mother/pregnant_care/'.$id.'/'.$_t['id'],'<i class="fa fa-reply fa-lg"></i>',array('class'=>'btn btn-link'));
      $add_child = anchor('mother/child/'.$id.'/'.$_t['id'],'<i class="fa fa-child fa-lg"></i>',array('class'=>'btn btn-link'));
      $row[$_k]['due_no']	= $_t['due_no'];
      $row[$_k]['due_date']	= $_t['due_date'];
      $row[$_k]['weight']	= $_t['weight'].'<span class="pull-right">'.$add_child.nbs(3).$edit.nbs(3).$pregnant_care.'</span>';
    endforeach;
    $this->table->set_heading(array('ครรภ์ที่','กำหนดคลอด','นน.ก่อนคลอด'));
    $this->table->set_template(array('table_open'  => '<table class="table table-bordered table-hover datatable">'));
    $this->elements['content'] .= $add_pregnant.br().'<hr/>'.$this->table->generate($row);
    $profile = $this->common->search_id('mother',$id)->row_array();
    $this->elements['sidebar'] = $this->_sidebar($profile);
    $this->load->view('_layouts/sidebar', $this->elements);
  }

  function pregnant_care($id,$pid,$cid='')
  {
    if ( ! (int)$id || ! (int)$pid) redirect('mother');
    if ($this->input->post()) :
      $data = $this->input->post();
      $this->common->save('mother_pregnant_care',$data);
      $this->callback('บันทึกข้อมูล การตรวจครรภ์');
      redirect($this->agent->referrer());
    endif;
    $this->params['hidden'] = array('mother_id'=>$id,'pregnant_id'=>$pid,'date'=>date('d/m/Y'));
    $this->params['head'] = 'ข้อมูล การตรวจครรภ์';
    if ((int)$cid > 0) :
      $pregnant_care = $this->common->search_id('mother_pregnant_care',$cid)->row_array();
      $this->params['hidden'] = array('id'=>$cid);
      $this->params['form'] = $this->_form('pregnant_care',$pregnant_care);
    else:
      $this->params['form'] = $this->_form('pregnant_care');
    endif;
    $this->elements['content'] = $this->load->view('_elements/form', $this->params, TRUE);
    $add_pregnant_care = anchor('mother/pregnant_care/'.$id.'/'.$pid,'<i class="fa fa-plus fa-lg"></i>',array('class'=>'btn btn-link pull-right'));
    $tables = $this->common->search('mother_pregnant_care',array('mother_id'=>$id,'pregnant_id'=>$pid),'','','id ASC')->result_array();
    $row = array();
    foreach ($tables as $_k => $_t) :
      $edit = anchor('mother/pregnant_care/'.$id.'/'.$pid.'/'.$_t['id'],'<i class="fa fa-info fa-lg"></i>',array('class'=>'btn btn-link'));
      $row[$_k]['no']	= $_k+1;
      $row[$_k]['date']	= $_t['date'].'<span class="pull-right">'.$edit.'</span>';
    endforeach;
    $this->table->set_heading(array('no','วันที่'));
    $this->table->set_template(array('table_open'  => '<table class="table table-bordered table-hover datatable">'));
    $this->elements['content'] .= $add_pregnant_care.br().'<hr/>'.$this->table->generate($row);
    $profile = $this->common->search_id('mother',$id)->row_array();
    $this->elements['sidebar'] = $this->_sidebar($profile);
    $this->load->view('_layouts/sidebar', $this->elements);
  }

  function child($id,$pid,$cid='')
  {
    if ( ! (int)$id || ! (int)$pid) redirect('mother');
    if ($this->input->post()) :
      $data = $this->input->post();
      $this->common->save('child',$data);
      $this->callback('บันทึกข้อมูล ทารก');
      redirect($this->agent->referrer());
    endif;
    $this->params['hidden'] = array('mother_id'=>$id,'pregnant_id'=>$pid,'staff_id'=>$this->session->userdata('id'),'organize_id'=>$this->session->userdata('organize_id'));
    $this->params['head'] = 'ข้อมูล ทารก';
    if ((int)$cid > 0) :
      $child = $this->common->search_id('child',$cid)->row_array();
      $this->params['hidden'] = array('id'=>$cid);
      $this->params['form'] = $this->_form('child',$child);
    else:
      $this->params['form'] = $this->_form('child');
    endif;
    $this->elements['content'] = $this->load->view('_elements/form', $this->params, TRUE);

    $add_child = anchor('mother/child/'.$id.'/'.$pid,'<i class="fa fa-plus fa-lg"></i>',array('class'=>'btn btn-link pull-right'));
    $tables = $this->common->search('child',array('mother_id'=>$id))->result_array();
    $row = array();
    foreach ($tables as $_k => $_t) :
      $row[$_k]['no']	= $_k+1;
      $row[$_k]['birthdate']	= $_t['birthdate'];
      $row[$_k]['fullname']	= anchor('child/view/'.$_t['id'],$_t['name'].nbs(3).$_t['surname']);
      $row[$_k]['gender']	= $_t['gender'];
    endforeach;
    $this->table->set_heading(array('no','วันเกิด','ชื่อ - นามสกุล','เพศ'));
    $this->table->set_template(array('table_open'  => '<table class="table table-bordered table-hover datatable">'));
    $this->elements['content'] .= $add_child.br().'<hr/>'.$this->table->generate($row);
    $profile = $this->common->search_id('mother',$id)->row_array();
    $this->elements['sidebar'] = $this->_sidebar($profile);
    $this->load->view('_layouts/sidebar', $this->elements);
  }

  function profile($id)
  {
    if ( ! (int)$id) redirect('mother');
    $profile = $this->common->search_id('mother',$id)->row_array();
    $data = $this->input->post();
    if ($data) :
      if ($_FILES['picture']['name'] != '') :
        $config = array(
          'allowed_types'	=> 'jpg|jpeg|png',
          'min_width' => '100',
          'min_height' => '100',
          'upload_path'	=> realpath(APPPATH.'../assets/uploads/pictures/'),
          'file_name'		=> 'mother'.date('YmdHis'),
          'file_ext_tolower' => TRUE
        );
        $this->upload->initialize($config);
        if ( ! $this->upload->do_upload('picture')) :
          return FALSE;
        else:
          $config = array(
            'image_library' => 'gd2',
            'source_image' => $this->upload->data('full_path'),
            'maintain_ratio' => FALSE,
            'width' => '200',
            'height' => '200',
          );
          $this->load->library('image_lib', $config);
          $this->image_lib->resize();
          $data['picture'] = $this->upload->data('file_name');
          $this->common->save('mother',$data);
          $this->callback('แก้ไขข้อมูล มารดา');
          redirect($this->agent->referrer());
        endif;
      else:
        $this->common->save('mother',$data);
        $this->callback('แก้ไขข้อมูล มารดา');
        redirect($this->agent->referrer());
      endif;
    endif;
    $page = ($this->input->get('p')) ? $this->input->get('p') : 'about';
    $this->params['hidden'] = (['id'=>$id]);
    $this->params['head'] = 'ข้อมูล มารดาและคู่สมรส/ผู้ดูแล';
    $this->params['form'] = $this->_form($page,$profile);
    $this->elements['content'] = $this->load->view('_elements/form', $this->params, TRUE);
    $this->elements['sidebar'] = $this->_sidebar($profile);
    $this->load->view('_layouts/sidebar', $this->elements);
  }

  function _sidebar($profile)
  {
    $this->params['picture'] = $profile['picture'];
    $this->params['head'] = $profile['name'].nbs(3).$profile['surname'];
    $this->params['body'] = ([
      anchor('mother/profile/'.$profile['id'].'?p=about','เกี่ยวกับ(ข้อมูลมารดา)',array('class'=>'btn btn-link')),
      anchor('mother/profile/'.$profile['id'].'?p=couple','เกี่ยวกับ(ข้อมูลคู่สมรส)',array('class'=>'btn btn-link')),
      anchor('mother/profile/'.$profile['id'].'?p=second','เกี่ยวกับ(ข้อมูลผู้ดูแล)',array('class'=>'btn btn-link')),
      anchor('mother/profile/'.$profile['id'].'?p=history','ประวัติส่วนตัว',array('class'=>'btn btn-link')),
      anchor('mother/profile/'.$profile['id'].'?p=health','สุขภาพ',array('class'=>'btn btn-link')),
      anchor('mother/pregnant/'.$profile['id'],'ข้อมูลการตั้งครรภ์',array('class'=>'btn btn-link'))
    ]);
    return $this->load->view('_elements/panel', $this->params, TRUE);
  }

  function _form($for, $profile='')
  {
    switch ($for) :
      case 'mother':
      $form = array(
        array('label'=>form_label(ucfirst('ชื่อ'),'name',array('class'=>'control-label text-right col-sm-3')),
              'input'=>form_input(array('name'=>'name','class'=>'form-control','required'=>TRUE),set_value('name')),
              'help'=>''),
        array('label'=>form_label(ucfirst('นามสกุล'),'surname',array('class'=>'control-label text-right col-sm-3')),
              'input'=>form_input(array('name'=>'surname','class'=>'form-control','required'=>TRUE),set_value('surname')),
              'help'=>''),
        array('label'=>form_label(ucfirst('บัตรประชาชน'),'card',array('class'=>'control-label text-right col-sm-3')),
              'input'=>form_number(array('name'=>'card','class'=>'form-control','required'=>TRUE,'min'=>'0','max'=>'9999999999999'),set_value('card')),
              'help'=>'กรอกข้อมูล เลขบัตรประชาชนตัวเลขไม่เกิน 13 หลัก'),
        array('label'=>form_label(ucfirst('โทรศัพท์'),'phone',array('class'=>'control-label text-right col-sm-3')),
              'input'=>form_number(array('name'=>'phone','class'=>'form-control','required'=>TRUE,'min'=>'0','max'=>'9999999999'),set_value('phone')),
              'help'=>'กรอกข้อมูล เบอร์โทรศัพท์ตัวเลขไม่เกิน 10 หลัก'),
        array('label'=>form_label(ucfirst('อาชีพ'),'occupation',array('class'=>'control-label text-right col-sm-3')),
              'input'=>form_input(array('name'=>'occupation','class'=>'form-control','required'=>TRUE),set_value('occupation')),
              'help'=>''),
        array('label'=>form_label(ucfirst('ศาสนา'),'religion',array('class'=>'control-label text-right col-sm-3')),
              'input'=>form_input(array('name'=>'religion','class'=>'form-control','required'=>TRUE),set_value('religion')),
              'help'=>'')
      );
      break;
      case 'about':
        $form = array(
          array('label'=>form_label(ucfirst('รูปภาพ'),'picture',array('class'=>'control-label text-right col-sm-3')),
              'input'=>form_upload(array('name'=>'picture','class'=>'form-control')),
              'help'=>''),
          array('label'=>form_label(ucfirst('ชื่อ'),'name',array('class'=>'control-label text-right col-sm-3')),
              'input'=>form_input(array('name'=>'name','class'=>'form-control','required'=>TRUE),set_value('name',$profile['name'])),
              'help'=>''),
          array('label'=>form_label(ucfirst('นามสกุล'),'surname',array('class'=>'control-label text-right col-sm-3')),
              'input'=>form_input(array('name'=>'surname','class'=>'form-control','required'=>TRUE),set_value('surname',$profile['surname'])),
              'help'=>''),
          array('label'=>form_label(ucfirst('อีเมล์'),'email',array('class'=>'control-label text-right col-sm-3')),
              'input'=>form_email(array('name'=>'email','class'=>'form-control','required'=>TRUE),set_value('email',$profile['email'])),
              'help'=>''),
          array('label'=>form_label(ucfirst('บัตรประชาชน'),'card',array('class'=>'control-label text-right col-sm-3')),
              'input'=>form_number(array('name'=>'card','class'=>'form-control','required'=>TRUE,'min'=>'0','max'=>'9999999999999'),set_value('card',$profile['card'])),
              'help'=>'กรอกข้อมูล เลขบัตรประชาชนตัวเลขไม่เกิน 13 หลัก'),
          array('label'=>form_label(ucfirst('โทรศัพท์'),'phone',array('class'=>'control-label text-right col-sm-3')),
              'input'=>form_number(array('name'=>'phone','class'=>'form-control','required'=>TRUE,'min'=>'0','max'=>'9999999999'),set_value('phone',$profile['phone'])),
              'help'=>'กรอกข้อมูล เบอร์โทรศัพท์ตัวเลขไม่เกิน 10 หลัก')
        );
       break;
       case 'history':
       $form = array(
         array('label'=>form_label(ucfirst('วันเกิด'),'birthdate',array('class'=>'control-label text-right col-sm-3')),
             'input'=>form_input(array('name'=>'birthdate','class'=>'form-control datepicker','required'=>TRUE),set_value('birthdate',$profile['birthdate'])),
             'help'=>''),
         array('label'=>form_label(ucfirst('ที่อยู่'),'address',array('class'=>'control-label text-right col-sm-3')),
             'input'=>form_textarea(array('name'=>'address','class'=>'form-control','required'=>TRUE),set_value('address',$profile['address'])),
             'help'=>''),
         array('label'=>form_label(ucfirst('อาชีพ'),'occupation',array('class'=>'control-label text-right col-sm-3')),
             'input'=>form_input(array('name'=>'occupation','class'=>'form-control','required'=>TRUE),set_value('occupation',$profile['occupation'])),
             'help'=>''),
         array('label'=>form_label(ucfirst('ศาสนา'),'religion',array('class'=>'control-label text-right col-sm-3')),
             'input'=>form_input(array('name'=>'religion','class'=>'form-control','required'=>TRUE),set_value('religion',$profile['religion'])),
             'help'=>'')
       );
       break;
       case 'health':
       $form = array(
         array('label'=>form_label(ucfirst('ส่วนสูง'),'height',array('class'=>'control-label text-right col-sm-3')),
             'input'=>form_number(array('name'=>'height','class'=>'form-control','required'=>TRUE),set_value('height',$profile['height'])),
             'help'=>'กรอกข้อมูล ตัวเลขเท่านั้น'),
         array('label'=>form_label(ucfirst('น้ำหนัก'),'weight',array('class'=>'control-label text-right col-sm-3')),
             'input'=>form_number(array('name'=>'weight','class'=>'form-control','required'=>TRUE),set_value('weight',$profile['weight'])),
             'help'=>'กรอกข้อมูล ตัวเลขเท่านั้น'),
         array('label'=>form_label(ucfirst('การคุมกำเนิด'),'contraception',array('class'=>'control-label text-right col-sm-3')),
             'input'=>form_input(array('name'=>'contraception','class'=>'form-control','required'=>TRUE),set_value('contraception',$profile['contraception'])),
             'help'=>''),
         array('label'=>form_label(ucfirst('การเจ็บป่วย'),'patient',array('class'=>'control-label text-right col-sm-3')),
             'input'=>form_textarea(array('name'=>'patient','class'=>'form-control','required'=>TRUE),set_value('patient',$profile['patient'])),
             'help'=>''),
         array('label'=>form_label(ucfirst('การผ่าตัด'),'surgery',array('class'=>'control-label text-right col-sm-3')),
             'input'=>form_textarea(array('name'=>'surgery','class'=>'form-control','required'=>TRUE),set_value('surgery',$profile['surgery'])),
             'help'=>''),
         array('label'=>form_label(ucfirst('การแพ้ยา'),'medical',array('class'=>'control-label text-right col-sm-3')),
             'input'=>form_textarea(array('name'=>'medical','class'=>'form-control','required'=>TRUE),set_value('medical',$profile['medical'])),
             'help'=>'')
       );
       break;
       case 'couple':
         $form = array(
           array('label'=>form_label(ucfirst('ชื่อคู่สมรส'),'ft_name',array('class'=>'control-label text-right col-sm-3')),
               'input'=>form_input(array('name'=>'ft_name','class'=>'form-control','required'=>TRUE),set_value('ft_name',$profile['ft_name'])),
               'help'=>''),
           array('label'=>form_label(ucfirst('นามสกุลคู่สมรส'),'ft_surname',array('class'=>'control-label text-right col-sm-3')),
               'input'=>form_input(array('name'=>'ft_surname','class'=>'form-control','required'=>TRUE),set_value('ft_surname',$profile['ft_surname'])),
               'help'=>''),
           array('label'=>form_label(ucfirst('บัตรประชาชน'),'ft_card',array('class'=>'control-label text-right col-sm-3')),
               'input'=>form_number(array('name'=>'ft_card','class'=>'form-control','required'=>TRUE,'min'=>'0','max'=>'9999999999999'),set_value('ft_card',$profile['ft_card'])),
               'help'=>'กรอกข้อมูล เลขบัตรประชาชนตัวเลขไม่เกิน 13 หลัก'),
           array('label'=>form_label(ucfirst('อีเมล์'),'ft_email',array('class'=>'control-label text-right col-sm-3')),
               'input'=>form_email(array('name'=>'ft_email','class'=>'form-control','required'=>TRUE),set_value('ft_email',$profile['ft_email'])),
               'help'=>''),
           array('label'=>form_label(ucfirst('โทรศัพท์'),'ft_phone',array('class'=>'control-label text-right col-sm-3')),
               'input'=>form_number(array('name'=>'ft_phone','class'=>'form-control','required'=>TRUE,'min'=>'0','max'=>'9999999999'),set_value('ft_phone',$profile['ft_phone'])),
               'help'=>'กรอกข้อมูล เบอร์โทรศัพท์ตัวเลขไม่เกิน 10 หลัก')
         );
        break;
       case 'second':
         $form = array(
           array('label'=>form_label(ucfirst('ชื่อผู้ดูแล'),'sc_name',array('class'=>'control-label text-right col-sm-3')),
               'input'=>form_input(array('name'=>'sc_name','class'=>'form-control','required'=>TRUE),set_value('sc_name',$profile['sc_name'])),
               'help'=>''),
           array('label'=>form_label(ucfirst('นามสกุลผู้ดูแล'),'sc_surname',array('class'=>'control-label text-right col-sm-3')),
               'input'=>form_input(array('name'=>'sc_surname','class'=>'form-control','required'=>TRUE),set_value('sc_surname',$profile['sc_surname'])),
               'help'=>''),
           array('label'=>form_label(ucfirst('บัตรประชาชน'),'sc_card',array('class'=>'control-label text-right col-sm-3')),
               'input'=>form_number(array('name'=>'sc_card','class'=>'form-control','required'=>TRUE,'min'=>'0','max'=>'9999999999999'),set_value('sc_card',$profile['sc_card'])),
               'help'=>'กรอกข้อมูล เลขบัตรประชาชนตัวเลขไม่เกิน 13 หลัก'),
           array('label'=>form_label(ucfirst('อีเมล์'),'sc_email',array('class'=>'control-label text-right col-sm-3')),
               'input'=>form_email(array('name'=>'sc_email','class'=>'form-control','required'=>TRUE),set_value('ft_email',$profile['sc_email'])),
               'help'=>''),
           array('label'=>form_label(ucfirst('โทรศัพท์'),'sc_phone',array('class'=>'control-label text-right col-sm-3')),
               'input'=>form_number(array('name'=>'sc_phone','class'=>'form-control','required'=>TRUE,'min'=>'0','max'=>'9999999999'),set_value('sc_phone',$profile['sc_phone'])),
               'help'=>'กรอกข้อมูล เบอร์โทรศัพท์ตัวเลขไม่เกิน 10 หลัก')
         );
        break;
       case 'pregnant':
         $due_no = isset($profile['due_no']) ? $profile['due_no'] : '';
         $due_date = isset($profile['due_date']) ? $profile['due_date'] : '';
         $weight = isset($profile['weight']) ? $profile['weight'] : '';
         $cesarean = isset($profile['cesarean']) ? $profile['cesarean'] : '';
         $form = array(
           array('label'=>form_label(ucfirst('ครรภ์ที่'),'due_no',array('class'=>'control-label text-right col-sm-3')),
               'input'=>form_number(array('name'=>'due_no','class'=>'form-control','required'=>TRUE,'min'=>'1','max'=>'99'),set_value('due_no',$due_no)),
               'help'=>'กรอกข้อมูล ตัวเลขจำนวนครั้งของการตั้งครรภ์'),
           array('label'=>form_label(ucfirst('คาดคะเนการคลอด'),'due_date',array('class'=>'control-label text-right col-sm-3')),
               'input'=>form_input(array('name'=>'due_date','class'=>'form-control datepicker','required'=>TRUE),set_value('due_date',$due_date)),
               'help'=>''),
           array('label'=>form_label(ucfirst('น้ำหนักก่อนตั้งครรภ์'),'weight',array('class'=>'control-label text-right col-sm-3')),
               'input'=>form_input(array('name'=>'weight','class'=>'form-control','required'=>TRUE),set_value('weight',$weight)),
               'help'=>'กรอกข้อมูล ตัวเลขน้ำหนักก่อนตั้งครรภ์'),
           array('label'=>form_label(ucfirst('การผ่าคลอด(จำนวนครั้ง)'),'cesarean',array('class'=>'control-label text-right col-sm-3')),
               'input'=>form_number(array('name'=>'cesarean','class'=>'form-control','required'=>TRUE,'min'=>'0','max'=>'9'),set_value('cesarean',$cesarean)),
               'help'=>'กรอกข้อมูล จำนวนครั้งที่ผ่าตัดทำคลอด')
         );
        break;
        case 'pregnant_care':
          $weight = isset($profile['weight']) ? $profile['weight'] : '';
          $urine = isset($profile['urine']) ? $profile['urine'] : '';
          $pressure = isset($profile['pressure']) ? $profile['pressure'] : '';
          $uterine = isset($profile['uterine']) ? $profile['uterine'] : '';
          $present = isset($profile['present']) ? $profile['present'] : '';
          $sound = isset($profile['sound']) ? $profile['sound'] : '';
          $flex = isset($profile['flex']) ? $profile['flex'] : '';
          $term = isset($profile['term']) ? $profile['term'] : '';
          $physical = isset($profile['physical']) ? $profile['physical'] : '';
          $diagnosis = isset($profile['diagnosis']) ? $profile['diagnosis'] : '';
          $form = array(
            array('label'=>form_label(ucfirst('น้ำหนัก'),'weight',array('class'=>'control-label text-right col-sm-3')),
                'input'=>form_number(array('name'=>'weight','class'=>'form-control','required'=>TRUE,'min'=>'0','max'=>'999'),set_value('weight',$weight)),
                'help'=>'กรอกข้อมูล ตัวเลขน้ำหนัก'),
            array('label'=>form_label(ucfirst('ปัสสาวะ'),'urine',array('class'=>'control-label text-right col-sm-3')),
                'input'=>form_input(array('name'=>'urine','class'=>'form-control','required'=>TRUE),set_value('urine',$pressure)),
                'help'=>'กรอกข้อมูล ผลตรวจปัสสาวะ'),
            array('label'=>form_label(ucfirst('ความดันโลหิต'),'pressure',array('class'=>'control-label text-right col-sm-3')),
                'input'=>form_number(array('name'=>'pressure','class'=>'form-control','required'=>TRUE,'min'=>'0','max'=>'9999999999'),set_value('pressure',$pressure)),
                'help'=>'กรอกข้อมูล ตัวเลขความดันโลหิต'),
            array('label'=>form_label(ucfirst('ขนาดมดลูก'),'uterine',array('class'=>'control-label text-right col-sm-3')),
                'input'=>form_number(array('name'=>'uterine','class'=>'form-control','required'=>TRUE,'min'=>'0','max'=>'999'),set_value('uterine',$uterine)),
                'help'=>'กรอกข้อมูล ตัวเลขขนาดมดลูก'),
            array('label'=>form_label(ucfirst('การขยับตัว(ทารก)'),'present',array('class'=>'control-label text-right col-sm-3')),
                'input'=>form_dropdown(array('name'=>'present','class'=>'form-control','required'=>TRUE),dropdown_present(),set_value('present',$present)),
                'help'=>''),
            array('label'=>form_label(ucfirst('เสียงหัวใจ(ทารก)'),'sound',array('class'=>'control-label text-right col-sm-3')),
                'input'=>form_dropdown(array('name'=>'sound','class'=>'form-control','required'=>TRUE),array('ปกติ'=>'ปกติ','ได้ยินน้อย'=>'ได้ยินน้อย','ไม่ได้ยิน'=>'ไม่ได้ยิน'),set_value('sound',$sound)),
                'help'=>''),
            array('label'=>form_label(ucfirst('การดิ้น(ทารก)'),'flex',array('class'=>'control-label text-right col-sm-3')),
                'input'=>form_dropdown(array('name'=>'flex','class'=>'form-control','required'=>TRUE),array('ดิ้น'=>'ดิ้น','ไม่ดิ้น'=>'ไม่ดิ้น'),set_value('flex',$flex)),
                'help'=>''),
            array('label'=>form_label(ucfirst('อายุครรภ์(สัปดาห์)'),'term',array('class'=>'control-label text-right col-sm-3')),
                'input'=>form_number(array('name'=>'term','class'=>'form-control','required'=>TRUE,'min'=>'0','max'=>'999'),set_value('term',$term)),
                'help'=>'กรอกข้อมูล ตัวเลขจำนวนสัปดาห์อายุครรภ์'),
            array('label'=>form_label(ucfirst('การตรวจร่างกาย'),'physical',array('class'=>'control-label text-right col-sm-3')),
                'input'=>form_textarea(array('name'=>'physical','class'=>'form-control','required'=>TRUE),set_value('physical',$physical)),
                'help'=>''),
            array('label'=>form_label(ucfirst('การวินิจฉัย'),'diagnosis',array('class'=>'control-label text-right col-sm-3')),
                'input'=>form_textarea(array('name'=>'diagnosis','class'=>'form-control','required'=>TRUE),set_value('diagnosis',$diagnosis)),
                'help'=>'')
          );
         break;
         case 'child':
           $name = isset($profile['name']) ? $profile['name'] : '';
           $surname = isset($profile['surname']) ? $profile['surname'] : '';
           $birthdate = isset($profile['birthdate']) ? $profile['birthdate'] : '';
           $blood = isset($profile['blood']) ? $profile['blood'] : '';
           $gender = isset($profile['gender']) ? $profile['gender'] : '';
           $weight = isset($profile['weight']) ? $profile['weight'] : '';
           $height = isset($profile['height']) ? $profile['height'] : '';
           $round = isset($profile['round']) ? $profile['round'] : '';
           $form = array(
             array('label'=>form_label(ucfirst('ชื่อ'),'name',array('class'=>'control-label text-right col-sm-3')),
                 'input'=>form_input(array('name'=>'name','class'=>'form-control','required'=>TRUE),set_value('name',$name)),
                 'help'=>''),
             array('label'=>form_label(ucfirst('นามสกุล'),'surname',array('class'=>'control-label text-right col-sm-3')),
                 'input'=>form_input(array('name'=>'surname','class'=>'form-control','required'=>TRUE),set_value('surname',$surname)),
                 'help'=>''),
             array('label'=>form_label(ucfirst('วันเกิด'),'birthdate',array('class'=>'control-label text-right col-sm-3')),
                 'input'=>form_input(array('name'=>'birthdate','class'=>'form-control datepicker','required'=>TRUE),set_value('birthdate',$birthdate)),
                 'help'=>''),
             array('label'=>form_label(ucfirst('กรุ๊ปเลือด'),'blood',array('class'=>'control-label text-right col-sm-3')),
                 'input'=>form_input(array('name'=>'blood','class'=>'form-control','required'=>TRUE),set_value('blood',$blood)),
                 'help'=>''),
             array('label'=>form_label(ucfirst('เพศ'),'gender',array('class'=>'control-label text-right col-sm-3')),
                 'input'=>form_dropdown(array('name'=>'gender','class'=>'form-control','required'=>TRUE),array(''=>'เลือกเพศ','ชาย'=>'ชาย','หญิง'=>'หญิง'),set_value('gender',$gender)),
                 'help'=>''),
             array('label'=>form_label(ucfirst('ส่วนสูง'),'height',array('class'=>'control-label text-right col-sm-3')),
                 'input'=>form_number(array('name'=>'height','class'=>'form-control','required'=>TRUE,'min'=>'0','max'=>'999'),set_value('height',$height)),
                 'help'=>'กรอกข้อมูล ตัวเลขส่วนสูง'),
             array('label'=>form_label(ucfirst('น้ำหนัก'),'weight',array('class'=>'control-label text-right col-sm-3')),
                 'input'=>form_number(array('name'=>'weight','class'=>'form-control','required'=>TRUE,'min'=>'0','max'=>'999'),set_value('weight',$weight)),
                 'help'=>'กรอกข้อมูล ตัวเลขน้ำหนัก'),
             array('label'=>form_label(ucfirst('รอบศีรษะ'),'round',array('class'=>'control-label text-right col-sm-3')),
                 'input'=>form_number(array('name'=>'round','class'=>'form-control','required'=>TRUE,'min'=>'0','max'=>'99'),set_value('round',$round)),
                 'help'=>'กรอกข้อมูล ตัวเลขขนาดเส้นวงรอบศีรษะ')
           );
          break;
       default:
       $form = [];
       break;
    endswitch;
    return $form;
  }

}
