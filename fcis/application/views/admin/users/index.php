<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-header"> <h3 class="box-title"></h3> </div><!-- /.box-header -->
			<div class="box-body">
				<?php echo $this->session->flashdata('message');?>
				<p><a class="btn btn-default" href="<?php echo site_url('admin/users/add')?>">เพิ่มข้อมูล</a></p>
				<table class="table table-bordered table-hover">
					<tr>
						<th style="width: 10px">#</th>
						<th>ชื่อผู้ใช้</th>
						<th>อีเมล์</th>
						<th>ชื่อ-นามสกุล</th>
						<th>กลุ่ม</th>
						<th>สถานะ</th>
						<th style="width: 100px"></th>
					</tr>
					<?php if( ! empty($users)):?>
						<?php foreach($users as $key => $user):?>
							<tr>
								<td><?php echo ++$key; ?></td>
								<td><?php echo $user['username']?></td>
								<td><?php echo $user['email']?></td>
								<td><?php echo $user['first_name'].nbs().$user['last_name']?></td>
								<td><?php echo $user['groups']?></td>
								<td><?php echo $user_status[$user['active']]?></td>
								<td>
									<?php if( ! any_in_array(array('special','admin'),explode(',',$user['groups']))) : ?>
										<a href="<?php echo site_url('admin/users/edit/'.$user['id'])?>"><span class="badge bg-green">แก้ไข</span></a>
										<?php if($this->session->user_id !== $user['id']) : ?>
											<a href="<?php echo site_url('admin/users/delete/'.$user['id'])?>" onclick="return confirm('Are you sure?')"><span class="badge bg-red">ลบ</span></a>
										<?php endif;?>
									<?php endif;?>
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
