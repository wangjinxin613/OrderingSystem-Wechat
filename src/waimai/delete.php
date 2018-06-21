<?php
  	require ('../config/index_config.php');
    $id=$_GET['id'];
    $sql = "delete from address where id='".$id."'";
  	mysql_query($sql,$con);
    exit('<script>alert(\'删除成功！\');history.back();</script>');
?>
