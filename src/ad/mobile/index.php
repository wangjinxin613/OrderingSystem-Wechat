<?
  require('../config/index_class.php');
  if(all_dept('11') == false){
  	exit('<script>alert(\'您的门店没有该部分功能权限\');history.back();</script>');
  }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>女神阁智慧会员卡</title>

        <meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="format-detection" content="telephone=no">
        <meta charset="utf-8">
        <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link href="css/style.css" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" href="//res.layui.com/layui/build/css/layui.css"  media="all">
        <link href="cms/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="css/toastr.min.css" rel="stylesheet" type="text/css"/>
        <style>
            #menupage{
                position: absolute;
                top: 20%;
            }
            body{
                background-image: url(./images/bg_login.jpg);
            }
            .page{
                background-color: transparent ;
            }
            #trade_window{
                text-align: center;
                position: absolute;
                top: 10px;
                width: 100%;
                z-index: 999999;
                background-color:#fff;
                border-radius:20px; -moz-border-radius:20px; -webkit-border-radius:20px;
                padding: 20px;
                display: none;
            }
            #trade_money,#trade_shopname{
                width: 80%;
                margin: 5px;
                height: 40px;
                border-radius:10px; -moz-border-radius:10px; -webkit-border-radius:10px;
                font-size: 22px;
                background-color: #fff;

            }
            #handover_shopid{
                width: 40%;
                margin: 5px;
                height: 25px;
                border-radius:10px; -moz-border-radius:10px; -webkit-border-radius:10px;
                font-size: 16px;
                background-color: #fff;
            }
            .shadow{
                background-color: #999999;
                opacity: 0.5;
                width: 100%;
                height: 100%;
                position: absolute;
                z-index: 989999;
                display: none;
            }
            .pay_w{display:block; min-width:300px; padding:10px; margin-top:5px; border-top:1px solid #ddd; overflow:hidden;}
            .pay_w span{display:block; min-width:240px; margin:0 30px; text-align:center; color:#fff; border-radius:20px; -moz-border-radius:20px; -webkit-border-radius:20px; background:#539608; font-size:14px; height:40px; line-height:40px; position:relative; overflow:hidden;}
            .pay_w span.red{background:#ee634d;}
            .pay_w span.blue{background:#0b7ad4;}
            .pay_w span.yellow{background:#fdf106;}
            #trade_cancle{
                margin-top:10px;
                background-color: #ee634d;
            }
            #info{
                height: 35px;
                width: 80%;
                background-color: white;
                position: absolute;
                top:0px;
                left:10%;

            }

        </style>
        <script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
  		<script src="../../js/mobile/layer.js"></script>
  		<script src="../../js/layer.js"></script>
      	<script src="../../js/layui.js"></script>
      <script>
      function select(){
        layer.prompt({title: '请输入会员卡id', formType: 0}, function(passs, index){

      document.getElementById('card_id').value=passs;
      document.getElementById('card_form').submit();


  });
      }
      </script>
    </head>
    <body style="width:500px;">

        <div id = "menupage" id = "page1" class = "page">
            <ul class = "mainmenu">
                <li id = "menu_consume" <?if(check_dept('39') == false){echo 'style="display:none;"';}?>><a href="shou.php" ><b><img src = "images/webapp/1.png" /></b><span>收款</span></a></li>
                <li id = "menu_charge" <?if(check_dept('40') == false){echo 'style="display:none;"';}?>><a href="chongzhi.php"><b><img src = "images/webapp/2.png" /></b><span>充值</span></a></li>
                <li <?if(check_dept('41') == false){echo 'style="display:none;"';}?>><a ><b><img src = "images/webapp/5.png" onclick="select()"></b><span>会员信息查询</span></a></li>
                <li id="menu_micropay" <?if(check_dept('42') == false){echo 'style="display:none;"';}?>><a onclick="lipin()"><b><img src = "images/webapp/3.png" /></b><span>礼品券兑换</span></a></li>
                <li id="menu_micropay_refund" <?if(check_dept('11') == false){echo 'style="display:none;"';}?>><a href="cg_shoplist.php"><b><img src = "images/webapp/40.png" /></b><span>店内点餐</span></a></li>

                <li <?if(check_dept('43') == false){echo 'style="display:none;"';}?>><a ><b><img src = "images/webapp/6.png" onclick="javascript:$('#modal_querry').modal('show');" /></b><span>查询</span></a></li>
                <li <?if(check_dept('44') == false){echo 'style="display:none;"';}?>><a ><b><img src = "images/webapp/7.png" onclick="javascript:$('#end_of_work').modal('show');" /></b><span>交班</span></a></li>
                <li><a href = "userinfo.php" ><b><img src = "images/webapp/8.png" /></b><span>个人资料</span></a></li>
                <li><a href = "log_out.php" ><b><img src = "images/webapp/9.png" /></b><span>登出</span></a></li>
            </ul>
        </div>
        <div id = "trade_window">
            <input type = "hidden" id = "account_id" value = ""/>
            <input type = "hidden" id = "trade_action" value = ""/>
            <input type = "hidden" id = "trade_type" value = ""/>
            <input type = "hidden" id = "account_name" value = ""/>
            <div><input id = "trade_money" placeholder = "金额" type = "number" /></div>
            <div>
                <select id = "trade_shopname">

                </select>
            </div>
            <div class="pay_w">
                <span id="trade_submit">确认<i></i></span><span id="trade_cancle">取消</span>
            </div>
        </div>
        <div class="shadow"></div>
        <div class="modal fade" id="modal_points" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div style="padding:10px;">
                            <div class="row"><button class="btn btn-success btn-block "id="points_recharge">积分充值</button></div>
                            <br>
                            <div class="row"><button class="btn btn-success btn-block " id="points_consume">积分消费</button></div>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal -->
        </div>
        <div class="modal fade" id="modal_querry" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel" style="margin-top:200px;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div style="padding:10px;">
                            <a href="order_shishi.php"><div class="row"><button class="btn btn-success btn-block" id="points_recharge">订单查询</button></div></a>
                          <BR>  <a href="jiaoban_log.php"><div class="row"><button class="btn btn-success btn-block" id="points_recharge">我的交班记录</button></div></a>

                             <br>
                             <a href="my_lipin_list.php"><div class="row"><button class="btn btn-success btn-block " id="points_consume">礼品兑换查询</button></div></a>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal -->
        </div>
        <!--        <form action="./wxpay/micropay.php" method="post" id="form_micropay">-->
        <div class="modal fade" id="modal_micropay" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div style="padding:10px;">
                            <div class="row" style="line-height:34px;">
                                <div class="col-xs-4" style="font-size:18px;">消费金额:</div>
                                <div class="col-xs-8"><input class="form-control"  id="mircropay_num" name='mircropay_num' type="tel" value="0.01"/></div>
                            </div>
                            <br>
                            <div class="row text-center" style="line-height:34px;display: none;"><input class="form-control"  id="auth_code" type="tel" name="auth_code"/></div>
                            <div class="row text-center" style="line-height:34px;">
                                <div class="col-xs-4" style="font-size:18px;">当前门店:</div>
                                <div class="col-xs-8">
                                    <select   id="micropay_shopid" class="form-control" name="micropay_shopid">

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal">关闭
                        </button>
                        <button type="button" class="btn btn-primary" id="btn_micropay_submit">
                            确定
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!--        </form>-->
        <div class="modal fade" id="modal_points_trade" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div style="padding:10px;">
                            <div class="row" style="line-height:34px;">
                                <div class="col-xs-4" style="font-size:18px;">积分数额:</div>
                                <div class="col-xs-8"><input class="form-control"  id="points_num" type="tel" /></div>
                            </div>
                            <br>
                            <div class="row text-center" style="line-height:34px;">
                                <div class="col-xs-4" style="font-size:18px;">当前门店:</div>
                                <div class="col-xs-8">
                                    <select   id="points_shopid" class="form-control">

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal">关闭
                        </button>
                        <button type="button" class="btn btn-primary" id="btn_points_submit">
                            确定
                        </button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal -->
        </div>

        <div class="modal fade" id="end_of_work" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel" aria-hidden="true">
             <div class="modal fade in" id="end_of_work" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: block;">
               <div class="modal-dialog">
                   <div class="modal-content" style="margin-top: 186px;">
                       <div class="modal-body">
                         <form action="action/jiaoban.php" method="post">
                          <br>

                           <div class="row" style="margin:0 auto;">  开始时间 &nbsp;<input class="layui-input" placeholder="选择开始时间" onclick="layui.laydate({elem: this, max: laydate.now(), istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" name="start_time"/></div>
                           <br>

                            <div class="row" style="margin:0 auto;"> 结束时间 &nbsp;<input class="layui-input" placeholder="选择结束时间" onclick="layui.laydate({elem: this, max: laydate.now(), istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" name="stop_time"/></div>
                           <br>


                       </div>
                       <div class="modal-footer">
                           <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                           </button>
                           <button type="submit" class="btn btn-primary" id="btn_handover">
                               确定
                           </button>
                       </div>
                     </form>
                   </div><!-- /.modal-content -->
               </div><!-- /.modal -->
           </div>
        </div>
        <form action="action/lipin_duihuan.php" method="post" id="li_form">
        <input type="" type="text" value="" name="id" id="lipin" style="display:none;">
    </form>
    <form action="select_card.php" method="post" id="card_form">
    <input type="" type="text" value="" name="account_id" id="card_id" style="display:none;">
</form>
    </body>

    <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script>
    layui.use('laydate', function(){
      var laydate = layui.laydate;

      var start = {
        min: laydate.now()
        ,max: '2099-06-16 23:59:59'
        ,istoday: false
        ,choose: function(datas){
          end.min = datas; //开始日选好后，重置结束日的最小日期
          end.start = datas //将结束日的初始值设定为开始日
        }
      };

      var end = {
        min: laydate.now()
        ,max: '2099-06-16 23:59:59'
        ,istoday: false
        ,choose: function(datas){
          start.max = datas; //结束日选好后，重置开始日的最大日期
        }
      };

      document.getElementById('LAY_demorange_s').onclick = function(){
        start.elem = this;
        laydate(start);
      }
      document.getElementById('LAY_demorange_e').onclick = function(){
        end.elem = this
        laydate(end);
      }

    });
    </script>




    <script>
    function lipin(){
    	layer.prompt({title: '请输入礼品券兑换码', formType: 0}, function(pass, index){
  layer.close(index);
  	document.getElementById('lipin').value=pass;
  	document.getElementById('li_form').submit();


});
    }

</script>

</html>
