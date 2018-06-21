<?php
	require ('../config/index_class.php');
  $pid = $_GET['pid'];


?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>管理收货地址</title>
		 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link href="../../css/amazeui.min.css" type="text/css" rel="stylesheet" />
		<link href="../../css/style.css" type="text/css" rel="stylesheet" />
		<script src="../../js/jquery.min.js" type="text/javascript"></script>
		<script src="../../js/amazeui.min.js" type="text/javascript"></script>
	</head>

	<style type="text/css">

	</style>
	<body>
		<header data-am-widget="header" class="am-header am-header-default sq-head ">
			<div class="am-header-left am-header-nav">
				<a href="javascript:history.back()" class="" style="border: 0;">
					<i class="am-icon-chevron-left"></i>
				</a>
			</div>
			<div>


			<h1 class="am-header-title">
  	            <a href="" class="" style="color: #333;">管理收货地址</a>
            </h1>
            <div class="am-header-right am-header-nav">
				<a href="add.php" class="">
					<i class="am-icon-plus" style="color: #999;"></i>
				</a>
			</div>
	    </header>
	    <div style="height: 49px;"></div>
	    <ul class="address-list">
				<? mo_sh_addresslist($pid);?>


	    </ul>
	</body>

</html>
