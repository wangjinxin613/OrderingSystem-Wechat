<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
require '../config/index_class.php';
$id_type = $_POST['id_type'];
checkConsumeMonkey($_POST['trade_money']);
switch ($id_type) {
    case 'account':
        $account_id = $_POST['id_type_val'];
        $sql = "select * from member where account_id = '$account_id' ";
        $id_type_name = '会员卡号';
        $id_type_val = $account_id;
        break;
    case 'tel':
        $tel = $_POST['id_type_val'];
        $sql = "select * from member where tel = '$tel' and store_id = '$user->store_id' and store_id = '$user->store_id'";
        $id_type_name = '电话号码';
        $id_type_val = $tel;
        break;
}
$fen_id = $_POST['trade_shopname'];
$appid = $item->appid;
$appsecret = $item->appsecret;
//判断id是否存在
$result = mysql_query($sql);
if (!mysql_num_rows($result)) {
    echo $_POST['id_type'];
    echo '不存在会员卡';
 exit();
}
//存在的话取出id的信息
$row = mysql_fetch_array($result);
$status = $row['rank'];
if ($status == 'no') {
    echo '账户冻结，无法交易';
    exit();
}
$account_id = $row['account_id'];
$wx_openid = $row['wx_openid'];
$wx_nickname = $row['wx_nickname'];
$money_still = $row['money_still'];
$money_stills = $row['money_still'];
$money_gift = $row['money_gift'];
$money_used = $row['money_used'];
$real_name = $row['real_name'];
if ($real_name == '') {
    $showname = $wx_nickname;
} else {
    $showname = $real_name;
}
$tel = $row['tel'];
$up_id = $row['up_id'];//上级id
$points = $row['points'];//积分
//$shops = getShopAllName($conn, $shop_id);
$date = date("Y/m/d H:i:s");
//$shop_firstname = $shops['shop_name'];
//$shop_sbuname = $shops['subshop_name'];
//if(isset($_POST['order_id'])){
  //  $order_id='waimai_'.$_POST['order_id'];
//}else{
  //  $order_id = date("YmdHis") . uniqid();
//}
$appid = $config['appid'];
$trade_action = $_POST['trade_action'];

switch ($trade_action) {
    case "recharge": //充值
        $recharge_money = $_POST['trade_money'];
        $recharge_type = $_POST['trade_type'];

        if ($item->chong_gift == '1') {
            $gift_money = check_recharge_gift($recharge_money);
        } else {
            $gift_money = 0;
        }
//        if ($recharge_money == 38 and $ssn == 'whz') {
//            if (getSANBA($conn, $ssn, $account_id) != 'yes') {
//                $gift_money = 38;
//                setSANBA($conn, $ssn, $account_id);
//            }
//        }
        $money_still = $money_still + $recharge_money + $gift_money;
        $money_gift = $money_gift + $gift_money;
        $money_all = $money_still + $money_gift;
        $sql1 = "update member set money_still = '$money_still' where account_id = '$account_id'";
        $result1 = mysql_query($sql1);

        $sql2 = "update member set money_gift = '$money_gift'
where account_id = '$account_id'";
        $result2 = mysql_query($sql2);
        //此处添加充值记录
        $sql_log = "insert into chongzhi(id,chong_money,time,chong_type,blog,store_id,account_id,wx_name,money_gift,fen_id) values (null,'$recharge_money','$date','现金充值','1','$user->store_id','$account_id','$wx_nickname',' $gift_money','$fen_id')";
        mysql_query($sql_log);
        if ($result1 == true) {
            echo "0";
               //微信通知消息

     $data = array(
    'first'=>array('value'=>"充值成功提醒",'color'=>"#00008B"),   //函数传参过来的name  
     'keyword1'=>array('value'=>$item->store_name,'color'=>"#00008B"),    //函数传参过来的name     
    'keyword2'=>array('value'=>$time,'color'=>"#00008B"),    //函数传参过来的name     
    'keyword3'=>array('value'=>$recharge_money,'color'=>"#00008B"),    //函数传参过来的name
    'keyword4'=>array('value'=>$gift_money,'color'=>"#00008B"),   //函数传参过来的name     
    'keyword5'=>array('value'=>$money_stills,'color'=>"#00008B"),
    'remark'=>array('value'=>"",'color'=>"#00008B")    //函数传参过来的name     
);
$urls = $_SERVER['HTTP_HOST'];


send_message($wx_openid,$item->tid5,$data,$urls);
            
          /**  $jsonmenu = array( //此处应当是向用户发送信息的，先注释掉
                'touser' => "$wx_openid",
                'template_id' => $config['msgtemplate_recharge_id'],
                'topcolor' => "#FF0000",
                'data' => array('first' => array('value' => urldecode("尊敬的$showname" . ",您已经成功进行会员卡充值"), 'color' => "#000000"),
                    'keyword1' => array('value' => urldecode($shop_firstname . $shop_sbuname), 'color' => "#0000FF"),
                    'keyword2' => array('value' => urldecode("$date"), 'color' => "#0000FF"),
                    'keyword3' => array('value' => urldecode("$recharge_money" . "元"), 'color' => "#0000FF"),
                    'keyword4' => array('value' => urldecode("$gift_money" . "元"), 'color' => "#0000FF"),
                    'keyword5' => array('value' => urldecode("$money_all" . "元"), 'color' => "#0000FF"),
                    'remark' => array('value' => urldecode("如有疑问,欢迎前来咨询"), 'color' => "#000000")
            ));
            $access_token = getAccessToken2($appid, $appsecret, $_SESSION['ssn']);
            $r = writeRechargeLog($conn, $account_id, $order_id, $showname, $date, $recharge_money, $money_all, $recharge_type, $shop_firstname . $shop_sbuname, $_SESSION['operator_id'], $_SESSION['operator_name'], $shop_id, $_SESSION['ssn'], $gift_money);
            if ($r == TRUE) {
                writeSystemLog($conn, $ssn, $_SESSION['operator_id'], "recharge", "订单号$order_id :" . $_SESSION['operator_name'] . '(' . $_SESSION['operator_id'] . ')为' . "$showname($account_id)充值了" . $recharge_money . '元,系统赠送金额为' . $gift_money . "元。账户余额为$money_all 元", $date);
                sendTemMsg($access_token, json_encode($jsonmenu));
            }**/
            ###分销赠送###
            if ($item->chong_fen_gift == '1') {
                if ($up_id != null) {
                    $sql = "select * from member where account_id = '$up_id'";
                    $result = mysql_query($sql);
                    $row = mysql_fetch_array($result);
                    $up_moneygift = $row['money_gift'];
                    $dis_gift_money = check_dis_recharge_gift($recharge_money);
                    if ($dis_gift_money > 0) {
                        $dis_openid = $row['wx_openid'];
                        $dis_money_still = $row['money_gift'];
                        $dis_real_name = $row['real_name'];
                        $after_moneygift = $up_moneygift + $dis_gift_money;
                        $dis_remark = "下线" . $account_id . "($wx_nickname)" . "在" . $date . "充值" . $recharge_money . "元";
                        $sql3 = "update member set money_gift = '$after_moneygift' where account_id = '$up_id'";
                        $result3 = mysql_query($sql3);
                        $sql4 = "update member set money_still = money_still + '$dis_gift_money' where account_id = '$up_id'";
                        $result3 = mysql_query($sql4);
                        $s = "insert into share_log(id,share_body,share_money,time,up_id,down_id,store_id) values (null,'下级{$wx_nickname}充值{$recharge_money}元','$dis_gift_money','$date','$up_id','$account_id','$user->store_id')";
                        mysql_query($s); //分销赠送记录
                    /**    $jsonmenu = array(
                            'touser' => "$dis_openid",
                            'template_id' => $config['msgtemplate_remark_id'],
                            'topcolor' => "#FF0000",
                            'data' => array('first' => array('value' => urldecode('您有一名下线刚刚成功完成了一笔充值'), 'color' => "#000000"),
                                'keyword1' => array('value' => urldecode("奖励" . $dis_gift_money . '元'), 'color' => "#0000FF"),
                                'keyword2' => array('value' => urldecode("$date"), 'color' => "#0000FF"),
                                'remark' => array('value' => urldecode("推广更多会员能获得更多的奖励"), 'color' => "#000000")
                        ));
                        $access_token = getAccessToken2($appid, $appsecret, $_SESSION['ssn']);
                        writeSystemLog($conn, $ssn, $_SESSION['operator_id'], "dis-recharge", "订单号$order_id :" . "下线" . $account_id . "($showname)" . "在" . $date . "充值" . $recharge_money . "元,上级$up_id($dis_real_name)获得$dis_gift_money 元", $date);
                        writeDistributionLog($conn, $order_id, $up_id, $account_id, $recharge_money, 0, $dis_gift_money, $date, $_SESSION['ssn'], 'recharge', $shop_id);
                        sendTemMsg($access_token, json_encode($jsonmenu));
**/
                    }

                }
            }

            ###end分销赠送###
        } else {
            echo 'fail';

        }
        break;
    case "consume":
        $consume_money = $_POST['trade_money'];
        $consume_type = $_POST['trade_type'];
        $pre_money = $consume_money;
        ####打折###
        $discount = $item->store_zhe;
        $consume_money = round(($consume_money * $discount),2); //消费打折后金额
        $consume_moneys =  round(($consume_money * $discount));
        ###消费处理###
        $money_all = $money_still ;
        if ($consume_money > $money_all) {
            echo "当前余额" .$money_all."不足资付本次消费". $consume_money.'元';
            exit();
        }  else {
            $money_still = $money_still - $consume_money;
        }
        ###end消费处理###
        $money_used = $money_used + $consume_money;
        if ($item->xiao_gift == 1) {
          $ex_points = ($item->xiao_value_2 / $item->xiao_value_1) * $consume_money;
          $sql3 = "update member set points = points + '$ex_points' where account_id = '$account_id'";
          $result3 = mysql_query($sql3);
        }
          $sql1 = "update member set money_still = money_still - '$consume_money' where account_id = '$account_id'";
       $result1 = mysql_query($sql1);
         $sql2 = "update member set money_used = '$money_used' where account_id = '$account_id'";
         $result2 = mysql_query($sql2);
          $sql_a = "insert into money_change(id,type,m_body,time,uid,store_id,get_points,fen_id) values (null,'后台消费','-{$consume_money}','$date','$account_id','$user->store_id','$ex_points','$fen_id')";
          mysql_query($sql_a);
        $money_all = $money_still + $money_gift;

        if ($result1 == true && $result2 == true ) {
            echo '0';
                        //微信通知消息

     $data = array(
    'first'=>array('value'=>"您好，您已消费成功",'color'=>"#00008B"),   //函数传参过来的name  
     'pay'=>array('value'=>$consume_moneys,'color'=>"#00008B"),    //函数传参过来的name     
    'address'=>array('value'=>$item->store_name,'color'=>"#00008B"),    //函数传参过来的name     
    'time'=>array('value'=>$time,'color'=>"#00008B"),    //函数传参过来的name

    'remark'=>array('value'=>"如有疑问，请咨询本店服务员",'color'=>"#00008B")    //函数传参过来的name     
);
$urls = $_SERVER['HTTP_HOST'];


send_message($wx_openid,$item->tid6,$data,$urls);
          /**  $jsonmenu = array(
                'touser' => "$wx_openid",
                'template_id' => $config['msgtemplate_consume_id'],
                'topcolor' => "#FF0000",
                'data' => array('first' => array('value' => urldecode("尊敬的$showname" . "，您的消费信息如下："), 'color' => "#000000"),
                    'keyword1' => array('value' => urldecode("$consume_money" . '元'), 'color' => "#0000FF"),
                    'keyword2' => array('value' => urldecode($shop_firstname . $shop_sbuname), 'color' => "#0000FF"),
                    'keyword3' => array('value' => urldecode($ex_points . "积分"), 'color' => "#0000FF"),
                    'keyword4' => array('value' => urldecode($points . "积分"), 'color' => "#0000FF"),
                    'keyword5' => array('value' => urldecode($money_still + $money_gift . '元'), 'color' => "#0000FF"),
                    'remark' => array('value' => urldecode("$date"), 'color' => "#000000")
            ));
            $access_token = getAccessToken2($appid, $appsecret, $_SESSION['ssn']);
            writeSystemLog($conn, $ssn, $_SESSION['operator_id'], "consume", "订单号$order_id :" . $_SESSION['operator_name'] . '(' . $_SESSION['operator_id'] . ')为' . "$showname($account_id)消费了" . $consume_money . '元,系统赠送积分为' . $ex_points . "分。账户余额为$money_all 元", $date);
            writeDiscountConsumeLog($conn, $account_id, $order_id, $showname, $date, $pre_money, $consume_type, $shop_firstname . $shop_sbuname, $_SESSION['operator_id'], $_SESSION['operator_name'], $shop_id, $_SESSION['ssn'], $ex_points, $discount, $consume_money, $money_still);
            writePointsLog($conn, $order_id, $account_id, $showname, $date, $ex_points, $points, '增加', $shop_sbuname, $_SESSION['operator_id'], $_SESSION['operator_name'], $shop_id, $_SESSION['ssn']);

            sendTemMsg($access_token, json_encode($jsonmenu));**/
        } else {
            echo 'fail';
        }
        ######分销#######
        if ($item->share_setting == 1) {
            if ($up_id != null) {
                $sql = "select * from member where account_id='$up_id'";
                $result = mysql_query($sql);
                $row = mysql_fetch_array($result);
                $dis_openid = $row['wx_openid'];
                $dis_money_still = $row['money_gift'];
                $dis_real_name = $row['real_name'];
                $distribution_precent = $item->fen_value;
                $dis_recharge_money = round($consume_money * $distribution_precent, 2);

                $sql4="update member set money_still = money_still + '$dis_recharge_money' where account_id = '$up_id'";
                mysql_query($sql4);
                $sql5="update member set money_gift = money_gift + '$dis_recharge_money' where account_id = '$up_id'";
                mysql_query($sql5);
                $s = "insert into share_log(id,share_body,share_money,time,up_id,down_id,store_id) values (null,'下级{$wx_nickname}消费{$consume_money}元','$dis_recharge_money','$date','$up_id','$account_id','$user->store_id')";
                mysql_query($s); //分销赠送记录
              /**  $jsonmenu = array(
                    'touser' => "$dis_openid",
                    'template_id' => $config['msgtemplate_remark_id'],
                    'topcolor' => "#FF0000",
                    'data' => array('first' => array('value' => urldecode('您有一名下线刚刚成功完成了一笔消费'), 'color' => "#000000"),
                        'keyword1' => array('value' => urldecode("奖励" . $dis_recharge_money . '元'), 'color' => "#0000FF"),
                        'keyword2' => array('value' => urldecode("$date"), 'color' => "#0000FF"),
                        'remark' => array('value' => urldecode("推广更多会员能获得更多的奖励"), 'color' => "#000000")
                ));
                $access_token = getAccessToken2($appid, $appsecret, $_SESSION['ssn']);
                writeSystemLog($conn, $ssn, $_SESSION['operator_id'], "distribution", "订单号$order_id :" . "下线" . $account_id . "($showname)" . "在" . $date . "消费" . $consume_money . "元,上级$up_id($dis_real_name)获得$dis_recharge_money 元", $date);
                writeDistributionLog($conn, $order_id, $up_id, $account_id, $consume_money, $distribution_precent, $dis_recharge_money, $date, $_SESSION['ssn'], 'consume', $shop_id);
                sendTemMsg($access_token, json_encode($jsonmenu));*/
            }
        }

        ####end分销####
        break;
};

//function writeRechargeLog($conn, $account_id, $account_name, $date, $money, $trade_type, $trade_address, $operator_id, $operator_name, $shop_id, $short_shop_name, $gift_money,$remark="") {
//    $sql = "insert into `mcard_recharge_log` (`account_id`,`account_name`,`date`,`money`,`trade_type`,`trade_address`,`operator_id`,`operator_name`,`trade_shopid`,`short_shop_name`,`gift_money`,`remark`)
// values('$account_id','$account_name','$date','$money','$trade_type','$trade_address','$operator_id','$operator_name','$shop_id','$short_shop_name','$gift_money','$remark');
//";
//    $result = $conn->executeSQL($sql);
//    return $result;
//}

function checkConsumeMonkey($money) {
    if ($money <= 0) {
        echo "金额不能少于等于0元";
        exit();
    }
    if (is_numeric($money) == FALSE) {
        echo "金额只能填写数字";
        exit();
    }
    if ($money >= 10000) {
        echo "单次交易限额不能超过10000元";
        exit();
    }
    if (strpos($money, ".") == TRUE) {
        $temp_m = explode(".", $money);
        if (strlen($temp_m[1]) > 2) {
            echo "不能输入小数点后两位的长度";
            exit();
        }
    }
}
function discount() {

}
$conn->closeDB();
?>