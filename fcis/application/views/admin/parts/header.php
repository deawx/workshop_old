<header class="header">
  <a href="<?php echo site_url('/');?>" class="logo"> </a>
  <nav class="navbar navbar-static-top" role="navigation">
    <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>
    <div class="navbar-right">
      <ul class="nav navbar-nav">
        <li class="dropdown user">
          <a href="<?php echo site_url('admin/statistic'); ?>">
            <i class="fa fa-dashboard"></i>
            <span> ข้อมูลทางสถิติ </span>
          </a>
        </li>
        <li class="dropdown user">
          <a href="<?php echo site_url('admin/logs'); ?>">
            <i class="fa fa-history"></i>
            <span> ประวัติการเข้าใช้งาน </span>
          </a>
        </li>
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="glyphicon glyphicon-user"></i>
            <span><?php echo $current_user['first_name'].' '.$current_user['last_name'];?> <i class="caret"></i></span>
          </a>
          <ul class="dropdown-menu">
            <li class="user-header bg-light-blue">
              <img src="<?php echo $base_assets_url;?>images/avatar.png" class="img-circle" alt="User Image" />
              <p>
                <?php echo $current_user['first_name'].' '.$current_user['last_name'];?>
                <small>Registered : <?php echo date('d M Y,  H:i:s', $current_user['created_on']) ?></small>
              </p>
            </li>
            <li class="user-footer">
              <div class="pull-left">
                <a href="<?php echo site_url('admin/users/profile')?>" class="btn btn-default btn-flat">โปรไฟล์</a>
              </div>
              <div class="pull-right">
                <a href="<?php echo site_url('signout')?>" class="btn btn-default btn-flat">ออกจากระบบ</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
