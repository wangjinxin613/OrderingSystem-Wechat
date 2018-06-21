<?php
	echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";	

	include "../config/conn.php";
	 $id= $_POST['id'];
	  //$odd_db= $_POST['odd_db'];
	$sql = "delete from member where account_id='".$id."'";
 
	mysql_query($sql,$con);
 
	$mark  = mysql_affected_rows();//返回影响行数
 
	if($mark>0){
 	exit('<script>alert(\'执行成功！\');history.back();</script>');
	}else{
 	echo  "删除失败";
}
 
mysql_close($con);
?>
