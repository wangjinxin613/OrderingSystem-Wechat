<?
    require('config/index_class_no.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/style.css"/>
            <link rel="stylesheet" href="assets/css/ace.min.css" />
        <link rel="stylesheet" href="assets/css/font-awesome.min.css" />
        <link href="assets/css/codemirror.css" rel="stylesheet">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
                <link rel="stylesheet" href="css/style.css"/>
                <link rel="stylesheet" href="assets/css/font-awesome.min.css" />
                <link href="assets/css/codemirror.css" rel="stylesheet">
                <link rel="stylesheet" href="font/css/font-awesome.min.css" />

 <link href="css/cg.css" rel="stylesheet" />
		
       <title></title>
       <style>
            .box{
              
                padding:10px 10px;
                width:280px;
                height:330px;
                
                background:#ffffff;
                float：left;
                border-radius:5px;
                margin:30px 0px;
                margin-left:30px;
            }
            .box:hover{
                box-shadow:1px 2px 6px #999999;
            }
            body{
                background:#EEEEEE;
            }
            .box .p1{
                font-size:25px;
                 text-align:center;
                 padding:0px 0;
            }
            .box .p2{
                font-size:18px;
                text-indent:2em;
                font-size:15px;
                margin-top:20px;
                height:90px;
                padding:0 5px;
                overflow:hidden;
            }
            div{
                float:left;
            }
            .box .p4{
                font-size:18px;
                padding:0 5px;
                margin-top:10px;
            }
            .box .p3{
                margin:10px auto;
                text-align:center;

                border:3px solid #ff9900;
                width:100px;
                margin-left:80px;
                padding:10px 0;
                border-radius:5px;
            }
            .p3:hover{
                color:#ffffff;
                background:#ff9900;
             }
       </style>
       </head>
<body>

 <div class="alert alert-block alert-success" style="margin-left:5%;width:90%">
  <button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
  <i class="icon-ok green"></i>欢迎使用<strong class="green">女神阁会员卡系统</strong>,你本次登陆时间为<?
  echo date('Y年m月d日H时i分s秒');?>，登陆IP:<? $s= getIP(); echo $s;?>.
  <p style="color:#000;">您的门店版本为为<strong><? store_sort($item->sort);?></strong>，分店数量为<strong><? echo $item->fen_number;?></strong>个，到期时间为<strong><? echo $item->stop_time;?></strong>，还有<strong><? stop_day();?> 天</p>
  <? if(stop_day('1')>5){ echo '<p style="color:red;">更改套餐以前的版本天数将不会累加，请谨慎操作，有版本变更需求请联系客服</p>';}else{ echo '<p style="color:red;">您的门店即将到期，到期后会关闭店铺，请及时续费</p>';}?>
 </div>
    <br><br><br><br>
    <br><br>
    <?php
     $sql="select * from store_sort ";//查询语句
 
        $res=mysql_query($sql);//执行查询
        while($row=mysql_fetch_assoc($res)){
            $rows[]=$row;//接受结果集
        }
        //遍历数组
        foreach($rows as $key=>$v){
            if($v['id'] != 1){
            echo '
            <form action="action/taocan_pay.php" method="post">
            <input type="text" value="';echo $v['id']; echo '" name="id" style="display:none">
             <input type="text" value="';echo $v['price']; echo '" name="money" style="display:none">
              <input type="text" value="';echo $v['sort_name']; echo '" name="name" style="display:none">
            <div class="box">
                 <p class="p1">';echo $v['sort_name']; echo '</p>
                 <p class="p4">价格: ';echo $v['price']; echo '元<span style="float:right;">时限：';echo $v['stop_time']; echo '天</span></p>
                 <p class="p4">分店数量：'; echo $v['fen_number'];echo '</p>
                  <p class="P2">';echo $v['sort_body']; echo '</p>
                <p><select name="paytype" style="width:99%">
                <option value="1">支付宝付款</option>
                <option value="2">微信付款</option>
                </select></p>
                <button class="p3">在线购买</button>
            </div>
            </form>
            ';}
        }
        ?>
       <div class="box ">
        <form action="action/fen_pay.php" method="post">
        <p class="p1">分店</p>
         <p class="p4">价格:200元/分店</p>
         <p class="p4">数量:<br><br>
            <div class="p5" style="margin-left:60px;border:3px solid #ff9900;" >
                <div class="show1" onclick="jian()">-</div>
                <input type="text" value="0.01" name="price" style="display:none;">
                <input type="text" value="1" class="num" id="num" style="border:1px 0 solid #ff9900" name="number"/>
                <div class="show2"  onclick="add()">+</div>
            </div></p><br><br><br><br>
            <p><select name="paytype" style="width:99%">
                <option value="1">支付宝付款</option>
                <option value="2">微信付款</option>
                </select></p>
                <button class="p3">在线购买</button>
              </form>
        </div>
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