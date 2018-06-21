/**
 * Created by Administrator on 2016/3/18.
 */
    //支付弹窗
    $(function(){
        $("#btn3").click(function(){
            $(".menu").slideDown();
            $(".theme-popover-mask").show();
        });
        $(".theme-popover-mask").click(function(){
            $(".menu").slideUp();
            $(".theme-popover-mask").hide();
        });
        $("#btn1").click(function(){
            $("#btn2").removeClass("btn1").addClass("btn2");
            $("#btn1").removeClass("btn2").addClass("btn1");
            $("#yunfei").show();
            $("#zt").hide();
            $("#address2").show();
        });
        $("#btn2").click(function(){
            $("#btn1").removeClass("btn1").addClass("btn2");
            $("#btn2").removeClass("btn2").addClass("btn1");
            $("#yunfei").hide();
            $("#address2").hide();
            $("#zt").show();
        });
        });
    //地址弹窗
    $(function(){
        $(".address").click(function(){
            $(".changeadd").slideDown();
            $(".theme-popover-mask").show();
        });
        $(".theme-popover-mask").click(function(){
            $(".changeadd").slideUp();
            $(".theme-popover-mask").hide();
        });
        });


    $(function(){
        $("#btn5").click(function(){
            $(".zjdd").slideDown();
        });
        $(document).bind("click",function(e){
        var target  = $(e.target);
        if(target.closest("#btn5,.zjdd").length == 0){/*.closest()沿 DOM 树向上遍历，直到找到已应用选择器的一个匹配为止，返回包含零个或一个元素的 jQuery 对象。*/
        $(".zjdd").slideUp();
        };
        e.stopPropagation();
        })
        });

    $(function(){
        $("#btn4").on("click",function(){
            $(".changeadd").slideUp();
            $(".theme-popover-mask").hide();
        })
    });
  $(function(){
    $("#btn5").on("click",function(){
        $(".zjdd").slideDown();
        $(".changeadd")
    })
    });

  $(function(){
    $("#btn6").on("click",function(){
        $(".zjdd").slideUp();
        $(".theme-popover-mask").hide();
    })
});