<div class="form-group">
  <?php echo form_label('ความต้องการหางาน','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php $tt = array(''=>'เลือกรายการ',
    'ไม่ต้องการ'=>'ไม่ต้องการ',
    'ต้องการจัดหางานในประเทศ'=>'ต้องการจัดหางานในประเทศ',
    'ต้องการจัดหางานในต่างประเทศ'=>'ต้องการจัดหางานในต่างประเทศ');
    echo form_dropdown(array('name'=>'','class'=>'form-control'),$tt,set_value(''));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?=form_input(array('name'=>'','class'=>'form-control')); ?>
  </div>
</div>

<div class="form-group">
  <?php echo form_label('','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php $tt = array(''=>'เลือกรายการ');
    echo form_dropdown(array('name'=>'','class'=>'form-control'),$tt,set_value(''));?>
  </div>
</div>

<div class="form-group">
  <?php echo form_label('','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <div class="checkbox">
      <label><?=form_checkbox(array('name'=>''),'');?>สำเนาวุฒิการศึกษาหรือหนังสือรับรองการทำงาน</label>
    </div>
    <div class="checkbox">
      <label><?=form_checkbox(array('name'=>''),'');?>สำเนาบัตรประจำตัวประชาชนหรือสำเนาทะเบียนบ้าน</label>
    </div>
    <p class="help-block"></p>
    <?=form_input(array('name'=>'','class'=>'form-control','placeholder'=>'อื่นๆ'),set_value(''));?>
    <p class="help-block">*ข้าพเจ้าขอรับรองว่าข้อความข้างต้นเป็นความจริงทุกประการและได้แนบหลักฐานการสมัครมาด้วย</p>
  </div>
</div>
