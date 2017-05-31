<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('partials/header'); ?>
<?php $this->load->view('partials/navbar'); ?>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-success">
				<div class="panel-heading"></div>
				<div class="panel-body">
          <?php echo form_open(uri_string()); ?>
					<?php	echo form_fieldset('ข้อสอบปลายภาค'); ?>
          <?php foreach($exam as $_e=>$e) { $_e = ++$_e; $a = '1';?>
            <div class="col-sm-offset-1">
              <h4><?php echo 'ข้อที่ '.$_e.' '.$e['question']; ?></h4> <div class="col-sm-offset-1">
                <?php echo ($e['choice1'] !== ' ') ? form_radio(array('name'=>'question'.$_e,'required'=>TRUE),$a++).nbs().$e['choice1'].br() : ''; ?>
                <?php echo ($e['choice2'] !== ' ') ? form_radio(array('name'=>'question'.$_e,'required'=>TRUE),$a++).nbs().$e['choice2'].br() : ''; ?>
                <?php echo ($e['choice3'] !== ' ') ? form_radio(array('name'=>'question'.$_e,'required'=>TRUE),$a++).nbs().$e['choice3'].br() : ''; ?>
                <?php echo ($e['choice4'] !== ' ') ? form_radio(array('name'=>'question'.$_e,'required'=>TRUE),$a++).nbs().$e['choice4'].br() : ''; ?>
                <?php echo ($e['choice5'] !== ' ') ? form_radio(array('name'=>'question'.$_e,'required'=>TRUE),$a++).nbs().$e['choice5'].br() : ''; ?>
                <?php echo form_hidden('answer_'.$_e,$e['answer']); ?>
              </div> <p class="help-block text-right"></p> </div>
          <?php } ?>
          <?php	echo form_fieldset_close().hr(); ?>
          <div class="form-group pull-right"> <?php echo form_submit('','ยืนยัน',array('class'=>'btn btn-success')); ?> <?php echo form_reset('','ยกเลิก',array('class'=>'btn btn-warning')); ?> </div>
          <?php echo form_close(); ?>
				</div>
			</div>
	</div>
</div>
<?php $this->load->view('partials/footer'); ?>
