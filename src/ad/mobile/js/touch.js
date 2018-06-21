window.onload = function(){
		var doma=document.getElementById("wx_nav").getElementsByTagName('a');
		for(var i=0;i<doma.length;i++){
		doma[i].addEventListener('touchstart',function(){},false);
	}
}