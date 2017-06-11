<?php
$body = isset($body) ? $body : array();
$child = isset($child) ? $child : array();
?>
<div class="row">
    <dl class="dl-horizontal">
      <?php if (count($body) == count($body, COUNT_RECURSIVE)) : ?>
        <?php foreach ($body as $_k => $_b) : ?>
          <dt><?=$_k;?></dt>
          <dd style="padding-left:5%;"><?=$_b;?></dd><br/>
        <?php endforeach; ?>
        <?php else: ?>
          <?php foreach ($body as $_b) : ?>
            <?php foreach ($_b as $k => $b) : ?>
              <dt><?=$k;?></dt>
              <dd style="padding-left:5%;"><?=$b;?></dd><br/>
            <?php endforeach; ?>
          <?php endforeach; ?>
      <?php endif; ?>
    </dl>
</div>
