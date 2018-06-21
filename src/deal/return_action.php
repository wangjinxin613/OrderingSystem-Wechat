<?
	require('../config/index_config.php');
	$order_id = $_POST['order_id'];
	$liyou = $_POST['liyou'];
	$sql="select * from orderlist where id = {$order_id} ";//查询语句
				$res=mysql_query($sql);//执行查询
				while($r=mysql_fetch_assoc($res)){
			    	$ro[]=$r;//接受结果集
				}
				foreach($ro as $key=>$v){
					$all_money = $v['all_money'];
				}
		$q="insert into tuikuan(t_id,uid,order_id,liyou,store_id,tui_time,all_money) values (null,'$user_id','$order_id','$liyou','$user->store_id','$time','$all_money')";//向数据库插入表单传来的值的sql
  		$reslut=mysql_query($q);//执行sql
  		$sql1 = "update orderlist set status_ss = '3' where id = '$order_id'";
  		$reslut=mysql_query($sql1);//执行sql
  		  echo '<script>alert(\'退款申请已经提交 ，请耐心等待管理员确认\');window.location.href="../order/order_detail.php?oid=';echo $order_id;echo '";</script>';
?>