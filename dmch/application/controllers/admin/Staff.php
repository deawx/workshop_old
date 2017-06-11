<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends Admin_Controller {

  function index()
  {
    $tables = $this->common->search('staff','','','',['role'=>'DESC','id'=>'ASC'])->result_array();
    $row = array();
    foreach ($tables as $_k => $_t) :
      $admin = ($_t['role'] == '0') ? anchor('admin/staff/role/'.$_t['id'],'<i class="fa fa-star-o fa-lg"></i>',[]) : anchor('admin/staff/role/'.$_t['id'],'<i class="fa fa-star fa-lg"></i>',[]);
      $delete = ($_t['role'] == '0') ? anchor('admin/staff/delete/'.$_t['id'],'<i class="fa fa-trash-o fa-lg"></i>',['class'=>'btn btn-link','onclick'=>"return confirm('ยืนยันการลบไฟล์นี้')"]) : '';
      $row[$_k]['no']	= $_k+1;
      $row[$_k]['ชื่อ - นามสกุล']	= anchor('staff/'.$_t['id'],$_t['name'].nbs(3).$_t['surname'],['target'=>'_blank']);
      $row[$_k]['สังกัดหน่วยงาน/องค์กร']	= $_t['organize_id'].'<span class="pull-right">'.$admin.nbs(3).$delete.'</span>';
    endforeach;
    $this->table->set_heading(array('no','ชื่อ - นามสกุล','สังกัดหน่วยงาน/องค์กร'));
    $this->table->set_template(array('table_open'  => '<table class="table table-bordered table-hover datatable">'));
    $this->elements['content'] = $this->table->generate($row);
    $this->load->view('_layouts/scrollbar', $this->elements);
  }

  function role($id)
  {
    if ( ! (int)$id || (int)$id == $this->session->id) :
      $this->callback('รองรับผู้ดูแลระบบ อย่างน้อยหนึ่งคน');
      redirect($this->agent->referrer());
    endif;
    $data = $this->common->search_id('staff',$id)->row_array();
    $data['role'] = ($data['role'] == '0') ? '1' : '0';
    $this->common->save('staff',$data);
    $this->callback('บันทึกข้อมูล สถานะผู้ดูแลระบบ');
    redirect($this->agent->referrer());
  }

  function delete($id)
  {
    if ( ! (int)$id || (int)$id == $this->session->id) :
      $this->callback('รองรับผู้ดูแลระบบ อย่างน้อยหนึ่งคน');
      redirect($this->agent->referrer());
    endif;
    $data = $this->common->search_id('staff',$id)->row_array();
    if ($data['role'] == '1') :
      $this->callback('ไม่สามารถลบข้อมูล บุคลากร');
    else:
      $this->common->save('staff',$data);
      $this->callback('ลบข้อมูล บุคลากร');
    endif;
    redirect($this->agent->referrer());
  }

}
