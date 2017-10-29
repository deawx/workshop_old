<?php echo form_fieldset('ประเภทสิ่งส่งตรวจ'); ?>
<div class="form-group">
  <?php echo form_label('เลือด:','blood',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-1">
    <?php echo form_checkbox(array('name'=>'blood','class'=>'form-control','id'=>'checked_blood'),'1',set_checkbox('blood','1',($sample['blood'] == '1'))); ?>
  </div>
  <div id="blood_div">
    <div class="col-md-4">
      <div class="input-group">
        <?php echo form_number(array('name'=>'blood_ml','class'=>'form-control','placeholder'=>'ประมาณ(มิลลิลิตร)'),set_value('blood_ml',$sample['blood_ml'])); ?>
        <span class="input-group-addon">ml</span>
      </div>
    </div>
    <div class="col-md-5">
      <?php echo form_input(array('name'=>'blood_code','class'=>'form-control','placeholder'=>'รหัสเลือด'),set_value('blood_code',$sample['blood_code'])); ?>
    </div>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('รหัสเนื้อเยื่อ:','fresh_tissue',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-1">
    <?php echo form_checkbox(array('name'=>'fresh_tissue','class'=>'form-control','id'=>'checked_tissue'),'1',set_checkbox('fresh_tissue','1',($sample['fresh_tissue'] == '1'))); ?>
  </div>
  <div id="tissue_div">
    <div class="col-md-4">
      <?php $dropdown_tissue = array(''=>'เลือกรายการ','NORMAL'=>'NORMAL','POLYP'=>'POLYP','TUMOR'=>'TUMOR'); ?>
      <?php echo form_dropdown(array('name'=>'fresh_tissue_group','class'=>'form-control'),$dropdown_tissue,set_value('fresh_tissue_group',$sample['fresh_tissue_group'])); ?>
    </div>
    <div class="col-md-5">
      <?php echo form_input(array('name'=>'fresh_tissue_code','class'=>'form-control','placeholder'=>'รหัสเนื้อเยื่อ'),set_value('fresh_tissue_code',$sample['fresh_tissue_code'])); ?>
    </div>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('FFPE:','ffpe',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-1">
    <?php echo form_checkbox(array('name'=>'ffpe','class'=>'form-control','id'=>'checked_ffpe'),'1',set_checkbox('ffpe','1',($sample['ffpe'] == '1'))); ?>
  </div>
  <div id="ffpe_div">
    <div class="col-md-4"> <?php echo form_input(array('name'=>'ffpe_code','class'=>'form-control','placeholder'=>'รหัส FFPE'),set_value('ffpe_code',$sample['ffpe_code'])); ?> </div>
    <div class="col-md-5"> </div>
  </div>
</div>
<?php echo form_fieldset_close(); ?>
<?php echo form_fieldset('แลปส่งตรวจ'); ?>
<div class="form-group">
  <?php echo form_label('IHC:','ihc',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-10">
    <div class="checkbox">
      <?php echo form_checkbox(array('name'=>'ihc','class'=>'form-control','id'=>'ihc'),'1',set_checkbox('ihc','1',($sample['ihc'] == '1'))); ?>
    </div>
    <p class="help-block"></p>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('FCC:','fcc',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-1">
    <?php echo form_checkbox(array('name'=>'fcc','class'=>'form-control','id'=>'checked_fcc','required'=>TRUE),'1',set_checkbox('fcc','1',($sample['fcc'] === '1'))); ?>
  </div>
  <div id="fcc_div">
    <div class="col-md-4">
      <?php $dropdown_grp = array(''=>'เลือกรายการ','FAP'=>'FAP','HNPCC'=>'HNPCC','PJS/JPS'=>'PJS/JPS'); ?>
      <?php echo form_dropdown(array('name'=>'fcc_group','class'=>'form-control','required'=>TRUE),$dropdown_grp,set_value('fcc_group',$sample['fcc_group'])); ?>
    </div>
  </div>
</div>
<?php echo form_fieldset_close(); ?>
<?php echo form_fieldset('หมายเหตุ'); ?>
<div class="form-group">
  <?php echo form_label('หมายเหตุ:','remark',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-10">
    <?php echo form_textarea(array('name'=>'remark','class'=>'form-control','rows'=>'2'),set_value('remark',$sample['remark'])); ?>
  </div>
</div>
<?php echo form_fieldset_close(); ?>

<script type="text/javascript">
  $(document).ready(function() {
    <?php if ( ! $id) : ?>
    $('input').iCheck('uncheck');
    <?php endif; ?>
    var checked_blood = $('#checked_blood');
    var blood_div = $('div#blood_div :input');
    <?php if ($sample['blood'] !== '1') : ?>
    blood_div.prop('disabled',true);
    <?php endif; ?>
    checked_blood.on('ifToggled',function(e) {
      if (e.delegateTarget.checked) {
        blood_div.prop('disabled',false);
      } else {
        blood_div.prop('disabled',true);
      }
    });
    var checked_tissue = $('#checked_tissue');
    var tissue_div = $('div#tissue_div :input');
    <?php if ($sample['fresh_tissue'] !== '1') : ?>
    tissue_div.prop('disabled',true);
    <?php endif; ?>
    checked_tissue.on('ifToggled',function(e) {
      if (e.delegateTarget.checked) {
        tissue_div.prop('disabled',false);
      } else {
        tissue_div.prop('disabled',true);
      }
    });
    var checked_ffpe = $('#checked_ffpe');
    var ffpe_div = $('div#ffpe_div :input');
    <?php if ($sample['ffpe'] !== '1') : ?>
    ffpe_div.prop('disabled',true);
    <?php endif; ?>
    checked_ffpe.on('ifToggled',function(e) {
      if (e.delegateTarget.checked) {
        ffpe_div.prop('disabled',false);
      } else {
        ffpe_div.prop('disabled',true);
      }
    });
    var checked_fcc = $('#checked_fcc');
    var fcc_div = $('div#fcc_div :input');
    <?php if ($sample['fcc'] !== '1') : ?>
    fcc_div.prop('disabled',true);
    <?php endif; ?>
    checked_fcc.on('ifToggled',function(e) {
      if (e.delegateTarget.checked) {
        fcc_div.prop('disabled',false);
      } else {
        fcc_div.prop('disabled',true);
      }
    });
  });
</script>
