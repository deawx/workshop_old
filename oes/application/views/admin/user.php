<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('partials/header'); ?>
<div class="container">
	<div class="row">
		<div class="col-sm-3">
			<?php $this->load->view('partials/menubar'); ?>
		</div>
		<div class="col-sm-9">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">รายชื่อผู้เข้าสอน <small><?php echo anchor('admin/user/instructor','เพิ่ม',array('class'=>'pull-right')); ?></small></h3>
				</div>
				<div class="panel-body">
					<?php echo $instructor; ?>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">รายชื่อผู้เข้าเรียน <small><?php echo anchor('admin/user/student','เพิ่ม',array('class'=>'pull-right')); ?></small></h3>
				</div>
				<div class="panel-body">
					<?php echo $student; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('partials/footer'); ?>
