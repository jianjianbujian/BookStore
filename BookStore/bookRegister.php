<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>注册书籍</title>
		<style>
			form{
				width: 400px;
				height: 500px;
				border: 3px solid orange;
				margin: 40px auto;
				font-size: 25px;
				background-color: skyblue;
			}
			form table tr td{
				width: 400px;
				height: 50px;
			}
			.toptr{
				text-align: center;
			}
			form table tr td textarea{
				width: 300px;
				height: 100px;
			}
			.button1{
				width: 60px;
				height: 40px;
				border-radius: 10px;
				margin-right: 20px;
				background-color: rgb(150,255,150);
			}
			.button2{
				width: 60px;
				height: 40px;
				border-radius: 10px;
				margin-left: 20px;
				background-color: rgb(255,150,150);
			}
		</style>
	</head>
	<body>
		<?
		include("nav.php");
		?>
		<div class="">
			<form action="bookReg.php" method="post" enctype="multipart/form-data">
				<table>
					<tr class="toptr">
						<td colspan="2"><h3>添  加  书  籍</h3></td>
					</tr>
					<tr>
						<td>书名:</td>
						<td><input type="text" name="bookName"></td>
					</tr>
					<tr>
						<td>封面:</td>
						<td><input type="file" name="bookImage"></td>
					</tr>
					<tr>
						<td>作者:</td>
						<td><input type="text" name="author"></td>
					</tr>
					<tr>
						<td>单价:</td>
						<td><input type="text" name="bookPrice"></td>
					</tr>
					<tr>
						<td>简介:</td>
						<td><textarea name="bookIntroduce"></textarea></td>
					</tr>
					<tr class="toptr">
						<td colspan="2">
							<input class="button1" type="submit" value="添加"  name="regsend" />
							<input class="button2" type="reset"  value="重置"/>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>
