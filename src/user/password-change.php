<?
	require('../config/index_config.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>修改支付密码</title>
		 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		
		<link href="../styles/extend/user/password-change.css" type="text/css" rel="stylesheet" />
		<link href="../styles/base.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
			
		<div class="head">
			<img src="../images/return.png" style="width:23px;float:left;margin-left:20px;" onClick="javascript:history.back(-1)"><span style=";">修改支付密码</span><span style="width:40px;float:right;">&nbsp;</span>
		</div>
		<div style="padding-bottom:50px;"></div>
		<div class="bt">
			<p class="p1">必填信息</p>
		</div>
		<form action="../deal/chang_pwd.php" method="POST">
		<div class="bx">
			<? if($user->pwd == null){ echo '<p>您还没有设置支付密码</p>';} else{ echo '<p>原密码<input type="text" placeholder="默认初始密码为000000" name="y_pwd"></p>';}?>
			<P>新密码<input type="text" placeholder="请输入新密码" name="n_pwd"></p>
		</div>
		<div class="ljgx">
			<input type="submit" value="立即更新"/>
		</div>
	</form>
	</body>


</html>