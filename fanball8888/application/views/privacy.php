<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('partials/header'); ?>
<?php $this->load->view('partials/navbar'); ?>
<?php $this->load->view('partials/menubar'); ?>
<div class="container">
	<div class="row">
		<div class="col-sm-4" style="padding:0.1em;"> <?php $this->load->view('partials/sidebar'); ?> </div>
    <div class="col-sm-8" style="padding:0.1em;">
      <div class="panel panel-info"><div class="panel-heading"> </div>
        <div class="panel-body">
					<?php $post = ($privacy['security_question'] && $check_question == FALSE) ? 'check_question' : 'save_question'; ?>
					<?php $disabled = ($privacy['security_question'] && $check_question == FALSE) ? 'disabled' : 'required'; ?>
					<?php echo form_open(uri_string(),array('class'=>'form-horizontal','data-toggle'=>'validator'),array('post'=>$post)); ?>
					<?php echo form_fieldset(lang('form_legend_question')); ?>
					<div class="form-group"> <?php echo form_label(lang('form_security_question'),'security_question',array('class'=>'control-label col-sm-3')); ?>
						<div class="col-sm-9"> <?php echo form_dropdown('security_question',dropdown_question(),(($check_question === FALSE) ? $privacy['security_question'] : ''),array('class'=>'form-control',$disabled=>TRUE)); ?> <p class="help-block"></p> </div>
					</div>
					<div class="form-group"> <?php echo form_label(lang('form_security_answer'),'security_answer',array('class'=>'control-label col-sm-3')); ?>
						<div class="col-sm-9">
							<?php echo form_input(array('name'=>'security_answer','class'=>'form-control','required'=>TRUE)); ?>
							<p class="help-block"><?php echo lang('form_security_answer_help'); ?></p>
						</div>
					</div>
					<?php echo form_fieldset_close().hr(); ?>
						<div class="form-group pull-right">
							<div class="col-sm-12">
								<?php $button = ($disabled == 'disabled') ? lang('form_question_security_change') : lang('form_question_security_update')?>
								<?php echo form_submit('',$button,array('class'=>'btn btn-danger btn-block')); ?>
							</div>
						</div>
					<?php echo form_close(); ?>
				</div>
				<div class="panel-footer"> <?php echo validation_errors('<div class="alert alert-info">','</div>');?> </div>
      </div>
    </div>
	</div>
</div>
<?php $this->load->view('partials/footer'); ?>
