<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
$switch = $_POST['dis_recharge_gift_switch'];
require '../../config/index_class.php';
if($switch == 1){
  $i = 0;
}if($switch == 0){
  $i = 1;
}
$sql = "update store_setting set chong_fen_gift = '$i' where store_id = '$user->store_id'";
$result = mysql_query($sql);
if ($result == TRUE) {
    echo 'success';
} else {
    echo "error";
}
