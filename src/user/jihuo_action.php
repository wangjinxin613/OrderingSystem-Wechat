<?php
require('../config/index_config.php');
	$real_name = $_POST['real_name'];
	$tel = $_POST['tel'];
	$birthday = $_POST['birthday'];
	$car = $_POST['car'];
	$address = $_POST['address'];
	$code = $_POST['code'];
	$codes = $_SESSION['code'];
	if($code != $codes ){
		exit('<script>alert(\'短信验证码有误\');history.back();</script>');
	}

	
	if($real_name!=null){
		update('real_name',$real_name,$user->user_id);
		update('tel',$tel,$user->user_id);
		update('birthday',$birthday,$user->user_id);
		update('car',$car,$user->user_id);
		update('address',$address,$user->user_id);
		update('blog','1',$user->user_id);
	}
	exit('<script>alert(\'执行成功！\');window.location.href="../member";</script>');
?>