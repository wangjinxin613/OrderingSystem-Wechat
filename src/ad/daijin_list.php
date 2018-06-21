<?php
 	require('config/index_class.php');//引入公共类文件

    if(check_dept('7') == false){
  		  exit('<script>alert(\'您没有权限访问本页面\');history.back();</script>');
  	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
         <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/style.css"/>
        <link href="assets/css/codemirror.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/ace.min.css" />
        <link rel="stylesheet" href="font/css/font-awesome.min.css" />
         <link rel="stylesheet" href="assets/css/ace.min.css" />
        <link rel="stylesheet" href="assets/css/font-awesome.min.css" />
        <!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->
		 <script src="js/jquery-1.9.1.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/typeahead-bs2.min.js"></script>
		<!-- page specific plugin scripts -->
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/jquery.dataTables.bootstrap.js"></script>
        <script type="text/javascript" src="js/H-ui.js"></script>
        <script type="text/javascript" src="js/H-ui.admin.js"></script>
        <script src="assets/layer/layer.js" type="text/javascript" ></script>
        <script src="assets/laydate/laydate.js" type="text/javascript"></script>
        <script type="text/javascript" src="Widget/zTree/js/jquery.ztree.all-3.5.min.js"></script>
        <script src="js/lrtk.js" type="text/javascript" ></script>
<title>分类管理</title>
</head>

<body>
<div class="page-content clearfix">
 <div class="sort_style">
     <div class="border clearfix">
       <span class="l_f">
        <a href="javascript:ovid()" id="sort_add" class="btn btn-warning"><i class="fa fa-plus"></i> 添加代金券</a>
      	**代金券各门店通用

       </span>
       
     </div>
  <div class="sort_list">
    <table class="table table-striped table-bordered table-hover" id="sample-table">
		<thead>
		 <tr>
				<th width="25px"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th>
				<th width="50px">ID</th>

				<th width="200px">面值</th>
				<th width="350px">描述</th>
				<th width="100px">有效期（天）</th>
				<th width="100px">剩余数量</th>
				<th width="100px">已兑换数量</th>
				<th width="100px">兑换所需积分</th>
				<th width="100px">状态</th>
				<th width="250px">操作</th>
			</tr>
		</thead>
	<tbody>
			 <?php
daijin_list();
      ?>
    </tbody>
    </table>
  </div>
 </div>
</div>
<!--添加分类-->
<div class="sort_style_add margin" id="sort_style_add" style="display:none">
  <div class="">
     <ul>
     	<form action="action/daijin_add.php" method="POST">
      <li><label class="label_name">面值</label><div class="col-sm-9"><input name="money" type="text" id="form-field-1" placeholder="" style="width:70px;">元</div></li>
       <li><label class="label_name">有效期</label><div class="col-sm-9"><input name="time" type="text" id="form-field-1" placeholder="" style="width:70px;">天&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;数量<input name="number1" type="text" id="form-field-1" placeholder="" style="width:70px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;兑换所需积分<input name="points" type="text" id="form-field-1" placeholder="" style="width:70px;"></div></li>
      <li><label class="label_name">描述</label><div class="col-sm-9"><textarea name="beizhu" class="form-control" id="form-field-8" placeholder="" onkeyup="checkLength(this);"></textarea><span class="wordage">剩余字数：<span id="sy" style="color:Red;">200</span>字</span></div></li>
      <div class="layui-layer-btn"><button type="submit" class="layui-layer-btn0" style="padding:6px 15px;">提交</button><a class="layui-layer-btn1">取消</a></div>
     </li>
 </form>
     </ul>
  </div>
</div>
</body>
</html>
<script type="text/javascript">
$('#sort_add').on('click', function(){
	  layer.open({
        type: 1,
        title: '添加优惠券',
		maxmin: true,
		shadeClose: false, //点击遮罩关闭层
        area : ['750px' , ''],
        content:$('#sort_style_add'),

		yes:function(index,layero){
		 var num=0;
		 var str="";
     $(".sort_style_add input[type$='text']").each(function(n){
          if($(this).val()=="")
          {

			   layer.alert(str+=""+$(this).attr("name")+"不能为空！\r\n",{
                title: '提示框',
				icon:0,
          });
		    num++;
            return false;
          }
		 });
		  if(num>0){  return false;}
          else{
			  layer.alert('添加成功！',{
               title: '提示框',
			icon:1,
			  });
			   layer.close(index);
		  }
		}
    });
})
function member_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}

function checkLength(which) {
	var maxChars = 200; //
	if(which.value.length > maxChars){
	   layer.open({
	   icon:2,
	   title:'提示框',
	   content:'您出入的字数超多限制!',
    });
		// 超过限制的字数了就将 文本框中的内容按规定的字数 截取
		which.value = which.value.substring(0,maxChars);
		return false;
	}else{
		var curr = maxChars - which.value.length; //250 减去 当前输入的
		document.getElementById("sy").innerHTML = curr.toString();
		return true;
	}
};
/*广告图片-停用*/
function member_stop(obj,id){
	layer.confirm('确认要关闭吗？',{icon:0,},function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs " onClick="member_start(this,id)" href="javascript:;" title="显示"><i class="fa fa-close bigger-120"></i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已关闭</span>');
		$(obj).remove();
		layer.msg('关闭!',{icon: 5,time:1000});
	});
}
/*广告图片-启用*/
function member_start(obj,id){
	layer.confirm('确认要显示吗？',{icon:0,},function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs btn-success" onClick="member_stop(this,id)" href="javascript:;" title="关闭"><i class="fa fa-check  bigger-120"></i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">显示</span>');
		$(obj).remove();
		layer.msg('显示!',{icon: 6,time:1000});
	});
}
/*广告图片-删除*/
function member_del(obj,id){
	layer.confirm('删除后不可撤销,确认要删除吗？',{icon:0,},function(index){
		$(obj).parents("tr").find("#del").submit();
		layer.msg('已删除!',{icon:1,time:1000});
	});
}

//面包屑返回值
var index = parent.layer.getFrameIndex(window.name);
parent.layer.iframeAuto(index);
$('.Order_form ,.ads_link').on('click', function(){
	var cname = $(this).attr("title");
	var cnames = parent.$('.Current_page').html();
	var herf = parent.$("#iframe").attr("src");
    parent.$('#parentIframe span').html(cname);
	parent.$('#parentIframe').css("display","inline-block");
    parent.$('.Current_page').attr("name",herf).css({"color":"#4c8fbd","cursor":"pointer"});
	//parent.$('.Current_page').html("<a href='javascript:void(0)' name="+herf+">" + cnames + "</a>");
    parent.layer.close(index);

});
function AdlistOrders(id){
	window.location.href = "Ads_list.html?="+id;
};
</script>
<script type="text/javascript">
jQuery(function($) {
				var oTable1 = $('#sample-table').dataTable( {
				"aaSorting": [[ 1, "desc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[0,3,8,9]}// 制定列不参与排序
		] } );
				$('table th input:checkbox').on('click' , function(){
					var that = this;
					$(this).closest('table').find('tr > td:first-child input:checkbox')
					.each(function(){
						this.checked = that.checked;
						$(this).closest('tr').toggleClass('selected');
					});

				});
				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();

					var off2 = $source.offset();
					var w2 = $source.width();

					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			})
</script>
<script>
function member_stop(obj,id){


	layer.confirm('确认要停用吗？',function(index){
			$(obj).parents("tr").find("#stop").submit();


		layer.msg('已停用!',{icon: 5,time:1000});
	});
}

/*用户-启用*/
function member_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		$(obj).parents("tr").find("#start").submit();


		layer.msg('已启用!',{icon: 6,time:1000});
	});
}
function member_ed(title,url,id,w,h){
	layer_show(title,url,w,h);
}
</script>
