<?php
  require('../config/index_class.php');
$sh_name = $_POST['sh_name'];
$sh_tel = $_POST['sh_tel'];
$sh_city = $_POST['sh_city'];
  $sh_address = $_POST['sh_address'];
  $q="insert into zo_address(id,sh_tel,sh_name,sh_city,sh_address,uid) values (null,'$sh_tel','$sh_name','$sh_city','$sh_address','$user->admin_id')";//向数据库插入表单传来的值的sql
    $reslut=mysql_query($q);//执行sql
    exit('<script>alert(\'执行成功\');window.location.href="../cg_address.php"</script>');

?>
