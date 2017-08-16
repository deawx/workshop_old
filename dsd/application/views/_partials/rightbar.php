<div class="list-group">
  <a href="<?=site_url('account/schedule/index');?>" class="list-group-item <?=($menu === 'index') ? 'active' : '';?>">ประวัติการสอบ</a>
  <a href="<?=site_url('account/schedule/standard');?>" class="list-group-item <?=($menu === 'standard') ? 'active' : '';?>">การสอบมาตรฐานฝีมือแรงงาน</a>
  <a href="<?=site_url('account/schedule/skill');?>" class="list-group-item <?=($menu === 'skill') ? 'active' : '';?>">การสอบรับรองความรู้ความสามารถ</a>
  <a href="<?=site_url('account/schedule/result');?>" class="list-group-item <?=($menu === 'result') ? 'active' : '';?>">รายการตรวจผลการสอบ</a>
  <a href="<?=site_url('account/schedule/calendar');?>" class="list-group-item <?=($menu === 'calendar') ? 'active' : '';?>">ตารางเลือกวันสอบ</a>
</div>
<?php $this->load->view('_partials/messages'); ?>
