<?php
  require('config/index_class1.php');
  $id = $_GET['id'];

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
   <form action="zo/admin_dept_edit.php" method="post">
<div class="Competence_add_style clearfix">
  <div class="left_Competence_add">
   <div class="title_name">编辑权限</div>
   <input type="text" value="<? echo $id; ?>" name="dept_id" style="display:none">
  <? dept_edit($id)?>

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

   

   <dl class="cl permission-list2" >
      <dt><label class="middle"><input type="checkbox" value="" class="ace"  name="user-Character-0-0" id="id-disable-check" checked="checked"><span class="lbl">店铺管理</span></label></dt>
          <dd>
        <label class="middle"><input type="checkbox" value="1" class="ace"  name="dept[]" id="user-Character-0-0-0" <? if(check_dept1($id,'1') == true){ echo 'checked="checked"';}?>><span class="lbl">店铺列表</span></label>
        <label class="middle"><input type="checkbox" value="2" class="ace" name="dept[]" id="user-Character-0-0-2"  <? if(check_dept1($id,'2') == true){ echo 'checked="checked"';}?>><span class="lbl">添加店铺</span></label>
        <label class="middle"><input type="checkbox" value="3" class="ace" name="dept[]" id="user-Character-0-0-1"  <? if(check_dept1($id,'3') == true){ echo 'checked="checked"';}?>><span class="lbl">店铺分类</span></label>
        <label class="middle"><input type="checkbox" value="4" class="ace" name="dept[]" id="user-Character-0-0-2"  <? if(check_dept1($id,'4') == true){ echo 'checked="checked"';}?>><span class="lbl">进入具体店铺</span></label>

     </dd>
     </dl>

     <dl class="cl permission-list2" >
     <dt><label class="middle"><input type="checkbox" value="" class="ace"  name="user-Character-0-0" id="id-disable-check" checked="checked"><span class="lbl">采购商城</span></label></dt>
         <dd>
       <label class="middle"><input type="checkbox" value="5" class="ace" name="dept[]" id="user-Character-0-0-0"  <? if(check_dept1($id,'5') == true){ echo 'checked="checked"';}?>><span class="lbl">商品列表</span></label>
       <label class="middle"><input type="checkbox" value="6" class="ace" name="dept[]" id="user-Character-0-0-1"  <? if(check_dept1($id,'6') == true){ echo 'checked="checked"';}?>><span class="lbl">分类管理</span></label>
       <label class="middle"><input type="checkbox" value="7" class="ace" name="dept[]" id="user-Character-0-0-2"  <? if(check_dept1($id,'7') == true){ echo 'checked="checked"';}?>><span class="lbl">添加商品</span></label>
       <label class="middle"><input type="checkbox" value="8" class="ace" name="dept[]" id="user-Character-0-0-2"  <? if(check_dept1($id,'8') == true){ echo 'checked="checked"';}?>><span class="lbl">订单管理</span></label>
     </dd>
     </dl>

     <dl class="cl permission-list2" >
     <dt><label class="middle"><input type="checkbox" value="" class="ace"  name="user-Character-0-0" id="id-disable-check" checked="checked"><span class="lbl">明细数据</span></label></dt>
         <dd>
       <label class="middle"><input type="checkbox" value="9" class="ace" name="dept[]" id="user-Character-0-0-0"  <? if(check_dept1($id,'9') == true){ echo 'checked="checked"';}?>><span class="lbl">会员列表明细</span></label>
       <label class="middle"><input type="checkbox" value="10" class="ace" name="dept[]" id="user-Character-0-0-1" <? if(check_dept1($id,'10') == true){ echo 'checked="checked"';}?>><span class="lbl">订单明细</span></label>
       <label class="middle"><input type="checkbox" value="11" class="ace" name="dept[]" id="user-Character-0-0-2"  <? if(check_dept1($id,'11') == true){ echo 'checked="checked"';}?>><span class="lbl">消费明细</span></label>
     </dd>
     </dl>

      <dl class="cl permission-list2" >
     <dt><label class="middle"><input type="checkbox" value="" class="ace"  name="user-Character-0-0" id="id-disable-check" checked="checked"><span class="lbl">管理员管理</span></label></dt>
         <dd>
       <label class="middle"><input type="checkbox" value="12" class="ace" name="dept[]" id="user-Character-0-0-0"  <? if(check_dept1($id,'12') == true){ echo 'checked="checked"';}?>><span class="lbl">权限管理</span></label>
       <label class="middle"><input type="checkbox" value="13" class="ace" name="dept[]" id="user-Character-0-0-1"  <? if(check_dept1($id,'13') == true){ echo 'checked="checked"';}?>><span class="lbl">管理员列表</span></label>
       <label class="middle"><input type="checkbox" value="14" class="ace" name="dept[]" id="user-Character-0-0-2"  <? if(check_dept1($id,'14') == true){ echo 'checked="checked"';}?>><span class="lbl">个人信息</span></label>
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
