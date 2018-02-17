<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('partials/header'); ?>
<?php $this->load->view('partials/navbar'); ?>
<?php $this->load->view('partials/menubar'); ?>
<div class="container">
  <div class="row"> <?php echo validation_errors('<div class="alert alert-info">','</div>');?> </div>
	<div class="row">
    <div class="panel panel-success">
      <div class="panel-heading"> </div>
      <div class="panel-body">
        <?php echo form_open(uri_string(),array('class'=>'form-horizontal','data-toggle'=>'validator')); ?>
        <?php echo (isset($save_topic)) ? form_hidden(array('id'=>$save_topic['id'])) : ''; ?>
        <?php echo form_fieldset(lang('navbar_topic')); ?>
        <div class="form-group"> <?php echo form_label(lang('form_webboard_title'),'title',array('class'=>'control-label text-right col-sm-3')); ?>
          <div class="col-sm-9"> <?php echo form_input(array('name'=>'title','class'=>'form-control','required'=>TRUE,'autofocus'=>TRUE),set_value('title',(isset($save_topic['title']))?$save_topic['title']:'')); ?> <p class="help-block"></p> </div>
        </div>
        <div class="form-group"> <?php echo form_label(lang('form_webboard_category'),'category_id',array('class'=>'control-label text-right col-sm-3')); ?>
          <div class="col-sm-9"> <?php echo form_dropdown(array('name'=>'category_id','class'=>'form-control','required'=>TRUE),$category,set_value('category_id',(isset($save_topic['category_id']))?$save_topic['category_id']:'')); ?> <p class="help-block"></p> </div>
        </div>
        <div class="form-group"> <?php echo form_label(lang('form_webboard_content'),'content',array('class'=>'control-label text-right col-sm-3')); ?>
          <div class="col-sm-9"> <?php echo form_textarea(array('name'=>'content','class'=>'form-control textarea','required'=>TRUE,'value'=>(isset($save_topic['content']))?$save_topic['content']:'')); ?> <p class="help-block"></p> </div>
        </div>
        <?php echo form_fieldset_close().hr(); ?>
        <?php if ( ! isset($save_topic)) : ?>
          <div class="form-group"> <?php echo form_label($captcha['image'],'',array('class'=>'control-label text-right col-sm-6')); ?>
            <div class="col-sm-6"> <?php echo form_input(array('name'=>'captcha','class'=>'form-control','placeholder'=>'0000','required'=>TRUE,'data-minlength'=>'4','maxlength'=>'4')); ?> <p class="help-block"><?php echo lang('form_captcha'); ?></p> </div>
          </div>
        <?php endif; ?>
        <div class="form-group pull-right"> <div class="col-sm-12"> <?php echo form_button_submit(lang('form_button_submit')); ?> <?php echo form_button_reset(lang('form_button_reset')); ?> <?php echo form_anchor_back('webboard',lang('form_button_back')); ?> </div> </div>
        <?php echo form_close(); ?>
      </div>
    </div>
	</div>
</div>
<?php $this->load->view('partials/footer'); ?>
<?php echo script_tag('assets/admin/js/tinymce/tinymce.js');?>
<script type="text/javascript">
$(document).ready(function() {
  tinymce.init({
    selector: '.textarea',
    menubar: false,
    height: 300,
    theme: 'modern',
    plugins: [
      'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      'searchreplace wordcount visualblocks visualchars code fullscreen',
      'insertdatetime media nonbreaking save table contextmenu directionality',
      'emoticons template paste textcolor colorpicker textpattern imagetools'
    ],
    toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | table | bullist numlist outdent indent | link image',
    image_advtab: true
  });
});
</script>
