<?php
	require('../config/index_config.php');
	$id = $_POST['id'];
	$sql="select * from youhui_list where id = '$id'";//查询语句
			$res=mysql_query($sql);//执行查询
			while($r=mysql_fetch_assoc($res)){
					$ro[]=$r;//接受结果集
			}

			foreach($ro as $key=>$v){
				$type = $v['type'];
				$wu_money = $v['wu_money'];
				$man_max = $v['man_max'];
				$man_min = $v['man_min'];
				$time = $v['time'];
				$points = $v['points'];
			}
			$last_time = strtotime("+{$time} day"); 
			 $q="insert into my_youhui(id,type,wu_money,man_max,man_min,last_time,uid,store_id) values (null,'$type','$wu_money','$man_max','$man_min','$last_time','$user->user_id','$store_id')";//向数据库插入表单传来的值的sql
  			$re=mysql_query($q,$con);//执行sql
  		
  			update_youhui_number($id);
  				//修改账户积分余额及已用积分
  			points_update($points);
  			point_used_update($points);

?>
