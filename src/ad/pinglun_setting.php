<?php
//判断是否登录成功

	 require('config/index_class.php');

	   if(check_dept('29') == false){
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
        <link rel="stylesheet" href="assets/css/font-awesome.min.css" />
        	<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->
        <!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->
		<script src="js/jquery-1.9.1.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/typeahead-bs2.min.js"></script>
        <script src="assets/layer/layer.js" type="text/javascript" ></script>
        <script src="assets/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
        <script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>
<title>系统设置</title>

</head>

<body>
<div class="margin clearfix">
 <div class="stystems_style">
  <div class="tabbable">


	  <?php
			error_reporting(0);
			session_start();

			include('config/conn.php');//用户名获取


		//if($id==null){
		//exit('<script>alert(\'参数传递有误！\');</script>');
			//	}
			mysql_select_db("my_db", $conn);
	$result = mysql_query("SELECT * FROM store_setting where store_id = {$user->store_id} ");
	while($row = mysql_fetch_array($result))
 	{
 		echo '<form action="action/pinglun_setting_action.php" method="post" enctype="multipart/form-data">
    <div class="tab-content">
		<div id="home" class="tab-pane active">

          <div class="form-group"><label class="col-sm-1 control-label no-padding-right" for="form-field-1"><i>*</i>评论功能： </label>
          <div class="col-sm-9" style="margin-left:10px;"><input name="pinglun" value="0" '; if($row['store_pinglun']==0){echo ' checked="checked"';} echo ' type="radio" checked="checked" class="ace col-xs-10"><span class="lbl">关闭</span>
          	<input  type="radio" name="pinglun" value="1" '; if($row['store_pinglun']==1){echo ' checked="checked"';} echo ' class="ace"><span class="lbl">开启</span></div>
          </div>
           <div class="form-group"><label class="col-sm-1 control-label no-padding-right" for="form-field-1"><i>*</i>关键词屏蔽：（用|隔开） </label>
          <div class="col-sm-9"><textarea name="store_pingbi" class="textarea" placeholder="关键词用|隔开">';echo $row['store_pingbi']; echo '</textarea></div>
          </div>
          <div class="Button_operation">
				<button onclick="article_save_submit();" class="btn btn-primary radius" type="submit"><i class="fa fa-save "></i>&nbsp;保存</button>

				<button onclick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>

			</div>
        </div>






</div></form>';
 }
    ?>
</body>
</html>
<script>
$('#id-input-file-2').ace_file_input({
					no_file:'选择上传图标 ...',
					btn_choose:'选择',
					btn_change:'更改',
					droppable:false,
					onchange:null,
					thumbnail:false, //| true | large
					whitelist:'gif|png|jpg|jpeg'
					//blacklist:'exe|php'
					//onchange:''
					//
				});
</script>
