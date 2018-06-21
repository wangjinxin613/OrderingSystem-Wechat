<?php
 	  require('../config/index_class.php');
    	$store_pinglun=$_POST['pinglun'];
      	$store_pingbi=$_POST['store_pingbi'];
        function update($name,$val,$sqla){
    		 include ('../config/conn.php');//链接数据库
    	 	$sql = "update store_setting set $name = '$val' $sqla";
       		$result = mysql_query($sql);

       	}

       update("store_pinglun",$store_pinglun,$admin_sql1);
       update("store_pingbi",$store_pingbi,$admin_sql1);
       exit('<script>alert(\'执行成功！\');history.back();</script>');
?>
