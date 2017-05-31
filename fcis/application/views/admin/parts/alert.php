<?php
if (has_alert()) :
	foreach (has_alert() as $type => $message) :
    ?>
		<div class="alert alert-dismissible alert-<?php echo $type; ?>">
			<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
			<?php echo $message; ?>
		</div>
	<?php
  endforeach;
endif;
?>
