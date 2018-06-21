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
		<!-- 清除微信缓存
		<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
		<meta http-equiv="Pragma" content="no-cache" />
		<meta http-equiv="Expires" content="0" />
		清除缓存结束-->
		<title>首页</title>
		 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<script src="../js/jquery-1.4.min.js" type="text/javascript"></script>
		<script src="../js/jquery-1.11.0.min.js" type="text/javascript"></script>

		<link href="../styles/extend/styles.css" type="text/css" rel="stylesheet" />
		<link href="../styles/base.css" type="text/css" rel="stylesheet" />
		<script src="../js/loading.js"></script>

		 <script>
$(function(){
	$('.images .item:first, .control span:first, .title p:first').addClass('active');
	var index = 0,
		len = $('.images .item').length;
		autoPlay = function(){
			$('.images .item').eq(index++).addClass('active').siblings('.item').removeClass('active');
			$('.title p').eq(index-1).addClass('active').siblings('p').removeClass('active');
			$('.control span').eq(index-1).addClass('active').siblings('span').removeClass('active');
			if(index == len){index = 0;}
		},
		loop = setInterval(autoPlay,3000);
	$('.control span').hover(function(){
		index = $(this).index();
		autoPlay();
		clearInterval(loop);
	},function(){
		loop = setInterval(autoPlay,3000);
	})

})

</script>
	</head>
	<body>
		<!-- 首页轮播图-->
<div class="focus">
	<div class="images">
		 <?php
include ('../config/conn.php');

error_reporting(0);
header("Content-Type: text/html; charset=utf8");
//数据库名
mysql_query("set names utf8");//设置字符集编码

$sql="select * from advertising {$sql1} order by sx asc ";//查询语句
$res=mysql_query($sql);//执行查询
while($row=mysql_fetch_assoc($res)){
    $rows[]=$row;//接受结果集
}

//遍历数组
foreach($rows as $key=>$v){
    	echo '<div class="item"><img src="'; echo $v['imgurl']; echo '" /></div>';
    }
    echo '</div>
    <div class="control">';
    	foreach($rows as $key=>$v){
    	echo '<span></span>';
    }
    ?>
    </div>
</div>
	<!--门店选择 -->
	<a href="../fendian_list.php">
	<div class="mdxz">
	  <? echo $item->store_name;?>
	  <span style="float:right;color:#999999;font-size:13px; ">更多分店&nbsp;&#62;</span>
	</div>
</a>
	<!-- 公告 -->
	<div class="gg">
	<p class="p1"><span class="span1">&nbsp;</span>&nbsp;&nbsp;本店公告<span style="float:right;font-size:12px;">&nbsp;&nbsp;<span style="color:#999999;font-size:14px;"></span></span></p>
		<div class="ggtext">
			<p class="title"><? echo $item->gg_title;?></p>
			<p class="text"><? echo $item->gg_body;?></p>
			<P class="text"><? echo $item->gg_time;?></p>
		</div>
	</div>
	<!--功能列表 -->
	<div class="gnlist">
		<div class="gnlogo">
			<a onclick="sao()">
			<p><img src="../images/icon3.png"></p>
			<p>扫码点餐</p>
		</a>
		</div>
		<div class="gnlogo">
			<a href="../waimai">
			<p><img src="../images/waimai.png"></p>
			<p>定外卖</p>
		</a>
		</div>

		<div class="gnlogo">
			<a href="../store/yuding-order-list.php">
			<p><img src="../images/icon4.png"></p>
			<p>预订</p>
			</a>
		</div>
		<div class="gnlogo">
			<a href="../pay">
			<p><img src="../images/icon5.png"></p>
			<p>买单</p>
		</a>
		</div>
		<div class="gnlogo">
			<a href="../member/card.php">
			<p><img src="../images/icon6.png"></p>
			<p>卡券</p>
			</a>
		</div>
		<div class="gnlogo">
			<a href="../member/jifen.php">
			<p><img src="../images/icon7.png"></p>
			<p>积分兑换</p>
			</a>
		</div>
		<div class="gnlogo">
			<a href="../member/qiandao.php">
			<p><img src="../images/icon8.png"></p>
			<p>签到</p>
			</a>
		</div>
		<div class="gnlogo">
			<a href="../member/orderlist.php">
			<p><img src="../images/icon9.png"></p>
			<p>订单中心</p>
			</a>
		</div>
		<div class="gnlogo">
			<a href="share.php">
			<p><img src="../images/icon10.png"></p>
			<p>推广赚积分</p>
			</a>
		</div>
		<div class="gnlogo">
			<a href="../store">
			<p><img src="../images/icon1.png"></p>
			<p>门店介绍</p>
		</a>
		</div>

		<!--
		<div class="gnlogo">
			<a href="">
			<p><img src="images/icon11.png"></p>
			<p>礼品兑换</p>
			</a>
		</div>
	-->
		<div class="gnlogo">
			<a href="notice.php">
			<p><img src="../images/icon12.png"></p>
			<p>我的通知</p>
			</a>
		</div>
		<div class="gnlogo">
			<a href="../ad/mobile">
			<p><img src="../images/icon14.png"></p>
			<p>员工收银</p>
		</a>
		</div>
	</div>
	<div style="clear:both;padding-bottom:60px;"></div>
	<!-- 底部菜单-->
	<div class="footer">
		<div class="footlogo">
			<p><img src="../images/foot.png"></p>
			<p>首页</p>
		</div>
		<div class="footlogo">
			<a href="../store">
			<p><img src="../images/foot4.png" ></p>
			<p>门店介绍</p>
		</a>
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
