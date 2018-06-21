<?
	require('../config/index_config.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>积分</title>
		 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		
		<link href="../styles/extend/member/qiandao.css" type="text/css" rel="stylesheet" />
		<link href="../styles/extend/member/index.css" type="text/css" rel="stylesheet" />
		<link href="../styles/base.css" type="text/css" rel="stylesheet" />
	</head>
	<style>
		.list-logo{
			width:49%;
		}
	</style>
	<body>
		<div class="head">
			<img src="../images/return.png" style="width:23px;float:left;margin-left:20px;" onClick="javascript:history.back(-1)"><span style=";">积分兑换</span><span style="width:40px;float:right;">&nbsp;</span>
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
		<div style="padding-bottom:80px;"></div>
		<div class="list">
			<div class="list-logo">
				<P class="p1">剩余积分</P>
				<P class="p2"><? echo $user->points;?></P>
			</div>
		
			<div class="list-logo rightborder">
				<P class="p1">已使用</P>
				<P class="p2"><? echo $user->point_used;?></P>
			</div>
			
			<div style="clear:both;"></div>
		</div> 	
		<!-- 功能菜单 -->	 
		<div class="gncd">
		<a href="duihuan_youhui.php">
		<div class="gncd-logo">
			<p><img src="images/card1.png"></p>
			<p>优惠券</p>
		</div>
	</a>
		<a href="duihuan_daijin.php">
		<div class="gncd-logo">
			<p><img src="images/card2.png"></p>
			<p>代金券</p>
		</div>
	</a>
		<a href="duihaun_lipin.php">
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