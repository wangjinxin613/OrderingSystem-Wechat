<?php
  	require ('../../config/index_class.php');
    $sh_address1=$_POST['sh_address1'];
    $sh_address2=$_POST['sh_address2'];
    $sh_name=$_POST['sh_name'];
    $sh_tel=$_POST['sh_tel'];
    $sh_address=$sh_address1.$sh_address2;
    $q="insert into zo_address(id,uid,sh_tel,sh_name,sh_address) values (null,'$user->admin_id','$sh_tel','$sh_name','$sh_address') ";
    mysql_query($q,$con);//执行sql
    exit('<script>alert(\'添加成功！\');window.location.href="../gladd.php";</script>');
?>
