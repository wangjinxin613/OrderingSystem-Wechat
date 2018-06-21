<?php
	require ('../config/index_class_no.php');
	
	
	$price = $_POST['price']; 
	$number = $_POST['number']; 
	$pay = $_POST['paytype']; 
	$time= date("Y/m/d H:i:s");//获取当前时间
	//将记录插入数据库中
	$money = $price * $number;
	$q="insert into fen_log(id,number,time,store_id,admin_id,admin_name,money,paytype) values (null,'$number','$time','$user->store_id','$user->admin_id','$user->admin_name','$money','$pay')";//向数据库插入表单传来的值的sql
  	$reslut=mysql_query($q,$con);//执行sql
  	$getID=mysql_insert_id(); //获取当前订单的订单id并将其存入cart表
  	//update_cart($user->user_id,'order_id',$getID);
   	//update_cart($user->user_id,'blog','1');//改变购物车商品的状态该状态表示已经生成订单

	if($pay==1){
		//支付宝调用
			post_action('../fen_pay/alipay.php',$getID);

	}
	if($pay==2){
		//微信
			post_action('../fen_pay_wx/alipay.php',$getID);

	}
	
	
function post_action($url,$order_id){
				global $money;
				echo "<form style='display:none;' id='form1' name='form1' method='post' action='{$url}'>
	              <input name='money' type='text' value='{$money}' />

	              <input name='order_id' type='text' value='{$order_id}'/>
	            </form>
	            <script type='text/javascript'>function load_submit(){document.form1.submit()}load_submit();</script>";

    }
?>
