<?
	require('../config/index_config.php');
	$date = date("m月d日");
	$date1 = date('m月d日', strtotime('-1 days'));
	$date2 = date('m月d日', strtotime('-2 days'));
	$date3 = date('m月d日', strtotime('-3 days'));
	$date4 = date('m月d日', strtotime('-4 days'));
	$date5 = date('m月d日', strtotime('-5 days'));
	$date6 = date('m月d日', strtotime('-6 days'));
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>签到</title>
		 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

		<link href="../styles/extend/member/qiandao.css" type="text/css" rel="stylesheet" />
		<link href="../styles/extend/member/index.css" type="text/css" rel="stylesheet" />
		<link href="../styles/base.css" type="text/css" rel="stylesheet" />
	</head>
	<style>
	.list-logo{
		width:33%;
	}
	</style>
	<body>
		<div class="head">
			<img src="../images/return.png" style="width:20px;float:left;margin-left:4%;" onClick="javascript:history.back(-1)"><span style=";">签到赚积分</span><span style="width:30px;float:right;">&nbsp;</span>
		</div>
		<div style="padding-bottom:48px;"></div>
<div class="index-bg">
			<div class="card">
				<p class="p1"><? echo $item->store_name;?></p>
				<p class="p2">ID:<?echo $user->user_id;?></p>
				<p class="p3">会员卡号</p>
				<P class="p3"><? echo $user->tel;?></p3>
			</div>
		</div>
		<div style="padding-bottom:80px;"></div>
		<div class="list">
			<div class="list-logo">
				<P class="p1">累计签到</P>
				<P class="p2"><?echo $user->qd_num;?>天</P>
			</div>

			<div class="list-logo rightborder">
				<P class="p1">签到状态</P>
				<P class="p2"><?qd1($date,'1');?></P>
			</div>
			<div class="list-logo rightborder">
				<P class="p1">获得积分</P>
				<P class="p2"><?echo $user->qd_points;?></P>
			</div>
			<div style="clear:both;"></div>
		</div>
		<!--点击签到 -->
	<?qd1($date,'2');?>

		<div class="box margin bordertop">
				<?echo $date;?>（今天）<span>签到获取积分</span>
		</div>

		<dic class="qdlist" style="background:#ffffff;">
			<!-- 连续七天签到状态-->
			<? qd($date6);?>
			<? qd($date5);?>
			<? qd($date4);?>
			<? qd($date3);?>
			<? qd($date2);?>
			<? qd($date1);?>
			<? qd($date);?>
			<div class="qdlist-logo">
				<p>&nbsp;</p>
				<p>&nbsp;</p>
			</div>
		</div>
	<div class="clear" style="clear:both;padding-bottom:80px;"></div>
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
