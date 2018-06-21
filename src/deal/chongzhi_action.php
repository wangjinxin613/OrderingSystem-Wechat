<?php
  require('../config/index_config.php');
  $money = $_POST['money'];
  $paytype = $_POST['paytype'];
  if($paytype==1){
    $txt = "微信支付";
  }else if($paytype == 4){
    $txt = "支付宝支付";
  }
  $money_gift = check_recharge_gift($money);
  $moneys = $money + $money_gift;
  $q="insert into chongzhi(id,chong_money,chong_type,time,store_id,account_id,wx_name,money_gift) values (null,'$moneys','$txt','$time','$store_id','$user->user_id','$user->nickname','$money_gift')";//向数据库插入表单传来的值的sql
  $reslut=mysql_query($q,$con);//执行sql
  $getID=mysql_insert_id();//获取插入数据的id


      
  if($paytype == 1){
    echo '即将跳转至微信支付...';
    post_action('../chong_wxpay/alipay.php',$getID);
  
    //exit('<script>alert(\'充值成功\');history.back();</script>');
  }
  else if($paytype == 4){
    echo "即将跳转至支付宝支付...";
    post_action('../chong_pay/alipay.php',$getID);
  }else{
    echo '选择支付方式出现错误';
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
