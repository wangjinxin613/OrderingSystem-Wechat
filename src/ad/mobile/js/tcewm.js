/**
 * Created by Administrator on 2016/3/18.
 */
//弹出二维码大图；
//$(function(){
//    $(".erweima").click(function(){
//        $(".dewm").fadeIn();
//    });
//    $(document).bind("click",function(e){
//        var target  = $(e.target);
//        if(target.closest(".dewm,.erweima").length == 0){/*.closest()沿 DOM 树向上遍历，直到找到已应用选择器的一个匹配为止，返回包含零个或一个元素的 jQuery 对象。*/
//            $(".dewm").fadeOut();
//        };
//        e.stopPropagation();
//    })
//});
$(function(){
    $(".erweima").click(function(){
        $(".dewm").slideDown();
        $(".theme-popover-mask").show();
    });
    $(".theme-popover-mask").click(function(){
        $(".dewm").slideUp();
        $(".theme-popover-mask").hide();
    })
});