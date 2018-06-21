<?php 
/**
 *利用google api生成二维码图片
* $content：二维码内容参数
* $size：生成二维码的尺寸，宽度和高度的值
* $lev：可选参数，纠错等级
* $margin：生成的二维码离边框的距离
*/
function create_erweima($content, $size = '300', $lev = 'L', $margin= '0') {
	$content = urlencode($content);
	$image = '<img src="http://chart.apis.google.com/chart?chs='.$size.'x'.$size.'&amp;cht=qr&chld='.$lev.'|'.$margin.'&amp;chl='.$content.'"  widht="'.$size.'" height="'.$size.'" />';
	return $image;
}
/*
 * 使用注意事项
* 1.先构建内容字符串
* 2.调用函数生成
*/
//构建内容字符串
//(备注：\r\n为换行回车)
$content="微信公众平台：思维与逻辑\r\n公众号:siweiyuluoji";
//为防止乱码，进行转码
$encode = mb_detect_encoding($content, array("ASCII","UTF-8","GB2312","GBK","BIG5"));
$str= iconv($encode, "UTF-8", $content);
//调用函数生成二维码图片
echo create_erweima($str);
echo "<br/>";

/**********************************************/
//网址生成二维码
$url="weixin://wxpay/bizpayurl?pr=e7tP6yqbool";
$url.="\r\n";
$url.="weixin://wxpay/bizpayurl?pr=e7tP6yqbool";
echo create_erweima($url);

















exit;
require_once 'common.php';
$smarty->assign("xieyi",1);
$title="网站注册协议";
$smarty->assign("html_title",mb_convert_encoding($title,"UTF-8","GBK"));
$smarty->display("xieyi.html");


?>