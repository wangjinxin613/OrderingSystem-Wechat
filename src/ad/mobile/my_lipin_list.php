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
		<title>礼品券兑换列表</title>
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
		
		 <div class="head">
    <a href="index.php"><img src="../../images/return.png" style="width:23px;float:left;margin-left:20px;" ></a><span style=";">礼品券兑换列表</span><span style="width:40px;float:right;">&nbsp;</span>
  </div>
		<div style="padding-bottom:40px;"></div>
					<? my_lipin_list()?>
		
		
   
<div class="actGotop"><a href="javascript:;" title="返回顶部"></a> <img src="img/fanhui.png" alt=""></div>
<div class="theme-popover-mask"></div>

		<!--<div class="list">
			<p class="p1">下单时间：8小时前 <span class="color-b floatright">待评价</span></p>
			<p class="p2">共0分菜品 总计：￥0.01 <span><input type="submit" value="评价"></span></p>
		</div>-->
	</body>
</html>
