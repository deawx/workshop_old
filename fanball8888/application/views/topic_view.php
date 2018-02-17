<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('partials/header'); ?>
<?php $this->load->view('partials/navbar'); ?>
<?php $this->load->view('partials/menubar'); ?>
<?php $this->load->view('partials/phpsdk'); ?>
<?php if ( ! $topic) redirect('webboard'); ?>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="row"> <?php echo validation_errors('<div class="alert alert-info">','</div>');?> </div>
      <div class="row">
        <div class="panel panel-primary">
          <div class="panel-heading"><h3 class="panel-title"><?php echo lang('navbar_topic'); ?></h3></div>
          <div class="panel-body">
            <div class="media">
              <div class="media-body">
                <h4 class="media-heading">
                  <p class="lead"> <i class="fa fa-pencil"></i> : <?php echo $topic['title']; ?> </p>
                  <!-- <small> <div class="fb-like" data-share="true" data-width="450" data-show-faces="true"> </div> </small> -->
                </h4>
                <div class="well well-sm"> <p> <?php echo $topic['content']; ?> </p> </div>
                <div class="col-sm-3"> <?php echo img('assets/images/user/'.$topic['picture'],'',array('class'=>'media-object center-block','style'=>'width:75px;height:75px;')); ?> </div>
                <div class="col-sm-9">
                  <p class="col-sm-6"><i class="fa fa-edit"></i> : <?php echo ($topic['role'] === '1') ? '<strong class="mark">'.$topic['username'].'</strong>' : '<u>'.$topic['username'].'</u>' ?></p>
                  <p class="col-sm-6"><i class="fa fa-lg fa-clock-o"></i> : <u><?php echo $topic['datetime']; ?> </u></p>
                  <p class="col-sm-6"><i class="fa fa-lg fa-eye"></i> : <?php echo $topic['views']; ?> </p>
                  <p class="col-sm-6"><i class="fa fa-lg fa-comments"></i> : <?php echo $topic['comments']; ?> </p>
                  <?php if ($this->session->admin) : ?>
                    <p class="col-sm-12"><i class="fa fa-map-marker"></i> : <?php echo long2ip($topic['ip_address']); ?> </p>
                  <?php endif; ?>
                </div>
                <div class="col-sm-12">
                  <ul class="list-inline pull-right">
                    <li><a onclick="window.print()">  <?php echo lang('navbar_print'); ?> <i class="fa fa-level-up"></i> </a></li>
                    <li>
                      <?php if ($topic['user_id'] === $this->session->id OR $this->session->admin) : ?>
                        <a data-toggle="modal" data-target=".topic_option" data-id="<?php echo $topic['id']; ?>"> <?php echo lang('navbar_manage'); ?> <i class="fa fa-level-up"></i></a>
                      <?php endif; ?>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <?php foreach ($pinned as $t) : ?>
          <?php $picture = (file_exists('assets/images/user/'.$t['picture'])) ? $t['picture'] : 'default.jpg'; ?>
          <div class="panel panel-info">
            <div class="panel-body">
              <div class="media">
                <div class="media-left"> <?php echo img('assets/images/user/'.$picture,'',array('class'=>'media-object','style'=>'width:75px;height:75px;')); ?> </div>
                <div class="media-body">
                  <h4 class="media-heading">
                    <p class="lead"> <i class="fa fa-pencil"></i> : <?php echo $topic['title']; ?> </p>
                    <i class="fa fa-edit"></i> : <?php echo ($t['role'] === '1') ? '<strong class="mark">'.$t['username'].'</strong>' : '<u>'.$t['username'].'</u>' ?>
                    <i class="fa fa-clock-o"></i> : <u><?php echo $t['datetime']; ?></u>
                    <?php if ($t['modified'] !== '') : ?>
                      อัพเดทล่าสุด : <u><?php echo $t['modified']; ?></u>
                    <?php endif; ?>
                    <?php if ($this->session->admin) : ?>
                      <i class="fa fa-map-marker"></i> : <?php echo long2ip($t['ip_address']); ?>
                    <?php endif; ?>
                  </h4><br>
                  <?php if ($t['edited'] !== '') : ?>
                    <div class="well well-sm">
                      <p> <?php echo 'ข้อความที่ถูกแก้ไข'.nbs().parse_smileys($t['edited'],base_url().'smileys'); ?> </p>
                    </div>
                  <?php endif; ?>
                  <div class="well well-sm">
                    <?php $edited = ($t['modified']) ? 'อัพเดทล่าสุด' : ''; ?>
                    <p> <?php echo $edited.nbs().parse_smileys($t['comment'],base_url().'smileys'); ?> </p>
                  </div>
                  <ul class="list-inline pull-right">
                    <li>#<?php echo $t['sort']; ?></li>
                    <li><a onclick="window.print()">  <?php echo lang('navbar_print'); ?> <i class="fa fa-level-up"></i> </a></li>
                    <li>
                      <?php if ($t['user_id'] === $this->session->id OR $this->session->admin) : ?>
                        <a data-toggle="modal" data-target=".comment_option" data-id="<?php echo $t['id']; ?>"> <?php echo lang('navbar_manage'); ?> <i class="fa fa-level-up"></i></a>
                      <?php endif; ?>
                    </li>
                  </ul>
                </div>
              </div><hr>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="row">
        <div class="panel panel-success">
          <div class="panel-heading"><h3 class="panel-title"><?php echo lang('navbar_webboard_comment'); ?></h3></div>
          <div class="panel-body">
            <?php foreach ($comment as $_c => $c) : ?>
              <?php $picture = (file_exists('assets/images/user/'.$c['picture'])) ? $c['picture'] : 'default.jpg'; ?>
              <div class="media">
                <div class="media-left"> <?php echo img('assets/images/user/'.$picture,'',array('class'=>'media-object','style'=>'width:75px;height:75px;')); ?> </div>
                <div class="media-body">
                  <h4 class="media-heading">
                    <p class="lead"> <i class="fa fa-pencil"></i> : <?php echo $topic['title']; ?> </p>
                    <i class="fa fa-edit"></i> : <?php echo ($c['role'] === '1') ? '<strong class="mark">'.$c['username'].'</strong>' : '<u>'.$c['username'].'</u>' ?>
                    <i class="fa fa-clock-o"></i> : <u><?php echo $c['datetime']; ?></u>
                    <?php if ($c['modified'] !== '') : ?>
                      อัพเดทล่าสุด : <u><?php echo $c['modified']; ?></u>
                    <?php endif; ?>
                    <?php if ($this->session->admin) : ?>
                      <i class="fa fa-map-marker"></i> : <?php echo long2ip($c['ip_address']); ?>
                    <?php endif; ?>
                  </h4><br>
                  <?php if ($c['edited'] !== '') : ?>
                    <div class="well well-sm">
                      <p> <?php echo 'ข้อความที่ถูกแก้ไข'.nbs().parse_smileys($c['edited'],base_url().'smileys'); ?> </p>
                    </div>
                  <?php endif; ?>
                  <div class="well well-sm">
                    <?php $edited = ($c['edited'] !== '') ? 'อัพเดทล่าสุด' : ''; ?>
                    <p> <?php echo $edited.nbs().parse_smileys($c['comment'],base_url().'smileys'); ?> </p>
                  </div>
                  <ul class="list-inline pull-right">
                    <li>#<?php echo $c['sort']; ?></li>
                    <li><a onclick="window.print()">  <?php echo lang('navbar_print'); ?> <i class="fa fa-level-up"></i> </a></li>
                    <li>
                      <?php if ($c['user_id'] === $this->session->id OR $this->session->admin) : ?>
                        <a data-toggle="modal" data-target=".comment_option" data-id="<?php echo $c['id']; ?>"> <?php echo lang('navbar_manage'); ?> <i class="fa fa-level-up"></i></a>
                      <?php endif; ?>
                    </li>
                  </ul>
                </div>
              </div><hr>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="text-center hidden-print"> <?php echo $this->pagination->create_links(); ?> </div>
      </div>
      <div class="row">
        <?php if (in_array((int)$topic['status'],array('1','3','4','5'))) : ?>
          <div class="panel panel-success hidden-print">
            <div class="panel-heading"> <h4 class="panel-title"><?php echo lang('navbar_comment'); ?></h4> </div>
              <div class="panel-body">
                <?php if ($this->session->login) : ?>
                <?php echo form_open(uri_string(),array('class'=>'form-horizontal','data-toggle'=>'validator')); ?>
                <?php echo form_hidden(array('webboard_topic_id'=>$topic['id'],'user_id'=>$this->session->id)); ?>
                <div class="form-group">
                  <div class="col-sm-3"> <div class="pull-right"> <?php echo smiley_js(); ?> <?php echo $smiley_table; ?> </div> </div>
                  <div class="col-sm-9"> <?php echo form_textarea(array('name'=>'comment','id'=>'smiley','class'=>'form-control','required'=>TRUE)); ?> </div>
                </div>
                <div class="form-group"> <?php echo form_label($captcha['image'],'',array('class'=>'control-label text-right col-sm-3')); ?>
                  <div class="col-sm-3"> <?php echo form_input(array('name'=>'captcha','class'=>'form-control','placeholder'=>'0000','required'=>TRUE,'data-minlength'=>'4','maxlength'=>'4')); ?> <p class="help-block"><?php echo lang('form_captcha'); ?></p> </div>
                  <div class="col-sm-6 pull-right"> <?php echo form_button_submit(lang('form_button_submit')); ?> <?php echo form_button_reset(lang('form_button_reset')); ?> </div>
                </div>
                <?php echo form_close(); ?>
                <?php echo validation_errors('<div class="alert alert-info">','</div>');?>
                <?php else: ?>
                  <a href="<?php echo base_url('user/login'); ?>" class="btn btn-success"><?php echo lang('navbar_login'); ?></a>
                  หรือ
                  <a href="<?php echo base_url('user/register'); ?>" class="btn btn-primary"><?php echo lang('navbar_register'); ?></a>
                <?php endif; ?>
              </div>
            </div>
          <?php elseif ((int)$topic['status'] === '2'): ?>
            <p class="text-center alert alert-info"> ปิดการใช้งานแล้ว - ผู้ดูแลระบบ </p>
          <?php else : ?>
            <p class="text-center alert alert-info"> รออนุมัติ - ผู้ดูแลระบบ
              <?php if ($this->session->login && $this->session->admin) : ?>
                [ <a href="<?php echo base_url()."webboard/pin_topic/".$topic['id']."/1"; ?>" onclick="return confirm('ยืนยันการเปิดใช้งาน');"> คลิกเพื่อเปิดใช้งาน </a> ]
              <?php endif; ?>
            </p>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('partials/footer'); ?>
<div class="modal fade topic_option" tabindex="-1" role="dialog"> <div class="modal-dialog modal-sm"> </div> </div>
<div class="modal fade comment_option" tabindex="-1" role="dialog"> <div class="modal-dialog modal-sm"> </div> </div>
<script type="text/javascript">
$(document).ready(function() {
  $('.topic_option').on('shown.bs.modal',function(event) {
		var button = $(event.relatedTarget);
	  var id = button.data('id');
	  var modal = $(this);
	  modal.find('.modal-dialog').html(
			'<ul class="list-group">'+
  			<?php if ($this->session->admin) : ?>
  				'<li class="list-group-item"><a href="<?php echo base_url()."webboard/pin_topic/"; ?>'+id+'/3"> <i class="fa fa-thumb-tack"></i> ปักหมุด</a></li>'+
  				'<li class="list-group-item"><a href="<?php echo base_url()."webboard/pin_topic/"; ?>'+id+'/4"> <i class="fa fa-thumb-tack"></i> ปักหมุด (กฎ)</a></li>'+
  				'<li class="list-group-item"><a href="<?php echo base_url()."webboard/pin_topic/"; ?>'+id+'/5"> <i class="fa fa-thumb-tack"></i> ปักหมุด (ข่าว)</a></li>'+
          '<li class="list-group-item"><a href="<?php echo base_url()."webboard/pin_topic/"; ?>'+id+'/2" onclick="return confirm();"> <i class="fa fa-calendar-times-o"></i> ปิดใช้งาน</a></li>'+
  			<?php endif; ?>
  			'<li class="list-group-item"><a href="<?php echo base_url()."webboard/save_topic/"; ?>'+id+'"> <i class="fa fa-edit"></i> แก้ไข</a></li>'+
  			'<li class="list-group-item"><a href="<?php echo base_url()."webboard/remove_topic/"; ?>'+id+'" onclick="return confirm();"> <i class="fa fa-remove"></i> ลบ</a></li>'+
			'</ul>'
		);
	});
	$('.comment_option').on('shown.bs.modal',function(event) {
		var button = $(event.relatedTarget);
	  var id = button.data('id');
	  var modal = $(this);
	  modal.find('.modal-dialog').html(
			'<ul class="list-group">'+
      <?php if ($this->session->admin) : ?>
        '<li class="list-group-item"><a href="<?php echo base_url()."webboard/pin_comment/"; ?>'+id+'"> <i class="fa fa-thumb-tack"></i> ปักหมุด</a></li>'+
        '<li class="list-group-item"><a href="<?php echo base_url()."webboard/remove_comment/"; ?>'+id+'" onclick="return confirm();"> <i class="fa fa-remove"></i> ลบ</a></li>'+
      <?php endif; ?>
      '<li class="list-group-item"><a href="<?php echo base_url()."webboard/save_comment/"; ?>'+id+'"> <i class="fa fa-edit"></i> แก้ไข</a></li>'+
			'</ul>'
		);
	});
});
</script>
