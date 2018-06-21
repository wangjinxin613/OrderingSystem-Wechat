<?php
	
    	include ('../config/conn.php');//链接数据库
  	function update($name,$val){
		 	$data = $_POST['data'];
		 	$db = $_POST['db'];
		
	 	$sql = "update {$db} set $name = '$val' where id = {$data}";
   		$result = mysql_query($sql);

   	}
   	update("status",'1');
exit('<script>alert(\'执行成功！\');history.back();</script>');	

?>