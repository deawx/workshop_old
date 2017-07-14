<div class="row">
  <div class="col-md-12">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="<?php if ($view === 'fap') echo 'active'; ?>">
          <a href="<?php echo '?view=fap'; ?>">FAP</a>
        </li>
        <li class="<?php if ($view === 'hnpcc') echo 'active'; ?>">
          <a href="<?php echo '?view=hnpcc'; ?>">HNPCC</a>
        </li>
        <li class="<?php if ($view === 'pjsjps') echo 'active'; ?>">
          <a href="<?php echo '?view=pjsjps'; ?>">PJS/JPS</a>
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
                    <th>H.N./Department</th>
                    <th>Name/Sample's Name</th>
                    <th>Sample's Code</th>
                    <th>Process</th>
                    <th>Status</th>
                    <th>Remark</th>
                  </tr>
                </thead>
                ​<?php foreach ($samples as $key => $value) : ?>
                  <tbody>
                    <tr>
                      <td></td>
                    </tr>
                  </tbody>
                <?php endforeach; ?>
              <?php elseif ($view === 'hnpcc'): ?>
                <thead>
                  <tr>
                    <th>#</th>
                    <th>H.N./Department</th>
                    <th>Name/Sample's Name</th>
                    <th>Sample's Code</th>
                    <th>Sample's Type</th>
                    <th>Lab</th>
                    <th>Process</th>
                    <th>Status</th>
                    <th>Remark</th>
                  </tr>
                </thead>
                ​<?php foreach ($samples as $key => $value) : ?>
                  <tbody>
                    <tr>
                      <td></td>
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
