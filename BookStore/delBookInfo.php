<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?
		include_once("conn.php");
		echo"<script type='text/javascript'>
			if(!confirm('是否删除书籍？')){
				window.location.href='bookInfo.php?bookid=".$_GET['bookid']."';
			}else{
				window.location.href='delBook.php?bookid=".$_GET['bookid']."';
			}
		</script>";
		?>
	</body>
</html>
