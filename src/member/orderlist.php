<?
	require('../config/index_config.php')
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>我的订单</title>
		 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

		<link href="../styles/extend/member/qiandao.css" type="text/css" rel="stylesheet" />
		<link href="../styles/extend/member/index.css" type="text/css" rel="stylesheet" />
		<link href="../styles/base.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<div class="head">
			<img src="../images/return.png" style="width:23px;float:left;margin-left:20px;" onClick="javascript:history.back(-1)"><span style=";">订单中心</span><span style="width:40px;float:right;">&nbsp;</span>
		</div>
		<div style="padding-bottom:50px;"></div>
<div class="index-bg">
			<div class="card">
				<p class="p1"><? echo $item->store_name;?></p>
				<p class="p2">ID:<?echo $user->user_id;?></p>
				<p class="p3">会员卡号</p>
				<P class="p3"><?echo $user->tel;?></p3>
			</div>
		</div>
		<!--
		<div class="list">
			<div class="list-logo">
				<P class="p1">外卖订单</P>
				<P class="p2">1天</P>
			</div>
			<div class="list-logo rightborder">
				<P class="p1">预定订单</P>
				<P class="p2">1天</P>
			</div>
			<div class="list-logo rightborder">
				<P class="p1">堂食订单</P>
				<P class="p2">已签到</P>
			</div>
			<div class="list-logo rightborder">
				<P class="p1">闪慧买单</P>
				<P class="p2">100</P>
			</div>
			<div style="clear:both;"></div>
		</div>
	-->
	<!--四列功能菜单 -->
	<div style="padding-bottom:80px;"></div>
	<div class="gncd">
		<a href="orderlist_waimai.php">
		<div class="gncd-logo">
			<p><img src="images/order1.png"></p>
			<p>外卖订单</p>
		</div>
	</a>
		<a href="orderlist_diancan.php">
		<div class="gncd-logo ">
			<p><img src="images/order5.png"></p>
			<p>店内点餐</p>
		</div>
	</a>
		<a href="orderlist_yuding.php">
		<div class="gncd-logo">
			<p><img src="images/order2.png"></p>
			<p>预定订单</p>
		</div>
	</a>
	<!--<a href="orderlist-list.html">
		<div class="gncd-logo noborder-r">
			<p><img src="images/order3.png"></p>
			<p>堂食订单</p>
		</div>
	</a>-->
	<a href="orderlist_pay.php">
		<div class="gncd-logo  noborder-r">
			<p><img src="images/order4.png"></p>
			<p>快速买单</p>
		</div>
	</a>
	<!--	<div class="gncd-logo">
			<p style="height:33px"></p>
			<p>&nbsp;</p>
		</div>
		<div class="gncd-logo ">
			<p style="height:33px"></p>
			<p>&nbsp;</p>
		</div>
		<div class="gncd-logo noborder-r">
			<p style="height:33px"></p>
			<p>&nbsp;</p>
		</div>
-->
<body>
</html>
