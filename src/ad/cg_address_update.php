<?
  require('config/index_class.php');
  $id = $_GET['id'];
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
      修改收货地址
        <span onclick="window.location.href='cg_address.php'" style="float:right">返回</span>
    </div>
    <form action="zo/address_update.php" method="post">
    <div class="ad_biao">
      <?php
      $sql="select * from zo_address where id = '$id'";//查询语句

      $res=mysql_query($sql);//执行查询w
      while($row=mysql_fetch_assoc($res)){
          $rows[]=$row;//接受结果集
      }
      //遍历数组
      foreach($rows as $key=>$v){
        echo '
        <input type="text" value="';echo $v['id']; echo '" name="id" style="display:none;"/>
        <p>姓名 <input type="text" placeholder="请填写收货人" value="';echo $v['sh_name']; echo '" name="sh_name"/></p>
        <p>电话 <input type="text" placeholder="请填写您的电话号码" value="';echo $v['sh_tel']; echo '" name="sh_tel"/></p>
        <p>城市 <input type="text" placeholder="请填写城市" value="';echo $v['sh_city']; echo '" name="sh_city"/></p>
        <p>地址 <input type="text" placeholder="请填写详细地址" value="';echo $v['sh_address']; echo '" name="sh_address"/></p>
        ';
      }?>
        <p style="margin-left:50px;"> <input type="submit" value="确认修改" class="ad_btn"/></p>
    </div>
  </form>
</div>
</body>
</html>
