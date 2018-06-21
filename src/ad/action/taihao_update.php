<?php
 /**
  * 该页面功能用于更新台号数据
  * @var [type]
  */
  require('../config/index_class.php');
  $id = $_POST['id'];
  $tai_name = $_POST['tai_name'];
  $shuxu = $_POST['shunxu'];
  $fen_id = $_POST['fen_id'];

  function update($name,$val,$id){

    $sql = "update taihao set $name = '$val' where id = '$id'";
    mysql_query($sql);
  }
  update('tai_name',$tai_name,$id);
  update('shunxu',$shuxu,$id);
  update('fen_id',$fen_id,$id);
  exit('<script>alert(\'执行成功！\');history.back();</script>');
?>
