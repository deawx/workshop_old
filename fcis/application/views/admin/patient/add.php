<div class="row">
  <?php echo form_open_multipart(uri_string(),array('class'=>'form-horizontal')); ?>
  <div class="col-md-8">
    <div class="box box-primary">
      <div class="box-header"> <!-- <h3 class="box-title">Add New Patient</h3> --> </div>
      <div class="box-body">
        <?php echo form_fieldset('Information'); ?>
        <div class="form-group">
          <?php echo form_label('personal id:','id_card',array('class'=>'control-label col-md-2')); ?>
          <div class="col-md-10">
            <?php echo form_input(array('name'=>'id_card','class'=>'form-control','placeholder'=>'personal id','maxlength'=>'13','pattern'=>'[0-9]{13}'),set_value('id_card')); ?>
          </div>
        </div>
        <div class="form-group">
          <?php echo form_label('fullname:','fullname',array('class'=>'control-label col-md-2')); ?>
          <div class="col-md-2">
            <?php echo form_dropdown(array('name'=>'title','class'=>'form-control'),array('นาย'=>'นาย','นาง'=>'นาง','นางสาว'=>'นางสาว')); ?>
          </div>
          <div class="col-md-3">
            <?php echo form_input(array('name'=>'firstname','class'=>'form-control','placeholder'=>'firstname','required'=>TRUE),set_value('firstname')); ?>
          </div>
          <div class="col-md-5">
            <?php echo form_input(array('name'=>'lastname','class'=>'form-control','placeholder'=>'lastname','required'=>TRUE),set_value('lastname')); ?>
          </div>
        </div>
        <div class="" id="address">
          <div class="form-group">
            <?php echo form_label('address:','',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-2">
              <?php echo form_input(array('name'=>'address_number','class'=>'form-control','placeholder'=>'number','required'=>TRUE),set_value('address_number')); ?>
            </div>
            <div class="col-md-2">
              <?php echo form_input(array('name'=>'address_soi','class'=>'form-control','placeholder'=>'soi','required'=>TRUE),set_value('address_soi')); ?>
            </div>
            <div class="col-md-4">
              <?php echo form_input(array('name'=>'address_street','class'=>'form-control','placeholder'=>'street','required'=>TRUE),set_value('address_street')); ?>
            </div>
            <div class="col-md-2">
              <?php echo form_number(array('name'=>'address_moo','class'=>'form-control','placeholder'=>'moo','required'=>TRUE),set_value('address_moo')); ?>
            </div>
          </div>
          <div class="form-group">
            <?php echo form_label('tambon:','tambon',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-4">
              <?php echo form_input(array('name'=>'address_tambon','class'=>'form-control','id'=>'district','placeholder'=>'tambon','required'=>TRUE),set_value('address_tambon')); ?>
            </div>
            <?php echo form_label('amphur:','amphur',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-4">
              <?php echo form_input(array('name'=>'address_amphur','class'=>'form-control','id'=>'amphur','placeholder'=>'amphur','required'=>TRUE),set_value('address_amphur')); ?>
            </div>
          </div>
          <div class="form-group">
            <?php echo form_label('province:','',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-4">
              <?php echo form_input(array('name'=>'address_province','class'=>'form-control','id'=>'province','placeholder'=>'province','required'=>TRUE),set_value('address_province')); ?>
            </div>
            <?php echo form_label('zipcode:','',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-4">
              <?php echo form_number(array('name'=>'address_zipcode','class'=>'form-control','id'=>'zipcode','placeholder'=>'zipcode','required'=>TRUE),set_value('address_zipcode')); ?>
            </div>
          </div>
          <div class="form-group">
            <?php echo form_label('telephone:','telephone',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-4">
              <?php echo form_number(array('name'=>'telephone','class'=>'form-control','placeholder'=>'telephone','required'=>TRUE),set_value('telephone')); ?>
            </div>
            <?php echo form_label('mobile:','mobile',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-4">
              <?php echo form_number(array('name'=>'mobile','class'=>'form-control','placeholder'=>'mobile','required'=>TRUE),set_value('mobile')); ?>
            </div>
          </div>
        </div>
        <div class="well" id="address_org">
          <div class="form-group">
            <?php echo form_label('','',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-4">
              <?php echo form_checkbox(array('name'=>'same_address','class'=>'form-control'),'same_address'); ?> SAME ADDRESS ON CARD
            </div>
          </div>
          <div class="form-group">
            <?php echo form_label('address on card:','',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-2">
              <?php echo form_input(array('name'=>'address_number','class'=>'form-control','placeholder'=>'number','required'=>TRUE),set_value('address_number')); ?>
            </div>
            <div class="col-md-2">
              <?php echo form_input(array('name'=>'address_soi','class'=>'form-control','placeholder'=>'soi','required'=>TRUE),set_value('address_soi')); ?>
            </div>
            <div class="col-md-4">
              <?php echo form_input(array('name'=>'address_street','class'=>'form-control','placeholder'=>'street','required'=>TRUE),set_value('address_street')); ?>
            </div>
            <div class="col-md-2">
              <?php echo form_number(array('name'=>'address_moo','class'=>'form-control','placeholder'=>'moo','required'=>TRUE),set_value('address_moo')); ?>
            </div>
          </div>
          <div class="form-group">
            <?php echo form_label('tambon:','tambon',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-4">
              <?php echo form_input(array('name'=>'address_tambon','class'=>'form-control','id'=>'district_org','placeholder'=>'tambon','required'=>TRUE),set_value('address_tambon')); ?>
            </div>
            <?php echo form_label('amphur:','amphur',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-4">
              <?php echo form_input(array('name'=>'address_amphur','class'=>'form-control','id'=>'amphur_org','placeholder'=>'amphur','required'=>TRUE),set_value('address_amphur')); ?>
            </div>
          </div>
          <div class="form-group">
            <?php echo form_label('province:','',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-4">
              <?php echo form_input(array('name'=>'address_province','class'=>'form-control','id'=>'province_org','placeholder'=>'province','required'=>TRUE),set_value('address_province')); ?>
            </div>
            <?php echo form_label('zipcode:','',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-4">
              <?php echo form_number(array('name'=>'address_zipcode','class'=>'form-control','id'=>'zipcode_org','placeholder'=>'zipcode','required'=>TRUE),set_value('address_zipcode')); ?>
            </div>
          </div>
          <div class="form-group">
            <?php echo form_label('telephone:','telephone',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-4">
              <?php echo form_number(array('name'=>'telephone','class'=>'form-control','placeholder'=>'telephone','required'=>TRUE),set_value('telephone')); ?>
            </div>
            <?php echo form_label('mobile:','mobile',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-4">
              <?php echo form_number(array('name'=>'mobile','class'=>'form-control','placeholder'=>'mobile','required'=>TRUE),set_value('mobile')); ?>
            </div>
          </div>
        </div>
        <?php echo form_fieldset_close(); ?>
        <?php echo form_fieldset('Filtered'); ?>
        <div class="form-group">
          <?php echo form_label('groups:','groups',array('class'=>'control-label col-md-2')); ?>
          <div class="col-md-10">
            <label class="radio-inline">
              <?php echo form_radio(array('name'=>'groups','class'=>'form-control'),'FAP',TRUE); ?> FAP
            </label>
            <label class="radio-inline">
              <?php echo form_radio(array('name'=>'groups','class'=>'form-control'),'HNPCC'); ?> HNPCC
            </label>
            <label class="radio-inline">
              <?php echo form_radio(array('name'=>'groups','class'=>'form-control'),'PJS/JPS'); ?> PJS/JPS
            </label>
            <label class="radio-inline">
              <?php echo form_radio(array('name'=>'groups','class'=>'form-control'),'OTHER'); ?> OTHER
            </label>
          </div>
        </div>
        <div class="form-group">
          <?php echo form_label('age:','age',array('class'=>'control-label col-md-2')); ?>
          <div class="col-md-4">
            <?php echo form_number(array('name'=>'age','class'=>'form-control','placeholder'=>'age','required'=>TRUE),set_value('age')); ?>
          </div>
          <?php echo form_label('hn:','hn',array('class'=>'control-label col-md-2')); ?>
          <div class="col-md-4">
            <?php echo form_number(array('name'=>'hn','class'=>'form-control','placeholder'=>'hn','required'=>TRUE),set_value('hn')); ?>
          </div>
        </div>
        <div class="form-group">
          <?php echo form_label('history and family:','history',array('class'=>'control-label col-md-2')); ?>
          <div class="col-md-10">
            <?php echo form_textarea(array('name'=>'history','class'=>'form-control','placeholder'=>'','required'=>TRUE),set_value('history')); ?>
          </div>
        </div>
        <div class="form-group">
          <?php echo form_label('types:','types',array('class'=>'control-label col-md-2')); ?>
          <div class="col-md-10">
            <div class="radio col-md-6">
              <label><?php echo form_radio(array('name'=>'types','class'=>'form-control'),'คนไข้ออกหน่วย',TRUE); ?> คนไข้ออกหน่วย</label>
              <p class="help-block"></p>
            </div>
            <div class="col-md-6">
              <?php echo form_number(array('name'=>'times','class'=>'form-control','placeholder'=>'times'),set_value('times')); ?>
            </div>
            <div class="radio">
              <label><?php echo form_radio(array('name'=>'types','class'=>'form-control'),'กลุ่ม CRC of PSU'); ?> กลุ่ม CRC of PSU</label>
              <p class="help-block"></p>
            </div>
            <div class="radio">
              <label><?php echo form_radio(array('name'=>'types','class'=>'form-control'),'คนไข้ CRC ส่งต่อ'); ?> คนไข้ CRC ส่งต่อ</label>
              <p class="help-block"></p>
            </div>
          </div>
        </div>
        <div class="form-group">
          <?php echo form_label('insurance:','health insurance',array('class'=>'control-label col-md-2')); ?>
          <div class="col-md-10">
            <div class="radio">
              <label><?php echo form_radio(array('name'=>'insurance','class'=>'form-control'),'ผู้ยากไร้',TRUE); ?>ผู้ยากไร้</label>
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
            <div class="radio col-md-6">
              <label><?php echo form_radio(array('name'=>'insurance','class'=>'form-control'),'na_province'); ?>อื่นๆ(ระบุจังหวัด)</label>
              <p class="help-block"></p>
            </div>
            <div class="col-md-6">
              <?php echo form_input(array('name'=>'insurance_province','class'=>'form-control','placeholder'=>'etc.'),set_value('insurance_province')); ?>
            </div>
          </div>
        </div>
        <div class="form-group">
          <?php echo form_label('support money:','',array('class'=>'control-label col-md-2')); ?>
          <div class="col-md-10">
            <div class="checkbox col-md-6">
              <label><?php echo form_checkbox(array('name'=>'','class'=>'form-control'),'ค่าบริการทั้งหมด'); ?>ค่าบริการทั้งหมด</label>
            </div>
            <div class="col-md-6">
              <?php echo form_number(array('name'=>'','class'=>'form-control','placeholder'=>'amount'),set_value('')); ?>
            </div>
          </div>
        </div>
        <div class="form-group">
          <?php echo form_label('','',array('class'=>'control-label col-md-2')); ?>
          <div class="col-md-10">
            <div class="checkbox col-md-6">
              <label style="padding-left:1.5em;"><?php echo form_checkbox(array('name'=>'','class'=>'form-control'),'ค่าบริการตรวจโดยการส่องกล้อง'); ?>ค่าบริการตรวจโดยการส่องกล้อง</label>
            </div>
            <div class="col-md-6">
              <?php echo form_number(array('name'=>'','class'=>'form-control','placeholder'=>'amount'),set_value('')); ?>
            </div>
          </div>
        </div>
        <div class="form-group">
          <?php echo form_label('','',array('class'=>'control-label col-md-2')); ?>
          <div class="col-md-10">
            <div class="checkbox col-md-6">
              <label style="padding-left:1.5em;"><?php echo form_checkbox(array('name'=>'','class'=>'form-control'),'ค่ารักษาพยาบาลและบริการอื่นๆ'); ?>ค่ารักษาพยาบาลและบริการอื่นๆ</label>
            </div>
            <div class="col-md-6">
              <?php echo form_number(array('name'=>'','class'=>'form-control','placeholder'=>'amount'),set_value('')); ?>
            </div>
          </div>
        </div>
        <div class="form-group">
          <?php echo form_label('','',array('class'=>'control-label col-md-2')); ?>
          <div class="col-md-10">
            <div class="checkbox col-md-6">
              <label><?php echo form_checkbox(array('name'=>'','class'=>'form-control'),'ค่าพาหนะ'); ?>ค่าพาหนะ</label>
            </div>
            <div class="col-md-6">
              <?php echo form_number(array('name'=>'','class'=>'form-control','placeholder'=>'amount'),set_value('')); ?>
            </div>
          </div>
        </div>
        <div class="form-group">
          <?php echo form_label('','',array('class'=>'control-label col-md-2')); ?>
          <div class="col-md-10">
            <div class="checkbox col-md-6">
              <label><?php echo form_checkbox(array('name'=>'','class'=>'form-control'),'อื่นๆ(ระบุ)'); ?>อื่นๆ(ระบุ)</label>
            </div>
            <div class="col-md-6">
              <?php echo form_number(array('name'=>'','class'=>'form-control','placeholder'=>'amount'),set_value('')); ?>
            </div>
          </div>
        </div>
        <?php echo form_fieldset_close(); ?>
        <?php echo form_fieldset('Family'); ?>
        <?php echo form_fieldset_close(); ?>
      </div>
      <div class="box-footer clearfix"></div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="box box-info">
      <div class="box-header"> <!-- <h3 class="box-title">Add New Patient</h3> --> </div>
      <div class="box-body">
        <h4><i class="fa fa-info-circle"></i> message(s)</h4><hr>
        <?php echo $this->session->flashdata('message'); ?>
        <br>
        <h4><i class="fa fa-info-circle"></i> file attachment</h4><hr>
        <div class="form-group" id="image-preview" style="margin:0 auto;">
          <?php echo form_label('Choose File','image-upload',array('class'=>'control-label','id'=>'image-label')); ?>
          <?php echo form_upload(array('name'=>'file','class'=>'form-control','id'=>'image-upload')); ?>
        </div>
        <br>
        <h4><i class="fa fa-info-circle"></i> file description</h4><hr>
        <p>* max file size 2 MB</p>
        <p>* mime type is only image/jpeg</p>
        <p>* file extension will change to .jpg</p>
        <p>* file scale will change to 300x300px</p>
        <p>* file will overwite automatically by personal id number</p>
        <div class="box-footer clearfix">
          <?=anchor(uri_string(),'<i class="fa fa-refresh"></i>',array('class'=>'btn btn-default'));?>
          <span class="pull-right">
            <?=form_submit('','Submit',array('class'=>'btn btn-success',''=>'','autocomplete'=>'off'));?>
          </span>
        </div>
      </div>
    </div>
  </div>
  <?php echo form_close(); ?>
</div>

<?=link_tag('assets/admin/plugins/jquery-uploadpreview/jquery-uploadpreview.min.css');?>
<?=script_tag('assets/admin/plugins/jquery-uploadpreview/jquery-uploadpreview.min.js');?>
<?=script_tag('assets/admin/js/plugins/autoprovince/autoprovince.js');?>
<script type="text/javascript">
  $(document).ready(function() {
    $.uploadPreview({
      input_field: "#image-upload",
      preview_box: "#image-preview",
      label_field: "#image-label",
      label_default: "choose file",
      label_selected: "change file",
      no_label: false
    });
    $('div#address').AutoProvince({
      PROVINCE: '#province',
      AMPHUR: '#amphur',
      DISTRICT: '#district',
      POSTCODE: '#postcode',
      arrangeByName: false
    });
  });
</script>
