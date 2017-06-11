<?php
$uri_get = $this->input->get();
unset($uri_get['order_by']);
$uri_get = http_build_query($uri_get);
$uri_string = uri_string().'?'.$uri_get;
$order_by = $this->input->get('order_by');
?>
<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Patient Details</h3>
      </div>
      <div class="box-body" style="padding:2em;">
        <div class="row">
          <span class="col-md-8" style="padding:0px;">
            <?php echo anchor(uri_string().'/patient','Add New',array('class'=>'btn btn-default')); ?>
            <?php echo anchor(uri_string(),'<i class="fa fa-refresh"></i>',array('class'=>'btn btn-default')); ?>
          </span>
          <span class="col-md-4" style="padding:0px;">
            <?php echo form_open('',array('method'=>'GET','class'=>'navbar-form navbar-right form-horizontal','role'=>'search')); ?>
            <?php echo form_label('personal id:','id_card',array('class'=>'control-label col-md-4')); ?>
            <div class="col-md-8">
              <div class="input-group">
                <?php echo form_input(array('name'=>'id_card','class'=>'form-control','placeholder'=>'personal id','maxlength'=>'13','pattern'=>'[0-9]{13}','required'=>TRUE)); ?>
                <div class="input-group-btn">
                  <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </div>
              </div>
            </div>
            <?php echo form_close(); ?>
          </span>
          <br>
        </div>
        <div class="row">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th><?php echo anchor($uri_string.'&order_by=types',($order_by === 'types') ? 'types <i class="fa fa-caret-up"></i>' : 'types'); ?></th>
                <th><?php echo anchor($uri_string.'&order_by=groups',($order_by === 'groups') ? 'groups <i class="fa fa-caret-up"></i>' : 'groups'); ?></th>
                <th><?php echo anchor($uri_string.'&order_by=id_card',($order_by === 'id_card') ? 'id_card <i class="fa fa-caret-up"></i>' : 'id_card'); ?></th>
                <th><?php echo anchor($uri_string.'&order_by=title',($order_by === 'title') ? 'title <i class="fa fa-caret-up"></i>' : 'title'); ?></th>
                <th><?php echo anchor($uri_string.'&order_by=firstname',($order_by === 'firstname') ? 'firstname <i class="fa fa-caret-up"></i>' : 'firstname'); ?></th>
                <th><?php echo anchor($uri_string.'&order_by=lastname',($order_by === 'lastname') ? 'lastname <i class="fa fa-caret-up"></i>' : 'lastname'); ?></th>
                <th><?php echo anchor($uri_string.'&order_by=created',($order_by === 'created') ? 'created <i class="fa fa-caret-up"></i>' : 'created'); ?></th>
                <th><?php echo anchor($uri_string.'&order_by=updated',($order_by === 'updated') ? 'updated <i class="fa fa-caret-up"></i>' : 'updated'); ?></th>
                <th>action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($patients as $key => $value)  : ?>
                <tr>
                  <td><?php echo ++$key; ?></td>
                  <td><?php echo $value['types']; ?></td>
                  <td><?php echo $value['groups']; ?></td>
                  <td><?php echo $value['id_card']; ?></td>
                  <td><?php echo $value['title']; ?></td>
                  <td><?php echo $value['firstname']; ?></td>
                  <td><?php echo $value['lastname']; ?></td>
                  <td><?php echo unix_to_human($value['created']); ?></td>
                  <td><?php echo unix_to_human($value['updated']); ?></td>
                  <td>
                    <?php echo anchor(uri_string().'/info/'.$value['id'],'<i class="fa fa-pencil"></i>',array('class'=>'btn btn-info')); ?>
                    <?php echo anchor(uri_string().'/delete/'.$value['id'],'<i class="fa fa-trash-o"></i>',array('class'=>'btn btn-danger','onclick'=>"return confirm('confirm to delete?');")); ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="box-footer clearfix">
        <span class="col-md-8" style="padding:0px;">
          total : <?php echo isset($count) ? $count : '0'; ?> record(s) | show : 20 record(s) per page
        </span>
        <span class="col-md-4" style="padding:0px;">
          <div class="pull-right">
            <?php echo $this->pagination->create_links(); ?>
          </div>
        </span>
      </div>
    </div>
  </div>
</div>
