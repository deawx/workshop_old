<!DOCTYPE html>
<html lang="en">
<?php
$content = isset($content) ? $content : '';
?>
<?php $this->load->view('_parts/header'); ?>
<body>
  <?php $this->load->view('_parts/navigation'); ?>
    <!-- Page Content -->
    <div class="container">
      <?php $this->load->view('_parts/alert'); ?>
        <div class="row">
          <?php $this->load->view('_parts/breadcrumb'); ?>
        </div>
        <div class="row">
          <?php if ( is_array($content) && ! empty($content)) : ?>
            <?php foreach ($content as $_c) :?>
              <div class="col-lg-12">
                <?=$_c;?>
              </div><hr/>
            <?php endforeach;?>
          <?php else:?>
          <div class="col-lg-12">
            <?=$content;?>
          </div>
          <?php endif;?>
        </div>
    </div>
    <!-- /.container -->
    <?php $this->load->view('_parts/footer'); ?>
</body>
</html>
