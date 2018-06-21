<?php
  require('../config/index_config.php');
  $date = date("m月d日");
  /**
   * 插入签到记录
   * @var string
   */

  $q="insert into qd(id,account_id,date,store_id) values (null,'$user->user_id','$date','$store_id')";//向数据库插入表单传来的值的sql
  $reslut=mysql_query($q,$con);//执行sql
  qd_num();//更新累计天数
  qd_points();//更新账户积分和累计获得积分
  	exit('<script>alert(\'操作成功\');history.back();</script>');
?>
