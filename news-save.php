<?php
//接受news-input.php提交出来的信息
session_start();
$title = $_REQUEST['title'];//新闻标题
$jtNum = $_REQUEST['jtNum'];//肩题
$authors = $_SESSION['usid'];//作者
$fbTime = $_REQUEST['fbTime'];//发布时间
$content = $_REQUEST['content'];//内容
$column = $_REQUEST['column'];//栏目
$action = $_REQUEST['action'];


if ((($_FILES['file']['type'] == 'image/gif')||($_FILES['file']['type'] == 'image/png')||($_FILES['file']['type'] == 'video/mp4')||($_FILES['file']['type'] == 'image/jpeg')||($_FILES['file']['type'] == 'image/pjpeg'))&&($_FILES['file']['size'] < 10241000)){
	if($_FILES["file"]["error"] > 0){
		echo "错误: " . $_FILES["file"]["error"] . "<br />";
	}else{
		$filename = "upload/".date('YmdHis').$_FILES["file"]["name"];
		move_uploaded_file($_FILES["file"]["tmp_name"],$filename);
	}
}else{
	$filename = 1;
}

include "conn.php";

if($action == 'add'){
	//$a获取当前时间
	$a = time();
	$str = "数据插入成功！";
	$str2 = "数据插入失败！";
	$url = "news-input.php";

	$sql = "insert into news(标题,肩题,图片,内容,发布时间,userid,创建时间,columnid) values('{$title}','{$jtNum}','{$filename}','{$content}','{$fbTime}','{$authors}','$a','{$column}')";
	// echo $sql;
}else if($action == 'update'){
	$id = $_REQUEST['id'];
	$str = "数据修改成功！";
	$str2 = "数据修改失败！";
	$url = "news-list.php";

	$sql3 = "select * from news where id='{$id}'";
	$result3 = mysqli_query($conn,$sql3);
	if(mysqli_num_rows($result3)>0){
		$row3 = mysqli_fetch_assoc($result3);
	}

	if($filename == 1){
		$filename = $row3['图片'];
	}
	$sql = "update news set 标题='{$title}',肩题='{$jtNum}',图片='{$filename}',内容='{$content}',发布时间='{$fbTime}' where id='{$id}'";
	// echo $sql;
}else{
	die("请选择操作方法");
}
$reselt = mysqli_query($conn,$sql);
	if($reselt){
		echo "<script>alert('{$str}')</script>";
		//页面指定2秒后跳转
		header("Refresh:0;url={$url}");
	}else{
		echo "{$str2}".mysqli_error($conn);
	}
	//关闭链接，释放资源
	mysqli_close($conn);
?>