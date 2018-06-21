<?
  require('config/index_class.php');
  $pid = $_POST['pid'];
  $number = $_POST['number'];
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
      确认订单
        <span onclick="history.back()" style="float:right">返回</span>
    </div>
    <form action="zo/order_action.php" method="post">
    <div class="or_sh">
      <?cg_address_list('2')?>
      <input type="text" class="input1" value="点击添加收货地址" onclick="window.location.href='cg_address.php'"/>
      <div class="or_sh1">&nbsp;</div>
    </div>
    <div class="or_ps">
      <!--
      <p class="p1">配送方式</p>
      <p class="p2"><span class="active">申通快递</span><span>顺丰快递</span></p>-->
      <p class="p1" style="margin-top:10px;">支付方式</p>
      <p class="p2"><span class="paytype-logo" id="type1" onclick="change(1);">微信支付</span><span  class="paytype-logo" id="type2" onclick="change(2);">支付宝支付</span></p>
      <p class="p1" style="margin-top:10px;">订单详情</p>
    </div>
    <div class="or_de">
      <?php
      $sql="select * from zo_product where pid = '$pid' ";//查询语句
      $res=mysql_query($sql);//执行查询w
      while($row=mysql_fetch_assoc($res)){
          $rows[]=$row;//接受结果集
      }
      //遍历数组
      foreach($rows as $key=>$v){
        echo '
        <div class="de_single">
          <img src="';echo $v['products_img']; echo '">
        </div>
          <div class="de_right">
            <p class="p1">'; echo $v['products_name']; echo '</p>
            <p class="p2">￥ '; echo $v['products_price']; echo ' <span>数量：';echo $number; echo '件</span></p>
        </div>
        <input type="text" value="';echo $v['pid']; echo '" name="pid" style="display:none;"/>
        <input type="text" value="';echo $number; echo '" name="number" style="display:none;"/>
        <input type="text" value="';echo $v['products_price']; echo '" name="money" style="display:none;"/>
        ';
      $all = $v['products_price']*$number;}?>
        <div style="clear:both;"></div>
    </div>
    <input type="text" name="paytype" id="pay" value="1" style="display:none;"/>
      <div class="or_ps">
          <p class="p1" style="margin-top:10px;">备注信息</p>
          <textarea placeholder="客观，您还有什么要交代的写在这里哦！" class="beizhu" name="beizhu"></textarea>
          <p class="p3">商品金额：<span>￥<?echo $all;?></span></p>

      </div>

      <div style="clear:both"></div>
      <div class="btn">
          <p><span style="margin-right:30px;">合计：￥<? echo $all;?></span><input type="submit" class="s1" value="提交订单" /></p>
      </div>
</div>
</form>
<script>
function change(obj){
  var a = obj;
  if(a==1){
  var b = 2;
  document.getElementById('pay').value="1";
}if(a==2){
  var b = 1;

  document.getElementById('pay').value="2";
}
document.getElementById('type'+a).className = 'paytype-logo active';
document.getElementById('type'+b).className = 'paytype-logo ';

}
</script>
</body>
</html>
