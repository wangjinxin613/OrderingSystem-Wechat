<?
  require('../../config/index_class.php');
  $start_time = $_POST['start_time'];
  $stop_time = $_POST['stop_time'];
  $order_all = jiaoban_order($start_time,$stop_time);
  $order_ok = jiaoban_order($start_time,$stop_time,'1');
  $q="insert into jiaoban(id,start_time,stop_time,order_all,order_ok,admin_id,admin_name,store_id) values (null,'$start_time','$stop_time','$order_all','$order_ok','$user->admin_id','$user->admin_name','$user->store_id')";//向数据库插入表单传来的值的sql
  mysql_query($q);//执行sql
    exit('<script>alert(\'执行成功！！\');window.location.href="../jiaoban_log.php";</script>');
?>
