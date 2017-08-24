<?php echo form_fieldset('STK11 Gene'); ?>
<div class="form-group">
  <?php echo form_label('exon:','stk11_exon',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-4">
    <?php $exon[''] = 'เลือกรายการ'; foreach (range('1','9') as $key => $value) $exon[++$key] = $value;
    echo form_dropdown(array('name'=>'stk11_exon','class'=>'form-control'),$exon,set_value('stk11_exon',$labs['stk11_exon'])); ?>
  </div>
  <?php echo form_label('intron:','stk11_intron',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-4">
    <?php $intron[''] = 'เลือกรายการ'; foreach (range('1','8') as $key => $value) $intron[++$key] = $value;
    echo form_dropdown(array('name'=>'stk11_intron','class'=>'form-control'),$intron,set_value('stk11_intron',$labs['stk11_intron'])); ?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('position codon:','stk11_codon',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-4">
    <?php echo form_input(array('name'=>'stk11_codon','class'=>'form-control'),set_value('stk11_codon',$labs['stk11_codon'],FALSE)); ?>
  </div>
  <?php echo form_label('position amino acid:','stk11_amino_acid',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-4">
    <?php echo form_input(array('name'=>'stk11_amino_acid','class'=>'form-control'),set_value('stk11_amino_acid',$labs['stk11_amino_acid'],FALSE)); ?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('type of mutation:','stk11_type_mutation',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-4">
    <?php echo form_dropdown(array('name'=>'stk11_type_mutation','class'=>'form-control'),$type_mutation_src,set_value('stk11_type_mutation',$labs['stk11_type_mutation'],FALSE)); ?>
  </div>
  <?php echo form_label('effect of mutation:','stk11_effect_mutation',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-4">
    <?php echo form_dropdown(array('name'=>'stk11_effect_mutation','class'=>'form-control'),$effect_mutation_src,set_value('stk11_effect_mutation',$labs['stk11_effect_mutation'],FALSE)); ?>
  </div>
</div>
<?php echo form_fieldset_close(); ?>
<?php $this->load->view('admin/labs/assets'); ?>

<?=script_tag('assets/admin/plugins/typeahead/typeahead.min.js');?>
<script type="text/javascript">
$(document).ready(function() {
  Dropzone.options.dropzoneUpload = {
    parallelUploads: '10',
    maxFilesize: '1',
    maxFiles: '10',
    params: { labs_id: '<?php echo $this->uri->segment('4'); ?>' },
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
