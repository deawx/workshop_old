​<?=form_open(uri_string(),array('novalidate'=>TRUE),$hidden);?>
<?=form_fieldset($head);?><br/>
<?php
$v1_1 = isset($vaccine['v1_1']) ? $vaccine['v1_1'] : '';
$l1 = isset($vaccine['l1']) ? $vaccine['l1'] : '';

$v2_1 = isset($vaccine['v2_1']) ? $vaccine['v2_1'] : '';
$v2_2 = isset($vaccine['v2_2']) ? $vaccine['v2_2'] : '';
$l2 = isset($vaccine['l2']) ? $vaccine['l2'] : '';

$v3_1 = isset($vaccine['v3_1']) ? $vaccine['v3_1'] : '';
$v3_2 = isset($vaccine['v3_2']) ? $vaccine['v3_2'] : '';
$v3_3 = isset($vaccine['v3_3']) ? $vaccine['v3_3'] : '';
$l3 = isset($vaccine['l3']) ? $vaccine['l3'] : '';

$v4_1 = isset($vaccine['v4_1']) ? $vaccine['v4_1'] : '';
$v4_2 = isset($vaccine['v4_2']) ? $vaccine['v4_2'] : '';
$l4 = isset($vaccine['l4']) ? $vaccine['l4'] : '';

$v5_1 = isset($vaccine['v5_1']) ? $vaccine['v5_1'] : '';
$v5_2 = isset($vaccine['v5_2']) ? $vaccine['v5_2'] : '';
$l5 = isset($vaccine['l5']) ? $vaccine['l5'] : '';

$v6_1 = isset($vaccine['v6_1']) ? $vaccine['v6_1'] : '';
$v6_2 = isset($vaccine['v6_2']) ? $vaccine['v6_2'] : '';
$v6_3 = isset($vaccine['v6_3']) ? $vaccine['v6_3'] : '';
$l6 = isset($vaccine['l6']) ? $vaccine['l6'] : '';

$v7_1 = isset($vaccine['v7_1']) ? $vaccine['v7_1'] : '';
$l7 = isset($vaccine['l7']) ? $vaccine['l7'] : '';
?>
<table class="table table-bordered table-hover">
  <thead>
    <tr> <th class="text-center">วัคซีน</th> <th class="text-center">อายุที่ควรได้รับ</th> <th class="text-center">วัน เดือน  ปี</th><th class="text-center">สถานที่ได้รับวัคซีน</th> </tr>
  </thead>
  <tbody>
    <tr>
      <td>ฉีดวัคซีนป้องกันวัณโรค (BCG)</td>
      <td>แรกเกิด</td>
      <td><?=form_input(array('name'=>'v1_1','class'=>'form-control datepicker','placeholder'=>'ครั้งที่หนึ่ง'),set_value('v1_1',$v1_1));?></td>
      <td>
        <?=form_dropdown(['name'=>'l1','class'=>'form-control'],$locale,set_value('l1',$l1));?>
      </td>
    </tr>
    <tr>
      <td>ฉีดวัคซีนป้องกันโรคตับอักเสบบี (HB)</td>
      <td>
        แรกเกิด<br/>
        1 เดือน
      </td>
      <td>
        <?=form_input(array('name'=>'v2_1','class'=>'form-control datepicker','placeholder'=>'ครั้งที่หนึ่ง'),set_value('v2_1',$v2_1));?>
        <?=form_input(array('name'=>'v2_2','class'=>'form-control datepicker','placeholder'=>'ครั้งที่สอง'),set_value('v2_2',$v2_2));?>
      </td>
      <td>
        <?=form_dropdown(['name'=>'l2','class'=>'form-control'],$locale,set_value('l2',$l2));?>
      </td>
    </tr>
    <tr>
      <td>
        กินวัคซีนป้องกันโรคโปลิโอ (OPV)<br/>
        ฉีดวัคซีนรวมป้องกันโรคคอตีบ <br/>
        บาดทะยัก ไอกรน ตับอักเสบบี (DTP-HB)
      </td>
      <td>
        2 เดือน<br/>
        4 เดือน<br/>
        6 เดือน
      </td>
      <td>
        <?=form_input(array('name'=>'v3_1','class'=>'form-control datepicker','placeholder'=>'ครั้งที่หนึ่ง'),set_value('v3_1',$v3_1));?>
        <?=form_input(array('name'=>'v3_2','class'=>'form-control datepicker','placeholder'=>'ครั้งที่สอง'),set_value('v3_2',$v3_2));?>
        <?=form_input(array('name'=>'v3_3','class'=>'form-control datepicker','placeholder'=>'ครั้งที่สาม'),set_value('v3_3',$v3_3));?>
      </td>
      <td>
        <?=form_dropdown(['name'=>'l3','class'=>'form-control'],$locale,set_value('l3',$l3));?>
      </td>
    </tr>
    <tr>
      <td>
        ฉีดวัคซีนป้องกันโรคหัด คางทูม<br/>
        หัดเยอรมัน (MMR)
      </td>
      <td>
        9 เดือน<br>
        7 ปี (ชั้น ป.1)
      </td>
      <td>
        <?=form_input(array('name'=>'v4_1','class'=>'form-control datepicker','placeholder'=>'ครั้งที่หนึ่ง'),set_value('v4_1',$v4_1));?>
        <?=form_input(array('name'=>'v4_2','class'=>'form-control datepicker','placeholder'=>'ครั้งที่สอง'),set_value('v4_2',$v4_2));?>
      </td>
      <td>
        <?=form_dropdown(['name'=>'l4','class'=>'form-control'],$locale,set_value('l4',$l4));?>
      </td>
    </tr>
    <tr>
      <td>
        กินวัคซีนป้องกันโรคโปลิโอ (OPV)<br/>
        ฉีดวัคซีนรวมป้องกันโรคคอตีบ<br>
        บาดทะยัก ไอกรน (DTP)
      </td>
      <td>
        1 ปีครึ่ง<br>
        4 ปีครึ่ง
      </td>
      <td>
        <?=form_input(array('name'=>'v5_1','class'=>'form-control datepicker','placeholder'=>'ครั้งที่หนึ่ง'),set_value('v5_1',$v5_1));?>
        <?=form_input(array('name'=>'v5_2','class'=>'form-control datepicker','placeholder'=>'ครั้งที่สอง'),set_value('v5_2',$v5_2));?>
      </td>
      <td>
        <?=form_dropdown(['name'=>'l5','class'=>'form-control'],$locale,set_value('l5',$l5));?>
      </td>
    </tr>
    <tr>
      <td>
        ฉีดวัคซีนป้องกันโรคไข้สมองอักเสบ (JE)
      </td>
      <td>
        1 ปีครึ่ง<br/>
        <small>(ฉีด 2 เข็ม ห่างกัน 1 เดือน)</small><br>
        2 ปีครึ่ง
      </td>
      <td>
        <?=form_input(array('name'=>'v6_1','class'=>'form-control datepicker','placeholder'=>'ครั้งที่หนึ่ง'),set_value('v6_1',$v6_1));?>
        <?=form_input(array('name'=>'v6_2','class'=>'form-control datepicker','placeholder'=>'ครั้งที่สอง'),set_value('v6_2',$v6_2));?>
        <?=form_input(array('name'=>'v6_3','class'=>'form-control datepicker','placeholder'=>'ครั้งที่สาม'),set_value('v6_3',$v6_3));?>
      </td>
      <td>
        <?=form_dropdown(['name'=>'l6','class'=>'form-control'],$locale,set_value('l6',$l6));?>
      </td>
    </tr>
    <tr>
      <td>
        ฉีดวัคซีนป้องกันโรคคอตีบ<br>
        บาดทะยัก (dT)
      </td>
      <td>
        12 ปีครึ่ง (ชั้น ป.6)
      </td>
      <td>
        <?=form_input(array('name'=>'v7_1','class'=>'form-control datepicker','placeholder'=>'ครั้งที่หนึ่ง'),set_value('v7_1',$v7_1));?>
      </td>
      <td>
        <?=form_dropdown(['name'=>'l7','class'=>'form-control'],$locale,set_value('l7',$l7));?>
      </td>
    </tr>
  </tbody>
</table>
<?=form_fieldset_close();?>
<?=form_submit('','submit',array('class'=>'btn btn-success'));?>
<?=form_reset('','reset',array('class'=>'btn btn-warning'));?>
<?=form_close();?>
