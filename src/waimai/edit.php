<?php
	require ('../config/index_config.php');
	$id=$_GET['id'];
	if($id!=null){
	if(ctype_digit($id)== false){ //检测传递过来的参数必须是数字，防止被黑客攻击
			exit('<script>alert(\'参数传递有误！！\');</script>');
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>编辑收货地址</title>
		 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		 <link href="../styles/base.css" type="text/css" rel="stylesheet" />
		<link href="../css/amazeui.min.css" type="text/css" rel="stylesheet" />
		<link href="../css/style.css" type="text/css" rel="stylesheet" />
		<script src="../js/jquery.min.js" type="text/javascript"></script>
		<script src="../js/amazeui.min.js" type="text/javascript"></script>
			<link rel="stylesheet" href="css/LArea.css">
	</head>
	<body>
		<div class="head">
			<img src="../images/return.png" style="width:23px;float:left;margin-left:20px;" onClick="javascript:history.back(-1)"><span style=";">编辑收货地址</span><span style="width:40px;float:right;">&nbsp;</span>
		</div>
			<form action="edit_action.php" method="POST">
	    <div style="height: 49px;"></div>
	    <ul class="contact ">
				<input type="text" value="<?echo $id;?>" name="id" style="display:none;"/>
				<li><input type="text" name="sh_address2" value="<?sh_message($id,'1')?>" placeholder="请输入具体的地址" disabled="disabled"/></li>
	    	<li><input type="text" placeholder="请输入姓名" value="<?sh_message($id,'3');?>" name="sh_name"/></li>
	    	<li><input type="text" placeholder="请输入手机号" value="<?sh_message($id,'2');?>" name="sh_tel"/></li>
	    </ul>
	    <button class="paybtn" type="submit"> 确定修改</button>
		</form>
	</body>
	<script src="js/LAreaData1.js"></script>
	<script src="js/LAreaData2.js"></script>
	<script src="js/LArea.js"></script>
	<script>
	var area1 = new LArea();
	area1.init({
			'trigger': '#demo1', //触发选择控件的文本框，同时选择完毕后name属性输出到该位置
			'valueTo': '#value1', //选择完毕后id属性输出到该位置
			'keys': {
					id: 'id',
					name: 'name'
			}, //绑定数据源相关字段 id对应valueTo的value属性输出 name对应trigger的value属性输出
			'type': 1, //数据源类型
			'data': LAreaData //数据源
	});
	area1.value=[1,6,3];//控制初始位置，注意：该方法并不会影响到input的value

	</script>
</html>
