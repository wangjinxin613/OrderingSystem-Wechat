<?php
  require('../config/index_class.php');
  $real = $_POST['real_name'];
  $uid = $_POST['account'];
  $tel = $_POST['tel'];
  $money_still = $_POST['money_still'];
  $points = $_POST['points'];
  $cardtype = $_POST['cardtype'];
  $address = $_POST['address'];
  member_update('real_name',$real,$uid);
  member_update("tel",$tel,$uid);
  member_update("money_still",$money_still,$uid);
  member_update('points',$points,$uid);
  member_update('cardtype',$cardtype,$uid);
  member_update('address',$address,$uid);
  admin_log_add("修改用户‘{$real_name}’信息成功");
  exit('<script>alert(\'修改成功\');history.back();</script>');
?>
