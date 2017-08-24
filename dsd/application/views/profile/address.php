<?php
$address = unserialize($profile['address']);
$address_current = unserialize($profile['address_current']);
?>
<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title"> แก้ไขข้อมูลที่อยู่
      <small><?php echo lang('edit_user_subheading');?></small>
    </h3>
  </div>
  <div class="panel-body">
    <?php echo form_open(uri_string(),array('class'=>'form-horizontal'));?>
    <?php echo form_hidden('id', $user['id']);?>
    <?php echo form_hidden('profile_id', $profile['id']);?>
    <div class="form-group">
      <?php echo form_label('ที่อยู่เลขที่(ปัจจุบัน)','address',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php echo form_input(array('name'=>'address[address]','class'=>'form-control'),set_value('address[address]',$address['address']));?>
      </div>
    </div>
    <div class="form-group">
      <?php echo form_label('ถนน','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php echo form_input(array('name'=>'address[street]','class'=>'form-control'),set_value('address[street]',$address['street']));?>
      </div>
    </div>
    <div class="form-group">
      <?php echo form_label('ตำบล','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php echo form_input(array('name'=>'address[tambon]','class'=>'form-control'),set_value('address[tambon]',$address['tambon']));?>
      </div>
    </div>
    <div class="form-group">
      <?php echo form_label('อำเภอ','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php echo form_input(array('name'=>'address[amphur]','class'=>'form-control'),set_value('address[amphur]',$address['amphur']));?>
      </div>
    </div>
    <div class="form-group">
      <?php echo form_label('จังหวัด','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php echo form_input(array('name'=>'address[province]','class'=>'form-control'),set_value('address[province]',$address['province']));?>
      </div>
    </div>
    <div class="form-group">
      <?php echo form_label('รหัสไปรษณีย์','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php echo form_number(array('name'=>'address[zip]','class'=>'form-control','maxlength'=>'5'),set_value('address[zip]',$address['zip']));?>
      </div>
    </div>
    <hr>
    <div class="form-group">
      <?php echo form_label('','exist',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <div class="checkbox">
          <label> <?php echo form_checkbox(array('name'=>'exist','id'=>'exist'));?> ใช้ที่อยู่ปัจจุบัน </label>
        </div>
      </div>
    </div>
    <div id="exist_ctn">
      <div class="form-group">
      <?php echo form_label('ที่อยู่เลขที่(ตามทะเบียนบ้าน)','address_current',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php echo form_input(array('name'=>'address_current[address]','class'=>'form-control'),set_value('address_current[address]',$address_current['address']));?>
      </div>
      </div>
      <div class="form-group">
        <?php echo form_label('ถนน','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8">
          <?php echo form_input(array('name'=>'address_current[street]','class'=>'form-control'),set_value('address_current[street]',$address_current['street']));?>
        </div>
      </div>
      <div class="form-group">
        <?php echo form_label('ตำบล','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8">
          <?php echo form_input(array('name'=>'address_current[tambon]','class'=>'form-control'),set_value('address_current[tambon]',$address_current['tambon']));?>
        </div>
      </div>
      <div class="form-group">
        <?php echo form_label('อำเภอ','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8">
          <?php echo form_input(array('name'=>'address_current[amphur]','class'=>'form-control'),set_value('address_current[amphur]',$address_current['amphur']));?>
        </div>
      </div>
      <div class="form-group">
        <?php echo form_label('จังหวัด','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8">
          <?php echo form_input(array('name'=>'address_current[province]','class'=>'form-control'),set_value('address_current[province]',$address_current['province']));?>
        </div>
      </div>
      <div class="form-group">
        <?php echo form_label('รหัสไปรษณีย์','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8">
          <?php echo form_number(array('name'=>'address_current[zip]','class'=>'form-control','maxlength'=>'5'),set_value('address_current[zip]',$address_current['zip']));?>
        </div>
      </div>
    </div>
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

<script type="text/javascript">
$(function(){
  var exist = $('#exist');
  var exist_ctn = $('div#exist_ctn :input');
  <?php if ( ! $profile['address_current']) : ?>
    exist.prop('checked',true);
    exist_ctn.prop('disabled',true);
  <?php endif; ?>
  exist.on('change',function(){
    if (this.checked) {
      exist_ctn.prop('disabled',true);
    } else {
      exist_ctn.prop('disabled',false);
    }
  });
});
</script>
