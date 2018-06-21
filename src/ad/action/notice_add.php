<?php
  require('../config/index_class.php');
    $uid = $_POST['uid'];
     $time= date("Y/m/d H:i:s");//获取当前时间
    $uname = $_POST['uname'];
    $no_title = $_POST['no_title'];
    $no_body = $_POST['no_body'];
    $q="insert into notice(id,uid,uname,no_title,no_body,store_id,no_time) values (null,'$uid','$uname','$no_title','$no_body','$user->store_id','$time')";//向数据库插入表单传来的值的sql
      $re=mysql_query($q);//执行sql
    admin_log_add("向‘{$uname}’发送通知成功");
     if (!$re){
   	    	die('Error: ' . mysql_error());//如果sql执行失败输出错误
   	}else{
       //此处添加操作日志

   	 	 	exit('<script>alert(\'执行成功！\');history.back();</script>');
   	}
?>
