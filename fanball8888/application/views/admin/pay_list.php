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
          <li><a href="<?php echo site_url('admin/pay'); ?>">บิลต้องจ่าย<?php if(isset($num_betting)){ echo "<span class='text-danger'>[".$num_betting."]</span>";}else{ echo "<span class='text-danger'>[0]</span>";}?></a> </li>
          <li class="active"><a href="<?php echo site_url('admin/pay/pay_list'); ?>">บิลทั้งหมด</a></li>
          <li>
          	  <a href="<?php echo site_url('admin/pay/pay_problem'); ?>">
              	บิลถูกระงับ<?php if(isset($num_problem)){ echo "<span class='text-danger'>[".$num_problem."]</span>";}else{ echo "<span class='text-danger'>[0]</span>";}?>
              </a>
          </li>
        </ul>
      </div>
          <div class="col-sm-12">
            <table class="table table-striped table-hover matchtable">
              <thead>
                <tr>
                  <th class="text-center">รหัสจ่าย</th>
                  <th class="text-center">วันเดือนปี</th>
                  <th class="text-center">เวลา</th>
                  <th class="text-center">รหัสผู้เล่น</th>
                  <th class="text-center">รหัสบิลเล่น</th>
                  <th class="text-center">รหัสแมท</th>
                  <th class="text-center">จำนวนเล่น</th>
                  <th class="text-center">จำนวนจ่าย</th>
                  <th class="text-center">ผู้จ่าย</th>
                  <th class="text-center">หมายเหตุ</th>
                </tr>
              </thead>
              <tbody>
              <?php
				  foreach($pay as $pay_value) :
				  
			  ?>
              <tr>
              	<td class="text-center"><?php echo $pay_value['id']; ?></td>
                <td class="text-center"><?php echo date('d-M-y',$pay_value['time']); ?></td>
                <td class="text-center"><?php echo date('H:i น.',$pay_value['time']); ?></td>
                <td class="text-center"><?php echo $pay_value['user_id']; ?></td>
                <td class="text-center"><?php echo $pay_value['betting_id']; ?> </td>
                <td class="text-center">
				<?php 
					foreach($match as $match_value): 
						if($match_value['id'] === $pay_value['match_id']):
							echo $match_value['home']." vs ".$match_value['away'];
						endif; 
					endforeach;
				 ?>
                </td>
                <td class="text-center"><?php echo $pay_value['betting_point']; ?></td>
                <td class="text-center"><?php echo $pay_value['point']; ?></td>
                <td class="text-center"><?php echo $pay_value['admin_id']; ?></td>
                <td class="text-center"><?php echo $pay_value['remark']; ?></td>
                
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
<?php $this->load->view('admin/partials/footer'); ?>

<?php $this->load->view('admin/partials/footer'); ?>
<script type="text/javascript">
  $('.matchtable').dataTable({
    'pageLength' : 50,
    'order' : [1,'desc']
  });
</script>