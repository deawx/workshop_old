<html>
<head>
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
</head>
<body>
<table class="w3-table w3-bordered">
	<thead>
    	<tr class="w3-Indigo" height="50">
        	<td class="w3-center">ลำดับ</td>
            <td class="w3-center">วันที่เล่น</td>
            <td class="w3-center">รายการ</td>
            <td class="w3-center">จำนวนแต้ม</td>
            <td class="w3-center">แต้มที่ได้</td>
            <td class="w3-center">สถานะ</td>
            
        </tr>
    </thead>
    <tbody>
    	<?php $c =1; foreach($betting as $betting_value){ ?>
        <?php foreach($match as $match_value){ ?>
        <?php if($betting_value['match_id'] === $match_value['id']){ ?>
        
    	<tr class="w3-pale-blue"  >
        	<td class="w3-center"> <?php echo $c;$c++; ?></td>
            <td class="w3-center"> <?php echo date("d/m/Y",$betting_value['time'])."<br>".date("H:i",$betting_value['time'])." น."; ?></td>
            <td> 
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
            </td>
            <td class="w3-center"> <?php echo $betting_value['point']; ?></td>
            <td class="w3-center"> 
				<?php 
					foreach($pay as $pay_value):
						if($pay_value['betting_id'] === $betting_value['id']):
								$pay_sum = $pay_value['point'] - $betting_value['point'];
								if($betting_value['status'] !== 'problem'):
									if($pay_sum === '0'):
										echo "<span class='w3-text-gray'>Draw.</span>";
									elseif($pay_sum < 0):
										echo "<span class='w3-text-red'>".$pay_sum."</span>";
									else :
										echo "<span class='w3-text-green'>".$pay_sum."</span>";
									endif;
								else:
									echo $pay_value['remark'];
								endif;
						endif;
					endforeach;
				?>
            </td>
            <td class="w3-center"> <?php echo $betting_value['status']; ?></td>
        </tr>
        
        <?php }  //END IF ?>
        <?php }  //END FOREACH ?>
        <?php }  //END FOREACH ?>
    </tbody>
</table>
</body>
</html>
