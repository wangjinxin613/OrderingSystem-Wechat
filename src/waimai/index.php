<?php
	require ('../config/index_config.php');
	clear($user->user_id);//每次刷新页面清空购物车
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>外卖点餐</title>
		 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<script src="../js/jquery.min.js" type="text/javascript"></script>
		<script src="../js/amazeui.min.js" type="text/javascript"></script>
		<script src="../js/date.js" type="text/javascript"></script>
		<script src="../js/iscroll.js" type="text/javascript"></script>
		<link href="../css/amazeui.min.css" type="text/css" rel="stylesheet" />
		<link href="../css/style.css" type="text/css" rel="stylesheet" />
		<link href="../css/base.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<header data-am-widget="header" class="am-header am-header-default sq-head ">

			<p ><img src="../images/return.png" style="width:23px;float:left;margin-left:4%;margin-top:15PX;" onClick="javascript:history.back(-1)"><em style="position:absolute;left:42%;">外卖点餐</em></p>
		   <div class="am-header-right am-header-nav">
		   		
	          <button type="button"  class="am-btn am-btn-warning" id="doc-confirm-toggle" style="background: none; border: 0; font-size: 24px;">
                 <i class="am-header-icon am-icon-trash"></i>
	          </button>
            </div>
	   </header>
	    <div class="content-list" id="outer">
	    	<div class="list-left" id="tab">
	    		<!-- 左侧分类信息  -->
	    		<? order_left_sort();?>
	    		<br><br>
	    	</div>
	    	<div class="list-right" id="content">
	    		<ul class="list-pro" >
	    			<!-- 右侧商品信息  -->
	    		
			    	<? order_right_body();?>
	    	</div>
	    </div>
	    <!--底部-->
 <div style="height: 100px;"></div>
 <div class="fix-bot">
	   	  <a href="" class="list-js">合计：<i class="total" id="total">0</i>元<em>(<span class="code">0</span>份)</em></a>
	   	  <a id="but" href="order.php" class="list-jsk">加入购物车</a>
 </div>
 <div class="am-modal am-modal-confirm" tabindex="-1" id="my-confirm">
  <div class="am-modal-dialog">
    <div class="am-modal-bd" style="height: 80px; line-height: 80px;">  您确定要清空饮品吗？</div>
    <div class="am-modal-footer">
      <span class="am-modal-btn" data-am-modal-cancel>取消</span>
      <span class="am-modal-btn" data-am-modal-confirm>确定</span>
    </div>
  </div>
</div>

<script>
//购物数量加减
$(function(){
		$('.increase').click(function(){
			var self = $(this);
			var current_num = parseInt(self.siblings('.text_box').val());
			var pid = parseInt(self.siblings('.txx').val());
			current_num += 1;

			<!--计算总份数-->

			if(current_num > 0){
				self.siblings(".decrease").fadeIn();
				self.siblings(".text_box").fadeIn();
				
			}
			self.siblings('.text_box').val(current_num);
		setTotal();
			$.ajax({
                type: 'POST',
                url: '../deal/test.php',
                data: {id:current_num,pid:pid },
                dataType: 'json',
                success: function (res) {
                    if (res.status == 1) {
                        alert(res.info);
                    }else{
                        alert(res.info);
                    }
                }
            });	
		})	
		
		$('.decrease').click(function(){
			var self = $(this);
			var current_num = parseInt(self.siblings('.text_box').val());
			var pid = parseInt(self.siblings('.txx').val());
			if(current_num > 0){
				current_num -= 1;
                if(current_num < 1){
	                self.fadeOut();
					self.siblings(".text_box").fadeOut();
                }
				self.siblings('.text_box').val(current_num);
				setTotal();
				$.ajax({
                type: 'POST',
                url: '../deal/test.php',
                data: {id:current_num,pid:pid },
                dataType: 'json',
                success: function (res) {
                    if (res.status == 1) {
                        alert(res.info);
                    }else{
                        alert(res.info);
                    }
                }
            });
			}
		})


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
//tab切换
        $(function(){
                window.onload = function()
                {
                        var $li = $('#tab li');
                        var $ul = $('#content ul');
                        $li.click(function(){
                                var $this = $(this);
                                var $t = $this.index();
                                $li.removeClass();
                                $this.addClass('current');
                                $ul.css('display','none');
                                $ul.eq($t).css('display','block');
                        })
                }
        });
function setTotal(){ 
		var s=0;
		var v=0;
		var n=0;
<!--计算总额--> 
$(".lt-rt").each(function(){ 
	
	 h=parseInt($(this).find('input[type="text"]').val());
s+=parseInt($(this).find('input[type="text"]').val())*parseFloat($(this).find('span[class*=price]').text()); 
 
});
<!--计算菜种-->
var nIn = $("li.current a").attr("href");
$(nIn+" input[type='text']").each(function() {
	if($(this).val()!=0){
		n++;
	}
});

<!--计算总份数-->
$(".text_box").each(function(){
	v += parseInt($(this).val());
	var postArray= new Array();
var temp = new Object();


postArray.push(parseInt($(this).val()));

});
	
$(".code").html(v);
$("#total").html(s.toFixed(2)); 
} 
setTotal(); 
$('.list-jsk').click(function(){
	
		})		

 
</script>
	</body>
</html>
