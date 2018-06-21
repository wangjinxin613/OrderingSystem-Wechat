<?php
	require('../config/index_config.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>座位预定</title>
		 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

		<link href="../styles/extend/store/yuding-order-list.css" type="text/css" rel="stylesheet" />
		<link href="../styles/base.css" type="text/css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="../js/datedropper.css">
<link rel="stylesheet" type="text/css" href="../js/timedropper.min.css">
		<script type="text/javascript" src="../js/jquery-1.12.3.min.js"></script>
<script src="../js/datedropper.min.js"></script>
<script src="../js/timedropper.min.js"></script>
	</head>
	<body>
		<div class="head">
			<img src="../images/return.png" style="width:23px;float:left;margin-left:20px;" onClick="javascript:history.back(-1)"><span style=";">门店描述</span><span style="width:40px;float:right;">&nbsp;</span>
		</div>
		<div style="padding-bottom:55px;"></div>
    <div style="padding:0 20px;">
        <p><? echo $item->beizhu;?></p>
    </div>
</body>
</html>
