<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('admin/partials/header'); ?>
<?php $this->load->view('admin/partials/navbar'); ?>
<div id="page-wrapper" >
  <?php echo (isset($event)) ? anchor('admin/promotion?type=event&form=save_event','เพิ่มข้อมูล',array('class'=>'btn btn-success')) : anchor('admin/promotion?type=event','<span aria-hidden="true">&larr;</span> ย้อนกลับ',array('class'=>'btn btn-primary')); ?>
  <div class="row"> <?php $this->load->view('partials/message'); ?> <?php echo validation_errors('<div class="alert alert-info">','</div>');?> <?php echo $this->upload->display_errors('<div class="alert alert-warning">','</div>');?> </div>
  <div id="page-inner">
    <?php if ( ! isset($event)) : ?>
      <div class="row">
        <div class="col-md-12">
          <?php if (isset($save_event)) : ?>
          <?php echo (($save_event['status'] == '0')
            ? anchor('admin/promotion/status_event/'.$save_event['id'].'/'.$save_event['status'],'คลิกเพื่อ "ปิดใช้งาน"',array('class'=>'btn btn-block btn-warning','onclick'=>"return confirm('ยืนยันการเปลี่ยนสถานะ ?');"))
            : anchor('admin/promotion/status_event/'.$save_event['id'].'/'.$save_event['status'],'คลิกเพื่อ "เปิดใช้งาน"',array('class'=>'btn btn-block btn-info','onclick'=>"return confirm('ยืนยันการเปลี่ยนสถานะ ?');"))
          ); ?><br>
          <div class="jumbotron">
            <div class="row text-center">
              <div class="col-sm-3"><div class="h3"><span class="fa fa-2x fa-users"></span></div> <p><?php echo $users; ?></p> ผู้ลงทะเบียน</div>
              <div class="col-sm-3"><div class="h3"><span class="fa fa-2x fa-database"></span></div> <p><?php echo $accounts; ?></p> จำนวนแอคเคาท์</div>
              <div class="col-sm-3"><div class="h3"><span class="fa fa-2x fa-file-text-o"></span></div> <p><?php echo $deposits; ?></p> จำนวนฟอร์มฝาก</div>
              <div class="col-sm-3"><div class="h3"><span class="fa fa-2x fa-clock-o"></span></div> <p><?php echo $last_deposit['datetime']; ?></p> วันที่ฝากล่าสุด</div>
            </div>
          </div>
          <?php endif; ?>
          <?php echo form_open_multipart(uri_string(),array('class'=>'form-horizontal','data-toggle'=>'validator')); ?>
          <?php echo ($save_event)
            ? form_hidden(array('id'=>$save_event['id'],'picture'=>$save_event['picture'],'re_title'=>$save_event['title'],'re_startdate'=>$save_event['startdate']))
            : form_hidden(array('picture'=>date('YmdHis').'.jpg')); ?>
          <?php echo form_hidden('post','event'); ?>
          <?php $disabled = ($save_event) ? 'disabled' : 'required' ?>
          <?php echo form_fieldset(($save_event) ? 'อัพเดทรายการอีเว้นต์' : 'เพิ่มรายการอีเว้นต์'); ?>
          <div class="form-group"> <?php echo form_label('','',array('class'=>'col-sm-3 text-right')); ?>
            <div class="col-sm-9">
              <?php echo img('assets/images/promotion/'.$save_event['picture'],'',array('id'=>'preview','class'=>'img-responsive','style'=>'width:960px;height:200px;padding:5px;')).br(); ?>
            </div>
          </div>
          <div class="form-group"> <?php echo form_label('รูปภาพ','picture',array('class'=>'col-sm-3 text-right')); ?>
            <div class="col-sm-9"> <?php echo form_upload(array('name'=>'picture','id'=>'picture','class'=>'form-control')); ?> <p class="help-block">* รองรับไฟล์นามสกุล jpg,jpeg,png ** รูปภาพจะแปลงเป็นสองไฟล์/สองขนาด 300x120 พิกเซลและ 960x200 พิกเซล</p> </div>
          </div>
          <div class="form-group"> <?php echo form_label('หัวข้อโปรโมชั่น','promotion_id',array('class'=>'col-sm-3 text-right')); ?>
            <div class="col-sm-9"> <?php echo form_dropdown(array('name'=>'promotion_id','class'=>'form-control',$disabled=>TRUE),$promotion_list,set_value('promotion_id',$save_event['promotion_id'])); ?> </div>
          </div>
          <div class="form-group"> <?php echo form_label('วันที่ เริ่ม/สิ้นสุด','',array('class'=>'col-sm-3 text-right')); ?>
            <div class="col-sm-9">
              <div class="input-group input-daterange"> <?php echo form_input(array('name'=>'startdate','class'=>'form-control datepicker',$disabled=>TRUE),set_value('startdate',$save_event['startdate'])); ?>
                <span class="input-group-addon">ถึง</span> <?php echo form_input(array('name'=>'enddate','class'=>'form-control datepicker','required'=>TRUE),set_value('enddate',$save_event['enddate'])); ?>
              </div>
            </div>
          </div>
          <div class="form-group"> <?php echo form_label('หัวข้ออีเว้นต์','title',array('class'=>'col-sm-3 text-right')); ?>
            <div class="col-sm-9"> <?php echo form_input(array('name'=>'title','class'=>'form-control','required'=>TRUE),set_value('title',$save_event['title'])); ?> </div>
          </div>
          <div class="form-group"> <?php echo form_label('จำกัดจำนวนแอคเคาท์','limits',array('class'=>'col-sm-3 text-right')); ?>
            <div class="col-sm-9"> <?php echo form_number(array('name'=>'limits','class'=>'form-control'),set_value('limits',$save_event['limits'])); ?> <p class="help-block">* ปล่อยว่าง ในกรณีไม่จำกัดจำนวน</p>
            </div>
          </div>
          <div class="form-group"> <?php echo form_label('รายละเอียด/เงื่อนไข','detail',array('class'=>'col-sm-3 text-right')); ?>
            <div class="col-sm-9"> <?php echo form_textarea(array('name'=>'detail','class'=>'form-control textarea','value'=>$save_event['detail'],'required'=>TRUE)); ?> </div>
          </div>
          <?php if (isset($product_list) && isset($group_list)) : ?>
          <div class="form-group"> <?php echo form_label('ผลิตภัณฑ์','product_id',array('class'=>'col-sm-3 text-right')); ?>
            <div class="col-sm-9"> <?php foreach ($product_list as $_p=>$p) echo form_checkbox(array('name'=>'product_id[]'),$p['id']).$p['name'].br(); ?> </div> <p class="help-block"></p>
          </div>
          <div class="form-group"> <?php echo form_label('กลุ่มผู้ใช้','group_id',array('class'=>'col-sm-3 text-right')); ?>
            <div class="col-sm-9"> <?php foreach ($group_list as $_ug=>$ug) echo form_checkbox(array('name'=>'group_id[]'),$ug['id']).$ug['name'].br(); ?> </div> <p class="help-block"></p>
          </div>
        <?php elseif (isset($save_event_product) && isset($save_event_group)): ?>
            <div class="form-group"> <?php echo form_label('ผลิตภัณฑ์','product_id',array('class'=>'col-sm-3 text-right')); ?>
              <div class="col-sm-9"> <?php foreach ($save_event_product as $_p=>$p) echo form_checkbox(array('name'=>'product_id[]',$disabled=>TRUE),$p['product_id'],TRUE).$p['name'].br(); ?> </div>
            </div>
            <div class="form-group"> <?php echo form_label('กลุ่มผู้ใช้','group_id',array('class'=>'col-sm-3 text-right')); ?>
              <div class="col-sm-9"> <?php foreach ($save_event_group as $_ug=>$ug) echo form_checkbox(array('name'=>'group_id[]',$disabled=>TRUE),$ug['group_id'],TRUE).$ug['name'].br(); ?> </div>
            </div>
          <?php endif; ?>
          <?php echo form_fieldset_close().hr(); ?>
          <div class="form-group pull-right"> <div class="col-sm-12"> <?php echo form_button_submit(); ?> <?php echo form_button_reset(); ?></div> </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    <?php endif; ?>
    <div class="row"> <div class="col-sm-12"> <?php echo (isset($event)) ? '<legend>รายการอีเว้นต์</legend>'.$event : ''; ?> </div> </div>
  </div>
</div>
<?php $this->load->view('admin/partials/footer'); ?>
