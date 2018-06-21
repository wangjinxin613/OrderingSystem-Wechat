<?
  require('../config/index_config.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>门店地址</title>
		 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link href="../styles/base.css" type="text/css" rel="stylesheet" />
<script charset="utf-8" src="http://map.qq.com/api/js?v=2.exp"></script>
	</head>
	<body >
		<div class="head">
			<img src="../images/return.png" style="width:23px;float:left;margin-left:20px;" onClick="javascript:history.back(-1)"><span style=";">门店地址</span><span style="width:40px;float:right;">&nbsp;</span>
		</div>
		<div style="padding-bottom:55px;"></div>
  </body>
  <div id="container" style="width:100%;height:480PX;"></div>
  <script>
  function init() {
    var center = new qq.maps.LatLng(<?if($item->zuobiao == null){
      echo '39.935013,116.376801';
    }else{  echo $item->zuobiao;}?>);
    var map = new qq.maps.Map(document.getElementById('container'),{
        center: center,
        zoom: 13
    });
    //创建marker
    var marker = new qq.maps.Marker({
        position: center,
        map: map
    });
}

  function loadScript() {
    var script = document.createElement("script");
    script.type = "text/javascript";
    script.src = "http://map.qq.com/api/js?v=2.exp&callback=init";
    document.body.appendChild(script);
  }

  window.onload = loadScript;
</script>
</html>
