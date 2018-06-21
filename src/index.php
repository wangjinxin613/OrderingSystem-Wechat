<?php
	error_reporting(0);
$id = $_GET['id'];
$yid = $_GET['yid'];
$fen_id = $_GET['fen'];
$tai = $_GET['tai'];
if(ctype_digit($id)== false && $id != null){ //检测传递过来的参数必须是数字，防止被黑客攻击
   exit('<script>alert(\'参数传递有误！！\');history.back();</script>');
}else if($id==null){
  exit('<script>window.location.href="store_list.php";</script>');
}else{
session_start();
$_SESSION['store_id'] = $id;
$_SESSION['yid'] = $yid;
$_SESSION['fen_id'] = $fen_id;
$_SESSION['tai'] = $tai;
$url="index";
echo "<script>";
echo "location.href='$url'";
echo "</script>";
}
?>
