<?php echo form_fieldset('APC Gene'); ?>
<div class="form-group">
  <?php echo form_label('exon:','apc_exon',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-4">
    <?php $dropdown_exon[''] = 'เลือกรายการ';
      foreach (range('1','15') as $key => $value) $dropdown_exon[++$key] = $value; ?>
    <?php echo form_dropdown(array('name'=>'apc_exon','class'=>'form-control'),$dropdown_exon,set_value('apc_exon',$labs['apc_exon'])); ?>
    <p class="help-block"></p>
  </div>
  <?php echo form_label('intron:','apc_intron',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-4">
    <?php $dropdown_intron[''] = 'เลือกรายการ';
      foreach (range('1','14') as $key => $value) $dropdown_intron[++$key] = $value; ?>
    <?php echo form_dropdown(array('name'=>'apc_intron','class'=>'form-control'),$dropdown_intron,set_value('apc_intron',$labs['apc_intron'])); ?>
    <p class="help-block"></p>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('position codon:','apc_codon',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-4">
    <?php echo form_input(array('name'=>'apc_codon','class'=>'form-control'),set_value('apc_codon',$labs['apc_codon'])); ?>
    <p class="help-block"></p>
  </div>
  <?php echo form_label('position amino acid:','apc_amino_acid',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-4">
    <?php echo form_input(array('name'=>'apc_amino_acid','class'=>'form-control'),set_value('apc_amino_acid',$labs['apc_amino_acid'])); ?>
    <p class="help-block"></p>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('type of mutation:','apc_type_mutation',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-4">
    <?php echo form_input(array('name'=>'apc_type_mutation','class'=>'form-control apc_type_mutation','autocomplete'=>'off'),set_value('apc_type_mutation',$labs['apc_type_mutation'])); ?>
    <p class="help-block"></p>
  </div>
  <?php echo form_label('effect of mutation:','apc_effect_mutation',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-4">
    <?php echo form_input(array('name'=>'apc_effect_mutation','class'=>'form-control effect_mutation','autocomplete'=>'off'),set_value('apc_effect_mutation',$labs['apc_effect_mutation'])); ?>
    <p class="help-block"></p>
  </div>
</div>
<?php echo form_fieldset_close(); ?>
<?php echo form_fieldset('MUTYH Gene'); ?>
<div class="form-group">
  <?php echo form_label('exon:','mutyh_exon',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-4">
    <?php $dropdown_exon[''] = 'เลือกรายการ';
      foreach (range('1','16') as $key => $value) $dropdown_intron[++$key] = $value; ?>
    <?php echo form_dropdown(array('name'=>'mutyh_exon','class'=>'form-control'),$dropdown_exon,set_value('mutyh_exon',$labs['mutyh_exon'])); ?>
    <p class="help-block"></p>
  </div>
  <?php echo form_label('intron:','mutyh_intron',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-4">
    <?php $dropdown_intron[''] = 'เลือกรายการ';
      foreach (range('1','15') as $key => $value) $dropdown_intron[++$key] = $value; ?>
    <?php echo form_dropdown(array('name'=>'mutyh_intron','class'=>'form-control'),$dropdown_intron,set_value('mutyh_intron',$labs['mutyh_intron'])); ?>
    <p class="help-block"></p>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('position codon:','mutyh_codon',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-4">
    <?php echo form_input(array('name'=>'mutyh_codon','class'=>'form-control'),set_value('mutyh_codon',$labs['mutyh_codon'])); ?>
    <p class="help-block"></p>
  </div>
  <?php echo form_label('position amino acid:','mutyh_amino_acid',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-4">
    <?php echo form_input(array('name'=>'mutyh_amino_acid','class'=>'form-control'),set_value('mutyh_amino_acid',$labs['mutyh_amino_acid'])); ?>
    <p class="help-block"></p>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('type of mutation:','mutyh_type_mutation',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-4">
    <?php echo form_input(array('name'=>'mutyh_type_mutation','class'=>'form-control mutyh_type_mutation','autocomplete'=>'off'),set_value('mutyh_type_mutation',$labs['mutyh_type_mutation'])); ?>
    <p class="help-block"></p>
  </div>
  <?php echo form_label('effect of mutation:','mutyh_effect_mutation',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-4">
    <?php echo form_input(array('name'=>'mutyh_effect_mutation','class'=>'form-control effect_mutation','autocomplete'=>'off'),set_value('mutyh_effect_mutation',$labs['mutyh_effect_mutation'])); ?>
    <p class="help-block"></p>
  </div>
</div>
<?php echo form_fieldset_close(); ?>
<?php echo form_fieldset('Negative'); ?>
<div class="form-group">
  <?php echo form_label('negative:','negative',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-10">
    <div class="checkbox"> <label><?php echo form_checkbox(array('name'=>'negative','class'=>'form-control'),'negative',set_checkbox('negative','negative',($labs['negative'] === 'negative'))); ?>negative</label> </div>
    <p class="help-block"></p>
  </div>
</div>
<?php echo form_fieldset_close(); ?>
<div class="row">
  <div class="col-md-12">
    <?php echo form_fieldset('File(s)'); ?>
    <?php if (isset($assets) && ! empty($assets)) : ?>
      <table class="table table-condensed table-hover">
        <thead>
          <tr>
            <th class="text-center">#</th>
            <th class="text-center">file name</th>
            <th class="text-center">file size</th>
            <th class="text-center">uploaded date</th>
            <th class="text-center">uploaded by</th>
            <th class="text-center"></th>
          </tr>
        </thead>
        <?php foreach ($assets as $key => $value) : ?>
          <tbody>
            <tr>
              <td class="text-center"> <?php echo ++$key; ?></td>
              <td> <a href="<?php echo base_url('uploads/labs/fap/'.$value['file_name']); ?>" target="_blank"><?php echo $value['client_name']; ?></a> </td>
              <td class="text-center"> <?php echo byte_format($value['file_size']); ?> </td>
              <td class="text-center"> <?php echo date('d/m/Y H:i:s',$value['upload_date']); ?> </td>
              <td class="text-center"> <?php echo $value['username']; ?> </td>
              <td class="text-center">
                <a href="<?php echo base_url('admin/labs/delete_file/fap/'.$value['id'].'/'.$value['file_name']); ?>"
                  class="badge bg-red"
                  onclick="return confirm('confirm to delete?');">
                  delete
                </a>
              </td>
            </tr>
          </tbody>
        <?php endforeach; ?>
      </table>
    <?php else: ?>
      no file(s) uploaded.
    <?php endif; ?>
    <?php echo form_fieldset_close(); ?>
  </div>
</div>

<?=script_tag('assets/admin/plugins/typeahead/typeahead.min.js');?>
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
  var apc_type_mutation = $(".apc_type_mutation");
  apc_type_mutation.typeahead({
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
      <?php foreach ($apc_type_mutation as $key => $value) : ?>
      {id: "<?=$value['apc_type_mutation']?>", name: "<?=$value['apc_type_mutation']?>"},
      <?php endforeach; ?>
    ],
    autoSelect: true
  });
  var mutyh_type_mutation = $(".mutyh_type_mutation");
  mutyh_type_mutation.typeahead({
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
      <?php foreach ($mutyh_type_mutation as $key => $value) : ?>
      {id: "<?=$value['mutyh_type_mutation']?>", name: "<?=$value['mutyh_type_mutation']?>"},
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
