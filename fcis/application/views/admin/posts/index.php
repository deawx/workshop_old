<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Posts</h3>
			</div>
			<div class="box-body">
				<?php echo $this->session->flashdata('message');?>
				<div class="col-md-6">
					<a class="btn btn-default" href="<?php echo site_url('admin/posts/add')?>">New post</a>
				</div>
				<div class="col-md-3 col-md-offset-3">
					<form class="navbar-form" role="search">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Search" name="q">
							<div class="input-group-btn">
								<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
							</div>
						</div>
					</form>
				</div>
				<table class="table table-bordered">
					<tr>
						<th style="width: 10px">#</th>
						<th>Title</th>
						<th>Slug</th>
						<th>Published</th>
						<th>Author</th>
						<th>Status</th>
						<th style="width: 100px">Action</th>
					</tr>
					<?php if ( ! empty($posts)) : ?>
						<?php foreach ($posts as $post) : ?>
							<tr>
								<td><?php echo $post['id']?></td>
								<td><?php echo $post['title']?></td>
								<td><?php echo $post['slug']?></td>
								<td><?php echo $post['published_at']?></td>
								<td><?php echo $post['username']?></td>
								<td><?php echo $post_status[$post['status']]?></td>
								<td>
									<a href="<?php echo site_url('admin/posts/edit/'.$post['id'])?>"><span class="badge bg-green">edit</span></a>
									<a href="<?php echo site_url('admin/posts/delete/'.$post['id'])?>" onclick="return confirm('Are you sure?')"><span class="badge bg-red">delete</span></a>
								</td>
							</tr>
						<?php endforeach;?>
					<?php else:?>
						<tr><td colspan="5">No record found</td></tr>
					<?php endif;?>
				</table>
			</div>
			<div class="box-footer pull-right clearfix">
				<?php echo $this->pagination->create_links(); ?>
			</div>
		</div>
	</div>
</div>
