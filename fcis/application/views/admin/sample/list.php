<div class="row">
  <div class="col-md-12"> <?php echo $this->session->flashdata('message'); ?> </div>
  <div class="col-md-12">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="<?php if ($view === 'fap') echo 'active'; ?>">
          <a href="<?php echo '?view=fap'; ?>">รายงานผล FAP</a>
        </li>
        <li class="<?php if ($view === 'hnpcc') echo 'active'; ?>">
          <a href="<?php echo '?view=hnpcc'; ?>">รายงานผล HNPCC</a>
        </li>
        <li class="<?php if ($view === 'pjsjps') echo 'active'; ?>">
          <a href="<?php echo '?view=pjsjps'; ?>">รายงานผล PJS/JPS</a>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active">
          <table class="table table-condensed table-hover">
            ​<?php // if ( ! empty($samples)) : ?>
              ​<?php if ($view === 'fap' OR $view === 'pjsjps') : ?>
                <thead>
                  <tr>
                    <th>#</th>
                    <th>H.N./หน่วยงาน</th>
                    <th>ชื่อ-นามสกุล/ชื่อของตัวอย่าง</th>
                    <th>โค้ดของตัวอย่าง</th>
                    <th>กระบวนการ</th>
                    <th>สถานะ</th>
                    <th></th>
                  </tr>
                </thead>
                ​<?php foreach ($samples as $key => $value) :
                  $patient = array();
                  if ( ! $value['department']) :
                    $patient = $this->db->where('id',$value['patient_id'])->get('patients')->row_array();
                  endif; ?>
                  <tbody>
                    <tr>
                      <td><?php echo ++$key; ?></td>
                      <td><?php echo ($value['department'] !== '') ? $value['department'] : $patient['hn']; ?></td>
                      <td><?php echo ($value['sample_name'] !== '') ? $value['sample_name'] : $patient['title'].nbs().$patient['firstname'].nbs().$patient['lastname']; ?></td>
                      <td><?php echo $value['fresh_tissue_code']; ?></td>
                      <td><?php echo $value['process']; ?></td>
                      <td><?php echo $value['status']; ?></td>
                      <td>
                        <?php $uri = ($value['department'] !== '') ? 'add_outpatient' : 'add_inpatient';
                        echo anchor('admin/sample/'.$uri.'/'.$value['id'],'แก้ไข',array('class'=>'badge bg-red')); ?>
                      </td>
                    </tr>
                  </tbody>
                <?php endforeach; ?>
              <?php elseif ($view === 'hnpcc'): ?>
                <thead>
                  <tr>
                    <th>#</th>
                    <th>H.N./หน่วยงาน</th>
                    <th>ชื่อ-นามสกุล/ชื่อของตัวอย่าง</th>
                    <th>โค้ดของตัวอย่าง</th>
                    <th>ชนิดของตัวอย่าง</th>
                    <th>ห้องปฏิบัติการ</th>
                    <th>กระบวนการ</th>
                    <th>สถานะ</th>
                    <th></th>
                  </tr>
                </thead>
                ​<?php foreach ($samples as $key => $value) :
                  $patient = array();
                  if ( ! $value['department']) :
                    $patient = $this->db->where('id',$value['patient_id'])->get('patients')->row_array();
                  endif; ?>
                  <tbody>
                    <tr>
                      <td><?php echo ++$key; ?></td>
                      <td><?php echo ($value['department'] !== '') ? $value['department'] : $patient['hn']; ?></td>
                      <td><?php echo ($value['sample_name'] !== '') ? $value['sample_name'] : $patient['title'].nbs().$patient['firstname'].nbs().$patient['lastname']; ?></td>
                      <td><?php echo $value['fresh_tissue_code']; ?></td>
                      <td><?php echo $value['fresh_tissue_group']; ?></td>
                      <td><?php echo $value['lab']; ?></td>
                      <td><?php echo $value['process']; ?></td>
                      <td><?php echo $value['status']; ?></td>
                      <td>
                        <?php $uri = ($value['department'] !== '') ? 'add_outpatient' : 'add_inpatient';
                        echo anchor('admin/sample/'.$uri.'/'.$value['id'],'แก้ไข',array('class'=>'badge bg-red')); ?>
                      </td>
                    </tr>
                  </tbody>
                <?php endforeach; ?>
              <?php endif; ?>
            <?php // endif; ?>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-12">
  </div>
</div>

<?php echo link_tag('assets/admin/plugins/datatables/datatables.min.css'); ?>
<?php echo script_tag('assets/admin/plugins/datatables/datatables.min.js'); ?>
<script type="text/javascript">
$(document).ready(function() {
  $("table").dataTable();
});
</script>
