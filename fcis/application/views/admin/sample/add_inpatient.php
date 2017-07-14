<div class="row">
  <?php echo form_open(uri_string().'/add_inpatient',array('class'=>'form-horizontal')); ?>
  <?php echo form_hidden('user_id',$patient['id']); ?>
  <div class="col-md-8">
    <div class="box box-primary">
      <div class="box-header">  <h3 class="box-title">Inpatient Details</h3> </div>
      <div class="box-body">
        <?php echo form_close(); ?>
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
    <div class="box box-primary">
      <div class="box-header"> </div>
      <div class="box-body">
        <?php $this->load->view('admin/sample/_form'); ?>
      </div>
      <div class="box-footer clearfix"> </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="box box-info">
      <div class="box-header"></div>
      <div class="box-body">
        <h4><i class="fa fa-info-circle"></i> message(s)</h4><hr>
        <?php echo $this->session->flashdata('message'); ?>
        <h4><i class="fa fa-info-circle"></i> description</h4><hr>
        <p class="" id=""></p>
      </div>
      <div class="box-footer clearfix">
        <?=anchor(uri_string(),'<i class="fa fa-refresh"></i>',array('class'=>'btn btn-default'));?>
        <span class="pull-right">
          <?=form_submit('','Submit',array('class'=>'btn btn-success',''=>'','autocomplete'=>'off'));?>
        </span>
      </div>
    </div>
  </div>
  <?php echo form_close(); ?>
</div>
