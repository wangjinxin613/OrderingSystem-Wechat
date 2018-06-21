
var _PageHeight = document.documentElement.clientHeight,
  _PageWidth = document.documentElement.clientWidth;
//计算loading框距离顶部和左部的距离（loading框的宽度为215px，高度为61px）
var _LoadingTop = _PageHeight > 61 ? (_PageHeight - 61) / 2 : 0,
  _LoadingLeft = _PageWidth > 215 ? (_PageWidth - 215) / 2 : 0;
//在页面未加载完毕之前显示的loading Html自定义内容
var _LoadingHtml = layer.load(2);
setTimeout(function(){
  layer.closeAll('loading');
}, 200);
//呈现loading效果

//window.onload = function () {
//  var loadingMask = document.getElementById('loadingDiv');
//  loadingMask.parentNode.removeChild(loadingMask);
//};
//监听加载状态改变
document.onreadystatechange = completeLoading;
//加载状态为complete时移除loading效果
function completeLoading() {
  if (document.readyState == "complete") {
 var loadingMask = document.getElementById('loadingDiv');
 loadingMask.parentNode.removeChild(loadingMask);
  }
}
