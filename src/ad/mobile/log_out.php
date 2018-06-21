<?php

	session_start();
session_destroy();
	exit('<script>alert(\'退出成功\');history.back();</script>');
?>