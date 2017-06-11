<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organize extends Public_Controller {

  function index($id='')
  {
    if ($this->input->post()) :
      $data = $this->input->post();
      $this->common->save('organize',$data);
      $this->callback('บันทึกข้อมูล องค์กร');
      redirect($this->agent->referrer());
    endif;
    $profile = $this->common->search_id('organize',$id)->row_array();
    $this->params['header'] = 'เพิ่มข้อมูล หน่วยงาน/องค์กร';
    $name = isset($profile['name']) ? $profile['name'] : '';
    $category = isset($profile['category']) ? $profile['category'] : '';
    $address = isset($profile['address']) ? $profile['address'] : '';
    $province = isset($profile['province']) ? $profile['province'] : '';
    $zip = isset($profile['zip']) ? $profile['zip'] : '';
    $phone = isset($profile['phone']) ? $profile['phone'] : '';
    $this->params['head'] = 'ข้อมูล องค์กร/หน่วยงาน';
    if ((int)$id) $this->params['hidden'] = array('id'=>$id);
    $this->params['form'] = array(
      array('label'=>form_label(ucfirst('ชื่อ'),'name',array('class'=>'control-label text-right col-sm-3')),
            'input'=>form_input(array('name'=>'name','class'=>'form-control','required'=>TRUE),set_value('name',$name)),
            'help'=>''),
      array('label'=>form_label(ucfirst('ประเภท'),'category',array('class'=>'control-label text-right col-sm-3')),
            'input'=>form_dropdown(array('name'=>'category','class'=>'form-control','required'=>TRUE),dropdown_organize(),set_value('category',$category)),
            'help'=>''),
      array('label'=>form_label(ucfirst('ที่อยู่'),'address',array('class'=>'control-label text-right col-sm-3')),
            'input'=>form_textarea(array('name'=>'address','class'=>'form-control','required'=>TRUE),set_value('address',$address)),
            'help'=>''),
      array('label'=>form_label(ucfirst('จังหวัด'),'province',array('class'=>'control-label text-right col-sm-3')),
            'input'=>form_input(array('name'=>'province','class'=>'form-control','required'=>TRUE),set_value('province',$province)),
            'help'=>''),
      array('label'=>form_label(ucfirst('รหัสไปรษณีย์'),'zip',array('class'=>'control-label text-right col-sm-3')),
            'input'=>form_number(array('name'=>'zip','class'=>'form-control','required'=>TRUE,'min'=>'0','max'=>'99999'),set_value('zip',$zip)),
            'help'=>'กรอกข้อมูล รหัสไปรษณีย์ตัวเลขไม่เกิน 5 หลัก'),
      array('label'=>form_label(ucfirst('เบอร์โทรศัพท์'),'phone',array('class'=>'control-label text-right col-sm-3')),
            'input'=>form_number(array('name'=>'phone','class'=>'form-control','required'=>TRUE,'min'=>'0','max'=>'9999999999'),set_value('phone',$phone)),
            'help'=>'กรอกข้อมูล เบอร์โทรศัพท์ตัวเลขไม่เกิน 10 หลัก')
    );
    $this->elements['content'] = $this->load->view('_elements/form', $this->params, TRUE);
    $tables = $this->common->search('organize')->result_array();
    $add_organize = anchor('organize/','<i class="fa fa-plus fa-lg"></i>',array('class'=>'btn btn-link pull-right'));
    $row = array();
    foreach ($tables as $_k => $_t) :
      $edit = anchor('organize/'.$_t['id'],'<i class="fa fa-info fa-lg"></i>',array('class'=>'btn btn-link'));
      $count_staff = $this->db->where('organize_id',$_t['id'])->from('staff')->count_all_results();
      $add_staff = anchor('organize/staff/'.$_t['id'],'<i class="fa fa-reply fa-lg"></i>',array('class'=>'btn btn-link'));
      $row[$_k]['no']	= $_k+1;
      $row[$_k]['name']	= $_t['name'];
      $row[$_k]['category']	= $_t['category'];
      $row[$_k]['province']	= $_t['province'];
      $row[$_k]['']	= $count_staff.'<span class="pull-right">'.$edit.nbs(3).$add_staff.'</span>';
    endforeach;
    $this->table->set_heading(array('no','ชื่อ','ประเภท','จังหวัด','จำนวนบุคลากร'));
    $this->table->set_template(array('table_open'  => '<table class="table table-bordered table-hover datatable">'));
    $this->elements['content'] .= $add_organize.br().'<hr/>'.$this->table->generate($row);
    $this->load->view('_layouts/scrollbar', $this->elements);
  }

  function staff($id)
  {
    if ( ! (int)$id) redirect('organize');
    if ($this->input->post()) :
      $data = $this->input->post();
      $this->common->save('staff',$data);
      $this->callback('บันทึกข้อมูล บุคลากร');
      redirect($this->agent->referrer());
    endif;
    $name = $this->db->select('name')->where('id',$id)->get('organize')->row();
    $this->params['header'] = 'เพิ่มข้อมูล บุคลากร';
    $this->params['hidden'] = array('organize_id'=>$id);
    $this->params['form'] = array(
      array('label'=>form_label(ucfirst('ชื่อ'),'name',array('class'=>'control-label text-right col-sm-3')),
            'input'=>form_input(array('name'=>'name','class'=>'form-control','required'=>TRUE),set_value('name')),
            'help'=>'*กรอกข้อมูล'),
      array('label'=>form_label(ucfirst('นามสกุล'),'surname',array('class'=>'control-label text-right col-sm-3')),
            'input'=>form_input(array('name'=>'surname','class'=>'form-control','required'=>TRUE),set_value('surname')),
            'help'=>'*กรอกข้อมูล'),
      array('label'=>form_label(ucfirst('อีเมล์'),'email',array('class'=>'control-label text-right col-sm-3')),
            'input'=>form_email(array('name'=>'email','class'=>'form-control','required'=>TRUE),set_value('email')),
            'help'=>'*กรอกข้อมูล'),
      array('label'=>form_label(ucfirst('รหัสผ่าน'),'password',array('class'=>'control-label text-right col-sm-3')),
            'input'=>form_password(array('name'=>'password','class'=>'form-control','required'=>TRUE)),
            'help'=>'*กรอกข้อมูล')
    );
    $this->elements['content'] = $this->load->view('_elements/form', $this->params, TRUE);
    $tables = $this->common->search('staff','organize_id='.$id)->result_array();
    $row = array();
    foreach ($tables as $_k => $_t) :
      $row[$_k]['no']	= $_k+1;
      $row[$_k]['fullname']	= $_t['name'].nbs(3).$_t['surname'];
      $row[$_k]['email']	= $_t['email'];
    endforeach;
    $this->table->set_heading(array('no','ชื่อ - นามสกุล','อีเมล์'));
    $this->table->set_template(array('table_open'  => '<table class="table table-bordered table-hover datatable">'));
    $this->elements['content'] .= $this->table->generate($row);
    $this->load->view('_layouts/scrollbar', $this->elements);
  }

}
