<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('admin/partials/header'); ?>
<div id="container-fluid" >
  <div class="row-fluid">
    <div class="col-sm-12">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">รายละเอียดข้อมูล</h3>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-bordered">
              <?php foreach ($data as $_d=>$d): ?>
                <tr><th class="text-right"><?php echo $_d; ?></th><td><?php echo $d; ?></td></tr>
              <?php endforeach; ?>
            </table>
          </div>
        </div>
        <div class="panel-footer"></div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('admin/partials/footer'); ?>
