<?php
require('config/index_class_no.php');
all_dept('1');
mysql_select_db("my_db", $con);
  function test(){
    $result = mysql_query("SELECT * FROM dayinji where store_id = '1' ");
  while($row = mysql_fetch_array($result))
  { echo $row['name'];
  }

}

/**********************************后台账户权限管理****************************/
/***
**dept_body 对应权限
*	1.会员列表
*	2.充值记录
*	3.会员等级管理
*	4.会员提现管理
*	5.积分策略
* 6.优惠券
* 7.代金券
* 8.礼品券
* 9.营销设置
* 10.收银系统
* 11.员工店内点餐
* 12.商品列表
* 13.添加商品
* 14.分类管理
* 15.台号设置
* 16.订单管理
* 17.实时订单
* 18.订单处理
* 19.退款管理
* 20.销量统计
* 21.打印机管理
* 22.分店管理
* 23.首页图片
* 24.在线充值记录
* 25.消费记录
* 26.提现记录
* 27.采购商城
* 28.评论列表
* 29.评论设置
* 30.通知管理
* 31.发送通知
* 32.门店设置
* 33.公众号配置
* 34.系统日志
* 35.交班信息
* 36.权限管理
* 37.管理员列表

* 38.添加权限
* */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>女神阁会员卡系统</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="assets/css/font-awesome.min.css" />
		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="assets/css/ace.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
        <link rel="stylesheet" href="css/style.css"/>
		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->
		<script src="assets/js/ace-extra.min.js"></script>
		<!--[if lt IE 9]>
		<script src="assets/js/html5shiv.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
        <!--[if !IE]> -->
		<script src="js/jquery-1.9.1.min.js"></script>
		<!-- <![endif]-->
		<!--[if IE]>
         <script type="text/javascript">window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"script>");</script>
        <![endif]-->
		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/typeahead-bs2.min.js"></script>
		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>
        <script src="assets/layer/layer.js" type="text/javascript"></script>
		<script src="assets/laydate/laydate.js" type="text/javascript"></script>
        <script src="js/jquery.nicescroll.js" type="text/javascript"></script>

<script type="text/javascript">
 $(function(){
 var cid = $('#nav_list> li>.submenu');
	  cid.each(function(i){
       $(this).attr('id',"Sort_link_"+i);

    })
 })
 jQuery(document).ready(function(){
    $.each($(".submenu"),function(){
	var $aobjs=$(this).children("li");
	var rowCount=$aobjs.size();
	var divHeigth=$(this).height();
    $aobjs.height(divHeigth/rowCount);
  });
    //初始化宽度、高度

    $("#main-container").height($(window).height()-76);
	$("#iframe").height($(window).height()-140);

	$(".sidebar").height($(window).height()-99);
    var thisHeight = $("#nav_list").height($(window).outerHeight()-173);
	$(".submenu").height();
	$("#nav_list").children(".submenu").css("height",thisHeight);

    //当文档窗口发生改变时 触发
    $(window).resize(function(){
	$("#main-container").height($(window).height()-76);
	$("#iframe").height($(window).height()-140);
	$(".sidebar").height($(window).height()-99);

	var thisHeight = $("#nav_list").height($(window).outerHeight()-173);
	$(".submenu").height();
	$("#nav_list").children(".submenu").css("height",thisHeight);
  });
    $(document).on('click','.iframeurl',function(){
                var cid = $(this).attr("name");
				var cname = $(this).attr("title");
                $("#iframe").attr("src",cid).ready();
				$("#Bcrumbs").attr("href",cid).ready();
				$(".Current_page a").attr('href',cid).ready();
                $(".Current_page").attr('name',cid);
				$(".Current_page").html(cname).css({"color":"#333333","cursor":"default"}).ready();
				$("#parentIframe").html('<span class="parentIframe iframeurl"> </span>').css("display","none").ready();
				$("#parentIfour").html(''). css("display","none").ready();
      });



});
 /******/
  $(document).on('click','.link_cz > li',function(){
	$('.link_cz > li').removeClass('active');
	$(this).addClass('active');
});
/*******************/
//jQuery( document).ready(function(){
//	  $("#submit").click(function(){
//	// var num=0;
//     var str="";
//     $("input[type$='password']").each(function(n){
//          if($(this).val()=="")
//          {
//              // num++;
//			   layer.alert(str+=""+$(this).attr("name")+"不能为空！\r\n",{
//                title: '提示框',
//				icon:0,
//          });
//             // layer.msg(str+=""+$(this).attr("name")+"不能为空！\r\n");
//             layer.close(index);
//          }
//     });
//})
//	});

/*********************点击事件*********************/
$( document).ready(function(){
  $('#nav_list,.link_cz').find('li.home').on('click',function(){
	$('#nav_list,.link_cz').find('li.home').removeClass('active');
	$(this).addClass('active');
  });
//时间设置
  function currentTime(){
    var d=new Date(),str='';
    str+=d.getFullYear()+'年';
    str+=d.getMonth() + 1+'月';
    str+=d.getDate()+'日';
    str+=d.getHours()+'时';
    str+=d.getMinutes()+'分';
    str+= d.getSeconds()+'秒';
    return str;
}

setInterval(function(){$('#time').html(currentTime)},1000);
//修改密码
$('.change_Password').on('click', function(){
    layer.open({
    type: 1,
	title:'修改密码',
	area: ['300px','300px'],
	shadeClose: true,
	content: $('#change_Pass'),
	btn:['确认修改'],
	yes:function(index, layero){
		   if ($("#password").val()==""){
			  layer.alert('原密码不能为空!',{
              title: '提示框',
				icon:0,

			 });
			return false;
          }
		  if ($("#Nes_pas").val()==""){
			  layer.alert('新密码不能为空!',{
              title: '提示框',
				icon:0,

			 });
			return false;
          }

		  if ($("#c_mew_pas").val()==""){
			  layer.alert('确认新密码不能为空!',{
              title: '提示框',
				icon:0,

			 });
			return false;
          }
		    if(!$("#c_mew_pas").val || $("#c_mew_pas").val() != $("#Nes_pas").val() )
        {
            layer.alert('密码不一致!',{
              title: '提示框',
				icon:0,

			 });
			 return false;
        }
		 else{
			  layer.alert('修改成功！',{
               title: '提示框',
			icon:1,
			  });
			  layer.close(index);
		  }
	}
    });
});
  $('#Exit_system').on('click', function(){
      layer.confirm('是否确定退出系统？', {
     btn: ['是','否'] ,//按钮
	 icon:2,
    },
	function(){
	  location.href="login.html";

    });
});
});
function link_operating(name,title){
                var cid = $(this).name;
				var cname = $(this).title;
                $("#iframe").attr("src",cid).ready();
				$("#Bcrumbs").attr("href",cid).ready();
				$(".Current_page a").attr('href',cid).ready();
                $(".Current_page").attr('name',cid);
				$(".Current_page").html(cname).css({"color":"#333333","cursor":"default"}).ready();
				$("#parentIframe").html('<span class="parentIframe iframeurl"> </span>').css("display","none").ready();
				$("#parentIfour").html(''). css("display","none").ready();


}
</script>
 <script language="javascript" src="../dayin/LodopFuncs.js"></script>
<script language="javascript" type="text/javascript">  
        var LODOP; //声明为全局变量 
  function getPrinterCount() {  
    LODOP=getLodop();  
    return LODOP.GET_PRINTER_COUNT(); 
  };
  function getPrinterName() { 
    LODOP=getLodop();  
    var count = LODOP.GET_PRINTER_COUNT();  
    var h = new Array();
    for(var i=0;i<count;i++){
    
      h[i] = LODOP.GET_PRINTER_NAME(i);
    } 
    
    var fenben = "<?test();?>";
    for (var i in h){
    while(fenben.indexOf(h[i]) > 0 ){
        var res =  h[i];
        return res;
    }

}

  }; 
</script> 
<script type="text/javascript">

  setTimeout('var hh = getPrinterName()',500);
   
  //   var hh = ff();
       

            $(function () {
                (function longPolling() {
                  
                    //alert(Date.parse(new Date())/1000);
                    $.ajax({
                        url: "check_order.php",
                        data: {"dayin":hh},
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

                            if (data != "") { // 请求成功
 
                                longPolling();
                                 playSound();
                                  var t = $('#tz').text();
                                 
                                  var ff= t+1;
                                $('#tz').text('新订单');
                                $('#tzz').text('1');
                                
                            }
                             longPolling();
                        }
                    });

                })();
            });
function t(){
	test();
	return;
}
function hh(){
  $('#tz').text('0');
}
function qudiao(){
  $('#tz').text('0');
}
function test(){

	if(confirm("您有新订单，是否立即查看")){
                                   var a = $("<a href='Orderform.php' target='_blank'>Apple</a>").get(0);  
              
            var e = document.createEvent('MouseEvents');  
  
            e.initEvent('click', true, true);  
            a.dispatchEvent(e);  
            console.log('event has been changed'); 
                                  }
}
        </script>
 <script type="text/javascript">
   setTimeout('var hh = getPrinterName()',500);
            $(function () {
                (function longPolling() {
                    //alert(Date.parse(new Date())/1000);
                    $.ajax({
                        url: "dayin1.php",
                        data: {"dayin":hh},
                        dataType: "html",
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
                        	if(data == ""){
                        		//alert(data);
                        	 	// myPreview(data);	
                          //
                       }else{
                       //alert("正在打印"+data);
                   myPreview(data);	
                    
                        	 	
                       }
                            longPolling();
                        }
                    });

                })();
            });
        </script>
        <script type="text/javascript">
            $(function () {
                (function longPolling() {
                    //alert(Date.parse(new Date())/1000);
                    $.ajax({
                        url: "update.php",
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
                        
                       
                            longPolling();
                        }
                    });

                })();
            });
        </script>
        <script type="text/javascript">
function playSound()
    {
      var borswer = window.navigator.userAgent.toLowerCase();
      if ( borswer.indexOf( "ie" ) >= 0 )
      {
        //IE内核浏览器
        var strEmbed = '<embed name="embedPlay" src="n.mp3" autostart="true" hidden="true" loop="false"></embed>';
        if ( $( "body" ).find( "embed" ).length <= 0 )
          $( "body" ).append( strEmbed );
        var embed = document.embedPlay;

        //浏览器不支持 audion，则使用 embed 播放
        embed.volume = 100;
       
        //embed.play();这个不需要
      } else
      {
        //非IE内核浏览器
        var strAudio = "<audio id='audioPlay' src='../b.mp3' hidden='true'>";
        if ( $( "body" ).find( "audio" ).length <= 0 )
          $( "body" ).append( strAudio );
        var audio = document.getElementById( "audioPlay" );

        //浏览器支持 audion
        audio.play();
        
      }
  
     //window.clear();
    }
</script>
	</head>
	<body>
		<div class="navbar navbar-default" id="navbar">
        <script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>
			<div class="navbar-container" id="navbar-container">
				<div class="navbar-header pull-left">
					<a href="#" class="navbar-brand">
						<p style="margin-top:25PX;margin-left:20px;font-size:30px;">女神阁会员卡系统</p>
					</a><!-- /.brand -->
				</div><!-- /.navbar-header -->
				<!--
				<div class=" operating pull-left" >
					<ul class="link_cz" style="margin-left:260px">
						<li><a herf="javascript:void(0)" title="" class="iframeurl">
						</a></li>
						<li><a herf="javascript:void(0)" name="taocan.php" title="购买套餐" class="iframeurl"><h5 style="padding:27px 0;">购买套餐</h5>
						</a></li>
						<li><a herf="javascript:void(0)" name="Systems.html" title="系统设置" class="iframeurl"><h5 style="padding:27px 0;">在线客服</h5>
						</a></li>
						<li><a herf="javascript:void(0)" name="Systems.html" title="系统设置" class="iframeurl"><h5 style="padding:27px 0;">在线帮助</h5>
						</a></li>
					</li>
					</ul>

				</div>-->
				
			   <div class="navbar-header pull-right" role="navigation">
               <ul class="nav ace-nav">
                <li class="light-blue">
				<a data-toggle="dropdown" href="#" class="dropdown-toggle">
           <img src="<? echo $item->store_img;?>" style="height:50px;width:50px;border-radius:100px;margin-left:10px;">
				 <span  class="time"><em id="time"></em></span><span class="user-info"><small>欢迎光临,</small><? echo $user->admin_name;?></span>
				 <i class="icon-caret-down"></i>

				</a>

				<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
				 <li><a href="javascript:void(0" name="Systems.php" title="系统设置" class="iframeurl"><i class="icon-cog"></i>网站设置</a></li>
				 <li><a href="javascript:void(0)" name="admin_info.html" title="个人信息" class="iframeurl"><i class="icon-user"></i>个人资料</a></li>
				 <li class="divider"></li>
				 <li><a href="javascript:ovid(0)" id="Exit_system"><i class="icon-off"></i>退出</a></li>
				</ul>
			   </li>
	           <li class="purple">

							
                <!-- <div class="right_info">

                   <div class="get_time" ><span id="time" class="time"></span>欢迎光临,管理员</span></div>
					<ul class="nav ace-nav">
						<li><a href="javascript:ovid(0)" class="change_Password">修改密码</a></li>
                        <li><a href="javascript:ovid(0)" id="Exit_system">退出系统</a></li>

					</ul>
				</div>-->
       
        <ul class="nav ace-nav">
         <li class="purple">
        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-bell-alt"></i><span class="badge badge-important" id="tz">0</span></a>
              <ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
                            <li class="dropdown-header"><i class="icon-warning-sign"></i><span id="tzz">0</span>条通知</li>
                        


                <li>
                   <a  href="javascript:void(0)" name="Orderform.php" title="新订单" class="iframeurl" onclick="qudiao()">
                    <div class="clearfix">
                      <span class="pull-left" >
                        <i class="btn btn-xs no-hover btn-success icon-shopping-cart"></i>
                        查看新订单
                      </span>
                      <span class="pull-right badge badge-success" id="tz"></span>
                    </div>
                  </a>
                </li>

               
                <li>
                  <a  name="Amounts.php"  title="实时订单" class="iframeurl" onclick="hh()">
                    查看实时订单
                    <i class="icon-arrow-right"></i>
                  </a>
                </li>
              </ul>
            </li>
          </ul>

                </div>
			</div>
		</div>
		<div class="main-container" id="main-container">
        <script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>
			<div class="main-container-inner">
				<a class="menu-toggler" id="menu-toggler" href="#">
					<span class="menu-text"></span>
				</a>
				<div class="sidebar" id="sidebar">
<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
					</script>
          <div>

          </div>

					<div class="sidebar-shortcuts" id="sidebar-shortcuts">


					</div><!-- #sidebar-shortcuts -->
					<div id="menu_style" class="menu_style">
					<ul class="nav nav-list" id="nav_list">
				     <li class="home"><a href="javascript:void(0)" name="home.php" class="iframeurl" title=""><i class="icon-home"></i><span class="menu-text"> 系统首页 </span></a></li>
<!--**********************************-会员管理--------------------------------------------->
             <li style="<? if(all_dept('1') == false){echo "display:none";}?>"><a href="#" class="dropdown-toggle"><i class="icon-user"></i><span class="menu-text"> 会员管理 </span><b class="arrow icon-angle-down"></b></a>
               <ul class="submenu">
               <? if(check_dept('1') == true){echo '<li class="home"><a href="javascript:void(0)" name="user_list.php" title="会员列表"  class="iframeurl"><i class="icon-double-angle-right"></i>会员列表</a></li>';}?>
                <? if(check_dept('2') == true){echo '<li class="home"><a href="javascript:void(0)" name="chongzhi_log.php" title="充值记录"  class="iframeurl"><i class="icon-double-angle-right"></i>充值记录</a></li>';}?>

               <? if(check_dept('3') == true){echo '<li class="home"><a href="javascript:void(0)" name="member-Grading.php" title="会员等级设置"  class="iframeurl"><i class="icon-double-angle-right"></i>会员等级设置</a></li>';}?>
               <? if(check_dept('4') == true){echo '<li class="home"><a href="javascript:void(0)" name="tixian_log.php" title="会员提现记录"  class="iframeurl"><i class="icon-double-angle-right"></i>会员提现记录</a></li>';}?>
              </ul>
     </li>
<!--**********************************-营销活动--------------------------------------------->
    <li style="<? if(all_dept('2') == false){echo "display:none";}?>"><a href="#" class="dropdown-toggle"><i class="icon-th"></i><span class="menu-text"> 营销活动 </span><b class="arrow icon-angle-down"></b></a>
      <ul class="submenu">
      <? if(check_dept('5') == true){echo '<li class="home"><a href="javascript:void(0)" name="points_setting.php" title="积分策略" class="iframeurl"><i class="icon-double-angle-right"></i>积分策略</a></li>';}?>
      <? if(check_dept('6') == true){echo '<li class="home"><a href="javascript:void(0)" name="youhui_list.php" title="优惠券" class="iframeurl"><i class="icon-double-angle-right"></i>优惠券</a></li>';}?>
      <? if(check_dept('7') == true){echo '<li class="home"><a href="javascript:void(0)" name="daijin_list.php" title="代金券" class="iframeurl"><i class="icon-double-angle-right"></i>代金券</a></li>';}?>
      <? if(check_dept('8') == true){echo '<li class="home"><a href="javascript:void(0)" name="lipin_list.php" title="礼品券" class="iframeurl"><i class="icon-double-angle-right"></i>礼品券</a></li>';}?>
      <? if(check_dept('9') == true){echo '<li class="home"><a href="javascript:void(0)" name="yingxiao_setting.php" title="营销设置" class="iframeurl"><i class="icon-double-angle-right"></i>营销设置 </a></li>';}?>
    </ul>
  </li>
<!--**********************************-收银系统--------------------------------------------->
    <? if(check_dept('10') == true && all_dept('3') == true){echo '<li class="home" ><a href="javascript:void(0)" name="shouyin.php" class="iframeurl" title=""><i class="icon-home"></i><span class="menu-text"> 收银系统 </span></a></li>';}?>
<!--**********************************点餐系统--------------------------------------------->
          <li style="<? if(all_dept('4') == false){echo "display:none";}?>"><a href="#" class="dropdown-toggle"><i class="icon-desktop"></i><span class="menu-text"> 点餐系统 </span><b class="arrow icon-angle-down"></b></a>
					   <ul class="submenu">
							  <? if(check_dept('11') == true){ echo '<li class="home"><a  href="javascript:void(0)" name="mobile/pc_shoplist.php"  title="店内点餐" class="iframeurl" ><i class="icon-double-angle-right"></i>店内点餐</a></li>';}?>
							 <? if(check_dept('12') == true){ echo '<li class="home"><a  href="javascript:void(0)" name="Products_List.php"  title="商品列表" class="iframeurl"><i class="icon-double-angle-right"></i>商品列表</a></li>';}?>

						 <? if(check_dept('13') == true){echo '<li class="home"><a  href="javascript:void(0)" name="products_add.php" title="添加商品"  class="iframeurl"><i class="icon-double-angle-right"></i>添加商品</a></li>';}?>
						 <? if(check_dept('14') == true){echo '<li class="home"><a href="javascript:void(0)" name="products_sort.php" title="分类管理"  class="iframeurl"><i class="icon-double-angle-right"></i>分类管理</a></li>';}?>
						 <? if(check_dept('15') == true){echo '<li class="home"><a href="javascript:void(0)" name="taihao_list.php" title="台号设置"  class="iframeurl"><i class="icon-double-angle-right"></i>台号设置</a></li>';}?>
						 <? if(check_dept('16') == true){echo '<li class="home"><a href="javascript:void(0)" name="Orderform.php" title="订单管理"  class="iframeurl"><i class="icon-double-angle-right"></i>订单管理</a></li>';}?>
						 <? if(check_dept('17') == true){echo '<li class="home"><a href="javascript:void(0)" name="Amounts.php" title="实时订单"  class="iframeurl"><i class="icon-double-angle-right"></i>实时订单</a></li>';}?>
						 <?// if(check_dept('18') == true){echo '<li class="home"><a href="javascript:void(0)" name="Order_handling.php" title="订单处理"  class="iframeurl"><i class="icon-double-angle-right"></i>订单处理</a></li>';}?>
						 <? if(check_dept('19') == true){echo '<li class="home"><a href="javascript:void(0)" name="Refund.php" title="退款管理"  class="iframeurl"><i class="icon-double-angle-right"></i>退款管理</a></li>';}?>
						  <? if(check_dept('20') == true){echo '<li class="home"><a href="javascript:void(0)" name="transaction.php" title="销量统计"  class="iframeurl"><i class="icon-double-angle-right"></i>销量统计</a></li>';}?>
							<? if(check_dept('21') == true){echo '<li class="home"><a href="javascript:void(0)" name="dayinji.php" title="打印机管理"  class="iframeurl"><i class="icon-double-angle-right"></i>打印机管理</a></li>';}?>
						</ul>
					</li>
					<li style="<? if(all_dept('5') == false){echo "display:none";}?>">
					<a href="#" class="dropdown-toggle"><i class="icon-picture "></i><span class="menu-text"> 门店管理 </span><b class="arrow icon-angle-down"></b></a>
						<ul class="submenu">
						<? if(check_dept('22') == true){echo '<li class="home"><a href="javascript:void(0)" name="fendian_list.php" title="分店管理" class="iframeurl"><i class="icon-double-angle-right"></i>分店管理</a></li>';}?>
						 <? if(check_dept('23') == true){echo '<li class="home"><a href="javascript:void(0)" name="advertising.php" title="首页轮播图" class="iframeurl"><i class="icon-double-angle-right"></i>首页图片广告</a></li>';}?>
							</ul>
						</li>
					<li style="<? if(all_dept('6') == false){echo "display:none";}?>">
					<a href="#" class="dropdown-toggle"><i class="icon-list"></i><span class="menu-text"> 提现管理 </span><b class="arrow icon-angle-down"></b></a>
                    <ul class="submenu">
									<? if(check_dept('24') == true){echo '<li class="home"><a href="javascript:void(0)" name="chongzhi_log.php" title="在线充值记录"  class="iframeurl"><i class="icon-double-angle-right"></i>在线充值记录</a></li>';}?>
										<? if(check_dept('25') == true){echo '<li class="home"><a href="javascript:void(0)" name="integration.php" title="消费记录"  class="iframeurl"><i class="icon-double-angle-right"></i>消费记录</a></li>';}?>
                     <? if(check_dept('26') == true){echo '<li class="home"><a href="javascript:void(0)" name="tixian_log.php" title="提现记录"  class="iframeurl"><i class="icon-double-angle-right"></i>提现记录</a></li>';}?>


                   </ul>
				  </li>
              <!--     <li>
				   <a href="#" class="dropdown-toggle"><i class="icon-credit-card"></i><span class="menu-text"> 支付管理 </span><b class="arrow icon-angle-down"></b></a>
				     <ul class="submenu">
						<li class="home"><a href="javascript:void(0)" name="Cover_management.html" title="账户管理" class="iframeurl"><i class="icon-double-angle-right"></i>账户管理</a></li>
						 <li class="home"><a href="javascript:void(0)" name="payment_method.html" title="支付方式" class="iframeurl"><i class="icon-double-angle-right"></i>支付方式</a></li>
						  <li class="home"><a href="javascript:void(0)" name="Payment_Configure.html" title="支付配置" class="iframeurl"><i class="icon-double-angle-right"></i>支付配置</a></li>
							</ul>
						</li>-->

					<!--
				  <li><a href="#" class="dropdown-toggle"><i class="icon-laptop"></i><span class="menu-text"> 店铺管理 </span><b class="arrow icon-angle-down"></b></a>
							<ul class="submenu">
								<li class="home"><a href="javascript:void(0)" name="Shop_list.php" title="店铺列表" class="iframeurl"><i class="icon-double-angle-right"></i>店铺列表</a></li>
                                <li class="home"><a href="javascript:void(0)" name="Shops_Audit.html" title="店铺审核" class="iframeurl"><i class="icon-double-angle-right"></i>店铺审核<span class="badge badge-danger">5</span></a></li>
							</ul>
						</li>-->
						<? if(check_dept('27') == true && all_dept('7') == true){echo '
						<li >
							<a href="#" class="dropdown-toggle"><i class="icon-tags"></i><span class="menu-text"> 采购商城 </span><b class="arrow icon-angle-down"></b></a>
							<ul class="submenu">
		 					<li class="home"><a href="javascript:void(0)" name="cg_shop.php" title="商品购买" class="iframeurl"><i	 class="icon-double-angle-right"></i>商品购买</a></li>
							<li class="home"><a href="javascript:void(0)" name="cg_myorder.php" title="支付方式" class="iframeurl"><i class="icon-double-angle-right"></i>我的订单</a></li>
			 				<li class="home"><a href="javascript:void(0)" name="cg_address.php" title="收货地址" class="iframeurl"><i class="icon-double-angle-right"></i>收货地址</a></li>
			 			</ul>
		 				</li>';}?>

						<li style="<? if(all_dept('8') == false){echo "display:none";}?>"><a href="#" class="dropdown-toggle"><i class="icon-comments-alt"></i><span class="menu-text"> 消息管理 </span><b class="arrow icon-angle-down"></b></a>
							<ul class="submenu">
								<? if(check_dept('28') == true){ echo '<li class="home"><a href="javascript:void(0)" name="pinglun.php" title="评论列表" class="iframeurl"><i class="icon-double-angle-right"></i>评论列表</a></li>';}?>
								<!--<li class="home"><a href="javascript:void(0)" name="Feedback.html" title="意见反馈" class="iframeurl"><i class="icon-double-angle-right"></i>意见反馈</a></li>-->
								<? if(check_dept('29') == true){ echo '<li class="home"><a href="javascript:void(0)" name="pinglun_setting.php" title="评论设置" class="iframeurl"><i class="icon-double-angle-right"></i>评论设置</a></li>';}?>
								<? if(check_dept('30') == true){ echo '<li class="home"><a href="javascript:void(0)" name="notice_list.php" title="通知管理" class="iframeurl"><i class="icon-double-angle-right"></i>通知管理</a></li>';}?>
								<? if(check_dept('31') == true){ echo '<li class="home"><a href="javascript:void(0)" name="notice_add_list.php" title="发送通知" class="iframeurl"><i class="icon-double-angle-right"></i>发送通知</a></li>';}?>
							</ul>
						</li>
						<!--<li><a href="#" class="dropdown-toggle"><i class="icon-bookmark"></i><span class="menu-text"> 文章管理 </span><b class="arrow icon-angle-down"></b></a>
							<ul class="submenu">
								<li class="home"><a href="javascript:void(0)" name="article_list.html" title="文章列表" class="iframeurl"><i class="icon-double-angle-right"></i>文章列表</a></li>
                                <li class="home"><a href="javascript:void(0)" name="article_Sort.html" title="分类管理" class="iframeurl"><i class="icon-double-angle-right"></i>分类管理</a></li>
							</ul>
						</li>-->
                        	<li style="<? if(all_dept('9') == false){echo "display:none";}?>"><a href="#" class="dropdown-toggle"><i class="icon-cogs"></i><span class="menu-text"> 系统管理 </span><b class="arrow icon-angle-down"></b></a>
							<ul class="submenu">
								<? if(check_dept('32') == true){ echo '<li class="home"><a href="javascript:void(0)" name="Systems.php" title="门店设置" class="iframeurl"><i class="icon-double-angle-right"></i>门店设置</a></li>';}?>
								<? if(check_dept('33') == true){ echo '<li class="home"><a href="javascript:void(0)" name="wx_config.php" title="公众号设置" class="iframeurl"><i class="icon-double-angle-right"></i>公众号配置</a></li>';}?>
							<!--	<li class="home"><a href="javascript:void(0)" name="pinglun.php" title="系统栏目管理" class="iframeurl"><i class="icon-double-angle-right"></i>公告管理</a></li>-->

              					<? if(check_dept('34') == true){ echo '<li class="home"><a href="javascript:void(0)" name="System_Logs.php" title="系统日志" class="iframeurl"><i class="icon-double-angle-right"></i>系统日志</a></li>';}?>
							  	<? if(check_dept('35') == true){ echo '<li class="home"><a href="javascript:void(0)" name="jiaoban.php" title="交班信息" class="iframeurl"><i class="icon-double-angle-right"></i>交班信息</a></li>';}?>
							  	<li class="home"><a href="javascript:void(0)" name="taocan.php" title="购买套餐" class="iframeurl"><i class="icon-double-angle-right"></i>购买套餐</a></li>
							  		<li class="home"><a href="javascript:void(0)" name="taocan_log.php" title="购买套餐" class="iframeurl"><i class="icon-double-angle-right"></i>购买套餐记录</a></li>
							</ul>
						</li>
                        <li style="<? if(all_dept('10') == false){echo "display:none";}?>"><a href="#" class="dropdown-toggle"><i class="icon-group"></i><span class="menu-text"> 管理员管理 </span><b class="arrow icon-angle-down"></b></a>
							<ul class="submenu">
								<? if(check_dept('36') == true){ echo '<li class="home"><a href="javascript:void(0)" name="admin_Competence.php" title="权限管理"  class="iframeurl"><i class="icon-double-angle-right"></i>权限管理</a></li>';}?>
                <? if(check_dept('37') == true){ echo '<li class="home"><a href="javascript:void(0)" name="administrator.php" title="管理员列表" class="iframeurl"><i class="icon-double-angle-right"></i>管理员列表</a></li>';}?>
								  <li class="home"><a href="javascript:void(0)" name="admin_info.php" title="个人信息" class="iframeurl"><i class="icon-double-angle-right"></i>个人信息</a></li>
							</ul>
						</li>

					</ul>
					</div>
					<script type="text/javascript">
           $("#menu_style").niceScroll({
	        cursorcolor:"#888888",
	        cursoropacitymax:1,
         	touchbehavior:false,
	        cursorwidth:"5px",
	        cursorborder:"0",
	        cursorborderradius:"5px"
            });
          </script>
					<div class="sidebar-collapse" id="sidebar-collapse">
						<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
					</div>
                    <script type="text/javascript">
						try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
					</script>
				</div>

				<div class="main-content">
                <script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>
					<div class="breadcrumbs" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="icon-home home-icon"></i>
								<a href="index.html">首页</a>
							</li>
							<li class="active"><span class="Current_page iframeurl"></span></li>
                            <li class="active" id="parentIframe"><span class="parentIframe iframeurl"></span></li>
							<li class="active" id="parentIfour"><span class="parentIfour iframeurl"></span></li>

						</ul>

					</div>

                 <iframe id="iframe" style="border:0; width:100%; background-color:#FFF;"name="iframe" frameborder="0" src="home.php">  </iframe>


<!-- /.page-content -->
				</div><!-- /.main-content -->

                  <div class="ace-settings-container" id="ace-settings-container">
                      <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
                          <i class="icon-cog bigger-150"></i>
                      </div>

                      <div class="ace-settings-box" id="ace-settings-box">
                          <div>
                              <div class="pull-left">
                                  <select id="skin-colorpicker" class="hide">
                                      <option data-skin="default" value="#438EB9">#438EB9</option>
                                      <option data-skin="skin-1" value="#222A2D">#222A2D</option>
                                      <option data-skin="skin-2" value="#C6487E">#C6487E</option>
                                      <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
                                  </select>
                              </div>
                              <span>&nbsp; 选择皮肤</span>
                          </div>

                          <div>
                              <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
                              <label class="lbl" for="ace-settings-sidebar"> 固定滑动条</label>
                          </div>

                          <div>
                              <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
                              <label class="lbl" for="ace-settings-rtl">切换到左边</label>
                          </div>

                          <div>
                              <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
                              <label class="lbl" for="ace-settings-add-container">
                                  切换窄屏
                                  <b></b>
                              </label>
                          </div>
                      </div>
                  </div><!-- /#ace-settings-container -->
	</div><!-- /.main-container-inner -->

		</div>
         <!--底部样式-->

         <div class="footer_style" id="footerstyle">
		 <script type="text/javascript">try{ace.settings.check('footerstyle' , 'fixed')}catch(e){}</script>
          <p class="l_f">版权所有：女神阁</p>
          <p class="r_f">地址：东莞市万江区石美友谊路科曼电商产业园D栋202-203  电话：0769-22258686 技术支持：黄秀秀</p>
         </div>
         <!--修改密码样式-->
         <div class="change_Pass_style" id="change_Pass">
            <ul class="xg_style">
             <li><label class="label_name">原&nbsp;&nbsp;密&nbsp;码</label><input name="原密码" type="password" class="" id="password"></li>
             <li><label class="label_name">新&nbsp;&nbsp;密&nbsp;码</label><input name="新密码" type="password" class="" id="Nes_pas"></li>
             <li><label class="label_name">确认密码</label><input name="再次确认密码" type="password" class="" id="c_mew_pas"></li>
            </ul>
         </div>
        <!-- /.main-container -->
		<!-- basic scripts -->

</body>
  <script language="javascript" src="../dayin/LodopFuncs.js"></script>
<script language="javascript" type="text/javascript">        
        var LODOP; //声明为全局变量  
       
    function myPrint() {               
        CreatePrintPage();       
        LODOP.PRINT();             
    };         
    function myPrintA() {              
        CreatePrintPage();       
        LODOP.PRINTA();            
    };             
    function myPreview(data1) {             
        CreatePrintPage(data1);  
      
       //           
    };             
    function mySetup() {               
        CreatePrintPage();       
        LODOP.PRINT_SETUP();               
    };         
    function myDesign() {              
        CreatePrintPage();       
        LODOP.PRINT_DESIGN();              
    };         
    function myBlankDesign() {       
        LODOP=getLodop();         
        LODOP.PRINT_INIT("打印控件功能演示_Lodop功能_空白练习");             
        LODOP.PRINT_DESIGN();              
    };      
    function CreatePrintPage(data1) {       
       setTimeout('var hh = getPrinterName()',500);    
        LODOP=getLodop();         
        LODOP.PRINT_INIT("");     
          //alert("hreaf"+data1); 
          LODOP.SET_PRINT_MODE("WINDOW_DEFPRINTER",hh);   
           LODOP.SET_PRINT_PAGESIZE(1,"580","2000","");               
        LODOP.ADD_PRINT_HTM(10,10,"100%","100%",data1); 

       //LODOP.PRINTA();   
        // LODOP.PREVIEW(); 
          LODOP.PRINT();       
    };       
     
</script>  
</html>
