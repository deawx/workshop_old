<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('admin/partials/header'); ?>
<?php $this->load->view('admin/partials/navbar'); ?>
<div id="page-wrapper" >
  <?php echo ($channel) ? anchor('admin/channel','<span aria-hidden="true">&larr;</span> ย้อนกลับ',array('class'=>'btn btn-primary')) : ''; ?>
  <div id="page-inner">
    <div class="col-md-12">
      <?php echo form_open_multipart(uri_string(),array('class'=>'form-horizontal','data-toggle'=>'validator')); ?>
      <?php echo ($channel) ? form_hidden(array('id'=>$channel['id'],'re_name'=>$channel['name'])) : form_hidden(array('re_name'=>'')); ?>
      <?php $fieldset = ($channel) ? 'อัพเดทช่องรายการแฟนบอลทีวี' : 'เพิ่มช่องรายการแฟนบอลทีวี'; ?>
      <?php echo form_fieldset($fieldset); ?>
      <div class="col-sm-3">
        <div class="form-group"> <div class="col-sm-"> <?php echo img('assets/images/channel/'.$channel['picture'],'',array('id'=>'preview','class'=>'img-responsive','style'=>'width:150px;height:150px;')).br(); ?> </div> </div>
      </div>
      <div class="col-sm-9">
        <div class="form-group"> <?php echo form_upload(array('name'=>'picture','id'=>'picture','class'=>'form-control')); ?> <p class="help-block">* รองรับไฟล์นามสกุล jpg,jpeg,png ** รูปภาพจะถูกย่อขนาดเป็น 150x150 พิกเซล</p> </div>
        <div class="form-group"> <?php echo form_input(array('name'=>'name','class'=>'form-control','placeholder'=>lang('form_channel_name'),'required'=>TRUE),set_value('name',$channel['name'])); ?> </div>
        <div class="form-group"> <?php echo form_input(array('name'=>'link','class'=>'form-control','placeholder'=>lang('form_channel_link'),'required'=>TRUE),set_value('link',$channel['link'])); ?> </div>
      </div>
      <?php echo form_fieldset_close(); ?>
      <div class="form-group pull-right"> <div class="col-sm-12"> <?php echo form_button_submit(); ?> <?php echo form_button_reset(); ?> </div> </div>
      <?php echo form_close(); ?>
    </div>
    <div class="col-sm-12">
      <hr> <?php $this->load->view('partials/message'); ?> <?php echo validation_errors('<div class="alert alert-info">','</div>');?> <?php echo $this->upload->display_errors('<div class="alert alert-warning">','</div>');?>
    </div>
    <div class="row"> <div class="col-sm-12"> <?php echo (isset($channels)) ? '<legend>รายการช่องแฟนบอลทีวี</legend>'.$channels : ''; ?> </div> </div>
  </div>
</div>
<?php $this->load->view('admin/partials/footer'); ?>
