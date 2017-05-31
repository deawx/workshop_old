<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('partials/header'); ?>
<div class="container">
	<div class="row">
		<div class="col-sm-3">
			<?php $this->load->view('partials/menubar'); ?>
		</div>
		<div class="col-sm-9">
			<?php $this->load->view('partials/message'); ?>
			<nav class="navbar">
				<p class="navbar-text"><?php echo anchor('admin/course','ย้อนกลับ',array('class'=>'btn btn-primary')); ?></p>
			</nav>
			<div class="panel panel-info">
        <div class="panel-heading">
					<h3 class="panel-title">เนื้อหาบทเรียน</h3>
				</div>
        <div class="panel-body">
					<?php echo form_open_multipart(uri_string());?>
					<?php echo ($sub_topic) ? form_hidden(array('id'=>$sub_topic['id'],'file'=>$sub_topic['file'])) : ''; ?>
					<?php echo form_hidden(array('topic_id'=>$this->uri->segment(4))); ?>
          <?php echo form_fieldset();?>
          <div class="form-group">
            <div class="col-sm-12">
              <?php echo form_input(array('name'=>'title','class'=>'form-control','placeholder'=>'หัวข้อเนื้อหาบทเรียน','required'=>TRUE),set_value('title',$sub_topic['title'])); ?>
              <span class="help-block text-right">หัวข้อบทเรียน</span>
              <?php echo form_textarea(array('name'=>'description','class'=>'form-control','placeholder'=>'จุดประสงค์การเรียนรู้','value'=>$sub_topic['description'])); ?>
							<span class="help-block text-right">จุดประสงค์การเรียนรู้</span>
							<?php if ($sub_topic['file']) { ?>
								<p>
									อัพโหลดไฟล์อีกครั้งเพื่อแทนที่ใน <?php echo anchor('assets/images/topic/'.$sub_topic['file'],'ไฟล์นี้'); ?>
									หรือ <?php echo anchor('admin/course/delete_topic_file/'.$sub_topic['file'],'ลบออก',array('onclick'=>"return confirm('ยืนยันการลบไฟล์');")); ?>
								</p>
								<?php } ?>
              <?php echo form_upload(array('name'=>'file','class'=>'form-control')); ?>
							<span class="help-block text-right">เอกสารประกอบการเรียน *.pdf</span>
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
        </div>
        <div class="panel-footer">
          <?php echo validation_errors('<div class="alert alert-warning">','</div>');?>
        </div>
      </div>
			<div class="panel panel-default">
			  <div class="panel-heading"></div>
			  <div class="panel-body">
					<div class="table-responsive">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th style="width:10%;">รายการที่</th>
								  <th>ชื่อบทเรียน</th>
									<th style="width:25%"></th>
								</tr>
							</thead>
							<tbody>
							<?php foreach($sub_topics as $_t=>$t) { ?>
								<tr>
									<td><?php echo ++$_t; ?></td>
									<td><?php echo $t['title']; ?></td>
									<td>
										<?php echo anchor('admin/course/content/'.$t['topic_id'].'/'.$t['id'],'แก้ไข').nbs(3); ?>
										<?php echo anchor('admin/course/delete_topic/'.$t['id'],'ลบ',array('onclick'=>"return confirm('ต้องการลบหัวข้อบทเรียน?');")); ?>
									</td>
								</tr>
							 <?php } ?>
							</tbody>
						</table>
					</div>
			  </div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('partials/footer'); ?>
