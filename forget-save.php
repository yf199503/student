<?php
	include "conn.php";
	$email = $_REQUEST['email'];
	$question = $_REQUEST['question'];
	$answer = $_REQUEST['answer'];
	$sql = "select email,name,password,question,answer form user where email='{$email}' and question='{$question}' and answer='{$answer}'";
	$result = mysqli_query($conn,$sql);
	if($result >= 0){
		echo "<script>alert('验证成功')</script>";
		// $row = mysqli_fetch_assoc($result);
		header("Refresh:0;url=login.php");
	}else{
		echo "<script>alert('验证失败')</script>";
		header("Refresh:1;url=forget.php");
	}
	mysqli_close($conn);
?>