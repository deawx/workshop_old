<?
ob_start();
session_start();
include "function_setting.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/tamplate.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>การพัฒนาบทเรียน E-learning วิชา เทคโนโลยีสารสนเทศ เบื้องต้น</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
<link href="stye.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ajax.js" ></script>
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
			background: url(image/bg.jpg) top center ;
	background-color:#000;
 
background-attachment: fixed;
 
	
}
</style>
<script type="text/javascript" >
//disable back button
history.pushState(null, null, '');
window.addEventListener('popstate', function(event) {
  history.pushState(null, null, '');
});
</script>
<script type="text/javascript">
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
</head>

<body onload="MM_preloadImages('image/images/menu2_01.jpg','image/images/menu2_02.jpg','image/images/menu2_03.jpg','image/images/menu2_04.jpg','image/images/menu2_05.jpg','image/admin2.jpg')">
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="140" colspan="2" align="center"><img src="image/banner.jpg" width="900" height="179" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><a href="index.php" target="_parent" onmouseover="MM_swapImage('Image2','','image/images/menu2_01.jpg',1)" onmouseout="MM_swapImgRestore()"><img src="image/images/menu1_01.jpg" name="Image2" width="175" height="50" id="Image2" /></a><a href="menu.php" target="_parent" onmouseover="MM_swapImage('Image3','','image/images/menu2_02.jpg',1)" onmouseout="MM_swapImgRestore()"><img src="image/images/menu1_02.jpg" name="Image3" width="167" height="50" id="Image3" /></a><a href="register.php" target="_parent" onmouseover="MM_swapImage('Image4','','image/images/menu2_03.jpg',1)" onmouseout="MM_swapImgRestore()"><img src="image/images/menu1_03.jpg" name="Image4" width="196" height="50" id="Image4" /></a><a href="board.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image20','','image/images/menu2_04.jpg',1)"><img src="image/images/menu1_04.jpg" name="Image20" width="173" height="50" id="Image20" /></a><a href="news.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image21','','image/images/menu2_05.jpg',1)"><img src="image/images/menu1_05.jpg" name="Image21" width="189" height="50" id="Image21" /></a></td>
  </tr>
  <tr>
    <td height="25" colspan="2" align="center" bgcolor="#A4DBFF" class="style27"><MARQUEE class=style17 onmouseover=this.stop() onmouseout=this.start() scrollAmount=2 scrollDelay=30 width=880>
    การพัฒนาบทเรียน E-learning วิชา เทคโนโลยีสารสนเทศ เบื้องต้น
    </MARQUEE></td>
  </tr>
  <tr>
    <td width="200" height="376" align="center" valign="top" bgcolor="#FFFFFF"><table width="200" border="0" cellpadding="1" cellspacing="1">
      <tr>
        <td></td>
      </tr>
    </table>
 <?
 if($login_status=="นักเรียน" or $login_status=="Admin"){
 ?>
      <table width="200" height="214" border="1" cellpadding="0" cellspacing="0" class="two">
      <tr>
        <td height="212" valign="top"><img src="image/tab.jpg" width="198" height="45" />
          <table width="190" border="0" align="center">
          <tr>
            <td width="12"><img src="image/book_icon.gif" width="16" height="16" /></td>
            <td width="172" class="style3"><a href="test.php?test=แบบทดสอบก่อนเรียน">แบบทดสอบก่อนเรียน</a>&nbsp;</td>
          </tr>
        
           <tr>
            <td height="7" colspan="2" class="style25"><img src="image/line.jpg" width="188" height="5" /></td>
            </tr>
            
          <?
        include "connect.php";
$tb="data";
$sql="select * from $tb where status='' order by num asc";
$result = mysql_query($sql);
While($row= mysql_fetch_array($result)){
$id_menu = $row["num"];
$name_menu= $row["name"];
 
		?>
          <tr>
            <td width="12"><img src="image/book_icon.gif" width="16" height="16" /></td>
            <td width="172" class="style3"><a href="view.php?id=<?=$id_menu?>"><?=$name_menu?></a>&nbsp;</td>
          </tr>
           <tr>
            <td height="7" colspan="2" class="style25"><img src="image/line.jpg" width="188" height="5" /></td>
            </tr>
      
         
          <?
}


		  ?>
          <tr>
            <td width="12"><img src="image/book_icon.gif" width="16" height="16" /></td>
            <td width="172" class="style3"><a href="test.php?test=แบบทดสอบหลังเรียน">แบบทดสอบหลังเรียน</a>&nbsp;</td>
          </tr>
           <tr>
            <td height="7" colspan="2" class="style25"><img src="image/line.jpg" width="188" height="5" /></td>
            </tr>
 
        </table></td>
      </tr>
    </table>
    
    <?
 }
    if($login_status=="Admin"){
	?>
      <table width="200" border="0" cellpadding="1" cellspacing="1">
        <tr>
          <td></td>
        </tr>
      </table>
      <table width="200" height="138" border="1" cellpadding="0" cellspacing="0" class="two">
        <tr>
          <td height="136" valign="top"><img src="image/tab2.jpg" width="198" height="45" />
            <table width="190" border="0" align="center">
 
              <tr>
                <td width="12"><img src="image/c.jpg" width="12" height="12" /></td>
                <td width="172" class="style3"><a href="data_member.php" target="_parent">ข้อมูลสมาชิก</a></td>
              </tr>
              
               <tr>
                <td height="7" colspan="2" class="style25"><img src="image/line.jpg" width="188" height="5" /></td>
              </tr>
               <tr>
                <td width="12"><img src="image/c.jpg" width="12" height="12" /></td>
                <td width="172" class="style3"><a href="data_data.php" target="_parent">จัดการบทเรียน</a></td>
              </tr>
              
              
              <tr>
                <td height="7" colspan="2" class="style25"><img src="image/line.jpg" width="188" height="5" /></td>
              </tr>
                <tr>
                <td width="12"><img src="image/c.jpg" width="12" height="12" /></td>
                <td width="172" class="style3"><a href="data_test.php" target="_parent">ข้อมูลแบบทดสอบ</a></td>
              </tr>
              <tr>
                <td height="7" colspan="2" class="style25"><img src="image/line.jpg" width="188" height="5" /></td>
              </tr>
               <tr>
                <td width="12"><img src="image/c.jpg" width="12" height="12" /></td>
                <td width="172" class="style3"><a href="data_score.php" target="_parent">ข้อมูลการทำแบบทดสอบ</a></td>
              </tr>
              <tr>
                <td height="7" colspan="2" class="style25"><img src="image/line.jpg" width="188" height="5" /></td>
              </tr>
                 
              <tr>
                <td width="12"><img src="image/c.jpg" width="12" height="12" /></td>
                <td width="172" class="style3"><a href="news.php" target="_parent">จัดการข่าวสาร</a></td>
              </tr>
              <tr>
                <td height="7" colspan="2" class="style25"><img src="image/line.jpg" width="188" height="5" /></td>
              </tr>
              
              <tr>
                <td width="12"><img src="image/c.jpg" width="12" height="12" /></td>
                <td width="172" class="style3"><a href="logout.php" target="_parent">ออกจากระบบ</a></td>
              </tr>
              <tr>
                <td height="7" colspan="2" class="style25"><img src="image/line.jpg" width="188" height="5" /></td>
              </tr>
              
 
            </table></td>
        </tr>
    </table>
      <table width="200" border="0" cellpadding="1" cellspacing="1">
        <tr>
          <td></td>
        </tr>
      </table>
      <? } ?><br />

      <?
	    if($login_status=="นักเรียน"){
	?>
      <table width="200" border="0" cellpadding="1" cellspacing="1">
        <tr>
          <td></td>
        </tr>
      </table>
      <table width="200" height="138" border="1" cellpadding="0" cellspacing="0" class="two">
        <tr>
          <td height="136" valign="top"><img src="image/tab5.jpg" width="198" height="45" />
            <table width="190" border="0" align="center">
 
              <tr>
                <td width="12"><img src="image/c.jpg" width="12" height="12" /></td>
                <td width="172" class="style3"><a href="mydata.php" target="_parent">ข้อมูลส่วนตัว</a></td>
              </tr>
              
               <tr>
                <td height="7" colspan="2" class="style25"><img src="image/line.jpg" width="188" height="5" /></td>
              </tr>
               <tr>
                <td width="12"><img src="image/c.jpg" width="12" height="12" /></td>
                <td width="172" class="style3"><a href="myscore.php" target="_parent">ข้อมูลการทำแบบทดสอบ</a></td>
              </tr>
              <tr>
                <td height="7" colspan="2" class="style25"><img src="image/line.jpg" width="188" height="5" /></td>
              </tr>
              
              
              <tr>
                <td width="12"><img src="image/c.jpg" width="12" height="12" /></td>
                <td width="172" class="style3"><a href="logout.php" target="_parent">ออกจากระบบ</a></td>
              </tr>
              <tr>
                <td height="7" colspan="2" class="style25"><img src="image/line.jpg" width="188" height="5" /></td>
              </tr>
              
 
            </table></td>
        </tr>
    </table>
      <table width="200" border="0" cellpadding="1" cellspacing="1">
        <tr>
          <td></td>
        </tr>
      </table>
      <? } ?><br />

<?
          if($login_username==""){
		  ?><table width="200" height="214" border="1" cellpadding="0" cellspacing="0" class="two">
            <tr>
              <td height="212" valign="top"><img src="image/tab3.jpg" width="198" height="45" />
               <?
	$action=$_GET["action"];
 
	
	if($action=="login"){
$user=$_POST['user'];
$pass=$_POST['pass'];
include "connect.php";
$tb="member";
$sql = "select * from $tb where  username='$user' and password='$pass'";
$dbquery = mysql_db_query($db, $sql); 
$num_rows = mysql_num_rows($dbquery);
$a=0;
if(empty($num_rows)) 
{

?>
                <script language="javascript" type="text/javascript">
alert("username หรือ password ไม่ถูกต้อง");
            </script>
                <?
	 echo "<META HTTP-EQUIV=refresh CONTENT=\"0	; URL=index.php\">";
  
}else{
			$_SESSION[login] = "true";
			$_SESSION[login_status] = "นักเรียน";
			$_SESSION[login_username] = "$user";
 
	
   header('location: index.php');
   }
   }
?> <form id="form1" name="form1" method="post" action="index.php?action=login">
                  <br />
                  <table width="147" border="0" align="center">
                    <tr>
                      <td width="141"><span class="style5">Username :</span></td>
                    </tr>
                    <tr>
                      <td>                        <span class="style5">
                        <input type="text" name="user" id="user" />
                      </span></td>
                    </tr>
                    <tr>
                      <td><span class="style5">Password :</span></td>
                    </tr>
                    <tr>
                      <td><label for="pass"></label>
                        <input type="password" name="pass" id="pass" /></td>
                    </tr>
                    <tr>
                      <td><input type="submit" name="button" id="button" value="Login" /></td>
                    </tr>
                  </table>
              </form></td>
            </tr>
          </table>
      <table width="100" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><a href="admin_login.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image22','','image/admin2.jpg',1)"><img src="image/admin1.jpg" name="Image22" width="198" height="45" id="Image22" /></a></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table>
      <? } else{?>
            <table width="200" height="227" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td height="190" align="center" valign="top"><img src="image/admin.jpg" width="190" height="190" /></td>
              </tr>
              <tr>
                <td height="30" align="center" valign="top" class="style13">คุณได้เข้าสู่ระบบแล้ว</td>
              </tr>
          </table>            <? } ?>
          <br />
          <br /></td>
    <td width="684" valign="top" bgcolor="#FFFFFF"><!-- InstanceBeginEditable name="EditRegion3" -->
      <table width="604" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="632"> 
		 
		      <?
		  $action=$_GET["action"];
		  
		  if($action=="update"){
		  
		  
		    $name=$_POST["name"];
		  $lname=$_POST["lname"];
		  $username=$_POST["username"];
		  $newpassword=$_POST["newpassword"];
		  $address=$_POST["address"];
		  $province=$_POST["province"];
		  $zipcode=$_POST["zipcode"];
		  $email=$_POST["email"];
		  $tel=$_POST["tel"];
		  $name2=$_POST["name2"];
		  $address2=$_POST["address2"];
		  $province2=$_POST["province2"];
		  $zipcode2=$_POST["zipcode2"];
		  
		  include "connect.php";
$tb="member";
$add = mysql_query("UPDATE `$db`.`$tb` SET `name` = '$name',`lname` = '$lname',`address` = '$address',`province` = '$province',`zipcode` = '$zipcode',`tel` = '$tel',`email` = '$email' WHERE `username` = '$username' ");

if($newpassword<>""){
$add2 = mysql_query("UPDATE `$db`.`$tb` SET `password` = '$newpassword' WHERE `username` = '$username' ");
}
		  
		  ?>
		   
              <script language="JavaScript" type="text/javascript">
alert("แก้ไขข้อมูลเรียบร้อยแล้ว");
              </script>
              <?

echo "<META HTTP-EQUIV=refresh CONTENT=\"0	; URL=mydata.php\">";
		  
		  }
		  
		  
		  include "connect.php";
$tb="member";
$sql="select * from $tb where username='$login_username'";
$result = mysql_query($sql);
While($row= mysql_fetch_array($result)){
$login_password = $row["password"];
$login_name= $row["name"];
$login_lname= $row["lname"];
$login_address= $row["address"];
$login_province= $row["province"];
$login_zipcode= $row["zipcode"];
$login_email= $row["email"];
$login_tel= $row["tel"];

}
		  ?>
	        
		    <form id="frm_login" name="frm_login" method="post" action="mydata.php?action=update" onSubmit="return checks()">
            
            <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
              
              <tr>
                <td height="342" align="center" valign="top" background="img/nn3.jpg"> 
                    <table width="550" border="0" align="center">
              <tr>
                <td height="54" colspan="2" align="center" class="style17">ข้อมูลสมาชิก</td>
              </tr>
              <tr>
             
              <tr>
                <td width="193" align="right" class="style13">Username : </td>
                <td width="347"><label>
                  <input name="username" type="text" id="username" value="<?=$login_username?>"  readonly=""/>
                </label></td>
              </tr>
              <tr>
                <td align="right" class="style13">รหัสผ่านเดิม : </td>
                <td><input name="password" type="text" id="password" /></td>
              </tr>
              <tr>
                <td align="right" class="style13">รหัสผ่านใหม่ : </td>
                <td><input name="newpassword" type="text" id="newpassword" /></td>
              </tr>
              <tr>
                <td align="right" class="style13">ยืนยันรหัสผ่านใหม่ : </td>
                <td><input name="renewpassword" type="text" id="renewpassword" /></td>
              </tr>
              <tr>
                <td align="right" class="style13">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="right" class="style13">ชื่อ : </td>
                <td><input name="name" type="text" id="name" value="<?=$login_name?>" /></td>
              </tr>
              <tr>
                <td align="right" class="style13">นามสกุล : </td>
                <td><input name="lname" type="text" id="lname" value="<?=$login_lname?>" /></td>
              </tr>
              <tr>
                <td align="right" class="style13">ที่อยู่ : </td>
                <td><textarea name="address" cols="40" rows="5" id="address"><?=$login_address?></textarea></td>
              </tr>
              <tr>
                <td align="right" class="style13">จังหวัด : </td>
                <td><font color="#000000">
                  <select name="province" id="province">
                 
					<option value="<?=$login_province?>" ><?=$login_province?></option>
                    <option value="กรุงเทพมหานคร" >กรุงเทพมหานคร</option>
                    <option 
                                value="กาฬสินธุ์">กาฬสินธุ์</option>
                    <option 
                                value="กระบี่">กระบี่</option>
                    <option 
                                value="กาญจนบุรี">กาญจนบุรี</option>
                    <option 
                                value="กำแพงเพชร">กำแพงเพชร</option>
                    <option 
                                value="ขอนแก่น">ขอนแก่น</option>
                    <option 
                                value="จันทบุรี">จันทบุรี</option>
                    <option 
                                value="ฉะเชิงเทรา">ฉะเชิงเทรา</option>
                    <option 
                                value="ชลบุรี">ชลบุรี</option>
                    <option 
                                value="ชัยนาท">ชัยนาท</option>
                    <option 
                                value="ชัยภูมิ">ชัยภูมิ</option>
                    <option 
                                value="ชุมพร">ชุมพร</option>
                    <option 
                                value="เชียงราย">เชียงราย</option>
                    <option 
                                value="เชียงใหม่">เชียงใหม่</option>
                    <option 
                                value="ตรัง">ตรัง</option>
                    <option 
                                value="ตราด">ตราด</option>
                    <option 
                                value="ตาก">ตาก</option>
                    <option 
                                value="นครนายก">นครนายก</option>
                    <option 
                                value="นครปฐม">นครปฐม</option>
                    <option 
                                value="นครพนม">นครพนม</option>
                    <option 
                                value="นครราชสีมา">นครราชสีมา</option>
                    <option 
                                value="นครศรีธรรมราช">นครศรีธรรมราช</option>
                    <option value="นครสวรรค์">นครสวรรค์</option>
                    <option value="นราธิวาส">นราธิวาส</option>
                    <option 
                                value="นนทบุรี">นนทบุรี</option>
                    <option 
                                value="น่าน">น่าน</option>
                    <option 
                                value="บุรีรัมย์">บุรีรัมย์</option>
                    <option 
                                value="ปทุมธานี">ปทุมธานี</option>
                    <option 
                                value="ประจวบคีรีขันธ์">ประจวบคีรีขันธ์</option>
                    <option value="ปราจีนบุรี">ปราจีนบุรี</option>
                    <option value="ปัตตานี">ปัตตานี</option>
                    <option 
                                value="พระนครศรีอยุธยา">พระนครศรีอยุธยา</option>
                    <option value="พะเยา">พะเยา</option>
                    <option 
                                value="พังงา">พังงา</option>
                    <option 
                                value="พัทลุง">พัทลุง</option>
                    <option 
                                value="พิจิตร">พิจิตร</option>
                    <option 
                                value="พิษณุโลก">พิษณุโลก</option>
                    <option 
                                value="เพชรบุรี">เพชรบุรี</option>
                    <option 
                                value="เพชรบูรณ์">เพชรบูรณ์</option>
                    <option 
                                value="แพร่">แพร่</option>
                    <option 
                                value="ภูเก็ต">ภูเก็ต</option>
                    <option 
                                value="มหาสารคาม">มหาสารคาม</option>
                    <option 
                                value="มุกดาหาร">มุกดาหาร</option>
                    <option 
                                value="แม่ฮ่องสอน">แม่ฮ่องสอน</option>
                    <option 
                                value="ยโสธร">ยโสธร</option>
                    <option 
                                value="ยะลา">ยะลา</option>
                    <option 
                                value="ร้อยเอ็ด">ร้อยเอ็ด</option>
                    <option 
                                value="ระนอง">ระนอง</option>
                    <option 
                                value="ระยอง">ระยอง</option>
                    <option 
                                value="ราชบุรี">ราชบุรี</option>
                    <option 
                                value="ลพบุรี">ลพบุรี</option>
                    <option 
                                value="ลำปาง">ลำปาง</option>
                    <option 
                                value="ลำพูน">ลำพูน</option>
                    <option 
                                value="เลย">เลย</option>
                    <option 
                                value="ศรีสะเกษ">ศรีสะเกษ</option>
                    <option 
                                value="สกลนคร">สกลนคร</option>
                    <option 
                                value="สงขลา">สงขลา</option>
                    <option 
                                value="สตูล">สตูล</option>
                    <option 
                                value="สมุทรปราการ">สมุทรปราการ</option>
                    <option 
                                value="สมุทรสงคราม">สมุทรสงคราม</option>
                    <option 
                                value="สมุทรสาคร">สมุทรสาคร</option>
                    <option 
                                value="สระแก้ว">สระแก้ว</option>
                    <option 
                                value="สระบุรี">สระบุรี</option>
                    <option 
                                value="สิงห์บุรี">สิงห์บุรี</option>
                    <option 
                                value="สุโขทัย">สุโขทัย</option>
                    <option 
                                value="สุพรรณบุรี">สุพรรณบุรี</option>
                    <option 
                                value="สุราษฎร์ธานี">สุราษฎร์ธานี</option>
                    <option 
                                value="สุรินทร์">สุรินทร์</option>
                    <option 
                                value="หนองคาย">หนองคาย</option>
                    <option 
                                value="หนองบัวลำภู">หนองบัวลำภู</option>
                    <option 
                                value="อ่างทอง">อ่างทอง</option>
                    <option 
                                value="อำนาจเจริญ">อำนาจเจริญ</option>
                    <option 
                                value="อุดรธานี">อุดรธานี</option>
                    <option 
                                value="อุตรดิตถ์">อุตรดิตถ์</option>
                    <option 
                                value="อุทัยธานี">อุทัยธานี</option>
                    <option 
                                value="อุบลราชธานี">อุบลราชธานี</option>
                  </select>
                </font></td>
              </tr>
              <tr>
                <td align="right" class="style13">รหัสไปรษณีย์ : </td>
                <td><input name="zipcode" type="text" id="zipcode" value="<?=$login_zipcode?>" /></td>
              </tr>
              <tr>
                <td align="right" class="style13">E-mail : </td>
                <td><input name="email" type="text" id="email" value="<?=$login_email?>" /></td>
              </tr>
              <tr>
                <td align="right" class="style13">เบอร์โทรศัพท์ : </td>
                <td><input name="tel" type="text" id="tel" value="<?=$login_tel?>" /></td>
              </tr>
              <tr>
                <td align="right" class="style13">&nbsp;</td>
                <td><table width="145" border="0">
                  <tr>
                    <td width="57"><label>
                      <input type="submit" name="Submit2" value=" บันทึก " />
                    </label></td>
                    <td width="78"><input type="reset" name="Submit22" value=" ยกเลิก " /></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td align="right" class="style13">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
            </table>
                  </td>
              </tr>
              <tr>
                <td height="21" align="center" valign="top">&nbsp;</td>
              </tr>
            </table>
		  </form>
		  <script language="JavaScript" type="text/javascript">
				function checks(){
				var temp;
	var digits="0123456789๐๑๒๓๔๕๖๗๘๙";
	var digit2="0123456789!#$%&'()*+,-./:;<=>?@[\]^_`{|}~‘’ฯ฿ๆ๏๐๑๒๓๔๕๖๗๘๙๚๛";
	var digit3="!#$%&'()*+,./:;<=>?@[\]^_`{|}~‘’ฯ฿ๆ๏๐๑๒๓๔๕๖๗๘๙๚๛กขฃคฆงจฉชซฌญดตฎฏฐตฒณถทธนบปผฝพฟภมยรลฤฦวศษสหฬอฮะา  ิ  ี  ื   ึ  ุ  ู โ  ่  ้  ๊  ๋  ็  ์ ำ ไ เ แ  ํ ใ ";
	var digit4="!#$%&'()*+,-:;<=>?@[\]^_`{|}~‘’ฯ฿ๆ๏๚๛";
	var digit5="กขฃคฆงจฉชซฌญดตฎฏฐตฒณถทธนบปผฝพฟภมยรลฤฦวศษสหฬอฮะา  ิ  ี  ื   ึ  ุ  ู โ ั ่  ้  ๊  ๋  ็  ์ ำ ไ เ แ  ํ ใ ";
	var emailchars="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz@._0123456789";
	var errmsg="";
	var phonechars="0123456789๐๑๒๓๔๕๖๗๘๙-";
				
				 
						
	if(document.frm_login.password.value != ""){
					 
		if(document.frm_login.newpassword.value == "")
	{
		alert("กรุณากรอกรหัสผ่านใหม่");
		return false;
	}

      var v1 = document.frm_login.newpassword.value;
        if ( v1.length<6)
           {
           alert("รหัสผ่านใหม่ไม่ควรน้อยกว่า 6 ตัวอักษร");
           return false;
           }    
						
						
						
						 if(document.frm_login.newpassword.value != document.frm_login.renewpassword.value)
	{
		alert("รหัสผ่านใหม่ของคุณไม่เหมือนกันค่ะ");		//alert with appropriate message
		return false;
	}
	
	
				 
		if(document.frm_login.password.value != "<?=$login_password?>")
	{
		alert("รหัสผ่านเดิมของคุณไม่ถูกต้อง");
		return false;
	}
	
	
	}
	
	
		if(document.frm_login.name.value == "")
	{
		alert("กรุณากรอกชื่อ");
		return false;
	}
	
	if(document.frm_login.lname.value == "")
	{
		alert("กรุณากรอกนามสกุล");
		return false;
	}
	
	 
	 
	 

}
	

			  </script></td>
        </tr>
      </table>
    <!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <td height="56" colspan="2" align="center" bgcolor="#FFFFFF"><img src="image/foot.jpg" width="900" height="80" /></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>