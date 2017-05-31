<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('partials/header'); ?>
<div class="container">
	<div class="row">
		<div class="col-sm-3">
			<?php $this->load->view('partials/menubar'); ?>
		</div>
		<div class="col-sm-9">
			<?php $this->load->view('partials/message'); ?>
			<div class="panel panel-default">
				<div class="panel-body">
					<?php echo form_open(uri_string());?>
					<?php echo form_hidden(array('id'=>$module['id']));?>
					<?php echo form_fieldset('ข้อมูลเนื้อหาวิชา');?>
					<div class="form-group">
						<div class="col-sm-12">
							<?php echo form_input(array('name'=>'title','class'=>'form-control','placeholder'=>'หัวข้อวิชาเรียน','required'=>TRUE),set_value('title',$module['title'])); ?>
							<span class="help-block text-right">หัวข้อวิชาเรียน</span>
							<?php echo form_textarea(array('name'=>'objective','class'=>'form-control','placeholder'=>'วัตถุประสงค์รายวิชา','value'=>$module['objective'])); ?>
							<span class="help-block text-right">วัตถุประสงค์รายวิชา</span>
							<?php echo form_textarea(array('name'=>'description','class'=>'form-control','placeholder'=>'เนื้อหาวิชา','value'=>$module['description'])); ?>
							<span class="help-block text-right">เนื้อหาวิชา</span>
						</div>
					</div>
					<?php echo form_fieldset_close().hr();?>
					<div class="form-group">
						<div class="col-sm-12">
							<?php echo form_submit('','ยืนยัน',array('class'=>'btn btn-success')); ?>
							<?php echo form_reset('','ยกเลิก',array('class'=>'btn btn-warning')); ?>
						</div>
					</div>
					<?php echo form_close();?>
          <?php echo validation_errors('<div class="alert alert-warning">','</div>');?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('partials/footer'); ?>
