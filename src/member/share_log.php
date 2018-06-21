<?
	require('../config/index_config.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>分享记录</title>
		 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

		<link href="../styles/extend/member/qiandao.css" type="text/css" rel="stylesheet" />
		<link href="../styles/extend/member/index.css" type="text/css" rel="stylesheet" />
		<link href="../styles/base.css" type="text/css" rel="stylesheet" />
	</head>
  <style>
    .lj{
      background:#00e422;
      color:#FFFFFF;
      margin-top: 5px;
      padding:10px 10px;
    }
    .lj .p2{
      text-align: center;
      font-size: 35px;
    }
    .shang{
      background:#ffffff;
      margin:10px 0;
      padding:10px 10px;
      border-top:1px solid #eeeeee;
        border-bottom:1px solid #eeeeee;
    }
    .shang span{
      float: right;
    }
    .xia{

    }
    .xia img{
      width:50px;
      height:50px;
      border:1px solid #eeeeee;
      float: left;
      margin: 10px 10px;
    }
  </style>
	<body>
		<div class="head">
			<img src="../images/return.png" style="width:23px;float:left;margin-left:20px;" onClick="javascript:history.back(-1)"><span style=";">分享记录</span><span style="width:40px;float:right;">&nbsp;</span>
		</div>
		<div style="padding-bottom:50px;"></div>
    <div class="lj">
        <p class="p1">累计收益</p>
        <p class="p2"><? echo $user->up_money_gift;?><span style="font-size:12px;">&nbsp;&nbsp;元</span></p>
    </div>
    <div class="shang">
      <p>我的上级：<span><? get_sname($user->up_id);?></span></p>
    </div>
    <div class="shang">
      <p>我的下级：</p>
    </div>
    <div class="xia">
     <?get_ximg();?>
    </div>
    <a href="../index/yaoqing.php">
    <button style="width:90%;background:#00e422;padding:10px 0;border:0;color:#FFFFFF;border-radius:10px;margin:20px 5%;">马上推广</button>
  </a>
	<a style="font-size:12px;float:right;padding-right:20px;" href="share_gift_log.php">推广收益记录</a>
	</body>
</html>
