<?
$login_status=$_SESSION[login_status];
include "connect.php";
if ($_SESSION[login_username]=="admin")
{
  $tb="admin";
  $sql="select * from $tb where username='".$_SESSION[login_username]."'";
  $result = mysql_query($sql);
  While ($row= mysql_fetch_array($result))
  {
    $login_password= $row["password"];
    $login_status= $row["status"];
  }
}
else
{
  $tb="member";
  $sql="select * from $tb where username='".$_SESSION[login_username]."'";
  $result = mysql_query($sql);
  While ($row= mysql_fetch_array($result))
  {
    $login_password= $row["password"];
    $login_status= $row["status"];
    $login_name= $row["name"]." ".$row["lname"];
  }
}
?>
