<div class="container">
  <div class="row">
    <?php echo img('assets/images/head.jpg','',array('class'=>'img-responsive','style'=>'width:100%;')); ?>
    <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
          <span class="sr-only">เลื่อนดู</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse" id="navbar">
        <ul class="nav navbar-nav">
          <li class="<?php if ($this->uri->segment(1) == '') echo 'active'; ?>"><a href="<?php echo base_url(); ?>">หน้าหลัก</a></li>
          <li class="<?php if ($this->uri->segment(1) == 'content') echo 'active'; ?>"><a href="<?php echo base_url('content'); ?>">เนื้อหารายวิชา</a></li>
          <?php if ($this->session->role !== 'student') : ?>
            <li class="<?php if ($this->uri->segment(2) == 'all_history') echo 'active'; ?>"><a href="<?php echo base_url('user/all_history'); ?>">ข้อมูลการเรียน</a></li>
          <?php endif; ?>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <?php if ($this->session->has_userdata('login')): ?>
            <?php if ($this->session->role == 'student') : ?>
            <li class="<?php if ($this->uri->segment(2) == 'history') echo 'active'; ?>"><a href="<?php echo base_url('user/history/'.$this->session->id); ?>">ประวัติการเรียน</a></li>
            <?php endif; ?>
            <li class="<?php if ($this->uri->segment(1) == 'user') echo 'active'; ?>"><a href="<?php echo base_url('user/'.$this->session->id); ?>">แก้ไขโปรไฟล์</a></li>
            <?php if ($this->session->role === 'instructor') : ?>
              <li><a href="<?php echo base_url('admin/course'); ?>">ส่วนของแอดมิน</a></li>
            <?php endif; ?>
            <li><a href="<?php echo base_url('user/logout'); ?>">ออกจากระบบ</a></li>
          <?php else: ?>
            <li><a href="<?php echo base_url('user/login'); ?>">เข้าสู่ระบบ/ลงทะเบียน</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </nav>
  </div>
</div>
<?php $this->load->view('partials/message'); ?>
