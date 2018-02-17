<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('partials/header'); ?>
<?php $this->load->view('partials/navbar'); ?>
<?php $this->load->view('partials/menubar'); ?>
<div class="container">
	<div class="row">
    <div class="panel panel-success">
      <div class="panel-heading"> <h4 class="panel-title"> <?php echo lang('form_legend_comment'); ?></h4> </div>
      <div class="panel-body">
        <?php echo form_open(uri_string(),array('class'=>'form-horizontal','data-toggle'=>'validator')); ?>
        <?php echo form_hidden(array('webboard_topic_id'=>$save_comment['webboard_topic_id'],'id'=>$save_comment['id'])); ?>
				<?php echo form_hidden('edited',$save_comment['edited'].$save_comment['comment']); ?>
        <div class="form-group">
          <div class="col-sm-3"> <div class="pull-right"> <?php echo smiley_js(); ?> <?php echo $smiley_table; ?> </div> </div>
          <div class="col-sm-9">
						<?php echo form_textarea(array(
								'name'=>'comment',
								'id'=>'smiley',
								'class'=>'form-control',
								'rows'=>'15',
								'required'=>TRUE,
								'value'=>strip_tags($save_comment['comment'])
							)); ?>
					</div>
        </div>
        <div class="form-group"> <?php echo form_label($captcha['image'],'',array('class'=>'control-label text-right col-sm-3')); ?>
          <div class="col-sm-3"> <?php echo form_input(array('name'=>'captcha','class'=>'form-control','placeholder'=>'0000','required'=>TRUE,'data-minlength'=>'4','maxlength'=>'4')); ?> <p class="help-block"><?php echo lang('form_captcha'); ?></p> </div>
          <div class="col-sm-6 pull-right">
						<?php echo form_button_submit(lang('form_button_submit')); ?>
						<?php echo form_button_reset(lang('form_button_reset')); ?>
						<?php echo form_anchor_back('webboard'); ?>
					</div>
        </div>
        <?php echo form_close(); ?>
      </div>
    </div>
    <?php echo validation_errors('<div class="alert alert-info">','</div>');?>
	</div>
</div>
<?php $this->load->view('partials/footer'); ?>
