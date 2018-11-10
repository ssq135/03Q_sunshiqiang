<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加表单</title>
</head>
<body>
<center>
<h2>添加</h2>
	<form enctype="multipart/form-data" action="do_add.php" method='POST'>
		<table> 
			<tr>
				<td>姓名</td>
				<td><input type="text" name="c_name"></td>
			</tr>
			<tr>
				<td>年龄</td>
				<td><input type="text" name="c_age"></td>
			</tr>
			<!-- <tr>
				<td>新闻内容</td>
				<td><input type="text" name="u_tel"></td>
			</tr>
			<tr>
				<td>新闻时间</td>
			</tr> -->
			<tr>
				<td>头像</td>
				<td><input type="file" name="file"></td>
			</tr> 
			<tr>
				<td colspan="2" ><input type="submit" value="添加"></td>
				
			</tr>
		</table>
	</form>
	</center>
</body>
</html>



