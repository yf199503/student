<!-- 页头 -->
<?php include("head.php") ?>
<?php
include "conn.php";
//先读取该学号对应的学生信息
$kid = $_REQUEST['kid'];
$sql2 = "select * from kecheng where 课程编号='{$kid}'";
$result2 = mysqli_query($conn,$sql2);
if(mysqli_num_rows($result2)>0){
	//将查询结果转换成数组
	/*while ($row = mysqli_fetch_assoc($result2)) {

	}*/
	//因为确认只有一条记录，因此可不用while循环
	$row = mysqli_fetch_assoc($result2);
}else{
	echo "找不到该课程信息，请坚持课程是否正确";
}
?>
	<div class="sui-layout">
		  <div class="sidebar">
			<!-- 左菜单 -->
			<?php include("leftmenu.php"); ?>
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">课程修改</p>
			<form id="form1" action="kecheng-save.php" method="post" class="sui-form form-horizontal sui-validate">
			  <div class="control-group">
			    <label for="kcName" class="control-label">课程名：</label>
			    <div class="controls">
			    	<!-- 增加一个隐藏的input，用来区分新增加还是修改数据 -->
			    	<input type="hidden" name="action" value="update">
			    	<!-- 增加一个隐藏的input，保存编写的 -->
			    	<input type="hidden" name="kid" value="<?php echo $row['课程编号'] ?>">
			      <input type="text" value="<?php echo $row['课程名'] ?>" id="kcName" name="kcName" class="input-large input-fat" placeholder="输入课程名称" data-rules="required|minlength=2|maxlength=10">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="kcTime" class="control-label">课程时间：</label>
			    <div class="controls">
			      <input type="text" value="<?php echo $row['时间'] ?>" id="kcTime" name="kcTime" class="input-large input-fat"  data-toggle="datepicker" placeholder="输入课程时间">
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