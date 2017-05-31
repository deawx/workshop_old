<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('partials/header'); ?>
<?php $this->load->view('partials/navbar'); ?>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-primary">
				<div class="panel-heading"></div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-bordered table-striped">
							<thead>
                <tr>
                  <th>ที่</th>
                  <th>ชื่อผู้เรียน</th>
                  <th>คะแนนรวมก่อนเรียน</th>
                  <th>คะแนนรวมระหว่างเรียน</th>
                  <th>คะแนนสอบปลายภาค</th>
                  <th>คะแนนเกรด</th>
                  <th></th>
                </tr>
              </thead>
							<tbody>
								<?php foreach ($all_history as $key => $value) { ?>
								<tr>
									<td><?php echo ++$key; ?></td>
									<td><?php echo ($value['name'] > '0') ? $value['name'] : '-'; ?></td>
									<td><?php echo ($value['pretest_score'] > '0') ? $value['pretest_score'] : '-'; ?></td>
									<td><?php echo ($value['posttest_score'] > '0') ? $value['posttest_score'] : '-'; ?></td>
                  <td><?php echo ($value['score_exam'] > '0') ? $value['score_exam'] : '-'; ?></td>
									<td><?php echo ($value['score_grade'] > '0') ? $value['score_grade'] : '-'; ?></td>
									<td><?php echo anchor('user/all_history/'.$value['id'],'ดูข้อมูล'); ?></td>
								</tr>
  							<?php } ?>
              </tbody>
						</table>
					</div>
				</div>
			</div>
	</div>
</div>
<?php $this->load->view('partials/footer'); ?>
