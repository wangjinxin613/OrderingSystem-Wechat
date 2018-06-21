<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
require '../../config/index_class.php';

$points_id = $_POST['points_id'];
$points_num = $_POST['points_num'];
$points_type = $_POST['points_type'];
//$points_shopname=$_POST['points_shopname'];
$sql = "select * from member where account_id = '$points_id'";
$result = mysql_query($sql);
if (!mysql_num_rows($result)) {
    echo "不存在该用户";
    exit();
} else {
    $row = mysql_fetch_array($result);
    $msg = '会员姓名: ' . $row['wx_nickname'] . '<br/>会员卡号:' . $points_id . '<br/> 积分' . $points_type . ':' . $points_num . "分<br>";
    echo $msg;
  
    exit();
}

?>
