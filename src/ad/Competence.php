<?php
  require('config/index_class.php');
  if(check_dept('38') == false){
      exit('<script>alert(\'您没有权限访问本页面\');history.back();</script>');
  }
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
<title>添加权限</title>
</head>

<body>
   <form action="action/admin_dept_add.php" method="post">
<div class="Competence_add_style clearfix">
  <div class="left_Competence_add">
   <div class="title_name">添加权限</div>
    <div class="Competence_add">
     <div class="form-group"><label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 权限名称 </label>
       <div class="col-sm-9"><input type="text" id="form-field-1" placeholder=""  name="dept_name" class="col-xs-10 col-sm-5"></div>
	</div>
     <div class="form-group"><label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 权限描述 </label>
      <div class="col-sm-9"><textarea name="beizhu" class="form-control" id="form_textarea" placeholder="" onkeyup="checkLength(this);"></textarea><span class="wordage">剩余字数：<span id="sy" style="color:Red;">200</span>字</span></div>
	</div>

   <!--按钮操作-->
   <div class="Button_operation">
				<button onclick="article_save_submit();" class="btn btn-primary radius" type="submit"><i class="fa fa-save "></i> 保存并提交</button>
				<button onclick="article_save();" class="btn btn-secondary  btn-warning" type="button"><i class="fa fa-reply"></i> 返回上一步</button>
				<button onclick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
			</div>
   </div>
   </div>
   <!--权限分配-->

   <div class="Assign_style">
      <div class="title_name">权限分配</div>
      <div class="Select_Competence">
      <dl class="permission-list">
		<dd>

      <dl class="cl permission-list2" <? if(all_dept('1') == false){ echo 'style="display:none"';}?>>
      <dt><label class="middle"><input type="checkbox" value="" class="ace"  name="user-Character-0-0" id="id-disable-check"><span class="lbl">会员管理</span></label></dt>
          <dd>
        <label class="middle"><input type="checkbox" value="1" class="ace" name="dept[]" id="user-Character-0-0-0"><span class="lbl">会员列表</span></label>
        <label class="middle"><input type="checkbox" value="2" class="ace" name="dept[]" id="user-Character-0-0-2"><span class="lbl">充值记录</span></label>
        <label class="middle"><input type="checkbox" value="3" class="ace" name="dept[]" id="user-Character-0-0-1"><span class="lbl">会员等级管理</span></label>
        <label class="middle"><input type="checkbox" value="4" class="ace" name="dept[]" id="user-Character-0-0-2"><span class="lbl">会员提现管理</span></label>

     </dd>
     </dl>

     <dl class="cl permission-list2" <? if(all_dept('2') == false){ echo 'style="display:none"';}?>>
     <dt><label class="middle"><input type="checkbox" value="" class="ace"  name="user-Character-0-0" id="id-disable-check"><span class="lbl">营销活动</span></label></dt>
         <dd>
       <label class="middle"><input type="checkbox" value="5" class="ace" name="dept[]" id="user-Character-0-0-0"><span class="lbl">积分策略</span></label>
       <label class="middle"><input type="checkbox" value="6" class="ace" name="dept[]" id="user-Character-0-0-1"><span class="lbl">优惠券</span></label>
       <label class="middle"><input type="checkbox" value="7" class="ace" name="dept[]" id="user-Character-0-0-2"><span class="lbl">代金券</span></label>
       <label class="middle"><input type="checkbox" value="8" class="ace" name="dept[]" id="user-Character-0-0-2"><span class="lbl">礼品券</span></label>
       <label class="middle"><input type="checkbox" value="9" class="ace" name="dept[]" id="user-Character-0-0-2"><span class="lbl">营销设置</span></label>

     </dd>
     </dl>

     <dl class="cl permission-list2" <? if(all_dept('3') == false){ echo 'style="display:none"';}?>>
     <dt><label class="middle"><input type="checkbox" value="" class="ace"  name="user-Character-0-0" id="id-disable-check"><span class="lbl">收银系统</span></label></dt>
         <dd>
       <label class="middle"><input type="checkbox" value="10" class="ace" name="dept[]" id="user-Character-0-0-0"><span class="lbl">收银系统</span></label>
     </dd>
     </dl>
		 <dl class="cl permission-list2" <? if(all_dept('4') == false){ echo 'style="display:none"';}?>>
		 <dt><label class="middle"><input type="checkbox" value="" class="ace"  id="id-disable-check"><span class="lbl">点餐系统</span></label></dt>
         <dd>
        <label class="middle"><input type="checkbox" value="11" class="ace" name="dept[]" id="user-Character-0-0-0"><span class="lbl">员工店内点餐</span></label>
		   <label class="middle"><input type="checkbox" value="12" class="ace" name="dept[]" id="user-Character-0-0-0"><span class="lbl">商品列表</span></label>
		   <label class="middle"><input type="checkbox" value="13" class="ace" name="dept[]" id="user-Character-0-0-1"><span class="lbl">添加商品</span></label>
		   <label class="middle"><input type="checkbox" value="14" class="ace" name="dept[]" id="user-Character-0-0-2"><span class="lbl">分类管理</span></label>
       <label class="middle"><input type="checkbox" value="15" class="ace" name="dept[]" id="user-Character-0-0-2"><span class="lbl">台号设置</span></label>
       <label class="middle"><input type="checkbox" value="16" class="ace" name="dept[]" id="user-Character-0-0-1"><span class="lbl">订单管理</span></label>
       <label class="middle"><input type="checkbox" value="17" class="ace" name="dept[]" id="user-Character-0-0-2"><span class="lbl">实时订单</span></label>
       <label class="middle"><input type="checkbox" value="18" class="ace" name="dept[]" id="user-Character-0-0-2"><span class="lbl">订单处理</span></label>
       <label class="middle"><input type="checkbox" value="19" class="ace" name="dept[]" id="user-Character-0-0-2"><span class="lbl">退款管理</span></label>
       <label class="middle"><input type="checkbox" value="20" class="ace" name="dept[]" id="user-Character-0-0-2"><span class="lbl">销量统计</span></label>
       <label class="middle"><input type="checkbox" value="21" class="ace" name="dept[]" id="user-Character-0-0-2"><span class="lbl">打印机管理</span></label>
		</dd>
		</dl>

    <dl class="cl permission-list2" <? if(all_dept('5') == false){ echo 'style="display:none"';}?>>
    <dt><label class="middle"><input type="checkbox" value="" class="ace"  name="user-Character-0-0" id="id-disable-check"><span class="lbl">门店管理</span></label></dt>
        <dd>
      <label class="middle"><input type="checkbox" value="22" class="ace" name="dept[]"  id="user-Character-0-0-0"><span class="lbl">分店管理</span></label>
      <label class="middle"><input type="checkbox" value="23" class="ace" name="dept[]"  id="user-Character-0-0-0"><span class="lbl">首页图片广告</span></label>
   </dd>
   </dl>

   <dl class="cl permission-list2" <? if(all_dept('6') == false){ echo 'style="display:none"';}?>>
   <dt><label class="middle"><input type="checkbox" value="" class="ace"  name="user-Character-0-0" id="id-disable-check"><span class="lbl">提现管理</span></label></dt>
       <dd>
     <label class="middle"><input type="checkbox" value="24" class="ace" name="dept[]"  id="user-Character-0-0-0"><span class="lbl">在线充值记录</span></label>
     <label class="middle"><input type="checkbox" value="25" class="ace" name="dept[]"  id="user-Character-0-0-0"><span class="lbl">消费记录</span></label>
     <label class="middle"><input type="checkbox" value="26" class="ace" name="dept[]"  id="user-Character-0-0-0"><span class="lbl">提现记录</span></label>
  </dd>
  </dl>

 <dl class="cl permission-list2" <? if(all_dept('7') == false){ echo 'style="display:none"';}?>>
 <dt><label class="middle"><input type="checkbox" value="" class="ace"  name="user-Character-0-0" id="id-disable-check"><span class="lbl">采购商城</span></label></dt>
     <dd>
   <label class="middle"><input type="checkbox" value="27" class="ace" name="dept[]" id="user-Character-0-0-0"><span class="lbl">采购商城</span></label>
</dd>
</dl>



<dl class="cl permission-list2" <? if(all_dept('8') == false){ echo 'style="display:none"';}?>>
<dt><label class="middle"><input type="checkbox" value="" class="ace"  name="user-Character-0-0" id="id-disable-check"><span class="lbl">消息管理</span></label></dt>
    <dd>
  <label class="middle"><input type="checkbox" value="28" class="ace" name="dept[]" id="user-Character-0-0-0"><span class="lbl">评论列表</span></label>
  <label class="middle"><input type="checkbox" value="29" class="ace" name="dept[]" id="user-Character-0-0-1"><span class="lbl">评论设置</span></label>
  <label class="middle"><input type="checkbox" value="30" class="ace" name="dept[]" id="user-Character-0-0-2"><span class="lbl">通知管理</span></label>
  <label class="middle"><input type="checkbox" value="31" class="ace" name="dept[]" id="user-Character-0-0-2"><span class="lbl">发送通知</span></label>

</dd>
</dl>

<dl class="cl permission-list2" <? if(all_dept('9') == false){ echo 'style="display:none"';}?>>
<dt><label class="middle"><input type="checkbox" value="" class="ace"  name="user-Character-0-0" id="id-disable-check"><span class="lbl">系统设置</span></label></dt>
    <dd>
  <label class="middle"><input type="checkbox" value="32" class="ace" name="dept[]" id="user-Character-0-0-0"><span class="lbl">门店设置</span></label>
  <label class="middle"><input type="checkbox" value="33" class="ace" name="dept[]" id="user-Character-0-0-1"><span class="lbl">公众号配置</span></label>
  <label class="middle"><input type="checkbox" value="34" class="ace" name="dept[]" id="user-Character-0-0-2"><span class="lbl">系统日志</span></label>
  <label class="middle"><input type="checkbox" value="35" class="ace" name="dept[]" id="user-Character-0-0-2"><span class="lbl">交班信息</span></label>
</dd>
</dl>

<dl class="cl permission-list2" <? if(all_dept('10') == false){ echo 'style="display:none"';}?>>
<dt><label class="middle"><input type="checkbox" value="" class="ace"  name="user-Character-0-0" id="id-disable-check"><span class="lbl">管理员管理</span></label></dt>
    <dd>
  <label class="middle"><input type="checkbox" value="36" class="ace" name="dept[]" id="user-Character-0-0-0"><span class="lbl">权限管理</span></label>
  <label class="middle"><input type="checkbox" value="37" class="ace" name="dept[]" id="user-Character-0-0-1"><span class="lbl">管理员列表</span></label>
  <label class="middle"><input type="checkbox" value="38" class="ace" name="dept[]" id="user-Character-0-0-0"><span class="lbl">添加权限</span></label>

</dd>
</dl>

<dl class="cl permission-list2" <? if(all_dept('11') == false){ echo 'style="display:none"';}?>>
<dt><label class="middle"><input type="checkbox" value="" class="ace"  name="user-Character-0-0" id="id-disable-check"><span class="lbl">手机端后台</span></label></dt>
    <dd>
  <label class="middle"><input type="checkbox" value="39" class="ace" name="dept[]" id="user-Character-0-0-0"><span class="lbl">收款</span></label>
  <label class="middle"><input type="checkbox" value="40" class="ace" name="dept[]" id="user-Character-0-0-1"><span class="lbl">充值</span></label>
  <label class="middle"><input type="checkbox" value="41" class="ace" name="dept[]" id="user-Character-0-0-0"><span class="lbl">会员信息查询</span></label>
  <label class="middle"><input type="checkbox" value="42" class="ace" name="dept[]" id="user-Character-0-0-0"><span class="lbl">礼品券兑换</span></label>
  <label class="middle"><input type="checkbox" value="43" class="ace" name="dept[]" id="user-Character-0-0-0"><span class="lbl">查询交班记录，订单查询，礼品兑换记录</span></label>
  <label class="middle"><input type="checkbox" value="44" class="ace" name="dept[]" id="user-Character-0-0-0"><span class="lbl">交班</span></label>

</dd>
</dl>

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

</script>
