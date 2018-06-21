<?
	require('../config/index_config.php');
	$order_id = $_GET['id'];
	mysql_select_db("my_db", $con);
	$result1 = mysql_query("SELECT * FROM orderlist where id = '$order_id'");
	while($v = mysql_fetch_array($result1))
 	{
 		$status = $v['status'];
 		$get_points = $v['get_points'];
 			$all_money = $v['all_money'];
 			
 			
 	}
 	//容错机制 
 	if($status == 0){
 	 echo '<script>alert(\'支付出错！\');window.location.href="'; echo "../order/order_success.php?oid={$order_id}&status=0"; echo '"</script>';
 	}
 			$get_point = $user->points + $get_points; //更新账户积分
		
			$used = $user->money_used + $all_money;
			update('points',$get_point,$user->user_id);//更新积分
		
			update('money_used',$used,$user->user_id);//更新 消费金额
			
			money_change_add('微信消费',"-{$all_money}",$get_points);//添加用户余额流水记录
		 	echo '<script>alert(\'订单创建成功！\');window.location.href="'; echo "../order/order_success.php?oid={$order_id}&status=1"; echo '";</script>';


?>