<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('admin/partials/header'); ?>
<?php $this->load->view('admin/partials/navbar'); ?>
<div id="page-wrapper" >
  <?php echo (isset($groups)) ? anchor('admin/group/save_group','เพิ่มข้อมูล',array('class'=>'btn btn-success')) : anchor('admin/group','<span aria-hidden="true">&larr;</span> ย้อนกลับ',array('class'=>'btn btn-primary')); ?>
  <div class="row"><?php $this->load->view('partials/message'); ?><?php echo validation_errors('<div class="alert alert-info">','</div>');?></div>
  <div id="page-inner">
    <?php if ( ! (isset($groups))) : ?>
      <div class="row">
        <div class="col-sm-12">
          <?php echo form_open(uri_string(),array('class'=>'form-horizontal','data-toggle'=>'validator')); ?>
          <?php echo ($group) ? form_hidden(array('id'=>$group['id'],'re_name'=>$group['name'])) : ''; ?>
          <?php $fieldset = ($group) ? 'อัพเดทข้อมูลกลุ่มผู้ใช้งานระบบ' : 'เพิ่มข้อมูลกลุ่มผู้ใช้งานระบบ'; ?>
          <?php echo form_fieldset($fieldset); ?>
          <div class="form-group"> <?php echo form_label('ชื่อกลุ่ม','name',array('class'=>'control-label text-right col-sm-3')); ?>
            <div class="col-sm-9"> <?php echo form_input(array('name'=>'name','class'=>'form-control','required'=>TRUE),set_value('name',$group['name'])); ?> </div>
          </div>
          <div class="form-group"> <?php echo form_label('รายละเอียด/เงื่อนไขของกลุ่ม','detail',array('class'=>'control-label text-right col-sm-3')); ?>
            <div class="col-sm-9"> <?php echo form_textarea(array('name'=>'detail','class'=>'form-control','value'=>$group['detail'],'required'=>TRUE)); ?> </div>
          </div>
          <?php echo form_fieldset_close(); ?>
          <div class="form-group pull-right"> <div class="col-sm-12"> <?php echo form_button_submit(); ?> <?php echo form_button_reset(); ?> </div> </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    <?php endif; ?>
    <?php if (isset($user_group)) : ?>
      <div class="row"> <div class="col-sm-12"> <legend>รายชื่อผู้อยู่ในกลุ่ม</legend> <?php echo $user_group; ?> </div> </div>
    <?php endif; ?>
    <div class="row"> <div class="col-sm-12"> <?php echo (isset($groups)) ? '<legend>รายการกลุ่มลูกค้า</legend>'.$groups : ''; ?> </div> </div>
  </div>
</div>
<?php $this->load->view('admin/partials/footer'); ?>
