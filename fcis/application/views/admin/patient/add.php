<div class="row">
  <?php echo form_open_multipart(uri_string(),array('class'=>'form-horizontal')); ?>
  <div class="col-md-8">
    <div class="box box-primary">
      <div class="box-header"> </div>
      <div class="box-body">

        <?php echo form_fieldset('Information'); ?>
        <div class="form-group">
          <?php echo form_label('personal id:','id_card',array('class'=>'control-label col-md-2')); ?>
          <div class="col-md-10">
            <div class="input-group">
              <?php echo form_input(array('name'=>'id_card','class'=>'form-control','placeholder'=>'หมายเลขบัตรประชาชน','maxlength'=>'13','pattern'=>'[0-9]{13}'),set_value('id_card')); ?>
              <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
            </div>
          </div>
        </div>
        <div class="form-group">
          <?php echo form_label('fullname:','fullname',array('class'=>'control-label col-md-2')); ?>
          <div class="col-md-2">
            <?php echo form_dropdown(array('name'=>'title','class'=>'form-control'),array(''=>'คำนำหน้าชื่อ','นาย'=>'นาย','นาง'=>'นาง','นางสาว'=>'นางสาว')); ?>
          </div>
          <div class="col-md-3">
            <?php echo form_input(array('name'=>'firstname','class'=>'form-control','placeholder'=>'ชื่อ'),set_value('firstname')); ?>
          </div>
          <div class="col-md-5">
            <?php echo form_input(array('name'=>'lastname','class'=>'form-control','placeholder'=>'นามสกุล'),set_value('lastname')); ?>
          </div>
        </div>
        <div class="form-group">
          <?php echo form_label('age:','age',array('class'=>'control-label col-md-2')); ?>
          <div class="col-md-4">
            <?php echo form_number(array('name'=>'age','class'=>'form-control','placeholder'=>'อายุ'),set_value('age')); ?>
          </div>
          <?php echo form_label('hn:','hn',array('class'=>'control-label col-md-2')); ?>
          <div class="col-md-4">
            <?php echo form_number(array('name'=>'hn','class'=>'form-control','placeholder'=>'H.N.'),set_value('H.N.')); ?>
          </div>
        </div>
        <div class="form-group">
          <?php echo form_label('history and family:','history',array('class'=>'control-label col-md-2')); ?>
          <div class="col-md-10">
            <?php echo form_textarea(array('name'=>'history','class'=>'form-control','placeholder'=>'ประวัติส่วนตัว'),set_value('history')); ?>
          </div>
        </div>
        <div class="" id="address">
          <div class="form-group">
            <?php echo form_label('address:','',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-2">
              <?php echo form_input(array('name'=>'address_number','class'=>'form-control','placeholder'=>'ที่อยู่'),set_value('address_number')); ?>
            </div>
            <div class="col-md-2">
              <?php echo form_input(array('name'=>'address_soi','class'=>'form-control','placeholder'=>'ซอย'),set_value('address_soi')); ?>
            </div>
            <div class="col-md-4">
              <?php echo form_input(array('name'=>'address_street','class'=>'form-control','placeholder'=>'ถนน'),set_value('address_street')); ?>
            </div>
            <div class="col-md-2">
              <?php echo form_number(array('name'=>'address_moo','class'=>'form-control','placeholder'=>'หมู่'),set_value('address_moo')); ?>
            </div>
          </div>
          <div class="form-group">
            <?php echo form_label('tambon:','tambon',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-4">
              <?php echo form_input(array('name'=>'address_tambon','class'=>'form-control','id'=>'district','placeholder'=>'ตำบล'),set_value('address_tambon')); ?>
            </div>
            <?php echo form_label('amphur:','amphur',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-4">
              <?php echo form_input(array('name'=>'address_amphur','class'=>'form-control','id'=>'amphur','placeholder'=>'อำเภอ'),set_value('address_amphur')); ?>
            </div>
          </div>
          <div class="form-group">
            <?php echo form_label('province:','',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-4">
              <?php echo form_input(array('name'=>'address_province','class'=>'form-control','id'=>'province','placeholder'=>'จังหวัด'),set_value('address_province')); ?>
            </div>
            <?php echo form_label('zipcode:','',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-4">
              <?php echo form_number(array('name'=>'address_zipcode','class'=>'form-control','id'=>'zipcode','placeholder'=>'รหัสไปรษณีย์'),set_value('address_zipcode')); ?>
            </div>
          </div>
          <div class="form-group">
            <?php echo form_label('telephone:','telephone',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-4">
              <?php echo form_number(array('name'=>'telephone','class'=>'form-control','placeholder'=>'เบอร์โทรศัพท์'),set_value('telephone')); ?>
            </div>
            <?php echo form_label('mobile:','mobile',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-4">
              <?php echo form_number(array('name'=>'mobile','class'=>'form-control','placeholder'=>'โทรศัพท์มือถือ'),set_value('mobile')); ?>
            </div>
          </div>
        </div>
        <!-- <div class="well" id="address_org">
          <div class="form-group">
            <?php echo form_label('','',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-4">
              <?php echo form_checkbox(array('name'=>'same_address','class'=>'form-control'),'same_address'); ?> SAME ADDRESS ON CARD
            </div>
          </div>
          <div class="form-group">
            <?php echo form_label('address on card:','',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-2">
              <?php echo form_input(array('name'=>'address_number','class'=>'form-control','placeholder'=>'number'),set_value('address_number')); ?>
            </div>
            <div class="col-md-2">
              <?php echo form_input(array('name'=>'address_soi','class'=>'form-control','placeholder'=>'soi'),set_value('address_soi')); ?>
            </div>
            <div class="col-md-4">
              <?php echo form_input(array('name'=>'address_street','class'=>'form-control','placeholder'=>'street'),set_value('address_street')); ?>
            </div>
            <div class="col-md-2">
              <?php echo form_number(array('name'=>'address_moo','class'=>'form-control','placeholder'=>'moo'),set_value('address_moo')); ?>
            </div>
          </div>
          <div class="form-group">
            <?php echo form_label('tambon:','tambon',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-4">
              <?php echo form_input(array('name'=>'address_tambon','class'=>'form-control','id'=>'district_org','placeholder'=>'tambon'),set_value('address_tambon')); ?>
            </div>
            <?php echo form_label('amphur:','amphur',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-4">
              <?php echo form_input(array('name'=>'address_amphur','class'=>'form-control','id'=>'amphur_org','placeholder'=>'amphur'),set_value('address_amphur')); ?>
            </div>
          </div>
          <div class="form-group">
            <?php echo form_label('province:','',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-4">
              <?php echo form_input(array('name'=>'address_province','class'=>'form-control','id'=>'province_org','placeholder'=>'province'),set_value('address_province')); ?>
            </div>
            <?php echo form_label('zipcode:','',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-4">
              <?php echo form_number(array('name'=>'address_zipcode','class'=>'form-control','id'=>'zipcode_org','placeholder'=>'zipcode'),set_value('address_zipcode')); ?>
            </div>
          </div>
          <div class="form-group">
            <?php echo form_label('telephone:','telephone',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-4">
              <?php echo form_number(array('name'=>'telephone','class'=>'form-control','placeholder'=>'telephone'),set_value('telephone')); ?>
            </div>
            <?php echo form_label('mobile:','mobile',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-4">
              <?php echo form_number(array('name'=>'mobile','class'=>'form-control','placeholder'=>'mobile'),set_value('mobile')); ?>
            </div>
          </div>
        </div> -->
        <?php echo form_fieldset_close(); ?>

        <?php echo form_fieldset('Filtered'); ?>
        <!-- <div class="form-group">
          <?php echo form_label('a month ago activities:','',array('class'=>'control-label col-md-2')); ?>
          <div class="col-md-10">
            <div class="checkbox">
              <?php echo form_checkbox(array('name'=>'activity','class'=>'form-control'),'1',set_select('activity','1')); ?>
              รับประทานอาหารมันๆ เป็นประจำ <small class="pull-right">[1]</small>
              <p class="help-block"></p>
            </div>
            <div class="checkbox">
              <?php echo form_checkbox(array('name'=>'activity','class'=>'form-control'),'2',set_select('activity','2')); ?>
              รับประทานเน้ือสัตว์ระเภททอดปิ้งย่างไส้กรอกกุนเชียงบ่อยๆ <small class="pull-right">[1]</small>
              <p class="help-block"></p>
            </div>
            <div class="checkbox">
              <?php echo form_checkbox(array('name'=>'activity','class'=>'form-control'),'3',set_select('activity','3')); ?>
              อ้วน <small class="pull-right">[1]</small>
              <p class="help-block"></p>
            </div>
            <div class="checkbox">
              <?php echo form_checkbox(array('name'=>'activity','class'=>'form-control'),'',set_select('activity','')); ?>
              เป็นโรคเบาหวาน <small class="pull-right">[1]</small>
              <p class="help-block"></p>
            </div>
            <div class="checkbox">
              <?php echo form_checkbox(array('name'=>'activity','class'=>'form-control'),'',set_select('activity','')); ?>
              ท้องผูกสลับท้องเสีย <small class="pull-right">[3]</small>
              <p class="help-block"></p>
            </div>
            <div class="checkbox">
              <?php echo form_checkbox(array('name'=>'activity','class'=>'form-control'),'',set_select('activity','')); ?>
              ถ่ายอุจจาระไม่สุด(รู้สึกว่าถ่ายไม่หมด) <small class="pull-right">[3]</small>
              <p class="help-block"></p>
            </div>
            <div class="checkbox">
              <?php echo form_checkbox(array('name'=>'activity','class'=>'form-control'),'',set_select('activity','')); ?>
              เคยอุจจาระมีเลือดปน <small class="pull-right">[3]</small>
              <p class="help-block"></p>
            </div>
            <div class="checkbox">
              <?php echo form_checkbox(array('name'=>'activity','class'=>'form-control'),'',set_select('activity','')); ?>
              ลักษณะอุจจาระลีบ เล็ก แบน <small class="pull-right">[9]</small>
              <p class="help-block"></p>
            </div>
            <div class="checkbox">
              <?php echo form_checkbox(array('name'=>'activity','class'=>'form-control'),'',set_select('activity','')); ?>
              เคยตรวจพบติ่งเนื้อในลำไส้ <small class="pull-right">[10]</small>
              <p class="help-block"></p>
            </div>
            <div class="checkbox">
              <?php echo form_checkbox(array('name'=>'activity','class'=>'form-control'),'',set_select('activity','')); ?>
              มีญาติที่ใกล้ชิดกันโดยสายเลือดเช่น พ่อ แม่ พี่ น้อง เป็นโรคมะเร็งลำไส้ใหญ่เมื่ออายุมากกว่า 50 ปี <small class="pull-right">[12]</small>
              <p class="help-block"></p>
            </div>
            <div class="checkbox">
              <?php echo form_checkbox(array('name'=>'activity','class'=>'form-control'),'',set_select('activity','')); ?>
              มีญาติที่ใกล้ชิดกันโดยสายเลือดเช่น พ่อ แม่ พี่ น้อง เป็นโรคมะเร็งลำไส้ใหญ่เมื่ออายุน้อยกว่า 50 ปี <small class="pull-right">[11]</small>
              <p class="help-block"></p>
            </div>
          </div>
        </div> -->
        <!-- <?php echo form_fieldset_close(); ?> -->
        <!-- <?php echo form_fieldset('Family'); ?> -->
        <!-- <div class="form-group">
          <?php echo form_label('relationship:','relationship',array('class'=>'control-label col-md-2')); ?>
          <div class="col-md-10">
            <?php echo form_dropdown(array('name'=>'relationship','class'=>'form-control'),array('1'=>'พ่อ','2'=>'แม่','3'=>'พี่','4'=>'น้อง','5'=>'5'),set_value('relationship')); ?>
          </div>
        </div> -->
        <div class="form-group">
          <?php echo form_label('how to educate:','',array('class'=>'control-label col-md-2')); ?>
          <div class="col-md-5">
            <?php $edu = array(''=>'เลือกรายการ','บรรยาย'=>'บรรยาย','จัดบอร์ด'=>'จัดบอร์ด','ให้ความรู้ คำปรึกษาแนะนำจากบุคลากรและทีมงาน'=>'ให้ความรู้ คำปรึกษาแนะนำจากบุคลากรและทีมงาน');
            echo form_dropdown(array('name'=>'','class'=>'form-control'),$edu,set_value('')); ?>
          </div>
        </div>
        <div class="form-group">
          <?php echo form_label('assessment:','',array('class'=>'control-label col-md-2')); ?>
          <div class="col-md-5">
            <?php $ass = array(''=>'เลือกรายการ','มากที่สุด'=>'มากที่สุด','มาก'=>'มาก','ปานกลาง'=>'ปานกลาง','น้อย'=>'น้อย','ควรปรับปรุง'=>'ควรปรับปรุง');
            echo form_dropdown(array('name'=>'','class'=>'form-control'),$ass,set_value('')); ?>
          </div>
        </div>
        <div class="form-group">
          <?php echo form_label('endoscope result:','endoscope_result',array('class'=>'control-label col-md-2')); ?>
          <div class="col-md-5">
            <?php $res = array(''=>'เลือกรายการ','normal'=>'normal','polyp'=>'polyp','tumor'=>'tumor');
            echo form_dropdown(array('name'=>'','class'=>'form-control'),$res,set_value('')); ?>
          </div>
        </div>
        <!-- <div class="form-group">
          <?php echo form_label('protection:','',array('class'=>'control-label col-md-2')); ?>
          <div class="col-md-10">
            <div class="checkbox">
              <label> <?php echo form_checkbox(array('name'=>'protection','class'=>'form-control'),''); ?> แนะนำให้ทำการตรวจลำไส้ด้วยการส่องกล้อง เริ่มก่อน 10 ปี </label>
              <p class="help-block"></p>
            </div>
            <div class="checkbox">
              <label><?php echo form_checkbox(array('name'=>'protection','class'=>'form-control'),''); ?> แนะนำให้ทำการตรวจลำไส้ด้วยการส่องกล้อง เริ่มตั้งแต่อายุ 20-25 ปี </label>
              <p class="help-block"></p>
            </div>
            <div class="checkbox">
              <label><?php echo form_checkbox(array('name'=>'protection','class'=>'form-control'),''); ?>
                ตรวจภายในและติดตามระดับสารบ่งชี้มะเร็ง CA-125 ในเลือด ตรวจทุกๆ 2 ปี ให้เริ่มเมื่ออายุ 30 ปี เพื่อป้องกันมะเร็งโพรงมดลูกและรังไข่
              </label>
              <p class="help-block"></p>
            </div>
            <div class="checkbox">
              <label><?php echo form_checkbox(array('name'=>'protection','class'=>'form-control'),''); ?>
                ส่องกล้องดูกระเพาะอาหารและลำไส้เล็กและตรวจวัดระดับค่าการทำงานของตับหรืออัลตร้าซาวด์ตับทุกๆ 2 ปี เพื่อตรวจหาความผิดปกติของกระเพาะอาหารและระบบทางเดินน้ำดี
              </label>
              <p class="help-block"></p>
            </div>
            <div class="checkbox">
              <label><?php echo form_checkbox(array('name'=>'protection','class'=>'form-control'),''); ?>
                ตรวจปัสสาวะทุกปีหรือทำการส่องกล้องของระบบทางเดินปัสสาวะทุก 2 ปี เพื่อตรวจหาเนื้องอกของระบบทางเดินปัสสาวะตั้งแต่ 30 ปี
              </label>
              <p class="help-block"></p>
            </div>
            <div class="checkbox">
              <label><?php echo form_checkbox(array('name'=>'protection','class'=>'form-control'),''); ?>
                การให้คำแนะนำด้านโภชนาการที่สอดคล้องกับผลการวินิจฉัยของแพทย์ตามมาตรฐานในการดูแลผู้ป่วยด้านโภชนบำบัด
              </label>
              <p class="help-block"></p>
            </div>
            <div class="checkbox">
              <label><?php echo form_input(array('name'=>'protection','class'=>'form-control','placeholder'=>'อื่นๆ ระบุ')); ?></label>
              <p class="help-block"></p>
            </div>
          </div>
        </div> -->
        <!-- <div class="form-group">
          <?php echo form_label('treatment:','treatment planning',array('class'=>'control-label col-md-2')); ?>
          <div class="col-md-10">
            <div class="checkbox">
              <label> <?php echo form_checkbox(array('name'=>'treatment','class'=>'form-control'),''); ?> นัด Fu </label>
              <p class="help-block"></p>
            </div>
            <div class="checkbox">
              <label> <?php echo form_checkbox(array('name'=>'treatment','class'=>'form-control'),''); ?> ผ่าตัด </label>
              <p class="help-block"></p>
            </div>
            <div class="checkbox">
              <label> <?php echo form_checkbox(array('name'=>'treatment','class'=>'form-control'),''); ?> รับยาเคมีบำบัด </label>
              <p class="help-block"></p>
            </div>
            <div class="checkbox">
              <label><?php echo form_input(array('name'=>'treatment','class'=>'form-control','placeholder'=>'อื่นๆ ระบุ')); ?></label>
              <p class="help-block"></p>
            </div>
          </div>
        </div> -->
        <?php echo form_fieldset_close(); ?>

        <?php echo form_fieldset('Privileges'); ?>
        <div class="form-group">
          <?php echo form_label('groups:','groups',array('class'=>'control-label col-md-2')); ?>
          <div class="col-md-10">
            <?php $grp = array(''=>'เลือกรายการ','FAP'=>'FAP','HNPCC'=>'HNPCC','PJS/JPS'=>'PJS/JPS','OTHER'=>'OTHER');
            echo form_dropdown(array('name'=>'','class'=>'form-control'),$grp,set_value('')); ?>
            <!-- <div class="radio-inline">
              <?php echo form_radio(array('name'=>'groups','class'=>'form-control'),'FAP'); ?> FAP
            </div>
            <div class="radio-inline">
              <?php echo form_radio(array('name'=>'groups','class'=>'form-control'),'HNPCC'); ?> HNPCC
            </div>
            <div class="radio-inline">
              <?php echo form_radio(array('name'=>'groups','class'=>'form-control'),'PJS/JPS'); ?> PJS/JPS
            </div>
            <div class="radio-inline">
              <?php echo form_radio(array('name'=>'groups','class'=>'form-control'),'OTHER'); ?> OTHER
            </div> -->
          </div>
        </div> <br>
        <div class="form-group">
          <?php echo form_label('types:','types',array('class'=>'control-label col-md-2')); ?>
          <div class="col-md-10">
            <div class="row">
              <div class="col-md-6">
                <?php $typ = array(''=>'เลือกรายการ','คนไข้ออกหน่วย'=>'คนไข้ออกหน่วย','กลุ่ม CRC of PSU'=>'กลุ่ม CRC of PSU','คนไข้ CRC ส่งต่อ'=>'คนไข้ CRC ส่งต่อ');
                echo form_dropdown(array('name'=>'','class'=>'form-control','id'=>'types'),$typ,set_value('')); ?>
              </div>
              <div class="col-md-6">
                <div class="input-group">
                  <?php echo form_number(array('name'=>'times','class'=>'form-control','id'=>'times','placeholder'=>'ครั้งที่'),set_value('times')); ?>
                  <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                </div>
              </div>
            </div>
            <!-- <div class="radio">
              <label><?php echo form_radio(array('name'=>'types','class'=>'form-control'),'คนไข้ออกหน่วย'); ?> คนไข้ออกหน่วย</label>
            </div>
            <div class="radio">
              <label><?php echo form_radio(array('name'=>'types','class'=>'form-control'),'กลุ่ม CRC of PSU'); ?> กลุ่ม CRC of PSU</label>
              <p class="help-block"></p>
            </div>
            <div class="radio">
              <label><?php echo form_radio(array('name'=>'types','class'=>'form-control'),'คนไข้ CRC ส่งต่อ'); ?> คนไข้ CRC ส่งต่อ</label>
              <p class="help-block"></p>
            </div> -->
          </div>
        </div>
        <!-- <div class="form-group">
          <?php echo form_label('insurance:','health insurance',array('class'=>'control-label col-md-2')); ?>
          <div class="col-md-10">
            <div class="radio">
              <label><?php echo form_radio(array('name'=>'insurance','class'=>'form-control'),'ผู้ยากไร้'); ?>ผู้ยากไร้</label>
              <p class="help-block"></p>
            </div>
            <div class="radio">
              <label><?php echo form_radio(array('name'=>'insurance','class'=>'form-control'),'บัตรประกันสุขภาพถ้วนหน้า'); ?>บัตรประกันสุขภาพถ้วนหน้า</label>
              <p class="help-block"></p>
            </div>
            <div class="radio">
              <label><?php echo form_radio(array('name'=>'insurance','class'=>'form-control'),'บัตรประกันสังคม'); ?>บัตรประกันสังคม</label>
              <p class="help-block"></p>
            </div>
            <div class="radio">
              <label><?php echo form_radio(array('name'=>'insurance','class'=>'form-control'),'ข้าราชการ'); ?>ข้าราชการ</label>
              <p class="help-block"></p>
            </div>
            <div class="radio">
              <label><?php echo form_radio(array('name'=>'insurance','class'=>'form-control'),'องค์กรปกครองส่วนท้องถิ่น'); ?>องค์กรปกครองส่วนท้องถิ่น</label>
              <p class="help-block"></p>
            </div>
            <div class="checkbox">
              <label><?php echo form_input(array('name'=>'insurance','class'=>'form-control','placeholder'=>'อื่นๆ ระบุ')); ?></label>
              <p class="help-block"></p>
            </div>
          </div>
        </div> -->
        <?php echo form_fieldset_close(); ?>

        <?php echo form_fieldset('Support Money'); ?>
        <!-- <div class="form-group">
          <?php echo form_label('all cost:','',array('class'=>'control-label col-md-2')); ?>
          <div class="col-md-4">
            <div class="input-group">
              <?php echo form_number(array('name'=>'','class'=>'form-control','placeholder'=>'ค่าบริการทั้งหมด'),set_value('')); ?>
              <span class="input-group-addon">฿</span>
            </div>
          </div>
          <p class="help-block col-md-6">* input number only</p>
        </div>
        <div class="form-group">
          <?php echo form_label('service 1:','',array('class'=>'control-label col-md-2')); ?>
          <div class="col-md-4">
            <div class="input-group">
              <?php echo form_number(array('name'=>'','class'=>'form-control','placeholder'=>'ค่าบริการตรวจโดยการส่องกล้อง'),set_value('')); ?>
              <span class="input-group-addon">฿</span>
            </div>
          </div>
          <p class="help-block col-md-6">* input number only</p>
        </div>
        <div class="form-group">
          <?php echo form_label('service 2:','',array('class'=>'control-label col-md-2')); ?>
          <div class="col-md-4">
            <div class="input-group">
              <?php echo form_number(array('name'=>'','class'=>'form-control','placeholder'=>'ค่ารักษาพยาบาลและบริการอื่นๆ'),set_value('')); ?>
              <span class="input-group-addon">฿</span>
            </div>
          </div>
          <p class="help-block col-md-6">* input number only</p>
        </div>
        <div class="form-group">
          <?php echo form_label('transport:','',array('class'=>'control-label col-md-2')); ?>
          <div class="col-md-4">
            <div class="input-group">
              <?php echo form_number(array('name'=>'','class'=>'form-control','placeholder'=>'ค่าพาหนะ'),set_value('')); ?>
              <span class="input-group-addon">฿</span>
            </div>
          </div>
          <p class="help-block col-md-6">* input number only</p>
        </div>
        <div class="form-group">
          <?php echo form_label('etc.:','',array('class'=>'control-label col-md-2')); ?>
          <div class="col-md-4">
            <div class="input-group">
              <?php echo form_number(array('name'=>'','class'=>'form-control','placeholder'=>'อื่นๆ(ระบุ)'),set_value('')); ?>
              <span class="input-group-addon">฿</span>
            </div>
          </div>
          <p class="help-block col-md-6">* input number only</p>
        </div> -->
        <?php echo form_fieldset_close(); ?>

      </div>
      <div class="box-footer clearfix"></div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="box box-info">
      <div class="box-header"> </div>
      <div class="box-body">
        <h4><i class="fa fa-info-circle"></i> message(s)</h4><hr>
        <?php echo $this->session->flashdata('message'); ?>
      </div>
      <div class="box-footer clearfix">
        <?=anchor(uri_string(),'<i class="fa fa-refresh"></i>',array('class'=>'btn btn-default'));?>
        <span class="pull-right">
          <?=form_submit('','Submit',array('class'=>'btn btn-success',''=>'','autocomplete'=>'off'));?>
        </span>
      </div>
    </div>
  </div>
  <?php echo form_close(); ?>
</div>

<!-- <?=script_tag('assets/admin/js/plugins/autoprovince/autoprovince.js');?> -->
<script type="text/javascript">
$(function() {
  // $('div#address').AutoProvince({
  //   PROVINCE: '#province',
  //   AMPHUR: '#amphur',
  //   DISTRICT: '#district',
  //   POSTCODE: '#postcode',
  //   arrangeByName: false
  // });

  var types = $('#types');
  var times = $('#times');
  times.prop('disabled',true);
  types.on('change',function(){
    if (this.value == 'คนไข้ออกหน่วย') {
      times.prop('disabled',false);
    } else {
      times.prop('disabled',true);
    }
  });

});
</script>
