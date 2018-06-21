<?php
	require ('../config/index_config.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>店铺介绍</title>
		 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		
		<link href="../styles/extend/store/index.css" type="text/css" rel="stylesheet" />
		<link href="../styles/base.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
	<div class="head">
			<img src="../images/return.png" style="width:23px;float:left;margin-left:20px;" onClick="javascript:history.back(-1)"><span style=";">查看所有评论</span><span style="width:40px;float:right;">&nbsp;</span>
		</div>
			<div style="padding-bottom:48px;"></div>
			<?
			pinglun1();
			?>
		
		<div style="padding-bottom:80px;"></div>
			<!-- 底部菜单-->
	<div class="footer">
		<div class="footlogo">
			<a href="../index.html">
			<p><img src="../images/foot.png"></p>
			<p>首页</p>
		</a>
		</div>
		<div class="footlogo">
			<p><img src="../images/foot4.png" ></p>
			<p>门店介绍</p>
		</div>
		<div class="footlogo">
			<a href="../member">
			<p><img src="../images/foot2.png"></p>
			<p>我的</p>
		</a>
		</div>
	</div>
	</body>
</html>
