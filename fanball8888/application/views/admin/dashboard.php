<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('admin/partials/header'); ?>
<?php $this->load->view('admin/partials/navbar'); ?>
<div id="page-wrapper" >
  <div id="page-inner">
    <?php $this->load->view('partials/message'); ?>
    <div class="row">
      <div class="col-sm-12">
        <legend>รายการสมาชิก</legend>
      </div>
      <div class="col-md-12">
        <div class="col-sm-3 text-center">
          <div class="h3 well">
            <span class="fa fa-2x fa-users"></span>
            <p>
              แอคเคาท์ทั้งหมด <?php echo $user_all; ?> รายการ
            </p>
          </div>
        </div>
        <div class="col-sm-3 text-center">
          <div class="h3 well">
            <span class="fa fa-2x fa-address-card-o"></span>
            <p>
              สมัครใหม่วันนี้ <?php echo $user_new_today; ?> รายการ
            </p>
          </div>
        </div>
        <div class="col-sm-3 text-center">
          <div class="h3 well">
            <span class="fa fa-2x fa-user-circle-o"></span>
            <p>
              เข้าใช้วันนี้ <?php echo $user_login_today; ?> รายการ
            </p>
          </div>
        </div>
        <div class="col-sm-3 text-center">
          <div class="h3 well">
            <span class="fa fa-2x fa-user-o"></span>
            <p>
              ออนไลน์ขณะนี้ <?php echo $user_online; ?> รายการ
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <legend>รายการเกมส์ทายผล</legend>
      </div>
      <div class="col-md-12">
        <div class="col-sm-3 text-center">
          <div class="h3 well">
            <span class="fa fa-2x fa-futbol-o"></span>
            <p>
              แมตช์เกมส์ทายผล <?php echo $match_all; ?> รายการ
            </p>
          </div>
        </div>
        <div class="col-sm-3 text-center">
          <div class="h3 well">
            <span class="fa fa-2x fa-list"></span>
            <p>
              เสร็จสิ้น <?php echo $match_complete; ?> รายการ
            </p>
          </div>
        </div>
        <div class="col-sm-3 text-center">
          <div class="h3 well">
            <span class="fa fa-2x fa-spinner"></span>
            <p>
              ดำเนินการอยู่ <?php echo $match_process; ?> รายการ
            </p>
          </div>
        </div>
        <div class="col-sm-3 text-center">
          <div class="h3 well">
            <span class="fa fa-2x fa-ban"></span>
            <p>
              ยกเลิกแมตช์ <?php echo $match_problem; ?> รายการ
            </p>
          </div>
        </div>
      </div>
    </div>
    <hr />
  </div>
</div>
<?php $this->load->view('admin/partials/footer'); ?>
