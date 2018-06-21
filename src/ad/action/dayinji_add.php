<?
  require('../config/index_class.php');
  $fen_id = $_POST['fen_id'];
  $name = $_POST['name'];
  $beizhu = $_POST['beizhu'];
  $sorts = $_POST['sort'];
  $sort = implode(",", $sorts);
    $sql = "select * from dayinji where name ='$name' and store_id = '$user->store_id'";
  $rs = mysql_query($sql, $con);
  
  if(mysql_num_rows($rs)>0){  
  exit('<script>alert(\'打印机名称不可重名\');history.back();</script>');
  
}
  $sql = "insert into dayinji(id,name,beizhu,sort,store_id,fen_id,time) values (null,'$name','$beizhu','$sort','$user->store_id','$fen_id','$time')";
  mysql_query($sql);
  admin_log_add("添加打印机‘{$name}’成功");
    exit('<script>alert(\'添加打印机成功\');history.back();</script>');
?>