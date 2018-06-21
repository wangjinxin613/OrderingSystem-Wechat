<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
require '../config/index_class.php';


$trade_type = $_POST['trade_type'];
$money = $_POST['trade_money'];
$id_type = $_POST['id_type'];
switch ($id_type) {
    case 'account':
        $account_id = $_POST['id_type_val'];
        $sql = "select * from member where account_id ='$account_id' and store_id = $user->store_id";
//        $id_type_name='会员卡号';
//        $id_type_val=$account_id;
        break;
    case 'tel':
        $tel = $_POST['id_type_val'];
        $sql = "select * from member where tel = '$tel' and store_id = $user->store_id";
//        $id_type_name='电话号码';
//        $id_type_val=$tel;
        break;
}

$result = mysql_query($sql);
if (!mysql_num_rows($result)) {
    echo "不存在该用户";
} else {
    $row = mysql_fetch_array($result);
    $account_id = $row['account_id'];
    $tel = $row['tel'];
    $real_name = $row['real_name'];
    $wx_nickname = $row['wx_nickname'];
    switch ($trade_type) {
        case '现金充值':
            if ($item->chong_gift == '1') {
                $gift_money = check_recharge_gift($money);
            } else {
                $gift_money = 0;
            }
//            if ($money == 38 and $ssn == 'whz') {
//                if (getSANBA($conn, $ssn, $account_id) != 'yes') {
//                    $gift_money = 38;
//                }
//            }
            $msg = '会员卡号:' . $account_id . '<br/>会员姓名:' . $real_name . '<br/>' . '电话号码:' . $tel . '<br/> ' . '微信呢称:' . $wx_nickname . '<br>充值金额:' . $money . "元<br>赠送金额:" . $gift_money . "元";
            break;
        case '余额消费':
            $pre_money = $money;
            $discount = $item->store_zhe;
            $consume_money = round($money * $discount, 2);
            $discount_show = $discount * 10;
            $msg = '会员卡号:' . $account_id . '<br/>会员姓名:' . $real_name . '<br/>' . '电话号码:' . $tel . '<br/> ' . '微信呢称:' . $wx_nickname . '<br>折前金额:' . $money . "元<br>全场折扣:" . $discount_show . "折<br>折后金额:$consume_money" . "元";
            break;
        default :
            $msg = '错误，请刷新网页';
    }

//    $msg = '会员姓名: ' . $row['wx_nickname'] . '<br/>会员卡号:' . $account_id . '<br/> ' . $trade_type . ':' . $money . "元<br>";
    echo $msg;
}
?>
