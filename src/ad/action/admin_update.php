<?php
  require('../config/index_class.php');
  $admin_id = $_POST['admin_id'];
  $admin_name = $_POST['admin_name'];
  $admin_sex = $_POST['admin_sex'];
  $admin_truename = $_POST['admin_truename'];
  $admin_weixin = $_POST['admin_weixin'];
  $admin_tel = $_POST['admin_tel'];
  $admin_email = $_POST['admin_email'];
  $admin_dept = $_POST['admin_dept'];
  $fen_id = $_POST['fen_id'];
  admin_update('admin_name',$admin_name,$admin_id);
  admin_update("admin_sex",$admin_sex,$admin_id);
  admin_update("admin_truename",$admin_truename,$admin_id);
  admin_update('admin_weixin',$admin_weixin,$admin_id);
  admin_update('admin_tel',$admin_tel,$admin_id);
  admin_update('admin_email',$admin_email,$admin_id);
  admin_update('admin_dept',$admin_dept,$admin_id);
  admin_update('fen_id',$fen_id,$admin_id);
  admin_log_add("修改用户‘{$admin_name}’信息成功");
  exit('<script>alert(\'修改成功\');history.back();</script>');
?>
