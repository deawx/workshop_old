<div class="row">
  <div class="col-md-12">

    <?php echo form_fieldset('Criteria'); ?>
    <div class="form-group">
      <?php echo form_label('criteria:','hnpcc_criteria',array('class'=>'control-label col-md-2')); ?>
      <div class="col-md-10">
        <?php $dropdown_tof = array(''=>'เลือกรายการ',
          'Amsterdam I'=>'Amsterdam I',
          'Amsterdam II'=>'Amsterdam II',
          'Bethesda Guideline'=>'Bethesda Guideline',
          'PSU HNPCC Criteria'=>'PSU HNPCC Criteria'); ?>
        <?php echo form_dropdown(array('name'=>'hnpcc_criteria','class'=>'form-control'),$dropdown_tof,set_value('hnpcc_criteria',$clinic['hnpcc_criteria'])); ?>
        <p class="help-block"></p>
      </div>
    </div>
    <?php echo form_fieldset_close(); ?>

    <?php echo form_fieldset('Clinical'); ?>
    <div class="form-group">
      <?php echo form_label('hnpcc:','hnpcc_clinical',array('class'=>'control-label col-md-2')); ?>
      <div class="col-md-10">
        <div class="row">
          <div class="col-md-6">
            <?php $tof = array(''=>'เลือกรายการ',
              'Lynch I syndromes'=>'Lynch I syndromes',
              'Lynch II syndromes'=>'Lynch II syndromes',
              'Lynch III syndromes'=>'Lynch III syndromes',
              'Lynch IV syndromes'=>'Lynch IV syndromes');
              echo form_dropdown(array('name'=>'hnpcc_clinical','class'=>'form-control','id'=>'hnpcc'),$tof,set_value('hnpcc_clinical',$clinic['hnpcc_clinical'])); ?>
            <p class="help-block">โรคร่วม Extracolonic cancer ใน Hereditary nopolyposis colorectal carcinoma (HNPCC)</p>
          </div>
          <div class="col-md-6">
            <?php $tof = array(''=>'เลือกรายการ',
              'Endometrium'=>'Endometrium','Ovary'=>'Ovary','Breast'=>'Breast',
              'Kidney'=>'Kidney','Ureter'=>'Ureter','Bladder'=>'Bladder',
              'Brain'=>'Brain','Stomach'=>'Stomach','Esophagus'=>'Esophagus',
              'Skin'=>'Skin','Thyroid'=>'Thyroid','Other'=>'Other');
              echo form_dropdown(array('name'=>'hnpcc_clinical_detail','class'=>'form-control','id'=>'hnpcc_ctn'),$tof,set_value('hnpcc_clinical_detail',$clinic['hnpcc_clinical_detail'])); ?>
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
  var hnpcc = $('#hnpcc');
  var hnpcc_ctn = $('#hnpcc_ctn');
  <?php if ($clinic['hnpcc_clinical'] === '') : ?>
    hnpcc_ctn.prop('disabled',true);
  <?php endif; ?>
  hnpcc.on('change',function(){
    if (this.value != '') {
      hnpcc_ctn.prop('disabled',false);
    } else {
      hnpcc_ctn.prop('disabled',true);
    }
  });
});
</script>
