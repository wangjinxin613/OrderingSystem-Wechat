<?
  require('config/index_class1.php');
  /** if(check_dept('25') == false){
      exit('<script>alert(\'您没有权限访问本页面\');history.back();</script>');
  }**/
  $type = $_GET['type'];
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
        <script src="assets/laydate/laydate.js" type="text/javascript"></script>
        <script type="text/javascript">
        			 //select跳页
        			 function s_click(obj) {
        					 var num = 0;
        					 for (var i = 0; i < obj.options.length; i++) {
        							 if (obj.options[i].selected == true) {
        									 num++;
        							 }
        					 }
        					 if (num == 1) {
        							 var url = obj.options[obj.selectedIndex].value;

        							 window.location.href=url;
        					 }
        			 }
        	 </script>

<title>积分管理</title>
</head>

<body>
 <div class="border clearfix search_style">
       <span class="l_f">
        <a href="?type=1" class="btn btn-warning">今日新增</a>
				<a href="?type=2" class="btn btn-warning">本周新增</a>
				<a href="?type=3" class="btn btn-warning">本月新增</a>
      	<a href="?type=4" class="btn btn-warning">本年新增</a>
      	<a href="phpexcel/zo_xiaofei.php?type=<? echo $type?>&time=$time" id="member_add" class="btn">以下数据导出</a>
       </span>


				


     </div>
     <div class="list_style">
     <table class="table table-striped table-bordered table-hover" id="sample-table">
     <thead>
		 <tr>
				<th width="25"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th>
				<th width="80">用户ID</th>
				<th width="100">用户名</th>
				<th width="80">消费金额</th>
        <th width="80">赠送积分</th>
				<th width="120">消费方式</th>
        <th width="120">时间</th>
        <th width="80">门店</th>


			</tr>
		</thead>
	<tbody>
		<? xiaofei_log($type);?>

        </tbody>
     </table>
     </div>

 </div>
</div>

</body>
</html>
<script>
jQuery(function($) {
				var oTable1 = $('#sample-table').dataTable( {
				"aaSorting": [[ 1, "desc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[0,2,3,6]}// 制定列不参与排序
		] } );


				$('table th input:checkbox').on('click' , function(){
					var that = this;
					$(this).closest('table').find('tr > td:first-child input:checkbox')
					.each(function(){
						this.checked = that.checked;
						$(this).closest('tr').toggleClass('selected');
					});

				});
			});



/*用户-删除*/
function member_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
			$(obj).parents("tr").find("#in").submit();
		layer.msg('已删除!',{icon:1,time:1000});
	});
}
//积分浏览
function integration_history(id){
	layer.open({
    type: 1,
	title:'积分获取记录',
	area: ['800px','400px'],
	shadeClose: true,
	content: $('#integration_history'),
	})
		$('#integration_history_list').dataTable({
		"aaSorting": [[ 1, "desc" ]],//默认第几个排序
    "bStateSave": true,//状态保存
    "aoColumnDefs": [{
	  "bSortable": false,
	  "orderable":false,
	  "aTargets": [0,1]
	 }]
});

	};
//浏览记录

function Browse_history(id){
	layer.open({
    type: 1,
	title:'浏览记录',
	area: ['800px','400px'],
	shadeClose: true,
	content: $('#Browse_history'),
	})
$('#Browse_history_list').dataTable({
	"aaSorting": [[ 1, "desc" ]],//默认第几个排序
    "bStateSave": true,//状态保存
    "aoColumnDefs": [{
	  "bSortable": false,
	  "orderable":false,
	  "aTargets": [0,1]
	}]
});
}


//购物记录
function Order_history(id){
	layer.open({
    type: 1,
	title:'购物记录',
	area: ['800px','400px'],
	shadeClose: true,
	content: $('#Order_history'),
	});
		$('#Order_history_list').dataTable({
		"aaSorting": [[ 1, "desc" ]],//默认第几个排序
    "bStateSave": true,//状态保存
    "aoColumnDefs": [{
	  "bSortable": false,
	  "orderable":false,
	  "aTargets": [0,1]
	 }]
});
}


</script>
