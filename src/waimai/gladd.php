<?php
	require ('../config/index_config.php');
	$yid = $_GET['yid'];
	$did = $_GET['did'];
	check($yid);
	check($did);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>管理收货地址</title>
		 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link href="../css/amazeui.min.css" type="text/css" rel="stylesheet" />
		<link href="../css/style.css" type="text/css" rel="stylesheet" />
				<link href="../styles/base.css" type="text/css" rel="stylesheet" />
		<script src="../js/jquery.min.js" type="text/javascript"></script>
		<script src="../js/amazeui.min.js" type="text/javascript"></script>
	</head>

	<style type="text/css">

	</style>
	<body>
	<div class="head">
			<img src="../images/return.png" style="width:23px;float:left;margin-left:20px;" onClick="javascript:history.back(-1)"><span style=";">收货地址管理</span><a href=
			"add.html"><img src="../images/add.png" style="width:23px;float:right;margin-right:20px;"></a>
		</div>
	    <div style="height: 49px;"></div>
	    <ul class="address-list">
				<? sh_addresslist($yid,$did);?>


	    </ul>
	</body>

</html>
