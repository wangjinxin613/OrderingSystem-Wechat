<?php
  require('../config/index_class.php');
	header("Content-Type: text/html; charset=UTF8");
    $sx = $_POST['sx'];
$time= date("Y-m-d H:i");//获取当前时间
	include('../config/conn.php');//链接数据库
	//上传图片
	move_uploaded_file($_FILES["image"]["tmp_name"],
	"../../upload/" . $_FILES["image"]["name"]);
	$imgurl = "../upload/" . $_FILES["image"]["name"];
	$q="insert into advertising(id,sx,imgurl,time,store_id) values (null,'$sx','$imgurl','$time','$user->store_id')";//向数据库插入表单传来的值的sql
  	$re=mysql_query($q,$con);//执行sql
	if (!$re){
	    	die('Error: ' . mysql_error());//如果sql执行失败输出错误
	}else{
    //此处添加操作日志
    admin_log_add("添加幻灯片成功");
	 	 	exit('<script>alert(\'执行成功！\');window.location.href="../advertising.php";</script>');
	}
?>
