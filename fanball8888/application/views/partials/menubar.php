<nav class="navbar navbar-inverse" role="navigation">
  <div class="container">
    <div class="row">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false">
          <span class="sr-only">เลื่อนดู</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse" id="menu">
        <ul class="nav navbar-nav">
          <li><?php echo anchor('homepage','<i class="fa fa-lg fa-home"></i>'); ?></li>
          <li><?php echo anchor('','<i class="fa fa-lg fa-mobile"></i>'); ?></li>
          <!-- <li class="dropdown">
            <?php echo anchor('#',lang('navbar_sportbook').'<span class="caret"></span>',array('id'=>'sportbook','data-target'=>'','data-toggle'=>'dropdown','aria-haspopup'=>TRUE,'aria-expanded'=>FALSE)); ?>
            <ul class="dropdown-menu" aria-labelledby="sportbook">
              <?php foreach ($this->data['sportbook'] as $s) : ?>
                <li>
                  <?php echo anchor('product/'.$s['id'],img('assets/images/product/'.$s['picture'],'',array('style'=>'width:250px;height:100px;'))); ?>
                </li>
              <?php endforeach; ?>
            </ul>
          </li>
          <li class="dropdown">
            <?php echo anchor('#',lang('navbar_livecasino').'<span class="caret"></span>',array('id'=>'livecasino','data-target'=>'','data-toggle'=>'dropdown','aria-haspopup'=>TRUE,'aria-expanded'=>FALSE)); ?>
            <ul class="dropdown-menu" aria-labelledby="livecasino">
              <?php foreach ($this->data['casino'] as $s) : ?>
                <li>
                  <?php echo anchor('product/'.$s['id'],img('assets/images/product/'.$s['picture'],'',array('style'=>'width:250px;height:100px;'))); ?>
                </li>
              <?php endforeach; ?>
            </ul>
          </li> -->
          <!-- <li class="dropdown">
            <?php echo anchor('#',lang('navbar_game').'<span class="caret"></span>',array('id'=>'game','data-target'=>'','data-toggle'=>'dropdown','aria-haspopup'=>TRUE,'aria-expanded'=>FALSE)); ?>
            <ul class="dropdown-menu" aria-labelledby="game">
              <?php foreach ($this->data['game'] as $g) : ?>
                <li><?php echo anchor('product/'.$g['id'],img('assets/images/product/'.$g['picture'],'',array('style'=>'width:220px;height:70px;'))); ?></li>
              <?php endforeach; ?>
            </ul>
          </li> -->
          <li><a href="http://www.fanballtv.com" target="_blank"><?php echo lang('navbar_fanball_tv'); ?></a></li>
          <!-- <li class="<?php if (in_array('predict',$this->uri->segment_array())) echo 'active'; ?>"><?php echo anchor('predict',lang('navbar_fanball_predict')); ?></li> -->
          <li class="<?php if (in_array('promotion',$this->uri->segment_array())) echo 'active'; ?>"><?php echo anchor('promotion',lang('navbar_fanball_promotion')); ?></li>
          <li class="<?php if (in_array('webboard',$this->uri->segment_array())) echo 'active'; ?>"><?php echo anchor('webboard',lang('navbar_fanball_webboard')); ?></li>
        </ul>
      </div>
    </div>
  </div>
</nav>
<?php $this->load->view('partials/message'); ?>
