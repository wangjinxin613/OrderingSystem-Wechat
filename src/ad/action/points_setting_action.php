<?php
 	  require('../config/index_class.php');
    	$qd_points=$_POST['qd_points'];
      	$re_points=$_POST['re_points'];
		$share_points=$_POST['share_points'];
        function update($name,$val,$sqla){
    		 include ('../config/conn.php');//链接数据库
    	 	$sql = "update store_setting set $name = '$val' $sqla";
       		$result = mysql_query($sql);

       	}

       update("qd_points",$qd_points,$admin_sql1);
       update("re_points",$re_points,$admin_sql1);
	   update("share_points",$share_points,$admin_sql1);
       exit('<script>alert(\'执行成功！\');history.back();</script>');
?>
