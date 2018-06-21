<?php
//首先检测是否支持curl
echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
if (!extension_loaded("curl")) {
trigger_error("对不起，请开启curl功能模块！", E_USER_ERROR);
}
//构造xml
$xmldata="<xml>
    <mch_id>100000036258</mch_id>
    <body>test qrcode pay</body>
    <total_fee>1</total_fee>

    <spbill_create_ip>127.0.0.1</spbill_create_ip>
    <notify_url>http://127.0.0.1/zhifubao</notify_url>
    <out_trade_no>43806920522</out_trade_no>
    <nonce_str>53937a224ff6476d9cd14bd92386bb16</nonce_str>
    <sign>94292E64B00B68BA1ED9DE847BC153BD</sign>
</xml>";
//初始一个curl会话
$curl = curl_init();
//设置url
curl_setopt($curl,CURLOPT_URL,"api.cmbxm.mbcloud.com/alipay/orders/precreate");
//设置发送方式：

//设置发送数据
curl_setopt($curl, CURLOPT_POSTFIELDS, $xmldata);
//抓取URL并把它传递给浏览器
print_r(curl_exec($curl));
//关闭cURL资源，并且释放系统资源
curl_close($curl);

?>
