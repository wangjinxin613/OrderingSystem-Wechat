<?php
//判断是否登录成功
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
        <link href="assets/css/codemirror.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/ace.min.css" />
        <link rel="stylesheet" href="font/css/font-awesome.min.css" />
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
<title>编辑分类</title>
</head>

<body>
	<!--添加分类-->
 <?php
			error_reporting(0);
			session_start();

			include('config/conn.php');//用户名获取

		$id=$_GET['id'];
		if($id==null){
		exit('<script>alert(\'参数传递有误！\');</script>');
		}
			mysql_select_db("my_db", $conn);
	$result = mysql_query("SELECT * FROM zo_product_sort where id = '$id' ");
	while($row = mysql_fetch_array($result))
 	{ echo '
<div class="sort_style_add margin" id="sort_style_add" >
  <div class="">
     <ul>
     	<form action="zo/sort_edit_action.php?id='; echo $id; echo '" method="POST">
      <li><label class="label_name">分类名称</label><div class="col-sm-9"><input name="sort_name" type="text" id="form-field-1" placeholder="" class="col-xs-10 col-sm-5" value="';echo $row['sort_name']; echo '"></div></li>
       <li><label class="label_name">排列顺序</label><div class="col-sm-9"><input name="sort_sx" type="text" id="form-field-1" placeholder="" class="col-xs-10 col-sm-5" value="';echo $row['sort_sx']; echo '"></div></li>
      <li><label class="label_name">分类说明</label><div class="col-sm-9"><textarea name="sort_body" class="form-control" id="form-field-8" placeholder="" onkeyup="checkLength(this);">';echo $row['sort_body']; echo '</textarea><span class="wordage">剩余字数：<span id="sy" style="color:Red;">200</span>字</span></div></li>
      <div class="layui-layer-btn"><button type="submit" class="layui-layer-btn0" style="padding:6px 15px;">提交</button><a >取消</a></div>
     </li>
 </form>
 ';
}?>
     </ul>
  </div>
</div>
</body>
