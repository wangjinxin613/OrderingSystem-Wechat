<?php
	require ('../config/index_config.php');
	$order_people = $_POST['order_people'];
	$order_desk = $_POST['order_desk'];
	$beizhu = $_POST['beizhu'];
	$pay = $_POST['pay']; //用户支付方式 1.微信支付 2.现金支付 3.会员卡付款
	$money = $_POST['money']; //该订单的总钱数
	$time= date("Y/m/d H:i:s");//获取当前时间
	if($fen_id == null){
			$fen_id = 0;
		}
	$q="insert into orderlist(id,order_name,order_uid,time,tel,paytype,all_money,order_type,store_id,fen_id) values (null,'$user->nickname','$user->user_id','$time','$user->tel','$pay','$money','4','$store_id','$fen_id')";//向数据库插入表单传来的值的sql
  	$reslut=mysql_query($q,$con);//执行sql
  	$getID=mysql_insert_id(); //获取当前订单的订单id并将其存入cart表
  	//update_cart($user->user_id,'order_id',$getID);
   	//update_cart($user->user_id,'blog','1');//改变购物车商品的状态该状态表示已经生成订单

		if($pay==1){
		//微信支付调用函数
			
			update_productnum($getID);//更新商品在库数量 以商品销售数量
			post_action('../wxpay/alipay.php',$getID);

	}
	if($pay==2){
		//现金支付调用函数
			money_change_add('现金消费',"-{$money}");//添加用户余额流水记录
	    	echo '<script>alert(\'订单创建成功！\');window.location.href="'; echo "../order/order_success.php?oid={$getID}&status=0"; echo '";</script>';
					exit();
	}
	if($pay==3){
		if($money>$user->money_still){
			exit('<script>alert(\'您的余额不足！\');history.back();</script>');
		}
		//会员卡支付
		$money_now = $user->money_still - $money; //获取剩余的余额
		$used= $user->money_used + $money; //消费金额
		update('money_still',$money_now,$user->user_id);//更新 用户账户余额
		update('money_used',$used,$user->user_id);//更新 消费金额
		update_orderlist($getID,'status','1'); //更新订单状态 付款成功
		update_productnum($getID);//更新商品在库数量 以商品销售数量
			money_change_add('会员卡消费',"-{$money}");//添加用户余额流水记录
	 	echo '<script>alert(\'订单创建成功！\');window.location.href="'; echo "../order/order_success.php?oid={$getID}&status=1"; echo '";</script>';
		//exit('<script>alert(\'订单创建成功！\');history.back();</script>)';
	}
	if($pay==4){
	//支付宝支付调用函数
		
			update_productnum($getID);//更新商品在库数量 以商品销售数量
			post_action('../pay/alipay.php',$getID);
}
function post_action($url,$order_id){
				$money = $_POST['money']; //该订单的总钱数
				echo "<form style='display:none;' id='form1' name='form1' method='post' action='{$url}'>
	              <input name='money' type='text' value='{$money}' />

	              <input name='order_id' type='text' value='{$order_id}'/>
	            </form>
	            <script type='text/javascript'>function load_submit(){document.form1.submit()}load_submit();</script>";

    }
?>
