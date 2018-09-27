<?php session_start(); ?>
<?php
	include("conn.php");
		// 邮箱
		$email = $_REQUEST['email'];
	    // 密码
	    $password = $_REQUEST['password'];
	    $sql = "select email,password from user where email='{$email}' and password='{$password}'";
		$result = mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>=1){
			$_SESSION['usname'] = $email;
			echo "<script>alert('登录成功')</script>";
			header("Refresh:2;url=index.php");
		}else{
			echo "<script>alert('登录失败')</script>";
			header("Refresh:2;url=login.php");
		}
	mysqli_close($conn);
 ?>
