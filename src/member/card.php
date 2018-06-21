<?php
	require('../config/index_config.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>我的卡券</title>
		 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		
		<link href="../styles/extend/member/qiandao.css" type="text/css" rel="stylesheet" />
		<link href="../styles/extend/member/index.css" type="text/css" rel="stylesheet" />
		<link href="../styles/base.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<div class="head">
			<a href="index.php"><img src="../images/return.png" style="width:23px;float:left;margin-left:20px;" ></a><span style=";">我的卡券</span><span style="width:40px;float:right;">&nbsp;</span>
		</div>
		<div style="padding-bottom:50px;"></div>

		<div class="index-bg">
			<div class="card">
				<p class="p1"><? echo $item->store_name;?></p>
				<p class="p2">ID:<? echo $user->user_id;?></p>
				<p class="p3">会员卡号</p>
				<P class="p3"><? echo $user->tel;?></p3>
			</div>
		</div>
		<div style="padding-bottom:75px;"></div>
		<div class="list">
			<div class="list-logo">
				<P class="p1">可用</P>
				<P class="p2"><? echo (int)(tj1("my_daijin where uid = {$user->user_id} and status = 1")) + (int)(tj1("my_youhui where uid = {$user->user_id} and status = 1")) +  (int)(tj1("my_lipin where uid = {$user->user_id} and status = 1")); ?></P>
			</div>
			<div class="list-logo rightborder">
				<P class="p1">已用</P>
				<P class="p2"><? echo (int)(tj1("my_daijin where uid = {$user->user_id} and status = 2")) + (int)(tj1("my_youhui where uid = {$user->user_id} and status = 2")) +  (int)(tj1("my_lipin where uid = {$user->user_id} and status = 2")); ?></P>
			</div>
			<div class="list-logo rightborder">
				<P class="p1">过期</P>
				<P class="p2"><? echo (int)(tj1("my_daijin where uid = {$user->user_id} and status = 3")) + (int)(tj1("my_youhui where uid = {$user->user_id} and status = 3")) +  (int)(tj1("my_lipin where uid = {$user->user_id} and status = 3")); ?></P>
			</div>
			<div class="list-logo rightborder">
				<P class="p1">退款</P>
				<P class="p2"><? tj("tuikuan where uid = {$user->user_id}");?></P>
			</div>
			<div style="clear:both;"></div>
		</div> 	
		<!-- 功能菜单 -->	 
		<div class="gncd">
		<a href="my_youhui.php">
		<div class="gncd-logo">
			<p><img src="images/card1.png"></p>
			<p>优惠券</p>
		</div>
	</a>
		<a href="my_daijin.php">
		<div class="gncd-logo">
			<p><img src="images/card2.png"></p>
			<p>代金券</p>
		</div>
	</a>
		<a href="my_lipin.php">
		<div class="gncd-logo">
			<p><img src="images/card3.png"></p>
			<p>礼品券</p>
		</div>
		<div class="gncd-logo noborder-r">
			<p style="height:33px"></p>
			<p>&nbsp;</p>
		</div>
		</a>
		
		
	</body>
</html>