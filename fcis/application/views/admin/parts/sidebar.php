<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
  <!-- Sidebar user panel -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="<?php echo $base_assets_url;?>img/avatar.png" class="img-circle" alt="User Image" />
    </div>
    <div class="pull-left info">
      <p>Hello, <?php echo $current_user['first_name']?></p>
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
  </div>
<ul class="sidebar-menu">
  <li class="<?php echo ($parent_menu === 'search')? 'active' : '' ?>">
    <a href="<?php echo site_url('admin/search')?>">
      <i class="fa fa-search"></i> <span>Search</span>
    </a>
  </li>
  <li class="treeview <?php echo ($parent_menu == 'patient')? 'active' : '' ?>">
    <a href="#">
      <i class="fa fa-users"></i> <span>Patients</span>
      <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu" <?php echo ($parent_menu == 'patients')? 'style="display:block"' : 'style="display:none"' ?>>
      <li><a href="<?php echo site_url('admin/patients/add')?>"><i class="fa fa-angle-double-right"></i> Add New</a></li>
      <li><a href="<?php echo site_url('admin/patients/')?>"><i class="fa fa-angle-double-right"></i> All Patients</a></li>
    </ul>
  </li>
  <li class="<?php echo ($parent_menu === 'example')? 'active' : '' ?>">
    <a href="<?php echo site_url('admin/example')?>">
      <i class="fa fa-copy"></i> <span>Example</span>
    </a>
  </li>
  <li class="<?php echo ($parent_menu === 'labs')? 'active' : '' ?>">
    <a href="<?php echo site_url('admin/labs')?>">
      <i class="fa fa-stethoscope"></i> <span>Labs</span>
    </a>
  </li>
  <li class="<?php echo ($parent_menu === 'clinic')? 'active' : '' ?>">
    <a href="<?php echo site_url('admin/clinic')?>">
      <i class="fa fa-hospital-o"></i> <span>Clinic</span>
    </a>
  </li>
  <li class="<?php echo ($parent_menu === 'statistic')? 'active' : '' ?>">
    <a href="<?php echo site_url('admin/statistic')?>">
      <i class="fa fa-tasks"></i> <span>Statistic</span>
    </a>
  </li>
  <!-- <li class="<?php echo ($parent_menu === 'dashboard')? 'active' : '' ?>">
    <a href="<?php echo site_url('admin')?>">
      <i class="fa fa-dashboard"></i> <span>Dashboard</span>
    </a>
  </li> -->
  <li class="treeview <?php echo ($parent_menu == 'post')? 'active' : '' ?>">
    <a href="#">
      <i class="fa fa-edit"></i> <span>Posts</span>
      <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu" <?php echo ($parent_menu == 'post')? 'style="display:block"' : 'style="display:none"' ?>>
      <li><a href="<?php echo site_url('admin/posts/add')?>"><i class="fa fa-angle-double-right"></i> New Post</a></li>
      <li><a href="<?php echo site_url('admin/posts/')?>"><i class="fa fa-angle-double-right"></i> All Posts</a></li>
      <?php if(in_array('admin',$current_groups)):?>
        <li><a href="<?php echo site_url('admin/categories')?>"><i class="fa fa-angle-double-right"></i> Categories</a></li>
      <?php endif;?>
    </ul>
  </li>
  <?php if(any_in_array(array('special','admin'),$current_groups)):?>
    <li class="treeview <?php echo ($parent_menu === 'setting')? 'active' : '' ?>">
      <a href="#">
        <i class="fa fa-gear"></i> <span>General Setting</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu" <?php echo ($parent_menu === 'user')? 'style="display:block"' : 'style="display:none"' ?>>
        <li><a href="<?php echo site_url('admin/users/')?>"><i class="fa fa-angle-double-right"></i> All Users</a></li>
        <li><a href="<?php echo site_url('admin/groups')?>"><i class="fa fa-angle-double-right"></i> All Groups</a></li>
      </ul>
    </li>
  <?php endif;?>
</ul>
</section>
<!-- /.sidebar -->
