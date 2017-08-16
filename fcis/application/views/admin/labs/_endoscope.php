<?php echo form_fieldset('ENDOSCOPE REPORT'); ?>
<div class="form-group">
  <?php echo form_label('endoscope result:','endoscope',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-5">
    <?php $eds = array(''=>'เลือกรายการ','NORMAL'=>'NORMAL','POLYP'=>'POLYP','TUMOR'=>'TUMOR');
    echo form_dropdown(array('name'=>'endoscope','class'=>'form-control'),$eds,set_value('')); ?>
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
