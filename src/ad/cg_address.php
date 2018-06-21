<?
  require('config/index_class.php');
  if(check_dept('27') == false){
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
 <link href="css/style.css" rel="stylesheet" />
 <link href="css/cg.css" rel="stylesheet" />
</head>
<body>
<div class="or_all">
    <div class="or_head">
      收货地址
      <span onclick="history.back()" style="float:right">返回</span>
    </div>
      <?cg_address_list('1');?>


    <a href="cg_address_add.php">
    <div class="sh_box">
        <div class="sin_box" style="text-align:center">
          <p><img src="images/add.png" style="width:50px;margin-top:40PX;"></p>
          <p>添加收货地址</p>
      </div>
    </div>
  </a>
</div>
</body>
</html>
