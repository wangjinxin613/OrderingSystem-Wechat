<?php
  $order_id = $_POST['order_id'];
  require('../config/index_class.php');
  order_status_update('status_ss','1',$order_id);
  	exit('<script>alert(\'操作成功\');history.back();</script>');
?>
