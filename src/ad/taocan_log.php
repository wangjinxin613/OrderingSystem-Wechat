<?
  require('config/index_class.php');

    if(check_dept('34') == false){
  		  //exit('<script>alert(\'您没有权限访问本页面\');history.back();</script>');
  	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Cache-Control" content="no-siteapp" />
 <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/style.css"/>
        <link href="assets/css/codemirror.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/ace.min.css" />
        <link rel="stylesheet" href="font/css/font-awesome.min.css" />
        <!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->
		<script src="js/jquery-1.9.1.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/typeahead-bs2.min.js"></script>
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/jquery.dataTables.bootstrap.js"></script>
        <script src="assets/layer/layer.js" type="text/javascript" ></script>
        <script src="js/H-ui.js" type="text/javascript"></script>
        <script src="js/displayPart.js" type="text/javascript"></script>
        <script src="assets/laydate/laydate.js" type="text/javascript"></script>
<title>系统日志</title>
</head>

<body>
<div class="margin clearfix">
 <div id="system_style">
     <div class="search_style" style="display:none">

      <ul class="search_content clearfix">
       <li><label class="l_f">名称</label><input name="" type="text" class="text_add"style=" width:250px"></li>
       <li><label class="l_f">时间</label><input class="inline laydate-icon" id="start" style=" margin-left:10px;"></li>
       <li style="width:90px;"><button type="button" class="btn_search"><i class="fa fa-search"></i>查询</button></li>
      </ul>
    </div>
    <!--系统日志-->
    <div class="system_logs">
       <table class="table table-striped table-bordered table-hover" id="sample-table">
       <thead>
		 <tr>

        <th width="25"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th>
        <th width="80">ID</th>
        <th width="200">套餐名称</th>
        <th width="180">支付方式</th>
        <th width="180">操作者</th>
        <th width="200">时间</th>
        <th width="120">费用</th>
        <th width="150">状态</th>
			</tr>
		</thead>
        <tbody>
          <?php
          	taocan_log();
          ?>
        </tbody>
        </table>

    </div>
 </div>
</div>
</body>
</html>
<script>
  laydate({
    elem: '#start',
    event: 'focus'
});
$(function() {
  var oTable1 = $('#sample-table').dataTable( {
  "aaSorting":false,//默认第几个排序
  "bStateSave": true,//状态保存
  "aoColumnDefs": [
	//{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
	{"orderable":false,"aTargets":[0,2,3,4,5,6,7]}// 制定列不参与排序
  ]});
})
</script>
