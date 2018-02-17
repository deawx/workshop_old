<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('admin/partials/header'); ?>
<?php $this->load->view('admin/partials/navbar'); ?>
<div id="page-wrapper" >
  <?php echo ($this->input->get('request_id')) ? anchor('admin/request?type='.$this->input->get('type'),'<span aria-hidden="true">&larr;</span> ย้อนกลับ',array('class'=>'btn btn-primary')) : ''; ?>
  <div class="row"> <?php $this->load->view('partials/message'); ?> <?php echo validation_errors('<div class="alert alert-info">','</div>');?> <?php echo $this->upload->display_errors('<div class="alert alert-warning">','</div>');?> </div>
  <div id="page-inner">
    <div class="row">
      <div class="col-sm-12">
        <legend>ฟอร์มรายการ รายการถอน</legend>
        <?php if (is_array($request)) : ?>
          <div class="panel panel-info">
            <div class="panel-body">
              <h4>ข้อมูลการถอนเงิน</h4><hr>
              <dl class="dl-horizontal">
                <dt>รหัสการถอน</dt><dd><?php echo anchor_popup('admin/request/get_by_id/withdraw/'.$request['withdraw_id'],sprintf('%04d',$request['withdraw_id']),array('target'=>'_blank')); ?></dd>
                <dt>รหัสธนาคาร</dt>
                <dd><?php echo anchor_popup('admin/request/get_by_id/user_bank/'.$request['user_bank_id'],sprintf('%04d',$request['user_bank_id']),array('target'=>'_blank')); ?></dd>
                <dt>ชื่อธนาคาร</dt>
                <dd><?php echo $request['account_bank']; ?></dd>
                <dt>ชื่อบัญชี</dt>
                <dd><?php echo $request['account_name']; ?></dd>
                <dt>หมายเลขบัญชี</dt>
                <dd><?php echo $request['account_number']; ?></dd>
                <dt>ช่วงเวลา</dt>
                <dd><?php echo $request['datetime']; ?></dd>
                <dt>จำนวนเงิน</dt>
                <dd><?php echo number_format($request['amount'],'2').' ฿'; ?></dd>
              </dl>
              <h4>ข้อมูลผู้ถอน</h4><hr>
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
          <?php echo form_hidden('type','withdraw'); ?>
          <?php echo form_hidden(array(
            'admin_id' => $this->session->id,
            'withdraw_id' => $request['withdraw_id']
          )); ?>
          <?php echo form_fieldset('ส่วนของผู้ดูแล'); ?>
          <div class="panel panel-success">
            <div class="panel-body">
              <div class="col-sm-8">
                <?php
                $user_bank = $this->db
                  ->where('user_id',$request['user_id'])
                  ->where('status','0')
                  ->get('user_bank')
                  ->result_array();
                ?>
                <div class="form-group"> <?php echo form_label('รายการธนาคาร','event_id',array('class'=>'control-label col-sm-4')); ?>
                  <div class="col-sm-8">
                    <?php foreach($user_bank as $ub) : ?>
                      <?php echo form_radio(array('name'=>'id'),$ub['id'],($request['id'] == $ub['id'])).nbs(3).anchor_popup('admin/request/get_by_id/user_bank/'.$ub['id'],$ub['account_bank'],array('target'=>'_blank')).br(); ?>
                    <?php endforeach; ?>
                  </div>
                </div>
                <div class="form-group"> <?php echo form_label('เครดิต','amount',array('class'=>'control-label col-sm-4')); ?>
                  <div class="col-sm-8"> <?php echo form_input(array('name'=>'amount','class'=>'form-control'),set_value('',$request['amount'])); ?> </div>
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
