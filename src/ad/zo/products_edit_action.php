<?php
  require('../config/index_class1.php');
	header("Content-Type: text/html; charset=UTF8");
    $products_name = $_POST['products_name'];
  	//$products_type=$_POST['products_type'];
  	$products_price=$_POST['products_price'];
  	$sx=$_POST['sx'];
    $cbt=$_POST['cbt'];
    $p_body=$_POST['p_body'];
  	$products_num1=$_POST['products_num1'];
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
	 	$sql = "update zo_product set $name = '$val' where pid = {$id}";
   		$result = mysql_query($sql);

   	}
   	update("products_name",$products_name);
   	update("products_price",$products_price);
   	update("sx",$sx);
    update("cbt",$cbt);
    update("p_body",$p_body);
   	update("products_num1",$products_num1);

exit('<script>alert(\'执行成功！\');history.back();</script>');

?>
