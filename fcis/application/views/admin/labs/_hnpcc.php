<div class="row">
  <div class="col-md-12">

    <?php echo form_fieldset('MSI'); ?>
    <div class="form-group">
      <?php echo form_label('H:','msi_h',array('class'=>'control-label col-md-2')); ?>
      <div class="col-md-4">
        <?php $msi = array(''=>'เลือกรายการ','BAT25'=>'BAT25','BAT26'=>'BAT26','D2S123'=>'D2S123','D5S346'=>'D5S346','D17S250'=>'D17S250');
        $msi = array_merge($msi,$msi_src);
        echo form_dropdown(array('name'=>'msi_h','class'=>'form-control msi','id'=>'msi_h'),$msi,set_value('msi_h',$labs['msi_h'],FALSE)); ?>
      </div>
      <?php echo form_label('MLH1 methylation:','',array('class'=>'control-label col-md-2')); ?>
      <div class="col-md-4">
        <div class="radio-inline">
            <?php echo form_radio(array('name'=>'msi_h_methylation','class'=>'msi_h_methylation'),'positive',set_radio('msi_h_methylation','positive',($labs['msi_h_methylation'] === 'positive'))); ?>positive
        </div>
        <div class="radio-inline">
          <?php echo form_radio(array('name'=>'msi_h_methylation','class'=>'msi_h_methylation'),'negative',set_radio('msi_h_methylation','negative',($labs['msi_h_methylation'] === 'negative'))); ?>negative
        </div>
      </div>
    </div>
    <div class="form-group">
      <?php echo form_label('L:','msi_l',array('class'=>'control-label col-md-2')); ?>
      <div class="col-md-4">
        <?php echo form_dropdown(array('name'=>'msi_l','class'=>'form-control msi','id'=>'msi_l'),$msi,set_value('msi_l',$labs['msi_l'],FALSE)); ?>
      </div>
      <?php echo form_label('MLH1 methylation:','',array('class'=>'control-label col-md-2')); ?>
      <div class="col-md-4">
        <div class="radio-inline">
          <?php echo form_radio(array('name'=>'msi_l_methylation','class'=>'msi_l_methylation'),'positive',set_radio('msi_l_methylation','positive',($labs['msi_l_methylation'] === 'positive'))); ?>positive
        </div>
        <div class="radio-inline">
          <?php echo form_radio(array('name'=>'msi_l_methylation','class'=>'msi_l_methylation'),'negative',set_radio('msi_l_methylation','negative',($labs['msi_l_methylation'] === 'negative'))); ?>negative
        </div>
      </div>
    </div>
    <div class="form-group">
      <?php echo form_label('S:','msi_s',array('class'=>'control-label col-md-2')); ?>
      <div class="col-md-4">
        <?php echo form_dropdown(array('name'=>'msi_s','class'=>'form-control msi','id'=>'msi_s'),$msi,set_value('msi_s',$labs['msi_s'],FALSE)); ?>
      </div>
      <?php echo form_label('MLH1 methylation:','',array('class'=>'control-label col-md-2')); ?>
      <div class="col-md-4">
        <div class="radio-inline">
          <?php echo form_radio(array('name'=>'msi_s_methylation','class'=>'msi_s_methylation'),'positive',set_radio('msi_s_methylation','positive',($labs['msi_s_methylation'] === 'positive'))); ?>positive
        </div>
        <div class="radio-inline">
          <?php echo form_radio(array('name'=>'msi_s_methylation','class'=>'msi_s_methylation'),'negative',set_radio('msi_s_methylation','negative',($labs['msi_s_methylation'] === 'negative'))); ?>negative
        </div>
      </div>
    </div>
    <?php echo form_fieldset_close(); ?>

    <?php echo form_fieldset('IHC'); ?>
    <div class="form-group">
      <?php echo form_label('ihc:','ihc[]',array('class'=>'control-label col-md-2')); ?>
      <div class="col-md-10">
        <?php $ihc = array('MLH1'=>'MLH1','PMS2'=>'PMS2','MSH2'=>'MSH2','MSH6'=>'MSH6');
        echo form_dropdown(array('name'=>'ihc[]','class'=>'form-control','multiple'=>TRUE),$ihc,set_value('ihc',unserialize($labs['ihc']),FALSE)); ?>
      </div>
    </div>
    <?php echo form_fieldset_close(); ?>

    <?php echo form_fieldset('GENE'); ?>
    <div class="form-group">
      <?php echo form_label('gene:','gene',array('class'=>'control-label col-md-2')); ?>
      <div class="col-md-10">
        <?php $gen = array(''=>'เลือกรายการ','NO MUTATION'=>'NO MUTATION','MUTATION'=>'MUTATION');
        echo form_dropdown(array('name'=>'gene','class'=>'form-control','id'=>'gene'),$gen,set_value('gene',$labs['gene'])); ?>
      </div>
    </div>
    <div id="gene_ctn">
      <div class="form-group">
        <?php echo form_label('germline (mmr gene):','germline',array('class'=>'control-label col-md-2')); ?>
        <div class="col-md-10">
          <?php $gml = array(''=>'เลือกรายการ','MLH1'=>'MLH1','PMS2'=>'PMS2','MLH3'=>'MLH3','MSH3'=>'MSH3','MSH2'=>'MSH2','MSH6'=>'MSH6','PMS1'=>'PMS1','EPCAM'=>'EPCAM');
          echo form_dropdown(array('name'=>'germline','class'=>'form-control','id'=>'germline'),$gml,set_value('germline',$labs['germline'],FALSE)); ?>
        </div>
      </div>
      <div class="well well-sm">
        <div id="germline_ctn">
          <div class="form-group">
            <?php echo form_label('exon:','germline_exon',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-4">
              <?php $dropdown_exon[''] = 'เลือกรายการ';
              foreach (range('1','30') as $key => $value) $dropdown_exon[++$key] = $value;
              echo form_dropdown(array('name'=>'germline_exon','class'=>'form-control'),$dropdown_exon,set_value('germline_exon',$labs['germline_exon'])); ?>
              <p class="help-block"></p>
            </div>
            <?php echo form_label('intron:','germline_intron',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-4">
              <?php $dropdown_intron[''] = 'เลือกรายการ';
              foreach (range('1','30') as $key => $value) $dropdown_intron[++$key] = $value;
              echo form_dropdown(array('name'=>'germline_intron','class'=>'form-control'),$dropdown_intron,set_value('germline_intron',$labs['germline_intron'])); ?>
              <p class="help-block"></p>
            </div>
          </div>
          <div class="form-group">
            <?php echo form_label('position codon:','germline_codon',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-4">
              <?php echo form_input(array('name'=>'germline_codon','class'=>'form-control'),set_value('germline_codon',$labs['germline_codon'],FALSE)); ?>
              <p class="help-block"></p>
            </div>
            <?php echo form_label('position amino acid:','germline_amino_acid',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-4">
              <?php echo form_input(array('name'=>'germline_amino_acid','class'=>'form-control'),set_value('germline_amino_acid',$labs['germline_amino_acid'],FALSE)); ?>
              <p class="help-block"></p>
            </div>
          </div>
          <div class="form-group">
            <?php echo form_label('type of mutation:','germline_type_mutation',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-4">
              <?php echo form_dropdown(array('name'=>'germline_type_mutation','class'=>'form-control'),$type_mutation_src,set_value('germline_type_mutation',$labs['germline_type_mutation'],FALSE)); ?>
            </div>
            <?php echo form_label('effect of mutation:','germline_effect_mutation',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-4">
              <?php echo form_dropdown(array('name'=>'germline_effect_mutation','class'=>'form-control'),$effect_mutation_src,set_value('germline_effect_mutation',$labs['germline_effect_mutation'],FALSE)); ?>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <?php echo form_label('somatic (tumor15):','somatic',array('class'=>'control-label col-md-2')); ?>
        <div class="col-md-10">
          <?php $smt = array(''=>'เลือกรายการ',
          'AKT1'=>'AKT1','BRAF'=>'BRAF','EGFR'=>'EGFR','ERBB2'=>'ERBB2',
          'FOXL2'=>'FOXL2','GNR11'=>'GNR11','GNAQ'=>'GNAQ','KIT'=>'KIT',
          'KRAS'=>'KRAS','MET'=>'MET','NRAS'=>'NRAS','PDGFRA'=>'PDGFRA',
          'PIK3GA'=>'PIK3GA','RET'=>'RET','TP53'=>'TP53');
          echo form_dropdown(array('name'=>'somatic','class'=>'form-control','id'=>'somatic'),$smt,set_value('somatic',$labs['somatic'],FALSE)); ?>
        </div>
      </div>
      <div class="well well-sm">
        <div id="somatic_ctn">
          <div class="form-group">
            <?php echo form_label('exon:','somatic_exon',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-4">
              <?php $dropdown_exon[''] = 'เลือกรายการ';
              foreach (range('1','30') as $key => $value) $dropdown_exon[++$key] = $value; ?>
              <?php echo form_dropdown(array('name'=>'somatic_exon','class'=>'form-control'),$dropdown_exon,set_value('somatic_exon',$labs['somatic_exon'],FALSE)); ?>
              <p class="help-block"></p>
            </div>
            <?php echo form_label('intron:','somatic_intron',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-4">
              <?php $dropdown_intron[''] = 'เลือกรายการ';
              foreach (range('1','30') as $key => $value) $dropdown_intron[++$key] = $value; ?>
              <?php echo form_dropdown(array('name'=>'somatic_intron','class'=>'form-control'),$dropdown_intron,set_value('somatic_intron',$labs['somatic_intron'],FALSE)); ?>
              <p class="help-block"></p>
            </div>
          </div>
          <div class="form-group">
            <?php echo form_label('position codon:','somatic_codon',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-4">
              <?php echo form_input(array('name'=>'somatic_codon','class'=>'form-control'),set_value('somatic_codon',$labs['somatic_codon'],FALSE)); ?>
              <p class="help-block"></p>
            </div>
            <?php echo form_label('position amino acid:','somatic_amino_acid',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-4">
              <?php echo form_input(array('name'=>'somatic_amino_acid','class'=>'form-control'),set_value('somatic_amino_acid',$labs['somatic_amino_acid'],FALSE)); ?>
              <p class="help-block"></p>
            </div>
          </div>
          <div class="form-group">
            <?php echo form_label('type of mutation:','somatic_type_mutation',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-4">
              <?php echo form_dropdown(array('name'=>'somatic_type_mutation','class'=>'form-control'),$type_mutation_src,set_value('somatic_type_mutation',$labs['somatic_type_mutation'],FALSE)); ?>
            </div>
            <?php echo form_label('effect of mutation:','somatic_effect_mutation',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-4">
              <?php echo form_dropdown(array('name'=>'somatic_effect_mutation','class'=>'form-control'),$effect_mutation_src,set_value('somatic_effect_mutation',$labs['somatic_effect_mutation'],FALSE)); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php echo form_fieldset_close(); ?>

  </div>
</div>
<?php $this->load->view('admin/labs/assets'); ?>

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

  var msi_h = $('#msi_h');
  var msi_l = $('#msi_l');
  var msi_s = $('#msi_s');
  var gene = $('#gene');
  var somatic = $("#somatic");
  var germline = $("#germline");
  var gene_ctn = $('div#gene_ctn :input');
  var germline_ctn = $("div#germline_ctn :input");
  var somatic_ctn = $("div#somatic_ctn :input");

  var msi_h_methylation = $('.msi_h_methylation');
  msi_h_methylation.iCheck('disable');
  msi_h.on('change',function() {
    if (this.value == 'D17S250') {
      msi_h_methylation.iCheck('enable');
    } else {
      msi_h_methylation.iCheck('disable');
    }
  });

  var msi_l_methylation = $('.msi_l_methylation');
  msi_l_methylation.iCheck('disable');
  msi_l.on('change',function() {
    if (this.value == 'D17S250') {
      msi_l_methylation.iCheck('enable');
    } else {
      msi_l_methylation.iCheck('disable');
    }
  });

  var msi_s_methylation = $('.msi_s_methylation');
  msi_s_methylation.iCheck('disable');
  msi_s.on('change',function() {
    if (this.value == 'D17S250') {
      msi_s_methylation.iCheck('enable');
    } else {
      msi_s_methylation.iCheck('disable');
    }
  });

  <?php if ($labs['gene'] !== 'MUTATION'): ?>
  gene_ctn.prop('disabled',true);
  <?php endif; ?>
  gene.on('change',function(){
    if (this.value == 'MUTATION') {
      gene_ctn.prop('disabled',false);
      germline_ctn.prop('disabled',true);
      somatic_ctn.prop('disabled',true);
    } else {
      gene_ctn.prop('disabled',true);
    }
  });

  <?php if ($labs['germline'] === ''): ?>
  germline_ctn.prop('disabled',true);
  <?php endif; ?>
  germline.on('change',function(){
    if (this.value != '') {
      germline_ctn.prop('disabled',false);
    } else {
      germline_ctn.prop('disabled',true);
    }
  });

  <?php if ($labs['somatic'] === ''): ?>
  somatic_ctn.prop('disabled',true);
  <?php endif; ?>
  somatic.on('change',function(){
    if (this.value != '') {
      somatic_ctn.prop('disabled',false);
    } else {
      somatic_ctn.prop('disabled',true);
    }
  });
});
</script>
