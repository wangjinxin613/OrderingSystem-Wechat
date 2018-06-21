/**
 * Created by Administrator on 2016/3/18.
 */
//下拉菜单

$(function() {
    $(".xlmenu").click(function () {
        $(".ycmenu").slideDown();
        $(".theme-popover-mask").show();
    });
    $(".theme-popover-mask").click(function () {
        $(".ycmenu").slideUp();
        $(".theme-popover-mask").hide();
    });
});