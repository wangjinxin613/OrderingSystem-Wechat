/**
 * Created by Administrator on 2016/3/18.
 */
//支付边框及字体颜色
$(function(){
   var titleName=$("#zfym a");
for(var i =0;i<titleName.length;i++){
    titleName[i].id=i;
    titleName[i].onmouseover=function(){
        for(var j =0;j<titleName.length;j++){
            titleName[j].className="";
        }
        this.className = "aclass";
        }
    }

});
//切换支付
