<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('partials/header'); ?>
<?php $this->load->view('partials/navbar'); ?>
<?php $this->load->view('partials/menubar'); ?>
<style>
.sport_th{ background-color:#900;color:#fff;font-weight: bold;}
.sport_tr{ background-color:#ccc;font-weight: bold;}
.table-striped>tbody>tr:nth-of-type(odd){ background-color:#FFE6E6;}
</style>
<div class="container" >
	<div class="row">
	  <div class="col-sm-12">
			<div id="myfirstchart" style="height: 250px;"></div>
	  </div>
	</div>
	<div class="row">
    	<div class="col-md-2" style="padding:5px; padding-top:0px;">
        <div class="row" align="center">
        	<table width="95%">
            	<tr>
                	<td class="text-center">
						<?php if ($this->session->login) : ?>
                			<a href=""
                            onclick="window.open('<?php echo site_url('sportbook/history'); ?>', '_blank', 'width=800,height=600,scrollbars=yes,menubar=no,status=yes,resizable=yes,screenx=0,screeny=0'); return false;">
                            	การเดิมพัน
                            </a>
                        <?php endif; ?>
            		</td>
                    <td class="text-center">
						<?php if ($this->session->login) : ?>
                			<a href=""
                            onclick="window.open('<?php echo site_url('sportbook/history'); ?>', '_blank', 'width=800,height=600,scrollbars=yes,menubar=no,status=yes,resizable=yes,screenx=0,screeny=0'); return false;">
                            	การเงิน
                            </a>
                        <?php endif; ?>
            		</td>
                    <td class="text-center">
						<?php if ($this->session->login) : ?>
                			<a href=""
                            onclick="window.open('<?php echo site_url('sportbook/history'); ?>', '_blank', 'width=800,height=600,scrollbars=yes,menubar=no,status=yes,resizable=yes,screenx=0,screeny=0'); return false;">
                            	ผลการแข่ง
                            </a>
                        <?php endif; ?>
            		</td>
                </tr>
            </table>
                <hr />

                	<div class="text-center"><h5><b><span style="color:#999;">POINT</span>  <?php echo number_format((isset($point)) ? $point->point : '0',2); ?> </b></h5></div>

            <hr />
        <?php if(isset($select_bet['id'])){ ?>
        	<table width="95%" >
            	<tr>
                    <td colspan="2" class="sport_th" style="padding:10px;">ตั๋ว : แฮนดิแคป</td>
                </tr>
                <tr>
                    <td colspan="2" style="background-color:#CCC; height:20px;padding:6px;font-weight: bold;font-size:14px;" align="center">ฟุตบอล</td>
                </tr>
                <tr>
                	<td  colspan="2" style="background-color:#CCC; height:20px;padding:6px;font-weight: bold; font-size:14px;" align="center" class="text-center">

					<?php

					if($bet === "home")
					{
						if($select_bet['team'] === "home")
						{
							echo "<b><span class='text-danger'> ต่อ ".$select_bet['home']."</span> <br> แฮนดิแคป ".$select_bet['hdp']."<br> @ ".$select_bet['hdp_home']."</b>";
						}
						else if($select_bet['team'] === "away")
						{
							echo "<b>รอง ".$select_bet['home']."<br> แฮนดิแคป ".$select_bet['hdp']."<br> @ ".$select_bet['hdp_home']." </b>";
						}
					}
					else if($bet === "away")
					{
						if($select_bet['team'] === "home")
						{
							echo "<b>รอง ".$select_bet['away']."<br> แฮนดิแคป ".$select_bet['hdp']."<br> @ ".$select_bet['hdp_away']."</b>";
						}
						else if($select_bet['team'] === "away")
						{
							echo "<b><span class='text-danger'>ต่อ ".$select_bet['away']."</span><br> แฮนดิแคป ".$select_bet['hdp']."<br> @ ".$select_bet['hdp_away']."</b>";
						}
					}
					else if($bet === "over")
					{
						echo "<b> สูงกว่า ".$select_bet['ou']."<br> @ ".$select_bet['ou_over'];
					}
					else if($bet === "under")
					{
						echo "<b> ต่ำกว่า ".$select_bet['ou']."<br> @ ".$select_bet['ou_under'];
					}
					?>

                    </td>
                </tr>
                <form action="<?php echo site_url('sportbook/save_betting') ;?>" name="add_sportbook" method="post" >
                <tr>
                	<td colspan="2" class="sport_tr" align="center" style="height:30px;padding:10px;"><input type="number" class=" text-right" name="point" value="" placeholder="P"  /></td>
                    <input type="hidden" name="match_id" value="<?php echo $select_bet['id']  ;?>" />
                    <input type="hidden" name="bet" value="<?php echo $bet;?>"  />
                    <input type="hidden" name="match_time" value="<?php echo $select_bet['time']; ?>"  />
                </tr>
                <tr style="background-color:#CCC;">
                	<td align="center" colspan="2" style=" padding-bottom:20px;">
                    	<input type="submit" value="เดิมพัน" class="btn-xs"/>
                        <input type="button" value="ยกเลิก" class="btn-xs" onclick="window.location='<?php echo site_url('sportbook'); ?>';" />
                    </td>
                </tr>

                </form>
                <tr>

                	<td  colspan="2" class="text-center"><br />เวลา <?php echo date('H:i',$select_bet['time'])." น."; ?></td>
                </tr>
            	<tr>
                    <td colspan="2" class="text-center">

						<?php
                        if($select_bet['team'] === "home")
                        {
                            echo "<span class='text-danger'>".$select_bet['home']."</span> <br>vs<br> ".$select_bet['away']."<br>";
                        }
                        else if($select_bet['team'] === "away")
                        {
                            echo $select_bet['home']."<br> vs <br> <span class='text-danger'>".$select_bet['away']."</span><br>";
                        }
                        ?>
                    </td>
                </tr>
            </table>
            <br />
            <?php } ?>
            <?php if($betting !== ""){ ?>
        	<table  class="table table-striped">
                    <tr>
                    	<td width="10%"  class="sport_th">No</td>
                        <td align="center"  class="sport_th">รายการ</td>
                    </tr>
                <tbody>
                <?php $i = 1; foreach($betting as $betting_value){ ?>
                <?php foreach ($match as $match_value)
							{
								if($betting_value['match_id'] === $match_value['id'])
								{ ?>
                                <tr>
                                    <td class="text-center"><?php echo $i; $i++; ?></td>
                                    <td align="right">
                                        <?php
                                         if($match_value['team'] === 'home'){ echo "<span class='text-danger'>".$match_value['home']."</span> vs ".$match_value['away'];}
                                        else if($match_value['team'] === 'away'){ echo $match_value['home']." vs <span class='text-danger'>".$match_value['away']."</span>" ;} ?>
                                        <br />
                                        <?php echo date('H:i',$match_value['time'])." น.   ".date('d/m/y',$match_value['time']); ?>
                                        <br />
                                        <b>
                                        <?php
                                        if($betting_value['bet'] === "home")
                                        {
                                            if($match_value['team'] === "home")
                                            {
                                                echo "<b><span class='text-danger'> ต่อ ".$match_value['home'].$match_value['hdp']."</span></b>";
                                            }
                                            else if($match_value['team'] === "away")
                                            {
                                                echo "<b>รอง ".$match_value['home'].$match_value['hdp']."</b>";
                                            }
                                        }
                                        else if($betting_value['bet'] === "away")
                                        {
                                            if($match_value['team'] === "home")
                                            {
                                                echo "<b>รอง ".$match_value['away'].$match_value['hdp']."</b>";
                                            }
                                            else if($match_value['team'] === "away")
                                            {
                                                echo "<b><span class='text-danger'>ต่อ ".$match_value['away'].$match_value['hdp']."</span></b>";
                                            }
                                        }
                                        else if($betting_value['bet'] === "over")
                                        {
                                            echo "<b> สูงกว่า ".$match_value['ou'];
                                        }
                                        else if($betting_value['bet'] === "under")
                                        {
                                            echo "<b> ต่ำกว่า ".$match_value['ou'];
                                        }
                                        ?>
                                        </b>
                                        <br />
                                        <?php echo "จำนวน <b>".$betting_value['point']."</b> แต้ม"; ?>
                                    </td>
                                </tr>
               			   <?php } ?>
                	<?php } ?>
                <?php } ?>
                </tbody>
            </table>
            <?php } ?>
        </div>
        </div>
		<div class='col-md-10'>
			<table class='table  table-striped  table-hover table-condensed'>
				<thead>
					<tr  class="sport_th">
						<th colspan="8" class="h3 text-center">วันที่ <?php echo date("d/m/Y",time()); ?></th>
					</tr>
					<tr  class="sport_tr">
						<th class="text-center" width="10%">เวลา</th>
						<th class="text-center">รายการ</th>
						<th class="text-center" width="10%">HDP !</th>
						<th class="text-center" width="10%">เจ้าบ้าน</th>
						<th class="text-center" width="10%">ทีมเยือน</th>
						<th class="text-center" width="10%"> โกล</th>
						<th class="text-center" width="10%">สูง</th>
						<th class="text-center" width="10%">ต่ำ</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach($match as $match_value) {
						$datetimeclose = strtotime("11:00:00 +1 days");
						$datetimeopen = strtotime("11:00:00");
						$time_match = $match_value['time'];
						if($time_match > time() && $time_match <= $datetimeclose){
					?>
						<tr style="font-weight: bold;">
                        <form action="<?php echo site_url('admin/sportbook') ;?>" method="post" name="add">
							<td class="text-center"><?php echo date("H:i",$match_value['time']); ?></td>
							<td class="text-left">
								<?php if($match_value['team']==="home"){echo "<span class='text-danger'>".$match_value['home']."</span>";}else{echo $match_value['home'];} ?>
								<br>
								<?php if($match_value['team']==="away"){echo "<span class='text-danger'>".$match_value['away']."</span>";}else{echo $match_value['away'];} ?>
							</td>
							<td class="text-center" style=" color:#999;"><?php echo $match_value['hdp']; ?></td>
							<td class="text-center">

								<a href="<?php echo site_url('sportbook?bet=home&match='.$match_value['id']); ?>" <?php if($match_value['hdp_home'] >= 0){echo "style=' color:#009;'"; }else{echo "style=' color:#f00;'"; }?>>
									<?php echo $match_value['hdp_home']; ?>
								</a>

							</td>
							<td class="text-center">
								<a href="<?php echo site_url('sportbook?bet=away&match='.$match_value['id']); ?>" <?php if($match_value['hdp_away'] >= 0){echo "style=' color:#009;'"; }else{echo "style=' color:#f00;'"; }?>>
									<?php echo $match_value['hdp_away']; ?>
								</a>
							</td>
							<td class="text-center" style=" color:#999;font-weight: bold;"> <?php echo $match_value['ou']; ?></td>
							<td class="text-center">
								<a href="<?php echo site_url('sportbook?bet=over&match='.$match_value['id']); ?>" <?php if($match_value['ou_over'] >= 0){echo "style=' color:#009;'"; }else{echo "style=' color:#f00;'"; }?>>
									<?php echo $match_value['ou_over']; ?>
								</a>
							</td>
							<td class="text-center">
								<a href="<?php echo site_url('sportbook?bet=under&match='.$match_value['id']); ?>" <?php if($match_value['ou_under'] >= 0){echo "style=' color:#009;'"; }else{echo "style=' color:#f00;'"; }?>>
									<?php echo $match_value['ou_under']; ?>
								</a>
							</td>
                        </form>
						</tr>
					<?php
						} // end IF
						} // end Foreach ?>
				</tbody>
				<tfoot>
					<tr  class="sport_tr">
						<th class="text-center">เวลา</th>
						<th class="text-center">รายการ</th>
						<th class="text-center">HDP !</th>
						<th class="text-center">เจ้าบ้าน</th>
						<th class="text-center">ทีมเยือน</th>
						<th class="text-center">โกล</th>
						<th class="text-center">สูง</th>
						<th class="text-center">ต่ำ</th>
					</tr>
					<tr  class="sport_th">
						<th colspan="8" class="h3 text-center"> วันที่ <?php echo date("d/m/Y",time()); ?></th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>

<?php echo link_tag('assets/css/morris.css'); ?>
<?php $this->load->view('partials/footer'); ?>
<?php echo script_tag('assets/js/raphael.min.js');?>
<?php echo script_tag('assets/js/morris.min.js');?>

<script type="text/javascript">
new Morris.Line({
// ID of the element in which to draw the chart.
element: 'myfirstchart',
// Chart data records -- each entry in this array corresponds to a point on
// the chart.
data: [
	{ year: '2008', value: 20 },
	{ year: '2009', value: 10 },
	{ year: '2010', value: 5 },
	{ year: '2011', value: 5 },
	{ year: '2012', value: 20 }
],
// The name of the data record attribute that contains x-values.
xkey: 'year',
// A list of names of data record attributes that contain y-values.
ykeys: ['value'],
// Labels for the ykeys -- will be displayed when you hover over the
// chart.
labels: ['Value']
});
</script>
