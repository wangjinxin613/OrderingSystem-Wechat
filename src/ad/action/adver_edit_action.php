<?php
 	ini_set("error_reporting","E_ALL & ~E_NOTICE");
	header("Content-Type: text/html; charset=UTF8");
    $sx = $_POST['sx'];

  	$time= date("Y-m-d H:i");//获取当前时间
  	include ('../config/conn.php');//链接数据库
  	function update($name,$val){
		 	$id=$_POST['id'];
	 	$sql = "update advertising set $name = '$val' where id = {$id}";
   		$result = mysql_query($sql);

   	}
   	update("sx",$sx);

   	update("time",$time);

 	exit('<script>alert(\'更改成功！\');history.back();</script>');
?>
