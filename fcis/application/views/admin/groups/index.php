<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-header"> <h3 class="box-title"></h3> </div><!-- /.box-header -->
			<div class="box-body">
				<?php echo $this->session->flashdata('message');?>
				<p><a class="btn btn-default" href="<?php echo site_url('admin/groups/add')?>">เพิ่มข้อมูล</a></p>
				<table class="table table-bordered">
					<tr>
						<th style="width: 10px">#</th>
						<th>ชื่อกลุ่ม</th>
						<th>คำอธิบาย</th>
						<th style="width: 100px"></th>
					</tr>
					<?php if(!empty($groups)):?>
						<?php foreach($groups as $key => $group):?>
							<tr>
								<td><?php echo ++$key; ?></td>
								<td><?php echo $group['name']; ?></td>
								<td><?php echo $group['description']; ?></td>
								<td>
									<a href="<?php echo site_url('admin/groups/edit/'.$group['id'])?>"><span class="badge bg-green">แก้ไข</span></a>
									<!-- <a href="<?php //echo site_url('admin/groups/delete/'.$group['id'])?>" onclick="return confirm('Are you sure?')"><span class="badge bg-red">delete</span></a> -->
								</td>
							</tr>
						<?php endforeach;?>
					<?php else:?>
						<tr><td colspan="5">ว่างเปล่า</td></tr>
					<?php endif;?>
				</table>
			</div><!-- /.box-body -->
			<div class="box-footer clearfix"> <?php echo $this->pagination->create_links(); ?> </div>
		</div><!-- /.box -->
	</div>
</div>
