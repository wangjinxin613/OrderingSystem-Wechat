<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
$bank_type = $_POST['bank_type'];
$bank_account= $_POST['bank_account'];
$bank_name = $_POST['bank_name'];
$bank_type_detail = $_POST['bank_type_detail'];

require '../../myLittleSQL.php';
require '../../config.php';
include '../../conmon_tool.php';
$myshop = 'mcard_setting_' . $_SESSION['ssn'];
$conn = new mylittlesql($server, $db_user, $db_pwd);
$conn->selectDB($database);
$config = get_setting($conn);
if ($config['lock_bank'] == 'false') {
    $sql = "update `$myshop` SET     
    `setvalue`='$bank_type'
  where setname = 'bank_type';";
    $result = $conn->executeSQL($sql);

     $sql = "update `$myshop` SET     
    `setvalue`='$bank_account'
  where setname = 'bank_account';";
    $result = $conn->executeSQL($sql);
    
     $sql = "update `$myshop` SET     
    `setvalue`='$bank_name'
  where setname = 'bank_name';";
    $result = $conn->executeSQL($sql);
    
         $sql = "update `$myshop` SET     
    `setvalue`='$bank_type_detail'
  where setname = 'bank_type_detail';";
    $result = $conn->executeSQL($sql);
    
     $sql = "update `$myshop` SET     
    `setvalue`='$bank_type_detail'
  where setname = 'bank_type_detail';";
    $result = $conn->executeSQL($sql);
    

    
    
    $sql2 = "update `$myshop` SET     
    `setvalue`='true'
  where setname = 'lock_bank';";
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
