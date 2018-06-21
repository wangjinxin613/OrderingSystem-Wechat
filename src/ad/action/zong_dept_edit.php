<?php
  require('../config/index_class1.php');
  
  $dept = $_POST['dept'];
  $fen_number = $_POST['fen_number'];

  $store_name = $_POST['store_name'];
  $stop_time = $_POST['stop_time'];
   $dept_body = implode(",", $dept);
  function update_edit($name,$val){
    $store_id = $_POST['store_id'];
    $sql = "update store_setting set $name = '$val' where store_id = {$store_id}";
    $result = mysql_query($sql);
  }
  echo $dept_body;
  update_edit('store_name',$store_name);
  update_edit('stop_time',$stop_time);
  update_edit('dept',$dept_body);
  update_edit('fen_number',$fen_number);
  exit('<script>alert(\'设置成功\');history.back();</script>');

?>
