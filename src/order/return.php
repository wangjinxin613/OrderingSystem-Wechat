<?php
	require ('../config/index_config.php');
	$id = $_GET['id'];
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>评论门店</title>
		 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

		<link href="../styles/extend/store/pinglun.css" type="text/css" rel="stylesheet" />
		<link href="../styles/base.css" type="text/css" rel="stylesheet" />
	</head>
	<script type="text/javascript">
    function filterText(sText) {
     var reBadWords = /<?echo $item->store_pingbi?>/gi;
     return sText.replace(reBadWords, "**");
    }
   function showText() {
     var oInput1 = document.getElementById("txt1");
     oInput1.value = filterText(oInput1.value);
   }
</script>
	<body>
		<div class="head">
			<img src="../images/return.png" style="width:23px;float:left;margin-left:20px;" onClick="javascript:history.back(-1)"><span style=";">申请退款</span><span style="width:40px;float:right;">&nbsp;</span>
		</div>
	
		<!-- -->
		<form action="../deal/return_action.php" method="POST">
		<div class="pinglun">
				<p style="margin-left:10px;">退款订单号：<? echo $id;?></p>
				<input type="text" value="<? echo $id; ?>" name="order_id" style="display:none;">
			  <textarea rows="10" cols="50" id="txt1" placeholder="请输入退款理由" name="liyou" style=""></textarea><br />

		<div>
			<div>

				<input type="submit" value="提交申请" class="btn" onclick="showText()" />

			</div>
		</form>
	</body>
</html>

