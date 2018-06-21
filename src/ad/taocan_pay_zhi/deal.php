<?php
	require('../config/index_class_no.php');
	$order_id = $_GET['id'];
	mysql_select_db("my_db", $con);
	$result1 = mysql_query("SELECT * FROM taocan_log where id = '$order_id'");
	while($v = mysql_fetch_array($result1))
 	{
 		$t_id = $v['t_id'];
 		$store_id = $v['store_id'];	
    $blog = $v['status'];
 	}
 
  $result2 = mysql_query("SELECT * FROM store_sort where id = '$t_id'");
  while($v = mysql_fetch_array($result2))
  {
    $stops_time = $v['stop_time'];
    $fen_number = $v['fen_number'];
    $dept_body = $v['dept_body'];
  }
 	//容错机制 
 	if($blog == 0){
 	 echo '<script>alert(\'支付出错！\')';echo '"</script>';
   exit();
 	}
 	 $stop_time = date('Y-m-d', strtotime("+{$stops_time} days"));
  //  chongzhi_success1($order_id);//更新充值记录的状态
   function update($name,$val){
    global $user;
	 $sql2 = "update store_setting set $name = '$val' where store_id = '$user->store_id'";
    $result2 = mysql_query($sql2);//赠送金额
  }
     update('sort',$t_id);
     update('stop_time',$stop_time);
     update('fen_number',$fen_number);
     update('dept',$dept_body);
     update('status','1');
			
			//money_change_add('支付宝充值',"-{$all_money}",$get_points);//添加用户余额流水记录
		 	echo '<script>alert(\'开通成功！\');window.location.href="'; echo "../taocan.php"; echo '";</script>';

 
?>