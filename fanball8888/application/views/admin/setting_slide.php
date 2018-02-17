<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('admin/partials/header'); ?>
<?php $this->load->view('admin/partials/navbar'); ?>
<div id="page-wrapper" >
  <div class="row"> <?php $this->load->view('partials/message'); ?> <?php echo validation_errors('<div class="alert alert-info">','</div>');?> </div>
  <div id="page-inner">
    <div class="row">
      <div class="col-sm-12">
        <?php echo form_open(uri_string(),array('class'=>'form-horizontal','data-toggle'=>'validator')); ?>
        <?php echo (isset($slide)) ? form_hidden('id',$slide['id']) : ''; ?>
        <?php echo form_hidden('slide',TRUE); ?>
        <?php $fieldset = (isset($slide)) ? 'อัพเดทภาพสไลด์' : 'เพิ่มภาพสไลด์'; ?>
        <?php echo form_fieldset($fieldset); ?>
        <div class="form-group">
          <?php echo form_label('ชื่อภาพสไลด์','name',array('class'=>'control-label text-right col-sm-3')); ?>
          <div class="col-sm-9">
            <?php echo form_input(array('name'=>'name','class'=>'form-control','required'=>TRUE),set_value('name',$slide['name'])); ?>
          </div>
        </div>
        <div class="form-group">
          <?php echo form_label('ยูอาร์แอลภาพสไลด์','url',array('class'=>'control-label text-right col-sm-3')); ?>
          <div class="col-sm-9">
            <?php echo form_input(array('name'=>'url','class'=>'form-control','required'=>TRUE),set_value('url',$slide['url'])); ?>
          </div>
        </div>
        <?php echo form_fieldset_close(); ?>
        <div class="form-group pull-right">
          <div class="col-sm-12">
            <?php echo form_button_submit(); ?>
            <?php echo form_button_reset(); ?>
          </div>
        </div>
        <?php echo form_close(); ?>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <legend>รายการกลุ่มลูกค้า</legend>
        <?php echo $slides; ?>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('admin/partials/footer'); ?>
