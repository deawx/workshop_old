<div class="form-group">
  <?php echo form_label('blood:','blood',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-4">
    <div class="input-group">
      <?php echo form_input(array('name'=>'','class'=>'form-control','placeholder'=>'',''=>TRUE),set_value('')); ?>
      <span class="input-group-addon">ml</span>
    </div>
  </div>
  <?php echo form_label("sample's code",'blood_code',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-4">
    <?php echo form_input(array('name'=>'blood_code','class'=>'form-control','placeholder'=>'blood_code',''=>TRUE),set_value('')); ?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('fresh tissue:','fresh_tissue',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-4">
    <?php $dropdown_tissue = array(''=>'เลือกรายการ','normal'=>'normal','polyp'=>'polyp','tumor'=>'tumor'); ?>
    <?php echo form_dropdown(array('name'=>'fresh_tissue','class'=>'form-control'),$dropdown_tissue,set_value('')); ?>
  </div>
  <?php echo form_label("sample's code","fresh_tissue_code",array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-4">
    <?php echo form_input(array('name'=>'fresh_tissue_code','class'=>'form-control','placeholder'=>'fresh_tissue_code',''=>TRUE),set_value('')); ?>
  </div>
</div>
<div class="col-md-6"> </div>
<div class="form-group">
  <?php echo form_label("sample's code","ffpe",array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-4">
    <?php echo form_input(array('name'=>'ffpe','class'=>'form-control','placeholder'=>'ffpe',''=>TRUE),set_value('')); ?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('ihc:','ihc',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-4">
    <?php echo form_checkbox(array('name'=>'ihc','class'=>'form-control','placeholder'=>'ihc',''=>TRUE),set_value('')); ?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('fcc:','fcc',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-4">
    <?php $dropdown_fcc = array(''=>'เลือกรายการ','fap'=>'fap','hnpcc'=>'hnpcc','pjs/jps'=>'pjs/jps'); ?>
    <?php echo form_dropdown(array('name'=>'fcc','class'=>'form-control'),$dropdown_fcc,set_value('')); ?>
  </div>
</div>
