<?php
  require('../config/index_class.php');
  $id = $_POST['id'];
  $money = $_POST['money'];
  
 
  $time = $_POST['time'];
  $number1 = $_POST['number1'];
  $number2 = $_POST['number2'];
  $points = $_POST['points'];
  $beizhu = $_POST['beizhu'];

  	daijin_update('money',$money,$id);
  
 	daijin_update('time',$time,$id);
  	daijin_update('number1',$number1,$id);
  	daijin_update('number2',$number2,$id);
  	daijin_update('points',$points,$id);
  	daijin_update('man_max','',$id);
  	daijin_update('man_min','',$id);
  	daijin_update('beizhu',$beizhu,$id);
  
  exit('<script>alert(\'执行成功！\');history.back();</script>');
  ?>