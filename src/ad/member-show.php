<?php
require('config/index_class.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
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
            <title>用户查看</title>
</head>
<body>
	 <?php
			error_reporting(0);
			session_start();

			include('config/conn.php');//用户名获取

		$id=$_GET['id'];
		if($id==null){
		exit('<script>alert(\'参数传递有误！\');</script>');
		}
			mysql_select_db("my_db", $conn);
	$result = mysql_query("SELECT * FROM member where account_id = '$id' ");
	while($row = mysql_fetch_array($result))
 	{
 		echo '
<div class="member_show" >

<div class="member_jbxx clearfix" >
  <img class="img" src="';echo $row['wx_headImg']; echo '">
  <dl  class="right_xxln">
  <dt><span class="">';echo $row['wx_nickname']; echo '</span> <span class="">积分：';echo $row['points']; echo '</span></dt>
  <dd class="" style="margin-left:0">这家伙很懒，什么也没有留下</dd>
  </dl>
</div>
<div class="member_content">
  <ul>
   <li><label class="label_name">性别：</label><span class="name">';if($row['wx_sex']==1){echo '男';}if($row['wx_sex']==2){echo '女';}echo '</span></li>
   <li><label class="label_name">手机：</label><span class="name">';echo  $row['tel']; echo '</span></li>
   <li><label class="label_name">地址：</label><span class="name">';echo $row['address']; echo '</span></li>
   <li><label class="label_name">真实姓名：</label><span class="name">';echo $row['real_name']; echo '</span></li>

   <li><label class="label_name">注册时间：</label><span class="name">'; echo $row['create_date'];echo '</span></li>
   <li><label class="label_name">上级用户：</label><span class="name">';get_sname($row['up_id']); echo '</span></li>
   <li><label class="label_name">下级用户：</label><span class="name">';get_ximg($row['account_id']); echo '</span></li>
   <li><label class="label_name">等级：</label><span class="name">';rank_ec($row['cardtype']); echo '</span></li>

  </ul>
</div>
</div>';
}?>
</body>
</html>
<script>
function member_show(title,url,id,w,h){
	layer_show(title,url+'#?='+id,w,h);
}
</script>
