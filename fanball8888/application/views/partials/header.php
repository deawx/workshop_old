<!DOCTYPE html>
<html lang="en">
<head>
  <?php echo meta('Content-type','text/html; charset=utf-8','equiv'); ?>
  <?php echo meta('X-UA-Compatible','IE=edge','equiv'); ?>
  <?php echo meta('viewport','width=device-width, initial-scale=1'); ?>
  <?php echo meta('keywords','fanball88, แฟนบอล88, เกมส์ทายผลบอล'); ?>
  <?php echo meta('description','เล่นเกมส์ทายผลฟุตบอล เกมส์ชิงรางวัลเครดิต'); ?>
  <?php echo meta('robots','no-cache'); ?>
  <title>FANBALL88</title>
  <!--[if lt IE 9]>
  <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
  <![endif]-->
  <?php echo link_tag('assets/images/favicon.ico','shortcut icon','image/ico'); ?>
  <?php $cookie_theme = (get_cookie('theme')) ? get_cookie('theme') : 'yeti'; ?>
  <?php echo link_tag('assets/themes/bootstrap.'.$cookie_theme.'.min.css'); ?>
  <?php echo link_tag('assets/css/font-awesome.min.css'); ?>
  <?php if (isset($css)) foreach($css as $c) echo $c; ?>
  <?php echo link_tag('assets/css/style.css'); ?>

  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-83058742-1', 'auto');
    ga('send', 'pageview');
  </script>
</head>
<body data-lovelive>
