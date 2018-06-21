<?php
  	require ('../config/index_config.php');
    $id=$_POST['id'];
    $sh_name=$_POST['sh_name'];
    $sh_tel=$_POST['sh_tel'];
    sh_update('sh_name',$sh_name,$id);
    sh_update('sh_tel',$sh_tel,$id);
    	exit('<script>alert(\'修改收货地址成功！\');history.back();</script>');
?>
