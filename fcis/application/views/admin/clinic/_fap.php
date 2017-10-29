<?php $fap_extracolonic_detail = unserialize($clinic['fap_extracolonic_detail']); ?>
<div class="row">
  <div class="col-md-12">

    <?php echo form_fieldset('POLYPOSIS'); ?>
    <div class="form-group">
      <?php echo form_label('polyposis:','fap_polyposis',array('class'=>'control-label col-md-2')); ?>
      <div class="col-md-10">
        <?php $pps = array(''=>'เลือกรายการ','>=1,000'=>'>=1,000','>100<1,000'=>'>100<1,000','<100'=>'<100');
        echo form_dropdown(array('name'=>'fap_polyposis','class'=>'form-control'),$pps,set_value('fap_polyposis',$clinic['fap_polyposis'],FALSE)); ?>
      </div>
    </div>
    <?php echo form_fieldset_close(); ?>

    <?php echo form_fieldset('CLINICAL'); ?>
    <div class="form-group">
      <?php echo form_label('type of FAP:','fap_type',array('class'=>'control-label col-md-2')); ?>
      <div class="col-md-10">
        <?php $tof = array(''=>'เลือกรายการ',
          'Familial Adenomatous polyposis'=>'Familial Adenomatous polyposis',
          'Attenuated FAP(AFAP) or Attenuated adenomatous polyposis coli (AAPC)'=>'Attenuated FAP(AFAP) or Attenuated adenomatous polyposis coli (AAPC)',
          'Other Adenomotous polyposis syndrome'=>'Other Adenomotous polyposis syndrome');
        echo form_dropdown(array('name'=>'fap_type','class'=>'form-control'),$tof,set_value('fap_type',$clinic['fap_type'])); ?>
      </div>
    </div>
    <div class="form-group">
      <?php echo form_label('Malignant extracolonic manifestation:','fap_malignant',array('class'=>'control-label col-md-2')); ?>
      <div class="col-md-10">
        <?php $dropdown_mem = array(''=>'เลือกรายการ',
          'Hepatoblastoma'=>'Hepatoblastoma',
          'Thyroid cancer'=>'Thyroid cancer',
          'Pancreatic cancer'=>'Pancreatic cancer',
          'Gardner syndrome'=>'Gardner syndrome',
          'Epidermoid cyst'=>'Epidermoid cyst',
          'Osteomas'=>'Osteomas',
          'Turcot syndrome (FAP Turcot หรือ Crail syndrome Adenomatous polyposis Celebellar medulloblastoma)'=>'Turcot syndrome (FAP Turcot หรือ Crail syndrome Adenomatous polyposis Celebellar medulloblastoma)');
        echo form_dropdown(array('name'=>'fap_malignant','class'=>'form-control'),$dropdown_mem,set_value('fap_malignant',$clinic['fap_malignant'])); ?>
      </div>
    </div>
    <div class="form-group">
      <?php echo form_label('Extracolonic manifestation of FAP:','fap_extracolonic',array('class'=>'control-label col-md-2')); ?>
      <div class="col-md-10">
        <?php $emof = array(''=>'เลือกรายการ',
          'gastric_polyp'=>'Gastric Polyp','duodenal_polyps'=>'Duodenal polyps',
          'desmoid_tumor'=>'Desmoid tumor','chrpe'=>'Congenital hypertrophy of the retinal pigment epithelium(CHRPE)',
          'nasopharyngeal_angiofibroma'=>'Nasopharyngeal angiofibroma');
        echo form_dropdown(array('name'=>'fap_extracolonic','class'=>'form-control','id'=>'case'),$emof,set_value('fap_extracolonic',$clinic['fap_extracolonic'])); ?>
      </div>
    </div>
      <div id="polyp_ctn">
        <div class="well well-sm">
          <div class="form-group">
            <?php echo form_label('Endoscopic treatment:','',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-10">
              <?php echo form_input(array('name'=>'fap_extracolonic_detail[endoscopic_datetime]','class'=>'form-control datepicker','placeholder'=>'operative date'),set_value('fap_extracolonic_detail[endoscopic_datetime]',isset($fap_extracolonic_detail['endoscopic_datetime']) ? $fap_extracolonic_detail['endoscopic_datetime'] : '')); ?>
              <?php echo form_textarea(array('name'=>'fap_extracolonic_detail[endoscopic_detail]','class'=>'form-control','placeholder'=>'details'),set_value('fap_extracolonic_detail[endoscopic_detail]',$fap_extracolonic_detail['endoscopic_detail'])); ?>
            </div>
          </div>
          <div class="form-group">
            <?php echo form_label('Surgical resection:','',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-10">
              <?php echo form_input(array('name'=>'fap_extracolonic_detail[sergical_datetime]','class'=>'form-control datepicker','placeholder'=>'operative date'),set_value('fap_extracolonic_detail[sergical_datetime]',$fap_extracolonic_detail['sergical_datetime'])); ?>
              <?php echo form_textarea(array('name'=>'fap_extracolonic_detail[sergical_detail]','class'=>'form-control','placeholder'=>'details'),set_value('fap_extracolonic_detail[sergical_detail]',$fap_extracolonic_detail['sergical_detail'])); ?>
            </div>
          </div>
          <div class="form-group">
            <?php echo form_label('Pharmacologic therapy:','',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-10">
              <?php echo form_input(array('name'=>'fap_extracolonic_detail[pharmacologic_datetime]','class'=>'form-control datepicker','placeholder'=>'operative date'),set_value('fap_extracolonic_detail[pharmacologic_datetime]',$fap_extracolonic_detail['pharmacologic_datetime'])); ?>
              <?php echo form_textarea(array('name'=>'fap_extracolonic_detail[pharmacologic_detail]','class'=>'form-control','placeholder'=>'details'),set_value('fap_extracolonic_detail[pharmacologic_detail]',$fap_extracolonic_detail['pharmacologic_detail'])); ?>
            </div>
          </div>
        </div>
      </div>
      <div id="desmoid_ctn">
        <div class="well well-sm">
          <div class="form-group">
            <?php echo form_label('location:','fap_extracolonic_detail[location]',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-10">
              <?php $dropdown_lct = array(''=>'เลือกรายการ',
                'Abdominal  wall desmoids tumor'=>'Abdominal  wall desmoids tumor',
                'Extrimities desmoids tumor'=>'Extrimities desmoids tumor',
                'Intraabnominal desmoids tumor'=>'Intraabnominal desmoids tumor',
                'Mesenteric desmoids tumor'=>'Mesenteric desmoids tumor');
                echo form_dropdown(array('name'=>'fap_extracolonic_detail[location]','class'=>'form-control'),$dropdown_lct,set_value('fap_extracolonic_detail[location]',isset($fap_extracolonic_detail['location']) ? $fap_extracolonic_detail['location'] : '')); ?>
            </div>
          </div>
          <div class="form-group">
            <?php echo form_label('management medical treatment:','fap_extracolonic_detail[management]',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-10">
              <?php $dropdown_mmt = array(''=>'เลือกรายการ','NSAIDS'=>'NSAIDS','Antiestrogen therapy'=>'Antiestrogen therapy','Cytotoxic chemotherpy'=>'Cytotoxic chemotherpy'); ?>
              <?php echo form_dropdown(array('name'=>'fap_extracolonic_detail[management]','class'=>'form-control'),$dropdown_mmt,set_value('fap_extracolonic_detail[management]',isset($fap_extracolonic_detail['management']) ? $fap_extracolonic_detail['management'] : '')); ?>
            </div>
          </div>
          <div class="form-group">
            <?php echo form_label('กesmoid tumor:','',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-10">
              <p>wide excision</p>
              <?php echo form_input(array('name'=>'fap_extracolonic_detail[wide_datetime]','class'=>'form-control datepicker','placeholder'=>'operative date'),set_value('fap_extracolonic_detail[wide_datetime]',isset($fap_extracolonic_detail['wide_datetime']) ? $fap_extracolonic_detail['wide_datetime'] : '')); ?>
              <?php echo form_textarea(array('name'=>'fap_extracolonic_detail[wide_detail]','class'=>'form-control','placeholder'=>'details'),set_value('fap_extracolonic_detail[wide_detail]',isset($fap_extracolonic_detail['wide_detail']) ? $fap_extracolonic_detail['wide_detail'] : '')); ?>
            </div>
            <?php echo form_label('','',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-10">
              <p>explore lap</p>
              <?php echo form_input(array('name'=>'fap_extracolonic_detail[explore_datetime]','class'=>'form-control datepicker','placeholder'=>'operative date'),set_value('explore_datetime',isset($fap_extracolonic_detail['explore_datetime']) ? $fap_extracolonic_detail['explore_datetime'] : '')); ?>
              <?php echo form_textarea(array('name'=>'fap_extracolonic_detail[explore_detail]','class'=>'form-control','placeholder'=>'details'),set_value('explore_detail',isset($fap_extracolonic_detail['explore_detail']) ? $fap_extracolonic_detail['explore_detail'] : '')); ?>
            </div>
            <?php echo form_label('','',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-10">
              <p>surgical resection</p>
              <?php echo form_input(array('name'=>'fap_extracolonic_detail[surgical_datetime]','class'=>'form-control datepicker','placeholder'=>'operative date'),set_value('surgical_datetime',isset($fap_extracolonic_detail['surgical_datetime']) ? $fap_extracolonic_detail['surgical_datetime'] : '')); ?>
              <?php echo form_textarea(array('name'=>'fap_extracolonic_detail[surgical_detail]','class'=>'form-control','placeholder'=>'details'),set_value('surgical_detail',isset($fap_extracolonic_detail['surgical_detail']) ? $fap_extracolonic_detail['surgical_detail'] : '')); ?>
            </div>
          </div>
        </div>
      </div>
    <?php echo form_fieldset_close(); ?>
  </div>
</div>
<?php $this->load->view('admin/clinic/assets'); ?>

<script type="text/javascript">
$(document).ready(function() {
  var ccase = $('#case');
  var polyp = $('div#polyp_ctn');
  var desmoid = $('div#desmoid_ctn');
  var polyp_ctn = $('div#polyp_ctn :input');
  var desmoid_ctn = $('div#desmoid_ctn :input');
  <?php if ($clinic['fap_extracolonic'] === 'gastric_polyp' OR $clinic['fap_extracolonic'] === 'duodenal_polyps') : ?>
    desmoid.hide();
    // polyp.hide();
    desmoid_ctn.prop('disabled',true);
    // polyp_ctn.prop('disabled',true);
  <?php elseif ($clinic['fap_extracolonic'] === 'desmoid_tumor'): ?>
    // desmoid.hide();
    polyp.hide();
    // desmoid_ctn.prop('disabled',true);
    polyp_ctn.prop('disabled',true);
  <?php else: ?>
    desmoid.hide();
    polyp.hide();
    desmoid_ctn.prop('disabled',true);
    polyp_ctn.prop('disabled',true);
  <?php endif; ?>
  ccase.on('change',function(){
    if (this.value == 'gastric_polyp' || this.value == 'duodenal_polyps') {
      polyp.show();
      desmoid.hide();
      polyp_ctn.prop('disabled',false);
      desmoid_ctn.prop('disabled',true);
    } else if(this.value == 'desmoid_tumor') {
      polyp.hide();
      desmoid.show();
      polyp_ctn.prop('disabled',true);
      desmoid_ctn.prop('disabled',false);
    } else {
      polyp.hide();
      desmoid.hide();
      polyp_ctn.prop('disabled',true);
      desmoid_ctn.prop('disabled',true);
    }
  });

});
</script>
