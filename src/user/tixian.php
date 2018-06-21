<?php
	require ('../config/index_config.php');
?>
<!DOCTYPE html>
<html >
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>提现</title>
		 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link href="../css/amazeui.min.css" type="text/css" rel="stylesheet" />
		<link href="../css/style.css" type="text/css" rel="stylesheet" />
			<link href="../styles/base.css" type="text/css" rel="stylesheet" />
		<script src="../js/jquery.min.js" type="text/javascript"></script>
		<script src="../js/amazeui.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="../js/date.js" ></script>
		<script type="text/javascript" src="../js/iscroll.js" ></script>
		<script type="text/javascript">
		$(function(){
			$('#beginTime').date();
			$('#endTime').date({theme:"datetime"});
		});
		</script>
    <script src="http://cdn.static.runoob.com/libs/angular.js/1.4.6/angular.min.js"></script>
	</head>
	<body >
		<div id="shade"></div>
		<form action="../deal/tixian_action.php" method="POST" id="tijiao">
		<div class="head">
			<img src="../images/return.png" style="width:23px;float:left;margin-left:20px;" onClick="javascript:history.back(-1)"><span style=";">提现</span><span style="width:40px;float:right;">&nbsp;</span>
		</div>
	   <div style="height: 49px;"></div>
     <div class="money" ng-app="">
     <p style="padding:5px 10px;">提现金额</p>
     <div class="box">
	       <input type="text" name="ti_money" value="" style="width:100%;border:0;outline:none;" id="money" placeholder="请输入您要提现的金额" step="0.01" required/>

      </div>
      <p style="padding:5px 10px;">提现方式</p>
     <div class="box">
         <select style="width:100%;border:0;outline:none;" name="ti_type">

           <option value="微信">微信</option>
           <option value="支付宝">支付宝</option>
         </select>

      </div>
       <p style="padding:5px 10px;">提现账户</p>
      <div class="box">
          <input type="text" name="ti_user" value="" style="width:100%;border:0;outline:none;" placeholder="请输入您要提现的账户" required>

       </div>
       <p style="padding:5px 10px;">备注</p>
      <div class="box">
        <textarea style="width:100%;border:0;outline:none" placeholder="请输入备注信息" name="beizhu" required></textarea>

       </div>
      <div class="juli"></div>
	    <div class="pricebox">
	    	<p >您的余额：<i id="xian"></i><? echo $user->money_still;?>元</p>

	    </div>
    </div>
<input type="submit" class="btn" onclick="MyAutoRun()" value="确定提现" name="paytype"/>
<p style="float:right;padding:0 30px;margin-top:-10PX;"><a href="tixian_log.php">查看提现记录</a></p>


	</div>
	</form>


			<script>
			function MyAutoRun(){
　　　var c = document.getElementById('money').value;
　　
　　}
　　

</script>
	</body>
</html>
