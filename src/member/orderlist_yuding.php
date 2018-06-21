<?
	require('../config/index_config.php');
	$type=$_GET['type'];
	if($type!=null){
	if(ctype_digit($type)== false){ //检测传递过来的参数必须是数字，防止被黑客攻击
			exit('<script>alert(\'参数传递有误！！\');</script>');
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>预定记录</title>
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
			<a href="index.php">
			<img src="../images/return.png" style="width:23px;float:left;margin-left:20px;" /></a><span style=";">预定记录</span><span style="width:40px;float:right;">&nbsp;</span>
		</div>
		<div style="padding-bottom:50px;"></div>
		<div class="title">
			<ul>
				<a href="?type=1"><li>全部</li></a>

				<a href="?type=3"><li>待确认</li></a>
				<a href="?type=4"><li>已完成</li></a>
			</ul>
		</div>
		<div style="padding-bottom:40px;"></div>

		<?php
		if($type==null|| $type==1){
			yuding_orderlist_foreach('3','');
		}else if($type==3){
			yuding_orderlist_foreach('3','and status_ss = 0 ');
		}else if($type==4){
			yuding_orderlist_foreach('3','and  status_ss = 1');
		}
		?>

		<!--<div class="list">
			<p class="p1">下单时间：8小时前 <span class="color-b floatright">待评价</span></p>
			<p class="p2">共0分菜品 总计：￥0.01 <span><input type="submit" value="评价"></span></p>
		</div>-->
	</body>
</html>
