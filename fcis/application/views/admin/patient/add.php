<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header"> <!-- <h3 class="box-title">Add New Patient</h3> --> </div>
      <?php echo form_open_multipart(uri_string(),array('class'=>'form-horizontal')); ?>
      <div class="box-body" style="padding:2em;">
        <div class="row">
          <div class="col-md-8">
            <div class="col-md-12" style="margin-top:1em;">
              <?php echo form_fieldset('Information'); ?>
              <div class="form-group">
                <?php echo form_label('personal id:','id_card',array('class'=>'control-label col-sm-2')); ?>
                <div class="col-sm-10">
                  <?php echo form_input(array('name'=>'id_card','class'=>'form-control','placeholder'=>'personal id','maxlength'=>'13','pattern'=>'[0-9]{13}'),set_value('id_card')); ?>
                </div>
              </div>
              <div class="form-group">
                <?php echo form_label('types:','types',array('class'=>'control-label col-sm-2')); ?>
                <div class="col-sm-10">
                  <div class="radio col-md-6">
                    <label><?php echo form_radio(array('name'=>'types','class'=>'form-control','id'=>'is_times'),'คนไข้ออกหน่วย',TRUE); ?> คนไข้ออกหน่วย</label>
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
                <?php echo form_label('groups:','groups',array('class'=>'control-label col-sm-2')); ?>
                <div class="col-sm-10">
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
                <?php echo form_label('title:','title',array('class'=>'control-label col-sm-2')); ?>
                <div class="col-sm-10">
                  <label class="radio-inline">
                    <?php echo form_radio(array('name'=>'title','class'=>'form-control'),'นาย',TRUE); ?> นาย
                  </label>
                  <label class="radio-inline">
                    <?php echo form_radio(array('name'=>'title','class'=>'form-control'),'นาง'); ?> นาง
                  </label>
                  <label class="radio-inline">
                    <?php echo form_radio(array('name'=>'title','class'=>'form-control'),'นางสาว'); ?> นางสาว
                  </label>
                </div>
              </div>
              <div class="form-group">
                <?php echo form_label('firstname:','firstname',array('class'=>'control-label col-sm-2')); ?>
                <div class="col-sm-10">
                  <?php echo form_input(array('name'=>'firstname','class'=>'form-control','placeholder'=>'firstname','required'=>TRUE),set_value('firstname')); ?>
                </div>
              </div>
              <div class="form-group">
                <?php echo form_label('lastname:','lastname',array('class'=>'control-label col-sm-2')); ?>
                <div class="col-sm-10">
                  <?php echo form_input(array('name'=>'lastname','class'=>'form-control','placeholder'=>'lastname','required'=>TRUE),set_value('lastname')); ?>
                </div>
              </div>
              <?php echo form_fieldset_close(); ?>
              <?php echo form_fieldset('Filtered'); ?>
              <div class="form-group">
                <?php echo form_label(':','',array('class'=>'control-label col-sm-2')); ?>
                <div class="col-sm-10">
                  <?php echo form_input(array('name'=>'','class'=>'form-control','placeholder'=>'','required'=>TRUE),set_value('')); ?>
                </div>
              </div>
              <div class="form-group">
                <?php echo form_label(':','',array('class'=>'control-label col-sm-2')); ?>
                <div class="col-sm-10">
                  <?php echo form_input(array('name'=>'','class'=>'form-control','placeholder'=>'','required'=>TRUE),set_value('')); ?>
                </div>
              </div>
              <div class="form-group">
                <?php echo form_label(':','',array('class'=>'control-label col-sm-2')); ?>
                <div class="col-sm-10">
                  <?php echo form_input(array('name'=>'','class'=>'form-control','placeholder'=>'','required'=>TRUE),set_value('')); ?>
                </div>
              </div>
              <?php echo form_fieldset_close(); ?>
              <?php echo form_fieldset('Family'); ?>
              <div class="form-group">
                <?php echo form_label(':','',array('class'=>'control-label col-sm-2')); ?>
                <div class="col-sm-10">
                  <?php echo form_input(array('name'=>'','class'=>'form-control','placeholder'=>'','required'=>TRUE),set_value('')); ?>
                </div>
              </div>
              <div class="form-group">
                <?php echo form_label(':','',array('class'=>'control-label col-sm-2')); ?>
                <div class="col-sm-10">
                  <?php echo form_input(array('name'=>'','class'=>'form-control','placeholder'=>'','required'=>TRUE),set_value('')); ?>
                </div>
              </div>
              <div class="form-group">
                <?php echo form_label(':','',array('class'=>'control-label col-sm-2')); ?>
                <div class="col-sm-10">
                  <?php echo form_input(array('name'=>'','class'=>'form-control','placeholder'=>'','required'=>TRUE),set_value('')); ?>
                </div>
              </div>
              <?php echo form_fieldset_close(); ?>
            </div>
          </div>
          <div class="col-md-4">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Control Panel</h3>
              </div>
              <div class="panel-body">
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
              </div>
              <div class="panel-footer">
                <?=anchor(uri_string(),'<i class="fa fa-refresh"></i>',array('class'=>'btn btn-default'));?>
                <span class="pull-right">
                  <?=form_submit('','Submit',array('class'=>'btn btn-success',''=>'','autocomplete'=>'off'));?>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php echo form_close(); ?>
      <div class="box-footer clearfix"></div>
    </div>
  </div>
</div>

<?=link_tag('assets/admin/plugins/jquery-uploadpreview/jquery-uploadpreview.min.css');?>
<?=script_tag('assets/admin/plugins/jquery-uploadpreview/jquery-uploadpreview.min.js');?>
<script type="text/javascript">
$(document).ready(function() {
  // $('input[name="types"]').change(function() {
  //   console.log('test');
  //   console.log($(this).val());
  //   if ($('#is_times').is(':checked')) {
  //     alert(1);
  //   }
  // });
  $.uploadPreview({
    input_field: "#image-upload",   // Default: .image-upload
    preview_box: "#image-preview",  // Default: .image-preview
    label_field: "#image-label",    // Default: .image-label
    label_default: "choose file",   // Default: Choose File
    label_selected: "change file",  // Default: Change File
    no_label: false                 // Default: false
  });
});
</script>
