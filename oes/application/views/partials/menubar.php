<ul class="list-group">
  <li class="list-group-item"><a href="<?php echo base_url(); ?>">หน้าหลัก</a></li>
</ul>
<ul class="list-group">
  <li class="list-group-item"><a href="<?php echo base_url('admin/module'); ?>">จุดประสงค์รายวิชา</a></li>
  <li class="list-group-item"><a href="<?php echo base_url('admin/course'); ?>">เนื้อหาบทเรียน</a></li>
  <li class="list-group-item"><a href="<?php echo base_url('admin/exam'); ?>">ข้อสอบ</a>
    <?php if (in_array('exam',$this->uri->segment_array())) : ?>
      <ul class="">
        <?php foreach ($topic as $s) : ?>
          <li style="<?php echo ($this->uri->segment(3) == $s['id']) ? 'text-decoration:underline;' : '' ; ?>">
            <a href="<?php echo base_url('admin/exam/'.$s['id']); ?>"><?php echo $s['title']; ?></a>
          </li>
        <?php endforeach ?>
      </ul>
    <?php endif; ?>
  </li>
  <li class="list-group-item"><a href="<?php echo base_url('admin/user'); ?>">รายชื่อผู้ใช้</a></li>
</ul>
