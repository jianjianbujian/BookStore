<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<?
			include("nav.php");
		?>
		<style>
			div{
				text-align: center;
			}
			#bookShow{
				width: 666px;
				height: 520px;
				border: 2px solid blueviolet;
				margin: 0 auto;
			}
			#fc{
				clear: both;
				width: 300px;
				margin: 50px auto;
			}
			#fc a{
				display: block;
				float: left;
				text-decoration: none;
				margin: 0px 3px;
			}
			table{
				width: 122px;
				height: 260px;
				margin: 0px 18px;
				font-size: 10px;
				float: left;
			}
			.fc a{
				
			}
			#ssjg span{
				color: red;
			}
			
			.ssfoot{
				width: 300px;
				height: 48px;
				border: 1px solid red;
				border: 1px solid rgba(255,255,255,0.01);
				background-color: rgba(255,255,255,0.01);
			}
			.ssfoot li{
				width: 48px;
				height: 48px;
				border: 1px solid blue;
				border-radius: 50%;
				float: left;
				text-align: center;
				margin-left: 5px;
				background-color: darksalmon;
			}
			.ssfoot li a{
				display: block;
				width: 35px;
				height: 35px;
				/* border: 1px solid red; */
				
				padding-top: 10px;
				/* padding-left: 11px; */
				
			}
		</style>
	</head>
	<body>
		<div>
			<?
				$pageNo=1;
				if(isset($_GET['page'])){
					$pageNo=$_GET['page'];
				}
				//$bookkey="";
				if(isset($_POST['bookkey'])){
					$_SESSION['bookkey']=trim($_POST['bookkey']);
				}
				$sqlS="select * from bookInfo where bookName like '%".$_SESSION['bookkey']."%'";
				$r=mysqli_query($conn,$sqlS);
				$s=mysqli_fetch_row($r);
				if(!$r||mysqli_num_rows($r)==0){
			?>	
				<span>数据库里没有相关内容的书籍</span>
			<?
				return;
				}
			?>
			<div id="ssjg">
				<?
					
					if($_SESSION['bookkey']==""){
						echo"你没有输入关键字，将显示所有书籍";
					}else{
				?>
					共找到<span><? echo $_SESSION['bookkey']; ?></span>相关的书籍
					<span><? echo mysqli_num_rows($r); ?>本</span>
				</div>
				<?
					$bookNum=mysqli_num_rows($r);
					$pageNum=ceil($bookNum/8);
					$bs=($pageNo-1)*8;
					$sqlS="select * from bookinfo where bookname like '%".$_SESSION['bookkey']."%' limit ".$bs.",8";
					$r=mysqli_query($conn,$sqlS);
				?>
				
				<div id="bookShow">
					<?
						while($s=mysqli_fetch_array($r)){
					?>
					<table>
						<tr>
							<td>
								<? echo "<a href='bookInfo.php?bookid=".$s['bookID']."'>
								<img src='images\\".$s[5]."'width=120 height='170'></a>
								" ?>
							</td>
						</tr>
						<tr>
							<td>
								<?
								echo $s['bookName']
								?>
							</td>
						</tr>
					</table>
					<?
					}
					
					?>
				</div>
		</div>
		<div id="foot">
			<div id="fc">
				<ul class="ssfoot" >
				<?
				
					if($pageNum!=1){
						echo"<li><a href='?page=1'>首页</a></li>";
					}
					for($i=1;$i<=$pageNum;$i++){
						echo"<li><a href='?page=".$i."'>".$i."</a></li>";
					}if($pageNum!=1){
						echo"<li><a href='?page=".$pageNum."'>尾页</a></li>";
					}
				}
				?>
				</ul>
			</div>
		</div>
	</body>
</html>
