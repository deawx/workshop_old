<div class="form-group">
  <?php echo form_label('เอกสารที่แนบมาด้วย','',array('class'=>'control-label col-md-4'));?>
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
<div class="form-group">
  <?php echo form_label('ยอมรับการเปิดเผยข้อมูล','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <div class="checkbox">
      <label><?=form_checkbox(array('name'=>''),'');?></label>
    </div>
    <p class="help-block">*ข้าพเจ้ายินยอมเปิดเผยข้อมูลส่วนบุคคลให้กับหน่วยงานของรัฐและเอกชนทราบเพื่อประโยชน์ในการจัดหางานและบริหารแรงงานต่อไป</p>
  </div>
</div>
