<?php
  require('../config/index_config.php');
  $ti_money = $_POST['ti_money'];
  $ti_type = $_POST['ti_type'];
  $ti_user = $_POST['ti_user'];
  $beizhu = $_POST['beizhu'];
  if($ti_money>$user->money_still){ // 提现金额大于会员卡余额是会这样
    exit('<script>alert(\'您的余额不足 不能完成提现\');history.back();</script>');
  }
   $q="insert into tixian(id,ti_money,ti_type,ti_user,beizhu,time,store_id,account_id,wx_name,store_id) values (null,'$ti_money','$ti_type','$ti_user','$beizhu','$time','$store_id','$user->user_id','$user->nickname','$store_id')";//向数据库插入表单传来的值的sql
  $re=mysql_query($q,$con);//执行sql
  exit('<script>alert(\'提现发起成功，请等候管理员进行操作\');history.back();</script>');

?>
