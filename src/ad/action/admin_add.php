<?
	require('../config/index_class.php');
	  $admin_name = $_POST['admin_name'];
	  $admin_password = $_POST['admin_password'];
	  $admin_sex = $_POST['admin_sex'];
	  $admin_tel = $_POST['admin_tel'];
	  $admin_email = $_POST['admin_email'];
	  $admin_dept = $_POST['admin_dept'];
	  $fen_id = $_POST['fen_id'];
	  $sql = "select * from admin where admin_name ='$admin_name'";
	$rs = mysql_query($sql, $con);
	
	if(mysql_num_rows($rs)>0){	
	exit('<script>alert(\'已存在相同名称的管理员，请更换管理员名称后重试\');history.back();</script>');
	
}else{
	  $q="insert into admin(id,admin_name,admin_password,admin_sex,admin_tel,admin_email,admin_dept,store_id,time,fen_id) values (null,'$admin_name','$admin_password','$admin_sex','$admin_tel','$admin_email','$admin_dept','$user->store_id','$time','$fen_id')";//向数据库插入表单传来的值的sql
  	$re=mysql_query($q);//执行sql
  	admin_log_add("添加管理员‘{$admin_name}’成功");
  	exit('<script>alert(\'执行成功！\');history.back();</script>');
  }
?>