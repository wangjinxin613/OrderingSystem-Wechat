<?php
	require ('../config/index_config.php');

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />

		<title>推广赚积分</title>
		 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<script src="../js/jquery-1.4.min.js" type="text/javascript"></script>
		<script src="../js/jquery-1.11.0.min.js" type="text/javascript"></script>

		<link href="../styles/extend/styles.css" type="text/css" rel="stylesheet" />
		<link href="../styles/base.css" type="text/css" rel="stylesheet" />
	 <script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	</head>
	<body style="background:#ffffff;">
		<div class="head">
			<img src="../images/return.png" style="width:23px;float:left;margin-left:20px;" onClick="javascript:history.back(-1)"><span style=";">推广赚积分</span><span style="width:40px;float:right;">&nbsp;</span>
		</div>
		<div style="padding-bottom:48px;"></div>
		<div>
			<img src="share1.png" style="width:100%;">

		</div>
		<div style="text-align:center;font-size:17px;line-height:30px;">
			<p>邀请好友注册</p>
			<p>即可赚取积分</p>
			<a href="yaoqing.php">
			<button style="padding:10px 0;border:1px solid #FF6600;font-size:14px;background:#ffffff;width:80%;margin-top:30px;color:#ff6600;border-radius:5px;"  >立即邀请</button>
		</a>
		</div>

	</body>
	<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js "></script>
    <script>
      // $(function(){
      //   $('#onMenuShareTimeline').click(function(){
      //     console.log('bbbbbbbbbbbbbb');
      //   });
      //     console.log('cccccccccccccccc');
      // });
      wx.config({
        debug: true,
        appId: 'wx74c20ccaed8a5e2c',
        timestamp: '3123213213',
        nonceStr: '3213123213',
        signature: '321213213213',
        jsApiList: [
            'checkJsApi',
            'onMenuShareTimeline',
            'onMenuShareAppMessage'
        ]
      });
      wx.ready(function(){
         function test(){
          console.log('aaaaaaaaa');
          wx.onMenuShareTimeline({
            title: '促销易幸运大抽奖', // 分享标题
            link: 'http://movie.douban.com/subject/25785114/', // 分享链接
            imgUrl: 'http://demo.open.weixin.qq.com/jssdk/images/p2166127561.jpg', // 分享图标
            success: function (res) {
                console.log(res);
            },
            cancel: function () {
                // 用户取消分享后执行的回调函数
            }
          });
        }
      });
    </script>

</html>
