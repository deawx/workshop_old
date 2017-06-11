<?php
$patient = array(
  'title' => 'นาง'
);
?>
<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Add New Patient</h3>
      </div>
      <div class="box-body" style="padding:2em;">
        <div class="row">
          <div class="col-md-6">
            <?php echo form_open_multipart('',array('class'=>'form-horizontal')); ?>
            <div class="form-group">
              <?php echo form_label('','file',array('class'=>'control-label col-sm-2')); ?>
              <div class="col-sm-10">
                <div class="btn btn-default btn-file">
                  <i class="fa fa-paperclip"></i> Attachment
                  <?php echo form_upload(array('name'=>'file','class'=>'form-control','id'=>'image-upload')); ?>
                </div>
              </div>
            </div>
            <div class="form-group">
              <?php echo form_label('personal id:','id_card',array('class'=>'control-label col-sm-2')); ?>
              <div class="col-sm-10">
                <?php echo form_input(array('name'=>'id_card','class'=>'form-control','placeholder'=>'personal id','maxlength'=>'13','pattern'=>'[0-9]{13}')); ?>
              </div>
            </div>
            <div class="form-group">
              <?php echo form_label('title:','title',array('class'=>'control-label col-sm-2')); ?>
              <div class="col-sm-10">
                <?php echo $patient['title']; ?>
                <label class="radio-inline">
                  <?php echo form_radio(array('name'=>'title','class'=>'form-control'),'นาย',set_radio('title',$patient['title'],TRUE)); ?> นาย
                </label>
                <label class="radio-inline">
                  <?php echo form_radio(array('name'=>'title','class'=>'form-control'),'นาง',set_radio('title',$patient['title'])); ?> นาง
                </label>
                <label class="radio-inline">
                  <?php echo form_radio(array('name'=>'title','class'=>'form-control'),'นางสาว',set_radio('title',$patient['title'])); ?> นางสาว
                </label>

                <p class="help-block"></p>
                <p class="help-block"></p>
                <p class="help-block"></p>
              </div>
            </div>
            <div class="form-group">
              <?php echo form_label('firstname:','firstname',array('class'=>'control-label col-sm-2')); ?>
              <div class="col-sm-10">
                <?php echo form_input(array('name'=>'firstname','class'=>'form-control','placeholder'=>'firstname'),set_value('firstname',isset($patient['firstname']))); ?>
              </div>
            </div>
            <div class="form-group">
              <?php echo form_label('lastname:','lastname',array('class'=>'control-label col-sm-2')); ?>
              <div class="col-sm-10">
                <?php echo form_input(array('name'=>'lastname','class'=>'form-control','placeholder'=>'lastname')); ?>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <?=form_submit('','search',array('class'=>'btn btn-success','autocomplete'=>'off'));?>
                <?=form_reset('','reset',array('class'=>'btn btn-default','autocomplete'=>'off'));?>
              </div>
            </div>
            <?php echo form_close(); ?>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div id="image-preview" class="img-responsive well well-sm" style="width:300px;height:300px;"></div>
            </div>
            <div class="row" style="padding:1em;">
              <p>* max file size 2 MB</p>
              <p>* mime type is only image/jpeg</p>
              <p>* file extension will change to .jpg</p>
              <p>* file scale will change to 300x300px</p>
            </div>
          </div>
        </div>
      </div>
      <div class="box-footer clearfix"> </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
  $.uploadPreview({
    input_field: "#image-upload",
    preview_box: "#image-preview"
    // success_callback: function() {
    //   alert("File will now be previewed");
    // }
  });
});
</script>
