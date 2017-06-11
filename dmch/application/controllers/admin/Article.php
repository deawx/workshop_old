<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends Public_Controller {

  function index()
  {
    if ($this->input->post('name')) :
      if ($_FILES['file']['name'] != '') :
        $config = array(
          'allowed_types'	=> 'pdf',
          'upload_path'	=> realpath(APPPATH.'../assets/uploads/files/'),
          'file_name'		=> $this->input->post('name').'_'.date('YmdHis'),
          'file_ext_tolower' => TRUE
        );
        $this->upload->initialize($config);
        if ( ! $this->upload->do_upload('file')) :
          $this->callback($this->upload->display_errors());
          redirect($this->agent->referrer());
         else:
           $this->callback('เพิ่มเอกสาร '.$this->input->post('name').' เสร็จสิ้น');
           redirect($this->agent->referrer());
         endif;
      endif;
    endif;
    $this->params['head'] = 'เพิ่มข้อมูล เอกสารที่เกี่ยวกับมารดาและทารก';
    $this->params['form'] =[
      [ 'label' => form_label(ucfirst('ชื่อไฟล์'),'name',array('class'=>'control-label text-right col-sm-3')),
        'input' => form_input(['name'=>'name','class'=>'form-control','required'=>TRUE],set_value('name')),
        'help' => '' ],
      [ 'label' => form_label(ucfirst('ไฟล์เอกสาร'),'file',array('class'=>'control-label text-right col-sm-3')),
        'input' => form_upload(['name'=>'file','class'=>'form-control','required'=>TRUE]),
        'help' => 'ไฟล์อัพโหลด รองรับไฟล์นามสกุล PDF เท่านั้น' ]
    ];
    $this->elements['content'] = $this->load->view('_elements/form', $this->params, TRUE);
    $this->load->helper(['directory','file']);
    $tables = directory_map('assets/uploads/files');
    $row = array();
    foreach ($tables as $_k => $_t) :
      $download = anchor('assets/uploads/files/'.$_t,'<i class="fa fa-file-pdf-o fa-lg"></i>',['target'=>'_blank','class'=>'btn btn-link']);
      $delete = anchor('admin/article/delete/'.urlencode($_t),'<i class="fa fa-trash-o fa-lg"></i>',['class'=>'btn btn-link','onclick'=>"return confirm('ยืนยันการลบไฟล์นี้')"]);
      $row[$_k]['no']	= $_k+1;
      $row[$_k]['ชื่อไฟล์']	= explode('_',$_t)[0];
      $row[$_k]['ประเภทไฟล์']	= get_mime_by_extension($_t).'<span class="pull-right">'.$download.nbs(3).$delete.'</span>';
    endforeach;
    $this->table->set_heading(array('no','ชื่อไฟล์','ประเภทไฟล์'));
    $this->table->set_template(array('table_open'  => '<table class="table table-bordered table-hover datatable">'));
    $this->elements['content'] .= $this->table->generate($row);
    $this->load->view('_layouts/scrollbar', $this->elements);
  }

  function delete($file)
  {
    unlink('assets/uploads/files/'.urldecode($file));
    $this->callback('ลบเอกสาร '.urldecode(explode('_',$file)[0]).' เสร็จสิ้น');
    redirect($this->agent->referrer());
  }

}
