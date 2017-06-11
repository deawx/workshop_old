<?php
$isset = (isset($patient)) ? 'disabled' : 'required';
?>
<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title"><?php echo (isset($patient)) ? 'Edit Patient' : 'Add New Patient'; ?></h3>
        <span class="pull-right"><?php $this->load->view('admin/patient/_navigation.php'); ?></span>
      </div>
      <div class="box-body" style="padding:2em;">
        <div class="row">
          <div class="col-md-6">
            <div class="col-md-12">
              <?php echo img(base_url('uploads/'.(isset($patient['id_card']) ? $patient['id_card'] : '')).'.jpg','',array('class'=>'img-responsive img-rounded','id'=>'preview','style'=>'width:300px;height:300px;margin:0 auto;')); ?>
            </div>
            <div class="col-md-12" style="margin-top:1em;">
              <?php echo form_open_multipart(uri_string(),array('class'=>'form-horizontal')); ?>
              <?php echo form_hidden('id',(isset($patient['id']) ? $patient['id'] : '')); ?>
              <?php echo form_hidden('old_id_card',(isset($patient['id_card']) ? $patient['id_card'] : '')); ?>
              <div class="form-group">
                <?php echo form_label('','file',array('class'=>'control-label col-sm-2')); ?>
                <div class="col-sm-10">
                  <div class="btn btn-default btn-file">
                    <i class="fa fa-paperclip"></i> Attachment
                    <?php echo form_upload(array('name'=>'file','class'=>'form-control','id'=>'picture')); ?>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <?php echo form_label('personal id:','id_card',array('class'=>'control-label col-sm-2')); ?>
                <div class="col-sm-10">
                  <?php echo form_input(array('name'=>'id_card','class'=>'form-control','placeholder'=>'personal id','maxlength'=>'13','pattern'=>'[0-9]{13}'),set_value('id_card',(isset($patient['id_card']) ? $patient['id_card'] : ''))); ?>
                </div>
              </div>
              <div class="form-group">
                <?php echo form_label('types:','types',array('class'=>'control-label col-sm-2')); ?>
                <div class="col-sm-10">
                  <label class="radio-inline col-sm-3">
                    <?php echo form_radio(array('name'=>'types','class'=>'form-control'),'คนไข้ออกหน่วย',set_radio('types','คนไข้ออกหน่วย',(isset($patient['types']) && $patient['types'] === 'คนไข้ออกหน่วย'))); ?> คนไข้ออกหน่วย
                  </label>
                  <label class="radio-inline col-sm-3">
                    <?php echo form_radio(array('name'=>'types','class'=>'form-control'),'กลุ่ม CRC of PSU',set_radio('types','กลุ่ม CRC of PSU',(isset($patient['types']) && $patient['types'] === 'กลุ่ม CRC of PSU'))); ?> กลุ่ม CRC of PSU
                  </label>
                  <label class="radio-inline col-sm-3">
                    <?php echo form_radio(array('name'=>'types','class'=>'form-control'),'คนไข้ CRC ส่งต่อ',set_radio('types','คนไข้ CRC ส่งต่อ',(isset($patient['types']) && $patient['types'] === 'คนไข้ CRC ส่งต่อ'))); ?> คนไข้ CRC ส่งต่อ
                  </label>
                </div>
              </div>
              <div class="form-group">
                <?php echo form_label('groups:','groups',array('class'=>'control-label col-sm-2')); ?>
                <div class="col-sm-10">
                  <label class="radio-inline col-sm-3">
                    <?php echo form_radio(array('name'=>'groups','class'=>'form-control'),'FAP',set_radio('groups','FAP',(isset($patient['groups']) && $patient['groups'] === 'FAP'))); ?> FAP
                  </label>
                  <label class="radio-inline col-sm-3">
                    <?php echo form_radio(array('name'=>'groups','class'=>'form-control'),'HNPCC',set_radio('groups','HNPCC',(isset($patient['groups']) && $patient['groups'] === 'HNPCC'))); ?> HNPCC
                  </label>
                  <label class="radio-inline col-sm-3">
                    <?php echo form_radio(array('name'=>'groups','class'=>'form-control'),'PJS/JPS',set_radio('groups','PJS/JPS',(isset($patient['groups']) && $patient['groups'] === 'PJS/JPS'))); ?> PJS/JPS
                  </label>
                </div>
              </div>
              <div class="form-group">
                <?php echo form_label('title:','title',array('class'=>'control-label col-sm-2')); ?>
                <div class="col-sm-10">
                  <label class="radio-inline col-sm-3">
                    <?php echo form_radio(array('name'=>'title','class'=>'form-control'),'นาย',set_radio('title','นาย',(isset($patient['title']) && $patient['title'] === 'นาย'))); ?> นาย
                  </label>
                  <label class="radio-inline col-sm-3">
                    <?php echo form_radio(array('name'=>'title','class'=>'form-control'),'นาง',set_radio('title','นาง',(isset($patient['title']) && $patient['title'] === 'นาง'))); ?> นาง
                  </label>
                  <label class="radio-inline col-sm-3">
                    <?php echo form_radio(array('name'=>'title','class'=>'form-control'),'นางสาว',set_radio('title','นางสาว',(isset($patient['title']) && $patient['title'] === 'นางสาว'))); ?> นางสาว
                  </label>
                </div>
              </div>
              <div class="form-group">
                <?php echo form_label('firstname:','firstname',array('class'=>'control-label col-sm-2')); ?>
                <div class="col-sm-10">
                  <?php echo form_input(array('name'=>'firstname','class'=>'form-control','placeholder'=>'firstname','required'=>TRUE),set_value('firstname',(isset($patient['firstname']) ? $patient['firstname'] : ''))); ?>
                </div>
              </div>
              <div class="form-group">
                <?php echo form_label('lastname:','lastname',array('class'=>'control-label col-sm-2')); ?>
                <div class="col-sm-10">
                  <?php echo form_input(array('name'=>'lastname','class'=>'form-control','placeholder'=>'lastname','required'=>TRUE),set_value('lastname',(isset($patient['lastname']) ? $patient['lastname'] : ''))); ?>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <?=form_submit('','submit',array('class'=>'btn btn-success','autocomplete'=>'off'));?>
                  <?=anchor(uri_string(),'reset',array('class'=>'btn btn-default'));?>
                </div>
              </div>
              <?php echo form_close(); ?>
            </div>
          </div>
          <div class="col-md-6">
            <ul class="nav nav-pills nav-stacked">
              <li class="active"><a href="#d1" data-toggle="tab">information</a></li>
              <li><a href="#d2" data-toggle="tab">family details</a></li>
              <li><a href="#d3" data-toggle="tab">filtered details</a></li>
              <li><a href="#d4" data-toggle="tab">labs report</a></li>
              <li><a href="#d5" data-toggle="tab">clinic report</a></li>
            </ul>
            <?php echo $this->session->flashdata('message'); ?>
            <p>* max file size 2 MB</p>
            <p>* mime type is only image/jpeg</p>
            <p>* file extension will change to .jpg</p>
            <p>* file scale will change to 300x300px</p>
            <p>* file will overwite automatically by personal id number</p>
          </div>
        </div>
      </div>
      <div class="box-footer clearfix"> </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $("#picture").on('change', function() {
      var countFiles = $(this)[0].files.length;
      var imgPath = $(this)[0].value;
      var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
      var image_holder = $("#preview");
      image_holder.empty();
      if (extn == "bmp" || extn == "png" || extn == "jpg" || extn == "jpeg") {
        if (typeof (FileReader) != "undefined") {
          for (var i = 0; i < countFiles; i++) {
            var reader = new FileReader();
            reader.onload = function (e) {
              $('#preview').attr('src', e.target.result);
            }
            image_holder.show();
            reader.readAsDataURL($(this)[0].files[i]);
          }
        } else {
          alert("This browser does not support FileReader.");
        }
      } else {
        alert("Pls select only images");
      }
    });
  });
</script>
