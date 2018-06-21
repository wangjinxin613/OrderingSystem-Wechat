
<?php
/**该页面主要是一些后台操作的函数
	*比较重要
	*time:2016-12-21
 */

include ('conn.php');
header("Content-Type: text/html; charset=utf8");
error_reporting(0);
 $time= date("Y/m/d H:i:s");//获取当前时间
//判断是否登录成功
session_start();
$lifeTime =24 * 3600;
setcookie(session_name(), session_id(), time() + $lifeTime, "/");
if($_SESSION['admin_checked'] != true)
	 {//检验是否通过验证，没有回到首页
		 header('location:login.html');

	 }
   function check($val){ //检测传递过来的参数必须是数字，防止被黑客攻击
     if($val != null){
         if(ctype_digit($val)== false){ //
           exit('<script>alert(\'参数传递有误！！\');history.back();</script>');
           }
     }
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
    public $fen_id; //分店id
	 }
	 $user = new userinfo();

	 $admin_id = $_SESSION['admin_id'];
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
	  $user->fen_id = $v['fen_id'];
	 }

   /************************************用户权限类******************************/
   class admin_dept{
     public $dept_body;
      public function test($dept_id){
        $result1 = mysql_query("SELECT * FROM admin_dept where dept_id = '$dept_id'");
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
	 * sql语句用于区分门店
	 */
	 $admin_sql1 = "where store_id = {$user->store_id}";
	 $admin_sql2 = "and store_id = {$user->store_id}";

   /**
    * 检测管理员账户是否启用
    */
   if($user->admin_status == '0'){
     exit('<script>alert(\'您的管理员账户已被禁用，请联系门店创始人！\');history.back();</script>');
   }
   /**
    * 门店信息类
    */
    class indexitem{
  		//获取门店信息
  		public $store_name;
  		public $store_place;
  		public $store_phone;
  		public $store_price;
  		public $store_wifi;
  		public $store_paking;
  		public $store_showtime;
  		public $store_pinglun;
  		public $store_tj;
  		public $gg_title;
  		public $gg_body;
  		public $gg_time;
  		public $store_img;
  		public $store_pingbi;
  		public $qd_points;
  		public $re_points;
      public $status;
      public $store_zhe; //门店折扣
      public $share_setting; //分销收益是否开启
      public $chong_gift;//充值赠送
      public $chong_fen_gift;//充值分销赠送
      public $xiao_gift; //消费赠送
      public $fen_value;//分销奖励百分比
      public $chong_value1;//充值规则1 -- 充值金额
      public $chong_gift1;//充值规则1 --赠送金额
      public $chong_value2;//充值规则2 -- 充值金额
      public $chong_gift2;//充值规则2--赠送金额
      public $chong_value3;//充值规则3 -- 充值金额
      public $chong_gift3;//充值规则3 --赠送金额
      public $chong_value4;//充值规则4 -- 充值金额
      public $chong_gift4;//充值规则4 --赠送金额
      public $chong_value5;//充值规则5 -- 充值金额
      public $chong_gift5;//充值规则5--赠送金额
      public $chong_fen_1_1; //充值分销规则1 --充值金额
      public $chong_fen_1_2; //充值分销规则2 --赠送金额
      public $chong_fen_2_1;
      public $chong_fen_2_2;
      public $chong_fen_3_1;
      public $chong_fen_3_2;
      public $chong_fen_4_1;
      public $chong_fen_4_2;
      public $chong_fen_5_1;
      public $chong_fen_5_2;
      public $xiao_value_1; //消费赠送积分————消费积分
      public $xiao_value_2; //消费赠送积分 --赠送积分
      public $stop_time; //到期时间 
      public $dept; //权限管理
      public $sort; 
      public $fen_number; 
      public $tid5; 
      public $appid;  
      public $appsecret;  
      public $tid6;	
  }
  $item=new indexitem();
  mysql_select_db("my_db", $con);
$result = mysql_query("SELECT * FROM store_setting where store_id = '$user->store_id'");
while($row = mysql_fetch_array($result))
{
  $item->store_name = $row['store_name'];
  $item->store_place = $row['store_place'];
  $item->store_phone = $row['store_phone'];
  $item->store_price = $row['store_price'];
  $item->store_wifi = $row['store_wifi'];
  $item->store_paking = $row['store_paking'];
  $item->store_showtime = $row['store_showtime'];
  $item->store_pinglun = $row['store_pinglun'];
  $item->store_tj = $row['store_tj'];
  $item->gg_title = $row['gg_title'];
  $item->gg_body = $row['gg_body'];
  $item->gg_time = $row['gg_time'];
  $item->store_img = $row['store_img'];
  $item->store_pingbi = $row['store_pingbi'];
  $item->qd_points = $row['qd_points'];
  $item->re_points = $row['re_points'];
  $item->status = $row['status'];
  $item->store_zhe = $row['store_zhe'];
  $item->share_setting = $row['share_setting'];
  $item->chong_gift = $row['chong_gift'];
  $item->chong_fen_gift = $row['chong_fen_gift'];
  $item->xiao_gift = $row['xiao_gift'];
  $item->fen_value = $row['fen_value'];
  $item->chong_value1 = $row['chong_value1'];
  $item->chong_gift1 = $row['chong_gift1'];
  $item->chong_value2 = $row['chong_value2'];
  $item->chong_gift2 = $row['chong_gift2'];
  $item->chong_value3 = $row['chong_value3'];
  $item->chong_gift3 = $row['chong_gift3'];
  $item->chong_value4 = $row['chong_value4'];
  $item->chong_gift4 = $row['chong_gift4'];
  $item->chong_value5 = $row['chong_value5'];
  $item->chong_gift5 = $row['chong_gift5'];
  $item->chong_fen_1_1 = $row['chong_fen_1_1'];
  $item->chong_fen_1_2 = $row['chong_fen_1_2'];
  $item->chong_fen_2_1 = $row['chong_fen_2_1'];
  $item->chong_fen_2_2 = $row['chong_fen_2_2'];
  $item->chong_fen_3_1 = $row['chong_fen_3_1'];
  $item->chong_fen_3_2 = $row['chong_fen_3_2'];
  $item->chong_fen_4_1 = $row['chong_fen_4_1'];
  $item->chong_fen_4_2 = $row['chong_fen_4_2'];
  $item->chong_fen_5_1 = $row['chong_fen_5_1'];
  $item->chong_fen_5_2 = $row['chong_fen_5_2'];
  $item->xiao_value_1 = $row['xiao_value_1'];
  $item->xiao_value_2 = $row['xiao_value_2'];
  $item->stop_time = $row['stop_time'];
  $item->dept = $row['dept'];
  $item->sort = $row['sort'];
  $item->fen_number = $row['fen_number'];
  $item->tid5 = $row['tid5'];
  $item->appid = $row['appid'];
  $item->appsecret = $row['appsecret'];
  $item->tid6 = $row['tid6'];
}
 if($item->status == 0){
   exit('<script>alert(\'您的店铺没有启用或者已到期\');window.location.href="taocan.php";</script>');
 }

/**
 * 管理员的类别 1.商城创始人 2.普通管理员
 * @param  [type] $v [description]
 * @return [type]    [description]
 */
	 function admin_type($v){
	 	if($v==1){
	 		echo "商城创始人";
	 	}if($v==0){
	 		echo "普通管理员";
	 	}
	 }


/* 评论列表功能函数

 */

	function pinglun_list($type){
		mysql_query("set names utf8");//设置字符集编码
    global $admin_sql1;
    global $admin_sql2;
    if($type == null){
      $sql="select * from pinglun {$admin_sql1}";//查询语句
    }else{
      $sql="select * from pinglun where shenhe = '$type' {$admin_sql2}";//查询语句
    }
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
          		<td><u style="cursor:pointer"  class="text-primary" ">';echo $v['nickname']; echo '</u></td>
          		<td class="text-l">
          		<a href="javascript:;" >';echo $v['text']; echo '</a>
          		<td>';echo $v['time']; echo '</td>
              <td>';if($v['shenhe']==0){ echo "未审核";}else{ echo "审核完成";}echo '</td>
       			<td><form id="stop" action="action/pinglun_shenhe.php" method="POST" style="float:left;margin-left:50px;"> <input name="id" type="text" value="';echo $v['id']; echo '" style="display:none"/>
          <button type="button" onclick="shenhe(this,10001)" href="javascript:;" title="停用" class="btn btn-xs btn-success"><i>审核</i></button></form><form action="action/delete_odd.php" method="POST" id="in"><input type="text" name="odd_id" value="'; echo $v['id']; echo '" style="display:none;"/><input type="text" value="pinglun" name="odd_db" style="display:none;"/><button type="button" onclick="member_del(this)" href="javascript:;" title="删除" class="btn btn-xs btn-warning" ><i >删除</i></button></form></td>
         	</tr>'; }
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
				exit('<script>alert(\'更新成功\');history.back();</script>');
	}

/**
 * 该函数用于查询后台管理员登录日志列表
 * @return [type] [description]
 */
	function login_log_list($sql){
		mysql_query("set names utf8");//设置字符集编码
		$sql="select * from admin_log {$sql}";//查询语句
		$res=mysql_query($sql);//执行查询
		while($row=mysql_fetch_assoc($res)){
    		$rows[]=$row;//接受结果集
		}
		//遍历数组
		foreach($rows as $key=>$v){
			echo '<tr>
							<td><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
							<td>';echo $v['id']; echo '</td>
							<td>';admin_type($v['admin_type']); echo '</td>
							<td style="">';echo $v['log']; echo '</td>

							<td>';echo $v['admin_name']; echo '</td>
							<td>';echo $v['admin_ip']; echo '</td>
							<td>';echo $v['time']; echo '</td>
						</tr>';
		}
}


/**
 *	该函数用于添加用户登录的日志
 */
		function admin_log_add($y){
		global	$user;
		global $time;
		$admin_ip =  getIP();
	//	$admin_address = getIPLoc_QQ($admin_ip);
	 $admin_address = ""; //地址暂时不添加
		$q="insert into admin_log(id,admin_name,admin_id,admin_ip,time,admin_address,log,store_id,admin_type) values (null,'$user->admin_name','$user->admin_id','$admin_ip','$time','$admin_address','$y','$user->store_id','$user->admin_type')";//向数据库插入表单传来的值的sql
	  	$reslut=mysql_query($q);//执行sql
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
 * 根据ip地址获取登陆者的地点信息
 * @param  [type] $queryIP [description]
 * @return [type]          [description]
 */
  function getIPLoc_QQ($queryIP){
    $url = 'http://ip.qq.com/cgi-bin/searchip?searchip1='.$queryIP;
    $ch = curl_init($url);
    curl_setopt($ch,CURLOPT_ENCODING ,'gb2312');
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ; // 获取数据返回
    $result = curl_exec($ch);
    $result = mb_convert_encoding($result, "utf-8", "gb2312"); // 编码转换，否则乱码
    curl_close($ch);
    preg_match("@<span>(.*)</span></p>@iU",$result,$ipArray);
    $loc = $ipArray[1];
    return $loc;
}

/**
 *   循环输出分类列表
 *   用于交易订单管理左侧的分类选择输出
 */
 function order_sort_list($sql){
   $sql="select * from product_sort {$sql}";//查询语句
   $res=mysql_query($sql);//执行查询
   while($row=mysql_fetch_assoc($res)){
       $rows[]=$row;//接受结果集
   }
   //遍历数组
   foreach($rows as $key=>$v){
     echo '
      <li><i class="fa fa-sticky-note pink "></i> <a href="#">';echo $v['sort_name']; echo '(235)</a></li>
    ';
  }
}
function sort_list1($fen_id){
    global $user;
    if($fen_id == null){
      $fen_id = '0';
    }
   $sql="select * from product_sort where store_id = '$user->store_id' and fen_id = '$fen_id'";//查询语句
   $res=mysql_query($sql);//执行查询
   while($row=mysql_fetch_assoc($res)){
       $rows[]=$row;//接受结果集
   }
   //遍历数组
   foreach($rows as $key=>$v){
   
        echo '
      &nbsp;&nbsp;<input  type="checkbox" name="sort[]" value="';echo $v['id']; echo '">&nbsp;'; echo $v['sort_name'];echo '
    ';
    
   

  }
}
function sort_check($val,$sort){

      $dept_body = explode(",",$sort);
      //此处开始判断
      if (in_array($val,$dept_body)) {
        return true;
      }else{
        return false;
      }
}
function sort_list2($fen_id,$sort){
    global $user;
    if($fen_id == null){
      $fen_id = '0';
    }
  
   $sql="select * from product_sort where store_id = '$user->store_id' and fen_id = '$fen_id'";//查询语句
   $res=mysql_query($sql);//执行查询
   while($row=mysql_fetch_assoc($res)){
       $rows[]=$row;//接受结果集
   }
   //遍历数组
   foreach($rows as $key=>$v){
   
        echo '
      &nbsp;&nbsp;<input  type="checkbox" name="sort[]" value="';echo $v['id']; echo '"'; if(sort_check($v['id'],$sort) == true){ echo 'checked="checked"';} echo '>&nbsp;'; echo $v['sort_name'];echo '
    ';
    
   
  }
  }

  function product_sort_list($sql,$fen_id){
    if($fen_id == 0|| $fen_id == null){
        $sql="select * from product_sort {$sql} and fen_id = '0' order by sort_sx asc ";//查询语句
    }else{
        $sql="select * from product_sort {$sql} and fen_id = '$fen_id' order by sort_sx asc ";
    }

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
            <form action="" method="post" style="float:left;margin-left:80px;"><p><a title="编辑" onclick='; echo "'"; echo 'member_edit("编辑分类","sort_edit.php?id=';echo $v['id']; echo '","4","","450")';echo "'"; echo ' href="javascript:;"  class="btn btn-xs btn-info" ><i >编辑</i></a></form>
            <form action="action/delete_odd.php" method="post" style="float:left;margin-left:20px;" id="in"><input type="text" name="odd_id" value="'; echo $v['id']; echo '"	style="display:none;"/><input type="text" value="product_sort" name="odd_db" style="display:none;"/><button title="删除" href="javascript:;" type="button" class="btn btn-xs btn-warning" value="" onclick="member_del(this,';echo "'1'"; echo ')"><i >删除</i></button></form></p></td>
          </tr>';
      }
  }

/**
 * 用于商品添加的分类选择列表
 * @param [type] $sql [description]
 */

  function product_add_sort($sql,$fen_id){
    if($fen_id == 0 || $fen_id == null){
        $sql="select * from product_sort {$sql} and fen_id = '0'";//查询语句
    }else{
        $sql="select * from product_sort {$sql} and fen_id = '$fen_id'";//
    }

    $res=mysql_query($sql);//执行查询
    while($row=mysql_fetch_assoc($res)){
        $rows[]=$row;//接受结果集
    }

    //遍历数组
    foreach($rows as $key=>$v){
    	echo "<option  value='{$v['id']}'>{$v['sort_name']}</option>";
        }
}

/**
 * [商品列表]
 * @param  [type] $sql [description]
 * @return [type]      [description]
 */
  function product_list($sql1,$fen_id){
    global $user; //因为此处设计俩个表 不能通过引入外部变量 后续可能需要修改这里
    if($fen_id == 0 || $fen_id == null){//总店
        $sql="select * from product JOIN product_sort ON product_sort.id = product.sort_id where product.store_id = {$user->store_id} and product.fen_id = '0'";//查询语句
    }else{
        $sql="select * from product JOIN product_sort ON product_sort.id = product.sort_id where product.store_id = {$user->store_id} and product.fen_id = '$fen_id'";
    }

    $res=mysql_query($sql);//执行查询
    while($row=mysql_fetch_assoc($res)){
        $rows[]=$row;//接受结果集
    }
    //遍历数组
    foreach($rows as $key=>$v){
    	echo '
         <tr>
            <td width="25px"><label><input type="checkbox" class="ace" ><span class="lbl"></span></label></td>
            <td width="50px">'; echo $v['sx']; echo '</td>
            <td width="150px"><u style="cursor:pointer" class="text-primary" onclick="">'; echo $v['products_name']; echo '</u></td>
              <td><span class="ad_img"><a href="products/a.jpg" data-rel="colorbox" data-title="广告图"><img src="'; echo $v['products_img']; echo '"  style="width:100px;"/></a></span></td>
            <td width="100px">';echo $v['products_price'];echo '</td>
            <td width="100px">';echo $v['products_num1'];echo '</td>
            <td width="100px">';echo $v['products_num2'];echo '</td>
            <td width="100px">';echo $v['get_points'];echo '</td>
            <td class="text-l">';echo $v['sort_name'];echo '</td>
            <td class="td-manage">
            <form action="" method="post" style="float:left;margin-left:35px;"><p><a title="编辑" onclick='; echo "'"; echo 'member_edit("编辑商品","products-edit.php?id='; echo $v['pid']; echo '","4","","450")';echo "'"; echo ' href="javascript:;"  class="btn btn-xs btn-info" ><i >编辑</i></a></form>
            <form action="action/delete_product.php" id="in" method="post" style="float:left;"><input type="text" name="odd_id" value="'; echo $v['pid']; echo '"	style="display:none;"/><input type="text" value="product" name="odd_db" style="display:none;"/><button title="删除" href="javascript:;" type="button" class="btn btn-xs btn-warning" value="" onclick="member_del(this,';echo "'1'"; echo ')"><i >删除</i></button></form></p>
           </td>
    	  </tr>';
    	}
}


/**
 * [首页幻灯片输出列表]
 * @return boolean [description]
 */
  function advertis_list($sql1){
    $sql="select * from advertising {$sql1} order by sx asc  ";//查询语句

    $res=mysql_query($sql);//执行查询
    while($row=mysql_fetch_assoc($res)){
        $rows[]=$row;//接受结果集
    }
    //遍历数组
    foreach($rows as $key=>$v){
    	echo '
    	      <tr>
    	       <td><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
    	       <td>'; echo $v['id']; echo '</td>
    	        <td><form action="action/adver_edit_action.php" id="ig" method="post" style="float:left;"><input name="sx" type="text" style=" width:50px" value="'; echo $v['sx']; echo '"/></td>
    	       <td><span class="ad_img"><a href="';echo $v['imgurl']; echo '" data-rel="colorbox" data-title="广告图"><img src="'; echo $v['imgurl']; echo '"  width="100%" height="100%"/></a></span></td>
    	       <td>'; echo $v['time']; echo '</td>
            <td class="td-manage">
           <div style="float:left;margin-left:80px;"> <input type="text" name="id" value="'; echo $v['id']; echo '"	style="display:none;"/><button title="改变排序" href="javascript:;" type="button" class="btn btn-xs btn-warning" value="" onclick="member_de(this,';echo "'1'"; echo ')"><i >改变排序</i></button></form>
            <form action="action/delete_odd.php" id="in" method="post" style="float:right;"><input type="text" name="odd_id" value="'; echo $v['id']; echo '"	style="display:none;"/><input type="text" value="advertising" name="odd_db" style="display:none;"/><button title="删除" href="javascript:;" type="button" class="btn btn-xs btn-warning" value="" onclick="member_del(this,';echo "'1'"; echo ')"><i >删除</i></button></form>
           </td>

    	      ';
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
   global $user;
   $sql="select * from member where store_id = {$user->store_id}";//查询语句

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
                <td class="td-manage">';
                if($v['rank']=='normal'){ echo '<form id="stop" action="action/member_stop.php" method="POST" style="float:left;margin-left:20px;"> <input name="data" type="text" value="';echo $v['account_id']; echo '" style="display:none">
                <button type="button" onClick="member_stop(this,'; echo "'10001'";  echo ')"  href="javascript:;" title="停用"  class="btn btn-xs btn-success"><i style="font_size:10px;">停用</i></button></form>'; }
               if($v['rank']=='no'){	echo '<form id="start" action="action/member_start.php" method="POST" style="float:left;margin-left:20px;"> <input name="data" type="text" value="';echo $v['account_id']; echo '" style="display:none" >
                <button type="button" onClick="member_start(this,'; echo "'10001'";  echo ')"  href="javascript:;" title="启用"  class="btn btn-xs"><i>启用</i></button></form>';
               }
               echo '
                <button  title="编辑" onclick="member_ed('; echo " '编辑用户信息','member-edit.php?id=";echo $v['account_id']; echo "','4','','450' "; echo
                ')" href="javascript:;"  class="btn btn-xs btn-info" ><i > 编辑</i></button>
                <form action="action/member_del.php" method="POST" id="del" style="float:right;margin-right:25px;"><input type="text" value="';echo $v['account_id']; echo '" name="id" style="display:none;"/><button type="button" title="删除" href="javascript:;"  onclick="member_del(this,';echo "'1'"; echo ')" class="btn btn-xs btn-warning" ><i >删除</i></button></form>
                </td>
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
    $sql="select * from member where store_id = {$user->store_id}";//查询语句

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
                 <td class="td-manage">';
                 if($v['rank']=='normal'){ echo '<form id="stop" action="action/member_stop.php" method="POST" style="float:left;margin-left:20px;"> <input name="data" type="text" value="';echo $v['account_id']; echo '" style="display:none">
                 <button type="button" onClick="member_stop(this,'; echo "'10001'";  echo ')"  href="javascript:;" title="停用"  class="btn btn-xs btn-success"><i class="icon-ok bigger-120"></i></button></form>'; }
                if($v['rank']=='no'){	echo '<form id="start" action="action/member_start.php" method="POST" style="float:left;margin-left:20px;"> <input name="data" type="text" value="';echo $v['account_id']; echo '" style="display:none" >
                 <button type="button" onClick="member_start(this,'; echo "'10001'";  echo ')"  href="javascript:;" title="停用"  class="btn btn-xs"><i class="icon-ok bigger-120"></i></button></form>';
                }
                echo '
                 <button  title="编辑" onclick="member_ed('; echo " '编辑用户信息','member-edit.php?id=";echo $v['account_id']; echo "','4','','450' "; echo
                 ')" href="javascript:;"  class="btn btn-xs btn-info" ><i class="icon-edit bigger-120"></i></button>
                 <form action="action/member_del.php" method="POST" id="del" style="float:right;margin-right:25px;"><input type="text" value="';echo $v['account_id']; echo '" name="id" style="display:none;"/><button type="button" title="删除" href="javascript:;"  onclick="member_del(this,';echo "'1'"; echo ')" class="btn btn-xs btn-warning" ><i class="icon-trash  bigger-120"></i></button></form>
                 </td>
          </tr>
               ';
      }
    }
  }

/**
 * 更新前台用户
 */
  function member_update($name,$val,$u){
    $sql = "update member set {$name} = '$val' where account_id = {$u}";

    $result = mysql_query($sql);
  }


/**
 * 该函数用于输出会员等级列表
 * 位于等级管理的左侧
 */
 function member_rank_list($sql1,$type){
 	global $admin_sql2;
   $sql="select * from member_rank {$sql1}";//查询语句
   $res=mysql_query($sql);//执行查询
   while($row=mysql_fetch_assoc($res)){
       $rows[]=$row;//接受结果集
   }
   //遍历数组
   foreach($rows as $key=>$v){
     if($type==null){
     	$id = $v['rank_id'];
       echo '<li><i class="fa fa-diamond pink "></i> <a href="#">';echo $v['rank_name']; echo '('; tj("member where cardtype = '$id' {$admin_sql2}"); echo ')</a></li>';
     }if($type==1){
       echo '<option value="';echo $v['rank_id']; echo '">'; echo $v['rank_name'];echo '</option>';
     }

   }
 }


 /**
  * 该函数用于输出会员等级列表
  * 位于等级管理图表分析
  *
  */
  function member_rank_tu($sql1,$dept){
    $sql="select * from member_rank {$sql1}";//查询语句
    $res=mysql_query($sql);//执行查询
    while($row=mysql_fetch_assoc($res)){
        $rows[]=$row;//接受结果集
    }
    //遍历数组
    foreach($rows as $key=>$v){
      if($dept==1){
          echo "{value:"; tj("member where cardtype = $v[rank_id]");  echo ", name:'$v[rank_name]'},";
       }if($dept==2){
         echo "'$v[rank_name]'";
       }if($dept==3){
         echo '<option value="';echo $v['rank_id']; echo '">';echo $v['rank_name']; echo '</option>';
       }

    }
  }
  function member_edit_rank($sql1,$id){
    $sql="select * from member_rank {$sql1}";//查询语句
    $res=mysql_query($sql);//执行查询
    while($row=mysql_fetch_assoc($res)){
        $rows[]=$row;//接受结果集
    }
    //遍历数组
    foreach($rows as $key=>$v){

         echo '<option ';if($v['rank_id']==$id){ echo 'selected="selected"';}  echo ' value="';echo $v['rank_id']; echo '">';echo $v['rank_name'];echo '</option>';
      }

}

/**
 * 用户等级详细编辑表
 * @param  [type] $sql1 [description]
 * @return [type]       [description]
 */
  function member_rank($sql1){
    $sql="select * from member_rank {$sql1}";//查询语句
    $res=mysql_query($sql);//执行查询
    while($row=mysql_fetch_assoc($res)){
        $rows[]=$row;//接受结果集
    }
    //遍历数组
    foreach($rows as $key=>$v){
      echo '
      <tr>
            <td><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
            <td>';echo $v['rank_id']; echo '</td>
            <td>';echo $v['rank_name']; echo '</td>
            <td>';echo $v['rank_beizhu']; echo '</td>
            <td>';echo $v['rank_dept']; echo '</td>
            <td>';echo $v['rank_zhe']; echo '</td>

            <td class="td-manage">
            <form action="" method="post" style="float:left;margin-left:50px;"><p><a title="编辑" onclick='; echo "'"; echo 'member_edit("编辑等级策略","rank_edit.php?id=';echo $v['rank_id']; echo '","4","","450")';echo "'"; echo ' href="javascript:;"  class="btn btn-xs btn-info" ><i>编辑</i></a></form>
            <form action="action/delete_rank.php" method="post" style="float:left;margin-left:20px;" id="in"><input type="text" name="odd_id" value="'; echo $v['rank_id']; echo '"	style="display:none;"/><input type="text" value="product_sort" name="odd_db" style="display:none;"/><button title="删除" href="javascript:;" type="button" class="btn btn-xs btn-warning" value="" onclick="member_del(this,';echo "'1'"; echo ')"><i >删除</i></button></form></p></td>

      </tr>
      ';
    }
  }

/**
 * 用于更新等级信息
 */
  function member_rank_update($name,$val,$id){
    $sql = "update member_rank set {$name} = '$val' where rank_id = {$id}";
    //echo $sql;
    $result = mysql_query($sql);

  }

/**
 * 该函数的作用是传入rank_id 输出rank_name
 * @param  [type] $id [description]
 * @return [type]     [description]
 */
  function rank_ec($id){
    global $user;
    $sql="select * from member_rank where rank_id = '$id' and store_id = '$user->store_id'";//查询语句
    $res=mysql_query($sql);//执行查询
    while($row=mysql_fetch_assoc($res)){
        $rows[]=$row;//接受结果集
    }
    //遍历数组
    foreach($rows as $key=>$v){
      echo $v['rank_name'];
    }
}

/**
 * 商品表输出
 * @return [type] [description]
 */
  function order_list($sql1,$type,$fen_id){
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
 if($fen_id != null){
   $sql="select * from orderlist {$sql1} and fen_id = '$fen_id'";//查询语句
 }
  else{
      $sql="select * from orderlist {$sql1}";//查询语句
  }
    $res=mysql_query($sql);//执行查询
    while($row=mysql_fetch_assoc($res)){
        $rows[]=$row;//接受结果集
    }
    //遍历数组
    foreach($rows as $key=>$v){
      if(strtotime($v['time']) > $zhou){
      echo '
      <tr>
    
      <td>';echo $v['id'];if($v['du']==1){ echo '<p style="font-size:8px;color:#fff;background:#339933">已读</p>';}else{ echo '<p style="font-size:8px;color:#fff;background:#ff6666">未读</p>';} echo '</td>
      <td>
        ';order_product($v['id'],'1'); echo '

      </td>
      <td>';echo $v['all_money']; echo '</td>
      <td>';order_type($v['order_type']);  echo '</td>
      <td>';echo $v['time']; echo '</td>
      <td>';paytype($v['paytype']); echo '</td>

      <td>';echo $v['order_name']; echo '</td>
          
            <td>';fendian_odd($v['fen_id']); echo '</td>
              <td>';if($v['dayin'] == '1'){ echo '是';}else{ echo '否';}echo '</td>
       <td class="td-status"><span class="label label-success radius ">'; if($v['status']==0 && $v['status_ss']==0){echo '未支付';}if($v['status']==1 && $v['status_ss']==0){echo '已支付';} echo '</span><span class="label label-success radius">';if($v['status_ss']==0){echo '待处理'; }else if($v['status_ss']==1){echo '订单完成';}else if($v['status_ss'
       ]==2){ echo '订单关闭';}else if($v['status_ss'
       ]==3){ echo '退款申请中';}else if($v['status_ss'
       ]==4){ echo '退款成功';}else if($v['status_ss'
       ]==5){ echo '退款失败';}echo '</span></td>
      <td>
      <form action="action/order_success_action.php" method="POST" id="in" style="float:left"><input type="text" value="';echo $v['id']; echo '" name="order_id" style="display:none"/"><button '; if(($v['status']==1 || $v['paytype'] == 2 ) && $v['status_ss']==0 ){ echo ' onclick="order_success(this,1)"';}else{ echo 'onClick="alert('; echo "'该种状态下不允许操作'"; echo ')"';} echo ' title="标记成功"  class="btn btn-xs btn-success" type="button" ><i>处理</i></button></form>
      <a title="订单详细"  href="order_detailed.php?id=';echo $v['id']; echo '"  class="btn btn-xs btn-info order_detailed" ><i >详细</i></a>
      <form action="action/delete_odd.php" method="POST" id="del" style="float:right;"><input type="text" value="';echo $v['id']; echo '" name="odd_id" style="display:none;"/><input type="text" value="orderlist" name="odd_db" style="display:none;"/><button type="button" title="删除" href="javascript:;"  onclick="member_del(this,';echo "'1'"; echo ')" class="btn btn-xs btn-warning" ><i >删除</i></button></form>
       <form action="dayin.php" method="POST" id="dayin" style="float:right;"><input type="text" value="';echo $v['id']; echo '" name="id" style="display:none;"/><button type="button" title="打印" href="javascript:;"  ';if($v['status'] == 1) {echo 'onclick="dayin(this,';echo "'1'"; echo ')"';}else{ echo 'onclick="alert(\'只有支付成功的订单才可以打印\')"';} echo ' class="btn btn-xs btn-warning" ><i >打印</i></button></form>
      </td>
      </tr>
      ';
    }
    }
  }
  function order_list_time($time,$fen_id){

      $hous=date("Y/m/d",strtotime("$time +1 days"));

    $qian=strtotime($time);//获取当前时间
    $hou=strtotime($hous);
    global $user;
    if($fen_id == null){
       $sql="select * from orderlist where store_id = {$user->store_id}";//查询语句
     }else{
    $sql="select * from orderlist where store_id = {$user->store_id} and fen_id = '$fen_id'";//查询语句
}
    $res=mysql_query($sql);//执行查询
    while($r=mysql_fetch_assoc($res)){
        $ro[]=$r;//接受结果集
    }
    foreach($ro as $key=>$v){
      if(strtotime($v['time']) > $qian && strtotime($v['time']) < $hou ){
     echo '
      <tr>
    
      <td>';echo $v['id']; echo '</td>
      <td>
        ';order_product($v['id'],'1'); echo '

      </td>
      <td>';echo $v['all_money']; echo '</td>
      <td>';order_type($v['order_type']);  echo '</td>
      <td>';echo $v['time']; echo '</td>
      <td>';paytype($v['paytype']); echo '</td>

      <td>';echo $v['order_name']; echo '</td>
            <td>';fendian_odd($v['fen_id']); echo '</td>
       <td class="td-status"><span class="label label-success radius ">'; if($v['status']==0 && $v['status_ss']==0){echo '未支付';}if($v['status']==1 && $v['status_ss']==0){echo '已支付';} echo '</span><span class="label label-success radius">';if($v['status_ss']==0){echo '待处理'; }else if($v['status_ss']==1){echo '订单完成';}else if($v['status_ss'
       ]==2){ echo '订单关闭';}else if($v['status_ss'
       ]==3){ echo '退款申请中';}else if($v['status_ss'
       ]==4){ echo '退款成功';}else if($v['status_ss'
       ]==5){ echo '退款失败';}echo '</span></td>
      <td>
      <form action="action/order_success_action.php" method="POST" id="in" style="float:left"><input type="text" value="';echo $v['id']; echo '" name="order_id" style="display:none"/"><button '; if(($v['status']==1 || $v['paytype'] == 2 ) && $v['status_ss']==0 ){ echo ' onclick="order_success(this,1)"';}else{ echo 'onClick="alert('; echo "'该种状态下不允许操作'"; echo ')"';} echo ' title="标记成功"  class="btn btn-xs btn-success" type="button" ><i>处理</i></button></form>
      <a title="订单详细"  href="order_detailed.php?id=';echo $v['id']; echo '"  class="btn btn-xs btn-info order_detailed" ><i >详细</i></a>
       <form action="action/delete_odd.php" method="POST" id="del" style="float:right;"><input type="text" value="';echo $v['id']; echo '" name="odd_id" style="display:none;"/><input type="text" value="orderlist" name="odd_db" style="display:none;"/><button type="button" title="删除" href="javascript:;"  onclick="member_del(this,';echo "'1'"; echo ')" class="btn btn-xs btn-warning" ><i >删除</i></button></form>
        <form action="dayin.php" method="POST" id="dayin" style="float:right;"><input type="text" value="';echo $v['id']; echo '" name="id" style="display:none;"/><button type="button" title="打印" href="javascript:;"  onclick="dayin(this,';echo "'1'"; echo ')" class="btn btn-xs btn-warning" ><i >打印</i></button></form>
      </td>
      </tr>
      ';
      }
    }
  }

  function order_list1($sql1,$status,$status_ss,$fen_id){
  	if($fen_id != null ){
  		 
  		 if($status!=null){
   			$sql="select * from orderlist {$sql1} and status = '$status' and fen_id = '$fen_id'";//查询语句
  		}else if($status_ss!=null){
      		$sql="select * from orderlist {$sql1} and status_ss = '$status_ss' and fen_id = '$fen_id'";//查询语句
 	 	}
 	 	else{
      	$sql="select * from orderlist {$sql1} and fen_id = '$fen_id' order by time desc";//查询语句
  		}
  	}else{
  	 
  	 if($status!=null){
   		$sql="select * from orderlist {$sql1} and status = '$status'";//查询语句
  	}else if($status_ss!=null){
      $sql="select * from orderlist {$sql1} and status_ss = '$status_ss'";//查询语句
 	 }
 	 else{
      $sql="select * from orderlist {$sql1} order by time desc";//查询语句
  }
}
    $res=mysql_query($sql);//执行查询
    while($row=mysql_fetch_assoc($res)){
        $rows[]=$row;//接受结果集
    }
    //遍历数组
    foreach($rows as $key=>$v){
      echo '
      <tr>
    
      <td>';echo $v['id']; echo '</td>
      <td>
        ';order_product($v['id'],'1'); echo '

      </td>
      <td>';echo $v['all_money']; echo '</td>
      <td>';order_type($v['order_type']);  echo '</td>
      <td>';echo $v['time']; echo '</td>
      <td>';paytype($v['paytype']); echo '</td>
      <td>';echo $v['order_name']; echo '</td>
      <td>';fendian_odd($v['fen_id']); echo '</td>
       <td class="td-status"><span class="label label-success radius ">'; if($v['status']==0 && $v['status_ss']==0){echo '未支付';}if($v['status']==1 && $v['status_ss']==0){echo '已支付';} echo '</span><span class="label label-success radius">';if($v['status_ss']==0){echo '待处理'; }else if($v['status_ss']==1){echo '订单完成';}else if($v['status_ss'
       ]==2){ echo '订单关闭';}else if($v['status_ss'
       ]==3){ echo '退款申请中';}else if($v['status_ss'
       ]==4){ echo '退款成功';}else if($v['status_ss'
       ]==5){ echo '退款失败';}echo '</span></td>
      <td>
      <form action="action/order_success_action.php" method="POST" id="in" style="float:left"><input type="text" value="';echo $v['id']; echo '" name="order_id" style="display:none"/"><button '; if(($v['status']==1 || $v['paytype'] == 2 ) && $v['status_ss']==0 ){ echo ' onclick="order_success(this,1)"';}else{ echo 'onClick="alert('; echo "'该种状态下不允许操作'"; echo ')"';} echo ' title="标记成功"  class="btn btn-xs btn-success" type="button" ><i >处理</i></button></form>
      <a title="订单详细"  href="order_detailed.php?id=';echo $v['id']; echo '"  class="btn btn-xs btn-info order_detailed" ><i>详细</i></a>
    <form action="action/delete_odd.php" method="POST" id="del" style="float:right;"><input type="text" value="';echo $v['id']; echo '" name="odd_id" style="display:none;"/><input type="text" value="orderlist" name="odd_db" style="display:none;"/><button type="button" title="删除" href="javascript:;"  onclick="member_del(this,';echo "'1'"; echo ')" class="btn btn-xs btn-warning" ><i >删除</i></button></form>

      </td>
      </tr>
      ';
    }
  }

/**
 * [order_type 订单类型]
 * @param  [type] $id [description]
 * @return [type]     [description]
 */
  function order_type($id){
    if($id==1){
      echo '店内点餐';
    }else if($id==2){
      echo '外卖点餐';
    }else if($id==3){
      echo '预定订单';
    }else if($id==4){
      echo '快速买单';
    }else if($id==5){
      echo '员工点餐';
    }
  }
/**
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
      echo '已微信';
    }else if($id==2){
      echo '已现金';
    }else if($id==3){
      echo '已会员卡';
    }else if($id==4){
      echo '已支付宝';
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
function cg_order_product($id,$type){

  $sql="select * from zo_orderlist  left join zo_product on zo_orderlist.products_id = zo_product.pid where id = '$id'";//查询语句

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
    <p>数量：'; echo $v['number']; echo '</p>
    <p>价格：<b class="price"><i>￥</i>';echo $v['products_price']; echo '</b></p>
    <p>在库数量：';echo $v['products_num1'];  echo '</p>
    <p>已售数量：';echo $v['products_num2']; echo '</i></p>
    </span>
    </div>
    ';
  }
  }
}
/**
 * [product_sortname 传入sort_id输出sort_name]
 * @return [type] [description]
 */
    function product_sortname($id){
      $sql="select * from product_sort where id = '$id'";//查询语句

      $res=mysql_query($sql);//执行查询
      while($row=mysql_fetch_assoc($res)){
          $rows[]=$row;//接受结果集
      }
      //遍历数组
      foreach($rows as $key=>$v){
        echo $v['sort_name'];
      }
    }
/**
 * [order_detail 订单个人信息]
 * 订单详情页上部分
 * @param  [type] $id [description]
 * @param  [type] $o  [description]
 * @return [type]     [description]
 */
    function order_detail($id,$o){
      global $user;
      $sql="select * from orderlist LEFT JOIN member ON orderlist.order_uid =   member.account_id where orderlist.id = '$id' and orderlist.store_id = '$user->store_id'";//查询语句
      $res=mysql_query($sql);//执行查询
      while($row=mysql_fetch_assoc($res)){
          $rows[]=$row;//接受结果集
      }
      //遍历数组
      foreach($rows as $key=>$v){
        if($o == 1){
        echo '
         <!--收件人信息-->
            <div class="Receiver_style">
             <div class="title_name">订单人信息</div>
             <div class="Info_style clearfix">
               <div class="col-xs-3">
                <label class="label_name" for="form-field-2"> 会员卡id： </label>
                <div class="o_content">';echo $v['order_uid']; echo '</div>
               </div>
                <div class="col-xs-3">
                 <label class="label_name" for="form-field-2"> 微信昵称： </label>
                 <div class="o_content">';echo $v['order_name']; echo '</div>
                </div>
                <div class="col-xs-3">
                 <label class="label_name" for="form-field-2"> 真实姓名： </label>
                 <div class="o_content">';echo $v['real_name']; echo '</div>
                </div>
                <div class="col-xs-3">
                 <label class="label_name" for="form-field-2"> 电话： </label>
                 <div class="o_content">';echo $v['tel']; echo '</div>
                </div>
                ';
                if($v['order_type']== '1' || $v['order_type']=='5'){
            echo '<div class="col-xs-3">
                 <label class="label_name" for="form-field-2"> 桌号： </label>
                 <div class="o_content">';echo $v['order_desk']; echo '</div>
                </div>';}else if($v['order_type']==2){
                  echo '<div class="col-xs-3">
                       <label class="label_name" for="form-field-2"> 收货地址： </label>
                       <div class="o_content">';echo $v['sh_address']; echo '</div>
                      </div>';
                }if($v['order_type']==1 || $v['order_type'] == 2){
                echo '
                 <div class="col-xs-3">
                 <label class="label_name" for="form-field-2"> 就餐人数： </label>
                 <div class="o_content">';echo $v['order_people']; echo '</div>
                </div>';} echo '
                <div class="col-xs-3">
                <label class="label_name" for="form-field-2"> 备注信息： </label>
                <div class="o_content">';echo $v['beizhu']; echo '</div>
               </div>
             </div>
            </div>
        ';}else if($o == 2){
          echo "$v[id](";order_type($v['order_type']); echo ")";
        }else if($o==4){
          echo $v['all_money'];
        }
    }
}

function cg_order_detail($id,$o){
  global $user;
  $sql="select * from zo_orderlist  where zo_orderlist.id = '$id' ";//查询语句
  $res=mysql_query($sql);//执行查询
  while($row=mysql_fetch_assoc($res)){
      $rows[]=$row;//接受结果集
  }
  //遍历数组
  foreach($rows as $key=>$v){
    if($o == 1){
    echo '
     <!--收件人信息-->
        <div class="Receiver_style">
         <div class="title_name">订单人信息</div>
         <div class="Info_style clearfix">


            <div class="col-xs-3">
             <label class="label_name" for="form-field-2"> 真实姓名： </label>
             <div class="o_content">';echo $v['order_name']; echo '</div>
            </div>
            <div class="col-xs-3">
             <label class="label_name" for="form-field-2"> 电话： </label>
             <div class="o_content">';echo $v['tel']; echo '</div>
            </div>
            ';

              echo '<div class="col-xs-3">
                   <label class="label_name" for="form-field-2"> 收货地址： </label>
                   <div class="o_content">';echo $v['sh_address']; echo '</div>
                  </div>';
           echo '
            <div class="col-xs-3">
            <label class="label_name" for="form-field-2"> 备注信息： </label>
            <div class="o_content">';echo $v['beizhu']; echo '</div>
           </div>
           <div class="col-xs-3">
           <label class="label_name" for="form-field-2"> 订单发起时间： </label>
           <div class="o_content">';echo $v['time']; echo '</div>
          </div>
         </div>
        </div>
    ';}else if($o == 2){
      echo $v['id'];
    }else if($o==4){
      echo $v['all_money']*$v['number'];
    }
}
}
function order_detail1($id){
  global $user;
  $sql="select * from orderlist where orderlist.id = '$id' and orderlist.store_id = '$user->store_id'";//查询语句
  $res=mysql_query($sql);//执行查询
  while($row=mysql_fetch_assoc($res)){
      $rows[]=$row;//接受结果集
  }
  //遍历数组
  foreach($rows as $key=>$v){
    echo '
    <div class="col-xs-3">
       <label class="label_name" for="form-field-2"> 支付方式： </label>
       <div class="o_content">'; paytype($v['paytype']); echo '</div>
      </div>
      <div class="col-xs-3">
       <label class="label_name" for="form-field-2"> 支付状态： </label>
       <div class="o_content">';pay_status($v['status']); echo '</div>
      </div>
      <div class="col-xs-3">
       <label class="label_name" for="form-field-2"> 订单生成日期： </label>
       <div class="o_content">';echo $v['time']; echo '</div>
      </div>
       <div class="col-xs-3">
       <label class="label_name" for="form-field-2"> 订单状态： </label>
       <div class="o_content">';order_status($v['status_ss']); echo '</div>
      </div>
       <div class="col-xs-3">
       <label class="label_name" for="form-field-2"> 优惠券： </label>
       <div class="o_content">';youhui($v['yid']); echo '</div>
      </div>
      <div class="col-xs-3">
       <label class="label_name" for="form-field-2"> 代金券： </label>
       <div class="o_content">';daijin($v['did']); echo '</div>
      </div>
    ';
  }
}
/**
	优惠券信息
**/
 	function youhui($id){
 		 $sql="select * from my_youhui where id = '$id' ";//查询语句
  $res=mysql_query($sql);//执行查询
  while($row=mysql_fetch_assoc($res)){
      $rows[]=$row;//接受结果集
  }
  //遍历数组
  foreach($rows as $key=>$v){
  	if($v['type']==1){
  		echo "无门槛减{$v['wu_money']}优惠券";
  	}else if($v['type']==2){
  		echo "满{$v['man_max']}减{$v['man_min']}优惠券";
  	}
 }if($rows == null){
 	echo '未使用任何优惠券';
 }
}
/**
	优惠券信息
**/
 	function daijin($id){
 		 $sql="select * from my_daijin where id = '$id' ";//查询语句
  $res=mysql_query($sql);//执行查询
  while($row=mysql_fetch_assoc($res)){
      $rows[]=$row;//接受结果集
  }
  //遍历数组
  foreach($rows as $key=>$v){
  	echo "{$v['money']}元代金券";
 }if($rows == null){
 	echo '未使用任何代金券';
 }
}
  /**
   * 支付状态
   */
  function pay_status($id){
    if($id==0){
      echo "未支付";
    }if($id==1){
      echo "支付成功";
    }
  }
  /**
   * [order_status订单状态]
   * @param  [type] $id [description]
   * @return [type]     [description]
   */
  function order_status($id){
    if($id==0){
      echo '商户待处理';
    }else if($id ==1){
      echo "订单交易成功";
    }else if($id ==2){
      echo "订单关闭";
    }else{
      echo "数据出错";
    }
  }

  /**
   * 该功能修改订单状态
   */
  function order_status_update($name,$val,$id){
    $sql = "update orderlist set $name = '$val' where id = '$id'";
    $result = mysql_query($sql);
  }
  function order_status_update1($name,$val,$id){
    $sql = "update zo_orderlist set $name = '$val' where id = '$id'";
    $result = mysql_query($sql);
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
  /**
   * 审核评论
   */
  function pinglun_shenhe($id){
    $sql = "update pinglun set shenhe = '1' where id = '$id'";
    $result = mysql_query($sql);
  }
  /**
   * 充值记录
   */
  function chongzhi_log($sql1,$fen_id){
    if($fen_id == 0 || $fen_id == null){
        $sql="select * from chongzhi {$sql1} and fen_id = '0' order by time desc";//查询语句
    }else{
      $sql="select * from chongzhi {$sql1} and fen_id = '$fen_id' order by time desc";//查询语句
    }

    $res=mysql_query($sql);//执行查询
    while($row=mysql_fetch_assoc($res)){
        $rows[]=$row;//接受结果集
    }
    //遍历数组
    foreach($rows as $key=>$v){
      echo '
      <tr>
          <td><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
          <td>';echo $v['account_id']; echo '</td>
          <td>';echo $v['wx_name']; echo '</td>
          <td>';echo $v['chong_money']; echo '</td>
          <td>';echo $v['money_gift']; echo '</td>
          <td>';echo $v['chong_type'];echo '</td>
          <td>';echo $v['time']; echo '</td>
          <td>';fendian_odd($v['fen_id']) ; echo '</td>
          <td>';if($v['blog']==0){ echo '充值失败';}else if($v['blog']==1){ echo '充值成功';} echo '</td>
          <td><form action="action/delete_odd.php" method="post" style="margin:0 auto;" id="in"><input type="text" name="odd_id" value="'; echo $v['id']; echo '"	style="display:none;"/><input type="text" value="chongzhi" name="odd_db" style="display:none;"/><button title="删除" href="javascript:;" type="button" class="btn btn-xs btn-warning" value="" onclick="member_del(this,';echo "'1'"; echo ')"><i >删除</i></button></form></td>
          </tr>
      ';
    }
  }
  /**
   * 消费记录
   */
  function xiaofei_log($sql1,$fen_id,$type){
    if($fen_id == 0 || $fen_id == null){
      $fen_id = 0;
    }
    if($type ==1){
       $sql="select * from money_change {$sql1} and fen_id = '$fen_id' and type = '支付宝消费' order by time desc";//查询语句
    }else if($type==2){
          $sql="select * from money_change {$sql1} and fen_id = '$fen_id' and type = '微信消费' order by time desc";//查询语句
    }else if($type==3){
          $sql="select * from money_change {$sql1} and fen_id = '$fen_id' and type = '会员卡消费' order by time desc";//查询语句
    }else{
        $sql="select * from money_change {$sql1} and fen_id = '$fen_id'  order by time desc";//查询语句
    }
     
    
    $res=mysql_query($sql);//执行查询
    while($row=mysql_fetch_assoc($res)){
        $rows[]=$row;//接受结果集
    }
    //遍历数组
    foreach($rows as $key=>$v){
      echo '
      <tr>
          <td><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
          <td>';echo $v['uid']; echo '</td>
          <td>'; echo member_info("{$v['uid']}","2"); echo '</td>
          <td>';echo $v['m_body']; echo '</td>
          <td>';echo $v['get_points']; echo '</td>
          <td>';echo $v['type'];echo '</td>
          <td>';echo $v['time']; echo '</td>
          <td>';fendian_odd($v['fen_id']) ; echo '</td>

          <td><form action="action/delete_odd.php" method="post" style="margin:0 auto;" id="in"><input type="text" name="odd_id" value="'; echo $v['id']; echo '"	style="display:none;"/><input type="text" value="money_change" name="odd_db" style="display:none;"/><button title="删除" href="javascript:;" type="button" class="btn btn-xs btn-warning" value="" onclick="member_del(this,';echo "'1'"; echo ')"><i>删除</i></button></form></td>
          </tr>
      ';
    }
  }
  /**
   * 提现记录
   */
  function tixian_log($sql1,$fen_id){
  	if($fen_id != null){
  		$sql="select * from tixian {$sql1} and fen_id = '$fen_id'";//查询语句
  	}else{
  		$sql="select * from tixian {$sql1}";//查询语句
  	}
    
    $res=mysql_query($sql);//执行查询
    while($row=mysql_fetch_assoc($res)){
        $rows[]=$row;//接受结果集
    }
    //遍历数组
    foreach($rows as $key=>$v){
      echo '
      <tr>
          <td><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
          <td>';echo $v['account_id']; echo '</td>
          <td>';echo $v['wx_name']; echo '</td>
          <td>';echo $v['ti_money']; echo '</td>
          <td>';echo $v['ti_type'];echo '</td>
          <td>';echo $v['ti_user']; echo '</td>
          <td>';echo $v['beizhu']; echo '</td>
          <td>';echo $v['time']; echo '</td>
          <td>';fendian_odd($v['fen_id']) ;  echo '</td>
          <td>';if($v['blog']==0){ echo '待处理';}else if($v['blog']==1){ echo '提现成功';} echo '</td>
          <td><form action="action/tixian_success.php" method="post" style="margin:0 10px;float:left;" id="on"><input type="text" name="id" value="'; echo $v['id']; echo '"	style="display:none;"/><input type="text" value="'; echo $v['account_id']; echo '" name="account_id" style="display:none;"/><input type="text" value="'; echo $v['ti_money']; echo '" name="money" style="display:none;"/><button title="确定" href="javascript:;" type="button" class="btn btn-xs btn-warning" value=""';  if($v['blog']==0){ echo 'onclick="queding(this,';echo "'1'"; echo ')';} echo '"><i >确定</i></button></form>
          <form action="action/delete_odd.php" method="post" style="margin:0 auto;" id="in"><input type="text" name="odd_id" value="'; echo $v['id']; echo '"	style="display:none;"/><input type="text" value="tixian" name="odd_db" style="display:none;"/><button title="删除" href="javascript:;" type="button" class="btn btn-xs btn-warning" value="" onclick="member_del(this,';echo "'1'"; echo ')"><i >删除</i></button></form></td>
          </tr>
      ';
    }
  }

  /**
   * 根据用户id查询用户信息
   */
  function member_info($id,$o){
    global $admin_sql2;
    $sql="select * from member where account_id = '$id' {$admin_sql2}";//查询语句
    $res=mysql_query($sql);//执行查询w
    while($row=mysql_fetch_assoc($res)){
        $rows[]=$row;//接受结果集
    }
    //遍历数组
    foreach($rows as $key=>$v){
      if($o == '1'){
        return $v['money_still'];
      }else if($o == '2'){
        return $v['wx_nickname'];
      }
    }
  }
/**
 * 采购商城
 * 商品列表页商品分类
 */
    function cg_shop_sort($type){
      $sql="select * from zo_product_sort order by sort_sx asc";//查询语句
      $res=mysql_query($sql);//执行查询w
      while($row=mysql_fetch_assoc($res)){
          $rows[]=$row;//接受结果集
      }
      //遍历数组
      foreach($rows as $key=>$v){
        if($type==1){
            echo '<li><a href="?sid=';echo $v['id']; echo '">'; echo $v['sort_name']; echo '</a></li>';
        }else{
        echo '  <a href="?sid=';echo $v['id']; echo '"><li>';echo $v['sort_name']; echo '</li></a>';
      }
      }
}
/**
 * 采购商城
 * 商品列表页商品列表
 */
    function cg_shoplist($sid,$type){
      if($sid == null || $sid == 0){
      $sql="select * from zo_product order by sx asc";//查询语句
    }else {
      $sql="select * from zo_product where sort_id = '$sid' order by sx asc";//查询语句
    }
      $res=mysql_query($sql);//执行查询w
      while($row=mysql_fetch_assoc($res)){
          $rows[]=$row;//接受结果集
      }
      //遍历数组
      foreach($rows as $key=>$v){
        if($type==1){
          echo ' <figure>
                <a href="cg_detail.php?id=';echo $v['pid']; echo '"><img src="../'; echo $v['products_img']; echo '" alt="'; echo $v['products_name'];echo '" class="xqtp"/></a>
                <p>';echo $v['products_name']; echo '</p>
                <div class="info">
                    <em class="sat">￥ '; echo $v['products_price']; echo '</em>
                  <img src="img/u20.png" alt="购物车" style="width: 30px;height: 30px" align="right"/>
                </div>
            </figure>';
        }else{
        echo '
        <a href="cg_detail.php?pid=';echo $v['pid']; echo '">
        <div class="single">
          <img src="';echo $v['products_img']; echo '">
          <p class="p1">';echo $v['products_name']; echo '</p>
          <p><span>￥ ';echo $v['products_price']; echo '</span></p>
        </div>
        </div>
        ';}
      }
}
/**
 * 采购商城
 * 收货地址列表
 */
    function cg_address_list($type){
      global $user;
      $sql="select * from zo_address where uid = '$user->admin_id'";//查询语句

      $res=mysql_query($sql);//执行查询w
      while($row=mysql_fetch_assoc($res)){
          $rows[]=$row;//接受结果集
      }
      //遍历数组
      foreach($rows as $key=>$v){
        if($type==1){
                echo '
        <div class="sh_box">
        <div class="sin_box">
          <p class="p1">';echo $v['sh_name']; echo '</p>
          <div class="sin_than">
          <p class="p2">';echo $v['sh_tel']; echo '</p>
          <p class="p2">';echo $v['sh_city']; echo '</p>
          <p class="p2">'; echo $v['sh_address'];echo '</p>
        </div>
        <p class="p3"><a href="cg_address_update.php?id=';echo $v['id']; echo '">修改</a><a href="">删除</a></p>
      </div>
    </div>';}
    else if($type==2){
      echo '<p><input type="radio" class="in" name="sh_id" value="';echo $v['id']; echo '" required />';echo "{$v['sh_name']}&nbsp;&nbsp;{$v['sh_tel']}&nbsp;&nbsp;{$v['sh_city']}&nbsp;&nbsp;{$v['sh_address']}"; echo '</p>';
    }
      }
}
/**
 * 用于更新账号余额 和订单支付状态
 * @param  [type] $name [description]
 * @param  [type] $val  [description]
 * @param  [type] $id   [description]
 * @return [type]       [description]
 */
function admin_money_update($name,$val,$uid,$oid){
  $sql = "update admin set {$name} = '$val' where id = {$uid}";
  //echo $sql;
  $result = mysql_query($sql);

    $s = "update zo_orderlist set status = '1' where id = {$oid}";
    //echo $sql;
    $result = mysql_query($s);

}
function admin_money_update1($uid,$money){
  $sql = "update admin set money_used = money_used + '$money' where id = {$uid}";
  //echo $sql;
  $result = mysql_query($sql);
}
/**
 * 更新收货地址
 * @param  [type] $uid   [description]
 * @param  [type] $money [description]
 * @return [type]        [description]
 */
function cg_address_update($name,$val,$id){
  $sql = "update zo_address set {$name} = '$val' where id = '$id'";
  echo $sql;

  $result = mysql_query($sql);
}
/**
 * 我的订单
 */
 function cg_order_list(){
   global $user;
  $sql="select * from zo_orderlist left join zo_product on zo_orderlist.products_id = zo_product.pid where order_uid = '$user->admin_id'";//查询语句
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
     <form action="zo/order_success_action.php" method="POST" id="in" style="float:left;margin-left:40px;"><input type="text" value="';echo $v['id']; echo '" name="order_id" style="display:none"/"><button '; if(($v['status']==1 || $v['paytype'] == 4 ) && $v['status_ss']!=2){ echo ' onclick="order_success(this,1)"';}else{ echo 'onClick="alert('; echo "'该种状态下不允许确认收货'"; echo ')"';} echo ' title="确认收货"  class="btn btn-xs btn-success" type="button" ><i >确认收货</i></button></form>
     <a title="订单详细"  href="cg_order_detailed.php?id=';echo $v['id']; echo '"  class="btn btn-xs btn-info order_detailed" ><i >详情</i></a>
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
/***********************************************手机收银系统开始***************************************/
  /**
   * mobile 员工收银系统
   * file:../mobile
   * 一系列功能
   * time:1月5号
   */
   function erweima($value){
         include '../phpqrcode/phpqrcode.php';
         $errorCorrectionLevel = 'L';//容错级别
         $matrixPointSize = 15;//生成图片大小
         //生成二维码图片
         QRcode::png($value, 'qrcode.png', $errorCorrectionLevel, $matrixPointSize, 2);
         $logo = 'logo.png';//准备好的logo图片
         $QR = 'qrcode.png';//已经生成的原始二维码图
         if ($logo !== FALSE) {
           $QR = imagecreatefromstring(file_get_contents($QR));
           $logo = imagecreatefromstring(file_get_contents($logo));
           $QR_width = imagesx($QR);//二维码图片宽度
           $QR_height = imagesy($QR);//二维码图片高度
           $logo_width = imagesx($logo);//logo图片宽度
           $logo_height = imagesy($logo);//logo图片高度
           $logo_qr_width = $QR_width / 5;
           $scale = $logo_width/$logo_qr_width;
           $logo_qr_height = $logo_height/$scale;
           $from_width = ($QR_width - $logo_qr_width) / 2;
           //重新组合图片并调整大小
           imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width,
           $logo_qr_height, $logo_width, $logo_height);
         }
         //输出图片
         imagepng($QR, 'helloweba.png');
 }


   /**
    * 手机端采购商城订单信息
    */
   function mo_cg_shoplist($pid){
     $sql="select * from zo_product where pid = '$pid'";//查询语句
      $res=mysql_query($sql);//执行查询
      while($row=mysql_fetch_assoc($res)){
          $rows[]=$row;//接受结果集
      }
      //遍历数组
      foreach($rows as $key=>$v){
        echo '
        <li>
            <span class="name">';echo $v['products_name']; echo '</span>
            <em class="price">￥';echo $v['products_price']; echo '</em>
            <div class="d-stock ">
                    <a class="decrease">-</a>
                    <input type="text" value="';echo $v['pid']; echo '" name="pid" style="display:none;"/>
                      <input type="text" value="';echo $v['products_price']; echo '" name="price" style="display:none;"/>
                    <input id="num" readonly="" class="text_box" type="text" value="1" name="num">
                    <a class="increase">+</a>
            </div>
          </li>
        ';
      }
   }

   /* 根据收货地址id获取到收货地址的信息
   */
   	function mo_sh_message($id,$type){
      global $user;
   		$sql="select * from zo_address where uid = {$user->admin_id} and id ={$id}";//查询语句
   		$res=mysql_query($sql);//执行查询
   		while($r=mysql_fetch_assoc($res)){
   				$ro[]=$r;//接受结果集
   		}
   		foreach($ro as $key=>$v){
   			if($type==1){
   			echo $v['sh_address'];
   		}if($type==2){
   			echo $v['sh_tel'];
   		}if($type==3){
   			echo $v['sh_name'];
   		}
   		}
   }
   /*
   	循环输出该用户对应的收货地址啦
   */
   	function mo_sh_addresslist($pid){
      global $user;
   		$sql="select * from zo_address where uid = {$user->admin_id} ";//查询语句
   		$res=mysql_query($sql);//执行查询
   		while($r=mysql_fetch_assoc($res)){
   				$ro[]=$r;//接受结果集
   		}
   		foreach($ro as $key=>$v){
   			echo '	<li class="curr">
   	    		<p>收货人：';echo $v['sh_name']; echo '&nbsp;&nbsp;<span style="float:right;">'; echo $v['sh_tel'];echo '</span></p>
   	    		<p class="order-add1">收货地址：'; echo $v['sh_address'];echo '</p>
   	    	    <hr />
   	    	    <div class="address-cz">
   	    	    	<label class="am-radio am-warning">
                         <a href="cg_order.php?id=';echo $v['id']; echo '&pid=';echo $pid; echo '" style="width:auto;"> 设为收货地址 </a>
                       </label>
                       <a href="edit.php?id=';echo $v['id']; echo '"><img src="../../images/bj.png" width="18" />&nbsp;编辑</a>
                       <a href="delete.php?id=';echo $v['id']; echo '">删除</a>
   	    	    </div>
   	    	</li>';
   			}
   }

   /*
   	根据订单号查询订单信息
   	针对点餐订单
   */

   	function select_orderlist($oid,$type){
          global $user;
   				$sql="select * from zo_orderlist where id = {$oid} and order_uid = '$user->admin_id'";//查询语句
   				$res=mysql_query($sql);//执行查询
   				while($r=mysql_fetch_assoc($res)){
   			    	$ro[]=$r;//接受结果集
   				}
   				foreach($ro as $key=>$v){
   					if ($type==1) {
   			echo '
   				<div class="de_head">
   						';echo "{$v['order_name']}&nbsp;&nbsp;{$v['tel']}";
              echo '
   				</div>
   				<div class="de_box" >
   					<p>订单号 <span>';echo $v['id']; echo '</span></p>

   					<p>订单状态<span class="s1">';
   						if($v['status_ss']==0){echo "待发货";}
   						if($v['status_ss']==1){echo "待收货";}
   						if($v['status_ss']==2){echo "订单完成";}
   					echo '</span></p>
            <p>支付状态<span class="s1">';
   						if($v['status']==0){echo "已支付";}
   						if($v['status']==1){echo "完成支付";}
   					echo '</span></p>
   					<p>收货地址<span>';echo $v['sh_address']; echo '</span></p>';
   					echo '
   					<p>下单时间<span>';echo $v['time'];echo '</span></p>
   				</div>
   				<div class="de_box1">
   					备注<span>'; echo $v['beizhu'];echo '</span>
   				</div>';}
   				if ($type==2) {
   				echo '	<div class="pay">';
   				if($v['paytype']==1){	echo "余额支付	<span>￥{$v['all_money']}</span> ";}
   				if($v['paytype']==2){echo "微信支付 <span>￥{$v['all_money']}</span>";}
   				if($v['paytype']==3){	echo "支付宝支付  <span>￥{$v['all_money']}</span> ";}
   				if($v['paytype']==3){	echo "货到付款   ";}
   				echo '</div>';
   				}if($type==3){
   					if($v['status']==1){
   						if($v['status_ss']!=2){
   						echo '<form action="../zo/order_success_action.php" method="post">
   								<input type="text" value="';echo $v['id']; echo '" name="order_id" style="display:none;"/>
   								<button class="quxiao">确认收货</button>
   							</form>';
   						}else{
   							echo '<button class="quxiao">订单完成</button>';
   						}
   					}
   					if($v['status']==1){
   						echo '<button class="quxiao" style="background:#0099CC">申请退款</button>';
   					}
   				}
   			}
   }
   /*
		根据订单号查询商品信息
	*/
		function select_order_products($order_id){
			include('../config/conn.php');
			global $user;
			$sql="select * from zo_orderlist left join zo_product on zo_orderlist.products_id = zo_product.pid where id = '$order_id' and order_uid = '$user->admin_id'";//查询语句
			$res=mysql_query($sql);//执行查询
			while($row=mysql_fetch_assoc($res)){
	    		$rows[]=$row;//接受结果集
			}
	//遍历数组
			foreach($rows as $key=>$v){
				echo '<p>';echo $v['products_name']; echo '<span class="s2" style="text-align:center;float:right;">x';echo $v['number']; echo '</span><span class="s1">￥';echo $v['products_price']; echo '</span></p>';
			}
}
		/*
		手机版采购商城
		该函数的作用是循环输出订单列表
		根据订单类型进行判断
	*/

		function orderlist_foreach($sql){

					global $user;
					$sql="select * from zo_orderlist where order_uid = {$user->admin_id}.{$sql} order by time desc";//查询语句
					$res=mysql_query($sql);//执行查询
					while($r=mysql_fetch_assoc($res)){
				    	$ro[]=$r;//接受结果集
					}
					if($ro == null){

						echo '	<p style="margin-top:50px;text-align:center;">暂无订单</p>';
					}
					foreach($ro as $key=>$v){

						echo '<a href="./order_detail.php?oid=';echo $v['id']; echo '">
						<div class="list">
							<p class="p1">下单时间：';echo $v['time']; echo '<span class="color-b floatright">'; echo $v['id']; echo '</span></p>
							<p class="p2">总计：￥'; echo $v['all_money'];echo ' <span class="color-b floatright">';
							if($v['status']==1){
								if($v['status_ss']==0){echo "待发货";}
								if($v['status_ss']==1){echo "待收货";}
								if($v['status_ss']==2){echo "订单已完成";}
							}if($v['status']==0){
								echo "未完成支付";
							}
							echo '</span></p>
						</div></a>';
					}
}
/* 根据收货地址id获取到收货地址的信息
*/
	function sh_message($id,$type){
		global $user;
		$sql="select * from zo_address where uid = {$user->admin_id} and id ={$id}";//查询语句
		$res=mysql_query($sql);//执行查询
		while($r=mysql_fetch_assoc($res)){
				$ro[]=$r;//接受结果集
		}
		foreach($ro as $key=>$v){
			if($type==1){
			echo $v['sh_address'];
		}if($type==2){
			echo $v['sh_tel'];
		}if($type==3){
			echo $v['sh_name'];
		}
		}
}
/*
	该函数用于更新收货地址
*/
	function sh_update($name,$val,$id){

		global $user;
		$sql = "update zo_address set $name = '$val' where uid = {$user->admin_id} and id = {$id}";
			$result = mysql_query($sql);
	}
/***********************************************手机收银系统结束***************************************/
/******  这里是一片空地
******/
/*********************************************营销管理部分开始*****************************************/

/**
**优惠券列表
**/
	function youhui_list(){
		global $admin_sql1;
		$sql="select * from youhui_list {$admin_sql1}";//查询语句
		$res=mysql_query($sql);//执行查询
		while($r=mysql_fetch_assoc($res)){
				$ro[]=$r;//接受结果集
		}
		foreach($ro as $key=>$v){
			echo '
          <tr>
           <td><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
           <td>'; echo $v['id']; echo '</td>
           <td>'; if($v['type']==1){ echo '无门槛';} if($v['type']==2) {echo '满减';} echo '</td>
           <td>'; if($v['type']==1){ echo $v['wu_money'];}if($v['type']==2){ echo "满{$v['man_max']}减{$v['man_min']}";} echo '</td>
           <td>'; echo $v['beizhu']; echo '</td>
           <td>'; echo $v['time']; echo '天</td>
           <td>'; echo $v['number1'];echo'</td>
           <td>'; echo $v['number2'];echo '</td>
           <td>';echo $v['points']; echo '</td>
            <td class="td-status">';if($v['status']=='1'){echo '<span class="label label-success radius">已启用</span>'; }if($v['status']=='0'){echo '<span class="label label-defaunt radius">已停用</span>'; }echo '</td>
             <td class="td-manage">';

             if($v['status']=='1'){ echo '<form id="stop" action="action/youhui_stop.php" method="POST" style="float:left;margin-left:20px;"> <input name="data" type="text" value="';echo $v['id']; echo '" style="display:none"/><input type="text" value="youhui_list" name="db" style="display:none;"/>
             <button type="button" onClick="member_stop(this,'; echo "'10001'";  echo ')"  href="javascript:;" title="停用"  class="btn btn-xs btn-success"><i >停用</i></button></form>'; }
         		if($v['status']=='0'){	echo '<form id="start" action="action/youhui_start.php" method="POST" style="float:left;margin-left:20px;"> <input name="data" type="text" value="';echo $v['id']; echo '" style="display:none" /><input type="text" value="youhui_list" name="db" style="display:none;"/>
             <button type="button" onClick="member_start(this,'; echo "'10001'";  echo ')"  href="javascript:;" title="停用"  class="btn btn-xs"><i >启用</i></button></form>';
         		}
         		echo '
             <button  title="编辑" onclick="member_ed('; echo " '修改优惠券信息','youhui_edit.php?id=";echo $v['id']; echo "','4','','450' "; echo
             ')" href="javascript:;"  class="btn btn-xs btn-info" ><i >编辑</i></button>
             <form action="action/delete_odd.php" method="POST" id="del" style="float:right;margin-right:25px;"><input type="text" value="';echo $v['id']; echo '" name="odd_id" style="display:none;"/><input type="text" value="youhui_list" name="odd_db" style="display:none;"/><button type="button" title="删除" href="javascript:;"  onclick="member_del(this,';echo "'1'"; echo ')" class="btn btn-xs btn-warning" ><i>删除</i></button></form>
             </td>';
		}
	}

	/**
 * 更新优惠券信息
 */
  function youhui_update($name,$val,$u){
    $sql = "update youhui_list set {$name} = '$val' where id = {$u}";

    $result = mysql_query($sql);
  }
  	/**
**代金券管理
**/
	function daijin_list(){
		global $admin_sql1;
		$sql="select * from daijin_list {$admin_sql1}";//查询语句
		$res=mysql_query($sql);//执行查询
		while($r=mysql_fetch_assoc($res)){
				$ro[]=$r;//接受结果集
		}
		foreach($ro as $key=>$v){
			echo '
          <tr>
           <td><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
           <td>'; echo $v['id']; echo '</td>

           <td>'; echo $v['money'];echo '</td>
           <td>'; echo $v['beizhu']; echo '</td>
           <td>'; echo $v['time']; echo '天</td>
           <td>'; echo $v['number1'];echo'</td>
           <td>'; echo $v['number2'];echo '</td>
           <td>';echo $v['points']; echo '</td>
            <td class="td-status">';if($v['status']=='1'){echo '<span class="label label-success radius">已启用</span>'; }if($v['status']=='0'){echo '<span class="label label-defaunt radius">已停用</span>'; }echo '</td>
             <td class="td-manage">';
             if($v['status']=='1'){ echo '<form id="stop" action="action/youhui_stop.php" method="POST" style="float:left;margin-left:20px;"> <input name="data" type="text" value="';echo $v['id']; echo '" style="display:none"/><input type="text" value="daijin_list" name="db" style="display:none;"/>
             <button type="button" onClick="member_stop(this,'; echo "'10001'";  echo ')"  href="javascript:;" title="停用"  class="btn btn-xs btn-success"><i class="">停用</i></button></form>'; }
         		if($v['status']=='0'){	echo '<form id="start" action="action/youhui_start.php" method="POST" style="float:left;margin-left:20px;"> <input name="data" type="text" value="';echo $v['id']; echo '" style="display:none" /><input type="text" value="daijin_list" name="db" style="display:none;"/>
             <button type="button" onClick="member_start(this,'; echo "'10001'";  echo ')"  href="javascript:;" title="停用"  class="btn btn-xs"><i >启用</i></button></form>';
         		}
         		echo '
             <button  title="编辑" onclick="member_ed('; echo " '修改代金券信息','daijin_edit.php?id=";echo $v['id']; echo "','4','','450' "; echo
             ')" href="javascript:;"  class="btn btn-xs btn-info" ><i>编辑</i></button>
             <form action="action/delete_odd.php" method="POST" id="del" style="float:right;margin-right:25px;"><input type="text" value="';echo $v['id']; echo '" name="odd_id" style="display:none;"/><input type="text" value="daijin_list" name="odd_db" style="display:none;"/><button type="button" title="删除" href="javascript:;"  onclick="member_del(this,';echo "'1'"; echo ')" class="btn btn-xs btn-warning" ><i >删除</i></button></form>
             </td>';
		}
	}
			/**
 * 更代金券信息
 */
  function daijin_update($name,$val,$u){
    $sql = "update daijin_list set {$name} = '$val' where id = {$u}";

    $result = mysql_query($sql);
  }

    	/**
**礼品券管理
**/
	function lipin_list(){
		global $admin_sql1;
		$sql="select * from lipin_list {$admin_sql1}";//查询语句
		$res=mysql_query($sql);//执行查询
		while($r=mysql_fetch_assoc($res)){
				$ro[]=$r;//接受结果集
		}
		foreach($ro as $key=>$v){
			echo '
          <tr>
           <td><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
           <td>'; echo $v['id']; echo '</td>

           <td>'; echo $v['name'];echo '</td>
           <td>'; echo $v['beizhu']; echo '</td>

           <td>'; echo $v['number1'];echo'</td>
           <td>'; echo $v['number2'];echo '</td>
           <td>';echo $v['points']; echo '</td>
            <td class="td-status">';if($v['status']=='1'){echo '<span class="label label-success radius">已启用</span>'; }if($v['status']=='0'){echo '<span class="label label-defaunt radius">已停用</span>'; }echo '</td>
             <td class="td-manage">';
             if($v['status']=='1'){ echo '<form id="stop" action="action/youhui_stop.php" method="POST" style="float:left;margin-left:20px;"> <input name="data" type="text" value="';echo $v['id']; echo '" style="display:none"/><input type="text" value="lipin_list" name="db" style="display:none;"/>
             <button type="button" onClick="member_stop(this,'; echo "'10001'";  echo ')"  href="javascript:;" title="停用"  class="btn btn-xs btn-success"><i >停用</i></button></form>'; }
         		if($v['status']=='0'){	echo '<form id="start" action="action/youhui_start.php" method="POST" style="float:left;margin-left:20px;"> <input name="data" type="text" value="';echo $v['id']; echo '" style="display:none" /><input type="text" value="lipin_list" name="db" style="display:none;"/>
             <button type="button" onClick="member_start(this,'; echo "'10001'";  echo ')"  href="javascript:;" title="停用"  class="btn btn-xs"><i >启用</i></button></form>';
         		}
         		echo '
             <button  title="编辑" onclick="member_ed('; echo " '修改礼品券信息','lipin_edit.php?id=";echo $v['id']; echo "','4','','450' "; echo
             ')" href="javascript:;"  class="btn btn-xs btn-info" ><i >编辑</i></button>
             <form action="action/delete_odd.php" method="POST" id="del" style="float:right;margin-right:25px;"><input type="text" value="';echo $v['id']; echo '" name="odd_id" style="display:none;"/><input type="text" value="lipin_list" name="odd_db" style="display:none;"/><button type="button" title="删除" href="javascript:;"  onclick="member_del(this,';echo "'1'"; echo ')" class="btn btn-xs btn-warning" ><i >删除</i></button></form>
             </td>';
		}
	}
					/**
 * 更代礼品信息
 */
  function lipin_update($name,$val,$u){
    $sql = "update lipin_list set {$name} = '$val' where id = {$u}";

    $result = mysql_query($sql);
  }
  /**
  	礼品券兑换过程更改礼品券状态
  **/
  function my_lipin_update($name,$val,$id){
 	 	$sql = "update my_lipin set $name = '$val' where id = '$id'";
    		$result = mysql_query($sql);
}
	/**
		该函数用于礼品券兑换详情
	**/
	function lipin_detail($id){
		global $admin_sql1;
		$sql="select * from member join my_lipin on member.account_id = my_lipin.uid where id = '$id'";//查询语句

		$res=mysql_query($sql);//执行查询
		while($r=mysql_fetch_assoc($res)){
				$ro[]=$r;//接受结果集
		}
		foreach($ro as $key=>$v){
			echo '
				<div class="de_head ">
						礼品：<span style="color:#FF0033;">'; echo $v['name']; echo '</span>
				</div>
				<div class="de_box">
					<p>兑换码 <span>';echo $v['id']; echo '</span></p>
					<p>微信昵称 <span>';echo $v['wx_nickname']; echo '</span></p>
					<p>真实姓名<span>';echo $v['real_name']; echo '</span></p>
					<p>电话<span>';echo $v['tel']; echo '</span></p>
					<p>状态<span  class="s1">';if($v['status']==2){ echo '兑换成功';} else{ echo '兑换失败';} echo '</span></p>
					<p>兑换时间<span>';echo $v['dui_time']; echo '</span></p>
					<p>操作员工<span>';echo $v['admin_name']; echo '</span></p>
				</div>
			';
		}
}

	/**
		该函数用于礼品券兑换详情
	**/
	function my_lipin_list(){
		global $admin_sql1;
		$sql="select * from member join my_lipin on member.account_id = my_lipin.uid where my_lipin.status = '2'";//查询语句

		$res=mysql_query($sql);//执行查询
		while($r=mysql_fetch_assoc($res)){
				$ro[]=$r;//接受结果集
		}
		foreach($ro as $key=>$v){
			echo '
				<a href="./my_lipin_detail.php?id=';echo $v['id']; echo '">
						<div class="list">
							<p class="p1">会员昵称：'; echo $v['wx_nickname']; echo '<span class=" floatright">操作员工：'; echo $v['admin_name'];echo '</span></p>
							<p class="p2 color-b">';echo $v['name']; echo '<span class="color-b floatright">兑换成功</span></p>
						</div></a>
			';
		}
	}
	//用于统计订单总金额
	function zongjine($type){
		global $user;
		if($type==1){//微信支付
			$n = mysql_query("SELECT SUM(all_money) as ss FROM orderlist where status = '1' and paytype = '1' and store_id = '$user->store_id'");
		}if($type==2){//支付宝支付
			$n = mysql_query("SELECT SUM(all_money) as ss FROM orderlist where status = '1' and paytype = '4' and store_id = '$user->store_id'");
		}if($type==3){//会员卡
			$n = mysql_query("SELECT SUM(all_money) as ss FROM orderlist where status = '1' and paytype = '3' and store_id = '$user->store_id'");
		}if($type==4){//现金支付
			$n = mysql_query("SELECT SUM(all_money) as ss FROM orderlist where status = '1' and paytype = '2' and store_id = '$user->store_id'");
		}if($type==5){//退款总金额
			$n = mysql_query("SELECT SUM(all_money) as ss FROM orderlist where status = '1' and status_ss = '3' and store_id = '$user->store_id'");
		}
		if($type==null){
			$n = mysql_query("SELECT SUM(all_money) as ss FROM orderlist where status = '1' and store_id = '$user->store_id'");
		}

		while($r=mysql_fetch_assoc($n)){
				$ro[]=$r;//接受结果集

		}
		foreach($ro as $key=>$v){
			echo round($v['ss'],2);

		}
		if($v['ss']==null){
				echo '0';
			}
	}
	//用于统计所有商品的已购买数量总和
	function tj_all_products(){
		global $user;
		$n = mysql_query("SELECT SUM(products_num2) as ss FROM product where store_id = '$user->store_id'");
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
		$sql="select * from member where store_id = {$user->store_id}";//查询语句

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
	/**
	** 统计最近最近一年每个月份注册的订单
	**/
	function tj_order($type,$ces){
		if($type == 1){
			$q= date("Y/m/d H:i:s");
		 	$h = date("Y/m/1");
		}else if($type==2){
		 	$q= date("Y/m/30",strtotime("-1 months"));
		 	$h = date("Y/m/1",strtotime("-1 months"));
		}else if($type==3){
		 	$q= date("Y/m/30",strtotime("-2 months"));
		 	$h = date("Y/m/1",strtotime("-2 months"));
		}else if($type==4){
		 	$q= date("Y/m/30",strtotime("-3 months"));
		 	$h = date("Y/m/1",strtotime("-3 months"));
		}else if($type==5){
		 	$q= date("Y/m/30",strtotime("-4 months"));
		 	$h = date("Y/m/1",strtotime("-4 months"));
		}else if($type==6){
		 	$q= date("Y/m/30",strtotime("-5 months"));
		 	$h = date("Y/m/1",strtotime("-5 months"));
		}else if($type==7){
		 	$q= date("Y/m/30",strtotime("-6 months"));
		 	$h = date("Y/m/1",strtotime("-6 months"));
		}else if($type==8){
		 	$q= date("Y/m/30",strtotime("-7 months"));
		 	$h = date("Y/m/1",strtotime("-7 months"));
		}else if($type==9){
		 	$q= date("Y/m/30",strtotime("-8 months"));
		 	$h = date("Y/m/1",strtotime("-8 months"));
		}else if($type==10){
		 	$q= date("Y/m/30",strtotime("-9 months"));
		 	$h = date("Y/m/1",strtotime("-9 months"));
		}else if($type==11){
		 	$q= date("Y/m/30",strtotime("-10 months"));
		 	$h = date("Y/m/1",strtotime("-10 months"));
		}else if($type==12){
		 	$q= date("Y/m/30",strtotime("-11 months"));
		 	$h = date("Y/m/1",strtotime("-11 months"));
		}
		$qian=strtotime($q);//获取当前时间
		$hou=strtotime($h);//获取当前时间
		global $user;
		if($ces==1){//微信支付
			$sql="select * from orderlist where store_id = {$user->store_id} and paytype = '1'";//查询语句
		}else if($ces==2){//支付宝支付
			$sql="select * from orderlist where store_id = {$user->store_id} and paytype = '4'";//查询语句
		}else if($ces==3){//会员卡支付
			$sql="select * from orderlist where store_id = {$user->store_id} and paytype = '3'";//查询语句
		}else if($ces==4){//现金支付
			$sql="select * from orderlist where store_id = {$user->store_id} and paytype = '2'";//查询语句
		}else{
			$sql="select * from orderlist where store_id = {$user->store_id}";//查询语句
		}
		$res=mysql_query($sql);//执行查询
		while($r=mysql_fetch_assoc($res)){
				$ro[]=$r;//接受结果集
		}
		foreach($ro as $key=>$v){
			if(strtotime($v['time']) > $hou && strtotime($v['time']) < $qian){
				$i++;
			}
		}
		echo $i;

		if($i==null){
			echo '0';
		}
	}
/******************************************管理员权限理*****************************************/
	/**
	**admin表管理员权限
	**/
	function admin_dept_list($type,$dept){
		global $user;
		$sql="select * from admin_dept where store_id = {$user->store_id}";//查询语句

		$res=mysql_query($sql);//执行查询
		while($r=mysql_fetch_assoc($res)){
				$ro[]=$r;//接受结果集
		}
		foreach($ro as $key=>$v){
			if($type==1){
				echo '<li><a href="?dept=';echo $v['dept_id'];  echo '"><i class="fa fa-users orange"></i>';echo $v['dept_name']; echo '（'; tj("admin where admin_dept = {$v['dept_id']} and store_id = {$user->store_id}"); echo '）</a></li>';
			}if($type==2){
				echo '	<option value="';echo $v['dept_id']; echo '">'; echo $v['dept_name'];echo '</option>';

			}if($type==3){
        echo '<option value="';echo $v['dept_id']; echo '" ';if($dept == $v['dept_id']){ echo 'selected="selected"';} echo '>';echo $v['dept_name']; echo '</option>';
      }if($type==null){
					echo ' <tr>
				<td class="center"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
				<td>';echo $v['dept_name']; echo '</td>
				<td>';  tj("admin where admin_dept = {$v['dept_id']} and store_id = {$user->store_id}"); echo '</td>

				<td>'; echo $v['beizhu']; echo '</td>
				<td>
                 <a title="编辑" href="Competence_edit.php?id=';echo $v['dept_id']; echo '"  class="btn btn-xs btn-info" ><i class="fa fa-edit bigger-120"></i></a>
                 <a title="删除" href="javascript:;"  onclick="Competence_del(this)" class="btn btn-xs btn-warning" ><i class="fa fa-trash  bigger-120"></i></a>
				</td>
			   </tr>	';
			}

		}
}
	//查询当前门店的创始人
		function select_admin_chuang(){
		global $user;
		$sql="select * from admin where store_id = {$user->store_id} and admin_type = '1'";//查询语句

		$res=mysql_query($sql);//执行查询
		while($r=mysql_fetch_assoc($res)){
				$ro[]=$r;//接受结果集
		}
		foreach($ro as $key=>$v){
			echo $v['admin_name'];
		}
}	//查询管理员列表
	function admin_list($dept){
			global $user;
      if($dept == null || $dept == 0){
        $sql="select * from admin where store_id = {$user->store_id} and admin_type = '0'";//查询语句
      }else{
          $sql="select * from admin where store_id = {$user->store_id} and admin_type = '0' and admin_dept = '$dept'";//查询语句
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
      <td>';if($v['admin_type'] == '1'){ echo '门店创始人';}else{
          admin_dept_sigle($v['admin_dept'],'1');
      }  echo '</td>
      <td>';echo $v['time']; echo '</td>
      <td>'; fendian_odd($v['fen_id']); echo '</td>
      <td class="td-status">'; if($v['admin_status']==0) { echo '<span class="label label-defaunt radius">已停用</span>';} if($v['admin_status'] == 1){ echo '<span class="label label-success radius">已启用</span>';}
      echo '</td>
      <td class="td-manage">';
      if($v['admin_status']=='1'){ echo '<form id="stop" action="action/admin_stop.php" method="POST" style="float:left;"> <input name="data" type="text" value="';echo $v['id']; echo '" style="display:none">
      <button type="button" onClick="member_stop(this,'; echo "'10001'";  echo ')"  href="javascript:;" title="停用"  class="btn btn-xs btn-success"><i class="icon-ok bigger-120"></i></button></form>'; }
     if($v['admin_status']=='0'){	echo '<form id="start" action="action/admin_start.php" method="POST" style="float:left;"> <input name="data" type="text" value="';echo $v['id']; echo '" style="display:none" >
      <button type="button" onClick="member_start(this,'; echo "'10001'";  echo ')"  href="javascript:;" title="启用"  class="btn btn-xs"><i class="icon-ok bigger-120"></i></button></form>';
    } echo '
          <form style="float:left;"><button  title="编辑" onclick="member_ed('; echo " '编辑用户信息','admin_edit.php?id=";echo $v['id']; echo "','4','','450' "; echo
    ')" type="button" class="btn btn-xs btn-info" ><i class="icon-edit bigger-120"></i></button></form>
         <form action="action/delete_odd.php" method="POST" id="del" style="float:left"><input type="text" value="';echo $v['id']; echo '" name="odd_id" style="display:none;"/><input type="text" value="admin" name="odd_db" style="display:none;"/><button type="button" title="删除" href="javascript:;"  onclick="member_del(this,';echo "'1'"; echo ')" class="btn btn-xs btn-warning" ><i class="icon-trash  bigger-120"></i></button></form>
       </td>
     </tr>';
		}
	}
	/**
		**根据deptid查询deptname
	**/
	function admin_dept_sigle($deptid,$type){
		$sql="select * from admin_dept where dept_id = {$deptid}";//查询语句
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
	/**
	**	前台用户表根据用户id查询用户信息
	**/
	function select_user_message($account_id){
		global $user;
		$sql="select * from member where account_id = {$account_id} and store_id = {$user->store_id}";//查询语句
		$res=mysql_query($sql);//执行查询
		while($r=mysql_fetch_assoc($res)){
				$ro[]=$r;//接受结果集
		}
		foreach($ro as $key=>$v){
      $i++;
				echo '<p class="p2">会员编号： <span>';echo $v['account_id']; echo '</span></p>
			<p class="p2">姓名： <span>';echo $v['real_name']; echo '</span></p>
			<p class="p2">微信昵称： <span> '; echo $v['wx_nickname']; echo '</span></p>
			<p class="p2">手机号： <span>';echo $v['tel']; echo '</span></p>
			<p class="p2">可用余额： <span>';echo $v['money_still']; echo '</span></p>
			<p class="p2">剩余积分： <span>';echo $v['points']; echo '</span></p>';
		}
		if($i == 0){
			   exit('<script>alert(\'查询不到您输入的会员卡ID！\');history.back();</script>');
		}
	}

	/*************实时订单 *********************/

	function order_shishi($fen_id){
		$q= date("Y/m/d H:i:s",strtotime("-1 days"));
			$qian=strtotime($q);//获取当前时间

  	global $admin_sql1;
  	if($fen_id != null ){
  		 $sql="select * from orderlist {$admin_sql1} and fen_id = {$fen_id} order by time desc";//查询语句
  	}
     else{
     	 $sql="select * from orderlist {$admin_sql1} order by time desc";//查询语句
     }

    $res=mysql_query($sql);//执行查询
    while($row=mysql_fetch_assoc($res)){
        $rows[]=$row;//接受结果集
    }
    //遍历数组
    foreach($rows as $key=>$v){
    	if(strtotime($v['time']) > $qian){
    		$i++;
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
      <td>'; fendian_odd($v['fen_id']); echo '</td>
      <td>';if($v['dayin']=='1'){ echo '是';}else{ echo '否';}echo '</td>
       <td class="td-status"><span class="label label-success radius ">'; if($v['status']==0 && $v['status_ss']==0){echo '未支付';}if($v['status']==1 && $v['status_ss']==0){echo '已支付';} echo '</span><span class="label label-success radius">';if($v['status_ss']==0){echo '待处理'; }else if($v['status_ss']==1){echo '订单完成';}else if($v['status_ss'
       ]==2){ echo '订单关闭';}echo '</span></td>
      <td>
      <form action="action/order_success_action.php" method="POST" id="in" style="float:left"><input type="text" value="';echo $v['id']; echo '" name="order_id" style="display:none"/"><button '; if(($v['status']==1 || $v['paytype'] == 2 ) && $v['status_ss']==0 ){ echo ' onclick="order_success(this,1)"';}else{ echo 'onClick="alert('; echo "'该种状态下不允许操作'"; echo ')"';} echo ' title="标记成功"  class="btn btn-xs btn-success" type="button" ><i>处理</i></button></form>
      <a title="订单详细"  href="order_detailed.php?id=';echo $v['id']; echo '"  class="btn btn-xs btn-info order_detailed" ><i >详细</i></a>
      <a title="删除" href="javascript:;"  onclick="Order_form_del(this,1)" class="btn btn-xs btn-warning" ><i>删除</i></a>
       <form action="dayin.php" method="POST" id="dayin" style="float:right;"><input type="text" value="';echo $v['id']; echo '" name="id" style="display:none;"/><button type="button" title="打印" href="javascript:;"  onclick="dayin(this,';echo "'1'"; echo ')" class="btn btn-xs btn-warning" ><i >打印</i></button></form>
      </td>
      </tr>
      ';
    }
}
if($i==0){
	echo '<tr class="odd"><td colspan="10" class="dataTables_empty" valign="top">没有相关记录</td></tr>';
}
  }
  /**手机端查询实时 **/
  function order_mobile_shishi(){
		$q= date("Y/m/d H:i:s",strtotime("-1 days"));
			$qian=strtotime($q);//获取当前时间
  	global $admin_sql1;
      $sql="select * from orderlist {$sql1} order by time desc";//查询语句

    $res=mysql_query($sql);//执行查询
    while($row=mysql_fetch_assoc($res)){
        $rows[]=$row;//接受结果集
    }
    //遍历数组
    foreach($rows as $key=>$v){
    	if(strtotime($v['time']) > $qian){
          $i++;
    		  echo '
          <a href="mobile_orderdetail.php?oid=';echo $v['id']; echo '">
          <div class="list">
							<p class="p1">下单时间：';echo $v['time']; echo '<span class="color-b floatright">';echo $v['id']; echo '</span></p>
							<p class="p2">总计：￥';echo $v['all_money']; echo ' <span class="color-b floatright">';
              if($v['status']==0 && $v['paytype'] != 2){echo '未支付';}
              else{
                if($v['status_ss']==0){echo '待处理'; }
                else if($v['status_ss']==1){echo '订单完成';}
                else if($v['status_ss']==2){ echo '订单关闭';}
              } echo '</span></p>
						</div></a>';
    	}
   	}
    if($i == 0){
      echo '<p style="margin:10px auto; text-align:center;">暂无订单</p>';
    }
}
/**
 * 手机端 全部订单
 * @return [type] [description]
 */
function order_mobile_all(){

  global $admin_sql1;
    $sql="select * from orderlist {$sql1} order by time desc";//查询语句

  $res=mysql_query($sql);//执行查询
  while($row=mysql_fetch_assoc($res)){
      $rows[]=$row;//接受结果集
  }
  //遍历数组
  foreach($rows as $key=>$v){

        $i++;
        echo '
        <a href="mobile_orderdetail.php?oid=';echo $v['id']; echo '">
        <div class="list">
            <p class="p1">下单时间：';echo $v['time']; echo '<span class="color-b floatright">';echo $v['id']; echo '</span></p>
            <p class="p2">总计：￥';echo $v['all_money']; echo ' <span class="color-b floatright">';
            if($v['status']==0 && $v['paytype'] != 2){echo '未支付';}
            else{
              if($v['status_ss']==0){echo '待处理'; }
              else if($v['status_ss']==1){echo '订单完成';}
              else if($v['status_ss']==2){ echo '订单关闭';}
            } echo '</span></p>
          </div></a>';

  }
  if($i == 0){
    echo '<p style="margin:10px auto; text-align:center;">暂无订单</p>';
  }
}
function order_mobile_dai(){

  global $admin_sql1;
    $sql="select * from orderlist {$sql1} order by time desc";//查询语句

  $res=mysql_query($sql);//执行查询
  while($row=mysql_fetch_assoc($res)){
      $rows[]=$row;//接受结果集
  }
  //遍历数组
  foreach($rows as $key=>$v){
    if(($v['status']=='1' || $v['paytype'] == '2') && $v['status_ss'] == '0'){
        $i++;
        echo '
        <a href="mobile_orderdetail.php?oid=';echo $v['id']; echo '">
        <div class="list">
            <p class="p1">下单时间：';echo $v['time']; echo '<span class="color-b floatright">';echo $v['id']; echo '</span></p>
            <p class="p2">总计：￥';echo $v['all_money']; echo ' <span class="color-b floatright">';
            if($v['status']==0 && $v['paytype'] != 2){echo '未支付';}
            else{
              if($v['status_ss']==0){echo '待处理'; }
              else if($v['status_ss']==1){echo '订单完成';}
              else if($v['status_ss']==2){ echo '订单关闭';}
            } echo '</span></p>
          </div></a>';
    }
  }
  if($i == 0){
    echo '<p style="margin:10px auto; text-align:center;">暂无订单</p>';
  }
}

/*
	根据订单号查询订单信息
	针对点餐订单
*/

	function select_mobile_orderlist($oid,$type){
	$uid = $_SESSION['account_id'];
				$sql="select * from orderlist where id = {$oid}";//查询语句
				$res=mysql_query($sql);//执行查询
				while($r=mysql_fetch_assoc($res)){
			    	$ro[]=$r;//接受结果集
				}
				foreach($ro as $key=>$v){
					if ($type==1) {
			echo '
				<div class="de_head">
						';echo "{$v['order_name']}&nbsp;&nbsp;{$v['tel']}"; echo '<span style="float:right;color:#3501f5;">';
						if($v['order_type']==1){ echo "店内点餐"; }
						if($v['order_type']==2){echo "外卖订单";}
						if($v['order_type']==3){ echo "预定订单";}
						if($v['order_type']==4){ echo "快速买单";}
            if($v['order_type']==5){ echo "服务员点餐";} echo '</span>
				</div>
				<div class="de_box" >
					<p>订单号 <span>';echo $v['id']; echo '</span></p>
					<input type="text" value="';echo $v['id']; echo '" style="display:none;" name="oid"/>
					<p>订单状态<span class="s1">';
					if($v['status']==1){
						if($v['status_ss']==0){echo "待商家确认";}
						if($v['status_ss']==1){echo "订单完成";}
						if($v['status_ss']==2){echo "无效订单";}
					}if($v['status']==0){
						echo "未完成支付";
					}
					echo '</span></p>
					<p>用餐人数<span>';echo $v['order_people']; echo '人</span></p>';
					if($v['order_type']==1){
				echo '	<p>桌号<span>'; echo $v['order_desk']; echo '</span></p>';
			}if($v['order_type']==2){
					echo '<p>收货地址<span>'; echo $v['sh_address']; echo '</span></p>';
				}
					echo '
					<p>下单时间<span>';echo $v['time'];echo '</span></p>
				</div>
				<div class="de_box1">
					备注<span>'; echo $v['beizhu'];echo '</span>
				</div>';}
				if ($type==2) {
					echo '<div style="padding-bottom:5px"></div>';
				orderlist_youhui($v['yid']);
				orderlist_daijin($v['did']);

				echo '<div class="pay">';
				if($v['paytype']==1){	echo "微信支付	<span>￥{$v['all_money']}</span> ";}
				if($v['paytype']==2){echo "现金付款";}
				if($v['paytype']==3){	echo "会员卡支付	<span>￥{$v['all_money']}</span> ";}
				echo '</div>';

				}
			}
      if($ro == null){
        exit('<script>alert(\'没有此订单\');history.back();</script>');
      }
}

	/**
		根据优惠券id查询优惠券信息。用于订单详情展示页面
	**/
	function orderlist_youhui($id){

		$sql="select * from my_youhui where id = {$id} ";//查询语句
				$res=mysql_query($sql);//执行查询
				while($r=mysql_fetch_assoc($res)){
			    	$ro[]=$r;//接受结果集
				}
				foreach($ro as $key=>$v){
					if($v['type'] == 1){
						echo '<div class="pay">';echo "无门槛减{$v['wu_money']}优惠券"; echo '<span>-￥'; echo $v['wu_money'];echo '</span></div>';
					}else if($v['type']==2){
						echo '<div class="pay">';echo "满{$v['man_max']}减{$v['man_min']}优惠券"; echo '<span>-￥';echo $v['man_min']; echo '</span></div>';
					}

				}
	}

	/**
		根据代金券id查询优惠券信息。用于订单详情展示页面
	**/
	function orderlist_daijin($id){

		$sql="select * from my_daijin where id = '$id' ";//查询语句
				$res=mysql_query($sql);//执行查询
				while($r=mysql_fetch_assoc($res)){
			    	$ro[]=$r;//接受结果集
				}
				foreach($ro as $key=>$v){

						echo '<div class="pay">';echo "{$v['money']}代金券"; echo '<span>-￥';echo $v['money']; echo '</span></div>';
					}


	}

	/*
		根据订单号查询商品信息
	*/
		function select_mobile_order_products($order_id){
			include('../config/conn.php');

			$sql="select * from cart left join product on cart.product_id = product.pid where cart.order_id = {$order_id} and blog = 1";//查询语句
			$res=mysql_query($sql);//执行查询
			while($row=mysql_fetch_assoc($res)){
	    		$rows[]=$row;//接受结果集
			}
	//遍历数组
			foreach($rows as $key=>$v){
				echo '<p>';echo $v[products_name]; echo '<span class="s2" style="text-align:center;float:right;">x';echo $v['num']; echo '</span><span class="s1">￥';echo $v['products_price']; echo '</span></p>';
			}
}
/**
** 交班统计订单数量
**/
function jiaoban_order($start,$stop,$ces){
  $qian=strtotime($start);//获取当前时间
  $hou=strtotime($stop);//获取当前时间
  global $user;
  if($ces==1){//待处理
    $sql="select * from orderlist where store_id = {$user->store_id} and status_ss = '1'";//查询语句
  }else{ //全部订单
    $sql="select * from orderlist where store_id = {$user->store_id}";//查询语句
  }
  $res=mysql_query($sql);//执行查询
  while($r=mysql_fetch_assoc($res)){
      $ro[]=$r;//接受结果集
  }
  foreach($ro as $key=>$v){
    if(strtotime($v['time']) > $qian && strtotime($v['time']) < $hou){
      $i++;
    }
  }
  if($i==null){


  return 0;
  }
    return $i;
}

/*********************************交班 *************************************/
//交班信息列表
function jiaoban_list(){
  global $user;
  $sql="select * from jiaoban where store_id = '$user->store_id'";//查询语句
  $res=mysql_query($sql);//执行查询
  while($row=mysql_fetch_assoc($res)){
      $rows[]=$row;//接受结果集
  }
//遍历数组
  foreach($rows as $key=>$v){
    echo '<tr>
    	       <td><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
    	       <td>';echo $v['admin_name']; echo '</td>
    	        <td>'; echo $v['start_time']; echo '</td>
    	       <td>'; echo $v['stop_time']; echo '</td>
    	       <td>'; echo $v['order_all']; echo '</td>
             <td>'; echo $v['order_ok']; echo '</td>
            <td class="td-manage">

            <form action="action/delete_odd.php" id="in" method="post"><input type="text" name="odd_id" value="';echo $v['id']; echo '" style="display:none;"><input type="text" value="jiaoban" name="odd_db" style="display:none;"><button title="删除" href="javascript:;" type="button" class="btn btn-xs btn-warning" value="" onclick="member_del(this,\'1\')"><i >删除</i></button></form>
           </div></td>


    	      </tr>';
  }
}

/**
 * 手机端个人交班记录
 * @return [type] [description]
 */
  function mobile_jiaoban_log(){
    global $user;
    $sql="select * from jiaoban where store_id = '$user->store_id' and admin_id = '$user->admin_id' order by id desc";//查询语句
    $res=mysql_query($sql);//执行查询
    while($row=mysql_fetch_assoc($res)){
        $rows[]=$row;//接受结果集
    }
  //遍历数组
    foreach($rows as $key=>$v){
      echo '  <div class="list">
            <p class="p1">';echo $v['start_time']; echo ' - ';echo $v['stop_time']; echo "string"; '</p>
            <p class="p2">总订单：';echo $v['order_all']; echo ' <span class=" floatright">处理：'; echo $v['order_ok']; echo '</span></p>
          </div>';
    }
  }
  /****************************************通知管理************************************/
  /**
   * 通知管理
   */

    function notice_list(){
      global $user;
      $sql="select * from notice where store_id = '$user->store_id' order by id desc";//查询语句
      $res=mysql_query($sql);//执行查询
      while($row=mysql_fetch_assoc($res)){
          $rows[]=$row;//接受结果集
      }
    //遍历数组
      foreach($rows as $key=>$v){
        echo '
        <tr role="row" class="odd">
          <td><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
          <td class="sorting_1">';if($v['dept']==0){echo $v['uname'];}else if($v['dept']==1){
          if($v['rank']=='all'){ echo '所有会员';}else{
            id_rank_name($v['rank']);
          }
          } echo '</td>
          <td>'; echo $v['no_title']; echo '</td>
          <td>';echo $v['no_body']; echo '</td>
          <td>';echo $v['no_time']; echo '</td>
          <td><form action="action/delete_odd.php" method="post" id="del"><input type="text" value="';echo $v['id']; echo '" name="odd_id" hidden/><input type="text" name="odd_db" value="notice" hidden></form></div> <a title="删除" href="javascript:;" onclick="member_del(this,\'1\')" class="btn btn-xs btn-warning"><i class="">删除</i></a></td>
      </tr>
        ';
      }
  }
  /**
   * 会员通知管理会员表输出
   * 会员表输出
   */
   function notice_add_list(){
     global $admin_sql1;
     $sql="select * from member {$admin_sql1} order by account_id asc ";//查询语句
     $res=mysql_query($sql);//执行查询
     while($row=mysql_fetch_assoc($res)){
         $rows[]=$row;//接受结果集
     }
     foreach($rows as $key=>$v){
     	echo '
     		<tr>
               <td>';echo $v['account_id'];echo'</td>
               <td><u style="cursor:pointer;text-decoration:none" class="text-primary" onclick="member_show(';echo "'{$v['wx_nickname']}','member-show.php?id={$v['account_id']}','10001','500','400'";  echo ')">'; echo $v['wx_nickname'];echo '</u></td>
               <td>'; echo $v['tel']; echo '</td>

               <td>'; echo $v['create_date']; echo '</td>


               <td class="td-manage">';

           		echo '
               <button  title="编辑" onclick="member_ed('; echo " '发送通知','notice_add.php?id=";echo $v['account_id']; echo "','4','','450' "; echo
               ')" href="javascript:;"  class="btn btn-xs btn-info" >发送通知</button>

     		</tr>
             '; }
   }
   /**
    * 根据rank_id 输出 rank_name
    * @param  [type] $id [description]
    * @return [type]     [description]
    */
   function id_rank_name($id){
     $sql="select * from member_rank where rank_id = '$id'";//查询语句
     $res=mysql_query($sql);//执行查询
     while($row=mysql_fetch_assoc($res)){
         $rows[]=$row;//接受结果集
     }
     foreach($rows as $key=>$v){
       echo $v['rank_name'];
     }
   }
   /**
    * 更新管理员账户
    */
     function admin_update($name,$val,$u){
       $sql = "update admin set {$name} = '$val' where id = {$u}";

       $result = mysql_query($sql);
     }

    /**********************************后台账户权限管理****************************/
    /***
  	**dept_body 对应权限
  	*	1.商品列表
  	*	2.添加商品
  	*	3.分类管理
  	*	4.首页轮播图
  	*	5.交易信息
  	* 6.订单管理
  	* 7.实时订单
  	* 8.订单处理
  	* 9.退款管理
  	* 10.会员列表
  	* 11.等级管理
  	* 12.会员记录管理
  	* 13.充值记录
  	* 14.提现记录
  	* 15.采购商城
  	* 16.积分策略
  	* 17.优惠券管理
  	* 18.代金券管理
  	* 19.礼品券管理
  	* 20.评论列表
  	* 21.评论设置
  	* 22.通知管理
  	* 23.发送通知
  	* 24.门店设置
  	* 25.公众号配置
  	* 26.系统日志
  	* 27.交班信息
  	* 28.权限管理
  	* 29.管理员列表
  	* 30.收银系统
  	* 31.添加权限
  	*/
    /**
     * 该函数用于判断当前用户是否拥有该权限
     * @return [type] [description]
     */
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
    /**
     * 传入一个dept_id 用于判断是否拥有该权限
     * @return [type] [description]
     */
    function check_dept1($dept_id,$val){
      global $user;
      $sql="select * from admin_dept where dept_id = '$dept_id'";//查询语句
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

    //总平台给的权限设置
 function all_dept($val){
      global $item;
      $dept_body = explode(",",$item->dept);
      //此处开始判断
     
      if (in_array($val,$dept_body)) {
        return true;
      }else{
        return false;
      }
    }
    /**
     * 用于编辑权限
     */
     function dept_edit($dept_id){
       global $user;
       $sql="select * from admin_dept where dept_id = '$dept_id'";//查询语句
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
/********************************************店内点餐 员工版*****************************/
/*
	点餐页面
	左侧分类栏
 */

function order_left_sort(){
	global $admin_sql1;
	$sql="select * from product_sort {$admin_sql1} order by sort_sx asc ";//查询语句
	$res=mysql_query($sql);//执行查询
	while($row=mysql_fetch_assoc($res)){
    	$rows[]=$row;//接受结果集
	}
//遍历数组
	foreach($rows as $key=>$v){
		echo '<li><a >'; echo $v['sort_name'];echo '</a></li>';
	}
}
function pc_order_left_sort(){
  global $admin_sql1;
  $sql="select * from product_sort {$admin_sql1} order by sort_sx asc ";//查询语句
  $res=mysql_query($sql);//执行查询
  while($row=mysql_fetch_assoc($res)){
      $rows[]=$row;//接受结果集
  }
//遍历数组
  foreach($rows as $key=>$v){
    echo '<li><a >'; echo $v['sort_name'];echo '</a></li>';
  }
}
/*
	点餐页面
	右侧餐品信息栏

 */


 function order_right_body1(){
	 	global $admin_sql1;
 	$sql="select * from product_sort {$admin_sql1} order by sort_sx asc";//查询语句
	$res=mysql_query($sql);//执行查询orderlist_foreach
	while($r=mysql_fetch_assoc($res)){
    	$ro[]=$r;//接受结果集
	}
	foreach($ro as $key=>$s){
		if(end(array_keys($str))!=$key){  //此处根据key值判断切换分类
			echo '</ul>
	            <ul class="list-pro"  style="display:none;">';
		}
	$sql1="select * from product JOIN product_sort ON product_sort.id = product.sort_id where sort_id = {$s['id']} ";//查询语句
	$resd=mysql_query($sql1);//执行查询
	while($r=mysql_fetch_assoc($resd)){ //执行输出
    echo '<li class="lt-rt" style="width:22%;float:left;border:1px solid #eeeeee;box-shadow:0px 0px 4px #666666;margin-left:0;padding：0;margin-top:20px;" >
			    	<img src="../';echo $r['products_img']; echo '" class="list-pic" style="width:100%;height:150px;border:0" onclick="tan(\'';echo $r['products_img']; echo '\',\'';echo $r['products_name']; echo '\',\''; echo $r['products_price']; echo '\')"/></a>
			    		<div class="shop-list-mid" style="margin-top:10px;">
		                	<div class="tit"><a href=""  style="font-size:16px;">';echo $r['products_name'];echo '</div>
		                	<div class="am-gallery-desc" style="font-size:20px;margin-top:2px;">￥<span class="price">';echo $r['products_price']; echo '</span></div>
		                	<div class="tit" style="font-size:12px;color:#999999;">库存：<span >';echo $r['products_num1']; echo '</span></div>
		                </div>
		                <div class="list-cart" style="padding-right:5px;">
			                <div class="d-stock ">
					                <a class="decrease" >-</a>
					                <input id="num" readonly="" class="text_box" name="" type="text" value="0" >

					                <a class="increase">+</a>
					                <input id="nums" readonly="" class="txx" name="" type="text" value="';echo $r['pid']; echo '" style="display:none;">
			                </div>
		                </div>
			    	</li>
			    ';
									}
	}
}
 function order_right_body(){
    global $admin_sql1;
  $sql="select * from product_sort {$admin_sql1} order by sort_sx asc";//查询语句
  $res=mysql_query($sql);//执行查询orderlist_foreach
  while($r=mysql_fetch_assoc($res)){
      $ro[]=$r;//接受结果集
  }
  foreach($ro as $key=>$s){
    if(end(array_keys($str))!=$key){  //此处根据key值判断切换分类
      echo '</ul>
              <ul class="list-pro"  style="display:none;">';
    }
  $sql1="select * from product JOIN product_sort ON product_sort.id = product.sort_id where sort_id = {$s['id']} ";//查询语句
  $resd=mysql_query($sql1);//执行查询
  while($r=mysql_fetch_assoc($resd)){ //执行输出
    echo '<li class="lt-rt">
            <img src="../';echo $r['products_img']; echo '" class="list-pic" style="height:80px;"/></a>
              <div class="shop-list-mid">
                      <div class="tit"><a href="detail.html">';echo $r['products_name'];echo '</div>
                      <div class="am-gallery-desc" style="font-size:20px;">￥<span class="price">';echo $r['products_price']; echo '</span></div>
                      <div class="tit" style="font-size:12px;color:#999999;">库存：<span >';echo $r['products_num1']; echo '</span></div>
                    </div>
                    <div class="list-cart">
                      <div class="d-stock ">
                          <a class="decrease" >-</a>
                          <input id="num" readonly="" class="text_box" name="" type="text" value="0" >

                          <a class="increase">+</a>
                          <input id="nums" readonly="" class="txx" name="" type="text" value="';echo $r['pid']; echo '" style="display:none;">
                      </div>
                    </div>
            </li>
          ';
                  }
  }
}
/*
	这个函数的作用是每次打开页面之前清空一次购物车 避免购物车里有亢余
	每次刷新页面清除购物车

*/
	function clear($uid){
		include('../config/conn.php');//数据库连接文件
		$sql = "delete from cart where uid= '$uid' and blog = 0";
		mysql_query($sql,$con);
	}
  /*
  	购物车类
  	购物车商品列表展示

  */
  class cart{
  	public static $all_price; //购物车总钱数
  	public static $all_num; //购物车总份数
  	public static $get_points; // 购买改商品可获积分
  	/* 购物车商品展示 */
  	public static function card_list($uid,$type){
  		include('../config/conn.php');//数据库连接文件
  		$sql="select * from cart left join product on cart.product_id = product.pid where cart.uid = '$uid' and blog = 0";//查询语句

  		$res=mysql_query($sql);//执行查询
  		$ro = mysql_num_rows($res);//查询此时购物车里是否有商品
  		if($ro == 0){ //如果购物车里没有商品 退出返回
  			exit('<script>alert(\'您的购物车没有任何商品\');history.back();</script>');

  		}
  		while($row=mysql_fetch_assoc($res)){
      		$rows[]=$row;//接受结果集
  		}
  //遍历数组
  		foreach($rows as $key=>$v){
        if($type==1){
          echo '<option value="';echo $v['products_name']; echo '">'; echo $v['products_name']; echo '</option>';
        }
          else{

  			echo '<li>
  	    		<span class="name">';  echo $type;echo $v['products_name']; echo '</span>
  	    		<em class="price" style="padding-left:30px;width:auto;"">￥';echo $v['products_price']; echo '</em>
  	    		<div class="d-stock " >
  	            <input id="num" readonly="" class="text_box" name="" type="text" value="';echo $v['num']; echo '份" style="color:red;">
  			    </div>
  	    	</li>';
        }
  	    	$all_pri += $v['products_price'] * $v['num'];
  	    	$all_nums += $v['num'];
  				$get_points += $v['get_points'];
  	    	}
  	    //计算总钱数以及总份数
  		self::$all_price = $all_pri;
  		self::$all_num = $all_nums;
  		self::$get_points = $get_points;

  		}
  }
  	$cart = new cart();//实例一个购物车对象

/***********************************台号设置***********************************/
  function taihao_list($fen_id){
      global $admin_sql1;
      if($fen_id == null  || $fen_id == '0'){
         $sql="select * from taihao {$admin_sql1} and fen_id = '0' order by shunxu asc ";//查询语句
       }else{
          $sql="select * from taihao {$admin_sql1} and fen_id = '$fen_id' order by shunxu asc ";//查询语句
       }
     if($fen_id == null){
      $fen_id =0;
     }
      $res=mysql_query($sql);//执行查询
      while($row=mysql_fetch_assoc($res)){
          $rows[]=$row;//接受结果集
      }
      foreach($rows as $key=>$v){
      	echo '
            <tr>
           
             <td>'; echo $v['id']; echo '</td>
             <td>'; echo $v['shunxu']; echo '</td>
             <td>'; echo $v['tai_name']; echo '</td>
            
             <td>'; fendian_odd($fen_id); echo '</td>
             <td class="td-manage">
              <form action="" method="post" style="float:left;margin-left:80px;"><p><a title="编辑" onclick='; echo "'"; echo 'member_edit("编辑台号","taihao_edit.php?id=';echo $v['id']; echo '","4","","300")';echo "'"; echo ' href="javascript:;"  class="btn btn-xs btn-info" ><i >编辑</i></a></form>
              <form action="action/delete_odd.php" method="post" style="float:left;margin-left:20px;" id="in"><input type="text" name="odd_id" value="'; echo $v['id']; echo '"	style="display:none;"/><input type="text" value="taihao" name="odd_db" style="display:none;"/><button title="删除" href="javascript:;" type="button" class="btn btn-xs btn-warning" value="" onclick="member_del(this,';echo "'1'"; echo ')"><i >删除</i></button></form>             
               <form action="erweima.php" method="post" style="float:left;margin-left:20px;" id="in"><input type="text" name="tai_name" value="'; echo $v['tai_name']; echo '"  style="display:none;"/><input type="text" value="';echo $fen_id; echo '" name="fen_id" style="display:none"><button title="查看二维码" href="javascript:;" type="submit" class="btn btn-xs btn-warning" value=""><i >查看二维码</i></button></form></td>
            </tr>';
        }


  }

   function erweima1($value){
         include 'mobile/phpqrcode/phpqrcode.php';
         $errorCorrectionLevel = 'L';//容错级别
         $matrixPointSize = 15;//生成图片大小
         //生成二维码图片
         QRcode::png($value, 'qrcode.png', $errorCorrectionLevel, $matrixPointSize, 2);
         $logo = 'logo.png';//准备好的logo图片
         $QR = 'qrcode.png';//已经生成的原始二维码图
         if ($logo !== FALSE) {
           $QR = imagecreatefromstring(file_get_contents($QR));
           $logo = imagecreatefromstring(file_get_contents($logo));
           $QR_width = imagesx($QR);//二维码图片宽度
           $QR_height = imagesy($QR);//二维码图片高度
           $logo_width = imagesx($logo);//logo图片宽度
           $logo_height = imagesy($logo);//logo图片高度
           $logo_qr_width = $QR_width / 5;
           $scale = $logo_width/$logo_qr_width;
           $logo_qr_height = $logo_height/$scale;
           $from_width = ($QR_width - $logo_qr_width) / 2;
           //重新组合图片并调整大小
           imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width,
           $logo_qr_height, $logo_width, $logo_height);
         }
         //输出图片
         imagepng($QR, 'helloweba.png');

 }
  function order_tai(){
    global $admin_sql1;
    $sql="select * from taihao {$admin_sql1} order by shunxu asc ";//查询语句
    $res=mysql_query($sql);//执行查询
    while($row=mysql_fetch_assoc($res)){
        $rows[]=$row;//接受结果集
    }
    foreach($rows as $key=>$v){
      echo '<button class="tai" id="btn" onclick=tai_add("'; echo $v['tai_name']; echo '")>';echo $v['tai_name']; echo '</button>';
    }
  }
  //充值赠送金额确定函数
  function check_recharge_gift($trade_money) {
    global $item;
    if($item->chong_gift == 1){
      if ($trade_money >= $item->chong_value5) {
          $gift_money = $item->chong_gift5;
      } else if ($trade_money >= $item->chong_value4) {
          $gift_money = $item->chong_gift4;
      } else if ($trade_money >= $item->chong_value3) {
            $gift_money = $item->chong_gift3;
      } else if ($trade_money >= $item->chong_value2) {
          $gift_money = $item->chong_gift2;
      } else if ($trade_money >= $item->chong_value1) {
          $gift_money = $item->chong_gift1;
      } else {
          $gift_money = 0;
      }
    }else{
      $gift_money = 0;
    }
      return $gift_money;
  }

  //确定充值分销的赠送的金额
  function check_dis_recharge_gift($trade_money) {
    global $item;
      if ($trade_money >= $item->chong_fen_5_1) {
          $gift_money = $item->chong_fen_5_2;
      } else if ($trade_money >= $item->chong_fen_4_1) {
          $gift_money = $item->chong_fen_4_2;
      } else if ($trade_money >= $item->chong_fen_3_1) {
          $gift_money = $item->chong_fen_3_2;
      } else if ($trade_money >= $item->chong_fen_2_1) {
          $gift_money = $item->chong_fen_2_2;
      } else if ($trade_money >= $item->chong_fen_1_1) {
          $gift_money = $item->chong_fen_1_2;
      } else {
          $gift_money = 0;
      }
      return $gift_money;
  }

  //获取上级名字
  function get_sname($yid){
    $sql="select * from member where account_id = '$yid'";//查询语句
      $res=mysql_query($sql);//执行查询
      while($r=mysql_fetch_assoc($res)){
          $ro[]=$r;//接受结果集
      }
      foreach($ro as $key=>$v){
          echo $v['wx_nickname'];
      }
      if($ro == null){
        echo '无上级';
      }
  }

  	//获取下级名字
  	function get_ximg($id){
  		global $user;
  		$sql="select * from member where up_id = '$id' and store_id = '$user->store_id'";//查询语句
  			$res=mysql_query($sql);//执行查询
  			while($r=mysql_fetch_assoc($res)){
  					$ro[]=$r;//接受结果集
  			}
  			foreach($ro as $key=>$v){
  					echo '<a onclick="member_show(';echo "'{$v['wx_nickname']}','member-show.php?id={$v['account_id']}','10001','500','400'";  echo ')">'; echo $v['wx_nickname']; echo "</a>&nbsp;";
  			}
  	}

    /**********************分店管理*******************************/
    function shop_list(){
      global $user;
      $sql="select * from fendian where store_id = '$user->store_id'";//查询语句
      $res=mysql_query($sql);//执行查询
      while($row=mysql_fetch_assoc($res)){
          $rows[]=$row;//接受结果集
      }
      foreach($rows as $key=>$v){
       echo '
         
                <td>';echo $v['store_id'];echo'</td>
                <td>'; echo $v['fen_name']; echo '</td>
                <td><img src="'; echo $v['fen_img']; echo '" style="width:120px;height:80px;"/></td>

                <td>'; echo $v['fen_place'];echo '</td>
                <td>'; echo $v['fen_phone'];echo '</td>

               <td class="td-status">';if($v['fen_status']=='1'){echo '<span class="label label-success radius">已启用</span>'; }if($v['fen_status']=='0'){echo '<span class="label label-defaunt radius">已停用</span>'; }echo '</td>
               <td class="td-manage">';
               if($v['fen_status']=='1'){ echo '<form id="stop" action="action/fen_stop.php" method="POST" style="float:left;margin-left:20px;"> <input name="data" type="text" value="';echo $v['id']; echo '" style="display:none">
               <button type="button" onClick="member_stop(this,'; echo "'10001'";  echo ')"  href="javascript:;" title="停用"  class="btn btn-xs btn-success"><i>停用</i></button></form>'; }
               if($v['fen_status']=='0'){	echo '<form id="sta" action="action/fen_start.php" method="POST" style="float:left;margin-left:20px;"> <input name="data" type="text" value="';echo $v['id']; echo '" style="display:none" >
               <button type="button" onClick="member_start(this,'; echo "'10001'";  echo ')"  href="javascript:;" title="停用"  class="btn btn-xs"><i>启用</i></button></form>';
               }
               echo '
                <button  title="编辑" onclick="member_ed('; echo " '编辑分店信息','fendian_edit.php?id=";echo $v['id']; echo "','4','','450' "; echo
                ')" href="javascript:;"  class="btn btn-xs btn-info" ><i>设置</i></button>
                <form action="action/delete_odd.php" method="POST" id="del" style="float:right;margin-right:25px;"><input type="text" value="';echo $v['id']; echo '" name="odd_id" style="display:none;"/><input type="text" value="fendian" name="odd_db" style="display:none"><button type="button" title="删除" href="javascript:;"  onclick="member_del(this,';echo "'1'"; echo ')" class="btn btn-xs btn-warning" ><i >删除</i></button></form>';
              echo '
               </td>
         </tr>
              '; }
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
    function fendian_list($type,$fen_id,$type1){
      global $user;
      $sql="select * from fendian where store_id = '$user->store_id'";//查询语句
      $res=mysql_query($sql);//执行查询
      while($row=mysql_fetch_assoc($res)){
          $rows[]=$row;//接受结果集
      }
      foreach($rows as $key=>$v){
        if($type==1){
          echo '<option value="?fen_id=';echo $v['id'];if($type1!==null){ echo "&type=$type1";} echo '"';if($v['id'] == $fen_id){ echo 'selected="selected"';} echo '>';echo $v['fen_name']; echo '</option>';
        }else if($type==2){
          echo '<option value="';echo $v['id']; echo '"';if($v['id'] == $fen_id){ echo 'selected="selected"';} echo '>';echo $v['fen_name']; echo '</option>';
        }else if($type==3){
          echo '<option value=';echo $v['id']; echo '>';echo $v['fen_name']; echo '</option>';
        }
      }
    }
    //传入分店id查询信息
    function fendian_odd($id){
      global $user;
      $sql="select * from fendian where store_id = '$user->store_id' and id = '$id'";//查询语句
      $res=mysql_query($sql);//执行查询
      while($row=mysql_fetch_assoc($res)){
          $rows[]=$row;//接受结果集
      }
      foreach($rows as $key=>$v){

          echo $v['fen_name'];


      }
      if($id==0 || $id == null){
        echo '总店';
      }
    }
      function fendian_odd1($id){
        global $item;
      global $user;
      $sql="select * from fendian where store_id = '$user->store_id' and id = '$id'";//查询语句
      $res=mysql_query($sql);//执行查询
      while($row=mysql_fetch_assoc($res)){
          $rows[]=$row;//接受结果集
      }
      foreach($rows as $key=>$v){

          echo $v['fen_name'];


      }
      if($id==0 || $id == null){
        echo $item->store_name;
      }
    }
    function tuikuan($fen_id,$type){
    	  global $user;
    	  if($type != null){
    	  		if($fen_id != null){
  						$sql="select * from tuikuan join orderlist on tuikuan.order_id = orderlist.id where tuikuan.store_id = '$user->store_id' and orderlist.fen_id = '$fen_id' and orderlist.status_ss = '$type' order by tui_time desc";//查询语句
    	  		}else{
    	  	 		 $sql="select * from tuikuan join orderlist on tuikuan.order_id = orderlist.id where tuikuan.store_id = '$user->store_id' and orderlist.status_ss = '$type' order by tui_time desc";//查询语句
    	 		 }
    	  }else{
    	  if($fen_id != null){
  $sql="select * from tuikuan join orderlist on tuikuan.order_id = orderlist.id where tuikuan.store_id = '$user->store_id' and orderlist.fen_id = '$fen_id' order by tui_time desc";//查询语句
    	  }else{
    	  	  $sql="select * from tuikuan join orderlist on tuikuan.order_id = orderlist.id where tuikuan.store_id = '$user->store_id' order by tui_time desc";//查询语句
    	  }
    }
      $res=mysql_query($sql);//执行查询
      while($row=mysql_fetch_assoc($res)){
          $rows[]=$row;//接受结果集
      }
      foreach($rows as $key=>$v){

          echo ' <tr>
           <td><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
     <td>'; echo $v['order_id'];echo '</td>
     <td>'; echo $v['order_name'];echo '</td>
     <td class="order_product_name">'; 
order_product($v['order_id'],'1');echo '
     </td>
     <td>';echo $v['all_money']; echo '</td>
     <td>';echo $v['time']; echo '</td>
      <td>';echo $v['liyou']; echo '</td>
      <td>';fendian_odd($v['fen_id']); echo '</td>
     <td>';if($v['status_ss']==3){ echo '退款待处理';}else if($v['status_ss']==4){ echo '退款成功';}else if($v['status_ss']==5){ echo '退款失败';} echo '</td>
     <td>
      <form action="action/tuikuan_action.php" method="POST" id="in" style="float:left"><input type="text" value="';echo $v['order_id']; echo '" name="order_id" style="display:none"/"><button '; if($v['status_ss']==3 ){ echo ' onclick="order_success(this,1)"';}else{ echo 'onClick="alert('; echo "'该种状态下不允许操作'"; echo ')"';} echo ' title="标记成功"  class="btn btn-xs btn-success" type="button" ><i>退款</i></button></form>
    <form action="action/no_tuikuan_action.php" method="POST" id="on" style="float:left"><input type="text" value="';echo $v['order_id']; echo '" name="order_id" style="display:none"/"><button '; if($v['status_ss'] == 3 ){ echo ' onclick="order_success1(this,1)"';}else{ echo 'onClick="alert('; echo "'该种状态下不允许操作'"; echo ')"';} echo ' title="不退款"  class="btn btn-xs btn-success" type="button" ><i>不退款</i></button></form>
       <form action="action/delete_tuikuan.php" method="POST" id="del" style="float:right;"><input type="text" value="';echo $v['t_id']; echo '" name="odd_id" style="display:none;"/><input type="text" value="tuikuan" name="odd_db" style="display:none;"/><button type="button" title="删除" href="javascript:;"  onclick="member_del(this,';echo "'1'"; echo ')" class="btn btn-xs btn-warning" ><i >删除</i></button></form>
      </td>
         </tr>';     
    
    }
    }
    //此函数用于查询门店版本
    function store_sort($sort_id){
    	
    	$sql="select * from store_sort where id = '$sort_id'";//查询语句

      $res=mysql_query($sql);//执行查询
      while($row=mysql_fetch_assoc($res)){
          $rows[]=$row;//接受结果集
      }
      foreach($rows as $key=>$v){
      	echo $v['sort_name'];
      }
    }
    function stop_day(){
    	global $item;
    	$endTime = $item->stop_time;
    	$VarTime = floor((strtotime($endTime)-time())/86400);
    	echo $VarTime;
    }
    function check_store_status(){
    	global $item;
    	global $user;
    	$z=strtotime($item->stop_time);
    	if($z < time()){
    		echo '您的门店到期啦';
    		$sql = "update store_setting set status = '0' where store_id = '$user->store_id'";
    		mysql_query($sql);
    	}
    }

    check_store_status();
    function cardzhe($o){
    global $user;
    
    
    $sql="select * from member_rank where rank_id = '$user->card_type'";//查询语句
    $res=mysql_query($sql);//执行查询
    while($r=mysql_fetch_assoc($res)){
        $ro[]=$r;//接受结果集
    }
    foreach($ro as $key=>$v){
      if($o ==1){
        return  $v['rank_zhe'];
      }
      if($o ==2){
return  $v['rank_name'];
      }
    } 

  }
  function taocan_log(){
    global $user;
     $sql="select * from taocan_log where store_id = '$user->store_id'";//查询语句
    $res=mysql_query($sql);//执行查询
    while($r=mysql_fetch_assoc($res)){
        $ro[]=$r;//接受结果集
    }
    foreach($ro as $key=>$v){
     echo '<tr>
              <td><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
              <td>';echo $v['id']; echo '</td>
              <td>'; echo $v['name'];echo '</td>
              <td style="">';if($pay_type ==1 ){ echo '支付宝支付';}else{ echo '微信支付';}echo '</td>
              <td>';echo $v['admin_name']; echo '</td>
              <td>';echo $v['time']; echo '</td>
              <td>';echo $v['money']; echo '</td>
              <td>';if($v['status']==0){ echo '失败';}else if($v['status']==1){ echo '成功';}echo '</td>
            </tr>';
    }
  }

/**
  **发送通知  
**/
function send_message($openid,$tid,$data,$urls){
  global $item;
$appid = $item->appid;
$appsecret =$item->appsecret;
$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appid}&secret=$appsecret";
$output = https_request($url);
$jsoninfo = json_decode($output,true);
$access_token = $jsoninfo["access_token"];
$jsonmenu1 = array(
'touser'=>$openid,
'template_id'=>$tid,    //模板的id
'url'=>$urls,
'topcolor'=>"#FF0000",
'data'=>$data
);
$jsonmenu = json_encode($jsonmenu1); 
  //创建菜单实现
  $url = 'https://api.weixin.qq.com/cgi-bin/message/template/send?access_token='.$access_token;
  $result = https_request($url,$jsonmenu);
  //var_dump($result);
  }
  function https_request($url,$data = null){
      $curl = curl_init();
      curl_setopt($curl,CURLOPT_URL,$url);
      curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
      curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
      if(!empty($data)){
          curl_setopt($curl,CURLOPT_POST,1);
          curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
      }
      curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
      $output = curl_exec($curl);
      curl_close($curl);
      return $output;
  }

 function dayinji_list($fen_id){
  global $user;
    if($fen_id == 0|| $fen_id == null){
        $sql="select * from dayinji where store_id = '$user->store_id' and fen_id = '0' ";//查询语句
    }else{
        $sql="select * from dayinji where store_id = '$user->store_id' and fen_id = '$fen_id' ";
    }

    $res=mysql_query($sql);//执行查询
    while($row=mysql_fetch_assoc($res)){
        $rows[]=$row;//接受结果集
    }
    foreach($rows as $key=>$v){
      echo '
          <tr>
           <td><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
           <td>'; echo $v['id']; echo '</td>
           <td>'; echo $v['name']; echo '</td>
          
           <td>'; echo $v['beizhu']; echo '</td>
           <td>'; echo $v['time']; echo '</td>
           <td class="td-manage">
            <form action="" method="post" style="float:left;margin-left:80px;"><p><a title="编辑" onclick='; echo "'"; echo 'member_edit("编辑打印机","dayinji_edit.php?id=';echo $v['id']; echo '","4","","450")';echo "'"; echo ' href="javascript:;"  class="btn btn-xs btn-info" ><i >编辑</i></a></form>
            <form action="action/delete_odd.php" method="post" style="float:left;margin-left:20px;" id="in"><input type="text" name="odd_id" value="'; echo $v['id']; echo '" style="display:none;"/><input type="text" value="dayinji" name="odd_db" style="display:none;"/><button title="删除" href="javascript:;" type="button" class="btn btn-xs btn-warning" value="" onclick="member_del(this,';echo "'1'"; echo ')"><i >删除</i></button></form></p></td>
          </tr>';
      }
  }

?>
