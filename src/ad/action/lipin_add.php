<?php
  require('../config/index_class.php');
 
  $name = $_POST['l_name'];
 
 
  $number1 = $_POST['number1'];
  $points = $_POST['points'];
  $beizhu = $_POST['beizhu'];
 
  	$q="insert into lipin_list(id,name,number1,points,beizhu,store_id) values (null,'$name','$number1','$points','$beizhu','$user->store_id')";//向数据库插入表单传来的值的sql
  	$re=mysql_query($q);//执行sql
  		admin_log_add("添加礼品券‘{$name}’成功");
 
  if (!$re){
	    	die('Error: ' . mysql_error());//如果sql执行失败输出错误
	}else{
    //此处添加操作日志
    
	 	 	exit('<script>alert(\'执行成功！\');history.back();</script>');
	}
?>