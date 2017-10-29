<div class="row">
  <?php echo form_open(uri_string(),array('class'=>'form-horizontal')); ?>
  <div class="col-md-8">
    <div class="box-group " id="accordion">

      <div class="panel box box-primary">
        <div class="box-header with-border"> <h4 class="box-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" class="collapsed"> <?php echo form_fieldset('ข้อมูลทั่วไป'); ?> </a> </h4> </div>
        <div id="collapseOne" class="panel-collapse collapse in" aria-expanded="true">
          <div class="box-body">
            <div class="form-group">
              <?php echo form_label('หมายเลขบัตรประชาชน:','id_card',array('class'=>'control-label col-md-2')); ?>
              <div class="col-md-10">
                <div class="input-group">
                  <?php echo form_input(array('name'=>'id_card','class'=>'form-control','placeholder'=>'หมายเลขบัตรประชาชน','maxlength'=>'13','pattern'=>'[0-9]{13}'),set_value('id_card')); ?>
                  <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <?php echo form_label('ชื่อ-นามสกุล:','',array('class'=>'control-label col-md-2')); ?>
              <div class="col-md-2"> <?php $tt = array(''=>'คำนำหน้าชื่อ','นาย'=>'นาย','นาง'=>'นาง','นางสาว'=>'นางสาว'); echo form_dropdown(array('name'=>'title','class'=>'form-control'),$tt,set_value('title')); ?> </div>
              <div class="col-md-3"> <?php echo form_input(array('name'=>'firstname','class'=>'form-control','placeholder'=>'ชื่อ'),set_value('firstname')); ?> </div>
              <div class="col-md-5"> <?php echo form_input(array('name'=>'lastname','class'=>'form-control','placeholder'=>'นามสกุล'),set_value('lastname')); ?> </div>
            </div>
            <div class="form-group">
              <?php echo form_label('อายุ:','age',array('class'=>'control-label col-md-2')); ?>
              <div class="col-md-4"> <?php echo form_input(array('name'=>'age','class'=>'form-control','placeholder'=>'อายุ'),set_value('age')); ?> </div>
              <?php echo form_label('H.N.:','hn',array('class'=>'control-label col-md-2')); ?>
              <div class="col-md-4"> <?php echo form_input(array('name'=>'hn','class'=>'form-control','placeholder'=>'รหัสผู้ป่วย(H.N.)'),set_value('hn')); ?> </div>
            </div>
            <div class="form-group">
              <?php echo form_label('ข้อมูลประวัติและครอบครัว:','history',array('class'=>'control-label col-md-2')); ?>
              <div class="col-md-10"> <?php echo form_textarea(array('name'=>'history','class'=>'form-control','placeholder'=>'ประวัติส่วนตัว'),set_value('history')); ?> </div>
            </div>
            <div class="" id="address">
              <div class="form-group">
                <?php echo form_label('ที่อยู่ตามบัตรประชาชน:','',array('class'=>'control-label col-md-2')); ?>
                <div class="col-md-2"> <?php echo form_input(array('name'=>'address[number]','class'=>'form-control','placeholder'=>'ที่อยู่'),set_value('address[number]')); ?> </div>
                <div class="col-md-2"> <?php echo form_input(array('name'=>'address[soi]','class'=>'form-control','placeholder'=>'ซอย'),set_value('address[soi]')); ?> </div>
                <div class="col-md-4"> <?php echo form_input(array('name'=>'address[street]','class'=>'form-control','placeholder'=>'ถนน'),set_value('address[street]')); ?> </div>
                <div class="col-md-2"> <?php echo form_input(array('name'=>'address[moo]','class'=>'form-control','placeholder'=>'หมู่'),set_value('address[moo]')); ?> </div>
              </div>
              <div class="form-group">
                <?php echo form_label('ตำบล:','',array('class'=>'control-label col-md-2')); ?>
                <div class="col-md-4"> <?php echo form_input(array('name'=>'address[tambon]','class'=>'form-control','id'=>'tambon','placeholder'=>'ตำบล'),set_value('address[tambon]')); ?> </div>
                <?php echo form_label('อำเภอ:','amphur',array('class'=>'control-label col-md-2')); ?>
                <div class="col-md-4"> <?php echo form_input(array('name'=>'address[amphur]','class'=>'form-control','id'=>'amphur','placeholder'=>'อำเภอ'),set_value('address[amphur]')); ?> </div>
              </div>
              <div class="form-group">
                <?php echo form_label('จังหวัด:','',array('class'=>'control-label col-md-2')); ?>
                <div class="col-md-4"> <?php echo form_input(array('name'=>'address[province]','class'=>'form-control','id'=>'province','placeholder'=>'จังหวัด'),set_value('address[province]')); ?> </div>
                <?php echo form_label('รหัสไปรษณีย์:','',array('class'=>'control-label col-md-2')); ?>
                <div class="col-md-4"> <?php echo form_input(array('name'=>'address[zip]','class'=>'form-control','id'=>'zip','placeholder'=>'รหัสไปรษณีย์'),set_value('address[zip]')); ?> </div>
              </div>
            </div>
            <div class="well well-sm">
              <div class="form-group">
                <?php echo form_label('','same_address',array('class'=>'control-label col-md-2')); ?>
                <div class="col-md-4"> <?php echo form_checkbox(array('name'=>'same_address','class'=>'form-control','id'=>'same_address'),'1'); ?> ใช้ที่อยู่ตามบัตร </div>
              </div>
              <div id="same_address_ctn">
                <div class="form-group">
                  <?php echo form_label('ที่อยู่ปัจจุบัน:','',array('class'=>'control-label col-md-2')); ?>
                  <div class="col-md-2"> <?php echo form_input(array('name'=>'address_current[number]','class'=>'form-control','placeholder'=>'number'),set_value('address_current[number]')); ?> </div>
                  <div class="col-md-2"> <?php echo form_input(array('name'=>'address_current[soi]','class'=>'form-control','placeholder'=>'soi'),set_value('address_current[soi]')); ?> </div>
                  <div class="col-md-4"> <?php echo form_input(array('name'=>'address_current[street]','class'=>'form-control','placeholder'=>'street'),set_value('address_current[street]')); ?> </div>
                  <div class="col-md-2"> <?php echo form_input(array('name'=>'address_current[moo]','class'=>'form-control','placeholder'=>'moo'),set_value('address_current[moo]')); ?> </div>
                </div>
                <div class="form-group">
                  <?php echo form_label('ตำบล:','',array('class'=>'control-label col-md-2')); ?>
                  <div class="col-md-4"> <?php echo form_input(array('name'=>'address_current[tambon]','class'=>'form-control','id'=>'','placeholder'=>'tambon'),set_value('address_current[tambon]')); ?> </div>
                  <?php echo form_label('อำเภอ:','',array('class'=>'control-label col-md-2')); ?>
                  <div class="col-md-4"> <?php echo form_input(array('name'=>'address_current[amphur]','class'=>'form-control','id'=>'','placeholder'=>'amphur'),set_value('address_current[amphur]')); ?> </div>
                </div>
                <div class="form-group">
                  <?php echo form_label('จังหวัด:','',array('class'=>'control-label col-md-2')); ?>
                  <div class="col-md-4"> <?php echo form_input(array('name'=>'address_current[province]','class'=>'form-control','id'=>'','placeholder'=>'province'),set_value('address_current[province]')); ?> </div>
                  <?php echo form_label('รหัสไปรษณีย์:','',array('class'=>'control-label col-md-2')); ?>
                  <div class="col-md-4"> <?php echo form_input(array('name'=>'address_current[zip]','class'=>'form-control','id'=>'','placeholder'=>'zip'),set_value('address_current[zip]')); ?> </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <?php echo form_label('โทรศัพท์:','phone',array('class'=>'control-label col-md-2')); ?>
              <div class="col-md-4"> <?php echo form_input(array('name'=>'phone','class'=>'form-control','placeholder'=>'เบอร์โทรศัพท์'),set_value('phone')); ?> </div>
              <?php echo form_label('มือถือ:','mobile',array('class'=>'control-label col-md-2')); ?>
              <div class="col-md-4"> <?php echo form_input(array('name'=>'mobile','class'=>'form-control','placeholder'=>'โทรศัพท์มือถือ','max_length'=>'10'),set_value('mobile')); ?> </div>
            </div>
            <div class="form-group">
              <?php echo form_label('อยู่ในฐานะ:','',array('class'=>'control-label col-md-2')); ?>
              <div class="col-md-4">
                <?php $rs = array(''=>'เลือกรายการ','ผู้ป่วย'=>'ผู้ป่วย','ปู่/ตาของผู้ป่วย'=>'ปู่/ตาของผู้ป่วย','ย่า/ยายของผู้ป่วย'=>'ย่า/ยายของผู้ป่วย',
                'ลุง/อาของผู้ป่วย'=>'ลุง/อาของผู้ป่วย','ป้า/น้าของผู้ป่วย'=>'ป้า/น้าของผู้ป่วย','พ่อของผู้ป่วย'=>'พ่อของผู้ป่วย','แม่ของผู้ป่วย'=>'แม่ของผู้ป่วย',
                'คู่สมรสของผู้ป่วย'=>'คู่สมรสของผู้ป่วย','พี่/น้องของผู้ป่วย'=>'พี่/น้องของผู้ป่วย','บุตร/ธิดาของผู้ป่วย'=>'บุตร/ธิดาของผู้ป่วย');
                echo form_dropdown(array('name'=>'relationship','class'=>'form-control','id'=>'relationship'),$rs,set_value('relationship')); ?>
              </div>
              <?php echo form_label('มีความสัมพันธ์กับ:','',array('class'=>'control-label col-md-2')); ?>
              <div class="col-md-4">
                <?php echo form_input(array('name'=>'relationship_by','class'=>'form-control','id'=>'relationship_by','placeholder'=>'รหัสผู้ป่วย(H.N.)'),set_value('relationship_by')); ?>
              </div>
            </div>
            <div class="form-group">
              <?php echo form_label('กลุ่มผู้ป่วย:','',array('class'=>'control-label col-md-2')); ?>
              <div class="col-md-10">
                <?php $grp = array(''=>'เลือกรายการ','FAP'=>'FAP','HNPCC'=>'HNPCC','PJS/JPS'=>'PJS/JPS','OTHER'=>'OTHER');
                echo form_dropdown(array('name'=>'groups','class'=>'form-control'),$grp,set_value('groups')); ?>
                <p class="help-block"></p>
              </div>
            </div>
            <div class="form-group">
              <?php echo form_label('ประเภทผู้ป่วย:','',array('class'=>'control-label col-md-2')); ?>
              <div class="col-md-10">
                <div class="row">
                  <div class="col-md-6">
                    <?php $typ = array(''=>'เลือกรายการ','คนไข้ออกหน่วย'=>'คนไข้ออกหน่วย','กลุ่ม CRC of PSU'=>'กลุ่ม CRC of PSU','คนไข้ CRC ส่งต่อ'=>'คนไข้ CRC ส่งต่อ');
                    echo form_dropdown(array('name'=>'types','class'=>'form-control','id'=>'types'),$typ,set_value('types')); ?>
                  </div>
                  <div class="col-md-6">
                    <div class="input-group">
                      <?php echo form_input(array('name'=>'times','class'=>'form-control','id'=>'times','placeholder'=>'ครั้งที่'),set_value('times')); ?>
                      <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php echo form_fieldset_close(); ?>
      </div>

      <div class="panel box box-primary">
        <div class="box-header with-border"> <h4 class="box-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed" aria-expanded="false"> <?php echo form_fieldset('ข้อมูลการคัดกรอง'); ?> </a> </h4> </div>
        <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
          <div class="box-body">
            <div class="form-group">
              <?php echo form_label('','activity',array('class'=>'control-label col-md-2')); ?>
              <div class="col-md-10">
                <div class="checkbox">
                  <?php echo form_checkbox(array('name'=>'activity[1]','class'=>'form-control'),'1',set_select('activity[1]')); ?>
                  รับประทานอาหารมันๆ เป็นประจำ <small class="pull-right">[1]</small>
                  <p class="help-block"></p>
                </div>
                <div class="checkbox">
                  <?php echo form_checkbox(array('name'=>'activity[2]','class'=>'form-control'),'1',set_select('activity[2]')); ?>
                  รับประทานเน้ือสัตว์ระเภททอดปิ้งย่างไส้กรอกกุนเชียงบ่อยๆ <small class="pull-right">[1]</small>
                  <p class="help-block"></p>
                </div>
                <div class="checkbox">
                  <?php echo form_checkbox(array('name'=>'activity[3]','class'=>'form-control'),'1',set_select('activity[3]')); ?>
                  อ้วน <small class="pull-right">[1]</small>
                  <p class="help-block"></p>
                </div>
                <div class="checkbox">
                  <?php echo form_checkbox(array('name'=>'activity[4]','class'=>'form-control'),'1',set_select('activity[4]')); ?>
                  เป็นโรคเบาหวาน <small class="pull-right">[1]</small>
                  <p class="help-block"></p>
                </div>
                <div class="checkbox">
                  <?php echo form_checkbox(array('name'=>'activity[5]','class'=>'form-control'),'3',set_select('activity[5]')); ?>
                  ท้องผูกสลับท้องเสีย <small class="pull-right">[3]</small>
                  <p class="help-block"></p>
                </div>
                <div class="checkbox">
                  <?php echo form_checkbox(array('name'=>'activity[6]','class'=>'form-control'),'3',set_select('activity[6]')); ?>
                  ถ่ายอุจจาระไม่สุด(รู้สึกว่าถ่ายไม่หมด) <small class="pull-right">[3]</small>
                  <p class="help-block"></p>
                </div>
                <div class="checkbox">
                  <?php echo form_checkbox(array('name'=>'activity[7]','class'=>'form-control'),'3',set_select('activity[7]')); ?>
                  เคยอุจจาระมีเลือดปน <small class="pull-right">[3]</small>
                  <p class="help-block"></p>
                </div>
                <div class="checkbox">
                  <?php echo form_checkbox(array('name'=>'activity[8]','class'=>'form-control'),'9',set_select('activity[8]')); ?>
                  ลักษณะอุจจาระลีบ เล็ก แบน <small class="pull-right">[9]</small>
                  <p class="help-block"></p>
                </div>
                <div class="checkbox">
                  <?php echo form_checkbox(array('name'=>'activity[9]','class'=>'form-control'),'10',set_select('activity[9]')); ?>
                  เคยตรวจพบติ่งเนื้อในลำไส้ <small class="pull-right">[10]</small>
                  <p class="help-block"></p>
                </div>
                <div class="checkbox">
                  <?php echo form_checkbox(array('name'=>'activity[10]','class'=>'form-control'),'12',set_select('activity[10]')); ?>
                  มีญาติที่ใกล้ชิดกันโดยสายเลือดเช่น พ่อ แม่ พี่ น้อง เป็นโรคมะเร็งลำไส้ใหญ่เมื่ออายุมากกว่า 50 ปี <small class="pull-right">[12]</small>
                  <p class="help-block"></p>
                </div>
                <div class="checkbox">
                  <?php echo form_checkbox(array('name'=>'activity[11]','class'=>'form-control'),'11',set_select('activity[11]')); ?>
                  มีญาติที่ใกล้ชิดกันโดยสายเลือดเช่น พ่อ แม่ พี่ น้อง เป็นโรคมะเร็งลำไส้ใหญ่เมื่ออายุน้อยกว่า 50 ปี <small class="pull-right">[11]</small>
                  <p class="help-block"></p>
                </div>
              </div>
            </div>
            <div class="form-group">
              <?php echo form_label('วิธีการให้ความรู้:','',array('class'=>'control-label col-md-2')); ?>
              <div class="col-md-10">
                <?php $edu = array(''=>'เลือกรายการ','บรรยาย'=>'บรรยาย','จัดบอร์ด'=>'จัดบอร์ด','ให้ความรู้ คำปรึกษาแนะนำจากบุคลากรและทีมงาน'=>'ให้ความรู้ คำปรึกษาแนะนำจากบุคลากรและทีมงาน');
                echo form_dropdown(array('name'=>'filtered[educate]','class'=>'form-control'),$edu,set_value('filtered[educate]')); ?>
              </div>
            </div>
            <div class="form-group">
              <?php echo form_label('การประเมินผล:','',array('class'=>'control-label col-md-2')); ?>
              <div class="col-md-10">
                <?php $ass = array(''=>'เลือกรายการ','มากที่สุด'=>'มากที่สุด','มาก'=>'มาก','ปานกลาง'=>'ปานกลาง','น้อย'=>'น้อย','ควรปรับปรุง'=>'ควรปรับปรุง');
                echo form_dropdown(array('name'=>'filtered[assessment]','class'=>'form-control'),$ass,set_value('filtered[assessment]')); ?>
              </div>
            </div>
            <div class="form-group">
              <?php echo form_label('ผลการส่องกล้อง:','',array('class'=>'control-label col-md-2')); ?>
              <div class="col-md-10">
                <?php $res = array(''=>'เลือกรายการ','NORMAL'=>'NORMAL','POLYP'=>'POLYP','TUMOR'=>'TUMOR');
                echo form_dropdown(array('name'=>'filtered[endoscope]','class'=>'form-control'),$res,set_value('filtered[endoscope]')); ?>
              </div>
            </div>
            <div class="form-group">
              <?php echo form_label('แนวทางการป้องกัน:','',array('class'=>'control-label col-md-2')); ?>
              <div class="col-md-10">
                <?php $pt = array('แนะนำให้ทำการตรวจลำไส้ด้วยการส่องกล้อง เริ่มก่อน 10 ปี'=>'แนะนำให้ทำการตรวจลำไส้ด้วยการส่องกล้อง เริ่มก่อน 10 ปี',
                  'แนะนำให้ทำการตรวจลำไส้ด้วยการส่องกล้อง เริ่มตั้งแต่อายุ 20-25 ปี'=>'แนะนำให้ทำการตรวจลำไส้ด้วยการส่องกล้อง เริ่มตั้งแต่อายุ 20-25 ปี',
                  'ตรวจภายในและติดตามระดับสารบ่งชี้มะเร็ง CA-125 ในเลือด ตรวจทุกๆ 2 ปี ให้เริ่มเมื่ออายุ 30 ปี เพื่อป้องกันมะเร็งโพรงมดลูกและรังไข่'=>'ตรวจภายในและติดตามระดับสารบ่งชี้มะเร็ง CA-125 ในเลือด ตรวจทุกๆ 2 ปี ให้เริ่มเมื่ออายุ 30 ปี เพื่อป้องกันมะเร็งโพรงมดลูกและรังไข่',
                  'ส่องกล้องดูกระเพาะอาหารและลำไส้เล็กและตรวจวัดระดับค่าการทำงานของตับหรืออัลตร้าซาวด์ตับทุกๆ 2 ปี เพื่อตรวจหาความผิดปกติของกระเพาะอาหารและระบบทางเดินน้ำดี'=>'ส่องกล้องดูกระเพาะอาหารและลำไส้เล็กและตรวจวัดระดับค่าการทำงานของตับหรืออัลตร้าซาวด์ตับทุกๆ 2 ปี เพื่อตรวจหาความผิดปกติของกระเพาะอาหารและระบบทางเดินน้ำดี',
                  'ตรวจปัสสาวะทุกปีหรือทำการส่องกล้องของระบบทางเดินปัสสาวะทุก 2 ปี เพื่อตรวจหาเนื้องอกของระบบทางเดินปัสสาวะตั้งแต่ 30 ปี'=>'ตรวจปัสสาวะทุกปีหรือทำการส่องกล้องของระบบทางเดินปัสสาวะทุก 2 ปี เพื่อตรวจหาเนื้องอกของระบบทางเดินปัสสาวะตั้งแต่ 30 ปี',
                  'การให้คำแนะนำด้านโภชนาการที่สอดคล้องกับผลการวินิจฉัยของแพทย์ตามมาตรฐานในการดูแลผู้ป่วยด้านโภชนบำบัด'=>'การให้คำแนะนำด้านโภชนาการที่สอดคล้องกับผลการวินิจฉัยของแพทย์ตามมาตรฐานในการดูแลผู้ป่วยด้านโภชนบำบัด');
                  echo form_dropdown(array('name'=>'protect','class'=>'form-control','id'=>'pt'),$pt,set_value('protect'));?>
              </div>
            </div>
            <div class="form-group">
              <?php echo form_label('แนวทางการรักษา:','',array('class'=>'control-label col-md-2')); ?>
              <div class="col-md-10">
                <?php $tp = array('นัด Fu'=>'นัด Fu','ผ่าตัด'=>'ผ่าตัด','รับยาเคมีบำบัด'=>'รับยาเคมีบำบัด');
                  echo form_dropdown(array('name'=>'treatment_planning','class'=>'form-control','id'=>'tp'),$tp,set_value('treatment_planning'));?>
              </div>
            </div>
          </div>
        </div>
        <?php echo form_fieldset_close(); ?>
      </div>

      <div class="panel box box-primary">
        <div class="box-header with-border"> <h4 class="box-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" class="collapsed"> <?php echo form_fieldset('สิทธิ์ประกันสังคมและค่ารักษาพยาบาล'); ?> </a> </h4> </div>
        <div id="collapseFive" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
          <div class="box-body">
            <div class="form-group">
              <?php echo form_label('สิทธิ์ประกัน:','',array('class'=>'control-label col-md-2')); ?>
              <div class="col-md-10">
                <?php $lf = array('ผู้ยากไร้'=>'ผู้ยากไร้','บัตรประกันสุขภาพถ้วนหน้า'=>'บัตรประกันสุขภาพถ้วนหน้า','บัตรประกันสังคม'=>'บัตรประกันสังคม','ข้าราชการ'=>'ข้าราชการ','องค์กรปกครองส่วนท้องถิ่น'=>'องค์กรปกครองส่วนท้องถิ่น');
                echo form_dropdown(array('name'=>'insurance[life]','class'=>'form-control','id'=>'lf'),$lf,set_value('insurance[life]')); ?>
              </div>
            </div>
            <div class="form-group">
              <?php echo form_label('ค่ารักษาพยาบาลทั้งหมด:','',array('class'=>'control-label col-md-2')); ?>
              <div class="col-md-4">
                <div class="input-group">
                  <?php echo form_input(array('name'=>'insurance[cost]','class'=>'form-control','placeholder'=>'ค่าบริการทั้งหมด'),set_value('insurance[cost]')); ?>
                  <span class="input-group-addon">฿</span>
                </div>
              </div>
              <p class="help-block col-md-6">* กรอกตัวเลขเท่านั้น</p>
            </div>
            <div class="form-group">
              <?php echo form_label('รายการที่ 1:','',array('class'=>'control-label col-md-2')); ?>
              <div class="col-md-4">
                <div class="input-group">
                  <?php echo form_input(array('name'=>'insurance[service1]','class'=>'form-control','placeholder'=>'ค่าบริการตรวจโดยการส่องกล้อง'),set_value('insurance[service1]')); ?>
                  <span class="input-group-addon">฿</span>
                </div>
              </div>
              <p class="help-block col-md-6">* กรอกตัวเลขเท่านั้น</p>
            </div>
            <div class="form-group">
              <?php echo form_label('รายการที่ 2:','',array('class'=>'control-label col-md-2')); ?>
              <div class="col-md-4">
                <div class="input-group">
                  <?php echo form_input(array('name'=>'insurance[service2]','class'=>'form-control','placeholder'=>'ค่ารักษาพยาบาลและบริการอื่นๆ'),set_value('insurance[service2]')); ?>
                  <span class="input-group-addon">฿</span>
                </div>
              </div>
              <p class="help-block col-md-6">* กรอกตัวเลขเท่านั้น</p>
            </div>
            <div class="form-group">
              <?php echo form_label('ค่าเดินทาง:','',array('class'=>'control-label col-md-2')); ?>
              <div class="col-md-4">
                <div class="input-group">
                  <?php echo form_input(array('name'=>'insurance[fare]','class'=>'form-control','placeholder'=>'ค่าพาหนะ'),set_value('insurance[fare]')); ?>
                  <span class="input-group-addon">฿</span>
                </div>
              </div>
              <p class="help-block col-md-6">* กรอกตัวเลขเท่านั้น</p>
            </div>
            <div class="form-group">
              <?php echo form_label('อื่นๆ:','',array('class'=>'control-label col-md-2')); ?>
              <div class="col-md-4">
                <div class="input-group">
                  <?php echo form_input(array('name'=>'insurance[etc]','class'=>'form-control','placeholder'=>'อื่นๆ(ระบุ)'),set_value('insurance[etc]')); ?>
                  <span class="input-group-addon">฿</span>
                </div>
              </div>
              <p class="help-block col-md-6">* กรอกตัวเลขเท่านั้น</p>
            </div>
          </div>
        </div>
        <?php echo form_fieldset_close(); ?>
      </div>

    </div>
  </div>
  <div class="col-md-4">
    <div class="box box-info">
      <div class="box-header"> </div>
      <div class="box-body">
        <h4><i class="fa fa-info-circle"></i> รายการแจ้งเตือน</h4><hr>
        <?php echo $this->session->flashdata('message'); ?>
      </div>
      <div class="box-footer clearfix">
        <?=anchor(uri_string(),'<i class="fa fa-refresh"></i>',array('class'=>'btn btn-default'));?>
        <span class="pull-right">
          <?=form_submit('','บันทึกข้อมูล',array('class'=>'btn btn-success','autocomplete'=>'off'));?>
        </span>
      </div>
    </div>
  </div>
  <?php echo form_close(); ?>
</div>

<?=link_tag('assets/admin/plugins/editable-select/editable-select.min.css');?>
<?=script_tag('assets/admin/plugins/editable-select/editable-select.min.js');?>
<!-- <?=script_tag('assets/admin/js/plugins/autoprovince/autoprovince.js');?> -->
<script type="text/javascript">
$(function() {
  // $('div#address').AutoProvince({
  //   DISTRICT: '#tambon',
  //   AMPHUR: '#amphur',
  //   PROVINCE: '#province',
  //   POSTCODE: '#zip',
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

  var same_address = $('#same_address');
  var same_address_ctn = $('#same_address_ctn :input');
  same_address.on('ifChanged',function(){
    same_address_ctn.prop('disabled',function(i,v){ return !v; });
  });

  var relationship = $('#relationship');
  var relationship_by = $('#relationship_by');
  relationship_by.prop('disabled',true);
  relationship.on('change',function(){
    if (this.value == 'ผู้ป่วย') {
      relationship_by.prop('disabled',true);
    } else {
      relationship_by.prop('disabled',false);
    }
  });

  $('#lf').editableSelect();
  $('#tp').editableSelect();
  $('#pt').editableSelect();

});
</script>
