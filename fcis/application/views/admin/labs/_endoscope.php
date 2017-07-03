<?php echo form_fieldset('Result'); ?>
<div class="form-group">
  <?php echo form_label('endoscope result:','endoscope_result',array('class'=>'control-label col-md-2')); ?>
  <div class="col-md-10">
    <div class="radio-inline">
      <label><?php echo form_radio(array('name'=>'endoscope_result','class'=>'form-control'),'',TRUE); ?>normal</label>
      <p class="help-block"></p>
    </div>
    <div class="radio-inline">
      <label><?php echo form_radio(array('name'=>'endoscope_result','class'=>'form-control'),''); ?>polyp</label>
      <p class="help-block"></p>
    </div>
    <div class="radio-inline">
      <label><?php echo form_radio(array('name'=>'endoscope_result','class'=>'form-control'),''); ?>tumor</label>
      <p class="help-block"></p>
    </div>
  </div>
</div>
<?php echo form_fieldset_close(); ?>
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
              <td class="text-center"> <?php echo ++$key; ?> </td>
              <td> <a href="<?php echo base_url('uploads/labs/endoscope/'.$value['file_name']); ?>" target="_blank"><?php echo $value['client_name']; ?></a> </td>
              <td class="text-center"> <?php echo byte_format($value['file_size']); ?> </td>
              <td class="text-center"> <?php echo date('d/m/Y H:i:s',$value['upload_date']); ?> </td>
              <td class="text-center"> <?php echo $value['username']; ?> </td>
              <td class="text-center">
                <a href="<?php echo base_url('admin/labs/delete_file/endoscope/'.$value['id'].'/'.$value['file_name']); ?>"
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
    acceptedFiles: 'image/*',
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
