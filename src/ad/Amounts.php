<?
	require('config/index_class.php');
	if(check_dept('17') == false){
			exit('<script>alert(\'您没有权限访问本页面\');history.back();</script>');
	}
	 $fen_id = $_GET['fen_id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Cache-Control" content="no-siteapp" />
 <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/style.css"/>
        <link href="assets/css/codemirror.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/ace.min.css" />
        <link rel="stylesheet" href="font/css/font-awesome.min.css" />
        <!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->
		<script src="js/jquery-1.9.1.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>

		<script src="assets/js/typeahead-bs2.min.js"></script>
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/jquery.dataTables.bootstrap.js"></script>
        <script src="assets/layer/layer.js" type="text/javascript" ></script>
        <script src="assets/laydate/laydate.js" type="text/javascript"></script>
		<script src="assets/dist/echarts.js"></script>
		<script type="text/javascript">
            $(function () {
                (function longPolling() {
                    //alert(Date.parse(new Date())/1000);
                    $.ajax({
                        url: "comet/Orderform.php<? if($fen_id != null) echo "?fen_id={$fen_id}";?>",
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
          <script type="text/javascript">
			 //select跳页
			 function s_click(obj) {
					 var num = 0;
					 for (var i = 0; i < obj.options.length; i++) {
							 if (obj.options[i].selected == true) {
									 num++;
							 }
					 }
					 if (num == 1) {
							 var url = obj.options[obj.selectedIndex].value;

							 window.location.href=url;
					 }
			 }
	 </script>
<title>交易金额</title>
</head>

<body>
	<div class="search_style">

      <ul class="search_content clearfix">

       <li><label class="l_f">门店选择：</label>
				 <select style="width:200px" onchange="s_click(this)" name="select" id="select">
					 
							<option value="?fen_id=0" <? if($fen_id == 0){ echo 'selected="selected"';}?> >总店</option>
						<?fendian_list('1',$fen_id,"$type");?>
				 </select>
			 </li>
       <li >当前门店：<? fendian_odd($fen_id);?></li>
      </ul>
    </div>
	<div style="font-size:25px;color:#FF0033;text-align:center;">本页面显示的24小时之内的实时订单</div>
<div class="margin clearfix">
	<!--
 <div class="amounts_style">
   <div class="transaction_Money clearfix">
      <div class="Money"><span >成交总额：<? zongjine();?>元</span><p>最新统计时间:<? echo date("Y-m-d");?></p></div>
      <div class="Money"><span >微信支付：<? zongjine('1');?>元</span><p>最新统计时间:<? echo date("Y-m-d");?></p></div>
      <div class="Money"><span >支付宝支付：<? zongjine('2');?>元</span><p>最新统计时间:<? echo date("Y-m-d");?></p></div>
      <div class="Money"><span >会员卡支付：<? zongjine('3');?>元</span><p>最新统计时间:<? echo date("Y-m-d");?></p></div>
       <div class="Money"><span ><em>￥</em>3456.00元</span><p>当天成交额</p></div>
       <div class="l_f Statistics_btn">
       <a href="javascript:ovid()" title="当月统计" onclick="Statistics_btn()" class="btn  btn-info btn-sm no-radius"><i class="bigger fa fa-bar-chart "></i><h5 class="margin-top">当月统计</h5></a>
     </div>
    </div>-->
    <!--
    <div class="border clearfix">
      <span class="l_f">
      <a href="javascript:ovid()" class="btn btn-info">全部订单</a>
      <a href="javascript:ovid()" class="btn btn-danger">当天订单</a>
        <a href="javascript:ovid()" class="btn btn-danger">当月订单</a>
       </span>
       <span class="r_f">共：<b>2334</b>笔</span>
     </div>-->
   <div class="Record_list">
      <!--订单列表展示-->
       <table class="table table-striped table-bordered table-hover" id="sample-table">
		<thead>
		 <tr>
				<th width="25px"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th>
				<th width="100px">订单编号</th>
				<th width="150px">产品名称</th>
				<th width="100px">总价</th>
				<th width="100px">订单类型</th>
        		<th width="100px">订单时间</th>
				<th width="100px">支付方式</th>
       		 	<th width="80px">微信昵称</th>
                <th width="80px">门店</th>
        		<th width="70px">是否打印</th>
				<th width="70px">状态</th>
				<th width="320px">操作</th>
			</tr>
		</thead>
	<tbody id="state">
    <tr></tr>

     </tbody>
     </table>

   </div>
 </div>
</div>
<div id="Statistics" style="display:none">
 <div id="main" style="height:400px; overflow:hidden; width:1000px; overflow:auto" ></div>
</div>
</body>
</html>
<script>
$(function() {
		var oTable1 = $('#sample-table').dataTable( {
		"aaSorting": [],//默认第几个排序
		"bStateSave": false,//状态保存
		//"dom": 't',
		"bFilter":false,
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[0,1,2,3,4]}// 制定列不参与排序
		] } );
				$('table th input:checkbox').on('click' , function(){
					var that = this;
					$(this).closest('table').find('tr > td:first-child input:checkbox')
					.each(function(){
						this.checked = that.checked;
						$(this).closest('tr').toggleClass('selected');
					});

				});
})
//当月统计
function Statistics_btn(){
	var index = layer.open({
        type: 1,
        title: '当月销售统计',
		maxmin: true,
		shadeClose:false,
        area : ['1000px' , ''],
        content:$('#Statistics'),
		btn:['确定','取消'],
	})
	//layer.full(index);
	}
	//统计
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
    tooltip : {
        trigger: 'axis'
    },
    toolbox: {
        show : true,
        feature : {
            mark : {show: true},
            dataView : {show: true, readOnly: false},
            magicType: {show: true, type: ['line', 'bar']},
            restore : {show: true},
            saveAsImage : {show: true}
        }
    },
    calculable : true,
    legend: {
        data:['成交订单','失败订单','成交金额']
    },
    xAxis : [
        {
            type : 'category',
            data : ['1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','125','26','27','28','29','30','31']
        }
    ],
    yAxis : [
        {
            type : 'value',
            name : '订单',
            axisLabel : {
                formatter: '{value} 单'
            }
        },
        {
            type : 'value',
            name : '金额',
            axisLabel : {
                formatter: '{value} 元'
            }
        }
    ],
    series : [

        {
            name:'成交订单',
            type:'bar',
            data:[20, 49, 70, 232, 26, 67, 136, 162, 36, 20, 64, 33,26, 67, 136, 162, 36, 20, 64,]
        },
        {
            name:'失败订单',
            type:'bar',
            data:[2, 5, 9, 4, 2, 7, 1, 1, 4, 1, 0, 3,0, 0, 1, 2, 6, 2, 6,]
        },
        {
            name:'成交金额',
            type:'line',
            yAxisIndex: 1,
            data:[2024, 2233, 3344, 4543, 6355, 1042, 2037, 2346, 2305, 1654, 2120, 6542,2656, 6547, 1346, 2162, 3456, 4520, 6664,]
        }
    ]
};



				 myChart.setOption(option);
			})
</script>
<script>
function order_success(obj,id){
  layer.confirm('该操作会修改订单状态，确定操作吗',function(index){
    $(obj).parents("tr").find("#in").submit();

    layer.msg('操作成功!',{icon:1,time:1000});
  });
}
/*用户-删除*/
function member_del(obj,id){
    layer.confirm('确认要删除吗？',function(index){
        $(obj).parents("tr").remove();
        $(obj).parents("tr").find("#del").submit();
        layer.msg('已删除!',{icon:1,time:1000});
    });
}
laydate({
    elem: '#start',
    event: 'focus'
});
function dayin(obj,id){
    layer.confirm('确认要打印吗？',function(index){
    
        $(obj).parents("tr").find("#dayin").submit();

    });
}
</script>
