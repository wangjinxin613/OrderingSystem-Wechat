<?php
  require('../config/index_config.php');
	header("Content-Type: text/html; charset=UTF8");
  $y_pwd = $_POST['y_pwd'];
  $n_pwd = $_POST['n_pwd'];
  echo $y_pwd;
  if($y_pwd != $user->pwd){
  exit('<script>alert(\'您输入的旧密码有误，请重新输入\');history.back();</script>');
  }else{
  update_pwd($n_pwd);
   exit('<script>alert("修改密码成功");history.back();</script>');
}
?>
