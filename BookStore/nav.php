<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<style>
			body{
				background: url(./images/background.jpg) repeat fixed center;
				color: white;
			}
			#top{
				height: 52px;
				/* border: 1px solid red; */
			}
			ul{
				height: 48px;
				width: 666px;
				border: 2px solid blueviolet;
				margin: 0px auto;
				background-color: #9AA4FF;
				margin-top: 30px;
				padding-left: 0px;
				
			}
			ul li{
				height: 48px;
				width: 85px;
				border-right: 2px solid blueviolet;
				float: left;
				list-style: none;
				text-align: center;
			}
			ul li img{
				height: 46px;
				width: auto;
				max-width: 100%;
				min-height: 98%;
				
			}
			ul li a{
				/* text-align: none; */
				display: block;
				margin-top: 15px;
				text-decoration: none;
			}
			#hy{
				/* clear: both; */
				height: 20px;
				width: 120px;
				/* border: 1px solid black; */
				display: block;
				float: right;
				/* text-align: right; */
				/* margin: 2px auto; */
				padding-top: 15px;
			}
		</style>
	</head>
	<body>
	<?
	session_start();
	include_once("conn.php");
	?>
		<div id="top">
			<div id="nav">
				<ul>
					<li style="background-color: white;border-left: 1px solid blueviolet;"><img src="images/logo.jpg"></li>
					<li><a href="index.php">首页</a></li>
					<li><a href="searchInput.php">搜索</a></li>
					<li><a href="userInfo.php">个人中心</a></li>
					<?
						if(isset($_SESSION['usertype'])){
							if($_SESSION["usertype"]==1){
								echo"<li><a href=bookRegister.php>添加书籍</a></li>";
							}
							if($_SESSION["usertype"]==0){
								echo"<li><a href=shoppingCart.php>购物车</a></li>";
							}
						}
						
						if(empty($_SESSION['nick'])){
							echo"<li><a href=login.html>登录</a></li>";
						}else{
							echo"<li><a href=zhuxiao.php>注销</a></li>";
						}
					?>
					<div id="hy">
						<span>
							<?
								if(isset($_SESSION['nick'])){
									echo"<font style='color:red'>你好，".$_SESSION['nick']."</font>";
								}
							?>
						</span>
					</div>
				</ul>
				
				
				
			</div>
			
		</div>
	</body>
</html>
