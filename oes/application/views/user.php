<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('partials/header'); ?>
<?php $this->load->view('partials/navbar'); ?>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-primary">
				<div class="panel-heading"></div>
				<div class="panel-body">
					<h3><?php echo 'ชื่อ - นามสกุล : '.$user['name'] ; ?></h3>
					<p><?php echo 'อีเมล์ : '.$user['email'] ; ?></p>
					<p><?php echo 'เบอร์โทรศัพท์ : '.$user['phone'] ; ?></p>
					<p><?php echo 'ที่อยู่ : '.$user['address'] ; ?></p>
					<hr>
					<div class="table-responsive">
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>ที่</th>
									<th>บทเรียน</th>
									<th>คะแนนทดสอบก่อนเรียน</th>
									<th>คะแนนทดสอบระหว่างเรียน</th>
								</tr>
							</thead>
							<tbody>
								<?php $pre = ''; ?>
								<?php $post = ''; ?>
								<?php foreach ($profile as $key => $value) { ?>
								<tr>
									<td><?php echo ++$key; ?></td>
									<td><?php echo $value['title']; ?></td>
									<td><?php echo ($value['pretest_correct'] > '0') ? anchor_popup('user/exam_correct/'.urlencode($value['pretest_correct']),$value['pretest_score'],array('target'=>'_blank')) : '-'; ?></td>
                  <td><?php echo ($value['posttest_correct'] > '0') ? anchor_popup('user/exam_correct/'.urlencode($value['posttest_correct']),$value['posttest_score'],array('target'=>'_blank')) : '-'; ?></td>
								</tr>
								<?php $pre += $value['pretest_score']; ?>
								<?php $post += $value['posttest_score']; ?>
								<?php } ?>
								<tr>
									<td colspan="2">คะแนนรวม</td>
									<td><?php echo ($pre > '0') ? $pre : '-'; ?></td>
									<td><?php echo ($post > '0') ? $post : '-'; ?></td>
								</tr>
								<tr>
									<td colspan="3">คะแนนสอบปลายภาค</td>
									<td><?php echo ($user['score_exam'] > '0') ? $user['score_exam'] : '-'; ?></td>
								</tr>
								<tr>
									<td colspan="3">เกรด</td>
									<td><?php echo ($user['score_grade'] > '0') ? $user['score_grade'] : '-'; ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
	</div>
</div>
<?php $this->load->view('partials/footer'); ?>
