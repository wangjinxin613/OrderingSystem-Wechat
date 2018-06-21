<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
$order_id = $_POST['order_id'];
require '../../myLittleSQL.php';
require '../../config.php';
include '../../conmon_tool.php';

$conn = new mylittlesql($server, $db_user, $db_pwd);
$conn->selectDB($database);
$myshop = 'mcard_setting_' . $_SESSION['ssn'];

$sql3 = "select * from mcard_withdrawcash_log where order_id='$order_id'";
$result3 = $conn->executeSQL($sql3);
$row = mysql_fetch_array($result3);
if ($row['status'] == '待审核') {
    $sql = "update `mcard_withdrawcash_log` SET     
    `status`='已取消'
  where order_id = '$order_id' and ssn='$ssn';";
    $result = $conn->executeSQL($sql);

    $sql2 = "update `$myshop` SET     
    `setvalue`='false'
  where setname = 'lock_withdrawcash';";
    $result = $conn->executeSQL($sql2);
    if ($result == TRUE) {
        echo 'success';
    } else {
        echo $result;
    }
}else{
    echo '该订单状态无法取消';
}
   


