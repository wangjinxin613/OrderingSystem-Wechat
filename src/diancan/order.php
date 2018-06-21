
<!DOCTYPE html>
<html >
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>购物车</title>
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

	<script src="../js/mobile/layer0.js"></script>
  		<script src="../js/layer.js"></script>
			<?php
				require ('../config/index_config.php');
				$tai = $_SESSION['tai'];

				$yid = $_GET['yid'];
				$sql="select * from my_youhui where id = '$yid'";//查询语句
						$res=mysql_query($sql);//执行查询
						while($r=mysql_fetch_assoc($res)){
								$ro[]=$r;//接受结果集
						}

						foreach($ro as $key=>$v){
							if($v['type']==1){
								$jmoney1 = $v['wu_money'];
								$youhui_val = "无门槛减{$jmoney1}";
							}else if($v['type']==2){
								$jmoney1 = $v['man_min'];
								$youhui_val = "满{$v['man_max']}减{$jmoney1}";
							}

						}
				$did = $_GET['did'];
				$sql="select * from my_daijin where id = '$did'";//查询语句
						$res=mysql_query($sql);//执行查询
						while($r=mysql_fetch_assoc($res)){
								$ro[]=$r;//接受结果集
						}

						foreach($ro as $key=>$v){

								$jmoney2 = $v['money'];
								$daijin_val = "代金券{$jmoney2}";


						}
					check($yid);
					check($did);
			?>
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
				width:12%;
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
				width:40%;
				background: #ff6666;
				padding:8px 0;
				color:#ffffff;
				border:0;
				margin-left:5%;
				border-radius: 5px;
			}
			</style>
	</head>
	<body >
		<? 
			$card_zhe = cardzhe('1'); 
			$quan_zhe = $item->store_zhe;
			if($card_zhe > $quan_zhe){
				$zhe = $quan_zhe;

			}else{
				$zhe = $card_zhe;
			}

		?>
		<div id="shade"></div>
		<form action="../deal/order_action.php" method="POST" id="tijiao">
		<!--<div class="head">
			<a href="index.php"><img src="../images/return.png" style="width:23px;float:left;margin-left:20px;" ></a><span style=";">购物车结算</span><span style="width:40px;float:right;">&nbsp;</span>
		</div>
	   <div style="height: 49px;"></div>-->
		 <div style="padding:10px 10px;background:#FF9900;color:#ffffff;">
			 	折扣价：<span id="s_all"></span>元&nbsp; <del><span id="s_zhe"></span>元</del><span style="float:right"><? if($card_zhe > $quan_zhe){ echo "全场折扣";}else{ echo cardzhe('2'); echo "专享折扣";}?>：<?echo  $zhe*10;?>折</span>
		 </div>
	    <ul class="eat-list">
	    	<? cart::card_list($user->user_id);?>
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
	    		<span>优惠券：</span>
	    		<input type="text" onclick="window.location.href='youhui.php?money=<? echo cart::$all_price;if($did != null){ echo "&did={$did}";}?>'" name="order_people" <? if($yid == null){ echo 'placeholder="点击选择优惠券"';}else{ echo 'placeholder ="'; echo $youhui_val; echo '"'; } ?> required>
	    		<i class="am-icon-angle-right"></i>
	    	</li>
	    	<li class="time">
	    		<span>代金券：</span>
	    		<input type="text" onclick="window.location.href='daijin.php?money=<? echo cart::$all_price; if($yid != null){ echo "&yid={$yid}";}?>'"  <? if($did == null){ echo 'placeholder="点击选择代金券"';}else{ echo 'placeholder ="'; echo $daijin_val; echo '"'; } ?> required>
	    		<i class="am-icon-angle-right"></i>
	    	</li>

	    </ul>
	    <div class="juli"></div>
	    <ul class="list-detail">
	    	<!--
	    	<li class="time">
	    		<span>就餐人数：</span>
	    		<input type="text" name="order_people" placeholder="请输入就餐人人数" required>
	    		<i class="am-icon-angle-right"></i>
	    	</li>-->
	    	<li class="time">
	    		<span>我的台号：</span>
	    		<input type="text" name="order_desk" id="tais" onclick="tai()" placeholder="请输入您的台号" <? if($tai!=null){ echo "value='$tai'";}?> required>
	    		<i class="am-icon-angle-right"></i>
	    	</li>
	    	
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
		<input type="text" value="<? echo $yid; ?>" name="yid" style="display:none;"/>
	    	<input type="text" value="<? echo $did; ?>" name="did" style="display:none;"/>
	    	<input type="text" name="all_price" value="<?echo round($pay_money*$zhe,2) ?>" style="display:none;"/>
				<input type="text" name="get_points" value="<?echo cart::$get_points; ?>" style="display:none;"/>
        <div class="juli"></div>
	    <textarea placeholder="备注说明" name="beizhu"  id="bz-infor" class="bz-infor" onclick="bei()"></textarea>
<div class="juli"></div><div class="juli"></div>

	    <div class="pricebox">
	    	<p >总价：<i id="zhe"><? echo  round($pay_money*$zhe,2); ?></i>元（<em><?echo cart::$all_num;?></em>份）</p>
				<p>该订单可获得积分：<i><? echo cart::$get_points;?></i></p>
	    	<p>请选择支付方式并确认下单：</p>
	    </DIV>
	    	<div class="paytype" >
		<div class="paytype-logo" id="type1" onclick="change(1);">
			<p><img src="../images/weixin.png" style="width:36px;height:35px;" ></p>
			<p>微信支付</p>
		</div>

		<div class="paytype-logo" id="type2" onclick="change(2);" style="display:none">
			<p><img src="../images/money.png" style="width:40px;height:35PX;"  ></p>
			<p>现金支付</p>
		</div>

		<div class="paytype-logo" id="type3" <?php if(cart::$all_price>$user->money_still){ echo 'onClick="'; echo "alert('您的余额不足，不能使用会员卡进行付款')"; echo '"';} else{ echo ' onclick="ch()"';}?>>
			<p><img src="../images/huiyuanka.png" style="width:40px;height:35PX;" ></p>
			<p>会员卡付款</p>
		</div>
		<div class="paytype-logo" id="type4" onclick="change(4);">
			<p><img src="../images/zhifubao.png" style="width:35px;height:35PX;"  ></p>
			<p>支付宝</p>
		</div>
		<input type="text" value="" name="pay" id="pay" style="display:none"/>
		<div style="clear:both;"></div>
	</div>

	    	<div >
		<input type="button" class="btn" onclick="MyAutoRun()" value="提交订单" name="paytype"/>
		<a href="index.php">
		<input type="button" class="btn" onclick="" value="重新选择" style="background:#999999;margin-top:-5px;"/></a>
	</div>
	</form>
	<!-- 支付密码输入弹出-->
		<div class="pay_box" id="pay_box">
			<p class="p1">请输入支付密码</p>
			<p class="p2">余额 <span><? echo $user->money_still;?></span></p>
			<p class="p2 p3">密码<input type="password" id="pwd" value="" placeholder="请输入支付密码"/></p>
			<button type="button" onclick="quxiao()" class="a1" style="border-right:1px solid #eeeeee;">取消</button><button class="a1 a2" onclick="que()">确认</button>

		</div>


			<script>
			function MyAutoRun(){
　　　var c = document.getElementById('pay').value;
　　　if(c==""){
	layer.msg('请选择支付方式');
}else{
	document.getElementById('tijiao').submit();
}
　　}
　　
			function que(){
				var a="<?php echo $user->pwd;?>";
				var b = document.getElementById('pwd').value;
				if(a==b){
	         quxiao();
					change("3");

				}if(a!=b){
					layer.msg('密码错误');
				}

		}
			function quxiao(){
				document.getElementById('pay_box').style.display="none";
				document.getElementById('shade').style.display="none";
			}
			function ch(){
					document.getElementById('shade').style.display="block";
	document.getElementById('pay_box').style.display="block";
	//change(3);
			}
function change(obj){
	var a = obj;
	if(a==1){
	var b = a+1;
	var c = a+2;
  var d = a+3;
	document.getElementById('pay').value="1";
}if(a==2){
	var b = a+1;
	var c = a-1;
  var d = a+2;
	document.getElementById('pay').value="2";
}if(a==3){
	var b = 1;
	var c = 2;
  var d = 4;
	document.getElementById('pay').value="3";
}
if(a==4){
	var b = 3;
	var c = 2;
  var d = 1;
	document.getElementById('pay').value="4";
}
document.getElementById('type'+a).className = 'paytype-logo sign-red';
document.getElementById('type'+b).className = 'paytype-logo ';
document.getElementById('type'+c).className = 'paytype-logo ';
document.getElementById('type'+d).className = 'paytype-logo ';
}
function tai(){
	layer.open({
	type: 1,
	area: ['90%', ''], //宽高
time: 200000,
content: '<div class="tai_div"><?order_tai();?><div style="clear:both;padding-bottom:10px"></div></div>'
});
}
function tai_add(text){
	$("#tais").val(text);
	$(".layui-layer").remove();
	$(".layui-layer-shade").remove();

}
function bei(){
	layer.open({
type: 3,
 area: ['90%', '50%'],
time: 20000,
content: '<div style="width:100%;position:fixed;background:#ffffff;padding:20px 30px;"><div class="bei_div"><textarea id="bei_value"></textarea><p class="p1"><select id="bei_name" style="margin-left:7%;"> <? cart::card_list("$user->user_id","1");?></select><select id="bei_num" style="margin-left:18%;"><option value="全部">全部</option><option value="1个">1个</option><option value="2个">2个</option><option value="3个">3个</option><option value="4个">4个</option><option value="5个">5个</option></select></p><p class="p2" id="bei_cao"><button class="ps" onclick="bei_add(\'少油\');">少油</button><button onclick="bei_add(\'少葱\');">少葱</button><button onclick="bei_add(\'少冰\');">少冰</button><button onclick="bei_add(\'走冰\');">走冰</button><button onclick="bei_add(\'加辣\');">加辣</button><button onclick="bei_add(\'加葱\');">加葱</button></p><hr><p class="p3" ><input type="button" value="关闭" style="background:#cccccc;color:#333333;" onclick="close_layer()"><input type="button" value="添加" onclick="add()"></p></div></div>'
});

}
</script>
<script>
function bei_add(te){
	var bei_name = $('#bei_name').val();
	var bei_num = $('#bei_num').val();
	$('#bei_value').append("["+bei_name+bei_num+te+"]");
}



	function a(){
		var t = $(".bz-infor").val();
			$('#bei_value').val(t);
	}
	function close_layer(){
		$(".layui-layer").remove();
		$(".layui-layer-shade").remove();
	}
	function add(){
		var bei_value = $('#bei_value').val();
		$('.bz-infor').val(bei_value);
		close_layer();
	}
</script>
<script>
$(function(){
	var all = <?echo  round($pay_money*$zhe,2);?>;
	$("#s_all").text(all);
	var zhe = <?echo $pay_money;?>;
	$('#s_zhe').text(zhe);
});
</script>
	</body>
</html>
