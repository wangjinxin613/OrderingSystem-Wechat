<?
  require('config/index_class.php');
  if(check_dept('10') == false){
      exit('<script>alert(\'您没有权限访问本页面\');history.back();</script>');
  }
?>
<!doctype html>
<html><!-- InstanceBegin template="/Templates/pc_common.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="utf-8">
<!-- InstanceBeginEditable name="doctitle" -->
        <title>女神阁会员卡系统--会员交易</title>
        <!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
        <link href="newstyle/css/bootstrap.min.css?v=3.4.0" rel="stylesheet">
        <link href="newstyle/font-awesome/css/font-awesome.css?v=4.3.0" rel="stylesheet">
        <link href="newstyle/css/animate.css" rel="stylesheet">
        <link href="newstyle/search/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="newstyle/css/style.css?v=2.2.0" rel="stylesheet">
        <script src="../js/jquery.js" type="text/javascript"></script>
        <script src="plugins/laydate/laydate.js" type="text/javascript"></script>
        <script src="newstyle/js/bootstrap.min.js?v=3.4.0"></script>
        <script src="newstyle/js/plugins/metisMenu/jquery.metisMenu.js"></script>
        <script src="newstyle/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="newstyle/js/plugins/toastr/toastr.min.js" type="text/javascript"></script>
        <script src="plugins/layer/layer.js" type="text/javascript"></script>
        <script src="newstyle/js/toast.js" type="text/javascript"></script>

        <link href="newstyle/css/plugins/toastr/toastr.min.css" rel="stylesheet" type="text/css"/>
        <!-- InstanceEndEditable -->

</head>

<body style="background:#ffffff;">
                <div id="main_frame" style="padding:30px 30px;">
				<!-- InstanceBeginEditable name="main_frame" -->
                    <div id="member_trade">
                        <div><h3>会员交易</h3></div>
                        <div>
                            <img src="newstyle/img/consume.png" alt="" id="mt_consume" data-toggle="modal" data-target="#myModal"/>
                            <img src="newstyle/img/recharge.png" alt="" id="mt_recharge" data-toggle="modal" data-target="#myModal2"/>
                            <img src="newstyle/img/points.png" alt="" id="mt_points" data-toggle="modal" data-target="#modal-points"/>
<!--                            <img src="img/points.png" alt="" id="mt_points" data-toggle="modal" data-target="#modal-points"/>-->
                        </div>
                        <div><h3>交易查询</h3></div>
                        <div>
                            <a href="integration.php"><img src="newstyle/img/check_consume.png" alt="" id="mt_check_consume"/></a>
                            <a href="chongzhi_log.php"><img src="newstyle/img/check_recharge.png" alt="" id="mt_check_recharge"/></a>
                            <!--<a href="member_query_points.php"><img src="newstyle/img/check_points.png" alt="" id="mt_check_points" /></a>
                            <img src="newstyle/img/check_count.png" alt="" id="mt_check_count" data-toggle="modal" data-target="#myModal3"/>-->
                        </div>
                    </div>
                    <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content animated bounceInRight">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">关闭</span>
                                    </button>
                                    <i class="fa fa-laptop modal-icon"></i>
                                    <h4 class="modal-title">会员消费</h4>

                                </div>
  <div class="modal-body">
      <div class="window_trade">
          <div class="window_trade_left">
              <div>
                  <select  id='id_type_consume'>
                      <option value="tel">电话号码</option>
                      <option value="account">会员卡号</option>

                  </select>

              </div>
              <div>消费金额:</div>
              <div>支付方式:</div>
              <div>消费门店:</div>

          </div>
          <div class="window_teade_right">
              <div><input type="text" name=""  placeholder="号码" id="consume_id" required></div>
              <div >
                  <input type="text" name=""  placeholder="金额" id="consume_money" required>
              </div>
              <div >
                  <select  name="" id="consume_type">
                      <option value="余额消费">余额消费</option>
                  </select>
              </div>
              <div>
                  <select  name="" id="consume_shopname">

                        <option value='0'>总店</option>
                      <?  fendian_list('3','');?>
                  </select>
              </div>
          </div>


      </div>
  </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal" id="consume_close">关闭</button>
                <button type="button" class="btn btn-primary" id="consume_submit" onclick="test()">提交</button>
            </div>
        </div>
    </div>
</div>
                    <div class="modal inmodal" id="myModal2" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">

                            <div class="modal-content animated bounceInRight">
                                <div class="loading">
                                    <img src="img/loading.gif" alt=""/>
                                </div>
                                <div class="shadow"></div>
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">关闭</span>
                                    </button>
                                    <i class="fa fa-laptop modal-icon"></i>
                                    <h4 class="modal-title">会员充值</h4>

                                </div>
                                <div class="modal-body">
                                    <div class="window_trade">
                                        <div class="window_trade_left">
                                            <div>
                                                <select  id='id_type_recharge'>
                                                    <option value="tel">电话号码</option>
                                                    <option value="account">会员卡号</option>

                                                </select>

                                            </div>
                                            <div>充值金额:</div>
                                            <div>充值方式:</div>
                                            <div>充值门店:</div>

                                        </div>
                                        <div class="window_teade_right">
                                            <div><input type="text" name=""  placeholder="号码" id="recharge_id"></div>
                                            <div >
                                                <input type="text" name=""  placeholder="金额" id="recharge_money">
                                            </div>
                                            <div >
                                                <select  name="recharge_type" id="recharge_type">
                                                    <option value="现金充值">现金充值</option>
                                                </select>
                                            </div>
                                            <div>
                                                <select  id="recharge_shopname">
                                                  <option value='0'>总店</option>
                                                  <?  fendian_list('3','');?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-white" data-dismiss="modal" id="recharge_close">关闭</button>
                                    <button type="button" class="btn btn-primary" id="recharge_submit">提交</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal inmodal" id="myModal3" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content animated bounceInRight">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">关闭</span>
                                    </button>
                                    <i class="fa fa-laptop modal-icon"></i>
                                    <h4 class="modal-title">一键统计</h4>
                                </div>
                                <div class="modal-body">
                                    <form method="get" action="member_query_count.php">
                                        <div class="window_trade">
                                            <div class="window_trade_left">
                                                <div>开始时间:</div>
                                                <div>结束时间:</div>
                                                <div>交易类型:</div>
                                                <div>交易方式:</div>

                                            </div>
                                            <div class="window_teade_right">

                                                <div><input type="text" placeholder="点击选择日期" class="input-sm form-control" id="search_date1" name="date1"></div>
                                                <div><input type="text" placeholder="点击选择日期" class="input-sm form-control" id="search_date2" name="date2"></div>
                                                <div >
                                                    <select  name="action" >
                                                        <option value="consume">消费</option>
                                                        <option value="recharge">充值</option>
                                                    </select>
                                                </div>
                                                <div>
                                                    <select  name="trade_type" id="consume_shopname">
                                                        <option value='cash'>现金交易</option>";
                                                        echo "<option value='0'>在线充值</option>";
                                                        echo "<option value='dis'>分销统计</option>";

                                                    </select>
                                                </div>
                                            </div>


                                        </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-white" data-dismiss="modal" id="consume_close">关闭</button>
                                    <button type="submit" class="btn btn-primary" id="consume_submit1">提交</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal inmodal" id="modal-points" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content animated bounceInRight">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">关闭</span>
                                    </button>
                                    <i class="fa fa-laptop modal-icon"></i>
                                    <!--                                    <h4 class="modal-title">元宵节固定兑换100积分，只需要输入卡号点击兑换</h4>-->

                                </div>
                                <div class="modal-body">
                                    <div class="window_trade">

                                        <div class="window_trade_left">
                                            <div>
                                                <select  name="">
                                                    <option>会员卡号</option>
                                                </select>

                                            </div>
                                            <div>积分数额:</div>
                                            <div>减少/增加:</div>
                                            <div>门店:</div>

                                        </div>
                                        <div class="window_teade_right">
                                            <div><input type="text" name=""  placeholder="号码" id="points_id"></div>
                                            <div >
                                                <input type="text" name=""  placeholder="数额" id="points_num" value='100'>
                                            </div>
                                            <div >
                                                <select  name="" id="points_type">
                                                    <option value="增加">增加</option>
                                                    <option value="减少">减少</option>

                                                </select>
                                            </div>
                                            <div>
                                                <select  name="" id="points_shopname">

                                                      <option value='0'>总店</option>";
                                                      <?  fendian_list('3','');?>
                                                </select>
                                            </div>
                                        </div>


                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-white" data-dismiss="modal" id="points_close">关闭</button>
                                    <button type="submit" class="btn btn-primary" id="points_submit">提交</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="account_id" value=""/>
                    <input type="hidden" id="trade_action" value=""/>
                    <input type="hidden" id="trade_type" value=""/>
                    <input type="hidden" id="account_name" value=""/>

<script>

    $("#recharge_submit").click(function () {
      var $card_id =  $("#recharge_id").val();
        var id =  document.getElementById("id_type_recharge").value;
        $.post('newstyle/member_trade_doubleCheck.php',
                {
                    id_type:id,
                    id_type_val: $card_id,
                    trade_money: $("#recharge_money").val(),
                    trade_type: $("#recharge_type").val()
                },
        function (msg) {
            layer.confirm(msg, {
                btn: ['确定', '取消'], //按钮
                shade: false, //不显示遮罩
                title: "会员充值"
            }, function (index) {

                if (!isNaN($("#recharge_money").val())) {
                    var load_a = layer.load();
                    var $card_id =  $("#recharge_id").val();
                    var id =  document.getElementById("id_type_recharge").value;
                    $.post("newstyle/trade_processer.php",
                            {
                              id_type:id,
                                id_type_val: $card_id,
                                trade_money: $("#recharge_money").val(),
                                trade_type: $("#recharge_type").val(),
                                trade_action: "recharge",
                                trade_shopname: $("#recharge_shopname").val()

                            },
                    function (data, status) {
                        if (data.toString() == 0) {
                            toastr.success($("#recharge_id").val() + '充值' + $("#recharge_money").val() + "元成功");
                            $("#recharge_close").trigger("click");
                        }
                        else {

                            //toastr.success(data.toString());
                            $("#recharge_close").trigger("click");
                           
                        }
                        layer.close(load_a);
                        $("#recharge_id").val("");
                        $("#recharge_money").val("");

                    });
                }
                else {
                    showErrorToast("金额不是数字，请重新填写");
                }
                layer.close(index);
            }, function (index) {
                $("#recharge_id").val("");
                $("#recharge_money").val("");
                layer.close(index);
            });
        });
//

    });

$("#points_submit").click(function () {

    $.post('newstyle/class/points_doubleCheck.php',
            {
                points_id: $("#points_id").val(),
                points_num: $("#points_num").val(),
                points_type: $("#points_type").val(),
                points_shopname: $("#points_shopname").val()
            },
    function (msg) {
        layer.confirm(msg, {
            btn: ['确定', '取消'], //按钮
            shade: false, //不显示遮罩
            title: "会员交易"
        }, function (index) {
            if (!isNaN($("#points_num").val())) {
                var load_a = layer.load();
                $.post("newstyle/points_processer.php",
                        {
                            points_id: $("#points_id").val(),
                            points_num: $("#points_num").val(),
                            points_type: $("#points_type").val(),
                            points_shopname: $("#points_shopname").val()
                        },
                function (data, status) {

                    if (data == 0) {
                        toastr.success("修改积分成功");
                        $("#points_close").trigger("click");
                        $("#points_num").val("");
                        $("#points_id").val("");
                    }
                    else {
                          //toastr.success("修改积分成功");
                        $("#points_close").trigger("click");
                        $("#points_num").val("");
                        $("#points_id").val("");
                    }
                    layer.close(load_a);

                });
            }
            else {
                showErrorToast("数额不是数字，请重新填写");
            }
            layer.close(index);
        }, function (index) {
            $("#points_num").val("");
            $("#points_id").val("");
            layer.close(index);
        });
    });
//

});
</script>
                    <style>
                        #member_trade img{
                            cursor: pointer;
                            margin: 5px;
                        }
                        .window_trade{
                            text-align: left;
                            font-size: 20px;
                            height: 150px;
                        }
                        .window_trade_left{
                            width: 40%;
                            float: left;
                            padding: 15px;
                            text-align: right;
                        }
                        .window_teade_right{
                            padding: 15px;
                            width: 40%;
                            float: left;
                        }
                        .window_trade div{
                            margin-bottom: 10px;
                        }
                        .loading{
                            /*                background-color: #ff0033;*/
                            position: absolute;
                            top: 50%;
                            left: 40%;
                            z-index: 99999999999999999999999999999999999;
                            display: none;
                            width: 100%;
                            height: 100%;
                        }
                        .shadow{
                            background-color: #999999;
                            opacity: 0.5;
                            width: 100%;
                            height: 100%;
                            position: absolute;
                            z-index: 989999999999999999999999999999;
                            display: none;
                        }
                    </style>


                    <!-- InstanceEndEditable -->

                </div>

            </div>

        </div>
    </div>


    <!-- InstanceBeginEditable name="mainly scripts" -->
    <!-- Mainly scripts -->

    <!-- InstanceEndEditable -->


</body>
<!-- InstanceEnd --></html>
<script>
    ;
    !function () {

        //laydate.skin('molv');
        var start = laydate({
            elem: '#search_date1',
            format: 'YYYY-MM-DD hh:mm:ss',
            istime: true,
            istoday: false,
            choose: function (datas) {
                end.min = datas; //开始日选好后，重置结束日的最小日期

            }
        });
        var end = laydate({
            elem: '#search_date2',
            format: 'YYYY-MM-DD hh:mm:ss',
            istime: true,
            istoday: true,
            start: laydate.now(0, 'YYYY-MM-DD 23:59:59')

        });


    }();
</script>
<script>
function test(){
    $.post('newstyle/member_trade_doubleCheck.php',{
                id_type: document.getElementById("id_type_consume").value,
                id_type_val: $("#consume_id").val(),
                trade_money: $("#consume_money").val(),
                trade_type: $("#consume_type").val()
              },
    function (msg) {
        layer.confirm(msg, {
            btn: ['确定', '取消'], //按钮
            shade: false, //不显示遮罩
            title: "会员交易"
        },  function (index) {
            if (!isNaN($("#consume_money").val())) {
                var load_a = layer.load();
                $.post("newstyle/trade_processer.php",{
                            id_type: document.getElementById("id_type_consume").value,
                            id_type_val: $("#consume_id").val(),
                            trade_money: $("#consume_money").val(),
                            trade_type: $("#consume_type").val(),
                            trade_action: "consume",
                            trade_shopname: $("#consume_shopname").val()
                        },
                function (data, status) {
                    if (data == 0) {
                        toastr.success($("#consume_id").val() + '消费' + "成功");
                        $("#consume_close").trigger("click");
                    }
                    else {
                      // toastr.success();
                        $("#consume_close").trigger("click");
                    }
                    layer.close(load_a);
                    $("#consume_id").val("");
                    $("#consume_money").val("");
                });
            }
            else {
                showErrorToast("金额不是数字，请重新填写");
            }
            layer.close(index);
        }, function (index) {
            $("#consume_id").val("");
            $("#consume_money").val("");
            layer.close(index);
        })
});
}
</script>
