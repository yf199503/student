<?php include("head2.php"); ?>
	<form class="sui-form form-horizontal sui-validate"  id="form1" action="login-save.php" method="post">

		  <div class="control-group">
		    <label for="email" class="control-label .input-fat">邮箱：</label>
		    <div class="controls">
		      <input type="text" id="email" name="email" placeholder="请输入邮箱" class="input-fat input-large" name="mali" data-rules="required|minlength=2|maxlength=30">
		    </div>
		  </div>
		  <div class="control-group">
		    <label for="password" class="control-label">密码：</label>
		    <div class="controls">
		      <input type="password" id="password" placeholder="请输入密码	" class="input-fat input-large" placeholder="密码" name="password" data-rules="required|minlength=4|maxlength=15">
		    </div>
		  </div>
		<div class="control-group">
		    <label for="Code" class="control-label">验证码：</label>
		    <div class="controls">
		      <input type="input" id="Code" placeholder="请输入验证码" class="input-fat input-large" name="Code" data-rules="required|minlength=4|maxlength=4">
		    </div>

		  </div>
		  <input type="text" id="code_btn" value="<?php
			    function GetfourStr($len)
			    {
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
			      for ($i=0; $i<$len; $i++)
			      {
			        $outputstr .= $chars_array[mt_rand(0, $charsLen)];
			      }
			      return $outputstr;
			    }
			    echo GetfourStr(4);
			  ?>" >

		  <div class="control-group">
		    <label class="control-label"></label>
		    <div class="controls">
		      <button type="submit" class="sui-btn btn-primary" id="cha">提交</button>
		    </div>
		  </div>
		  <div class="control-group">
		    <label class="control-label"></label>
		    <div class="controls">
		      <a href="forget.php">忘记密码</a>
		    </div>
		  </div>
		</form>
		<div class="pp">登录成功</div>
		<div class="cc">密码错误</div>
		<div class="yy">邮箱错误</div>
<?php include("foot2.php") ?>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script>
//给提交按钮绑定事件
$("button[type=submit]").on("click",function(){
	//使用$.ajax()提交数据
	$.ajax({
		url:"login-save-ajax.php",
		type:"POST",
		data:$("#form1").serialize(),
		dataType: "json",
		beforeSend:function(XMLHttpRequest){
			//发送前调用此函数。一般在此编写检测代码或者loading
		},
		complete:function(XMLHttpRequest,textStatus){
			//请求完成后调用此函数(请求成功或失败都调用)
		},
		success:function(data,textStatus){
			//请求成功后调用此函数
			console.log(data);
			if(data.code == 200 ){
				$(".pp").slideDown(2000,function(){
					window.location.href="index.php";
				});
				// $(".pp").animate({"height":"100px","display":"block"},function(){
				// 	window.location.href="index.php";
				// })
			}
			if(data.code == 20001){
				//提示密码错误
				$(".cc").fadeTo(2000,1,function(){
				    window.location.href="login.php";
				});
				// alert("密码错误");
			}
			if(data.code == 20004){
				//提示邮箱填写错误
				$(".yy").slideDown(2000,function(){
				    window.location.href="login.php";
				});
				// alert("邮箱填写错误");
			}
		},
		error:function(XMLHttpRequest,textStatus,errorThrown){
			//请求失败后调用此函数
			console.log("失败原因："+errorThrown);
		}
	});
	return false;
})
</script>