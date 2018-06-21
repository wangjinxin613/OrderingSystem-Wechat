<?
	require('../config/index_config.php');
	$order_id = $_GET['id'];
	mysql_select_db("my_db", $con);
	$result1 = mysql_query("SELECT * FROM chongzhi where id = '$order_id'");
	while($v = mysql_fetch_array($result1))
 	{
 		$blog = $v['blog'];
 		$money_gift = $v['money_gift'];
 			$chong_money = $v['chong_money'];
 			
 			
 	}
 	//容错机制 
 	if($blog == 0){
 	 echo '<script>alert(\'支付出错！\')';echo '"</script>';
   exit();
 	}
 	 chongzhi_success($chong_money);//支付成功 更新会员卡余额
  //  chongzhi_success1($order_id);//更新充值记录的状态
	 $sql2 = "update member set money_gift = money_gift + '$money_gift'
where account_id = '$user->user_id'";
    $result2 = mysql_query($sql2);//赠送金额
     fenxiao($chong_money);//分销action
   
     //微信通知消息
     $data = array(
    'first'=>array('value'=>"充值成功提醒",'color'=>"#00008B"),   //函数传参过来的name  
     'keyword1'=>array('value'=>$item->store_name,'color'=>"#00008B"),    //函数传参过来的name     
    'keyword2'=>array('value'=>$time,'color'=>"#00008B"),    //函数传参过来的name     
    'keyword3'=>array('value'=>$chong_money,'color'=>"#00008B"),    //函数传参过来的name
    'keyword4'=>array('value'=>$money_gift,'color'=>"#00008B"),   //函数传参过来的name     
    'keyword5'=>array('value'=>$user->money_still,'color'=>"#00008B"),
    'remark'=>array('value'=>"",'color'=>"#00008B")    //函数传参过来的name     
);
$urls = $_SERVER['HTTP_HOST'];
send_message($user->openid,$item->tid5,$data,$urls);
			
		//	money_change_add('微信充值',"-{$all_money}",$get_points);//添加用户余额流水记录
		 	echo '<script>alert(\'充值成功！\');window.location.href="'; echo "../member"; echo '";</script>';
//分销赠送
  function fenxiao($recharge_money){
    global $user;
    global $item;
    $time= date("Y/m/d H:i:s");//获取当前时间
  if ($item->chong_fen_gift == '1') {
    $up_id = $user->up_id;
   // echo $up_id;
      if ($up_id != null) {
          $sql = "select * from member where account_id = '$up_id'";
          $result = mysql_query($sql);
          $row = mysql_fetch_array($result);
          $up_moneygift = $row['money_gift'];
          $dis_gift_money = check_dis_recharge_gift($recharge_money);
          if ($dis_gift_money > 0) {
              $dis_openid = $row['wx_openid'];
              $dis_money_still = $row['money_gift'];
              $dis_real_name = $row['real_name'];
              $after_moneygift = $up_moneygift + $dis_gift_money;

              $sql3 = "update member set money_gift = '$after_moneygift' where account_id = '$up_id'";
              $result3 = mysql_query($sql3);
              $sql4 = "update member set money_still = money_still + '$dis_gift_money' where account_id = '$up_id'";
              $result4 = mysql_query($sql4);
              $s = "insert into share_log(id,share_body,share_money,time,up_id,down_id,store_id) values (null,'下级{$user->nickname}充值{$recharge_money}元','$dis_gift_money','$time','$up_id','$user->user_id','$user->store_id')";
              mysql_query($s); //分销赠送记录
            }
          }
        }
    }

?>