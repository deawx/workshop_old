<div class="row">
  <div class="col-md-12">
    <?php echo form_fieldset('Clinical'); ?>
    <div class="form-group">
      <?php echo form_label('clinical:','pjsjps_clinical',array('class'=>'control-label col-md-2')); ?>
      <div class="col-md-10">
        <?php $dropdown_cnc = array(''=>'เลือกรายการ',
          'Hyper pigmented of skin'=>'Hyper pigmented of skin',
          'intestinal obstruction'=>'intestinal obstruction',
          'colon cancer'=>'colon cancer'); ?>
        <?php echo form_dropdown(array('name'=>'pjsjps_clinical','class'=>'form-control'),$dropdown_cnc,set_value('pjsjps_clinical',$clinic['pjsjps_clinical'])); ?>
        <p class="help-block"></p>
      </div>
    </div>
    <div class="form-group">
      <?php echo form_label('type:','pjsjps_type',array('class'=>'control-label col-md-2')); ?>
      <div class="col-md-10">
        <div class="row">
          <div class="col-md-6">
            <div class="checkbox">
              <?php echo form_checkbox(array('name'=>'pjsjps_type','class'=>'form-control','id'=>'type'),'1',set_checkbox('pjsjps_type','1',($clinic['pjsjps_type'] == '1'))); ?> Hereditary hamartomatous polyposis syndromes
            </div>
          </div>
          <div class="col-md-6">
            <?php $tpt = array(''=>'เลือกรายการ',
              'Familial juvenile polyposis syndromes'=>'Familial juvenile polyposis syndromes',
              'Peutz-jeghers syndromes'=>'Peutz-jeghers syndromes',
              'Cowden disease or syndromes'=>'Cowden disease or syndromes',
              'Bannayan-Rilay-Ruvalcaba syndromes'=>'Bannayan-Rilay-Ruvalcaba syndromes',
              'Hereditary mixed polyposis syndromes'=>'Hereditary mixed polyposis syndromes',
              'Gorlin syndromes'=>'Gorlin syndromes','Neurofibromatosis'=>'Neurofibromatosis',
              'Multiple endocrine neoplasia'=>'Multiple endocrine neoplasia');
              echo form_dropdown(array('name'=>'pjsjps_type_detail','class'=>'form-control','id'=>'type_ctn'),$tpt,set_value('pjsjps_type_detail',$clinic['pjsjps_type_detail'])); ?>
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
  var type = $('#type');
  var type_ctn = $('#type_ctn');
  <?php if ($clinic['pjsjps_type'] == '0') : ?>
    type_ctn.prop('disabled',true);
  <?php endif; ?>
  type.on('ifToggled',function(){
    type_ctn.prop('disabled',function(i,v){ return !v; });
  });
});
</script>
