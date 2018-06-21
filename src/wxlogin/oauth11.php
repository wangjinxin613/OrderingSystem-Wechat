        <meta charset="utf-8" />
<?php
  include('../config/conn.php');//数据库连接文件
    error_reporting(0);
  session_start();
    $store_id = $_SESSION['store_id']; //店铺id作为一个全局变量
    $sql1 = "where store_id = '$store_id'";
$result = mysql_query("SELECT * FROM store_setting {$sql1}");
  while($row = mysql_fetch_array($result))
  {
      $appid = $row['appid'];
      $appsecret = $row['appsecret'];
  }
  echo $appid;
  echo '<br>';
  echo $appsecret;
$code = $_GET['code'];
$state = $_GET['state'];
//换成自己的接口信息
$appid = $appid;
$appsecret = $appsecret;
if (empty($code)) $this->error('授权失败');
$token_url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$appid.'&secret='.$appsecret.'&code='.$code.'&grant_type=authorization_code';
$token = json_decode(file_get_contents($token_url));
if (isset($token->errcode)) {
    echo '<h1>公众号配置有误</h1>'.$token->errcode;
    echo '<br/><h2>错误信息：</h2>'.$token->errmsg;
    exit;
}
$access_token_url = 'https://api.weixin.qq.com/sns/oauth2/refresh_token?appid='.$appid.'&grant_type=refresh_token&refresh_token='.$token->refresh_token;
//转成对象
$access_token = json_decode(file_get_contents($access_token_url));
if (isset($access_token->errcode)) {
    echo '<h1>错误：</h1>'.$access_token->errcode;
    echo '<br/><h2>错误信息：</h2>'.$access_token->errmsg;
    exit;
}
$user_info_url = 'https://api.weixin.qq.com/sns/userinfo?access_token='.$access_token->access_token.'&openid='.$access_token->openid.'&lang=zh_CN';
//转成对象
$user_info = json_decode(file_get_contents($user_info_url));
if (isset($user_info->errcode)) {
    echo '<h1>错误：</h1>'.$user_info->errcode;
    echo '<br/><h2>错误信息：</h2>'.$user_info->errmsg;
    exit;
}
echo '跳转中.....';
$nickname=$user_info->nickname;
$sex=$user_info->sex;
$openid=$user_info->openid;
$headimgurl=$user_info->headimgurl;

$time= date("Y/m/d H:i:s");//获取当前时间

   include('../config/conn.php');//链接数据库

    $sql = "select * from member where wx_openid ='$openid' and store_id = '$store_id'";
    $rs = mysql_query($sql, $con);
    if(mysql_num_rows($rs)>0){
   echo 'waitting ';

}else{
     $q="insert into member(account_id,wx_nickname,wx_sex,wx_openid,wx_headImg,create_date,store_id) values (null,'$nickname','$sex','$openid','$headimgurl','$time','$store_id')";//向数据库插入表单传来的值的sql
    $reslut=mysql_query($q,$con);//执行sql


  if (!$reslut){
    die('Error: ' . mysql_error());//如果sql执行失败输出错误
  }else{

  }
}
  mysql_select_db("my_db", $con);
  $result1 = mysql_query("SELECT * FROM member where wx_openid = '$openid' and store_id = '$store_id'");
  while($row = mysql_fetch_array($result1))
  {

      $_SESSION['account_id'] = $row['account_id'];

  }
  echo $_SESSION['account_id'];

        $url  =  "../index";
        echo " <script   language = 'javascript'
        type = 'text/javascript' > ";
        echo " window.location.href = '$url' ";
        echo " </script > ";
?>
