<?php
  require('../config/index_class.php');
  $pid = $_POST['pid'];
  $number = $_POST['number'];
  $paytype = $_POST['paytype'];
  $beizhu = $_POST['beizhu'];
  $sh_id = $_POST['sh_id'];
  $money = $_POST['money'];
  $sql="select * from zo_address where id = '$sh_id'";//查询语句
  $res=mysql_query($sql);//执行查询w
  while($row=mysql_fetch_assoc($res)){
      $rows[]=$row;//接受结果集
  }
  //遍历数组
  foreach($rows as $key=>$v){
    $sh_tel = $v['sh_tel'];
    $sh_name = $v['sh_name'];
    $sh_city = $v['sh_city'];
    $sh_address = $v['sh_address'];
  }
  $address = "{$v['sh_city']}{$v['sh_address']}";
  $q="insert into zo_orderlist(id,order_name,order_uid,time,tel,beizhu,paytype,all_money,sh_address,store_id,products_id,number) values (null,'$sh_name','$user->admin_id','$time','$sh_tel','$beizhu','$paytype','$money','$address','$user->store_id','$pid',$number)";//向数据库插入表单传来的值的sql
    $reslut=mysql_query($q);//执行sql
      $getID = mysql_insert_id();//获取插入数据的id
    if($paytype==1){
     //微信支付
      post_action('../cg_pay_wx/alipay.php',$getID);
    }
    if($paytype==2){
     // 支付宝
       post_action('../cg_pay_zhi/alipay.php',$getID);
    }
    function post_action($url,$order_id){
        $money = $_POST['money']; //该订单的总钱数
        echo "<form style='display:none;' id='form1' name='form1' method='post' action='{$url}'>
                <input name='money' type='text' value='{$money}' />

                <input name='order_id' type='text' value='{$order_id}'/>
              </form>
              <script type='text/javascript'>function load_submit(){document.form1.submit()}load_submit();</script>";
    }
  

?>
