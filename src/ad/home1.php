<?php
//判断是否登录成功
require('config/index_class1.php');
 $today= date("Y/m/d");//获取当前时间
 $zhou= strtotime("-7 days");//获取当前时间

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
       <title></title>
       </head>
<body>
<div class="page-content clearfix">
 <div class="alert alert-block alert-success">
  <button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
  <i class="icon-ok green"></i>欢迎使用<strong class="green">女神阁会员卡系统</strong>,你本次登陆时间为<?
  echo date('Y年m月d日H时i分s秒');?>，登陆IP:<? $s= getIP(); echo $s;?>.
 </div>
 <div class="state-overview clearfix">
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                      <a href="zo_user_list.php" title="商城会员">
                          <div class="symbol terques">
                             <i class="icon-user"></i>
                          </div>
                          <div class="value">
                              <h1><? tj("member")?></h1>
                              <p>总会员数</p>
                          </div>
                          </a>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                      	<a href="Shop_list.php">
                          <div class="symbol red">
                              <i class="icon-tags"></i>
                          </div>
                          <div class="value">
                              <h1><? tj("store_setting");?></h1>
                              <p>门店数量</p>
                          </div>
                      </a>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                  	<a href="zo_Orderform.php">
                      <section class="panel">
                          <div class="symbol yellow">
                              <i class="icon-shopping-cart"></i>
                          </div>
                          <div class="value">
                              <h1><? tj("orderlist")?></h1>
                              <p>订单总数</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                  	<a href="zo_xiaofei.php">
                      <section class="panel">
                          <div class="symbol blue">
                              <i class="icon-bar-chart"></i>
                          </div>
                          <div class="value">
                              <h1>￥<? zongjine();?></h1>
                              <p>交易总金额</p>
                          </div>
                      </section>
                  </a>
                  </div>
              </div>
             <!--实时交易记录-->
             <div class="clearfix">
              <div class="Order_Statistics ">
          <div class="title_name">采购商城统计信息</div>
           <table class="table table-bordered">
           <tbody>
           <tr><td class="name">未处理订单：</td><td class="munber"><a href="zo_orderlist.php"><?tj("zo_orderlist where status_ss = 0 ");?></a>&nbsp;个</td></tr>
           <tr><td class="name">未支付订单：</td><td class="munber"><a href="zo_orderlist.php"><?tj("zo_orderlist where status = 0 ");?></a>&nbsp;个</td></tr>
           <tr><td class="name">已支付订单：</td><td class="munber"><a href="zo_orderlist.php"><?tj("zo_orderlist where status = 1");?></a>&nbsp;个</td></tr>
           <tr><td class="name">已成交订单数：</td><td class="munber"><a href="zo_orderlist.php"><?tj("zo_orderlist where status_ss = 1 ");?></a>&nbsp;个</td></tr>
           <tr><td class="name">交易失败：</td><td class="munber"><a href="zo_orderlist.php"><?tj("zo_orderlist where status_ss = 2  ");?></a>&nbsp;个</td></tr>
           </tbody>
          </table>
         </div>
        
         <div class="Order_Statistics">
          <div class="title_name">会员统计信息</div>
           <table class="table table-bordered">
           <tbody>
           <tr><td class="name">会员总数：</td><td class="munber"><a href="zo_user_list.php"><?tj("member "); ?></a>&nbsp;名</td></tr>
           <tr><td class="name" >今日新增会员：</td><td class="munber"><a href="zo_user_list.php?type=1"><?tj_member('1'); ?></a>&nbsp;个</td></tr>
           <tr><td class="name">本周新增会员：</td><td class="munber"><a href="zo_user_list.php?type=2"> <?tj_member('2');?></a>&nbsp;个</td></tr>
           <tr><td class="name">本月新增会员：</td><td class="munber"><a href="zo_user_list.php?type=3"><?tj_member('3');?></a>&nbsp;个</td></tr>
            <tr><td class="name">本年新增会员：</td><td class="munber"><a href="zo_user_list.php?type=4"><?tj_member('4');?></a>&nbsp;个</td></tr>
           </tbody>
          </table>
         </div>
          
            <div class="Order_Statistics">
          <div class="title_name">订单支付类型信息</div>
           <table class="table table-bordered">
           <tbody>
           <tr><td class="name">微信支付 ：</td><td class="munber"><a href="zo_xiaofei.php"><?tj("orderlist where paytype = '1'"); ?></a>&nbsp;个</td></tr>
           <tr><td class="name">支付宝 ：</td><td class="munber"><a href="zo_xiaofei.php"><?tj("orderlist where paytype = '4'"); ?></a>&nbsp;个</td></tr>
           <tr><td class="name">会员卡支付	：</td><td class="munber"><a href="zo_xiaofei.php"><?tj("orderlist where paytype = '3'"); ?></a>&nbsp;个</td></tr>
             <tr><td class="name">现金支付：</td><td class="munber"><a href="zo_xiaofei.php"><?tj("orderlist where paytype = '2'"); ?></a>&nbsp;个</td></tr>

           </tbody>
          </table>
         </div>
          
             <!--<div class="t_Record">
               <div id="main" style="height:300px; overflow:hidden; width:100%; overflow:auto" ></div>
              </div> -->

         </div>
 <!--记录-->
 <div class="clearfix">
  <div class="home_btn">
  

 </div>

     </div>
</body>
</html>
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
