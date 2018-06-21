<?
error_reporting(0);
  	sleep(1);
	require('config/conn.php');
	header("Content-Type: text/html; charset=utf8");
	session_start();
	 $admin_id = $_SESSION['admin_id'];
	 mysql_select_db("my_db", $con);
	 $result1 = mysql_query("SELECT * FROM admin where id = '$admin_id'");
	 while($v = mysql_fetch_array($result1))
	 {
	 	$store_id = $v['store_id'];
	 }
	function update(){
 		global $store_id;

     $sql = "update orderlist set check_blog = '1' and status = '1' where store_id = '$store_id'";
     mysql_query($sql);
 }
 update();
?>