<?php
require('../../config/index_class.php');
	$id = $_POST['id'];

		$sql="select * from my_lipin where id = '$id' and status = '1'";//查询语句
			$res=mysql_query($sql);//执行查询
			while($r=mysql_fetch_assoc($res)){
					$ro[]=$r;//接受结果集
			}
			if($ro == null){
				 exit('<script>alert(\'查询不到有该兑换码或该兑换码已经兑换！！\');history.back();</script>');
			}else{
				my_lipin_update('admin_id',$user->admin_id,$id);
				my_lipin_update('admin_name',$user->admin_name,$id);
				my_lipin_update('dui_time',$time,$id);
				my_lipin_update('status','2',$id);

				 echo '<script>alert(\'兑换成功！！\');window.location.href="../my_lipin_detail.php?id=';echo $id; echo '";</script>';
			}
			
?>