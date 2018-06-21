<?php
  /**
   * 该页面用于处理预定信息的添加
   * @var [type]
   */
    require('../config/index_config.php');
  $nowhour = date("H:i");//获取当前时间
  $yu_time = $_POST['yu_time'];
  $nowdate= date("Y/m/d");//获取当前日期
  if(strtotime($nowhour) > strtotime($yu_time)){
      exit('<script>alert(\'你提交的预定时间已过！！\');history.back();</script>');
  }

  $yu_name = $_POST['yu_name'];
  $yu_tel = $_POST['yu_tel'];
  $yu_num = $_POST['yu_num'];
  $beizhu = $_POST['beizhu'];
  $times = "{$nowdate}{$yu_time}";
  $sql = "insert into orderlist (id,time,order_name,tel,order_people,beizhu,store_id,order_uid,order_type) values (null,'$times','$yu_name','$yu_tel','$yu_num','$beizhu','$user->store_id','$user->user_id','3')";
  $res = mysql_query($sql);
  $getID=mysql_insert_id();//获取插入数据的id
  if (!$res){
        die('Error: ' . mysql_error());//如果sql执行失败输出错误
  }else{
    echo '<script>alert(\'预定成功\');window.location.href="../store/yuding-order-success.php?oid='; echo $getID; echo '";</script>';
  }

?>
