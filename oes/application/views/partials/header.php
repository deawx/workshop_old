<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>oes</title>
  <?php echo link_tag('assets/themes/bootstrap.yeti.min.css'); ?>
  <?php echo link_tag('assets/css/font-awesome.min.css'); ?>
  <?php echo link_tag('assets/css/bootstrap.datepicker.min.css'); ?>
  <?php echo link_tag('assets/css/bootstrap.datatable.css'); ?>
  <?php echo link_tag('assets/css/jquery.datatable.css'); ?>
  <?php echo link_tag('assets/css/style.css'); ?>
  <?php if (in_array('admin',$this->uri->segment_array())) { ?>
  <?php echo link_tag('assets/css/admin.css'); ?>
  <?php } ?>
</head>
<body>
