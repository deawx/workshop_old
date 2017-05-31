<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('partials/header'); ?>
<div class="container">
  <nav class="navbar">
    <p class="navbar-text"><?php echo anchor('','ย้อนกลับ',array('class'=>'btn btn-primary')); ?></p>
  </nav>
  <div class="row">
    <?php $this->load->view('partials/message'); ?>
    <div class="col-sm-6 col-sm-offset-3">
      <div class="panel panel-info">
        <div class="panel-heading"></div>
        <div class="panel-body">
          <?php echo form_open(uri_string());?>
          <?php echo form_fieldset('เข้าสู่ระบบ');?>
          <div class="form-group">
            <div class="col-sm-12">
              <?php echo form_input(array('name'=>'user','class'=>'form-control','placeholder'=>'ขื่อผู้ใช้','required'=>TRUE)); ?>
              <span class="help-block"></span>
              <?php echo form_password(array('name'=>'pass','class'=>'form-control','placeholder'=>'รหัสผ่าน','required'=>TRUE)); ?>
              <span class="help-block"></span>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <?php echo form_radio(array('name'=>'role','value'=>'student','checked'=>TRUE)); ?> นักเรียน
              <p class="help-block"></p>
              <?php echo form_radio(array('name'=>'role','value'=>'instructor')); ?> ผู้สอน
              <p class="help-block"></p>
            </div>
          </div>
          <?php echo form_fieldset_close().hr();?>
          <div class="form-group">
            <div class="col-sm-12">
              <?php echo form_submit('','ยืนยัน',array('class'=>'btn btn-success')); ?>
              <?php echo form_reset('','ยกเลิก',array('class'=>'btn btn-warning')); ?>
              <?php echo anchor('user/register','ลงทะเบียนเรียน',array('class'=>'btn btn-link pull-right')); ?>
            </div>
          </div>
        </div>
        <div class="panel-footer">
          <?php echo form_close();?>
          <?php echo validation_errors('<div class="alert alert-error">','</div>');?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('partials/footer'); ?>
