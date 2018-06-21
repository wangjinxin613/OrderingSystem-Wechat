<?
	require('../config/conn.php');
	error_reporting(0);
	sleep(1);
	$ids = $_POST['id'];
	mysql_select_db("my_db", $con);

	$result1 = mysql_query("SELECT * FROM chongzhi where id = '$ids'");
	while($v = mysql_fetch_array($result1))
 	{
 		$status = $v['blog'];
 	}

 	if($status == 1){
 		echo "success";
 	}
  
?>