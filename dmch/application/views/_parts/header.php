<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=isset($title) ? $title : 'DMCH';?></title>
    <!-- Bootstrap Core CSS -->
    <?=link_tag('assets/css/bootstrap.min.css');?>
    <?=link_tag('assets/css/logo-nav.css');?>
    <!-- Custom CSS -->
    <?=link_tag('assets/css/font-awesome.min.css');?>
    <?=link_tag('assets/images/logo.png', 'shortcut icon', 'image/ico');?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php foreach ($link_tag as $_l) : echo $_l; endforeach; ?>
</head>
