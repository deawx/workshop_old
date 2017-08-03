<div class="form-group">
  <?php echo form_label('ประเภทผู้สมัคร','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php $c = array(''=>'เลือกรายการ','บุคคลทั่วไป'=>'บุคคลทั่วไป');
    echo form_dropdown(array('name'=>'category','class'=>'form-control'),$c);?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('สภาพร่างกาย','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php $h = array(''=>'เลือกรายการ');
    echo form_dropdown(array('name'=>'health','class'=>'form-control'),$h);?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('ประวัติการเข้าทดสอบ','used',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php $tf = array(''=>'เลือกรายการ','เคย'=>'เคย','ไม่เคย'=>'ไม่เคย');
    echo form_dropdown(array('name'=>'used','class'=>'form-control','id'=>'tf'),$tf,set_value('used'));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('สถานที่เข้ารับการทดสอบ','used_to',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php $t = array(''=>'เลือกรายการ','จากกรมพัฒนาฝีมือแรงงาน'=>'จากกรมพัฒนาฝีมือแรงงาน');
    echo form_dropdown(array('name'=>'used_to','class'=>'form-control','id'=>'tf_t'),$t,set_value('used_to'));?>
    <p class="help-block">*ให้เลือกกรณีเคยมีประวัติการเข้าทดสอบ</p>
  </div>
</div>
<hr>
<div class="form-group">
  <?php echo form_label('ยอมรับการเปิดเผยข้อมูล','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <div class="checkbox">
      <label><?=form_checkbox(array('name'=>''),'');?></label>
    </div>
    <p class="help-block">*ข้าพเจ้ายินยอมเปิดเผยข้อมูลส่วนบุคคลให้กับหน่วยงานของรัฐและเอกชนทราบเพื่อประโยชน์ในการจัดหางานและบริหารแรงงานต่อไป</p>
  </div>
</div>

<script type="text/javascript">
$(function(){
  var tf = $('#tf');
  var tf_t = $('#tf_t');
  tf_t.prop('disabled',true);
  tf.on('change',function(){
    if (this.value === 'เคย') {
      tf_t.prop('disabled',false);
    } else {
      tf_t.prop('disabled',true);
    }
  });
});
</script>