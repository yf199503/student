<?php
include "conn.php";
$sql = "select 班号 from banji";
$result = mysqli_query($conn,$sql);

//先读取该学号对应的学生信息
$kid = $_REQUEST['kid'];
$sql2 = "select * from banji where 班号='{$kid}'";
$result2 = mysqli_query($conn,$sql2);
if(mysqli_num_rows($result2)>0){
	//将查询结果转换成数组
	//while($row = mysqli_fetch_assoc($result2)){
	//}
	//因为确认只有一条记录，因此可不用while循环
	$row = mysqli_fetch_assoc($result2);
}else{
	echo "找不到该学生信息，请坚持学号是否正确";
}
?>
<?php include "head.php" ?>
		<div class="sui-layout">
		  <div class="sidebar">
<?php include "leftmenu.php" ?>
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">班级信息修改</p>
			<form id="form1" action="banji-save.php" method="post" class="sui-form form-horizontal sui-validate">
				<!-- 增加一个隐藏的input，用来区分新增加还是修改数据 -->
			    	<input type="hidden" name="action" value="update">
			    	<!-- 增加一个隐藏的input，保存编写的 -->
			    	<input type="hidden" name="kid" value="<?php echo $row['班号'] ?>">
			  <div class="control-group">
			    <label for="banhao" class="control-label">班号：</label>
			    <div class="controls">

			      <input type="text" value="<?php echo $row['班号'] ?>" id="banhao" name="banhao" class="input-large input-fat" placeholder="输入班号" data-rules="required|minlength=2|maxlength=10">
			    </div>
			  </div>
			   <div class="control-group">
			    <label for="banzhang" class="control-label">班长：</label>
			    <div class="controls">
			      <input type="text" value="<?php echo $row['班长'] ?>" id="banzhang" name="banzhang" class="input-large input-fat" placeholder="输入班长姓名">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="jiaoshi" class="control-label">教室：</label>
			    <div class="controls">
			      <input type="text" value="<?php echo $row['教室'] ?>" id="jiaoshi" name="jiaoshi" class="input-large input-fat" placeholder="输入班长姓名">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="banzhuren" class="control-label">班主任：</label>
			    <div class="controls">
			      <input type="text" value="<?php echo $row['班主任'] ?>" id="banzhuren" name="banzhuren" class="input-large input-fat" placeholder="输入教室">
			    </div>
			  </div>
			   <div class="control-group">
			    <label for="slogan" class="control-label">班级口号：</label>
			    <div class="controls">
			      <input type="text" value="<?php echo $row['班级口号'] ?>" id="slogan" name="slogan" class="input-large input-fat" placeholder="输入班级口号">
			    </div>
			  </div>
			  <div class="control-group">
			  	<label class="control-label"></label>
			  	<div class="controls">
			  		<input type="submit" value="提交" name="" class="sui-btn btn-large btn-primary">
			  	</div>
			  </div>
			</form>
		  </div>
		</div>
			<!-- 页脚 -->
	<?php include("foot.php"); ?>
