<?
	require('../config/index_config.php');

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>会员基本信息</title>
		 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

		<link href="../styles/extend/user/message.css" type="text/css" rel="stylesheet" />
		<link href="../styles/base.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<div class="head">
			<img src="../images/return.png" style="width:23px;float:left;margin-left:20px;" onClick="javascript:history.back(-1)"><span style=";">会员基本信息</span><span style="width:40px;float:right;">&nbsp;</span>
		</div>
		<div style="padding-bottom:50px;"></div>
		<div>
<p class="p1" style="padding:10px 15px;color:#999999;">会员基本信息</p>
		</div>
		<div class="shou">

			<p class="p2">会员编号： <span><? echo $user->user_id;?></span></p>
			<p class="p2">会员卡级别： <span><? rank_name_odd($user->card_type);?></span></p>
			<p class="p2">会员卡折扣： <span><? echo cardzhe('1')*10;?>折</span></p>
			<p class="p2">姓名： <span> <?echo $user->real_name;?></span></p>

			<p class="p2">微信昵称： <span> <?echo $user->nickname;?></span></p>
			<p class="p2">生日： <span><? echo $user->birthday;?></span></p>
			<p class="p2">手机号： <span><? echo $user->tel;?></span></p>
		<!--	<p class="p2">车牌号：<span><? echo $user->car;?></span></p>-->
			<p class="p2">地址： <span><? echo $user->address;?></span></p>

		</div>
	</body>
</html>
