<?php
	
    	include ('../config/conn.php');//链接数据库
  	function update($name,$val){
		 	$data = $_POST['data'];
	 	$sql = "update member set $name = '$val' where account_id = {$data}";
   		$result = mysql_query($sql);

   	}
   	update("rank",'normal');
exit('<script>alert(\'执行成功！\');history.back();</script>');	

?>