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
          <li class="active"><a href="#">บิลที่ต้องจ่าย<?php if(isset($num_betting)){ echo "<span class='text-danger'>[".$num_betting."]</span>";}else{ echo "<span class='text-danger'>[0]</span>";}?></a> </li>
          <li><a href="<?php echo site_url('admin/pay/pay_list'); ?>">บิลทั้งหมด</a></li>
          <li>
              <a href="<?php echo site_url('admin/pay/pay_problem'); ?>">
              	บิลถูกระงับ<?php if(isset($num_problem)){ echo "<span class='text-danger'>[".$num_problem."]</span>";}else{ echo "<span class='text-danger'>[0]</span>";}?>
              </a>
          </li>
        </ul>
      </div>
        <form action="<?php echo site_url('admin/pay/save_pay'); ?>" method="post">
          <div class="col-sm-12">
            <table class="table table-striped table-hover datatable">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <td class="text-center"><input type="checkbox" onchange="toggle(this)" /></td>
                  <th class="text-center">รหัสบิล</th>
                  <th class="text-center">รหัสผู้เล่น</th>
                  <th class="text-center">Home</th>
                  <th class="text-center">Score</th>
                  <th class="text-center">Away</th>
                  <th class="text-center">HDP</th>
                  <th class="text-center">O/U</th>
                  <th class="text-center">เวลาแข่ง</th>
                  <th class="text-center">เวลาพนัน</th>
                  <th class="text-center">พนันอะไร</th>
                  <th class="text-center">ผล</th>
                  <th class="text-center">แต้มพนัน</th>
                  <th class="text-center">แต้มที่ได้</th>
                  <th class="text-center">มีปัญหา</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i=1;
                foreach($list_betting as $list_betting_value) :
				$sum='';
				$win_detail='';
				if($list_betting_value['bet'] == "home") :
				  if($list_betting_value['hdp_home'] > 0) ://มากกว่า 0 เช่น 0.1, 0.95
					if($list_betting_value['win_team'] >= 0.5) :
					  //เจ้าบ้าน ชนะ 100% (100*0.95)=195
					  $sum = ($list_betting_value['point'] * $list_betting_value['hdp_home'])+$list_betting_value['point'];
					  $win_detail = 'Home 100%';
					elseif ($list_betting_value['win_team'] <= -0.5) :
					  //ทีมเยือน ชนะ 100% 0
					  $sum = 0;
					  $win_detail = 'Away 100%';
					elseif ($list_betting_value['win_team'] == 0.00) :
					  //เสมอ 100
					  $sum = $list_betting_value['point'];
					  $win_detail = 'Draw';
					elseif ($list_betting_value['win_team'] == 0.25) :
					  //เจ้าบ้าน ชนะ 50%  ((100*0.95)/2)+100 = 147.5
					  $sum = (($list_betting_value['point'] * $list_betting_value['hdp_home'])/2)+$list_betting_value['point'];
					  $win_detail = 'Home 50%';
					elseif ($list_betting_value['win_team'] == -0.25) :
					  //ทีมเยือน ชนะ 50% 100/2 = 50
					  $sum = $list_betting_value['point']/2 ;
					  $win_detail = 'Away 50%';
					endif;
				  elseif ($list_betting_value['hdp_home'] < 0) :
					if ($list_betting_value['win_team'] >= 0.5) :
					  //เจ้าบ้าน ชนะ 100% 100*2= 200
					  $sum = $list_betting_value['point'] * 2;
					  $win_detail = 'Home 100%';
					elseif ($list_betting_value['win_team'] <= -0.5) :
					  //ทีมเยือน ชนะ 100% (100*-0.95)-100 = 5
					  $sum = ($list_betting_value['point']*$list_betting_value['hdp_home'])+ $list_betting_value['point'];
					  $win_detail = 'Away 100%';
					elseif ($list_betting_value['win_team'] == 0) :
					  //เสมอ
					  $sum = $list_betting_value['point'];
					  $win_detail = 'Draw';
					elseif($list_betting_value['win_team'] == 0.25) :
					  //เจ้าบ้าน ชนะ 50% (100/2)+100 = 150
					  $sum = ($list_betting_value['point']/2)+$list_betting_value['point'];
					  $win_detail = 'Home 50%';
					elseif ($list_betting_value['win_team'] == -0.25) :
					  //ทีมเยือน ชนะ 50% (100*-0.95)/2 = 47.5
					  $sum = ($list_betting_value['point']*$list_betting_value['hdp_home'])/-2 ;
					  $win_detail = 'Away 50%';
					endif;
				  endif;
				elseif ($list_betting_value['bet'] == "away") :
				  if ($list_betting_value['hdp_away'] > 0) :
					if ($list_betting_value['win_team'] >= 0.5) :
					  //เจ้าบ้าน ชนะ 100% 0
					  $sum = 0;
					  $win_detail = 'Home 100%';
					elseif($list_betting_value['win_team'] <= -0.5) :
					  //ทีมเยือน ชนะ 100%  (100*0.95)+100 = 195
					  $sum = ($list_betting_value['point'] * $list_betting_value['hdp_away'])+$list_betting_value['point'];
					  $win_detail = 'Away 100%';
					elseif ($list_betting_value['win_team'] == 0) :
					  //เสมอ 100
					  $sum = $list_betting_value['point'];
					  $win_detail = 'Draw';
					elseif($list_betting_value['win_team'] == 0.25) :
					  //เจ้าบ้าน ชนะ 50% 100/2=50
					  $sum = $list_betting_value['point']/2;
					  $win_detail = 'Home 50%';
					elseif ($list_betting_value['win_team'] == -0.25) :
					  //ทีมเยือน ชนะ 50% ((100*0.95)/2)+100 = 147.5
					  $sum = ($list_betting_value['point'] * $list_betting_value['hdp_away'])/-2;
					  $win_detail = 'Away 50%';
					endif;
				  elseif ($list_betting_value['hdp_away'] < 0) :
					if ($list_betting_value['win_team'] >= 0.5) :
					  //เจ้าบ้าน ชนะ 100% (100*-0.95)+100=5
					  $sum = ($list_betting_value['point']*$list_betting_value['hdp_away'])+ $list_betting_value['point'];
					  $win_detail = 'Home 100%';
					elseif ($list_betting_value['win_team'] <= -0.5) :
					  //ทีมเยือน ชนะ 100%
					  $sum = $list_betting_value['point'] * 2;
					  $win_detail = 'Away 100%';
					elseif ($list_betting_value['win_team'] == 0) :
					  //เสมอ
					  $sum = $list_betting_value['point'];
					  $win_detail = 'Draw';
					elseif ($list_betting_value['win_team'] == 0.25) :
					  //เจ้าบ้าน ชนะ 50% (100*-0.95)/-2 = 47.5
					  $sum = ($list_betting_value['point']*$list_betting_value['hdp_away'])/-2;
					  $win_detail = 'Home 50%';
					elseif ($list_betting_value['win_team'] == -0.25) :
					  //ทีมเยือน ชนะ 50% (100/2)+100 = 150
					  $sum = ($list_betting_value['point']/2)+$list_betting_value['point'];
					  $win_detail = 'Away 50%';
					endif;
				  endif;
				elseif ($list_betting_value['bet'] == "over") :
				  if ($list_betting_value['ou_over'] > 0) :
					if ($list_betting_value['win_ou'] >= 0.5) :
					  //สูง ชนะ 100% (100*0.95)+100=195
					  $sum = ($list_betting_value['point'] * $list_betting_value['ou_over'])+$list_betting_value['point'];
					  $win_detail = 'Over 100%';
					elseif ($list_betting_value['win_ou'] <= -0.5) :
					  //ต่ำ ชนะ 100% 0
					  $sum = 0;
					  $win_detail = 'Under 100%';
					elseif ($list_betting_value['win_ou'] == 0) :
					  //เสมอ 100
					  $sum = $list_betting_value['point'];
					  $win_detail = 'Draw';
					elseif ($list_betting_value['win_ou'] == 0.25) :
					  //สูง ชนะ 50%  ((100*0.95)/2)+100 = 147.5
					  $sum = (($list_betting_value['point'] * $list_betting_value['ou_over'])/2)+$list_betting_value['point'];
					  $win_detail = 'Over 50%';
					elseif ($list_betting_value['win_ou'] == -0.25) :
					  //ต่ำ ชนะ 50% 100/2 = 50
					  $sum = $list_betting_value['point']/2 ;
					  $win_detail = 'Under 50%';
					endif;
				  elseif ($list_betting_value['ou_over'] < 0) :
					if ($list_betting_value['win_ou'] >= 0.5) :
					  //สูง ชนะ 100% 100*2= 200
					  $sum = $list_betting_value['point'] * 2;
					  $win_detail = 'Over 100%';
					elseif ($list_betting_value['win_ou'] <= -0.5) :
					  //ต่ำ ชนะ 100% (100*-0.95)-100 = 5
					  $sum = ($list_betting_value['point']*$list_betting_value['ou_over'])+ $list_betting_value['point'];
					  $win_detail = 'Under 100%';
					elseif ($list_betting_value['win_ou'] == 0) :
					  //เสมอ
					  $sum = $list_betting_value['point'];
					  $win_detail = 'Draw';
					elseif ($list_betting_value['win_ou'] == 0.25) :
					  //สูง ชนะ 50% (100/2)+100 = 150
					  $sum = ($list_betting_value['point']/2)+$list_betting_value['point'];
					  $win_detail = 'Over 50%';
					elseif ($list_betting_value['win_ou'] == -0.25) :
					  //ต่ำ ชนะ 50% (100*-0.95)/2 = 47.5
					  $sum = ($list_betting_value['point']*$list_betting_value['ou_over'])/-2 ;
					  $win_detail = 'Under 50%';
					endif;
				  endif;
				elseif($list_betting_value['bet'] == "under") :
				  if ($list_betting_value['win_ou'] > 0) :
					if ($list_betting_value['win_ou'] >= 0.5) :
					  //สูง ชนะ 100% 0
					  $sum = 0;
					  $win_detail = 'Over 100%';
					elseif ($list_betting_value['win_ou'] <= -0.5) :
					  //ต่ำ ชนะ 100%  (100*0.95)+100 = 195
					  $sum = ($list_betting_value['point'] * $list_betting_value['ou_under'])+$list_betting_value['point'];
					  $win_detail = 'Under 100%';
					elseif ($list_betting_value['win_ou'] == 0) :
					  //เสมอ 100
					  $sum = $list_betting_value['point'];
					  $win_detail = 'Draw';
					elseif ($list_betting_value['win_ou'] == 0.25) :
					  //สูง ชนะ 50% 100/2=50
					  $sum = $list_betting_value['point']/2;
					  $win_detail = 'Over 50%';
					elseif ($list_betting_value['win_ou'] == -0.25) :
					  //ต่ำ ชนะ 50% ((100*0.95)/2)+100 = 147.5
					  $sum = ($list_betting_value['point'] * $list_betting_value['ou_under'])/-2;
					  $win_detail = 'Under 50%';
					endif;
				  elseif ($list_betting_value['win_ou'] < 0) :
					if ($list_betting_value['win_ou'] >= 0.5) :
					  //สูง ชนะ 100% (100*-0.95)+100=5
					  $sum = ($list_betting_value['point']*$list_betting_value['ou_under'])+ $list_betting_value['point'];
					  $win_detail = 'Over 100%';
					elseif ($list_betting_value['win_ou'] <= -0.5) :
					  //ต่ำ ชนะ 100%
					  $sum = $list_betting_value['point'] * 2;
					  $win_detail = 'Under 100%';
					elseif ($list_betting_value['win_ou'] == 0) :
					  //เสมอ
					  $sum = $list_betting_value['point'];
					  $win_detail = 'Draw 100%';
					elseif ($list_betting_value['win_ou'] == 0.25) :
					  //สูง ชนะ 50% (100*-0.95)/-2 = 47.5
					  $sum = ($list_betting_value['point']*$list_betting_value['ou_under'])/-2;
					  $win_detail = 'Over 50%';
					elseif ($list_betting_value['win_ou'] == -0.25) :
					  //ต่ำ ชนะ 50% (100/2)+100 = 150
					  $sum = ($list_betting_value['point']/2)+$list_betting_value['point'];
					  $win_detail = 'Under 50%';
					endif;
				  endif;
			    endif;

                    ?>
                    <tr>
                      <td class="text-center"><?php echo $i; $i++; ?></td>
                      <td class="text-center"><input type="checkbox" name="check_ture[]" value="<?php echo $list_betting_value['id']; ?>"></td>
                      <td class="text-center"><?php echo $list_betting_value['id']; ?></td>
                      <td class="text-center"><?php echo $list_betting_value['user_id']; ?></td>
                      <td class="text-right"><?php echo $list_betting_value['home']; ?></td>
                      <td class="text-center"><?php echo $list_betting_value['score_home']." - ".$list_betting_value['score_away']; ?></td>
                      <td class="text-left"><?php echo $list_betting_value['away']; ?></td>
                      <td class="text-center"><?php echo $list_betting_value['hdp']; ?></td>
                      <td class="text-center"><?php echo $list_betting_value['ou']; ?></td>
                      <td class="text-center"><?php echo date('d/m/Y H:i',$list_betting_value['match_time']); ?></td>
                      <td class="text-center">
                        <?php if($list_betting_value['match_time'] > $list_betting_value['time'])
                        {echo "<span class='text-success'>".date('d/m/Y H:i',$list_betting_value['time'])."</span>";}
                        else{echo "<span class='text-danger'>".date('d/m/Y H:i',$list_betting_value['time'])."</span>";}
                        ?>
                      </td>
                      <td class="text-center"><?php echo $list_betting_value['bet']; ?></td>
                      <td class="text-center"><?php echo $win_detail; ?></td>
                      <td class="text-center"><?php echo $list_betting_value['point']; ?></td>
                      <td >
                      <input type="text" name="sum[<?php echo $list_betting_value['id']; ?>]" class="form-control text-center" value="<?php echo $sum; ?>"  />
                      </td>
                      <td><a href="<?php echo base_url('admin/pay/add_pay_problem?betting_id='.$list_betting_value['id']); ?>"><input type="button" class="btn btn-danger" value="ระงับไว้" onclick="return confirm('ยืนยันการระงับไอดีนี้')"/></a></td>
                    </tr>
                    <?php

                endforeach;
              ?>
            </tbody>
          </table>
        </div>
        <div class="col-md-12">
            <input type="submit" value=" จ่าย " class="btn btn-success"/>
        </div>
      </form>
    </div>
  </div>
</div>
<script language="JavaScript">
  function toggle(source) {
    checkboxes = document.getElementsByName('check_ture[]');
    for(var i=0, n=checkboxes.length;i<n;i++) {
      checkboxes[i].checked = source.checked;
    }
  }
</script>
<?php $this->load->view('admin/partials/footer'); ?>
