<?php
/**该页面主要是一些总后台操作的函数
	*比较重要
	*总管理员
	*time:2016-01-8
 */
include ('conn.php');
header("Content-Type: text/html; charset=utf8");
error_reporting(0);
 $time= date("Y/m/d H:i:s");//获取当前时间
//判断是否登录成功
session_start();
if($_SESSION['zo_dept'] != true)
	 {//检验是否通过验证，没有回到首页
		 header('location:login.html');
	 }

	 /**
 * admin 用户基本信息
 */
  class userinfo{
	 	//获取会员信息
	 	public $admin_id;
	 	public $admin_name;
		public $admin_password; //用户密码
	 	public $store_id; //店铺id
	 	public $admin_truename; //真实姓名
	 	public $admin_sex; //性别
	 	public $admin_weixin; //微信号
	 	public $admin_tel; //移动电话
	 	public $admin_email; //电子邮箱
	 	public $admin_dept; //权限组

	 	public $time; //注册时间
	 	public $admin_money; //账户余额
	 	public $admin_type; //用户类型
	 	public $money_used; //已用金额
	 	public $zo_dept; //检测是否是总管理员
    public $admin_status; //检测管理员账户是否启用
	 }
	 $user = new userinfo();

	 $admin_id = $_SESSION['zo_id'];
	 mysql_select_db("my_db", $con);
	 $result1 = mysql_query("SELECT * FROM admin where id = '$admin_id'");
	 while($v = mysql_fetch_array($result1))
	 {
	 	$user->admin_id = $v['id'];
	 	$user->admin_name = $v['admin_name'];
		$user->admin_password = $v['admin_password'];
	 	$user->store_id = $v['store_id'];
	 	$user->admin_truename = $v['admin_truename'];
	 	$user->admin_sex = $v['admin_sex'];
	 	$user->admin_weixin = $v['admin_weixin'];
	 	$user->admin_tel = $v['admin_tel'];
	 	$user->admin_email = $v['admin_email'];
	 	$user->admin_dept = $v['admin_dept'];
	 	$user->time = $v['time'];
	 	$user->admin_money = $v['admin_money'];
	 	$user->admin_type = $v['admin_type'];
	 	$user->money_used = $v['money_used'];
	 	$user->zo_dept = $v['zo_dept'];
	  $user->admin_status = $v['admin_status'];
	 }

	  /************************************用户权限类******************************/
   class admin_dept{
     public $dept_body;
      public function test($dept_id){
        $result1 = mysql_query("SELECT * FROM zo_dept where dept_id = '$dept_id'");
        while($v = mysql_fetch_array($result1))
        {
            $dept_body = $v['dept_body'];
        }
          $this->dept_body = explode(",",$dept_body);

      }
   }
   $dept = new admin_dept($user->admin_dept);
   $dept->test($user->admin_dept);
   /**
    * 分销商城商品列表
    * @param  [type] $sql1 [description]
    * @return [type]       [description]
    */
   function product_list($sql1){
     global $user; //因为此处设计俩个表 不能通过引入外部变量 后续可能需要修改这里
     $sql="select * from zo_product JOIN zo_product_sort ON zo_product_sort.id = zo_product.sort_id ";//查询语句
     $res=mysql_query($sql);//执行查询
     while($row=mysql_fetch_assoc($res)){
         $rows[]=$row;//接受结果集
     }
     //遍历数组
     foreach($rows as $key=>$v){
       echo '
          <tr>
             <td width="25px"><label><input type="checkbox" class="ace" ><span class="lbl"></span></label></td>
             <td width="80px">'; echo $v['sx']; echo '</td>
             <td width="200px"><u style="cursor:pointer" class="text-primary" onclick="">'; echo $v['products_name']; echo '</u></td>
               <td><span class="ad_img"><a href="products/a.jpg" data-rel="colorbox" data-title="广告图"><img src="'; echo $v['products_img']; echo '"  style="width:100px;"/></a></span></td>
             <td width="100px">';echo $v['products_price'];echo '</td>
             <td width="100px">';echo $v['products_num1'];echo '</td>
             <td width="100px">';echo $v['products_num2'];echo '</td>
             <td class="text-l">';echo $v['sort_name'];echo '</td>
             <td class="td-manage">
             <form action="" method="post" style="float:left;margin-left:35px;"><p><a title="编辑" onclick='; echo "'"; echo 'member_edit("编辑商品","zo_products-edit.php?id='; echo $v['pid']; echo '","4","","450")';echo "'"; echo ' href="javascript:;"  class="btn btn-xs btn-info" ><i class="icon-edit bigger-120"></i></a></form>
             <form action="zo/delete_product.php" id="in" method="post" style="float:left;"><input type="text" name="odd_id" value="'; echo $v['pid']; echo '"	style="display:none;"/><input type="text" value="zo_product" name="odd_db" style="display:none;"/><button title="删除" href="javascript:;" type="button" class="btn btn-xs btn-warning" value="" onclick="member_del(this,';echo "'1'"; echo ')"><i class="icon-trash  bigger-120"></i></button></form></p>
            </td>
         </tr>';
       }
   }
   /**
    * 分销商城商品分类
    * @param  [type] $sql [description]
    * @return [type]      [description]
    */
   function product_sort_list(){
     $sql="select * from zo_product_sort order by sort_sx asc ";//查询语句
     $res=mysql_query($sql);//执行查询
     while($row=mysql_fetch_assoc($res)){
         $rows[]=$row;//接受结果集
     }
     foreach($rows as $key=>$v){
       echo '
           <tr>
            <td><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
            <td>'; echo $v['id']; echo '</td>
            <td>'; echo $v['sort_name']; echo '</td>
            <td>'; echo $v['sort_sx']; echo '</td>
            <td>'; echo $v['sort_body']; echo '</td>
            <td>'; echo $v['time']; echo '</td>
            <td class="td-manage">
             <form action="" method="post" style="float:left;margin-left:80px;"><p><a title="编辑" onclick='; echo "'"; echo 'member_edit("编辑分类","zo_sort_edit.php?id=';echo $v['id']; echo '","4","","450")';echo "'"; echo ' href="javascript:;"  class="btn btn-xs btn-info" ><i class="fa fa-edit bigger-120"></i></a></form>
             <form action="action/delete_odd.php" method="post" style="float:left;margin-left:20px;" id="in"><input type="text" name="odd_id" value="'; echo $v['id']; echo '"	style="display:none;"/><input type="text" value="zo_product_sort" name="odd_db" style="display:none;"/><button title="删除" href="javascript:;" type="button" class="btn btn-xs btn-warning" value="" onclick="member_del(this,';echo "'1'"; echo ')"><i class="fa fa-trash  bigger-120"></i></button></form></p></td>
           </tr>';
       }
   }
   /**
    * 用于商品添加的分类选择列表
    * @param [type] $sql [description]
    */

     function product_add_sort(){
       $sql="select * from zo_product_sort";//查询语句
       $res=mysql_query($sql);//执行查询
       while($row=mysql_fetch_assoc($res)){
           $rows[]=$row;//接受结果集
       }

       //遍历数组
       foreach($rows as $key=>$v){
       	echo "<option  value='{$v['id']}'>{$v['sort_name']}</option>";
           }
   }
   function zo_order_list(){

    $sql="select * from zo_orderlist left join zo_product on zo_orderlist.products_id = zo_product.pid";//查询语句
     $res=mysql_query($sql);//执行查询
     while($row=mysql_fetch_assoc($res)){
         $rows[]=$row;//接受结果集
     }
     //遍历数组
     foreach($rows as $key=>$v){
       echo '
       <tr>
       <td><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
       <td>';echo $v['id']; echo '</td>
       <td>';echo $v['products_name'];  echo '</td>
       <td>';echo $v['number'];  echo '</td>
       <td>';echo $v['all_money']; echo '</td>
       <td>';echo $v['order_name']; echo '</td>
       <td>';echo $v['time']; echo '</td>
         <td>';paytype1($v['paytype']); echo '</td>

        <td class="td-status"><span class="label label-success radius ">'; if($v['status']==0 && $v['status_ss']==0){echo '未支付';}if($v['status']==1 && $v['status_ss']==0){echo '已支付'; }echo '</span><span class="label label-success radius">';if($v['status_ss']==0){echo '待发货'; }else if($v['status_ss']==1){echo '待收货';}else if($v['status_ss'
        ]==2){ echo '收货成功';}echo '</span></td>
       <td>
       <form action="zo/order_success_action1.php" method="POST" id="in" style="float:left;margin-left:40px;"><input type="text" value="';echo $v['id']; echo '" name="order_id" style="display:none"/"><button '; if(($v['status']==1 || $v['paytype'] == 4 ) && $v['status_ss']!=2){ echo ' onclick="order_success(this,1)"';}else{ echo 'onClick="alert('; echo "'该种状态下不允许确认发货'"; echo ')"';} echo ' title="确认收发货"  class="btn btn-xs btn-success" type="button" ><i class="fa fa-cubes bigger-120"></i></button></form>
       <a title="订单详细"  href="cg_order_detailed.php?id=';echo $v['id']; echo '"  class="btn btn-xs btn-info order_detailed" ><i class="fa fa-list bigger-120"></i></a>
       <!--<a title="删除" href="javascript:;"  onclick="Order_form_del(this,1)" class="btn btn-xs btn-warning" ><i class="fa fa-trash  bigger-120"></i></a>-->
       </td>
       </tr>
       ';
     }
   }
   function paytype1($o){
     if($o==1){
       echo '微信支付';
     }else if($o==2){
       echo '支付宝支付';
     }
   }
/**
 * 商品表输出
 * @param  [type] $sql1 [description]
 * @return [type]       [description]
 */
   function shop_list(){
    global $user;
     $sql="select * from store_setting order by store_id desc";//查询语句
     $res=mysql_query($sql);//执行查询
     while($row=mysql_fetch_assoc($res)){
         $rows[]=$row;//接受结果集
     }
     foreach($rows as $key=>$v){
     	echo '
     		<tr><td><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
               <td>';echo $v['store_id'];echo'</td>
               <td>'; echo $v['store_name']; echo '</td>
               <td><img src="'; echo $v['store_img']; echo '" style="width:120px;height:80px;"/></td>
               <td>'; store_name($v['store_id'],'1'); echo '</td>
               <td>'; echo $v['store_place'];echo '</td>
               <td>'; echo $v['store_phone'];echo '</td>
				<td>'; select_banbe_odd($v['sort']);echo '</td>
              <td class="td-status">';if($v['status']=='1'){echo '<span class="label label-success radius">已启用</span>'; }if($v['status']=='0'){echo '<span class="label label-defaunt radius">已停用</span>'; }echo '</td>
              <td class="td-manage">';
              if($v['status']=='1'){ echo '<form id="stop" action="zo/shop_stop.php" method="POST" style="float:left;margin-left:20px;"> <input name="data" type="text" value="';echo $v['store_id']; echo '" style="display:none">
              <button type="button" onClick="member_stop(this,'; echo "'10001'";  echo ')"  href="javascript:;" title="停用"  class="btn btn-xs btn-success"><i class="icon-ok bigger-120"></i></button></form>'; }
              if($v['status']=='0'){	echo '<form id="sta" action="zo/shop_start.php" method="POST" style="float:left;margin-left:20px;"> <input name="data" type="text" value="';echo $v['store_id']; echo '" style="display:none" >
              <button type="button" onClick="member_start(this,'; echo "'10001'";  echo ')"  href="javascript:;" title="停用"  class="btn btn-xs"><i class="icon-ok bigger-120"></i></button></form>';
              }
               echo '
                <button  title="编辑" onclick="member_ed('; echo " '门店设置','shop_edit.php?id=";echo $v['store_id']; echo "','4','','450' "; echo
                ')" href="javascript:;"  class="btn btn-xs btn-info" ><i class="icon-edit bigger-120"></i></button>'; 
             if($user->admin_type == '1') {echo '
              <form action="zo/enter_action.php" method="POST" target="_blank" style="float:left"><input type="text" value="'; store_name($v['store_id'],'2'); echo '" name="id" style="display:none"/><button title="进入该店铺" href="javascript:;"  class="btn btn-xs btn-info" ><i class="icon-home bigger-120"></i></button></form>'; } echo '
             <form action="zo/delete_shop.php" method="POST" id="del" style="float:right;"><input type="text" value="';echo $v['store_id']; echo '" name="id" style="display:none;"/><button type="button" title="删除" href="javascript:;"  onclick="member_del(this,';echo "'1'"; echo ')" class="btn btn-xs btn-warning" ><i class="icon-trash  bigger-120"></i></button></form>
              </td>
     		</tr>
             ';}
   }

   function store_name($store_id,$type){
     $sql="select * from admin where store_id = '$store_id' and admin_type = '1'";//查询语句
     $res=mysql_query($sql);//执行查询
     while($row=mysql_fetch_assoc($res)){
         $rows[]=$row;//接受结果集
     }
     foreach($rows as $key=>$v){
       if($type==1){
       echo $v['admin_name'];
     }if($type==2){
      echo $v['id'];
     }
     }
   }
   /**
    * 获取ip地址
    *
    * @return [type] [description]
    */
  function getIP() {
     if (getenv('HTTP_CLIENT_IP')) {
     $ip = getenv('HTTP_CLIENT_IP');
   }
   elseif (getenv('HTTP_X_FORWARDED_FOR')) {
     $ip = getenv('HTTP_X_FORWARDED_FOR');
   }
   elseif (getenv('HTTP_X_FORWARDED')) {
     $ip = getenv('HTTP_X_FORWARDED');
   }
   elseif (getenv('HTTP_FORWARDED_FOR')) {
     $ip = getenv('HTTP_FORWARDED_FOR');
   }
   elseif (getenv('HTTP_FORWARDED')) {
     $ip = getenv('HTTP_FORWARDED');
   }
   else {
     $ip = $_SERVER['REMOTE_ADDR'];
   }
   return $ip;
}

/**
 * 该函数用于统计订单信息
 * @return [type] [description]
 */
function tj($s){
  $sql1 = mysql_query("SELECT * FROM {$s}") or die(mysql_error());
   $row1 = mysql_num_rows($sql1);
   echo $row1;
}
//用于统计订单总金额
function zongjine($type){

  if($type==1){//微信支付
    $n = mysql_query("SELECT SUM(all_money) as ss FROM orderlist where status = '1' and paytype = '1' ");
  }if($type==2){//支付宝支付
    $n = mysql_query("SELECT SUM(all_money) as ss FROM orderlist where status = '1' and paytype = '4' ");
  }if($type==3){//会员卡
    $n = mysql_query("SELECT SUM(all_money) as ss FROM orderlist where status = '1' and paytype = '3' ");
  }if($type==4){//现金支付
    $n = mysql_query("SELECT SUM(all_money) as ss FROM orderlist where status = '1' and paytype = '2' ");
  }if($type==5){//退款总金额
    $n = mysql_query("SELECT SUM(all_money) as ss FROM orderlist where status = '1' and status_ss = '3' ");
  }
  if($type==null){
    $n = mysql_query("SELECT SUM(all_money) as ss FROM orderlist where status = '1'");
  }

  while($r=mysql_fetch_assoc($n)){
      $ro[]=$r;//接受结果集

  }
  foreach($ro as $key=>$v){
    echo round($v['ss'],'2');

  }
  if($v['ss']==null){
      echo '0';
    }
}
//用于统计所有商品的已购买数量总和
function tj_all_products(){

  $n = mysql_query("SELECT SUM(products_num2) as ss FROM product");
  while($r=mysql_fetch_assoc($n)){
      $ro[]=$r;//接受结果集

  }
  foreach($ro as $key=>$v){
    echo $v['ss'];
  }
}
/**
** 统计最近一天，一个月，一年注册的用户数量
**/
function tj_member($type){
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
  global $user;
  $sql="select * from member ";//查询语句

  $res=mysql_query($sql);//执行查询
  while($r=mysql_fetch_assoc($res)){
      $ro[]=$r;//接受结果集
  }
  foreach($ro as $key=>$v){
    if(strtotime($v['create_date']) > $zhou){
      $i++;
    }
  }
  echo $i;
  if($i==null){
    echo '0';
  }
}
 	function shop_edit($store_id,$type){
 		$sql="select * from store_setting where store_id = '$store_id'";//查询语句
     $res=mysql_query($sql);//执行查询
     while($row=mysql_fetch_assoc($res)){
         $rows[]=$row;//接受结果集
     }
     foreach($rows as $key=>$v){
     	if($type==1){
     		echo $v['store_name'];
     	}else if($type==2){
     		echo $v['stop_time'];
     	}else if($type==3){
        echo $v['fen_number'];
      }
     }
 	}

 	
    /**
 * 更新个人信息
 * @param  [type] $name [description]
 * @param  [type] $val  [description]
 * @return [type]       [description]
 */
	 function update_admin_info($name,$val){
 		include('../config/conn.php');
		$admin_id = $_SESSION['admin_id'];
 	 	$sql = "update admin set $name = '$val' where id = {$admin_id}";
    		$result = mysql_query($sql);
}

/**
 * 更新密码
 * @return [type] [description]
 */
	function update_password($val){
		$admin_id = $_SESSION['admin_id'];
 	 	$sql = "update admin set admin_password = '$val' where id = {$admin_id}";
    		$result = mysql_query($sql);
				exit('<script>alert(\'更新成功\');window.location.href="../login.html"</script>');
	}
	/**
	**admin表管理员权限
	**/
	function admin_dept_list($type,$dept){
		global $user;
		$sql="select * from zo_dept";//查询语句

		$res=mysql_query($sql);//执行查询
		while($r=mysql_fetch_assoc($res)){
				$ro[]=$r;//接受结果集
		}
		foreach($ro as $key=>$v){
			if($type==1){
				echo '<li><a href="?dept=';echo $v['dept_id'];  echo '"><i class="fa fa-users orange"></i>';echo $v['dept_name']; echo '（'; tj("admin where admin_dept = {$v['dept_id']} and zo_dept = '1'"); echo '）</a></li>';
			}if($type==2){
				echo '	<option value="';echo $v['dept_id']; echo '">'; echo $v['dept_name'];echo '</option>';

			}if($type==3){
        echo '<option value="';echo $v['dept_id']; echo '" ';if($dept == $v['dept_id']){ echo 'selected="selected"';} echo '>';echo $v['dept_name']; echo '</option>';
      }if($type==null){
					echo ' <tr>
				<td class="center"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
				<td>';echo $v['dept_name']; echo '</td>
				<td>';  tj("admin where admin_dept = {$v['dept_id']} and zo_dept = '1'"); echo '</td>

				<td>'; echo $v['beizhu']; echo '</td>
				<td>
                <form style="float:left;margin-left:35px; "> <a title="编辑" href="zo_Competence_edit.php?id=';echo $v['dept_id']; echo '"  class="btn btn-xs btn-info" ><i >编辑</i></a></form>
               <form action="zo/delete_odd.php" method="POST" id="dels" style=";"><input type="text" value="';echo $v['dept_id']; echo '" name="odd_id" style="display:none;"/><input type="text" value="admin_dept" name="odd_db" style="display:none;"/><button type="button" title="删除" href="javascript:;" '; echo ' onclick="member_del(this,';echo "'1'"; echo ')"'; echo ' class="btn btn-xs btn-warning" ><i >删除</i></button></form>
				</td>
			   </tr>	';
			}

		}
}

     function admin_update($name,$val,$u){
       $sql = "update admin set {$name} = '$val' where id = {$u}";

       $result = mysql_query($sql);
     }
function check($val){ //检测传递过来的参数必须是数字，防止被黑客攻击
     if($val != null){
         if(ctype_digit($val)== false){ //
           exit('<script>alert(\'参数传递有误！！\');history.back();</script>');
           }
     }
   }

   /**
 * 会员表输出
 */
 function member_list($type){
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

   $sql="select * from member";//查询语句

   $res=mysql_query($sql);//执行查询
   while($r=mysql_fetch_assoc($res)){
       $ro[]=$r;//接受结果集
   }
   foreach($ro as $key=>$v){
     if(strtotime($v['create_date']) > $zhou){
       echo '
         <tr>
                <td>';echo $v['account_id'];echo'</td>
                <td><u style="cursor:pointer;text-decoration:none" class="text-primary" onclick="member_show(';echo "'{$v['wx_nickname']}','member-show.php?id={$v['account_id']}','10001','500','400'";  echo ')">'; echo $v['wx_nickname'];echo '</u></td>
                <td>'; echo $v['tel']; echo '</td>
                <td>'; echo $v['real_name']; echo '</td>
                <td>'; echo $v['create_date']; echo '</td>
                <td>'; echo $v['money_still'];echo '</td>
                <td>'; echo $v['money_gift'];echo '</td>
                <td>'; echo $v['money_used'];echo '</td>
                <td>'; echo $v['points'];echo '</td>
                <td>'; rank_ec($v['cardtype']); echo '</td>
                <td class="td-status">';if($v['rank']=='normal'){echo '<span class="label label-success radius">已启用</span>'; }if($v['rank']=='no'){echo '<span class="label label-defaunt radius">已停用</span>'; }echo '</td>
                <td class="td-manage">';store_name_select($v['store_id']); echo '</td>
         </tr>
              ';
     }
   }
 }
 /**
  * 会员表输出
  * 根据时间
  */
  function member_list1($time){

      $hous=date("Y/m/d",strtotime("$time +1 days"));

    $qian=strtotime($time);//获取当前时间
    $hou=strtotime($hous);
    global $user;
    $sql="select * from member ";//查询语句

    $res=mysql_query($sql);//执行查询
    while($r=mysql_fetch_assoc($res)){
        $ro[]=$r;//接受结果集
    }
    foreach($ro as $key=>$v){
      if(strtotime($v['create_date']) > $qian && strtotime($v['create_date']) < $hou ){
        echo '
          <tr>
                 <td>';echo $v['account_id'];echo'</td>
                 <td><u style="cursor:pointer;text-decoration:none" class="text-primary" onclick="member_show(';echo "'{$v['wx_nickname']}','member-show.php?id={$v['account_id']}','10001','500','400'";  echo ')">'; echo $v['wx_nickname'];echo '</u></td>
                 <td>'; echo $v['tel']; echo '</td>
                 <td>'; echo $v['real_name']; echo '</td>
                 <td>'; echo $v['create_date']; echo '</td>
                 <td>'; echo $v['money_still'];echo '</td>
                 <td>'; echo $v['money_gift'];echo '</td>
                 <td>'; echo $v['money_used'];echo '</td>
                 <td>'; echo $v['points'];echo '</td>
                     <td>'; rank_ec($v['cardtype']); echo '</td>
                  <td class="td-status">';if($v['rank']=='normal'){echo '<span class="label label-success radius">已启用</span>'; }if($v['rank']=='no'){echo '<span class="label label-defaunt radius">已停用</span>'; }echo '</td>
                 <td>'; store_name_select($v['store_id']); echo '</td>
                
          </tr>
               ';
      }
    }
  }
/**
 * 该函数的作用是传入rank_id 输出rank_name
 * @param  [type] $id [description]
 * @return [type]     [description]
 */
  function rank_ec($id){
    
    $sql="select * from member_rank where rank_id = '$id' ";//查询语句
    $res=mysql_query($sql);//执行查询
    while($row=mysql_fetch_assoc($res)){
        $rows[]=$row;//接受结果集
    }
    //遍历数组
    foreach($rows as $key=>$v){
      echo $v['rank_name'];
    }
}
	//根据store_id查询 
	function store_name_select($store_id,$o){
		 $sql="select * from store_setting where store_id = '$store_id'";//查询语句
    $res=mysql_query($sql);//执行查询
    while($row=mysql_fetch_assoc($res)){
        $rows[]=$row;//接受结果集
    }
    //遍历数组
    foreach($rows as $key=>$v){	
      if($o == 1){
        return $v['store_name'];
    }else{
        echo $v['store_name'];
      }
    	
	}
}

	 function order_list1($type){
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
      $sql="select * from orderlist order by time desc";//查询语句

    $res=mysql_query($sql);//执行查询
    while($row=mysql_fetch_assoc($res)){
        $rows[]=$row;//接受结果集
    }
    //遍历数组
    foreach($rows as $key=>$v){
       if(strtotime($v['time']) > $zhou){
      echo '
      <tr>
      <td><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
      <td>';echo $v['id']; echo '</td>
      <td>
        ';order_product($v['id'],'1'); echo '

      </td>
      <td>';echo $v['all_money']; echo '</td>
      <td>';order_type($v['order_type']);  echo '</td>
      <td>';echo $v['time']; echo '</td>
      <td>';paytype($v['paytype']); echo '</td>
      <td>';echo $v['order_name']; echo '</td>
       <td class="td-status"><span class="label label-success radius ">'; if($v['status']==0 && $v['status_ss']==0){echo '未支付';}if($v['status']==1 && $v['status_ss']==0){echo '已支付';} echo '</span><span class="label label-success radius">';if($v['status_ss']==0){echo '待处理'; }else if($v['status_ss']==1){echo '订单完成';}else if($v['status_ss'
       ]==2){ echo '订单关闭';}echo '</span></td>
      <td>
      ';store_name_select($v['store_id']);echo '
      </tr>
      ';
    }
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
    }if($type==3){
      $dd = $v['products_name']."x".$v['num'];
      return $dd;
    }
    }
}

  function order_type($id){
    if($id==1){
      echo '店内点餐';
    }else if($id==2){
      echo '外卖点餐';
    }else if($id==3){
      echo '预定订单';
    }else if($id==4){
      echo '快速买单';
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
  }/**
 * [paytype 支付方式]
 * @param  [type] $id [description]
 * @return [type]     [description]
 */
  function paytype($id){
    if($id==1){
      echo '微信支付';
    }else if($id==2){
      echo '现金支付';
    }else if($id==3){
      echo '会员卡支付';
    }else if($id==4){
      echo '支付宝支付';
    }
  }
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
  /**
   * 消费记录
   */
  function xiaofei_log($type){
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

        $sql="select * from money_change order by time desc";//查询语句
   
    $res=mysql_query($sql);//执行查询
    while($row=mysql_fetch_assoc($res)){
        $rows[]=$row;//接受结果集
    }
    //遍历数组
    foreach($rows as $key=>$v){
         if(strtotime($v['time']) > $zhou){
      echo '
      <tr>
          <td><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
          <td>';echo $v['uid']; echo '</td>
          <td>'; member_info($v['uid'],"2"); echo '</td>
          <td>';echo $v['m_body']; echo '</td>
          <td>';echo $v['get_points']; echo '</td>
          <td>';echo $v['type'];echo '</td>
          <td>';echo $v['time']; echo '</td>
          <td>';store_name_select($v['store_id']) ; echo '</td>

        
          </tr>
      ';
    }
  }
  }
    /**
   * 根据用户id查询用户信息
   */
  function member_info($id,$o){

     $sql="select * from member where account_id = '$id'";//查询语句
   
    $res=mysql_query($sql);//执行查询
    while($row=mysql_fetch_assoc($res)){
        $rows[]=$row;//接受结果集
    }
    //遍历数组
    foreach($rows as $key=>$v){
      if($o == '1'){
       echo $v['money_still'];
      }else if($o == '2'){
        echo $v['wx_nickname'];

      }else if($o == '3'){
        return $v['wx_nickname'];
      }
     
    }
  }
    /**
     * 用于编辑权限
     */
     function dept_edit($dept_id){
       global $user;
       $sql="select * from zo_dept where dept_id = '$dept_id'";//查询语句
       $res=mysql_query($sql);//执行查询
       while($r=mysql_fetch_assoc($res)){
           $ro[]=$r;//接受结果集
       }
       foreach($ro as $key=>$v){
          echo '
          <div class="Competence_add">
           <div class="form-group"><label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 权限名称 </label>
             <div class="col-sm-9"><input type="text" id="form-field-1" placeholder=""  name="dept_name" class="col-xs-10 col-sm-5" value="';echo $v['dept_name']; echo '"></div>
        </div>
           <div class="form-group"><label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 权限描述 </label>
            <div class="col-sm-9"><textarea name="beizhu" class="form-control" id="form_textarea" placeholder="" onkeyup="checkLength(this);" >';echo $v['beizhu']; echo '</textarea><span class="wordage">剩余字数：<span id="sy" style="color:Red;">200</span>字</span></div>
        </div>
          ';
       }
     }
       function check_dept1($dept_id,$val){

      $sql="select * from zo_dept where dept_id = '$dept_id'";//查询语句
      $res=mysql_query($sql);//执行查询
      while($r=mysql_fetch_assoc($res)){
          $ro[]=$r;//接受结果集
      }
      foreach($ro as $key=>$v){
        $dept_body1 = $v['dept_body']; //获取该用户权限数组
      }
    
      $dept_body = explode(",",$dept_body1);

      //此处开始判断
      if (in_array($val,$dept_body)) {
        return true;
        
      }else{
        return false;
       
      }
    }
     function check_dept2($id,$val){

      $sql="select * from store_sort where id = '$id'";//查询语句
      $res=mysql_query($sql);//执行查询
      while($r=mysql_fetch_assoc($res)){
          $ro[]=$r;//接受结果集
      }
      foreach($ro as $key=>$v){
        $dept_body1 = $v['dept_body']; //获取该用户权限数组
      }
    
      $dept_body = explode(",",$dept_body1);

     
      //此处开始判断
      if (in_array($val,$dept_body)) {
        return true;
        
      }else{
        return false;
       
      }
    }
    function check_dept3($id,$val){
 
      $sql="select * from store_setting where store_id = '$id'";//查询语句
      $res=mysql_query($sql);//执行查询
      while($r=mysql_fetch_assoc($res)){
          $ro[]=$r;//接受结果集
      }
      foreach($ro as $key=>$v){
        $dept_body1 = $v['dept']; //获取该用户权限数组
      }
    
      $dept_body = explode(",",$dept_body1);
    
      //此处开始判断
      if (in_array($val,$dept_body)) {
        return true;
        
      }else{
        return false;
       
      }
    }
	/**
		**根据deptid查询deptname
	**/
	function admin_dept_sigle($deptid,$type){
		$sql="select * from zo_dept where dept_id = {$deptid}";//查询语句
		$res=mysql_query($sql);//执行查询
		while($r=mysql_fetch_assoc($res)){
				$ro[]=$r;//接受结果集
		}
		foreach($ro as $key=>$v){
			if($type==1){
				echo $v['dept_name'];
			}
		}
	}
    //查询管理员列表
	function admin_list($dept){
		
      if($dept == null || $dept == 0){
        $sql="select * from admin where zo_dept = '1'";//查询语句
      }else{
          $sql="select * from admin where  zo_dept = '1' and admin_dept = '$dept'";//查询语句
      }
		$res=mysql_query($sql);//执行查询
		while($r=mysql_fetch_assoc($res)){
				$ro[]=$r;//接受结果集
		}
		foreach($ro as $key=>$v){
			echo ' <tr>
      <td><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
      <td>';echo $v['id']; echo '</td>
      <td>';echo $v['admin_name']; echo '</td>
      <td>';echo $v['admin_tel']; echo '</td>
      <td>';echo $v['admin_email']; echo '</td>
      <td>';if($v['admin_type'] == '1'){ echo '总管理员';}else{
          admin_dept_sigle($v['admin_dept'],'1');
      }  echo '</td>
      <td>';echo $v['time']; echo '</td>
      <td class="td-status">'; if($v['admin_status']==0) { echo '<span class="label label-defaunt radius">已停用</span>';} if($v['admin_status'] == 1){ echo '<span class="label label-success radius">已启用</span>';}
      echo '</td>
      <td class="td-manage">';
      if($v['admin_status']=='1'){ echo '<form id="stop" action="action/admin_stop.php" method="POST" style="float:left;"> <input name="data" type="text" value="';echo $v['id']; echo '" style="display:none">
      <button type="button" onClick="member_stop(this,'; echo "'10001'";  echo ')"  href="javascript:;" title="停用"  class="btn btn-xs btn-success"><i class="icon-ok bigger-120"></i></button></form>'; }
     if($v['admin_status']=='0'){	echo '<form id="start" action="action/admin_start.php" method="POST" style="float:left;"> <input name="data" type="text" value="';echo $v['id']; echo '" style="display:none" >
      <button type="button" onClick="member_start(this,'; echo "'10001'";  echo ')"  href="javascript:;" title="启用"  class="btn btn-xs"><i class="icon-ok bigger-120"></i></button></form>';
    } echo '
          <form style="float:left;"><button  title="编辑" onclick="member_ed('; echo " '编辑用户信息','zo_admin_edit.php?id=";echo $v['id']; echo "','4','','450' "; echo
    ')" type="button" class="btn btn-xs btn-info" ><i class="icon-edit bigger-120"></i></button></form>
         <form action="action/delete_odd.php" method="POST" id="del" style="float:left"><input type="text" value="';echo $v['id']; echo '" name="odd_id" style="display:none;"/><input type="text" value="admin" name="odd_db" style="display:none;"/><button type="button" title="删除" href="javascript:;"'; if($v['admin_type']!='1'){echo ' onclick="member_del(this,';echo "'1'"; echo ')"';} echo ' class="btn btn-xs btn-warning" ><i class="icon-trash  bigger-120"></i></button></form>
       </td>
     </tr>';
		}
	}
	  function check_dept($val){
      global $dept;
      global $user;
	  if($user->admin_type=='1'){
		return true;
	  }else{
      if (in_array($val, $dept->dept_body)) {
        return true;
      }else{
        return false;
	  }}
    }
     function store_sort_list(){
     $sql="select * from store_sort order by id asc ";//查询语句
     $res=mysql_query($sql);//执行查询
     while($row=mysql_fetch_assoc($res)){
         $rows[]=$row;//接受结果集
     }
     foreach($rows as $key=>$v){

       echo '
           <tr>
            <td><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
          
            <td>'; echo $v['sort_name']; echo '</td>
            <td>'; echo $v['stop_time']; echo '</td>
            <td>'; echo $v['price']; echo '</td>
            <td>'; echo $v['sort_body']; echo '</td>
            <td>'; echo $v['time']; echo '</td>
            <td class="td-manage">
             <form action="" method="post" style="float:left;margin-left:30px;"><p><a title="编辑" onclick='; echo "'"; echo 'member_edit("编辑版本设置","shop_sort_edit.php?id=';echo $v['id']; echo '","4","","450")';echo "'"; echo ' href="javascript:;"  class="btn btn-xs btn-info" ><i class="fa fa-edit bigger-120"></i></a></form>
             <form action="action/delete_odd.php" method="post" style="float:left;margin-left:20px;" id="in"><input type="text" name="odd_id" value="'; echo $v['id']; echo '"	style="display:none;"/><input type="text" value="store_sort" name="odd_db" style="display:none;"/><button title="删除" href="javascript:;" type="button" class="btn btn-xs btn-warning" value="" '; if($v['id']!=1){echo 'onclick="member_del(this,';echo "'1'"; echo ')';} echo' "><i class="fa fa-trash  bigger-120"></i></button></form></p></td>
           </tr>';
       }
   }
    function shop_sort_edit($id,$type){
 		$sql="select * from store_sort where id = '$id'";//查询语句
     $res=mysql_query($sql);//执行查询
     while($row=mysql_fetch_assoc($res)){
         $rows[]=$row;//接受结果集
     }
     foreach($rows as $key=>$v){
     	if($type==1){
     		echo $v['sort_name'];
     	}else if($type==2){
     		echo $v['stop_time'];
     	}else if($type==3){
        echo $v['price'];
      }else if($type==4){
        echo $v['sort_body'];
      }else if($type==5){
        echo $v['fen_number'];
      }
     }
 	}
 	function select_banben(){
 		$sql="select * from store_sort ";//查询语句
     $res=mysql_query($sql);//执行查询
     while($row=mysql_fetch_assoc($res)){
         $rows[]=$row;//接受结果集
     }
     foreach($rows as $key=>$v){
     	 echo '<option value="';echo $v['id']; echo '">';echo $v['sort_name']; echo '</option>';
     }
 	}
 	function select_banbe_odd($id){
 		$sql="select * from store_sort where id = '$id'";//查询语句
     $res=mysql_query($sql);//执行查询
     while($row=mysql_fetch_assoc($res)){
         $rows[]=$row;//接受结果集
     }
     foreach($rows as $key=>$v){
     	echo $v['sort_name'];
     }
 	}
?>
