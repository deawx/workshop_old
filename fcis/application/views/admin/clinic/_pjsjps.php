<div class="row">
  <div class="col-md-12">
    <?php echo form_fieldset('Clinical'); ?>
    <div class="form-group">
      <?php echo form_label('clinical:','',array('class'=>'control-label col-md-2')); ?>
      <div class="col-md-10">
        <?php $dropdown_cnc = array(''=>'เลือกรายการ',
          'Hyper pigmented of skin'=>'Hyper pigmented of skin',
          'intestinal obstruction'=>'intestinal obstruction',
          'colon cancer'=>'colon cancer'); ?>
        <?php echo form_dropdown(array('name'=>'','class'=>'form-control'),$dropdown_cnc,set_value('')); ?>
        <p class="help-block"></p>
      </div>
    </div>
    <div class="form-group">
      <?php echo form_label('type:','',array('class'=>'control-label col-md-2')); ?>
      <div class="col-md-10">
        <div class="checkbox">
          <label>
            <?php echo form_checkbox(array('name'=>'','class'=>'form-control','id'=>'type'),'Hereditary hamartomatous polyposis syndromes'); ?>
            Hereditary hamartomatous polyposis syndromes
          </label>
          <p class="help-block"></p>
        </div>
        <?php $tpt = array(''=>'เลือกรายการ',
          'Familial juvenile polyposis syndromes'=>'Familial juvenile polyposis syndromes',
          'Peutz-jeghers syndromes'=>'Peutz-jeghers syndromes',
          'Cowden disease or syndromes'=>'Cowden disease or syndromes',
          'Bannayan-Rilay-Ruvalcaba syndromes'=>'Bannayan-Rilay-Ruvalcaba syndromes',
          'Hereditary mixed polyposis syndromes'=>'Hereditary mixed polyposis syndromes',
          'Gorlin syndromes'=>'Gorlin syndromes','Neurofibromatosis'=>'Neurofibromatosis',
          'Multiple endocrine neoplasia'=>'Multiple endocrine neoplasia');
        echo form_dropdown(array('name'=>'','class'=>'form-control','id'=>'type_ctn'),$tpt,set_value('')); ?>
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
  var type = $('#type');
  var type_ctn = $('#type_ctn');
  type_ctn.prop('disabled',true);
  type.on('ifToggled',function(){
    type_ctn.prop('disabled',function(i,v){ return !v; });
  });
});
</script>
