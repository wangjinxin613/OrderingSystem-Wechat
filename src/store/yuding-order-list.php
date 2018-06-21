<?php
	require('../config/index_config.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>座位预定</title>
		 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

		<link href="../styles/extend/store/yuding-order-list.css" type="text/css" rel="stylesheet" />
		<link href="../styles/base.css" type="text/css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="../js/datedropper.css">
<link rel="stylesheet" type="text/css" href="../js/timedropper.min.css">
		<script type="text/javascript" src="../js/jquery-1.12.3.min.js"></script>
<script src="../js/datedropper.min.js"></script>
<script src="../js/timedropper.min.js"></script>
	</head>
	<body>
		<div class="head">
			<img src="../images/return.png" style="width:23px;float:left;margin-left:20px;" onClick="javascript:history.back(-1)"><span style=";">座位预定</span><span style="width:40px;float:right;">&nbsp;</span>
		</div>
		<div style="padding-bottom:70px;"></div>
		<div class="head1">
			<p>

			<MARQUEE behavior="scroll" contenteditable="true" onstart="this.firstChild.innerHTML+=this.firstChild.innerHTML;" scrollamount="4" style="margin-top:-20px;">
				<img src="../images/laba.png" style="width:12PX;">&nbsp;只能预定当天内的座位，20分钟未到店，商家有权取消本次预定，请安排好您的时间
			</MARQUEE></p>
		</div>

		<form action="../deal/yuding_action.php" method="post">
	<div class="box1 border-bottom">
		门店 <span class="floatright color-a"><? echo $item->store_name;?></span>
	</div>

		<div class="box1 border-bottom">
		预定时间 <span class="floatright color-b"><input type="text" placeholder="点击选择预定时间" class="" style="border:0;outline:none;text-align:right;" id="picktime" name="yu_time" /></span>
	</div>
	<!-- 预定类型 -->
	<div class="type">
		预定类型
	</div>

	<div class="box1 border-bottom border-top">
		只订座<span class="floatright color-a">预付 ￥0.00</span>
	</div>
	<!-- 基本信息 -->
	<div class="box1 border-bottom xx">
		姓名 <input type="text" placeholder="输入您的姓名" class="" value="<? echo $user->nickname;?>" name="yu_name">
	</div>
	<div class="box1 border-bottom xx">
		电话 <input type="text" placeholder="输入您的联系电话" class="" value="<? echo $user->tel;?>" name="yu_tel" />
	</div>
	<div class="box1 border-bottom xx">
		人数 <input type="text" placeholder="输入就餐人数" class="" name="yu_num"/>
	</div>
	<div class="box1 border-bottom xx margintop10 border-top">
		备注 <input type="text" placeholder="整单备注：例如 饮料类加冰" class="" style="text-align:right;width:80%;" name="beizhu"/>
	</div>


	<!-- 确定提交 -->
	<div >
		<input type="submit" class="btn" value="确认提交">
	</div>
	</form>
	</body>
	<script>
function change(obj){
	var a = obj;
	if(a==1){
	var b = a+1;
	var c = a+2;
}if(a==2){
	var b = a+1;
	var c = a-1;
}if(a==3){
	var b = a-1;
	var c = a-2;
}
document.getElementById('type'+a).className = 'paytype-logo sign-red';
document.getElementById('type'+b).className = 'paytype-logo ';
document.getElementById('type'+c).className = 'paytype-logo ';
}
</script>
<script>
$("#pickdate").dateDropper({
    animate: false,
    format: 'Y-m-d',
    maxYear: '2020'
});
$("#picktime").timeDropper({
    meridians: false,
    format: 'HH:mm',
});
</script>
</html>
