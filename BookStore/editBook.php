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
			.button1{
				width: 80px;
				height: 40px;
				font-weight: bold;
				border-radius: 10px;
				margin-right: 20px;
				background-color: rgb(150,255,150);
			}
			.button2{
				width: 80px;
				height: 40px;
				font-weight: bold;
				border-radius: 10px;
				margin-left: 20px;
				background-color: rgb(255,150,150);
			}
			.inputname{
				width: 350px;
				height: 50px;
			}
			.inputzd{
				width: 160px;
				height: 50px;
			}
		</style>
	</head>
	<body>
		<form name="form1" method="post">
		<table class="showbooktable">
			<tr>
				<td rowspan="3" style="padding-left: 15px;">
					<? echo "<img src='images\\".$s[5]."' width='230px' height='320px'/ >"; ?>
					修改图书封面：<input type="file"  name="xgfm" />
				</td>
				<td colspan="2" style="width: 700px;"><font>书名：</font><br><br>
				<input class="inputname" type="text" name="xgname" value="<? echo $s[1]; ?>"></td>
			</tr>
			<tr>
				<td style="padding-left: 50px;">作者：</td>
				<td style="padding-right: 40px;"><input class="inputzd" type="text" value="<? echo $s[2]; ?>" name="xgauthor"></td>
			</tr>
			<tr>
				<td style="padding-left: 50px;">单价：</td>
				<td style="padding-right: 50px;"><input class="inputzd" type="text" name="xgprice" value='<? echo $s[3]; ?>'></td>
			</tr>
			<tr>
				<td style="padding-left: 15px;" colspan="3">简介：</td>
			</tr>
			<tr>
				<td colspan="3" style="padding-left: 15px;"><textarea cols="86" rows="13" name="xgjj"><? echo $s[4]; ?></textarea></td>
			</tr>
			<tr >
				<td colspan="3" style="padding-left: 250px;">
					<input class="button1" type="submit" name="xgsend" value="确认修改"/>
					<input class="button2" type="submit" name="qxsend" value="取消修改" />
				</td>
			</tr>
		</table>
		</form>
		<?
			if(isset($_POST['xgsend'])){
				function ck(){
					if(empty($_POST['xgname'])){
						echo"<script>alert('书名不能为空！！');";
						echo"window.location.href='bookInfo.php?bookid=".$_GET['bookid']."';</script>";
						return false;
					}elseif(empty($_POST['xgauthor'])){
						echo"<script>alert('作者不能为空！！');";
						echo"window.location.href='bookInfo.php?bookid=".$_GET['bookid']."';</script>";
						return false;
					}
					elseif(empty($_POST['xgprice'])){
						echo"<script>alert('价格不能为空！！');";
						echo"window.location.href='bookInfo.php?bookid=".$_GET['bookid']."';</script>";
						return false;
					}elseif(!floatval(trim($_POST['xgprice']))){
						echo"<script>alert('价格不是数字，请重新输入！！');";
						echo"window.location.href='bookInfo.php?bookid=".$_GET['bookid']."';</script>";
						return false;
					}
					elseif(trim($_POST['xgjj'])==""){
						echo"<script>alert('简介不能为空！！');";
						echo"window.location.href='bookInfo.php?bookid=".$_GET['bookid']."';</script>";
						return false;
					}
					else{
						return true;
					}
				}
				
				if(ck()){
					$name=trim($_POST['xgname']);
					$author=trim($_POST['xgauthor']);
					$price=trim($_POST['xgprice']);
					$bookIntroduce=trim($_POST['xgjj']);
					$bookImage=$s[5];
					
					// if(($_FILES['xgfm']['name'])!=$s[5]){
					// 	$t=time()%10000;
					// 	$s=rand(10000,99999);
					// 	$bookImage=$t.$s.".".pathinfo($_FILES['xgfm']['name'],PATHINFO_EXTENSION);
					// 	move_uploaded_file($_FILES['xgfm']['tmp_name'],"images\\".$bookImage);
					// 	$sqls="update bookinfo set bookImage='".$bookImage."' where bookID='".$bookid."'";
					// 	//修改封面
					// 	$r2=mysqli_query($conn,$sqls);
					// 	if($r2){
					// 			echo"<script>alert('书籍封面修改成功!');";
					// 			echo"window.location.href='bookInfo.php?bookid=".$_GET['bookid']."';</script>";
					// 		}else{
					// 			echo"<script>alert('书籍封面修改失败 ，请重新修改!');";
					// 			echo"window.location.href='bookInfo.php?bookid=".$_GET['bookid']."';</script>";
					// 		}
					// }
					
					
						//修改其他信息
						$xgSql="update bookinfo set bookName='".$name."',author='".$author."',bookPrice='".$price."',bookIntroduce='".$bookIntroduce."',bookImage='".$bookImage."' where bookID='".$bookid."'";
						$r=mysqli_query($conn,$xgSql);
						if($r){
							echo"<script>alert('修改成功!');";
							echo"window.location.href='bookInfo.php?bookid=".$_GET['bookid']."';</script>";
						}else{
							echo"<script>alert('修改失败 ，请重新修改!');";
							echo"window.location.href='bookInfo.php?bookid=".$_GET['bookid']."';</script>";
						}
					}else{
						echo"<script>alert('修改失败 ，请重新修改!');";
						echo"window.location.href='bookInfo.php?bookid=".$_GET['bookid']."';</script>";
					}
				}
				
				if(isset($_POST['qxsend'])){
					echo"<script>window.location.href='bookInfo.php?bookid=".$_GET['bookid']."';</script>";
				}
		?>
	</body>
</html>
