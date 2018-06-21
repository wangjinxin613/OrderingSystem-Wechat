<?
  require('config/index_class.php');
  if(check_dept('2') == false){
      exit('<script>alert(\'您没有权限访问本页面\');history.back();</script>');
  }
  $fen_id = $_GET['fen_id'];
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
<div class="margin clearfix">
 <div class="" id="Other_Management">
   <div class="search_style">

     <ul class="search_content clearfix">

      <li><label class="l_f">门店选择：</label>
        <select style="width:200px" onchange="s_click(this)" name="select" id="select">

             <option value="?fen_id=0" <? if($fen_id == 0){ echo 'selected="selected"';}?> >总店</option>
           <?fendian_list('1',$fen_id);?>
        </select>
      </li>
      <li >当前门店：<? fendian_odd($fen_id);?></li>
     </ul>
   </div>
     <div class="list_style">
     <table class="table table-striped table-bordered table-hover" id="sample-table">
     <thead>
		 <tr>
				<th width="25"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th>
				<th width="80">用户ID</th>
				<th width="100">用户名</th>
				<th width="80">充值金额</th>
        <th width="80">赠送金额</th>
				<th width="120">充值方式</th>
        <th width="120">时间</th>
        <th width="80">门店</th>
				<th width="100">状态</th>
        <th width="120">操作</th>
			</tr>
		</thead>
	<tbody>
		<? chongzhi_log($admin_sql1,$fen_id);?>

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
