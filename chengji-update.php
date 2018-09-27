<?php
//先读取数据库中成绩的学号，然后更新下拉列表，保证班号是更新的
include "conn.php";
$sql = "select 学号 from xuanxiu";
$result = mysqli_query($conn,$sql);

//先读取该学号对应的学生信息
$kid = $_REQUEST['kid'];
$sql2 = "select * from xuanxiu where 学号='{$kid}'";
$result2 = mysqli_query($conn,$sql2);
if(mysqli_num_rows($result2)>0){
	//将查询结果转换成数组
	/*while ($row = mysqli_fetch_assoc($result2)) {

	}*/
	//因为确认只有一条记录，因此可不用while循环
	$row = mysqli_fetch_assoc($result2);
}else{
	echo "找不到该学生信息，请坚持是否正确";
}
?>
<?php include "head.php" ?>
		<div class="sui-layout">
		  <div class="sidebar">
<?php include "leftmenu.php" ?>
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">学生信息修改</p>
			<form id="form1" action="chengji-save.php" method="post" class="sui-form form-horizontal sui-validate">
				<!-- 技巧：增加一个隐藏的input，用来区分是新增记录还是修改记录 -->
				<input type="hidden" name="action" value="update">
				<!-- 增加一个隐藏的input，用来保存id,执行修改操作时根据id修改记录 -->
				<input type="hidden" name="kid" value="<?php echo $row['学号'];?>">
			  <div class="control-group">
			    <label for="xueHao" class="control-label">学号：</label>
			    <div class="controls">
					<input type="text" id="xueHao" name="xueHao" value="<?php echo $row['学号'];?>" class="input-large input-fat" placeholder="输入学生学号" data-rules="required|minlength=6|maxlength=6">
			    </div>
			  </div>
			   <div class="control-group">
			    <label for="courseHao" class="control-label">课程编号：</label>
			    <div class="controls">
			      <input type="text" id="courseHao" name="courseHao" value="<?php echo $row['课程编号'];?>" class="input-large input-fat" placeholder="输入学生学号" data-rules="required|minlength=6|maxlength=6">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="cjName" class="control-label">成绩：</label>
			    <div class="controls">
			      <input type="text" value="<?php echo $row['成绩'] ?>" id="cjName" name="cjName" class="input-large input-fat" placeholder="输入姓名">
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