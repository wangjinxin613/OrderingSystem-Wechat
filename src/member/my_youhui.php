<?
	require('../config/index_config.php');	
	$status = $_GET['status'];
	check($status);
	check_youhui();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>我的优惠券</title>
		 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		
		<link href="../styles/extend/member/qiandao.css" type="text/css" rel="stylesheet" />
		<link href="../styles/extend/member/orderlist-list.css" type="text/css" rel="stylesheet" />
		<link href="../styles/base.css" type="text/css" rel="stylesheet" />
	</head>
	<style>
	.title li{
		width:33.3%;
	}
</style>
	<body>
		<div class="head">
			<a href="card.php"><img src="../images/return.png" style="width:23px;float:left;margin-left:20px;" ></a><span style=";">我的优惠券</span><span style="width:40px;float:right;">&nbsp;</span>
		</div>
		<div style="padding-bottom:50px;"></div>
		<div class="title">
			<ul>
				<a href="?status=1"><li>可用</li></a>
				<a href="?status=2"><li>已用</li></a>
				<a href="?status=3"><li>过期</li></a>
				
			</ul>
		</div>
		<div style="padding-bottom:40px;"></div>
		<? my_youhui_list($status);?>
		
	</body>
</html>