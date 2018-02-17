<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('partials/header'); ?>
<div class="container" style="margin-top:1em;">
  <div class="row">
    <?php $this->load->view('partials/message'); ?>
    <?php if ( ! $user_bank) : ?>
      <p>ไม่พบข้อมูลธนาคาร</p>
    <?php elseif ( ! $this->session->flashdata('info')) : ?>
    <div class="panel panel-default">
      <div class="panel-heading"> <h3 class="panel-title"><?php echo lang('ui_product_withdraw'); ?></h3> </div>
      <div class="panel-body">
        <?php echo form_open(uri_string(),array('class'=>'form-horizontal','data-toggle'=>'validator')); ?>
        <?php echo form_hidden('user_product_id',$user_product_id); ?>
        <?php echo form_fieldset(lang('form_legend_bank')); ?>
        <?php foreach ($user_bank as $_ub=>$ub) : ?>
          <div class="form-group"> <?php echo form_label('','bank_id',array('class'=>'control-label col-sm-4')); ?>
            <div class="col-sm-8">
              <?php echo form_radio(array('name'=>'user_bank_id','required'=>TRUE),$ub['id']).nbs(2).$ub['account_bank']; ?>
              <p class="help-block" style="text-indent:2em;"><?php echo lang('form_account_name').nbs().$ub['account_name']; ?></p>
              <p class="help-block" style="text-indent:2em;"><?php echo lang('form_account_number').nbs().$ub['account_number']; ?></p>
            </div>
          </div>
        <?php endforeach; ?>
        <?php echo form_fieldset_close(); ?>
        <?php echo form_fieldset(lang('form_legend_withdraw')); ?>
        <div class="form-group"> <?php echo form_label(lang('form_amount'),'amount',array('class'=>'control-label col-sm-4')); ?>
          <div class="col-sm-8"> <div class="input-group"> <?php echo form_number(array('name'=>'amount','class'=>'form-control text-right','placeholder'=>'0','required'=>TRUE)); ?> <span class="input-group-addon">.00</span> </div> <p class="help-block">จำนวนเงินต้องไม่เกินยอดคงเหลือ</p> </div>
        </div>
        <?php echo form_fieldset_close().hr(); ?>
        <div class="form-group"><?php echo form_label($captcha['image'],'captcha',array('class'=>'control-label text-right col-sm-6')); ?>
          <div class="col-sm-6"><?php echo form_input(array('name'=>'captcha','class'=>'form-control','required'=>TRUE,'data-minlength'=>'4','maxlength'=>'4')); ?><p class="help-block"><?php echo lang('form_captcha'); ?></p> </div>
        </div><hr>
        <div class="form-group pull-right">
          <div class="col-sm-12"><?php echo form_button_submit(lang('form_button_register')); ?> <?php echo form_button_reset(lang('form_button_reset')); ?> </div>
        </div>
      </div>
      <div class="panel-footer"> <?php echo validation_errors('<div class="alert alert-info">','</div>');?> </div>
      <?php echo form_close(); ?>
    </div>
    <?php endif; ?>
  </div>
</div>
<?php $this->load->view('partials/footer'); ?>
