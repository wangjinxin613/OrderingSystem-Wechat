<?php
  	require ('../config/index_class.php');
    $id=$_GET['id'];
    $sql = "delete from zo_address where id='".$id."'";
  	mysql_query($sql,$con);
    exit('<script>alert(\'删除成功！\');history.back();</script>');
?>
