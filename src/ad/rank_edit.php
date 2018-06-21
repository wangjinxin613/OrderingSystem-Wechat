<?php
//判断是否登录成功
require('config/index_class.php');
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
	$result = mysql_query("SELECT * FROM member_rank where rank_id = '$id' ");
	while($row = mysql_fetch_array($result))
 	{ echo '
<div class="sort_style_add margin" id="sort_style_add" >
  <div class="">
     <ul>
     	<form action="action/rank_edit_action.php" method="POST">
      <br><BR>
      <li><label class="label_name">ID</label><div class="col-sm-9"><input  type="text" id="form-field-1" placeholder="" class="col-xs-10 col-sm-5" value="';echo $row['rank_id']; echo '" disabled="disabled"/></div></li>
      <input type="text" name="rank_id" value="';echo $row['rank_id']; echo '" style="display:none;"/>
      <li><label class="label_name">等级名称</label><div class="col-sm-9"><input type="text" name="rank_name" id="form-field-1" placeholder="" class="col-xs-10 col-sm-5" value="';echo $row['rank_name']; echo '"></div></li>
       <li><label class="label_name">备注</label><div class="col-sm-9"><input type="text" name="rank_beizhu" id="form-field-1" placeholder="" class="col-xs-10 col-sm-5" value="';echo $row['rank_beizhu']; echo '"></div></li>
      <li><label class="label_name">已消费金额下限</label><div class="col-sm-9"><input type="text" name="rank_dept" id="form-field-1" placeholder="" class="col-xs-10 col-sm-5" value="';echo $row['rank_dept']; echo '"></div></li>
      <li><label class="label_name">享受折扣</label><div class="col-sm-9"><input type="text" name="rank_zhe" id="form-field-1" placeholder="" class="col-xs-10 col-sm-5" value="';echo $row['rank_zhe']; echo '"></div></li>
      <BR><BR>
      <div class="layui-layer-btn"><button type="submit" class="layui-layer-btn0" style="padding:6px 15px;">提交</button><a >取消</a></div>
     </li>
 </form>
 ';
}?>
     </ul>
  </div>
</div>
</body>
