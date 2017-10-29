<?php
$address = unserialize($patient['address']);
$address_current = unserialize($patient['address_current']);
$activity = unserialize($patient['activity']);
$filtered = unserialize($patient['filtered']);
$insurance = unserialize($patient['insurance']);
$fap_extracolonic_detail = unserialize($clinic['fap_extracolonic_detail']);
?>
<div class="row">

  <div class="col-md-12">
    <?=form_open('#',array('class'=>'form-horizontal'));?>
    <div class="box">
      <div class="box-header"> <h3 class="box-title">รายละเอียดทั้งหมด </h3> </div>
      <div class="box-body" style="padding:1em;">
        <div class="row">
          <div class="col-md-3">
            <ul class="nav nav-pills nav-stacked">
              <li class="active"><a href="#t1" data-toggle="tab">ข้อมูลผู้ป่วย</a></li>
              <li><a href="#t4" data-toggle="tab">ข้อมูลการส่งตรวจตัวอย่าง</a></li>
              <li><a href="#t5" data-toggle="tab">ข้อมูลทางห้องปฏิบัติการ</a></li>
              <li><a href="#t6" data-toggle="tab">ข้อมูลทางคลีนิค</a></li>
            </ul>
          </div>
          <div class="col-md-9">
            <div class="tab-content well well-sm">

              <div id="t1" class="tab-pane fade in active">

                <?=form_fieldset('ข้อมูลทั่วไป');?>
                <div class="form-group">
                  <?=form_label('หมายเลขบัตรประชาชน:','id_card',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-10">
                    <div class="input-group">
                      <?=form_input(array('name'=>'id_card','class'=>'form-control','disabled'=>TRUE,'disabled'=>TRUE,'disabled'=>TRUE),set_value('id_card',$patient['id_card']));?>
                      <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <?=form_label('ชื่อ-นามสกุล:','',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-2"> <?=form_input(array('name'=>'title','class'=>'form-control','disabled'=>TRUE,'disabled'=>TRUE),set_value('title',$patient['title']));?> </div>
                  <div class="col-md-3"> <?=form_input(array('name'=>'firstname','class'=>'form-control','disabled'=>TRUE,'disabled'=>TRUE,'placeholder'=>'ชื่อ'),set_value('firstname',$patient['firstname']));?> </div>
                  <div class="col-md-5"> <?=form_input(array('name'=>'lastname','class'=>'form-control','disabled'=>TRUE,'disabled'=>TRUE,'placeholder'=>'นามสกุล'),set_value('lastname',$patient['lastname']));?> </div>
                </div>
                <div class="form-group">
                  <?=form_label('อายุ:','age',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-4"> <?=form_input(array('name'=>'age','class'=>'form-control','disabled'=>TRUE,'disabled'=>TRUE,'placeholder'=>'อายุ'),set_value('age',$patient['age']));?> </div>
                  <?=form_label('H.N.:','hn',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-4"> <?=form_input(array('name'=>'hn','class'=>'form-control','disabled'=>TRUE,'disabled'=>TRUE,'placeholder'=>'H.N.'),set_value('H.N.',$patient['hn']));?> </div>
                </div>
                <div class="form-group">
                  <?=form_label('ข้อมูลประวัติและครอบครัว:','history',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-10"> <?=form_textarea(array('name'=>'history','class'=>'form-control','disabled'=>TRUE,'disabled'=>TRUE,'placeholder'=>'ประวัติส่วนตัว'),set_value('history',$patient['history']));?> </div>
                </div>
                <div class="form-group">
                  <?=form_label('ที่อยู่ตามบัตรประชาชน:','',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-2"> <?=form_input(array('name'=>'address[number]','class'=>'form-control','disabled'=>TRUE,'disabled'=>TRUE,'placeholder'=>'ที่อยู่'),set_value('address[number]',$address['number']));?> </div>
                  <div class="col-md-2"> <?=form_input(array('name'=>'address[soi]','class'=>'form-control','disabled'=>TRUE,'disabled'=>TRUE,'placeholder'=>'ซอย'),set_value('address[soi]',$address['soi']));?> </div>
                  <div class="col-md-4"> <?=form_input(array('name'=>'address[street]','class'=>'form-control','disabled'=>TRUE,'disabled'=>TRUE,'placeholder'=>'ถนน'),set_value('address[street]',$address['street']));?> </div>
                  <div class="col-md-2"> <?=form_input(array('name'=>'address[moo]','class'=>'form-control','disabled'=>TRUE,'disabled'=>TRUE,'placeholder'=>'หมู่'),set_value('address[moo]',$address['moo']));?> </div>
                </div>
                <div class="form-group">
                  <?=form_label('ตำบล:','',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-4"> <?=form_input(array('name'=>'address[tambon]','class'=>'form-control','disabled'=>TRUE,'disabled'=>TRUE,'id'=>'tambon','placeholder'=>'ตำบล'),set_value('address[tambon]',$address['tambon']));?> </div>
                  <?=form_label('อำเภอ:','amphur',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-4"> <?=form_input(array('name'=>'address[amphur]','class'=>'form-control','disabled'=>TRUE,'disabled'=>TRUE,'id'=>'amphur','placeholder'=>'อำเภอ'),set_value('address[amphur]',$address['amphur']));?> </div>
                </div>
                <div class="form-group">
                  <?=form_label('จังหวัด:','',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-4"> <?=form_input(array('name'=>'address[province]','class'=>'form-control','disabled'=>TRUE,'disabled'=>TRUE,'id'=>'province','placeholder'=>'จังหวัด'),set_value('address[province]',$address['province']));?> </div>
                  <?=form_label('รหัสไปรษณีย์:','',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-4"> <?=form_input(array('name'=>'address[zip]','class'=>'form-control','disabled'=>TRUE,'disabled'=>TRUE,'id'=>'zip','placeholder'=>'รหัสไปรษณีย์'),set_value('address[zip]',$address['zip']));?> </div>
                </div>
                <div class="well well-sm">
                  <div class="form-group">
                    <?=form_label('ที่อยู่ปัจจุบัน:','',array('class'=>'control-label col-md-2'));?>
                    <div class="col-md-2"> <?=form_input(array('name'=>'address_current[number]','class'=>'form-control','disabled'=>TRUE,'disabled'=>TRUE,'placeholder'=>'number'),set_value('address_current[number]',$address_current['number']));?> </div>
                    <div class="col-md-2"> <?=form_input(array('name'=>'address_current[soi]','class'=>'form-control','disabled'=>TRUE,'disabled'=>TRUE,'placeholder'=>'soi'),set_value('address_current[soi]',$address_current['soi']));?> </div>
                    <div class="col-md-4"> <?=form_input(array('name'=>'address_current[street]','class'=>'form-control','disabled'=>TRUE,'disabled'=>TRUE,'placeholder'=>'street'),set_value('address_current[street]',$address_current['street']));?> </div>
                    <div class="col-md-2"> <?=form_input(array('name'=>'address_current[moo]','class'=>'form-control','disabled'=>TRUE,'disabled'=>TRUE,'placeholder'=>'moo'),set_value('address_current[moo]',$address_current['moo']));?> </div>
                  </div>
                  <div class="form-group">
                    <?=form_label('ตำบล:','',array('class'=>'control-label col-md-2'));?>
                    <div class="col-md-4"> <?=form_input(array('name'=>'address_current[tambon]','class'=>'form-control','disabled'=>TRUE,'disabled'=>TRUE,'id'=>'','placeholder'=>'tambon'),set_value('address_current[tambon]',$address_current['tambon']));?> </div>
                    <?=form_label('อำเภอ:','',array('class'=>'control-label col-md-2'));?>
                    <div class="col-md-4"> <?=form_input(array('name'=>'address_current[amphur]','class'=>'form-control','disabled'=>TRUE,'disabled'=>TRUE,'id'=>'','placeholder'=>'amphur'),set_value('address_current[amphur]',$address_current['amphur']));?> </div>
                  </div>
                  <div class="form-group">
                    <?=form_label('จังหวัด:','',array('class'=>'control-label col-md-2'));?>
                    <div class="col-md-4"> <?=form_input(array('name'=>'address_current[province]','class'=>'form-control','disabled'=>TRUE,'disabled'=>TRUE,'id'=>'','placeholder'=>'province'),set_value('address_current[province]',$address_current['province']));?> </div>
                    <?=form_label('รหัสไปรษณีย์:','',array('class'=>'control-label col-md-2'));?>
                    <div class="col-md-4"> <?=form_input(array('name'=>'address_current[zip]','class'=>'form-control','disabled'=>TRUE,'disabled'=>TRUE,'id'=>'','placeholder'=>'zip'),set_value('address_current[zip]',$address_current['zip']));?> </div>
                  </div>
                </div>
                <div class="form-group">
                  <?=form_label('โทรศัพท์:','phone',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-4"> <?=form_input(array('name'=>'phone','class'=>'form-control','disabled'=>TRUE,'disabled'=>TRUE,'placeholder'=>'เบอร์โทรศัพท์'),set_value('phone',$patient['phone']));?> </div>
                  <?=form_label('มือถือ:','mobile',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-4"> <?=form_input(array('name'=>'mobile','class'=>'form-control','disabled'=>TRUE,'disabled'=>TRUE,'placeholder'=>'โทรศัพท์มือถือ','max_length'=>'10'),set_value('mobile',$patient['mobile']));?> </div>
                </div>
                <div class="form-group">
                  <?php echo form_label('ความสัมพันธ์:','',array('class'=>'control-label col-md-2')); ?>
                  <div class="col-md-4">
                    <?php $rs = array(''=>'เลือกรายการ','ผู้ป่วย'=>'ผู้ป่วย','ปู่/ย่าของผู้ป่วย'=>'ปู่/ย่าของผู้ป่วย',
                    'พ่อ/แม่ของผู้ป่วย'=>'พ่อ/แม่ของผู้ป่วย','คู่สมรสของผู้ป่วย'=>'คู่สมรสของผู้ป่วย','บุตร/ธิดาของผู้ป่วย'=>'บุตร/ธิดาของผู้ป่วย');
                    echo form_dropdown(array('name'=>'relationship','class'=>'form-control','id'=>'relationship','disabled'=>TRUE),$rs,set_value('relationship',$patient['relationship'])); ?>
                  </div>
                  <?php echo form_label('หมายเลขผู้ป่วย:','',array('class'=>'control-label col-md-2')); ?>
                  <div class="col-md-4">
                    <?php echo form_input(array('name'=>'relationship_by','class'=>'form-control','id'=>'relationship_by','disabled'=>TRUE),set_value('relationship_by',$patient['relationship_by'])); ?>
                  </div>
                </div>
                <div class="form-group">
                  <?=form_label('กลุ่มผู้ป่วย:','',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-10">
                    <?=form_input(array('name'=>'groups','class'=>'form-control','disabled'=>TRUE,'disabled'=>TRUE),set_value('groups',$patient['groups']));?>
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group">
                  <?=form_label('ประเภทผู้ป่วย:','',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-10">
                    <div class="row">
                      <div class="col-md-6"> <?=form_input(array('name'=>'types','class'=>'form-control','disabled'=>TRUE,'disabled'=>TRUE,'id'=>'types'),set_value('types',$patient['types']));?> </div>
                      <div class="col-md-6">
                        <div class="input-group">
                          <?=form_input(array('name'=>'times','class'=>'form-control','disabled'=>TRUE,'disabled'=>TRUE,'id'=>'times','placeholder'=>'ครั้งที่'),set_value('times',$patient['times']));?>
                          <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?=form_fieldset_close();?>

                <?=form_fieldset('ข้อมูลการคัดกรอง');?>
                <div class="form-group">
                  <?=form_label('คะแนนรวมความเสี่ยง','activity',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-10">
                    <?=form_input(array('class'=>'form-control','disabled'=>TRUE),set_value('',($activity)?array_sum($activity):0));?>
                    <!-- <div class="checkbox">
                      <?=form_checkbox(array('name'=>'activity[1]','class'=>'form-control','disabled'=>TRUE,'disabled'=>TRUE,'disabled'=>TRUE),'1',set_checkbox('activity[1]','1',(array_key_exists('1',$activity))));?>
                      รับประทานอาหารมันๆ เป็นประจำ <small class="pull-right">[1]</small> <p class="help-block"></p>
                    </div>
                    <div class="checkbox">
                      <?=form_checkbox(array('name'=>'activity[2]','class'=>'form-control','disabled'=>TRUE,'disabled'=>TRUE,'disabled'=>TRUE),'1',set_checkbox('activity[2]','1',(array_key_exists('2',$activity))));?>
                      รับประทานเน้ือสัตว์ระเภททอดปิ้งย่างไส้กรอกกุนเชียงบ่อยๆ <small class="pull-right">[1]</small> <p class="help-block"></p>
                    </div>
                    <div class="checkbox">
                      <?=form_checkbox(array('name'=>'activity[3]','class'=>'form-control','disabled'=>TRUE,'disabled'=>TRUE,'disabled'=>TRUE),'1',set_checkbox('activity[3]','1',(array_key_exists('3',$activity))));?>
                      อ้วน <small class="pull-right">[1]</small> <p class="help-block"></p>
                    </div>
                    <div class="checkbox">
                      <?=form_checkbox(array('name'=>'activity[4]','class'=>'form-control','disabled'=>TRUE,'disabled'=>TRUE,'disabled'=>TRUE),'1',set_checkbox('activity[4]','1',(array_key_exists('4',$activity))));?>
                      เป็นโรคเบาหวาน <small class="pull-right">[1]</small> <p class="help-block"></p>
                    </div>
                    <div class="checkbox">
                      <?=form_checkbox(array('name'=>'activity[5]','class'=>'form-control','disabled'=>TRUE,'disabled'=>TRUE,'disabled'=>TRUE),'3',set_checkbox('activity[5]','3',(array_key_exists('5',$activity))));?>
                      ท้องผูกสลับท้องเสีย <small class="pull-right">[3]</small> <p class="help-block"></p>
                    </div>
                    <div class="checkbox">
                      <?=form_checkbox(array('name'=>'activity[6]','class'=>'form-control','disabled'=>TRUE,'disabled'=>TRUE,'disabled'=>TRUE),'3',set_checkbox('activity[6]','3',(array_key_exists('6',$activity))));?>
                      ถ่ายอุจจาระไม่สุด(รู้สึกว่าถ่ายไม่หมด) <small class="pull-right">[3]</small> <p class="help-block"></p>
                    </div>
                    <div class="checkbox">
                      <?=form_checkbox(array('name'=>'activity[7]','class'=>'form-control','disabled'=>TRUE,'disabled'=>TRUE,'disabled'=>TRUE),'3',set_checkbox('activity[7]','3',(array_key_exists('7',$activity))));?>
                      เคยอุจจาระมีเลือดปน <small class="pull-right">[3]</small> <p class="help-block"></p>
                    </div>
                    <div class="checkbox">
                      <?=form_checkbox(array('name'=>'activity[8]','class'=>'form-control','disabled'=>TRUE,'disabled'=>TRUE,'disabled'=>TRUE),'9',set_checkbox('activity[8]','9',(array_key_exists('8',$activity))));?>
                      ลักษณะอุจจาระลีบ เล็ก แบน <small class="pull-right">[9]</small> <p class="help-block"></p>
                    </div>
                    <div class="checkbox">
                      <?=form_checkbox(array('name'=>'activity[9]','class'=>'form-control','disabled'=>TRUE,'disabled'=>TRUE,'disabled'=>TRUE),'10',set_checkbox('activity[9]','10',(array_key_exists('9',$activity))));?>
                      เคยตรวจพบติ่งเนื้อในลำไส้ <small class="pull-right">[10]</small> <p class="help-block"></p>
                    </div>
                    <div class="checkbox">
                      <?=form_checkbox(array('name'=>'activity[10]','class'=>'form-control','disabled'=>TRUE,'disabled'=>TRUE,'disabled'=>TRUE),'12',set_checkbox('activity[10]','12',(array_key_exists('10',$activity))));?>
                      มีญาติที่ใกล้ชิดกันโดยสายเลือดเช่น พ่อ แม่ พี่ น้อง เป็นโรคมะเร็งลำไส้ใหญ่เมื่ออายุมากกว่า 50 ปี <small class="pull-right">[12]</small> <p class="help-block"></p>
                    </div>
                    <div class="checkbox">
                      <?=form_checkbox(array('name'=>'activity[11]','class'=>'form-control','disabled'=>TRUE,'disabled'=>TRUE,'disabled'=>TRUE),'11',set_checkbox('activity[11]','11',(array_key_exists('11',$activity))));?>
                      มีญาติที่ใกล้ชิดกันโดยสายเลือดเช่น พ่อ แม่ พี่ น้อง เป็นโรคมะเร็งลำไส้ใหญ่เมื่ออายุน้อยกว่า 50 ปี <small class="pull-right">[11]</small> <p class="help-block"></p>
                    </div> -->
                  </div>
                </div>
                <div class="form-group">
                  <?=form_label('วิธีการให้ความรู้:','',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-10"> <?=form_input(array('name'=>'filtered[educate]','class'=>'form-control','disabled'=>TRUE,'disabled'=>TRUE),set_value('filtered[educate]',$filtered['educate']));?> </div>
                </div>
                <div class="form-group">
                  <?=form_label('การประเมินผล:','',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-10"> <?=form_input(array('name'=>'filtered[assessment]','class'=>'form-control','disabled'=>TRUE,'disabled'=>TRUE),set_value('filtered[assessment]',$filtered['assessment']));?> </div>
                </div>
                <div class="form-group">
                  <?=form_label('ผลการส่องกล้อง:','',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-10"> <?=form_input(array('name'=>'filtered[endoscope]','class'=>'form-control','disabled'=>TRUE,'disabled'=>TRUE),set_value('filtered[endoscope]',$filtered['endoscope']));?> </div>
                </div>
                <div class="form-group">
                  <?=form_label('แนวทางการป้องกัน:','',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-10"> <?=form_input(array('name'=>'protect','class'=>'form-control','disabled'=>TRUE,'disabled'=>TRUE,'id'=>'pt'),set_value('protect',$patient['protect']));?> </div>
                </div>
                <div class="form-group">
                  <?=form_label('แนวทางการรักษา:','',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-10"> <?=form_input(array('name'=>'treatment_planning','class'=>'form-control','disabled'=>TRUE,'disabled'=>TRUE,'id'=>'tp'),set_value('treatment_planning',$patient['treatment_planning']));?> </div>
                </div>
                <?=form_fieldset_close();?>

                <?=form_fieldset('สิทธิ์ประกันสังคมและค่ารักษาพยาบาล');?>
                <div class="form-group">
                  <?=form_label('สิทธิ์ประกัน:','',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-10">
                    <?=form_input(array('name'=>'insurance[life]','class'=>'form-control','disabled'=>TRUE,'id'=>'lf'),set_value('insurance[life]',$insurance['life']));?>
                  </div>
                </div>
                <div class="form-group">
                  <?=form_label('ค่ารักษาพยาบาลทั้งหมด:','',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-4">
                    <div class="input-group">
                      <?=form_input(array('name'=>'insurance[cost]','class'=>'form-control','disabled'=>TRUE),set_value('insurance[cost]',$insurance['cost']));?>
                      <span class="input-group-addon">฿</span>
                    </div>
                  </div>
                  <p class="help-block col-md-6">* กรอกตัวเลขเท่านั้น</p>
                </div>
                <div class="form-group">
                  <?=form_label('รายการที่ 1:','',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-4">
                    <div class="input-group">
                      <?=form_input(array('name'=>'insurance[service1]','class'=>'form-control','disabled'=>TRUE),set_value('insurance[service1]',$insurance['service1']));?>
                      <span class="input-group-addon">฿</span>
                    </div>
                  </div>
                  <p class="help-block col-md-6">* กรอกตัวเลขเท่านั้น</p>
                </div>
                <div class="form-group">
                  <?=form_label('รายการที่ 2:','',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-4">
                    <div class="input-group">
                      <?=form_input(array('name'=>'insurance[service2]','class'=>'form-control','disabled'=>TRUE),set_value('insurance[service2]',$insurance['service2']));?>
                      <span class="input-group-addon">฿</span>
                    </div>
                  </div>
                  <p class="help-block col-md-6">* กรอกตัวเลขเท่านั้น</p>
                </div>
                <div class="form-group">
                  <?=form_label('ค่าเดินทาง:','',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-4">
                    <div class="input-group">
                      <?=form_input(array('name'=>'insurance[fare]','class'=>'form-control','disabled'=>TRUE),set_value('insurance[fare]',$insurance['fare']));?>
                      <span class="input-group-addon">฿</span>
                    </div>
                  </div>
                  <p class="help-block col-md-6">* กรอกตัวเลขเท่านั้น</p>
                </div>
                <div class="form-group">
                  <?=form_label('อื่นๆ:','',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-4">
                    <div class="input-group">
                      <?=form_input(array('name'=>'insurance[etc]','class'=>'form-control','disabled'=>TRUE),set_value('insurance[etc]',$insurance['etc']));?>
                      <span class="input-group-addon">฿</span>
                    </div>
                  </div>
                  <p class="help-block col-md-6">* กรอกตัวเลขเท่านั้น</p>
                </div>
                <?=form_fieldset_close();?>
              </div>

              <div id="t4" class="tab-pane fade">
                <div class="form-group">
                  <?=form_label('เลือด:','blood',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-1"> <?=form_checkbox(array('name'=>'blood','class'=>'form-control','id'=>'checked_blood','disabled'=>TRUE),'1',set_checkbox('blood','1',($sample['blood'] == '1')));?> </div>
                  <div id="blood_div">
                    <div class="col-md-4">
                      <div class="input-group">
                        <?=form_number(array('name'=>'blood_ml','class'=>'form-control','placeholder'=>'ประมาณ(มิลลิลิตร)','disabled'=>TRUE),set_value('blood_ml',$sample['blood_ml']));?>
                        <span class="input-group-addon">ml</span>
                      </div>
                    </div>
                    <div class="col-md-5"> <?=form_input(array('name'=>'blood_code','class'=>'form-control','placeholder'=>'รหัสเลือด','disabled'=>TRUE),set_value('blood_code',$sample['blood_code']));?> </div>
                  </div>
                </div>
                <div class="form-group">
                  <?=form_label('รหัสเนื้อเยื่อ:','fresh_tissue',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-1"> <?=form_checkbox(array('name'=>'fresh_tissue','class'=>'form-control','id'=>'checked_tissue','disabled'=>TRUE),'1',set_checkbox('fresh_tissue','1',($sample['fresh_tissue'] == '1')));?> </div>
                  <div id="tissue_div">
                    <div class="col-md-4"> <?=form_input(array('name'=>'fresh_tissue_group','class'=>'form-control','disabled'=>TRUE),set_value('',$sample['fresh_tissue_group']));?> </div>
                    <div class="col-md-5"> <?=form_input(array('name'=>'fresh_tissue_code','class'=>'form-control','placeholder'=>'รหัสเนื้อเยื่อ','disabled'=>TRUE),set_value('',$sample['fresh_tissue_code']));?> </div>
                  </div>
                </div>
                <div class="form-group">
                  <?=form_label('FFPE:','ffpe',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-1"> <?=form_checkbox(array('name'=>'ffpe','class'=>'form-control','id'=>'checked_ffpe','disabled'=>TRUE),'1',set_checkbox('ffpe','1',($sample['ffpe'] == '1')));?> </div>
                  <div id="ffpe_div">
                    <div class="col-md-4"> <?=form_input(array('name'=>'ffpe_code','class'=>'form-control','placeholder'=>'รหัส FFPE','disabled'=>TRUE),set_value('',$sample['ffpe_code']));?> </div>
                    <div class="col-md-5"> </div>
                  </div>
                </div>
                <div class="form-group">
                  <?=form_label('IHC:','ihc',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-10">
                    <div class="checkbox"> <?=form_checkbox(array('name'=>'ihc','class'=>'form-control','id'=>'ihc','disabled'=>TRUE),'1',set_checkbox('ihc','1',($sample['ihc'] == '1')));?> </div>
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group">
                  <?=form_label('FCC:','fcc',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-1"> <?=form_checkbox(array('name'=>'fcc','class'=>'form-control','id'=>'checked_fcc','disabled'=>TRUE),'1',set_checkbox('fcc','1',($sample['fcc'] === '1')));?> </div>
                  <div id="fcc_div">
                    <div class="col-md-4"> <?=form_input(array('name'=>'fcc_group','class'=>'form-control','disabled'=>TRUE),set_value('',$sample['fcc_group']));?> </div>
                  </div>
                </div>
                <div class="form-group">
                  <?=form_label('หมายเหตุ:','remark',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-10"> <?=form_textarea(array('name'=>'remark','class'=>'form-control','rows'=>'2','disabled'=>TRUE),set_value('',$sample['remark']));?> </div>
                </div>
              </div>

              <div id="t5" class="tab-pane fade">
                <?=form_fieldset('ENDOSCOPE');?>
                <div class="form-group">
                  <?=form_label('ผลตรวจการส่องกล้อง:','endoscope',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-5"> <?=form_input(array('name'=>'endoscope','class'=>'form-control','disabled'=>TRUE),set_value('',$labs['endoscope']));?> </div>
                </div>
                <?=form_fieldset_close();?>

                <?=form_fieldset('FAP');?>
                <div class="form-group">
                  <?=form_label('APC ยีนส์:','apc',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-10">
                    <div class="checkbox"> <?=form_checkbox(array('name'=>'apc','class'=>'form-control','id'=>'checkbox_apc','disabled'=>TRUE),'1',set_checkbox('apc','1',($labs['apc'] == '1')));?> </div>
                  </div>
                </div>
                <div class="form-group">
                  <?=form_label('exon:','apc_exon',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-4"> <?=form_input(array('name'=>'apc_intron','class'=>'form-control','disabled'=>TRUE),set_value('',$labs['apc_intron']));?> </div>
                  <?=form_label('intron:','apc_intron',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-4"> <?=form_input(array('name'=>'apc_exon','class'=>'form-control','disabled'=>TRUE),set_value('',$labs['apc_exon']));?> </div>
                </div>
                <div class="form-group">
                  <?=form_label('position codon:','apc_codon',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-4"> <?=form_input(array('name'=>'apc_codon','class'=>'form-control','placeholder'=>'position codon','disabled'=>TRUE),set_value('',$labs['apc_codon']));?> </div>
                  <?=form_label('position amino acid:','apc_amino_acid',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-4"> <?=form_input(array('name'=>'apc_amino_acid','class'=>'form-control','placeholder'=>'position amino acid','disabled'=>TRUE),set_value('',$labs['apc_amino_acid']));?> </div>
                </div>
                <div class="form-group">
                  <?=form_label('type of mutation:','apc_type_mutation',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-4"> <?=form_input(array('name'=>'apc_type_mutation','class'=>'form-control','disabled'=>TRUE),set_value('',$labs['apc_type_mutation']));?> </div>
                  <?=form_label('effect of mutation:','apc_effect_mutation',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-4"> <?=form_input(array('name'=>'apc_effect_mutation','class'=>'form-control','disabled'=>TRUE),set_value('',$labs['apc_effect_mutation']));?> </div>
                </div>
                <div class="form-group">
                  <?=form_label('MUTYH GENE:','mutyh',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-10">
                    <div class="checkbox"> <?=form_checkbox(array('name'=>'mutyh','class'=>'form-control','id'=>'checkbox_mutyh','disabled'=>TRUE),'1',set_checkbox('mutyh','1',($labs['mutyh'] == '1')));?> </div>
                  </div>
                </div>
                <div class="form-group">
                  <?=form_label('exon:','mutyh_exon',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-4"> <?=form_input(array('name'=>'mutyh_exon','class'=>'form-control','disabled'=>TRUE),set_value('',$labs['mutyh_exon']));?> </div>
                  <?=form_label('intron:','mutyh_intron',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-4"> <?=form_input(array('name'=>'mutyh_intron','class'=>'form-control','disabled'=>TRUE),set_value('',$labs['mutyh_intron']));?> </div>
                </div>
                <div class="form-group">
                  <?=form_label('position codon:','mutyh_codon',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-4"> <?=form_input(array('name'=>'mutyh_codon','class'=>'form-control','placeholder'=>'position codon','disabled'=>TRUE),set_value('',$labs['mutyh_codon']));?> </div>
                  <?=form_label('position amino acid:','mutyh_amino_acid',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-4"> <?=form_input(array('name'=>'mutyh_amino_acid','class'=>'form-control','placeholder'=>'position amino acid','disabled'=>TRUE),set_value('',$labs['mutyh_amino_acid']));?> </div>
                </div>
                <div class="form-group">
                  <?=form_label('type of mutation:','mutyh_type_mutation',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-4"> <?=form_input(array('name'=>'mutyh_type_mutation','class'=>'form-control','disabled'=>TRUE),set_value('',$labs['mutyh_type_mutation']));?> </div>
                  <?=form_label('effect of mutation:','mutyh_effect_mutation',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-4"> <?=form_input(array('name'=>'mutyh_effect_mutation','class'=>'form-control','disabled'=>TRUE),set_value('',$labs['mutyh_effect_mutation']));?> </div>
                </div>
                <div class="form-group">
                  <?=form_label('NEGATIVE:','negative',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-10">
                    <div class="checkbox"> <?=form_checkbox(array('name'=>'negative','class'=>'form-control','id'=>'negative','disabled'=>TRUE),'1',set_checkbox('negative','1',($labs['negative'] == '1')));?> </div>
                  </div>
                </div>
                <?=form_fieldset_close();?>

                <?=form_fieldset('HNPCC');?>
                <div class="form-group">
                  <?=form_label('H:','msi_h',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-4"> <?=form_input(array('name'=>'msi_h','class'=>'form-control msi','id'=>'msi_h','disabled'=>TRUE),set_value('',$labs['msi_h'],FALSE));?> </div>
                  <?=form_label('MLH1 methylation:','',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-4">
                    <div class="radio-inline"> <?=form_radio(array('name'=>'msi_h_methylation','class'=>'msi_h_methylation','disabled'=>TRUE),'positive',set_radio('msi_h_methylation','positive',($labs['msi_h_methylation'] === 'positive')));?>positive </div>
                    <div class="radio-inline"> <?=form_radio(array('name'=>'msi_h_methylation','class'=>'msi_h_methylation','disabled'=>TRUE),'negative',set_radio('msi_h_methylation','negative',($labs['msi_h_methylation'] === 'negative')));?>negative </div>
                  </div>
                </div>
                <div class="form-group">
                  <?=form_label('L:','msi_l',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-4"> <?=form_input(array('name'=>'msi_l','class'=>'form-control msi','id'=>'msi_l','disabled'=>TRUE),set_value('',$labs['msi_l'],FALSE));?> </div>
                  <?=form_label('MLH1 methylation:','',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-4">
                    <div class="radio-inline"> <?=form_radio(array('name'=>'msi_l_methylation','class'=>'msi_l_methylation','disabled'=>TRUE),'positive',set_radio('msi_l_methylation','positive',($labs['msi_l_methylation'] === 'positive')));?>positive </div>
                    <div class="radio-inline"> <?=form_radio(array('name'=>'msi_l_methylation','class'=>'msi_l_methylation','disabled'=>TRUE),'negative',set_radio('msi_l_methylation','negative',($labs['msi_l_methylation'] === 'negative')));?>negative </div>
                  </div>
                </div>
                <div class="form-group">
                  <?=form_label('S:','msi_s',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-4"> <?=form_input(array('name'=>'msi_s','class'=>'form-control msi','id'=>'msi_s','disabled'=>TRUE),set_value('',$labs['msi_s'],FALSE));?> </div>
                  <?=form_label('MLH1 methylation:','',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-4">
                    <div class="radio-inline"> <?=form_radio(array('name'=>'msi_s_methylation','class'=>'msi_s_methylation','disabled'=>TRUE),'positive',set_radio('msi_s_methylation','positive',($labs['msi_s_methylation'] === 'positive')));?>positive </div>
                    <div class="radio-inline">
                      <?=form_radio(array('name'=>'msi_s_methylation','class'=>'msi_s_methylation','disabled'=>TRUE),'negative',set_radio('msi_s_methylation','negative',($labs['msi_s_methylation'] === 'negative')));?>negative
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <?=form_label('ihc:','ihc[]',array('class'=>'control-label col-md-2'));?>
                  <?php $ihc = array('MLH1'=>'MLH1','PMS2'=>'PMS2','MSH2'=>'MSH2','MSH6'=>'MSH6');?>
                  <div class="col-md-10"> <?=form_dropdown(array('name'=>'ihc[]','class'=>'form-control','multiple'=>TRUE,'disabled'=>TRUE),$ihc,set_value('',unserialize($labs['ihc']),FALSE));?> </div>
                </div>
                <div class="form-group">
                  <?=form_label('gene:','gene',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-4"> <?=form_input(array('name'=>'gene','class'=>'form-control','id'=>'gene','disabled'=>TRUE),set_value('',$labs['gene']));?> </div>
                </div>
                <div id="gene_ctn">
                  <div class="form-group">
                    <?=form_label('germline (mmr gene):','germline',array('class'=>'control-label col-md-2'));?>
                    <div class="col-md-4"> <?=form_input(array('name'=>'germline','class'=>'form-control','id'=>'germline','disabled'=>TRUE),set_value('',$labs['germline'],FALSE));?> </div>
                  </div>
                  <div class="well well-sm">
                    <div id="germline_ctn">
                      <div class="form-group">
                        <?=form_label('exon:','germline_exon',array('class'=>'control-label col-md-2'));?>
                        <div class="col-md-4"> <?=form_input(array('name'=>'germline_exon','class'=>'form-control','disabled'=>TRUE),set_value('',$labs['germline_exon']));?> <p class="help-block"></p> </div>
                        <?=form_label('intron:','germline_intron',array('class'=>'control-label col-md-2'));?>
                        <div class="col-md-4"> <?=form_input(array('name'=>'germline_intron','class'=>'form-control','disabled'=>TRUE),set_value('',$labs['germline_intron']));?> <p class="help-block"></p> </div>
                      </div>
                      <div class="form-group">
                        <?=form_label('position codon:','germline_codon',array('class'=>'control-label col-md-2'));?>
                        <div class="col-md-4"> <?=form_input(array('name'=>'germline_codon','class'=>'form-control','disabled'=>TRUE),set_value('',$labs['germline_codon'],FALSE));?> <p class="help-block"></p> </div>
                        <?=form_label('position amino acid:','germline_amino_acid',array('class'=>'control-label col-md-2'));?>
                        <div class="col-md-4"> <?=form_input(array('name'=>'germline_amino_acid','class'=>'form-control','disabled'=>TRUE),set_value('',$labs['germline_amino_acid'],FALSE));?> <p class="help-block"></p> </div>
                      </div>
                      <div class="form-group">
                        <?=form_label('type of mutation:','germline_type_mutation',array('class'=>'control-label col-md-2'));?>
                        <div class="col-md-4"> <?=form_input(array('name'=>'germline_type_mutation','class'=>'form-control','disabled'=>TRUE),set_value('',$labs['germline_type_mutation'],FALSE));?> </div>
                        <?=form_label('effect of mutation:','germline_effect_mutation',array('class'=>'control-label col-md-2'));?>
                        <div class="col-md-4"> <?=form_input(array('name'=>'germline_effect_mutation','class'=>'form-control','disabled'=>TRUE),set_value('',$labs['germline_effect_mutation'],FALSE));?> </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <?=form_label('somatic (tumor15):','somatic',array('class'=>'control-label col-md-2'));?>
                    <div class="col-md-4"> <?=form_input(array('name'=>'somatic','class'=>'form-control','id'=>'somatic','disabled'=>TRUE),set_value('',$labs['somatic'],FALSE));?> </div>
                  </div>
                  <div class="well well-sm">
                    <div id="somatic_ctn">
                      <div class="form-group">
                        <?=form_label('exon:','somatic_exon',array('class'=>'control-label col-md-2'));?>
                        <div class="col-md-4"> <?=form_input(array('name'=>'somatic_exon','class'=>'form-control','disabled'=>TRUE),set_value('',$labs['somatic_exon'],FALSE));?> <p class="help-block"></p> </div>
                        <?=form_label('intron:','somatic_intron',array('class'=>'control-label col-md-2'));?>
                        <div class="col-md-4"> <?=form_input(array('name'=>'somatic_intron','class'=>'form-control','disabled'=>TRUE),set_value('',$labs['somatic_intron'],FALSE));?> <p class="help-block"></p> </div>
                      </div>
                      <div class="form-group">
                        <?=form_label('position codon:','somatic_codon',array('class'=>'control-label col-md-2'));?>
                        <div class="col-md-4"> <?=form_input(array('name'=>'somatic_codon','class'=>'form-control','disabled'=>TRUE),set_value('',$labs['somatic_codon'],FALSE));?> <p class="help-block"></p> </div>
                        <?=form_label('position amino acid:','somatic_amino_acid',array('class'=>'control-label col-md-2'));?>
                        <div class="col-md-4"> <?=form_input(array('name'=>'somatic_amino_acid','class'=>'form-control','disabled'=>TRUE),set_value('',$labs['somatic_amino_acid'],FALSE));?> <p class="help-block"></p> </div>
                      </div>
                      <div class="form-group">
                        <?=form_label('type of mutation:','somatic_type_mutation',array('class'=>'control-label col-md-2'));?>
                        <div class="col-md-4"> <?=form_input(array('name'=>'somatic_type_mutation','class'=>'form-control','disabled'=>TRUE),set_value('',$labs['somatic_type_mutation'],FALSE));?> </div>
                        <?=form_label('effect of mutation:','somatic_effect_mutation',array('class'=>'control-label col-md-2'));?>
                        <div class="col-md-4"> <?=form_input(array('name'=>'somatic_effect_mutation','class'=>'form-control','disabled'=>TRUE),set_value('',$labs['somatic_effect_mutation'],FALSE));?> </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?=form_fieldset_close();?>

                <?=form_fieldset('PJS/JPS');?>
                <div class="form-group">
                  <?=form_label('exon:','stk11_exon',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-4"> <?=form_input(array('name'=>'stk11_exon','class'=>'form-control','disabled'=>TRUE),set_value('',$labs['stk11_exon']));?> </div>
                  <?=form_label('intron:','stk11_intron',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-4"> <?=form_input(array('name'=>'stk11_intron','class'=>'form-control','disabled'=>TRUE),set_value('',$labs['stk11_intron']));?> </div>
                </div>
                <div class="form-group">
                  <?=form_label('position codon:','stk11_codon',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-4"> <?=form_input(array('name'=>'stk11_codon','class'=>'form-control','disabled'=>TRUE),set_value('',$labs['stk11_codon'],FALSE));?> </div>
                  <?=form_label('position amino acid:','stk11_amino_acid',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-4"> <?=form_input(array('name'=>'stk11_amino_acid','class'=>'form-control','disabled'=>TRUE),set_value('',$labs['stk11_amino_acid'],FALSE));?> </div>
                </div>
                <div class="form-group">
                  <?=form_label('type of mutation:','stk11_type_mutation',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-4"> <?=form_input(array('name'=>'stk11_type_mutation','class'=>'form-control','disabled'=>TRUE),set_value('',$labs['stk11_type_mutation'],FALSE));?> </div>
                  <?=form_label('effect of mutation:','stk11_effect_mutation',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-4"> <?=form_input(array('name'=>'stk11_effect_mutation','class'=>'form-control','disabled'=>TRUE),set_value('',$labs['stk11_effect_mutation'],FALSE));?> </div>
                </div>
                <?=form_fieldset_close();?>

              </div>

              <div id="t6" class="tab-pane fade">

                <?=form_fieldset('FAP');?>
                <div class="form-group">
                  <?=form_label('polyposis:','fap_polyposis',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-10"> <?=form_input(array('name'=>'fap_polyposis','class'=>'form-control','disabled'=>TRUE),set_value('',$clinic['fap_polyposis'],FALSE));?> </div>
                </div>
                <div class="form-group">
                  <?=form_label('type of FAP:','fap_type',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-10"> <?=form_input(array('name'=>'','class'=>'form-control','disabled'=>TRUE),set_value('',$clinic['fap_type']));?> </div>
                </div>
                <div class="form-group">
                  <?=form_label('Malignant extracolonic manifestation:','',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-10"> <?=form_input(array('name'=>'','class'=>'form-control','disabled'=>TRUE),set_value('',$clinic['fap_malignant']));?> </div>
                </div>
                <div class="form-group">
                  <?=form_label('Extracolonic manifestation of FAP:','',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-10"> <?=form_input(array('name'=>'','class'=>'form-control','id'=>'case','disabled'=>TRUE),set_value('',$clinic['fap_extracolonic']));?> </div>
                </div>
                  <div id="polyp_ctn">
                    <div class="well well-sm">
                      <div class="form-group">
                        <?=form_label('Endoscopic treatment:','',array('class'=>'control-label col-md-2'));?>
                        <div class="col-md-10">
                          <?=form_input(array('name'=>'','class'=>'form-control datepicker','placeholder'=>'operative date','disabled'=>TRUE),set_value('fap_extracolonic_detail[endoscopic_datetime]',isset($fap_extracolonic_detail['endoscopic_datetime']) ? $fap_extracolonic_detail['endoscopic_datetime'] : ''));?>
                          <?=form_textarea(array('name'=>'','class'=>'form-control','placeholder'=>'details','disabled'=>TRUE),set_value('fap_extracolonic_detail[endoscopic_detail]',$fap_extracolonic_detail['endoscopic_detail']));?>
                        </div>
                      </div>
                      <div class="form-group">
                        <?=form_label('Surgical resection:','',array('class'=>'control-label col-md-2'));?>
                        <div class="col-md-10">
                          <?=form_input(array('name'=>'','class'=>'form-control datepicker','placeholder'=>'operative date','disabled'=>TRUE),set_value('fap_extracolonic_detail[sergical_datetime]',$fap_extracolonic_detail['sergical_datetime']));?>
                          <?=form_textarea(array('name'=>'','class'=>'form-control','placeholder'=>'details','disabled'=>TRUE),set_value('fap_extracolonic_detail[sergical_detail]',$fap_extracolonic_detail['sergical_detail']));?>
                        </div>
                      </div>
                      <div class="form-group">
                        <?=form_label('Pharmacologic therapy:','',array('class'=>'control-label col-md-2'));?>
                        <div class="col-md-10">
                          <?=form_input(array('name'=>'','class'=>'form-control datepicker','placeholder'=>'operative date','disabled'=>TRUE),set_value('fap_extracolonic_detail[pharmacologic_datetime]',$fap_extracolonic_detail['pharmacologic_datetime']));?>
                          <?=form_textarea(array('name'=>'','class'=>'form-control','placeholder'=>'details','disabled'=>TRUE),set_value('fap_extracolonic_detail[pharmacologic_detail]',$fap_extracolonic_detail['pharmacologic_detail']));?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div id="desmoid_ctn">
                    <div class="well well-sm">
                      <div class="form-group">
                        <?=form_label('location:','fap_extracolonic_detail[location]',array('class'=>'control-label col-md-2'));?>
                        <div class="col-md-10"> <?=form_input(array('name'=>'fap_extracolonic_detail[location]','class'=>'form-control','disabled'=>TRUE),set_value('[location]',isset($fap_extracolonic_detail['location']) ? $fap_extracolonic_detail['location'] : ''));?> </div>
                      </div>
                      <div class="form-group">
                        <?=form_label('management medical treatment:','',array('class'=>'control-label col-md-2'));?>
                        <div class="col-md-10">
                          <?=form_input(array('name'=>'','class'=>'form-control','disabled'=>TRUE),set_value('',isset($fap_extracolonic_detail['management']) ? $fap_extracolonic_detail['management'] : ''));?>
                        </div>
                      </div>
                      <div class="form-group">
                        <?=form_label('กesmoid tumor:','',array('class'=>'control-label col-md-2'));?>
                        <div class="col-md-10">
                          <p>wide excision</p>
                          <?=form_input(array('name'=>'','class'=>'form-control datepicker','placeholder'=>'operative date','disabled'=>TRUE),set_value('',isset($fap_extracolonic_detail['wide_datetime']) ? $fap_extracolonic_detail['wide_datetime'] : ''));?>
                          <?=form_textarea(array('name'=>'','class'=>'form-control','placeholder'=>'details','disabled'=>TRUE),set_value('',isset($fap_extracolonic_detail['wide_detail']) ? $fap_extracolonic_detail['wide_detail'] : ''));?>
                        </div>
                        <?=form_label('','',array('class'=>'control-label col-md-2'));?>
                        <div class="col-md-10">
                          <p>explore lap</p>
                          <?=form_input(array('name'=>'','class'=>'form-control datepicker','placeholder'=>'operative date','disabled'=>TRUE),set_value('',isset($fap_extracolonic_detail['explore_datetime']) ? $fap_extracolonic_detail['explore_datetime'] : ''));?>
                          <?=form_textarea(array('name'=>'','class'=>'form-control','placeholder'=>'details','disabled'=>TRUE),set_value('',isset($fap_extracolonic_detail['explore_detail']) ? $fap_extracolonic_detail['explore_detail'] : ''));?>
                        </div>
                        <?=form_label('','',array('class'=>'control-label col-md-2'));?>
                        <div class="col-md-10">
                          <p>surgical resection</p>
                          <?=form_input(array('name'=>'','class'=>'form-control datepicker','placeholder'=>'operative date','disabled'=>TRUE),set_value('',isset($fap_extracolonic_detail['surgical_datetime']) ? $fap_extracolonic_detail['surgical_datetime'] : ''));?>
                          <?=form_textarea(array('name'=>'','class'=>'form-control','placeholder'=>'details','disabled'=>TRUE),set_value('',isset($fap_extracolonic_detail['surgical_detail']) ? $fap_extracolonic_detail['surgical_detail'] : ''));?>
                        </div>
                      </div>
                    </div>
                  </div>
                <?=form_fieldset_close();?>

                <?=form_fieldset('HNPCC');?>
                <div class="form-group">
                  <?=form_label('criteria:','',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-10"> <?=form_input(array('name'=>'hnpcc_criteria','class'=>'form-control'),set_value('',$clinic['hnpcc_criteria']));?> <p class="help-block"></p> </div>
                </div>
                <div class="form-group">
                  <?=form_label('hnpcc:','hnpcc_clinical',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-10">
                    <div class="row">
                      <div class="col-md-6"> <?=form_input(array('name'=>'hnpcc_clinical','class'=>'form-control','id'=>'hnpcc','disabled'=>TRUE),set_value('',$clinic['hnpcc_clinical']));?> </div>
                      <div class="col-md-6"> <?=form_input(array('name'=>'hnpcc_clinical_detail','class'=>'form-control','id'=>'hnpcc_ctn','disabled'=>TRUE),set_value('',$clinic['hnpcc_clinical_detail']));?> </div>
                    </div>
                  </div>
                </div>
                <?=form_fieldset_close();?>

                <?=form_fieldset('PJS/JPS');?>
                <div class="form-group">
                  <?=form_label('clinical:','',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-10"> <?=form_input(array('name'=>'','class'=>'form-control','disabled'=>TRUE),set_value('',$clinic['pjsjps_clinical']));?> <p class="help-block"></p> </div>
                </div>
                <div class="form-group">
                  <?=form_label('type:','pjsjps_type',array('class'=>'control-label col-md-2'));?>
                  <div class="col-md-10">
                    <div class="row">
                      <div class="col-md-6"> <div class="checkbox"> <?=form_checkbox(array('name'=>'pjsjps_type','class'=>'form-control','id'=>'type','disabled'=>TRUE),'1',set_checkbox('pjsjps_type','1',($clinic['pjsjps_type'] == '1')));?> Hereditary hamartomatous polyposis syndromes </div> </div>
                      <div class="col-md-6"> <?=form_input(array('name'=>'pjsjps_type_detail','class'=>'form-control','id'=>'type_ctn','disabled'=>TRUE),set_value('',$clinic['pjsjps_type_detail']));?> </div>
                    </div>
                  </div>
                </div>
                <?=form_fieldset_close();?>

              </div>

            </div>
          </div>
        </div>
      </div>
      <div class="box-footer clearfix"> </div>
    </div>
    <?=form_close();?>
  </div>

  <div class="col-md-12">
    <div class="box">
      <div class="box-header"> <h3 class="box-title">เอกสารที่เกี่ยวข้อง</h3></div>
      <div class="box-body" style="padding:1em;">
        <?php if (isset($assets) && ! empty($assets)) : ?>
          <table class="table table-condensed table-hover">
            <thead>
              <tr>
                <th class="text-center">ชนิดไฟล์</th>
                <th class="text-center">ชื่อไฟล์</th>
                <th class="text-center">ขนาดไฟล์</th>
                <th class="text-center">วันที่อัพโหลด</th>
                <th class="text-center">อัพโหลดโดย</th>
              </tr>
            </thead>
            <?php foreach ($assets as $key => $value) : ?>
              <tbody>
                <tr>
                  <td class="text-center"> <?=$value['file_type'];?></td>
                  <td> <?=$value['client_name'];?> </td>
                  <td class="text-center"> <?=byte_format($value['file_size']);?> </td>
                  <td class="text-center"> <?=date('d/m/Y H:i:s',$value['upload_date']);?> </td>
                  <td class="text-center"> <?=$value['username'];?> </td>
                </tr>
              </tbody>
            <?php endforeach;?>
          </table>
        <?php else: ?>
          ว่างเปล่า
        <?php endif;?>
      </div>
      <div class="box-footer clearfix"> </div>
    </div>
  </div>

</div>

<?=script_tag('assets/admin/js/go-debug.js');?>
<script type="text/javascript">
  function init() {
    if (window.goSamples) goSamples();  // init for these samples -- you don't need to call this
    var $ = go.GraphObject.make;
    myDiagram = $(go.Diagram, "myGenogram", {
          initialAutoScale: go.Diagram.Uniform,
          initialContentAlignment: go.Spot.Center,
          "undoManager.isEnabled": true,
          // when a node is selected, draw a big yellow circle behind it
          nodeSelectionAdornmentTemplate:
            $(go.Adornment, "Auto",
              { layerName: "Grid" },  // the predefined layer that is behind everything else
              // $(go.Shape, "Circle", { fill: "yellow", stroke: null }),
              $(go.Placeholder)
            ),
          layout:  // use a custom layout, defined below
            $(GenogramLayout, { direction: 90, layerSpacing: 30, columnSpacing: 10 })
        });
    // determine the color for each attribute shape
    function attrFill(a) {
      switch (a) {
        case "A": return "green";
        case "B": return "orange";
        case "C": return "red";
        case "D": return "cyan";
        case "E": return "gold";
        case "F": return "pink";
        case "G": return "blue";
        case "H": return "brown";
        case "I": return "purple";
        case "J": return "chartreuse";
        case "K": return "lightgray";
        case "L": return "magenta";
        case "S": return "red";
        default: return "transparent";
      }
    }
    // determine the geometry for each attribute shape in a male;
    // except for the slash these are all squares at each of the four corners of the overall square
    var tlsq = go.Geometry.parse("F M1 1 l19 0 0 19 -19 0z");
    var trsq = go.Geometry.parse("F M20 1 l19 0 0 19 -19 0z");
    var brsq = go.Geometry.parse("F M20 20 l19 0 0 19 -19 0z");
    var blsq = go.Geometry.parse("F M1 20 l19 0 0 19 -19 0z");
    var slash = go.Geometry.parse("F M38 0 L40 0 40 2 2 40 0 40 0 38z");
    function maleGeometry(a) {
      switch (a) {
        case "A": return tlsq;
        case "B": return tlsq;
        case "C": return tlsq;
        case "D": return trsq;
        case "E": return trsq;
        case "F": return trsq;
        case "G": return brsq;
        case "H": return brsq;
        case "I": return brsq;
        case "J": return blsq;
        case "K": return blsq;
        case "L": return blsq;
        case "S": return slash;
        default: return tlsq;
      }
    }

    // determine the geometry for each attribute shape in a female;
    // except for the slash these are all pie shapes at each of the four quadrants of the overall circle
    var tlarc = go.Geometry.parse("F M20 20 B 180 90 20 20 19 19 z");
    var trarc = go.Geometry.parse("F M20 20 B 270 90 20 20 19 19 z");
    var brarc = go.Geometry.parse("F M20 20 B 0 90 20 20 19 19 z");
    var blarc = go.Geometry.parse("F M20 20 B 90 90 20 20 19 19 z");
    function femaleGeometry(a) {
      switch (a) {
        case "A": return tlarc;
        case "B": return tlarc;
        case "C": return tlarc;
        case "D": return trarc;
        case "E": return trarc;
        case "F": return trarc;
        case "G": return brarc;
        case "H": return brarc;
        case "I": return brarc;
        case "J": return blarc;
        case "K": return blarc;
        case "L": return blarc;
        case "S": return slash;
        default: return tlarc;
      }
    }


    // two different node templates, one for each sex,
    // named by the category value in the node data object
    myDiagram.nodeTemplateMap.add("M",  // male
      $(go.Node, "Vertical",
        { locationSpot: go.Spot.Center, locationObjectName: "ICON" },
        $(go.Panel,
          { name: "ICON" },
          $(go.Shape, "Square",
            { width: 40, height: 40, strokeWidth: 2, fill: "white", portId: "" }),
          $(go.Panel,
            { // for each attribute show a Shape at a particular place in the overall square
              itemTemplate:
                $(go.Panel,
                  $(go.Shape,
                    { stroke: null, strokeWidth: 0 },
                    new go.Binding("fill", "", attrFill),
                    new go.Binding("geometry", "", maleGeometry))
                ),
              margin: 1
            },
            new go.Binding("itemArray", "a")
          )
        ),
        $(go.TextBlock,
          { textAlign: "center", maxSize: new go.Size(80, NaN) },
          new go.Binding("text", "n"))
      ));

    myDiagram.nodeTemplateMap.add("F",  // female
      $(go.Node, "Vertical",
        { locationSpot: go.Spot.Center, locationObjectName: "ICON" },
        $(go.Panel,
          { name: "ICON" },
          $(go.Shape, "Circle",
            { width: 40, height: 40, strokeWidth: 2, fill: "white", portId: "" }),
          $(go.Panel,
            { // for each attribute show a Shape at a particular place in the overall circle
              itemTemplate:
                $(go.Panel,
                  $(go.Shape,
                    { stroke: null, strokeWidth: 0 },
                    new go.Binding("fill", "", attrFill),
                    new go.Binding("geometry", "", femaleGeometry))
                ),
              margin: 1
            },
            new go.Binding("itemArray", "a")
          )
        ),
        $(go.TextBlock,
          { textAlign: "center", maxSize: new go.Size(80, NaN) },
          new go.Binding("text", "n"))
      ));

    // the representation of each label node -- nothing shows on a Marriage Link
    myDiagram.nodeTemplateMap.add("LinkLabel",
      $(go.Node, { selectable: false, width: 1, height: 1, fromEndSegmentLength: 20 }));


    myDiagram.linkTemplate =  // for parent-child relationships
      $(go.Link,
        {
          routing: go.Link.Orthogonal, curviness: 15,
          layerName: "Background", selectable: false,
          fromSpot: go.Spot.Bottom, toSpot: go.Spot.Top
        },
        $(go.Shape, { strokeWidth: 2 })
      );

    myDiagram.linkTemplateMap.add("Marriage",  // for marriage relationships
      $(go.Link,
        { selectable: false },
        $(go.Shape, { strokeWidth: 2, stroke: "blue" })
    ));


    // n: name, s: sex, m: mother, f: father, ux: wife, vir: husband, a: attributes/markers
    setupDiagram(myDiagram, [
        { key: 0, n: "Aaron", s: "M", m:-10, f:-11, ux: 1, a: ["C", "F", "K"] },
        { key: 1, n: "Alice", s: "F", m:-12, f:-13, a: ["B", "H", "K"] },
        { key: 2, n: "Bob", s: "M", m: 1, f: 0, ux: 3, a: ["C", "H", "L"] },
        { key: 3, n: "Barbara", s: "F", a: ["C"] },
        { key: 4, n: "Bill", s: "M", m: 1, f: 0, ux: 5, a: ["E", "H"] },
        { key: 5, n: "Brooke", s: "F", a: ["B", "H", "L"] },
        { key: 6, n: "Claire", s: "F", m: 1, f: 0, a: ["C"] },
        { key: 7, n: "Carol", s: "F", m: 1, f: 0, a: ["C", "I"] },
        { key: 8, n: "Chloe", s: "F", m: 1, f: 0, vir: 9, a: ["E"] },
        { key: 9, n: "Chris", s: "M", a: ["B", "H"] },
        { key: 10, n: "Ellie", s: "F", m: 3, f: 2, a: ["E", "G"] },
        { key: 11, n: "Dan", s: "M", m: 3, f: 2, a: ["B", "J"] },
        { key: 12, n: "Elizabeth", s: "F", vir: 13, a: ["J"] },
        { key: 13, n: "David", s: "M", m: 5, f: 4, a: ["B", "H"] },
        { key: 14, n: "Emma", s: "F", m: 5, f: 4, a: ["E", "G"] },
        { key: 15, n: "Evan", s: "M", m: 8, f: 9, a: ["F", "H"] },
        { key: 16, n: "Ethan", s: "M", m: 8, f: 9, a: ["D", "K"] },
        { key: 17, n: "Eve", s: "F", vir: 16, a: ["B", "F", "L"] },
        { key: 18, n: "Emily", s: "F", m: 8, f: 9 },
        { key: 19, n: "Fred", s: "M", m: 17, f: 16, a: ["B"] },
        { key: 20, n: "Faith", s: "F", m: 17, f: 16, a: ["L"] },
        { key: 21, n: "Felicia", s: "F", m: 12, f: 13, a: ["H"] },
        { key: 22, n: "Frank", s: "M", m: 12, f: 13, a: ["B", "H"] },

        // "Aaron"'s ancestors
        { key: -10, n: "Paternal Grandfather", s: "M", m: -33, f: -32, ux: -11, a: ["A", "S"] },
        { key: -11, n: "Paternal Grandmother", s: "F", a: ["E", "S"] },
        { key: -32, n: "Paternal Great", s: "M", ux: -33, a: ["F", "H", "S"] },
        { key: -33, n: "Paternal Great", s: "F", a: ["S"] },
        { key: -40, n: "Great Uncle", s: "M", m: -33, f: -32, a: ["F", "H", "S"] },
        { key: -41, n: "Great Aunt", s: "F", m: -33, f: -32, a: ["B", "I", "S"] },
        { key: -20, n: "Uncle", s: "M", m: -11, f: -10, a: ["A", "S"] },

        // "Alice"'s ancestors
        { key: -12, n: "Maternal Grandfather", s: "M", ux: -13, a: ["D", "L", "S"] },
        { key: -13, n: "Maternal Grandmother", s: "F", m: -31, f: -30, a: ["H", "S"] },
        { key: -21, n: "Aunt", s: "F", m: -13, f: -12, a: ["C", "I"] },
        { key: -22, n: "Uncle", s: "M", ux: -21 },
        { key: -23, n: "Cousin", s: "M", m: -21, f: -22 },
        { key: -30, n: "Maternal Great", s: "M", ux: -31, a: ["D", "J", "S"] },
        { key: -31, n: "Maternal Great", s: "F", m: -50, f: -51, a: ["B", "H", "L", "S"] },
        { key: -42, n: "Great Uncle", s: "M", m: -30, f: -31, a: ["C", "J", "S"] },
        { key: -43, n: "Great Aunt", s: "F", m: -30, f: -31, a: ["E", "G", "S"] },
        { key: -50, n: "Maternal Great Great", s: "F", ux: -51, a: ["D", "I", "S"] },
        { key: -51, n: "Maternal Great Great", s: "M", a: ["B", "H", "S"] }
      ],
      4 /* focus on this person */);
  }
  // create and initialize the Diagram.model given an array of node data representing people
  function setupDiagram(diagram, array, focusId) {
    diagram.model =
      go.GraphObject.make(go.GraphLinksModel,
        { // declare support for link label nodes
          linkLabelKeysProperty: "labelKeys",
          // this property determines which template is used
          nodeCategoryProperty: "s",
          // create all of the nodes for people
          nodeDataArray: array
        });
    setupMarriages(diagram);
    setupParents(diagram);

    var node = diagram.findNodeForKey(focusId);
    if (node !== null) {
      diagram.select(node);
      // remove any spouse for the person under focus:
      //node.linksConnected.each(function(l) {
      //  if (!l.isLabeledLink) return;
      //  l.opacity = 0;
      //  var spouse = l.getOtherNode(node);
      //  spouse.opacity = 0;
      //  spouse.pickable = false;
      //});
    }
  }
  function findMarriage(diagram, a, b) {  // A and B are node keys
    var nodeA = diagram.findNodeForKey(a);
    var nodeB = diagram.findNodeForKey(b);
    if (nodeA !== null && nodeB !== null) {
      var it = nodeA.findLinksBetween(nodeB);  // in either direction
      while (it.next()) {
        var link = it.value;
        // Link.data.category === "Marriage" means it's a marriage relationship
        if (link.data !== null && link.data.category === "Marriage") return link;
      }
    }
    return null;
  }
  // now process the node data to determine marriages
  function setupMarriages(diagram) {
    var model = diagram.model;
    var nodeDataArray = model.nodeDataArray;
    for (var i = 0; i < nodeDataArray.length; i++) {
      var data = nodeDataArray[i];
      var key = data.key;
      var uxs = data.ux;
      if (uxs !== undefined) {
        if (typeof uxs === "number") uxs = [ uxs ];
        for (var j = 0; j < uxs.length; j++) {
          var wife = uxs[j];
          if (key === wife) {
            // or warn no reflexive marriages
            continue;
          }
          var link = findMarriage(diagram, key, wife);
          if (link === null) {
            // add a label node for the marriage link
            var mlab = { s: "LinkLabel" };
            model.addNodeData(mlab);
            // add the marriage link itself, also referring to the label node
            var mdata = { from: key, to: wife, labelKeys: [mlab.key], category: "Marriage" };
            model.addLinkData(mdata);
          }
        }
      }
      var virs = data.vir;
      if (virs !== undefined) {
        if (typeof virs === "number") virs = [ virs ];
        for (var j = 0; j < virs.length; j++) {
          var husband = virs[j];
          if (key === husband) {
            // or warn no reflexive marriages
            continue;
          }
          var link = findMarriage(diagram, key, husband);
          if (link === null) {
            // add a label node for the marriage link
            var mlab = { s: "LinkLabel" };
            model.addNodeData(mlab);
            // add the marriage link itself, also referring to the label node
            var mdata = { from: key, to: husband, labelKeys: [mlab.key], category: "Marriage" };
            model.addLinkData(mdata);
          }
        }
      }
    }
  }
  // process parent-child relationships once all marriages are known
  function setupParents(diagram) {
    var model = diagram.model;
    var nodeDataArray = model.nodeDataArray;
    for (var i = 0; i < nodeDataArray.length; i++) {
      var data = nodeDataArray[i];
      var key = data.key;
      var mother = data.m;
      var father = data.f;
      if (mother !== undefined && father !== undefined) {
        var link = findMarriage(diagram, mother, father);
        if (link === null) {
          // or warn no known mother or no known father or no known marriage between them
          if (window.console) window.console.log("unknown marriage: " + mother + " & " + father);
          continue;
        }
        var mdata = link.data;
        var mlabkey = mdata.labelKeys[0];
        var cdata = { from: mlabkey, to: key };
        myDiagram.model.addLinkData(cdata);
      }
    }
  }
  // A custom layout that shows the two families related to a person's parents
  function GenogramLayout() {
    go.LayeredDigraphLayout.call(this);
    this.initializeOption = go.LayeredDigraphLayout.InitDepthFirstIn;
    this.spouseSpacing = 30;  // minimum space between spouses
  }
  go.Diagram.inherit(GenogramLayout, go.LayeredDigraphLayout);
  /** @override */
  GenogramLayout.prototype.makeNetwork = function(coll) {
    // generate LayoutEdges for each parent-child Link
    var net = this.createNetwork();
    if (coll instanceof go.Diagram) {
      this.add(net, coll.nodes, true);
      this.add(net, coll.links, true);
    } else if (coll instanceof go.Group) {
      this.add(net, coll.memberParts, false);
    } else if (coll.iterator) {
      this.add(net, coll.iterator, false);
    }
    return net;
  };
  // internal method for creating LayeredDigraphNetwork where husband/wife pairs are represented
  // by a single LayeredDigraphVertex corresponding to the label Node on the marriage Link
  GenogramLayout.prototype.add = function(net, coll, nonmemberonly) {
    var multiSpousePeople = new go.Set();
    // consider all Nodes in the given collection
    var it = coll.iterator;
    while (it.next()) {
      var node = it.value;
      if (!(node instanceof go.Node)) continue;
      if (!node.isLayoutPositioned || !node.isVisible()) continue;
      if (nonmemberonly && node.containingGroup !== null) continue;
      // if it's an unmarried Node, or if it's a Link Label Node, create a LayoutVertex for it
      if (node.isLinkLabel) {
        // get marriage Link
        var link = node.labeledLink;
        var spouseA = link.fromNode;
        var spouseB = link.toNode;
        // create vertex representing both husband and wife
        var vertex = net.addNode(node);
        // now define the vertex size to be big enough to hold both spouses
        vertex.width = spouseA.actualBounds.width + this.spouseSpacing + spouseB.actualBounds.width;
        vertex.height = Math.max(spouseA.actualBounds.height, spouseB.actualBounds.height);
        vertex.focus = new go.Point(spouseA.actualBounds.width + this.spouseSpacing / 2, vertex.height / 2);
      } else {
        // don't add a vertex for any married person!
        // instead, code above adds label node for marriage link
        // assume a marriage Link has a label Node
        var marriages = 0;
        node.linksConnected.each(function(l) { if (l.isLabeledLink) marriages++; });
        if (marriages === 0) {
          var vertex = net.addNode(node);
        } else if (marriages > 1) {
          multiSpousePeople.add(node);
        }
      }
    }
    // now do all Links
    it.reset();
    while (it.next()) {
      var link = it.value;
      if (!(link instanceof go.Link)) continue;
      if (!link.isLayoutPositioned || !link.isVisible()) continue;
      if (nonmemberonly && link.containingGroup !== null) continue;
      // if it's a parent-child link, add a LayoutEdge for it
      if (!link.isLabeledLink) {
        var parent = net.findVertex(link.fromNode);  // should be a label node
        var child = net.findVertex(link.toNode);
        if (child !== null) {  // an unmarried child
          net.linkVertexes(parent, child, link);
        } else {  // a married child
          link.toNode.linksConnected.each(function(l) {
            if (!l.isLabeledLink) return;  // if it has no label node, it's a parent-child link
            // found the Marriage Link, now get its label Node
            var mlab = l.labelNodes.first();
            // parent-child link should connect with the label node,
            // so the LayoutEdge should connect with the LayoutVertex representing the label node
            var mlabvert = net.findVertex(mlab);
            if (mlabvert !== null) {
              net.linkVertexes(parent, mlabvert, link);
            }
          });
        }
      }
    }

    while (multiSpousePeople.count > 0) {
      // find all collections of people that are indirectly married to each other
      var node = multiSpousePeople.first();
      var cohort = new go.Set();
      this.extendCohort(cohort, node);
      // then encourage them all to be the same generation by connecting them all with a common vertex
      var dummyvert = net.createVertex();
      net.addVertex(dummyvert);
      var marriages = new go.Set();
      cohort.each(function(n) {
        n.linksConnected.each(function(l) {
          marriages.add(l);
        })
      });
      marriages.each(function(link) {
        // find the vertex for the marriage link (i.e. for the label node)
        var mlab = link.labelNodes.first()
        var v = net.findVertex(mlab);
        if (v !== null) {
          net.linkVertexes(dummyvert, v, null);
        }
      });
      // done with these people, now see if there are any other multiple-married people
      multiSpousePeople.removeAll(cohort);
    }
  };
  // collect all of the people indirectly married with a person
  GenogramLayout.prototype.extendCohort = function(coll, node) {
    if (coll.contains(node)) return;
    coll.add(node);
    var lay = this;
    node.linksConnected.each(function(l) {
      if (l.isLabeledLink) {  // if it's a marriage link, continue with both spouses
        lay.extendCohort(coll, l.fromNode);
        lay.extendCohort(coll, l.toNode);
      }
    });
  };
  /** @override */
  GenogramLayout.prototype.assignLayers = function() {
    go.LayeredDigraphLayout.prototype.assignLayers.call(this);
    var horiz = this.direction == 0.0 || this.direction == 180.0;
    // for every vertex, record the maximum vertex width or height for the vertex's layer
    var maxsizes = [];
    this.network.vertexes.each(function(v) {
      var lay = v.layer;
      var max = maxsizes[lay];
      if (max === undefined) max = 0;
      var sz = (horiz ? v.width : v.height);
      if (sz > max) maxsizes[lay] = sz;
    });
    // now make sure every vertex has the maximum width or height according to which layer it is in,
    // and aligned on the left (if horizontal) or the top (if vertical)
    this.network.vertexes.each(function(v) {
      var lay = v.layer;
      var max = maxsizes[lay];
      if (horiz) {
        v.focus = new go.Point(0, v.height / 2);
        v.width = max;
      } else {
        v.focus = new go.Point(v.width / 2, 0);
        v.height = max;
      }
    });
    // from now on, the LayeredDigraphLayout will think that the Node is bigger than it really is
    // (other than the ones that are the widest or tallest in their respective layer).
  };
  /** @override */
  GenogramLayout.prototype.commitNodes = function() {
    go.LayeredDigraphLayout.prototype.commitNodes.call(this);
    // position regular nodes
    this.network.vertexes.each(function(v) {
      if (v.node !== null && !v.node.isLinkLabel) {
        v.node.position = new go.Point(v.x, v.y);
      }
    });
    // position the spouses of each marriage vertex
    var layout = this;
    this.network.vertexes.each(function(v) {
      if (v.node === null) return;
      if (!v.node.isLinkLabel) return;
      var labnode = v.node;
      var lablink = labnode.labeledLink;
      // In case the spouses are not actually moved, we need to have the marriage link
      // position the label node, because LayoutVertex.commit() was called above on these vertexes.
      // Alternatively we could override LayoutVetex.commit to be a no-op for label node vertexes.
      lablink.invalidateRoute();
      var spouseA = lablink.fromNode;
      var spouseB = lablink.toNode;
      // prefer fathers on the left, mothers on the right
      if (spouseA.data.s === "F") {  // sex is female
        var temp = spouseA;
        spouseA = spouseB;
        spouseB = temp;
      }
      // see if the parents are on the desired sides, to avoid a link crossing
      var aParentsNode = layout.findParentsMarriageLabelNode(spouseA);
      var bParentsNode = layout.findParentsMarriageLabelNode(spouseB);
      if (aParentsNode !== null && bParentsNode !== null && aParentsNode.position.x > bParentsNode.position.x) {
        // swap the spouses
        var temp = spouseA;
        spouseA = spouseB;
        spouseB = temp;
      }
      spouseA.position = new go.Point(v.x, v.y);
      spouseB.position = new go.Point(v.x + spouseA.actualBounds.width + layout.spouseSpacing, v.y);
      if (spouseA.opacity === 0) {
        var pos = new go.Point(v.centerX - spouseA.actualBounds.width / 2, v.y);
        spouseA.position = pos;
        spouseB.position = pos;
      } else if (spouseB.opacity === 0) {
        var pos = new go.Point(v.centerX - spouseB.actualBounds.width / 2, v.y);
        spouseA.position = pos;
        spouseB.position = pos;
      }
    });
    // position only-child nodes to be under the marriage label node
    this.network.vertexes.each(function(v) {
      if (v.node === null || v.node.linksConnected.count > 1) return;
      var mnode = layout.findParentsMarriageLabelNode(v.node);
      if (mnode !== null && mnode.linksConnected.count === 1) {  // if only one child
        var mvert = layout.network.findVertex(mnode);
        var newbnds = v.node.actualBounds.copy();
        newbnds.x = mvert.centerX - v.node.actualBounds.width / 2;
        // see if there's any empty space at the horizontal mid-point in that layer
        var overlaps = layout.diagram.findObjectsIn(newbnds, function(x) { return x.part; }, function(p) { return p !== v.node; }, true);
        if (overlaps.count === 0) {
          v.node.move(newbnds.position);
        }
      }
    });
  };
  GenogramLayout.prototype.findParentsMarriageLabelNode = function(node) {
    var it = node.findNodesInto();
    while (it.next()) {
      var n = it.value;
      if (n.isLinkLabel) return n;
    }
    return null;
  };
  // end GenogramLayout class
</script>
