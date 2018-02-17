<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('partials/header'); ?>
<nav class="navbar navbar-default" role="navigation">
  <div class="container">
    <a class="navbar-brand" href="#">FANBALL</a>
  </div>
</nav>
<div class="container">
  <div class="row">
    <div class="col-xs-3">
      <ul class="nav nav-pills nav-stacked" role="tablist">
        <li role="presentation" class="active"><a href="#about" aria-controls="about" role="tab" data-toggle="tab"><?php echo lang('navbar_about'); ?></a></li>
        <li role="presentation"><a href="#contact" aria-controls="contact" role="tab" data-toggle="tab"><?php echo lang('navbar_contact'); ?></a></li>
        <li role="presentation"><a href="#faq" aria-controls="faq" role="tab" data-toggle="tab"><?php echo lang('navbar_faq'); ?></a></li>
      </ul>
    </div>
    <div class="col-xs-9">
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="about">
          <?php
            $str = '
              Fanball88 เป็นเว็บชั้นนำในการให้บริการครบวงจร ผู้เล่นสามารถเลือกผลิตภัณฑ์ได้หลากหลายมีโปรโมชั่นให้เลือกมากมาย
              มีเกมการแข่งขันตอบคำถามประจำสัปดาห์ เงินรางวัลรวมมากกว่า 20,000บาทต่อสัปดาห์
              มีความน่าเชื่อถือ และเป็นที่ไว้วางใจให้กับผู้ใช้งานมานานกว่า 10 ปี
              ผลิตภัณฑ์ถูกคัดสรรมาโดยทีมงานมากกว่าความสามารถ มีทีมงานให้คำปรึกษาตลอด 24 ชั่วโมง
              ระบบการฝากถอนเงินมีความปลอดภัยสูง สามารถถอนหรือฝากได้ตลอด 24 ชั่วโมง
              สามารถฝากหรือถอนเงินได้โดยไม่ไม่กำหนดจำนวนเงินขั้นต่ำ มีระบบฝากถอนหลายช่องทางให้เลือก
              ไม่ว่าจะเป็นการฝากถอนผ่านระบบมือถือ การฝากถอนผ่านระบบโซเชียลเน็ตเวิร์ก และการฝากถอนผ่านเว็บ
              เมื่อประสบปัญหาสามารถติดต่อสอบถามทีมงานคุณภาพได้ตลอด 24 ชั่วโมง ทีมงานเราพร้อมให้คำปรึกษา
              ';
            echo auto_typography($str);
          ?>
        </div>
        <div role="tabpanel" class="tab-pane" id="contact">
          <?php
            $str2 = '
              Call Center : 085-2088886-7
              Line@ ID : fanball88
              Facebook : fanball888
              Skype : ffanza5, ffanza7
              ';
            echo auto_typography($str2);
          ?>
        </div>
        <div role="tabpanel" class="tab-pane" id="faq">
          <?php
            $str3 = '
              1. จะลงทะเบียนอย่างไร
              เลือกที่ปุ่ม "สมัครสมาชิก" กรอกข้อมูลที่ถูกต้อง เพื่อเป็นประโยชน์ต่อการจัดกิจกรรมและการแจกของรางวัล
              2. จะเข้าเล่นในเว็บผลิตภัณฑ์ได้อย่างไร
              2.1 ทำการโอนเงินแรกเข้า แล้ว เข้าสู่ระบบ เลือกเว็บที่ต้องการจะทำการเล่น เลือก"สมัครผลิตภัณฑ์" กรอกรายละเอียดการโอนเงินแรกเข้าให้ครบถ้วน กดปุ่ม "ยืนยันการสมัคร" รอไม่เกิน 5 นาที ทีมงานจะส่งUsername และ password ผ่านทาง SMS ผ่านมือถือ
              2.2 ทำการโอนเงินแรกเข้า แล้วทำการติดต่อกับพนักงานโดยตรง โดยเตรียมข้อมูลการโอนเงิน ชื่อบัญชีที่ใช้โอนเงิน รหัสบัญชีที่ใช้โอนเงิน จำนวนเงิน และวันเวลาที่โอน วางสาย รอสักครู่ให้พนักงานทำการตรวจสอบรายละเอียด ทีมงานจะทำงานส่ง username และ password ผ่านทาง SMS ผ่านทางมือถือ
              2. How to play on the web product.
              2.1 Transfer money first and then log into your web needs to be played. Choose "Register product" to complete the transfer of funds to complete the first press the "confirmation" wait no more than five minutes, the team Username and password will be sent via SMS through mobile phones.
              2.2 Transfer money first, then contact the employee directly by the preparation of transfer account names that use a money transfer using the account code, funds transfer, the amount and date and time of the transfer. Drop us a line Wait a few minutes to check the details. The team will send username and password work via SMS through mobile.
              3. จะฝากเงินเข้าในบัญชีอย่างไร
              3.1 แบบเข้าสู่ระบบ โดยการเข้าสู่ระบบผ่านเว็บไซต์ เลือก "ฝากเงินสด" กรอกข้อมูลให้ครบถ้วนตามจริง รอไม่เกิน 5 นาที สามารถเช็คเครดิตผ่านเว็บ Fanball88 ได้เลยครับ
              3.2 แบบไม่เข้าสู่ระบบ เลือกปุ่ม "ฝากเงินสด" กรอกชื่อผู้ใช้ รหัสโอนเงิน และข้อมูลการฝากเงินให้ครบถ้วนตามจริง และรอ 5 นาทีเพื่อให้พนักงานใส่เครดิต
              4. จะโอนเงินไปยังกระเป๋าเงินอื่นได้อย่างไร
              4.1 แบบเข้าสู่ระบบ เลือกปุ่ม "โยกเงิน" กรอกข้อมูลให้ครบถ้วนตามจริง รอไม่เกิน 10 นาที สามารถเช็คเครดิตผ่านเว็บ Fanball88 ได้เลย
              4.2 แบบไม่เข้าสู่ระบบ เลือกปุ่ม "โยกเงิน" กรอกชื่อ รหัสโอนเงิน และข้อมูลการฝากเงินให้ครบถ้วนตามจริง รอไม่เกิน 10 นาที
              5. จะถอนเงินออกจากบัญชีได้อย่างไร
              5.1 แบบเข้าสู่ระบบ เลือกปุ่ม "ถอนเงิน" กรอกข้อมูลให้ครบถ้วนตามจริง รอไม่เกิน 10 นาที สามารถเช็คเครดิตผ่านเว็บ Fanball88 ได้เลย
              5.2 แบบไม่เข้าสู่ระบบ เลือกปุ่ม "ถอนเงิน" กรอกชื่อผู้ใช้ รหัสโอนเงิน และข้อมูลการฝากเงินให้ครบถ้วนตามจริง รอไม่เกิน 10 นาที
              6. เปลี่ยนแปลงข้อมูลได้ที่ไหน
              เข้าสู่ระบบ เลือกปุ่ม "ข้อมูลสมาชิก" เลือก "เปลี่ยนแปลงข้อมูลสมาชิก" แก้ไขข้อมูลตามต้องการ และเลือก ยืนยันการเปลี่ยนแปลงข้อมูล
              ';
            echo auto_typography($str3);
          ?>
        </div>
      </div>
    </div>

  </div>
</div>
<?php $this->load->view('partials/footer'); ?>
