<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('admin/partials/header'); ?>
<?php $this->load->view('admin/partials/navbar'); ?>
<div id="page-wrapper" >
  <?php echo anchor('admin/channel','<span aria-hidden="true">&larr;</span> ย้อนกลับ',array('class'=>'btn btn-primary')); ?>
  <div id="page-inner">
    <div class="col-sm-12">
      <div class="col-sm-5">
        <div class="col-sm-3"> <?php echo img('assets/images/channel/'.$channel['picture'],'',array('class'=>'img-responsive')); ?> </div>
        <div class="col-sm-9"> <h4><u>ช่องรายการ</u> <?php echo $channel['name']; ?></h4> <p><u>วันที่</u> <?php echo $channel['datetime']; ?></p> </div>
      </div>
      <div class="col-sm7">
        <?php echo form_open(uri_string(),array('class'=>'form-horizontal','data-toggle'=>'validator')); ?>
        <?php echo form_hidden(array('id'=>$channel['id'])); ?>
        <?php echo form_fieldset(); ?>
        <div class="form-group"> <?php echo form_input(array('name'=>'name','class'=>'form-control','placeholder'=>lang('form_channel_name'),'required'=>TRUE),set_value('name')); ?> </div>
        <div class="form-group"> <?php echo form_input(array('name'=>'link','class'=>'form-control','placeholder'=>lang('form_channel_link'),'required'=>TRUE),set_value('link')); ?> </div>
        <?php echo form_fieldset_close(); ?>
        <div class="form-group pull-right"> <?php echo form_button_submit(); ?> </div>
        <?php echo form_close(); ?>
      </div>
    </div>
    <div class="col-sm-12"> <hr> <?php $this->load->view('partials/message'); ?> <?php echo validation_errors('<div class="alert alert-info">','</div>');?> </div>
    <?php echo heading('ช่องรายการสำรอง','3').hr(); ?> <?php echo $reserve; ?>
  </div>
</div>
<?php $this->load->view('admin/partials/footer'); ?>
