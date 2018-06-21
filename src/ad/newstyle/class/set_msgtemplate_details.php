<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
$msgtemplate_recharge = $_POST['msgtemplate_recharge'];
$msgtemplate_consume = $_POST['msgtemplate_consume'];
$msgtemplate_distribution = $_POST['msgtemplate_distribution'];
require '../../myLittleSQL.php';
require '../../config.php';
$myshop = 'mcard_setting_' . $_SESSION['ssn'];
$conn = new mylittlesql($server, $db_user, $db_pwd);
$conn->selectDB($database);

$sql = "update `$myshop` SET     
    `setvalue`='$msgtemplate_recharge'
  where setname = 'msgtemplate_recharge_id';";
$result1 = $conn->executeSQL($sql);
$sql = "update `$myshop` SET     
    `setvalue`='$msgtemplate_consume'
  where setname = 'msgtemplate_consume_id';";
$result2 = $conn->executeSQL($sql);
$sql = "update `$myshop` SET     
    `setvalue`='$msgtemplate_distribution'
  where setname = 'msgtemplate_distribution_id';";
$result3 = $conn->executeSQL($sql);
if ($result1 == TRUE and $result2 == TRUE and $result3 == TRUE) {
    echo 'success';
} else {
    echo $result;
}
