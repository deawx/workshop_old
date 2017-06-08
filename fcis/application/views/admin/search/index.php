<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Search for Patients</h3>
      </div>
      <div class="box-body" style="padding:2em;">
        <div class="row">
          <?php echo $this->session->flashdata('message');?>
          <?php echo form_open('',array('class'=>'form-horizontal','method'=>'GET')); ?>
          <div class="form-group">
            <?php echo form_label('Personal ID:','id_card',array('class'=>'control-label col-sm-2')); ?>
            <div class="col-sm-10">
              <?php echo form_input(array('name'=>'id_card','class'=>'form-control','placeholder'=>'Personal ID','maxlength'=>'13','pattern'=>'[0-9]{13}')); ?>
            </div>
          </div>
          <div class="form-group">
            <?php echo form_label('Firstname:','firstname',array('class'=>'control-label col-sm-2')); ?>
            <div class="col-sm-10">
              <?php echo form_input(array('name'=>'firstname','class'=>'form-control','placeholder'=>'Firstname')); ?>
            </div>
          </div>
          <div class="form-group">
            <?php echo form_label('Lastname:','lastname',array('class'=>'control-label col-sm-2')); ?>
            <div class="col-sm-10">
              <?php echo form_input(array('name'=>'lastname','class'=>'form-control','placeholder'=>'Lastname')); ?>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <?=form_submit('','submit',array('class'=>'btn btn-success','autocomplete'=>'off'));?>
              <?=form_reset('','reset',array('class'=>'btn btn-default','autocomplete'=>'off'));?>
            </div>
          </div>
          <?php echo form_close(); ?>
          <hr>
        </div>
        <div class="row pull-right">
          <?php echo anchor('#','export to csv',array('class'=>'btn btn-info')); ?>
          <?php echo anchor('#','export to sql',array('class'=>'btn btn-info')); ?>
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
                  <th><?php echo anchor($uri_string.'&order_by=firstname',($order_by === 'firstname') ? 'Firstname <i class="fa fa-caret-up"></i>' : 'Firstname'); ?></th>
                  <th><?php echo anchor($uri_string.'&order_by=lastname',($order_by === 'lastname') ? 'Lastname <i class="fa fa-caret-up"></i>' : 'Lastname'); ?></th>
                  <th><?php echo anchor($uri_string.'&order_by=status',($order_by === 'status') ? 'Status <i class="fa fa-caret-up"></i>' : 'Status'); ?></th>
                  <th>Action</th>
                </tr>
              </thead>
              <?php foreach ($search as $key => $value) : ?>
                <tbody>
                  <tr>
                    <td><?php echo ++$key; ?></td>
                    <td><?php echo $value['firstname']; ?></td>
                    <td><?php echo $value['lastname']; ?></td>
                    <td><?php echo ''; ?></td>
                    <td><?php echo anchor(uri_string().'/'.$value['id'],'<i class="fa fa-eye"></i>',array('class'=>'btn btn-default')); ?></td>
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
