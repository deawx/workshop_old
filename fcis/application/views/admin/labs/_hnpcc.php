<div class="row">
  <div class="col-md-12">
    <?php echo form_fieldset('MSI'); ?>
    <div class="form-group">
      <?php echo form_label('H:','msi_h',array('class'=>'control-label col-md-2')); ?>
      <div class="col-md-4">
        <div class="checkbox"> <?php echo form_checkbox(array('name'=>'msi_h','class'=>'form-control'),'BAT25',set_checkbox('msi_h','BAT25',($labs['msi_h'] === 'BAT25'))); ?>BAT25 </div>
      </div>
      <?php echo form_label('L:','msi_l',array('class'=>'control-label col-md-2')); ?>
      <div class="col-md-4">
        <div class="checkbox"> <?php echo form_checkbox(array('name'=>'msi_l','class'=>'form-control'),'BAT26',set_checkbox('msi_l','BAT26',($labs['msi_l'] === 'BAT26'))); ?>BAT26 </div>
      </div>
    </div>
    <div class="form-group">
      <?php echo form_label('S:','msi_s',array('class'=>'control-label col-md-2')); ?>
      <div class="col-md-4">
        <?php echo form_input(array('name'=>'msi_s','class'=>'form-control msi_s','id'=>'msi_s'),set_value('msi_s',$labs['msi_s'])); ?>
      </div>
      <?php echo form_label('MLH1 methylation:','',array('class'=>'control-label col-md-2')); ?>
      <div class="col-md-4">
        <div class="radio-inline" style="padding-left:0px;">
          <?php echo form_radio(array('name'=>'msi_methylation','class'=>'form-control methylation'),'positive',set_radio('msi_methylation','positive',($labs['msi_methylation'] === 'positive'))); ?>positive
        </div>
        <div class="radio-inline">
          <?php echo form_radio(array('name'=>'msi_methylation','class'=>'form-control methylation'),'negative',set_radio('msi_methylation','negative',($labs['msi_methylation'] === 'negative'))); ?>negative
        </div>
      </div>
    </div>
    <?php echo form_fieldset_close(); ?>
    <?php echo form_fieldset('IHC'); ?>
    <div class="form-group">
      <?php echo form_label('ihc:','ihc',array('class'=>'control-label col-md-2')); ?>
      <div class="col-md-4">
        <?php echo form_input(array('name'=>'ihc','class'=>'form-control ihc'),set_value('ihc')); ?>
      </div>
    </div>
    <?php echo form_fieldset_close(); ?>
    <?php echo form_fieldset('GENE Check'); ?>
    <div class="form-group">
      <?php echo form_label('gene:','gene',array('class'=>'control-label col-md-2')); ?>
      <div class="col-md-4">
        <div class="checkbox">
          <?php echo form_checkbox(array('name'=>'gene','class'=>'form-control','id'=>'gene'),'mutation',set_checkbox('gene','mutation',($labs['gene'] === 'mutation'))) ?> mutation
        </div>
      </div>
    </div>
    <div class="well well-sm">
      <div id="gene_ctn">
        <div class="form-group">
          <?php echo form_label('germline (mmr gene):','germline',array('class'=>'control-label col-md-2')); ?>
          <div class="col-md-10">
            <?php echo form_input(array('name'=>'germline','class'=>'form-control germline','autocomplete'=>'off'),set_value('germline',$labs['germline'])); ?>
          </div>
        </div>
        <div class="form-group">
          <?php echo form_label('exon:','germline_exon',array('class'=>'control-label col-md-2')); ?>
          <div class="col-md-4">
            <?php $dropdown_exon[''] = 'เลือกรายการ';
              foreach (range('1','30') as $key => $value) $dropdown_exon[++$key] = $value; ?>
            <?php echo form_dropdown(array('name'=>'germline_exon','class'=>'form-control'),$dropdown_exon,set_value('germline_exon',$labs['germline_exon'])); ?>
            <p class="help-block"></p>
          </div>
          <?php echo form_label('intron:','germline_intron',array('class'=>'control-label col-md-2')); ?>
          <div class="col-md-4">
            <?php $dropdown_intron[''] = 'เลือกรายการ';
              foreach (range('1','30') as $key => $value) $dropdown_intron[++$key] = $value; ?>
            <?php echo form_dropdown(array('name'=>'germline_intron','class'=>'form-control'),$dropdown_intron,set_value('germline_intron',$labs['germline_intron'])); ?>
            <p class="help-block"></p>
          </div>
        </div>
        <div class="form-group">
          <?php echo form_label('position codon:','germline_codon',array('class'=>'control-label col-md-2')); ?>
          <div class="col-md-4">
            <?php echo form_input(array('name'=>'germline_codon','class'=>'form-control'),set_value('germline_codon',$labs['germline_codon'])); ?>
            <p class="help-block"></p>
          </div>
          <?php echo form_label('position amino acid:','germline_amino_acid',array('class'=>'control-label col-md-2')); ?>
          <div class="col-md-4">
            <?php echo form_input(array('name'=>'germline_amino_acid','class'=>'form-control'),set_value('germline_amino_acid',$labs['germline_amino_acid'])); ?>
            <p class="help-block"></p>
          </div>
        </div>
        <div class="form-group">
          <?php echo form_label('type of mutation:','germline_type_mutation',array('class'=>'control-label col-md-2')); ?>
          <div class="col-md-4">
            <?php echo form_input(array('name'=>'germline_type_mutation','class'=>'form-control germline_type_mutation','autocomplete'=>'off'),set_value('germline_type_mutation',$labs['germline_type_mutation'])); ?>
            <p class="help-block"></p>
          </div>
          <?php echo form_label('effect of mutation:','germline_effect_mutation',array('class'=>'control-label col-md-2')); ?>
          <div class="col-md-4">
            <?php echo form_input(array('name'=>'germline_effect_mutation','class'=>'form-control effect_mutation','autocomplete'=>'off'),set_value('germline_effect_mutation',$labs['germline_effect_mutation'])); ?>
            <p class="help-block"></p>
          </div>
        </div>
        <div class="form-group">
          <?php echo form_label('somatic (tumor15):','somatic',array('class'=>'control-label col-md-2')); ?>
          <div class="col-md-10">
            <?php echo form_input(array('name'=>'somatic','class'=>'form-control somatic','autocomplete'=>'off'),set_value('somatic',$labs['somatic'])); ?>
          </div>
        </div>
        <div class="form-group">
          <?php echo form_label('exon:','somatic_exon',array('class'=>'control-label col-md-2')); ?>
          <div class="col-md-4">
            <?php $dropdown_exon[''] = 'เลือกรายการ';
            foreach (range('1','30') as $key => $value) $dropdown_exon[++$key] = $value; ?>
            <?php echo form_dropdown(array('name'=>'somatic_exon','class'=>'form-control'),$dropdown_exon,set_value('somatic_exon',$labs['somatic_exon'])); ?>
            <p class="help-block"></p>
          </div>
          <?php echo form_label('intron:','somatic_intron',array('class'=>'control-label col-md-2')); ?>
          <div class="col-md-4">
            <?php $dropdown_intron[''] = 'เลือกรายการ';
            foreach (range('1','30') as $key => $value) $dropdown_intron[++$key] = $value; ?>
            <?php echo form_dropdown(array('name'=>'somatic_intron','class'=>'form-control'),$dropdown_intron,set_value('somatic_intron',$labs['somatic_intron'])); ?>
            <p class="help-block"></p>
          </div>
        </div>
        <div class="form-group">
          <?php echo form_label('position codon:','somatic_codon',array('class'=>'control-label col-md-2')); ?>
          <div class="col-md-4">
            <?php echo form_input(array('name'=>'somatic_codon','class'=>'form-control'),set_value('somatic_codon',$labs['somatic_codon'])); ?>
            <p class="help-block"></p>
          </div>
          <?php echo form_label('position amino acid:','somatic_amino_acid',array('class'=>'control-label col-md-2')); ?>
          <div class="col-md-4">
            <?php echo form_input(array('name'=>'somatic_amino_acid','class'=>'form-control'),set_value('somatic_amino_acid',$labs['somatic_amino_acid'])); ?>
            <p class="help-block"></p>
          </div>
        </div>
        <div class="form-group">
          <?php echo form_label('type of mutation:','somatic_type_mutation',array('class'=>'control-label col-md-2')); ?>
          <div class="col-md-4">
            <?php echo form_input(array('name'=>'somatic_type_mutation','class'=>'form-control somatic_type_mutation','autocomplete'=>'off'),set_value('somatic_type_mutation',$labs['somatic_type_mutation'])); ?>
            <p class="help-block"></p>
          </div>
          <?php echo form_label('effect of mutation:','somatic_effect_mutation',array('class'=>'control-label col-md-2')); ?>
          <div class="col-md-4">
            <?php echo form_input(array('name'=>'somatic_effect_mutation','class'=>'form-control effect_mutation','autocomplete'=>'off'),set_value('somatic_effect_mutation',$labs['somatic_effect_mutation'])); ?>
            <p class="help-block"></p>
          </div>
        </div>
      </div>
    </div>
    <?php echo form_fieldset_close(); ?>
  </div>
</div>

<?php print_data($labs); ?>

<?=script_tag('assets/admin/plugins/typeahead/typeahead.min.js');?>
<script type="text/javascript">
$(document).ready(function() {
  Dropzone.options.dropzoneUpload = {
    parallelUploads: '10',
    maxFilesize: '1',
    maxFiles: '10',
    params: { lab_id: '<?php echo $this->uri->segment('4'); ?>' },
    acceptedFiles: 'image/*',
    autoProcessQueue: false,
    init: function() {
      var submitButton = document.querySelector("#dropzone-submit")
      myDropzone = this;
      submitButton.addEventListener("click", function() {
        myDropzone.processQueue();
      });
    }
  };
  // continue
  var gene = $('#gene');
  var gene_ctn = $('div#gene_ctn :input');
  <?php if ($labs['gene'] === '') : ?>
  gene_ctn.prop('disabled',true);
  <?php endif; ?>
  gene.on('ifToggled',function(e) {
    if (e.delegateTarget.checked) {
      gene_ctn.prop('disabled',false);
    } else {
      gene_ctn.prop('disabled',true);
    }
  });
  // continue
  var msi_s = $('input#msi_s');
  var methylation = $('.methylation');
  methylation.iCheck('disable');
  msi_s.change(function() {
    if (this.value == 'D17S250') {
      methylation.iCheck('enable');
    } else {
      methylation.iCheck('disable');
    }
  });
  var msi_s = $(".msi_s");
  msi_s.typeahead({
    source: [
      {id: "D2S123", name: "D2S123"},
      {id: "D5S346", name: "D5S346"},
      {id: "D17S250", name: "D17S250"}
    ],
    autoSelect: true
  });
  var ihc = $(".ihc");
  ihc.typeahead({
    source: [
      {id: "MLH1", name: "MLH1"},
      {id: "PMS2", name: "PMS2"},
      {id: "MSH2", name: "MSH2"},
      {id: "MSH6", name: "MSH6"}
    ],
    autoSelect: true
  });
  var germline = $(".germline");
  germline.typeahead({
    source: [
      {id: "MLH1", name: "MLH1"},
      {id: "PMS2", name: "PMS2"},
      {id: "MLH3", name: "MLH3"},
      {id: "MSH3", name: "MSH3"},
      {id: "MSH2", name: "MSH2"},
      {id: "MSH6", name: "MSH6"},
      {id: "PMS1", name: "PMS1"},
      {id: "EPCAM", name: "EPCAM"}
    ],
    autoSelect: true
  });
  var somatic = $(".somatic");
  somatic.typeahead({
    source: [
      {id: "AKT1", name: "AKT1"},
      {id: "BRAF", name: "BRAF"},
      {id: "EGFR", name: "EGFR"},
      {id: "ERBB2", name: "ERBB2"},
      {id: "FOXL2", name: "FOXL2"},
      {id: "GNR11", name: "GNR11"},
      {id: "GNAQ", name: "GNAQ"},
      {id: "KIT", name: "KIT"},
      {id: "KRAS", name: "KRAS"},
      {id: "MET", name: "MET"},
      {id: "NRAS", name: "NRAS"},
      {id: "PDGFRA", name: "PDGFRA"},
      {id: "PIK3GA", name: "PIK3GA"},
      {id: "RET", name: "RET"},
      {id: "TP53", name: "TP53"}
    ],
    autoSelect: true
  });
  var germline_type_mutation = $(".germline_type_mutation");
  germline_type_mutation.typeahead({
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
      <?php foreach ($germline_type_mutation as $key => $value) : ?>
      {id: "<?=$value['germline_type_mutation']?>", name: "<?=$value['germline_type_mutation']?>"},
      <?php endforeach; ?>
    ],
    autoSelect: true
  });
  var somatic_type_mutation = $(".somatic_type_mutation");
  somatic_type_mutation.typeahead({
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
      <?php foreach ($somatic_type_mutation as $key => $value) : ?>
      {id: "<?=$value['somatic_type_mutation']?>", name: "<?=$value['somatic_type_mutation']?>"},
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
