<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('partials/header'); ?>
<?php $this->load->view('partials/navbar'); ?>
<?php $this->load->view('partials/menubar'); ?>
<div class="container">
	<div class="row">
		<div class="panel panel-primary">
		  <div class="panel-body">
				<?php echo img('assets/images/product/'.$product['picture'],'',array('class'=>'img-responsive col-sm-4')); ?>
				<div class="col-sm-8">
					<h1><?php echo $product['name']; ?></h1> <p><?php echo $product['detail']; ?></p>
					<p><?php if ($this->session->login && $this->session->id) : ?>
						<?php echo anchor_popup('product/register/'.$product['id'],lang('ui_product_register'),array('class'=>'btn btn-lg btn-primary')); ?>
					<?php else: ?>
						จำเป็นต้อง <a href="<?php echo base_url('user/login'); ?>" class="btn btn-success btn-lg"><?php echo lang('navbar_login'); ?></a>
						หรือ <a href="<?php echo base_url('user/register'); ?>" class="btn btn-primary btn-lg"><?php echo lang('navbar_register'); ?></a>
					<?php endif; ?></p>
				</div>
		  </div>
		</div>
		<div class="col-sm-4" style="padding:0.1em;">
			<div class="panel panel-success">
				<div class="panel-heading"></div><div class="panel-body">
					<h4><?php echo lang('ui_product_url'); ?></h4><hr>
					<?php if ($this->session->login) : ?>
						<ul class="list-group"><?php foreach ($product_url as $key => $value) : ?>
							<li class="list-group-item"><?php echo '<i class="fa fa-lg fa-share-square"></i>'.nbs().anchor_popup(prep_url($value['url']),'(กดเข้า)').nbs().$value['caption']; ?></li>
						<?php endforeach; ?></ul>
					<?php endif; ?>
				</div><div class="panel-footer"></div>
			</div>
		</div>
		<div class="col-sm-8" style="padding:0.1em;">
			<div class="panel panel-success">
				<div class="panel-heading"></div>
				<div class="panel-body"><h4><?php echo lang('ui_product_history'); ?><small class="pull-right"><?php echo anchor(uri_string(),'<i class="fa fa-refresh"></i>'); ?></small></h4><hr>
					<div class="table-responsive">
						<?php echo (isset($user_product)) ? $user_product :''; ?>
					</div>
				</div><div class="panel-footer"></div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('partials/footer'); ?>
