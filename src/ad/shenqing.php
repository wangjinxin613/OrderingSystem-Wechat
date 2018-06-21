<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="assets/css/font-awesome.min.css" />
		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="assets/css/ace.min.css" />

	
        <link rel="stylesheet" href="css/style.css"/>
        <link rel="stylesheet" href="css/shenqing.css"/>
		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->
		<script src="assets/js/ace-extra.min.js"></script>
		<!--[if lt IE 9]>
		<script src="assets/js/html5shiv.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
		
<title>登陆</title>
</head>

<body class="login-layout Reg_log_style" style="height:auto;overflow:auto;">
<div class="logintop">    
    <span>欢迎使用女神阁会员卡系统</span> 
    <span style="float:right;margin-right:60PX;"><a href="login.html" style="color:#afc5d2;">已有账号，点击登录</a></span>   
    <ul>
  <!--  <li><a href="#">返回首页</a></li>
    <li><a href="#">帮助</a></li>
    <li><a href="#">关于</a></li>-->
    </ul>    
    </div>
   	<div class="sq_box">
   		<h2>免费申请体验产品</h2>
   		<div class="sq_label">
   			<form action="zo/shenqing_action.php" method="post">
   			<label>
   				真实姓名<input type="text" placeholder="请输入您的真实姓名" class="inp" name="admin_truename" style="border-radius:10px;" required>
   			</label>
   			<label>
   				商家账号<input type="text" placeholder="请输入您的商家账号，用于登录商家后台" name="admin_name" class="inp" style="border-radius:10px;" required>
   			</label>
   			<label>
   				登录密码<input type="password" placeholder="请输入密码，6位及以上" class="inp" name="admin_password" style="border-radius:10px;" required>
   			</label>
   			<label>
   				餐厅名称<input type="text" placeholder="最多20个字" class="inp" name="store_name" style="border-radius:10px;" required>
   			</label>
   			<label>
   				餐厅电话<input type="text" placeholder="请输入手机号码或者固定电话" name="store_phone" class="inp" style="border-radius:10px;" required>
   			</label>
   			<label>
   				门店地址<input type="text" placeholder="请输入门店的详细地址" class="inp" name="store_place" style="border-radius:10px;" required>
   			</label><br>
   			<label>
   			<button class="shen">立即申请</button>
   			</label>
   		</form>
   		</div>
   	</div>
   



     <div class="loginbm" style="position:relative;margin-top:50px;">版权所有  2016  <a href=""> 女神阁会员卡系统</a> </div><strong></strong>
</body>
</html>
<script>
$('#login_btn').on('click', function(){
	     var num=0;
		 var str="";
     $("input[type$='text'],input[type$='password']").each(function(n){
          if($(this).val()=="")
          {
               
			   layer.alert(str+=""+"表单内容"+"不能为空！\r\n",{
                title: '提示框',				
				icon:0,								
          }); 
		    num++;
            return false;            
          } 
		 });
		  if(num>0){  return false;}	 	
        /*  else{
			 layer.alert('登陆成功！',{
               title: '提示框',				
			   icon:1,		
			  });
	          location.href="index.html";
			   layer.close(index);	
		  }		  		     						
		*/
	});

  $(document).ready(function(){
	 $("input[type='text'],input[type='password']").blur(function(){
        var $el = $(this);
        var $parent = $el.parent();
        $parent.attr('class','frame_style').removeClass(' form_error');
        if($el.val()==''){
            $parent.attr('class','frame_style').addClass(' form_error');
        }
    });
	$("input[type='text'],input[type='password']").focus(function(){		
		var $el = $(this);
        var $parent = $el.parent();
        $parent.attr('class','frame_style').removeClass(' form_errors');
        if($el.val()==''){
            $parent.attr('class','frame_style').addClass(' form_errors');
        } else{
			 $parent.attr('class','frame_style').removeClass(' form_errors');
		}
		});
	  })

</script>