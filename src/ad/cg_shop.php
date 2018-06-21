<?
 require('config/index_class.php');
 $sid = $_GET['sid']; //分类id
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
    <div class="nav">
      <ul>
        <a href="?sid=0"><li style="margin-left:50px;">全部</li></a>
      <?cg_shop_sort();?>

        <div style="clear:both;"></div>
      </ul>
    </div>
    <div class="detail" >
      <!--<div class="single">
        <img src="images/shop.jpg">
        <p class="p1" style=";">大米打打上岛咖啡加快速度积分</p>
        <p><del>￥ 18.00</del><span>￥ 28.00</span></p>
      </div>
      <a href="cg_detail.php">
      <div class="single">
        <img src="images/shop.jpg">
        <p class="p1">大米打打</p>
        <p><del>￥ 18.00</del><span>￥ 28.00</span></p>
      </div>
    </a>-->
      <?cg_shoplist($sid);?>

    </div>
</body>
</html>
