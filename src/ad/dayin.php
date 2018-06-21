<?php
    require('config/index_class.php');
    $id = $_POST['id'];
    $sql = "update orderlist set dayin = '1' where id = '$id'";
    mysql_query($sql);
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
		

  <script language="javascript" src="../dayin/LodopFuncs.js"></script>
  <script>
  //  setTimeout('myPrint()',1000);
  </script>
<title>订单管理</title>
</head>

<body>
    <div style="margin:120px auto;text-aligen:center;margin-left:20%">
    如果没有开始打印，您还可以选择
    <a href="javascript:myPrint()"><b>直接打印</b></a> 
<a href="javascript:myPreview()"><b>打印预览</b></a>
<a href="javascript:myPrintA()"><b>选择打印机</b></a>
<a href="javascript:mySetup()"><b>打印维护</b></a>
<a href="javascript:myDesign()"><b>打印设计</b></a>
<a href="javascript:history.back()"><b>返回上一页</b></a>
</div>
</body>
     <?
     $sql="select * from orderlist where id = '$id' and store_id = '$user->store_id'";//查询语句
      $res=mysql_query($sql);//
      while($row=mysql_fetch_assoc($res)){
          $rows[]=$row;//接受结果集
      }
      //遍历数组
      foreach($rows as $key=>$v){
        echo '
        <textarea rows="15" id="textarea01" cols="80" style="display:none">
    <div style="font-size:12px;line-height: 10px;letter-spacing: 0px">
  <h3 style="text-align: center;width:100%;padding:5px 0;font-size:10px;">'; fendian_odd1($v['fen_id']);echo '网上订餐</h3>
  <p style="font-size:10px;">订单编号：';echo $v['id']; echo '</p>  
  <p style="font-size:10px;">会员编号：';echo $v['order_uid']; echo '</p>  
  <p style="font-size:10px;">微信：';echo $v['order_name']; echo '</p>
  <p style="font-size:10px;">电话：';echo $v['tel']; echo '</p>
  <p style="font-size:10px;">支付状态：'; if($v['status']==0){ echo '未支付';}else if($v['status']==1){ paytype2($v['paytype']);echo '支付';}echo '</p>
  '; if($v['order_type']=='2'){echo ' <p style="line-height:15px;font-size:10px;">地址:'; echo $v['sh_address'];echo '</p>';}
  if($v['order_type']=='1' || $v['order_type']=='5'){echo ' <p style="line-height:15px;font-size:10px;">台号:'; echo $v['order_desk'];echo '</p>';} echo '
  <p style="font-size:10px;">下单时间:';echo $v['time'];echo '</p >
  <HR>
    <table style="letter-spacing: -1px;border:0;display: block;font-size:13px;">
      <tr>
        <td width="46%">商品</td>
        <td  width="20%">单价</td>
        <td width="20%">数量</td>
        <td  width="20%">金额</td>
      </tr>
      '; order_product($v['id'],'3'); 
   
echo '
    </table>
  
  <p style="line-height:15px;">备注：';echo $v['beizhu']; echo '</p>
  ';      orderlist_youhui1($v['yid']); orderlist_daijin1($v['did']);echo '

  <HR>
  <p style="float:right">合计：';echo $v['all_money']; echo '元</p>
  <div style="clear:both"></div>


  <p style="text-align: center;">谢谢惠顾，欢迎您的光临</p>
</div> </textarea>';
      }
  ?>
 
</body>
<script language="javascript" type="text/javascript">        
        var LODOP; //声明为全局变量       
    function myPrint() {               
        CreatePrintPage();       
        LODOP.PRINT();             
    };         
    function myPrintA() {              
        CreatePrintPage();       
        LODOP.PRINTA();            
    };             
    function myPreview() {             
        CreatePrintPage();       
        LODOP.PREVIEW();               
    };             
    function mySetup() {               
        CreatePrintPage();       
        LODOP.PRINT_SETUP();               
    };         
    function myDesign() {              
        CreatePrintPage();       
        LODOP.PRINT_DESIGN();              
    };         
    function myBlankDesign() {       
        LODOP=getLodop();         
        LODOP.PRINT_INIT("打印控件功能演示_Lodop功能_空白练习");             
        LODOP.PRINT_DESIGN();              
    };      

    function CreatePrintPage() {       
        LODOP=getLodop();         
        LODOP.PRINT_INIT("");
        LODOP.SET_PRINT_PAGESIZE(1,"580","1300","");
        LODOP.ADD_PRINT_HTM(10,10,"100%","100%",document.getElementById("textarea01").value);      
    };       
     
</script>  
</html>