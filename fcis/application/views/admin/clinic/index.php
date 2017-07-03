<div class="row">
  <div class="col-md-8">
    <div class="box box-primary">
      <div class="box-header">  <h3 class="box-title">Search for Patient <small>total : <?php echo count($results); ?> record(s)</small></h3> </div>
      <div class="box-body">
        <?php echo form_open_multipart(uri_string(),array('method'=>'get','class'=>'form-horizontal')); ?>
        <div class="form-group">
          <?php echo form_label('type here:','',array('class'=>'control-label col-md-2')); ?>
          <div class="col-md-4">
            <div class="input-group">
              <?php echo form_input(array('name'=>'q','class'=>'form-control','placeholder'=>'search'),set_value('',$this->input->get('q'))); ?>
              <div class="input-group-btn">
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>
        <?php echo form_close(); ?>
        <hr>

        <div class="list-group">
          <?php foreach ($results as $key => $value): ?>
            <a href="<?php echo site_url('admin/clinic/add/'.$value['id']); ?>" class="list-group-item">
              <h4 class="list-group-item-heading">
                <?php echo $value['title'].nbs().$value['firstname'].nbs().$value['lastname']?>
                <small class="text-primary">(H.N. : <?php echo $value['hn']; ?>)</small>
                <small class="pull-right"><?php echo $value['types']; ?> - <?php echo $value['groups']; ?></small>
              </h4>
              <p class="list-group-item-text">
                <dl class="dl-horizontal">
                  <dt>id card:</dt>
                  <dd><?php echo $value['id_card']; ?></dd>
                  <dt>address:</dt>
                  <dd><?php echo $value['age']; ?></dd>
                  <dt>created:</dt>
                  <dd><?php echo $value['created']; ?></dd>
                </dl>
              </p>
            </a>
          <?php endforeach; ?>
        </div>

      </div>
      <div class="box-footer clearfix"></div>
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
        <?=anchor('admin/clinic','<i class="fa fa-refresh"></i>',array('class'=>'btn btn-default'));?>
        <span class="pull-right">
          <?=form_submit('','Submit',array('class'=>'btn btn-success',''=>'','autocomplete'=>'off','disabled'=>TRUE));?>
        </span>
      </div>
    </div>
  </div>
</div>
