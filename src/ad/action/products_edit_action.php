<?php
  require('../config/index_class.php');
	header("Content-Type: text/html; charset=UTF8");
    $products_name = $_POST['products_name'];
  	//$products_type=$_POST['products_type'];
  	$products_price=$_POST['products_price'];
  	$sx=$_POST['sx'];
    $products_num1=$_POST['products_num1'];
  	$get_points = $_POST['get_points'];
include ('../config/conn.php');//链接数据库
	$image=$_POST['image'];
	if($_FILES["image"]["name"]!=null){

	//上传图片
	move_uploaded_file($_FILES["image"]["tmp_name"],
	"../../upload/" . $_FILES["image"]["name"]);
	$products_img = "../upload/" . $_FILES["image"]["name"];
		update("products_img",$products_img);
}
	function update($name,$val){
		 	$id=$_GET['id'];
	 	$sql = "update product set $name = '$val' where pid = {$id}";
   		$result = mysql_query($sql);

   	}
   	update("products_name",$products_name);
   	update("products_price",$products_price);
   	update("sx",$sx);
    update("products_num1",$products_num1);
   	update("get_points",$get_points);
	$id=$_GET['id'];
	//exit('<script>alert(\'执行成功！\');window.location.href="../Products_List.php";</script>');
  admin_log_add("修改商品‘{$products_name}’成功");
		exit('<script>alert(\'执行成功！\');history.back();</script>');
?>
