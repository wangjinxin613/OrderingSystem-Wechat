<?
  require('../config/index_config.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>我的通知</title>
		 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link href="../styles/extend/store/gonggao.css" type="text/css" rel="stylesheet" />
		<link href="../styles/extend/store/index.css" type="text/css" rel="stylesheet" />
		<link href="../styles/base.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
	<div class="head">
			<img src="../images/return.png" style="width:23px;float:left;margin-left:20px;" onClick="javascript:history.back(-1)"><span style=";">我的通知</span><span style="width:40px;float:right;">&nbsp;</span>
		</div>
			<div style="padding-bottom:48px;"></div>
		<?php notice_list(); ?>
		

	</body>
</html>
