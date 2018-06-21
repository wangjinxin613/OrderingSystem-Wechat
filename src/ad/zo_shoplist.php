<?php
	require('config/index_class1.php');
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
        <link rel="stylesheet" href="assets/css/ace.min.css" />
        <link rel="stylesheet" href="assets/css/font-awesome.min.css" />
        <link rel="stylesheet" href="Widget/zTree/css/zTreeStyle/zTreeStyle.css" type="text/css">
        <link href="Widget/icheck/icheck.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="assets/css/colorbox.css">
		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->
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
        <script src="js/jquery-1.9.1.min.js"></script>
	        <script src="assets/js/jquery.colorbox-min.js"></script>
			<script src="assets/js/typeahead-bs2.min.js"></script>
			<script src="assets/js/jquery.dataTables.min.js"></script>
			<script src="assets/js/jquery.dataTables.bootstrap.js"></script>
	        <script src="assets/layer/layer.js" type="text/javascript" ></script>
	        <script type="text/javascript" src="Widget/swfupload/swfupload.js"></script>
	        <script type="text/javascript" src="Widget/swfupload/swfupload.queue.js"></script>
	        <script type="text/javascript" src="Widget/swfupload/swfupload.speed.js"></script>
	        <script type="text/javascript" src="Widget/swfupload/handlers.js"></script>
<title>商品列表</title>
</head>
<body>
<div class=" page-content clearfix">
 <div id="products_style">
    <div class="search_style">
			<!--
      <ul class="search_content clearfix">
       <li><label class="l_f">产品名称</label><input name="" type="text"  class="text_add" placeholder="输入品牌名称"  style=" width:250px"/></li>
       <li><label class="l_f">添加时间</label><input class="inline laydate-icon" id="start" style=" margin-left:10px;"></li>
       <li style="width:90px;"><button type="button" class="btn_search"><i class="icon-search"></i>查询</button></li>
      </ul>
    </div>
     <div class="border clearfix">
       <span class="l_f">
        <a href="picture-add.html" title="添加商品" class="btn btn-warning Order_form"><i class="icon-plus"></i>添加商品</a>
        <a href="javascript:ovid()" class="btn btn-danger"><i class="icon-trash"></i>批量删除</a>
       </span>
       <span class="r_f">共：<b>2334</b>件商品</span>
     </div>-->
     <!--产品列表展示
     <div class="h_products_list clearfix" id="products_list">
       <div id="scrollsidebar" class="left_Treeview">
        <div class="show_btn" id="rightArrow"><span></span></div>
        <div class="widget-box side_content" >
         <div class="side_title"><a title="隐藏" class="close_btn"><span></span></a></div>
         <div class="side_list"><div class="widget-header header-color-green2"><h4 class="lighter smaller">产品类型列表</h4></div>
         <div class="widget-body">
          <div class="widget-main padding-8"><div id="treeDemo" class="ztree"></div></div>
        </div>
       </div>
      </div>
     </div>-->
         <div class="table_menu_list1" id="testIframe1" style="width:100%;">
       <table class="table table-striped table-bordered table-hover" id="sample-table1">
		<thead>
		 <tr>
				<th width="25px"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th>
				<th width="80px">排列顺序</th>
				<th width="200px">产品名称</th>
				<th width="200px">产品图片</th>

				<th width="150px">商品单价价格</th>
				<th width="150px">商品在库数量</th>
                <th width="150px">商品已售数量</th>

                <th width="150px">所属分类</th>

				<th width="200px">操作</th>
			</tr>
		</thead>
	<tbody>
		 <?php
		 product_list($admin_sql1);
?>

    <!--  <tr>
        <td width="25px"><label><input type="checkbox" class="ace" ><span class="lbl"></span></label></td>
        <td width="80px">1</td>
        <td width="200px"><u style="cursor:pointer" class="text-primary" onclick="">娃娃菜</u></td>
        <td width="100px"><img src="../upload/shop.jpg" style="width:100px;"></td>
        <td width="100px">20</td>
        <td width="100px">100</td>
        <td width="100px">50</td>

        <td class="text-l">菜</td>

        <td class="td-manage">

        <a title="编辑" onclick="member_edit('编辑商品','products-edit.php','4','','450')" href="javascript:;"  class="btn btn-xs btn-info" ><i class="icon-edit bigger-120"></i></a>
        <a title="删除" href="javascript:;"  onclick="member_del(this,'1')" class="btn btn-xs btn-warning" ><i class="icon-trash  bigger-120"></i></a>
       </td>
	  </tr>
-->
    </tbody>
    </table>
    </div>
  </div>
 </div>
</div>
</body>
</html>
<script>
jQuery(function($) {
		var oTable1 = $('#sample-table1').dataTable( {
		"aaSorting": [[ 1, "desc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[0,2,3,8]}// 制定列不参与排序
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
			});
 laydate({
    elem: '#start',
    event: 'focus'
});
$(function() {
	$("#products_style").fix({
		float : 'left',
		//minStatue : true,
		skin : 'green',
		durationTime :false,
		spacingw:30,//设置隐藏时的距离
	    spacingh:260,//设置显示时间距
	});
});
</script>
<script type="text/javascript">
//初始化宽度、高度
 $(".widget-box").height($(window).height()-215);
$(".table_menu_list").width($(window).width()-260);
 $(".table_menu_list").height($(window).height()-215);
  //当文档窗口发生改变时 触发
    $(window).resize(function(){
	$(".widget-box").height($(window).height()-215);
	 $(".table_menu_list").width($(window).width()-260);
	  $(".table_menu_list").height($(window).height()-215);
	})

/*******树状图*******/
var setting = {
	view: {
		dblClickExpand: false,
		showLine: false,
		selectedMulti: false
	},
	data: {
		simpleData: {
			enable:true,
			idKey: "id",
			pIdKey: "pId",
			rootPId: ""
		}
	},
	callback: {
		beforeClick: function(treeId, treeNode) {
			var zTree = $.fn.zTree.getZTreeObj("tree");
			if (treeNode.isParent) {
				zTree.expandNode(treeNode);
				return false;
			} else {
				demoIframe.attr("src",treeNode.file + ".html");
				return true;
			}
		}
	}
};

var zNodes =[
	{ id:1, pId:0, name:"商城分类列表", open:true},
	{ id:11, pId:1, name:"蔬菜水果"},
	{ id:111, pId:11, name:"蔬菜s"},
	{ id:112, pId:11, name:"苹果"},
	{ id:113, pId:11, name:"大蒜"},
	{ id:114, pId:11, name:"白菜"},
	{ id:115, pId:11, name:"青菜"},
	{ id:12, pId:1, name:"手机数码"},
	{ id:121, pId:12, name:"手机 "},
	{ id:122, pId:12, name:"照相机 "},
	{ id:13, pId:1, name:"电脑配件"},
	{ id:131, pId:13, name:"手机 "},
	{ id:122, pId:13, name:"照相机 "},
	{ id:14, pId:1, name:"服装鞋帽"},
	{ id:141, pId:14, name:"手机 "},
	{ id:42, pId:14, name:"照相机 "},
];

var code;

function showCode(str) {
	if (!code) code = $("#code");
	code.empty();
	code.append("<li>"+str+"</li>");
}

$(document).ready(function(){
	var t = $("#treeDemo");
	t = $.fn.zTree.init(t, setting, zNodes);
	demoIframe = $("#testIframe");
	demoIframe.bind("load", loadReady);
	var zTree = $.fn.zTree.getZTreeObj("tree");
	zTree.selectNode(zTree.getNodeByParam("id",'11'));
});
/*产品-停用*/
function member_stop(obj,id){
	layer.confirm('确认要停用吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs " onClick="member_start(this,id)" href="javascript:;" title="启用"><i class="icon-ok bigger-120"></i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已停用</span>');
		$(obj).remove();
		layer.msg('已停用!',{icon: 5,time:1000});
	});
}

/*产品-启用*/
function member_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs btn-success" onClick="member_stop(this,id)" href="javascript:;" title="停用"><i class="icon-ok bigger-120"></i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
		$(obj).remove();
		layer.msg('已启用!',{icon: 6,time:1000});
	});
}
/*产品-编辑*/
function member_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}

/*产品-删除*/
function member_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$(obj).parents("tr").find("#in").submit();

		layer.msg('已删除!',{icon:1,time:1000});
	});
}
//面包屑返回值
var index = parent.layer.getFrameIndex(window.name);
parent.layer.iframeAuto(index);
$('.Order_form').on('click', function(){
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
<script type="text/javascript">
	function updateProgress(file) {
		$('.progress-box .progress-bar > div').css('width', parseInt(file.percentUploaded) + '%');
		$('.progress-box .progress-num > b').html(SWFUpload.speed.formatPercent(file.percentUploaded));
		if(parseInt(file.percentUploaded) == 100) {
			// 如果上传完成了
			$('.progress-box').hide();
		}
	}

	function initProgress() {
		$('.progress-box').show();
		$('.progress-box .progress-bar > div').css('width', '0%');
		$('.progress-box .progress-num > b').html('0%');
	}

	function successAction(fileInfo) {
		var up_path = fileInfo.path;
		var up_width = fileInfo.width;
		var up_height = fileInfo.height;
		var _up_width,_up_height;
		if(up_width > 120) {
			_up_width = 120;
			_up_height = _up_width*up_height/up_width;
		}
		$(".logobox .resizebox").css({width: _up_width, height: _up_height});
		$(".logobox .resizebox > img").attr('src', up_path);
		$(".logobox .resizebox > img").attr('width', _up_width);
		$(".logobox .resizebox > img").attr('height', _up_height);
	}

	var swfImageUpload;
	$(document).ready(function() {
		var settings = {
			flash_url : "Widget/swfupload/swfupload.swf",
			flash9_url : "Widget/swfupload/swfupload_fp9.swf",
			upload_url: "upload.php",// 接受上传的地址
			file_size_limit : "5MB",// 文件大小限制
			file_types : "*.jpg;*.gif;*.png;*.jpeg;",// 限制文件类型
			file_types_description : "图片",// 说明，自己定义
			file_upload_limit : 100,
			file_queue_limit : 0,
			custom_settings : {},
			debug: false,
			// Button settings
			button_image_url: "Widget/swfupload/upload-btn.png",
			button_width: "95",
			button_height: "30 ",
			button_placeholder_id: 'uploadBtnHolder',
			button_window_mode : SWFUpload.WINDOW_MODE.TRANSPARENT,
			button_cursor : SWFUpload.CURSOR.HAND,
			button_action: SWFUpload.BUTTON_ACTION.SELECT_FILE,

			moving_average_history_size: 40,

			// The event handler functions are defined in handlers.js
			swfupload_preload_handler : preLoad,
			swfupload_load_failed_handler : loadFailed,
			file_queued_handler : fileQueued,
			file_dialog_complete_handler: fileDialogComplete,
			upload_start_handler : function (file) {
				initProgress();
				updateProgress(file);
			},
			upload_progress_handler : function(file, bytesComplete, bytesTotal) {
				updateProgress(file);
			},
			upload_success_handler : function(file, data, response) {
				// 上传成功后处理函数
				var fileInfo = eval("(" + data + ")");
				successAction(fileInfo);
			},
			upload_error_handler : function(file, errorCode, message) {
				alert('上传发生了错误！');
			},
			file_queue_error_handler : function(file, errorCode, message) {
				if(errorCode == -110) {
					alert('您选择的文件太大了。');
				}
			}
		};
		swfImageUpload = new SWFUpload(settings);
	});
	 jQuery(function($) {
		 var colorbox_params = {
			reposition:true,
			scalePhotos:true,
			scrolling:false,
			previous:'<i class="fa fa-chevron-left"></i>',
			next:'<i class="fa fa-chevron-right"></i>',
			close:'&times;',
			current:'{current} of {total}',
			maxWidth:'100%',
			maxHeight:'100%',
			onOpen:function(){
				document.body.style.overflow = 'hidden';
			},
			onClosed:function(){
				document.body.style.overflow = 'auto';
			},
			onComplete:function(){
				$.colorbox.resize();
			}
		};

		$('.table-striped [data-rel="colorbox"]').colorbox(colorbox_params);
		$("#cboxLoadingGraphic").append("<i class='icon-spinner orange'></i>");

	})
			</script>
	</script>
