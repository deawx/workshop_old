<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('partials/header'); ?>
<?php $this->load->view('partials/navbar'); ?>
<?php $this->load->view('partials/menubar'); ?>
<div class="container">
	<div class="row">
		<ul class="nav nav-tabs" role="tablist">
			<?php foreach ($promotion as $_p=>$p) : ?>
				<li role="presentation" class="<?php echo ($_p == '0') ? 'active' : ''; ?>">
					<a href="#<?php echo $p['id']; ?>" aria-controls="<?php echo $p['id']; ?>" role="tab" data-toggle="tab"><?php echo $p['name']; ?></a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div><br>
	<div class="row">
	  <div class="tab-content" style="margin-top:1em;">
			<?php foreach ($promotion as $_p=>$p) : ?>
				<div role="tabpanel" class="tab-pane fade <?php echo ($_p == '0') ? 'active in' : ''; ?>" id="<?php echo $p['id']; ?>">
					<div class="row">
						<?php foreach ($event as $_e=>$e) : ?>
							<?php if ($e['promotion_id'] == $p['id']) : ?>
							  <div class="col-sm-6 col-md-4">
							    <div class="thumbnail" style="min-height:400px;">
										<?php echo img('assets/images/promotion/'.$e['picture'],'',array('class'=>'img-responsive')); ?>
							      <div class="caption">
							        <h5><u><?php echo $e['title']; ?></u></h5><hr>
							        <p><i class="fa fa-calendar"></i> : โปรโมชั่นนี้ใช้ได้กับ <?php echo date('d/m/Y'); ?></p>
							        <p><i class="fa fa-money"></i> : ฝากเข้าขั้นต่ำ <?php echo number_format($e['minimum'],'2'); ?> ฿</p>
							        <p><i class="fa fa-users"></i> : จำกัดจำนวน <?php echo $e['limits']; ?> แอคเคาท์</p><hr>
												<button class="btn btn-primary btn-block" data-toggle="modal" data-target="#event" data-id="<?php echo $e['id']; ?>" data-title="<?php echo $e['title']; ?>">
												<?php echo lang('navbar_read'); ?> </button>
							      </div>
							    </div>
							  </div>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
				</div>
			<?php endforeach; ?>
	  </div>
	</div>
</div>
<?php $this->load->view('partials/footer'); ?>
<div class="modal fade" id="event" tabindex="-1" role="dialog" aria-labelledby="title">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
				<h4 class="modal-title" id="title"></h4>
			</div>
			<div class="modal-body"> </div>
			<div class="modal-footer"> </div>
		</div>
	</div>
</div>
<script type="text/javascript">
$('#event').on('show.bs.modal', function (e) {
	var button = $(e.relatedTarget);
	var id = button.data('id');
	var title = button.data('title');
	var modal = $(this);
	modal.find('.modal-title').html(title);
	$.get('promotion/get_event/'+id,function(data) {
		modal.find('.modal-body').html(data);
	});
})
</script>
