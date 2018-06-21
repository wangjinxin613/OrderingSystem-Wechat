<?php
/**
 * Native（原生）支付-模式二-demo
 * ====================================================
 * 商户生成订单，先调用统一支付接口获取到code_url，
 * 此URL直接生成二维码，用户扫码后调起支付。
 *
*/
	include_once("./WxPayPubHelper/WxPayPubHelper.php");

	//使用统一支付接口
	$unifiedOrder = new UnifiedOrder_pub();

	//设置统一支付接口参数
	//设置必填参数
	//appid已填,商户无需重复填写
	//mch_id已填,商户无需重复填写
	//noncestr已填,商户无需重复填写
	//spbill_create_ip已填,商户无需重复填写
	//sign已填,商户无需重复填写
	$unifiedOrder->setParameter("body","贡献一分钱");//商品描述
	//自定义订单号，此处仅作举例
	$timeStamp = time();
	$out_trade_no = WxPayConf_pub::APPID."$timeStamp";
	$unifiedOrder->setParameter("out_trade_no","$out_trade_no");//商户订单号
	$unifiedOrder->setParameter("total_fee","1");//总金额
	$unifiedOrder->setParameter("notify_url",WxPayConf_pub::NOTIFY_URL);//通知地址
	$unifiedOrder->setParameter("trade_type","NATIVE");//交易类型
	//非必填参数，商户可根据实际情况选填
	//$unifiedOrder->setParameter("sub_mch_id","XXXX");//子商户号
	//$unifiedOrder->setParameter("device_info","XXXX");//设备号
	//$unifiedOrder->setParameter("attach","XXXX");//附加数据
	//$unifiedOrder->setParameter("time_start","XXXX");//交易起始时间
	//$unifiedOrder->setParameter("time_expire","XXXX");//交易结束时间
	//$unifiedOrder->setParameter("goods_tag","XXXX");//商品标记
	//$unifiedOrder->setParameter("openid","XXXX");//用户标识
	//$unifiedOrder->setParameter("product_id","XXXX");//商品ID

	//获取统一支付接口结果
	$unifiedOrderResult = $unifiedOrder->getResult();

	//商户根据实际情况设置相应的处理流程
	if ($unifiedOrderResult["return_code"] == "FAIL")
	{
		//商户自行增加处理流程
		echo "通信出错：".$unifiedOrderResult['return_msg']."<br>";
	}
	elseif($unifiedOrderResult["result_code"] == "FAIL")
	{
		//商户自行增加处理流程
		echo "错误代码：".$unifiedOrderResult['err_code']."<br>";
		echo "错误代码描述：".$unifiedOrderResult['err_code_des']."<br>";
	}
	elseif($unifiedOrderResult["qr_code"] != NULL)
	{
		//从统一支付接口获取到code_url
		$code_url = $unifiedOrderResult["qr_code"];
		//商户自行增加处理流程
		//......
	}

?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>支付宝付款</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>

<body>
	<div align="center" id="qrcode" style="">
	</div>
	<div align="center">
		<p>订单号：<?php echo $out_trade_no; ?></p>
	</div>
	<div align="center">
		<form  action="./order_query.php" method="post">
			<input name="out_trade_no" type='hidden' value="<?php echo $out_trade_no; ?>">
		    <button type="submit" >查询订单状态</button>
		</form>
	</div>
	<br>
	<button class="btn_download">浏览器打开完成支付</button>
	<div align="center">
		<form  action="./refund.php" method="post">
			<input name="out_trade_no" type='hidden' value="<?php echo $out_trade_no; ?>">
			<input name="refund_fee" type='hidden' value="1">
		    <button type="submit" >申请退款</button>
		</form>
	</div>
	<br>
	<div align="center">
		<a href="../index.php">返回首页</a>
	</div>
	<? echo $unifiedOrderResult["qr_code"];?>
</body>
	<script src="./demo/qrcode.js"></script>
		<script src="./js/jquery-1.4.min.js"></script>
	<script>
		if(<?php echo $unifiedOrderResult["qr_code"] != NULL; ?>)
		{
			var url = "<?php echo $unifiedOrderResult["qr_code"];?>";
			//参数1表示图像大小，取值范围1-10；参数2表示质量，取值范围'L','M','Q','H'
			var qr = qrcode(10, 'L');
			qr.addData(url);
			qr.make();
			var wording=document.createElement('p');
			wording.innerHTML = "扫我，扫我";
			var code=document.createElement('DIV');
			code.innerHTML = qr.createImgTag();
			var element=document.getElementById("qrcode");
			element.appendChild(wording);
			element.appendChild(code);
		}
	</script>
	<script>
	$(function(){
								var browser = window.browser;
								if (browser.isWechatBrowser) {
								$('head').append('<style>.browser-tips{position:fixed;top:0;left:0;width:100%}.browser-tips-content{position:relative;z-index:1;margin:0 10px;padding:5px;background-color:#fff;border-radius:0 0 5px 5px}.browser-tips-content label{position:relative;z-index:1;padding:0 6px;line-height:42px;background-color:#fff;font-size:15px}.browser-tips-content .line-with-bg{display:block;background-color:#d7eaf6;border-radius:2px}.browser-tips-content .tips-arrow{position:absolute;top:6px;right:20px;width:30px;height:30px;background:url("resources/images/wechat_tips_arrow_v2.png") no-repeat right top;background-size:30px 30px}.browser-tips-content .font-attention{color:#06acd2}.browser-tips-mask{position:fixed;top:0;left:0;width:100%;height:100%;background-color:rgba(36,39,42,.8)}</style>');
								 var $downloadBtns = $('.btn_download');
				 $downloadBtns.click(function(e) {
				 e.preventDefault();
					var $browserTips = $("<div></div>")
										 .attr("id", "browserTips")
										 .addClass("browser-tips")
										 .html("<div class='browser-tips-content'>"
																		 +   "<label>微信内无法下载，请点击<span class='font-attention'>右上角</span>按钮</label>"
																		 +   "<label class='line-with-bg'>选择<span class='font-attention'>「在浏览器中打开」</span>即可正常下载</label>"
																		 +   "<div class='tips-arrow'></div>"
																		 + "</div>"
																		 + "<div class='browser-tips-mask'></div>");

						 $("body").append($browserTips);
						 $browserTips.find(".browser-tips-mask").click(function() {
								 $browserTips.remove();
						 });
				 });
document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
								 WeixinJSBridge.call('showOptionMenu');
						 });
					}
});
	</script>
</html>
