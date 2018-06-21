<?php
  require('../config/index_class.php');
  $rank_name = $_POST['rank_name'];
  $rank_beizhu = $_POST['rank_beizhu'];
  $rank_dept = $_POST['rank_dept'];
  $rank_zhe = $_POST['rank_zhe'];
  if($rank_zhe > 1){
  	exit('<script>alert(\'享受折扣不能大于1\');history.back();</script>');
  }
   if($rank_zhe == 0){
  	exit('<script>alert(\'享受折扣不能等于0\');history.back();</script>');
  }
  echo $rank_name;
  include ('../config/conn.php');
  $q="insert into member_rank(rank_id,rank_name,rank_beizhu,rank_dept,rank_zhe,store_id) values (null,'$rank_name','$rank_beizhu','$rank_dept','$rank_zhe','$user->store_id')";//向数据库插入表单传来的值的sql
  	$re=mysql_query($q);//执行sql
	if (!$re){
	    	die('Error: ' . mysql_error());//如果sql执行失败输出错误
	}else{
    //此处添加操作日志
    admin_log_add("添加会员等级‘{$rank_name}’成功");
	 	 	exit('<script>alert(\'执行成功！\');history.back();</script>');
	}
?>
