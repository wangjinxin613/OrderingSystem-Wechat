<?php
  $id = $_POST['id'];
  session_start();
  $_SESSION['admin_checked'] = true;
  $_SESSION['admin_id'] = $id;
  exit('<script>window.location.href="../index.php";</script>');
?>
