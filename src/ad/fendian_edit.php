<?php
//判断是否登录成功

	 require('config/index_class.php');

	   if(check_dept('24') == false){
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
		<a data-toggle="tab" data-toggle="dropdown" class="dropdown-toggle" href="#other">公告管理</a>
		 <li class="">
		<a data-toggle="tab" data-toggle="dropdown" class="dropdown-toggle" href="#ottt">门店头像</a>
      </li>
	</ul>
	  <?php
			error_reporting(0);
			session_start();

			include('config/conn.php');//用户名获取


		//if($id==null){
		//exit('<script>alert(\'参数传递有误！\');</script>');
			//	}
		$id = $_GET['id'];
			mysql_select_db("my_db", $conn);
	$result = mysql_query("SELECT * FROM fendian where id = $id");
	while($row = mysql_fetch_array($result))
 	{
 		echo '<form action="action/fendian_edit_action.php" method="post" enctype="multipart/form-data">
    <div class="tab-content">
		<div id="home" class="tab-pane active">
		<p style="padding-bottom:15px;">[备注]：填写地址坐标请访问 <a href="http://lbs.qq.com/tool/getpoint/">http://lbs.qq.com/tool/getpoint/</a> 获取</p>
         <div class="form-group"><label class="col-sm-1 control-label no-padding-right" for="form-field-1"><i>*</i>门店名称： </label>
         <input type="text" value="';echo $row['id']; echo '" name="id" style="display:none;"/>
          <div class="col-sm-9"><input type="text" name="store_name" id="website-title" value="';echo $row['fen_name']; echo '" class="col-xs-10 "></div>
          </div>
          <!--
           <div class="form-group"><label class="col-sm-1 control-label no-padding-right" for="form-field-1"><i>*</i>： </label>
          <div class="col-sm-9"><input type="file" id="id-input-file-2"  /></div>
          </div>-->
          <div class="form-group"><label class="col-sm-1 control-label no-padding-right" for="form-field-1"><i>*</i>地址坐标： </label>
          <div class="col-sm-9"><input type="text" id="website-title" name="zuobiao" value="'; echo $row['zuobiao']; echo '" class="col-xs-10 "><a href="http://lbs.qq.com/tool/getpoint/">获取地址坐标</a></div>
          </div>

					<div class="form-group"><label class="col-sm-1 control-label no-padding-right" for="form-field-1"><i>*</i>门店地址： </label>
					<div class="col-sm-9"><input type="text" id="website-title" name="store_place" value="'; echo $row['fen_place']; echo '" class="col-xs-10 "></div>
					</div>
	      <div class="form-group"><label class="col-sm-1 control-label no-padding-right" for="form-field-1"><i>*</i>联系电话： </label>
          <div class="col-sm-9"><input type="text" id="website-title" name="store_phone" value="';echo $row['fen_phone']; echo '" class="col-xs-10"></div>
          </div>
          <div class="form-group"><label class="col-sm-1 control-label no-padding-right" for="form-field-1"><i>*</i>门店价格： </label>
          <div class="col-sm-9"><input type="text" id="website-title" name="store_price" value="'; echo $row['fen_price']; echo '" class="col-xs-10"></div>
          </div>
            <div class="form-group"><label class="col-sm-1 control-label no-padding-right" for="form-field-1"><i>*</i>wifi支持： </label>
          <div class="col-sm-9" style="margin-left:10px;"><input name="store_wifi" type="radio" value="0" '; if($row['fen_wifi']==0){echo ' checked="checked"';} echo 'class="ace col-xs-10"><span class="lbl">不支持</span>
          	<input  name="store_wifi" type="radio" value="1" class="ace" '; if($row['fen_wifi']==1){echo ' checked="checked"';} echo '><span class="lbl">支持</span></div>
          </div>
           <div class="form-group"><label class="col-sm-1 control-label no-padding-right" for="form-field-1"><i>*</i>停车位数量： </label>
          <div class="col-sm-9"><input type="text" id="website-title" name="store_paking" value="';echo $row['fen_paking']; echo '" class="col-xs-10"></div>
          </div>
          <div class="form-group"><label class="col-sm-1 control-label no-padding-right" for="form-field-1"><i>*</i>门店营业时间： </label>
          <div class="col-sm-9"><input type="text" id="website-title" name="store_showtime" value="'; echo $row['fen_showtime'];echo '" class="col-xs-10 "></div>
          </div>
          <div class="form-group"><label class="col-sm-1 control-label no-padding-right" for="form-field-1"><i>*</i>评论功能： </label>
          <div class="col-sm-9" style="margin-left:10px;"><input name="pinglun" value="0" '; if($row['fen_pinglun']==0){echo ' checked="checked"';} echo ' type="radio" checked="checked" class="ace col-xs-10"><span class="lbl">关闭</span>
          	<input  type="radio" name="pinglun" value="1" '; if($row['fen_pinglun']==1){echo ' checked="checked"';} echo ' class="ace"><span class="lbl">开启</span></div>
          </div>
           <div class="form-group"><label class="col-sm-1 control-label no-padding-right" for="form-field-1"><i>*</i>门店描述： </label>
          <div class="col-sm-9"><textarea name="beizhu" class="textarea">';echo $row['fen_beizhu']; echo '</textarea></div>
          </div>
          <div class="Button_operation">
				<button onclick="article_save_submit();" class="btn btn-primary radius" type="submit"><i class="fa fa-save "></i>&nbsp;保存</button>

				<button onclick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>

			</div>
        </div>


		<div id="other" class="tab-pane">

			 <div class="form-group"><label class="col-sm-1 control-label no-padding-right" for="form-field-1"><i>*</i>公告标题： </label>
          <div class="col-sm-9"><input type="text" name="gg_title" id="website-title" value="';echo $row['fen_gg_title']; echo '" class="col-xs-10 "></div>
          </div>
		   <div class="form-group"><label class="col-sm-1 control-label no-padding-right" for="form-field-1"><i>*</i>公告内容： </label>
          <div class="col-sm-9"><textarea class="textarea" name="gg_body">'; echo $row['fen_gg_body']; echo '</textarea></div>
          </div>
          <div class="Button_operation">
				<button onclick="article_save_submit();" class="btn btn-primary radius" type="submit"><i class="fa fa-save "></i>&nbsp;保存</button>

				<button onclick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>

			</div>


 </div>
 <div id="ottt" class="tab-pane">

			 <div class="form-group"><label class="col-sm-1 control-label no-padding-right" for="form-field-1"><i>*</i>当前头像： </label>
          <div class="col-sm-9"><img src="';echo $row['fen_img']; echo '" style="wdith:100px;height:100px;"/>  <br><br> <input type="file" name="image" /></div>
         <br><br>
           <br><br>
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
