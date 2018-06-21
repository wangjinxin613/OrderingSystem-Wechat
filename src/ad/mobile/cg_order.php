<?php
	require ('../config/index_class.php');


?>
<!DOCTYPE html>
<html >
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>购物车</title>
		 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link href="../../css/amazeui.min.css" type="text/css" rel="stylesheet" />
		<link href="../../css/style.css" type="text/css" rel="stylesheet" />
			<link href="../../styles/base.css" type="text/css" rel="stylesheet" />

		<script src="../../js/jquery.min.js" type="text/javascript"></script>
		<script src="../../js/amazeui.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="../../js/date.js" ></script>
		<script type="text/javascript" src="../../js/iscroll.js" ></script>
		<script type="text/javascript">
		$(function(){
			$('#beginTime').date();
			$('#endTime').date({theme:"datetime"});
		});
		</script>
		<script src="../../js/mobile/layer.js"></script>
  		<script src="../../js/mobile/layer.js"></script>
			<script>

			</script>
	</head>
	<style>
	.tai_div{

		bottom:0px;
	}
	.tai{

		font-size: 12px;
		padding:8px 0;
		width:45%;
		background: #FF6666;
		border:0;
		color: #ffffff;
		float:left;
		margin-left:4%;
		margin-top:10px;
	}
	.bei{
		padding:0;
	}
  .bei_div textarea{
		width:100%;
		height:70px;
	}
	.bei_div select{
		width:34%;
		padding: 8px;
		text-align: center;
		margin-left:4%;
	}
	.bei_div .p1{
		margin-top:15px;
	}
	.bei_div .p2{
		margin-top:15px;
	}
	.bei_div button{
		padding:5px 0;
		width:11%;
		color:#ffffff;
		font-size: 12px;
		margin-left:4%;
		background: #FF6666;
		border:0;
		border-radius: 5px;
	}
	.bei_div{
		bottom: 0;
	}
	.p3{
		padding: 0;
	}
	.bei_div input{
		width:100px;
		background: #ff6666;
		padding:8px 0;
		color:#ffffff;
		border:0;
		margin-left:10px;
		border-radius: 5px;
	}
	</style>
	<body style="width:450px;margin:0 auto;">
		<div id="shade"></div>
		<form action="deal/order_action.php" method="POST" id="tijiao">
		<div class="head" style="width:450px;">
			<span style=";">购物车结算</span>
		</div>
	   <div style="height: 49px;"></div>

	    <ul class="eat-list">
	    	<? cart::card_list("ad$user->admin_id");?>
	    	<!--<li>
	    		<span class="name">绿茶</span>
	    		<em class="price">￥2.0</em>
	    		<div class="d-stock ">

	                <input id="num" readonly="" class="text_box" name="" type="text" value="1">

			    </div>
	    	</li>-->

	    </ul>

	    <div class="juli"></div>
	    <ul class="list-detail">
	    	<li class="time">
	    		<span>就餐人数：</span>
	    		<input type="text" name="order_people" placeholder="请输入就餐人人数" required>
	    		<i class="am-icon-angle-right"></i>
	    	</li>
	    	<li class="time">
	    		<span>我的台号：</span>
	    		<input id="tais" type="text" name="order_desk"  placeholder="请输入您的台号" onclick="tai()"/>
	    		<i class="am-icon-angle-right"></i>
	    	</li>
	    	<input type="text" name="all_price" value="<?echo cart::$all_price; ?>" style="display:none;"/>
	    </ul>
	    <div class="juli"></div>
	    <?

	if(cart::$all_price >= ($jmoney1 + $jmoney2)){
	$pay_money =  cart::$all_price - ($jmoney1 + $jmoney2);
}else{
	 echo "<script> layer.msg('优惠券或代金券金额大于订单金额<br>一经使用不可二次使用<br>请谨慎操作', {
    time: 1500, //1s后自动关闭

  });</script>";
	$pay_money = 0;
}
	    ?>
	    <!--就餐人数-->
	 <!--   <div class="am-modal am-modal-no-btn" tabindex="-1" id="doc-modal-1">
		  <div class="am-modal-dialog">
		  	<div class="am-modal-hd" style="height: 35px;">
		      <a href="javascript: void(0)" class="am-close am-close-spin" style="float: left;" data-am-modal-close>&times;</a>
		    </div>
		    <div class="am-modal-bd">
		       <ul class="numren">
		       	<li>1人</li>
		       	<li>2人</li>
		       	<li class="cur">3人</li>
		       	<li>4人</li>
		       	<li>5人</li>
		       	<li>6人</li>
		       	<li>7人</li>
		       	<li>8人</li>
		       	<li>9人</li>
		       	<li>10人</li>
		       </ul>
		    </div>
		  </div>
		</div>
		<!--
	    <div class="am-modal am-modal-no-btn" tabindex="-1" id="doc-modal-2">
		  <div class="am-modal-dialog">
		  	<div class="am-modal-hd" style="height: 35px;">
		      <a href="javascript: void(0)" class="am-close am-close-spin" style="float: left;" data-am-modal-close>&times;</a>
		    </div>
		    <div class="am-modal-bd">
		       <ul class="num-left">
		       	 <li>桌台</li>
		       </ul>
		       <ul class="num-right">
		       	 <li>A区2号台位</li>
		       	 <li>A区2号台位</li>
		       	 <li>A区2号台位</li>
		       	 <li>A区2号台位</li>
		       	 <li>A区2号台位</li>
		       	 <li>A区2号台位</li>
		       </ul>
		    </div>
		  </div>
		</div>
		-->
	
	    	<input type="text" name="all_price" value="<?echo $pay_money; ?>" style="display:none;"/>
				<input type="text" name="get_points" value="<?echo cart::$get_points; ?>" style="display:none;"/>
        <div class="juli"></div>
	    <textarea placeholder="备注说明" name="beizhu" id="bz-infor" class="bz-infor" onclick="bei()"></textarea>
<div class="juli"></div><div class="juli"></div>

	    <div class="pricebox">
	    	<p >总价：<i><? echo  $pay_money ?></i>元（<em><?echo cart::$all_num;?></em>份）</p>
				<!--<p>该订单可获得积分：<i><? echo cart::$get_points;?></i></p>-->

	    </DIV>
	    	<div class="paytype" >



	    	<div >
		<input type="submit" class="btn" onclick="MyAutoRun()" value="提交订单" name="paytype"/>
	</div>
	</form>

	<!-- 支付密码输入弹出-->

		<script>
		function bei_add(te){
	 		var bei_name = $('#bei_name').val();
	 		var bei_num = $('#bei_num').val();
	 		$('#bei_value').append("["+bei_name+bei_num+te+"]");
	  }
			function tai(){
				layer.open({
  			type: 0,
  			area: ['90%', 'auto'], //宽高
	    time: 200,
  content: '<div class="tai_div"><?order_tai();?><div style="clear:both;"></div></div>'
});
			}
			function tai_add(text){
				$("#tais").val(text);
				$(".layui-m-layer").remove();

			}
			function bei(){
				layer.open({
  type: 0,
  area: ['90%', '200px'], //宽高
	    time: 200,
  content: '<div class="bei_div"><textarea id="bei_value"></textarea><p class="p1"><select id="bei_name"> <? cart::card_list("ad$user->admin_id","1");?></select><select id="bei_num"><option value="全部">全部</option><option value="1个">1个</option><option value="2个">2个</option><option value="3个">3个</option><option value="4个">4个</option><option value="5个">5个</option></select></p><p class="p2" id="bei_cao"><button class="ps" onclick="bei_add(\'少油\');">少油</button><button onclick="bei_add(\'少葱\');">少葱</button><button onclick="bei_add(\'少冰\');">少冰</button><button onclick="bei_add(\'走冰\');">走冰</button><button onclick="bei_add(\'加辣\');">加辣</button><button onclick="bei_add(\'加葱\');">加葱</button></p><hr><p class="p3" ><input type="button" value="关闭" style="background:#cccccc;color:#333333;" onclick="close_layer()"><input type="button" value="添加" onclick="add()"></p></div>'
});

			}
			function a(){
				var t = $(".bz-infor").val();
					$('#bei_value').val(t);
			}
			function close_layer(){
						$(".layui-m-layer").remove();
			}
			function add(){
				var bei_value = $('#bei_value').val();
				$('.bz-infor').val(bei_value);
				close_layer();
			}
		</script>
		<script>

		</script>
		<script>
		//购物数量加减

		</script>

	</body>
</html>
