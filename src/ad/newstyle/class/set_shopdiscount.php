<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require('../../config/index_class.php');
session_start();
$discount = $_POST['shop_discount'];
$sql = "update store_setting set store_zhe = '$discount' where store_id = '$user->store_id'";
$result = mysql_query($sql);
if ($result == TRUE) {
    echo 'success';
} else {
    echo $result;
}
