<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Search for Patients</h3>
      </div>
      <div class="box-body" style="padding:2em;">
        <div class="row">
          <div class="col-md-6">
              <?php echo form_open('',array('class'=>'form-horizontal','method'=>'GET')); ?>
              <div class="form-group">
                <?php echo form_label('personal id:','id_card',array('class'=>'control-label col-sm-2')); ?>
                <div class="col-sm-10">
                  <?php echo form_input(array('name'=>'id_card','class'=>'form-control','placeholder'=>'personal id','maxlength'=>'13','pattern'=>'[0-9]{13}')); ?>
                </div>
              </div>
              <div class="form-group">
                <?php echo form_label('firstname:','firstname',array('class'=>'control-label col-sm-2')); ?>
                <div class="col-sm-10">
                  <?php echo form_input(array('name'=>'firstname','class'=>'form-control','placeholder'=>'firstname')); ?>
                </div>
              </div>
              <div class="form-group">
                <?php echo form_label('lastname:','lastname',array('class'=>'control-label col-sm-2')); ?>
                <div class="col-sm-10">
                  <?php echo form_input(array('name'=>'lastname','class'=>'form-control','placeholder'=>'lastname')); ?>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <?=form_submit('','search',array('class'=>'btn btn-success','autocomplete'=>'off'));?>
                  <?=form_reset('','reset',array('class'=>'btn btn-default','autocomplete'=>'off'));?>
                </div>
              </div>
              <?php echo form_close(); ?>
          </div>
          <div class="col-md-6">
            <?php echo validation_errors('<div class="alert alert-info">', '</div>'); ?>
            <?php echo $this->session->flashdata('message'); ?>
          </div>
        </div>
        <hr>
        <div class="row">
          total : <?php echo isset($count) ? $count : ''; ?> record(s) | show : 20 record(s) per page
          <span class="pull-right">
            <?php echo anchor('#','export to csv',array('class'=>'btn btn-info')); ?>
            <?php echo anchor('#','export to sql',array('class'=>'btn btn-info')); ?>
          </span>
          <br>
        </div>
        <div class="row">
          <?php if ($search) : ?>
            <table class="table table-hover">
              <thead>
                <tr>
                  <?php
                    $uri_get = $this->input->get();
                    unset($uri_get['order_by']);
                    $uri_get = http_build_query($uri_get);
                    $uri_string = uri_string().'?'.$uri_get;
                    $order_by = $this->input->get('order_by');
                  ?>
                  <th>#</th>
                  <th><?php echo anchor($uri_string.'&order_by=firstname',($order_by === 'firstname') ? 'firstname <i class="fa fa-caret-up"></i>' : 'firstname'); ?></th>
                  <th><?php echo anchor($uri_string.'&order_by=lastname',($order_by === 'lastname') ? 'lastname <i class="fa fa-caret-up"></i>' : 'lastname'); ?></th>
                  <!-- <th><?php echo anchor($uri_string.'&order_by=status',($order_by === 'status') ? 'status <i class="fa fa-caret-up"></i>' : 'status'); ?></th> -->
                  <th>status</th>
                  <th>action</th>
                </tr>
              </thead>
              <?php foreach ($search as $key => $value) : ?>
                <tbody>
                  <tr>
                    <td><?php echo ++$key; ?></td>
                    <td><?php echo $value['firstname']; ?></td>
                    <td><?php echo $value['lastname']; ?></td>
                    <td><?php echo ''; ?></td>
                    <td><?php echo anchor(uri_string().'?id='.$value['id'],'<i class="fa fa-eye"></i>',array('class'=>'btn btn-default')); ?></td>
                  </tr>
                </tbody>
              <?php endforeach; ?>
            </table>
          <?php endif; ?>
        </div>
      </div>
      <div class="box-footer clearfix">
        <?php echo $this->pagination->create_links(); ?>
      </div>
    </div>
  </div>
</div>
