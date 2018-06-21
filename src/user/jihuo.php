<?
	require('../config/index_config.php');
	if($user->blog==1){
		exit('<script>alert(\'您已完成了绑定！\');history.back();</script>');	
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>激活会员卡</title>
		 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link href="../styles/extend/user/jihuo.css" type="text/css" rel="stylesheet" />
		
		<link href="../styles/base.css" type="text/css" rel="stylesheet" />
		  <script src="../js/jquery-1.8.3.min.js"></script>
	</head>
	<body>
	<div class="head">
			<img src="../images/return.png" style="width:23px;float:left;margin-left:20px;" onClick="javascript:history.back(-1)"><span style=";">激活会员卡</span><span style="width:40px;float:right;">&nbsp;</span>
		</div>
			<div style="padding-bottom:48px;"></div>
		<div class="jh-head">
			<p>请认真填写以下信息</p>
		</div>
		<div class="jh-body">
			<form action="jihuo_action.php" method="POST">
			
			<p>手机号<input type="text" placeholder="请输入手机号" id="phone" name="tel" value="<? echo $user->tel;?>" class="inp2" required/></p>
			<p ><input type="text" placeholder="请输入验证码" name="code" required/><a style="font-size:13px;border-left:1px solid #eeeeee;padding-left:10px;margin-left:-15px;" id="btnn" class="code">获取验证码</a></p>
			<p>姓名<input type="text" placeholder="请输入姓名" class="inp1" name="real_name" value="<? echo $user->real_name;?>" required/></p>	
			<p>生日<input type="date" value="请输入您的出生日期" class="inp1" name="birthday" style="background:#ffffff;" value="<?echo $user->birthday;?>" /></p>
			<!--<p>车牌号<input type="text" placeholder="请输入车牌号" class="inp2" name="car" value="<?echo $user->car;?>" required/></p>-->
			<p>地址<input type="text" placeholder="请输入地址" class="inp1" name="address" value="<? echo $user->address;?>" required/></p>
		
		</div>
		<div class="jh-btn">
			<input type="submit" value="确认提交"  class="jh-bt"/>
		</div>
		</form>
	</body>
	 <script type="text/javascript">
    

  </script>
   <script type="text/javascript">
   $(function(){
     $('.code').on('click', function () {
        if(/^1\d{10}$/.test($.trim($('#phone').val()))) {
 			var tel = $('#phone').val();
           $.ajax({
                type: 'POST', 
       			url: 'send.php', 
       			dataType: 'text', 
       		 	cache: false, 
        		data:{tel:tel},
                success: function(data){
                	
                },
                error: function(data){
                    
                }
            });
           
            var sec = 60;
            $('.code').text(sec + "s后重新获取");
            var timer = setInterval(function(){
                sec--;
                $('.code').text(sec + "s后重新获取");
                if(sec == 0){
                    clearInterval(timer);
                    $('.code').html('重新获取短信');
                }
            },1000);
        }else{
           alert('请填写正确的手机号');
        }
    });

});
    </script>
</html>	
