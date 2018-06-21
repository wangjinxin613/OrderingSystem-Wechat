<?php
//判断是否登录成功
session_start();
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
	$result = mysql_query("SELECT * FROM taihao where id = '$id' ");
	while($row = mysql_fetch_array($result))
 	{ echo '
<div class="sort_style_add margin" id="sort_style_add" >
  <div class="">
     <ul>
     	<form action="action/taihao_update.php" method="POST">
      <input type="hidden" value="';echo $row['id']; echo '" name="id">
      <li><label class="label_name">台号名称</label><div class="col-sm-9"><input name="tai_name" type="text" id="form-field-1" placeholder="" class="col-xs-10 col-sm-5" value="';echo $row['tai_name']; echo '"></div></li>
       <li><label class="label_name">排列顺序</label><div class="col-sm-9"><input name="shunxu" type="text" id="form-field-1" placeholder="" class="col-xs-10 col-sm-5" value="';echo $row['shunxu']; echo '"></div></li>
         <li><label class="label_name">所属门店</label><div class="col-sm-9">
         <select style="width:220px;margin-left:10px;" name="fen_id">
          <option value="0">总店</option> 
          '; fendian_list('2',$row['fen_id']);echo '
         </select></div></li>
         <br><br>
      <div class="layui-layer-btn"><button type="submit" class="layui-layer-btn0" style="padding:6px 15px;">提交</button></div>
     </li>
 </form>
 ';
}?>
     </ul>
  </div>
</div>
</body>
