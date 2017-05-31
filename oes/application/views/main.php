<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('partials/header'); ?>
<?php $this->load->view('partials/navbar'); ?>
<div class="container">
	<div class="row">
		<div class="panel panel-success">
		  <div class="panel-heading">
		    <h3 class="panel-title"></h3>
		  </div>
		  <div class="panel-body">
	    	<p> <?php echo $objective; ?> </p>
        <p> <?php echo $description; ?> </p>
		  </div>
		</div>
</div>
<?php $this->load->view('partials/footer'); ?>
