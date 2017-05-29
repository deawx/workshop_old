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
    <td width="684" valign="top" bgcolor="#FFFFFF"><!-- InstanceBeginEditable name="EditRegion3" --> <script type="text/JavaScript">
function setsmile(what) {
document.emotion.detail.value = document.emotion.elements.detail.value+" "+what;
document.emotion.detail.focus();
}
</script>
          <table width="650" border="0" align="center">
        <tr>
          <td width="934"><img src="image/tab7.jpg" width="647" height="45" /></td>
        </tr>
        <tr>
          <td><table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
   
  <tr>
    <td height="206" align="center" background="img/t6.jpg" bgcolor="#FFFFFF"><table width="650" border="0" align="center">
      <tr>
        <th width="530" height="24" align="left" bgcolor="#d8dfea" class="style3" scope="col">&nbsp;&nbsp;กระดานบอร์ด :: แสดงความคิดเห็น - สอบถาม </th>
      </tr>
    </table>
         
        <?
$action=$_GET["action"];


	if($action=="del"){
include "connect.php";
$tb="demo_post1";
for ($i=0;$i<count($color_array);$i++) { 
$color_no =$color_array[$i];
 
$tb2="demo_post2";
$sql2="select * from $tb2 where class='$color_no'";
$result2 = mysql_query($sql2);
While($row2= mysql_fetch_array($result2)){
$pic = $row2["pic"];
if($pic<>""){
	unlink($pic);
}
}

$tb3="demo_post1";
$sql3="select * from $tb3 where id='$color_no'";
$result3 = mysql_query($sql3);
While($row3= mysql_fetch_array($result3)){
$pics = $row3["pic"];
if($pics<>""){
	unlink($pics);
}
}


$sql="delete from $tb where id=$color_no"; 
$db_query=mysql_db_query($db,$sql);

$sql2="delete from demo_post2 where class=$color_no"; 
$db_query=mysql_db_query($db,$sql2);


}

?>
        <script language="JavaScript" type="text/javascript">
alert("ลบข้อมูลเรียบร้อยแล้ว");
          </script>
        <?

echo "<META HTTP-EQUIV=refresh CONTENT=\"0; URL=board.php\">";
}
 
	if($action=="add"){


 if($_FILES['file']['tmp_name'] != "")      //เช็คว่ามีการอัปรูป
{

$OpenFile=$HTTP_POST_FILES['file'] ['name'];
  $OpenFile2=$HTTP_POST_FILES['file'] ['tmp_name'];
   $file = strtolower($_FILES["file"]["name"]);
	$type= strrchr($file,".");
	$OpenFile="BOARD".date("Ymdhis")."$type";
	
	
     copy($_FILES['file']['tmp_name'], "imgboards/".$OpenFile);      //ทำการ copy รูป
          $images = "imgboards/".$OpenFile; $height = 700;      //กำหนดขนาดความสูง
          $size = getimagesize($images);
          $width = round($height*$size[0]/$size[1]);      //ขนาดความกว้่างคำนวนเพื่อความสมส่วนของรูป
           if($size[2] == 1) {
		  		 $images_orig = imagecreatefromgif($images); //resize รูปประเภท GIF
		   } else if($size[2] == 2) {
				 $images_orig = imagecreatefromjpeg($images); //resize รูปประเภท JPEG
		   }
		   $photoX = imagesx($images_orig);
		   $photoY = imagesy($images_orig);
		   $images_fin = imagecreatetruecolor($width, $height);
  		   imagecopyresampled($images_fin,$images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY); imagejpeg($images_fin, $images);
}

	  $name=$_POST['name'];
	  $detail=$_POST['detail'];
	  $name2=$_POST['name2'];
	  $date=date("Y-m-d");
	  $time=date("H:i:s");
	  	 $read=$_POST['read'];
	  $posts=$_POST['posts'];
	  
	    $code1=$_POST['code1'];
  $txt = array(":1:", ":2:",":3:", ":4:", ":5:", ":6:", ":7:", ":8:", ":9:", ":10:", ":11:", ":12:");
$pic = array("1.gif","2.gif","3.gif","4.gif","5.gif","6.gif","7.gif","8.gif","9.gif","10.gif","11.gif","12.gif");
for ($i=0 ; $i<sizeof($txt) ; $i++) {
$detail = eregi_replace($txt[$i],"<img src=\"emotion/$pic[$i]\" >",$detail);
}

	 include "connect.php";
	 $tb="demo_post1";
	$sql="select * from $tb";
	$db_query=mysql_db_query($db,$sql);
	$num_rows=mysql_num_rows($db_query); 
	if((($name<>"") and ($detail<>"") and ($name2<>""))){ 
	
	mysql_query("INSERT INTO $tb (name,detail,pic,name2,date,counter,posts,times,status,status2) values('$name','$detail','$images','$name2','$date','$read','$posts','$time','$board','1')") or die ("<center>ไม่สามารถ เพิ่มได้</center> ");
	
	?>
        <script language="JavaScript" type="text/javascript">
alert("เพิ่มกระทู้เรียบร้อยแล้ว");
          </script>
        <?

 echo "<META HTTP-EQUIV=refresh CONTENT=\"0; URL=board.php\">";
 }else{
 ?>
        <script language="JavaScript" type="text/javascript">
alert("Error!!! ข้อความไม่สมบูรณ์");
          </script>
        <?
  echo "<META HTTP-EQUIV=refresh CONTENT=\"0; URL=board.php\">";
  }
mysql_close($connect);

	}
 
	if($action==""){
 

include "connect.php";
$tb="demo_post1";
$sql = "select * From $tb where name like '%$keyword%' ";
/* ตั้งค่า แสดงผลต่อหน้า $Per_Page */

$Per_Page =20; // แสดงหน้าละ 12
if(!$Page)
$Page=1;

$Prev_Page = $Page-1;
$Next_Page = $Page+1;

$result = mysql_query($sql);
$Page_start = ($Per_Page*$Page)-$Per_Page;
$Num_Rows = mysql_num_rows($result);
if($Num_Rows<=$Per_Page)
$Num_Pages =1;
else if(($Num_Rows % $Per_Page)==0)
$Num_Pages =($Num_Rows/$Per_Page) ;
else 
$Num_Pages =($Num_Rows/$Per_Page) +1;

$Num_Pages = (int)$Num_Pages;

if(($Page>$Num_Pages) || ($Page<0))
print "<center><b>จำนวน $Page มากกว่า $Num_Pages ยังไม่มีข้อความ<b></center>";
$sql = "select * From $tb where name like '%$keyword%'  order by id desc LIMIT $Page_start , $Per_Page";
//ส่วนแสดงผล
$result = mysql_query($sql);
?>
        <table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
          <!--DWLayoutTable-->
          
          <tr>
            <td bgcolor="#FFFFFF"><form action="board.php" method="post" name="form1" id="form1">
                <div align="right" class="style23"><span class="style3">ค้นหากระทู้</span><span class="style9"> :
<input name="keyword" type="text" class="style25" value="<? echo"$keyword"; ?>" />
                  </span>
                    <input name="Submit2" type="submit" value="ค้นหา" />
                  &nbsp;&nbsp; </div>
            </form>
                <table width="650" border="0" align="center">
                  <tr>
                    <td width="538" align="left" class="style9"><strong class="style29">กระทู้ ถาม - ตอบ </strong></td>
                  </tr>
                  <tr>
                    <td align="left" class="style5">เว็บบอร์ดนี้มีไว้สำหรับแลกเปลี่ยนความคิดเห็นกรุณาใช้ถ้อยคำสุภาพ</td>
                  </tr>
                </table>
              <form action="board.php?action=del" method="post" enctype="multipart/form-data" name="form1" id="form1">
                  <?
					$a=0;
While($row= mysql_fetch_array($result)){
$id = $row["id"];
$name = $row["name"];
$name2 = $row["name2"];
$read=$row["counter"]-1;
$posts=$row["posts"]-1;
$date=$row["date"];
$time=$row["times"];
$pics=$row["pic"];
$status2=$row["status2"];
$a=$a+1;


if($bg == "#edeff4") { //ส่วนของการ สลับสี 
$bg = "#FFFFFF";
} else {
$bg = "#edeff4";
}

?>
                  <table width="650" height="30" align="center" cellpadding="0" bordercolorlight="#FFffff" bgcolor="<?=$bg?>">
                    <tr class="style5">
                      <td width="6%" height="24" align="right" class="style23"><div align="center" class="style3">
                          <?
		include "connect.php";
	$tb3="demo_post2";
	$sql3 = "select * From $tb3 where class like '%$id%'";
	$result3 = mysql_query($sql3);
	$Num_Rows3 = mysql_num_rows($result3);
	$d1=date("Y-m-d");
	if ($Num_Rows3>=5){
		echo  "<img src=imgboard/hotfd.gif border=0>";
	}else{
	if ($Num_Rows3<>0){
	echo  "<img src=imgboard/open.gif border=0>";
	}else {
	if($date==$d1){
		echo  "<img src=imgboard/new.gif border=0>";
		}else{
		echo  "<img src=imgboard/close.gif border=0>";
		}
	}
}
 
								if($login_status=="Admin") // ตรวจสอบว่าผ่านการ login หรือไม่
{
						?>
                          <input type="checkbox" name="color_array[]" value="<?=$id?>" />
                          <?
							}
							?>
                      </div></td>
                      <td width="40%" class="style3"><a href="board2.php?id=<?=$id;?>"> 
                        <?
			  if($status2=="0"){
			  echo "<img src='img/m3.gif' border='0'>";
			  }
			  echo "$name";?>
                        </font></a>
                          <?

			if($a<=4){
			echo "<img src=imgboard/update.gif>";
			}
if($pics<>""){
echo  " <img src=imgboard/cam.gif border=0>";
}
?>                      </td>
                      <td width="27%" class="style3"><?
				echo "$name2";
					?></td>
                      <td width="7%" class="style3"><?echo "$read";?> / <?echo "$Num_Rows3";?></td>
                      <td width="20%" align="right" class="style3"><?echo "$date:$time";?></td>
                    </tr>
                  </table>
                <?}?>
                  <span class="style23"><br />
                &nbsp;&nbsp;&nbsp;<span class="style9"> </span>
                <center>
                  <span class="style5"><img src="imgboard/new.gif" width="15" height="13" />=คำถามใหม่ <img src="imgboard/close.gif" width="15" height="13" />=คำถามที่ยังไม่มีคนตอบ <img src="imgboard/open.gif" width="16" height="13" />=คำถามที่ตอบแล้ว <img src="imgboard/hotfd.gif" width="16" height="16" />&nbsp;=คำถามสุดฮอต 
                  </span>
                </center>
                <span class="style3"><br />
                </span>
                <center>
                   <center>
        <span class="style13">พบทั้งหมด<b>
          <?= $Num_Rows;?>
          </b> รายการ รวมทั้งหมด : <b>
            <?=$Num_Pages;?>
            </b> หน้า :
          <?/* สร้างปุ่มย้อนกลับ */
if($Prev_Page) 
echo " <a href='$PHP_SELF?Page=$Prev_Page&keyword=$keyword'><font color=black><< ย้อนกลับ </font></a>";
for($i=1; $i<$Num_Pages; $i++){
if($i != $Page)
echo "[<a href='$PHP_SELF?Page=$i&keyword=$keyword'><font color=black>$i</font></a>]";
else 
echo "<b> $i </b>";
}
/*สร้างปุ่มเดินหน้า */
if($Page!=$Num_Pages)
echo "<a href ='$PHP_SELF?Page=$Next_Page&keyword=$keyword'> <font color=black>หน้าถัดไป>></font> </a></center>";

mysql_close();
?>
        </span>
      </center> 
                     <br />
                        <?
							if($login_status=="Admin") 
{
						?>
                      <center>  <input type="submit" name="Submit3" value="ลบกระทู้" /></center>
                        <?
							}
							?>
                        
                </center>
              </form>
              <table width="615" border="1" align="center" cellpadding="0" cellspacing="0" bordercolordark="#cccccc" bordercolor="#FFFFFF">
                  <tr>
                    <td width="611"><table width="624" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#edeff4">
                        <tr>
                          <td height="29" colspan="3" align="center" bgcolor="#d8dfea" class="style21"><strong class="style6">เพิ่มกระทู้</strong></td>
                        </tr>
                        <tr>
                          <td width="4">&nbsp;</td>
                          <td width="533"><form action="board.php?action=add" method="post" enctype="multipart/form-data" name="emotion" 

id="form1" onsubmit="return checks()">
                              <br />
                              <table width="532" height="146" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td width="107" height="24" class="style3"><div align="right" class="style3">เรื่อง : </div></td>
                                  <td width="425" class="style23"><label>
                                      <div align="left">
                                        <input name="name" type="text" id="name" size="40" />
                                        <input name="read" type="hidden" id="read"  value="1"/>
                                        <input name="posts" type="hidden" id="posts"  value="1"/>
                                      </div>
                                    </label></td>
                                </tr>
                                <tr>
                                  <td height="24" valign="top" class="style3"><div align="right" class="style3">ข้อความ : </div></td>
                                  <td class="style23"><div align="left">
                                      <label>
                                      <textarea name="detail" cols="50" rows="10" id="detail"></textarea>
                                      </label>
                                  </div></td>
                                </tr>
                                <tr>
                                  <td height="24" class="style3"><div align="right" class="style3">โดย : </div></td>
                                  <td class="style23"><div align="left">
                                      <label></label>
                                      <label>
                                      <input name="name2" type="text" id="name2" value="<?="$login_username";?>" size="35"/>
                                      </label>
                                  </div></td>
                                </tr>
                                <tr>
                                  <td height="24" class="style3"><div align="right" class="style3">รูป : </div></td>
                                  <td class="style23"><div align="left" class="style3">
                                      <label>
                                      <input name="file" type="file" size="27" />
                                      </label>
                                  </div></td>
                                </tr>
                                <tr>
                                  <td height="24" class="style3"><div align="right" class="style10 style12"><span class="style4"></span></div></td>
                                  <td class="style23"><div align="left" class="style12 style4">
                                    <label></label>
                                    <a href="javascript:;" onclick="setsmile(':1:')"><img src="emotion/1.gif" width="22" height="22" border="0" /></a> <a href="javascript:;" onclick="setsmile(':2:')"><img src="emotion/2.gif" width="22" height="22" border="0" /></a> <a href="javascript:;" onclick="setsmile(':3:')"><img src="emotion/3.gif" width="22" height="22" border="0" /></a> <a href="javascript:;" onclick="setsmile(':4:')"><img src="emotion/4.gif" width="22" height="22" border="0" /></a> <a href="javascript:;" onclick="setsmile(':5:')"><img src="emotion/5.gif" width="22" height="22" border="0" /></a> <a href="javascript:;" onclick="setsmile(':6:')"><img src="emotion/6.gif" width="22" height="22" border="0" /></a> <a href="javascript:;" onclick="setsmile(':7:')"><img src="emotion/7.gif" width="22" height="22" border="0" /></a> <a href="javascript:;" onclick="setsmile(':8:')"><img src="emotion/8.gif" width="22" height="22" border="0" /></a> <a href="javascript:;" onclick="setsmile(':9:')"><img src="emotion/9.gif" width="22" height="22" border="0" /></a> <a href="javascript:;" onclick="setsmile(':10:')"><img src="emotion/10.gif" width="22" height="22" border="0" /></a> <a href="javascript:;" onclick="setsmile(':11:')"><img src="emotion/11.gif" width="22" height="22" border="0" /></a> <a href="javascript:;" onclick="setsmile(':12:')"><img src="emotion/12.gif" width="22" height="22" border="0" /></a>
                                    <div align="left"></div>
                                    </div></td>
                                </tr>
                                <tr>
                                  <td height="26" class="style3">&nbsp;</td>
                                  <td class="style23"> 
                                    <table width="121" border="0">
                                      <tr>
                                        <td><input type="reset" name="Submit23" value="ยกเลิก" /></td>
                                        <td><input type="submit" name="Submit22" value="ตั้งกระทู้" /></td>
                                      </tr>
                                    </table>  
                                     </td>
                                </tr>
                              </table>
                          </form>
                             
                            <script language="JavaScript" type="text/javascript">
				function checks(){
								
						if (document.emotion.name.value==""){
								alert("กรุณากรอกข้อมูลให้ครบ");
								document.emotion.name.focus();
								return false;
						}	
						
						if (document.emotion.name2.value==""){
								alert("กรุณากรอกข้อมูลให้ครบ");
								document.emotion.name2.focus();
								return false;
						}	
							
						if (document.emotion.detail.value==""){
								alert("กรุณากรอกข้อมูลให้ครบ");
								document.emotion.detail.focus();
								return false;
						}		
						
						if (document.emotion.code.value != document.emotion.code1.value){
								alert("กรอกรหัสลับไม่ถูกต้อง");
								document.emotion.code.focus();
								return false;
						}	
				}
			  </script>
                          </td>
                          <td width="87">&nbsp;</td>
                        </tr>
                        
                    </table></td>
                  </tr>
                </table>
            </td>
          </tr>
          <tr> </tr>
        </table>
      <?
			}
			
			 
			?></td>
  </tr>
 
</table></td>
        </tr>
       
      </table><!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <td height="56" colspan="2" align="center" bgcolor="#FFFFFF"><img src="image/foot.jpg" width="900" height="80" /></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>