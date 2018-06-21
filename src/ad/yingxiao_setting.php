<?
  require('config/index_class.php');
  if(check_dept('9') == false){
      exit('<script>alert(\'您没有权限访问本页面\');history.back();</script>');
  }
?>
<!doctype html>
<html><!-- InstanceBegin template="/Templates/pc_common.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="utf-8">
<!-- InstanceBeginEditable name="doctitle" -->
        <title>会员营销设置</title>
        <!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
        <link href="newstyle/css/bootstrap.min.css?v=3.4.0" rel="stylesheet">
        <link href="newstyle/search/css/css3/animate.css" rel="stylesheet" type="text/css" />
        <link href="newstyle/search/css/fonts.css" rel="stylesheet" type="text/css" />
        <link href="newstyle/search/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="newstyle/search/css/admin/style.css" rel="stylesheet" type="text/css" />
        <link href="newstyle/css/style.css?v=2.2.0" rel="stylesheet">
        <link href="plugins/toastr/toastr.min.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/switchery/switchery.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/ionRangeSlider/ion.rangeSlider.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="newstyle/search/js/jquery.min.js"></script>
        <style>
           input{
            width:50px;
           }
           .switch_right{
            float:right;
           }
        </style>
        <!-- InstanceEndEditable -->

</head>

<body style="background:#ffffff;">


                <div id="main_frame">
				<!-- InstanceBeginEditable name="main_frame" -->
                    <!--                    <div class="tnav row wrapper border-bottom white-bg page-heading">
                                            <div class="col-sm-4">
                                                <h2 class="fl">营销活动</h2>
                                                <ol class="breadcrumb fl">
                                                    <li><a href="index.html">主页</a></li>
                                                    <li><strong>消费赠送</strong></li>
                                                </ol>
                                            </div>
                                        </div>-->


                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox">
                                <div class="ibox-title">
                                    <h5>会员卡营销活动设置</h5>
                                </div>
                                <div class="ibox-content">
                                    <div class="row">

                                        <div class="col-lg-6">
                                            <div class="panel panel-success">
                                                <div class="panel-heading">
                                                    <span style=" font-size: 22px;">全场折扣</span>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="m-b-sm m-t">
                                                        <small><strong>示例：</strong> 此为全场折扣,10折等于不打折  </small>
                                                    </div>
                                                    <div>
                                                        <input type="text" id="range_discount" name="range_discount" value="<? echo $item->store_zhe*10;?>" />
                                                    </div>
                                                    <br/>
                                                    <div class="btn_toright"><button class="btn btn-w-m btn-success" id="btn_discount_submit">提交</button></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="panel panel-success" >
                                                <div class="panel-heading">
                                                    <span style=" font-size: 22px;">分销设置</span>
                                                    <div class="switch_right"><input type="checkbox" class="distribution_switch" /></div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="m-b-sm m-t">
                                                        <small><strong>示例：</strong> 分销奖励，此处设置每单消费系统自动返回奖励的百分比  </small>
                                                    </div>
                                                    <div>
                                                        <input type="text" id="range_distribution" name="range_distribution" value="<? echo $item->fen_value*100;?>" />
                                                    </div>
                                                    <br/>
                                                    <div class="btn_toright"><button class="btn btn-w-m btn-success" id="btn_distribution_submit">提交</button></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="clear:both"></div>
                                    <div>
                                        <div class="col-lg-4" >
                                            <div class="panel panel-info" >
                                                <div class="panel-heading" style="background:#1c84c6;">
                                                    <span style=" font-size: 22px;">充值赠送</span>
                                                    <div class="switch_right"><input type="checkbox" class="recharge_gift" /></div>
                                                </div>
<div class="panel-body">
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
                <div class="panel-heading">
                    <h5 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="tabs_panels.html#collapseOne">规则一</a>
                    </h5>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <p>充值<input type="text" id="recharge_gift_rule1_1" class="consume_gift_input" value='<?echo $item->chong_value1;?>' />元   赠送<input type="text" id="recharge_gift_rule1_2" class="consume_gift_input" value="<?php echo $item->chong_gift1; ?>"/>元</p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="tabs_panels.html#collapseTwo">规则二</a>
                    </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <p>充值<input type="text" id="recharge_gift_rule2_1" class="consume_gift_input" value='<?php echo $item->chong_value2;?>' />元   赠送<input type="text" id="recharge_gift_rule2_2" class="consume_gift_input" value="<?php echo $item->chong_gift2; ?>"/>元</p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="tabs_panels.html#collapseThree">规则三</a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <p>充值<input type="text" id="recharge_gift_rule3_1" class="consume_gift_input" value='<?php echo $item->chong_value3; ?>' />元   赠送<input type="text" id="recharge_gift_rule3_2" class="consume_gift_input" value="<?php echo $item->chong_gift3; ?>"/>元</p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="tabs_panels.html#collapseThree">规则四</a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <p>充值<input type="text" id="recharge_gift_rule4_1" class="consume_gift_input" value='<?php echo $item->chong_value4; ?>' />元   赠送<input type="text" id="recharge_gift_rule4_2" class="consume_gift_input" value="<?php echo $item->chong_gift4;?>"/>元</p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse"  >规则五</a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <p>充值<input type="text" id="recharge_gift_rule5_1" class="consume_gift_input" value='<?php echo $item->chong_value5;?>' />元   赠送<input type="text" id="recharge_gift_rule5_2" class="consume_gift_input" value="<?php echo $item->chong_gift5; ?>"/>元</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="btn_toright"><button class="btn btn-w-m btn-info" id="btn_recharge_gift_submit"  style="background:#1c84c6;">提交</button></div>
    </div>
</div>
</div>
<div class="col-lg-4">
    <div class="panel panel-info">
        <div class="panel-heading"  style="background:#1c84c6;">
            <span style=" font-size: 22px;">分销充值赠送</span>
            <div class="switch_right"><input type="checkbox" class="dis_recharge_gift" /></div>
        </div>
        <div class="panel-body">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="tabs_panels.html#collapseOne">规则一</a>
                        </h5>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <p>充值<input type="text" id="dis_recharge_gift_rule1_1" class="consume_gift_input" value='<? echo $item->chong_fen_1_1;?>' />元   赠送<input type="text" id="dis_recharge_gift_rule1_2" class="consume_gift_input" value="<? echo $item->chong_fen_1_2;?>"/>元</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="tabs_panels.html#collapseTwo">规则二</a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <p>充值<input type="text" id="dis_recharge_gift_rule2_1" class="consume_gift_input" value='<? echo $item->chong_fen_2_1;?>' />元   赠送<input type="text" id="dis_recharge_gift_rule2_2" class="consume_gift_input" value="<? echo $item->chong_fen_2_2;?>"/>元</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="tabs_panels.html#collapseThree">规则三</a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <p>充值<input type="text" id="dis_recharge_gift_rule3_1" class="consume_gift_input" value='<? echo $item->chong_fen_3_1;?>' />元   赠送<input type="text" id="dis_recharge_gift_rule3_2" class="consume_gift_input" value="<? echo $item->chong_fen_3_2;?>"/>元</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="tabs_panels.html#collapseThree">规则四</a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <p>充值<input type="text" id="dis_recharge_gift_rule4_1" class="consume_gift_input" value='<? echo $item->chong_fen_4_1;?>' />元   赠送<input type="text" id="dis_recharge_gift_rule4_2" class="consume_gift_input" value="<? echo $item->chong_fen_4_2;?>"/>元</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="tabs_panels.html#collapseThree">规则五</a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <p>充值<input type="text" id="dis_recharge_gift_rule5_1" class="consume_gift_input" value='<? echo $item->chong_fen_5_1;?>' />元   赠送<input type="text" id="dis_recharge_gift_rule5_2" class="consume_gift_input" value="<? echo $item->chong_fen_5_2;?>"/>元</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn_toright"><button class="btn btn-w-m btn-info" id="btn_dis_recharge_gift_submit"  style="background:#1c84c6;">提交</button></div>
        </div>
    </div>
</div>
<div class="col-lg-4" >
    <div class="panel panel-success" >
        <div class="panel-heading">
            <span style=" font-size: 22px;">消费赠送</span>
            <div class="switch_right"><input type="checkbox" class="consume_gift" /></div>
        </div>
        <div class="panel-body">
            <p>消费<input type="text" id="consume_gift_1" class="consume_gift_input" value='<?php echo $item->xiao_value_1;?>' />元   赠送<input type="text" id="consume_gift_2" class="consume_gift_input" value="<?php echo $item->xiao_value_2;?>"/>积分</p>
            <div class="btn_toright"><button class="btn btn-w-m btn-success" id="btn_consume_gift_submit">提交</button></div>
        </div>
    </div>
</div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        $(function () {
                            $("#range_discount").ionRangeSlider({
                                min: 0,
                                max: 10,
                                type: 'single',
                                step: 0.1,
                                postfix: " 折",
                                prettify: false,
                                hasGrid: true
                            });
                            $("#range_distribution").ionRangeSlider({
                                min: 1,
                                max: 50,
                                type: 'single',
                                step: 1,
                                postfix: " %",
                                prettify: false,
                                hasGrid: true
                            });

//                            ###init page start###########
                            var consume_gift = document.querySelector('.consume_gift');
                            var recharge_gift = document.querySelector('.recharge_gift');
                            var dis_recharge_gift = document.querySelector('.dis_recharge_gift');
                            var distribution = document.querySelector('.distribution_switch');
                            consume_gift.checked = <?if($item->xiao_gift == 0){ echo "false";}else{ echo "true";}?>; //消费赠送
                            recharge_gift.checked = <?if($item->chong_gift == 0){ echo "false";}else{ echo "true";}?>;//充值赠送
                            dis_recharge_gift.checked = <?if($item->chong_fen_gift == 0){ echo "false";}else{ echo "true";}?>;//分销充值赠送
                            distribution.checked = <?if($item->share_setting == 0){ echo "false";}else{ echo "true";}?>;//分销设置

                            var switchery_1 = new Switchery(consume_gift, {
                                color: '#1AB394'
                            });
                            var switchery_2 = new Switchery(recharge_gift, {
                                color: '#1AB394'
                            });
                            var switchery_4 = new Switchery(dis_recharge_gift, {
                                color: '#1AB394'
                            });
                            var switchery_3 = new Switchery(distribution, {
                                color: '#1AB394'
                            });
                            consume_gift.onchange = function () {
                                var load_a = layer.load();
                                $.post("newstyle/class/set_consume_gift_switch.php",
                                        {
                                            consume_gift_switch:<? echo $item->xiao_gift;?>
                                        },
                                function (data, status) {
                                      if (consume_gift.checked) {
                                            toastr.success("消费赠送开启");
                                        }
                                        else {
                                            toastr.success("消费赠送关闭");
                                        }
                                    layer.close(load_a);

                                });
                            };
                            recharge_gift.onchange = function () {
                                var load_a = layer.load();
                                $.post("newstyle/class/set_recharge_gift_switch.php",
                                        {
                                            recharge_gift_switch: <? echo $item->chong_gift;?>
                                        },
                                function (data, status) {
                                   
                                        if (recharge_gift.checked) {
                                            toastr.success("充值赠送开启");
                                        }
                                        else {
                                            toastr.success("充值赠送关闭");
                                        }
                                   
                                    layer.close(load_a);
                                });
                            };
                            dis_recharge_gift.onchange = function () {
                                var load_a = layer.load();
                                $.post("newstyle/class/set_dis_recharge_gift_switch.php",
                                        {
                                            dis_recharge_gift_switch:<? echo $item->chong_fen_gift;?>
                                        },
                                function (data, status) {
                                   
                                        if (dis_recharge_gift.checked) {
                                            toastr.success("分销充值赠送开启");
                                        }
                                        else {
                                            toastr.success("分销充值赠送关闭");
                                        }
                                  
                                    layer.close(load_a);
                                });
                            };
                            distribution.onchange = function () {
                                var load_a = layer.load();
                                $.post("newstyle/class/set_distribution_switch.php",
                                        {
                                            distribution_switch: <? echo $item->share_setting;?>
                                        },
                                function (data, status) {
                                  
                                        if (distribution.checked) {
                                            toastr.success("开启成功");
                                        }
                                        else {
                                            toastr.success("关闭成功");
                                        }
                                  
                                    layer.close(load_a);
                                });
                            };
                            $("#btn_distribution_submit").click(function () {
                                var load_a = layer.load();
                                $.post("newstyle/class/set_distribution.php",
                                        {
                                            distribution_precent: ($("#range_distribution").val() / 100)
                                        },
                                function (data, status) {
                                   

                                        toastr.success("分成百分比设置成功");

                                   
                                    layer.close(load_a);
                                });
                            });
                            $("#btn_discount_submit").click(function () {
                                var load_a = layer.load();
                                $.post("newstyle/class/set_shopdiscount.php",
                                        {
                                            shop_discount: ($("#range_discount").val() / 10)
                                        },
                                function (data, status) {
                                   

                                        toastr.success("全店折扣设置成功");

                                  
                                    layer.close(load_a);
                                });
                            });
                            $("#btn_consume_gift_submit").click(function () {
                                var load_a = layer.load();
                                $.post("newstyle/class/set_consume_gift_details.php",
                                        {
                                            consume_gift_1: $("#consume_gift_1").val(),
                                            consume_gift_2: $("#consume_gift_2").val()
                                        },
                                function (data, status) {
                                  

                                        toastr.success("消费赠送设置修改成功");


                                   
                                    layer.close(load_a);
                                });
                            });
                            $("#btn_recharge_gift_submit").click(function () {
                                var load_a = layer.load();
                                $.post("newstyle/class/set_recharge_gift_details.php",
                                        {
                                            recharge_gift_rule1_1: $("#recharge_gift_rule1_1").val(),
                                            recharge_gift_rule1_2: $("#recharge_gift_rule1_2").val(),
                                            recharge_gift_rule2_1: $("#recharge_gift_rule2_1").val(),
                                            recharge_gift_rule2_2: $("#recharge_gift_rule2_2").val(),
                                            recharge_gift_rule3_1: $("#recharge_gift_rule3_1").val(),
                                            recharge_gift_rule3_2: $("#recharge_gift_rule3_2").val(),
                                            recharge_gift_rule4_1: $("#recharge_gift_rule4_1").val(),
                                            recharge_gift_rule4_2: $("#recharge_gift_rule4_2").val(),
                                            recharge_gift_rule5_1: $("#recharge_gift_rule5_1").val(),
                                            recharge_gift_rule5_2: $("#recharge_gift_rule5_2").val()
                                        },
                                function (data, status) {
                                  
                                        toastr.success("充值赠送设置修改成功");


                                    layer.close(load_a);
                                });
                            });
                            $("#btn_dis_recharge_gift_submit").click(function () {
                                var load_a = layer.load();
                                $.post("newstyle/class/set_dis_recharge_gift_details.php",
                                        {
                                            dis_recharge_gift_rule1_1: $("#dis_recharge_gift_rule1_1").val(),
                                            dis_recharge_gift_rule1_2: $("#dis_recharge_gift_rule1_2").val(),
                                            dis_recharge_gift_rule2_1: $("#dis_recharge_gift_rule2_1").val(),
                                            dis_recharge_gift_rule2_2: $("#dis_recharge_gift_rule2_2").val(),
                                            dis_recharge_gift_rule3_1: $("#dis_recharge_gift_rule3_1").val(),
                                            dis_recharge_gift_rule3_2: $("#dis_recharge_gift_rule3_2").val(),
                                            dis_recharge_gift_rule4_1: $("#dis_recharge_gift_rule4_1").val(),
                                            dis_recharge_gift_rule4_2: $("#dis_recharge_gift_rule4_2").val(),
                                            dis_recharge_gift_rule5_1: $("#dis_recharge_gift_rule5_1").val(),
                                            dis_recharge_gift_rule5_2: $("#dis_recharge_gift_rule5_2").val()
                                        },
                                function (data, status) {
                                  
                                        toastr.success("充值赠送设置修改成功");
                                   
                                    layer.close(load_a);
                                });
                            });
                        });
                    </script>
                    <!-- InstanceEndEditable -->

                </div>

            </div>

        </div>
    </div>


    <!-- InstanceBeginEditable name="mainly scripts" -->
    <!-- Mainly scripts -->
    <script src="newstyle/js/bootstrap.min.js?v=3.4.0"></script>
    <script src="newstyle/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="newstyle/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="newstyle/js/plugins/toastr/toastr.min.js" type="text/javascript"></script>
    <script src="plugins/layer/layer.js" type="text/javascript"></script>
    <script src="plugins/ionRangeSlider/ion.rangeSlider.min.js" type="text/javascript"></script>
    <script src="newstyle/js/toast.js" type="text/javascript"></script>
    <script src="plugins/switchery/switchery.js" type="text/javascript"></script>
    <!-- InstanceEndEditable -->


</body>
<!-- InstanceEnd --></html>
