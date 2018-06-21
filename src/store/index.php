	<?php
	require ('../config/index_config.php');
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
		<title>店铺介绍</title>
		 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

		<link href="../styles/extend/store/index.css" type="text/css" rel="stylesheet" />
		<link href="../styles/base.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<!-- name -->
		<div class="name">
			<div class="name-left">
				<p class="p1"><?echo $item->store_name;?></p>
				<P class="p2" ><img src="../images/starts.png"><img src="../images/starts.png"><img src="../images/starts.png"><img src="../images/starts.png"><img src="../images/starts.png"></p>
				<p class="p3">￥<?echo $item->store_price;?>/人 &nbsp;&nbsp;
			</div>
			<div class="name-right">
				<!--
<p style="float:left;margin:5px 10px;padding:2px 10px;background:#0099Cc;color:#ffffff;font-size:12px;">休息中</p>
-->
				<img src="<? echo $item->store_img;?>">
			</div>
			<div style="clear:both;"></div>


		</div>

		<div class="yuding">
			<a href="yuding-order-list.php">
			<div class="yuding-left">
				<span class="a1">订</span><span>预定</span>
			</div></a>
				<? if($item->store_pinglun==0){ echo '<a href="javascript:alert('; echo "'当前门店没有开启评论功能'"; echo ')" >';} if($item->store_pinglun==1){ echo '<a href="pinglun-add.php">';}?>
			<div class="yuding-right">
				<span class="a1">评</span><span>评论</span>
			</div></a>
				<div style="clear:both;"></div>
		</div>

		<!--门店详情 -->
		<a href="store_beizhu.php">
		<div class="box" style="margin-top:10px;border-top:1px solid #eeeeee;">
			门店详情<span>></span>
		</div>
	</a>
		<!-- 地址-->
		<a onclick="dizhi()">
		<div class="box">
			地址：<?echo $item->store_place;?><span>></span>
		</div>
	</a>
	<a href="tel:<? echo $item->store_phone;?>">
		<div class="box">
			电话：<?echo $item->store_phone;?><span>></span>
		</div>
	</a>
		<!-- 更多信息-->
		<div class="box" style="margin-top:10PX;border-top:1px solid #eeeeee;">
			更多信息
		</div>
			<div class="box box1" >
			<img src="../images/wifi.png" style="width:15px;"><? $wifi=$item->store_wifi; if($wifi==0){echo "不";}?>支持WiFi <img src="../images/p.png" style="width:15px;"> 停车位<?echo $item->store_paking;?>个
		</div>
		<div class="box box1" >
			<img src="../images/time.png" style="width:13px;"> 营业时间：<span><?echo $item->store_showtime;?></span>
		</div>
		<!-- 评论 -->
		<a href="pinglun-list.php">
		<div class="box" style="margin-top:10PX;border-top:1px solid #eeeeee;">
			查看所有评论<span><font class="color-b"><? tj("pinglun where shenhe = 1 $sql2");?></font> ></span>
		</div>
	</a>
	<?php
	pinglun();?>
	<!--
		<div class="box ping">
			<p class="p1">匿名 &nbsp;<a style="color:#666666;">2016-11-27</a></p>
			<p class="p2">挺好的啊,非常棒 我很喜欢，环境很好，</p>
		</div>
		<div class="box ping">
			<p class="p1">匿名 &nbsp;<a style="color:#666666;">2016-11-27</a></p>
			<p class="p2">挺好的啊,</p>
		</div>
		<div class="box ping">
			<p class="p1">匿名 &nbsp;<a style="color:#666666;">2016-11-27</a></p>
			<p class="p2">挺好的啊,非常棒 我很喜欢</p>
		</div>-->
		<div style="padding-bottom:80px;"></div>
			<!-- 底部菜单-->
	<div class="footer">
		<div class="footlogo">
			<a href="../index">
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
      'openLocation'
    ]
  });
  function dizhi(){
 wx.openLocation({
    latitude: 23.258320, // 纬度，浮点数，范围为90 ~ -90
    longitude: 113.294190, // 经度，浮点数，范围为180 ~ -180。
    name: '秀姐咖啡店', // 位置名
    address: '解放路', // 地址详情说明
    scale: 28, // 地图缩放级别,整形值,范围从1~28。默认为最大
    infoUrl: 'http：//baidu.com' // 在查看位置界面底部显示的超链接,可点击跳转
});
}
</script>
</html>
