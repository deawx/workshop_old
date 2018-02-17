<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('partials/header'); ?>
<?php $this->load->view('partials/navbar'); ?>
<?php $this->load->view('partials/menubar'); ?>
<div class="container-fluid" style="margin-top:-1em;">
  <div class="row">
    <div id="carousel" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner" role="listbox">
        <?php foreach ($slide as $_s=>$s): ?>
          <div class="item <?php echo ($_s=='0')?'active':''; ?>" style="margin:0;padding:0;">
            <?php echo img($s['url'],'',array('img-responsive','style'=>'width:100%;height:auto;max-height:495.56px;')); ?>
            <div class="carousel-caption"></div>
          </div>
        <?php endforeach; ?>
      </div>
      <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      </a>
      <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      </a>
    </div><br>
  </div>
</div>
<div class='container'>
  <div class="row">
    <?php echo img('assets/images/panel1.png','',array('class'=>'img-responsive')); ?>
  </div>
</div><br>
<div class="container">
  <div class="row">
    <?php foreach ($event as $_e=>$e): ?>
      <?php $title = (string)$e['title']; ?>
      <div class="col-sm-3">
        <div class="thumbnail" style="box-shadow: 0px 0px 20px -6px rgba(0,0,0,0.81);">
          <?php echo img('assets/images/promotion/'.$e['picture'],'',array('class'=>'img-responsive center-block','style'=>'min-height:130px;')); ?>
          <a href="<?php echo site_url('promotion'); ?>" class="btn btn-large btn-block btn-primary">
            <?php echo iconv_substr((string)$e['title'],'0','28','UTF-8').'..'; ?>
          </a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
  <div class="panel panel-primary" style="border-color:#c1c1c1;"></div>
  <div class="row">
    <div class="col-sm-4">
      <div class="thumbnail" style="box-shadow: 0px 0px 20px -6px rgba(0,0,0,0.81);">
        <?php echo img('assets/images/offer1.jpg','',array('class'=>'img-responsive center-block','style'=>'min-height:130px;')); ?>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail" style="box-shadow: 0px 0px 20px -6px rgba(0,0,0,0.81);">
        <?php echo img('assets/images/offer2.jpg','',array('class'=>'img-responsive center-block','style'=>'min-height:130px;')); ?>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail" style="box-shadow: 0px 0px 20px -6px rgba(0,0,0,0.81);">
        <?php echo img('assets/images/offer3.jpg','',array('class'=>'img-responsive center-block','style'=>'min-height:130px;')); ?>
      </div>
    </div>
  </div>
</div>
<div class='container'>
  <div class="row">
    <?php echo img('assets/images/product1.png','',array('class'=>'img-responsive')); ?>
  </div>
</div><br>
<?php $this->load->view('partials/footer'); ?>
