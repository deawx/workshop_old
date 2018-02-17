<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
  <!-- Sidebar user panel -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="<?php echo $base_assets_url;?>images/avatar.png" class="img-circle" alt="User Image" />
    </div>
    <div class="pull-left info">
      <p>สวัสดี, <?php echo $current_user['first_name']?></p>
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
  </div>
<ul class="sidebar-menu">
  <li class="<?php echo ($parent_menu === 'search')? 'active' : '' ?>">
    <a href="<?php echo site_url('admin/search')?>">
      <i class="fa fa-search"></i> <span>ค้นหาข้อมูล</span>
    </a>
  </li>
  <li class="<?php echo ($parent_menu === 'patient')? 'active' : '' ?>">
    <a href="<?php echo site_url('admin/patients')?>">
      <i class="fa fa-users"></i> <span>ข้อมูลผู้ป่วย</span>
    </a>
  </li>
  <li class="treeview <?php echo ($parent_menu === 'sample')? 'active' : '' ?>">
    <a href="#">
      <i class="fa fa-copy"></i> <span>ข้อมูลส่งตรวจตัวอย่าง</span>
      <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu" <?php echo ($parent_menu === 'sample')? 'style="display:block"' : 'style="display:none"' ?>>
      <li><a href="<?php echo site_url('admin/sample')?>"><i class="fa fa-angle-double-right"></i> เพิ่มใหม่ </a></li>
      <li><a href="<?php echo site_url('admin/sample/lists')?>"><i class="fa fa-angle-double-right"></i> รายการทั้งหมด </a></li>
    </ul>
  </li>
  <li class="<?php echo ($parent_menu === 'labs')? 'active' : '' ?>">
    <a href="<?php echo site_url('admin/labs')?>">
      <i class="fa fa-stethoscope"></i> <span>ข้อมูลทางห้องปฎิบัติการ</span>
    </a>
  </li>
  <li class="<?php echo ($parent_menu === 'clinic')? 'active' : '' ?>">
    <a href="<?php echo site_url('admin/clinic')?>">
      <i class="fa fa-hospital-o"></i> <span>ข้อมูลทางคลีนิค</span>
    </a>
  </li>
  <li class="<?php echo ($parent_menu === 'genogram')? 'active' : '' ?>">
    <a href="<?php echo site_url('admin/genogram')?>">
      <i class="fa fa-smile-o"></i> <span>ข้อมูลความสัมพันธ์ครอบครัว</span>
    </a>
  </li>
  <li class="<?php echo ($parent_menu === 'attachments')? 'active' : '' ?>">
    <a href="<?php echo site_url('admin/attachments')?>">
      <i class="fa fa-files-o"></i> <span>ข้อมูลไฟล์ผู้ป่วย</span>
    </a>
  </li>
  <?php if(any_in_array(array('special','admin'),$current_groups)):?>
    <li class="treeview <?php echo ($parent_menu === 'setting')? 'active' : '' ?>">
      <a href="#">
        <i class="fa fa-gear"></i> <span>ตั้งค่าทั่วไป</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu" <?php echo ($parent_menu === 'user')? 'style="display:block"' : 'style="display:none"' ?>>
        <li><a href="<?php echo site_url('admin/users/')?>"><i class="fa fa-angle-double-right"></i> รายการผู้ใช้</a></li>
        <li><a href="<?php echo site_url('admin/groups')?>"><i class="fa fa-angle-double-right"></i> รายการกลุ่มผู้ใช้</a></li>
      </ul>
    </li>
  <?php endif;?>
</ul>
</section>
<!-- /.sidebar -->
