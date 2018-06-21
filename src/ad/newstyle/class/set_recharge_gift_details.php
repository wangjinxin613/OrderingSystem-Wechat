<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
$recharge_gift_rule1_1 = $_POST['recharge_gift_rule1_1'];
$recharge_gift_rule1_2 = $_POST['recharge_gift_rule1_2'];
$recharge_gift_rule2_1 = $_POST['recharge_gift_rule2_1'];
$recharge_gift_rule2_2 = $_POST['recharge_gift_rule2_2'];
$recharge_gift_rule3_1 = $_POST['recharge_gift_rule3_1'];
$recharge_gift_rule3_2 = $_POST['recharge_gift_rule3_2'];
$recharge_gift_rule4_1 = $_POST['recharge_gift_rule4_1'];
$recharge_gift_rule4_2 = $_POST['recharge_gift_rule4_2'];
$recharge_gift_rule5_1 = $_POST['recharge_gift_rule5_1'];
$recharge_gift_rule5_2 = $_POST['recharge_gift_rule5_2'];
checkConsumeMonkey($recharge_gift_rule1_1);
checkConsumeMonkey($recharge_gift_rule1_2);
checkConsumeMonkey($recharge_gift_rule2_1);
checkConsumeMonkey($recharge_gift_rule2_2);
checkConsumeMonkey($recharge_gift_rule3_1);
checkConsumeMonkey($recharge_gift_rule3_2);
checkConsumeMonkey($recharge_gift_rule4_1);
checkConsumeMonkey($recharge_gift_rule4_2);
checkConsumeMonkey($recharge_gift_rule5_1);
checkConsumeMonkey($recharge_gift_rule5_2);
checkRules($recharge_gift_rule1_1,$recharge_gift_rule2_1,$recharge_gift_rule3_1,$recharge_gift_rule4_1,$recharge_gift_rule5_1);
require('../../config/index_class.php');
function update($name,$val){
  global $user;
  $sql = "update store_setting set $name = '$val' where store_id = '$user->store_id'";
  $res = mysql_query($sql);
  return $res;
}
$result1 = update('chong_value1',$recharge_gift_rule1_1); //规则1 充值金额
$result2 = update('chong_gift1',$recharge_gift_rule1_2); //规则1 赠送金额
$result3 = update('chong_value2',$recharge_gift_rule2_1); //规则2 充值金额
$result4 = update('chong_gift2',$recharge_gift_rule2_2); //规则2 赠送金额
$result5 = update('chong_value3',$recharge_gift_rule3_1); //规则1 充值金额
$result6 = update('chong_gift3',$recharge_gift_rule3_2); //规则1 赠送金额
$result7 = update('chong_value4',$recharge_gift_rule4_1); //规则1 充值金额
$result8 = update('chong_gift4',$recharge_gift_rule4_2); //规则1 赠送金额
$result9 = update('chong_value5',$recharge_gift_rule5_1); //规则1 充值金额
$result10 = update('chong_gift5',$recharge_gift_rule5_2); //规则1 赠送金额
if ($result1 == TRUE and $result2 == TRUE and $result3 == TRUE and $result4 == TRUE and $result5 == TRUE and $result6 == TRUE and $result7 == TRUE and $result8 == TRUE and $result9 == TRUE and $result10 == TRUE) {
    echo 'success';
} else {
    echo 'some thing wrong,refresh please';
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
    if ($money >= 100000 and $money) {
        echo "不能超过100000元";
        exit();
    }
}
function checkRules($recharge_gift_rule1_1,$recharge_gift_rule2_1,$recharge_gift_rule3_1,$recharge_gift_rule4_1,$recharge_gift_rule5_1){
    if((($recharge_gift_rule5_1>$recharge_gift_rule4_1)and($recharge_gift_rule4_1>$recharge_gift_rule3_1)and($recharge_gift_rule3_1>$recharge_gift_rule2_1)and($recharge_gift_rule2_1>$recharge_gift_rule1_1))==false){
        echo "充值金额必须遵循规则三大于规则二大于规则一";
        exit();
    }

}
