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
          <?php echo form_open_multipart(uri_string());?>
          <?php echo form_fieldset('ลงทะเบียนเรียน');?>
          <div class="form-group">
            <div class="col-sm-12">
              <?php echo form_input(array('name'=>'user','class'=>'form-control','placeholder'=>'ขื่อผู้ใช้','required'=>TRUE)); ?>
              <span class="help-block"></span>
              <?php echo form_password(array('name'=>'pass','class'=>'form-control','placeholder'=>'รหัสผ่าน','required'=>TRUE)); ?>
              <span class="help-block"></span>
              <?php echo form_input(array('name'=>'name','class'=>'form-control','placeholder'=>'ชื่อ-นามสกถล','required'=>TRUE)); ?>
              <span class="help-block"></span>
              <?php echo form_email(array('name'=>'email','class'=>'form-control','placeholder'=>'อีเมล์','required'=>TRUE)); ?>
              <span class="help-block"></span>
              <?php echo form_input(array('name'=>'phone','class'=>'form-control','placeholder'=>'เบอร์โทรศัพท์','required'=>TRUE)); ?>
              <span class="help-block"></span>
              <?php echo form_input(array('name'=>'address','class'=>'form-control','placeholder'=>'ที่อยู่','required'=>TRUE)); ?>
              <span class="help-block"></span>
            </div>
          </div>
          <?php echo form_fieldset_close().hr();?>
          <div class="form-group">
            <div class="col-sm-12">
              <?php echo form_submit('','ยืนยัน',array('class'=>'btn btn-success')); ?>
              <?php echo form_reset('','ยกเลิก',array('class'=>'btn btn-warning')); ?>
              <?php echo anchor('user/login','เข้าสู่ระบบ',array('class'=>'btn btn-link pull-right')); ?>
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
