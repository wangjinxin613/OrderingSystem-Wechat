<?php
	session_start();
	$id=$_POST['id'];
	$pid=$_POST['pid'];
	require('../../config/index_class.php');
  	require('../../config/conn.php');
	$uid = "ad$user->admin_id";
  	$sql1 = mysql_query("SELECT * FROM cart where product_id = {$pid} and uid = '$uid' and blog = '0'") or die(mysql_error());
   		 $number = mysql_num_rows($sql1);

	if($number==0){
		$q="insert into cart(id,uid,product_id,num,store_id) values (null,'$uid','$pid','$id','$user->store_id')";
	 	mysql_query($q,$con);//执行sql
	}else{
		$sql = "update cart set num = {$id} where product_id = {$pid} and uid = '$uid' and blog = '0'" ;
   		$result = mysql_query($sql);
	}
?>
