<?php
  require('config/index_class1.php');
  $store_id = $_GET['id'];
 
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
        <script src="js/dragDivResize.js" type="text/javascript"></script>


<title>编辑权限</title>
</head>

<body>
	
   <form action="action/zong_dept_edit.php" method="post">
<div class="Competence_add_style clearfix">
  <div class="left_Competence_add">
   <div class="title_name">门店设置</div>
   <input type="text" value="<? echo $store_id; ?>" name="store_id" style="display:none">
  <div class="Competence_add">
           <div class="form-group"><label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 门店名称 </label>
             <div class="col-sm-9"><input type="text" id="form-field-1" placeholder=""  name="store_name" class="col-xs-10 col-sm-5" value="<? shop_edit($store_id,'1');?>"></div>
        </div>
           <div class="form-group"><label class="col-sm-2 control-label no-padding-right l_f" for="form-field-1"> 到期时间 </label>
           <div class="col-sm-9"><input class="inline laydate-icon" id="start" style=" margin-left:10px;" value="<? shop_edit($store_id,'2'); ?>" name="stop_time"></div>
        </div>
        <div class="form-group"><label class="col-sm-2 control-label no-padding-right" for="form-field-1">分店数量 </label>
             <div class="col-sm-9"><input type="text" id="form-field-1" placeholder=""  name="fen_number" class="col-xs-10 col-sm-5" value="<? shop_edit($store_id,'3');?>"></div>
        </div>

   <!--按钮操作-->
   <br><br> <br><br> <br><br> <br><br>
   <div class="Button_operation">
				<button onclick="article_save_submit();" class="btn btn-primary radius" type="submit"><i class="fa fa-save "></i> 保存并提交</button>
				
			</div>
   </div>
   </div>
   <!--权限分配-->

   <div class="Assign_style">
      <div class="title_name">功能分配</div>
      <div class="Select_Competence">
      <dl class="permission-list">
		<dd>

    <dl class="cl permission-list2">
    <dt><label class="middle"><input type="checkbox" value="1" class="ace" name="dept[]" id="id-disable-check" <? if(check_dept3($store_id,'1') == true){ echo 'checked="checked"';}?>><span class="lbl">会员管理</span></label></dt>
       
   </dl>
   <br>
  <dl class="cl permission-list2">
    <dt><label class="middle"><input type="checkbox" value="2" class="ace"  name="dept[]" id="id-disable-check"  <? if(check_dept3($store_id,'2') == true){ echo 'checked="checked"';}?>><span class="lbl">营销活动</span></label></dt>
   </dl>
   <br>
    <dl class="cl permission-list2">
    <dt><label class="middle"><input type="checkbox" value="3" class="ace"  name="dept[]" id="id-disable-check"  <? if(check_dept3($store_id,'3') == true){ echo 'checked="checked"';}?>><span class="lbl">电脑收银系统</span></label></dt>
   </dl>
   <br>
    <dl class="cl permission-list2">
    <dt><label class="middle"><input type="checkbox" value="4" class="ace"  name="dept[]" id="id-disable-check" <? if(check_dept3($store_id,'4') == true){ echo 'checked="checked"';}?>><span class="lbl">点餐系统</span></label></dt>
   </dl>
   <br>
    <dl class="cl permission-list2">
    <dt><label class="middle"><input type="checkbox" value="5" class="ace"  name="dept[]" id="id-disable-check" <? if(check_dept3($store_id,'5') == true){ echo 'checked="checked"';}?>><span class="lbl">门店管理</span></label></dt>
   </dl>
   <br>
   <dl class="cl permission-list2">
    <dt><label class="middle"><input type="checkbox" value="6" class="ace"  name="dept[]" id="id-disable-check" <? if(check_dept3($store_id,'6') == true){ echo 'checked="checked"';}?>><span class="lbl">提现管理</span></label></dt>
   </dl>
   <br>
   <dl class="cl permission-list2">
    <dt><label class="middle"><input type="checkbox" value="7" class="ace"  name="dept[]" id="id-disable-check"   <? if(check_dept3($store_id,'7') == true){ echo 'checked="checked"';}?>><span class="lbl">采购商城</span></label></dt>
   </dl>
   <br>
   <dl class="cl permission-list2">
    <dt><label class="middle"><input type="checkbox" value="8" class="ace"  name="dept[]" id="id-disable-check"  <? if(check_dept3($store_id,'8') == true){ echo 'checked="checked"';}?>><span class="lbl">消息管理</span></label></dt>
   </dl>
   <br>
   <dl class="cl permission-list2">
    <dt><label class="middle"><input type="checkbox" value="9" class="ace"  name="dept[]" id="id-disable-check" <? if(check_dept3($store_id,'9') == true){ echo 'checked="checked"';}?>><span class="lbl">系统管理</span></label></dt>
   </dl>
   <br>
   <dl class="cl permission-list2">
    <dt><label class="middle"><input type="checkbox" value="10" class="ace"  name="dept[]" id="id-disable-check"   <? if(check_dept3($store_id,'10') == true){ echo 'checked="checked"';}?>><span class="lbl">管理员管理</span></label></dt>
   </dl>
   <BR>
   <dl class="cl permission-list2">
    <dt><label class="middle"><input type="checkbox" value="11" class="ace"  name="dept[]" id="id-disable-check"   <? if(check_dept3($store_id,'11') == true){ echo 'checked="checked"';}?>><span class="lbl">手机端后台</span></label></dt>
   </dl>
   <br>
      </div>
  </div>
</div>
</form>
</body>
</html>
<script type="text/javascript">
//初始化宽度、高度
 $(".left_Competence_add,.Competence_add_style").height($(window).height()).val();;
 $(".Assign_style").width($(window).width()-500).height($(window).height()).val();
 $(".Select_Competence").width($(window).width()-500).height($(window).height()-40).val();
  //当文档窗口发生改变时 触发
    $(window).resize(function(){

	$(".Assign_style").width($(window).width()-500).height($(window).height()).val();
	$(".Select_Competence").width($(window).width()-500).height($(window).height()-40).val();
	$(".left_Competence_add,.Competence_add_style").height($(window).height()).val();;
	});
/*字数限制*/
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
/*按钮选择*/
$(function(){
	$(".permission-list dt input:checkbox").click(function(){
		$(this).closest("dl").find("dd input:checkbox").prop("checked",$(this).prop("checked"));
	});
	$(".permission-list2 dd input:checkbox").click(function(){
		var l =$(this).parent().parent().find("input:checked").length;
		var l2=$(this).parents(".permission-list").find(".permission-list2 dd").find("input:checked").length;
		if($(this).prop("checked")){
			$(this).closest("dl").find("dt input:checkbox").prop("checked",true);
			$(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",true);
		}
		else{
			if(l==0){
				$(this).closest("dl").find("dt input:checkbox").prop("checked",false);
			}
			if(l2==0){
				$(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",false);
			}
		}

	});
});
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
<script>
jQuery(function($) {
				var oTable1 = $('#sample-table').dataTable( {
				"aaSorting": [[ 1, "desc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[1,2,3]}// 制定列不参与排序
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
/*用户-添加*/
 $('#member_add').on('click', function(){
    layer.open({
        type: 1,
        title: '添加用户',
		maxmin: true,
		shadeClose: true, //点击遮罩关闭层
        area : ['800px' , ''],
        content:$('#add_menber_style'),
		btn:['提交','取消'],
		yes:function(index,layero){
		 var num=0;
		 var str="";
     $(".add_menber input[type$='text']").each(function(n){
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
});
/*用户-查看*/
function member_show(title,url,id,w,h){
	layer_show(title,url+'#?='+id,w,h);
}
/*用户-停用*/
function member_stop(obj,id){


	layer.confirm('确认要停用吗？',function(index){
			$(obj).parents("tr").find("#stop").submit();


		layer.msg('已停用!',{icon: 5,time:1000});
	});
}

/*用户-启用*/
function member_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		$(obj).parents("tr").find("#sta").submit();


		layer.msg('已启用!',{icon: 6,time:1000});
	});
}
/*用户-编辑*/
function member_edit(id){
	  layer.open({
        type: 1,
        title: '修改用户信息',
		maxmin: true,
		shadeClose:false, //点击遮罩关闭层
        area : ['800px' , ''],
        content:$('#add_menber_style'),
		btn:['提交','取消'],
		yes:function(index,layero){
		 var num=0;
		 var str="";
     $(".add_menber input[type$='text']").each(function(n){
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
function member_ed(title,url,id,w,h){
	layer_show(title,url,w,h);
}
</script>
