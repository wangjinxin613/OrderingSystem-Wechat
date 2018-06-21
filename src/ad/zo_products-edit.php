<?php
  require('config/index_class1.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="js/html5.js"></script>
<script type="text/javascript" src="js/respond.min.js"></script>
<script type="text/javascript" src="js/PIE_IE678.js"></script>
<![endif]-->
<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="css/style.css"/>
<link href="assets/css/codemirror.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/ace.min.css" />
    <link rel="stylesheet" href="Widget/zTree/css/zTreeStyle/zTreeStyle.css" type="text/css">
<link rel="stylesheet" href="assets/css/font-awesome.min.css" />
<!--[if IE 7]>
    <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
  <![endif]-->
<link href="Widget/icheck/icheck.css" rel="stylesheet" type="text/css" />
<link href="Widget/webuploader/0.1.5/webuploader.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" charset="utf-8" src="ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="lang/zh-cn/zh-cn.js"></script>
<title>编辑商品</title>
</head>
<body>
</header>
  <?php
    error_reporting(0);
    session_start();

    include('config/conn.php');//用户名获取

  $id=$_GET['id'];
  if($id==null){
  exit('<script>alert(\'参数传递有误！\');</script>');
  }
    mysql_select_db("my_db", $conn);
$result = mysql_query("SELECT * FROM zo_product JOIN zo_product_sort ON zo_product.sort_id = zo_product_sort.id where pid = '$id' ");
while($row = mysql_fetch_array($result))
{


echo '

 <div class="page_right_style" style="margin-left:100px;">

<form action="zo/products_edit_action.php?id='; echo $row['pid'];echo '" method="post" class="form form-horizontal" id="form-article-add" enctype="multipart/form-data">
  <div class="clearfix cl">

       <p>商品名称：<input type="text"  value="';echo $row['products_name']; echo '" placeholder="请输入商品名称" id="" name="products_name" class="inp" >	</p>
  </div>
  <div class="clearfix cl">

       <p style="margin-left:-14px;">商品长标题：<input type="text"  value="';echo $row['cbt']; echo '" placeholder="请输入商品长标题" id="" name="cbt" class="inp" >	</p>
  </div>
  <div class="clearfix cl">
       <p>商品分类：&nbsp;&ensp;';echo $row['sort_name']; echo '
        </p>
  </div>
  <div class="clearfix cl">
       <p>商品价格：<input type="text"  value="';echo $row['products_price']; echo '" placeholder="请输入商品价格" id="" name="products_price" class="inp" required>	元</p>
  </div>
  <div class="clearfix cl">
       <p>排列顺序：<input type="text"  value="';echo $row['sx']; echo '" placeholder="请输入商品排列顺序，数字越大排列越靠后" id="" name="sx" class="inp" required></p>
  </div>
  <div class="clearfix cl">
       <p>商品库存：<input type="text"  value="';echo $row['products_num1']; echo '" placeholder="请输入商品库存" id="" name="products_num1" class="inp" required></p>
  </div>
  <div class="clearfix cl">
       <p>商品图片：</p>
      <P><img src="';echo $row['products_img']; echo '" style="width:80px;height:80px;margin-left:80px;"></P>
      <P style="margin:20px 76px;"><input type="file" style="padding:10px 10px;" name="image"></P>
  </div>
   <div id="detail" style="display:none">';echo $row['p_body']; echo '</div>
  <div class="clearfix cl">
       <p>商品图文详情：</p>
   <script id="editor" type="text/plain" style="width:600px;height:400px;"></script>
  <br>
  <input name="p_body" type="text" id="zi" style="display:none">
  </div>
 
   <div class="clearfix cl" style="width:100%">
   
       
         <script type="text/javascript">
           function test(){
             var t = $("#detail").html();
           // alert(t);
           setContent(t);
         }
     setTimeout("test()","800"); 
         </script>
</div>
  ';

}
  ?>
  <div class="clearfix cl">
    <div class="Button_operation">
      <button  class="btn btn-primary radius" type="button" onclick="getContent()"><i class="icon-save "></i>保存并提交审核</button>
      <button onClick="article_save();" type="reset" class="btn btn-secondary  btn-warning" type="button"><i class="icon-save"></i>重置</button>
      <button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
    </div>
  </div>
</form>
  </div>
</div>
</div>

<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');


    function isFocus(e){
        alert(UE.getEditor('editor').isFocus());
        UE.dom.domUtils.preventDefault(e)
    }
    function setblur(e){
        UE.getEditor('editor').blur();
        UE.dom.domUtils.preventDefault(e)
    }
    function insertHtml(values) {
        var value = prompt('插入html代码', '');
        UE.getEditor('editor').execCommand('insertHtml', value)
    }
     
       


    function createEditor() {
        enableBtn();
        UE.getEditor('editor');
    }
    function getAllHtml() {
        alert(UE.getEditor('editor').getAllHtml())
    }
    function getContent() {
        var arr = [];
       // arr.push("使用editor.getContent()方法可以获得编辑器的内容");
     //   arr.push("内容为：");
     document.getElementById("zi").value=UE.getEditor('editor').getContent();
     
      document.getElementById("form-article-add").submit();
       // arr.push(UE.getEditor('editor').getContent());
        //alert(arr.join("\n"));
    }
    function getPlainTxt() {
        var arr = [];
        arr.push("使用editor.getPlainTxt()方法可以获得编辑器的带格式的纯文本内容");
        arr.push("内容为：");
        arr.push(UE.getEditor('editor').getPlainTxt());
        alert(arr.join('\n'))
    }
    function setContent(isAppendTos) {
        var arr = [];
       // arr.push("使用editor.setContent('欢迎使用ueditor')方法可以设置编辑器的内容");
        UE.getEditor('editor').setContent(isAppendTos,'');
        //alert(arr.join("\n"));
    }
    function setDisabled() {
        UE.getEditor('editor').setDisabled('fullscreen');
        disableBtn("enable");
    }

    function setEnabled() {
        UE.getEditor('editor').setEnabled();
        enableBtn();
    }

    function getText() {
        //当你点击按钮时编辑区域已经失去了焦点，如果直接用getText将不会得到内容，所以要在选回来，然后取得内容
        var range = UE.getEditor('editor').selection.getRange();
        range.select();
        var txt = UE.getEditor('editor').selection.getText();
        alert(txt)
    }

    function getContentTxt() {
        var arr = [];
        arr.push("使用editor.getContentTxt()方法可以获得编辑器的纯文本内容");
        arr.push("编辑器的纯文本内容为：");
        arr.push(UE.getEditor('editor').getContentTxt());
        alert(arr.join("\n"));
    }
    function hasContent() {
        var arr = [];
        arr.push("使用editor.hasContents()方法判断编辑器里是否有内容");
        arr.push("判断结果为：");
        arr.push(UE.getEditor('editor').hasContents());
        alert(arr.join("\n"));
    }
    function setFocus() {
        UE.getEditor('editor').focus();
    }
    function deleteEditor() {
        disableBtn();
        UE.getEditor('editor').destroy();
    }
    function disableBtn(str) {
        var div = document.getElementById('btns');
        var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            if (btn.id == str) {
                UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
            } else {
                btn.setAttribute("disabled", "true");
            }
        }
    }
    function enableBtn() {
        var div = document.getElementById('btns');
        var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
        }
    }

    function getLocalData () {
        alert(UE.getEditor('editor').execCommand( "getlocaldata" ));
    }

    function clearLocalData () {
        UE.getEditor('editor').execCommand( "clearlocaldata" );
        alert("已清空草稿箱")
    }
</script>

</body>
</html>
