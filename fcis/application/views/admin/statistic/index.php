<div class="row">

  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-green">
      <div class="inner"> <h3><?=count($patients);?></h3> <p>ข้อมูลผู้ป่วยทั้งหมด</p> </div>
      <div class="icon"> <i class="fa fa-users"></i> </div>
    </div>
  </div>
  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-aqua">
      <div class="inner"> <h3><?=count($labs);?></h3> <p>ข้อมูลส่งตรวจตัวอย่างทั้งหมด</p> </div>
      <div class="icon"> <i class="fa fa-copy"></i> </div>
    </div>
  </div>
  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-red">
      <div class="inner"> <h3><?=count($samples);?></h3> <p>ข้อมูลห้องปฏิบัติการทั้งหมด</p> </div>
      <div class="icon"> <i class="fa fa-stethoscope"></i> </div>
    </div>
  </div>
  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-yellow">
      <div class="inner"> <h3><?=count($clinics);?></h3> <p>ข้อมูลทางคลีนิคทั้งหมด</p> </div>
      <div class="icon"> <i class="fa fa-hospital-o"></i> </div>
    </div>
  </div>

</div>

<div class="row">
  <div class="col-md-6">
    <div class="box">
      <div class="box-header with-border"> <h3 class="box-title">ข้อมูลผู้ป่วยจำแนกตามอายุ</h3> </div>
      <div class="box-body">
        <canvas id="dts_age"></canvas>
      </div>
      <div class="box-footer">
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="box">
      <div class="box-header with-border"> <h3 class="box-title">ข้อมูลผู้ป่วยจำแนกตามเพศ</h3> </div>
      <div class="box-body">
        <canvas id="dts_sex"></canvas>
      </div>
      <div class="box-footer">
      </div>
    </div>
  </div>
</div>

<?php
$age = array_count_values(array_column($patients,'age'));
$title = array_count_values(array_column($patients,'title'));
?>

<?=script_tag('assets/admin/plugins/chart/chart.min.js');?>
<script type="text/javascript">
$(function(){

  // var pts = $('#pts');
  // var dts_pts = [];
  // pts.on('change',function(){
  //   $.post('admin/statistic/dts_pts/'+this.value,function(d) {
  //   });
  // });

  var dts_age = document.getElementById("dts_age");
  var dts_age_chart = new Chart(dts_age, {
    type: 'bar',
    data: {
      labels: <?=json_encode(array_keys($age));?>,
      datasets: [{
        label: '# จำแนกตามอายุ',
        data: <?=json_encode(array_values($age));?>,
        backgroundColor: [ 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)' ],
        borderColor: [ 'rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)' ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero:true
          }
        }]
      }
    }
  });

  var dts_sex = document.getElementById("dts_sex");
  var dts_sex_chart = new Chart(dts_sex, {
    type: 'bar',
    data: {
      labels: <?=json_encode(array_keys($title));?>,
      datasets: [{
        label: '# จำแนกตามเพศ',
        data: <?=json_encode(array_values($title));?>,
        backgroundColor: [ 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)' ],
        borderColor: [ 'rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)' ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero:true
          }
        }]
      }
    }
  });

});
</script>
