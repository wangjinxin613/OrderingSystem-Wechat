<?php

/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2014 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    1.8.0, 2014-03-02
 */
/** Error reporting */
/** Include PHPExcel */
session_start();
require '../../myLittleSQL.php';
include '../../conmon_tool.php';
require '../../config.php';
$conn = new mylittlesql($server, $db_user, $db_pwd);
$conn->selectDB($database);
$ssn = $_SESSION['ssn'];
$date1 = $_GET['date1'];
$date2 = $_GET['date2'];
$trade_address = $_GET['ta'];
if (isset($_GET['shop_id']) == true) {
    $shop_id = $_GET['shop_id'];
} else {
    $shop_id = '0';
}
switch ($action) {
    case 'recharge':
        $sp = '赠送金额';
        $sql_type = 'gift_money';
        $table = 'mcard_RechargeLog_' . $ssn;
        if ($trade_address == 0) {
            $type = '在线充值';
            $trade_shopname = '总店';
        } else {
            $trade_shopname = $_SESSION['shops_name'][$trade_address];
            $type = '充值';
        }
        break;
    case 'consume':
        $type = '消费';
        $sql_type = 'gift_points';
        $sp = '赠送积分';
        $table = 'mcard_ConsumeLog_' . $ssn;
        $trade_shopname = $_SESSION['shops_name'][$trade_address];
        break;
}
switch ($trade_address) {
    case 'cash':
        if($shop_id!='0'){
            $sql = "select * from $table  where date between '$date1' and '$date2' and  trade_shopid=$shop_id order by date desc";
        }else{
            $sql = "select * from $table  where date between '$date1' and '$date2'  order by date desc";
        }
        break;
    case '0':
        $sql = "select * from $table  where date between '$date1' and '$date2' and  trade_shopid=$trade_address order by date desc";
        break;
}

$result = $conn->executeSQL($sql);
var_dump($result);
$num = mysql_num_rows($result);
if ($num > 0) {
    $count_money = $conn->sum_result($result, "money");
    $count_sp = $conn->sum_result($result, "$sql_type");
} else {
    $count_money = 0;
    $count_sp = 0;
}

require_once '../../plugins/PHPExcel/Classes/PHPExcel.php';

// Create new PHPExcel object
//$objPHPExcel = new PHPExcel();
$objPHPExcel = PHPExcel_IOFactory::load("../../Templates/template_count_recharge_online.xlsx");
// Set document properties
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
        ->setLastModifiedBy("RubyNeko")
        ->setTitle("数据统计")
        ->setSubject("数据统计")
        ->setDescription("数据统计")
        ->setKeywords("数据统计")
        ->setCategory("数据统计");


// Add some data
$objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A1', '数据统计--' . $type)
        ->setCellValue('A5', $sp)
        ->setCellValue('A2', $date1 . '~' . $date2)
        ->setCellValue('B3', '共' . $num . '单')
        ->setCellValue('A3', $trade_shopname)
        ->setCellValue('B4', $count_money . '元')
        ->setCellValue('B5', $count_sp);

$i = 8;
while ($row = mysql_fetch_array($result)) {
    $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A' . $i, $row['account_id'])
            ->setCellValue('B' . $i, $row['account_name'])
            ->setCellValue('C' . $i, $row['date'])
            ->setCellValue('D' . $i, $row['trade_type'])
            ->setCellValue('E' . $i, $row['money'])
            ->setCellValue('F' . $i, $row[$sql_type])
            ->setCellValue('G' . $i, $row['trade_address'])
            ->setCellValue('H' . $i, $row['operator_name']);

    $i++;
}
// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Simple');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

$filename = date("Y/m/d-H:i:s") . '.xlsx';
// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename=' . "$filename" . '');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
