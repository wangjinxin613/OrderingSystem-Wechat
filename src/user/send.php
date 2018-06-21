<?php
//用户请使用UTF-8作为php源码文件的保存格式，避免出现乱码问题
error_reporting(0);
/**
* 华兴软通，sdk接口调用demo,http版;http不是安全接口,需要找客服绑定IP才能使用
* 推荐尽量使用POST方式,虽然该接口支持Get访问.因为短信服务器对GET方式的参数进行url编码后的长度限制为2048个字符(一个汉字编码后一般等于9个字符，短信很容易超标)
*/


/**
* 基于curl的post访问方式(推荐)
* 要求php打开curl扩展
* $url @string 请求地址
* $param_array @array 参数数组
*/
$tel = $_POST['tel'];
//print_r($_POST);
function curlPost($url,$param_array){

	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($param_array));
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		
	$data = curl_exec($ch);
	$error = curl_error($ch);
	curl_close($ch);
	if(!empty($error)){		//curl有错误
		//echo $error;
	}else{		//输出请求结果
		echo $data;
	}
}


/**
* 基于curl的get访问方式
* 要求php打开curl扩展
* $url string 请求地址
* $param_array array 参数数组
*/
function curlGet($url,$param_array){
	
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url . '?' . http_build_query($param_array));
	curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_BINARYTRANSFER, true) ;
		
	$data = curl_exec($ch);
	$error = curl_error($ch);
	curl_close($ch);
	if(!empty($error)){		//curl有错误
		//echo $error;
	}else{		//输出请求结果
		echo $data;
	}
}


/*
* 获取余额
* $type @string 请求方式,post或者get,推荐post,get有参数长度2048限制
*/
function getBalance($type='post'){
	$url 			= 'http://www.stongnet.com/sdkhttp/getbalance.aspx';		//http接口地址
	$url_security 	= 'https://www.stongnet.com/sdkhttp/getbalance.aspx';		//https接口地址
	$ca_info = 'F:/cert/cacert.pem';		//根证书文件路径，绝对路径
	
	$reg_code = '101100-WEB-HUAX-483473';		//华兴软通注册码，请在这里填写您从客服那得到的注册码
	$reg_pw = 'XNZAKZVS';		//华兴软通注册码对应的密码，请在这里填写您从客服那得到的密码
	
	$param_arry = array();
	$param_arry['reg'] = $reg_code;
	$param_arry['pwd'] = $reg_pw;
		
	if($type =='get'){
		curlGet($url,$param_arry);
	}else{
		curlPost($url,$param_arry);
	}
	
}

/*
* 发送短信
* $type @string 请求方式,post或者get,推荐post,get有参数长度2048限制
*/

function sendSMS($type,$phone){
	$url = 'http://www.stongnet.com/sdkhttp/sendsms.aspx';		//http接口地址
	$url_security 	= 'https://www.stongnet.com/sdkhttp/sendsms.aspx';		//https接口地址
	$ca_info = 'F:/cert/cacert.pem';		//根证书文件路径，绝对路径
	
	$reg_code = '101100-WEB-HUAX-483473';		//华兴软通注册码，请在这里填写您从客服那得到的注册码
	$reg_pw = 'XNZAKZVS';		//华兴软通注册码对应的密码，请在这里填写您从客服那得到的密码
	$source_add = '';		//子通道号（最长10位，可为空
	$phone = $phone;		//手机号码（最多1000个），多个用英文逗号(,)隔开，不可为空
	/*
	 *  签名:工信部规定,签名表示用户的真实身份,请不要在签名中冒用别人的身份,如客户使用虚假身份我们将封号处理并以诈骗为由提交工信部备案，一切责任后果由客户承担
	 *  华兴软通短信系统要求签名必须附加在短信内容的尾部,以全角中文中括号包括,且括号之后不能再有空格,否则将导致发送失败
	 *  虽然在程序中,签名是附加在短信内容的尾部,但是真实短信送达到用户手机时,签名则可能出现在短信的头部,这是各地运营商的政策不同,会在它们自己的路由对签名的位置做调整
	 *  短信内容的长度计算会包括签名;签名内容的长度限制受政策变化,具体请咨询客服
	 *  写在程序里是让用户自定义签名的方式,还有一种方式是让客服绑定签名,这种方式签名不需要写在程序中,具体请咨询客服
	 */
	$code =rand(1000,9999);
	session_start();
	$_SESSION['code'] = $code;
	$signature = '【女神阁】';      //签名
	$content = '验证码是' . $code . $signature;	//短信内容,请严格按照客服定义的模板生成短信内容,否则发送将失败(含有中文，特殊符号等非ASCII码的字符，用户必须保证其为UTF-8编码格式)
	$param_arry = array();
	$param_arry['reg'] = $reg_code;
	$param_arry['pwd'] = $reg_pw;
	$param_arry['sourceadd'] = $source_add;
	$param_arry['phone'] = $phone;
	$param_arry['content'] = $content;
	
	if($type =='get'){
		curlGet($url,$param_arry);
	}else{
		curlPost($url,$param_arry);
	}
}

//调用范例	D:\php7.0\php demo_http.php

//getBalance('post');		//post方式(推荐)
sendSMS('post',$tel);		//post方式(推荐)

//getBalance('get');		//get(服务器限制Get方式的参数编码后总长度为2048)
//sendSMS('get');		//get(服务器限制Get方式的参数编码后总长度为2048)
?>