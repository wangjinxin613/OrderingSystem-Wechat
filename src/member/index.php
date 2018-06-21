<?
	require('../config/index_config.php');
	require_once "../wxjs/jssdk.php";
	$jssdk = new JSSDK($item->appid, $item->appsecret);
	$signPackage = $jssdk->GetSignPackage();
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

	<div class="index-bg">
			<div class="card">
				<p class="p1"><? echo $item->store_name;?></p>
				<p class="p2">ID:<?echo $user->user_id?></p>
				<p class="p3">会员卡号</p1>
				<P class="p3"><? echo $user->tel;?></p3>
			</div>
		</div>
		<!-- 此部分 在会员卡未激活之前处于隐藏状态 -->
		<div style="padding-bottom:80px;"></div>
		<?
		if($user->blog==1){
	echo '<div class="list">
			<div class="list-logo">
				<P class="p1">基本余额</P>
				<P class="p2">';echo $user->money_still; echo '元</P>
			</div>
			<a href="jifen.html">
			<div class="list-logo rightborder">
				<P class="p1">赠送余额</P>
				<P class="p2">';echo $user->money_gift; echo '元</P>
			</div>
		</a>
			<div class="list-logo rightborder">
				<P class="p1">消费金额</P>
				<P class="p2">';echo $user->money_used; echo '元</P>
			</div>
			<div class="list-logo rightborder">
				<P class="p1">个人积分</P>
				<P class="p2">';echo $user->points; echo '</P>
			</div>
			<div style="clear:both;"></div>
		</div>
		<div>';}if($user->blog==null){
		echo '<a href="../user/jihuo.php">
			<div class="btn-jihuo">
				激活会员卡
			</div>
		</a>';
	}
		?>
		<!-- 下部分列表 列表改成了方格形式的了  -->
		<!--
			<div class="list-box" style="margin-top:10px;">
			我的余额<span >￥10.00&nbsp;></span>
		</div>
		<div class="list-box">
			我的积分<span >10&nbsp;></span>
		</div>
		<div class="list-box" style="border-bottom:1px solid #eeeeee;">
			我的券<span >10&nbsp;></span>
		</div>
		<div class="list-box" style="margin-top:10px;">
			我的微信订单<span >&nbsp;></span>
		</div>
		<div class="list-box">
			我的预约<span >&nbsp;></span>
		</div>
		<div class="list-box border-bottom">
			我的推广奖励<span >&nbsp;></span>
		</div>
		<div class="list-box margin">
			我的信息<span >&nbsp;></span>
		</div>
		<div class="list-box margin">
			密码修改<span >&nbsp;></span>
		</div>
	-->
	<!-- 功能菜单 -->
	<div class="gncd">
		
		<div class="gncd-logo" onclick="sao()">
			<p><img src="images/icon11.png"></p>
			<p>扫码付款</p>
		</div>
		<a href="../user/chongzhi.php">
		<div class="gncd-logo">
			<p><img src="../images/chongzhi.png" ></p>
			<p>充值	</p>
		</div>
	</a>
	<!--
	<a href="../user/tixian.php">
		<div class="gncd-logo">
			<p><img src="../images/tixian2.png" ></p>
			<p>提现	</p>
		</div>
	</a>-->
		<a href="orderlist.php">
		<div class="gncd-logo ">
			<p><img src="images/icon12.png"></p>
			<p>订单中心</p>
		</div>
	</a>
		<a href="card.php">
		<div class="gncd-logo  noborder-r" >
			<p><img src="images/icon13.png"></p>
			<p>我的卡券</p>
		</div>
		</a>
		<a href="jifen.php">
		<div class="gncd-logo ">
			<p><img src="images/icon14.png" style="width:29px;"></p>
			<p>积分兑换</p>
		</div>
	</a>
	<a href="qiandao.php">
		<div class="gncd-logo">
			<p><img src="images/icon15.png" style="width:28px;"></p>
			<p>每日签到</p>
		</div>
	</a>
	<a href="share_log.php">
		<div class="gncd-logo ">
			<p><img src="images/icon16.png"></p>
			<p>推广记录</p>
		</div>
	</a>
		<a href="../waimai/gladd.php">
		<div class="gncd-logo  noborder-r">
			<p><img src="images/icon17.png"></p>
			<p>收货地址</p>
		</div>
	</a>
	
	
<? if($user->blog==null){ echo '<a href="../user/jihuo.php">';} else{ echo '<a onclick="layer.msg(\'您已完成了激活\');">';}?>

		<div class="gncd-logo">
			<p><img src="images/icon19.png" style="width:28px;"></p>
			<p>激活会员卡</p>
		</div>
	</a>
		<a href="../user">
		<div class="gncd-logo">
			<p><img src="images/icon20.png"></p>
			<p>用户设置</p>
		</div>
	</a>
	<a href="../user/money-change.php">
		<div class="gncd-logo ">
			<p><img src="images/jilu.png"></p>
			<p>交易记录</p>
		</div>
	</a>	
	<div class="gncd-logo noborder-r">
			<p>&nbsp;</p>
			<p>&nbsp;</p>
		</div>
		
	</div>&nbsp;
		<div style="padding-bottom:100px;"></div>
		<!-- 底部菜单-->
	<div class="footer">
		<div class="footlogo">
			<a href="../index">
			<p><img src="../images/foot.png"></p>
			<p>首页</p>
		</a>
		</div>
		<div class="footlogo">
			<a href="../store">
			<p><img src="../images/foot4.png" ></p>
			<p>门店介绍</p>
		</a>
		</div>
		<div class="footlogo">

			<p><img src="../images/foot2.png"></p>
			<p>我的</p>

		</div>
		
	</div>
	</body>
	<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
  /*
   * 注意：
   * 1. 所有的JS接口只能在公众号绑定的域名下调用，公众号开发者需要先登录微信公众平台进入“公众号设置”的“功能设置”里填写“JS接口安全域名”。
   * 2. 如果发现在 Android 不能分享自定义内容，请到官网下载最新的包覆盖安装，Android 自定义分享接口需升级至 6.0.2.58 版本及以上。
   * 3. 常见问题及完整 JS-SDK 文档地址：http://mp.weixin.qq.com/wiki/7/aaa137b55fb2e0456bf8dd9148dd613f.html
   *
   * 开发中遇到问题详见文档“附录5-常见错误及解决办法”解决，如仍未能解决可通过以下渠道反馈：
   * 邮箱地址：weixin-open@qq.com
   * 邮件主题：【微信JS-SDK反馈】具体问题
   * 邮件内容说明：用简明的语言描述问题所在，并交代清楚遇到该问题的场景，可附上截屏图片，微信团队会尽快处理你的反馈。
   */
  wx.config({
    debug: false,
    appId: '<?php echo $signPackage["appId"];?>',
    timestamp: <?php echo $signPackage["timestamp"];?>,
    nonceStr: '<?php echo $signPackage["nonceStr"];?>',
    signature: '<?php echo $signPackage["signature"];?>',
    jsApiList: [
      // 所有要调用的 API 都要加到这个列表中
      'scanQRCode'
    ]
  });
  function sao(){
  wx.ready(function () {
    // 在这里调用 API
    wx.scanQRCode({
    needResult: 0, // 默认为0，扫描结果由微信处理，1则直接返回扫描结果，
    scanType: ["qrCode","barCode"], // 可以指定扫二维码还是一维码，默认二者都有
    success: function (res) {
    var result = res.resultStr; // 当needResult 为 1 时，扫码返回的结果
}
});
  });}
</script>
</html>
