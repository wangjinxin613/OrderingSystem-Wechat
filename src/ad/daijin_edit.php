<?php
require('config/index_class.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/style.css"/>
        <link href="assets/css/codemirror.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/ace.min.css" />
        <link rel="stylesheet" href="assets/css/font-awesome.min.css" />
		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->
        <!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->
			<script src="assets/js/jquery.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/typeahead-bs2.min.js"></script>
		<!-- page specific plugin scripts -->
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/jquery.dataTables.bootstrap.js"></script>
        <script type="text/javascript" src="js/H-ui.js"></script>
        <script type="text/javascript" src="js/H-ui.admin.js"></script>
        <script src="assets/layer/layer.js" type="text/javascript" ></script>
        <script src="assets/laydate/laydate.js" type="text/javascript"></script>
<title>用户列表</title>
</head>

<body>
	<div class="add_menber" id="add_menber_style" style="">
		<form action="action/daijin_update.php" method="post">
   <?php



			include('config/conn.php');//用户名获取

		$id=$_GET['id'];
		if($id==null){
		exit('<script>alert(\'参数传递有误！\');</script>');
		}

			mysql_select_db("my_db", $con);
	$result = mysql_query("SELECT * FROM daijin_list where id = '$id' ");
	while($v = mysql_fetch_array($result))
 	{
 		echo '
    <ul class=" page-content">
     <li><label class="label_name">面值：</label><span class="add_name">
		 <input type="text" value="';echo $v['id']; echo '" name="id" style="display:none;"/>
		 <input name="money" type="text" value="';echo $v['money']; echo '" class="text_add"/></span><div class="prompt r_f"></div></li>
    
    
     <li><label class="label_name">有效期：</label><span class="add_name"><input name="time" type="text" value="';echo $v['time']; echo '" class="text_add"/>天</span><div class="prompt r_f"></div></li>
     <li><label class="label_name">剩余数量：</label><span class="add_name"><input name="number1" type="text" value="';echo $v['number1']; echo '" class="text_add"/></span><div class="prompt r_f"></div></li>
     <li><label class="label_name">已兑换数量：</label><span class="add_name"><input name="number2" type="text" value="';echo $v['number2']; echo '" class="text_add"/></span><div class="prompt r_f"></div></li>
      <li><label class="label_name">兑换所需积分：</label><span class="add_name"><input name="points" type="text" value="';echo $v['points']; echo '" class="text_add"/></span><div class="prompt r_f"></div></li>
       
     <li class="adderss"><label class="label_name">描述：</label><span class="add_name"><textarea name="beizhu" style="width:500px;height:80px;">'; echo $v['beizhu']; echo '</textarea></span><div class="prompt r_f"></div></li>
    </ul>
 </div>';
}?>
 	<div style="clear:both;"></div>
 	<br><br><br><br>
 <div class="layui-layer-btn"><button class="layui-layer-btn0" type="submit" style="padding:7px 14px;">提交</button><a class="layui-layer-btn1">取消</a></div>
</body>
</html>
