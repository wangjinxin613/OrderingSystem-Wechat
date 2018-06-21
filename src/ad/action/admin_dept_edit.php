<?php
  require('../config/index_class.php');
  $dept_name = $_POST['dept_name'];
  $dept = $_POST['dept'];
  $beizhu = $_POST['beizhu'];
  $dept_body = implode(",", $dept);
  $dept_id = $_POST['dept_id'];
  function update_edit($name,$val){
    global $dept_id;
    $sql = "update admin_dept set $name = '$val' where dept_id = {$dept_id}";
    $result = mysql_query($sql);
  }
  update_edit('dept_name',$dept_name);
  update_edit('beizhu',$beizhu);
  update_edit('dept_body',$dept_body);
    admin_log_add("编辑权限‘{$dept_name}’成功");
    exit('<script>alert(\'编辑权限成功\');history.back();</script>');

?>
