<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header">  <h3 class="box-title"> </h3> </div>
      <div class="box-body">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>วันที่/เวลา</th>
              <th>ชื่อผู้ใช้</th>
              <th>คำอธิบายรายการ</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($logs as $key => $value) : ?>
              <tr>
                <td><?=date('d-m-Y H:i:s',$value['timestamp']);?></td>
                <td><?=$value['user_id']['email'];?></td>
                <td><?=$value['message'];?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <div class="box-footer clearfix"></div>
    </div>
  </div>
</div>
