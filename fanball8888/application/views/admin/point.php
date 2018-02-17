<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('admin/partials/header'); ?>
<?php $this->load->view('admin/partials/navbar'); ?>
<div id="page-wrapper" >
  <div id="page-inner">
    <div class="row">
      <div class="col-sm-12">
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal">เพิ่มพ้อยท์</a>
        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">เพิ่มพ้อยท์ให้ผู้เล่น</h4>
              </div>
              <form action="<?php echo site_url('admin/point/add_point'); ?>" method="post">
              <div class="modal-body">
                <div class="form-group">
                  <label class="control-label col-sm-3">USER ID</label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control" name="user_id" min="0" max="99999" placeholder="รหัสผู้เล่น">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3">POINTS</label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control" name="point" min="0" max="999999" placeholder="จำนวนพ้อยท์">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <input type="submit" class="btn btn-success btn-block" value="บันทึก">
              </div>
              </form>
            </div>
          </div>
        </div>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <legend>ประวัติการเพิ่มพ้อยท์</legend>
        <table class="table table-striped table-hover datatable">
          <thead>
            <tr>
              <th>#</th>
              <th>วันที่และเวลา</th>
              <th>รหัสผู้เล่น</th>
              <th>จำนวนพ้อยท์</th>
              <th>แอดมิน</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($points as $key => $value): ?>
              <tr>
                <td><?php echo ++$key; ?></td>
                <td><?php echo date('d/m/Y H:i',$value['time']); ?></td>
                <td><?php echo $value['user_id']; ?></td>
                <td><?php echo $value['point']; ?></td>
                <td><?php echo $value['fullname']; ?></td>
                <td><?php echo anchor('admin/match/delete_point/'.$value['id'].'/'.$value['point'],'<i class="fa fa-remove">',array('onclick'=>"return confirm('ต้องการลบ?');")); ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('admin/partials/footer'); ?>
