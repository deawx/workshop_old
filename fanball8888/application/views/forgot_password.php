<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('partials/header'); ?>
<?php $this->load->view('partials/navbar'); ?>
<?php $this->load->view('partials/message'); ?>
<div class="container" style="margin-top:5em;">
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="panel panel-success">
				<div class="panel-heading"></div>
				<div class="panel-body">
					<?php echo form_open(uri_string(),array('class'=>'form-horizontal','data-toggle'=>'validator')); ?>
					<div class="form-group"> <?php echo form_label(lang('form_security_question'),'security_question',array('class'=>'control-label col-sm-3')); ?>
						<div class="col-sm-9"> <?php echo form_dropdown('security_question',dropdown_question(),'',array('class'=>'form-control','required'=>TRUE)); ?> </div>
					</div>
					<div class="form-group"> <?php echo form_label(lang('form_security_answer'),'security_answer',array('class'=>'control-label col-sm-3')); ?>
						<div class="col-sm-9"> <?php echo form_input(array('name'=>'security_answer','class'=>'form-control','required'=>TRUE)); ?> <p class="help-block"><?php echo lang('form_security_answer_help'); ?></p> </div>
					</div>
					<?php echo form_fieldset(lang('form_legend_user')); ?>
					<div class="form-group"> <?php echo form_label(lang('form_username'),'username',array('class'=>'control-label text-right col-sm-3')); ?>
						<div class="col-sm-9"> <?php echo form_input(array('name'=>'username','class'=>'form-control','placeholder'=>lang('form_username'),'required'=>TRUE)); ?> </div>
					</div>
					<div class="form-group"> <?php echo form_label(lang('form_phone'),'phone',array('class'=>'control-label text-right col-sm-3')); ?>
						<div class="col-sm-9"> <?php echo form_input(array('name'=>'phone','class'=>'form-control','placeholder'=>lang('form_phone'),'required'=>TRUE)); ?> </div>
					</div>
					<?php echo form_fieldset_close(); ?>
					<?php echo form_fieldset(lang('form_legend_forgot_password')); ?>
					<div class="form-group"> <?php echo form_label(lang('form_password'),'password',array('class'=>'control-label text-right col-sm-3')); ?>
						<div class="col-sm-9"> <?php echo form_password(array('name'=>'password','id'=>'password','class'=>'form-control','required'=>TRUE,'data-minlength'=>'8','maxlength'=>'8')); ?> <p class="help-block"><?php echo lang('form_password_help'); ?></p> </div>
					</div>
					<div class="form-group"> <?php echo form_label(lang('form_password_confirm'),'password_confirm',array('class'=>'control-label text-right col-sm-3')); ?>
						<div class="col-sm-9"> <?php echo form_password(array('name'=>'password_confirm','class'=>'form-control','required'=>TRUE,'data-match'=>'#password','data-minlength'=>'8','maxlength'=>'8')); ?> <p class="help-block"><?php echo lang('form_password_help'); ?></p> </div>
					</div>
					<?php echo form_fieldset_close().hr(); ?>
					<div class="form-group"> <?php echo form_label($captcha['image'],'',array('class'=>'control-label text-right col-sm-6')); ?>
						<div class="col-sm-6"> <?php echo form_input(array('name'=>'captcha','class'=>'form-control','placeholder'=>'0000','required'=>TRUE,'data-minlength'=>'4','maxlength'=>'4')); ?> <p class="help-block"><?php echo lang('form_captcha'); ?></p> </div>
					</div><hr>
					<div class="form-group"> <?php echo form_label('','',array('class'=>'control-label text-right col-sm-3')); ?>
						<div class="col-sm-12"> <?php echo form_submit('',lang('form_button_forgot_password'),array('class'=>'btn btn-success btn-block')); ?> </div>
					</div>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
		<?php echo validation_errors('<div class="alert alert-info">','</div>');?>
	</div>
</div>
<?php $this->load->view('partials/footer'); ?>
