<?php echo form_fieldset('STK11 Gene'); ?>
<div class="form-group">
  <?php echo form_label('exon:','stk11_exon',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-4">
    <?php $dropdown_exon[''] = 'เลือกรายการ';
      foreach (range('1','9') as $key => $value) $dropdown_exon[++$key] = $value; ?>
    <?php echo form_dropdown(array('name'=>'stk11_exon','class'=>'form-control'),$dropdown_exon,set_value('stk11_exon',$labs['stk11_exon'])); ?>
    <p class="help-block"></p>
  </div>
  <?php echo form_label('intron:','stk11_intron',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-4">
    <?php $dropdown_intron[''] = 'เลือกรายการ';
      foreach (range('1','8') as $key => $value) $dropdown_intron[++$key] = $value; ?>
    <?php echo form_dropdown(array('name'=>'stk11_intron','class'=>'form-control'),$dropdown_intron,set_value('stk11_intron',$labs['stk11_intron'])); ?>
    <p class="help-block"></p>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('position codon:','stk11_codon',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-4">
    <?php echo form_input(array('name'=>'stk11_codon','class'=>'form-control'),set_value('stk11_codon',$labs['stk11_codon'],FALSE)); ?>
    <p class="help-block"></p>
  </div>
  <?php echo form_label('position amino acid:','stk11_amino_acid',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-4">
    <?php echo form_input(array('name'=>'stk11_amino_acid','class'=>'form-control'),set_value('stk11_amino_acid',$labs['stk11_amino_acid'],FALSE)); ?>
    <p class="help-block"></p>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('type of mutation:','stk11_type_mutation',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-4">
    <?php echo form_input(array('name'=>'stk11_type_mutation','class'=>'form-control stk11_type_mutation','autocomplete'=>'off'),set_value('stk11_type_mutation',$labs['stk11_type_mutation'],FALSE)); ?>
    <p class="help-block"></p>
  </div>
  <?php echo form_label('effect of mutation:','stk11_effect_mutation',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-4">
    <?php echo form_input(array('name'=>'stk11_effect_mutation','class'=>'form-control effect_mutation','autocomplete'=>'off'),set_value('stk11_effect_mutation',$labs['stk11_effect_mutation'],FALSE)); ?>
    <p class="help-block"></p>
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
  var stk11_type_mutation = $(".stk11_type_mutation");
  stk11_type_mutation.typeahead({
    source: [
      {id: "substitution", name: "substitution"},
      {id: "deletion", name: "deletion"},
      {id: "insertion", name: "insertion"},
      {id: "duplication", name: "duplication"},
      {id: "Indel", name: "Indel"},
      {id: "deletion-large (>1exon)", name: "deletion-large (>1exon)"},
      {id: "deletion-small (1exon)", name: "deletion-small (1exon)"},
      {id: "insertion-large (>1exon)", name: "insertion-large (>1exon)"},
      {id: "insertion-small (1exon)", name: "insertion-small (1exon)"},
      {id: "point mutation", name: "point mutation"},
      {id: "Intronic variations", name: "Intronic variations"},
      <?php foreach ($stk11_type_mutation as $key => $value) : ?>
      {id: "<?=$value['stk11_type_mutation']?>", name: "<?=$value['stk11_type_mutation']?>"},
      <?php endforeach; ?>
    ],
    autoSelect: true
  });
  var effect_mutation = $(".effect_mutation");
  effect_mutation.typeahead({
    source: [
      {id: "Nonsense", name: "Nonsense"},
      {id: "frameshift", name: "frameshift"},
      {id: "missense", name: "missense"},
      {id: "deletion, large", name: "deletion, large"},
      {id: "splice mutation", name: "splice mutation"},
      {id: "silence", name: "silence"}
    ],
    autoSelect: true
  });
});
</script>
