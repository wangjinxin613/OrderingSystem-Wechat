<?
  require('../config/index_class.php');
  $fen_id = $_POST['fen_id'];
  $id = $_POST['id'];
  $name = $_POST['name'];
  $beizhu = $_POST['beizhu'];
  $sorts = $_POST['sort'];
  $sort = implode(",", $sorts);
 function update($name,$val){
    global $id;
    $sql = "update dayinji set $name = '$val' where id = {$id}";
    $result = mysql_query($sql);
  }
    update('name',$name);
    update('beizhu',$beizhu);
    update('sort',$sort);
  admin_log_add("修改打印机‘{$name}’成功");
    exit('<script>alert(\'修改打印机成功\');history.back();</script>');
?>