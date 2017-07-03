<?php echo form_fieldset('STK11 Gene'); ?>
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
    <?php $type_mutation = array_combine(range('1','10'),range('1','10')); ?>
    <?php echo form_dropdown(array('name'=>'type_mutation','class'=>'form-control'),$type_mutation,set_value('type_mutation')); ?>
    <p class="help-block"></p>
  </div>
  <?php echo form_label('effect of mutation:','effect_mutation',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-4">
    <?php $effect_mutation = array_combine(range('1','10'),range('1','10')); ?>
    <?php echo form_dropdown(array('name'=>'effect_mutation','class'=>'form-control'),$effect_mutation,set_value('effect_mutation')); ?>
    <p class="help-block"></p>
  </div>
</div>
<?php echo form_fieldset_close(); ?>
