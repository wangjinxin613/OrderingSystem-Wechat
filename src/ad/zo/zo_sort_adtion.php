<?php
 	require('../config/index_class.php');
	header("Content-Type: text/html; charset=UTF8");
    $sort_name = $_POST['sort_name'];
  	$sort_body=$_POST['sort_body'];
  	$sort_sx=$_POST['sort_sx'];
  	$time= date("Y-m-d H:i");//获取当前时间
	include('../config/conn.php');//链接数据库
	$q="insert into zo_product_sort(id,sort_name,sort_body,sort_sx,time) values (null,'$sort_name','$sort_body','$sort_sx','$time')";//向数据库插入表单传来的值的sql
  	$re=mysql_query($q,$con);//执行sql
	if (!$re){
	    	die('Error: ' . mysql_error());//如果sql执行失败输出错误
	}else{
      //此处可以插入用户后台管理员操作日志，后续如果有需要就添加吧

      exit('<script>alert(\'执行成功！\');window.location.href="../zo_shotsort.php";</script>');

	}
?>
