<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?=isset($title) ? $title : 'DMCH';?></title>
  <?=link_tag('assets/css/bootstrap.min.css');?>
  <?=link_tag('assets/css/font-awesome.min.css');?>
  <?=link_tag('assets/images/logo.png', 'shortcut icon', 'image/ico');?>
  <?php foreach ($link_tag as $_l) : echo $_l; endforeach; ?>
</head>
<body>

<?php
if ( is_array($content)) :
  foreach($content as $_b) :
    echo $_b;
  endforeach;
else:
  echo $content;
endif;
?>

<?=script_tag('assets/js/jquery.min.js');?>
<?=script_tag('assets/js/bootstrap.min.js');?>
<?php foreach ($script_tag as $_s) : echo $_s; endforeach; ?>
<script type="text/javascript">
$(document).ready(function(){
  <?php if ( is_array($script_jq)) { foreach($script_jq as $_jq) { echo $_jq; }}else{ echo $script_jq; };?>
});
<?php if ( is_array($script_js)) { foreach($script_js as $_js) { echo $_js; }}else{ echo $script_js; };?>
</script>
</body>
</html>
