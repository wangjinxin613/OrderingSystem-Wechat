<?php
	require ('../config/index_config.php');
	$oid = $_GET['oid'];
	$status = $_GET['status'];
	if(ctype_digit($oid)== false || ctype_digit($status)==false){
			exit('<script>alert(\'参数传递有误！！\');history.back();</script>');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>订单已提交</title>
		 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

		<link href="../styles/extend/store/yuding-order-success.css" type="text/css" rel="stylesheet" />
		<link href="../styles/base.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<div class="head">
			<a href="../index"><img src="../images/return.png" style="width:23px;float:left;margin-left:20px;"></a><span style=";">操作成功</span><span style="width:40px;float:right;">&nbsp;</span>
		</div>
		<div style="padding-bottom:48px;"></div>
		<img src="../images/duihao.png" style="width:30%;margin:20px 35%;">
		<div class="font">
			<p>操作成功，订单已提交至厨房，请耐心等待大厨们为您准备的美食</p>
			<p>订单支付状态：<span style="color:#FF6666;"><?php if($status==0){ echo "未支付";}else if($status==1){echo "已支付";}else{echo "查询出错";}?></span></p>
		</div>
		<a href="order_detail.php?oid=<?php echo $oid;?>">
		<div class="btn">
			查看订单
		</div>
	</a>
	<a href="../index">
		<div class="btn1">
			返回门店
		</div>
	</a>
	</body>
</html>
