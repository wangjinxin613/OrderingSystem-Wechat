<?
$openid = 'oU4JkuAEBNvXJekO16sZ7mqQZE3w';
$tid = "HOzLUXNErB27RPA4IyR_5y6y6bUXyEpi4DuQRjxPN04";
$data = array(
    'cardNumber'=>array('value'=>"ss",'color'=>"#00008B")    //函数传参过来的name     
);

send_message($openid,$tid,$data,$urls);
function send_message($openid,$tid,$data){
$appid = 'wx8b5967273225b167';
$appsecret = '86cd55fd5cc1dac2140809d36f7b70a2';
$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appid}&secret=$appsecret";
$output = https_request($url);
$jsoninfo = json_decode($output,true);
$access_token = $jsoninfo["access_token"];
$jsonmenu1 = array(
'touser'=>$openid,
'template_id'=>$tid,    //模板的id
'url'=>$urls,
'topcolor'=>"#FF0000",
'data'=>$data
);
$jsonmenu = json_encode($jsonmenu1); 
  //创建菜单实现
  $url = 'https://api.weixin.qq.com/cgi-bin/message/template/send?access_token='.$access_token;
  $result = https_request($url,$jsonmenu);
  var_dump($result);
  }
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
