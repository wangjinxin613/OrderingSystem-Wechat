<?php
 	  require('../config/index_class.php');
	   header("Content-Type: text/html; charset=UTF8");
    $appid = $_POST['appid'];
    $mchid = $_POST['mchid'];
    $keys = $_POST['keys'];
    $appsecret=$_POST['appsecret'];
    $tid1=$_POST['tid1'];
    $tid2=$_POST['tid2'];
    $tid3=$_POST['tid3'];
    $tid4=$_POST['tid4'];
    $tid5=$_POST['tid5'];
  	$tid6=$_POST['tid6'];

    function update($name,$val,$sqla){
     include ('../config/conn.php');//链接数据库
    $sql = "update store_setting set $name = '$val' $sqla";
      $result = mysql_query($sql);

    }
	if($_FILES["image"]["name"]!=null){

	//上传图片
	move_uploaded_file($_FILES["image"]["tmp_name"],
	"../../upload/" . $_FILES["image"]["name"]);
	$products_img = "../upload/" . $_FILES["image"]["name"];
		update("wx_erweima",$products_img);
}
    update("appid",$appid,$admin_sql1);
    update("mchid",$mchid,$admin_sql1);
    update("mchid_key",$keys,$admin_sql1);
     update("appsecret",$appsecret,$admin_sql1);
     update("tid1",$tid1,$admin_sql1);
     update("tid2",$tid2,$admin_sql1);
     update("tid3",$tid3,$admin_sql1);
     update("tid4",$tid4,$admin_sql1);
     update("tid5",$tid5,$admin_sql1);
     update("tid6",$tid6,$admin_sql1);
     exit('<script>alert(\'执行成功！\');history.back();</script>');
    echo $keys;
?>
