<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('admin/partials/header'); ?>
<?php $this->load->view('admin/partials/navbar'); ?>
<div id="page-wrapper" >
  <?php echo ($this->input->get('request_id')) ? anchor('admin/request?type='.$this->input->get('type'),'<span aria-hidden="true">&larr;</span> ย้อนกลับ',array('class'=>'btn btn-primary')) : ''; ?>
  <div class="row"> <?php $this->load->view('partials/message'); ?> <?php echo validation_errors('<div class="alert alert-info">','</div>');?> <?php echo $this->upload->display_errors('<div class="alert alert-warning">','</div>');?> </div>
  <div id="page-inner">
    <div class="row">
      <div class="col-sm-12">
        <legend>ฟอร์มรายการ รายการฝาก</legend>
        <?php
          if (is_array($request)) :
            if ($request['event_id']) :
              $event = $this->db
                ->select('ev.id,ev.promotion_id,ev.title,ev.startdate,ev.enddate,ev.minimum,ev.maximum,pt.name')
                ->join('promotion as pt','pt.id = ev.promotion_id')
                ->where('ev.id',$request['event_id'])
                ->get('event as ev')
                ->row_array();
            endif;
          ?>
          <div class="panel panel-info">
            <div class="panel-body"> <h4>ข้อมูลโปรโมชั่นที่ถูกเลือก</h4><hr>
              <?php if (isset($event)) : ?>
                <dl class="dl-horizontal">
                  <dt>รหัสโปรโมชั่น</dt> <dd><?php echo anchor_popup('admin/request/get_by_id/promotion/'.$event['promotion_id'],sprintf('%04d',$event['promotion_id']),array('target'=>'_blank')); ?></dd>
                  <dt>ชื่อโปรโมชั่น</dt> <dd><?php echo $event['name']; ?></dd>
                  <dt>รหัสอีเว้นต์</dt> <dd><?php echo anchor_popup('admin/request/get_by_id/event/'.$event['id'],sprintf('%04d',$event['id']),array('target'=>'_blank')); ?></dd>
                  <dt>ชื่ออีเว้นต์</dt> <dd><?php echo $event['title']; ?></dd>
                  <dt>วันเริ่มต้น</dt> <dd><?php echo $event['startdate']; ?></dd>
                  <dt>วันสิ้นสุด</dt> <dd><?php echo $event['enddate']; ?></dd>
                  <dt>ฝากขั้นต่ำ</dt> <dd><?php echo number_format($event['minimum'],'2').' ฿'; ?></dd>
                  <dt>ฝากสูงสุด</dt> <dd><?php echo number_format($event['maximum'],'2').' ฿'; ?></dd>
                </dl>
              <?php else: ?>
                <p>ไม่มีรายการที่เลือก</p>
              <?php endif; ?>
              <h4>ข้อมูลการฝากเงิน</h4><hr>
              <dl class="dl-horizontal">
                <dt>รหัสการฝาก</dt> <dd><?php echo anchor_popup('admin/request/get_by_id/deposit/'.$request['deposit_id'],sprintf('%04d',$request['deposit_id']),array('target'=>'_blank')); ?></dd>
                <dt>ฝากเข้าธนาคาร</dt> <dd><?php echo $request['account_deposit']; ?></dd>
                <dt>ช่วงเวลา</dt> <dd><?php echo $request['datetime']; ?></dd>
                <dt>จำนวนเงิน</dt> <dd><?php echo number_format($request['amount'],'2').' ฿'; ?></dd>
                <dt>วิธีการ</dt> <dd><?php echo $request['method']; ?></dd>
              </dl>
              <h4>ข้อมูลผู้ฝาก</h4><hr>
              <dl class="dl-horizontal">
                <dt>รหัสลูกค้า</dt> <dd><?php echo anchor_popup('admin/request/get_by_id/user/'.$request['user_id'],sprintf('%04d',$request['user_id']),array('target'=>'_blank')); ?></dd>
                <dt>ชื่อผู้ใช้งานเว็บไซต์</dt> <dd><?php echo $request['username']; ?></dd>
                <dt>ชื่อลูกค้า</dt> <dd><?php echo $request['fullname']; ?></dd>
                <dt>อีเมล์</dt> <dd><?php echo $request['email']; ?></dd>
                <dt>เบอร์โทรศัพท์</dt> <dd><?php echo $request['phone']; ?></dd>
              </dl><hr>
            </div>
          </div>
          <?php echo form_open(uri_string(),array('class'=>'form-horizontal')); ?>
          <?php echo form_hidden('type','deposit'); ?>
          <?php echo form_hidden(array( 'admin_id' => $this->session->id, 'deposit_id' => $request['deposit_id'], 'user_product_id' => $request['user_product_id'] )); ?>
          <?php echo form_fieldset('ส่วนของผู้ดูแล'); ?>
          <div class="panel panel-success">
            <div class="panel-body">
              <div class="col-sm-8">
                  <?php
                  $events = $this->db
                    ->select('ev.id,ev.title,ev.startdate,ev.enddate,ev.minimum,ev.maximum')
                    ->where('ep.product_id',$request['product_id'])
                    ->join('event_product as ep','ep.event_id = ev.id')
                    ->where('ev.enddate >=',date('d/m/Y'))
                    ->where('ev.status','0')
                    ->get('event as ev')
                    ->result_array();
                  ?>
                <div class="form-group"> <?php echo form_label('รายการอีเว้นต์','event_id',array('class'=>'control-label col-sm-4')); ?>
                  <div class="col-sm-8">
                    <?php foreach($events as $ev) : ?>
                      <?php echo form_radio(array('name'=>'event_id'),$ev['id'],($request['event_id'] == $ev['id'])).nbs(3).anchor_popup('admin/request/get_by_id/event/'.$ev['id'],$ev['title'],array('target'=>'_blank')).br(); ?>
                    <?php endforeach; ?>
                    <?php echo form_radio(array('name'=>'event_id'),'0',($request['event_id'] == '0')).nbs(3).'<u>ไม่ให้รายการอีเว้นต์</u>'.br(); ?>
                  </div>
                </div>
                <div class="form-group"> <?php echo form_label('เครดิต','credit',array('class'=>'control-label col-sm-4')); ?>
                  <div class="col-sm-8"> <?php echo form_input(array('name'=>'credit','class'=>'form-control'),set_value('',$request['credit'])); ?> </div>
                </div>
                <div class="form-group"> <?php echo form_label('','',array('class'=>'control-label col-sm-4')); ?>
                  <div class="col-sm-8"> <?php echo form_button_submit(lang('ui_submit')); ?> <?php echo form_button_reset(lang('ui_reset')); ?> </div>
                </div>
                <?php echo form_fieldset_close(); ?>
                <?php echo form_close(); ?>
              </div>
            </div>
          </div>
        <?php else : echo $request; endif; ?>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('admin/partials/footer'); ?>
