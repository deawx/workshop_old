<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('admin/partials/header'); ?>
<?php $this->load->view('admin/partials/navbar'); ?>
<div id="page-wrapper" >
  <?php echo (isset($product)) ? anchor('admin/product','<span aria-hidden="true">&larr;</span> ย้อนกลับ',array('class'=>'btn btn-primary')) : ''; ?>
  <div class="row"> <?php $this->load->view('partials/message'); ?> <?php echo validation_errors('<div class="alert alert-info">','</div>');?> <?php echo $this->upload->display_errors('<div class="alert alert-warning">','</div>');?> </div>
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <?php if (isset($product)) : ?>
        <?php echo (($product['status'] == '0')
          ? anchor('admin/product/status/'.$product['id'].'/'.$product['status'],'คลิกเพื่อ "เปิดใช้งาน"',array('class'=>'btn btn-block btn-info','onclick'=>"return confirm('ยืนยันการเปลี่ยนสถานะ ?');"))
          : anchor('admin/product/status/'.$product['id'].'/'.$product['status'],'คลิกเพื่อ "ปิดใช้งาน"',array('class'=>'btn btn-block btn-warning','onclick'=>"return confirm('ยืนยันการเปลี่ยนสถานะ ?');"))
        ); ?><br>
        <div class="jumbotron">
          <div class="row text-center">
            <div class="col-sm-3"><div class="h3"><span class="fa fa-2x fa-users"></span></div> <p><?php echo $users; ?></p> ผู้ลงทะเบียน</div>
            <div class="col-sm-3"><div class="h3"><span class="fa fa-2x fa-database"></span></div> <p><?php echo $accounts; ?></p> จำนวนแอคเคาท์</div>
            <div class="col-sm-3"><div class="h3"><span class="fa fa-2x fa-file-text-o"></span></div> <p><?php echo $requests['deposit'].'/'.$requests['withdraw']; ?></p> จำนวนฟอร์มรายการ</div>
            <div class="col-sm-3"><div class="h3"><span class="fa fa-2x fa-clock-o"></span></div> <p><?php echo $last_regis; ?></p> สมัครล่าสุด</div>
          </div>
        </div>
        <?php endif; ?>
        <?php echo form_open_multipart('admin/product',array('class'=>'form-horizontal','data-toggle'=>'validator'),array('post'=>'product')); ?>
        <?php echo ($product)
          ? form_hidden(array('id'=>$product['id'],'re_name'=>$product['name'],'logo'=>($product['logo'])?$product['logo']:'logo_'.date('YmdHis').'.jpg','picture'=>$product['picture']))
          : form_hidden(array('logo'=>'logo_'.date('YmdHis').'.jpg','picture'=>date('YmdHis').'.jpg')); ?>
        <?php echo form_hidden(array('category'=>$this->input->get('category'))); ?>
        <?php echo form_fieldset(($product) ? 'อัพเดทรายการผลิตภัณฑ์' : 'เพิ่มรายการผลิตภัณฑ์'); ?>
        <div class="col-md-3">
          <div class="form-group"> <?php echo img('assets/images/product/'.$product['picture'],'',array('id'=>'preview','class'=>'img-responsive center-block','style'=>'width:250px;height:250px;padding:5px;')).br(); ?> </div>
          <div class="form-group"> <?php echo img('assets/images/product/'.$product['logo'],'',array('class'=>'img-responsive center-block','style'=>'width:200px;height:50px;padding:5px;')).br(); ?> </div>
        </div>
        <div class="col-md-9">
          <div class="form-group"> <?php echo form_upload(array('name'=>'picture','id'=>'picture','class'=>'form-control')); ?> <p class="help-block">* ไฟล์ภาพปก รองรับไฟล์นามสกุล jpg,jpeg,png ** รูปภาพจะแปลงขนาดเป็น 250x250 พิกเซล</p> </div>
          <div class="form-group"> <?php echo form_input(array('name'=>'name','class'=>'form-control','placeholder'=>lang('form_product_name'),'required'=>TRUE),set_value('name',$product['name'])); ?> </div>
          <div class="form-group"> <?php echo form_textarea(array('name'=>'detail','class'=>'form-control','placeholder'=>lang('form_product_detail'),'required'=>TRUE,'value'=>$product['detail'])); ?> </div>
          <div class="form-group"> <?php echo form_upload(array('name'=>'logo','class'=>'form-control')); ?> <p class="help-block">* ไฟล์โลโก้ รองรับไฟล์นามสกุล jpg,jpeg,png ** รูปภาพจะแปลงขนาดเป็น 300x50 พิกเซล</p> </div>
        </div>
        <?php echo form_fieldset_close(); ?>
        <div class="form-group pull-right"> <div class="col-sm-12"> <?php echo form_button_submit(); ?> <?php echo form_button_reset(); ?> </div> </div>
        <?php echo form_close().br(); ?>
      </div>
    </div>
    <?php if (isset($product_url)) : ?>
      <div class="row">
        <div class="col-sm-12">
          <?php echo form_open('admin/product',array('data-toggle'=>'validator'),array('post'=>'product_url')); ?>
          <?php echo form_hidden(array('product_id'=>$product['id'])); ?>
          <?php echo form_fieldset('เพิ่มลิงค์ทางเข้าผลิตภัณฑ์'); ?>
          <div class="col-sm-5"> <div class="form-group"> <?php echo form_input(array('name'=>'url','class'=>'form-control','required'=>TRUE,'placeholder'=>'ยูอาแอลผลิตภัณฑ์'),set_value('url')); ?> </div> </div>
          <div class="col-sm-5"> <div class="form-group"> <?php echo form_input(array('name'=>'caption','class'=>'form-control','required'=>TRUE,'placeholder'=>'ข้อความกำกับ'),set_value('caption')); ?> </div> </div>
          <div class="col-sm-2"> <div class="form-group"> <?php echo form_button_submit(); ?> </div> </div>
          <?php echo form_fieldset_close(); ?>
          <?php echo form_close(); ?><hr>
        </div>
        <div class="col-sm-12"> <?php echo $product_url; ?> </div>
      </div>
    <?php endif; ?>
    <div class="row"> <div class="col-sm-12"> <?php echo (isset($products)) ? '<legend>รายการผลิตภัณฑ์</legend>'.$products : ''; ?> </div> </div>
  </div>
</div>
<?php $this->load->view('admin/partials/footer'); ?>
