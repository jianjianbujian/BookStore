<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<style>
			.bodydiv{
				width: 400px;
				height: 400px;
				/* border: 1px solid black; */
				margin: 0 auto;
			}
			form{
				margin: 100px auto;
			}
			.fonttop{
				font-size: 40px;
				font-weight: bold;
				/* display: block; */
				margin-left: 50px;
			}
			.searchinput{
				margin: 40px auto;
				width: 400px;
				height: 50px;
			}
			.buttonss{
					width: 120px;
					height: 50px;
					font-weight: bold;
					border-radius: 10px;
					margin-left: 150px;
					background-color: rgb(123,150,255);
			}
		</style>
	</head>
	<body>
		<?
		include("nav.php");
		?>
		<div class="bodydiv">
			<form method="post" action="search.php">
				<font class="fonttop">书籍名称关键字：</font><br>
				<input class="searchinput" type="text" name="bookkey">
				<input class="buttonss" type="submit" name="sssend" value="搜索" />
			</form>
		</div>
	</body>
</html>
