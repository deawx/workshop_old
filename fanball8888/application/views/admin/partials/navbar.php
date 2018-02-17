<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
      <span class="sr-only">เลื่อนดู</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">
      <span class="timer" data-left=200></span>
      <!-- <?php echo img('assets/images/logo.jpg','',array('class'=>'img-responsive','style'=>'width:260px;height:60px;margin:0px;padding:0px;')); ?> -->
    </a>
  </div>
  <div style="color:white;padding: 15px 50px 5px 50px;float:right;font-size:16px;"></div>
</nav>
<nav class="navbar-default navbar-side" role="navigation">
  <div class="sidebar-collapse">
    <ul class="nav" id="main-menu">
      <li class="text-center">
        <div class="" style="margin:5px;">
          <?php echo img('assets/images/user/'.$this->session->picture,'',array('class'=>'user-image img-responsive')); ?>
          <caption><?php echo heading($this->session->fullname,'3'); ?></caption>
        </div>
      </li>
      <li><a href="<?php echo base_url(); ?>"><i class="fa fa-2x fa-home"></i><?php echo lang('navbar_homepage'); ?></a></li>
      <li><a class="<?php if($this->uri->segment(2) === 'dashboard') echo 'active-menu'; ?>" href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-2x fa-dashboard"></i><?php echo lang('navbar_dashboard'); ?></a></li>
      <li>
        <a href="#"><i class="fa fa-2x fa-users"></i><?php echo lang('navbar_users'); ?>
          <?php if ($this->alert['user_register'] === TRUE) { ?>
            <span class="badge"> new </span>
          <?php } ?>
          <span class="fa arrow"></span>
        </a>
        <ul class="nav nav-second-level <?php if ($this->uri->segment(2) === 'user' OR $this->uri->segment(2) === 'group') echo 'in'; ?>">
          <li><a class="<?php if($this->uri->segment(2) === 'user') echo 'active-menu'; ?>" href="<?php echo base_url('admin/user'); ?>">
              <?php echo lang('navbar_user_list'); ?>
              <?php if ($this->alert['user_register'] === TRUE) { ?>
                <span class="badge"> ! </span>
              <?php } ?>
            </a>
          </li>
          <li><a class="<?php if($this->uri->segment(2) === 'group') echo 'active-menu'; ?>" href="<?php echo base_url('admin/group'); ?>"><?php echo lang('navbar_groups'); ?></a></li>
        </ul>
      </li>
      <li>
        <a href="#"><i class="fa fa-2x fa-star"></i><?php echo lang('navbar_match'); ?> <span class="fa arrow"></span> </a>
        <ul class="nav nav-second-level <?php if ($this->uri->segment(2) === 'match' OR $this->uri->segment(2) ==='pay') echo 'in'; ?>">
          <li><a class="<?php if($this->uri->segment(2) === 'point') echo 'active-menu'; ?>" href="<?php echo base_url('admin/point'); ?>"><?php echo lang('navbar_addpoint'); ?></a></li>
          <li><a class="<?php if($this->uri->segment(2) === 'match') echo 'active-menu'; ?>" href="<?php echo base_url('admin/match'); ?>"><?php echo lang('navbar_addmatch'); ?></a></li>
          <li><a class="<?php if($this->uri->segment(2) === 'pay') echo 'active-menu'; ?>" href="<?php echo base_url('admin/pay'); ?>"><?php echo lang('navbar_addpay'); ?></a></li>
        </ul>
      </li>
      
      <li>
        <a href="#"><i class="fa fa-2x fa-tags"></i><?php echo lang('navbar_products'); ?> <span class="fa arrow"></span> </a>
        <ul class="nav nav-second-level <?php if ($this->uri->segment(2) === 'product') echo 'in'; ?>">
          <li><a class="<?php if($this->input->get('category') === 'sportbook') echo 'active-menu'; ?>" href="<?php echo base_url('admin/product?category=sportbook'); ?>"><?php echo lang('navbar_sportbook'); ?></a></li>
          <li><a class="<?php if($this->input->get('category') === 'casino') echo 'active-menu'; ?>" href="<?php echo base_url('admin/product?category=casino'); ?>"><?php echo lang('navbar_livecasino'); ?></a></li>
          <li><a class="<?php if($this->input->get('category') === 'game') echo 'active-menu'; ?>" href="<?php echo base_url('admin/product?category=game'); ?>"><?php echo lang('navbar_game'); ?></a></li>
        </ul>
      </li>
      <li>
        <a href="#"><i class="fa fa-2x fa-file-text"></i><?php echo lang('navbar_requests'); ?>
          <?php if ($this->alert['product_register'] === TRUE
            OR $this->alert['product_deposit'] === TRUE
            OR $this->alert['product_withdraw'] === TRUE) { ?>
            <span class="badge"> new </span>
          <?php } ?>
          <span class="fa arrow"></span>
        </a>
        <ul class="nav nav-second-level <?php if ($this->uri->segment(2) === 'request') echo 'in'; ?>">
          <li>
            <a class="<?php if($this->input->get('type') === 'register') echo 'active-menu'; ?>" href="<?php echo base_url('admin/request?type=register'); ?>">
              <?php echo lang('navbar_register'); ?>
              <?php if ($this->alert['product_register'] === TRUE) { ?>
                <span class="badge"> ! </span>
              <?php } ?>
            </a>
          </li>
          <li>
            <a class="<?php if($this->input->get('type') === 'deposit') echo 'active-menu'; ?>" href="<?php echo base_url('admin/request?type=deposit'); ?>">
              <?php echo lang('navbar_deposit'); ?>
              <?php if ($this->alert['product_deposit'] === TRUE) { ?>
                <span class="badge"> ! </span>
              <?php } ?>
            </a>
          </li>
          <li>
            <a class="<?php if($this->input->get('type') === 'withdraw') echo 'active-menu'; ?>" href="<?php echo base_url('admin/request?type=withdraw'); ?>">
              <?php echo lang('navbar_withdraw'); ?>
              <?php if ($this->alert['product_withdraw'] === TRUE) { ?>
                <span class="badge"> ! </span>
              <?php } ?>
            </a>
          </li>
          <!-- <li><a class="<?php if($this->input->get('type') === 'transfer') echo 'active-menu'; ?>" href="<?php echo base_url('admin/request?type=transfer'); ?>"><?php echo lang('navbar_transfer'); ?></a></li> -->
        </ul>
      </li>
      <li>
        <a href="#"><i class="fa fa-2x fa-calendar"></i> <?php echo lang('navbar_promotions'); ?><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level <?php if ($this->uri->segment(2) === 'promotion') echo 'in'; ?>">
          <li><a class="<?php if($this->input->get('type') === 'event') echo 'active-menu'; ?>" href="<?php echo base_url('admin/promotion?type=event'); ?>"><?php echo lang('navbar_event'); ?></a></li>
          <li><a class="<?php if($this->input->get('type') === 'offer') echo 'active-menu'; ?>" href="<?php echo base_url('admin/promotion?type=offer'); ?>"><?php echo lang('navbar_offer'); ?></a></li>
        </ul>
      </li>
      <li>
        <a href="#"><i class="fa fa-2x fa-book"></i> <?php echo lang('navbar_webboards'); ?>
          <?php if ($this->alert['webboard_topic'] === TRUE) { ?>
            <span class="badge"> new </span>
          <?php } ?>
          <span class="fa arrow"></span>
        </a>
        <ul class="nav nav-second-level <?php if ($this->uri->segment(2) === 'webboard') echo 'in'; ?>">
          <!-- <li><a class="<?php if($this->input->get('type') === 'game') echo 'active-menu'; ?>" href="<?php echo base_url('admin/webboard?type=game'); ?>"><?php echo lang('navbar_webboard_game'); ?></a></li> -->
          <li>
            <a class="<?php if($this->input->get('type') === 'topic') echo 'active-menu'; ?>" href="<?php echo base_url('admin/webboard?type=topic'); ?>">
              <?php echo lang('navbar_webboard_topic'); ?>
              <?php if ($this->alert['webboard_topic'] === TRUE) { ?>
                <span class="badge"> ! </span>
              <?php } ?>
            </a>
          </li>
          <li><a class="<?php if($this->input->get('type') === 'category') echo 'active-menu'; ?>" href="<?php echo base_url('admin/webboard?type=category'); ?>"><?php echo lang('navbar_webboard_category'); ?></a></li>
        </ul>
      </li>
      <!-- <li><a class="<?php if($this->uri->segment(2) === 'contact') echo 'active-menu'; ?>" href="<?php echo base_url('admin/contact'); ?>"><i class="fa fa-2x fa-envelope-o"></i><?php echo lang('navbar_contact'); ?></a></li> -->
      <!-- <li><a class="<?php if($this->uri->segment(2) === 'channel') echo 'active-menu'; ?>" href="<?php echo base_url('admin/channel'); ?>"><i class="fa fa-2x fa-tv"></i><?php echo lang('navbar_channels'); ?></a></li> -->
      <li>
        <a href="#"><i class="fa fa-2x fa-cogs"></i><?php echo lang('navbar_settings'); ?></a>
        <ul class="nav nav-second-level <?php if ($this->uri->segment(2) === 'settings') echo 'in'; ?>">
          <li><a class="<?php if($this->input->get('type') === 'slide') echo 'active-menu'; ?>" href="<?php echo base_url('admin/settings?type=slide'); ?>"><?php echo lang('navbar_slide'); ?></a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
