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
      添加收货地址
        <span onclick="window.location.href='cg_address.php'" style="float:right">返回</span>
    </div>
    <form action="zo/address_add.php" method="post">
    <div class="ad_biao">
        <p>姓名 <input type="text" placeholder="请填写收货人" name="sh_name"/></p>
        <p>电话 <input type="text" placeholder="请填写您的电话号码" name="sh_tel"/></p>
        <p>城市 <input type="text" placeholder="请填写城市" name="sh_city"/></p>
        <p>地址 <input type="text" placeholder="请填写详细地址" name="sh_address"/></p>
        <p style="margin-left:50px;"> <input type="submit" value="确认添加" class="ad_btn"/></p>
    </div>
  </form>
</div>
</body>
</html>
