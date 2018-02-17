<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('partials/header'); ?>
<?php $this->load->view('partials/navbar'); ?>
<?php $this->load->view('partials/menubar'); ?>
<div class="container">
	<div class="row">
		<div class="col-sm-12"><?php echo validation_errors('<div class="alert alert-info">','</div>');?><?php echo $this->upload->display_errors('<div class="alert alert-warning">','</div>');?></div>
		<div class="col-sm-4" style="padding:0.1em;"><?php $this->load->view('partials/sidebar'); ?></div>
		<div class="col-sm-8" style="padding:0.1em;">
			<div class="panel panel-info">
			  <div class="panel-heading"></div>
			  <div class="panel-body">
					<?php echo form_open(uri_string(),array('class'=>'form-horizontal','data-toggle'=>'validator')); ?>
					<?php echo form_hidden('id',$this->session->id); ?>
					<?php echo form_hidden('post','change_password'); ?>
					<?php echo form_fieldset(lang('form_legend_password')); ?>
					<div class="form-group"><?php echo form_label(lang('form_password_old'),'old_password',array('class'=>'control-label col-sm-4')); ?>
						<div class="col-sm-8"><?php echo form_password(array('name'=>'old_password','class'=>'form-control','data-minlength'=>'8','maxlength'=>'8','placeholder'=>lang('form_password_old'),'required'=>TRUE)); ?><p class="help-block"></p></div>
					</div>
					<div class="form-group"><?php echo form_label(lang('form_password_new'),'new_password',array('class'=>'control-label col-sm-4')); ?>
						<div class="col-sm-8"><?php echo form_password(array('name'=>'new_password','id'=>'new_password','class'=>'form-control','data-minlength'=>'8','maxlength'=>'8','placeholder'=>lang('form_password_new'),'required'=>TRUE)); ?><p class="help-block"><?php echo lang('form_password_help'); ?></p></div>
					</div>
					<div class="form-group"><?php echo form_label(lang('form_password_confirm'),'new_password_confirm',array('name'=>'','class'=>'control-label col-sm-4')); ?>
						<div class="col-sm-8"><?php echo form_password(array('name'=>'new_password_confirm','class'=>'form-control','data-match'=>'#new_password','data-minlength'=>'8','maxlength'=>'8','placeholder'=>lang('form_password_confirm'),'required'=>TRUE)); ?><p class="help-block"></p></div>
					</div>
					<?php echo form_fieldset_close(); ?>
					<div class="form-group pull-right"> <div class="col-sm-12"> <?php echo form_button_submit(lang('form_button_update')); ?> <?php echo form_button_reset(lang('form_button_reset')); ?> </div> </div>
					<?php echo form_close(); ?>
			  </div>
			  <div class="panel-footer"></div>
			</div>
			<div class="panel panel-info">
				<div class="panel-heading"></div>
				<div class="panel-body">
					<?php echo form_open_multipart(uri_string(),array('class'=>'form-horizontal','data-toggle'=>'validator')); ?>
					<?php echo form_hidden('id',$this->session->id); ?>
					<?php echo form_hidden('picture',$this->session->picture); ?>
					<?php echo form_hidden('re_email',$this->session->email); ?>
					<?php echo form_hidden('post','update'); ?>
					<?php echo form_fieldset(lang('form_legend_user')); ?>
					<div class="form-group"><?php echo form_label('','',array('class'=>'control-label col-sm-4')); ?>
						<div class="col-sm-8"><?php echo img('assets/images/user/'.$this->session->picture,'',array('class'=>'img-responsive','id'=>'preview','style'=>'width:200px;height:200px;')); ?><p class="help-block"></p></div>
					</div>
					<div class="form-group"><?php echo form_label(lang('form_picture'),'picture',array('class'=>'control-label col-sm-4')); ?>
						<div class="col-sm-8"><?php echo form_upload(array('name'=>'picture','id'=>'picture','class'=>'form-control')); ?><p class="help-block">* รองรับไฟล์นามสกุล jpg,jpeg,png ** รูปภาพจะถูกย่อขนาดเป็น 200x200 พิกเซล</p></div>
					</div>
					<div class="form-group"><?php echo form_label(lang('form_fullname'),'fullname',array('class'=>'control-label col-sm-4')); ?>
						<div class="col-sm-8"><?php echo form_input(array('name'=>'fullname','class'=>'form-control','placeholder'=>lang('form_fullname'),'required'=>TRUE),set_value('fullname',$this->session->fullname)); ?><p class="help-block"></p></div>
					</div>
					<div class="form-group"><?php echo form_label(lang('form_email'),'email',array('class'=>'control-label col-sm-4')); ?>
						<div class="col-sm-8"><?php echo form_input(array('name'=>'email','class'=>'form-control','placeholder'=>lang('form_email'),'required'=>TRUE),set_value('email',$this->session->email)); ?><p class="help-block"></p></div>
					</div>
					<div class="form-group"><?php echo form_label(lang('form_phone'),'phone',array('class'=>'control-label col-sm-4')); ?>
						<div class="col-sm-8"><?php echo form_input(array('name'=>'phone','class'=>'form-control','placeholder'=>lang('form_phone'),'required'=>TRUE),set_value('',$this->session->phone)); ?><p class="help-block"></p></div>
					</div>
					<div class="form-group"><?php echo form_label(lang('form_id'),'',array('class'=>'control-label col-sm-4')); ?>
						<div class="col-sm-8"><?php echo form_input(array('name'=>'','class'=>'form-control','disabled'=>TRUE),set_value('',sprintf('%04d',$this->session->id))); ?><p class="help-block"></p></div>
					</div>
					<div class="form-group"><?php echo form_label(lang('form_username'),'',array('class'=>'control-label col-sm-4')); ?>
						<div class="col-sm-8"><?php echo form_input(array('name'=>'','class'=>'form-control','disabled'=>TRUE),set_value('',$this->session->username)); ?><p class="help-block"></p></div>
					</div>
					<div class="form-group"><?php echo form_label(lang('form_created'),'',array('class'=>'control-label col-sm-4')); ?>
						<div class="col-sm-8"><?php echo form_input(array('name'=>'','class'=>'form-control','disabled'=>TRUE),set_value('',$this->session->created)); ?><p class="help-block"></p></div>
					</div>
					<div class="form-group"><?php echo form_label(lang('form_updated'),'',array('class'=>'control-label col-sm-4')); ?>
						<div class="col-sm-8"><?php echo form_input(array('name'=>'','class'=>'form-control','disabled'=>TRUE),set_value('',$this->session->updated)); ?><p class="help-block"></p></div>
					</div>
					<div class="form-group"><?php echo form_label(lang('form_logged'),'',array('class'=>'control-label col-sm-4')); ?>
						<div class="col-sm-8"><?php echo form_input(array('name'=>'','class'=>'form-control','disabled'=>TRUE),set_value('',$this->session->logged)); ?><p class="help-block"></p></div>
					</div>
					<?php echo form_fieldset_close(); ?>
					<div class="form-group pull-right"> <div class="col-sm-12"> <?php echo form_button_submit(lang('form_button_update')); ?> <?php echo form_button_reset(lang('form_button_reset')); ?> </div> </div>
					<?php echo form_close(); ?>
				</div>
				<div class="panel-footer"></div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('partials/footer'); ?>
