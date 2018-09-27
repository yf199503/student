<?php session_start();
//检测session是否为空，是则跳转到登录页
if(empty($_SESSION['usname'])){
	header("Refresh:0;url=login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui.min.css">
	<link rel="stylesheet" type="text/css" href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui-append.min.css">
	<link rel="stylesheet" type="text/css" href="css/default.css">
	<style>
		#mybody{
			/*box-shadow 属性向框添加一个或多个阴影。*/
			box-shadow:2px 2px 5px #000,-2px -2px 5px #000;
			animation: myfirst 2s;
			/*-webkit-animation:myfirst 2s;*/
		}
		/*通过 @keyframes 规则，您能够创建动画*/
		@keyframes myfirst{
			/*transform 属性向元素应用 2D 或 3D 转换。该属性允许我们对元素进行旋转、缩放、移动或倾斜。*/
			/*rotate(angle)	定义 2D 旋转，在参数中规定角度。*/
			/*scale(x,y)	定义 2D 缩放转换。*/
			from {transform:rotate(15deg) scale(0.75); opacity:0};
			to {transform:rotate(0deg) scale(1); opacity:1};
		}
		.sui-container{
		    width: 1000px;
		    height: 630px;
		    border: 1px solid skyblue;
		    margin: 100px auto;
		    overflow: hidden;
		}
		.sidebar{
			height: 570px;
			border-right: 1px solid skyblue;
		}
		.my-head{
			background: pink;
			font-weight: bold;
		}
		.userinfor{
			margin-left: 710px;
			margin-top:-40px;
			font-size: 13px;
		}

		.sui-right{
		    width: 850px;
		    height: 400px;
		    margin-left: 190px;
		}
		.sui-right li{
			float: left;
			width: 250px;
			height: 250px;
			margin-left: 100px;
		}
		.sui-right li img{
			width: 250px;
			height: 130px;
			border-bottom: 8px solid red;
		}
		.sui-right li img:hover{
			width: 260px;
			height: 150px;
			border-bottom:none;
		}
		.sui-right li p{
			margin-top: 5px;
		}
		.sui-right li span{
			color: orange;
		}
		.sui-right .title{
			display: block;
			font-weight: bold;
			color: black;
			font-size: 15px;
			margin-top: 10px;
		}
</style>
</head>
<body>
	<div class="sui-container" id="mybody">
		<div class="my-head">北京网络职业学院学生管理系统 V2.0
			<div class="userinfor">欢迎<span style="color:red;"><?php echo $_SESSION['usemail']?></span>登录成功&nbsp;&nbsp;<a href="login-out.php">退出</a></div>
		</div>
