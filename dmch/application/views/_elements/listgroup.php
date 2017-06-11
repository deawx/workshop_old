<?=(isset($head)) ? $head : '';?>
<div class="list-group">
  <?php $list = isset($list) ? $list : ''; ?>
  <?php foreach ($list as $_k => $_l) : ?>
    <button type="button" class="list-group-item">
      <?=$_l;?>
    </button>
  <?php endforeach; ?>
</div>
