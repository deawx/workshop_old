<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('admin/partials/header'); ?>
<?php $this->load->view('admin/partials/navbar'); ?>
<div id="page-wrapper" >
  <?php echo (isset($offer)) ? anchor('admin/promotion?type=offer&form=save_offer','เพิ่มข้อมูล',array('class'=>'btn btn-success')) : anchor('admin/promotion?type=offer','<span aria-hidden="true">&larr;</span> ย้อนกลับ',array('class'=>'btn btn-primary')); ?>
  <div class="row"> <?php $this->load->view('partials/message'); ?> <?php echo validation_errors('<div class="alert alert-info">','</div>');?> <?php echo $this->upload->display_errors('<div class="alert alert-warning">','</div>');?> </div>
  <div id="page-inner">
    <?php if ( ! isset($offer)) : ?>
      <div class="row">
        <div class="col-md-12">
          <?php echo form_open_multipart(uri_string(),array('class'=>'form-horizontal','data-toggle'=>'validator')); ?>
          <?php echo ($save_offer)
          ? form_hidden(array('id'=>$save_offer['id'],'picture'=>$save_offer['picture'],'re_name'=>$save_offer['name']))
          : form_hidden(array('picture'=>date('YmdHis').'.jpg')); ?>
          <?php echo form_hidden('post','offer'); ?>
          <?php echo form_fieldset(($save_offer) ? 'อัพเดทรายการโปรโมชั่น' : 'เพิ่มรายการโปรโมชั่น'); ?>
          <div class="form-group"> <?php echo form_label('','',array('class'=>'col-sm-3 text-right')); ?>
            <div class="col-sm-9"> <?php echo img('assets/images/promotion/'.$save_offer['picture'],'',array('id'=>'preview','class'=>'img-responsive','style'=>'width:960px;height:200px;padding:5px;')).br(); ?> </div>
          </div>
          <div class="form-group"> <?php echo form_label('รูปภาพ','picture',array('class'=>'col-sm-3 text-right')); ?>
            <div class="col-sm-9"> <?php echo form_upload(array('name'=>'picture','id'=>'picture','class'=>'form-control')); ?> <p class="help-block">* รองรับไฟล์นามสกุล jpg,jpeg,png ** รูปภาพจะแปลงเป็นสองไฟล์/สองขนาด 400x150 พิกเซลและ 1200x350 พิกเซล</p> </div>
          </div>
          <div class="form-group"> <?php echo form_label('หัวข้อ','name',array('class'=>'col-sm-3 text-right')); ?>
            <div class="col-sm-9"> <?php echo form_input(array('name'=>'name','class'=>'form-control','required'=>TRUE),set_value('name',$save_offer['name'])); ?> </div>
          </div>
          <div class="form-group"> <?php echo form_label('รายละเอียด','detail',array('class'=>'col-sm-3 text-right')); ?>
            <div class="col-sm-9"> <?php echo form_textarea(array('name'=>'detail','class'=>'form-control textarea','required'=>TRUE,'value'=>$save_offer['detail'])); ?> </div>
          </div>
          <?php echo form_fieldset_close(); ?>
          <div class="form-group pull-right"> <div class="col-sm-12"> <?php echo form_button_submit(); ?> <?php echo form_button_reset(); ?></div> </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    <?php endif; ?>
    <div class="row"> <div class="col-sm-12"> <?php echo (isset($offer)) ? '<legend>รายการโปรโมชั่น</legend>'.$offer : ''; ?> </div> </div>
  </div>
</div>
<?php $this->load->view('admin/partials/footer'); ?>
