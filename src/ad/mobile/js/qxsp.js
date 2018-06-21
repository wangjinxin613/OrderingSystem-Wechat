/**
 * Created by Administrator on 2016/3/18.
 */
    //删除弹窗
$(function() {
    $(".btn").click(function () {
        $(".alert").slideDown();
        $(".theme-popover-mask").show();
    });
    $(".theme-popover-mask").click(function () {
        $(".alert").slideUp();
        $(".theme-popover-mask").hide();
    });
});
$(function(){
	$(".delete").click(function(){
		$(".spxz").hide();
		 $(".alert").slideUp();
	        $(".theme-popover-mask").hide();
	        $(".li5").hide();
	        $(".li6").hide();
	})
});
$(function(){
	$(".none").click(function(){
		  $(".alert").slideUp();
	        $(".theme-popover-mask").hide();
	})
});