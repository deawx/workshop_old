<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('partials/header'); ?>
<?php $this->load->view('partials/navbar'); ?>
<div class="container">
	<div class="row">
		<div class="col-sm-4">
			<div class="panel panel-info">
			  <div class="panel-heading"> </div>
			  <div class="panel-body">
					<?php
						$list = [];
						foreach($topics as $t) :
							$list[] = anchor('content/'.$t['id'],$t['title']);
						endforeach;
						if ($final) :
							if ($check_student['score_grade'] == '0') :
								$list[] = anchor('content/exam','ข้อสอบปลายภาค');
							endif;
						endif;
						echo ul($list);
					?>
			  </div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title">
						<?php echo $topic['title']; ?>
						<small><?php echo 'คะแนนสอบก่อนเรียน('.$profile['pretest_score'].') - คะแนนสอบหลังเรียน('.$profile['posttest_score'].')'; ?></small>
					</h3>
				</div>
				<div class="panel-body">
					<p>เอกสารการเรียน</p>
					<?php
						if ($topic) :
							if ($this->session->login && $this->session->role == 'student') :
								if ( ! $profile) :
									echo anchor(uri_string().'?exam=pretest','แบบทดสอบก่อนเรียน');
								elseif ($profile['pretest_score'] && ! $profile['posttest_score']) :
									if (count($sub_topic) == $learned) :
										echo anchor(uri_string().'?exam=posttest','แบบทดสอบหลังเรียน');
									endif;
								endif;
								?><hr>
								<?php
							endif;
						endif;
					?>
					<p style="text-indent:1em;"> <?php echo $topic['description']; ?> </p>
					<?php if ( ! $this->session->login) : ?>
						<p> ต้องเข้าสู่ระบบก่อน </p>
					<?php elseif ($profile['pretest_score'] OR $this->session->role == 'instructor') : ?>
						<?php foreach($sub_topic as $_st=>$st) : ?>
							<p class="lead">
								<?php echo anchor('content/learn/'.$st['id'].'/'.$st['file'],$st['description']); ?>
								<small>
									<?php
										$learn = $this->db->where('student_id',$this->session->id)->where('sub_topic_id',$st['id'])->get('learn')->result_array();
											foreach ($learn as $ln) :
												if ($ln['sub_topic_id'] == $st['id']) :
													?>
											<i class="fa fa-check"></i><u>อ่านแล้ว</u>
										<?php endif; ?>
									<?php endforeach; ?>
								</small>
							</p>
							<hr>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('partials/footer'); ?>
