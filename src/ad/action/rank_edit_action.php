<?php
  require('../config/index_class.php');
  $rank_id = $_POST['rank_id'];
  $rank_name = $_POST['rank_name'];
  $rank_beizhu = $_POST['rank_beizhu'];
  $rank_dept = $_POST['rank_dept'];
  $rank_zhe = $_POST['rank_zhe'];
  member_rank_update('rank_name',$rank_name,$rank_id);
  member_rank_update('rank_beizhu',$rank_beizhu,$rank_id);
  member_rank_update('rank_dept',$rank_dept,$rank_id);
  member_rank_update('rank_zhe',$rank_zhe,$rank_id);
  admin_log_add("更新等级‘{$rank_name}’成功");
  exit('<script>alert(\'执行成功！\');history.back();</script>');
?>
