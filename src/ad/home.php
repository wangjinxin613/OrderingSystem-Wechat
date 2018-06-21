<?php
//判断是否登录成功
require('config/index_class.php');
 $today= date("Y/m/d");//获取当前时间
 $zhou= strtotime("-7 days");//获取当前时间
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
        	<link rel="stylesheet" href="assets/css/ace.min.css" />
        <link rel="stylesheet" href="assets/css/font-awesome.min.css" />
        <link href="assets/css/codemirror.css" rel="stylesheet">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
                <link rel="stylesheet" href="css/style.css"/>
                <link rel="stylesheet" href="assets/css/font-awesome.min.css" />
                <link href="assets/css/codemirror.css" rel="stylesheet">
                <link rel="stylesheet" href="font/css/font-awesome.min.css" />
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
		<script src="assets/js/jquery.min.js"></script>
		<!-- <![endif]-->
           	<script src="assets/dist/echarts.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
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
       <title></title>
       </head>
<body>
<div class="page-content clearfix">
 <div class="alert alert-block alert-success">
  <button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
  <i class="icon-ok green"></i>欢迎使用<strong class="green">女神阁会员卡系统</strong>,你本次登陆时间为<?
  echo date('Y年m月d日H时i分s秒');?>，登陆IP:<? $s= getIP(); echo $s;?>.
  <p style="color:#000;">您的门店版本为为<strong><? store_sort($item->sort);?></strong>，分店数量为<strong><? echo $item->fen_number;?></strong>个，到期时间为<strong><? echo $item->stop_time;?></strong>，还有<strong><? stop_day();?> 天&nbsp;&nbsp;&nbsp;&nbsp;<a href="taocan.php" style="color:red">版本更改/版本续费</a></p>
 </div>
  <div class="alert alert-block alert-success">
  <button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
打印机使用说明
  <p >使用打印机前请确保打印机已经与电脑相连，并且能在电脑上正常打印。使用前必须下载lodop打印控件，安装之后即可实现订单支付成功后自动打印</p>
  <p style="color:red"><a href="kongjian.zip" style="color:red">控件下载</a>&nbsp;/&nbsp;<a href="qudong.rar" style="color:red">驱动下载</a></p>
 </div>
 <div class="state-overview clearfix">
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                      <a href="#" title="商城会员">
                          <div class="symbol terques">
                             <i class="icon-user"></i>
                          </div>
                          <a href="user_list.php">
                          <div class="value">
                              <h1><? tj("member where store_id = {$user->store_id}")?></h1>
                              <p>商城用户</p>
                          </div>
                          </a>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol red">
                              <i class="icon-tags"></i>
                          </div>
                          <a href="Products_List.php">
                          <div class="value">
                              <h1><? tj("product where store_id = {$user->store_id}");?></h1>
                              <p>商品数量</p>
                          </div>
                        </a>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol yellow">
                              <i class="icon-shopping-cart"></i>
                          </div>
                          <a href="Orderform.php">
                          <div class="value">
                              <h1><? tj("orderlist where store_id = {$user->store_id}")?></h1>
                              <p>商城订单</p>
                          </div>
                        </a>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol blue">
                              <i class="icon-bar-chart"></i>
                          </div>
                          <div class="value">
                              <h1>￥<? zongjine();?></h1>
                              <p>交易总金额</p>
                          </div>
                      </section>
                  </div>
              </div>
             <!--实时交易记录-->
             <div class="clearfix">
              <div class="Order_Statistics ">
          <div class="title_name">订单统计信息</div>
           <table class="table table-bordered">
           <tbody>
           <tr><td class="name">未处理订单：</td><td class="munber"><a href="Order_handling.php?status_ss=0"><?tj("orderlist where status_ss = 0 and store_id = {$user->store_id}");?></a>&nbsp;个</td></tr>
           <tr><td class="name">未支付订单：</td><td class="munber"><a href="Order_handling.php?status=0"><?tj("orderlist where status = 0 and store_id = {$user->store_id}");?></a>&nbsp;个</td></tr>
           <tr><td class="name">已支付订单：</td><td class="munber"><a href="Order_handling.php?status=1"><?tj("orderlist where status = 1 and store_id = {$user->store_id}");?></a>&nbsp;个</td></tr>
           <tr><td class="name">已成交订单数：</td><td class="munber"><a href="Order_handling.php?status_ss=1"><?tj("orderlist where status_ss = 1 and store_id = {$user->store_id}");?></a>&nbsp;个</td></tr>
           <tr><td class="name">交易失败：</td><td class="munber"><a href="Order_handling.php?status_ss=2"><?tj("orderlist where status_ss = 2 and store_id = {$user->store_id}");?></a>&nbsp;个</td></tr>
           </tbody>
          </table>
         </div>
         <div class="Order_Statistics">
          <div class="title_name">商品统计信息</div>
           <table class="table table-bordered">
           <tbody>
           <tr><td class="name">商品总数：</td><td class="munber"><a href="Products_List.php"><?tj("product where store_id = {$user->store_id}");?></a>&nbsp;个</td></tr>
           <tr><td class="name">商品分类：</td><td class="munber"><a href="products_sort.php"><?tj("product_sort where store_id = {$user->store_id}");?></a>&nbsp;个</td></tr>
           <tr><td class="name">商品销售总量：</td><td class="munber"><a href="Orderform.php"><?tj_all_products();?></a>&nbsp;个</td></tr>


           </tbody>
          </table>
         </div>
         <div class="Order_Statistics">
          <div class="title_name">会员统计信息</div>
           <table class="table table-bordered">
           <tbody>
           <tr><td class="name">会员总数：</td><td class="munber"><a href="user_list.php"><?tj("member where store_id = {$user->store_id}"); ?></a>&nbsp;名</td></tr>
           <tr><td class="name">今日新增会员：</td><td class="munber"><a href="user_list.php?type=1"><?tj_member('1'); ?></a>&nbsp;个</td></tr>
           <tr><td class="name">本周新增会员：</td><td class="munber"><a href="user_list.php?type=2"> <?tj_member('2');?></a>&nbsp;个</td></tr>
           <tr><td class="name">本月新增会员：</td><td class="munber"><a href="user_list.php?type=3"><?tj_member('3');?></a>&nbsp;个</td></tr>
            <tr><td class="name">本年新增会员：</td><td class="munber"><a href="user_list.php?type=4"><?tj_member('4');?></a>&nbsp;个</td></tr>
           </tbody>
          </table>
         </div>
          <div class="Order_Statistics">
          <div class="title_name">其他统计信息</div>
           <table class="table table-bordered">
           <tbody>
           <tr><td class="name">优惠券 ：</td><td class="munber"><a href="youhui_list.php"><?tj("youhui_list where store_id = {$user->store_id}"); ?></a>&nbsp;个</td></tr>
           <tr><td class="name">代金券 ：</td><td class="munber"><a href="daijin_list.php"><?tj("daijin_list where store_id = {$user->store_id}"); ?></a>&nbsp;个</td></tr>
           <tr><td class="name">礼品券	：</td><td class="munber"><a href="lipin_list.php"><?tj("lipin_list where store_id = {$user->store_id}"); ?></a>&nbsp;个</td></tr>
             <tr><td class="name">门店评论：</td><td class="munber"><a href="pinglun.php"><?tj("pinglun where store_id = {$user->store_id}"); ?></a>&nbsp;条</td></tr>
            <tr><td class="name">管理员个数：</td><td class="munber"><a href="administrator.php"><?tj("admin where store_id = {$user->store_id}"); ?></a>&nbsp;个</td></tr>
           </tbody>
          </table>
         </div>
            <div class="Order_Statistics">
          <div class="title_name">订单支付类型信息</div>
           <table class="table table-bordered">
           <tbody>
           <tr><td class="name">微信支付 ：</td><td class="munber"><a href="Orderform.php"><?tj("orderlist where store_id = {$user->store_id} and paytype = '1'"); ?></a>&nbsp;个</td></tr>
           <tr><td class="name">支付宝 ：</td><td class="munber"><a href="Orderform.php"><?tj("orderlist where store_id = {$user->store_id} and paytype = '4'"); ?></a>&nbsp;个</td></tr>
           <tr><td class="name">会员卡支付	：</td><td class="munber"><a href="Orderform.php"><?tj("orderlist where store_id = {$user->store_id} and paytype = '3'"); ?></a>&nbsp;个</td></tr>
             <tr><td class="name">现金支付：</td><td class="munber"><a href="Orderform.php"><?tj("orderlist where store_id = {$user->store_id} and paytype = '2'"); ?></a>&nbsp;个</td></tr>

           </tbody>
          </table>
         </div>
           <div class="Order_Statistics">
          <div class="title_name">订单类型信息</div>
           <table class="table table-bordered">
           <tbody>
           <tr><td class="name">店内点餐：</td><td class="munber"><a href="Orderform.php?type=1"><?tj("orderlist where store_id = {$user->store_id} and order_type = '1'"); ?></a>&nbsp;个</td></tr>
           <tr><td class="name">外卖  ：</td><td class="munber"><a href="Orderform.php?type=2"><?tj("orderlist where store_id = {$user->store_id} and order_type = '2'"); ?></a>&nbsp;个</td></tr>
           <tr><td class="name">快速买单：</td><td class="munber"><a href="Orderform.php?type=4"><?tj("orderlist where store_id = {$user->store_id} and order_type = '4'"); ?></a>&nbsp;个</td></tr>
            <tr><td class="name">预定	：</td><td class="munber"><a href="Orderform.php?type=3"><?tj("orderlist where store_id = {$user->store_id} and order_type = '3'"); ?></a>&nbsp;个</td></tr>

           </tbody>
          </table>
         </div>
             <!--<div class="t_Record">
               <div id="main" style="height:300px; overflow:hidden; width:100%; overflow:auto" ></div>
              </div> -->

         </div>
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
          <div style="width:100%">
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

<script type="text/javascript">
//面包屑返回值
var index = parent.layer.getFrameIndex(window.name);
parent.layer.iframeAuto(index);
$('.no-radius').on('click', function(){
	var cname = $(this).attr("title");
	var chref = $(this).attr("href");
	var cnames = parent.$('.Current_page').html();
	var herf = parent.$("#iframe").attr("src");
    parent.$('#parentIframe').html(cname);
    parent.$('#iframe').attr("src",chref).ready();;
	parent.$('#parentIframe').css("display","inline-block");
	parent.$('.Current_page').attr({"name":herf,"href":"javascript:void(0)"}).css({"color":"#4c8fbd","cursor":"pointer"});
	//parent.$('.Current_page').html("<a href='javascript:void(0)' name="+herf+" class='iframeurl'>" + cnames + "</a>");
    parent.layer.close(index);

});
     $(document).ready(function(){

		  $(".t_Record").width($(window).width()-640);
		  //当文档窗口发生改变时 触发
    $(window).resize(function(){
		 $(".t_Record").width($(window).width()-640);
		});
 });


 </script>
