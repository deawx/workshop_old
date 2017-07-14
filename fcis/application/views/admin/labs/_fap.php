<?php echo form_fieldset('APC Gene'); ?>
<div class="form-group">
  <?php echo form_label('exon:','exon',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-4">
    <?php $dropdown_exon = array_combine(range('1','15'),range('1','15')); ?>
    <?php echo form_dropdown(array('name'=>'exon','class'=>'form-control'),$dropdown_exon,set_value('exon')); ?>
    <p class="help-block"></p>
  </div>
  <?php echo form_label('intron:','intron',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-4">
    <?php $dropdown_exon = array_combine(range('1','14'),range('1','14')); ?>
    <?php echo form_dropdown(array('name'=>'intron','class'=>'form-control'),$dropdown_exon,set_value('intron')); ?>
    <p class="help-block"></p>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('position codon:','codon',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-4">
    <?php echo form_input(array('name'=>'codon','class'=>'form-control'),set_value('codon')); ?>
    <p class="help-block"></p>
  </div>
  <?php echo form_label('position amino acid:','amino_acid',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-4">
    <?php echo form_input(array('name'=>'amino_acid','class'=>'form-control'),set_value('amino_acid')); ?>
    <p class="help-block"></p>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('type of mutation:','type_mutation',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-4">
    <?php echo form_input(array('name'=>'type_mutation','class'=>'form-control typeahead','autocomplete'=>'off'),set_value('')); ?>
    <p class="help-block"></p>
  </div>
  <?php echo form_label('effect of mutation:','effect_mutation',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-4">
    <?php echo form_input(array('name'=>'effect_mutation','class'=>'form-control typeahead','autocomplete'=>'off'),set_value('')); ?>
    <p class="help-block"></p>
  </div>
</div>
<?php echo form_fieldset_close(); ?>
<?php echo form_fieldset('MUTYH Gene'); ?>
<div class="form-group">
  <?php echo form_label('exon:','exon',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-4">
    <?php $dropdown_exon = array_combine(range('1','15'),range('1','15')); ?>
    <?php echo form_dropdown(array('name'=>'exon','class'=>'form-control'),$dropdown_exon,set_value('exon')); ?>
    <p class="help-block"></p>
  </div>
  <?php echo form_label('intron:','intron',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-4">
    <?php $dropdown_exon = array_combine(range('1','14'),range('1','14')); ?>
    <?php echo form_dropdown(array('name'=>'intron','class'=>'form-control'),$dropdown_exon,set_value('intron')); ?>
    <p class="help-block"></p>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('position codon:','codon',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-4">
    <?php echo form_input(array('name'=>'codon','class'=>'form-control'),set_value('codon')); ?>
    <p class="help-block"></p>
  </div>
  <?php echo form_label('position amino acid:','amino_acid',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-4">
    <?php echo form_input(array('name'=>'amino_acid','class'=>'form-control'),set_value('amino_acid')); ?>
    <p class="help-block"></p>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('type of mutation:','type_mutation',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-4">
    <?php echo form_input(array('name'=>'type_mutation','class'=>'form-control typeahead','autocomplete'=>'off'),set_value('')); ?>
    <p class="help-block"></p>
  </div>
  <?php echo form_label('effect of mutation:','effect_mutation',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-4">
    <?php echo form_input(array('name'=>'effect_mutation','class'=>'form-control typeahead','autocomplete'=>'off'),set_value('')); ?>
    <p class="help-block"></p>
  </div>
</div>
<?php echo form_fieldset_close(); ?>
<?php echo form_fieldset('Negative'); ?>
<div class="form-group">
  <?php echo form_label('negative:','negative',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-10">
    <div class="radio">
      <label><?php echo form_checkbox(array('name'=>'negative','class'=>'form-control'),''); ?>Negative</label>
      <p class="help-block"></p>
    </div>
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

<?=link_tag('assets/admin/plugins/dropzone/dropzone.min.css');?>
<?=link_tag('assets/admin/plugins/dropzone/basic.min.css');?>
<?=script_tag('assets/admin/plugins/dropzone/dropzone.min.js');?>
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
  var $input = $(".typeahead");
  $input.typeahead({
    source: [
      {id: "test1", name: "test1"},
      {id: "test2", name: "test2"},
      {id: "test3", name: "test3"},
      {id: "test4", name: "test4"},
      {id: "test5", name: "test5"}
    ],
    autoSelect: true
  });
  $input.change(function() {
    var current = $input.typeahead("getActive");
    if (current) {
      // Some item from your model is active!
      if (current.name == $input.val()) {
        // This means the exact match is found. Use toLowerCase() if you want case insensitive match.
      } else {
        // This means it is only a partial match, you can either add a new item
        // or take the active if you don't want new items
      }
    } else {
      // Nothing is active so it is a new value (or maybe empty value)
    }
  });
});
</script>
