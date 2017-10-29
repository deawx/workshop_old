<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <title><?php echo $page_title ?></title>
  <?=link_tag('assets/admin/css/jquery-ui.min.css');?>
  <?=link_tag('assets/admin/css/bootstrap.min.css');?>
  <?=script_tag('assets/admin/js/jquery.min.js');?>
  <?=script_tag('assets/admin/js/jquery-ui.min.js');?>
  <?=script_tag('assets/admin/js/bootstrap.min.js');?>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->
</head>
<body>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php print_data($data); ?>
        <table class="table table-bordered">
        </table>
      </div>
    </div>
  </div>

</body>
</html>
