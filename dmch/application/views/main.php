<style>
.featurette-divider {
  margin: 80px 0; /* Space out the Bootstrap <hr> more */
}
.featurette_ch {
  padding-top: 180px; /* Vertically center images part 1: add padding above and below text. */
  overflow: hidden; /* Vertically center images part 2: clear their floats. */
}
.featurette {
  padding-top: 120px; /* Vertically center images part 1: add padding above and below text. */
  overflow: hidden; /* Vertically center images part 2: clear their floats. */
}
.featurette-image {
  margin-top: -120px; /* Vertically center images part 3: negative margin up the image the same amount of the padding to center it. */
}
.featurette-image.pull-left {
  margin-right: 40px;
}
.featurette-image.pull-right {
  margin-left: 40px;
}
.featurette-heading {
  font-size: 50px;
  font-weight: 300;
  line-height: 1;
  letter-spacing: -1px;
}
@media (max-width: 979px) {
.featurette_ch {
    height: auto;
  padding: 0;
}
.featurette {
    height: auto;
  padding: 0;
}
  .featurette-image.pull-left,
  .featurette-image.pull-right {
    display: block;
    float: none;
    max-width: 40%;
    margin: 0 auto 20px;
  }
}
@media (max-width: 767px) {
  .marketing .span4 + .span4 {
    margin-top: 40px;
  }
  .featurette-heading {
    font-size: 30px;
  }
  .featurette .lead {
    font-size: 18px;
    line-height: 1.5;
  }
}
</style>
<!-- body -->
<div class="container marketing">
    <div class="featurette_ch">
      <img class="featurette-image pull-right" src="<?=base_url('assets/images/dmch.png');?>">
      <h2 class="featurette-heading">ระบบบันทึกข้อมูลแม่และเด็ก <span class="muted">สำหรับสถานพยาบาล</span></h2>
      <p class="lead">เป็นระบบบันทึกและติดตามสุขภาพของคุณแม่ตั้งครรภ์  คุณแม่หลังคลอด และทารกแรกเกิด จนถึง 6 ปี โดยระบบถูกออกแบบมาใช้สำหรับสถานพยาบาลและคุณแม่</p>
    </div>
    <hr class="featurette-divider">
    <div class="featurette">
      <img class="featurette-image pull-left" src="<?=base_url('assets/images/doctor.png');?>">
      <h2 class="featurette-heading">เจ้าหน้าที่ <span class="muted">สถานพยาบาล</span></h2>
      <p class="lead">เป็นผู้ใช้ที่สามารถจัดการข้อมูลสุขภาพของคุณแม่และเด็ก และจัดการข้อมูลต่าง ๆ ในระบบ</p>
    </div>
    <hr class="featurette-divider">
    <div class="featurette">
      <img class="featurette-image pull-right" src="<?=base_url('assets/images/mother.png');?>">
      <h2 class="featurette-heading">คุณแม่ <span class="muted">ตั้งครรภ์</span></h2>
      <p class="lead">เป็นผู้ใช้ที่สามารถดูข้อมุลสุขภาพของตนเองและดูแลสุขภาพของลูกได้</p>
    </div>
</div>
