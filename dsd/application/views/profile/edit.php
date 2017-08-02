<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title"> แก้ไขข้อมูลบัญชี
      <small><?php echo lang('edit_user_subheading');?></small>
    </h3>
  </div>
  <div class="panel-body">
    <?php echo form_open(uri_string(),array('class'=>'form-horizontal'));?>
    <?php echo form_hidden('id', $user['id']);?>
    <div class="form-group">
      <?php echo form_label('ชื่อผู้ใช้','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php echo form_input('','',array('class'=>'form-control','disabled'=>TRUE));?>
      </div>
    </div>
    <div class="form-group">
      <?php echo form_label('อีเมล์','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php echo form_input('','',array('class'=>'form-control','disabled'=>TRUE));?>
      </div>
    </div>
    <div class="form-group">
      <?php echo form_label('ที่อยู่ไอพีแอดเดรส','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php echo form_input('','',array('class'=>'form-control','disabled'=>TRUE));?>
      </div>
    </div>
    <div class="form-group">
      <?php echo form_label('เข้าสู่ระบบล่าสุด','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php echo form_input('','',array('class'=>'form-control','disabled'=>TRUE));?>
      </div>
    </div>
    <div class="form-group">
      <?php echo form_label('โทรศัพท์','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php echo form_input('','',array('class'=>'form-control'));?>
      </div>
    </div>
    <div class="form-group">
      <?php echo form_label('โทรสาร','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php echo form_input('','',array('class'=>'form-control'));?>
      </div>
    </div>
    <hr>
    <div class="form-group">
      <?php echo form_label('','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php echo form_submit('','ยืนยัน',array('class'=>'btn btn-primary'));?>
        <?php echo form_reset('','ล้าง',array('class'=>'btn btn-default'));?>
      </div>
    </div>
    <?php echo form_close();?>
  </div>
  <div class="panel-footer">
    <?php $this->load->view('_partials/messages'); ?>
  </div>
</div>
