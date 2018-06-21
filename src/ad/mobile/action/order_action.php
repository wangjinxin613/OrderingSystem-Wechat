<?php
  require('../../config/index_class.php');
  $pid = $_POST['pid'];
  $number = $_POST['num'];

  $sh_address = $_POST['sh_address'];
  $tel = $_POST['tel'];
  $order_name = $_POST['order_name'];
  $beizhu = $_POST['beizhu'];
  $paytype = $_POST['paytype'];
  $price = $_POST['price'];
  $money = $price * $number;

  $q="insert into zo_orderlist(id,order_name,order_uid,time,tel,beizhu,paytype,all_money,sh_address,store_id,products_id,number) values (null,'$order_name','$user->admin_id','$time','$tel','$beizhu','$paytype','$money','$sh_address','$user->store_id','$pid',$number)";//向数据库插入表单传来的值的sql
    $reslut=mysql_query($q);//执行sql
    $oid=mysql_insert_id();//获取插入数据的id
  if($paytype==1){
    //余额支付
    if($money > $user->admin_money){
      exit('<script>alert(\'余额不足！\');history.back();</script>');
    }else{
      $sh = $user->admin_money - $money;
      admin_money_update('admin_money',$sh,$user->admin_id,$oid);
      admin_money_update1($user->admin_id,$money);

      echo '<script>alert(\'您选择的是余额支付，订单创建成功！\');window.location.href="'; echo "../order_success.php?oid={$oid}&status=1"; echo '";</script>';
        exit();
    }
  }
  if($paytype==2){
    echo '正在跳转到微信支付......';
  }
  if($paytype==3){
    echo '正在跳转支付宝支付......';
  }
  if($paytype==4){
    exit('<script>alert(\'订单创建成功！\');history.back();</script>');
  }
?>
