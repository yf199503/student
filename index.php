<?php
include 'conn.php';
$sql ="select * from news";
$result =mysqli_query($conn,$sql);
?>
<?php include "head.php" ?>

		<div class="sui-layout">
		  <div class="sidebar">
			<?php include "leftmenu.php" ?>
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd label-success">欢迎访问学生管理系统！</p>
		  </div>
		</div>
		<div class="sui-right">
			<ul id="oUl">

			</ul>
		</div>
	</div>
<?php include "foot.php" ?>
<script>
//第一种方法
// document.cookie = "uname=dengbin;expires=Thu,22 Aug 2018 00:00:00 GMT";
//第二种方法
var days=30;
var daysTime = 30*24*60*60*1000;//转换为毫秒

var exp = new Date();
exp.setTime(exp.getTime() + daysTime);//设置为30天后

document.cookie = "uname=dengbin;expires="+exp.toGMTString();


var password = "123456789";
document.cookie = "password="+password;

window.onload = function(){
	$.ajax({
	url     : "news-ajax.php",
	type    : "POST",
	dataType: "json",
	success : function(data,textStatus){
	var str = "";
		for (var i=0; i < data.data.length; i++) {
			console.log(data.data[i].id);
			str += "<li><a href='xinwenye.php?kid="+data.data[i].id+"'><img src='"+ data.data[i].图片 + "'></a>"+"<br>"+"<a href='xinwenye.php' class='title'>" + data.data[i].标题 + "</a>"+"<p>"+"<span class='jt'>"+ data.data[i].肩题 +"</span>"+" | "+"<span>" + data.data[i].发布时间 + "</span>" +"</p>"+"<a href='xinwenye.php'>" + data.data[i].内容 + "</a>"+"</li>";
		}
		$("#oUl").html(str);
	},
	error   : function(XMLHttpRequest,textStatus,errorThrown){
	// 请求失败后调用此函数
	console.log("失败原因：" + errorThrown);
	}
	});
}

</script>