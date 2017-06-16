<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Add Sample</h3>
      </div>
      <?php echo form_open(uri_string(),array('class'=>'form-horizontal')); ?>
      <div class="box-body" style="padding:2em;">
        <div class="row">
          <?php echo form_fieldset('-'); ?>
          <div class="form-group">
            <?php echo form_label('groups:','groups',array('class'=>'control-label col-sm-2')); ?>
            <div class="col-sm-10">
              <label class="radio-inline">
                <?php echo form_radio(array('name'=>'groups','class'=>'form-control'),'FAP',TRUE); ?> FAP
              </label>
              <label class="radio-inline">
                <?php echo form_radio(array('name'=>'groups','class'=>'form-control'),'OTHER'); ?> OTHER
              </label>
            </div>
          </div>
          <div class="form-group">
            <?php echo form_label(':','',array('class'=>'control-label col-sm-2')); ?>
            <div class="col-sm-10">
              <?php echo form_input(array('name'=>'','class'=>'form-control','placeholder'=>'','required'=>TRUE),set_value('')); ?>
            </div>
          </div>
          <?php echo form_fieldset_close(); ?>
          <div class="form-group">
            <?php echo form_label('','',array('class'=>'control-label col-sm-2')); ?>
            <div class="col-sm-10">
              <?=anchor(uri_string(),'<i class="fa fa-refresh"></i>',array('class'=>'btn btn-default'));?>
              <?=form_submit('','Submit',array('class'=>'btn btn-success',''=>'','autocomplete'=>'off'));?>
            </div>
          </div>
        </div>
        <?php echo form_close(); ?>
        <div class="box-footer clearfix"> </div>
      </div>
    </div>
  </div>
</div>
