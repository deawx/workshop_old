<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('partials/header'); ?>
<div class="container">
	<div class="row">
		<div class="col-sm-3">
			<?php $this->load->view('partials/menubar'); ?>
		</div>
		<div class="col-sm-9">
			<?php $this->load->view('partials/message'); ?>
			<div class="panel panel-info">
        <div class="panel-heading"></div>
        <div class="panel-body">
					<?php echo form_open(uri_string(),array('novalidate'=>TRUE));?>
					<?php echo form_hidden(array('id'=>$student['id'],'re_user'=>$student['user']));?>
          <?php echo form_fieldset('ข้อมูลผู้เรียน');?>
          <div class="form-group">
            <div class="col-sm-12">
              <?php echo form_input(array('name'=>'user','class'=>'form-control','placeholder'=>'ขื่อผู้ใช้','required'=>TRUE),set_value('user',$student['user'])); ?>
              <span class="help-block text-right">ขื่อผู้ใช้</span>
              <?php echo form_input(array('name'=>'pass','class'=>'form-control','placeholder'=>'รหัสผ่าน','required'=>TRUE),set_value('pass',$student['pass'])); ?>
							<span class="help-block text-right">รหัสผ่าน</span>
              <?php echo form_input(array('name'=>'name','class'=>'form-control','placeholder'=>'ชื่อ-นามสกุล','required'=>TRUE),set_value('name',$student['name'])); ?>
              <span class="help-block text-right">ชื่อ-นามสกุล</span>
              <?php echo form_input(array('name'=>'email','class'=>'form-control','placeholder'=>'อีเมล์','required'=>TRUE),set_value('email',$student['email'])); ?>
              <span class="help-block text-right">อีเมล์</span>
              <?php echo form_input(array('name'=>'phone','class'=>'form-control','placeholder'=>'โทรศัพท์','required'=>TRUE),set_value('phone',$student['phone'])); ?>
              <span class="help-block text-right">โทรศัพท์</span>
              <?php echo form_input(array('name'=>'address','class'=>'form-control','rows'=>'3','placeholder'=>'ที่อยู่','required'=>TRUE),set_value('address',$student['address'])); ?>
              <span class="help-block text-right">ที่อยู่</span>
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
          <?php echo validation_errors('<div class="alert alert-warning">','</div>');?>
        </div>
      </div>
		</div>
	</div>
</div>
<?php $this->load->view('partials/footer'); ?>
