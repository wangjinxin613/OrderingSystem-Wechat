<?
  require('config/index_class.php');
  if(check_dept('19') == false){
      exit('<script>alert(\'您没有权限访问本页面\');history.back();</script>');
  }
    $fen_id = $_GET['fen_id'];
    $type = $_GET['type'];

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
		<script src="js/H-ui.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/typeahead-bs2.min.js"></script>
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/jquery.dataTables.bootstrap.js"></script>
        <script src="assets/layer/layer.js" type="text/javascript" ></script>
        <script src="assets/laydate/laydate.js" type="text/javascript"></script>

        <script src="js/lrtk.js" type="text/javascript" ></script>
<title>退款管理</title>
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
</head>

<body>
<div class="margin clearfix">
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
   
 <div class="border clearfix">
       <span class="l_f">
        <a href="?type=3<? if($fen_id != null){ echo "&fen_id=$fen_id";}?>" class="btn"><i class="fa fa-check-square-o"></i>&nbsp;未退款订单</a>
        <a href="?type=4<? if($fen_id != null){ echo "&fen_id=$fen_id";}?>" class="btn btn-success Order_form"><i class="fa fa-check-square-o"></i>&nbsp;退款成功订单</a>
        <a href="?type=5<? if($fen_id != null){ echo "&fen_id=$fen_id";}?>" class="btn btn-warning Order_form"><i class="fa fa-close"></i>&nbsp;退款失败订单</a>
       	&nbsp;**退款处理后将会退还至改会员的账户余额</span>
     </div>
     <!--退款列表-->
     <div class="refund_list">
        <table class="table table-striped table-bordered table-hover" id="sample-table">
		<thead>
		 <tr>
				<th width="25px"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th>
				<th width="120px">订单号</th>
				<th width="120px">微信昵称</th>
				<th width="180px">产品名称</th>
				<th width="100px">交易金额</th>
                <th width="100px">申请时间</th>
                 <th width="200px">说明</th>
                 <th width="80px">门店</th>
				<th width="100px">状态</th>
				<th width="200px">操作</th>
			</tr>
		</thead>
        <tbody>
        <? tuikuan($fen_id,$type);?>
          
        </tbody>
    </table>

     </div>
 </div>
</div>
</body>
</html>
<script>
 //订单列表
jQuery(function($) {
		var oTable1 = $('#sample-table').dataTable( {
		"aaSorting": [[ 1, "desc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[0,2,3,4,5,6,8,9]}// 制定列不参与排序
		] } );
                 //全选操作
				$('table th input:checkbox').on('click' , function(){
					var that = this;
					$(this).closest('table').find('tr > td:first-child input:checkbox')
					.each(function(){
						this.checked = that.checked;
						$(this).closest('tr').toggleClass('selected');
					});

				});
			});
function Delivery_Refund(obj,id){

			 layer.confirm('是否退款当前商品价格！',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style=" display:none" class="btn btn-xs btn-success" onClick="member_stop(this,id)" href="javascript:;" title="已退款">退款</a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt  radius">已退款</span>');
		$(obj).remove();
		layer.msg('已退款!',{icon: 6,time:1000});
			});


};
//面包屑返回值
var index = parent.layer.getFrameIndex(window.name);
parent.layer.iframeAuto(index);
$('.Refund_detailed').on('click', function(){
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
</script>
<script>
function order_success(obj,id){
  layer.confirm('确定退款后退款金额会回退到该会员账户余额，确定操作吗',function(index){
    $(obj).parents("tr").find("#in").submit();

    layer.msg('操作成功!',{icon:1,time:1000});
  });
}
function order_success1(obj,id){
  layer.confirm('确定要不予退款吗',function(index){
    $(obj).parents("tr").find("#on").submit();

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
</script>

