<?
  require('../config/index_class.php');
  $pid = $_GET['id'];
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,height=device-height, user-scalable=no,initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>商品详情</title>
    <link rel="stylesheet" href="css/spxq1.css"/>
    <link href="../../styles/base.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/swipe.css">
   	<script type="text/javascript" src="js/touch.js"></script>
</head>
<body>
<div class="body">
  <div class="head">
    <a href="cg_shoplist.php"><img src="../../images/return.png" style="width:23px;float:left;margin-left:20px;" ></a><span style=";">商品详情</span><span style="width:40px;float:right;">&nbsp;</span>
  </div>
   <div style="height: 49px;"></div>
    <?php
    $sql="select * from zo_product where pid = '$pid' ";//查询语句
    $res=mysql_query($sql);//执行查询w
    while($row=mysql_fetch_assoc($res)){
        $rows[]=$row;//接受结果集
    }
    //遍历数组
    foreach($rows as $key=>$v){
    echo '<figure>
        <div class="addWrap">
            <div class="swipe" id="mySwipe">
                <div class="swipe-wrap" style="width:100%;">
                    <div><a href="javascript:;"><img class="img-responsive" src="../';echo $v['products_img']; echo '" style="width:600px"/></a></div>
                    <div><a href="javascript:;"><img class="img-responsive" src="../';echo $v['products_img']; echo '"  style="width:600px"/></a></div>
                    <div><a href="javascript:;"><img class="img-responsive" src="../';echo $v['products_img']; echo '" style="width:600px"/></a></div>
                </div>
            </div>
            <ul id="position">
                <li class="cur"></li>
                <li class=""></li>
                <li class=""></li>
            </ul>
        </div>
        <!-- 轮播 -->

        <p>';echo $v['products_name']; echo '</p>
        <div class="info">
        <em class="sat">￥';echo $v['products_price']; echo '</em>
        <form action="cg_order.php?pid=';echo $v['pid']; echo '" method="post">
        <input type="text" value="';echo $v['pid']; echo '" name="pid" style="display:none;"/>

            <a style="margin-top:-35PX;"><button type="submit" class="btn">立即购买</button></a>

        </form>
        </div>
    </figure>
    <hr/>
    <div class="sjxx">
        <p class="pclass1">图文详情</p>
    </div>
    <hr/>
    <div class="sjxx p_body">
      '; echo $v['p_body']; echo '
    </div>
     ';}?>
    <div class="wx_nav" id="wx_nav">
        <a href="javascript:;" class="nav_index" id="nav_index">首页</a>
        <a href="javascript:;" class="nav_shopcart" id="nav_shopcart">购物车</a>
        <a href="javascript:;" class="nav_me on" id="nav_me on">订单</a>
    </div>
    </div>
</body>
<script src="js/swipe.js"></script>
<script type="text/javascript">
    var bullets = document.getElementById('position').getElementsByTagName('li');
    var banner = Swipe(document.getElementById('mySwipe'), {
        auto: 3000,
        continuous: true,
        disableScroll:false,
        callback: function(pos) {
            var i = bullets.length;
            while (i--) {
                bullets[i].className = ' ';
            }
            bullets[pos].className = 'cur';
        }
    });
</script>
</html>
