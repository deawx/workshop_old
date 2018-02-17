<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('admin/partials/header'); ?>
<?php $this->load->view('admin/partials/navbar'); ?>
<div id="page-wrapper" >
  <?php echo (isset($users)) ? anchor('admin/user/save_user','เพิ่มข้อมูล',array('class'=>'btn btn-success')) : anchor('admin/user','<span aria-hidden="true">&larr;</span> ย้อนกลับ',array('class'=>'btn btn-primary')); ?>
  <div class="row"> <?php $this->load->view('partials/message'); ?> <?php echo validation_errors('<div class="alert alert-info">','</div>');?> <?php echo $this->upload->display_errors('<div class="alert alert-warning">','</div>');?> </div>
  <div id="page-inner">
    <?php if ( ! (isset($users))) : ?>
      <div class="row">
        <div class="col-sm-12">
          <?php echo  (isset($user)) ? ($user['status'] == '0')
            ? anchor('admin/user/status/'.$user['id'].'/'.$user['status'],'คลิกเพื่อ "เปิดใช้งาน"',array('class'=>'btn btn-block btn-info','onclick'=>"return confirm('ยืนยันการเปลี่ยนสถานะ ?');"))
            : anchor('admin/user/status/'.$user['id'].'/'.$user['status'],'คลิกเพื่อ "ปิดใช้งาน"',array('class'=>'btn btn-block btn-warning','onclick'=>"return confirm('ยืนยันการเปลี่ยนสถานะ ?');"))
           : ''; ?><br>
          <ul class="nav nav-tabs pull-right" role="tablist">
            <li role="presentation" class="active"><a href="#user" aria-controls="user" role="tab" data-toggle="tab" data-id="<?php echo $this->uri->segment(4); ?>">ข้อมูลส่วนตัว</a></li>
            <?php if (isset($user)) : ?>
              <li role="presentation"><a href="#user_bank" aria-controls="user_bank" role="tab" data-toggle="tab" data-id="<?php echo $this->uri->segment(4); ?>">ข้อมูลธนาคาร</a></li>
              <li role="presentation"><a href="#user_product" aria-controls="user_product" role="tab" data-toggle="tab" data-id="<?php echo $this->uri->segment(4); ?>">ข้อมูลผลิตภัณฑ์</a></li>
              <li role="presentation"><a href="#deposit" aria-controls="deposit" role="tab" data-toggle="tab" data-id="<?php echo $this->uri->segment(4); ?>">รายการฝาก</a></li>
              <li role="presentation"><a href="#withdraw" aria-controls="withdraw" role="tab" data-toggle="tab" data-id="<?php echo $this->uri->segment(4); ?>">รายการถอน</a></li>
              <!-- <li role="presentation"><a href="#transfer" aria-controls="transfer" role="tab" data-toggle="tab" data-id="<?php echo $this->uri->segment(4); ?>">รายการโอน</a></li> -->
            <?php endif; ?>
          </ul>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="user">
              <?php echo form_open_multipart(uri_string(),array('class'=>'form-horizontal','data-toggle'=>'validator')); ?>
              <?php echo ($user)
              ? form_hidden(array('id'=>$user['id'],'picture'=>$user['picture'],'re_username'=>$user['username'],'re_email'=>$user['email']))
              : form_hidden(array('picture'=>date('YmdHis'))) ; ?>
              <?php echo form_hidden('post','profile'); ?>
              <?php $fieldset = ($user) ? 'อัพเดทข้อมูลผู้ใช้งานระบบ' : 'เพิ่มข้อมูลผู้ใช้งานระบบ'; ?>
              <?php echo form_fieldset($fieldset); ?>
              <div class="col-sm-3"> <?php echo img('assets/images/user/'.$user['picture'],'',array('id'=>'preview','class'=>'img-responsive','style'=>'width:200px;height:200px;')).br(); ?> </div>
              <div class="col-sm-9">
                <?php echo form_fieldset(lang('form_legend_detail')); ?>
                <div class="form-group"> <?php echo form_label(lang('form_picture'),'picture',array('class'=>'col-sm-3 control-label text-right')); ?>
                  <div class="col-sm-9"> <?php echo form_upload(array('name'=>'picture','id'=>'picture','class'=>'form-control')); ?> <p class="help-block">* รองรับไฟล์นามสกุล jpg,jpeg,png ** รูปภาพจะถูกย่อขนาดเป็น 200x200 พิกเซล</p> </div>
                 </div>
                <div class="form-group"> <?php echo form_label(lang('form_fullname'),'fullname',array('class'=>'col-sm-3 control-label text-right')); ?>
                  <div class="col-sm-9"> <?php echo form_input(array('name'=>'fullname','class'=>'form-control','placeholder'=>lang('form_fullname'),'required'=>TRUE,'maxlength'=>'100'),set_value('fullname',$user['fullname'])); ?> </div>
                 </div>
                <div class="form-group"> <?php echo form_label(lang('form_email'),'email',array('class'=>'col-sm-3 control-label text-right')); ?>
                  <div class="col-sm-9"> <?php echo form_email(array('name'=>'email','class'=>'form-control','placeholder'=>lang('form_email'),'required'=>TRUE),set_value('email',$user['email'])); ?> </div>
                 </div>
                <div class="form-group"> <?php echo form_label(lang('form_phone'),'phone',array('class'=>'col-sm-3 control-label text-right')); ?>
                  <div class="col-sm-9"> <?php echo form_input(array('name'=>'phone','class'=>'form-control','placeholder'=>'0000000000','required'=>TRUE,'data-minlength'=>'10','maxlength'=>'10'),set_value('phone',$user['phone'])); ?> </div>
                 </div>
                <?php echo form_fieldset_close(); ?>
                <?php if ($user) : ?>
                  <?php echo form_fieldset(lang('form_legend_stats')); ?>
                  <div class="form-group"> <?php echo form_label(lang('form_created'),'',array('class'=>'col-sm-3 control-label text-right')); ?>
                    <div class="col-sm-9"> <?php echo form_input(array('value'=>$user['created'],'class'=>'form-control','disabled'=>TRUE)); ?> </div>
                  </div>
                  <div class="form-group"> <?php echo form_label('ไอพีสมัครสมาชิก','',array('class'=>'col-sm-3 control-label text-right')); ?>
                    <div class="col-sm-9"> <?php echo form_input(array('value'=>long2ip($user['created_ip']),'class'=>'form-control','disabled'=>TRUE)); ?> </div>
                  </div>
                  <div class="form-group"> <?php echo form_label(lang('form_updated'),'',array('class'=>'col-sm-3 control-label text-right')); ?>
                    <div class="col-sm-9"> <?php echo form_input(array('value'=>$user['updated'],'class'=>'form-control','disabled'=>TRUE)); ?> </div>
                  </div>
                  <div class="form-group"> <?php echo form_label(lang('form_logged'),'',array('class'=>'col-sm-3 control-label text-right')); ?>
                    <div class="col-sm-9"> <?php echo form_input(array('value'=>$user['logged'],'class'=>'form-control','disabled'=>TRUE)); ?> </div>
                  </div>
                  <div class="form-group"> <?php echo form_label('ไอพีเข้าสู่ระบบล่าสุด','',array('class'=>'col-sm-3 control-label text-right')); ?>
                    <div class="col-sm-9"> <?php echo form_input(array('value'=>long2ip($user['logged_ip']),'class'=>'form-control','disabled'=>TRUE)); ?> </div>
                  </div>
                  <?php echo form_fieldset_close(); ?>
                  <?php echo form_fieldset(lang('form_legend_password')); ?>
                  <?php $disabled = ($user) ? 'readonly' : 'required'; ?>
                  <div class="form-group"> <?php echo form_label(lang('form_id'),'username',array('class'=>'col-sm-3 control-label text-right')); ?>
                    <div class="col-sm-9"> <?php echo form_input(array('name'=>'id','class'=>'form-control',$disabled=>TRUE),set_value('',sprintf('%04d',$user['id']))); ?> </div>
                  </div>
                  <div class="form-group"> <?php echo form_label(lang('form_username'),'username',array('class'=>'col-sm-3 control-label text-right')); ?>
                    <div class="col-sm-9"> <?php echo form_input(array('name'=>'username','class'=>'form-control',$disabled=>TRUE),set_value('',$user['username'])); ?> </div>
                  </div>
                  <div class="form-group"> <?php echo form_label(lang('form_password_old'),'old_password',array('class'=>'col-sm-3 control-label text-right')); ?>
                    <div class="col-sm-9"> <?php echo form_password(array('name'=>'old_password','class'=>'form-control','placeholder'=>lang('form_password_old'),'data-minlength'=>'8','maxlength'=>'8')); ?> </div>
                  </div>
                  <div class="form-group"> <?php echo form_label(lang('form_password_new'),'new_password',array('class'=>'col-sm-3 control-label text-right')); ?>
                    <div class="col-sm-9"> <?php echo form_password(array('name'=>'new_password','id'=>'password','class'=>'form-control','placeholder'=>lang('form_password_new'),'data-minlength'=>'8','maxlength'=>'8')); ?> </div>
                  </div>
                  <div class="form-group"> <?php echo form_label(lang('form_password_confirm'),'new_password_confirm',array('class'=>'col-sm-3 control-label text-right')); ?>
                    <div class="col-sm-9"> <?php echo form_password(array('name'=>'new_password_confirm','class'=>'form-control','placeholder'=>lang('form_password_confirm'),'data-match'=>'#password','data-minlength'=>'8','maxlength'=>'8')); ?> </div>
                  </div>
                  <?php echo form_fieldset_close(); ?>
                <?php else: ?>
                  <?php echo form_fieldset(lang('form_legend_user')); ?>
                  <div class="form-group"> <?php echo form_label(lang('form_username'),'username',array('class'=>'control-label text-right col-sm-3')); ?>
                    <div class="col-sm-9"> <?php echo form_input(array('name'=>'username','class'=>'form-control','placeholder'=>lang('form_username'),'required'=>TRUE)); ?> </div>
                  </div>
                  <div class="form-group"> <?php echo form_label(lang('form_password'),'password',array('class'=>'control-label text-right col-sm-3')); ?>
                    <div class="col-sm-9"> <?php echo form_input(array('name'=>'password','id'=>'password','class'=>'form-control','required'=>TRUE,'data-minlength'=>'8','maxlength'=>'8')); ?> <p class="help-block"><?php echo lang('form_password_help'); ?></p> </div>
                  </div>
                  <?php echo form_fieldset_close(); ?>
                <?php endif; ?>
                <?php if (isset($group)) : ?>
                  <?php echo form_fieldset(lang('form_legend_group')); ?>
                  <div class="form-group"> <?php echo form_label(lang('form_group'),'group_id',array('class'=>'col-sm-3 control-label text-right')); ?>
                    <div class="col-sm-9">
                      <?php foreach ($group as $g) echo form_checkbox('group_id[]',$g['id'],in_array($g['id'],$user['group'])).nbs(2).$g['name'].br(); ?>
                    </div>
                  </div>
                  <?php echo form_fieldset_close(); ?>
                <?php endif; ?>
              </div>
              <?php echo form_fieldset_close(); ?>
              <div class="form-group pull-right"> <div class="col-sm-12"> <?php echo form_button_submit(); ?> <?php echo form_button_reset(); ?> </div> </div>
              <?php echo form_close(); ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="user_bank">
              <div class="row">
                <div class="col-sm-12">
                  <?php echo form_open(uri_string(),array('class'=>'form-horizontal','data-toggle'=>'validator')); ?>
                  <?php echo ($bank_edit) ? form_hidden('id',$bank_edit['id']) : form_hidden('user_id',$this->session->id); ?>
                  <?php echo form_fieldset('ข้อมูลบัญชีธนาคาร'); ?>
                  <div class="form-group"><?php echo form_label(lang('form_account_bank'),'account_bank',array('class'=>'control-label col-sm-4')); ?>
                    <div class="col-sm-8"><?php echo form_dropdown(array('name'=>'account_bank','class'=>'form-control','placeholder'=>lang('form_account_bank'),'required'=>TRUE),dropdown_bank(),set_value('',$bank_edit['account_bank'])); ?></div>
                  </div>
                  <div class="form-group"><?php echo form_label(lang('form_account_name'),'account_name',array('class'=>'control-label col-sm-4')); ?>
                    <div class="col-sm-8"><?php echo form_input(array('name'=>'account_name','class'=>'form-control','placeholder'=>lang('form_account_name'),'required'=>TRUE),set_value('',$bank_edit['account_name'])); ?></div>
                  </div>
                  <div class="form-group"><?php echo form_label(lang('form_account_number'),'account_number',array('class'=>'control-label col-sm-4')); ?>
                    <div class="col-sm-8"><?php echo form_input(array('name'=>'account_number','class'=>'form-control','placeholder'=>lang('form_account_number'),'required'=>TRUE),set_value('',$bank_edit['account_number'])); ?></div>
                  </div>
                  <?php if ($bank_edit) : ?>
                  <div class="form-group"><?php echo form_label('','status',array('class'=>'control-label col-sm-4')); ?>
                    <div class="col-sm-8">
                      <?php echo form_radio(array('name'=>$bank_edit['id']),'',(($bank_edit['status']==='0') ? TRUE : FALSE),array('onchange'=>"window.location.href='".base_url('profile/bank_status/'.$bank_edit['id'].'/0')."';")).nbs().lang('ui_status_working').br(); ?>
      								<?php echo form_radio(array('name'=>$bank_edit['id']),'',(($bank_edit['status']==='1') ? TRUE : FALSE),array('onchange'=>"window.location.href='".base_url('profile/bank_status/'.$bank_edit['id'].'/1')."';")).nbs().lang('ui_status_suspended').br(); ?>
                    </div>
                  </div>
                  <?php endif; ?>
                  <?php echo form_fieldset_close(); ?>
                  <div class="form-group pull-right"> <div class="col-sm-12"> <?php echo form_button_submit(); ?> <?php echo form_button_reset(); ?> <?php if ($this->input->get('bank_id')) { echo form_anchor_back(uri_string(),lang('form_button_back')); } ?> </div></div>
                  <?php echo form_close().br(2).hr(); ?>
                </div>
              </div>
              <?php if (isset($user_bank) && ! $this->input->get('bank_id')) : ?>
                <div class="row"> <div class="col-sm-12"> <legend>รายการบัญชีธนาคาร</legend><?php echo $user_bank; ?> </div> </div>
              <?php endif; ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="user_product">
              <div class="row">
                <div class="col-sm-12">
                  <legend>รายการผลิตภัณฑ์ทั้งหมด</legend>
                  <?php echo $user_product; ?>
                </div>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="deposit">
              <div class="row">
                <div class="col-sm-12">
                  <legend>ประวัติรายการฝาก</legend>
                  <?php echo $deposit; ?>
                </div>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="withdraw">
              <div class="row">
                <div class="col-sm-12">
                  <legend>ประวัติรายการถอน</legend>
                  <?php echo $withdraw; ?>
                </div>
              </div>
            </div>
            <!-- <div role="tabpanel" class="tab-pane" id="transfer"></div> -->
          </div>
        </div>
      </div>
    <?php endif; ?>
    <div class="row"> <div class="col-sm-12"> <?php echo (isset($users)) ? '<legend>รายการลูกค้า</legend>'.$users : ''; ?> </div> </div>
  </div>
</div>
<?php $this->load->view('admin/partials/footer'); ?>
