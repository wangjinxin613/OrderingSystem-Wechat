<?php
/**
  * wechat php test
  */
//define your token
	error_reporting(0);
include('../config/conn.php');//数据库连接文件
  session_start();
    $store_id = $_SESSION['store_id']; //店铺id作为一个全局变量

    $sql1 = "where store_id = '$store_id'";
$result = mysql_query("SELECT * FROM store_setting {$sql1}");
  while($row = mysql_fetch_array($result))
  {
      $token = $row['token'];
    
  }
$token = "hello";
define("TOKEN", "weixin");
$wechatObj = new wechatCallbackapiTest();
$wechatObj->valid();
class wechatCallbackapiTest
{
public function valid()
    {
        $echoStr = $_GET["echostr"];
        //valid signature , option
        if($this->checkSignature()){
        echo $echoStr;
        exit;
        }
    }
    public function responseMsg()
    {
//get post data, May be due to the different environments
$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
      //extract post data
if (!empty($postStr)){
                
              $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $fromUsername = $postObj->FromUserName;
                $toUsername = $postObj->ToUserName;
                $keyword = trim($postObj->Content);
                $time = time();
                $textTpl = "<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[%s]]></MsgType>
<Content><![CDATA[%s]]></Content>
<FuncFlag>0</FuncFlag>
</xml>";             
if(!empty( $keyword ))
                {
              $msgType = "text";
                $contentStr = "Welcome to wechat world!";
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;
                }else{
                echo "Input something...";
                }
        }else {
        echo "";
        exit;
        }
    }
private function checkSignature()
{
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
       

$tmpArr = array("hello", $timestamp, $nonce);
sort($tmpArr);
$tmpStr = implode( $tmpArr );
$tmpStr = sha1( $tmpStr );
if( $tmpStr == $signature ){
return true;
}else{
return false;
}
}
}
?>