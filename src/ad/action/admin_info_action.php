<?php
  require('../config/index_class.php');
	header("Content-Type: text/html; charset=UTF8");
  $admin_name = $_POST['admin_name'];
  $admin_truename = $_POST['admin_truename'];
  $admin_sex = $_POST['admin_sex'];
  $admin_weixin = $_POST['admin_weixin'];
  $admin_tel = $_POST['admin_tel'];
  $admin_email= $_POST['admin_email'];
  update_admin_info('admin_name',$admin_name);
  update_admin_info('admin_truename',$admin_truename);
  update_admin_info('admin_sex',$admin_sex);
  update_admin_info('admin_weixin',$admin_weixin);
  update_admin_info('admin_tel',$admin_tel);
  update_admin_info('admin_email',$admin_email);
exit('<script>alert(\'修改成功\');history.back();</script>');
?>
