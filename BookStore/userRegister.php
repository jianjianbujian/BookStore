<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>用户注册</title>
		<style>
			form{
				width: 400px;
				height: 500px;
				border: 3px solid orange;
				margin: 40px auto;
				font-size: 25px;
				background-color: rgb(221,160,221);
			}
			form table tr td{
				width: 150px;
				height: 50px;
				/* border: 3px solid red; */
				text-align: center;
			}
			form table tr td:nth-child(2){
				width: 250px;
				height: 50px;
				text-align: left;
			}
			.toptr{
				text-align: center;
			}
			.button1{
				width: 60px;
				height: 40px;
				border-radius: 10px;
				margin: 20px 20px;
				background-color: rgb(150,255,150);
			}
			.button2{
				width: 60px;
				height: 40px;
				border-radius: 10px;
				margin: 20px 20px;
				background-color: rgb(255,150,150);
			}
			.button3{
				width: 60px;
				height: 40px;
				border-radius: 10px;
				margin: 20px 20px;
				background-color: rgb(150,150,255);
			}
		</style>
	</head>
	<body>
		
		<div class="">
			<form action="userReg.php" method="post">
				<table>
					<tr class="toptr">
						<td colspan="2"><h3>用 户 注 册</h3></td>
					</tr>
					<tr>
						<td>账&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;号:</td>
						<td><input type="text" name="userId"></td>
					</tr>
					<tr>
						<td>密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码:</td>
						<td><input type="password" name="password"></td>
					</tr>
					<tr>
						<td>确认密码:</td>
						<td><input type="password" name="repassword"></td>
					</tr>
					<tr>
						<td>昵&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;称:</td>
						<td><input type="text" name="nick"></td>
					</tr>
					<tr>
						<td>电&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;话:</td>
						<td><input type="tel" name="tel"></td>
					</tr>
					<tr class="toptr">
						<td colspan="2">
							<input class="button1" type="submit" value="注册"  name="usregsend" />
							<input class="button2" type="reset"  value="重置"/>
							<input class="button3" type="button" onclick="window.location.href='login.html'"  value="取消"/>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>
