<?
	require('../config/index_config.php');
	$money = $_GET['money'];
	$yid = $_GET['yid'];
	if(is_numeric($money) == false){ //检测传递过来的参数必须是数字，防止被黑客攻击
    exit('<script>alert(\'参数传递有误！！\');history.back();</script>');
}

check_daijin();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8" />
<title>我的代金</title>
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link href="../css/lanren.css" type="text/css" rel="stylesheet" />
	<link href="../styles/base.css" type="text/css" rel="stylesheet" />
	<script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
  		<script src="../js/mobile/layer.js"></script>
  		<script src="../js/layer.js"></script>
  		<script src="../js/loading.js"></script>
</head>
<body >
<div class="head">
			<img src="../images/return.png" style="width:23px;float:left;margin-left:20px;" onClick="javascript:history.back(-1)"><span style=";">我的代金券</span><span style="width:40px;float:right;">&nbsp;</span>
		</div>
		 <div style="height: 50px;"></div>
<div class="demo" >


<!-- 效果2 end -->

<!-- 效果3 begin -->
<? order_my_daijin($money,$yid);?>
<!-- 效果3 end -->

<!-- 效果4 begin -->

<!-- 效果4 end -->

</div>

</body>
<script>
	function jing(){
		layer.msg('该代金券不能在当前订单使用，<br>如有疑问请联系管理员');
	}
</script>
</html>