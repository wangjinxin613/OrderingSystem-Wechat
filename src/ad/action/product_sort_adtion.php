<?php
 	require('../config/index_class.php');
	header("Content-Type: text/html; charset=UTF8");
    $sort_name = $_POST['sort_name'];
  	$sort_body=$_POST['sort_body'];
    $sort_sx=$_POST['sort_sx'];
  	$fen_id = $_POST['fen_id'];
  	$time= date("Y-m-d H:i");//获取当前时间
	include('../config/conn.php');//链接数据库
	$q="insert into product_sort(id,sort_name,sort_body,sort_sx,time,store_id,fen_id) values (null,'$sort_name','$sort_body','$sort_sx','$time','$user->store_id','$fen_id')";//向数据库插入表单传来的值的sql
  	$re=mysql_query($q,$con);//执行sql
	if (!$re){
	    	die('Error: ' . mysql_error());//如果sql执行失败输出错误
	}else{
      //此处可以插入用户后台管理员操作日志，后续如果有需要就添加吧
      admin_log_add("添加分类‘{$sort_name}’成功");
      exit('<script>alert(\'执行成功！\');window.location.href="../products_sort.php";</script>');
	}
?>
