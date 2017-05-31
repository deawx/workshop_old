<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('partials/header'); ?>
<div class="container">
  <nav class="navbar"> <p class="navbar-text"><?php echo anchor('','ย้อนกลับ',array('class'=>'btn btn-primary')); ?></p> </nav>
  <div class="row">
    <?php $this->load->view('partials/message'); ?>
    <div class="col-sm-6 col-sm-offset-3">
      <div class="panel panel-info">
        <div class="panel-heading">
          <?php echo form_open_multipart(uri_string());?>
          <?php echo form_hidden(array('id'=>$this->session->id,'re_user'=>$this->session->user));?>
        </div>
        <div class="panel-body">
          <?php echo form_fieldset('ข้อมูลส่วนตัว');?>
          <div class="form-group">
            <div class="col-sm-12">
              <?php echo form_input(array('name'=>'user','class'=>'form-control','placeholder'=>'ขื่อผู้ใช้','required'=>TRUE),set_value('user',$this->session->user)); ?>
              <span class="help-block text-right">ขื่อผู้ใช้</span>
              <?php echo form_input(array('name'=>'pass','class'=>'form-control','placeholder'=>'รหัสผ่าน','required'=>TRUE),set_value('pass',$this->session->pass)); ?>
              <span class="help-block text-right">รหัสผ่าน</span>
              <?php echo form_input(array('name'=>'name','class'=>'form-control','placeholder'=>'ชื่อ-นามสกถล','required'=>TRUE),set_value('name',$this->session->name)); ?>
              <span class="help-block text-right">ชื่อ-นามสกุล</span>
              <?php echo form_email(array('name'=>'email','class'=>'form-control','placeholder'=>'อีเมล์','required'=>TRUE),set_value('email',$this->session->email)); ?>
              <span class="help-block text-right">อีเมล์</span>
              <?php echo form_input(array('name'=>'phone','class'=>'form-control','placeholder'=>'เบอร์โทรศัพท์','required'=>TRUE),set_value('phone',$this->session->phone)); ?>
              <span class="help-block text-right">โทรศัพท์</span>
              <?php echo form_input(array('name'=>'address','class'=>'form-control','placeholder'=>'ที่อยู่','required'=>TRUE),set_value('address',$this->session->address)); ?>
              <span class="help-block text-right">ที่อยู่</span>
              <?php if ($this->session->role == 'instructor') { ?>
                <?php echo form_input(array('name'=>'educate','class'=>'form-control','placeholder'=>'ประวัติการศึกษา','required'=>TRUE),set_value('educate',$this->session->educate)); ?>
  							<span class="help-block text-right">ประวัติการศึกษา</span>
              <?php } ?>
            </div>
          </div>
          <?php echo form_fieldset_close().hr();?>
          <div class="form-group">
            <div class="col-sm-12">
              <?php echo form_submit('','ยืนยัน',array('class'=>'btn btn-success')); ?>
              <?php echo form_reset('','ยกเลิก',array('class'=>'btn btn-warning')); ?>
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
