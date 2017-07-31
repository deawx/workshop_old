<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">
      <?php echo lang('edit_user_heading');?>
      <small><?php echo lang('edit_user_subheading');?></small>
    </h3>
  </div>
  <div class="panel-body">
    <?php $this->load->view('_partials/messages'); ?>
    <?php echo form_open(uri_string(),array('class'=>'form-horizontal'));?>
    <?php echo form_hidden('id', $user['id']);?>
    <div class="form-group">
      <?php echo lang('edit_user_password_label', 'password', array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php echo form_input($password,'',array('class'=>'form-control'));?>
      </div>
    </div>
    <div class="form-group">
      <?php echo lang('edit_user_password_confirm_label', 'password_confirm', array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php echo form_input($password_confirm,'',array('class'=>'form-control'));?>
      </div>
    </div>
    <div class="form-group">
      <?php echo form_submit('submit', lang('edit_user_submit_btn'));?>
    </div>
    <?php echo form_close();?>
  </div>
  <div class="panel-footer">
  </div>
</div>
