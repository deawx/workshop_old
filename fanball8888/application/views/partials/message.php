<div class="container-fluid">
  <div class="row-fluid">
  <?php
  $flashdata = $this->session->flashdata();
  if ($flashdata) :
    $messages = elements(array('success','info','warning','danger'),$flashdata);
    $message = array_filter($messages);
      foreach ($message as $_m => $m) : ?>
      <div class="alert alert-<?php echo $_m; ?> alert-dismissible" role="alert" >
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong><?php echo $m; ?></strong>
      </div>
      <?php
    endforeach;
  endif;
  ?>
  </div>
</div>
