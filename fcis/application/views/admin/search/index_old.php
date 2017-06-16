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
        <h3 class="box-title">Search for Patients</h3>
      </div>
      <div class="box-body" style="padding:2em;">
        <!-- <div class="row">
          <div class="col-md-6">
            <?php echo form_open('',array('class'=>'form-horizontal','method'=>'GET')); ?>
            <div class="form-group">
              <?php echo form_label('personal id:','id_card',array('class'=>'control-label col-sm-2')); ?>
              <div class="col-sm-10">
                <?php echo form_input(array('name'=>'id_card','class'=>'form-control','value'=>$this->input->get('id_card'),'placeholder'=>'personal id','maxlength'=>'13')); ?>
              </div>
            </div>
            <div class="form-group">
              <?php echo form_label('firstname:','firstname',array('class'=>'control-label col-sm-2')); ?>
              <div class="col-sm-10">
                <?php echo form_input(array('name'=>'firstname','class'=>'form-control','value'=>$this->input->get('firstname'),'placeholder'=>'firstname')); ?>
              </div>
            </div>
            <div class="form-group">
              <?php echo form_label('lastname:','lastname',array('class'=>'control-label col-sm-2')); ?>
              <div class="col-sm-10">
                <?php echo form_input(array('name'=>'lastname','class'=>'form-control','value'=>$this->input->get('lastname'),'placeholder'=>'lastname')); ?>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <?=form_submit('','search',array('class'=>'btn btn-success','autocomplete'=>'off'));?>
                <?=anchor(uri_string(),'<i class="fa fa-refresh"></i>',array('class'=>'btn btn-default'));?>
              </div>
            </div>
            <?php echo form_close(); ?>
          </div>
          <div class="col-md-6">
            <?php echo $this->session->flashdata('message'); ?>
          </div>
        </div> -->
        <hr>
        <!-- <div class="row">
          <?php echo anchor(uri_string(),'<i class="fa fa-refresh"></i>',array('class'=>'btn btn-default')); ?>
          <span class="pull-right">
            <?php echo anchor('#','export to csv',array('class'=>'btn btn-default')); ?>
            <?php echo anchor('#','export to sql',array('class'=>'btn btn-default')); ?>
          </span>
          <br>
        </div> -->
        <div class="row">
          <?php if ($this->input->get('mode') === NULL OR $this->input->get('mode') === 'list') : ?>
            <table class="table table-condensed table-striped table-hover datatable">
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
                      <?php
                      echo anchor('admin/search?id='.$value['id'],'<i class="fa fa-eye"></i>',array('class'=>'btn btn-default'));
                      if (any_in_array(array('special','admin','editor'),$current_groups)) :
                        echo anchor('admin/patients/edit/'.$value['id'],'<i class="fa fa-edit"></i>',array('class'=>'btn btn-info'));
                      endif;
                      ?>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          <?php else : ?>
          <?php endif; ?>
        </div>
      </div>
      <div class="box-footer clearfix">
        <!-- total : <?php echo isset($count) ? $count : '0'; ?> record(s) | show : 20 record(s) per page -->
        <!-- <?php echo $this->pagination->create_links(); ?> -->
      </div>
    </div>
  </div>
</div>

<?=link_tag('assets/admin/plugins/datatables/datatables.min.css');?>
<?=script_tag('assets/admin/plugins/datatables/datatables.min.js');?>
<script type="text/javascript">
  $(document).ready(function(){
    $('.datatable').DataTable();
  });
</script>
