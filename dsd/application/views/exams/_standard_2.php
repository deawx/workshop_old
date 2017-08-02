<div class="form-group">
  <?php echo form_label('','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?=form_input(array('name'=>'','class'=>'form-control')); ?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('คำนำหน้าชื่อ','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_dropdown(array('name'=>'','class'=>'form-control'),array(''=>'เลือกรายการ'));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('ชื่อ','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'','class'=>'form-control'));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('นามสกุล','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'','class'=>'form-control'));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('ชื่อเต็ม','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'','class'=>'form-control','disabled'=>TRUE));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('ศาสนา','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'','class'=>'form-control'));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('สัญชาติ','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'','class'=>'form-control'));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('หมายเลขบัตรประชาชน','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'','class'=>'form-control'));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('ว/ด/ป เกิด','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-2">
    <?php $d = array(''=>'วัน');
    foreach (range('1','31') as $key => $value) $d[++$key] = $value;
    echo form_dropdown(array('name'=>'','class'=>'form-control'),$d);?>
  </div>
  <div class="col-md-3">
    <?php $m = array(''=>'เดือน');
    foreach (range('1','12') as $key => $value) $m[++$key] = $value;
    echo form_dropdown(array('name'=>'','class'=>'form-control'),$m);?>
  </div>
  <div class="col-md-3">
    <?php $y = array(''=>'ปี พ.ศ.');
    foreach (range('2520',(date('Y')+543)) as $key => $value) $y[++$key] = $value;
    echo form_dropdown(array('name'=>'','class'=>'form-control'),$y);?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('อายุ','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'','class'=>'form-control','disabled'=>TRUE));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('ที่อยู่เลขที่','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'','class'=>'form-control'));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('ถนน','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'','class'=>'form-control'));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('ตำบล','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'','class'=>'form-control'));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('อำเภอ','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'','class'=>'form-control'));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('จังหวัด','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'','class'=>'form-control'));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('รหัสไปรษณีย์','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'','class'=>'form-control'));?>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
});
</script>
