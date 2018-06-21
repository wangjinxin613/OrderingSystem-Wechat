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
       $tid1 = $row['tid1'];
          $tid2 = $row['tid2'];
      $appsecret = $row['appsecret'];
  }
 // echo $appid;
  echo '<br>';
 // echo $appsecret;
$code = $_GET['code'];
$state = $_GET['state'];
$yid = $_SESSION['yid'];
//该函数用于获取邀请人
function get_name($yid){
	$sql1 = "where account_id = '$yid' and store_id = {$_SESSION['store_id']}";
$result = mysql_query("SELECT * FROM member {$sql1}");
  while($row = mysql_fetch_array($result))
  {
     
      $y_name = $row['wx_nickname'];
  }
  echo $y_name;
}
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
//echo '跳转中.....';
$nickname=$user_info->nickname;
$sex=$user_info->sex;
$openid=$user_info->openid;
$headimgurl=$user_info->headimgurl;

$time= date("Y/m/d H:i:s");//获取当前时间

   include('../config/conn.php');//链接数据库

    $sql = "select * from member where wx_openid ='$openid' and store_id = '$store_id'";
    $rs = mysql_query($sql, $con);
    if(mysql_num_rows($rs)>0){
  // echo 'waitting ';

}else{
 
require('../config/index_config.php');
$data = array(
    'keyword1'=>array('value'=>$nickname,'color'=>"#00008B"), 
    'keyword2'=>array('value'=>$time,'color'=>"#00008B"), 
);
$urls = $_SERVER['HTTP_HOST']."/index.php?id=$store_id";
    send_message($openid,$tid1,$data,$urls); //发送通知
     $q="insert into member(account_id,wx_nickname,wx_sex,wx_openid,wx_headImg,create_date,store_id) values (null,'$nickname','$sex','$openid','$headimgurl','$time','$store_id')";//向数据库插入表单传来的值的sql
    $reslut=mysql_query($q,$con);//执行sql
   

  
  if (!$reslut){
    die('Error: ' . mysql_error());//如果sql执行失败输出错误
  }else{

  }
}
   $c= $_SESSION['c'];
 
  if($c == '1'){
      $url = '../diancan/index.php';
      unset($_SESSION['c']);
    }else{
      $url  =  "../index";
    }
  mysql_select_db("my_db", $con);
  $result1 = mysql_query("SELECT * FROM member where wx_openid = '$openid' and store_id = '$store_id'");
  while($row = mysql_fetch_array($result1))
  {
    $account_id = $row['account_id'];
     $_SESSION['account_id'] = $row['account_id'];
	$blog = $row['blog'];
     $up_id = $row['up_id'];
	 $store_id = $row['store_id'];
  }
 if($yid !=null){
	echo "<script>alert('您的邀请人为";get_name($yid);echo $up_id; echo "');</script>";
	if($blog == 1){
		echo "<script>alert('您的账号已经完成了激活，不可以成为其他人的下线');</script>";
    
        echo " <script   language = 'javascript'
        type = 'text/javascript' > ";
        echo " window.location.href = '$url' ";
        echo " </script > ";
    echo "<script>alert('您不可以邀请您自己');</script>";
      exit();
	}
	else if($yid == $_SESSION['account_id']){
    echo "<script>alert('您已经存在上线，不可重复添加');</script>";
      
        echo " <script   language = 'javascript'
        type = 'text/javascript' > ";
        echo " window.location.href = '$url' ";
        echo " </script > ";
		echo "<script>alert('您不可以邀请您自己');</script>";
      exit();
	}else if($up_id != null){
		echo "<script>alert('您已经存在上线，不可重复添加');</script>";
       
        echo " <script   language = 'javascript'
        type = 'text/javascript' > ";
        echo " window.location.href = '$url' ";
        echo " </script > ";
    exit();
	}else{
   
  $result2 = mysql_query("SELECT * FROM member where account_id = '$yid'");
  while($row = mysql_fetch_array($result2))
  {
    $y_openid = $row['wx_openid'];
}
 
$data1 = array(
    'keyword1'=>array('value'=>$account_id,'color'=>"#00008B"), 
    'keyword2'=>array('value'=>$time,'color'=>"#00008B"), 
);
 //echo "<script>alert('";echo $y_openid; echo "');</script>";
$urls1 = $_SERVER['HTTP_HOST']."/index.php?id=$store_id";
   //echo "<script>alert('";echo $tid2; echo "');</script>";
include_once('../config/index_config.php');
       // send_message($openid,$tid1,$data,$urls); //发送通知
    send_message($y_openid,$tid2,$data1,$urls1); //发送通知
    // echo "<script>alert('";echo $y_openid; echo "');</script>";
  // echo "<script>alert('";echo $yid; echo "');</script>";
		$s = "update member set up_id = '$yid' where account_id = {$_SESSION['account_id']} and store_id = '$store_id'";
		   $reslut=mysql_query($s,$con);//执行sql
		  // require('../config/index_config.php');
		   update_share_points($yid);
	}
}

 
  $_SESSION['openid'] = $openid;
//  echo $_SESSION['account_id'];

        
        echo " <script   language = 'javascript'
        type = 'text/javascript' > ";
        echo " window.location.href = '$url' ";
        echo " </script > ";
?>
