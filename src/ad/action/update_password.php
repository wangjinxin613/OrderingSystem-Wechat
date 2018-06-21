<?php
  require('../config/index_class.php');
	header("Content-Type: text/html; charset=UTF8");
  $so_password = $_POST['so_password'];
  $now_password = $_POST['new_password'];
  $re_password = $_POST['re_password'];
  if($so_password != $user->admin_password){
  exit('<script>alert(\'您输入的旧密码有误，请重新输入\');history.back();</script>');
  }else if($now_password != $re_password){
    	exit('<script>alert(\'您输入的俩次密码不一致，请重新输入\');history.back();</script>');
    }else{
  update_password($now_password);
}
?>
