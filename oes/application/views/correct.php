<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('partials/header'); ?>
<div class="container">
  <div class="row">
    <?php $this->load->view('partials/message'); ?>
    <div class="col-sm-10 col-sm-offset-1">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title"> คำตอบที่ถูกต้อง </h3>
        </div>
        <div class="panel-body">
        <?php
          foreach ($correct as $_c => $c) {
            $exam = $this->db->where('id',$_c)->get('exam')->row_array();
            ?>
          <div class="col-sm-offset-1">
            <h4><?php echo 'คำถาม : '.$exam['question']; ?></h4> <div class="col-sm-offset-1">
              <?php echo ($exam['choice1'] !== ' ') ? form_radio(array('disabled'=>TRUE),'1',($exam['answer'] == '1')).nbs().$exam['choice1'].br() : ''; ?>
              <?php echo ($exam['choice2'] !== ' ') ? form_radio(array('disabled'=>TRUE),'2',($exam['answer'] == '2')).nbs().$exam['choice2'].br() : ''; ?>
              <?php echo ($exam['choice3'] !== ' ') ? form_radio(array('disabled'=>TRUE),'3',($exam['answer'] == '3')).nbs().$exam['choice3'].br() : ''; ?>
              <?php echo ($exam['choice4'] !== ' ') ? form_radio(array('disabled'=>TRUE),'4',($exam['answer'] == '4')).nbs().$exam['choice4'].br() : ''; ?>
              <?php echo ($exam['choice5'] !== ' ') ? form_radio(array('disabled'=>TRUE),'5',($exam['answer'] == '5')).nbs().$exam['choice5'].br() : ''; ?>
            </div> <p class="help-block text-right"></p> </div>
          <?php
          }
        ?>
        </div>
        <div class="panel-footer">
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('partials/footer'); ?>
