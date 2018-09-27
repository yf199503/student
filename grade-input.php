<?php
include "conn.php";
	$sql = "select distinct 课程编号 from kecheng";
	$sql1 = "select distinct 学号 from student";
	$result = mysqli_query($conn, $sql);
	$result1 = mysqli_query($conn, $sql1);
?>
<?php include "head.php" ?>
	<div class="sui-layout">
	  <div class="sidebar">
		<!-- 左菜单 -->
		<?php include("leftmenu.php"); ?>
	  </div>
	  <div class="content">
		<p class="sui-text-xxlarge my-padd">成绩查询</p>
		<form class="sui-form form-horizontal sui-validate" action="grade-save.php" method="post">
			<!-- 技巧：增加一个隐藏的input，用来区分是新增记录还是修改记录 -->
			<input type="hidden" name="action" value="add">
		  <div class="control-group">
		    <label for="xmName" class="control-label">姓名：</label>
		    <div class="controls">
		       <div class="controls">
		      <input type="text" id="xmName" name="xmName" class="input-large input-fat"  placeholder="输入姓名" data-rules="required|minlength=2|maxlength=10">
		    </div>
		  </div>
		  </div>
		  <div class="control-group">
		    <label for="xhName" class="control-label">学号：</label>
		    <div class="controls">
		      <input type="text" id="xhName" name="xhName" class="input-large input-fat"  placeholder="输入学号" data-rules="required|minlength=2|maxlength=10">
		    </div>
		  </div>
		   <div class="control-group">
		    <label for="kcmName" class="control-label">课程名：</label>
		    <div class="controls">
		      <input type="text" id="kcmName" name="kcmName" class="input-large input-fat"  placeholder="输入课程名" data-rules="required|minlength=2|maxlength=10">
		    </div>
		  </div>
		  <div class="control-group">
		  	<label class="control-label"></label>
		  	<div class="controls">
		  		<input type="submit" value="查询" name="" class="sui-btn btn-large btn-primary">
		  	</div>
		  </div>
		</form>
	  </div>
	</div>
	<!-- 页脚 -->
<?php include("foot.php"); ?>