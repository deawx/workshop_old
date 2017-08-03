<div class="form-group">
  <?php echo form_label('คำนำหน้าชื่อ','title',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php $tt = array(''=>'เลือกรายการ','นาย'=>'นาย','นาง'=>'นาง','นางสาว'=>'นางสาว');
    echo form_dropdown(array('name'=>'title','class'=>'form-control'),$tt,set_value('title'));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('ชื่อ','firstname',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'firstname','class'=>'form-control'),set_value('firstname'));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('นามสกุล','lastname',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'lastname','class'=>'form-control'),set_value('lastname'));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('ชื่อเต็ม(ภาษาอังกฤษ)','fullname',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'fullname','class'=>'form-control'),set_value('fullname'));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('ศาสนา','religion',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'religion','class'=>'form-control'),set_value('religion'));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('สัญชาติ','nationality',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'nationality','class'=>'form-control'),set_value('nationality'));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('หมายเลขบัตรประชาชน','id_card',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'id_card','class'=>'form-control'),set_value('id_card'));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('ว/ด/ป เกิด','birthdate',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-2">
    <?php $d = array(''=>'วัน');
    foreach (range('1','31') as $key => $value) $d[++$key] = $value;
    echo form_dropdown(array('name'=>'d','class'=>'form-control'),$d,set_value('d'));?>
  </div>
  <div class="col-md-3">
    <?php $m = array(''=>'เดือน');
    foreach (range('1','12') as $key => $value) $m[++$key] = $value;
    echo form_dropdown(array('name'=>'m','class'=>'form-control'),$m,set_value('m'));?>
  </div>
  <div class="col-md-3">
    <?php $y = array(''=>'ปี พ.ศ.');
    foreach (range('2520',(date('Y')+543)) as $key => $value) $y[++$key] = $value;
    echo form_dropdown(array('name'=>'y','class'=>'form-control'),$y,set_value('y'));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('อายุ','age',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'age','class'=>'form-control','disabled'=>TRUE));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('ที่อยู่เลขที่','address',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'address','class'=>'form-control'),set_value('address'));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('ถนน','street',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'street','class'=>'form-control'),set_value('street'));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('ตำบล','district',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'district','class'=>'form-control'),set_value('district'));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('อำเภอ','city',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'city','class'=>'form-control'),set_value('city'));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('จังหวัด','province',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'province','class'=>'form-control'),set_value('province'));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('รหัสไปรษณีย์','zip',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'zip','class'=>'form-control'),set_value('zip'));?>
  </div>
</div>
