<?php
	require ('../config/index_config.php');
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
			<img src="../images/return.png" style="width:23px;float:left;margin-left:20px;" onClick="javascript:history.back(-1)"><span style=";">评论门店</span><span style="width:40px;float:right;">&nbsp;</span>
		</div>

		<!-- -->
		<form action="" method="POST">
		<div class="pinglun">
			  <textarea rows="10" cols="50" id="txt1" placeholder="请输入对该门店的评价(请勿输入敏感词汇)" name="pinglun_text" style=""></textarea><br />

		<div>
			<div>

				<input type="submit" value="提交评论" class="btn" onclick="showText()" />

			</div>
		</form>
	</body>
</html>
<?
	$pinglun_text=$_POST['pinglun_text'];
	if($pinglun_text!=null){
	pinglun_add($pinglun_text,$user->nickname);


}

?>
