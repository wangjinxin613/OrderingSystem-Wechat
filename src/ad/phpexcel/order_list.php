<?php
	error_reporting(0);
	require_once("../config/conn.php");
	require_once("Classes/PHPExcel.php");
	include("Classes/PHPExcel/IOFactory.php"); 
	
	header("Content-Type: text/html; charset=utf8");
	$type = $_GET['type'];
	$fen_id = $_GET['fen_id'];
	
	//$id=$_GET["id"];
	session_start();
	
	 $admin_id = $_SESSION['admin_id'];
	 mysql_select_db("my_db", $con);
	 $result1 = mysql_query("SELECT * FROM admin where id = '$admin_id'");
	 while($v = mysql_fetch_array($result1))
	 {
	 	$store_id = $v['store_id'];
	 }
	
	//创建一个excel对象
	$objPHPExcel = new PHPExcel();

	// Set properties  设置文件属性
	$objPHPExcel->getProperties()->setCreator("ctos")
        ->setLastModifiedBy("ctos")
        ->setTitle("Office 2007 XLSX Test Document")
        ->setSubject("Office 2007 XLSX Test Document")
        ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
        ->setKeywords("office 2007 openxml php")
        ->setCategory("Test result file");

	//set width  设置表格宽度
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(8);
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(45);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(45);
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
	
	
	
	

	//设置水平居中  
	$objPHPExcel->getActiveSheet()->getStyle('A')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objPHPExcel->getActiveSheet()->getStyle('B')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objPHPExcel->getActiveSheet()->getStyle('C')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objPHPExcel->getActiveSheet()->getStyle('D')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objPHPExcel->getActiveSheet()->getStyle('E')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objPHPExcel->getActiveSheet()->getStyle('F')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	
	
	
		
	// set table header content  设置表头名称 
	$objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A1', 'orderid')
        ->setCellValue('B1', 'product_name')
        ->setCellValue('C1', 'price')
        ->setCellValue('D1', 'order_type')
        ->setCellValue('E1', 'time')
        ->setCellValue('F1', 'paytype');
 
        
$rownum=1;
	if($type == 1){
     $today= date("Y/m/d");
   }else if($type==2){
     $today= date("Y/m/d",strtotime("-1 weeks"));
   }else if($type==3){
     $today= date("Y/m/d",strtotime("-1 months"));
   }else if($type==4){
     $today= date("Y/m/d",strtotime("-1 years"));
   }
   $zhou=strtotime($today);//获取当前时间
   if($fen_id == null){
   	$sql="select * from orderlist where store_id = '$store_id'";//查询语句
   }else{
   	$sql="select * from orderlist where store_id = '$store_id' and fen_id ='$fen_id'";//查询语句
   }
   

   $res=mysql_query($sql);//执行查询
   while($r=mysql_fetch_assoc($res)){
       $ro[]=$r;//接受结果集
   }
   foreach($ro as $key=>$v){
     if(strtotime($v['time']) > $zhou){
			
		$rownum++;
		$account_id = $v["id"];
		$wx_nickname = order_product($v['id'],'3');
		$wx_sex = $v["all_money"];
		$ordertype =order_ty($v['order_type']);
		
		
		$points=$v["time"];
		$tel =paytype2($v["paytype"]);
	
		
			
		$objPHPExcel->getActiveSheet()->setCellValue('A' . $rownum, $account_id);  
		$objPHPExcel->getActiveSheet()->setCellValue('B' . $rownum, $wx_nickname);
		$objPHPExcel->getActiveSheet()->setCellValue('C' . $rownum, $wx_sex);	
		$objPHPExcel->getActiveSheet()->setCellValue('D' . $rownum, $ordertype);	
		$objPHPExcel->getActiveSheet()->setCellValue('E' . $rownum, $points);	
		$objPHPExcel->getActiveSheet()->setCellValue('F' . $rownum, $tel);	
	
	}

	}
	
	$objPHPExcel->getActiveSheet()->setTitle('Simple');
	 function paytype2($id){
    if($id==1){
      return '微信支付';
    }else if($id==2){
     return '现金支付';
    }else if($id==3){
      return '会员卡支付';
    }else if($id==4){
      return '支付宝支付';
    }
  }
  function order_ty($id){
    if($id==1){
      return '店内点餐';
    }else if($id==2){
      return '外卖点餐';
    }else if($id==3){
      return '预定订单';
    }else if($id==4){
      return '快速买单';
    }
  }
  function order_product($id,$type){
  
    $sql="select * from cart,product where product.pid = cart.product_id and cart.order_id = '$id'  and cart.blog = '1'";//查询语句

    $res=mysql_query($sql);//执行查询
    while($row=mysql_fetch_assoc($res)){
        $rows[]=$row;//接受结果集
    }
    //遍历数组
    foreach($rows as $key=>$v){
      if($type==1){
      echo '<p> ';echo $v['products_name']; echo '(';echo $v['num']; echo ')</p>';
    }if($type==2){
      echo '
      <div class="product_info clearfix">
      <a href="#" class="img_link"><img src="';echo $v['products_img']; echo '" /></a>
      <span>
      <p style="font-size:20PX;color:#ff016b;">'; echo $v['products_name']; echo '</p>
     <p>所属分类：';product_sortname($v['sort_id']); echo '</p>
      <p>数量：'; echo $v['num']; echo '</p>
      <p>价格：<b class="price"><i>￥</i>';echo $v['products_price']; echo '</b></p>
      <p>在库数量：';echo $v['products_num1'];  echo '</p>
      <p>已售数量：';echo $v['products_num2']; echo '</i></p>
      </span>
      </div>
      ';
    }if($type==3){
      $dd = $v['products_name']."x".$v['num'];
      return $dd;
    }
    }
}
	// Set active sheet index to the first sheet, so Excel opens this as the first sheet
	$objPHPExcel->setActiveSheetIndex(0);

	//	$filename="销售订单".date('Y-m-d');
	// Redirect output to a client’s web browser (Excel5)
//	ob_end_clean();//清除缓冲区,避免乱码
	header('Content-Type: application/vnd.ms-excel');
	//	header('Content-Disposition: attachment;filename='.$filename);
	header('Content-Disposition: attachment;filename="订单明细表.xls"');

	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save('php://output');
	exit;
?>