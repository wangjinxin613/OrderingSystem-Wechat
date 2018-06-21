<?php
  require('../config/index_class.php');
  $tai_name = $_POST['tai_name'];
  $shunxu = $_POST['shunxu'];
  $fen_id = $_POST['fen_id'];
  $sql = "insert into taihao(id,tai_name,shunxu,store_id,fen_id) values (null,'$tai_name','$shunxu','$user->store_id','$fen_id')";
  mysql_query($sql);
  exit('<script>alert(\'执行成功！\');history.back();</script>');
?>
