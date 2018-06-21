<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
$distribution_precent = $_POST['distribution_precent'];
require '../../config/index_class.php';
$sql = "update store_setting set fen_value = '$distribution_precent' where store_id = '$user->store_id'";
mysql_query($sql);
if ($result == TRUE) {
    echo 'success';
} else {
    echo $result;
}
