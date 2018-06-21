<html>  
    <head>  
        <meta http-equiv="pragma" content="no-cache">  
        <meta http-equiv="cache-control" content="no-cache">  
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
        <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>         
        <script type="text/javascript">  
            $(function () {  
                (function longPolling() {  
                    //alert(Date.parse(new Date())/1000);  
                    $.ajax({  
                        url: "testPush.php",  
                        data: {"timed": Date.parse(new Date())/1000},  
                        dataType: "text",  
                        timeout: 5000,//5秒超时，可自定义设置  
                        error: function (XMLHttpRequest, textStatus, errorThrown) {  
                            $("#state").append("[state: " + textStatus + ", error: " + errorThrown + " ]<br/>");  
                            if (textStatus == "timeout") { // 请求超时  
                                longPolling(); // 递归调用  
                            } else { // 其他错误，如网络错误等  
                                longPolling();  
                            }  
                        },  
                        success: function (data, textStatus) {  
                            $("#state").append(data+ " <BR>");  
                              
                            if (textStatus == "success") { // 请求成功  
                                longPolling();  
                            }  
                        }  
                    });  
  
                })();  
            });  
        </script>  
    </head>  
    <body>  
        <div id="state"></div>  
    </body>  
</html>  
