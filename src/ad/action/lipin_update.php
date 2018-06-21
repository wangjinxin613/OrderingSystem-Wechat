<?php
  require('../config/index_class.php');
  $id = $_POST['id'];
  $name = $_POST['l_name'];
  

  $number1 = $_POST['number1'];
  $number2 = $_POST['number2'];
  $points = $_POST['points'];
  $beizhu = $_POST['beizhu'];

  	lipin_update('name',$name,$id);
  
 	
  	lipin_update('number1',$number1,$id);
  	lipin_update('number2',$number2,$id);
  	lipin_update('points',$points,$id);
  	lipin_update('man_max','',$id);
  	lipin_update('man_min','',$id);
  	lipin_update('beizhu',$beizhu,$id);
  
exit('<script>alert(\'执行成功！\');history.back();</script>');