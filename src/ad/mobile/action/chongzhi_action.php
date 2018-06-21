<?
	require('../../config/index_class.php');
	$account_id = $_POST['account_id'];
	$money = $_POST['money'];
	$sql = "update member set money_still = money_still + '$money' where account_id = '$account_id'";
	mysql_query($sql);
	   exit('<script>alert(\'充值成功！！\');window.location.href="../index.php";</script>');
?>