<?php echo form_fieldset('APC Gene'); ?>
<div class="form-group">
  <?php echo form_label(':','',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-10">
    <div class="checkbox">
      <label> <?php echo form_checkbox(array('name'=>'','class'=>'form-control'),'',set_value('')); ?> </label>
      <p class="help-block"></p>
    </div>
  </div>
</div>
<?php echo form_fieldset_close(); ?>

<?=link_tag('assets/admin/plugins/dropzone/dropzone.min.css');?>
<?=link_tag('assets/admin/plugins/dropzone/basic.min.css');?>
<?=script_tag('assets/admin/plugins/dropzone/dropzone.min.js');?>
<script type="text/javascript">
$(document).ready(function() {
  Dropzone.options.dropzoneUpload = {
    parallelUploads: '10',
    maxFilesize: '1',
    maxFiles: '10',
    params: { lab_id: '<?php echo $this->uri->segment('4'); ?>' },
    acceptedFiles: 'image/*',
    autoProcessQueue: false,
    init: function() {
      var submitButton = document.querySelector("#dropzone-submit")
      myDropzone = this;
      submitButton.addEventListener("click", function() {
        myDropzone.processQueue();
      });
    }
  };
});
</script>
