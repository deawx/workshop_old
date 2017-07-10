<div class="row">
  <div class="col-md-12">
    <?php echo form_fieldset('Polyposis'); ?>
    <div class="form-group">
      <?php echo form_label('polyposis:','',array('class'=>'control-label col-md-2')); ?>
      <div class="col-md-10">
        <div class="radio-inline">
          <label><?php echo form_radio(array('name'=>'polyposis','class'=>'form-control'),''); ?> มากกว่าหรือเท่ากับ 1,000 </label>
        </div>
        <div class="radio-inline">
          <label><?php echo form_radio(array('name'=>'polyposis','class'=>'form-control'),''); ?> มากกว่า 100 | น้อยกว่า 1,000 </label>
        </div>
        <div class="radio-inline">
          <label><?php echo form_radio(array('name'=>'polyposis','class'=>'form-control'),''); ?> มากกว่าหรือเท่ากับ 100 </label>
        </div>
      </div>
    </div>
    <?php echo form_fieldset_close(); ?>
    <?php echo form_fieldset('Clinical'); ?>
    <div class="form-group">
      <?php echo form_label('type of FAP:','',array('class'=>'control-label col-md-2')); ?>
      <div class="col-md-10">
        <?php echo form_dropdown(array('name'=>'','class'=>'form-control'),array(),set_value('')); ?>
        <p class="help-block"></p>
      </div>
    </div>
    <div class="form-group">
      <?php echo form_label('Malignant extracolonic manifestation:','',array('class'=>'control-label col-md-2')); ?>
      <div class="col-md-10">
        <?php echo form_dropdown(array('name'=>'','class'=>'form-control'),array(),set_value('')); ?>
        <p class="help-block"></p>
      </div>
    </div>
    <div class="form-group">
      <?php echo form_label('Extracolonic manifestation of FAP:','',array('class'=>'control-label col-md-2')); ?>
      <div class="col-md-10">
        <?php $dropdown_emof = array(''=>'เลือกรายการ','gastric_polyp'=>'Gastric Polyp','duodenal_polyps'=>'Duodenal polyps','desmoid_tumor'=>'Desmoid tumor'); ?>
        <!-- <?php echo form_dropdown(array('name'=>'case','class'=>'form-control','ng-model'=>'select_emof'),$dropdown_emof); ?> -->
        <?php echo form_dropdown(array('name'=>'case','class'=>'form-control','onchange'=>"window.location='?tab=fap&select_emof='+this.value"),$dropdown_emof,set_value('',$this->input->get('select_emof'))); ?>
        <p class="help-block"></p>
      </div>
    </div>
    <!-- <div class="row">
      <div class="col-md-12" ng-switch="select_emof">
        <div class="well well-sm" ng-switch-when="gastric_polyp|duodenal_polyps" ng-switch-when-separator="|">
          <div class="form-group">
            <?php echo form_label('treatment:','',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-10" >
              <div class="radio">
                <?php echo form_radio(array('name'=>'{{select_emof}}_treatment','class'=>''),''); ?>Endoscopic treatment
                <p class="help-block"></p>
              </div>
              <div class="radio">
                <?php echo form_radio(array('name'=>'{{select_emof}}_treatment','class'=>''),''); ?>Surgical resection
                <p class="help-block"></p>
              </div>
              <div class="radio">
                <?php echo form_radio(array('name'=>'{{select_emof}}_treatment','class'=>''),''); ?>Pharmacologic therapy
                <p class="help-block"></p>
              </div>
            </div>
          </div>
          <div class="form-group">
            <?php echo form_label('operative date:','',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-10">
              <?php echo form_input(array('name'=>'','class'=>'form-control datepicker')); ?>
            </div>
          </div>
          <div class="form-group">
            <?php echo form_label('details:','',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-10">
              <?php echo form_textarea(array('name'=>'','class'=>'form-control')); ?>
            </div>
          </div>
        </div>
        <div class="well well-sm" ng-switch-when="desmoid_tumor">
          <div class="form-group">
            <?php echo form_label(':','',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-10">
              <?php echo form_dropdown(array('name'=>'','class'=>'form-control'),array(),set_value('')); ?>
              <p class="help-block"></p>
            </div>
          </div>
        </div>
      </div>
    </div> -->
    <div class="well">
      <?php
      switch ($select_emof) :
        case 'gastric_polyp':
        case 'duodenal_polyps': ?>
        <div class="form-group">
          <?php echo form_label('treatment:','',array('class'=>'control-label col-md-2')); ?>
          <div class="col-md-10" >
            <div class="radio">
              <?php echo form_radio(array('name'=>'{{select_emof}}_treatment','class'=>''),''); ?>Endoscopic treatment
              <p class="help-block"></p>
            </div>
            <div class="radio">
              <?php echo form_radio(array('name'=>'{{select_emof}}_treatment','class'=>''),''); ?>Surgical resection
              <p class="help-block"></p>
            </div>
            <div class="radio">
              <?php echo form_radio(array('name'=>'{{select_emof}}_treatment','class'=>''),''); ?>Pharmacologic therapy
              <p class="help-block"></p>
            </div>
          </div>
        </div>
        <div class="form-group">
          <?php echo form_label('operative date:','',array('class'=>'control-label col-md-2')); ?>
          <div class="col-md-10">
            <?php echo form_input(array('name'=>'','class'=>'form-control datepicker')); ?>
          </div>
        </div>
        <div class="form-group">
          <?php echo form_label('details:','',array('class'=>'control-label col-md-2')); ?>
          <div class="col-md-10">
            <?php echo form_textarea(array('name'=>'','class'=>'form-control')); ?>
          </div>
        </div>
        <?php
        break;
        case 'desmoid_tumor':
        ?>
        <div class="form-group">
          <label for=""></label>
          <input type="text" class="form-control" id="" placeholder="">
          <p class="help-block">Help text here.</p>
        </div>
        <?php
        break;
      endswitch;
      ?>
    </div>
    <?php echo form_fieldset_close(); ?>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <?php echo form_fieldset('File(s)'); ?>
    <?php if (isset($assets) && ! empty($assets)) : ?>
      <table class="table table-condensed table-hover">
        <thead>
          <tr>
            <th class="text-center">#</th>
            <th class="text-center">file name</th>
            <th class="text-center">file size</th>
            <th class="text-center">uploaded date</th>
            <th class="text-center">uploaded by</th>
            <th class="text-center"></th>
          </tr>
        </thead>
        <?php foreach ($assets as $key => $value) : ?>
          <tbody>
            <tr>
              <td class="text-center"> <?php echo ++$key; ?></td>
              <td> <a href="<?php echo base_url('uploads/labs/fap/'.$value['file_name']); ?>" target="_blank"><?php echo $value['client_name']; ?></a> </td>
              <td class="text-center"> <?php echo byte_format($value['file_size']); ?> </td>
              <td class="text-center"> <?php echo date('d/m/Y H:i:s',$value['upload_date']); ?> </td>
              <td class="text-center"> <?php echo $value['username']; ?> </td>
              <td class="text-center">
                <a href="<?php echo base_url('admin/labs/delete_file/fap/'.$value['id'].'/'.$value['file_name']); ?>"
                  class="badge bg-red"
                  onclick="return confirm('confirm to delete?');">
                  delete
                </a>
              </td>
            </tr>
          </tbody>
        <?php endforeach; ?>
      </table>
    <?php else: ?>
      no file(s) uploaded.
    <?php endif; ?>
    <?php echo form_fieldset_close(); ?>
  </div>
</div>

<?=link_tag('assets/admin/plugins/dropzone/dropzone.min.css');?>
<?=link_tag('assets/admin/plugins/dropzone/basic.min.css');?>
<?=script_tag('assets/admin/plugins/dropzone/dropzone.min.js');?>
<script type="text/javascript">
$(document).ready(function() {
  Dropzone.options.dropzoneUpload = {
    parallelUploads: '10',
    maxFilesize: '1',
    maxFiles: '10',
    params: { lab_id: '<?php echo $this->uri->segment('4'); ?>' },
    acceptedFiles: 'image/*,application/pdf,.doc,.docx',
    autoProcessQueue: false,
    init: function() {
      var submitButton = document.querySelector("#dropzone-submit")
      myDropzone = this;
      submitButton.addEventListener("click", function() {
        myDropzone.processQueue();
      });
    }
  };
});
</script>
