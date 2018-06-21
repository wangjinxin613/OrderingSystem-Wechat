<?php
  require('../config/index_class.php');
    $rank = $_POST['rank'];
     $time= date("Y/m/d H:i:s");//获取当前时间
    $no_title = $_POST['no_title'];
    $no_body = $_POST['no_body'];
    $q="insert into notice(id,no_title,no_body,store_id,no_time,dept,rank) values (null,'$no_title','$no_body','$user->store_id','$time','1','$rank')";//向数据库插入表单传来的值的sql
      $re=mysql_query($q);//执行sql
    admin_log_add("向‘{$uname}’发送通知成功");
     if (!$re){
   	    	die('Error: ' . mysql_error());//如果sql执行失败输出错误
   	}else{
       //此处添加操作日志

   	 	 	exit('<script>alert(\'执行成功！\');history.back();</script>');
   	}
?>
