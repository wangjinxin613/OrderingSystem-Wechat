/**
 * Created by Administrator on 2016/4/13.
 */
    $(function(){
        $(window).scroll(function() {
            if($(window).scrollTop() >= 100){
                $('.actGotop').fadeIn(300);
            }else{
                $('.actGotop').fadeOut(300);
            }
        });
        $('.actGotop').click(function(){$('html,body').animate({scrollTop: '0px'}, 300);});
    });
