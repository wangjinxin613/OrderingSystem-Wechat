<?php
  require('../../config/index_class.php');
  $money = $_POST['money'];


  erweima("http://{$_SERVER['HTTP_HOST']}/pay/index.php?id={$user->store_id}&money={$money}&fen_id={$user->fen_id}");
?>
<!DOCTYPE html>
<html >
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>员工收银</title>
		 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link href="../css/amazeui.min.css" type="text/css" rel="stylesheet" />
    	<link href="../../../styles/base.css" type="text/css" rel="stylesheet" />
</head>
<body>
  <div class="head">
    <a href="../index.php"><img src="../../../images/return.png" style="width:23px;float:left;margin-left:20px;" ></a><span style=";">扫码付款</span><span style="width:40px;float:right;">&nbsp;</span>
  </div>
   <div style="height: 49px;"></div>
   <p style="font-size:30px;text-align:center;margin:20px 0;">￥ <?echo $money;?>.00</p>
  <div style="text-align:center;"><img src="helloweba.png" style="width:70%;"></div>
  <p style="text-align:center;margin-top:10px;">使用微信扫一扫，向我付款</p>
</body>
</html>
