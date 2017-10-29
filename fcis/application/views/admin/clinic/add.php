<div class="row">
  <?php echo form_open_multipart(uri_string(),array('class'=>'form-horizontal')); ?>
  <?php echo form_hidden('patient_id',$patient['id']); ?>
  <div class="col-md-8">
    <div class="box box-primary">
      <div class="box-header">  <h3 class="box-title">ข้อมูลผู้ป่วย</h3> </div>
      <div class="box-body">
        <div class="list-group-item">
          <h4 class="list-group-item-heading">
            <?php echo $patient['title'].nbs().$patient['firstname'].nbs().$patient['lastname']?>
            <small class="text-mute">(H.N. : <?php echo $patient['hn']; ?>)</small>
            <small class="pull-right"><?php echo $patient['types']; ?> - <?php echo $patient['groups']; ?></small>
          </h4>
          <p class="list-group-item-text">
            <dl class="dl-horizontal">
              <dt>เลขบัตรปชช:</dt> <dd><?php echo $patient['id_card']; ?></dd>
              <dt>วันที่บันทึก:</dt> <dd><?php echo ($patient['created']) ? date('d-m-Y H:i:s',$patient['created']) : 'N/A'; ?></dd>
              <dt>วันที่อัพเดท:</dt> <dd><?php echo ($patient['updated']) ? date('d-m-Y H:i:s',$patient['updated']) : 'N/A'; ?></dd>
            </dl>
          </p>
        </div>
      </div>
      <div class="box-footer clearfix"></div>
    </div>
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs pull-right">
        <li class="<?php if ($tab === 'fap') echo 'active'; ?>">
          <a href="<?php echo site_url('admin/clinic/add_fap/'.$patient['id']); ?>">รายงานผล FAP</a>
        </li>
        <li class="<?php if ($tab === 'hnpcc') echo 'active'; ?>">
          <a href="<?php echo site_url('admin/clinic/add_hnpcc/'.$patient['id']); ?>">รายงานผล HNPCC</a>
        </li>
        <li class="<?php if ($tab === 'pjsjps') echo 'active'; ?>">
          <a href="<?php echo site_url('admin/clinic/add_pjsjps/'.$patient['id']); ?>">รายงานผล PJS/JPS</a>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active">
          <?php if ($tab) $this->load->view('admin/clinic/_'.$tab); ?>
        </div>
      </div>
    </div>

  </div>
  <div class="col-md-4">
    <div class="box box-info">
      <div class="box-header"></div>
      <div class="box-body">
        <h4><i class="fa fa-info-circle"></i> รายการแจ้งเตือน</h4><hr>
        <?php echo $this->session->flashdata('message'); ?>
        <p class="dz-error-message text-danger"></p>
        <h4><i class="fa fa-info-circle"></i> เอกสารที่เกี่ยวข้อง</h4><hr>
        <p>* ขนาดไฟล์ไม่เกิน 1 MB</p>
        <p>* ความกว้างและยาวของไฟล์ไม่เกิน 1200px</p>
        <p>* รองรับชนิดของไฟล์ประเภท image/*</p>
        <p>* ไฟล์จะถูกเปลี่ยนอัตราส่วนที่ 400x400px</p>
      </div>
      <div class="box-footer clearfix">
        <?=anchor(uri_string(),'<i class="fa fa-refresh"></i>',array('class'=>'btn btn-default'));?>
        <span class="pull-right">
          <?=form_submit('','บันทึกข้อมูล',array('class'=>'btn btn-success','autocomplete'=>'off'));?>
        </span>
      </div>
      <?php echo form_close(); ?>
    </div>
    <div class="box box-info">
      <div class="box-header"></div>
      <div class="box-body">
        <h4><i class="fa fa-info-circle"></i>อัพโหลดไฟล์</h4><hr>
        <?php echo form_open_multipart('admin/clinic/upload_'.$tab,array(
          'class'=>'dropzone',
          'id'=>'dropzone-upload',
          'style'=>'min-height:75px;padding:0;border:1px dotted;background:#f5f5f5;'))?>
      </div>
      <div class="box-footer clearfix">
        <span class="pull-right">
          <?=form_submit('','อัพโหลด',array('class'=>'btn btn-info','id'=>'dropzone-submit'));?>
        </span>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>

<script type="text/javascript">
$(function(){
  Dropzone.options.dropzoneUpload = {
    parallelUploads: '10',
    maxFilesize: '1',
    maxFiles: '10',
    params: { clinic_id: '<?php echo $this->uri->segment('4'); ?>' },
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
