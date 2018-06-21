<?php
	require('../config/index_config.php');
	$id = $_POST['id'];
	$sql="select * from lipin_list where id = '$id'";//查询语句
			$res=mysql_query($sql);//执行查询
			while($r=mysql_fetch_assoc($res)){
					$ro[]=$r;//接受结果集
			}

			foreach($ro as $key=>$v){
				
				$name = $v['name'];
			
				$time = $v['time'];
				$points = $v['points'];
			}
			
			 $q="insert into my_lipin(id,name,uid,store_id) values (null,'$name','$user->user_id','$store_id')";//向数据库插入表单传来的值的sql
  			$re=mysql_query($q,$con);//执行sql
  			update_lipin_number($id);
  			//修改账户积分余额及已用积分
  			point_used_update($points);
  			points_update($points);
  			

?>
