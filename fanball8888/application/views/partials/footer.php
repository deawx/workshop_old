<?php echo script_tag('assets/js/jquery.min.js');?>
<?php echo script_tag('assets/js/bootstrap.min.js');?>
<?php echo script_tag('assets/js/bootstrap.validator.min.js');?>
<?php if (isset($js)) foreach($js as $j) echo $j; ?>
<?php echo script_tag('assets/js/common.js');?>

<script type="text/javascript">
$('#switch_theme').on('change',function(e){
  window.location.href = "<?php echo base_url('user/switch_theme'); ?>"+'/'+this.value;
});
</script>

<hr>
<footer>
  <div class="container" style=" text-align: center; font-size: 12px; line-height: 18px; margin-bottom: 20px; ">
  FANBALL88 เปิดให้บริการมายาวนานกว่า 10 ปี ด้วยทีมงานที่มากประสบการณ์ ตอบสนองลูกค้าได้อย่างแท้จริง<br>เราให้บริการด้วยความเป็นครอบครัว ซื่อตรง มั่นคง ปลอดภัย เรามีผลิตภัณฑ์ที่หลากหลาย บอล มวย หวย คาสิโน เกมส์ ครบถ้วน ลูกค้าจึงไว้วางใจให้เราดูแล<br>
  โปรโมชั่นเด็ด, กิจกรรมหลากหลาย, ตอบสนองทุกความต้องการ, รวดเร็ว, มั่นคง, ปลอดภัย
  <div class="">
    <a href="#">ความรับผิดชอบการเดิมพัน</a> | <a href="#">เงื่อนไขและข้อตกลง</a> | <a href="#">ปฏิเสธความรับผิดชอบ</a> | <a href="#">นโยบายความเป็นส่วนตัว</a> | <a href="#">ระเบียบข้อบังคับ</a> | <a href="#">แผนผังเว็บไซต์</a>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="pull-left">
        <p style="font-size: 12px; ">ผลบอลสด ข่าวฟุตบอลล่าสุด คลิปไฮไลท์ฟุตบอล ตารางแข่งขันบอลวันนี้ แทงบอลออนไลน์ แทงหวยออนไลน์ แทงมวยออนไลน์ คาสิโน คาสิโนออนไลน์ เกมส์สล็อต</p>
        <p style="font-size: 12px; ">หวย หวยไทย หวยหุ้น หุ้นไทย แทงมวย มวยไทย ราคามวย sbo sbobet ibc maxbet sbq m8bet betclic casino casino online slot lotto lotto57</p>
      </div>
      <div class="pull-right">
        <ul class="list-inline">
          <li><?php echo img('assets/images/facebook.png','',array('class'=>'img-responsive')); ?></li>
          <li><?php echo img('assets/images/line.png','',array('class'=>'img-responsive')); ?></li>
          <li><?php echo img('assets/images/skype.png','',array('class'=>'img-responsive')); ?></li>
        </ul>
      </div>
    </div><hr>
  </div>
</div>
</footer>

</body>
</html>
