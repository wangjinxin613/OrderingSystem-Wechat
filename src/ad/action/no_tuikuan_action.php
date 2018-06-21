<?		
error_reporting(0);
	require('../config/index_class.php');
	$order_id = $_POST['order_id'];
	$sql="select * from orderlist where id = {$order_id} ";//查询语句
				$res=mysql_query($sql);//执行查询
				while($r=mysql_fetch_assoc($res)){
			    	$ro[]=$r;//接受结果集
				}
				foreach($ro as $key=>$v){
					$all_money = $v['all_money'];
					$uid = $v['order_uid'];
					$status_ss= $v['status_ss'];
				}
				if($status_ss != 3){
					  exit('<script>alert(\'订单状态有误\');history.back();</script>');
				}
				//更改账户余额
			
				$sql1 = "update orderlist set status_ss = '5' where id = '$order_id'";
			
				mysql_query($sql1);
				  exit('<script>alert(\'执行成功\');history.back();</script>');
?>