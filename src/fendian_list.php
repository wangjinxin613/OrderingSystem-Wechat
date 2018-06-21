<?
  require('config/conn.php');
  require('config/index_config.php');
  	error_reporting(0);
  $name = $_GET['name'];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!-- 清除微信缓存
		<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
		<meta http-equiv="Pragma" content="no-cache" />
		<meta http-equiv="Expires" content="0" />
		清除缓存结束-->
		<title>选择门店</title>
		 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
     <link href="styles/base.css" type="text/css" rel="stylesheet" />
		<link href="styles/extend/store_list.css" type="text/css" rel="stylesheet" />
    <script src="js/jquery-1.8.3.min.js" type="text/javascript"></script>
    <script src="js/mobile/layer.js"></script>
      <script src="js/layer.js"></script>
      <script src="js/loading.js"></script>
	</head>
  <body>
    <div class="head"><? if($name==null){
      echo '<span style="width:40px;float:left;">&nbsp;</span>';
    }else{
      echo '<a href="./store_list.php"><img src="images/shuaxin.jpg" style="width:23px;float:left;margin-left:20px;" ></a>';
    }?>
        <span style=";">选择分店 </span>	<img src="images/serch1.png" style="width:23px;float:right;margin-right:20px;" onClick="test()">
      </div>
      	<div style="padding-bottom:48px;"></div>

            <?php
  $sql="select * from store_setting where store_id = '$store_id'";//查询语句
  $result=mysql_query($sql);//执行查询
  while($row = mysql_fetch_array($result))
  {
                echo '<a href="index.php?id=';echo $store_id; echo '">
                <div class="list">
                      <div class="list_img">
                        <p>';echo $row['store_name']; echo '<sub>(总店)</sub></p>
                      </div>
                      <p class="p1"><img src="images/foot4.png" style="width:17px;"/>&nbsp;';echo $row['store_place']; echo '</p>
                  </div>';
}
              ?>
        <?php
        if($name==null){
            $sql="select * from fendian where fen_status = '1'";//查询语句
        }else{
          $sql="select * from fendian where fen_status = '1' and fen_name like '%$name%'";//查询语句
        }

          $res=mysql_query($sql);//执行查询
          while($r=mysql_fetch_assoc($res)){
              $ro[]=$r;//接受结果集
          }

          foreach($ro as $key=>$v){
            echo '<a href="index.php?id=';echo $v['store_id']; echo '&fen=';echo $v['id']; echo '">
            <div class="list">
                  <div class="list_img">
                    <p>';echo $v['fen_name']; echo '</p>
                  </div>
                  <p class="p1"><img src="images/foot4.png" style="width:17px;"/>&nbsp;';echo $v['fen_place']; echo '</p>
              </div>';
          }if($ro == null){
            echo '<p style="margin:100px 0;text-align:center;">暂无可用的门店</p>';
          }
          ?>

  </body>
  <script>
    function test(){
      layer.prompt({title: '输入门店名称', formType: 0}, function(pass, index){
      window.location.href="?name="+pass;
    });
}
  </script>
</html>
