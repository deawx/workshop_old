<?php
$body = isset($body) ? $body : array();
?>
<div class="row well">
  <?php if ($body) : ?>
    <dl class="dl-horizontal">
      <?php foreach ($body as $_k => $_b) : ?>
        <dt><?=$_k;?></dt>
        <dd style="padding-left:5%;"><?=$_b;?></dd><br/>
      <?php endforeach; ?>
    </dl>
  <?php endif; ?>
</div>
