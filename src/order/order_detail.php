<?php
	require ('../config/index_config.php');
	$oid = $_GET['oid'];
	if(ctype_digit($oid)== false){ //检测传递过来的参数必须是数字，防止被黑客攻击
			exit('<script>alert(\'参数传递有误！！\');history.back();</script>');
	}
?>
<html>
<head>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>订单详情</title>
		 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link href="../styles/extend/order/order_detail.css" type="text/css" rel="stylesheet" />
		<link href="../styles/base.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<div class="head">
			<a href="../member/index.php"><img src="../images/return.png" style="width:23px;float:left;margin-left:20px;"></a><span style=";">订单详情</span><span style="width:40px;float:right;">&nbsp;</span>
		</div>
		<div style="padding-bottom:48px;"></div>
		<?php
		select_orderlist($oid,'1');
		?>
		<div class="de_box2" >
			<? select_order_products($oid);?>

		</div>
			<? select_orderlist($oid,'2');?>

		
	</body>
</html>
