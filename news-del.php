<?php
//新闻删除
//created db168@ 2018-09-03
$sid = empty($_REQUEST['sid'])?"null":$_REQUEST['sid'];
if($sid == null){
	echo "<script>alert('请指定要删除的记录！')</script>";
	header("Refresh:1;url=news-list.php");
}else{
	//执行操作
	include "conn.php";
	$result = mysqli_query($conn,"delete from news where id='{$sid}'");
	if($result){
		echo "<script>alert('数据删除成功')</script>";
		header("Refresh:0;url=news-list.php");
	}else{
		echo "数据删除失败".mysqli_error($conn);
	}
	//别忘了关闭数据库连接
	mysqli_close($conn);
}
?>