<?php
	require('../../config/index_class.php');
	$oid = $_POST['oid'];
	echo $oid;
	$sql="update orderlist set status_ss = '1' where id = '$oid'";
	mysql_query($sql,$con);
	exit('<script>alert(\'执行成功\');history.back();</script>');
?>
