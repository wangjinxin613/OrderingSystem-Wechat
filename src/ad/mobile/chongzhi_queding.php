<?
	require('../config/index_class.php');
	$account_id = $_POST['account_id'];
	$money = $_POST['money'];
	if($money == null){
		exit('<script>alert(\'充值金额为空！！\');history.back();</script>');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>核对会员信息</title>
		 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

		<link href="../../styles/extend/user/message.css" type="text/css" rel="stylesheet" />
		<link href="../../styles/base.css" type="text/css" rel="stylesheet" />
	</head>
	<style>
		.confirm{
			margin:30px 0;
		}
		.confirm button{
			width:80%;
			margin-left:10%;
			padding:8px 0;
			outline: none;
			background: #FF0033;
			font-size: 15px;
			border:0;
			border-radius: 5px;
			color: #ffffff;
		}
		.confirm .bt2{
			margin-top:20px;
			background:#336699;
		}
	</style>
	<body>
		<div class="head">
			<img src="../../images/return.png" style="width:23px;float:left;margin-left:20px;" onClick="javascript:history.back(-1)"><span style=";">核对会员信息</span><span style="width:40px;float:right;">&nbsp;</span>
		</div>
		<div style="padding-bottom:50px;"></div>
		<div>
<p class="p1" style="padding:10px 15px;color:#999999;">请核对您要充值的会员信息</p>
		</div>
		<div class="shou">

		<? select_user_message($account_id);?>
		<p class="p2">充值金额： <span><? echo $money;?></span></p>

		</div>
		<div class="confirm">
			<form action="action/chongzhi_action.php" method="POST">
			<input type="text" value="<? echo $money;?>" name="money" style="display:none;"/>
			<input type="text" value="<? echo $account_id;?>" name="account_id" style="display:none;"/>
			<button>确认充值</button>
			</form>
			<button class="bt2" onClick="javascript:history.back(-1)">取消</button>
		</div>
	</body>
</html>
