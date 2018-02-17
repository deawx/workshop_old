<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('admin/partials/header'); ?>
<?php $this->load->view('admin/partials/navbar'); ?>
<div id="page-wrapper" >
  <div class="row"> <?php $this->load->view('partials/message'); ?> <?php echo validation_errors('<div class="alert alert-info">','</div>');?> <?php echo $this->upload->display_errors('<div class="alert alert-warning">','</div>');?> </div>
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <?php echo form_open_multipart('admin/contact',array('class'=>'form-horizontal','data-toggle'=>'validator')); ?>
        <?php echo (isset($save_contact))
          ? form_hidden(array('id'=>$save_contact['id'],'logo'=>$save_contact['logo']))
          : form_hidden(array('logo'=>date('YmdHis').'.jpg')); ?>
        <?php echo form_fieldset(lang('form_legend_contact')); ?>
        <div class="col-md-2">
          <div class="form-group"> <?php echo img('assets/images/contact/'.$save_contact['logo'],'',array('id'=>'preview','class'=>'img-responsive center-block','style'=>'width:75px;height:75px;padding:5px;')).br(); ?> </div>
        </div>
        <div class="col-md-10">
          <div class="form-group"> <?php echo form_upload(array('name'=>'logo','id'=>'picture','class'=>'form-control')); ?> <p class="help-block">* รองรับไฟล์นามสกุล jpg,jpeg,png ** รูปภาพจะแปลงขนาดเป็น 75x75 พิกเซล</p> </div>
          <div class="form-group"> <?php echo form_input(array('name'=>'text','class'=>'form-control','placeholder'=>'ข้อมูลการติดต่อ','required'=>TRUE),set_value('text',$save_contact['text'])); ?> </div>
          <div class="form-group"> <?php echo form_input(array('name'=>'url','class'=>'form-control','placeholder'=>'ยูอาแอล'),set_value('url',$save_contact['url'])); ?> </div>
          <div class="form-group pull-right">
            <div class="col-sm-12">
              <?php echo form_button_submit(lang('form_button_submit')); ?>
              <?php echo form_button_reset(lang('form_button_reset')); ?>
              <?php if ($save_contact) : ?>
                <?php echo form_anchor_back('admin/contact',lang('form_button_back')); ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <?php echo form_fieldset_close(); ?>
        <?php echo form_close().hr(); ?>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <?php if ( ! isset($save_contact)) : ?>
          <legend>ข้อมูลการติดต่อเรา</legend>
          <?php echo $contact; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('admin/partials/footer'); ?>
