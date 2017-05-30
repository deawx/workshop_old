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
 <?php if ($login_status=="นักเรียน" or $login_status=="Admin") {  ?>
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
          <?php } ?>
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
    <?php } if ($login_status=="Admin") { ?>
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

      <?php if($login_status=="นักเรียน"){ ?>
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
      <table width="690" border="0" align="right">
        <tr>
          <td align="center" valign="top">&nbsp; </td>
        </tr>
        <tr>
          <td align="center" valign="top"><img src="image/idc-reports.jpg" width="635" height="357" /></td>
        </tr>
        <tr>
          <td align="center" valign="top">&nbsp;</td>
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
