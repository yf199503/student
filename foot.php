</body>
</html>
<script src=" http://g.alicdn.com/sj/lib/jquery.min.js"></script>
<script src=" http://g.alicdn.com/sj/dpl/1.5.1/js/sui.min.js"></script>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script>
document.cookie="name=one";
console.log(document.cookie);
//等待dom元素加载完毕.
$(document).ready(function(){
	$(".level1 > a").click(function(){
		$(this).addClass("current")   //给当前元素添加"current"样式
		.next().show("fast")                //下一个元素显示
		.parent().siblings().children("a").removeClass("current")        //父元素的兄弟元素的子元素<a>移除"current"样式
		.next().hide("fast");//它们的下一个元素隐藏
		//找到a的父元素<li>，获取其在兄弟元素中的序号，保存到cookie中。跳转到其他页面后，
		//在读取这个cookie，就知道是哪个<li>下面的菜单处于打开状态。
		document.cookie = "menuState="+$(this).parent().index()

		return false;
	});
});
//读取菜单状态cookie
//用正则表达式
var menuState = getCookie("menuState");
$(".box .menu>li").eq(menuState).find("ul").show();
function getCookie(name)
{
	var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
	if(arr=document.cookie.match(reg))
	return unescape(arr[2]);
	else
	return null;
}


console.log(document.cookie);
</script>