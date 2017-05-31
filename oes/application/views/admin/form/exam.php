<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('partials/header'); ?>
<div class="container">
	<div class="row">
		<?php $this->load->view('partials/message'); ?>
		<div class="col-sm-3">
			<?php $this->load->view('partials/menubar'); ?>
		</div>
		<div class="col-sm-9">
			<nav class="navbar">
				<p class="navbar-text"><?php echo anchor('admin/exam','ย้อนกลับ',array('class'=>'btn btn-primary')); ?></p>
			</nav>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">แก้ไขข้อสอบ</h3>
				</div>
				<div class="panel-body">
					<?php echo form_open(uri_string(),'',array('id'=>$exam['id'])); ?>
					<?php	echo form_fieldset(); ?>
					<div class="form-group">
						<?php echo form_input(array('name'=>'question','class'=>'form-control','placeholder'=>'คำถามข้อสอบ','required'=>TRUE),set_value('question',$exam['question'])); ?>
						<p class="help-block text-right">คำถามข้อสอบ</p>
					</div>
					<div class="form-group">
						<?php echo form_label('ก.','',array('class'=>'control-label col-sm-2 text-right')); ?>
						<div class="col-sm-10">
							<?php echo form_input(array('name'=>'choice1','class'=>'form-control','placeholder'=>'คำตอบที่ 1','required'=>TRUE),set_value('choice1',$exam['choice1'])); ?>
							<p class="help-block text-right"></p>
						</div>
						<?php echo form_label('ข.','',array('class'=>'control-label col-sm-2 text-right')); ?>
						<div class="col-sm-10">
							<?php echo form_input(array('name'=>'choice2','class'=>'form-control','placeholder'=>'คำตอบที่ 2','required'=>TRUE),set_value('choice2',$exam['choice2'])); ?>
							<p class="help-block text-right"></p>
						</div>
						<?php echo form_label('ค.','',array('class'=>'control-label col-sm-2 text-right')); ?>
						<div class="col-sm-10">
							<?php echo form_input(array('name'=>'choice3','class'=>'form-control','placeholder'=>'คำตอบที่ 3','required'=>TRUE),set_value('choice3',$exam['choice3'])); ?>
							<p class="help-block text-right"></p>
						</div>
						<?php echo form_label('ง.','',array('class'=>'control-label col-sm-2 text-right')); ?>
						<div class="col-sm-10">
							<?php echo form_input(array('name'=>'choice4','class'=>'form-control','placeholder'=>'คำตอบที่ 4','required'=>TRUE),set_value('choice4',$exam['choice4'])); ?>
							<p class="help-block text-right"></p>
						</div>
						<?php echo form_label('จ.','',array('class'=>'control-label col-sm-2 text-right')); ?>
						<div class="col-sm-10">
							<?php echo form_input(array('name'=>'choice5','class'=>'form-control','placeholder'=>'คำตอบที่ 5','required'=>TRUE),set_value('choice5',$exam['choice5'])); ?>
							<p class="help-block text-right"></p>
						</div>
						<?php echo form_label('คำตอบ','',array('class'=>'control-label col-sm-2 text-right')); ?>
						<div class="col-sm-10">
							<?php echo form_dropdown(array('name'=>'answer','class'=>'form-control','required'=>TRUE),dropdown_answer(),set_value('answer',$exam['answer'])); ?>
							<p class="help-block text-right"></p>
						</div>
					</div>
					<?php	echo form_fieldset_close(); ?>
					<div class="form-group pull-right"><br>
						<?php echo form_submit('','ยืนยัน',array('class'=>'btn btn-success')); ?>
						<?php echo form_reset('','ยกเลิก',array('class'=>'btn btn-warning')); ?>
					</div>
				</div>
				<div class="panel-footer">
					<?php echo form_close();?>
					<?php echo validation_errors('<div class="alert alert-error">','</div>');?>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view('partials/footer'); ?>
