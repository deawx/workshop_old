<?php
$action = isset($action) ? $action : uri_string();
$head = isset($head) ? $head : '';
$form = isset($form) ? $form : array();
$hidden = isset($hidden) ? $hidden : array();
$button = isset($button) ? $button : '';
?>
<?=form_open_multipart((string)$action,array('class'=>'well','data-toggle'=>'validator'),$hidden);?>
  <?=form_fieldset((string)$head);?>
  <?php foreach ($form as $_f) : ?>
    <div class="form-group">
      <?=$_f['label'];?>
      <div class="col-sm-9">
        <?=$_f['input'];?>
        <span class="help-block"><?=$_f['help'];?></span>
      </div>
    </div>
  <?php endforeach; ?>
  <?=form_fieldset_close();?>
  <br/>
  <div class="form-group">
    <div class="col-sm-offset-3">
      <?=form_submit('','ยืนยัน',array('class'=>'btn btn-success'));?>
      <?=form_reset('','ยกเลิก',array('class'=>'btn btn-warning'));?>
      <?=$button;?>
    </div>
  </div>
<?=form_close();?>
<?=validation_errors('<div class="alert alert-warning">', '</div>');?>
<?=$this->upload->display_errors('<div class="alert alert-warning">','</div>');?>
<hr/>
