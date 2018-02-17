<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('admin/partials/header'); ?>
<?php $this->load->view('admin/partials/navbar'); ?>
<div id="page-wrapper" >
  <div id="page-inner">
    <?php $this->load->view('partials/message'); ?>
    <div class="row">
      <div class="col-md-12">
        <h2>รายจ่าย</h2>
      </div>
      <div class="col-md-12">
        <ul class="nav nav-tabs">
          <li >
              <a href="<?php echo site_url('admin/pay'); ?>">
              	บิลต้องจ่าย<?php if(isset($num_betting)){ echo "<span class='text-danger'>[".$num_betting."]</span>";}else{ echo "<span class='text-danger'>[0]</span>";}?>
              </a> 
          </li>
          <li ><a href="<?php echo site_url('admin/pay/pay_list'); ?>">บิลทั้งหมด</a></li>
          <li class="active">
         	  <a href="<?php echo site_url('admin/pay/pay_problem'); ?>">
              	บิลถูกระงับ<?php if(isset($num_problem)){ echo "<span class='text-danger'>[".$num_problem."]</span>";}else{ echo "<span class='text-danger'>[0]</span>";}?>
              </a>
          </li>
        </ul>
      </div>
          <div class="col-sm-12">
            <table class="table table-striped table-hover pay_listtable">
              <thead>
                <tr>
                  <th class="text-center">ลำดับ</th>
                  <th class="text-center">วันเดือนปี</th>
                  <th class="text-center">เวลา</th>
                  <th class="text-center">รหัสผู้เล่น</th>
                  <th class="text-center">ประเภท</th>
                  <th class="text-center">รหัสบิลเล่น</th>
                  <th class="text-center">จำนวนจ่าย</th>
                  <th class="text-center">รหัสแมท</th>
                  <th class="text-center">หมายเหตุ</th>
                </tr>
              </thead>
              <tbody>
              <?php
			  	  $c = 1;
				  foreach($betting as $betting_value) :
				  
			  ?>
              <tr>
              	<td class="text-center"><?php echo $c; $c++; ?></td>
                <td class="text-center"><?php echo date('d-M-y',$betting_value['time']); ?></td>
                <td class="text-center"><?php echo date('H:i น.',$betting_value['time']); ?></td>
                <td class="text-center"><?php echo $betting_value['user_id']; ?></td>
                <td class="text-center"><?php echo 'betting'; ?></td>
                <td class="text-center"><?php echo $betting_value['id']; ?></td>
                <td class="text-center"><?php echo $betting_value['point']; ?></td>
                <td class="text-center"><?php echo $betting_value['match_id']; ?></td>
                <td class="text-center"><?php echo $betting_value['status']; ?></td>
              </tr>
			  <?php
				  endforeach;
              ?>
            </tbody>
          </table>
        </div>

    </div>
  </div>
</div>
<script type="text/javascript">
  $('.pay_listtable').dataTable({
    'pageLength' : 50,
    'order' : [[1,'asc'],[2,'asc']]
  });
</script>
<?php $this->load->view('admin/partials/footer'); ?>
