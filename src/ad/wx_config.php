<?php
//判断是否登录成功

	 require('config/index_class.php');

	   if(check_dept('33') == false){
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

	<ul class="nav nav-tabs" id="myTab">
	  <li class="active">
		<a data-toggle="tab" href="#home"><i class="green fa fa-home bigger-110"></i>&nbsp;基本设置</a></li>

        <li class="">
		<a data-toggle="tab" data-toggle="dropdown" class="dropdown-toggle" href="#other">支付配置</a>
		  <li class="">
		<a data-toggle="tab" data-toggle="dropdown" class="dropdown-toggle" href="#otherss">消息模板设置</a>
      </li>
	</ul>
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
 		echo '<form action="action/wx_edit_action.php" method="post" enctype="multipart/form-data">
    <div class="tab-content">
		<div id="home" class="tab-pane active">
         <div class="form-group"><label class="col-sm-1 control-label no-padding-right" for="form-field-1"><i>*</i>appid： </label>
          <div class="col-sm-9"><input type="text" name="appid" id="website-title" value="';echo $row['appid']; echo '" class="col-xs-10 "></div>
          </div>
          <!--
           <div class="form-group"><label class="col-sm-1 control-label no-padding-right" for="form-field-1"><i>*</i>： </label>
          <div class="col-sm-9"><input type="file" id="id-input-file-2"  /></div>
          </div>-->
          <div class="form-group"><label class="col-sm-1 control-label no-padding-right" for="form-field-1"><i>*</i>appSecret： </label>
          <div class="col-sm-9"><input type="text" id="website-title" name="appsecret" value="'; echo $row['appsecret']; echo '" class="col-xs-10 "></div>
          </div>
	      <div class="form-group"><label class="col-sm-1 control-label no-padding-right" for="form-field-1"><i>*</i>公众号消息校验Token： </label>
          <div class="col-sm-9"><input type="text" id="website-title" name="store_phone" value="hello" class="col-xs-10" disabled="true"></div>
          </div>


           <div class="form-group"><label class="col-sm-1 control-label no-padding-right" for="form-field-1"><i>*</i>响应token URL： </label>
          <div class="col-sm-9"><input type="text" id="website-title" name="store_paking" value="';echo "{$_SERVER['HTTP_HOST']}/wxlogin/token.php"; echo '" class="col-xs-10"  disabled="true"></div>
          </div>
	 <div class="form-group"><label class="col-sm-1 control-label no-padding-right" for="form-field-1"><i>*</i>关注公众号二维码： </label>
          <div class="col-sm-9"><img src="';echo $row['wx_erweima']; echo '" style="wdith:100px;height:100px;"/>  <br><br> <input type="file" name="image" /></div>
         <br><br>
          <div class="Button_operation">
				<button onclick="article_save_submit();" class="btn btn-primary radius" type="submit"><i class="fa fa-save "></i>&nbsp;保存</button>

				<button onclick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>

			</div>
        </div>



</div><div id="other" class="tab-pane">

			 <div class="form-group"><label class="col-sm-1 control-label no-padding-right" for="form-field-1"><i>*</i>mchid(商户号)： </label>
          <div class="col-sm-9"><input type="text" name="mchid" id="website-title" value="';echo $row['mchid']; echo '" class="col-xs-10 "></div>
          </div>
		   <div class="form-group"><label class="col-sm-1 control-label no-padding-right" for="form-field-1"><i>*</i>key（密匙）： </label>
          <div class="col-sm-9"><input type="text" name="keys" id="website-title" value="';echo $row['mchid_key']; echo '" class="col-xs-10 "></div>
          </div>
          <div class="Button_operation">
				<button onclick="article_save_submit();" class="btn btn-primary radius" type="submit"><i class="fa fa-save "></i>&nbsp;保存</button>

				<button onclick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>

			</div>


 </div><div id="otherss" class="tab-pane">
 				<div class="form-group">** 请登录到微信公众平台，模板消息功能页面，从模板库选择下面输入框右侧的模板编号并添加到我的模板，最后设置模板id</div>
			 <div class="form-group"><label class="col-sm-1 control-label no-padding-right" for="form-field-1" style="width:150px;"><i>*</i>会员注册成功通知： </label>
          <div class="col-sm-9"><input type="text" name="tid1" id="website-title" value="';echo $row['tid1']; echo '" style="width:380px;">OPENTM205704221</div>
          </div>
		   <div class="form-group"><label class="col-sm-1 control-label no-padding-right" for="form-field-1"  style="width:150px;"><i>*</i>推荐会员注册成功提醒： </label>
          <div class="col-sm-9"><input type="text" name="tid2" id="website-title" value="'; echo $row['tid2']; echo '" style="width:380px;">OPENTM400034242</div>
          </div>
            <div class="form-group"><label class="col-sm-1 control-label no-padding-right" for="form-field-1"  style="width:150px;"><i>*</i>外卖下单成功提醒： </label>
          <div class="col-sm-9"><input type="text" name="tid3" id="website-title" value="'; echo $row['tid3']; echo '" style="width:380px;">OPENTM200781461</div>
          </div>
           <div class="form-group"><label class="col-sm-1 control-label no-padding-right" for="form-field-1"  style="width:150px;"><i>*</i>店内点餐提醒： </label>
          <div class="col-sm-9"><input type="text" name="tid4" id="website-title" value="'; echo $row['tid4']; echo '" style="width:380px;">OPENTM207582651</div>
          </div>
           <div class="form-group"><label class="col-sm-1 control-label no-padding-right" for="form-field-1"  style="width:150px;"><i>*</i>会员充值通知： </label>
          <div class="col-sm-9"><input type="text" name="tid5" id="website-title" value="'; echo $row['tid5']; echo '" style="width:380px;">OPENTM207111999</div>
          </div>
          <div class="form-group"><label class="col-sm-1 control-label no-padding-right" for="form-field-1"  style="width:150px;"><i>*</i>消费通知： </label>
          <div class="col-sm-9"><input type="text" name="tid6" id="website-title" value="'; echo $row['tid6']; echo '" style="width:380px;" >TM00052</div>
          </div>
          <div class="Button_operation">
				<button onclick="article_save_submit();" class="btn btn-primary radius" type="submit"><i class="fa fa-save "></i>&nbsp;保存</button>

				<button onclick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>

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
