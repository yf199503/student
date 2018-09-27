
<?php include "head.php" ?>
	<div class="sui-layout">
		  <div class="sidebar">
 			<!--左菜单-->
		    <?php include("leftmenu.php") ?>
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">班级列表</p>
			<table class="sui-table table-primary">
				<tr><th>班号</th><th>班长</th><th>教室</th><th>班主任</th><th>班级口号</th><th>操作</th></tr>
				<?php
					/*//输出数据
					// var_dump($result);
					if (mysqli_num_rows($result)>0) {
						//mysqli_fetch_assoc() 从结果集中取得一行作为关联数组，如果结果集中没有更多行则返回空
						while($row = mysqli_fetch_assoc($result))
							echo "<tr>
									<td>{$row["班号"]}</td>
									<td>{$row["班长"]}</td>
									<td>{$row["教室"]}</td>
									<td>{$row["班主任"]}</td>
									<td>{$row["班级口号"]}</td>
									<td><a class='sui-btn btn-warning btn-small sui-icon icon-pencil' href='banji-update.php?kid={$row['班号']}'>修改</a>&nbsp;&nbsp;
										<a class='sui-btn btn-small btn-danger' href='banji-del.php?kid={$row['班号']}'>删除</a></td>
								</tr>";
						}else{
						echo "没有记录";
					}*/
					 ?>
			</table>
		  </div>
		</div>
	<?php include("foot.php") ?>
	<script>
		$(function(){
			$.ajax({
				url:"api.php",
				type:"POST",
				dataType:"json",
				data:{
					"action":"banji"
				},
				beforeSend:function(XMLHttpRequest){
					$("#studentlist").html("<tr><td>正在查询，请稍后...</td></tr>");
				},
				success:function(data,textStatus){
					console.log(data.data);
					if(data.code == 200){

						for(var i = 0; i <data.data.length;i++ ){
							console.log(data.data[i]);
							 fun(data.data[i]);
						}
						$("#studentlist").html(str);
					}
				},
				error:function(XMLHttpRequest,textStatus,errorThrown){
					//请求失败后调用此函数
					console.log("失败原因："+errorThrown);
				}
			})
		})
	</script>