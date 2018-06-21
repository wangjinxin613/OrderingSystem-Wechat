<?
	require('config/index_class.php');
	if(check_dept('20') == false){
			exit('<script>alert(\'您没有权限访问本页面\');history.back();</script>');
	}
	 $mo = date("m月"); //当前月份
	 $mo1 = date("m月",strtotime("-1 months")); //一个月前月份
	 $mo2 = date("m月",strtotime("-2 months"));
	 $mo3 = date("m月",strtotime("-3 months"));
	 $mo4 = date("m月",strtotime("-4 months"));
	 $mo5 = date("m月",strtotime("-5 months"));
	 $mo6 = date("m月",strtotime("-6 months"));
	 $mo7 = date("m月",strtotime("-7 months"));
	 $mo8 = date("m月",strtotime("-8 months"));
	 $mo9 = date("m月",strtotime("-9 months"));
	 $mo10 = date("m月",strtotime("-10 months"));
	 $mo11 = date("m月",strtotime("-11 months"));

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/style.css"/>
        <link rel="stylesheet" href="assets/css/font-awesome.min.css" />
        <link href="assets/css/codemirror.css" rel="stylesheet">
        <link rel="stylesheet" href="font/css/font-awesome.min.css" />
        <!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->
		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->
        <!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->
		<script src="assets/js/ace-extra.min.js"></script>
		<!--[if lt IE 9]>
		<script src="assets/js/html5shiv.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
        		<!--[if !IE]> -->
		<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
		<!-- <![endif]-->
        <script src="assets/dist/echarts.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
<title>交易</title>
</head>

<body>
<div class=" page-content clearfix">
 <div class="transaction_style">
   <ul class="state-overview clearfix">
    <li class="Info">
     <span class="symbol red"><i class="fa fa-jpy"></i></span>
     <span class="value"><h4>交易总额</h4><p class="Quantity color_red">￥ <? zongjine();?></p></span>
    </li>
     <li class="Info">
     <span class="symbol blue"><i class="fa fa-jpy"></i></span>
     <span class="value"><h4>微信支付</h4><p class="Quantity color_red">￥ <? zongjine('1');?></p></span>
    </li>
    <li class="Info">
     <span class="symbol blue"><i class="fa fa-jpy"></i></span>
     <span class="value"><h4>支付宝支付</h4><p class="Quantity color_red">￥ <? zongjine('2');?></p></span>
    </li>
     <li class="Info">
     <span class="symbol blue"><i class="fa fa-jpy"></i></span>
     <span class="value"><h4>会员卡支付</h4><p class="Quantity color_red">￥ <? zongjine('3');?></p></span>
    </li>
     <li class="Info">
     <span class="symbol blue"><i class="fa fa-jpy"></i></span>
     <span class="value"><h4>现金支付</h4><p class="Quantity color_red">￥ <? zongjine('4');?></p></span>
    </li>
     <li class="Info">
     <span class="symbol  blue"><i class="fa fa-shopping-cart"></i></span>
     <span class="value"><h4>订单数量</h4><p class="Quantity color_red"><? tj("orderlist where store_id = {$user->store_id}");?></p></span>
    </li>
     <li class="Info">
     <span class="symbol terques"><i class="fa fa-shopping-cart"></i></span>
     <span class="value"><h4>交易成功</h4><p class="Quantity color_red"><? tj("orderlist where store_id = {$user->store_id} and status_ss = '1'");?></p></span>
    </li>
     <li class="Info">
     <span class="symbol yellow"><i class="fa fa-shopping-cart"></i></span>
     <span class="value"><h4>交易失败</h4><p class="Quantity color_red"><?tj("orderlist where store_id = {$user->store_id} and status_ss = '2'");?></p></span>
    </li>
      <li class="Info">
     <span class="symbol darkblue"><i class="fa fa-shopping-cart"></i></span>
     <span class="value"><h4>退款订单</h4><p class="Quantity color_red"><?tj("orderlist where store_id = {$user->store_id} and status_ss = '3'");?></p></span>
    </li>
     <li class="Info">
     <span class="symbol darkblue"><i class="fa fa-jpy"></i></span>
     <span class="value"><h4>退款金额</h4><p class="Quantity color_red"> ￥ <? zongjine('5');?></p></span>
    </li>
   </ul>

 </div>
 <div class="t_Record">
               <div id="main" style="height:400px; overflow:hidden; width:100%; overflow:auto" ></div>
              </div>
</div>
</body>
</html>
<script type="text/javascript">
     $(document).ready(function(){

		  $(".t_Record").width($(window).width()-60);
		  //当文档窗口发生改变时 触发
    $(window).resize(function(){
		 $(".t_Record").width($(window).width()-60);
		});
 });


        require.config({
            paths: {
                echarts: './assets/dist'
            }
        });
        require(
            [
                'echarts',
				'echarts/theme/macarons',
                'echarts/chart/line',   // 按需加载所需图表，如需动态类型切换功能，别忘了同时加载相应图表
                'echarts/chart/bar'
            ],
            function (ec,theme) {
                var myChart = ec.init(document.getElementById('main'),theme);
               option = {
    title : {
        text: '月购买订单交易记录',
        subtext: '实时获取用户订单购买记录'
    },
    tooltip : {
        trigger: 'axis'
    },
    legend: {
        data:['所有订单','微信订单','支付宝订单','会员卡订单','现金支付订单']
    },
    toolbox: {
        show : true,
        feature : {
            mark : {show: true},
            dataView : {show: true, readOnly: false},
            magicType : {show: true, type: ['line', 'bar']},
            restore : {show: true},
            saveAsImage : {show: true}
        }
    },
    calculable : true,
    xAxis : [
        {
            type : 'category',
            data : ['<? echo $mo11;?>','<? echo $mo10;?>','<? echo $mo9;?>','<? echo $mo8;?>','<? echo $mo7;?>','<? echo $mo6;?>','<? echo $mo5;?>','<? echo $mo4;?>','<? echo $mo3;?>','<? echo $mo2;?>','<? echo $mo1;?>','<? echo $mo;?>']
        }
    ],
    yAxis : [
        {
            type : 'value'
        }
    ],
    series : [
        {
            name:'所有订单',
            type:'bar',
            data:[<?tj_order('12');?>,<?tj_order('11');?>,<?tj_order('10');?>,<?tj_order('9');?>,<?tj_order('8');?>,<?tj_order('7');?>,<?tj_order('6');?>,<?tj_order('5');?>,<?tj_order('4');?>,<?tj_order('3');?>,<?tj_order('2');?>,<?tj_order('1');?>],
            markPoint : {
                data : [

                ]
            }
        },
        {
            name:'微信订单',
            type:'bar',
            data:[<?tj_order('12','1');?>,<?tj_order('11','1');?>,<?tj_order('10','1');?>,<?tj_order('9','1');?>,<?tj_order('8','1');?>,<?tj_order('7','1');?>,<?tj_order('6','1');?>,<?tj_order('5','1');?>,<?tj_order('4','1');?>,<?tj_order('3','1');?>,<?tj_order('2','1');?>,<?tj_order('1','1');?>],
            markPoint : {
                data : [

                ]
            },


        }
		, {
            name:'支付宝订单',
            type:'bar',
            data:[<?tj_order('12','2');?>,<?tj_order('11','2');?>,<?tj_order('10','2');?>,<?tj_order('9','2');?>,<?tj_order('8','2');?>,<?tj_order('7','2');?>,<?tj_order('6','2');?>,<?tj_order('5','2');?>,<?tj_order('4','2');?>,<?tj_order('3','2');?>,<?tj_order('2','2');?>,<?tj_order('1','2');?>],
            markPoint : {
                data : [

                ]
            },

		}
		, {
            name:'会员卡订单',
            type:'bar',
            data:[<?tj_order('12','3');?>,<?tj_order('11','3');?>,<?tj_order('10','3');?>,<?tj_order('9','3');?>,<?tj_order('8','3');?>,<?tj_order('7','3');?>,<?tj_order('6','3');?>,<?tj_order('5','3');?>,<?tj_order('4','3');?>,<?tj_order('3','3');?>,<?tj_order('2','3');?>,<?tj_order('1','3');?>],
            markPoint : {
                data : [

                ]
            },

		}
		, {
            name:'现金支付订单',
            type:'bar',
            data:[<?tj_order('12','4');?>,<?tj_order('11','4');?>,<?tj_order('10','4');?>,<?tj_order('9','4');?>,<?tj_order('8','4');?>,<?tj_order('7','4');?>,<?tj_order('6','4');?>,<?tj_order('5','4');?>,<?tj_order('4','4');?>,<?tj_order('3','4');?>,<?tj_order('2','4');?>,<?tj_order('1','4');?>],
            markPoint : {
                data : [

                ]
            },

		}
    ]
};

                myChart.setOption(option);
            }
        );
    </script>
