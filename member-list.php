<?php
include "conn.php";
$sql = "select * from student";
$result = mysqli_query($conn,$sql)
?>
<?php include "head.php" ?>
		<div class="sui-layout">
		  <div class="sidebar">
			<?php include "leftmenu.php" ?>
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd label-success">学生信息管理！</p>
			<table class="sui-table table-bordered">
				 <thead>
				    <tr>
				      <th>id</th>
				      <th>邮件</th>
				      <th>名称</th>
				      <th>密码提示问题</th>
				      <th>操作</th>
				    </tr>
				  </thead>
				  <tbody>
					<?php
						$i = 0;
						if(mysqli_num_rows($result)>0){
							while($row = mysqli_fetch_assoc($result)){
								$i++;
								echo "<tr>";
								echo "<td>{$i}</td>";
								echo "<td><a class='sui-btn btn-small btn-warning' href='student-update.php?sid={$row['学号']}'>修改</a>&nbsp;&nbsp;
										  <a class='sui-btn btn-small btn-danger' href='student-del.php?sid={$row['学号']}'>删除</a>
											</td>";
								echo "</tr>";

							}
						}else{
							echo "<tr><td colspan='7'>暂无记录</td></tr>";
						}
					?>
				  </tbody>
			</table>
		  </div>
		</div>
	</div>
<?php include "foot.php" ?>