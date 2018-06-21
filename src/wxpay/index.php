<?php
	require ('../config/index_config.php');
?>
<!DOCTYPE html>
<html >
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>快速买单 </title>
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
		<form action="../deal/pay_action.php" method="POST" id="tijiao">
		<div class="head">
			<img src="../images/return.png" style="width:23px;float:left;margin-left:20px;" onClick="javascript:history.back(-1)"><span style=";">快速买单</span><span style="width:40px;float:right;">&nbsp;</span>
		</div>
	   <div style="height: 49px;"></div>
	   <div style="padding:10px 10px;background:#FF9900;color:#ffffff;">
			 	折扣价：<span id="s_all"></span>元&nbsp; <del><span id="s_zhe"></span>元</del><span style="float:right"><? if($card_zhe > $quan_zhe){ echo "全场折扣";}else{ echo cardzhe('2'); echo "专享折扣";}?>：<?echo  $zhe*10;?>折</span>
		 </div>
     <div class="money" ng-app="">
     <p style="padding:5px 10px;">本次消费金额</p>
     <div class="box">
	       <input type="text" name="money"  style="width:100%;border:0;outline:none;" id="money" placeholder="请输入服务员确认的金额" >
      </div>
      <div class="juli"></div>
	    <div class="pricebox">
	    	<p >总价：<i id="xian"></i>元</p>
	    	<p >请选择支付方式并确认下单：</p>
	    </div>
    </div>
	    	<div class="paytype" >
		<div class="paytype-logo" id="type1" onclick="change(1);">
			<p><img src="../images/weixin.png" style="width:36px;height:35px;" ></p>
			<p>微信支付</p>
		</div>
		<div class="paytype-logo" id="type2" onclick="change(2);" style="display:none;">
			<p><img src="../images/money.png" style="width:40px;height:35PX;"  ></p>
			<p>现金支付</p>
		</div>

		<div class="paytype-logo" id="type3" <?php if(cart::$all_price>$user->money_still){ echo 'onClick="'; echo "alert('您的余额不足，不能使用会员卡进行付款')"; echo '"';} else{ echo ' onclick="ch()"';}?>">
			<p><img src="../images/huiyuanka.png" style="width:40px;height:35PX;" ></p>
			<p>会员卡付款</p>
		</div>
		<div class="paytype-logo" id="type4" onclick="change(4);">
			<p><img src="../images/zhifubao.png" style="width:35px;height:35PX;"  ></p>
			<p>支付宝</p>
		</div>
		<input type="text" value="" name="pay" id="pay" style="display:none;"/>
		<div style="clear:both;"></div>
	</div>

	    	<div >
		<input type="button" class="btn" onclick="MyAutoRun()" value="提交订单" name="paytype"/>
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

		//购物数量加减
		$(function(){

				$('.increase').click(function(){
					var self = $(this);
					var current_num = parseInt(self.siblings('input').val());
					current_num += 1;
					if(current_num > 0){
						self.siblings(".decrease").fadeIn();
						self.siblings(".text_box").fadeIn();
					}
					self.siblings('input').val(current_num);
					update_item(self.siblings('input').data('item-id'));
				})
				$('.decrease').click(function(){
					var self = $(this);
					var current_num = parseInt(self.siblings('input').val());
					if(current_num > 0){
						current_num -= 1;
		                if(current_num < 1){
			                self.fadeOut();
							self.siblings(".text_box").fadeOut();
		                }
						self.siblings('input').val(current_num);
						update_item(self.siblings('input').data('item-id'));
					}


			})
		//删除提示信息
		    $(function() {
		  $('#doc-modal-list').find('.am-icon-close').add('#doc-confirm-toggle').
		    on('click', function() {
		      $('#my-confirm').modal({
		        relatedTarget: this,
		        onConfirm: function(options) {
		          var $link = $(this.relatedTarget).prev('a');
		          var msg = $link.length ? '你要删除的饮品 为 ' + $link.data('id') :
		            '确定了';
		//        alert(msg);
		        },
		        onCancel: function() {
		          alert('不删除');
		        }
		      });
		    });
		});
		 function setTotal(){
		$(".paytype-logo").each(function(){
			alert('s');
		}
	}
	setTotal();
		</script>
			<script>
			function MyAutoRun(){
　　　var c = document.getElementById('pay').value;
　　　if(c==""){
	alert('请选择支付方式');
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
					alert("密码错误，请重试！！！");
				}

		}
			function quxiao(){
				document.getElementById('pay_box').style.display="none";
				document.getElementById('shade').style.display="none";
			}
			function ch(){
        	var c="<?php echo $user->money_still;?>";
          	var d = document.getElementById('money').value;
            if(parseInt(c)<parseInt(d)){
              alert('您的余额还剩'+c+'元，余额不足，不能使用会员卡进行支付');
            }else if(d==0){
              alert('请先输入要支付的金额');
            }
            else{
					document.getElementById('shade').style.display="block";
	document.getElementById('pay_box').style.display="block";
}
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
</script>
<script>
$(function(){
	
	var zhe = 100;

	$("#money").bind('input propertychange',function(){
	var all = $("#money").val();
	var zhes = all*<? echo $zhe;?>;
	var zhe = zhes.toFixed(2);
	$("#s_all").text(zhe);
	$('#s_zhe').text(all);
	$("#xian").text(all);
})
});

</script>
	</body>
</html>
