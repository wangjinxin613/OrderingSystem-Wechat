<?
	require('../config/index_config.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>代金券兑换</title>
		 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		
		<link href="../styles/extend/member/qiandao.css" type="text/css" rel="stylesheet" />
		<link href="../styles/extend/member/orderlist-list.css" type="text/css" rel="stylesheet" />
		<link href="../styles/base.css" type="text/css" rel="stylesheet" />
	</head>
	<style>
		.title li{
			width:33.3%;
		}
	</style>
	<script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
  		<script src="../js/layer.js"></script>
	<body>
		<div class="head">
			<img src="../images/return.png" style="width:23px;float:left;margin-left:20px;" onClick="javascript:history.back(-1)"><span style=";">代金券兑换</span><span style="width:40px;float:right;">&nbsp;</span>
		</div>
		<div style="padding-bottom:48px;"></div>
		<div class="title">
			<ul>
				<li class="active">积分兑换</li>
				<li>积分明细</li>
				<li>兑换记录</li>
			</ul>
		</div>
		<div style="padding-bottom:40px;"></div>
		
		<? daijin_duihuan_list(); ?>
		
	</body>
		<script>
function duihuan(obj,id,v){
	if(v><? echo $user->points;?>){
		layer.msg('积分余额不足');
	}else{
  layer.confirm('您还剩<? echo $user->points; ?>积分，确定要兑换吗？', {
  btn: ['确定','取消'] //按钮
}, function(){
	$.ajax({
            url: '../deal/daijin_action.php',
            type: 'post',//提交的方式
            dataType:'json',
            data: "id="+id,
            success: function(msg) {
                //这是成功返回的数据，写自己的逻辑
            }
        });
  layer.msg('兑换成功', {icon: 1});      
});


}}
</script>
</html>