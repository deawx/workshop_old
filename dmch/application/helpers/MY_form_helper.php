<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('form_number'))
{
	function form_number($data = '', $value = '', $extra = '')
	{
		$defaults = array(
			'type' => 'number',
			'name' => is_array($data) ? '' : $data,
			'value' => $value
		);
		return '<input '._parse_form_attributes($data, $defaults)._attributes_to_string($extra)." />\n";
	}
}

if ( ! function_exists('form_email'))
{
	function form_email($data = '', $value = '', $extra = '')
	{
		$defaults = array(
			'type' => 'email',
			'name' => is_array($data) ? '' : $data,
			'value' => $value
		);
		return '<input '._parse_form_attributes($data, $defaults)._attributes_to_string($extra)." />\n";
	}
}

if ( ! function_exists('form_url'))
{
	function form_url($data = '', $value = '', $extra = '')
	{
		$defaults = array(
			'type' => 'url',
			'name' => is_array($data) ? '' : $data,
			'value' => $value
		);
		return '<input '._parse_form_attributes($data, $defaults)._attributes_to_string($extra)." />\n";
	}
}

if ( ! function_exists('dropdown_date'))
{
  function dropdown_date($date='')
  {
    switch ($date) :
      case 'day':
        $i = 1;
        $date = array();
        while ($i < 32) :
          $date[$i] = $i;
          $i++;
        endwhile;
      break;
      case 'month':
        $date = array(
          '1' => lang('cal_january'),
          '2' => 'February',
          '3' => 'March',
          '4' => 'April',
          '5' => 'May',
          '6' => 'June',
          '7' => 'July',
          '8' => 'August',
          '9' => 'September',
          '10' => 'October',
          '11' => 'November',
          '12' => 'December'
        );
      break;
      default:
        $i = 1;
        $year = date('Y');
        // $year = date('Y')+543;
        $date = array();
        while ($i < 40) :
          $date[$year] = $year;
          $year--;
          $i++;
        endwhile;
      break;
    endswitch;
    return $date;
  }
}

if ( ! function_exists('dropdown_organize'))
{
  function dropdown_organize()
  {
    $organize = array(
			'' => 'เลือกประเภทองค์กร',
      'โรงพยาบาลของรัฐ' => 'โรงพยาบาลของรัฐ',
      'โรงพยาบาลเอกชน' => 'โรงพยาบาลเอกชน',
      'สถานีอนามัย' => 'สถานีอนามัย',
      'คลีนิก' => 'คลีนิก'
    );
    return $organize;
  }
}

if ( ! function_exists('dropdown_present'))
{
  function dropdown_present()
  {
    $organize = array(
			'ไม่ทราบ' => 'ไม่ทราบ',
			'LOA' => 'LOA',
			'ROA' => 'ROA',
			'OPP' => 'OPP',
			'Transvers' => 'Transvers',
			'Breech' => 'Breech',
      'Foot' => 'Foot'
    );
    return $organize;
  }
}

if ( ! function_exists('dropdown_province'))
{
  function dropdown_province()
  {
		if ($lang=='th'){
			$pKamphaengPhet="กำแพงเพชร";
			$pChiangRai="เชียงราย";
			$pChiangMai="เชียงใหม่";
			$pTak="ตาก";
			$pNakhonSawan="นครสวรรค์";
			$pNan="น่าน";
			$pPhichit="พิจิตร";
			$pPhitsanulok="พิษณุโลก";
			$pPhetchabun="เพชรบูรณ์";
			$pPhrae="แพร่";
			$pMaeHongSon="แม่ฮ่องสอน";
			$pLampang="ลำปาง";
			$pLamphun="ลำพูน";
			$pSukhothai="สุโขทัย";
			$pUttaradit="อุตรดิตถ์";
			$pUthaiThani="อุทัยธานี";
			$pPhayao="พะเยา";
			$pBangkok="กรุงเทพฯ";
			$pKanchanaburi="กาญจนบุรี";
			$pChanthaburi="จันทบุรี";
			$pChachoengsao="ฉะเชิงเทรา";
			$pChonBuri="ชลบุรี";
			$pChaiNat="ชัยนาท";
			$pTrat="ตราด";
			$pNakhonNayok="นครนายก";
			$pNakhonPathom="นครปฐม";
			$pNonthaburi="นนทบุรี";
			$pPathumThani="ปทุมธานี";
			$pPrachuapKhiriKhan="ประจวบคีรีขันธ์";
			$pPrachinBuri="ปราจีนบุรี";
			$pPhraNakhonSiAyutthaya="พระนครศรีอยุธยา";
			$pPhetchaburi="เพชรบุรี";
			$pRayong="ระยอง";
			$pRatchaburi="ราชบุรี";
			$pLopBuri="ลพบุรี";
			$pSamutPrakan="สมุทรปราการ";
			$pSamutSongkhram="สมุทรสงคราม";
			$pSamutSakhon="สมุทรสาคร";
			$pSaraburi="สระบุรี";
			$pSingBuri="สิงห์บุรี";
			$pSuphanBuri="สุพรรณบุรี";
			$pAngThong="อ่างทอง";
			$pSaKaeo="สระแก้ว";
			$pKalasin="กาฬสินธุ์";
			$pKhonKaen="ขอนแก่น";
			$pChaiyaphum="ชัยภูมิ";
			$pYasothon="ยโสธร";
			$pNakhonPhanom="นครพนม";
			$pNakhonRatchasima="นครราชสีมา";
			$pBuriRam="บุรีรัมย์";
			$pMahaSarakham="มหาสารคาม";
			$pRoiEt="ร้อยเอ็ด";
			$pLoei="เลย";
			$pSiSaKet="ศรีสะเกษ";
			$pSakonNakhon="สกลนคร";
			$pSurin="สุรินทร์";
			$pNongKhai="หนองคาย";
			$pUdonThani="อุดรธานี";
			$pUbonRatchathani="อุบลราชธานี";
			$pMukdahan="มุกดาหาร";
			$pAmnatCharoen="อำนาจเจริญ";
			$pNongBuaLamPhu="หนองบัวลำภู";
			$pKrabi="กระบี่";
			$pChumphon="ชุมพร";
			$pTrang="ตรัง";
			$pNakhonSiThammarat="นครศรีธรรมราช";
			$pNarathiwat="นราธิวาส";
			$pPattani="ปัตตานี";
			$pPhangnga="พังงา";
			$pPhatthalung="พัทลุง";
			$pPhuket="ภูเก็ต";
			$pYala="ยะลา";
			$pRanong="ระนอง";
			$pSongkhla="สงขลา";
			$pSatun="สตูล";
			$pSuratThani="สุราษฎร์ธานี";
			$pBungkan="บึงกาฬ";
		}else if ($lang=='en'){
			$pKamphaengPhet="Kamphaeng Phet";
			$pChiangRai="Chiang Rai";
			$pChiangMai="Chiang Mai";
			$pTak="Tak";
			$pNakhonSawan="Nakhon Sawan";
			$pNan="Nan";
			$pPhichit="Phichit";
			$pPhitsanulok="Phitsanulok";
			$pPhetchabun="Phetchabun";
			$pPhrae="Phrae";
			$pMaeHongSon="Mae Hong Son";
			$pLampang="Lampang";
			$pLamphun="Lamphun";
			$pSukhothai="Sukhothai";
			$pUttaradit="Uttaradit";
			$pUthaiThani="Uthai Thani";
			$pPhayao="Phayao";
			$pBangkok="Bangkok";
			$pKanchanaburi="Kanchanaburi";
			$pChanthaburi="Chanthaburi";
			$pChachoengsao="Chachoengsao";
			$pChonBuri="Chon Buri";
			$pChaiNat="Chai Nat";
			$pTrat="Trat";
			$pNakhonNayok="Nakhon Nayok";
			$pNakhonPathom="Nakhon Pathom";
			$pNonthaburi="Nonthaburi";
			$pPathumThani="Pathum Thani";
			$pPrachuapKhiriKhan="Prachuap Khiri Khan";
			$pPrachinBuri="Prachin Buri";
			$pPhraNakhonSiAyutthaya="Phra Nakhon Si Ayutthaya";
			$pPhetchaburi="Phetchaburi";
			$pRayong="Rayong";
			$pRatchaburi="Ratchaburi";
			$pLopBuri="Lop Buri";
			$pSamutPrakan="Samut Prakan";
			$pSamutSongkhram="Samut Songkhram";
			$pSamutSakhon="Samut Sakhon";
			$pSaraburi="Saraburi";
			$pSingBuri="Sing Buri";
			$pSuphanBuri="Suphan Buri";
			$pAngThong="Ang Thong";
			$pSaKaeo="Sa Kaeo";
			$pKalasin="Kalasin";
			$pKhonKaen="Khon Kaen";
			$pChaiyaphum="Chaiyaphum";
			$pYasothon="Yasothon";
			$pNakhonPhanom="Nakhon Phanom";
			$pNakhonRatchasima="Nakhon Ratchasima";
			$pBuriRam="Buri Ram";
			$pMahaSarakham="Maha Sarakham";
			$pRoiEt="Roi Et";
			$pLoei="Loei";
			$pSiSaKet="Si Sa Ket";
			$pSakonNakhon="Sakon Nakhon";
			$pSurin="Surin";
			$pNongKhai="Nong Khai";
			$pUdonThani="Udon Thani";
			$pUbonRatchathani="Ubon Ratchathani";
			$pMukdahan="Mukdahan";
			$pAmnatCharoen="Amnat Charoen";
			$pNongBuaLamPhu="Nong Bua Lam Phu";
			$pKrabi="Krabi";
			$pChumphon="Chumphon";
			$pTrang="Trang";
			$pNakhonSiThammarat="Nakhon Si Thammarat";
			$pNarathiwat="Narathiwat";
			$pPattani="Pattani";
			$pPhangnga="Phangnga";
			$pPhatthalung="Phatthalung";
			$pPhuket="Phuket";
			$pYala="Yala";
			$pRanong="Ranong";
			$pSongkhla="Songkhla";
			$pSatun="Satun";
			$pSuratThani="Surat Thani";
			$pBungkan="Bungkan";
			}
    $province = array(
			'กำแพงเพชร' => 'กำแพงเพชร',
			'เชียงราย' => 'เชียงราย',
			'' => ''
		);
    return $province;
  }
}
