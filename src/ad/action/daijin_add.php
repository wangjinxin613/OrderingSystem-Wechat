<?php
  require('../config/index_class.php');
  $type = $_POST['y_type'];
  $money = $_POST['money'];
 
  $time = $_POST['time'];
  $number1 = $_POST['number1'];
  $points = $_POST['points'];
  $beizhu = $_POST['beizhu'];
 
  	$q="insert into daijin_list(id,money,time,number1,points,beizhu,store_id) values (null,'$money','$time','$number1','$points','$beizhu','$user->store_id')";//向数据库插入表单传来的值的sql
  	$re=mysql_query($q);//执行sql
  		admin_log_add("添加代金券‘{$money}元面值’成功");
 
  if (!$re){
	    	die('Error: ' . mysql_error());//如果sql执行失败输出错误
	}else{
    //此处添加操作日志
    
	 	 	exit('<script>alert(\'执行成功！\');history.back();</script>');
	}
?>