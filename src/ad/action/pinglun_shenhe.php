<?php
  $id = $_POST['id'];
  require('../config/index_class.php');
pinglun_shenhe($id);
	exit('<script>alert(\'操作成功\');history.back();</script>');
?>
