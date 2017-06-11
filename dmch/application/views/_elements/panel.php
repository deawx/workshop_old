<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><?=$head;?></h3>
  </div>
  <div class="panel-body">
    <div class="text-center">
      <?=img('assets/uploads/pictures/'.$picture,'',array('class'=>'img-rounded'));?>
    </div>
    <hr/>
    <?php if ( is_array($body) && count($body) > 0) : ?>
      <?php foreach ($body as $_b) : ?>
        <?=$_b.br();?>
      <?php endforeach; ?>
    <?php else: ?>
      <?=$body;?>
    <?php endif; ?>
  </div>
  <div class="panel-footer">
  </div>
</div>
