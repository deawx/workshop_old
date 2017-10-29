<div class="row">
	<div class="col-md-12">
		<!-- general form elements -->
		<div class="box box-primary">
			<div class="box-header"> <h3 class="box-title"></h3> </div><!-- /.box-header -->
			<!-- form start -->
			<?=form_open('admin/groups/add',array('class'=>'form-horizontal'));?>
				<div class="box-body">
					<?php echo message_box(validation_errors(),'danger'); ?>
					<div class="form-group">
						<label for="" class="control-label col-md-3">ชื่อกลุ่ม</label>
						<div class="col-md-9">
							<?=form_input(array('name'=>'name','class'=>'form-control','placeholder'=>'ชื่อกลุ่ม'),set_value('name'));?>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">คำอธิบายกลุ่ม</label>
						<div class="col-md-9">
							<?=form_input(array('name'=>'description','class'=>'form-control','placeholder'=>'คำอธิบายกลุ่ม'),set_value('description'));?>
						</div>
					</div>
				</div><!-- /.box-body -->
				<div class="box-footer">
					<div class="form-group">
					  <label for="" class="control-label col-md-3"></label>
						<div class="col-md-9">
							<button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
							<button type="button" class="btn btn-default" onclick="javascript:history.back()">ย้อนกลับ</button>
						</div>
					</div>
				</div>
			<?=form_close();?>
		</div><!-- /.box -->
	</div>
</div>
