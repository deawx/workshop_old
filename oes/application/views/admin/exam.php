<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('partials/header'); ?>
<div class="container">
	<div class="row">
		<div class="col-sm-3">
			<?php $this->load->view('partials/menubar'); ?>
		</div>
		<div class="col-sm-9">
			<div class="panel panel-default">
				<div class="panel-body">
					<?php echo form_open(uri_string(),'',array('topic_id'=>$this->uri->segment(3))); ?>
					<?php $input = ($this->uri->segment(3)) ? 'required' : 'disabled'; ?>
					<?php	echo form_fieldset((($this->uri->segment(3)) ? 'ข้อมูลเนื้อหาข้อสอบ'.$title	->title : 'กรุณาเลือกบทเรียนที่จะเพิ่มข้อสอบ')); ?>
					<div class="form-group">
						<?php echo form_input(array('name'=>'question','class'=>'form-control','placeholder'=>'คำถามข้อสอบ',$input=>TRUE)); ?>
					  <p class="help-block text-right">คำถามข้อสอบ</p>
					</div>
					<div class="form-group">
						<?php echo form_label('ก.','',array('class'=>'control-label col-sm-2 text-right')); ?>
						<div class="col-sm-10">
							<?php echo form_input(array('name'=>'choice1','class'=>'form-control','placeholder'=>'คำตอบที่ 1',$input=>TRUE)); ?>
							<p class="help-block text-right"></p>
						</div>
						<?php echo form_label('ข.','',array('class'=>'control-label col-sm-2 text-right')); ?>
						<div class="col-sm-10">
							<?php echo form_input(array('name'=>'choice2','class'=>'form-control','placeholder'=>'คำตอบที่ 2',$input=>TRUE)); ?>
							<p class="help-block text-right"></p>
						</div>
						<?php echo form_label('ค.','',array('class'=>'control-label col-sm-2 text-right')); ?>
						<div class="col-sm-10">
							<?php echo form_input(array('name'=>'choice3','class'=>'form-control','placeholder'=>'คำตอบที่ 3',$input=>TRUE)); ?>
							<p class="help-block text-right"></p>
						</div>
						<?php echo form_label('ง.','',array('class'=>'control-label col-sm-2 text-right')); ?>
						<div class="col-sm-10">
							<?php echo form_input(array('name'=>'choice4','class'=>'form-control','placeholder'=>'คำตอบที่ 4',$input=>TRUE)); ?>
							<p class="help-block text-right"></p>
						</div>
						<?php echo form_label('จ.','',array('class'=>'control-label col-sm-2 text-right')); ?>
						<div class="col-sm-10">
							<?php echo form_input(array('name'=>'choice5','class'=>'form-control','placeholder'=>'คำตอบที่ 5',$input=>TRUE)); ?>
							<p class="help-block text-right"></p>
						</div>
						<?php echo form_label('คำตอบ','',array('class'=>'control-label col-sm-2 text-right')); ?>
						<div class="col-sm-10">
							<?php echo form_dropdown(array('name'=>'answer','class'=>'form-control',$input=>TRUE),dropdown_answer()); ?>
							<p class="help-block text-right"></p>
						</div>
					</div>
					<?php	echo form_fieldset_close(); ?>
					<div class="form-group pull-right"><br>
						<?php $disabled = ($this->uri->segment(3)) ? '' : 'disabled'; ?>
						<?php echo form_submit('','ยืนยัน',array('class'=>'btn btn-success',$disabled=>TRUE)); ?>
            <?php echo form_reset('','ยกเลิก',array('class'=>'btn btn-warning',$disabled=>TRUE)); ?>
					</div>
				</div>
				<div class="panel-footer">
					<?php echo form_close();?>
					<?php echo validation_errors('<div class="alert alert-error">','</div>');?>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading"></div>
			  <div class="panel-body">
				<?php foreach ($exam as $e) : ?>
					<h4>
						<?php echo $e['question']; ?>
						<small class="pull-right">
							<?php echo anchor('admin/exam/edit/'.$e['id'],'แก้ไข'); ?>
							<?php echo anchor('admin/exam/delete/'.$e['id'],'ลบ',array('onclick'=>"return confirm('ลบข้อสอบข้อนี้ ?');")); ?>
						</small>
					</h4>
					<ul class="list-unstyled">
						<li>ก. <?php echo $e['choice1']; ?></li>
						<li>ข. <?php echo $e['choice2']; ?></li>
						<li>ค. <?php echo $e['choice3']; ?></li>
						<li>ง. <?php echo $e['choice4']; ?></li>
						<li>จ. <?php echo $e['choice5']; ?></li>
						<li>คำตอบ <?php echo $e['choice'.$e['answer']]; ?></li>
					</ul>
				<?php endforeach ?>
			  </div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('partials/footer'); ?>
