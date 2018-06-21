<?
  require('../config/index_class.php');
  $id = $_POST['id'];
  $account_id = $_POST['account_id'];
  $money = $_POST['money'];
  $money_still1 = member_info($account_id,'1');
  $money_still = (int)$money_still1;

  if($money > $money_still){
        exit('<script>alert(\'该账户对用余额不足，无法完成该操作\');;</script>');
  }
  $sql = "update tixian set blog = '1' where id = '$id'";
  $result = mysql_query($sql);//更新提现记录的状态

  echo $account_id;
  echo $money;


  $sql1 = "update member set money_still = money_still - {$money} where account_id = '$account_id'";
  $result = mysql_query($sql1);//更新提现记录的状态
  exit('<script>alert(\'执行成功\');history.back();</script>');
?>
