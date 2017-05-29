<?
$host1="localhost";
$username_1="root";
// $password_1="root";
$password_1="";
$db="db_webit";
$connect= mysql_connect( $host1,$username_1,$password_1) or die ("database connect error.");
mysql_select_db($db) or die("database connect error.");
mysql_query("SET character_set_results=utf8");
mysql_query("SET character_set_client=utf8");
mysql_query("SET character_set_connection=utf8");
mysql_query("collation_connection = utf8_bin");
mysql_query("collation_database = utf8_bin");
mysql_query("collation_server = utf8_bin");
?>
