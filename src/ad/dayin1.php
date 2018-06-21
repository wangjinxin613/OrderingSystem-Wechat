<?php
	error_reporting(0);
	require('config/conn.php');
	header("Content-Type: text/html; charset=utf8");
	session_start();
     $admin_id = $_SESSION['admin_id'];
   mysql_select_db("my_db", $con);
   $result1 = mysql_query("SELECT * FROM admin where id = '$admin_id'");
   while($v = mysql_fetch_array($result1))
   {
    $store_id = $v['store_id'];
   }
     $dayin = $_GET['dayin'];
   $dayin = "Fax"; 
   $result2 = mysql_query("SELECT * FROM dayinji where name = '$dayin' and store_id = '$store_id'");
   while($v = mysql_fetch_array($result2))
   {
    $sorts = $v['sort'];
    $fen_id = $v['fen_id'];
   }
 
    $sort =explode(",",$sorts); 
 
		 $admin_id = $_SESSION['admin_id'];
	 mysql_select_db("my_db", $con);
	 $result1 = mysql_query("SELECT * FROM admin where id = '$admin_id'");
	 while($v = mysql_fetch_array($result1))
	 {
	 	$store_id = $v['store_id'];
	 }
	 $result1 = mysql_query("SELECT * FROM orderlist where store_id = '$store_id' and dayin = '0' and status = '1' and fen_id = '$fen_id'");
	 while($v = mysql_fetch_array($result1))
	 {
	 	$id = $v['id'];
	 }
    $sql = "update orderlist set dayin = '1' where id = '$id'";
    mysql_query($sql);

     $sql="select * from orderlist where id = '$id' and store_id = '$store_id'";//查询语句
      $res=mysql_query($sql);//执行查询
      while($row=mysql_fetch_assoc($res)){
          $rows[]=$row;//接受结果集
      }
      //遍历数组
      foreach($rows as $key=>$v){
       $idx = $v['id'];
          $sql="select * from cart,product where product.pid = cart.product_id and cart.order_id = '$idx'  and cart.blog = '1'";//查询语句

    $res=mysql_query($sql);//执行查询
    while($row=mysql_fetch_assoc($res)){
        $rows[]=$row;//接受结果集
    }
    //遍历数组
    foreach($rows as $key=>$r){
  
     if (in_array($r['sort_id'], $sort)) {  

        $res = '1';
      }
    }
    if($res==1){
    
    
        echo '
    <div style="font-size:10px;line-height: 10px;letter-spacing: 0px">
  <h3 style="text-align: center;width:100%;padding:5px 0;font-size:12px;">'; fendian_odd1($v['fen_id']);echo '网上订餐</h3>
  <p style="font-size:10px;">订单编号：';echo $v['id']; echo '</p>  
  <p style="font-size:10px;">会员编号：';echo $v['order_uid']; echo '</p>  
  <p style="font-size:10px;">微信：';echo $v['order_name']; echo '</p>
  <p style="font-size:10px;">电话：';echo $v['tel']; echo '</p>
  <p style="font-size:10px;">支付状态：'; if($v['status']==0){ echo '未支付';}else if($v['status']==1){ paytype2($v['paytype']);echo '支付';}echo '</p>
  '; if($v['order_type']=='2'){echo ' <p style="line-height:15px;font-size:10px;">地址:'; echo $v['sh_address'];echo '</p>';}
  if($v['order_type']=='1' || $v['order_type']=='5'){echo ' <p style="line-height:15px;font-size:10px;">台号:'; echo $v['order_desk'];echo '</p>';} echo '
  <p>下单时间:';echo $v['time'];echo '</p >
  <HR>
    <table style="letter-spacing: -3px;border:0;display: block;font-size:10px;">
      <tr>
        <td width="46%">商品</td>
        <td  width="18%">单价</td>
        <td width="18%">数量</td>
        <td  width="18%">金额</td>
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
</div>';
}
      }
     
        function fendian_odd1($id){
        global $store_id;
   
      $sql="select * from fendian where store_id = '$store_id' and id = '$id'";//查询语句
      $res=mysql_query($sql);//执行查询
      while($row=mysql_fetch_assoc($res)){
          $rows[]=$row;//接受结果集
      }
      foreach($rows as $key=>$v){

          echo $v['fen_name'];


      }
       $result1 = mysql_query("SELECT * FROM store_setting where store_id = '$store_id'");
	 while($v = mysql_fetch_array($result1))
	 {
	 	$store_name = $v['store_name'];
	 }
      if($id==0 || $id == null){
        echo $store_name;
      }
    }
    /**
 * [order_product 传入order_id输出商品信息]
 * @param  [type] $id [description]
 * @return [type]     [description]
 */
  function order_product($id,$type){
    global $user;
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
    }else if($type==3){
      $p = $v['products_price'];
      $n = $v['num'];
      $all = $p * $n;
      echo " <tr>
        <td>{$v['products_name']}</td>
        <td>{$v['products_price']}</td>
        <td>{$v['num']}</td>
        <td>{$all}</td>
      </tr>";
    }
    }
}
function orderlist_youhui1($id){

    $sql="select * from my_youhui where id = {$id} ";//查询语句
        $res=mysql_query($sql);//执行查询
        while($r=mysql_fetch_assoc($res)){
            $ro[]=$r;//接受结果集
        }
        foreach($ro as $key=>$v){
          if($v['type'] == 1){
            echo '<div class="pay">';echo "无门槛减{$v['wu_money']}优惠券"; echo '<span style="float:right">-￥'; echo $v['wu_money'];echo '</span></div>';
          }else if($v['type']==2){
            echo '<div class="pay">';echo "满{$v['man_max']}减{$v['man_min']}优惠券"; echo '<span style="float:right">-￥';echo $v['man_min']; echo '</span></div>';
          }

        }
  }
  /**
    根据代金券id查询优惠券信息。用于订单详情展示页面
  **/
  function orderlist_daijin1($id){

    $sql="select * from my_daijin where id = '$id' ";//查询语句
        $res=mysql_query($sql);//执行查询
        while($r=mysql_fetch_assoc($res)){
            $ro[]=$r;//接受结果集
        }
        foreach($ro as $key=>$v){

            echo '<div class="pay">';echo "{$v['money']}代金券"; echo '<span>-￥';echo $v['money']; echo '</span></div>';
          }


  }
     function paytype2($id){
    if($id==1){
      echo '已微信';
    }else if($id==2){
      echo '已现金';
    }else if($id==3){
      echo '已会员卡';
    }else if($id==4){
      echo '已支付宝';
    }
  }
  ?>