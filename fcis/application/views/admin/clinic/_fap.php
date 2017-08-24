<div class="row">
  <div class="col-md-12">

    <?php echo form_fieldset('Polyposis'); ?>
    <div class="form-group">
      <?php echo form_label('polyposis:','fap_polyposis',array('class'=>'control-label col-md-2')); ?>
      <div class="col-md-10">
        <?php $pps = array(''=>'เลือกรายการ','>=1,000'=>'>=1,000','>100<1,000'=>'>100<1,000','<100'=>'<100');
        echo form_dropdown(array('name'=>'fap_polyposis','class'=>'form-control'),$pps,set_value('fap_polyposis',$clinic['fap_polyposis'])); ?>
      </div>
    </div>
    <?php echo form_fieldset_close(); ?>

    <?php echo form_fieldset('Clinical'); ?>
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
      <?php echo form_label('Malignant extracolonic manifestation:','',array('class'=>'control-label col-md-2')); ?>
      <div class="col-md-10">
        <?php $dropdown_mem = array(''=>'เลือกรายการ',
          'Hepatoblastoma'=>'Hepatoblastoma',
          'Thyroid cancer'=>'Thyroid cancer',
          'Pancreatic cancer'=>'Pancreatic cancer',
          'Gardner syndrome'=>'Gardner syndrome',
          'Epidermoid cyst'=>'Epidermoid cyst',
          'Osteomas'=>'Osteomas',
          'Turcot syndrome (FAP Turcot หรือ Crail syndrome Adenomatous polyposis Celebellar medulloblastoma)'=>'Turcot syndrome (FAP Turcot หรือ Crail syndrome Adenomatous polyposis Celebellar medulloblastoma)');
        echo form_dropdown(array('name'=>'','class'=>'form-control'),$dropdown_mem,set_value('')); ?>
      </div>
    </div>
    <div class="form-group">
      <?php echo form_label('Extracolonic manifestation of FAP:','',array('class'=>'control-label col-md-2')); ?>
      <div class="col-md-10">
        <?php $emof = array(''=>'เลือกรายการ',
          'gastric_polyp'=>'Gastric Polyp','duodenal_polyps'=>'Duodenal polyps',
          'desmoid_tumor'=>'Desmoid tumor','chrpe'=>'Congenital hypertrophy of the retinal pigment epithelium(CHRPE)',
          'nasopharyngeal_angiofibroma'=>'Nasopharyngeal angiofibroma');
        echo form_dropdown(array('name'=>'case','class'=>'form-control','id'=>'case'),$emof,set_value('')); ?>
      </div>
    </div>
      <div id="polyp_ctn">
        <div class="well well-sm">
          <div class="form-group">
            <?php echo form_label('Endoscopic treatment:','endoscopic_treatment',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-10" >
              <?php echo form_input(array('name'=>'','class'=>'form-control datepicker','placeholder'=>'operative date')); ?>
              <?php echo form_textarea(array('name'=>'','class'=>'form-control','placeholder'=>'details')); ?>
            </div>
          </div>
          <div class="form-group">
            <?php echo form_label('Surgical resection:','surgical_resection',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-10" >
              <?php echo form_input(array('name'=>'','class'=>'form-control datepicker','placeholder'=>'operative date')); ?>
              <?php echo form_textarea(array('name'=>'','class'=>'form-control','placeholder'=>'details')); ?>
            </div>
          </div>
          <div class="form-group">
            <?php echo form_label('Pharmacologic therapy:','pharmacologic_therapy',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-10" >
              <?php echo form_input(array('name'=>'','class'=>'form-control datepicker','placeholder'=>'operative date')); ?>
              <?php echo form_textarea(array('name'=>'','class'=>'form-control','placeholder'=>'details')); ?>
            </div>
          </div>
        </div>
      </div>
      <div id="desmoid_ctn">
        <div class="well well-sm">
          <div class="form-group">
            <?php echo form_label('location:','',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-10">
              <?php $dropdown_lct = array(''=>'เลือกรายการ',
              'Abdominal  wall desmoids tumor'=>'Abdominal  wall desmoids tumor',
              'Extrimities desmoids tumor'=>'Extrimities desmoids tumor',
              'Intraabnominal desmoids tumor'=>'Intraabnominal desmoids tumor',
              'Mesenteric desmoids tumor'=>'Mesenteric desmoids tumor'); ?>
              <?php echo form_dropdown(array('name'=>'','class'=>'form-control'),$dropdown_lct,set_value('')); ?>
            </div>
          </div>
          <div class="form-group">
            <?php echo form_label('management medical treatment:','',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-10">
              <?php $dropdown_mmt = array(''=>'เลือกรายการ','NSAIDS'=>'NSAIDS','Antiestrogen therapy'=>'Antiestrogen therapy','Cytotoxic chemotherpy'=>'Cytotoxic chemotherpy'); ?>
              <?php echo form_dropdown(array('name'=>'','class'=>'form-control'),$dropdown_mmt,set_value('')); ?>
            </div>
          </div>
          <div class="form-group">
            <?php echo form_label('กesmoid tumor:','',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-10" >
              <p>wide excision</p>
              <?php echo form_input(array('name'=>'','class'=>'form-control datepicker','placeholder'=>'operative date')); ?>
              <?php echo form_textarea(array('name'=>'','class'=>'form-control','placeholder'=>'details')); ?>
            </div>
            <?php echo form_label('','',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-10" >
              <p>explore lap</p>
              <?php echo form_input(array('name'=>'','class'=>'form-control datepicker','placeholder'=>'operative date')); ?>
              <?php echo form_textarea(array('name'=>'','class'=>'form-control','placeholder'=>'details')); ?>
            </div>
            <?php echo form_label('','',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-10" >
              <p>surgical resection</p>
              <?php echo form_input(array('name'=>'','class'=>'form-control datepicker','placeholder'=>'operative date')); ?>
              <?php echo form_textarea(array('name'=>'','class'=>'form-control','placeholder'=>'details')); ?>
            </div>
          </div>
        </div>
      </div>
    <?php echo form_fieldset_close(); ?>
  </div>
</div>
<?php $this->load->view('admin/clinic/assets'); ?>

<?=link_tag('assets/admin/plugins/dropzone/dropzone.min.css');?>
<?=link_tag('assets/admin/plugins/dropzone/basic.min.css');?>
<?=script_tag('assets/admin/plugins/dropzone/dropzone.min.js');?>
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

  var ccase = $('#case');
  var polyp = $('div#polyp_ctn');
  var desmoid = $('div#desmoid_ctn');
  var polyp_ctn = $('div#polyp_ctn :input');
  var desmoid_ctn = $('div#desmoid_ctn :input');
  polyp.hide();
  desmoid.hide();
  polyp_ctn.prop('disabled',true);
  desmoid_ctn.prop('disabled',true);
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
