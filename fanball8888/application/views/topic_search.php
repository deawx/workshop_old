<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('partials/header'); ?>
<?php $this->load->view('partials/navbar'); ?>
<?php $this->load->view('partials/menubar'); ?>
<?php $this->load->view('partials/phpsdk'); ?>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="row">
        <h3><?php echo lang('navbar_search'); ?> </h3><hr>
        <?php echo form_open('webboard/view_search',array('method'=>'GET')); ?>
        <div class="input-group">
          <?php echo form_input(array('name'=>'search','class'=>'form-control','placeholder'=>lang('form_search'))); ?>
          <span class="input-group-btn">
            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
          </span>
        </div>
        <?php echo form_close(); ?>
      </div>
      <div class="row">
        <h3><?php echo lang('navbar_webboard_search'); ?> : "<small><?php echo $this->input->get('search'); ?></small>"</h3><hr>
        <table class='table table-striped table-hover' style="font-size:1em;">
          <thead>
            <tr class="alert alert-info">
              <th colspan="2" class="text-center">โดย</th>
              <th class="text-center">หัวข้อ</th>
              <th class="text-center">วันที่/เวลา</th>
              <th class="text-center">อ่าน/ตอบ</th>
              <th></th>
            </tr>
          </thead>
          <?php foreach ($topic as $_t => $t) : ?>
            <tbody>
              <tr style="height:3em;">
                <?php $image = ($t['status'] === '3')
                  ? 'assets/images/pinned.jpg'
                  : (($t['status'] === '4')
                  ? 'assets/images/rules.png'
                  : (($t['status'] === '5')
                  ? 'assets/images/posted.png'
                  : 'assets/images/user/'.$t['picture'])); ?>
                <td style="background-color:white;"><?php echo img($image,'',array('class'=>'img-responsive center-block','style'=>'width:50px;height:50px;')); ?></td>
                <td><?php echo $t['username']; ?></td>
                <td><?php echo anchor('webboard/view_topic/'.$t['id'],$t['title']); ?></td>
                <td><?php echo $t['datetime']; ?></td>
                <td><?php echo $t['views'].'/'.$t['comments']; ?></td>
                <td>
                  <?php if ($t['user_id'] === $this->session->id OR $this->session->admin) : ?>
                    <a data-toggle="modal" data-target=".option" data-id="<?php echo $t['id']; ?>"> <?php echo lang('navbar_manage'); ?> <i class="fa fa-level-up"></i></a>
                  <?php endif; ?>
                </td>
              </tr>
            </tbody>
          <?php endforeach; ?>
        </table>
        <div class="text-center"><?php echo $this->pagination->create_links(); ?></div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('partials/footer'); ?>
<div class="modal fade option" tabindex="-1" role="dialog"> <div class="modal-dialog modal-sm"> </div> </div>
<script type="text/javascript">
$(document).ready(function() {
  $('.option').on('shown.bs.modal',function(event) {
		var button = $(event.relatedTarget);
	  var id = button.data('id');
	  var modal = $(this);
	  modal.find('.modal-dialog').html(
			'<ul class="list-group">'+
  			<?php if ($this->session->admin) : ?>
  				'<li class="list-group-item"><a href="<?php echo base_url()."webboard/pin_topic/"; ?>'+id+'/3"> <i class="fa fa-thumb-tack"></i> ปักหมุด</a></li>'+
  				'<li class="list-group-item"><a href="<?php echo base_url()."webboard/pin_topic/"; ?>'+id+'/4"> <i class="fa fa-thumb-tack"></i> ปักหมุด (กฎ)</a></li>'+
  				'<li class="list-group-item"><a href="<?php echo base_url()."webboard/pin_topic/"; ?>'+id+'/5"> <i class="fa fa-thumb-tack"></i> ปักหมุด (ข่าว)</a></li>'+
  			<?php endif; ?>
  			'<li class="list-group-item"><a href="<?php echo base_url()."webboard/save_topic/"; ?>'+id+'"> <i class="fa fa-edit"></i> แก้ไข</a></li>'+
        '<li class="list-group-item"><a href="<?php echo base_url()."webboard/pin_topic/"; ?>'+id+'/2" onclick="return confirm();"> <i class="fa fa-calendar-times-o"></i> ปิดใช้งาน</a></li>'+
  			'<li class="list-group-item"><a href="<?php echo base_url()."webboard/remove_topic/"; ?>'+id+'" onclick="return confirm();"> <i class="fa fa-remove"></i> ลบ</a></li>'+
			'</ul>'
		);
	});
});
</script>
