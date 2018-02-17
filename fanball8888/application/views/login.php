<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('partials/header'); ?>
<?php $this->load->view('partials/navbar'); ?>
<div class="container" style="margin-top:5em;">
	<div class="row"> <?php $this->load->view('partials/message'); ?> </div>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-success">
				<div class="panel-heading"></div>
				<div class="panel-body">
					<?php echo form_open(uri_string(),array('class'=>'form-horizontal','data-toggle'=>'validator')); ?>
					<?php echo form_fieldset(lang('form_legend_user')); ?>
					<div class="form-group"> <?php echo form_label(lang('form_username'),'username',array('class'=>'control-label text-right col-sm-3')); ?>
						<div class="col-sm-9"> <?php echo form_input(array('name'=>'username','class'=>'form-control','placeholder'=>lang('form_username'),'required'=>TRUE,'autofocus'=>TRUE)); ?> <p class="help-block"></p> </div>
					</div>
					<div class="form-group"> <?php echo form_label(lang('form_password'),'password',array('class'=>'control-label text-right col-sm-3')); ?>
						<div class="col-sm-9"> <?php echo form_password(array('name'=>'password','id'=>'password','class'=>'form-control','required'=>TRUE,'data-minlength'=>'8','maxlength'=>'8')); ?> <p class="help-block"><?php echo lang('form_password_help'); ?></p> </div>
					</div>
					<?php echo form_fieldset_close().hr(); ?>
					<div class="form-group"> <?php echo form_label($captcha['image'],'',array('class'=>'control-label text-right col-sm-6')); ?>
						<div class="col-sm-6"> <?php echo form_input(array('name'=>'captcha','class'=>'form-control','placeholder'=>'0000','required'=>TRUE,'data-minlength'=>'4','maxlength'=>'4')); ?> <p class="help-block"><?php echo lang('form_captcha'); ?></p> </div>
					</div><hr>
					<div class="form-group"> <div class="col-sm-12"> <?php echo form_button_submit(lang('form_button_login')); ?> <?php echo form_button_reset(lang('form_button_reset')); ?> <?php echo anchor('user/register',lang('form_button_register'),array('class'=>'btn btn-link pull-right')); ?> </div> </div>
				</div>
				<div class="panel-footer"> <?php echo validation_errors('<div class="alert alert-info">','</div>');?> </div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('partials/footer'); ?>
