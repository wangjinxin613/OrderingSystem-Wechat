<?php
  require('../config/index_class.php');
  $type = $_POST['y_type'];
  $wu_money = $_POST['wu_money'];
  $man_max = $_POST['man_max'];
  $man_min = $_POST['man_min'];
  $time = $_POST['time'];
  $number1 = $_POST['number1'];
  $points = $_POST['points'];
  $beizhu = $_POST['beizhu'];
  if($type==1 && $wu_money != null){
  	$q="insert into youhui_list(id,type,wu_money,time,number1,points,beizhu,store_id) values (null,'1','$wu_money','$time','$number1','$points','$beizhu','$user->store_id')";//向数据库插入表单传来的值的sql
  	$re=mysql_query($q);//执行sql
  	admin_log_add("添加优惠券‘无门槛减{$wu_money}’成功");
  }else if($type==2 && $man_max != null && $man_min != null){
  	$q="insert into youhui_list(id,type,man_max,man_min,time,number1,points,beizhu,store_id) values (null,'2','$man_max','$man_min','$time','$number1','$points','$beizhu','$user->store_id')";//向数据库插入表单传来的值的sql
  	$re=mysql_query($q);//执行sql
  		admin_log_add("添加优惠券‘满{$man_max}减{$man_min}’成功");
  }else{
  	exit('<script>alert(\'数据填写有误，请重新填写！\');history.back();</script>');
  }
  if (!$re){
	    	die('Error: ' . mysql_error());//如果sql执行失败输出错误
	}else{
    //此处添加操作日志
    
	 	 	exit('<script>alert(\'执行成功！\');history.back();</script>');
	}
?>