<div class="form-horizontal">
  <div class="form-group">
    <?php echo form_label('เคสผู้ป่วย:','',array('class'=>'control-label col-md-2')); ?>
    <div class="col-md-4">
      <?=form_dropdown(array('name'=>'case','class'=>'form-control','id'=>'case','onchange'=>"window.location='".site_url('admin/sample')."/'+this.value"),array('add_inpatient'=>'ผู้ป่วยใน','add_outpatient'=>'ผู้ป่วยนอก'),set_value('case','add_'.$case) );?>
  </div>
</div>
</div>
<?php if ($case === 'inpatient') : ?>
<?php echo form_open(uri_string(),array('method'=>'get','class'=>'form-horizontal')); ?>
  <div class="form-group">
    <?php echo form_label('ค้นหาข้อมูล:','',array('class'=>'control-label col-md-2')); ?>
    <div class="col-md-4">
      <div class="input-group">
        <?php echo form_input(array('name'=>'q','class'=>'form-control','placeholder'=>'เลขบัตรปชช/รหัสHN'),set_value('q',$this->input->get('q'))); ?>
        <div class="input-group-btn">
          <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
        </div>
      </div>
    </div>
  </div>
<?php echo form_close(); ?>
<?php elseif ($case === 'outpatient') : ?>
  <div class="form-group">
    <?php echo form_label('หน่วยงาน:','',array('class'=>'control-label col-md-2')); ?>
    <div class="col-md-4">
      <?php echo form_input(array('name'=>'institution','class'=>'form-control','placeholder'=>'หน่วยงาน'),set_value('institution',$sample['institution'])); ?>
    </div>
  </div>
  <div class="form-group">
    <?php echo form_label('แผนก:','',array('class'=>'control-label col-md-2')); ?>
    <div class="col-md-4">
      <?php echo form_input(array('name'=>'department','class'=>'form-control','placeholder'=>'แผนก'),set_value('department',$sample['department'])); ?>
    </div>
  </div>
  <div class="form-group">
    <?php echo form_label('ชื่อตัวอย่าง:','',array('class'=>'control-label col-md-2')); ?>
    <div class="col-md-4">
      <?php echo form_input(array('name'=>'sample_name','class'=>'form-control','placeholder'=>'ชื่อตัวอย่าง'),set_value('sample_name',$sample['sample_name'])); ?>
    </div>
  </div>
<?php endif; ?>
