<?php
	require ('../config/index_class.php');
	clear("ad$user->admin_id");//每次刷新页面清空购物车
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>店内点餐</title>
		 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<script src="../../js/jquery.min.js" type="text/javascript"></script>
		<script src="../../js/amazeui.min.js" type="text/javascript"></script>
		<script src="../../js/date.js" type="text/javascript"></script>
		<script src="../../js/iscroll.js" type="text/javascript"></script>

  		<script src="../../../js/layer.js"></script>
		<link href="../../css/amazeui.min.css" type="text/css" rel="stylesheet" />
		<link href="../../css/style.css" type="text/css" rel="stylesheet" />
		<link href="../../css/base.css" type="text/css" rel="stylesheet" />
<script type="text/javascript">
function tan(id,txt,money){
layer.open({
  type: 1,
    title: '商品详情',
  skin: 'layui-layer-rim', //加上边框
  area: ['50%', '90%'], //宽高
  content: "<div><img src='../../"+id+"' width='100%' style='height:350px'><p style='color:#FF0033;padding:15px 25px;'>"+txt+"<a style='float:right;padding:5px 20p;background:#FF6600;color:#ffffff;'>&nbsp;&nbsp;&nbsp;"+money+"/份&nbsp;&nbsp;&nbsp;</a></p></div>"
});
var index = parent.layer.getFrameIndex(window.name); //获取窗口索引

//让层自适应iframe
$('#add').on('click', function(){
    $('body').append('插入很多酱油。插入很多酱油。插入很多酱油。插入很多酱油。插入很多酱油。插入很多酱油。插入很多酱油。');
    parent.layer.iframeAuto(index);
});
//在父层弹出一个层
$('#new').on('click', function(){
    parent.layer.msg('Hi, man', {shade: 0.3})
});
//给父页面传值
$('#transmit').on('click', function(){
    parent.$('#parentIframe').text('我被改变了');
    parent.layer.tips('Look here', '#parentIframe', {time: 5000});
    parent.layer.close(index);
});
//关闭iframe
$('#closeIframe').click(function(){
    var val = $('#name').val();
    if(val === ''){
        parent.layer.msg('请填写标记');
        return;
    }
    parent.layer.msg('您将标记 [ ' +val + ' ] 成功传送给了父窗口');
    parent.layer.close(index);
});

}
</script>
	</head>
	<body>
		<header data-am-widget="header" class="am-header am-header-default sq-head ">

			<p><em style="position:absolute;left:45%;">店内点餐</em></p>
		  
	   </header>
	    <div class="content-list" id="outer">
	    	<div class="list-left" id="tab" style="height:100%;width: 150px;">
	    		<!-- 左侧分类信息  -->
	    		<? pc_order_left_sort();?>
	    		<br><br>
	    	</div>
	    	<div class="list-right" id="content" style="width:85%">
	    		<ul class="list-pro" >
	    			<!-- 右侧商品信息  -->

			    	<? order_right_body1();?>
	    	</div>
	    </div>
	    <!--底部-->
 <div style="height: 100px;"></div>
 <div class="fix-bot">
	   	  <a href="" class="list-js">合计：<i class="total" id="total">0</i>元<em>(<span class="code">0</span>份)</em></a>
	   	  <a id="but" href="cg_order.php" class="list-jsk">加入购物车</a>
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
<script src="../../js/loading.js"></script>
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
                url: 'action/test.php',
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
                url: 'action/test.php',
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
