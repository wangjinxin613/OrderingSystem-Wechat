<?php
/**
 * Native（原生）支付-模式二-demo
 * ====================================================
 * 商户生成订单，先调用统一支付接口获取到code_url，
 * 此URL直接生成二维码，用户扫码后调起支付。
 *
*/

	require('../config/index_class_no.php');

	$money = $_POST['money'];
	$order_id = $_POST['order_id'];
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
	$unifiedOrder->setParameter("body","购买商品");//商品描述
	//自定义订单号，此处仅作举例
	$timeStamp = time();
	$moneys = $money * 100;
	$out_trade_no = $order_id;
	$out_trade_nos = "cgwx".$order_id; //为了避免订单号重复
	$unifiedOrder->setParameter("out_trade_no","$out_trade_nos" );//商户订单号
	$unifiedOrder->setParameter("total_fee","$moneys");//总金额
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
	<title>微信付款</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<script src="../js/jquery-1.8.3.min.js"></script>
<link rel="stylesheet" href="../assets/css/font-awesome.min.css" />
<link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="../css/style.css"/>
            <link rel="stylesheet" href="../assets/css/ace.min.css" />
	<script type="text/javascript">
					$(function () {
							(function longPolling() {
									//alert(Date.parse(new Date())/1000);
									$.ajax({
										  url: "check.php",
										  	type : "POST",
											data: {id:"<?echo $order_id;?>"},
											dataType: "text",
											timeout: 5000,//5秒超时，可自定义设置
											error: function (XMLHttpRequest, textStatus, errorThrown) {
													
													
													if (textStatus == "timeout") { // 请求超时
															longPolling(); // 递归调用
													} else { // 其他错误，如网络错误等
															longPolling();
													}
											},
											success: function (data, textStatus) {
													if(data == 'success'){
														//alert("支付成功");
														window.location.href="deal.php?id=<?echo $order_id;?>";
													}
													
													//$("#test").append(data);
													if (textStatus == "success") { // 请求成功
															longPolling();
													}
											}
									});

							})();
					});
			</script>
</head>

<body style="background:#eeeeee">
	<p id="test"></p>
	<p id="test"></p>
	<div style="padding:20px 0;text-align:center;background:#ffffff;width:100%;font-size:24px;">
  	 <span style="">微信扫一扫付款</span>
  </div>
    <p style="font-size:30px;text-align:center;margin:20px 0;">￥ <?echo $money;?></p>
  	<div align="center" id="qrcode" style="" style="width:80%;">
	</div>
  <p style="text-align:center;margin-top:10px;">没有完成支付之前请不要关闭本页面</p>

	
	
	<br>
	
	

</body>
	<script src="./demo/qrcode.js"></script>
		<script src="./js/jquery-1.4.min.js"></script>
	<script>
		if(<?php echo $unifiedOrderResult["code_url"] != NULL; ?>)
		{
			var url = "<?php echo $unifiedOrderResult["code_url"];?>";
			//参数1表示图像大小，取值范围1-10；参数2表示质量，取值范围'L','M','Q','H'
			var qr = qrcode(10, 'L');
			qr.addData(url);
			qr.make();
			var wording=document.createElement('p');
			wording.innerHTML = "";
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
