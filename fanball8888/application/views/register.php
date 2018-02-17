<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('partials/header'); ?>
<?php $this->load->view('partials/navbar'); ?>
<?php $this->load->view('partials/message'); ?>
<div class="container" style="margin-top:5em;">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-success">
				<div class="panel-heading"></div>
				<div class="panel-body">
					<?php echo form_open(uri_string(),array('autocomplete'=>FALSE,'class'=>'form-horizontal','data-toggle'=>'validator'),array('picture'=>date('YmdHis'))); ?>
					<div class="col-lg-6">
						<?php echo form_fieldset(lang('form_legend_user')); ?>
						<div class="form-group"> <?php echo form_label(lang('form_username'),'username',array('class'=>'control-label text-right col-sm-3')); ?>
							<div class="col-sm-9"> <?php echo form_input(array('name'=>'username','class'=>'form-control','placeholder'=>lang('form_username'),'required'=>TRUE),set_value('username')); ?> <p class="help-block">ตัวอักษรภาษาอังกฤษ(พิมพ์เล็ก)หรือตัวเลข เท่านั้น</p> </div>
						</div>
						<div class="form-group"> <?php echo form_label(lang('form_password'),'password',array('class'=>'control-label text-right col-sm-3')); ?>
							<div class="col-sm-9"> <?php echo form_password(array('name'=>'password','id'=>'password','class'=>'form-control','required'=>TRUE,'data-minlength'=>'8','maxlength'=>'8')); ?> <p class="help-block"><?php echo lang('form_password_help'); ?></p> </div>
						</div>
						<div class="form-group"> <?php echo form_label(lang('form_password_confirm'),'password_confirm',array('class'=>'control-label text-right col-sm-3')); ?>
							<div class="col-sm-9"> <?php echo form_password(array('name'=>'password_confirm','class'=>'form-control','required'=>TRUE,'data-match'=>'#password','data-minlength'=>'8','maxlength'=>'8')); ?> <p class="help-block"><?php echo lang('form_password_help'); ?></p> </div>
						</div>
						<?php echo form_fieldset_close(); ?>
						<?php echo form_fieldset(lang('form_legend_detail')); ?>
						<div class="form-group"> <?php echo form_label(lang('form_fullname'),'fullname',array('class'=>'control-label text-right col-sm-3')); ?>
							<div class="col-sm-9"> <?php echo form_input(array('name'=>'fullname','class'=>'form-control','placeholder'=>lang('form_fullname'),'required'=>TRUE,'maxlength'=>'100'),set_value('fullname')); ?> <p class="help-block"></p> </div>
						</div>
						<div class="form-group"> <?php echo form_label(lang('form_email'),'email',array('class'=>'control-label text-right col-sm-3')); ?>
							<div class="col-sm-9"> <?php echo form_email(array('name'=>'email','class'=>'form-control','placeholder'=>lang('form_email'),'required'=>TRUE),set_value('email')); ?> <p class="help-block"></p> </div>
						</div>
						<div class="form-group"> <?php echo form_label(lang('form_phone'),'phone',array('class'=>'control-label text-right col-sm-3')); ?>
							<div class="col-sm-9"> <?php echo form_input(array('name'=>'phone','class'=>'form-control','placeholder'=>'0000000000','required'=>TRUE,'data-minlength'=>'10','maxlength'=>'10'),set_value('phone')); ?> <p class="help-block"><?php echo lang('form_phone_help'); ?></p> </div>
						</div>
						<?php echo form_fieldset_close().hr(); ?>
					</div>
					<div class="col-lg-6">
						<?php echo form_fieldset(lang('form_legend_play')); ?>
						<div class="form-group"> <?php echo form_label(lang('form_account_bank'),'account_bank',array('class'=>'control-label text-right col-sm-3')); ?>
							<div class="col-sm-9"> <?php echo form_dropdown(array('name'=>'account_bank','class'=>'form-control','required'=>TRUE),dropdown_bank()); ?> <p class="help-block"></p> </div>
						</div>
						<div class="form-group"> <?php echo form_label(lang('form_account_name'),'account_name',array('class'=>'control-label text-right col-sm-3')); ?>
							<div class="col-sm-9"> <?php echo form_input(array('name'=>'account_name','class'=>'form-control','placeholder'=>lang('form_account_name'),'required'=>TRUE),set_value('account_name')); ?> <p class="help-block"><?php echo lang('form_account_name_help'); ?></p> </div>
						</div>
						<div class="form-group"> <?php echo form_label(lang('form_account_number'),'account_number',array('class'=>'control-label text-right col-sm-3')); ?>
							<div class="col-sm-9"> <?php echo form_input(array('name'=>'account_number','class'=>'form-control','placeholder'=>lang('form_account_number'),'required'=>TRUE),set_value('account_number')); ?> <p class="help-block"><?php echo lang('form_account_number_help'); ?></p> </div>
						</div>
						<?php echo form_fieldset_close().hr(); ?>
						<?php echo form_fieldset(); ?>
						<div class="form-group"> <?php echo form_label(lang('form_security_question'),'security_question',array('class'=>'control-label col-sm-3')); ?>
							<div class="col-sm-9"> <?php echo form_dropdown(array('name'=>'security_question','class'=>'form-control','required'=>TRUE),dropdown_question()); ?> <p class="help-block"></p> </div>
						</div>
						<div class="form-group"> <?php echo form_label(lang('form_security_answer'),'security_answer',array('class'=>'control-label col-sm-3')); ?>
							<div class="col-sm-9">
								<?php echo form_input(array('name'=>'security_answer','class'=>'form-control','required'=>TRUE)); ?>
								<p class="help-block"><?php echo lang('form_security_answer_help'); ?></p>
							</div>
						</div>
						<div class="form-group"> <?php echo form_label($captcha['image'],'',array('class'=>'control-label text-right col-sm-6')); ?>
							<div class="col-sm-6"> <?php echo form_input(array('name'=>'captcha','class'=>'form-control','placeholder'=>'0000','required'=>TRUE,'data-minlength'=>'4','maxlength'=>'4')); ?> <p class="help-block"><?php echo lang('form_captcha'); ?></p> </div>
						</div>
						<?php echo form_fieldset_close(); ?>
						<div class="form-group"> <div class="col-sm-12"> <?php echo form_button_submit(lang('form_button_register')); ?> <?php echo form_button_reset(lang('form_button_reset')); ?> <?php echo anchor('user/login',lang('form_button_login'),array('class'=>'btn btn-link pull-right')); ?> </div> </div>
					</div>
					<?php echo form_close(); ?>
				</div>
				<div class="panel-footer"> <?php echo validation_errors('<div class="alert alert-info">', '</div>');?> </div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('partials/footer'); ?>
