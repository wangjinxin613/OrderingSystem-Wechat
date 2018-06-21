<?php
  require('../config/index_class.php');
  $dept_name = $_POST['dept_name'];
  $dept = $_POST['dept'];
  $beizhu = $_POST['beizhu'];
  $dept_body = implode(",", $dept);
  $q="insert into admin_dept(dept_id,dept_name,beizhu,dept_body,store_id) values (null,'$dept_name','$beizhu','$dept_body','$user->store_id')";//向数据库插入表单传来的值的sql
    $reslut=mysql_query($q);//执行sql
      admin_log_add("添加权限‘{$dept_name}’成功");
    exit('<script>alert(\'添加权限成功\');history.back();</script>');

?>
