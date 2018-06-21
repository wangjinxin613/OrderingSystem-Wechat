<?php
header('Content-Type: text/event-stream'); // text/event-stream是专门为SSE设计的MIME类型
header('Cache-Control: no-cache');
$time = date('H:i:s');
echo "data: The server time is: {$time}\n\n";
echo "retry: 1000\n\n"; //Firefox默认为5秒
?>