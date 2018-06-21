<?php
	require ('../config/index_class.php');
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
		<link href="../../css/amazeui.min.css" type="text/css" rel="stylesheet" />
		<link href="../../css/style.css" type="text/css" rel="stylesheet" />
		<script src="../../js/jquery.min.js" type="text/javascript"></script>
		<script src="../../js/amazeui.min.js" type="text/javascript"></script>
			<link rel="stylesheet" href="css/LArea.css">
	</head>
	<body>
		<header data-am-widget="header" class="am-header am-header-default sq-head ">
			<div class="am-header-left am-header-nav">
				<a href="javascript:history.back()" class="" style="border: 0;">
					<i class="am-icon-chevron-left"></i>
				</a>
			</div>
	</div>
	<h1 class="am-header-title">
						<a href="" class="" style="color: #333;">编辑收货地址</a>
				</h1>
	    </header>
			<form action="action/edit_action.php" method="POST">
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
