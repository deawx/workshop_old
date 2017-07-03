<div class="row">
  <?php echo form_open_multipart(uri_string(),array('class'=>'form-horizontal')); ?>
  <?php echo form_hidden('user_id',$patient['id']); ?>
  <div class="col-md-8">
    <div class="box box-primary">
      <div class="box-header">  <h3 class="box-title">Patient Details</h3> </div>
      <div class="box-body">
        <div class="list-group-item">
          <h4 class="list-group-item-heading">
            <?php echo $patient['title'].nbs().$patient['firstname'].nbs().$patient['lastname']?>
            <small class="text-primary">(H.N. : <?php echo $patient['hn']; ?>)</small>
            <small class="pull-right"><?php echo $patient['types']; ?> - <?php echo $patient['groups']; ?></small>
          </h4>
          <p class="list-group-item-text">
            <dl class="dl-horizontal">
              <dt>id card:</dt>
              <dd><?php echo $patient['id_card']; ?></dd>
              <dt>address:</dt>
              <dd><?php echo $patient['age']; ?></dd>
              <dt>created:</dt>
              <dd><?php echo $patient['created']; ?></dd>
            </dl>
          </p>
        </div>
      </div>
      <div class="box-footer clearfix"></div>
    </div>
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs pull-right">
        <li class="<?php if ($tab === 'endoscope') echo 'active'; ?>">
          <a href="<?php echo '?tab=endoscope'; ?>">Endoscope report</a>
        </li>
        <li class="<?php if ($tab === 'fap') echo 'active'; ?>">
          <a href="<?php echo '?tab=fap'; ?>">FAP report</a>
        </li>
        <li class="<?php if ($tab === 'hnpcc') echo 'active'; ?>">
          <a href="<?php echo '?tab=hnpcc'; ?>">HNPCC report</a>
        </li>
        <li class="<?php if ($tab === 'pjsjps') echo 'active'; ?>">
          <a href="<?php echo '?tab=pjsjps'; ?>">PJS/JPS report</a>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active">
          <?php if ($tab) $this->load->view('admin/labs/_'.$tab); ?>
        </div>
      </div>
    </div>

  </div>
  <div class="col-md-4">
    <div class="box box-info">
      <div class="box-header"></div>
      <div class="box-body">
        <h4><i class="fa fa-info-circle"></i> message(s)</h4><hr>
        <?php echo $this->session->flashdata('message'); ?>
        <p class="dz-error-message text-danger"></p>
        <h4><i class="fa fa-info-circle"></i> file attachment(s)</h4><hr>
        <p>* max file size 1 MB</p>
        <p>* max file width and height 1200px</p>
        <p>* mime type is only image/*</p>
        <p>* file scale will change to 400x400px with maintain ratio</p>
      </div>
      <div class="box-footer clearfix">
        <?=anchor(uri_string(),'<i class="fa fa-refresh"></i>',array('class'=>'btn btn-default'));?>
        <span class="pull-right">
          <?=form_submit('','Submit',array('class'=>'btn btn-success','autocomplete'=>'off'));?>
        </span>
      </div>
      <?php echo form_close(); ?>
    </div>
    <div class="box box-info">
      <div class="box-header"></div>
      <div class="box-body">
        <h4><i class="fa fa-info-circle"></i> upload file(s)</h4><hr>
        <?php echo form_open_multipart('admin/labs/upload_'.$tab,array(
          'class'=>'dropzone',
          'id'=>'dropzone-upload',
          'style'=>'min-height:75px;padding:0;border:1px dotted;background:#f5f5f5;'))?>
      </div>
      <div class="box-footer clearfix">
        <span class="pull-right">
          <?=form_submit('','Upload',array('class'=>'btn btn-info','id'=>'dropzone-submit'));?>
        </span>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>
