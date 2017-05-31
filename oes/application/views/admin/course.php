<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('partials/header'); ?>
<div class="container">
	<div class="row">
		<div class="col-sm-3"> <?php $this->load->view('partials/menubar'); ?> </div>
		<div class="col-sm-9">
			<div class="panel panel-default">
				<div class="panel-body">
					<?php
					echo form_open(uri_string(),array('class'=>'form-inline'),array('id'=>$topic['id']));
					echo form_fieldset('เพิ่มหัวข้อบทเรียน');
					echo form_label('ชื่อบทเรียน','',array('class'=>'control-label'));
					echo form_input(array('name'=>'title','class'=>'form-control','required'=>TRUE),set_value('title',$topic['title']));
					echo form_submit('','บันทึก',array('class'=>'btn btn-primary'));
					echo form_fieldset_close();
					echo form_close();
					?>
					<br><hr>
					<div class="table-responsive">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th style="width:10%;">รายการที่</th>
								  <th>ชื่อบทเรียน</th>
								  <th>จำนวนข้อสอบ</th>
									<th style="width:25%"></th>
								</tr>
							</thead>
							<tbody>
							<?php foreach($topics as $_t=>$t) { ?>
								<tr>
									<td><?php echo ++$_t; ?></td>
									<td><?php echo $t['title']; ?></td>
									<td><?php echo $this->db->where('topic_id',$t['id'])->count_all_results('exam'); ?></td>
									<td>
										<?php echo anchor('admin/course/content/'.$t['id'],'ใส่เนื้อหา').nbs(3); ?>
										<?php echo anchor('admin/course/'.$t['id'],'แก้ไข').nbs(3); ?>
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
