	<?php
		require ('../../config/index_class.php');
		$order_people = $_POST['order_people'];
		$order_desk = $_POST['order_desk'];
		$beizhu = $_POST['beizhu'];
		//$pay = $_POST['pay']; //用户支付方式 1.微信支付 2.现金支付 3.会员卡付款
		$money = $_POST['all_price']; //该订单的总钱数
		$time= date("Y/m/d H:i:s");//获取当前时间
		if($user->fen_id == null){
			$user->fen_id = 0;
		}
		$q="insert into orderlist(id,order_name,order_uid,order_people,order_desk,beizhu,time,tel,paytype,all_money,store_id,yid,did,get_points,fen_id,status,order_type)values (null,'未知','未知','$order_people','$order_desk','$beizhu','$time','未知','0','$money','$user->store_id','','','','$user->fen_id','1','5')";//向数据库插入表单传来的值的sql
	  	$reslut=mysql_query($q,$con);//执行sql
	  	$getID=mysql_insert_id(); //获取当前订单的订单id并将其存入cart表
	  	$admin_id = "ad".$user->admin_id;
	  	echo $admin_id;
	  	update_cart($admin_id,'order_id',$getID);
	   	update_cart($admin_id,'blog','1');//改变购物车商品的状态该状态表示已经生成订单

		
				
			update_productnum($getID);//更新商品在库数量 以商品销售数量
		//	post_action('../wxpay/alipay.php',$getID);
		/*
	这个函数的作用的更新商品表
	更新商品在库数量和已售数量
*/
	  function update_cart($uid,$name,$val){
   // include('../config/conn.php');
    $sql = "update cart set $name = '$val' where uid = '{$uid}' and blog = '0'";
      $result = mysql_query($sql);
    }

   	function update_productnum($order_id){
		include('../config/conn.php');
		$sql="select * from cart left join product on cart.product_id = product.pid where cart.order_id = {$order_id} and blog = 1";//查询语句
		$res=mysql_query($sql);//执行查询
		while($row=mysql_fetch_assoc($res)){
    		$rows[]=$row;//接受结果集
		}
//遍历数组
		foreach($rows as $key=>$v){

	 	$sql1 = "update product set products_num1 = products_num1 - {$v['num']} where pid = {$v['product_id']}";
   		$result = mysql_query($sql1);//更新商品在库数量
   		$sql2 = "update product set products_num2 = products_num2 + {$v['num']} where pid = {$v['product_id']}";
   		$result = mysql_query($sql2);//更新商品已售数量
   		}
}
 echo '<script>alert(\'点餐成功\');window.location.href="../../order_detailed.php?id='; echo $getID;echo '";</script>';
	?>
