<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('admin/partials/header'); ?>
<?php $this->load->view('admin/partials/navbar'); ?>
<div id="page-wrapper" >
  <div class="row"> <?php $this->load->view('partials/message'); ?> <?php echo validation_errors('<div class="alert alert-info">','</div>');?> </div>
  <div id="page-inner">
    <div class="row">
      <div class="col-sm-12">
        <?php $legend = (isset($category)) ? 'อัพเดทประเภทเว็บบอร์ด' : 'เพิ่มประเภทเว็บบอร์ด'; ?>
        <legend><?php echo $legend; ?></legend>
        <?php echo form_open(uri_string(),array('class'=>'form-inline')); ?>
        <?php echo (isset($category)) ? form_hidden(array('id'=>$category['id'],'re_name'=>$category['name'])) : ''; ?>
        <?php echo form_hidden('type','category'); ?>
        <div class="form-group">
          <?php echo form_label('ชื่อประเภทเว็บบอร์ด','name',array('class'=>'control-label')); ?>
          <?php echo form_input(array('name'=>'name','class'=>'form-control','required'=>TRUE),set_value('name',$category['name'])); ?>
          <?php echo form_button_submit(lang('ui_submit')); ?>
          <?php if (isset($category)) : ?>
            <?php echo form_anchor_back('admin/webboard?type=category',lang('ui_back')); ?>
          <?php endif; ?>
        </div>
        <?php echo form_close().hr(); ?>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <?php if ( ! isset($category)) : ?>
          <legend>รายการประเภทเว็บบอร์ด</legend>
          <?php echo $categories; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('admin/partials/footer'); ?>
