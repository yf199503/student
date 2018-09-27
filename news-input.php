<?php
//先读取数据库中班级的班号，然后更新下拉列表，保证班号是更新的
include "conn.php";
$sql = "select * from newscolumn ";
$result = mysqli_query($conn,$sql);
?>
<?php include "head.php" ?>
		<div class="sui-layout">
		  <div class="sidebar">
<?php include "leftmenu.php" ?>
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">新闻发布模块</p>
			<form class="sui-form form-horizontal sui-validate" action="news-save.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="action" value="add">
			  <div class="control-group">
			    <label for="title" class="control-label">标题：</label>
			    <div class="controls">
			      <input type="text" id="title" name="title" class="input-large input-fat" placeholder="输入标题" data-rules="required|minlength=2|maxlength=10">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="jtNum" class="control-label">肩题：</label>
			    <div class="controls">
			      <input type="text" id="jtNum" name="jtNum" class="input-large input-fat"  placeholder="输入肩题" data-rules="required|minlength=2|maxlength=10">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="column" class="control-label">栏目：</label>
			    <div class="controls">
			      <select id="column" name="column">
			      		<?php
			      			if(mysqli_num_rows($result)>0){
			      				while($row = mysqli_fetch_assoc($result)){
			      					echo "<option value='{$row['id']}'>{$row['name']}</option>";
			      				}
			      			}else{
			      				echo "<option>暂无作者信息</option>";
			      			}
			      		?>
			      </select>
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="authors" class="control-label">作者：</label>
			    <div class="controls">
			    	<input type="hidden" id="userid" value="<?php echo $_SESSION['usid']?>">
			      <input type="text" id="authors" name="authors" class="input-large input-fat"  placeholder="输入肩题" data-rules="required|minlength=2|maxlength=10" value="<?php echo $_SESSION['usname']?>" readonly>
			    </div>
			  </div>
			  <div class="control-group">
			  	<label for="fbTime" class="control-label">发布时间：</label>
			  	<div class="controls">
			  		<input type="text" id="fbTime" name="fbTime" class="input-fat input-large" placeholder="输入时间" data-toggle="datepicker">
			  	</div>
			  </div>
			  <div class="control-group">
			  	<label for="file" class="control-label">照片：</label>
			  	<div class="controls">
					<input type="file" name="file" id="file">
			  	</div>
			  </div>


			  <div class="control-group">
			    <label for="content" class="control-label v-top">内容：</label>
			    <div class="controls">
			      <textarea id="content" name="content" placeholder="内容" data-rules="required"></textarea>
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
	</div>
<?php include "foot.php" ?>