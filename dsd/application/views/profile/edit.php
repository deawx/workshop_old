<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">
      <?php echo lang('edit_user_heading');?>
      <small><?php echo lang('edit_user_subheading');?></small>
    </h3>
  </div>
  <div class="panel-body">
    <?php echo form_open(uri_string());?>
    <?php echo form_hidden('id', $user['id']);?>
    <div class="form-group">
      <?php echo lang('', '', array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php echo form_input($user['username'],'',array('class'=>'form-control','disabled'=>TRUE));?>
      </div>
    </div>
    <div class="form-group">
      <?php echo lang('', '', array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php echo form_input($user['email'],'',array('class'=>'form-control','disabled'=>TRUE));?>
      </div>
    </div>
    <div class="form-group">
      <?php echo lang('edit_user_fname_label', 'first_name', array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php echo form_input($user['first_name'],'',array('class'=>'form-control'));?>
      </div>
    </div>
    <div class="form-group">
      <?php echo lang('edit_user_lname_label', 'last_name', array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php echo form_input($user['last_name'],'',array('class'=>'form-control'));?>
      </div>
    </div>
    <div class="form-group">
      <?php echo lang('edit_user_company_label', 'company', array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php echo form_input($user['company'],'',array('class'=>'form-control'));?>
      </div>
    </div>
    <div class="form-group">
      <?php echo lang('edit_user_phone_label', 'phone', array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php echo form_input($phone,'',array('class'=>'form-control'));?>
      </div>
    </div>
    <div class="form-group">
      <?php echo form_submit('submit', lang('edit_user_submit_btn'));?>
    </div>
    <?php echo form_close();?>
  </div>
  <div class="panel-footer">
    <?php $this->load->view('_partials/messages'); ?>
  </div>
</div>