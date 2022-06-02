<?
		header("Content-type:text/html;charset=utf-8");
		include_once("conn.php");
		if(isset($_POST['usregsend'])){
			function ck(){
				if(empty($_POST['userId'])){
					echo"<script>alert('账号不能为空！！');";
					echo"window.location.href='userRegister.php';</script>";
					return false;
				}elseif(empty($_POST['password'])){
					echo"<script>alert('密码不能为空！！');";
					echo"window.location.href='userRegister.php';</script>";
					return false;
				}elseif(empty($_POST['repassword'])){
					echo"<script>alert('请确认密码！！');";
					echo"window.location.href='userRegister.php';</script>";
					return false;
				}
				elseif(empty($_POST['nick'])){
					echo"<script>alert('请输入昵称！！');";
					echo"window.location.href='userRegister.php';</script>";
					return false;
				}
				elseif(empty($_POST['tel'])){
					echo"<script>alert('请输入电话号码！！');";
					echo"window.location.href='userRegister.php';</script>";
					return false;
				}
				elseif(($_POST['password'])!=($_POST['repassword'])){
					echo"<script>alert('两次密码不相同，请重新输入！！');";
					echo"window.location.href='userRegister.php';</script>";
					return false;
				}else{
					return true;
				}
			}
			
			if(ck()){
				$userId=$_POST['userId'];
				$upwd=$_POST['password'];
				$nick=$_POST['nick'];
				$tel=$_POST['tel'];
				
				$sqlname="select * FROM userinfo where userId='".$userId."'";
				$res=mysqli_query($conn,$sqlname);
				$pass=mysqli_num_rows($res);
				if($pass>0){
					echo"<script>alert('该用户注册，请重新输入！');";
					echo"window.location.href='userRegister.php';</script>";
				}else{
					$inSql="INSERT INTO userinfo(userId,password,nick,tel) 
					VALUES('".$userId."','".$upwd."','".$nick."','".$tel."')";
					$r=mysqli_query($conn,$inSql);
					if($r){
						echo"<script>alert('注册成功!');";
						echo"window.location.href='login.html';</script>";
					}else{
						echo"<script>alert('注册失败 ，请重新注册!');";
						echo"window.location.href='userRegister.php';</script>";
					}
				}
			}
		}
		?>
