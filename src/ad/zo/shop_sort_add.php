<?php
  require('../config/index_class1.php');
  
  $dept = $_POST['dept'];
  $id = $_POST['id'];
 $sort_body = $_POST['beizhu'];
  $sort_name = $_POST['sort_name'];
  $stop_time = $_POST['stop_time'];
  $price = $_POST['price'];
  $fen_number = $_POST['fen_number'];
   $dept_body = implode(",", $dept);
   $sql = "insert into store_sort(id,sort_name,time,stop_time,dept_body,sort_body,price,fen_number) values (null,'$sort_name','$time','$stop_time','$dept_body','$sort_body','$price','$fen_number')";
  mysql_query($sql);
  exit('<script>alert(\'设置成功\');history.back();</script>');

?>