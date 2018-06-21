<?
	require('../config/index_class.php');
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
		<title>我的订单</title>
		 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

		<link href="../../styles/extend/member/qiandao.css" type="text/css" rel="stylesheet" />
		<link href="../../styles/extend/member/orderlist-list.css" type="text/css" rel="stylesheet" />
		<link href="../../styles/base.css" type="text/css" rel="stylesheet" />
   <link rel="stylesheet" href="css/Up.css">
    <link rel="stylesheet" href="css/spdd.css">
    <script type="text/javascript" src="js/jquery-1.12.1.js"></script>
    <script type="text/javascript" src="js/touch.js"></script>
    <script type="text/javascript" src="js/tcewn.js"></script>
    <script type="text/javascript" src="js/touch.js"></script>
    <script type="text/javascript" src="js/srcolltop.js"></script>
    <script type="text/javascript" src="js/timer.js"></script>
    <script type="text/javascript" src="js/xlmenu.js"></script>
    
	</head>
	<style>
		.title li{
			width:20%; 
		}
	</style>
	<body>
		
		<div class="title" style="position:fixed;width:100%;">
			<ul>
				<a href="?type=1"><li >全部</li></a>
				<a href="?type=2"><li>未支付</li></a>
				<a href="?type=3"><li>待发货</li></a>
				<a href="?type=4"><li>待收货</li></a>
				<a href="?type=5"><li>已完成</li></a>
			</ul>
		</div>
		<div style="padding-bottom:40px;"></div>

		<?php
		if($type==null|| $type==1){
			orderlist_foreach('');
		}else if($type==2){
			orderlist_foreach('and status = 0');
		}else if($type==3){
			orderlist_foreach('and status = 1 and status_ss = 0');
		}else if($type==4){
			orderlist_foreach('and status = 1 and status_ss = 1');
		}else if($type==5){
			orderlist_foreach('and status = 1 and status_ss = 2');
		}
		?>
		<div style="padding-bottom:60px;"></div>
		 <div class="wx_nav" id="wx_nav">
        <a href="cg_shoplist.php" class="nav_index" id="nav_index">首页</a>
       
        <a href="my_shoplist.php" class="nav_me " id="nav_index ">我的订单</a>
         <a href="index.php" class="nav_fav" id="nav_fav">返回主菜单</a>
    </div>
    <footer>
    <div class="footer">
        <p>没有更多了</p>
    </div>
</footer>
<div class="actGotop"><a href="javascript:;" title="返回顶部"></a> <img src="img/fanhui.png" alt=""></div>
<div class="theme-popover-mask"></div>

		<!--<div class="list">
			<p class="p1">下单时间：8小时前 <span class="color-b floatright">待评价</span></p>
			<p class="p2">共0分菜品 总计：￥0.01 <span><input type="submit" value="评价"></span></p>
		</div>-->
	</body>
</html>
