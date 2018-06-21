<?
  require('../config/index_class.php');
  $sid = $_GET['sid'];
  if($sid!=null){
  if(ctype_digit($sid)== false){ //检测传递过来的参数必须是数字，防止被黑客攻击
      exit('<script>alert(\'参数传递有误！！\');history.back();</script>');
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,height=device-height, user-scalable=no,initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>商铺首页</title>
    <link rel="stylesheet" href="css/style1.css"/>
    <link rel="stylesheet" href="css/Up.css">
    <script type="text/javascript" src="js/jquery-1.12.1.js"></script>
    <script type="text/javascript" src="js/touch.js"></script>
    <script type="text/javascript" src="js/srcolltop.js"></script>
    <script type="text/javascript" src="js/timer.js"></script>
    <script type="text/javascript" src="js/xlmenu.js"></script>
    <script>
        $(function () {
            $("figure:eq(0)").css({
                border:'none'
            });
            $("figure:eq(1)").css({
                border:'none'
            });
                var titleName=$(".ycmenu a");
                for(var i =0;i<titleName.length;i++){
                titleName[i].id=i;
                titleName[i].onmouseover=function(){
                for(var j =0;j<titleName.length;j++){
                titleName[j].className="";
            }
                this.className = "a";
            }}
        })
    </script>
</head>
<body>

<div class="container">
    <div class="allLogo">
        <div class="logo"><img src="img/u16.png" alt="logo"/></div>
        <div class="head"><a href="javascript:;"><img src="img/u61.png" alt="头像"/></a></div>
        <div class="headInfo"><a href="#">采购商城</a></div>
    </div>


    <div class="store">
        <ul>
            <li class="li1"><a href="#">商品</a></li>
            <li class="li2"><a href="javascript:;" class="xlmenu">全部&nbsp;<img src="img/donw.png" style="width: 12px;display: inline"></a>&nbsp;共<span style="color: #e4393c;font-size: 1.8rem"><?tj(zo_product);?></span>件</li>
        </ul>
        <div class="ycmenu">
            <ul>

                <li><a href="?id=0" class="a">全部商品</a></li>
                  <?php cg_shop_sort('1');?>

            </ul>
        </div>
    </div>
    <div class="clear"></div>
    <div class="border">

    </div>
    <div class="allsp">
      <?php cg_shoplist($sid,'1');?>
      
        <div class="clear"></div>
    </div>
    <div class="wx_nav" id="wx_nav">
       <a href="cg_shoplist.php" class="nav_index" id="nav_index">首页</a>
       
        <a href="my_shoplist.php" class="nav_me " id="nav_index ">我的订单</a>
         <a href="index.php" class="nav_fav" id="nav_fav">返回主菜单</a>
    </div>
    </div>
<footer>
    <div class="footer">
        <p>没有更多了</p>
    </div>
</footer>
<div class="actGotop"><a href="javascript:;" title="返回顶部"></a> <img src="img/fanhui.png" alt=""></div>
<div class="theme-popover-mask"></div>
</body>
</html>
