<?php
  require('../../config/index_class.php');
	header("Content-Type: text/html; charset=UTF8");
  $y_password = $_POST['y_password'];
  $n_password = $_POST['n_password'];

  if($y_password != $user->admin_password){
  exit('<script>alert(\'您输入的旧密码有误，请重新输入\');history.back();</script>');
  }else{
  update_password($n_password);
}
?>
