<?
$appid = 'wx8b5967273225b167';
$appsecret = '86cd55fd5cc1dac2140809d36f7b70a2';
$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appid}&secret=$appsecret";
$output = https_request($url);
$jsoninfo = json_decode($output,true);
$access_token = $jsoninfo["access_token"];
$jsonmenu = '{
  "button": [
     {
         "name": "微信点餐",
         "sub_button": [
             {
               "type":"view",
               "name":"所有门店列表",
               "url":"http://www.nsg0769.cn"
             },
             {
               "type":"view",
               "name":"演示门店",
               "url":"http://www.nsg0769.cn/index.php?id=1"
             }
             {
                   "type": "scancode_waitmsg",
                   "name": "扫码支付",
                   "key": "rselfmenu_0_1",
                   "sub_button": [ ]
              }
         ]
     },
    }';


  //创建菜单实现
  $url = 'https://api.weixin.qq.com/cgi-bin/menu/create?access_token='.$access_token;
  $result = https_request($url,$jsonmenu);
  var_dump($result);
  function https_request($url,$data = null){
      $curl = curl_init();
      curl_setopt($curl,CURLOPT_URL,$url);
      curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
      curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
      if(!empty($data)){
          curl_setopt($curl,CURLOPT_POST,1);
          curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
      }
      curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
      $output = curl_exec($curl);
      curl_close($curl);
      return $output;
  }
  ?>
