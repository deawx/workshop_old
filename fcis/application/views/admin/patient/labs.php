<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Edit filtered data</h3>
        <span class="pull-right"><?php $this->load->view('admin/patient/_navigation.php'); ?></span>
      </div>
      <div class="box-body" style="padding:2em;">
        <div class="row">
          <div class="col-md-8">
            <?php echo form_open_multipart(uri_string(),array('class'=>'form-horizontal')); ?>
            <?php echo form_hidden('id',''); ?>
            <div class="form-group">
              <?php echo form_label('personal id:','id_card',array('class'=>'control-label col-sm-2')); ?>
              <div class="col-sm-10">
                <?php echo form_input(array('name'=>'','class'=>'form-control','placeholder'=>''),set_value('')); ?>
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
          <div class="col-md-4">
            <div class="row">
              <h4>display message(s)</h4><hr>
              <?php echo $this->session->flashdata('message'); ?>
            </div>
            <div class="row">
              <h4>description below</h4><hr>
              <p>*</p>
            </div>
          </div>
        </div>
      </div>
      <div class="box-footer clearfix"> </div>
    </div>
  </div>
</div>
