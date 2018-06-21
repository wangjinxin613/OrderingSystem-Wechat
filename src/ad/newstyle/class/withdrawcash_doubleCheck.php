<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
require '../../myLittleSQL.php';
require '../../config.php';
include '../../conmon_tool.php';
$conn = new mylittlesql($server, $db_user, $db_pwd);
$conn->selectDB($database);
$config = get_setting($conn);
$ssn = $_SESSION['ssn'];
$config = get_setting($conn);

$type = $_POST['type'];
$pre_cash = $_POST['cash'];
$poundage = $config['poundage'];


$sql = "select * from mcard_ssn where ssn='$ssn'";
$result = $conn->executeSQL($sql);
$row = mysql_fetch_array($result);
$cash_still = $row['cash_still'];

if ($cash_still >= $cash) {
    $after_cash =$pre_cash-round($pre_cash * $poundage, 2);
    switch ($type) {
        case '支付宝':
            if ($config['lock_alipay'] == 'false') {
                echo '请先绑定支付宝账号';
            } else {
                $msg = '提现金额: ' . $pre_cash . '<br/>手续费: ' . $poundage*100 . '%<br/> ' . '得到金额: ' . $after_cash . "元<br>账户类型: " . $type;
                echo $msg;
            }
            break;
        case '银行账户':
            if ($config['lock_bank'] == 'false') {
                echo '请先绑定银行账号';
            } else {
                $msg = '提现金额: ' . $pre_cash . '<br/>手续费: ' . $poundage*100  . '%<br/> ' . '得到金额: ' . $after_cash . "元<br>账户类型: " . $type;
                echo $msg;
            }
            break;
    }
} else {
    echo '可提现金额不足';
}


?>


