<!doctype html>
<html><!-- InstanceBegin template="/Templates/pc_common.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="utf-8">
<!-- InstanceBeginEditable name="doctitle" -->
        <title>消费查询</title>
        <!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
        <link href="css/bootstrap.min.css?v=3.4.0" rel="stylesheet">
        <link href="./search/css/css3/animate.css" rel="stylesheet" type="text/css" />
        <link href="./search/css/fonts.css" rel="stylesheet" type="text/css" />
        <link href="./search/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="./search/css/admin/style.css" rel="stylesheet" type="text/css" />
        <link href="css/style.css?v=2.2.0" rel="stylesheet">
        <link href="./search/css/admin/jquery.dataTables.css" rel="stylesheet" type="text/css" />
        <link href="../plugins/toastr/toastr.min.css" rel="stylesheet" type="text/css"/>
        <link href="../plugins/datepicker-bootstrap/datepicker.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="./search/js/jquery.min.js"></script>

        <!-- InstanceEndEditable -->

</head>

<body>
        <?php
        session_start();
        if (!isset($_SESSION['status'])) {
            echo '<script>alert("异常,请重新登录")</script>';
			echo '<script> document.location = "../index.htm"; </script>';
            exit();
        }
        ?>

        <div id="wrapper">
            <nav class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="nav-header">

                            <div class="dropdown profile-element"> <span>
                                    <img alt="image" class="img-circle" src="<?php echo $_SESSION['head_img'] ?>" />
                                </span>
                                <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                                    <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $_SESSION['operator_name'] ?></strong>
                                        </span> <span class="text-muted text-xs block">
                                            <?php
                                            switch ($_SESSION['role']) {
                                                case 1:echo '超级管理员';
                                                    break;
                                                case 2:echo '管理员';
                                                    break;
                                                case 3:echo '操作员';
                                                    break;
                                            }
                                            ?> 
                                            <b class="caret"></b></span> </span>
                                </a>
                                <ul class="dropdown-menu animated fadeInRight m-t-xs">

                                    <li><a href="log_out.php">安全退出</a>
                                    </li>
                                </ul>
                            </div>
								

                        </li>
                        <li class="active">
                            <a ><i class="fa fa-th-large"></i> <span class="nav-label">会员卡</span> <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                            <li><a href="member_home.php">数据统计</a>
                                </li>
                                <li><a href="member_trade.php">会员交易</a>
                                </li>
                                <li><a href="member_manager.php">会员管理</a>
                                </li>
                                <li><a href="member_setting_activity.php">营销活动</a>
                                </li>
                                <li><a href="member_setting_system.php">系统设置</a>
                                </li>
                                <li><a href="member_withdrawcash.php">提现</a>
                                </li>
                                <li><a href="#">账户管理</a>
                                </li>
                            </ul>
                        </li>                                        
                    </ul>
                </div>
            </nav>

            <div id="page-wrapper" class="gray-bg dashbard-1">
                <div class="row border-bottom">
                    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">

                        <ul class="nav navbar-top-links navbar-right">
                            <li>
                                <span class="m-r-sm text-muted welcome-message"><a href="index.html" title="返回首页"><i class="fa fa-home"></i></a>欢迎使用女神阁会员卡系统</span>
                            </li>                       
                            <li>
                                <a href="log_out.php">
                                    <i class="fa fa-sign-out"></i> 退出
                                </a>
                            </li>
                        </ul>

                    </nav>
                </div>
                <!--<div class="row  border-bottom white-bg dashboard-header">



                </div>-->
                <div class="footer">
                    <div class="pull-right">
                        By： RubyCat
                    </div>
                    <div>
                        <strong>Copyright</strong>女神阁文化传媒有限公司版权所有
                    </div>
                </div>

                <div id="main_frame">
				<!-- InstanceBeginEditable name="main_frame" -->
                    <?php
                    // put your code here
                    require '../myLittleSQL.php';
                    require '../config.php';
                    $conn = new mylittlesql($server, $db_user, $db_pwd);
                    $conn->selectDB($database);
                    $shopcode = $_SESSION['ssn'];
                    $table="mcard_ConsumeLog_".$shopcode;
                    if (isset($_GET['trade_shopid'])) {
                        $trade_shopid = $_GET['trade_shopid'];
                    } else {
                        $trade_shopid = $_SESSION["shops_id"][0];
                    }
                    $sql = "select * from $table  where short_shop_name='$shopcode' and trade_shopid='$trade_shopid' ORDER BY date desc";
                    $result = $conn->executeSQL($sql);
                    ?>
                    <!-- head star -->
                    <div class="tnav row wrapper border-bottom white-bg page-heading">
                        <div class="col-sm-4">
                            <h2 class="fl">会员卡</h2>
                            <ol class="breadcrumb fl">
                                <li><a href="member_home.php">主页</a></li>
                                <li><strong>消费查询</strong></li>
                            </ol>
                        </div>
                    </div>
                    <!-- head end -->	

                    <!-- table star -->
                    <div class="row col-lg-12">
                        <div class="wrapper wrapper-content animated fadeInUp">
                            <div class="ibox">
                                <div class="ibox-title"><h5>所有项目</h5>
                                    <div class="ibox-tools rboor">
                                        <a href="projects.html" class="btn btn-primary btn-xs p310"><i class="im-plus"></i> 创建新项目</a>

                                        <a href="projects.html" class="btn btn-primary btn-xs p310"><i class="im-spell-check"></i> 批量审核</a>
                                        <button id="tb-refresh" href="projects.html" class="btn btn-primary btn-xs p310"><i class="im-spinner10 fa-spin"></i> 刷新</button>
                                    </div>
                                </div>

                                <div class="ibox-content">
                                    <!-- search star -->
                                    <div class="form-horizontal clearfix">                		
                                        <div class="col-lg-4 col-sm-3 pl0">
                                            <div class="form-group">
                                                <div class="col-lg-8 col-sm-7">
                                                    <select class="input-sm form-control input-s-sm inline" id="search_address" style="padding-bottom: 0px;padding-top: 0px;">
                                                        <option value="店">所有门店</option>
                                                        <?php
                                                        for ($i = 0; $i < count($_SESSION['shops_id']); $i++) {
                                                            $temp_id = $_SESSION["shops_id"][$i];
                                                            $temp_name = $_SESSION['shops_name'][$temp_id];

                                                            echo "<option value='$temp_name'>$temp_name</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-5">
                                            <div class="form-group">
                                                <label class="col-lg-3  col-sm-3 control-label">日期：</label>
                                                <div class="col-lg-8 col-sm-8 input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    <input type="text" placeholder="点击选择日期" class="input-sm form-control" id="search_date1"data-date-format="yyyy-mm-dd" >
<!--                                                    <span class="input-group-addon">到</span>
                                                    <input type="text" class="input-sm form-control" name="end" value="" placeholder="2014-11-17" id="demo">-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-4">
                                            <div class="form-group">
                                                <div class="col-lg-12 col-sm-12 input-group">
                                                    <input type="email" placeholder="请输入关键字" class="input-sm form-control" id="search_all">
                                                    <span class="input-group-btn">
                                                        <button type="button" class="btn btn-sm btn-primary" id="search_submit"> 搜索</button> </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- search end -->
                                    <table id="example" class="table table-striped table-bordered table-hover dataTables-example dataTable" cellspacing="0" width="100%">
                                        <thead>  

                                            <tr>
                                                <th>会员卡号</th>
                                                <th>会员名字</th>
                                                <th>日期</th>
                                                <th>类型</th>
                                                <th>折前金额</th>
                                                <th>折扣</th>
                                                <th>折后金额</th>
                                                <th>赠送积分</th>
                                                <th>门店</th>
                                                <th>操作员</th>
                                            </tr> 
                                        </thead>
<!--                                        <tfoot>
                                            <tr>
                                                <th>会员卡号</th>
                                                <th>会员名字</th>
                                                <th>日期</th>
                                                <th>动作</th>
                                                <th>类型</th>
                                                <th>金额</th>
                                                <th>门店</th>
                                                <th>操作员</th>
                                            </tr>
                                        </tfoot>-->
                                        <tbody>
                                            <!--#####################loop start####################################-->
                                            <?php while ($row = mysql_fetch_array($result)) { ?>
                                                <tr>

                                                    <td> <?php echo $row['account_id']; ?></td>
                                                    <td> <?php echo $row['account_name']; ?></td>
                                                    <td> <?php echo $row['date']; ?></td>
                                                    <td> <?php echo $row['trade_type']; ?></td>
                                                    <td> <?php echo $row['pre_money']; ?></td>
                                                    <td> <?php echo $row['discount']; ?></td>
                                                    <td> <?php echo $row['money']; ?></td>
                                                    <td> <?php echo $row['gift_points']; ?></td>
                                                    <td> <?php echo $row['trade_address']; ?></td>
                                                    <td> <?php echo $row['operator_name']; ?></td>     
                                                </tr>
                                            <?php } ?>
                                            <!--######################loop end##################################-->                                                      
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- table end -->
                    <script type="text/javascript">
                        $(function () {
                            var table = $('#example').DataTable({
                                "pagingType": "full_numbers",
                                "sLoadingRecords": "正在加载数据...",
                                "sZeroRecords": "暂无数据",
                                stateSave: true,
                                "searching": true,
                                pageLength: 20,
                                "lengthChange": false,
                                ordering:false,
                                "dom": 'rt<"bottom"ilp<"clear">>',
                                "language": {
                                    "processing": "玩命加载中...",
                                    "lengthMenu": "显示 _MENU_ 项结果",
                                    "zeroRecords": "没有匹配结果",
                                    "info": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
                                    "infoEmpty": "显示第 0 至 0 项结果，共 0 项",
                                    "infoFiltered": "(由 _MAX_ 项结果过滤)",
                                    "infoPostFix": "",
                                    "url": "",
                                    "paginate": {
                                        "first": "首页",
                                        "previous": "上一页",
                                        "next": "下一页",
                                        "last": "末页"
                                    }
                                }

                            });


                            $('#search_date1').datepicker()
                                    .on('changeDate', function (ev) {
                                        table.column(2).search($(this).val()).draw();
                                    });
                            $("#search_address").change(function () {
                                table.column(8).search($("#search_address").val()).draw();
                            });
                            $("#search_submit").click(function () {
                                table.search($("#search_all").val()).draw();
                            });



                            //单机行，选中复选框
                            $("#example tr").slice(1).each(function (g) {
                                var p = this;
                                $(this).children().slice(1).click(function () {
                                    $($(p).children()[0]).children().each(function () {
                                        if (this.type == "checkbox") {
                                            if (!this.checked) {
                                                this.checked = true;
                                            } else {
                                                this.checked = false;
                                            }
                                        }
                                    });
                                });
                            });


                            //使用col插件实现表格头宽度拖拽
                            //                            $(".table").colResizable();

                            //在搜索，或者分页的时候，调用该方法
                            //这里只做具体说明，没有做实际服务端数据测试
                            //重新加载表格数据（同等于刷新）
                            //添加fnReloadAjax  js引用
                            //参考http://www.datatables.net/plug-ins/api/fnReloadAjax
                            $("#tb-refresh").on("click", function () {
                                //加载一个新的文件
                                //fnReloadAjax方法有3个主要参数
                                //1、oSettings=[类似jquery ajax的data:{id:2}]
                                //2、sNewSource=加载数据的URL
                                //3、回调函数fnCallback
                                //table.fnReloadAjax( 'media/examples_support/json_source2.txt' );
                                //刷新新的数据
                                //table.fnReloadAjax();
                                table.state.clear();
                                location.reload();
                            });

                        })
                    </script>


                    <!-- InstanceEndEditable -->
						
                </div>

            </div>

        </div>
    </div>


    <!-- InstanceBeginEditable name="mainly scripts" -->
    <!-- Mainly scripts -->
    <script type="text/javascript" src="./search/js/admin/bootstrap.min.js"></script>
    <script type="text/javascript" src="./search/js/admin/jquery.dataTables.js"></script>
    <script type="text/javascript" src="./search/js/admin/dataTables.bootstrap.js"></script>
    <script src="../plugins/datepicker-bootstrap/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="../plugins/layer/layer.js" type="text/javascript"></script>
    <script src="../plugins/toastr/toastr.min.js" type="text/javascript"></script>
    <script src="../plugins/toastr/toast.js" type="text/javascript"></script>
    <!-- InstanceEndEditable -->


</body>
<!-- InstanceEnd --></html>
