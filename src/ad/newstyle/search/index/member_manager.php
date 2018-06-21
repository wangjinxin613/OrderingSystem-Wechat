<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
        <title>无标题文档</title>
        <link href="../css/admin/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../css/css3/animate.css" rel="stylesheet" type="text/css" />
        <link href="../css/fonts.css" rel="stylesheet" type="text/css" />
        <link href="../css/icons.css" rel="stylesheet" type="text/css" />
        <link href="../css/admin/style.css" rel="stylesheet" type="text/css" />
        <link href="../css/admin/jquery.dataTables.css" rel="stylesheet" type="text/css" />
        <link href="../../css/plugins/toastr/toastr.min.css" rel="stylesheet" type="text/css"/>
        <?php
        // put your code here
        require '../../../myLittleSQL.php';
        require '../../../config.php';
        $conn = new mylittlesql($server, $db_user, $db_pwd);
        $conn->selectDB($database);
        $sql = "select * from mcard_account_whz";
        $result = $conn->executeSQL($sql);
        ?>
        <script>

            function a_del(id) {
                var load_a = layer.load();
                $.post("member_manager_del.php",
                        {
                            account_id: id,
                        },
                        function (data, status) {
                            if (data == "1") {
                                toastr.success("删除成功");

                            }
                            else {
                                showErrorToast(data);
                            }
                            layer.close(load_a);
                        });
            }
        </script>
    </head>
    <body>
        <!-- head star -->
        <div class="tnav row wrapper border-bottom white-bg page-heading">
            <div class="col-sm-4">
                <h2 class="fl">项目</h2>
                <ol class="breadcrumb fl">
                    <li><a href="index.html">主页</a></li>
                    <li><strong>项目</strong></li>
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
                                        <select class="input-sm form-control input-s-sm inline">
                                            <option value="0">请选择</option>
                                            <option value="1">冻结</option>
                                            <option value="2">开放</option>
                                            <option value="3">审核</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-5">
                                <div class="form-group">
                                    <label class="col-lg-3  col-sm-3 control-label">日期：</label>
                                    <div class="col-lg-8 col-sm-8 input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <input type="email" placeholder="2014-11-17" class="input-sm form-control">
                                            <span class="input-group-addon">到</span>
                                            <input type="text" class="input-sm form-control" name="end" value="" placeholder="2014-11-17">
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-lg-4 col-sm-4">
                                                    <div class="form-group">
                                                        <div class="col-lg-12 col-sm-12 input-group">
                                                            <input type="email" placeholder="请输入关键字" class="input-sm form-control">
                                                                <span class="input-group-btn">
                                                                    <button type="button" class="btn btn-sm btn-primary"> 搜索</button> </span>
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
                                                            <th>真实姓名</th>
                                                            <th>手机号码</th>
                                                            <th>领卡时间</th>
                                                            <th>余额</th>
                                                            <th>已消费金额</th>
                                                            <th>积分</th>
                                                            <th>会员等级</th>
                                                            <th>操作</th>
                                                        </tr> 
                                                    </thead>
                                                    <tbody>
                                                        <!--#####################loop start####################################-->
                                                        <?php while ($row = mysql_fetch_array($result)) { ?>
                                                            <tr>

                                                                <td> <?php echo $row['account_id']; ?></td>
                                                                <td> <?php echo $row['wx_nickname']; ?></td>
                                                                <td> <?php echo $row['real_name']; ?></td>
                                                                <td> <?php echo $row['tel']; ?></td>
                                                                <td> <?php echo $row['create_date']; ?></td>
                                                                <td> <?php echo $row['money_still']; ?></td>
                                                                <td> <?php echo $row['money_used']; ?></td>
                                                                <td> <?php echo $row['points']; ?></td>
                                                                <td>  
                                                                    <?php
                                                                    switch ($row['rank']) {
                                                                        case "normal":
                                                                            echo '正常会员';
                                                                            break;
                                                                        default :
                                                                            break;
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <a  class="btn btn-primary btn-xs p310"><i class="im-pencil2"></i> 编辑</a>
                                                                    <a onclick="a_del('<?php echo $row['account_id']; ?>')" class="btn btn-primary btn-xs p310"><i class="im-remove4"></i> 删除</a>
                                                                </td>
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
                                                </body>
                                                </html>
                                                <script type="text/javascript" src="../js/jquery.min.js"></script>
                                                <script type="text/javascript" src="../js/admin/bootstrap.min.js"></script>
                                                <script type="text/javascript" src="../js/admin/jquery.dataTables.js"></script>
                                                <script src="../../../plugins/layer/layer.js" type="text/javascript"></script>
                                                <script type="text/javascript" src="../js/admin/dataTables.bootstrap.js"></script>
                                                <script type="text/javascript" src="../js/admin/colResizable-1.5.min.js"></script>
                                                <script src="../../js/plugins/toastr/toastr.min.js" type="text/javascript"></script>
                                                <script src="../../js/toast.js" type="text/javascript"></script>
                                                <script type="text/javascript">
                                                                        $(function () {

                                                                            var table = $('#example').DataTable({
                                                                                "pagingType": "full_numbers",
                                                                                "sLoadingRecords": "正在加载数据...",
                                                                                "sZeroRecords": "暂无数据",
                                                                                stateSave: true,
                                                                                "searching": false,
                                                                                "dom": 'rt<"bottom"iflp<"clear">>',
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
                                                                                },
                                                                                _fnPageChange: function () {
                                                                                    alert("1111");
                                                                                }

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
                                                                            $(".table").colResizable();

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
                                                                            });

                                                                        })
                                                </script>

