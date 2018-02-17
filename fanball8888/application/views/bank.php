<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('partials/header'); ?>
<?php $this->load->view('partials/navbar'); ?>
<?php $this->load->view('partials/menubar'); ?>
<div class="container">
	<div class="row">
		<div class="col-sm-4" style="padding:0.1em;"><?php $this->load->view('partials/sidebar'); ?></div>
		<div class="col-sm-8" style="padding:0.1em;">
			<div class="panel panel-info"><div class="panel-heading"></div>
			  <div class="panel-body">
					<?php echo form_open(uri_string(),array('class'=>'form-horizontal','data-toggle'=>'validator')); ?>
					<?php echo ($bank_edit) ? form_hidden('id',$bank_edit['id']) : form_hidden('user_id',$this->session->id); ?>
					<?php echo form_fieldset(lang('form_legend_bank')); ?>
					<div class="form-group"><?php echo form_label(lang('form_account_bank'),'account_bank',array('class'=>'control-label col-sm-4')); ?>
						<div class="col-sm-8"><?php echo form_dropdown(array('name'=>'account_bank','class'=>'form-control','placeholder'=>lang('form_account_bank'),'required'=>TRUE),dropdown_bank(),set_value('account_bank',$bank_edit['account_bank'])); ?><p class="help-block"></p></div>
					</div>
					<div class="form-group"><?php echo form_label(lang('form_account_name'),'account_name',array('class'=>'control-label col-sm-4')); ?>
						<div class="col-sm-8"><?php echo form_input(array('name'=>'account_name','class'=>'form-control','placeholder'=>lang('form_account_name'),'required'=>TRUE),set_value('account_name',$bank_edit['account_name'])); ?><p class="help-block"></p></div>
					</div>
					<div class="form-group"><?php echo form_label(lang('form_account_number'),'account_number',array('class'=>'control-label col-sm-4')); ?>
						<div class="col-sm-8"><?php echo form_input(array('name'=>'account_number','class'=>'form-control','placeholder'=>lang('form_account_number'),'required'=>TRUE),set_value('account_number',$bank_edit['account_number'])); ?><p class="help-block"></p></div>
					</div>
					<?php echo form_fieldset_close(); ?>
					<div class="form-group pull-right">
						<div class="col-sm-12">
							<?php echo form_button_submit(lang('form_button_submit')); ?>
							<?php echo form_button_reset(lang('form_button_reset')); ?>
							<?php if ($this->uri->segment(3)) { echo form_anchor_back('profile/bank',lang('form_button_back')); } ?>
						</div></div>
					<?php echo form_close(); ?>
			  </div><div class="panel-footer"></div>
			</div>
			<?php if ( ! $bank_edit) : ?>
			<div class="panel panel-info">
				<div class="panel-heading"></div>
				<div class="panel-body">
					<?php foreach ($bank as $b) : ?>
						<dl class="dl-horizontal col-sm-offset-1">
						  <dt><?php echo lang('form_account_bank'); ?></dt>
						  <dd><?php echo $b['account_bank'].nbs(2).(($b['status']=='0')?anchor('profile/bank/'.$b['id'],lang('ui_edit')):''); ?></dd>
						  <dt><?php echo lang('form_account_name'); ?></dt>
						  <dd><?php echo $b['account_name']; ?></dd>
						  <dt><?php echo lang('form_account_number'); ?></dt>
						  <dd><?php echo $b['account_number']; ?></dd>
						  <dt><?php echo lang('form_account_status'); ?></dt>
						  <dd>
								<?php echo form_radio(array('name'=>$b['id']),'',(($b['status']==='0') ? TRUE : FALSE),array('onchange'=>"window.location.href='".base_url('profile/bank_status/'.$b['id'].'/0')."';")).nbs().lang('ui_status_working'); ?>
								<?php echo form_radio(array('name'=>$b['id']),'',(($b['status']==='1') ? TRUE : FALSE),array('onchange'=>"window.location.href='".base_url('profile/bank_status/'.$b['id'].'/1')."';")).nbs().lang('ui_status_suspended'); ?>
							</dd>
						</dl><hr>
					<?php endforeach; ?>
				</div>
				<div class="panel-footer"></div>
			</div>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php $this->load->view('partials/footer'); ?>
