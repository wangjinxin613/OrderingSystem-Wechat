<?php
		$ip = "127.0.0.1";//数据库地址
		$username = "root";//数据库用户名
		$password = "root";//密码
		$db = "can";//数据库名
		$unicode = "SET NAMES UTF8";
		$con = mysql_connect( $ip , $username , $password );//数据库连接语句
		$p = mysql_select_db( $db );//规定要连接的数据库
		mysql_query( $unicode );
		
?>
