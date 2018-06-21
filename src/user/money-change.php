<?
	require('../config/index_config.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>余额流水</title>
		 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

		<link href="../styles/extend/user/money-change.css" type="text/css" rel="stylesheet" />
		<link href="../styles/base.css" type="text/css" rel="stylesheet" />


	</head>
	<body style="font-size:12px;">

		<div class="head">
			<img src="../images/return.png" style="width:23px;float:left;margin-left:20px;" onClick="javascript:history.back(-1)"><span style=";">余额流水明细</span><span style="width:40px;float:right;">&nbsp;</span>
		</div>
		<div style="padding-bottom:50px;"></div>
		<div class="tab" style="font-size:14px;">
			<table style="font-size:14px;">
				<tr style="font-size:14px;">
					<th class="td1">类型</th>
					<th class="td2">变动金额</th>
					<th class="td2">获得积分</th>
					<th class="td3">时间</th>
				</tr>

				<? money_change_list(); ?>
			</table>

		</div>
	</body>
<html>
