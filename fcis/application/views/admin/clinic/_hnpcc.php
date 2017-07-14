<div class="row">
  <div class="col-md-12">
    <?php echo form_fieldset('Criteria'); ?>
    <div class="form-group">
      <?php echo form_label('criteria:','',array('class'=>'control-label col-md-2')); ?>
      <div class="col-md-10">
        <?php $dropdown_tof = array(''=>'เลือกรายการ',
          'Amsterdam I'=>'Amsterdam I',
          'Amsterdam II'=>'Amsterdam II',
          'Bethesda Guideline'=>'Bethesda Guideline',
          'PSU HNPCC Criteria'=>'PSU HNPCC Criteria'); ?>
        <?php echo form_dropdown(array('name'=>'','class'=>'form-control'),$dropdown_tof,set_value('')); ?>
        <p class="help-block"></p>
      </div>
    </div>
    <?php echo form_fieldset_close(); ?>
    <?php echo form_fieldset('Clinical'); ?>
    <div class="form-group">
      <?php echo form_label('โรคร่วม Extracolonic cancer ใน Hereditary nopolyposis colorectal carcinoma (HNPCC):','',array('class'=>'control-label col-md-2')); ?>
      <div class="col-md-10">
        <?php $dropdown_tof = array(''=>'เลือกรายการ',
          'Lynch I syndromes'=>'Lynch I syndromes',
          'Lynch II syndromes'=>'Lynch II syndromes',
          'Lynch III syndromes'=>'Lynch III syndromes',
          'Lynch IV syndromes'=>'Lynch IV syndromes'); ?>
        <?php echo form_dropdown(array('name'=>'','class'=>'form-control'),$dropdown_tof,set_value('')); ?>
        <p class="help-block"></p>
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
    acceptedFiles: 'image/*,application/pdf,.doc,.docx',
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
