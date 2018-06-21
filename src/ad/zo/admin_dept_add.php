<?php
  require('../config/index_class1.php');
  $dept_name = $_POST['dept_name'];
  $dept = $_POST['dept'];
  $beizhu = $_POST['beizhu'];
  $dept_body = implode(",", $dept);
  if($dept_name == null){
  	  exit('<script>alert(\'权限名称不可为空\');history.back();</script>');
  }if($dept_body == null){
  	  exit('<script>alert(\'权限组不可为空\');history.back();</script>');
  }
  $q="insert into zo_dept(dept_id,dept_name,beizhu,dept_body) values (null,'$dept_name','$beizhu','$dept_body')";//向数据库插入表单传来的值的sql
    $reslut=mysql_query($q);//执行sql
 
    exit('<script>alert(\'添加权限成功\');history.back();</script>');

?>
