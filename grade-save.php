<?php
	$xmName = $_REQUEST["xmName"];
	$xhName = $_REQUEST["xhName"];
	$kcmName = $_REQUEST["kcmName"];
	$action = empty($_REQUEST["action"])?"add":$_REQUEST["action"];

include "conn.php";

	if ($action == "add") {
	$trs1 = "数据添加成功";
	$trs2 = "数据更新成功";
	$sql1 = "select * from student LEFT join xuanxiu on student.学号 = xuanxiu.学号 LEFT join kecheng on xuanxiu.课程编号 = kecheng.课程编号";
	}

	$result = mysqli_query($conn,$sql1);

	//输出数据
	// var_dump($result);
	if ($result) {
		echo "<script>alert('数据更新成功')</script>";
		header("Refresh:2;url={$url}");
	}else{
		echo "数据更新失败".mysqli_error($conn);
	}
	//关闭数据连接
	mysqli_close($conn);
 ?>
?>