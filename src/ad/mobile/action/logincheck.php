<?php
  $name = $_POST['username'];
  $p = $_POST['password'];
  include "../../config/conn.php";
  session_start();
  if($name && $p)
	{
		$query=mysql_query('select * from admin where admin_name =\''.$name.'\'',$con);
		$re=mysql_fetch_array($query,MYSQL_ASSOC);

		if( $re && $re['admin_password'] == $p)//校验密码
		{
      $_SESSION['admin_checked'] = true;
			$_SESSION['admin_id'] = $re['id'];

      //$_SESSION['store_id'] = $re['id'];
		  $url  =  "../index.php";
		echo " <script   language = 'javascript'
		type = 'text/javascript' > ";
		echo " window.location.href = '$url' ";
		echo " </script > ";
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
