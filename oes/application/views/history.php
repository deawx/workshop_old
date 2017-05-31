<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('partials/header'); ?>
<div class="container">
  <nav class="navbar"> <p class="navbar-text"><?php echo anchor('','ย้อนกลับ',array('class'=>'btn btn-primary')); ?></p> </nav>
  <div class="row">
    <?php $this->load->view('partials/message'); ?>
    <div class="col-sm-6 col-sm-offset-3">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title"> </h3>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>บทที่</th>
                  <th>หัวข้อบทเรียน</th>
                  <th>คะแนนทดสอบก่อนเรียน</th>
                  <th>คะแนนทดสอบระหว่างเรียน</th>
                </tr>
              </thead>
              <tbody>
                <?php $pre = ''; ?>
                <?php $post = ''; ?>
                <?php foreach ($history as $key => $value) { ?>
                <tr>
                  <td><?php echo ++$key; ?></td>
                  <td><?php echo $value['title']; ?></td>
                  <td><?php echo ($value['pretest_correct'] > '0') ? anchor_popup('user/exam_correct/'.urlencode($value['pretest_correct']),$value['pretest_score'],array('target'=>'_blank')) : '-'; ?></td>
                  <td><?php echo ($value['posttest_correct'] > '0') ? anchor_popup('user/exam_correct/'.urlencode($value['posttest_correct']),$value['posttest_score'],array('target'=>'_blank')) : '-'; ?></td>
                  <?php $pre += $value['pretest_score']; ?>
                  <?php $post += $value['posttest_score']; ?>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="panel-footer">
        </div>
      </div>
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title"> </h3>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>คะแนนทดสอบก่อนเรียน</th>
                  <th>คะแนนทดสอบระหว่างเรียน</th>
                  <th>คะแนนสอบปลายภาค</th>
                  <th>เกรด</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?php echo ($pre > '0') ? $pre : '-'.'/60'; ?></td>
                  <td><?php echo ($post > '0') ? $post : '-'.'/60'; ?></td>
                  <td><?php echo ($student['score_exam'] > '0') ? $student['score_exam'] : '-'.'/60'; ?></td>
                  <td><?php echo ($student['score_grade'] > '0') ? $student['score_grade'] : '-'; ?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="panel-footer"> </div>
      </div>
    </div>
  </div>
  </div>
  </div>
</div>
<?php $this->load->view('partials/footer'); ?>
