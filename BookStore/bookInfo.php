<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>书籍详情</title>
		<?
			include_once("nav.php");
			$bookid=$_GET['bookid'];
			$sqlS="SELECT * from bookInfo where bookID='".$bookid."'";
			$r=mysqli_query($conn,$sqlS);
			$s=mysqli_fetch_row($r);
		?>
		
		<style>
			.showbooktable{
				width: 668px;
				border: 1px solid black;
				margin: 0px auto;
				font-size: 30px;
			}
			.showbooktable tr td{
				width: 120px;
				/* border: 1px solid red; */
				margin: 30px auto;
				font-size: 30px;
			}
			table a{
				font-size: 20px;
				text-decoration: none;
				color: #000000;
			}
			.bmtr{
				text-align: center;
			}
			.buttonxg{
				height: 50px;
				width: 100px;
				border-radius: 20px;
				margin-left: 20px;
				background-color: rgb(150,255,150);
			}
			.buttonsc{
				height: 50px;
				width: 100px;
				border-radius: 20px;
				margin-left: 20px;
				background-color: rgb(255,150,150);
			}
			.buttonshop{
				height: 50px;
				width: 130px;
				border-radius: 20px;
				margin-left: 20px;
				background-color: rgb(150,255,150);
			}
		</style>
	</head>
	<body>
		<table class="showbooktable">
			<tr>
				<td rowspan="3" style="padding-left: 15px;">
					<? echo "<img src='images\\".$s[5]."' width='230px' height='320px'/ >"; ?>
				</td>
				<td colspan="2" style="width: 700px;"><font>书名：</font><br><br>
				<? echo "&nbsp;&nbsp;&nbsp;《".$s[1]."》"; ?></td>
			</tr>
			<tr>
				<td style="padding-left: 50px;">作者：</td>
				<td style="padding-right: 40px;"><? echo $s[2]; ?></td>
			</tr>
			<tr>
				<td style="padding-left: 50px;">单价：</td>
				<td style="padding-right: 50px;"><? echo $s[3]."元"; ?></td>
			</tr>
			<tr >
				<td colspan="3">简介：</td>
			</tr>
			<tr>
				<td colspan="3"><? echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$s[4]; ?></td>
			</tr>
			<!-- <tr><td><input type='button' onclick='window.location.href='edid'></td></tr> -->
			
			<?
				if(isset($_SESSION['nick'])){
					if($_SESSION['usertype']==1){
						echo"<tr class='bmtr'><td colspan='3'><button class='buttonxg'><a href='editBook.php?bookid=".$_GET['bookid']."'>修改书籍</a></button>";
						echo"<button class='buttonsc'><a href='delBookInfo.php?bookid=".$_GET['bookid']."'>删除书籍</a></button></td></tr>";
					}
					if($_SESSION['usertype']==0){
						echo"<tr class='bmtr'><td colspan='3'><button class='buttonshop'><a href='addspCart.php?bookid=".$_GET['bookid']."'>加入购物车</a></button></td></tr>";
					}
				}
			?>
			
		</table>
		<div id="editinfo"> 
			
		</div>
	</body>
</html>
