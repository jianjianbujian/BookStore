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
				width: 80px;
				height: 50px;
				border: 1px solid red;
				padding-left: 50px;
			}
			.bodydiv form table{
				margin: 0px auto;
				
			}
			.bodydiv{
				width: 400px;
				height: 400px;
				/* border: 1px solid black; */
				margin: 0 auto;
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
		<div class="bodydiv">
			<form method="post" action="">
				<table>
					<font class="fonttop">修改个人信息：</font><br>
					<tr>
						<td>账号：</td>
						<td style="padding-right: 30px;"><? echo $_SESSION['userid'] ; ?></td>
					</tr>
					<tr>
						<td>密码：</td>
						<td style="padding-right: 30px;"><input type="text" name="xgpwd" value="<? echo $_SESSION['password'] ; ?>" ></td>
					</tr>
					<tr>
						<td>昵称：</td>
						<td style="padding-right: 30px;"><input type="text" name="xgnick" value="<? echo $_SESSION['nick'] ; ?>"></td>
					</tr>
					<tr>
						<td>电话：</td>
						<td style="padding-right: 30px;"><input type="text" name="xgtel" value="<? echo $_SESSION['tel'] ; ?>"></td>
					</tr>
					<tr>
						<td colspan="2" style="padding-left: 100px;">
							<input class="button1" type="submit" value="修改" name="xgsend"/>
							<input class="button2" type="reset" value="取消" onclick="window.location.href='userInfo.php'" />
						</td>
					</tr>
				</table>
			</form>
		</div>
		<?
			if(isset($_POST['xgsend'])){
				function ck(){
					if(empty($_POST['xgpwd'])){
						echo"<script>alert('密码不能为空！！');";
						echo"window.location.href='userInfo.php';</script>";
						return false;
					}elseif(empty($_POST['xgnick'])){
						echo"<script>alert('昵称不能为空！！');";
						echo"window.location.href='userInfo.php';</script>";
						return false;
					}
					elseif(empty($_POST['xgtel'])){
						echo"<script>alert('电话号码不能为空！！');";
						echo"window.location.href='userInfo.php';</script>";
						return false;
					}
					else{
						return true;
					}
				}
				
				if(ck()){
					$userId=$_SESSION['userid'];
					$upwd=$_POST['xgpwd'];
					$nick=$_POST['xgnick'];
					$tel=$_POST['xgtel'];
					
						$inSql="update userinfo set password='".$upwd."',nick='".$nick."',tel='".$tel."' where userId='".$userId."'";
						$r=mysqli_query($conn,$inSql);
						if($r){
							echo"<script>alert('修改成功!');";
							echo"window.location.href='login.html';</script>";
						}else{
							echo"<script>alert('修改失败 ，请重新修改!');";
							echo"window.location.href='userInfo.php';</script>";
						}
					}
				}
			
		?>
	</body>
</html>

