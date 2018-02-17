<nav class="navbar navbar-default" role="navigation" style="min-height:100px;margin-bottom:0px;">
  <div class="container">
    <div class="row">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav" aria-expanded="false">
          <span class="sr-only"></span>
          <span class="icon-bar" style="color:black;"></span>
          <span class="icon-bar" style="color:black;"></span>
          <span class="icon-bar" style="color:black;"></span>
        </button>
        <a class="navbar-brand" href="<?php echo base_url(); ?>">
          <?php echo img('assets/images/logo.png','',array('class'=>'img-responsive','style'=>'width:100%;')); ?>
        </a>
      </div>
      <div class="collapse navbar-collapse" id="nav">
        <ul class="nav navbar-nav navbar-right">
          <?php if ( ! $this->session->login && ! any_in_array(array('register','login','forgot_password'),$this->uri->segment_array())) : ?>
            <li>
              <?php echo form_open('user/login',array('class'=>'navbar-form','role'=>'form')); ?>
              <div class="form-group"><?php echo form_input(array('name'=>'username','class'=>'form-control','placeholder'=>lang('form_username'),'size'=>'10')); ?></div>
              <div class="form-group"><?php echo form_password(array('name'=>'password','class'=>'form-control','placeholder'=>lang('form_password'),'size'=>'6','data-minlength'=>'8','maxlength'=>'8')); ?></div>
              <?php echo form_submit('',lang('navbar_login'),array('class'=>'btn btn-success')); ?>
              <?php echo form_close(); ?>
            </li>
          <?php elseif ($this->session->login) : ?>
            <li><a href="<?php echo base_url('profile'); ?>"> <i class="fa fa-lg fa-user"></i><?php echo lang('navbar_profile'); ?></a></li>
            <?php if ($this->session->has_userdata('admin')) : ?>
              <li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-lg fa-lock"></i> <?php echo lang('navbar_admin'); ?></a></li>
            <?php endif; ?>
            <li><a href="<?php echo base_url('user/logout'); ?>"><i class="fa fa-lg fa-sign-out"></i><?php echo lang('navbar_logout'); ?></a></li>
          <?php else: ?>
            <li><a href="<?php echo base_url(); ?>"><?php echo lang('navbar_homepage'); ?></a></li>
          <?php endif; ?>
        </ul>
        <span class="clearfix"></span>
        <ul class="nav navbar-nav navbar-right">
          <li><?php echo anchor('user/switch_theme/superhero',img('assets/images/black.png','',array('style'=>'width:20px;height:20px;'))); ?></li>
          <li><?php echo anchor('user/switch_theme/yeti',img('assets/images/blue.png','',array('style'=>'width:20px;height:20px;'))); ?></li>
          <li><?php echo anchor('user/switch_language/thai',img('assets/images/flag/th.png','',array('style'=>'width:20px;height:20px;'))); ?></li>
          <li><?php echo anchor('user/switch_language/english',img('assets/images/flag/uk.png','',array('style'=>'width:20px;height:20px;'))); ?></li>
          <?php if ( ! $this->session->login) : ?>
            <li><?php echo anchor('user/register',lang('navbar_register')); ?></li>
            <li><?php echo anchor('user/forgot_password',lang('navbar_forgot_password')); ?></li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </div>
</nav>
