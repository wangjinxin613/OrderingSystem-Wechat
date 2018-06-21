
		<script src="../js/jquery-1.8.3.min.js" type="text/javascript"></script>
		<script src="../js/mobile/layer.js"></script>
  		<script src="../js/layer.js"></script>
  		<script src="../js/loading.js"></script>

<?php

	header("Content-Type: text/html; charset=UTF8");
	session_start();
	error_reporting(0);
	$yid = $_SESSION['yid'];
	include('../config/conn.php');//数据库连接文件
$time= date("Y/m/d H:i:s");//获取当前时间

		$store_id = $_SESSION['store_id']; //店铺id作为一个全局变量
		$fen_id = $_SESSION['fen_id']; //分店id
		$sql1 = "where store_id = '$store_id'";
		$sql2 = "and store_id = '$store_id'";
		function date_chang($v){
			$d= date("Y-m-d",$v);
			echo $d;
		}
		function check($val){ //检测传递过来的参数必须是数字，防止被黑客攻击
			if($val != null){
					if(ctype_digit($val)== false){ //
    				exit('<script>alert(\'参数传递有误！！\');history.back();</script>');
						}
			}
}
/* 获取门店信息的类      */
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
		public $appid;
		public $appsecret;
		public $token;
		public $beizhu; //门店描述
		public $zuobiao; //门店描述
		public $wx_erweima;//微信公众号二维码
		public $share_points;
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
		public $mchid; 
		public $key; 
		public $tid3; 
		public $tid4; 
		public $tid5; 
		public $tid6; 
		public $tid7; 

}
$item=new indexitem();

			mysql_select_db("my_db", $con);
	$result = mysql_query("SELECT * FROM store_setting {$sql1}");
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
			$item->appid = $row['appid'];
			$item->appsecret = $row['appsecret'];
			$item->token = $row['token'];
			$item->beizhu = $row['beizhu'];
			$item->zuobiao = $row['zuobiao'];
			$item->wx_erweima = $row['wx_erweima'];
			$item->share_points = $row['share_points'];
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
		  $item->mchid = $row['mchid'];
		  $item->key = $row['mchid_key'];
		  $item->tid3 = $row['tid3'];
		  $item->tid4 = $row['tid4'];
		  $item->tid5 = $row['tid5'];
		  $item->tid6 = $row['tid6'];
		  $item->tid7 = $row['tid7'];

 	}

	if($fen_id != null){ //如果分店启用
		$result = mysql_query("SELECT * FROM fendian where store_id = '$store_id' and id = '$fen_id'");
		while($row = mysql_fetch_array($result))
		{
			$item->store_name = $row['fen_name'];
 			$item->store_place = $row['fen_place'];
 			$item->store_phone = $row['fen_phone'];
 			$item->store_price = $row['fen_price'];
 			$item->store_wifi = $row['fen_wifi'];
 			$item->store_paking = $row['fen_paking'];
 			$item->store_showtime = $row['fen_showtime'];
 			$item->store_pinglun = $row['fen_pinglun'];

 			$item->gg_title = $row['fen_gg_title'];
 			$item->gg_body = $row['fen_gg_body'];
 			$item->gg_time = $row['fen_gg_time'];
 			$item->store_img = $row['fen_img'];
			$item->beizhu = $row['fen_beizhu'];
			$item->zuobiao = $row['zuobiao'];
			$item->status = $row['fen_status'];
		}
	}

	if($item->status == 0){
    exit('<script>alert(\'您的店铺没有启用，sorry！！\');window.location.href="../no_store.html";</script>');
  }



/* 获取用户信息的类      */


 	class userinfo{
 		//获取会员信息
 		public $user_id;
 		public $nickname;
 		public $points; //积分
 		public $money_still; //剩余金额
 		public $money_gift; //赠送金额
 		public $money_used; //花费金额
 		public $rank; //用户状态 normal 正常 no 禁用
 		public $status; //身份
 		public $tel; //电话

 		public $address; //地址
 		public $card_type; //会员卡类型
 		public $real_name; //认识姓名
 		public $pwd; //会员卡密码
 		public $blog; //判断是否激活会员卡 null未激活 1 激活
 		public $car;	//车牌号
 		public $birthday;  //生日
		public $qd_num;  //签到连续天数
		public $qd_points;//签到获得积分
		public $store_id;//签到获得积分
		public $point_used;//已用积分
		public $up_id;//上级ID
		public $up_points;
		public $up_money_gift; //推广收益赠送金额
		public $openid; //推广收益赠送金额
 	}
 	$user = new userinfo();
//$_SESSION['account_id'] = "60050"; //测试账号 正常应该删
 	if($_SESSION['account_id']==null){
 		echo '微信自动登录中....';
 				echo "<script>window.location.href='https://open.weixin.qq.com/connect/oauth2/authorize?appid={$item->appid}&redirect_uri=http://www.nsg0769.cn/wxlogin/oauth.php&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect&yid=$yid';</script>";
 	}
 	$account_id = $_SESSION['account_id'];
 	mysql_select_db("my_db", $con);
	$result1 = mysql_query("SELECT * FROM member where account_id = '$account_id'");
	while($v = mysql_fetch_array($result1))
 	{
 		$user->user_id = $v['account_id'];
 		$user->nickname = $v['wx_nickname'];
 		$user->points = $v['points'];
 		$user->money_still = $v['money_still'];
 		$user->money_gift = $v['money_gift'];
 		$user->money_used = $v['money_used'];
 		$user->rank = $v['rank'];
 		$user->status = $v['status'];
 		$user->tel = $v['tel'];
 		$user->pwd = $v['pwd'];
 		$user->address = $v['address'];
 		$user->card_type = $v['cardtype'];
 		$user->real_name = $v['real_name'];
		$user->blog = $v['blog'];
		$user->car = $v['car'];
		$user->birthday= $v['birthday'];
		$user->qd_num= $v['qd_num'];
		$user->store_id= $v['store_id'];
		$user->qd_points= $v['qd_points'];
		$user->point_used= $v['point_used'];
		$user->up_id= $v['up_id'];
		$user->up_points =  $v['up_points'];
		$user->up_money_gift =  $v['up_money_gift'];
		$user->openid =  $v['wx_openid'];
 	}
/*
	检测用户是否启用
*/
if($user->rank=="no"){
		exit('<script>alert(\'您的账户被管理员禁用！\');window.location.href="../no.html";</script>');
}



if($user->store_id != $store_id){
			echo "<script>window.location.href='https://open.weixin.qq.com/connect/oauth2/authorize?appid={$item->appid}&redirect_uri=http://www.nsg0769.cn/wxlogin/oauth.php&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect&yid=$yid';</script>";
 	}

/*      评论功能 评论展示页面        */

 	function pinglun(){
		global $sql2;
	$sql="select * from pinglun where shenhe = '1' {$sql2} order by time desc limit 0,5";//查询语句
	$res=mysql_query($sql);//执行查询
	while($row=mysql_fetch_assoc($res)){
    	$rows[]=$row;//接受结果集
	}
 	foreach($rows as $key=>$v){
 		echo '
		<div class="box ping">
			<p class="p1">';echo $v['nickname']; echo ' &nbsp;<a style="color:#666666;">'; echo $v['time']; echo '</a></p>
			<p class="p2">';echo $v['text']; echo '</p>
		</div>';
	}
 }




/*      评论功能 评论展示页面
		评论详情页
*/
 	function pinglun1(){
	global $sql2;
	$sql="select * from pinglun where shenhe = '1' {$sql2} order by time desc";//查询语句
	$res=mysql_query($sql);//执行查询
	while($row=mysql_fetch_assoc($res)){
    	$rows[]=$row;//接受结果集
	}
 	foreach($rows as $key=>$v){
 		echo '
		<div class="box ping">
			<p class="p1">';echo $v['nickname']; echo ' &nbsp;<a style="color:#666666;">'; echo $v['time']; echo '</a></p>
			<p class="p2">';echo $v['text']; echo '</p>
		</div>';
	}
 }

 /*      下面这个函数的功能是添加评论用的啦

*/


 	function pinglun_add($text,$nickname){
		global $store_id;
 		include('../config/conn.php');//数据库连接文件
 		$time= date("Y/m/d H:i:s");//获取当前时间
	$q="insert into pinglun(id,nickname,text,time,store_id) values (null,'$nickname','$text','$time','$store_id')";//向数据库插入表单传来的值的sql
  	$reslut=mysql_query($q,$con);//执行sql
	if (!$reslut){
	    	die('Error: ' . mysql_error());//如果sql执行失败输出错误
	}else{
	 	 	exit('<script>alert(\'评论成功，后台管理员审核后方可显示！\');window.location.href="../store";</script>');
	}

}

 /*      下面这个函数的功能是统计某个表用的啦

*/
 	function tj($s){
 		$sql1 = mysql_query("SELECT * FROM {$s}") or die(mysql_error());
 		 $row1 = mysql_num_rows($sql1);
 		 echo $row1;
}
function tj1($s){
 		$sql1 = mysql_query("SELECT * FROM {$s}") or die(mysql_error());
 		 $row1 = mysql_num_rows($sql1);
 		 return $row1;
}

 /*      更新数据member表

*/
function update($name,$val,$id){
		 include('../config/conn.php');
	 	$sql = "update member set $name = '$val' where account_id = {$id}";
   		$result = mysql_query($sql);
   	}



/*
	点餐页面
	左侧分类栏
 */

function order_left_sort(){
	global $sql1;
	global $fen_id;
	if($fen_id == null || $fen_id == 0){
			$sql="select * from product_sort {$sql1} and fen_id = '0' order by sort_sx asc ";//查询语句
	}else{
			$sql="select * from product_sort {$sql1} and fen_id = '$fen_id' order by sort_sx asc ";//查询语句
	}

	$res=mysql_query($sql);//执行查询
	while($row=mysql_fetch_assoc($res)){
    	$rows[]=$row;//接受结果集
	}
//遍历数组
	foreach($rows as $key=>$v){
		echo '<li ><a >'; echo $v['sort_name'];echo '</a></li>';
	}
}


/*
	点餐页面
	右侧餐品信息栏

 */


 function order_right_body(){
	 	global $sql1;
		global $fen_id;
		if($fen_id == null || $fen_id == '0'){
			$sql="select * from product_sort {$sql1} and fen_id = '0' order by sort_sx asc";
		}else{
			$sql="select * from product_sort {$sql1} and fen_id = '$fen_id' order by sort_sx asc";//查询语句
		}

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
			    	<img src="';echo $r['products_img']; echo '" class="list-pic" style="height:70px;"/></a>
			    		<div class="shop-list-mid">
		                	<div class="tit">';echo $r['products_name'];echo '</div>

		                	<div class="am-gallery-desc" style="font-size:20px;">￥<span class="price">';echo $r['products_price']; echo '</span></div>
		                	<div class="tit" style="font-size:12px;color:#999999;">已售：<span >';echo $r['products_num2']; echo '</span></div>
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
		$sql = "delete from cart where uid={$uid} and blog = 0";
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
	global $item;
		$sql="select * from cart left join product on cart.product_id = product.pid where cart.uid = {$uid} and blog = 0";//查询语句

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
	    		<span class="name">';echo $v['products_name']; echo '</span>
	    		<em class="price" style="padding-left:30px;width:auto;"">￥';echo $v['products_price']; echo '</em>
	    		<div class="d-stock " >
	            <input id="num" readonly="" class="text_box" name="" type="text" value="';echo $v['num']; echo '份" style="color:red;">
			    </div>
	    	</li>';
			}
	    	$all_pri += $v['products_price'] * $v['num'];
	    	$all_nums += $v['num'];
				$get_points = $all_pri * ($item->xiao_value_2/$item->xiao_value_1);
	    	}
	    //计算总钱数以及总份数
		self::$all_price = $all_pri;
		self::$all_num = $all_nums;
		self::$get_points = $get_points;

		}
}
	$cart = new cart();//实例一个购物车对象



/*
	对购物车(cart)的表进行更新数据
	订单提交得逻辑处理时需要用到的

*/
	function update_cart($uid,$name,$val){
		include('../config/conn.php');
	 	$sql = "update cart set $name = '$val' where uid = {$uid} and blog = '0'";
   		$result = mysql_query($sql);
   	}

/*
	更新订单信息
	例如更新订单的支付状态
*/
   	function update_orderlist($order_id,$name,$val){
		include('../config/conn.php');
	 	$sql = "update orderlist set $name = '$val' where id = {$order_id}";
   		$result = mysql_query($sql);
   	}
/*
	更新优惠券或代金券可用性
	例如更新订单的支付状态
*/
   	function update_order_quan($db,$name,$val,$id){

	 	$sql = "update {$db} set $name = '$val' where id = {$id}";
   		$result = mysql_query($sql);
   	}

/*
	这个函数的作用的更新商品表
	更新商品在库数量和已售数量
*/
   	function update_productnum($order_id){
		include('../config/conn.php');
		$sql="select * from cart left join product on cart.product_id = product.pid where cart.order_id = {$order_id} and blog = 1";//查询语句
		$res=mysql_query($sql);//执行查询
		while($row=mysql_fetch_assoc($res)){
    		$rows[]=$row;//接受结果集
		}
//遍历数组
		foreach($rows as $key=>$v){

	 	$sql1 = "update product set products_num1 = products_num1 - {$v['num']} where pid = {$v['product_id']}";
   		$result = mysql_query($sql1);//更新商品在库数量
   		$sql2 = "update product set products_num2 = products_num2 + {$v['num']} where pid = {$v['product_id']}";
   		$result = mysql_query($sql2);//更新商品已售数量
   		}
}

/*
	根据订单号查询订单信息
	针对点餐订单
*/

	function select_orderlist($oid,$type){
	$uid = $_SESSION['account_id'];
				$sql="select * from orderlist where id = {$oid} and order_uid = {$uid}";//查询语句
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
						if($v['order_type']==4){ echo "快速买单";} echo '</span>
				</div>
				<div class="de_box" >
					<p>订单号 <span>';echo $v['id']; echo '</span></p>

					<p>订单状态<span class="s1">';
					if($v['status']==1 || $v['order_type']==3){
						if($v['status_ss']==0){echo "待商家确认";}
						if($v['status_ss']==1){echo "订单完成";}
						if($v['status_ss']==2){echo "无效订单";}
						if($v['status_ss']==3){echo "退款申请中";}
						if($v['status_ss']==4){echo "退款成功";}
						if($v['status_ss']==5){echo "退款失败";}
					}else{
						echo "未完成支付";
					}
					echo '</span></p>
					';
					if($v['order_type']==1){
				echo '	<p>桌号<span>'; echo $v['order_desk']; echo '</span></p>';
			}if($v['order_type']==2){
					echo '<p>收货地址<span>'; echo $v['sh_address']; echo '</span></p>';
				}
					echo '
					<p>下单时间<span>';echo $v['time'];echo '</span></p>
					<p>获得积分<span>';echo $v['get_points'];echo '</span></p>
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
				if($v['paytype']==4){	echo "支付宝支付	<span>￥{$v['all_money']}</span> ";}
				
				echo '</div>';
				if($v['status']==1 && $v['status_ss'] == 0){
					echo '<a href="return.php?id=';echo $v['id']; echo '"><button style="padding:10px 0;margin:18px 10%;width:80%;border:0;background:#FF0033;color:#fff;border-radius:5px;">申请退款</button></a>';
				}
				}
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
		function select_order_products($order_id,$o){
			include('../config/conn.php');
				$uid = $_SESSION['account_id'];
			$sql="select * from cart left join product on cart.product_id = product.pid where uid = {$uid} and cart.order_id = {$order_id} and blog = 1";//查询语句
			$res=mysql_query($sql);//执行查询
			while($row=mysql_fetch_assoc($res)){
	    		$rows[]=$row;//接受结果集
			}
	//遍历数组
			foreach($rows as $key=>$v){
				if($o == 1){
					$z = $v['products_name']."x".$v['num'];
					return $z; 
				}else{
				echo '<p>';echo $v[products_name]; echo '<span class="s2" style="text-align:center;float:right;">x';echo $v['num']; echo '</span><span class="s1">￥';echo $v['products_price']; echo '</span></p>';
			
			}
		}
}

	/*
		该函数的作用是循环输出订单列表
		根据订单类型进行判断
	*/

		function orderlist_foreach($order_type,$sql){
					$user_id = $_SESSION['account_id'];
					global $sql2;
					if($sql==null){
							$sql="select * from orderlist where order_uid = {$user_id} and order_type = $order_type.$sql2 order by time desc";
					}else{
					$sql="select * from orderlist where order_uid = {$user_id} and order_type = $order_type.{$sql}.$sql2 order by time desc";//查询语句
				}
					$res=mysql_query($sql);//执行查询
					while($r=mysql_fetch_assoc($res)){
				    	$ro[]=$r;//接受结果集
					}
					foreach($ro as $key=>$v){
						echo '<a href="../order/order_detail.php?oid=';echo $v[id]; echo '">
						<div class="list">
							<p class="p1">下单时间：';echo $v[time]; echo '<span class="color-b floatright">'; echo $v[id]; echo '</span></p>
							<p class="p2">总计：￥'; echo $v[all_money];echo ' <span class="color-b floatright">';
							if($v[status]==1){
								if($v[status_ss]==0){echo "待商家确认";}
								if($v[status_ss]==1){echo "订单完成";}
								if($v[status_ss]==2){echo "无效订单";}
								if($v[status_ss]==3){echo "申请退款中";}
								if($v[status_ss]==4){echo "退款成功";}
								if($v[status_ss]==5){echo "退款失败";}
							}if($v[status]==0){
								echo "未完成支付";
							}
							echo '</span></p>
						</div></a>';
					}
}
/*
	该函数的作用是循环输出预定订单列表
	根据订单类型进行判断
*/

	function yuding_orderlist_foreach($order_type,$sql){
				$user_id = $_SESSION['account_id'];
				global $sql2;
				$sql="select * from orderlist where order_uid = {$user_id} and order_type = {$order_type}.{$sql}{$sql2}";//查询语句
				$res=mysql_query($sql);//执行查询
				while($r=mysql_fetch_assoc($res)){
						$ro[]=$r;//接受结果集
				}
				foreach($ro as $key=>$v){
					echo '<a href="../order/order_detail.php?oid=';echo $v[id]; echo '">
					<div class="list">
						<p class="p1">预定时间：';echo $v[time]; echo '<span class="color-b floatright">';  echo '</span></p>
						<p class="p2">订单号：'; echo $v[id];echo ' <span class="color-b floatright">';

							if($v[status_ss]==0){echo "待商家确认";}
							if($v[status_ss]==1){echo "订单完成";}
							if($v[status_ss]==2){echo "无效订单";}
							

						echo '</span></p>
					</div></a>';
				}
}


/*
	循环输出该用户对应的收货地址啦
*/
	function sh_addresslist($yid,$did){
		$user_id = $_SESSION['account_id'];
		$sql="select * from address where uid = {$user_id} ";//查询语句
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
                      <a href="order.php?id=';echo $v['id'];if($yid != null){ echo "&yid={$yid}";}if($did != null){ echo "&did={$did}";} echo '" style="width:auto;"> 设为收货地址 </a>
                    </label>
                    <a href="edit.php?id=';echo $v['id']; echo '"><img src="../images/bj.png" width="18" />&nbsp;编辑</a>
                    <a href="delete.php?id=';echo $v['id']; echo '">删除</a>
	    	    </div>
	    	</li>';
			}
}


/* 根据收货地址id获取到收货地址的信息
*/
	function sh_message($id,$type){
		$user_id = $_SESSION['account_id'];
		$sql="select * from address where uid = {$user_id} and id ={$id}";//查询语句
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
		include('../config/conn.php');
		$uid = $_SESSION['account_id'];
		$sql = "update address set $name = '$val' where uid = {$uid} and id = {$id}";
			$result = mysql_query($sql);
	}
/**
 * 支付成功 会员卡余额更新
 */
	function chongzhi_success($v){
			$uid = $_SESSION['account_id'];
		$sql = "update member set money_still = money_still + {$v} where account_id = {$uid}";
			$result = mysql_query($sql);
	}
	/**
	 * 支付成功 更新充值记录的状态
	 */
		function chongzhi_success1($id){
			$sql = "update chongzhi set blog ='1' where id = {$id}";
				$result = mysql_query($sql);
		}
		/**
		 * 提现记录
		 */
		function tixian_log(){
			global $user;
			global $store_id;
			$sql="select * from tixian where account_id = '$user->user_id' and store_id ='$store_id'";//查询语句
			$res=mysql_query($sql);//执行查询
			while($r=mysql_fetch_assoc($res)){
					$ro[]=$r;//接受结果集
			}
			foreach($ro as $key=>$v){
				echo '
				<tr>
					<td  class="td1">';echo $v['ti_money']; echo '</td>
					<td class="td2">';echo $v['time']; echo '</td>
						<td class="td2">';echo $v['ti_type']; echo '</td>
					<td class="td3">';
					if($v['blog']==0){ echo '待处理';}
					else if($v['blog']==1){ echo '成功';}
					else if($v['blog']==2){ echo '失败';}
					echo '</td>
				</tr>
				';
			}
		}
		/**
		 * 充值记录
		 */
		function chongzhi_log(){
			global $user;
			global $store_id;
			$sql="select * from chongzhi where account_id = '$user->user_id' and store_id ='$store_id' order by time desc";//查询语句
			$res=mysql_query($sql);//执行查询
			while($r=mysql_fetch_assoc($res)){
					$ro[]=$r;//接受结果集
			}
			foreach($ro as $key=>$v){
				echo '
				<tr>
					<td >';echo $v['chong_money']; echo '</td>
					<td >';echo $v['money_gift']; echo '</td>
					<td class="td2">';echo $v['time']; echo '</td>
					<td>';echo $v['chong_type'];echo '</td>
					<td class="td3">';
					 if($v['blog']==1){ echo '成功';}
					else if($v['blog']==0){ echo '失败';}
					echo '</td>
				</tr>
				';
			}
		}


		/**
		 * 签到页面逻辑处理
		 */
		function qd($date){
			global $user;
			global $store_id;
			$sql = mysql_query("select * from qd where account_id = '$user->user_id' and store_id = '$store_id' and date = '$date'") or die(mysql_error());
			$res=mysql_num_rows($sql);//执行查询
			if($res==0){

				echo '<div class="qdlist-logo">
							<p>未签到</p>
							<p>';echo $date; echo '</p>
							</div>';
			}else{
				echo '<div class="qdlist-logo sign-red">
								<p>已签到</p>
								<p>';echo $date; echo '</p>
							</div>';
			}
		}
		function qd1($date,$o){
			global $user;
			global $store_id;
			$sql = mysql_query("select * from qd where account_id = '$user->user_id' and store_id = '$store_id' and date = '$date'") or die(mysql_error());
			$res=mysql_num_rows($sql);//执行查询
			if($o==1){
			if($res==0){
				echo '未签到';
			}else{
				echo '已签到';
			}
		}if($o ==2){
			if($res==0){
				echo '<a href="../deal/qd_action.php">
					<div class="button">
						点击签到
					</div>
				</a>';
			}
		}
}
/**
 * 签到更新累计签到天数
 * @return [type] [description]
 */
	function qd_num(){
		global $user;
		global $store_id;
		$sql = "update member set qd_num = qd_num + '1' where account_id = '$user->user_id' ";
			$result = mysql_query($sql);
	}

	function qd_points(){
		global $user;
		global $store_id;
		global $item;
		$sql = "update member set points = points + '$item->qd_points' where account_id = '$user->user_id' and store_id = '$store_id'";
		$result = mysql_query($sql);
//签到送积分，此处应当可以修改
		$sql1 = "update member set qd_points = qd_points + '$item->qd_points' where account_id = '$user->user_id' and store_id = '$store_id'";
		$result = mysql_query($sql1);
	}


	/**
	**	优惠券兑换
	**/
	function youhui_duihuan_list(){
		global $sql1;
		$sql="select * from youhui_list {$sql1} and status = '1'";//查询语句
			$res=mysql_query($sql);//执行查询
			while($r=mysql_fetch_assoc($res)){
					$ro[]=$r;//接受结果集
			}

			foreach($ro as $key=>$v){
				echo '<form action="../deal/duihuan_youhui.php" method="post" id="myForm"><div class="list">
			<p class="p1">有效期：';echo $v['time']; echo '天<span class=" floatright">';echo $v['number1']; echo '/'; echo $v['number2']; echo '</span></p>
			<p class="p2 color-b">';if($v['type']==1){ echo "无门槛"; echo $v['wu_money']; echo "元优惠券";}if($v['type']==2){echo "满{$v['man_max']}减{$v['man_min']}"; } echo '<span style="float:right;"><input type="text" value="';echo $v['id']; echo '" name="id" style="display:none;"/>';if($v['number1']<=0){ echo '数量不足';}else{ echo '<input type="button" onclick="duihuan(this,';echo "'"; echo $v['id']; echo "'"; echo ',';echo "'"; echo $v['points']; echo "'";echo ')" id="test" value="'; echo $v['points']; echo '积分兑换"/>'; }echo '</span></p>
		</div></form>';
			}
			if($ro==null){
				echo '<div class="list">
			<p class="p2" style="text-align:center;">暂无可兑换的优惠券</p>
		</div>';
			}
	}
		/**
	**	代金券兑换
	**/
	function daijin_duihuan_list(){
		global $sql1;
		$sql="select * from daijin_list {$sql1} and status = '1'";//查询语句
			$res=mysql_query($sql);//执行查询
			while($r=mysql_fetch_assoc($res)){
					$ro[]=$r;//接受结果集
			}

			foreach($ro as $key=>$v){
				echo '<form action="../deal/duihuan_daijin.php" method="post" id="myForm"><div class="list">
			<p class="p1">有效期：';echo $v['time']; echo '天<span class="floatright">';echo $v['number1']; echo '/'; echo $v['number2']; echo '</span></p>
			<p class="p2 color-b ">'; echo '￥';echo $v['money']; echo '<span  class="floatright">';if($v['number1']<=0){ echo '数量不足';}else{ echo '<input type="button" onclick="duihuan(this,';echo "'"; echo $v['id']; echo "'"; echo ',';echo "'"; echo $v['points']; echo "'";echo ')" value="'; echo $v['points']; echo '积分兑换"/>'; } echo '</form></span></p>
		</div>';
			}
			if($ro==null){
				echo '<div class="list">
			<p class="p2" style="text-align:center;">暂无可兑换的代金券</p>
		</div>';
			}
	}

		/**
	**	礼品券兑换
	**/
	function lipin_duihuan_list(){
		global $sql1;
		$sql="select * from lipin_list {$sql1} and status = '1'";//查询语句
			$res=mysql_query($sql);//执行查询
			while($r=mysql_fetch_assoc($res)){
					$ro[]=$r;//接受结果集
			}

			foreach($ro as $key=>$v){
				echo '<form action="../deal/duihuan_lipin.php" method="post" id="myForm"><div class="list">
			<p class="p1">剩余数量/已兑换数量：<span class="floatright">';echo $v['number1']; echo '/'; echo $v['number2']; echo '</span></p>
			<p class="p2 color-b ">'; echo $v['name']; echo '<span  class="floatright">';if($v['number1']<=0){ echo '数量不足';}else{  echo '<input type="button" onclick="duihuan(this,';echo "'"; echo $v['id']; echo "'"; echo ',';echo "'"; echo $v['points']; echo "'";echo ')" value="'; echo $v['points']; echo '积分兑换">'; }echo'</span></p>
		</div></from>';
			}
			if($ro==null){
				echo '<div class="list">
			<p class="p2" style="text-align:center;">暂无可兑换的代金券</p>
		</div>';
			}
	}

	/**
	**	我的优惠券列表
	**/
	function my_youhui_list($type){
		global $sql1;
		global $user;
		if($type==null){
			$sql="select * from my_youhui {$sql1} and uid = '$user->user_id'";
		}else{
		$sql="select * from my_youhui {$sql1} and status = '$type' and uid = '$user->user_id'";
		}//查询语句
			$res=mysql_query($sql);//执行查询
			while($r=mysql_fetch_assoc($res)){
					$ro[]=$r;//接受结果集
			}

			foreach($ro as $key=>$v){
				echo '<div class="list">
			<p class="p1">过期时间：';date_chang($v['last_time']); echo '<span class="color-b floatright">'; if($v['status']==1){ echo '可用';} else if($v['status']==2){ echo '已用';} else if($v['status']==3){ echo '已过期';}echo '</span></p>
			<p class="p2 color-b"> ';if($v['type']==1){ echo "无门槛减{$v['wu_money']}";}else if($v['type']==2){ echo "满{$v['man_max']}减{$v['man_min']}";} echo '<span></span></p>
		</div>';
			}if($ro==null){
				echo '<div class="list">
			<p class="p2" style="text-align:center;">暂无可用的优惠券</p>

		</div>';
			}
	}
	/**
		该函数用于更新账户积分余额
	**/
	function points_update($val){
		global $user;
		if($user->points<$val){
			exit('<script>alert(\'您的积分不足\');history.back();</script>');
		}else{
		$sql = "update member set points = points - {$val} where account_id = '$user->user_id'";
		$result = mysql_query($sql);
		}
	}
	/**
		该函数用于更新账户积分使用
	**/
	function point_used_update($ceshi){
		global $user;
		$s = "update member set point_used = point_used + '$ceshi' where account_id = '$user->user_id'";
		$result = mysql_query($s);
	}
	/**
		该函数用于更新优惠券剩余数量以及使用数量
	**/
	function update_youhui_number($id){

		$sql2 = "update youhui_list set number1 = number1 - '1' where id = '$id'";
		$result = mysql_query($sql2);

		$sql3 = "update youhui_list set number2 = number2 + '1' where id = '$id'";
		$result = mysql_query($sql3);

	}
	/**
		该函数用于更新代金券剩余数量以及使用数量
	**/
	function update_daijin_number($id){

		$sql2 = "update daijin_list set number1 = number1 - '1' where id = '$id'";
		$result = mysql_query($sql2);

		$sql3 = "update daijin_list set number2 = number2 + '1' where id = '$id'";
		$result = mysql_query($sql3);

	}
		/**
		该函数用于更新礼品券剩余数量以及使用数量
	**/
	function update_lipin_number($id){

		$sql2 = "update lipin_list set number1 = number1 - '1' where id = '$id'";
		$result = mysql_query($sql2);

		$sql3 = "update lipin_list set number2 = number2 + '1' where id = '$id'";
		$result = mysql_query($sql3);

	}
	/**
	**	我的代金券列表
	**/
	function my_daijin_list($type){
		global $sql1;
		global $user;
		if($type==null){
				$sql="select * from my_daijin {$sql1} and uid = '$user->user_id'";
		}else{
		$sql="select * from my_daijin {$sql1} and status = '$type' and uid = '$user->user_id'";
		}//查询语句
			$res=mysql_query($sql);//执行查询
			while($r=mysql_fetch_assoc($res)){
					$ro[]=$r;//接受结果集
			}

			foreach($ro as $key=>$v){
				echo '<div class="list">
			<p class="p1">过期时间：';date_chang($v['last_time']); echo '<span class="color-b floatright">'; if($v['status']==1){ echo '可用';} else if($v['status']==2){ echo '已用';} else if($v['status']==3){ echo '已过期';}echo '</span></p>
			<p class="p2 color-b"> ￥'; echo $v['money']; echo '<span></span></p>
		</div>';
			}if($ro==null){
				echo '<div class="list">
			<p class="p2" style="text-align:center;">暂无可用的代金券</p>

		</div>';
			}
	}
	/**该函数由于检测代金券是过期
		过期更改代金券撞状态
	**/
	function check_daijin(){
		$now = time();
		global $user;
			global $sql1;
		$sql="select * from my_daijin {$sql1} and uid = '$user->user_id'";

			$res=mysql_query($sql);//执行查询
			while($r=mysql_fetch_assoc($res)){
					$ro[]=$r;//接受结果集
			}

			foreach($ro as $key=>$v){
				if($now > $v['last_time']){
					update_quan_date('my_daijin',$v['id']);
				}
			}
	}
	/**该函数由于检测优惠券是过期
		过期更改代金券撞状态
	**/
	function check_youhui(){
		$now = time();
		global $user;
			global $sql1;
		$sql="select * from my_youhui {$sql1} and uid = '$user->user_id'";

			$res=mysql_query($sql);//执行查询
			while($r=mysql_fetch_assoc($res)){
					$ro[]=$r;//接受结果集
			}

			foreach($ro as $key=>$v){
				if($now > $v['last_time']){
					update_quan_date('my_youhui',$v['id']);
				}
			}
	}
	function update_quan_date($db,$id){
			$s = "update {$db} set status = '3' where id = '$id'";
		$result = mysql_query($s);
	}
	/**
	**	我的礼品券列表
	**/
	function my_lipin_list(){
		global $sql1;
		global $user;
		$sql="select * from my_lipin {$sql1} and status = '1' and uid = '$user->user_id'";//查询语句
			$res=mysql_query($sql);//执行查询
			while($r=mysql_fetch_assoc($res)){
					$ro[]=$r;//接受结果集
			}

			foreach($ro as $key=>$v){
				echo '<div class="list">
			<p class="p1">兑换码：';echo $v['id']; echo '<span class="color-b floatright">'; if($v['status']==1){ echo '可用';} else if($v['status']==2){ echo '已用';} else if($v['status']==2){ echo '已过期';}echo '</span></p>
			<p class="p2 color-b">'; echo $v['name']; echo '<span><input type="submit" value="去兑换" onclick="duihuan()"></span></p>
		</div>';
			}if($ro==null){
				echo '<div class="list">
			<p class="p2" style="text-align:center;">暂无可用的优惠券</p>

		</div>';
			}
	}
	/**
		商品下单时
	**	我的优惠券列表
	**/
	function order_my_youhui($money,$did){
		global $sql1;
		global $user;
		global $item;
		$sql="select * from my_youhui {$sql1} and status = '1' and uid = '$user->user_id' order by id desc";//查询语句
			$res=mysql_query($sql);//执行查询
			while($r=mysql_fetch_assoc($res)){
					$ro[]=$r;//接受结果集
			}

			foreach($ro as $key=>$v){
				if($v['type']==1){

					echo '<a href="order.php?yid=';echo $v['id']; if($did != null){ echo "&did={$did}";} echo '">
						<div class="stamp stamp01">
  							<div class="par"><p>';echo $item->store_name; echo '</p><sub class="sign">￥</sub><span>';echo $v['wu_money']; echo '</span><sub>优惠券</sub><p>无门槛</p></div>
    						<div class="copy">可用<p>';date_chang($v['last_time']); echo '<br>过期</p></div>
    					<i></i>
						</div></a>
					';
				}else if($v['type']==2){
					if($money >= $v['man_max']){
					echo '<a href="order.php?yid=';echo $v['id'];if($did != null){ echo "&did={$did}";}echo '">
						<div class="stamp stamp03">
   							<div class="par"><p>';echo $item->store_name; echo '</p><sub class="sign">￥</sub><span>';echo $v['man_min']; echo '</span><sub></sub><p>订单满';echo $v['man_max']; echo '元</p></div>
    						<div class="copy">可用<p>';echo $v['last_time']; echo '<br>过期</p></div>
    					<i></i>
						</div></a>
					';
				}else{
					echo '<a onclick="jing()">
						<div class="stamp stamp04">
   							<div class="par"><p>';echo $item->store_name; echo '</p><sub class="sign">￥</sub><span>';echo $v['man_min']; echo '</span><sub></sub><p>订单满';echo $v['man_max']; echo '元</p></div>
    						<div class="copy">不可用<p>';echo $v['last_time']; echo '<br>过期</p></div>
    					<i></i>
						</div></a>
					';
				}

			}

			}
			echo '<a  href="order.php'; if($did != null){ echo "?did={$did}";}echo '">
						<div class="stamp stamp04">
   							<div style="color:#ffffff;font-size:30PX;text-align:center;margin-top:50px;	">不使用任何优惠券</div>
						</div></a>
					';
			if($ro==null){
				echo '<div class="list" style="margin-top:50px;">
			<p class="p2" style="text-align:center;">暂无可用的优惠券</p>

		</div>';
			}
	}
/*		外卖订单
		商品下单时
	**	我的优惠券列表
	**/
	function waimai_my_youhui($money,$did,$id){
		global $sql1;
		global $user;
		global $item;
		$sql="select * from my_youhui {$sql1} and status = '1' and uid = '$user->user_id' order by id desc";//查询语句
			$res=mysql_query($sql);//执行查询
			while($r=mysql_fetch_assoc($res)){
					$ro[]=$r;//接受结果集
			}

			foreach($ro as $key=>$v){
				if($v['type']==1){

					echo '<a href="order.php?yid=';echo $v['id']; if($did != null){ echo "&did={$did}";} if($id != null){ echo "&id={$id}";}echo '">
						<div class="stamp stamp01">
  							<div class="par"><p>';echo $item->store_name; echo '</p><sub class="sign">￥</sub><span>';echo $v['wu_money']; echo '</span><sub>优惠券</sub><p>无门槛</p></div>
    						<div class="copy">可用<p>';date_chang($v['last_time']); echo '<br>过期</p></div>
    					<i></i>
						</div></a>
					';
				}else if($v['type']==2){
					if($money >= $v['man_max']){
					echo '<a href="order.php?yid=';echo $v['id'];if($did != null){ echo "&did={$did}";}if($id != null){ echo "&id={$id}";}echo '">
						<div class="stamp stamp03">
   							<div class="par"><p>';echo $item->store_name; echo '</p><sub class="sign">￥</sub><span>';echo $v['man_min']; echo '</span><sub></sub><p>订单满';echo $v['man_max']; echo '元</p></div>
    						<div class="copy">可用<p>';echo $v['last_time']; echo '<br>过期</p></div>
    					<i></i>
						</div></a>
					';
				}else{
					echo '<a onclick="jing()">
						<div class="stamp stamp04">
   							<div class="par"><p>';echo $item->store_name; echo '</p><sub class="sign">￥</sub><span>';echo $v['man_min']; echo '</span><sub></sub><p>订单满';echo $v['man_max']; echo '元</p></div>
    						<div class="copy">不可用<p>';echo $v['last_time']; echo '<br>过期</p></div>
    					<i></i>
						</div></a>
					';
				}

			}

			}
			echo '<a  href="order.php'; if($did != null){ echo "?did={$did}";} if($id != null){ echo "&id={$id}";}echo '">
						<div class="stamp stamp04">
   							<div style="color:#ffffff;font-size:30PX;text-align:center;margin-top:50px;	">不使用任何优惠券</div>
						</div></a>
					';
			if($ro==null){
				echo '<div class="list" style="margin-top:50px;">
			<p class="p2" style="text-align:center;">暂无可用的优惠券</p>

		</div>';
			}
	}
	/**
		商品下单时
	**	我的代金券列表
	**/
	function order_my_daijin($money,$yid){
		global $sql1;
		global $user;
		global $item;
		$sql="select * from my_daijin {$sql1} and status = '1' and uid = '$user->user_id' order by id desc";//查询语句
			$res=mysql_query($sql);//执行查询
			while($r=mysql_fetch_assoc($res)){
					$ro[]=$r;//接受结果集
			}

			foreach($ro as $key=>$v){


					echo '<a href="order.php?did=';echo $v['id']; if($yid != null){ echo "&yid={$yid}";} echo '">
						<div class="stamp stamp01">
  							<div class="par"><p>';echo $item->store_name; echo '</p><sub class="sign">￥</sub><span>';echo $v['money']; echo '</span><sub>代金券</sub><p>无门槛</p></div>
    						<div class="copy">可用<p>';date_chang($v['last_time']); echo '<br>过期</p></div>
    					<i></i>
						</div></a>
					';

			}
			echo '<a  href="order.php'; if($yid != null){ echo "?yid={$yid}";}echo '">
						<div class="stamp stamp04">
   							<div style="color:#ffffff;font-size:30PX;text-align:center;margin-top:50px;	">不使用任何代金券</div>
						</div></a>
					';
			if($ro==null){
				echo '<div class="list" style="margin-top:50px;">
			<p class="p2" style="text-align:center;">暂无可用的优惠券</p>

		</div>';
			}
	}
	/**外卖订单
		商品下单时
	**	我的代金券列表
	**/
	function waimai_my_daijin($money,$yid,$id){
		global $sql1;
		global $user;
		global $item;
		$sql="select * from my_daijin {$sql1} and status = '1' and uid = '$user->user_id' order by id desc";//查询语句
			$res=mysql_query($sql);//执行查询
			while($r=mysql_fetch_assoc($res)){
					$ro[]=$r;//接受结果集
			}

			foreach($ro as $key=>$v){


					echo '<a href="order.php?did=';echo $v['id']; if($yid != null){ echo "&yid={$yid}";} if($id != null){ echo "&id={$id}";}echo '">
						<div class="stamp stamp01">
  							<div class="par"><p>';echo $item->store_name; echo '</p><sub class="sign">￥</sub><span>';echo $v['money']; echo '</span><sub>代金券</sub><p>无门槛</p></div>
    						<div class="copy">可用<p>';date_chang($v['last_time']); echo '<br>过期</p></div>
    					<i></i>
						</div></a>
					';

			}
			echo '<a  href="order.php'; if($yid != null){ echo "?yid={$yid}";}if($id != null){ echo "&id={$id}";}echo '">
						<div class="stamp stamp04">
   							<div style="color:#ffffff;font-size:30PX;text-align:center;margin-top:50px;	">不使用任何代金券</div>
						</div></a>
					';
			if($ro==null){
				echo '<div class="list" style="margin-top:50px;">
			<p class="p2" style="text-align:center;">暂无可用的优惠券</p>

		</div>';
			}
	}
	/**
		余额变动列表
	**/
	function money_change_list(){
		global $user;
		global $sql1;
		$sql="select * from money_change {$sql1} and uid = '$user->user_id' order by time desc";//查询语句
			$res=mysql_query($sql);//执行查询
			while($r=mysql_fetch_assoc($res)){
					$ro[]=$r;//接受结果集
			}

			foreach($ro as $key=>$v){
				echo '
					<tr>
						<td class="td1">';echo $v['type']; echo '</td>
						<td class="td2">';echo $v['m_body']; echo '</td>
						<td class="td2">';echo $v['get_points']; echo '</td>
						<td class="td3">';echo $v['time']; echo '</td>
					</tr>
				';
			}
			if($ro == null){

				echo '<tr ><td><td style="text-align:right;padding-top:50px;">暂无数据<td></tr>';
			}
	}
	//该函数用于添加用户余额明细数据
	function money_change_add($m_type,$m_body,$points){
		global $time;
		global $user;
		global $store_id;//
		global $fen_id;
		if($fen_id == null){
			$fen_id = 0;
		}if($points == null){
			$points = 0;
		}
		$q="insert into money_change(id,type,m_body,time,uid,store_id,get_points,fen_id) values (null,'$m_type','$m_body','$time','$user->user_id','$store_id','$points','$fen_id')";//向数据库插入表单传来的值的sql
  		$reslut=mysql_query($q);//执行sql
	}
	//修改支付密码
	function update_pwd($pwd){
		global $user;
		$sql = "update member set pwd = '$pwd' where account_id = '$user->user_id'";
		mysql_query($sql);
	}
	/**
	 * 二维码分享
	 * @param  [type] $value [description]
	 * @return [type]        [description]
	 */
	function erweima_share($value){
				include '../ad/mobile/phpqrcode/phpqrcode.php';
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
/*********************************我的通知***********************************************/
/**
 * 我的通知列表项输出
 */
	function notice_list(){
		global $sql1;
		global $user;
		$sql="select * from notice {$sql1} order by no_time desc";//查询语句
			$res=mysql_query($sql);//执行查询
			while($r=mysql_fetch_assoc($res)){
					$ro[]=$r;//接受结果集
			}
			foreach($ro as $key=>$v){
				if(($v['uid'] == $user->user_id && $v['dept']== 0 )|| ($v['dept']==1 && ($v['rank'] == 'all' || $v['rank'] == $user->card_type))){
					echo '
					<div class="gg-title">
						<p class="p1">'; echo $v['no_title']; echo '</p>
						<div class="gg-body">
							<p class="p2">';echo $v['no_body']; echo '</p>
							<p class="p3">';echo $v['no_time']; echo '</p>
							<div style="clear:both;"></div>
						</div>

					</div>
					';
				}

			}
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
	function get_ximg(){
		global $user;
		$sql="select * from member where up_id = '$user->user_id' and store_id = '$user->store_id'";//查询语句
			$res=mysql_query($sql);//执行查询
			while($r=mysql_fetch_assoc($res)){
					$ro[]=$r;//接受结果集
			}
			foreach($ro as $key=>$v){
					echo '<img src="'; echo $v['wx_headImg']; echo '">';echo $user->account_id;echo '';
			}
	}
	//推广更改积分
	function update_share_points($yid){
		global $user;
		global $store_id;
		global $item;
		$sql = "update member set points = points + '$item->share_points' where account_id = '$yid' and store_id = '$store_id'";
		$result = mysql_query($sql);
//签到送积分，此处应当可以修改
		$sql1 = "update member set up_points = up_points + '$item->share_points' where account_id = '$yid' and store_id = '$store_id'";
		$result = mysql_query($sql1);
	}
	/*******台号***************/
	function order_tai(){
		global $sql1;
		global $fen_id;
		if($fen_id == null){
			$fen_id = 0;
		}
    $sql="select * from taihao {$sql1} and fen_id = '$fen_id' order by shunxu asc ";//查询语句
    $res=mysql_query($sql);//执行查询
    while($row=mysql_fetch_assoc($res)){
        $rows[]=$row;//接受结果集
    }
    foreach($rows as $key=>$v){
      echo '<button class="tai" id="btn" onclick=tai_add("'; echo $v['tai_name']; echo '")>';echo $v['tai_name']; echo '</button>';
    }
  }
	/*******************************充值赠送*********************/
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
	/**
	 * 推广收益记录
	 */
	function share_log(){
		global $user;
		global $store_id;
		$sql="select * from share_log where up_id = '$user->user_id' and store_id ='$store_id'";//查询语句
		$res=mysql_query($sql);//执行查询
		while($r=mysql_fetch_assoc($res)){
				$ro[]=$r;//接受结果集
		}
		foreach($ro as $key=>$v){
			echo '
			<tr>
				<td >';echo $v['share_body']; echo '</td>
				<td >';echo $v['share_money']; echo '</td>
				<td class="td2">';echo $v['time']; echo '</td>

			</tr>
			';
		}
	}
	 //根据rank_id查询rank_name
	function rank_name_odd($rank_id){

		$sql="select * from member_rank where rank_id = '$rank_id'";//查询语句
		$res=mysql_query($sql);//执行查询
		while($r=mysql_fetch_assoc($res)){
				$ro[]=$r;//接受结果集
		}
		foreach($ro as $key=>$v){
			echo $v['rank_name'];
		}	
	}
		//该函数用于核对当前用户等级的
	function check_rank(){
		global $user;

		$money_used  = intval($user->money_used);
	
		$sql="select * from member_rank where store_id = '$user->store_id' and rank_dept <= '$money_used' order by rank_dept desc limit 0,1";//查询语句
		$res=mysql_query($sql);//执行查询
		while($r=mysql_fetch_assoc($res)){
				$ro[]=$r;//接受结果集
		}
		foreach($ro as $key=>$v){
			if($v['rank_id'] != null){
				update_member_rank($v['rank_id']);	
			}
		}
	}
	//该函数用于更新用户等级
	function update_member_rank($rank_id){
		global $user;
		
		$sql = "update member set cardtype = '$rank_id' where account_id = '$user->user_id'";
	
		$res = mysql_query($sql);
		if($res){
			//exit('<script>alert(\'您的会员卡等级更新成功\');history.back();</script>');
		}
	}
	check_rank();
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
?>
