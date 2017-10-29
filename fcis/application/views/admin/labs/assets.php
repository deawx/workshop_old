<div class="row">
  <div class="col-md-12">
    <?php echo form_fieldset('เอกสารที่เกี่ยวข้อง'); ?>
    <?php if (isset($assets) && ! empty($assets)) : ?>
      <table class="table table-condensed table-hover">
        <thead>
          <tr>
            <th class="text-center">ชนิดไฟล์</th>
            <th class="text-center">ชื่อไฟล์</th>
            <th class="text-center">ขนาดไฟล์</th>
            <th class="text-center">วันที่อัพโหลด</th>
            <th class="text-center">อัพโหลดโดย</th>
            <th class="text-center"></th>
          </tr>
        </thead>
        <?php foreach ($assets as $key => $value) : ?>
          <tbody>
            <tr>
              <td class="text-center"> <?php echo $value['file_type']; ?></td>
              <td> <a href="<?php echo base_url('uploads/labs/'.$tab.'/'.$value['file_name']); ?>" target="_blank"><?php echo $value['client_name']; ?></a> </td>
              <td class="text-center"> <?php echo byte_format($value['file_size']); ?> </td>
              <td class="text-center"> <?php echo date('d/m/Y H:i:s',$value['upload_date']); ?> </td>
              <td class="text-center"> <?php echo $value['username']; ?> </td>
              <td class="text-center">
                <a href="<?php echo base_url('admin/labs/delete_file/'.$tab.'/'.$value['id'].'/'.$value['file_name']); ?>"
                  class="badge bg-red"
                  onclick="return confirm('confirm to delete?');">
                  ลบ
                </a>
              </td>
            </tr>
          </tbody>
        <?php endforeach; ?>
      </table>
    <?php else: ?>
      ว่างเปล่า
    <?php endif; ?>
    <?php echo form_fieldset_close(); ?>
  </div>
</div>
