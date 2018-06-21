<?php
	echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";	

	include "../config/conn.php";
	 $odd_id= $_POST['id'];
	  
	$sql = "delete from store_setting  where store_id='".$odd_id."'";
 
	mysql_query($sql,$con);
 	$sql1 = "delete from admin where store_id='".$odd_id."'";
	mysql_query($sql1,$con);
	$sql2 = "delete from member where store_id='".$odd_id."'";
	mysql_query($sql2,$con);

	$mark  = mysql_affected_rows();//返回影响行数
 

 	exit('<script>alert(\'执行成功！\');history.back();</script>');
	
 
	mysql_close($con);
?>
