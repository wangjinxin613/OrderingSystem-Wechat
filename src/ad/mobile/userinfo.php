<?
	require('../config/index_class.php');
?>
<!DOCTYPE html>

<!--

To change this license header, choose License Headers in Project Properties.

To change this template file, choose Tools | Templates

and open the template in the editor.

-->

<html>

    <head>

        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">

        <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->

        <title>个人中心</title>

        <!-- Bootstrap -->

        <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link href="../../styles/extend/store/yuding-order-success.css" type="text/css" rel="stylesheet" />
		<link href="../../styles/base.css" type="text/css" rel="stylesheet" />
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

        <!--[if lt IE 9]>

          <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>

          <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>

        

        <![endif]-->

        <style>

            .container-init{

                border: 1px solid #cccccc;

                background-color: #ffffff;

                box-shadow: 1px 1px 3px #888888;

            }

            .row-init{

                height: 50px;

                line-height: 50px;



            }

            .row-init-head{

                height: 100px;

                line-height: 100px;

            }

            body{

                background-color: rgba(0,0,0,0.1);

            }

            .divider-div{

                width: 100%;

                border-bottom: 1px solid #cccccc;

            }

        </style>

    </head>

    <body>

       <div class="head">
			<a href="index.php"><img src="../../images/return.png" style="width:23px;float:left;margin-left:20px;" ></a><span style=";">个人资料</span><span style="width:40px;float:right;">&nbsp;</span>
		</div>
		<div style="padding-bottom:52px;"></div>

     

        <div class="container container-init">

            <div class="row row-init">

                <div class="col-xs-4"><strong>账号</strong></div>

                <div class="col-xs-8 text-right"><? echo $user->admin_name;?></div>               

            </div>

            <div class="divider-div"></div>

            <div class="row row-init">

                <div class="col-xs-4"><strong>账号ID</strong></div>

                <div class="col-xs-8 text-right"><? echo $user->admin_id;?></div>               

            </div>

            <div class="divider-div"></div>

            <div class="row row-init">

                <div class="col-xs-4"><strong>姓名</strong></div>

                <div class="col-xs-8 text-right"><? echo $user->admin_truename; ?></div>               

            </div>

            <div class="divider-div"></div>

            <div class="row row-init">

                <div class="col-xs-4"><strong>性别</strong></div>

                <div class="col-xs-8 text-right"><? echo $user->admin_sex;?></div>               

            </div>
            <div class="divider-div"></div>

            <div class="row row-init">

                <div class="col-xs-4"><strong>电话</strong></div>

                <div class="col-xs-8 text-right"><? echo $user->admin_tel;?></div>               

            </div>
            <div class="divider-div"></div>
           
            <div class="row row-init">

                <div class="col-xs-4"><strong>电子邮箱</strong></div>

                <div class="col-xs-8 text-right"><? echo $user->admin_email;?></div>               

            </div>
             <div class="divider-div"></div>

            <div class="row row-init">

                <div class="col-xs-4"><strong>账户余额</strong></div>

                <div class="col-xs-8 text-right"><? echo $user->admin_money;?></div>               

            </div>
             <div class="divider-div"></div>

            <div class="row row-init">

                <div class="col-xs-4"><strong>已用金额</strong></div>

                <div class="col-xs-8 text-right"><? echo $user->money_used;;?></div>               

            </div>
             <div class="divider-div"></div>

             <div class="row row-init">

                <div class="col-xs-4"><strong>角色</strong></div>

                <div class="col-xs-8 text-right"><? if($user->admin_type == 1){ echo '门店创始人';} ?></div>               

            </div>
 <div class="divider-div"></div>

            <div class="row row-init">

                <div class="col-xs-4"><strong>所属门店</strong></div>

                <div class="col-xs-8 text-right"><? echo $item->store_name;?></div>               

            </div>



        </div>

        <br>

        <br>

        <div  style="margin-top:-50px;">

            <button type="button"  class="btn-block btn btn-primary btn-lg" data-toggle="modal"  data-target="#edit_pwd" >修改密码</button>

        </div>

        <div class="modal fade" id="edit_pwd" tabindex="-1" role="dialog" 

             aria-labelledby="myModalLabel" aria-hidden="true">

            <div class="modal-dialog">

                <div class="modal-content">
                	<form action="action/update_password.php" method="post">
                    <div class="modal-body">

                        <div class="row"><div class="col-xs-3 text-center"><strong>原密码</strong></div><div class="col-xs-8" ><input type="text" id="pre_pwd" style="width:100%" name="y_password"/></div></div>             
                        <br>

                        <div class="row"><div class="col-xs-3 text-center"><strong>新密码</strong></div><div class="col-xs-8"><input type="text" id="new_pwd"  style="width:100%" name="n_password"/></div></div>

                    </div>

                    <div class="modal-footer">
                    	<button type="submit" class="btn btn-primary"  id="btn_edit_pwd" style="margin-top:-1px;">确定</button>

                        <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-top:-10px;">关闭</button>
                    </div>
 </form>
                </div><!-- /.modal-content -->

            </div><!-- /.modal -->

        </div>

        <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>

        <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

        <script src="../plugins/layer/layer.js" type="text/javascript"></script>

        <script>



            $(function () {

                //模态框垂直居中

                function centerModals() {

                    $('.modal').each(function (i) {

                        var $clone = $(this).clone().css('display', 'block').appendTo('body');

                        var top = Math.round(($clone.height() - $clone.find('.modal-content').height()) / 2);

                        top = top > 0 ? top : 0;

                        $clone.remove();

                        $(this).find('.modal-content').css("margin-top", top);

                    });

                }

                $('.modal').on('show.bs.modal', centerModals);

                $(window).on('resize', centerModals);

                

                $("#btn_edit_pwd").click(function () {

                    var load_a = layer.load();

                    $.post("mcard_webapp_pwd_edit.php",

                            {

                                pre_pwd: $("#pre_pwd").val(),

                                new_pwd:$("#new_pwd").val()

                            },

                            function (data, status) {

                                if(data=="success"){

                                    alert("修改成功，请重新登录");

                                    document.location = "./log_out.php";

                                }

                                else{

                                    alert(data);

                                }

                            });

                    layer.close(load_a);

                });

            });

        </script>

    </body>

</html>

