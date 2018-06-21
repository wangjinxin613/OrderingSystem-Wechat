<?
	require('../config/conn.php');
	error_reporting(0);
	sleep(1);
	$id = $_POST['id'];
	mysql_select_db("my_db", $con);
	$result1 = mysql_query("SELECT * FROM zo_orderlist where id = '$id'");
	while($v = mysql_fetch_array($result1))
 	{
 		$status = $v['status'];
 	}

 	if($status == 1){
 		echo "success";
 	}
  
?>