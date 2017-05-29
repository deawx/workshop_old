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
      <?
	$action=$_GET["action"];
	
	if($action=="del"){
	$id=$_GET["id"];
		include "connect.php";
	$tb="member";
	$sql="delete from $tb where username='$id'";
	$db_query=mysql_db_query($db,$sql);
 
    echo "<META HTTP-EQUIV=refresh CONTENT=\"1; URL=data_member.php\">";
	}
	
	if($action=="view"){
	$id=$_GET["id"];
	
	include "connect.php";
$tb="member";
$sql="select * from $tb where username='$id'";
$result = mysql_query($sql);
While($row= mysql_fetch_array($result)){
$password = $row["password"];
$name= $row["name"];
$lname= $row["lname"];
$address= $row["address"];
$province= $row["province"];
$zipcode= $row["zipcode"];
$email= $row["email"];
$tel= $row["tel"];
$name2= $row["name2"];
$address2= $row["address2"];
$province2= $row["province2"];
$zipcode2= $row["zipcode2"];
}


	?>
      <br />
      <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="881" height="17" align="center" class="style28" >&nbsp;</td>
        </tr>
        <tr>
          <td height="342" align="center" valign="top" background="img/nn3.jpg"> 
              <table width="630" height="30" border="0" align="center" >
                <tr>
                  <td width="623" height="26" align="center" valign="bottom" class="style17"> ข้อมูลสมาชิก</td>
                </tr>
            </table>
              <table width="630" height="357" border="0" align="center" >
                <tr>
                  <td height="26" colspan="2" align="center" class="style29">&nbsp;</td>
                </tr>
                <tr>
                  <td width="186" align="right" class="style23"><span class="style13">Username : </span></td>
                  <td width="434" class="style23"><span class="style13">
                    <label>
                      <?=$id?>
                    </label>
                  </span></td>
                </tr>
                <tr>
                  <td align="right" class="style23"><span class="style13">ชื่อ : </span></td>
                  <td class="style23"><span class="style13">
                  <?=$name?>
                  </span></td>
                </tr>
                <tr>
                  <td align="right" class="style23"><span class="style13">นามสกุล : </span></td>
                  <td class="style23"><span class="style13">
                  <?=$lname?>
                  </span></td>
                </tr>
                <tr>
                  <td align="right" class="style23"><span class="style13">ที่อยู่ : </span></td>
                  <td class="style23"><span class="style13"><? echo nl2br("$address"); ?></span></td>
                </tr>
                <tr>
                  <td align="right" class="style23"><span class="style13">จังหวัด : </span></td>
                  <td class="style23"><span class="style13">
                  <?=$province?>
                  </span></td>
                </tr>
                <tr>
                  <td align="right" class="style23"><span class="style13">รหัสไปรษณีย์ : </span></td>
                  <td class="style23"><span class="style13">
                  <?=$zipcode?>
                  </span></td>
                </tr>
                <tr>
                  <td align="right" class="style23"><span class="style13">E-mail : </span></td>
                  <td class="style23"><span class="style13">
                  <?=$email?>
                  </span></td>
                </tr>
                <tr>
                  <td align="right" class="style23"><span class="style13">เบอร์โทรศัพท์ : </span></td>
                  <td class="style23"><span class="style13">
                  <?=$tel?>
                  </span></td>
                </tr>
                <tr>
                  <td align="right" class="style23">&nbsp;</td>
                  <td class="style23"><input type="button" name="Submit" value=" ย้อนกลับ "  onclick="parent.location='data_member.php'"  /></td>
                </tr>
            </table>
              <p><br />
            </p></td>
        </tr>
        <tr>
          <td height="21" align="center" valign="top">&nbsp;</td>
        </tr>
      </table>
	  <?
	}

	if($action==""){
	?>
      <br />
      <table width="700" height="44" border="0" align="center">
        <tr>
          <td align="center"><span class="style17"> รายชื่อสมาชิก</span></td>
      </tr>
        <tr>
          <td align="right"><form id="form2" name="form2" method="post" action="">
            <table width="500" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="441" align="right"><label class="style13">
                ค้นหา 
                    <input name="keyword" type="text" id="keyword" />
                </label></td>
                <td width="59"><label>
                  <input type="submit" name="Submit2" value=" ค้นหา " />
                </label></td>
              </tr>
            </table>
                    </form>   </td>
        </tr>
      </table>
      <table width="680" border="1" align="center" class="two">
        
        
        <tr bgcolor="#FF99FF" class="style13">
          <td width="102" height="22" align="center" bgcolor="#C1D6EE" class="style13">Username</td>
          <td width="213" height="30" align="center" bgcolor="#C1D6EE" class="style13">ชื่อ - นามสกุล </td>
          <td width="178" align="center" bgcolor="#C1D6EE" class="style13">E-mail</td>
          <td width="146" align="center" bgcolor="#C1D6EE" class="style13">เบอร์โทรศัพท์</td>
          <td width="39" align="center" bgcolor="#C1D6EE" class="style13">ลบ</td>
        </tr>
 
	  
	  <?
		$keyword=$_POST["keyword"];
		if($keyword==""){
			$keyword=$_GET["keyword"];
		}
		include "connect.php";
		$tb="member";
		$sql="select * from $tb where username like '%$keyword%' order by username desc";
		
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
$sql = "select * From $tb   where username like '%$keyword%' order by  username desc LIMIT $Page_start , $Per_Page";
		$result = mysql_query($sql);
		While($row= mysql_fetch_array($result)){
		$username=$row["username"];
		$name=$row['name'];
		$lname=$row['lname'];
		$province=$row['province'];
		$tel=$row['tel'];
		$email=$row['email'];
		 
if($bg == "#F7FBFD") { //ส่วนของการ สลับสี 
$bg = "#FFFFFF";
} else {
$bg = "#F7FBFD";
}

	
	
		?>
       
        <tr bgcolor="<?=$bg?>" class="style13">
          <td width="101" height="22" align="left" class="style13">&nbsp;<a href="data_member.php?id=<?=$username?>&action=view"><u><?=$username?></u></a></td>
          <td width="216" align="left" class="style13"><?="$name $lname";?></td>
          <td width="177" align="left" class="style13"><?=$email?></td>
          <td width="149" align="center" class="style13"><?=$tel?></td>
          <td width="35" align="center" class="style13"><a href="data_member.php?action=del&id=<?=$username?>" target="_parent"><img src="image/bin.png" width="16" height="16" border="0" title="delete" onclick="if(confirm('คุณต้องการลบข้อมูลหรือไม่?')) return true; else return false;"/></a></td>
        </tr>
    
	  <?
		}
		?>
          </table>
      <br />
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
        <?
	  }
	  ?>
         
    
    <!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <td height="56" colspan="2" align="center" bgcolor="#FFFFFF"><img src="image/foot.jpg" width="900" height="80" /></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>