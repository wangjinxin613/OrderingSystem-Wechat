<?
	require('../config/index_class.php');

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>待处理订单</title>
		 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

		<link href="../../styles/extend/member/qiandao.css" type="text/css" rel="stylesheet" />
		<link href="../../styles/extend/member/orderlist-list.css" type="text/css" rel="stylesheet" />
		<link href="../../styles/base.css" type="text/css" rel="stylesheet" />
    <script src="../js/jquery-1.9.1.min.js"></script>
				<script src="../../js/layer.js"></script>
    <script type="text/javascript">
            $(function () {
                (function longPolling() {
                    //alert(Date.parse(new Date())/1000);
                    $.ajax({
                        url: "comet/order_dai.php",
                        data: {"timed": Date.parse(new Date())/1000},
                        dataType: "text",
                        timeout: 5000,//5秒超时，可自定义设置
                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                            $("#state").append("[state: " + textStatus + ", error: " + errorThrown + " ]<br/>");
                            if (textStatus == "timeout") { // 请求超时
                                longPolling(); // 递归调用
                            } else { // 其他错误，如网络错误等
                                longPolling();
                            }
                        },
                        success: function (data, textStatus) {
                            $("#state").html(data);

                            if (textStatus == "success") { // 请求成功
                                longPolling();
                            }
                        }
                    });

                })();
            });
        </script>
	</head>
	<body>
		<div class="head">
			<a href="index.php"><img src="../../images/return.png" style="width:23px;float:left;margin-left:20px;" ></a><span style=";">待处理订单</span><span style="width:40px;float:right;">&nbsp;</span>
		</div>
		<div style="padding-bottom:50px;"></div>
		<div class="title">
			<ul>
				<a href="order_shishi.php"><li>实时订单</li></a>
				<a href="order_dai.php"><li>待处理订单</li></a>
				<a href="order_all.php"><li>全部订单</li></a>
				<a onclick="test()"><li>搜索查询</li></a>
			</ul>
		</div>
		<div style="padding-bottom:40px;"></div>
		<? order_mobile_all();?>




		<!--<div class="list">
			<p class="p1">下单时间：8小时前 <span class="color-b floatright">待评价</span></p>
			<p class="p2">共0分菜品 总计：￥0.01 <span><input type="submit" value="评价"></span></p>
		</div>-->
	</body>
	<script>
		function test(){

			layer.prompt({title: '请输入订单号查询', formType: 1}, function(pass, index){

			window.location.href="mobile_orderdetail.php?oid="+pass;


	});
		}
	</script>
</html>
