<?
  require('config/index_class1.php');
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
		<script src="assets/layer/layer.js" type="text/javascript" ></script>
        <script src="assets/laydate/laydate.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/typeahead-bs2.min.js"></script>
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/jquery.dataTables.bootstrap.js"></script>

<title>个人信息管理</title>
</head>

<body>
<div class="clearfix">
 <div class="admin_info_style">
   <div class="admin_modify_style" id="Personal">
     <div class="type_title">管理员信息 </div>
      <div class="xinxi">
        <form action="zo/admin_info_action.php" method="POST">
        <div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">用户名： </label>
          <div class="col-sm-9"><input type="text" name="admin_name" id="website-title" value="<?echo $user->admin_name;?>" class="col-xs-7 text_info" disabled="disabled">
          &nbsp;&nbsp;&nbsp;<a href="javascript:ovid()" onclick="change_Password()" class="btn btn-warning btn-xs">修改密码</a></div>

          </div>

          <div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">性别： </label>
          <div class="col-sm-9">
          <span class="sex"><? echo $user->admin_sex;?></span>
            <div class="add_sex">
            <label><input type="radio" name="admin_sex" value="保密" class="ace" checked="checked"><span class="lbl">保密</span></label>&nbsp;&nbsp;
            <label><input type="radio" name="admin_sex" class="ace" value="男"><span class="lbl">男</span></label>&nbsp;&nbsp;
            <label><input type="radio" name="admin_sex" class="ace" value="女"><span class="lbl">女</span></label>
            </div>
           </div>
          </div>
          <div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">真实姓名： </label>
          <div class="col-sm-9"><input type="text" name="admin_truename" id="website-title" value="<?echo $user->admin_truename;?>" class="col-xs-7 text_info" disabled="disabled"></div>
          </div>
          <div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">微信号： </label>
          <div class="col-sm-9"><input type="text" name="admin_weixin" id="website-title" value="<?echo $user->admin_weixin;?>" class="col-xs-7 text_info" disabled="disabled"></div>
          </div>
          <div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">移动电话： </label>
          <div class="col-sm-9"><input type="text" name="admin_tel" id="website-title" value="<?echo $user->admin_tel;?>" class="col-xs-7 text_info" disabled="disabled"></div>
          </div>
          <div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">电子邮箱： </label>
          <div class="col-sm-9"><input type="text" name="admin_email" id="website-title" value="<?echo $user->admin_email;?>" class="col-xs-7 text_info" disabled="disabled"></div>
          </div>
	         
           <div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">权限： </label>
          <div class="col-sm-9" > <span><? if($user->admin_type == "1"){ echo '超级管理员';
      } else{ admin_dept_sigle($user->admin_dept,'1'); }?></span></div>
          </div>

           <div class="Button_operation clearfix">
				<button onclick="modify();" class="btn btn-danger radius" type="button">修改信息</button>
				<button  class="btn btn-success radius" type="submit">保存修改</button>
      </form>
			</div>
            </div>
    </div>
    <!--<div class="recording_style">
    <div class="type_title">管理员操作日志 </div>
    <div class="recording_list">
     <table class="table table-border table-bordered table-bg table-hover table-sort" id="sample-table">
    <thead>
      <tr class="text-c">
        <th width="25"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th>
        <th width="80">ID</th>
        <th width="100">账户类型</th>
        <th>内容</th>

        <th width="10%">用户名</th>
        <th width="120">客户端IP</th>
        <th width="150">时间</th>
      </tr>
    </thead>
    <tbody><?php

    ?>

    </tbody>
  </table>
    </div>
    </div>-->
 </div>
</div>
 <!--修改密码样式-->
         <div class="change_Pass_style" id="change_Pass">
           <form action="zo/update_password.php" method="post">
            <ul class="xg_style">
             <li><label class="label_name">原&nbsp;&nbsp;密&nbsp;码</label><input name="so_password" type="password" class="" id="password" required></li>
             <li><label class="label_name">新&nbsp;&nbsp;密&nbsp;码</label><input name="new_password" type="password" class="" id="Nes_pas" required></li>
             <li><label class="label_name">确认密码</label><input name="re_password" type="password" class="" id="c_mew_pas" required></li>
<div class="layui-layer-btn"><button type="submit" class="layui-layer-btn0">确认修改</button></div>
            </ul>
          </form>
     <!--       <div class="center"> <button class="btn btn-primary" type="button" id="submit">确认修改</button></div>-->
         </div>
</body>
</html>
<script>

 //按钮点击事件
function modify(){
	 $('.text_info').attr("disabled", false);
	 $('.text_info').addClass("add");
	  $('#Personal').find('.xinxi').addClass("hover");
	  $('#Personal').find('.btn-success').css({'display':'block'});
	};
function save_info(){
	    var num=0;
		 var str="";
     $(".xinxi input[type$='text']").each(function(n){
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

			   layer.alert('修改成功！',{
               title: '提示框',
			   icon:1,
			  });
			  $('#Personal').find('.xinxi').removeClass("hover");
			  $('#Personal').find('.text_info').removeClass("add").attr("disabled", true);
			  $('#Personal').find('.btn-success').css({'display':'none'});
			   layer.close(index);

		  }
	};
 //初始化宽度、高度
    $(".admin_modify_style").height($(window).height());
	$(".recording_style").width($(window).width()-400);
    //当文档窗口发生改变时 触发
    $(window).resize(function(){
	$(".admin_modify_style").height($(window).height());
	$(".recording_style").width($(window).width()-400);
  });
  //修改密码
  function change_Password(){
	   layer.open({
    type: 1,
	title:'修改密码',
	area: ['300px','340px'],
	shadeClose: true,
	content: $('#change_Pass'),

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
	  }
</script>
<script>
jQuery(function($) {
		var oTable1 = $('#sample-table').dataTable( {
		"aaSorting": [[ 1, "desc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[0,2,3,4,5,6]}// 制定列不参与排序
		] } );


				$('table th input:checkbox').on('click' , function(){
					var that = this;
					$(this).closest('table').find('tr > td:first-child input:checkbox')
					.each(function(){
						this.checked = that.checked;
						$(this).closest('tr').toggleClass('selected');
					});

				});
});</script>
