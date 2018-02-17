<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('partials/header'); ?>
<?php $this->load->view('partials/navbar'); ?>
<?php $this->load->view('partials/menubar'); ?>
<?php $this->load->view('partials/phpsdk'); ?>
<div class="container">
	<div class="row">
		<div class="col-sm-8">
			<div class="row">
				<div class="panel panel-danger">
					<div class="panel-heading"> <h3 class="panel-title"><?php echo lang('navbar_webboard_game'); ?> </h3> </div>
					<div class="panel-body">
						<?php foreach ($game as $_t => $t) : ?>
							<div class="media">
								<div class="media-left media-middle">
									<?php echo img('assets/images/pinned.jpg','',array('class'=>'media-object','style'=>'width:75px;height:75px;')); ?>
								</div>
								<div class="media-body">
									<h4 class="media-heading">
										หัวข้อ : <?php echo anchor('webboard/view_topic/'.$t['id'],$t['title']); ?>
									</h4>
									<p> โดย : <u><?php echo $t['username']; ?></u> เมื่อ : <u><?php echo $t['datetime']; ?></u> </p>
									<p>
										อ่าน <?php echo $t['views']; ?> ตอบ <?php echo $t['comments']; ?> </span>
										<?php if ($t['user_id'] === $this->session->id OR $this->session->admin) : ?>
											<span class="pull-right"><a data-toggle="modal" data-target=".option" data-id="<?php echo $t['id']; ?>"> <?php echo lang('navbar_manage'); ?> <i class="fa fa-level-up"></i></a></span>
										<?php endif; ?>
									 </p><hr>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="panel panel-info">
					<div class="panel-heading"> <h3 class="panel-title"><?php echo lang('navbar_webboard_topic'); ?> <small>(ปักหมุด)</small></h3> </div>
					<div class="panel-body">
						<?php foreach ($pinned as $_t => $t) : ?>
							<div class="media">
								<div class="media-left media-middle">
									<?php $image = ($t['status'] === '3')
									? 'assets/images/pinned.jpg'
									: (($t['status'] === '4')
									? 'assets/images/rules.png'
									: (($t['status'] === '5')
									? 'assets/images/posted.png'
									: 'assets/images/user/'.$t['picture'])); ?>
									<?php echo img($image,'',array('class'=>'media-object','style'=>'width:75px;height:75px;')); ?>
								</div>
								<div class="media-body">
									<h4 class="media-heading">
										หัวข้อ : <?php echo anchor('webboard/view_topic/'.$t['id'],$t['title']); ?>
									</h4>
									<p> โดย : <u><?php echo $t['username']; ?></u> เมื่อ : <u><?php echo $t['datetime']; ?></u> </p>
									<p>
										อ่าน <?php echo $t['views']; ?> ตอบ <?php echo $t['comments']; ?> </span>
										<?php if ($t['user_id'] === $this->session->id OR $this->session->admin) : ?>
											<span class="pull-right"><a data-toggle="modal" data-target=".option" data-id="<?php echo $t['id']; ?>"> <?php echo lang('navbar_manage'); ?> <i class="fa fa-level-up"></i></a></span>
										<?php endif; ?>
									 </p><hr>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			<div class="row">
				<h3><?php echo lang('navbar_webboard_topic'); ?>
					<small>(ล่าสุด)<?php echo ($this->session->login) ? anchor('webboard/save_topic',lang('ui_post'),array('class'=>'btn btn-success pull-right')):''; ?> </small>
				</h3><hr>
				<table class='table table-striped table-hover' style="font-size:1em;">
					<thead>
						<tr class="alert alert-info">
							<th class="text-center">โดย</th>
							<th class="text-center">หัวข้อ</th>
							<th class="text-center">วันที่/เวลา</th>
							<th class="text-center">อ่าน/ตอบ</th>
						</tr>
					</thead>
					<?php foreach ($topic as $t) : ?>
						<tbody>
							<tr style="height:3em;">
								<!-- <td><?php echo img('assets/images/user/'.$t['picture'],'',array('class'=>'img-responsive','style'=>'width:20px;height:20px;')); ?></td> -->
								<td><?php echo $t['username']; ?></td>
								<td><?php echo anchor('webboard/view_topic/'.$t['id'],$t['title']); ?></td>
								<td>
									<?php
										$date = explode(' ',$t['datetime']);
										echo $date[0];
									?>
								</td>
								<td><?php echo $t['views'].'/'.$t['comments']; ?></td>
							</tr>
						</tbody>
					<?php endforeach; ?>
				</table>
			</div>
			<div class="text-center"><?php echo $this->pagination->create_links(); ?></div>
		</div>
		<div class="col-sm-4">
			<?php echo form_open('webboard/view_search',array('method'=>'GET')); ?>
			<div class="input-group">
				<?php echo form_input(array('name'=>'search','class'=>'form-control','placeholder'=>lang('form_search'))); ?>
				<span class="input-group-btn">
					<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
				</span>
			</div>
			<?php echo form_close(); ?>
			<br>
			<?php echo $this->calendar->generate(); ?>
			<div class="list-group">
			  <a href="<?php echo base_url('webboard'); ?>" class="list-group-item active text-center"> ประเภท/หมวดหมู่ เว็บบอร์ด </a>
				<?php foreach ($category as $_c => $c) : ?>
					<a href="<?php echo base_url('webboard/view_category/'.$c['id']); ?>" class="list-group-item <?php echo ($this->uri->segment(2) === $c['id']) ? 'active' : ''; ?>">
						<?php echo $c['name']; ?>
						<!-- <span class="badge"><?php echo $c['count']; ?></span> -->
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('partials/footer'); ?>
<div class="modal fade option" tabindex="-1" role="dialog"> <div class="modal-dialog modal-sm"> </div> </div>
<script type="text/javascript">
$(document).ready(function() {
	$('.option').on('shown.bs.modal',function(event) {
		var button = $(event.relatedTarget);
	  var id = button.data('id');
	  var modal = $(this);
	  modal.find('.modal-dialog').html(
			'<ul class="list-group">'+
			<?php if ($this->session->admin) : ?>
				'<li class="list-group-item"><a href="<?php echo base_url()."webboard/pin_topic/"; ?>'+id+'/3"> <i class="fa fa-thumb-tack"></i> ปักหมุด</a></li>'+
				'<li class="list-group-item"><a href="<?php echo base_url()."webboard/pin_topic/"; ?>'+id+'/4"> <i class="fa fa-thumb-tack"></i> ปักหมุด (กฎ)</a></li>'+
				'<li class="list-group-item"><a href="<?php echo base_url()."webboard/pin_topic/"; ?>'+id+'/5"> <i class="fa fa-thumb-tack"></i> ปักหมุด (ข่าว)</a></li>'+
			<?php endif; ?>
			'<li class="list-group-item"><a href="<?php echo base_url()."webboard/save_topic/"; ?>'+id+'"> <i class="fa fa-edit"></i> แก้ไข</a></li>'+
			'<li class="list-group-item"><a href="<?php echo base_url()."webboard/pin_topic/"; ?>'+id+'/2" onclick="return confirm();"> <i class="fa fa-calendar-times-o"></i> ปิดใช้งาน</a></li>'+
			'<li class="list-group-item"><a href="<?php echo base_url()."webboard/remove_topic/"; ?>'+id+'" onclick="return confirm();"> <i class="fa fa-remove"></i> ลบ</a></li>'+
			'</ul>'
		);
	});
});
</script>
