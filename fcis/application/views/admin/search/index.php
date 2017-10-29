<?php
$uri_get = $this->input->get();
unset($uri_get['order_by']);
$uri_get = http_build_query($uri_get);
$uri_string = uri_string().'?'.$uri_get;
$order_by = $this->input->get('order_by');
?>
<div class="row">
  <!-- <div class="col-md-12">
    <?//=anchor('admin/search/export','ส่งออกข้อมูล',array('target'=>'_blank','class'=>'btn btn-default'));?>
    <hr>
  </div> -->
  <div class="col-md-12">
    <div class="box box-success">
      <div class="box-header"> <!-- <h3 class="box-title">Search for Patients</h3> --> </div>
      <div class="box-body">
        <?php if ($this->input->get('mode') === NULL OR $this->input->get('mode') === 'list') : ?>
          <table class="table table-condensed table-bordered table-hover datatable">
            <thead>
              <tr>
                <th>#</th>
                <th>ประเภท</th>
                <th>กลุ่ม</th>
                <th>เลขบัตรประชาชน</th>
                <th>ชื่อ-นามสกุล</th>
                <th>วันที่บันทึก</th>
                <th>วันที่อัพเดท</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($patients as $key => $value)  : ?>
                <tr>
                  <td><?php echo ++$key; ?></td>
                  <td><?php echo $value['types']; ?></td>
                  <td><?php echo $value['groups']; ?></td>
                  <td><?php echo $value['id_card']; ?></td>
                  <td><?php echo $value['title'].nbs().$value['firstname'].nbs().$value['lastname']; ?></td>
                  <td><?php echo ($value['created']) ? date('d-m-Y H:i:s',$value['created']) : 'N/A'; ?></td>
                  <td><?php echo ($value['updated']) ? date('d-m-Y H:i:s',$value['updated']) : 'N/A'; ?></td>
                  <td>
                    <?php
                    echo anchor('admin/search?id='.$value['id'],'ดู',array('class'=>'badge bg-green')).nbs();
                    if (any_in_array(array('special','admin','editor'),$current_groups)) :
                      echo anchor('admin/patients/edit/'.$value['id'],'แก้ไข',array('class'=>'badge bg-info'));
                    endif;
                    ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        <?php else : ?>
        <?php endif; ?>
      </div>
      <div class="box-footer clearfix"> </div>
    </div>
  </div>
</div>

<?php echo link_tag('assets/admin/plugins/datatables/datatables.min.css'); ?>
<?php echo script_tag('assets/admin/plugins/datatables/datatables.min.js'); ?>
<script type="text/javascript">
$(document).ready(function() {
  $("table").dataTable({
    language: {
      aria: { sortAscending: ": activate to sort column ascending", sortDescending: ": activate to sort column descending" }
      , emptyTable:"No data available in table"
      , info:"Showing _START_ to _END_ of _TOTAL_ entries"
      , infoEmpty:"ว่างเปล่า"
      , infoFiltered:"(filtered1 from _MAX_ total entries)"
      , lengthMenu:"_MENU_ entries"
      , search:"Search:"
      , zeroRecords:"No matching records found"
    } , buttons:[
      {
        extend: "print", className: "btn default"
      } , {
        extend: "copy", className: "btn default"
      } , {
        extend: "pdf", className: "btn default"
      } , {
        extend: "excel", className: "btn default"
      } , {
        extend: "csv", className: "btn default"
      } , {
        extend: "colvis", className: "btn default"
      } , {
        text:"Reload", className:"btn default", action:function(e, t, a, n){ alert("Custom Button") }
      }] , lengthMenu:[
        [25, 100, 250, 500, -1],
        [25, 100, 250, 500, "All"]
      ] , dom:"<'row' <'col-md-12'>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>"
    }
  );
});
</script>
