<?php
	require('../config/index_class_no.php');
	$order_id = $_GET['id'];
	mysql_select_db("my_db", $con);
	$result1 = mysql_query("SELECT * FROM fen_log where id = '$order_id'");
	while($v = mysql_fetch_array($result1))
 	{
    $number = $v['number'];
 		$blog = $v['status'];
 	
 	}
 
 
 	//容错机制 
 	if($blog == 0){
 	 echo '<script>alert(\'支付出错！\')';echo '"</script>';
   exit();
 	}
 	 
  //  chongzhi_success1($order_id);//更新充值记录的状态

 
	 $sql2 = "update store_setting set fen_number = fen_number + '$number' where store_id = '$user->store_id'";
    $result2 = mysql_query($sql2);//赠送金额

    
			
			//money_change_add('支付宝充值',"-{$all_money}",$get_points);//添加用户余额流水记录
		 echo '<script>alert(\'开通成功！\');window.location.href="'; echo "../home.php"; echo '";</script>';

 
?>