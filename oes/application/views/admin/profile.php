<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('partials/header'); ?>
<div class="container">
	<div class="row">
		<div class="col-sm-3">
			<?php $this->load->view('partials/menubar'); ?>
		</div>
		<div class="col-sm-9">
			<div class="panel panel-default">
				<div class="panel-body">
					<?php dump($user); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('partials/footer'); ?>
