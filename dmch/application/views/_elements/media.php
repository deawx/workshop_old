<?php
$picture = isset($picture) ? $picture : 'staff.jpg';
$head = isset($head) ? $head : '';
$body = isset($body) ? $body : '';
?>
<div class="media">
  <div class="media-left media-middle">
    <?=img('assets/uploads/pictures/'.$picture,'',array('class'=>'img-rounded','style'=>'padding-left:20%;'));?>
  </div>
  <div class="media-body" style="padding-left:10%;">
    <h4 class="media-heading"><?=$head;?></h4><hr/>
    <?php if ( is_array($body) && count($body) > 0) : ?>
      <ul class="nav nav-pills">
        <?php foreach ($body as $_k => $_b) : ?>
          <li role="presentation"><?=$_b;?></li>
        <?php endforeach; ?>
      </ul>
    <?php else: ?>
      <?=$body;?>
    <?php endif; ?>
  </div>
</div><br/>
