<?php include "head2.php" ?>
		<form class="sui-form form-horizontal sui-validate" action="register-save.php" method="post">
			 <div class="control-group">
			    <label for="email" class="control-label">邮箱：</label>
			    <div class="controls">
			      <input type="text" id="email" placeholder="请输入邮箱" data-rules="required|email" name="email"><span id="tips" style="color:red;"></span>
			    </div>
			  </div>
			   <div class="control-group">
			    <label for="name" class="control-label">姓名：</label>
			    <div class="controls">
			      <input type="text" id="name" placeholder="请输入用户名" data-rules="required" name="name">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="password" class="control-label">密码：</label>
			    <div class="controls">
			      <input type="password" id="password" placeholder="请输入密码" data-rules="required|minlength=8|maxlength=16" name="password">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="repassword" class="control-label">重复密码：</label>
			    <div class="controls">
			      <input type="password" id="repassword" placeholder="请输入重复密码" data-rules="required|match=password" name="repassword">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="Code" class="control-label">验证码：</label>
			    <div class="controls">
			      <input type="input" id="Code" placeholder="请输入验证码" class="input-fat input-large" name="Code" data-rules="required|minlength=4|maxlength=4">
			    </div>
			  </div>
			  <input type="text" id="code_btn" value=" <?php
				function GetfourStr($len){
				  $chars_array = array(
				    "0", "1", "2", "3", "4", "5", "6", "7", "8", "9",
				    "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k",
				    "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v",
				    "w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G",
				    "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R",
				    "S", "T", "U", "V", "W", "X", "Y", "Z",
				  );
				  $charsLen = count($chars_array) - 1;

				  $outputstr = "";
				  for ($i=0; $i<$len; $i++){
				    $outputstr .= $chars_array[mt_rand(0, $charsLen)];
				  }
				  return $outputstr;
				}
				echo GetfourStr(4);
				?> ">
			   <div class="control-group">
			    <label for="question" class="control-label">密码提示问题：</label>
			    <div class="controls">
			     <select id="question" name="question">
						<option value="你的小学在哪上学">你的小学在哪上学</option>
						<option value="你的最好朋友的姓名">你的最好朋友的姓名</option>
						<option value="你最有纪念意义的日期">你最有纪念意义的日期</option>
			     </select>
			    </div>
			  </div>
				<div class="control-group">
				    <label for="answer " class="control-label .input-fat">密码答案：</label>
				    <div class="controls">
				      <input type="text" id="answer" placeholder="请输入密码答案" class="input-fat input-large" name="answer" data-rules="required|minlength=2|maxlength=15">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label"></label>
				    <div class="controls">
				      <button type="submit" class="sui-btn btn-primary" id="cha">提交</button>
				    </div>
				  </div>
		</form>
		<div class="pp">注册成功</div>
<?php include "foot2.php" ?>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script>
var email = document.getElementById('email');
$("input[name=email]").on("blur",function(){
	if(window.XMLHttpRequest){
		var xhr = new XMLHttpRequest();
	}else{
		var xhr = new ActiveObject("Msxml2.XMLHTTP");
	}

	xhr.onreadystatechange = function(){
		if(xhr.readyState == 3){
			console.log("正在处理中，请稍后...");
		}
		if(xhr.readyState == 4){
			if(xhr.status == "200"){
				console.log("请求完成，准备好了");
				console.log(xhr.responseText);
				if(xhr.responseText == "ok"){
					$("#tips").html("可以注册");
				}else{
					$("#tips").html("邮箱重复");
				}
			}
			if(xhr.status == "404"){
				console.log("网页被外星人劫持!");
			}
		}
	}
	xhr.open("get","conn1.php?email="+encodeURIComponent(email.value),true);
	xhr.send(null);
})

$("#cha").on("click",function(){
	if(window.XMLHttpRequest){
		var xhr = new XMLHttpRequest();
	}else{
		var xhr = new ActiveObject("Msxml2.XMLHTTP");
	}
	xhr.onreadystatechange = function(){
		if(xhr.readyState == 3){
			console.log("正在处理中，请稍后...");
		}
		if(xhr.readyState == 4){
			console.log(xhr.responseText);
			if(xhr.status == "200"){
				console.log("请求完成，准备好了");

				if(xhr.responseText == "ok"){
					alert("注册成功");
					window.location.href = "login.php";
				}else{
					alert("注册失败");
					window.location.href = "register.php";
				}
			}
			if(xhr.status == "404"){
				console.log("网页被外星人劫持!");
			}
		}
	}
	xhr.open("post","conn1.php",true);
	xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	xhr.send("email="+encodeURIComponent(email.value));
})
</script>


