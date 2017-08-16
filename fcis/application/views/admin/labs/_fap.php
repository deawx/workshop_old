<?php echo form_fieldset('FAP REPORT'); ?>
<div class="form-group">
  <?php echo form_label('APC GENE:','checkbox_apc',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-10">
    <div class="checkbox">
      <?php echo form_checkbox(array('name'=>'checkbox_apc','class'=>'form-control','id'=>'checkbox_apc'),'1',set_checkbox('checkbox_apc','1')); ?>
    </div>
  </div>
</div>
<div id="apc_ctn">
  <div class="well well-sm">
    <div class="form-group">
      <?php echo form_label('exon:','checkbox_apc_exon',array('class'=>'control-label col-md-2')); ?>
      <div class="col-md-4">
        <?php $intron[''] = 'เลือกรายการ'; foreach (range('1','14') as $key => $value) $intron[++$key] = $value;
        echo form_dropdown(array('name'=>'apc_intron','class'=>'form-control'),$intron,set_value('apc_intron',$labs['apc_intron'])); ?>
      </div>
      <?php echo form_label('intron:','checkbox_apc_intron',array('class'=>'control-label col-md-2')); ?>
      <div class="col-md-4">
        <?php $exon[''] = 'เลือกรายการ'; foreach (range('1','15') as $key => $value) $exon[++$key] = $value;
        echo form_dropdown(array('name'=>'apc_exon','class'=>'form-control'),$exon,set_value('apc_exon',$labs['apc_exon'])); ?>
      </div>
    </div>
    <div class="form-group">
      <?php echo form_label(':','',array('class'=>'control-label col-md-2')); ?>
      <div class="col-md-4">
        <?php echo form_input(array('name'=>'apc_codon','class'=>'form-control','placeholder'=>'position codon'),set_value('apc_codon',$labs['apc_codon'])); ?>
      </div>
      <?php echo form_label(':','',array('class'=>'control-label col-md-2')); ?>
      <div class="col-md-4">
        <?php echo form_input(array('name'=>'apc_amino_acid','class'=>'form-control','placeholder'=>'position amino acid'),set_value('apc_amino_acid',$labs['apc_amino_acid'])); ?>
      </div>
    </div>
    <div class="form-group">
      <?php echo form_label('type of mutation:','apc_type_mutation',array('class'=>'control-label col-md-2')); ?>
      <div class="col-md-4">
        <?php echo form_dropdown(array('name'=>'apc_type_mutation','class'=>'form-control'),$type_mutation_src,set_value('apc_type_mutation',$labs['apc_type_mutation'])); ?>
      </div>
      <?php echo form_label('effect of mutation:','apc_effect_mutation',array('class'=>'control-label col-md-2')); ?>
      <div class="col-md-4">
        <?php echo form_dropdown(array('name'=>'apc_effect_mutation','class'=>'form-control'),$effect_mutation_src,set_value('apc_effect_mutation',$labs['apc_effect_mutation'])); ?>
      </div>
    </div>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('MUTYH GENE:','checkbox_mutyh',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-10">
    <div class="checkbox">
      <?php echo form_checkbox(array('name'=>'checkbox_mutyh','class'=>'form-control','id'=>'checkbox_mutyh'),'1',set_checkbox('checkbox_mutyh','1')); ?>
    </div>
  </div>
</div>
<div id="mutyh_ctn">
  <div class="well well-sm">
    <div class="form-group">
      <?php echo form_label('exon:','checkbox_mutyh_exon',array('class'=>'control-label col-md-2')); ?>
      <div class="col-md-4">
        <?php $exon[''] = 'เลือกรายการ'; foreach (range('1','16') as $key => $value) $exon[++$key] = $value;
        echo form_dropdown(array('name'=>'mutyh_exon','class'=>'form-control'),$exon,set_value('mutyh_exon',$labs['mutyh_exon'])); ?>
      </div>
      <?php echo form_label('intron:','checkbox_mutyh_intron',array('class'=>'control-label col-md-2')); ?>
      <div class="col-md-4">
        <?php $intron[''] = 'เลือกรายการ'; foreach (range('1','15') as $key => $value) $intron[++$key] = $value;
        echo form_dropdown(array('name'=>'mutyh_intron','class'=>'form-control'),$intron,set_value('mutyh_intron',$labs['mutyh_intron'])); ?>
      </div>
    </div>
    <div class="form-group">
      <?php echo form_label(':','',array('class'=>'control-label col-md-2')); ?>
      <div class="col-md-4">
        <?php echo form_input(array('name'=>'mutyh_codon','class'=>'form-control','placeholder'=>'position codon'),set_value('mutyh_codon',$labs['mutyh_codon'])); ?>
      </div>
      <?php echo form_label(':','',array('class'=>'control-label col-md-2')); ?>
      <div class="col-md-4">
        <?php echo form_input(array('name'=>'mutyh_amino_acid','class'=>'form-control','placeholder'=>'position amino acid'),set_value('mutyh_amino_acid',$labs['mutyh_amino_acid'])); ?>
      </div>
    </div>
    <div class="form-group">
      <?php echo form_label('type of mutation:','mutyh_type_mutation',array('class'=>'control-label col-md-2')); ?>
      <div class="col-md-4">
        <?php echo form_dropdown(array('name'=>'mutyh_type_mutation','class'=>'form-control'),$type_mutation_src,set_value('mutyh_type_mutation',$labs['mutyh_type_mutation'])); ?>
      </div>
      <?php echo form_label('effect of mutation:','mutyh_effect_mutation',array('class'=>'control-label col-md-2')); ?>
      <div class="col-md-4">
        <?php echo form_dropdown(array('name'=>'mutyh_effect_mutation','class'=>'form-control'),$effect_mutation_src,set_value('mutyh_effect_mutation',$labs['mutyh_effect_mutation'])); ?>
      </div>
    </div>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('NEGATIVE:','negative',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-10">
    <div class="checkbox">
      <?php echo form_checkbox(array('name'=>'negative','class'=>'form-control','id'=>'negative'),'1',set_checkbox('negative','1',$labs['negative'])); ?>
    </div>
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
    addRemoveLinks: true,
    init: function() {
      var submitButton = document.querySelector("#dropzone-submit")
      myDropzone = this;
      submitButton.addEventListener("click", function() {
        myDropzone.processQueue();
      });
    }
  };

  var checkbox_apc = $('#checkbox_apc');
  var checkbox_mutyh = $('#checkbox_mutyh');
  var apc_ctn = $('#apc_ctn :input');
  var mutyh_ctn = $('#mutyh_ctn :input');

  <?php if ($labs['apc'] === '0') : ?>
  apc_ctn.prop('disabled',true);
  <?php endif; ?>
  checkbox_apc.on('ifToggled',function(e) {
    if (e.delegateTarget.checked) {
      apc_ctn.prop('disabled',false);
    } else {
      apc_ctn.prop('disabled',true);
    }
  });
  <?php if ($labs['mutyh'] === '0') : ?>
  mutyh_ctn.prop('disabled',true);
  <?php endif; ?>
  checkbox_mutyh.on('ifToggled',function(e) {
    if (e.delegateTarget.checked) {
      mutyh_ctn.prop('disabled',false);
    } else {
      mutyh_ctn.prop('disabled',true);
    }
  });
});
</script>
