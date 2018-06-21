<?php
  $order_id = $_POST['order_id'];
  require('../config/index_class1.php');
  order_status_update1('status_ss','1',$order_id);
  function order_status_update1($name,$val,$id){
    $sql = "update zo_orderlist set $name = '$val' where id = '$id'";
    $result = mysql_query($sql);
  }
  	exit('<script>alert(\'操作成功\');history.back();</script>');
?>
