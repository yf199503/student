<?php
/*create db168@ 2018-09-04*/
//接收banji-input.php提交过来的信息

$banhao = $_REQUEST['banhao'];
$banzhang = $_REQUEST['banzhang'];
$jiaoshi = $_REQUEST['jiaoshi'];
$banzhuren = $_REQUEST['banzhuren'];
$slogan = $_REQUEST['slogan'];
$action = empty($_REQUEST['action'])?"null":$_REQUEST['action'];

include "conn.php";

if($action == "add"){
	$str = "数据插入成功！";
	$str2 = "数据插入失败！";
	$url = "banji-input.php";
	$sql = "insert into banji(班号,班长,教室,班主任,班级口号)
		value('{$banhao}','{$banzhang}','{$jiaoshi}','{$banzhuren}','{$slogan}')";
}else if($action == 'update'){
	$str = "数据插入成功！";
	$str2 = "数据插入失败！";
	$url = "banji-list.php";
	$kid = $_POST['kid'];
	$sql = "update banji set 班号='{$banhao}',班长='{$banzhang}',教室='{$jiaoshi}',班主任='{$banzhuren}',班级口号='{$slogan}' where 班号='{$kid}'";
}else{
	die("请选择操作方法");
}
	echo $sql;
	$reselt = mysqli_query($conn,$sql);
	if($reselt){
		echo "<script>alert({$str});</script>";
		//页面指定2秒后跳转
		header("Refresh:2;url={$url}");
	}else{
		echo "{$str2}".mysqli_error($conn);
	}
	//关闭链接，释放资源
	mysqli_close($conn);
?>