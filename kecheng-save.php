<?php
/*create db168@ 2018-09-04*/
//接收kecheng-input.php提交过来的信息
$kcName = $_REQUEST['kcName'];
$kcTime= $_REQUEST['kcTime'];
$action = empty($_REQUEST['action'])?"null":$_REQUEST['action'];
include "conn.php";

if($action == 'add'){
	$trs1 = "数据添加成功";
	$trs2 = "数据更新成功";
	$url = "kecheng-input.php";
	$sql1 = "insert into kecheng(课程名,时间) value('{$kcName}','{$kcTime}')";
}else if($action == 'update'){
	$trs1 = "数据添加失败";
	$trs2 = "数据更新失败";
	$url = "kecheng-list.php";
	$kid = $_REQUEST['kid'];
	$sql1 = "update kecheng set 课程名='{$kcName}',时间='{$kcTime}' where 课程编号='{$kid}'";
}else{
	die("请选择操作方法");
}
	echo $sql1;
	$result = mysqli_query($conn,$sql1);
	if($result){
		echo "<script>alert({$trs1})</script>";
		header("Refresh:1;url={$url}");
	}else{
		echo "{$trs2}".mysqli_error($conn);
	}
	//关闭链接，释放资源
	mysqli_close($conn);
?>