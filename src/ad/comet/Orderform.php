 <?php
 require('../config/index_class.php');
  sleep(1); // 休眠3秒，模拟处理业务等  
  $fen_id = $_GET['fen_id'];
  order_shishi($fen_id);
 ?>