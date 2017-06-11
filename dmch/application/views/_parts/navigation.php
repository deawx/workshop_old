<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?=site_url();?>">
                <?=img('assets/images/logo.png','',array('class'=>'img-rounded','style'=>'width:40px;height:40px;margin-right:30px;'));?>
            </a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <?php if (array_key_exists('is_staff',$session)) : ?>
          <ul class="nav navbar-nav">
            <li class="<?=($segment['1'] == 'mother') ? 'active' : '';?>"><?=anchor('mother','จัดการข้อมูล มารดา');?></li>
            <li class="<?=($segment['1'] == 'child') ? 'active' : '';?>"><?=anchor('child','จัดการข้อมูล ทารก');?></li>
            <li class="<?=(in_array('admin',$segment) && in_array('article',$segment)) ? 'active' : '';?>"><?=anchor('admin/article','จัดการข้อมูล บทความ');?></li>
            <?php if (array_key_exists('is_admin',$session)) : ?>
              <li class="<?=(in_array('admin',$segment) && in_array('staff',$segment)) ? 'active' : '';?>"><?=anchor('admin/staff','จัดการข้อมูล บุคลากร');?></li>
            <?php endif; ?>
            <li class="<?=($segment['1'] == 'staff' && in_array('daily',$segment)) ? 'active' : '';?>"><?=anchor('staff/daily/'.$session['id'],'ตารางฉีดวัคซีน');?></li>
          </ul>
        <?php endif; ?>
        <?php if ( ! $session) : ?>
          <?=form_open(site_url('main/signin'),array('class'=>'navbar-form navbar-left','data-toggle'=>'validator'));?>
            <div class="form-group">
              <?=form_email(array('name'=>'email','type'=>'email','class'=>'form-control','placeholder'=>'อีเมล์','required'=>TRUE));?>
            </div>
            <div class="form-group">
              <?=form_password(array('name'=>'password','class'=>'form-control','placeholder'=>'รหัสผ่าน','required'=>TRUE));?>
            </div>
            <?=form_submit('','เข้าสู่ระบบ',array('class'=>'btn btn-primary'));?>
          <?=form_close();?>
        <?php elseif (array_key_exists('is_staff',$session)) : ?>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <?=$session['name'].nbs(3).$session['surname'];?>(<?=(array_key_exists('is_admin',$session)) ? 'ผู้ดูแลระบบ' : 'บุคลากร' ;?>) <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li><?=anchor(site_url('staff/'.$session['id']),'ข้อมูลส่วนตัว');?></li>
                <li><?=anchor(site_url('organize'),'หน่วยงาน/องค์กร');?></li>
                <li role="separator" class="divider"></li>
                <li><?=anchor(site_url('main/signout'),'ออกจากระบบ');?></li>
              </ul>
            </li>
          </ul>
        <?php endif; ?>
        <?php if ( ! array_key_exists('is_staff',$session) && ! array_key_exists('is_admin',$session)) : ?>
          <?=anchor('main/signin_mother','ระเบียนข้อมูล',array('class'=>'btn btn-link'));?>
          <?=anchor('main/article','บทความน่ารู้',array('class'=>'btn btn-link'));?>
          <?php if (array_key_exists('is_mother',$session)) : ?>
          <?=anchor('main/signout','ออกจากระบบ',array('class'=>'btn btn-link'));?>
          <?php endif; ?>
        <?php endif; ?>
        </div>
    </div>
</nav>
