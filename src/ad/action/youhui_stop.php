<?php
	
    	include ('../config/conn.php');//链接数据库
  	function update($name,$val){
  			$db = $_POST['db'];		
		 	$data = $_POST['data'];
		 	
	 	$sql = "update {$db} set $name = '$val' where id = {$data}";
   		$result = mysql_query($sql);

   	}
   	update("status",'0');
exit('<script>alert(\'执行成功！\');history.back();</script>');	

?>