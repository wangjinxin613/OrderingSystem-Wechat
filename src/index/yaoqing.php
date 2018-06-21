<?php
	require ('../config/index_config.php');
	$url = $_SERVER['HTTP_HOST'];
	erweima_share("http://$url/index.php?id={$user->store_id}&yid={$user->user_id}");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />

		<title>二维码分享</title>
		 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<script src="../js/jquery-1.4.min.js" type="text/javascript"></script>
		<script src="../js/jquery-1.11.0.min.js" type="text/javascript"></script>

		<link href="../styles/extend/styles.css" type="text/css" rel="stylesheet" />
		<link href="../styles/base.css" type="text/css" rel="stylesheet" />
	 <script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
   <style>
    .tuiguang{
      padding:0 10%;
      line-height: 25px;
    }
   </style>
	</head>
	<body style="background:#ffffff;">
		<div class="head">
			<img src="../images/return.png" style="width:23px;float:left;margin-left:20px;" onClick="javascript:history.back(-1)"><span style=";">二维码分享</span><span style="width:40px;float:right;">&nbsp;</span>
		</div>
		<div style="padding-bottom:48px;"></div>
		<p>第一步：关注微信公众号</p>
		 <div style="text-align:center;"><img src="<?echo $item->wx_erweima;?>" style="width:90%;"></div>
		 <p>第二步：扫描下图的二维码完成账号激活</p>
    <div style="text-align:center;"><img src="helloweba.png" style="width:90%;"></div>
    <div class="tuiguang">
        <h4>[推广说明]</h4>
        <ul>
        <li>让好友扫一扫您的二维码，成为您的下线</li>
        <li>您的好友没消费一次，将或得商家设定的积分</li>
        <li>分销退广活动的最终解释权归商家所有，如有疑问请咨询商家工作人员</li>
      </ul>
    </div>
	</body>


</html>
