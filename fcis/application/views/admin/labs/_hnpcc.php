<div class="row">
  <div class="col-md-12">
    <?php echo form_fieldset('MSI'); ?>
    <div class="form-group">
      <?php echo form_label('H:','',array('class'=>'control-label col-md-2')); ?>
      <div class="col-md-10">
        <div class="checkbox">
          <label> <?php echo form_checkbox(array('name'=>'','class'=>'form-control'),'',set_value('')); ?>BAT26 </label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <?php echo form_label('L:','',array('class'=>'control-label col-md-2')); ?>
      <div class="col-md-10">
        <div class="checkbox">
          <label> <?php echo form_checkbox(array('name'=>'','class'=>'form-control'),'',set_value('')); ?>BAT26 </label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <?php echo form_label('S:','',array('class'=>'control-label col-md-2')); ?>
      <div class="col-md-1">
        <div class="checkbox">
          <label> <?php echo form_checkbox(array('name'=>'','class'=>'form-control'),''); ?> </label>
        </div>
      </div>
      <div class="col-md-4">
        <?php echo form_dropdown(array('name'=>'','class'=>'form-control'),array(''=>'choose one.'),set_value('')); ?>
      </div>
      <div class="col-md-5">
        <?php echo form_input(array('name'=>'','class'=>'form-control'),set_value('')); ?>
      </div>
    </div>
    <?php echo form_fieldset_close(); ?>
  </div>
</div>

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
