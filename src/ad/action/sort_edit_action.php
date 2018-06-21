<?php
  require('../config/index_class.php');
	header("Content-Type: text/html; charset=UTF8");
    $sort_name = $_POST['sort_name'];
  	$sort_body=$_POST['sort_body'];
  	$sort_sx=$_POST['sort_sx'];
  	$time= date("Y-m-d H:i");//获取当前时间
  	include ('../config/conn.php');//链接数据库
  	function update($name,$val){
		 	$id=$_GET['id'];
	 	$sql = "update product_sort set $name = '$val' where id = {$id}";
   		$result = mysql_query($sql);

   	}
   	update("sort_name",$sort_name);
   	update("sort_body",$sort_body);
   	update("sort_sx",$sort_sx);
   	update("time",$time);
    admin_log_add("编辑分类‘{$sort_name}’成功");
   	exit('<script>alert(\'执行成功！\');history.back();</script>');
?>
