<?php
include "conn.php";
$sql = "select * from xuanxiu";
$result = mysqli_query($conn,$sql);
?>
<?php include "head.php" ?>
		<div class="sui-layout">
		  <div class="sidebar">
 			<!--左菜单-->
		    <?php include("leftmenu.php") ?>
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">成绩列表</p>
			<table class="sui-table table-primary">
				<tr>
					<th>学号</th>
					<th>课程编号</th>
					<th>成绩</th>
					<th>操作</th>
				</tr>
				<?php
					//输出数据
					// var_dump($result);
					if (mysqli_num_rows($result)>0) {
						//mysqli_fetch_assoc() 从结果集中取得一行作为关联数组，如果结果集中没有更多行则返回空
						while($row = mysqli_fetch_assoc($result))
							echo "<tr>
									<td>{$row["学号"]}</td>
									<td>{$row["课程编号"]}</td>
									<td>{$row["成绩"]}</td>
									<td><a class='sui-btn btn-warning btn-small sui-icon icon-pencil' href='chengji-update.php?kid={$row['学号']}'>修改</a>&nbsp;&nbsp;
										<a class='sui-btn btn-small btn-danger' href='chengji-del.php?kid={$row['学号']}'>删除</a></td>
								</tr>";
						}else{
						echo "没有记录";
					}
					 ?>
			</table>
		  </div>
		</div>
	<?php include("foot.php") ?>