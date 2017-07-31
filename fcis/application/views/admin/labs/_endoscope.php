<?php echo form_fieldset('ENDOSCOPE REPORT'); ?>
<div class="form-group">
  <?php echo form_label('endoscope result:','endoscope',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-10">
    <div class="radio-inline">
      <label><?php echo form_radio(array('name'=>'endoscope','class'=>'form-control'),'normal',set_radio('endoscope','normal',($labs['endoscope'] === 'normal'))); ?>normal</label>
    </div>
    <div class="radio-inline">
      <label><?php echo form_radio(array('name'=>'endoscope','class'=>'form-control'),'polyp',set_radio('endoscope','polyp',($labs['endoscope'] === 'polyp'))); ?>polyp</label>
    </div>
    <div class="radio-inline">
      <label><?php echo form_radio(array('name'=>'endoscope','class'=>'form-control'),'tumor',set_radio('endoscope','tumor',($labs['endoscope'] === 'tumor'))); ?>tumor</label>
    </div>
  </div>
</div>
<?php echo form_fieldset_close(); ?>
<?php $this->load->view('admin/labs/assets'); ?>

<script type="text/javascript">
$(document).ready(function() {
  Dropzone.options.dropzoneUpload = {
    parallelUploads: '10',
    maxFilesize: '1',
    maxFiles: '10',
    params: { labs_id: '<?php echo $this->uri->segment('4'); ?>' },
    acceptedFiles: 'image/*',
    autoProcessQueue: false,
    addRemoveLinks: true,
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
