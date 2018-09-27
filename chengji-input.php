<?php
//先读取数据库中班级的班号，然后更新下拉列表，保证班号是更新的
include "conn.php";
$sql = "select 课程编号 from xuanxiu";
$result = mysqli_query($conn,$sql);
?>
<?php include "head.php" ?>
		<div class="sui-layout">
		  <div class="sidebar">
<?php include "leftmenu.php" ?>
		  </div>
		   <div class="content">
			<p class="sui-text-xxlarge my-padd">成绩信息录入</p>
			<form class="sui-form form-horizontal sui-validate" action="chengji-save.php" method="post">
				<!-- 技巧：增加一个隐藏的input，用来区分是新增记录还是修改记录 -->
				<input type="hidden" name="action" value="add">
			  <div class="control-group">
			    <label for="xueHao" class="control-label">学号：</label>
			    <div class="controls">
			    	<input type="text" id="xueHao" name="xueHao" class="input-large input-fat" placeholder="输入学生学号" data-rules="required|minlength=6|maxlength=6">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="courseHao" class="control-label">课程编号：</label>
			    <div class="controls">
			      <select name='courseHao' id='courseHao'>
			      <?php
					if( mysqli_num_rows($result) > 0 ){
						while ( $row = mysqli_fetch_assoc($result) ) {
							echo "<option value='{$row['课程编号']}'>{$row['课程编号']}</option>";
						}
					}else{
						echo "<option value=''>请先添加课程信息</option>";
					}
			       ?>
			      </select>
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="cjName" class="control-label">成绩：</label>
			    <div class="controls">
			      <input type="text" id="cjName" name="cjName" class="input-large input-fat"  placeholder="输入成绩" data-rules="required|minlength=2|maxlength=10">
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
	<?php include "foot.php"; ?>