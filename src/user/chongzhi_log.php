<?
  require('../config/index_config.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>充值记录</title>
		 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

		<link href="../styles/extend/user/money-change.css" type="text/css" rel="stylesheet" />
		<link href="../styles/base.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<div class="head">
			<img src="../images/return.png" style="width:23px;float:left;margin-left:20px;" onClick="javascript:history.back(-1)"><span style=";">充值记录明细</span><span style="width:40px;float:right;">&nbsp;</span>
		</div>
		<div style="padding-bottom:50px;"></div>
		<div class="tab" >
			<table style="font-size:12px;">
				<tr>
					<th >充值金额</th>
          <th >赠送金额</th>
					<th >时间</th>
          <th>充值方式</th>
					<th>状态</th>
				</tr>

				<? chongzhi_log();?>

			</table>
		</div>
	</body>
<html>
