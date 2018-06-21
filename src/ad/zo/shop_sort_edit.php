<?php
  require('../config/index_class1.php');
  
  $dept = $_POST['dept'];
  $id = $_POST['id'];
 
  $sort_name = $_POST['sort_name'];
  $stop_time = $_POST['stop_time'];
  $price = $_POST['price'];
  $sort_body = $_POST['sort_body'];
  $fen_number = $_POST['fen_number'];
   $dept_body = implode(",", $dept);
  function update_edit($name,$val){
    $id = $_POST['id'];
    $sql = "update store_sort set $name = '$val' where id = {$id}";
    $result = mysql_query($sql);
  }
 
  update_edit('sort_name',$sort_name);
  update_edit('stop_time',$stop_time);
  update_edit('price',$price);
  update_edit('fen_number',$fen_number);
  update_edit('sort_body',$sort_body);
  update_edit('dept_body',$dept_body);
  exit('<script>alert(\'设置成功\');history.back();</script>');

?>
