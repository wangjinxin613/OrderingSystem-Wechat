<?
  require('config/index_class.php');
  $pid = $_GET['pid'];
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
  <?php
  $sql="select * from zo_product where pid = '$pid' ";//查询语句
  $res=mysql_query($sql);//执行查询w
  while($row=mysql_fetch_assoc($res)){
      $rows[]=$row;//接受结果集
  }
  //遍历数组
  foreach($rows as $key=>$v){
    echo '
    <form action="cg_order.php" method="POST">
    <div class="de_head">
      <div class="fr_left">
        <img src="';echo $v['products_img']; echo '" style="width:260px;height:250px;"/>
      </div>
      <div class="fr_right">
        <form action="cg_order.php">
        <p class="p1">';echo $v['products_name']; echo '</p>
        <p class="p2">';echo $v['cbt']; echo '</p>
        <p class="p3">￥ ';echo $v['products_price']; echo ' <span style="margin-left:20px;font-size:14px;color:#666666;">已售：';echo $v['products_num2']; echo '</span><span class="s1">库存<span style="color:#ea0b77;">'; echo $v['products_num1'];echo '</span>件</span></p>
        <div class="bor"></div>
        <p class="p4">数量：</p>

        <p><div class="p5" style="display:block">
          <div class="show1" onclick="jian()">-</div>
          <input type="text" value="1" class="num" id="num" disabled="true"/>
          <div class="show2"  onclick="add()">+</div>
      </div></p>
      <input type="text" value="';echo $v['pid']; echo '" name="pid"/ style="display:none">
      <input type="text" value="1" id="number" name="number" style="display:none"/>
      <p class="ljgm"><button type="submit">立即购买</button></p>
    </form>
    </div>
    <div style="clear:both;"></div>
    <div class="de_next">
      <div class="de_bor">
        图文详情
      </div>
      <div class="bo" >
        <p style=" white-space:pre">';echo $v['p_body'];echo '</p>
      </div>
    </div></form>';
  }?>
</body>
<script>
    function add(){
      var num = document.getElementById('num').value;
      num++;
       document.getElementById('num').value = num;
       document.getElementById('number').value = num;

    }
    function jian(){
      var num = document.getElementById('num').value;
      if(num>1){
      num--;
    }
       document.getElementById('num').value = num;
       document.getElementById('number').value = num;

    }
</script>
</html>
