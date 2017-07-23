<div class="form-group">
  <?php echo form_label('blood:','blood',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-4">
    <div class="input-group">
      <?php echo form_input(array('name'=>'blood','class'=>'form-control','placeholder'=>''),set_value('blood')); ?>
      <span class="input-group-addon">ml</span>
    </div>
  </div>
  <?php echo form_label("sample's code:",'blood_code',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-4">
    <?php echo form_input(array('name'=>'blood_code','class'=>'form-control','placeholder'=>'blood_code'),set_value('blood_code')); ?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('fresh tissue:','fresh_tissue',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-4">
    <?php $dropdown_tissue = array(''=>'เลือกรายการ','normal'=>'normal','polyp'=>'polyp','tumor'=>'tumor'); ?>
    <?php echo form_dropdown(array('name'=>'fresh_tissue','class'=>'form-control'),$dropdown_tissue,set_value('fresh_tissue')); ?>
  </div>
  <?php echo form_label("sample's code:","fresh_tissue_code",array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-4">
    <?php echo form_input(array('name'=>'fresh_tissue_code','class'=>'form-control','placeholder'=>'fresh_tissue_code'),set_value('fresh_tissue_code')); ?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('ffpe:','ffpe',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-4">
    <?php echo form_checkbox(array('name'=>'ffpe','class'=>'form-control'),set_value('ffpe')); ?>
  </div>
  <?php echo form_label("sample's code:","ffpe_code",array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-4">
    <?php echo form_input(array('name'=>'ffpe_code','class'=>'form-control','placeholder'=>'ffpe_code'),set_value('ffpe_code')); ?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('groups:','groups',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-4">
    <?php $dropdown_grp = array(''=>'เลือกรายการ','fap'=>'FAP','hnpcc'=>'HNPCC','pjsjps'=>'PJS/JPS'); ?>
    <?php echo form_dropdown(array('name'=>'groups','class'=>'form-control','id'=>'select_grp'),$dropdown_grp,set_value('groups')); ?>
  </div>
  <div id="select_grp_ctn">
    <?php echo form_label('ihc:','ihc',array('class'=>'control-label col-md-2')); ?>
    <div class="col-md-4">
      <?php echo form_checkbox(array('name'=>'ihc','class'=>'form-control'),set_value('ihc')); ?>
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
  var select_grp = $('select#select_grp');
  var select_grp_ctn = $('div#select_grp_ctn');
  select_grp_ctn.hide();
  select_grp.change(function() {
    if (this.value == 'hnpcc') {
      select_grp_ctn.fadeIn();
    } else {
      select_grp_ctn.fadeOut();
    }
  });
});
</script>
