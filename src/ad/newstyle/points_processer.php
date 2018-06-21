<?php

session_start();
require '../config/index_class.php';
$points_id = $_POST['points_id'];
$points_num = $_POST['points_num'];
$points_type = $_POST['points_type'];
$points_shopname = $_POST['points_shopname'];


checkPoints($points_num);

//$config = get_setting($conn);
$sql = "select * from member where account_id='$points_id'";
$result = mysql_query($sql);
if (!mysql_num_rows($result)) {
    echo "不存在该用户";
    exit();
} else {
    $row = mysql_fetch_array($result);
    $points_still = $row['points'];
    $account_name = $row['wx_nickname'];
    $realname = $row['real_name'];
    if ($realname == '') {
        $showname = $account_name;
    } else {
        $showname = $realname;
    }
    $wx_openid = $row['wx_openid'];
    $order_id = date("YmdHis") . uniqid();
    $date = date("Y/m/d H:i:s");

    switch ($points_type) {
        case '增加':
            $points_still = $points_still + $points_num;
            $sql = "update member set points ='$points_still'
  where account_id = '$points_id';";
            $result = mysql_query($sql);
            if ($result == TRUE) {
                echo '0';
                /**$jsonmenu = array(
                'touser' => "$wx_openid",
                'template_id' => $config['msgtemplate_remark_id'],
                'topcolor' => "#FF0000",
                'data' => array('first' => array('value' => urldecode("尊敬的" . $showname . ",您有一条提醒消息"), 'color' => "#000000"),
                    'keyword1' => array('value' => urldecode('积分增加了' . $points_num . '分'), 'color' => "#0000FF"),
                    'keyword2' => array('value' => urldecode("$date"), 'color' => "#0000FF"),
                    'remark' => array('value' => urldecode("如有疑问,欢迎前来咨询"), 'color' => "#000000")
            ));
            writePointsLog($conn, $order_id, $points_id, $showname, $date, $points_num, $points_still, $points_type, $trade_address, $_SESSION['operator_id'], $_SESSION['operator_name'], $points_shopname, $ssn);

**/  }
            break;

        case '减少':
            $points_still = $points_still - $points_num;
            if ($points_still < 0) {
                echo '积分不足';
                exit();
            }
            $sql = "update member set points = '$points_still' where account_id = '$points_id';";
            $result = mysql_query($sql);
            if ($result == TRUE) {
                echo '0';
                /**$jsonmenu = array(
                    'touser' => "$wx_openid",
                    'template_id' => $config['msgtemplate_remark_id'],
                    'topcolor' => "#FF0000",
                    'data' => array('first' => array('value' => urldecode("尊敬的" . $showname . ",您有一条提醒消息"), 'color' => "#000000"),
                        'keyword1' => array('value' => urldecode('积分减少了' . $points_num . '分'), 'color' => "#0000FF"),
                        'keyword2' => array('value' => urldecode("$date"), 'color' => "#0000FF"),
                        'remark' => array('value' => urldecode("如有疑问,欢迎前来咨询"), 'color' => "#000000")
                ));
                writePointsLog($conn, $order_id, $points_id, $showname, $date, $points_num, $points_still, $points_type, $trade_address, $_SESSION['operator_id'], $_SESSION['operator_name'], $points_shopname, $ssn);
            }
            **/
            break;
    }
    /**$access_token = getAccessToken2($appid, $appsecret, $ssn);
    sendTemMsg($access_token, json_encode($jsonmenu));**/
}}

function checkPoints($points) {
    if ($points <= 0) {
        echo "积分不能少于等于0积分";
        exit();
    }
    if (is_numeric($points) == FALSE) {
        echo "积分只能填写数字";
        exit();
    }
    if ($points >= 10000) {
        echo "单次交易限额不能超过10000积分";
        exit();
    }
    if (strpos($points, ".") == TRUE) {
        echo "积分只能输入整数";
        exit();
    }
}

?>
