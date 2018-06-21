<?php
	//登录验证
	echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
	session_start();

	include "../config/conn.php";
	$admin_code=$_POST['admin_code'];

	//验证验证码是否正确
	if($_SESSION['admin_code']!=$admin_code){
 	exit('<script>alert(\'验证码输入有误！\');history.back();</script>');
	}
	$name= $_POST['admin_name'];
	$p = $_POST['admin_password'];
	if($name && $p)
	{
		$query=mysql_query('select * from admin where admin_name =\''.$name.'\'',$con);
		$re=mysql_fetch_array($query,MYSQL_ASSOC);

		if( $re && $re['admin_password'] == $p)//校验密码
		{
			//普通商城后台管理员

			$_SESSION['admin_id'] = $re['id'];

      //$_SESSION['store_id'] = $re['id'];
			if($re['zo_dept']==0){
				$_SESSION['admin_checked'] = true;
				require('../config/index_class.php');
			 admin_log_add('登陆成功');
		  $url  =  "../index.php";
		echo " <script   language = 'javascript'
		type = 'text/javascript' > ";
		echo " window.location.href = '$url' ";
		echo " </script > ";

	}else if($re['zo_dept']==1){
			//总后台总管理员
				$_SESSION['zo_dept'] = true;
				$_SESSION['zo_id'] = $re['id'];
		$url  =  "../index1.php";
	echo " <script   language = 'javascript'
	type = 'text/javascript' > ";
	echo " window.location.href = '$url' ";
	echo " </script > ";
	}
 //成功时进行跳
			}
		else
		{
			 echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
			 $_SESSION['checked'] = false;
			 exit('<script>alert(\'用户名或密码错误，无法登陆！\');history.back();</script>');
		}
	}



?>
