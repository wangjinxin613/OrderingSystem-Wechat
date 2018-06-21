<?
  require('../config/index_class.php');
  $fen_name = $_POST['fen_name'];
  $fen_price = $_POST['fen_price'];
  $fen_phone = $_POST['fen_phone'];
  $fen_place = $_POST['fen_place'];
  $fen_status = $_POST['fen_status'];
  $sql1 = mysql_query("SELECT * FROM fendian where store_id = '$user->store_id'") or die(mysql_error());
  $row1 = mysql_num_rows($sql1);
  if($row1 >=	 $item->fen_number){
  	 exit('<script>alert(\'您的可开分店数量不足，请先购买\');window.location.href="../taocan.php";</script>');
  }
  $sql = "insert into fendian(id,fen_name,fen_price,fen_phone,fen_place,fen_status,fen_img,zuobiao,store_id) values (null,'$fen_name','$fen_price','$fen_phone','$fen_place','$fen_status','$item->store_img','$item->zuobiao','$user->store_id')";
  mysql_query($sql);
    exit('<script>alert(\'执行成功\');history.back();</script>');
?>
