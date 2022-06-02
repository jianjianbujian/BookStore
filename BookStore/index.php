<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<style>
		
			div{
				text-align: center;
			}
			#bookShow{
				width: 666px;
				height: 520px;
				border: 2px solid blueviolet;
				margin: 0px auto;
			}
			#fc{
				width: 550px;
				height: 70px;
				/* border: 1px solid red; */
				clear: both;
				margin: 0px auto;
			}
			#fc a{
				width: 48px;
				height: 30px;
				display: block;
				float: left;
				margin: 13px auto;
			}
			table{
				width: 122px;
				height: 260px;
				margin: 0px 20px;
				font-size: 10px;
				float: left;
			}
			.t a{
				text-decoration: none;
			}
			.footul{
				width: 300px;
				height: 48px;
				border: 1px solid rgba(255,255,255,0.01);
				background-color: rgba(255,255,255,0.01);
			}
			.footul li{
				width: 48px;
				height: 48px;
				border-radius: 50%;
				float: left;
				text-align: center;
				margin-left: 5px;
				background-color: darksalmon;
			}
		</style>
	</head>
	<body>
		<html>
			<head>
				<meta charset="utf-8">
				<title></title>
				<style>
					
				</style>
			</head>
			<body>
				<?
				include("nav.php");
				?>
				<div id="content">
					<?
						//include("conn.php");
						$pageNo=1;
						if(isset($_GET['page'])){
							$pageNo=$_GET['page'];
						}
						
						$sqls="select * from bookinfo";
						$r=mysqli_query($conn,$sqls);
						if(!$r||mysqli_num_rows($r)==0){
					?>
					<span>数据库里没有书籍信息</span>
					<?
						return;
						}
						$bookNum=mysqli_num_rows($r);
						$pageNum=ceil($bookNum/8);
						$bs=($pageNo-1)*8;
						$sqls2="select * from bookinfo limit ".$bs.",8";
						$r=mysqli_query($conn,$sqls2);
					?>
					<div id="bookShow">
						<?
							while($s=mysqli_fetch_array($r)){
						?>
							<table>
								<tr>
									<td>
										<? echo "<a href='bookinfo.php?bookid=".$s['bookID']."'>
										<img src='images\\".$s[5]."' width='120' height='170' /></a>" ?>
									</td>
								</tr>
								<tr>
									<td><? echo $s['bookName'] ?></td>
								</tr>
							</table>
						<?
							}
						?>
					</div>
					<div id="foot"> 
						<div id="fc">
							<ul class="footul" >
							<?
								if($pageNum!=1){
									echo"<li><a href='?page=1'>首页</a></li>";
								}
								for($i=1;$i<=$pageNum;$i++){
									echo"<li><a href='?page=".$i."'>".$i."</a></li>";
								}if($pageNum!=1){
									echo"<li><a href='?page=".$pageNum."'>尾页</a></li>";
								}
							?>
							</ul>
						</div>
					</div>
				</div>
			</body>
		</html>
	</body>
</html>
