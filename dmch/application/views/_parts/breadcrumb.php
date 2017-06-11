<?php $k = count($segment);?>
<?php if ($segment['1'] != 'main') : ?>
<ol class="breadcrumb">
  <li><a href="<?=site_url();?>">Home</a></li>
  <?php foreach ($segment as $_k => $_s) : ?>
    <li class="<?=($_k == $k) ? 'active' : ''; ?>">
        <?php if ($_k < 2) : ?>
          <?=anchor($_s,ucfirst($_s));?>
        <?php else: ?>
          <?=ucfirst($_s);?>
        <?php endif; ?>
    </li>
  <?php endforeach; ?>
</ol>
<?php endif; ?>
