<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('admin/partials/header'); ?>
<?php $this->load->view('admin/partials/navbar'); ?>
<div id="page-wrapper" >
  <div id="page-inner">
    <?php $this->load->view('partials/message'); ?>
    
  <div class="row">
    <div class="col-md-12">
      <legend>รายการแข่ง</legend>
    </div>
     <div class="col-md-12">
        <ul class="nav nav-tabs">
          <li><a href="<?php echo site_url('admin/match/match_wait'); ?>">รอการแข่งขัน <?php echo "<span class='text-danger'>[".$num_match_wait."]</span>"; ?></a> </li>
          <li><a href="<?php echo site_url('admin/match/match_end'); ?>">แข่งขันเสร็จ <?php echo "<span class='text-danger'>[".$num_match_end."]</span>"; ?></a></li>
          <li class="active"><a href="<?php echo site_url('admin/match'); ?>">สรุปการแข่งขัน</a>
          </li>
        </ul>
    </div>
    <div class="col-sm-12">
      <table class="table table-striped table-hover matchtable">
        <thead>
          <tr>
            <th rowspan="2" class="text-center">รหัสแมท</th>
            <th rowspan="2" class="text-center">วันที่และเวลา</th>
            <th rowspan="2" class="text-center">เหย้า</th>
            <th rowspan="2" class="text-center">สกอร์</th>
            <th rowspan="2" class="text-center">เยือน</th>
            <th colspan="3" class="text-center">อัตราต่อรอง</th>
            <th colspan="3" class="text-center">อัตราสูง/ต่ำ</th>
            <th rowspan="2" class="text-center">ดำเนินการ</th>
          </tr>
          <tr>
            <th class="text-center">ต่อรอง</th>
            <th class="text-center">ค่าน้ำเหย้า</th>
            <th class="text-center">ค่าน้ำเยือน</th>
            <th class="text-center">สูง/ต่ำ</th>
            <th class="text-center">ค่าน้ำสูง</th>
            <th class="text-center">ค่าน้ำต่ำ</th>
          </tr>
        </thead>
        <?php foreach ($match as $match_value) {?>
          <tr <?php if($match_value['status'] === 'problem'){echo "class='alert danger'";} ?>>
            <td class="text-center"><?php echo $match_value['id']; ?></td>
            <td class="text-center"><?php echo date("d/m/Y H:i",$match_value['time']); ?></td>
            <td class="text-center"><?php if($match_value['team'] === "home"){echo "<span class='text-danger'>".$match_value['home']."</span>";}else{echo $match_value['home'];}?></td>
            <td class="text-center">
               <?php echo $match_value['score_home']." - ".$match_value['score_away']; ?>

            </td>
            <td class="text-center"><?php if($match_value['team'] === "away"){echo "<span class='text-danger'>".$match_value['away']."</span>";}else{echo $match_value['away'];}?></td>
            <td class="text-center"><?php echo $match_value['hdp']; ?></td>
            <td class="text-center"><?php echo $match_value['hdp_home']; ?></td>
            <td class="text-center"><?php echo $match_value['hdp_away']; ?></td>
            <td class="text-center"><?php echo $match_value['ou']; ?></td>
            <td class="text-center"><?php echo $match_value['ou_over']; ?></td>
            <td class="text-center"><?php echo $match_value['ou_under']; ?></td>
            <td class="text-center">
            <?php if($match_value['status'] !== 'problem'): ?>
            <?php if ( ! $match_value['score_time']): ?>
              <?php echo anchor('admin/match?match=match&id='.$match_value['id'],'<span class="glyphicon glyphicon-pencil"></span>'); ?>&nbsp;&nbsp;
              <?php echo anchor('admin/match/delete_match/'.$match_value['id'],'<span class="glyphicon glyphicon-remove"></span>',array('onclick'=>"return confirm('You Confirm delete ?');")); ?>&nbsp;&nbsp;
              <?php echo anchor('admin/match/match_problem/'.$match_value['id'],'ปิด',array('onclick'=>"return confirm('You Confirm Match Problem ?');")); ?>
            <?php endif; ?>
            <?php else : echo "<span class='text-danger'>มีปัญหา</span>"; ?>
            <?php endif; ?>
            </td>
            <div class="modal fade" id="myModal<?php echo $match_value['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">กรอกสกอร์บอล</h4>
                  </div>
                  <form action="<?php echo site_url('admin/match/update_score'); ?>" method="post">
                    <div class="modal-body">
                      <input type="hidden" name="id" value="<?php echo $match_value['id']; ?>" />
                      <input type="hidden" name="team" value="<?php echo $match_value['team']; ?>" />
                      <input type="hidden" name="hdp" value="<?php echo $match_value['hdp']; ?>" />
                      <input type="hidden" name="ou" value="<?php echo $match_value['ou']; ?>" />
                      <?php echo $match_value['home']; ?>: <input type="text" name="score_home" value="<?php echo $match_value['score_home']; ?>">
                      <?php echo $match_value['away']; ?>: <input type="text" name="score_away" value="<?php echo $match_value['score_away']; ?>"><br>
                    </div>
                    <div class="modal-footer">
                      <input type="submit" class="btn btn-primary" value="เพิ่ม"/>
                      <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                    </div>
                  </form>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
          </tr>
          <?php } // end foreach ?>
        </table>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('admin/partials/footer'); ?>
<script type="text/javascript">
  $('.matchtable').dataTable({
    'pageLength' : 50,
    'order' : [[3,'asc'],[1,'asc']]
  });
  <?php if(isset($edit_match['id'])) { ?>
    $('#addpoint').modal('show');
  <?php } ?>
</script>
