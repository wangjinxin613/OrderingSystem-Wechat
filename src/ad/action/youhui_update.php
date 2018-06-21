<?php
  require('../config/index_class.php');
  $id = $_POST['id'];
  $type = $_POST['y_type'];
  $wu_money = $_POST['wu_money'];
  $man_max = $_POST['man_max'];
  $man_min = $_POST['man_min'];
  $time = $_POST['time'];
  $number1 = $_POST['number1'];
  $number2 = $_POST['number2'];
  $points = $_POST['points'];
  $beizhu = $_POST['beizhu'];
  if($type==1 && $wu_money != null){
  	youhui_update('type','1',$id);
  	youhui_update('wu_money',$wu_money,$id);
  	youhui_update('time',$time,$id);
  	youhui_update('number1',$number1,$id);
  	youhui_update('number2',$number2,$id);
  	youhui_update('points',$points,$id);
  	youhui_update('man_max','',$id);
  	youhui_update('man_min','',$id);
  	youhui_update('beizhu',$beizhu,$id);
  }else if($type==2 && $man_max != null && $man_min != null){
  	youhui_update('type','2',$id);
  	youhui_update('wu_money','',$id);
  	youhui_update('man_max',$man_max,$id);
  	youhui_update('man_min',$man_min,$id);
  	youhui_update('time',$time,$id);
  	youhui_update('number1',$number1,$id);
  	youhui_update('number2',$number2,$id);
  	youhui_update('points',$points,$id);
  	youhui_update('beizhu',$beizhu,$id);
  }else{
  	exit('<script>alert(\'数据填写有误，请重新填写！\');history.back();</script>');
  }
  exit('<script>alert(\'执行成功！\');history.back();</script>');