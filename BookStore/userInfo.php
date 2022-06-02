<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<?
			include_once("nav.php");
			if(!isset($_SESSION['userid'])){
				echo"<script>alert('您还没有登录或登录超时，请重新登录!');";
				echo"window.location.href='login.html';</script>";
			}
			// $uid=$_GET['userID'];
			// $sqlS="SELECT * from userinfo where userId='".$uid."'";
			// $r=mysqli_query($conn,$sqlS);
			// $s=mysqli_fetch_row($r);
		?>
		<style>
			.fonttop{
				font-size: 40px;
				font-weight: bold;
				display: block;
				margin-left: 50px;
			}
			form{
				margin: 40px auto;
				border: 1px solid black;
			}
			.bodydiv form table tr td{
				width: 170px;
				height: 50px;
				border: 1px solid coral;
				/* padding-left: 50px; */
			}
			.bodydiv form table{
				/* height: 500px; */
				margin: 0px auto;
				margin-bottom: 40px;
				text-align: center;
			}
			.bodydiv{
				width: 400px;
				height: 400px;
				/* border: 1px solid black; */
				margin: 0 auto;
			}
			.button1{
				width: 80px;
				height: 40px;
				border-radius: 10px;
				margin-right: 20px;
				background-color: rgb(150,255,150);
			}
			.button2{
				width: 80px;
				height: 40px;
				border-radius: 10px;
				margin-left: 20px;
				background-color: rgb(255,150,150);
			}
		</style>
	</head>
	<body>
		<?
			// include("nav.php");
			//session_start();
		?>
		<div class="bodydiv">
			<form method="post" action="">
				<table>
					<font class="fonttop">用户个人信息：</font><br>
					<tr>
						<td>账号：</td>
						<td><? echo $_SESSION['userid'] ; ?></td>
					</tr>
					<tr>
						<td>密码：</td>
						<td><? echo $_SESSION['password'] ; ?></td>
					</tr>
					<tr>
						<td>昵称：</td>
						<td><? echo $_SESSION['nick'] ; ?></td>
					</tr>
					<tr>
						<td>电话：</td>
						<td><? echo $_SESSION['tel'] ; ?></td>
					</tr>
					<tr>
						<td colspan="2" style="padding-top: 20px;padding-bottom: 20px;">
							<input class="button1" type="button" value="修改信息" onclick="window.location.href='editUser.php'"/>
							<input class="button2" type="button" value="删除账号" onclick="window.location.href='delUserInfo.php'"/>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>
