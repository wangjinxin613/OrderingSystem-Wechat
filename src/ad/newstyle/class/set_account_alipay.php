<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
$alipay_account = $_POST['alipay_account'];
require '../../myLittleSQL.php';
require '../../config.php';
include '../../conmon_tool.php';
$myshop = 'mcard_setting_' . $_SESSION['ssn'];
$conn = new mylittlesql($server, $db_user, $db_pwd);
$conn->selectDB($database);
$config = get_setting($conn);
if ($config['lock_alipay'] == 'false') {
    $sql = "update `$myshop` SET     
    `setvalue`='$alipay_account'
  where setname = 'alipay_account';";
    $result = $conn->executeSQL($sql);

    $sql2 = "update `$myshop` SET     
    `setvalue`='true'
  where setname = 'lock_alipay';";
    $result2 = $conn->executeSQL($sql2);
    if ($result == TRUE) {
        echo 'success';
    } else {
        echo $result;
    }
}
else{
    echo '账号已绑定成功';
}
