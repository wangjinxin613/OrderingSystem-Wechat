/**
 * Created by Administrator on 2016/4/13.
 */
$(function () {
    $(".null").click(function () {
        $(".cancel").show();
        $(".theme-popover-mask").show();
    })
    $(".btn").click(function () {
        $(".cancel").hide();
        $(".theme-popover-mask").hide();
    })
});