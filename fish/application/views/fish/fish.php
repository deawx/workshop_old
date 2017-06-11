<div class="col-lg-3">
  <?php if ($this->session->is_login && $this->session->role === 'admin') : ?>
    <?php echo anchor('fish/create','เพิ่มข้อมูลปลาสวยงาม',array('class'=>'btn btn-primary btn-block')).br().hr();?>
  <?php endif; ?>
  <?=heading('<u>หมวดหมู่</u>','4');?>
  <?=form_open(uri_string(),array('method'=>'get'));?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <?=heading('อุปนิสัยโดยธรรมชาติ','3',array('class'=>'panel-title'));?>
      </div>
      <div class="panel-body">
        <?php foreach ($nature as $n) : ?>
          <?php $checked = isset($nature_id) ? ((in_array($n['id'],$nature_id)) ? TRUE : '') : ''; ?>
          <?=form_checkbox(array('name'=>'nature_id[]'),$n['id'],$checked).$n['name'].br();?>
      <?php endforeach; ?>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <?=heading('การกินอาหาร','3',array('class'=>'panel-title'));?>
      </div>
      <div class="panel-body">
        <?php foreach ($feed as $n) : ?>
          <?php $checked = isset($feed_id) ? ((in_array($n['id'],$feed_id)) ? TRUE : '') : ''; ?>
          <?=form_checkbox(array('name'=>'feed_id[]'),$n['id'],$checked).$n['name'].br();?>
      <?php endforeach; ?>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <?=heading('ลักษณะการอยู่อาศัย','3',array('class'=>'panel-title'));?>
      </div>
      <div class="panel-body">
        <?php foreach ($living as $n) : ?>
          <?php $checked = isset($living_id) ? ((in_array($n['id'],$living_id)) ? TRUE : '') : ''; ?>
          <?=form_checkbox(array('name'=>'living_id[]'),$n['id'],$checked).$n['name'].br();?>
      <?php endforeach; ?>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <?=heading('สภาพแวดล้อมที่เหมาะสม','3',array('class'=>'panel-title'));?>
      </div>
      <div class="panel-body">
        <?php foreach ($container as $n) : ?>
          <?php $checked = isset($container_id) ? ((in_array($n['id'],$container_id)) ? TRUE : '') : ''; ?>
          <?=form_checkbox(array('name'=>'container_id[]'),$n['id'],$checked).$n['name'].br();?>
      <?php endforeach; ?>
      </div>
    </div>
  <?=form_submit('','ค้นหาข้อมูลที่เลือก',array('class'=>'btn btn-info btn-block'));?>
  <?=form_close();?>
</div>
<div class="col-lg-9">
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-body">
        <?=heading('<u>รายการปลาที่อยู่ในตู้</u>','4');?>
        <?php if ( ! is_null($this->session->userdata('compare')) && ! empty($this->session->userdata('compare'))) : ?>
          <?php foreach ($this->session->userdata('compare') as $f) : ?>
            <div class="col-sm-4 portfolio-item" style="height:250px;">
              <?=img('assets/fish/'.$f['picture'],'',array('class'=>'img-responsive','style'=>'width:350px;height:200px;'));?>
              <?=anchor('fish/compare/'.$f['id'],'ลบออกจากรายการเปรียบเทียบ',array('class'=>'btn btn-warning btn-block'));?>
            </div>
          <?php endforeach; ?>
          <div class="clearfix"></div>
          <?php echo anchor('compare','ใส่ปลาลงตู้ &raquo',array('class'=>'btn btn-success btn-block'));?>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <div class="row">
    <?php foreach ($fish as $f) : ?>
      <div class="col-sm-4 portfolio-item" style="height:422px;">
        <?=img('assets/fish/'.$f['picture'],'',array('class'=>'img-responsive','style'=>'width:350px;height:200px;'));?>
        <?php if ( ! array_key_exists($f['id'],$this->session->compare)) : ?>
          <?=anchor('fish/compare/'.$f['id'],'เพิ่มในรายการเปรียบเทียบ',array('class'=>'btn btn-primary btn-block'));?>
        <?php else: ?>
          <!-- <?=anchor('fish/compare/'.$f['id'],'ลบออกจากรายการเปรียบเทียบ',array('class'=>'btn btn-warning btn-block'));?> -->
        <?php endif; ?>
        <?=heading(anchor('fish/'.$f['id'],$f['fullname']),'4');?>
        <?=p(character_limiter($f['detail'],'100'));?>
      </div>
    <?php endforeach; ?>
  </div>
</div>
<div class="pull-right">
  <?=$this->pagination->create_links();;?>
</div>
