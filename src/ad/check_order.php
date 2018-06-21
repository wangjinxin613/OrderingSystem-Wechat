<?php
	error_reporting(0);
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
	 $dayin = $_GET['dayin'];
	
	 $result2 = mysql_query("SELECT * FROM dayinji where name = '$dayin' and store_id = '$store_id'");
	 while($v = mysql_fetch_array($result2))
	 {
	 	$sort = $v['sort'];
	 	$fen_id = $v['fen_id'];
	 }
	
	$sql1 = mysql_query("SELECT * FROM orderlist where store_id = '$store_id' and check_blog = '0' and status = '1' and order_type = '2'") or die(mysql_error());
     $row1 = mysql_num_rows($sql1);
     if($row1 > 0){
  echo 'success';
     }
  // 


?>
