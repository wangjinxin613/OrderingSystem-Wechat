<?php
	echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";	

	include "../config/conn.php";
	 $odd_id= $_POST['odd_id'];
	  
	$sql = "delete from zo_dept where dept_id='".$odd_id."'";
 
	mysql_query($sql,$con);
 
	$mark  = mysql_affected_rows();//返回影响行数
 
	if($mark>0){
 	exit('<script>alert(\'执行成功！\');history.back();</script>');
	}else{
 	echo  "删除失败";
}
 
mysql_close($con);
?>
