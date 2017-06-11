<table width="100%">
  <tr>
    <td>
      <p align="center">หนังสือรับรองการเกิด</p>
      <p align="center">สถานที่ออกหนังสือรับรอง ก. ชื่อสถานพยาบาล <?=$organize->name;?></p>
      <p align="center">ข. ที่อยู่ <?=($organize->address !== '') ? $organize->address : '...............';?></p>
      <p align="right">วันที่ <?=date('d/m/Y');?></p>
      <br />
      <table width="100%" border="1">
        <tr>
          <td>1. เด็กที่เกิด</td>
          <td colspan="2">
            <table border="1">
              <tr>
                <td width="40%">1.1 ชื่อตัว <?=$child->name;?> ชื่อสกุล <?=$child->surname;?> <br /> เลขประจำตัวประชาชน <?=$child->card;?> </td>
                <td width="30%">1.2 เพศ <?=$child->gender;?></td>
                <td width="30%">1.3 สัญชาติ <?=$child->religion;?></td>
              </tr>
              <tr>
                <td>1.4 เกิดเมื่อวันที่ <?=explode('/',$child->birthdate)[0];?> เดือน <?=explode('/',$child->birthdate)[1];?> พ.ศ. <?=explode('/',$child->birthdate)[2];?> <br /> ณ สถานพยาบาล <?=$organize->name;?> </td>
                <td> เวลา ....... ณ .......... </td>
                <td>ตรงกับวัน ขึ้น ค่ำ / แรม ค่ำ</td>
              </tr>
              <tr>
                <td> 1.5 ชื่อสถานที่ที่เกิด <?=$organize->name;?> </td>
                <td colspan="2"> ที่อยู่สถานที่เกิด <?=$organize->name;?> </td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td>2. สถานภาพของครอบครัว</td>
          <td colspan="2">
            <table border="1">
              <tr>
                <td>บิดา</td>
                <td>2.1
                  <label>ชื่อ-สกุล <?=$mother->ft_name.nbs(3).$mother->ft_surname;?>
                    <br />
                    <br /> เลขประจำตัวประชาชน <?=$mother->ft_card;?>
                  </label>
                </td>
                <td>มารดา</td>
                <td>2.2
                  <label>ชื่อ-สกุล <?=$mother->name.nbs(3).$mother->surname;?>
                    <br />
                    <br />
                    เลขประจำตัวประชาชน <?=$mother->card;?>
                  </label>
                </td>
              </tr>
              <tr>
                <td>บุตร</td>
                <td>2.3 เป็นบุตรลำดับที่</td>
                <td colspan="2">
                  2.4 จำนวนบุตรทั้งหมดมี 2 คน
                </td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td>3. ผู้ทำคลอด</td>
          <td colspan="2">
            <table border="1">
              <tr>
                <td>3.1 เป็น</td>
                <td>พยาบาล</td>
              </tr>
              <tr>
                <td colspan="4">ชื่อ-สกุล <?=$staff->name.nbs(3).$staff->surname;?></td>
                <td colspan="4">ที่อยู่ </td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td>4.เด็กที่เกิด</td>
          <td colspan="2">
            <table border="1">
              <tr>
                <td>4.1 เกิดเดี่ยว</td>
                <td>4.2 เกิดแฝด</td>
                <td>4.3 เกิดแฝดลำดับที่</td>
              </tr>
              <tr>
                <td colspan="2">4.4 อยู่ในครรภ์นาน 12 เดือน</td>
                <td>4.5 น้ำหนักเด็ก <?=$child->weight;?> กรัม </td>
              </tr>
              <tr>
                <td colspan="2">4.6 บาดเจ็บเนื่องจากการคลอด ไม่มี</td>
                <td>4.7 ร่างกายวิปริตมาแต่กำเนิด ไม่มี</td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td>5.การเจ็บป่วยของมารดา</td>
          <td colspan="2">
            <table border="1">
              <tr>
                <td>5.1 เจ็บป่วยเนื่องจากการตั้งครรภ์ ไม่มี</td>
                <td>5.2 เจ็บป่วยไม่เกี่ยวกับการตั้งครรภ์ ไม่มี</td>
              </tr>
              <tr>
                <td>5.3 เจ็บป่วยเนื่องจากการคลอด ไม่มี </td>
                <td>5.4 ทำคลอดโดยวิธีพิเศษ ไม่มี </td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>
            ลงชื่อ <?=$staff->name.nbs(3).$staff->surname;?> ผู้ทำคลอด
            <br/>
            ลงชื่อ 34 นายทะเบียน
          </td>
          <td>
            ลงชื่อ 35 ผู้ออกหนังสือรับรอง
            <br/>
            ลงชื่อ 36 เจ้าหน้าที่มอบหมาย
            <br/>
            ลงชื่อ 37 ผู้รับมอบอำนาจ
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
