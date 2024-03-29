<div class="row">
  <?php echo form_open(uri_string(),array('class'=>'form-horizontal')); ?>
  <?php echo form_hidden('id',$sample['id']); ?>
  <div class="col-md-8">
    <div class="box box-primary">
      <div class="box-header">  <h3 class="box-title">ข้อมูลผู้ป่วยนอก</h3> </div>
      <div class="box-body"> <?php $this->load->view('admin/sample/_search'); ?> </div>
      <div class="box-footer clearfix"></div>
    </div>
    <div class="box box-primary">
      <div class="box-header"> </div>
      <div class="box-body"> <?php $this->load->view('admin/sample/_form'); ?> </div>
      <div class="box-footer clearfix"> </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="box box-info">
      <div class="box-header"></div>
      <div class="box-body">
        <h4><i class="fa fa-info-circle"></i> รายการแจ้งเตือน</h4><hr>
        <?php echo $this->session->flashdata('message'); ?>
        <h4><i class="fa fa-info-circle"></i> รายการคำอธิบาย</h4><hr>
        <p class="" id=""></p>
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
