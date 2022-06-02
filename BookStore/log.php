<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?
			session_start();
			include_once("conn.php");
			if(isset($_POST['logsend'])){
				if(trim($_POST['userid'])==""||trim($_POST['password'])==""){
					echo"<script>alert('账号密码不能为空，请重新输入！！');";
					echo"window.location.href='login.html';</script>";
				}else{
					$uid=trim($_POST["userid"]);
					$upwd=trim($_POST["password"]);
					
					$sqlS="SELECT password,nick,userType,tel FROM userInfo WHERE userId='".$uid."'";
					$r=mysqli_query($conn,$sqlS);
					$k=mysqli_num_rows($r);
					if($k>0){
						$s=mysqli_fetch_row($r);
						if($upwd!=$s[0]){
							echo"<script>alert('密码不正确，请重新输入！！');";
							echo"window.location.href='login.html';</script>";
						}else{
							$_SESSION['userid']=$uid;
							$_SESSION['password']=$s[0];
							$_SESSION['nick']=$s[1];
							$_SESSION['usertype']=$s[2];
							$_SESSION['tel']=$s[3];
							
							echo"<script>alert('登录成功，欢迎".$s[1]."光临本站！！');";
							echo"window.location.href='index.php';</script>";
						}
						
						
					}else{
						echo"<script>alert('登录失败，请重新登录！！');";
						echo"window.location.href='login.html';</script>";
					}
				}
			}
		
		?>
	</body>
</html>
