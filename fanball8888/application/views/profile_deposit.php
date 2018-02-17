<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('partials/header'); ?>
<?php $this->load->view('partials/navbar'); ?>
<?php $this->load->view('partials/menubar'); ?>
<div class="container">
	<div class="row">
		<div class="col-sm-4" style="padding:0.1em;"> <?php $this->load->view('partials/sidebar'); ?> </div>
		<div class="col-sm-8" style="padding:0.1em;">
			<div class="panel panel-info">
			  <div class="panel-body">
					<legend><?php echo lang('form_legend_deposit');?></legend>
					<div class="table-responsive"> <?php echo $deposit; ?> </div>
			  </div>
				<div class="panel-footer">
					<?php echo $this->pagination->create_links(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('partials/footer'); ?>
