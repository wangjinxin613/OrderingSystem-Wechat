/**
 * Created by Administrator on 2016/4/13.
 */
$(function () {
    function getRTime(){
        var EndTime= new Date('2016/4/23 10:00:00'); //截止时间
        var NowTime = new Date();
        var t =EndTime.getTime() - NowTime.getTime();
        var d=Math.floor(t/1000/60/60/24);
        t-=d*(1000*60*60*24);
        var h=Math.floor(t/1000/60/60);
        t-=h*60*60*1000;
        var m=Math.floor(t/1000/60);
        t-=m*60*1000;
        var s=Math.floor(t/1000);

//        var d=Math.floor(t/1000/60/60/24);
//        var h=Math.floor(t/1000/60/60%24);
//        var m=Math.floor(t/1000/60%60);
//        var s=Math.floor(t/1000%60);
        function fnW(str){
            var num;
            str>9?num=str:num="0"+str;
            return num;
        }
        $(".t_d").html(d + "天");
        $(".t_h").html(h + ":");
        $(".t_m").html(fnW(m) + ":");
        $(".t_s").html(fnW(s)+ "");
    }
    setInterval(getRTime,1000); 
});
    