<?
	require('../config/index_config.php');	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>我的礼品券</title>
		 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		
		<link href="../styles/extend/member/qiandao.css" type="text/css" rel="stylesheet" />
		<link href="../styles/extend/member/orderlist-list.css" type="text/css" rel="stylesheet" />
		<link href="../styles/base.css" type="text/css" rel="stylesheet" />
		<script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
  		<script src="../js/layer.js"></script>
		<script src="../js/loading.js"></script>
	</head>
	
	<body>
		<div class="head">
			<img src="../images/return.png" style="width:23px;float:left;margin-left:20px;" onClick="javascript:history.back(-1)"><span style=";">我的礼品券</span><span style="width:40px;float:right;">&nbsp;</span>
		</div>
		<div style="padding-bottom:50px;"></div>
		<div class="title">
			<ul>
				<li>可用</li>
				<li>已用</li>
				<li>过期</li>
				<li>退款</li>
			</ul>
		</div>
		<div style="padding-bottom:40px;"></div>
		<? my_lipin_list();?>
		
	</body>
	<script>
	

	function duihuan(){
		
  layer.msg('请告知服务员您的兑换码领取礼品');
	}
	</script>
</html>