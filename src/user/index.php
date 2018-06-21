<?
	require('../config/index_config.php');

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>个人中心</title>
		 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		
		<link href="../styles/extend/member/index.css" type="text/css" rel="stylesheet" />
		<link href="../styles/base.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<div class="head">
			<img src="../images/return.png" style="width:23px;float:left;margin-left:20px;" onClick="javascript:history.back(-1)"><span style=";">个人设置</span><span style="width:40px;float:right;">&nbsp;</span>
		</div>
		<div style="padding-bottom:40px;"></div>
		<a href="message.php">
		<div class="list-box" style="margin-top:10px;">
			会员信息<span >&nbsp;></span>
		</div>
	</a>
	<a href="money-change.php">
		<div class="list-box">
			余额明细<span >&nbsp;></span>
		</div>
	</a>
	<a href="password-change.php">
		<div class="list-box" style="border-bottom:1px solid #eeeeee;">
			更改支付密码<span >&nbsp;></span>
		</div>
	</a>
	<a href="chongzhi.php">
		<div class="list-box" style="margin-top:10px;">
			充值<span >&nbsp;></span>
		</div>
	</a>
	<!--
	<a href="tixian.php">
		<div class="list-box">
			提现<span >&nbsp;></span>
		</div>
	</a>
-->
	</body>
</html>