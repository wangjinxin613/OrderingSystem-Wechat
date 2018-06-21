<?
	$tai_name = $_POST['tai_name'];
	require('config/index_class.php');
	$fen_id = $_POST['fen_id'];	

	$url = $_SERVER['HTTP_HOST'];
	$urls = "http://".$url."/diancan/index.php?id=$user->store_id&fen=$fen_id&tai=$tai_name&c=1";

	erweima1($urls);
	  echo '<center><img src="helloweba.png"></center>';
?>