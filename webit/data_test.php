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
	$tb="tb_exercise";
	$sql="delete from $tb where id='$id'";
	$db_query=mysql_db_query($db,$sql); 
	echo "<META HTTP-EQUIV=refresh CONTENT=\"0	; URL=data_test.php\">";
	
	
	}
	
	
	if($action=="update"){
	$id=$_GET["id"];
	

	
	$name=$_POST["name"];
	$c1=$_POST["c1"];
	$c2=$_POST["c2"];
	$c3=$_POST["c3"];
	$c4=$_POST["c4"];
	$ans=$_POST["ans"];
	$num=$_POST["num"];
	
	include "connect.php";
$tb="tb_exercise";
$add = mysql_query("UPDATE `$db`.`$tb` SET `name` = '$name',`ch1` = '$c1',`ch2` = '$c2',`ch3` = '$c3',`ch4` = '$c4',`answer` = '$ans',`num` = '$num'  WHERE `id` = '$id' ");

echo "<META HTTP-EQUIV=refresh CONTENT=\"0	; URL=data_test.php\">";
	
	}
	
	if($action=="insert"){

	
	$name=$_POST["name"];
	$c1=$_POST["c1"];
	$c2=$_POST["c2"];
	$c3=$_POST["c3"];
	$c4=$_POST["c4"];
	$ans=$_POST["ans"];
	$num=$_POST["num"];
	
		include "connect.php";	
	$tb="tb_exercise";
	mysql_query("INSERT INTO $tb (name,ch1,ch2,ch3,ch4,answer,num) values('$name','$c1','$c2','$c3','$c4','$ans','$num')") or die ("<center>ไม่สามารถ Upload ได้</center> ");
	echo "<META HTTP-EQUIV=refresh CONTENT=\"0	; URL=data_test.php\">";
	
	}
	
	if($action=="edit"){
	
	$id=$_GET["id"];
	$num=$_GET["num"];
	
	include "connect.php";
$tb="tb_exercise";
$sql="select * from $tb where id='$id'";
$result = mysql_query($sql);
While($row= mysql_fetch_array($result)){
$id = $row["id"];
 $name = $row["name"];
 $ch1 = $row["ch1"];
 $ch2 = $row["ch2"];
 $ch3 = $row["ch3"];
 $ch4 = $row["ch4"];
 $ans = $row["answer"];
  $pic = $row["pic"];
  $nm = $row["num"];
 
}
	?>
	<form action="data_test.php?action=update&id=<?=$id?>" method="post" enctype="multipart/form-data" name="form2" id="form2">
	  <br />
	<table width="650" border="0" align="center" bgcolor="#EAEAFF">
        <tr>
          <td height="53" colspan="2" align="center" class="style29">แก้ไขข้อมูล</td>
        </tr>
        <tr>
          <td height="25" align="right" class="style13">ข้อสอบบทเรียน :</td>
          <td height="25"><label>
            <select name="num" id="num">
              <?
            include "connect.php";
$tb="data";
$sql="select * from $tb order by num asc";
$result = mysql_query($sql);
While($row= mysql_fetch_array($result)){
$num = $row["num"];
$name = $row["name"];
$aa++;
			?>
              <option value="<?=$num?>" <? if($num==$nm){ echo "selected"; } ?>><? echo "บทที่ $aa. $name"; ?></option>
              <?
	}
		  ?>
            </select>
          </label></td>
        </tr>
        <tr>
          <td width="230" height="25" align="right" class="style13">โจทย์ :</td>
          <td width="537" height="25"><label>
            <input name="name" type="text" id="name" value="<?=$name?>" size="50" />
            </label></td>
        </tr>
        <tr>
          <td height="25" align="right" class="style13">ช้อยส์ที่ 1 :</td>
          <td height="25"><input name="c1" type="text" id="c1" value="<?=$ch1?>" size="50" /></td>
        </tr>
        <tr>
          <td height="25" align="right" class="style13">ช้อยส์ที่ 2 :</td>
          <td height="25"><input name="c2" type="text" id="c2" value="<?=$ch2?>" size="50" /></td>
        </tr>
        <tr>
          <td height="25" align="right" class="style13">ช้อยส์ที่ 3 :</td>
          <td height="25"><input name="c3" type="text" id="c3" value="<?=$ch3?>" size="50" /></td>
        </tr>
        <tr>
          <td height="25" align="right" class="style13">ช้อยส์ที่ 4 :</td>
          <td height="25"><input name="c4" type="text" id="c4" value="<?=$ch4?>" size="50" /></td>
        </tr>
        <tr>
          <td height="25" align="right" class="style13">เฉลย :</td>
          <td height="25"><label>
            <select name="ans" id="ans">
              <option value="1" <? if($ans==1){ echo "selected=\"selected\""; } ?> >ข้อยส์ที่ 1</option>
			  <option value="2" <? if($ans==2){ echo "selected=\"selected\""; } ?>>ข้อยส์ที่ 2</option>
			  <option value="3" <? if($ans==3){ echo "selected=\"selected\""; } ?>>ข้อยส์ที่ 3</option>
                <option value="4" <? if($ans==4){ echo "selected=\"selected\""; } ?>>ข้อยส์ที่ 4</option>
            </select>
          </label></td>
        </tr>
        <tr>
          <td height="25" class="style13">&nbsp;</td>
          <td height="25"><table width="115" border="0">
            <tr>
              <td width="52"><label>
                <input type="submit" name="Submit" value=" บันทึก " />
              </label></td>
              <td width="60"><input type="button" name="Submit2" value=" ยกเลิก "  onclick="parent.location='data_test.php'"  /></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td height="25" class="style13">&nbsp;</td>
          <td height="25">&nbsp;</td>
        </tr>
      </table>
    <br />
	</form>
	<?
	}
	
	if($action=="add"){
	
	$a=1;
	
	include "connect.php";
$tb="tb_exercise";
$sql="select * from $tb";
$result = mysql_query($sql);
While($row= mysql_fetch_array($result)){
$id = $row["id"];
$a++;
}



	?>
	<form action="data_test.php?action=insert" method="post" enctype="multipart/form-data" name="form1" id="form1">
	  <br />
	  <table width="650" border="0" align="center" bgcolor="#EAEAFF">
        <tr>
          <td height="53" colspan="2" align="center" class="style29">เพิ่มข้อแบบทดสอบ</td>
          </tr>
        <tr>
          <td width="230" height="25" align="right" class="style13">ข้อสอบบทเรียน :</td>
          <td width="537" height="25"><label>
            <select name="num" id="num">
            <?
            include "connect.php";
$tb="data";
$sql="select * from $tb order by num asc";
$result = mysql_query($sql);
While($row= mysql_fetch_array($result)){
$num = $row["num"];
$name = $row["name"];
$aa++;
			?>
              <option value="<?=$num?>"><? echo "บทที่ $aa. $name"; ?></option>
          <?
	}
		  ?>
            </select>
          </label></td>
        </tr>
        <tr>
          <td height="25" align="right" class="style13">โจทย์ :</td>
          <td height="25"><label>
            <input name="name" type="text" id="name" size="50" />
            </label></td>
        </tr>
        <tr>
          <td height="25" align="right" class="style13">ช้อยส์ที่ 1 :</td>
          <td height="25"><input name="c1" type="text" id="c1" size="50" /></td>
        </tr>
        <tr>
          <td height="25" align="right" class="style13">ช้อยส์ที่ 2 :</td>
          <td height="25"><input name="c2" type="text" id="c2" size="50" /></td>
        </tr>
        <tr>
          <td height="25" align="right" class="style13">ช้อยส์ที่ 3 :</td>
          <td height="25"><input name="c3" type="text" id="c3" size="50" /></td>
        </tr>
        <tr>
          <td height="25" align="right" class="style13">ช้อยส์ที่ 4 :</td>
          <td height="25"><input name="c4" type="text" id="c4" size="50" /></td>
        </tr>
        <tr>
          <td height="25" align="right" class="style13">เฉลย :</td>
          <td height="25"><label>
            <select name="ans" id="ans">
              <option value="1">ข้อยส์ที่ 1</option>
			  <option value="2">ข้อยส์ที่ 2</option>
			  <option value="3">ข้อยส์ที่ 3</option>
               <option value="4">ข้อยส์ที่ 4</option>
            </select>
          </label></td>
        </tr>
        <tr>
          <td height="25">&nbsp;</td>
          <td height="25"><table width="115" border="0">
            <tr>
              <td width="52"><label>
                <input type="submit" name="Submit" value=" เพิ่ม " />
              </label></td>
              <td width="60"><input type="button" name="Submit2" value=" ยกเลิก "  onclick="parent.location='data_test.php'"  /></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td height="25">&nbsp;</td>
          <td height="25">&nbsp;</td>
        </tr>
      </table>
      <br />
	  <br />
	</form>
	<?
	
	}
	
	if($action==""){
	?>
      <table width="680" border="0" align="center">
        <tr>
          <td width="923" align="center" class="style29"><br />
          ข้อมูลแบบทดสอบ</td>
        </tr>
        <tr>
          <td><table width="200" border="0">
            <tr>
              <td width="13" height="25"><img src="image/add2.png" width="15" height="15" /></td>
              <td width="171" class="style29"><a href="data_test.php?action=add" target="_parent" class="style16">เพิ่มข้อสอบ</a></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td><table width="1000" border="0">
            <tr class="style16">
              <td width="33" height="25" align="center" bgcolor="#CCCCFF" class="">No.</td>
              <td width="135" align="center" bgcolor="#CCCCFF" class="">บทเรียน</td>
              <td width="203" height="25" align="center" bgcolor="#CCCCFF" class="">โจทย์</td>
              <td width="119" height="25" align="center" bgcolor="#CCCCFF" class="">ช้อยส์ที่ 1 </td>
              <td width="115" height="25" align="center" bgcolor="#CCCCFF" class="">ช้อยส์ที่ 2 </td>
              <td width="109" align="center" bgcolor="#CCCCFF" class="">ช้อยส์ที่ 3 </td>
              <td width="108" height="25" align="center" bgcolor="#CCCCFF" class="">ช้อยส์ที่ 4</td>
              <td width="64" height="25" align="center" bgcolor="#CCCCFF" class="">คำตอบ</td>
              <td width="31" height="25" align="center" bgcolor="#CCCCFF" class="">ลบ</td>
              <td width="41" height="25" align="center" bgcolor="#CCCCFF" class="">แก้ไข</td>
            </tr>
			<?
			
			include "connect.php";
$tb="tb_exercise";
$sql="select * from $tb order by num,id asc";
$result = mysql_query($sql);
While($row= mysql_fetch_array($result)){
$id = $row["id"];
$name= $row["name"];
$ch1= $row["ch1"];
$ch2= $row["ch2"];
$ch3= $row["ch3"];
$ch4= $row["ch4"];
$ans= $row["answer"];
$pic= $row["pic"];
$nm= $row["num"];

 
$tb2="data";
$sql2="select * from $tb2 where num='$nm' order by num asc";
$result2 = mysql_query($sql2);
While($row2= mysql_fetch_array($result2)){
$namedata = $row2["name"];
}

$num++;



			?>
            <tr class="style13">
              <td height="25" align="center" bgcolor="#EAEAFF" class="">&nbsp;<?=$num?></td>
              <td align="left" bgcolor="#EAEAFF" class=""><?=$namedata?></td>
              <td height="25" align="left" bgcolor="#EAEAFF" class=""><?=$name?></td>
              <td height="25" align="left" bgcolor="#EAEAFF" class="">&nbsp;<?=$ch1?></td>
              <td height="25" align="left" bgcolor="#EAEAFF" class="">&nbsp;<?=$ch2?></td>
              <td align="left" bgcolor="#EAEAFF" class="">&nbsp;
                <?=$ch3?></td>
              <td height="25" align="left" bgcolor="#EAEAFF" class="">&nbsp;<?=$ch4?></td>
              <td height="25" align="center" bgcolor="#EAEAFF" class="">&nbsp;ช้อยส์ที่ <?=$ans?></td>
              <td height="25" align="center" bgcolor="#EAEAFF" class=""><a href="data_test.php?action=del&amp;id=<?=$id?>" target="_parent"><img src="image/bin.png" width="16" height="16" border="0" title="delete" onclick="if(confirm('คุณต้องการลบข้อมูลหรือไม่?')) return true; else return false;"/></a></td>
              <td height="25" align="center" bgcolor="#EAEAFF" class=""><a href="data_test.php?action=edit&amp;id=<?=$id?>&num=<?=$num?>" target="_parent"><img src="image/edit.png" width="16" height="16" border="0" /></a></td>
            </tr>
			<?
			}
			?>
          </table></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table>
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