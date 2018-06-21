<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
$consume_gift_1 = $_POST['consume_gift_1'];
$consume_gift_2 = $_POST['consume_gift_2'];
checkConsumeMonkey($consume_gift_1);
checkConsumeMonkey($consume_gift_2);
require '../../config/index_class.php';
function update($name,$val){
  global $user;
  $sql = "update store_setting set $name = '$val' where store_id = '$user->store_id'";
  $res = mysql_query($sql);
  return $res;
}
$result1 = update('xiao_value_1',$consume_gift_1); //规则1 充值金额
$result2 = update('xiao_value_2',$consume_gift_2); //规则1 赠送金额
if ($result1 == TRUE and $result2 == TRUE) {
    echo 'success';
} else {
    echo $result;
}

function checkConsumeMonkey($money) {
    if ($money < 0) {
        echo "不能少于0元";
        exit();
    }
    if (is_numeric($money) == FALSE) {
        echo "只能填写数字";
        exit();
    }
    if ($money >= 10000) {
        echo "不能超过10000元(分)";
        exit();
    }
}
