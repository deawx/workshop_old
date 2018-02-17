<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('admin/partials/header'); ?>
<?php $this->load->view('admin/partials/navbar'); ?>
<div id="page-wrapper" >
  <div class="row"> <?php $this->load->view('partials/message'); ?> <?php echo validation_errors('<div class="alert alert-info">','</div>');?> </div>
  <div id="page-inner">
    <div class="row">
      <div class="col-sm-12">
        <legend> รายการหัวข้อเว็บบอร์ด </legend>
        <table class="table datatable">
          <caption class="h4">รายการ รออนุมัติ</caption>
          <thead> <tr> <th> ที่ </th> <th> วันที่และเวลา </th> <th> ประเภท </th> <th> ชื่อหัวข้อ </th> <th> โดย </th> <th> </th> <th> สถานะ</th> </tr> </thead>
          <tbody>
            <?php foreach ($latest as $_t=>$t) : ?>
              <tr>
                <td> <?php echo ++$_t; ?> </td>
                <td> <?php echo $t['datetime']; ?> </td>
                <td> <?php echo $t['name']; ?> </td>
                <td> <?php echo anchor_popup('webboard/view_topic/'.$t['id'],$t['title']); ?> </td>
                <td> <?php echo anchor_popup('admin/webboard/get_by_id/user/'.$t['user_id'],$t['fullname'],array('target'=>'_blank')); ?> </td>
                <td>
                  <div class="dropdown">
                    <button class="dropdown-toggle" type="button" id="option" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <span class="caret"></span> </button>
                    <ul class="dropdown-menu dropdown-menu-left" aria-labelledby="option">
                      <li><?php echo anchor('webboard/pin_topic/'.$t['id'].'/1','<i class="fa fa-check"></i> เปิดใช้งาน',array('onclick'=>"return confirm('ยืนยันการอนุมัติ ?');")); ?></li>
                      <li role="separator" class="divider"></li>
                      <li><?php echo anchor('webboard/remove_topic/'.$t['id'],'<i class="fa fa-remove"></i> ลบ',array('onclick'=>"return confirm('ยืนยันการลบ ?');")); ?></li>
                    </ul>
                  </div>
                </td>
                <td> <?php echo 'รออนุมัติ'; ?> </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <table class="table datatable">
          <caption class="h4">รายการ อนุมัติแล้ว</caption>
          <thead> <tr> <th> ที่ </th> <th> วันที่และเวลา </th> <th> ประเภท </th> <th> ชื่อหัวข้อ </th> <th> โดย </th> <th> </th> <th> สถานะ</th> </tr> </thead>
          <tbody>
            <?php
              foreach ($topics as $_t=>$t) :
              	$status = '';
              	switch ($t['status'])
              	{
              		case '0':
              		$status = 'รออนุมัติ';
              			break;
              		case '1':
              		$status = 'เปิดใช้งาน';
              			break;
              		case '2':
              		$status = 'ปิดใช้งาน';
              			break;
              		case '3':
              		$status = 'ปักหมุด';
              			break;
              		case '4':
              		$status = 'ปักหมุด(กฎ)';
              			break;
              		case '5':
              		$status = 'ปักหมุด(ข่าว)';
              			break;
              	}
              ?>
              <tr>
                <td> <?php echo ++$_t; ?> </td>
                <td> <?php echo $t['datetime']; ?> </td>
                <td> <?php echo $t['name']; ?> </td>
                <td> <?php echo anchor_popup('webboard/view_topic/'.$t['id'],$t['title']); ?> </td>
                <td> <?php echo anchor_popup('admin/webboard/get_by_id/user/'.$t['user_id'],$t['fullname'],array('target'=>'_blank')); ?> </td>
                <td>
                  <div class="dropdown">
                    <button class="dropdown-toggle" type="button" id="option" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <span class="caret"></span> </button>
                    <ul class="dropdown-menu dropdown-menu-left" aria-labelledby="option">
                      <li><?php echo anchor('webboard/pin_topic/'.$t['id'].'/3','<i class="fa fa-thumb-tack"></i> ปักหมุด'); ?></li>
                      <li><?php echo anchor('webboard/pin_topic/'.$t['id'].'/4','<i class="fa fa-thumb-tack"></i> ปักหมุด (กฎ)'); ?></li>
                      <li><?php echo anchor('webboard/pin_topic/'.$t['id'].'/5','<i class="fa fa-thumb-tack"></i> ปักหมุด (ข่าว)'); ?></li>
                      <li role="separator" class="divider"></li>
                      <li><?php echo anchor('webboard/pin_topic/'.$t['id'].'/2','<i class="fa fa-calendar-times-o"></i> ปิดใช้งาน',array('onclick'=>"return confirm('ยืนยันการลบ ?');")); ?></li>
                      <li><?php echo anchor('webboard/remove_topic/'.$t['id'],'<i class="fa fa-remove"></i> ลบ',array('onclick'=>"return confirm('ยืนยันการลบ ?');")); ?></li>
                    </ul>
                  </div>
                </td>
                <td> <?php echo $status; ?> </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('admin/partials/footer'); ?>
