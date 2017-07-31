<?php echo form_fieldset('FAP REPORT'); ?>
<div class="form-group">
  <?php echo form_label('APC GENE:','checkbox_apc',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-1">
    <div class="checkbox">
      <?php echo form_checkbox(array('name'=>'checkbox_apc','class'=>'form-control','id'=>'checkbox_apc'),'1',set_checkbox('checkbox_apc','1')); ?>
    </div>
  </div>
  <div id="div_apc">
    <div class="col-md-9">
      <div class="well">
        <div class="form-group">
          <?php echo form_label('exon:','checkbox_apc_exon',array('class'=>'control-label col-md-3')); ?>
          <!-- <div class="col-md-1">
            <div class="checkbox">
              <?php echo form_checkbox(array('name'=>'checkbox_apc_exon','class'=>'form-control','id'=>'checkbox_apc_exon'),'1',set_checkbox('checkbox_apc_exon','1')); ?>
            </div>
          </div> -->
          <div id="div_apc_exon">
            <div class="col-md-9">
              <?php $dropdown_exon[''] = 'เลือกรายการ'; foreach (range('1','15') as $key => $value) $dropdown_exon[++$key] = $value; ?>
              <?php echo form_dropdown(array('name'=>'apc_exon','class'=>'form-control'),$dropdown_exon,set_value('apc_exon',$labs['apc_exon'])); ?>
            </div>
          </div>
        </div>
        <div class="form-group">
          <?php echo form_label('intron:','checkbox_apc_intron',array('class'=>'control-label col-md-3')); ?>
          <!-- <div class="col-md-1">
            <div class="checkbox">
              <?php echo form_checkbox(array('name'=>'checkbox_apc_intron','class'=>'form-control','id'=>'checkbox_apc_intron'),'1',set_checkbox('checkbox_apc_intron','1')); ?>
            </div>
          </div> -->
          <div id="div_apc_intron">
            <div class="col-md-9">
              <?php $dropdown_intron[''] = 'เลือกรายการ'; foreach (range('1','14') as $key => $value) $dropdown_intron[++$key] = $value; ?>
              <?php echo form_dropdown(array('name'=>'apc_intron','class'=>'form-control'),$dropdown_intron,set_value('apc_intron',$labs['apc_intron'])); ?>
              <div class="row">
                <div class="col-md-6">
                  <?php echo form_input(array('name'=>'apc_codon','class'=>'form-control','placeholder'=>'position codon'),set_value('apc_codon',$labs['apc_codon'])); ?>
                </div>
                <div class="col-md-6">
                  <?php echo form_input(array('name'=>'apc_amino_acid','class'=>'form-control','placeholder'=>'position amino acid'),set_value('apc_amino_acid',$labs['apc_amino_acid'])); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <?php echo form_label('type of mutation:','apc_type_mutation',array('class'=>'control-label col-md-3')); ?>
          <div class="col-md-9">
            <?php echo form_input(array('name'=>'apc_type_mutation','class'=>'form-control apc_type_mutation','autocomplete'=>'off'),set_value('apc_type_mutation',$labs['apc_type_mutation'])); ?>
          </div>
        </div>
        <div class="form-group">
          <?php echo form_label('effect of mutation:','apc_effect_mutation',array('class'=>'control-label col-md-3')); ?>
          <div class="col-md-9">
            <?php echo form_input(array('name'=>'apc_effect_mutation','class'=>'form-control effect_mutation','autocomplete'=>'off'),set_value('apc_effect_mutation',$labs['apc_effect_mutation'])); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('MUTYH GENE:','checkbox_mutyh',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-1">
    <div class="checkbox">
      <?php echo form_checkbox(array('name'=>'checkbox_mutyh','class'=>'form-control','id'=>'checkbox_mutyh'),'1',set_checkbox('checkbox_mutyh','1')); ?>
    </div>
  </div>
  <div id="div_mutyh">
    <div class="col-md-9">
      <div class="well">
        <div class="form-group">
          <?php echo form_label('exon:','checkbox_mutyh_exon',array('class'=>'control-label col-md-3')); ?>
          <!-- <div class="col-md-1">
            <div class="checkbox">
              <?php echo form_checkbox(array('name'=>'checkbox_mutyh_exon','class'=>'form-control','id'=>'checkbox_mutyh_exon'),'1',set_checkbox('mutyh_exon','1')); ?>
            </div>
          </div> -->
          <div id="div_mutyh_exon">
            <div class="col-md-9">
              <?php $dropdown_exon[''] = 'เลือกรายการ'; foreach (range('1','16') as $key => $value) $dropdown_intron[++$key] = $value; ?>
              <?php echo form_dropdown(array('name'=>'mutyh_exon','class'=>'form-control'),$dropdown_exon,set_value('mutyh_exon',$labs['mutyh_exon'])); ?>
            </div>
          </div>
        </div>
        <div class="form-group">
          <?php echo form_label('intron:','checkbox_mutyh_intron',array('class'=>'control-label col-md-3')); ?>
          <!-- <div class="col-md-1">
            <div class="checkbox">
              <?php echo form_checkbox(array('name'=>'checkbox_mutyh_intron','class'=>'form-control','id'=>'checkbox_mutyh_intron'),'1',set_checkbox('mutyh_intron','1')); ?>
            </div>
          </div> -->
          <div id="div_mutyh_intron">
            <div class="col-md-9">
              <?php $dropdown_intron[''] = 'เลือกรายการ'; foreach (range('1','15') as $key => $value) $dropdown_intron[++$key] = $value; ?>
              <?php echo form_dropdown(array('name'=>'mutyh_intron','class'=>'form-control'),$dropdown_intron,set_value('mutyh_intron',$labs['mutyh_intron'])); ?>
              <div class="row">
                <div class="col-md-6">
                  <?php echo form_input(array('name'=>'mutyh_codon','class'=>'form-control','placeholder'=>'position codon'),set_value('mutyh_codon',$labs['mutyh_codon'])); ?>
                </div>
                <div class="col-md-6">
                  <?php echo form_input(array('name'=>'mutyh_amino_acid','class'=>'form-control','placeholder'=>'position amino acid'),set_value('mutyh_amino_acid',$labs['mutyh_amino_acid'])); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <?php echo form_label('type of mutation:','mutyh_type_mutation',array('class'=>'control-label col-md-3')); ?>
          <div class="col-md-9">
            <?php echo form_input(array('name'=>'mutyh_type_mutation','class'=>'form-control mutyh_type_mutation','autocomplete'=>'off'),set_value('mutyh_type_mutation',$labs['mutyh_type_mutation'])); ?>
          </div>
        </div>
        <div class="form-group">
          <?php echo form_label('effect of mutation:','mutyh_effect_mutation',array('class'=>'control-label col-md-3')); ?>
          <div class="col-md-9">
            <?php echo form_input(array('name'=>'mutyh_effect_mutation','class'=>'form-control effect_mutation','autocomplete'=>'off'),set_value('mutyh_effect_mutation',$labs['mutyh_effect_mutation'])); ?>
          </div>
        </div>
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

  var div_apc = $('#div_apc :input');
  var checkbox_apc = $('#checkbox_apc');
  <?php if ($labs['apc'] === '0') : ?>
  div_apc.prop('disabled',true);
  <?php endif; ?>
  checkbox_apc.on('ifToggled',function(e) {
    if (e.delegateTarget.checked) {
      div_apc.prop('disabled',false);
    } else {
      div_apc.prop('disabled',true);
    }
  });
  var div_mutyh = $('#div_mutyh :input');
  var checkbox_mutyh = $('#checkbox_mutyh');
  <?php if ($labs['mutyh'] === '0') : ?>
  div_mutyh.prop('disabled',true);
  <?php endif; ?>
  checkbox_mutyh.on('ifToggled',function(e) {
    if (e.delegateTarget.checked) {
      div_mutyh.prop('disabled',false);
    } else {
      div_mutyh.prop('disabled',true);
    }
  });

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
