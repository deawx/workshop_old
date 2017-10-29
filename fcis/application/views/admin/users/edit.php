<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header"> <h3 class="box-title"></h3> </div>
      <?php echo form_open('admin/users/edit',array('class'=>'form-horizontal')); ?>
			<?=form_hidden('id',$user['id']);?>
        <div class="box-body">
          <?php echo $this->session->flashdata('message');?>
          <?php echo message_box(validation_errors(),'danger'); ?>
          <div class="form-group">
            <label for="" class="control-label col-md-3">ชื่อผู้ใช้</label>
            <div class="col-md-8">
              <?=form_input(array('name'=>'','class'=>'form-control','disabled'=>TRUE),set_value('',$user['username']));?>
            </div>
          </div>
          <div class="form-group">
            <label for="" class="control-label col-md-3">อีเมล์</label>
            <div class="col-md-8">
              <?=form_input(array('name'=>'','class'=>'form-control','disabled'=>TRUE),set_value('',$user['email']));?>
            </div>
          </div>
          <div class="form-group">
            <label for="" class="control-label col-md-3">รหัสผ่าน</label>
            <div class="col-md-8">
              <?=form_password(array('name'=>'password','class'=>'form-control','placeholder'=>'รหัสผ่าน'));?>
            </div>
          </div>
          <div class="form-group">
            <label for="" class="control-label col-md-3">รหัสผ่าน(ยืนยัน)</label>
            <div class="col-md-8">
              <?=form_password(array('name'=>'confirm_password','class'=>'form-control','placeholder'=>'รหัสผ่าน(ยืนยัน)'));?>
            </div>
          </div>
          <div class="form-group">
            <label for="" class="control-label col-md-3">ชื่อ</label>
            <div class="col-md-8">
              <?=form_input(array('name'=>'first_name','class'=>'form-control','placeholder'=>'ชื่อ'),set_value('first_name',$user['first_name']));?>
            </div>
          </div>
          <div class="form-group">
            <label for="" class="control-label col-md-3">นามสกุล</label>
            <div class="col-md-8">
              <?=form_input(array('name'=>'last_name','class'=>'form-control','placeholder'=>'นามสกุล'),set_value('last_name',$user['last_name']));?>
            </div>
          </div>
          <div class="form-group">
            <label for="" class="control-label col-md-3">กลุ่มผู้ใช้</label>
            <div class="col-md-8">
              <?=form_dropdown('groups[]',$groups,explode(',',$user['group_ids']),array('class'=>'form-control','multiple'=>TRUE));?>
            </div>
          </div>
          <div class="form-group">
            <label for="" class="control-label col-md-3">สถานะ</label>
            <div class="col-md-8">
              <?=form_dropdown('active',$user_status,isset($user['active']) ? $user['active']:'',array('class'=>'form-control'));?>
            </div>
          </div>
        </div>
        <div class="box-footer">
          <div class="form-group">
            <label for="" class="control-label col-md-3"></label>
            <div class="col-md-8">
              <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
              <button type="button" class="btn btn-default" onclick="javascript:history.back()">ย้อนกลับ</button>
            </div>
          </div>
        </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>
